<?php
/**
 * Equation Operating System (EOS) EqParser
 *
 * An EOS that can safely parse equations from unknown sources returning
 * the calculated value of it.  Can also handle solving equations with
 * variables, if the variables are defined (useful for the Graph creation
 * that the second and extended class in this file provides. {@see eqGraph})
 * This class was created for PHP4 in 2005, updated to fully PHP5 in 2013.
 *
 * @author    Jon Lawrence <jlawrence11@gmail.com>
 * @copyright Copyright �2005-2013, Jon Lawrence
 * @license   http://opensource.org/licenses/LGPL-2.1 LGPL 2.1 License
 * @package   Math
 * @subpackageEOS
 * @version   2.0
 */

/**
 * Class EqParser
 */
class EqParser
{
    /**
     * No matching Open/Close pair
     */
    const E_NO_SET = 5500;

    /**
     * Division by 0
     */
    const E_DIV_ZERO = 5501;

    /**
     * No Equation
     */
    const E_NO_EQ = 5502;

    /**
     * No variable replacement available
     */
    const E_NO_VAR = 5503;

    /**
     * Not a number
     */
    const E_NAN = 5504;

    /**
     * @var bool Activate Debug output.
     * @see __construct()
     * @see solveIF()
     */
    public static $debug = false;

    /**#@+
     *Private variables
     */
    private $postFix;

    private $inFix;
    /**#@-*/
    /**#@+
     * Protected variables
     */

    protected $SEP = array('open' => array('(', '['), 'close' => array(')', ']'));

    protected $SGL = array('!');

    protected $ST = array('^', '!');

    protected $ST1 = array('/', '*', '%');

    protected $ST2 = array('+', '-');

    protected $FNC = array('sin', 'cos', 'tan', 'csc', 'sec', 'cot', 'abs', 'log', 'log10', 'sqrt', 'floor', 'ceil');
    /**#@-*/
    /**
     * Construct method
     *
     * Will initiate the class.  If variable given, will assign to
     * internal variable to solve with this::solveIF() without needing
     * additional input.  Initializing with a variable is not suggested.
     *
     * @see EqParser::solveIF()
     *
     * @param String $inFix Standard format equation
     */
    public function __construct($inFix = null)
    {
        if (defined('DEBUG') && DEBUG) {
            self::$debug = true;
        }
        $this->inFix = (isset($inFix)) ? $inFix : null;
        $this->postFix = array();
    }

    /**
     * Check Infix for opening closing pair matches.
     *
     * This function is meant to solely check to make sure every opening
     * statement has a matching closing one, and throws an exception if
     * it doesn't.
     *
     * @param String $infix Equation to check
     *
     * @throws \Exception if malformed.
     * @return Bool true if passes - throws an exception if not.
     */
    private function checkInfix($infix)
    {
        if (trim($infix) == '') {
            throw new \Exception('No Equation given', EqParser::E_NO_EQ);
        }
        //Make sure we have the same number of '(' as we do ')'
        // and the same # of '[' as we do ']'
        if (substr_count($infix, '(') != substr_count($infix, ')')) {
            throw new \Exception("Mismatched parenthesis in '{$infix}'", EqParser::E_NO_SET);
        } elseif (substr_count($infix, '[') != substr_count($infix, ']')) {
            throw new \Exception("Mismatched brackets in '{$infix}'", EqParser::E_NO_SET);
        }
        $this->inFix = $infix;

        return true;
    }

