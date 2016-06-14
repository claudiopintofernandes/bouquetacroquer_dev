<?php
/**
* 2007-2014 PrestaShop
*
* DISCLAIMER
*
* Do not edit or add to this file if you wish to upgrade PrestaShop to newer
* versions in the future. If you wish to customize PrestaShop for your
* needs please refer to http://www.prestashop.com for more information.
*
* @author    PrestaShop SA <contact@prestashop.com>
* @copyright 2007-2014 PrestaShop SA
* @license   http://addons.prestashop.com/en/content/12-terms-and-conditions-of-use
* International Registered Trademark & Property of PrestaShop SA
*/

include(dirname(__FILE__).'/../../config/config.inc.php');
if (version_compare(_PS_VERSION_, '1.5', '<'))
	include(dirname(__FILE__).'/../../init.php');
include(dirname(__FILE__).'/payboxca.php');

$error = '';
$paybox = new Payboxca();
$values = Tools::strtolower($_SERVER['REQUEST_METHOD']) == 'post' ? $_POST : $_GET;
$needed_vars = array('m', 'r', 't', 'p', 'c', 's');

$test_mode = (int)Configuration::get('PBX_DEMO_MODE');
foreach ($needed_vars as $key => $value)
{
	if (!isset($values[$value]))
		$error .= '- Data from the payment site answer are missing ('.$value.')<br />';
}
unset($needed_vars, $key, $value);

if (!empty($error))
{
	Logger::addLog($error, 4);
	die($error);
}

$auth_remote_addr = array('195.101.99.76', '195.101.99.77', '195.101.99.72', '62.39.109.166', '194.50.38.6', '80.13.22.107', '194.2.122.158', '194.2.160.66', '195.25.7.166');
if (!in_array($_SERVER['REMOTE_ADDR'], $auth_remote_addr))
{
	Logger::addLog('Answer does not come from a secure remote address', 4);
	die('Answer does not come from a secure remote addres');
}

$qrystr = $paybox->PbxVerSign($_SERVER['QUERY_STRING'], 'pubkey.pem', true);
if ($qrystr == 1)
	$error .= '';
elseif ($qrystr == 0)
{
	Logger::addLog('Signature has been falsified', 4);
	die('Signature has been falsified');
}
elseif ($qrystr == -1)
{
	Logger::addLog('Error during the signature verification', 4);
	die('Error during the signature verification');
}

if ((!isset($values['a']) || empty($values['a'])))
{
	Logger::addLog('No autorisation number', 4);
	die('No autorisation number');
}

// Wrong authorization number in live mode
if ($values['a'] == 'XXXXXX' && $test_mode === 1)
	$error .= '- error payment - wrong authorization number <br>'."\n";

$x3 = false;
if (substr($values['r'],0, 1) == 'x')
{
	$x3 = true;
	$id_cart = substr($values['r'],1);
}
else
	$id_cart = $values['r'];

$cart = new Cart((int)$id_cart);
if (!$cart->id)
{
	Logger::addLog('Cart not valid', 4);
	die('Cart not valid');
}

if ($id_order = (int)Order::getOrderByCartId($cart->id))
{
	if (empty($error))
	{
		$order = new Order($id_order);
		$order->valid = 1;
		$order->total_paid_real = $values['m'] / 100;
		$order->update();

		$history = new OrderHistory();
		$history->id_order = $id_order;
		$history->changeIdOrderState((int)_PS_OS_PAYMENT_, $id_order);
		$history->addWithemail(true, array());
	
		$order_message = '';
		foreach ($values as $key => $value)
			$order_message .= $key.': '.$value.'<br>';
	
		if (isset($order_message) && !empty($order_message))
		{
			$msg = new Message();
			$message = $order_message;
			if (Validate::isCleanHtml($order_message))
			{
				$msg->message = $order_message;
				$msg->id_order = (int)$order->id;
				$msg->private = 1;
				$msg->add();
			}
		}
	}
	die($error);
}

$customer = new Customer((int)$cart->id_customer);
if (version_compare(_PS_VERSION_, '1.5.0.0') >= 0) // forge - PSCFV-9300
	Context::getContext()->customer = $customer;

if ($x3)
{
	$total_paid = ($values['m'] * 3) / 100;
	if (($cart->getOrderTotal() - $total_paid) < 2)
		$total_paid = $cart->getOrderTotal();
}
else
	$total_paid = $values['m'] / 100;

$pbx_error = trim($values['e']);

if ($test_mode === 0)
{
	if (empty($error) && $pbx_error == '00000')
	{
		$error = '***TEST*** : Validated Payment  <br>'."\n";
		$statut = _PS_OS_PAYMENT_;
	}
	else
	{
		$error = '***TEST*** : Invalid Payment  <br>'."\n".$error;
		$statut = _PS_OS_ERROR_;
	}
}
elseif ($test_mode === 1)
{
	if ($pbx_error == '00000' && empty($error))
		$statut = _PS_OS_PAYMENT_;
	else
		$statut = _PS_OS_ERROR_;
}

