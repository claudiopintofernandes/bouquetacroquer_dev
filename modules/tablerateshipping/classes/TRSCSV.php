<?php
/**
 * Overrides carrier shipping with Table Rate Shipping
 *
 * Table Rate Shipping by Kahanit(https://www.kahanit.com/) is licensed under a
 * Creative Creative Commons Attribution-NoDerivatives 4.0 International License.
 * Based on a work at https://www.kahanit.com/.
 * Permissions beyond the scope of this license may be available at https://www.kahanit.com/.
 * To view a copy of this license, visit http://creativecommons.org/licenses/by-nd/4.0/.
 *
 * @author    Amit Sidhpura <amit@kahanit.com>
 * @copyright 2015 Kahanit
 * @license   http://creativecommons.org/licenses/by-nd/4.0/
 */

/**
 * Class TRSCSV
 */
class TRSCSV
{
    public $filename;

    public $collection;

    public $delimiter;

    /**
     * Loads objects, filename and optionnaly a delimiter.
     *
     * @param array|Iterator $collection Collection of objects / arrays (of non-objects)
     * @param string         $filename : used later to save the file
     * @param string         $delimiter Optional : delimiter used
     */
    public function __construct($collection, $filename, $delimiter = ';')
    {
        $this->filename = $filename;
        $this->delimiter = $delimiter;
        $this->collection = $collection;
    }

    /**
     * Main function
     * Adds headers
     * Outputs
     */
    public function export()
    {
        $this->headers();

        $header_line = false;

        foreach ($this->collection as $object) {
            $vars = get_object_vars($object);
            if (!$header_line) {
                $this->output(array_keys($vars));
                $header_line = true;
            }

            // outputs values
            $this->output($vars);
            unset($vars);
        }
    }

    /**
     * Wraps data and echoes
     * Uses defined delimiter
     */
    public function output($data)
    {
        $wraped_data = array_map(array('TRSCSV', 'wrap'), $data);
        echo sprintf("%s\n", implode($this->delimiter, $wraped_data));
    }

    /**
     * Escapes data
     *
     * @param string $data
     *
     * @return string $data
     */
    public static function wrap($data)
    {
        $data = Tools::str_replace_once(array('"', ';'), '', $data);

        return sprintf('"%s"', $data);
    }

    /**
     * Adds headers
     */
    public function headers()
    {
        header('Content-type: text/csv');
        header('Content-Type: application/force-download; charset=UTF-8');
        header('Cache-Control: no-store, no-cache');
        header('Content-disposition: attachment; filename="'.$this->filename.'.csv"');
    }
}