    /**
     * Infix to Postfix
     *
     * Converts an infix (standard) equation to postfix (RPN) notation.
     * Sets the internal variable $this->postFix for the EqParser::solvePF()
     * function to use.
     *
     * @link http://en.wikipedia.org/wiki/Infix_notation Infix Notation
     * @link http://en.wikipedia.org/wiki/Reverse_Polish_notation Reverse Polish Notation
     *
     * @param String $infix A standard notation equation
     *
     * @return Array Fully formed RPN Stack
     */
    public function in2post($infix = null)
    {
        // if an equation was not passed, use the one that was passed in the constructor
        $infix = (isset($infix)) ? $infix : $this->inFix;

        //check to make sure 'valid' equation
        $this->checkInfix($infix);
        $pf = array();
        $ops = new EqStack();
        //$vars = new EqStack();

        // remove all white-space
        $infix = preg_replace('/\s/', '', $infix);

        // Create postfix array index
        $pfIndex = 0;

        //what was the last character? (useful for decerning between a sign for negation and subtraction)
        $lChar = '';

        //loop through all the characters and start doing stuff ^^
        $infix_len = Tools::strlen($infix);
        for ($i = 0; $i < $infix_len; $i++) {
            // pull out 1 character from the string
            $chr = Tools::substr($infix, $i, 1);

            // if the character is numerical
            if (preg_match('/[0-9.]/i', $chr)) {
                // if the previous character was not a '-' or a number
                if ((!preg_match('/[0-9.]/i', $lChar) && ($lChar != '')) && (@$pf[$pfIndex] != '-')) {
                    $pfIndex++;
                }    // increase the index so as not to overlap anything
                // Add the number character to the array
                @$pf[$pfIndex] .= $chr;
            } // If the character opens a set e.g. '(' or '['
            elseif (in_array($chr, $this->SEP['open'])) {
                // if the last character was a number, place an assumed '*' on the stack
                if (preg_match('/[0-9.]/i', $lChar)) {
                    $ops->push('*');
                }

                $ops->push($chr);
            } // if the character closes a set e.g. ')' or ']'
            elseif (in_array($chr, $this->SEP['close'])) {
                // find what set it was i.e. matches ')' with '(' or ']' with '['
                $key = array_search($chr, $this->SEP['close']);
                // while the operator on the stack isn't the matching pair...pop it off
                while ($ops->peek() != $this->SEP['open'][$key]) {
                    $nchr = $ops->pop();
                    if ($nchr) {
                        $pf[++$pfIndex] = $nchr;
                    } else {
                        throw new \Exception("Error while searching for '".$this->SEP['open'][$key]."' in '{$infix}'.",
                            EqParser::E_NO_SET);
                    }
                }
                $ops->pop();
            } // If a special operator that has precedence over everything else
            elseif (in_array($chr, $this->ST)) {
                while (in_array($ops->peek(), $this->ST)) {
                    $pf[++$pfIndex] = $ops->pop();
                }
                $ops->push($chr);
                $pfIndex++;
            } // Any other operator other than '+' and '-'
            elseif (in_array($chr, $this->ST1)) {
                while (in_array($ops->peek(), $this->ST1) || in_array($ops->peek(), $this->ST)) {
                    $pf[++$pfIndex] = $ops->pop();
                }

                $ops->push($chr);
                $pfIndex++;
            } // if a '+' or '-'
            elseif (in_array($chr, $this->ST2)) {
                // if it is a '-' and the character before it was an operator or nothingness (e.g. it negates a number)
                if ((in_array($lChar, array_merge($this->ST1, $this->ST2, $this->ST,
                            $this->SEP['open'])) || $lChar == '') && $chr == '-'
                ) {
                    // increase the index because there is no reason that it shouldn't..
                    $pfIndex++;
                    $pf[$pfIndex] = $chr;
                } // Otherwise it will function like a normal operator
                else {
                    while (in_array($ops->peek(), array_merge($this->ST1, $this->ST2, $this->ST))) {
                        $pf[++$pfIndex] = $ops->pop();
                    }
                    $ops->push($chr);
                    $pfIndex++;
                }
            }
            // make sure we record this character to be referred to by the next one
            $lChar = $chr;
        }
        // if there is anything on the stack after we are done...add it to the back of the RPN array
        while (($tmp = $ops->pop()) !== false) {
            $pf[++$pfIndex] = $tmp;
        }

        // re-index the array at 0
        $pf = array_values($pf);

        // set the private variable for later use if needed
        $this->postFix = $pf;

        // return the RPN array in case developer wants to use it fro some insane reason (bug testing ;]
        return $pf;
    }