switch ($pbx_error)
{
	case '00001':
		$error .= 'Connection to the authorization center failed or an internal error occurred <br>'."\n";
	break;
	case '00003':
		$error .= 'Paybox error<br>'."\n";
	break;
	case '00004':
		$error .= 'Card number invalid or visual cryptogram invalid <br>'."\n";
	break;
	case '00006':
		$error .= 'Access refused or site/rank/identifier incorrect <br>'."\n";
	break;
	case '00008':
		$error .= 'Incorrect expiry date.<br>'."\n";
	break;
	case '00009':
		$error .= 'Error when during subscriber creation<br>'."\n";
	break;
	case '00010':
		$error .= 'Unknown currency<br>'."\n";
	break;
	case '00011':
		$error .= 'Amount incorrect<br>'."\n";
	break;
	case '00015':
		$error .= 'Payment already done<br>'."\n";
	break;
	case '00016':
		$error .= 'Subscriber already exists<br>'."\n";
	break;
	case '00021':
		$error .= 'Not authorized bin card<br>'."\n";
	break;
	case '00029':
		$error .= 'Not the same card used for the first payment.<br>'."\n";
	break;
	case '00030':
		$error .= 'Time-out > 15 mn before validation by the buyer when the buyer is on the page of payments of PAYBOX<br>'."\n";
	break;
	case '00031':
	case '00032':
		$error .= 'Reserved<br>'."\n";
	break;
	case '00033':
		$error .= 'Unauthorized country code of the IP address of the cardholder’s browser<br>'."\n";
	break;
	case '00040':
		$error .= 'Operation without 3DSecure authentication, blocked by the fraud filter.<br>'."\n";
	break;
	case '99999':
		$error .= 'Payment waiting confirmation from the issuer<br>'."\n";
	break;

	// Card schemes Carte Bancaire, American Express and Diners
	case '00100':
		$error .= 'Transaction approved or successfully processed.<br>'."\n";
	break;
	case '00101':
	case '00102':
		$error .= 'Contact the card issuer<br>'."\n";
	break;
	case '00103':
		$error .= 'Invalid retailer<br>'."\n";
	break;
	case '00104':
		$error .= 'Keep the card<br>'."\n";
	break;
	case '00105':
		$error .= 'Do not honor<br>'."\n";
	break;
	case '00107':
		$error .= 'Keep the card, special conditions<br>'."\n";
	break;
	case '00108':
		$error .= 'Approve after holder identification<br>'."\n";
	break;
	case '00112':
		$error .= 'Invalid transaction<br>'."\n";
	break;
	case '00113':
		$error .= 'Invalid amount<br>'."\n";
	break;
	case '00114':
		$error .= 'Invalid holder number<br>'."\n";
	break;
	case '00115':
		$error .= 'Card issuer unknown<br>'."\n";
	break;
	case '00117':
		$error .= 'Client cancellation<br>'."\n";
	break;
	case '00119':
		$error .= 'Repeat the transaction later<br>'."\n";
	break;
	case '00120':
		$error .= 'Error in reply (error in the server’s domain).<br>'."\n";
	break;
	case '00124':
		$error .= 'File update not withstood<br>'."\n";
	break;
	case '00125':
		$error .= 'Impossible to situate the record in the file<br>'."\n";
	break;
	case '00126':
		$error .= 'Record duplicated, former record replaced<br>'."\n";
	break;
	case '00127':
		$error .= 'Error in ‘edit’ in file update field<br>'."\n";
	break;
	case '00128':
		$error .= 'Access to file denied<br>'."\n";
	break;
	case '00129':
		$error .= 'File update impossible<br>'."\n";
	break;
	case '00130':
		$error .= 'Error in format<br>'."\n";
	break;
	case '00133':
		$error .= 'Expired card<br>'."\n";
	break;
	case '00138':
		$error .= 'Too many attempts at secret code.<br>'."\n";
	break;
	case '00159':
		$error .= 'Suspicion of fraud.<br>'."\n";
	break;

	case '00000':
	default:
		$error .= '<b>Successful operation</b><br>'."\n\n";
	break;
}

$error .= 'PayBox version: '.$paybox->version."\n".'<br> POST '.print_r($_POST, true)."\n".'<br>GET '.print_r($_GET, true)."\n";
$paybox->validateOrder((int)$cart->id, $statut, $total_paid, $paybox->displayName, $error, array(), NULL, false, $customer->secure_key);
if (version_compare(_PS_VERSION_, '1.5.0.0') >= '0')
{
	$order_id = Order::getOrderByCartId((int)$cart->id);
	$order = new Order((int)$order_id);
	if ($order_state == _PS_OS_PAYMENT_)
	{
		$order->valid = 1;
		$order->save();
	}

	$id_order_payment = Db::getInstance()->getValue('SELECT id_order_payment
	FROM `'._DB_PREFIX_.'order_payment`
	WHERE `order_reference` LIKE \'%'.pSQL($order->reference).'%\'');

	if ($id_order_payment == false)
		$order->addOrderPayment($total_paid, null, trim($values['t']));
	else
	{
		$order_payment = new OrderPayment((int)$id_order_payment);
		$order_payment->transaction_id = trim($values['t']);
		$order_payment->save();
	}
}