    /**
     * Solve Postfix (RPN)
     *
     * This function will solve a RPN array. Default action is to solve
     * the RPN array stored in the class from EqParser::in2post(), can take
     * an array input to solve as well, though default action is prefered.
     *
     * @link http://en.wikipedia.org/wiki/Reverse_Polish_notation Postix Notation
     *
     * @param Array $pfArray RPN formatted array. Optional.
     *
     * @return Float Result of the operation.
     */
    public function solvePF($pfArray = null)
    {
        // if no RPN array is passed - use the one stored in the private var
        $pf = (!is_array($pfArray)) ? $this->postFix : $pfArray;

        // create our temporary function variables
        $temp = array();
        //$tot = 0;
        $hold = 0;

        // Loop through each number/operator
        $pf_count = count($pf);
        for ($i = 0; $i < $pf_count; $i++) {
            // If the string isn't an operator, add it to the temp var as a holding place
            if (!in_array($pf[$i], array_merge($this->ST, $this->ST1, $this->ST2))) {
                $temp[$hold++] = $pf[$i];
            } // ...Otherwise perform the operator on the last two numbers
            else {
                switch ($pf[$i]) {
                    case '+':
                        $temp[$hold - 2] = $temp[$hold - 2] + $temp[$hold - 1];
                        break;
                    case '-':
                        $temp[$hold - 2] = $temp[$hold - 2] - $temp[$hold - 1];
                        break;
                    case '*':
                        $temp[$hold - 2] = $temp[$hold - 2] * $temp[$hold - 1];
                        break;
                    case '/':
                        if ($temp[$hold - 1] == 0) {
                            throw new \Exception("Division by 0 on: '{$temp[$hold-2]} / {$temp[$hold-1]}' in {$this->inFix}",
                                EqParser::E_DIV_ZERO);
                        }
                        $temp[$hold - 2] = $temp[$hold - 2] / $temp[$hold - 1];
                        break;
                    case '^':
                        $temp[$hold - 2] = pow($temp[$hold - 2], $temp[$hold - 1]);
                        break;
                    case '!':
                        $temp[$hold - 1] = $this->factorial($temp[$hold - 1]);
                        $hold++;
                        break;
                    case '%':
                        if ($temp[$hold - 1] == 0) {
                            throw new \Exception("Division by 0 on: '{$temp[$hold-2]} % {$temp[$hold-1]}' in {$this->inFix}",
                                EqParser::E_DIV_ZERO);
                        }
                        $temp[$hold - 2] = bcmod($temp[$hold - 2], $temp[$hold - 1]);
                        break;
                }
                // Decrease the hold var to one above where the last number is
                $hold = $hold - 1;
            }
        }

        // return the last number in the array
        return $temp[$hold - 1];
    }

    public function solve($equation, $values = null)
    {
        if (is_array($equation)) {
            return $this->solvePF($equation);
        } else {
            return $this->solveIF($equation, $values);
        }
    }

    /**
     * Solve Infix (Standard) Notation Equation
     *
     * Will take a standard equation with optional variables and solve it. Variables
     * must begin with '&' or '$'
     * The variable array must be in the format of 'variable' => value. If
     * variable array is scalar (ie 5), all variables will be replaced with it.
     *
     * @param String       $infix Standard Equation to solve
     * @param String|Array $vArray Variable replacement
     *
     * @return Float Solved equation
     */
    public function solveIF($infix, $vArray = null)
    {
        $infix = ($infix != '') ? $infix : $this->inFix;
        //Check to make sure a 'valid' expression
        $this->checkInfix($infix);

        //$ops = new EqStack();
        //$vars = new EqStack();
        $hand = null;

        //remove all white-space
        $infix = preg_replace('/\s/', '', $infix);
        if (EqParser::$debug) {
            $hand = fopen('eq.txt', 'a');
        }

        //replace scientific notation with normal notation (2e-9 to 2*10^-9)
        $infix = preg_replace('/([\d])([eE])(-?\d)/', '$1*10^$3', $infix);

        //Find all the variables that were passed and replaces them
        while ((preg_match('/(.){0,1}[&$]([a-zA-Z]+)(.){0,1}/', $infix, $match)) != 0) {

            //remove notices by defining if undefined.
            if (!isset($match[3])) {
                $match[3] = '';
            }

            if (EqParser::$debug) {
                fwrite($hand, '{$match[1]} || {$match[3]}\n');
            }
            // Ensure that the variable has an operator or something of that sort in front and back - if it doesn't, add an implied '*'
            if ((!in_array($match[1], array_merge($this->ST, $this->ST1, $this->ST2,
                        $this->SEP['open'])) && $match[1] != '') || is_numeric($match[1])
            ) //$this->SEP['close'] removed
            {
                $front = '*';
            } else {
                $front = '';
            }

            if ((!in_array($match[3], array_merge($this->ST, $this->ST1, $this->ST2,
                        $this->SEP['close'])) && $match[3] != '') || is_numeric($match[3])
            ) //$this->SEP['open'] removed
            {
                $back = '*';
            } else {
                $back = '';
            }

            //Make sure that the variable does have a replacement
            //First check for pi and e variables that wll automagically be replaced
            if (in_array(Tools::strtolower($match[2]), array('pi', 'e'))) {
                $t = (Tools::strtolower($match[2]) == 'pi') ? pi() : exp(1);
                $infix = str_replace($match[0], $match[1].$front.$t.$back.$match[3], $infix);
            } elseif (!isset($vArray[$match[2]]) && (!is_array($vArray != '') && !is_numeric($vArray))) {
                throw new \Exception("Variable replacement does not exist for '".Tools::substr($match[0], 1,
                        1).$match[2]."' in {$this->inFix}", EqParser::E_NO_VAR);
            } elseif (!isset($vArray[$match[2]]) && (!is_array($vArray != '') && is_numeric($vArray))) {
                $infix = str_replace($match[0], $match[1].$front.$vArray.$back.$match[3], $infix);
            } elseif (isset($vArray[$match[2]])) {
                $infix = str_replace($match[0], $match[1].$front.$vArray[$match[2]].$back.$match[3], $infix);
            }
        }

        if (EqParser::$debug) {
            fwrite($hand, '$infix\n');
        }

        // Finds all the 'functions' within the equation and calculates them
        // NOTE - when using function, only 1 set of paranthesis will be found, instead use brackets for sets within functions!!
        while ((preg_match('/('.implode('|', $this->FNC).')\(([^\)\(]*(\([^\)]*\)[^\(\)]*)*[^\)\(]*)\)/', $infix,
                $match)) != 0) {
            $func = $this->solveIF($match[2]);
            switch ($match[1]) {
                case 'cos':
                    $ans = cos($func);
                    break;
                case 'sin':
                    $ans = sin($func);
                    break;
                case 'tan':
                    $ans = tan($func);
                    break;
                case 'sec':
                    $tmp = cos($func);
                    if ($tmp == 0) {
                        throw new \Exception("Division by 0 on: 'sec({$func}) = 1/cos({$func})' in {$this->inFix}",
                            EqParser::E_DIV_ZERO);
                    }
                    $ans = 1 / $tmp;
                    break;
                case 'csc':
                    $tmp = sin($func);
                    if ($tmp == 0) {
                        throw new \Exception("Division by 0 on: 'csc({$func}) = 1/sin({$func})' in {$this->inFix}",
                            EqParser::E_DIV_ZERO);
                    }
                    $ans = 1 / $tmp;
                    break;
                case 'cot':
                    $tmp = tan($func);
                    if ($tmp == 0) {
                        throw new \Exception("Division by 0 on: 'cot({$func}) = 1/tan({$func})' in {$this->inFix}",
                            EqParser::E_DIV_ZERO);
                    }
                    $ans = 1 / $tmp;
                    break;
                case 'abs':
                    $ans = abs($func);
                    break;
                case 'log':
                    $ans = log($func);
                    if (is_nan($ans) || is_infinite($ans)) {
                        throw new \Exception("Result of 'log({$func}) = {$ans}' is either infinite or a non-number in {$this->inFix}",
                            EqParser::E_NAN);
                    }
                    break;
                case 'log10':
                    $ans = log10($func);
                    if (is_nan($ans) || is_infinite($ans)) {
                        throw new \Exception("Result of 'log10({$func}) = {$ans}' is either infinite or a non-number in {$this->inFix}",
                            EqParser::E_NAN);
                    }
                    break;
                case 'sqrt':
                    $ans = sqrt($func);
                    break;
                case 'floor':
                    $ans = floor($func);
                    break;
                case 'ceil':
                    $ans = ceil($func);
                    break;
                default:
                    $ans = 0;
                    break;
            }
            $infix = str_replace($match[0], $ans, $infix);
        }
        if (EqParser::$debug) {
            fclose($hand);
        }

        return $this->solvePF($this->in2post($infix));
    }

    /**
     * Solvwe factorial (!)
     *
     * Will take an integer and solve for it's factorial. Eg.
     * `5!` will become `1*2*3*4*5` = `120`
     * TODO:
     *    Solve for non-integer factorials
     *
     * @param Integer $num Number to get factorial of
     *
     * @return Integer Solved factorial
     */
    protected function factorial($num)
    {
        if ($num < 2) {
            return 1;
        }
        //Until we can solve for non-integers, throw an error if not one.
        if ((int)$num != $num) {
            throw new \Exception("Factorial Error: {$num} is not an integer", EqParser::E_NAN);
        }

        $tot = 1;
        for ($i = 1; $i <= $num; $i++) {
            $tot *= $i;
        }

        return $tot;
    }
}