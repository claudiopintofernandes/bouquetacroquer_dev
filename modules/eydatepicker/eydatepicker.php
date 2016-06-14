<?php

/**
 * NOTICE OF LICENSE
 * 
 * A friendly notice to thank you for been honest.
 * The plugin has to be used only if purchased from https://addons.prestashop.com or directly from developer
 * Reselling, sharing or using the same licence for multiple shops is prohibited 
 * 
 *  @author    Radu G.
 *  @copyright ecommy.com
 *  @license   https://www.ecommy.com/licence.txt
 */
if (!defined('_PS_VERSION_'))
    exit;

if (!defined('__DIR__'))
    define('__DIR__', realpath(dirname(__FILE__)));

require_once(realpath(dirname(__FILE__) . '/models/AppModel.php'));

class Eydatepicker extends Module {

    public function __construct() {
        $this->name = 'eydatepicker';

        // used to avoid having the same config variables with other plugins
        // @todo to implement this code for config variables
        $this->code = 'EYDPCKR';

        $this->tab = 'front_office_features';
        $this->version = '4.3.1';
        $this->author = 'ecommy.com';
        $this->module_key = '705044d37cf51fec95dc951eb3a897a7';
        $this->need_instance = 0;
        $this->ps_versions_compliancy = array('min' => '1.5', 'max' => '1.6');

        parent::__construct();

        $this->displayName = $this->l('Datepicker for checkout');
        $this->description = $this->l('Shows a date picker during checkout. Configure this plugin before using it.');

        $this->models['Deliveryinfo'] = AppModel::loadModel('Deliveryinf');
    }

    public function install() {
        if (!$this->installDB() || !parent::install() || !$this->registerHooks() || !$this->installConfig())
            return false;

        return true;
    }

    public function installDB() {
        include(dirname(__FILE__) . '/sql_install.php');
        return true;
    }

    private function installConfig() {
        return (
                Configuration::updateValue('PS_FUTURE_DAYS', 100) &&
                Configuration::updateValue('PS_HOURS_TO_PREPARE_ORDER', 5) &&
                Configuration::updateValue('PS_FIRST_AVAILABLE_DELIVERY_DAY', 1) &&
                Configuration::updateValue('PS_CALENDAR_INLINE', 0) &&
                Configuration::updateValue('PS_CALENDAR_REQUIRED', 1) &&
                Configuration::updateValue('PS_CUTOFF_HOUR', 12));
    }

    public function uninstall() {
        if (!parent::uninstall())
            return false;
        return true;
    }

    public function getContent() {
        Configuration::updateValue('PS_DPCKR_ADMIN_DIR', basename(_PS_ADMIN_DIR_));

        // configuration
        $context_shop_id = (int) Context::getContext()->shop->id;
        $shop = Shop::getShop($context_shop_id);

        $base_uri = __PS_BASE_URI__;
        if (!empty($shop))
            $base_uri = $shop['uri'];

        $token = Tools::getAdminToken('eydatepicker' . Context::getContext()->employee->id);
        $protocol_link = (Configuration::get('PS_SSL_ENABLED')) ? 'https://' : 'http://';
        Tools::redirect($protocol_link . $_SERVER['HTTP_HOST'] . $base_uri . 'modules/eydatepicker/controllers/admin.php?token=' . $token);
    }

    private function registerHooks() {
        return (
                // used to update orders table
                $this->registerHook('actionValidateOrder') &&
                $this->registerHook('actionPDFInvoiceRender') &&
                $this->registerHook('processCarrier') &&
                $this->registerHook('displayAdminOrder') &&
                $this->registerHook('header') &&
                $this->registerHook('displayMobileHeader') &&
                $this->registerHook('footer') &&
                $this->registerHook('displayMobileFooter') &&
                $this->registerHook('displayOrderDetail') &&
                $this->registerHook('updateCarrier') &&
                $this->registerHook('beforeCarrier'));
    }

    /**
     * update saved carrier ids with the new ids
     * @param type $params
     */
    public function hookupdateCarrier($params) {
        $id_carrier_old = (int) $params['id_carrier'];
        $id_carrier_new = (int) $params['carrier']->id;

        $carriers_filter = unserialize(Configuration::get('PSDK_CARRIERS_FILTER'));
        if (!is_array($carriers_filter)) {
            $carriers_filter = array();
        }
        if (in_array((int) $id_carrier_old, $carriers_filter)) {
            if (($key = array_search($id_carrier_old, $carriers_filter)) !== false) {
                $carriers_filter[$key] = $id_carrier_new;
                Configuration::updateValue('PSDK_CARRIERS_FILTER', serialize($carriers_filter));
            }
        }
    }

    public function hookActionPDFInvoiceRender($params) {
        $order_invoice_list = $params['order_invoice_list'];

        foreach ($order_invoice_list as $order_invoice) {
            $id_order = $order_invoice->id_order;
			$id_cart = Order::getCartIdStatic($id_order);
            //$info = $this->models['Deliveryinfo']->getDeliveryInfo($id_order);
			$info = $this->models['Deliveryinfo']->getDeliveryInfoByCartId($id_cart);

            if (!empty($info['shipping_date'])) {
                Context::getContext()->smarty->assign('shipping_date', $info['shipping_date']);
                Context::getContext()->smarty->assign('shipping_hour', $info['shipping_hour']);
            }
        }
        // @todo multipdf
    }

    /**
     * code executed after an order is validated
     */
    public function hookActionValidateOrder($params) {
        $orderObject = $params['order'];
        $cartObject = $params['cart'];

        $delivery_info = $this->models['Deliveryinfo']->getDeliveryInfoByCartId((int) $cartObject->id);

        if (!empty($delivery_info)) {
            $delivery_info = $this->models['Deliveryinfo']->getDeliveryInfoByCartId((int) $cartObject->id);
            $this->models['Deliveryinfo']->id = $delivery_info['id'];
            $this->models['Deliveryinfo']->update(array(
                'id_order' => (int) $orderObject->id
            ));
        }
    }

    public function hookDisplayOrderDetail($params) {
        $id_order = (int) $params['order']->id;
		$id_cart = Order::getCartIdStatic($id_order);

        //$info = $this->models['Deliveryinfo']->getDeliveryInfo($id_order);
		$info = $this->models['Deliveryinfo']->getDeliveryInfoByCartId($id_cart);

        if (!isset($info['shipping_date']) || empty($info['shipping_date']))
            $this->smarty->assign('ey_date', 'no date selected');
        else
            $this->smarty->assign('ey_date', date($this->context->language->date_format_lite, strtotime($info['shipping_date'])));

        if (isset($info['shipping_hour']) && !empty($info['shipping_hour']))
            $this->smarty->assign('ey_hour', $info['shipping_hour']);

        return $this->display(__FILE__, 'views/templates/hook/order-detail.tpl');
    }

    public function hookDisplayAdminOrder($params) {
        $id_order = (int) $params['id_order'];
		$id_cart = Order::getCartIdStatic($id_order);
        //$info = $this->models['Deliveryinfo']->getDeliveryInfo($id_order);
		$info = $this->models['Deliveryinfo']->getDeliveryInfoByCartId($id_cart);

        // get shipping date / hour
        $this->smarty->assign('dateFormat', $this->dateStringToDatepickerFormat($this->context->language->date_format_lite));

        $context_shop_id = (int) Context::getContext()->shop->id;
        $shop = Shop::getShop($context_shop_id);

        $base_uri = __PS_BASE_URI__;
        if (!empty($shop))
            $base_uri = $shop['uri'];

        $this->smarty->assign('basedir', $base_uri);

        $this->smarty->assign('id', $info['id']);
        $this->smarty->assign('id_order', $id_order);

        if (empty($info['shipping_date']))
            $this->smarty->assign('shipping_date', 'no date selected');
        else
            $this->smarty->assign('shipping_date', date($this->context->language->date_format_lite, strtotime($info['shipping_date'])));

        $this->smarty->assign('shipping_date_raw', $info['shipping_date']);
        $this->smarty->assign('shipping_hour', $info['shipping_hour']);
        $token = Tools::getAdminToken('eydatepicker' . Context::getContext()->employee->id);
        $this->smarty->assign('tokencommon', $token);

        return $this->display(__FILE__, 'views/templates/hook/orderdetail.tpl');
    }

    public function hookProcessCarrier($params) {
        $shipping_date = Tools::getValue('shipping_date');
        $shipping_hour = Tools::getValue('shipping_hour');

        $cartObject = $params['cart'];
        if (!empty($shipping_date)) {
            $delivery_info = $this->models['Deliveryinfo']->getDeliveryInfoByCartId((int) $cartObject->id);
            if (empty($delivery_info)) {
                $this->models['Deliveryinfo']->insert(array(
                    'id_cart' => (int) $cartObject->id,
                    'shipping_hour' => pSQL($shipping_hour),
                    'shipping_date' => pSQL($shipping_date)
                ));
            } else {
                $this->models['Deliveryinfo']->id = $delivery_info['id'];
                $this->models['Deliveryinfo']->update(array(
                    'shipping_hour' => pSQL($shipping_hour),
                    'shipping_date' => pSQL($shipping_date)
                ));
            }
        }
    }

    public function hookDisplayMobileHeader($params) {
        return $this->headerHook($params);
    }

    public function hookHeader($params) {
        return $this->headerHook($params);
    }

    public function headerHook($params) {
        $this->context->smarty->assign('modulename', $this->name);
        $this->context->smarty->assign('basedir', __PS_BASE_URI__);
        $this->context->smarty->assign('langcode', $this->context->language->iso_code);
        $this->context->smarty->assign('date_format_lite', $this->context->language->date_format_lite);

        return $this->display(__FILE__, 'views/templates/hook/header.tpl');
    }

    public function hookDisplayMobileFooter($params) {
        return $this->footerHook($params);
    }

    public function hookFooter($params) {
        return $this->footerHook($params);
    }

    public function footerHook($params) {
        $this->context->smarty->assign('modulename', $this->name);
        $this->context->smarty->assign('basedir', __PS_BASE_URI__);
        $this->context->smarty->assign('langcode', $this->context->language->iso_code);
        $this->context->smarty->assign('date_format_lite', $this->context->language->date_format_lite);

        return $this->display(__FILE__, 'views/templates/hook/footer.tpl');
    }

    public function hookBeforeCarrier($params) {
        // multishop related
        $context_shop_id = (int) Shop::getContextShopID(true);
        $data = Db::getInstance()->ExecuteS('SELECT day, active FROM  ' . _DB_PREFIX_ . 'availableweekdays WHERE id_shop=' . (int) $context_shop_id . ' ORDER BY day');
        $disabled_week_days_array = array();
        //sunday is 0 for us is 7
        $disableWeekDays = '[';
        if (!empty($data)) {
            $hasdisableddays = false;
            foreach ($data as $line) {
                if ($line['active'] == 0)
                    $disabled_week_days_array[] = $line['day']; // from 1 to 7

                if ($line['day'] == 7)
                    $line['day'] = 0;

                if ($line['active'] == 0)
                    $hasdisableddays = true;

                $disableWeekDays .= ($line['active'] == 0 ? $line['day'] . ',' : '');
            }
            if ($hasdisableddays)
                $disableWeekDays = Tools::substr($disableWeekDays, 0, - 1);
        }
        $disableWeekDays .= ']';

        $data = Db::getInstance()->ExecuteS('SELECT day, month FROM  ' . _DB_PREFIX_ . 'restricteddays WHERE active=1 AND (id_shop=' . (int) $context_shop_id . ' OR id_shop=0) ORDER BY day');
        $disabled_days_array = array();
        $disableDays = '[';
        if (!empty($data)) {
            foreach ($data as $line) {
                $disabled_days_array[] = ($line['month'] < 10 ? '0' . $line['month'] : $line['month']) . '-' . ($line['day'] < 10 ? '0' . $line['day'] : $line['day']);
                $disableDays .= '"' . $line['month'] . '-' . $line['day'] . '",';
            }
            $disableDays = Tools::substr($disableDays, 0, - 1);
        }
        $disableDays .= ']';

        $firstAvailableDay = Configuration::get('PS_FIRST_AVAILABLE_DELIVERY_DAY');

        // find the real first free day
        $test = 1;
        $current_timestamp = time() + $firstAvailableDay * 3600 * 24;
        $backup = 0; // just in case to avoid infinite loop

        do {
            // test week day, if it's not disabled we are good to go
            if (!in_array(date('N', $current_timestamp), $disabled_week_days_array) && !in_array(date('m-d', $current_timestamp), $disabled_days_array)) {
                // we break the cycle
                $test = 0;
            } else
                $current_timestamp += 3600 * 24;

            $backup++;
        } while ($test == 1 && $backup < 1000);

        $firstAvailableDay = (int) ( ($current_timestamp - time()) / (3600 * 24) );

        if (date('G') >= (int) Configuration::get('PS_CUTOFF_HOUR'))
            $firstAvailableDay++;
		
		$carriers = Carrier::getCarriers($context->language->id,false,false,false,null,ALL_CARRIERS);
		
		$datepicker_config_data = array();
		$minDates=array();
		foreach ($carriers as $key=>$carrier) {
		$minDates[$carrier['id_carrier']] =$this->_getMinDates($carrier['id_carrier']);
		}
        $datepicker_config_data['dateFormat'] = $this->dateStringToDatepickerFormat($this->context->language->date_format_lite);
        $datepicker_config_data['disableWeekDays'] = $disableWeekDays;
        $datepicker_config_data['disableDays'] = $disableDays;
		$datepicker_config_data['carriers'] = $carriers;
       /* $datepicker_config_data['minDate'] = (int) $firstAvailableDay;*/
	    $datepicker_config_data['minDates'] = json_encode($minDates);
        $datepicker_config_data['maxDate'] = (int) Configuration::get('PS_FUTURE_DAYS');
        $datepicker_config_data['show_calendar_inline'] = (int) Configuration::get('PS_CALENDAR_INLINE');
        $datepicker_config_data['is_calendar_required'] = (int) Configuration::get('PS_CALENDAR_REQUIRED');
        $datepicker_config_data['basedir'] = __PS_BASE_URI__;

        $this->context->smarty->assign($datepicker_config_data);

        // check existing data
        $delivery_info = $this->models['Deliveryinfo']->getDeliveryInfoByCartId((int) Context::getContext()->cart->id);
        if (!empty($delivery_info)) {
            $delivery_info['formatted_shipping_date'] = date($this->context->language->date_format_lite, strtotime($delivery_info['shipping_date']));
            $this->context->smarty->assign('ey_delivery_info', $delivery_info);
        }

        $carriers_filter = unserialize(Configuration::get('PSDK_CARRIERS_FILTER'));
        if (!is_array($carriers_filter)) {
            $carriers_filter = array();
        }
		
		
        $this->context->smarty->assign('avail_carrier_list', json_encode($carriers_filter, JSON_NUMERIC_CHECK));


        return $this->display(__FILE__, 'views/templates/hook/ordercarrier.tpl');
    }

    public function dateStringToDatepickerFormat($dateString) {
        $pattern = array(
            //day
            'd', //day of the month
            'j', //3 letter name of the day
            'l', //full name of the day
            'z', //day of the year
            //month
            'F', //Month name full
            'M', //Month name short
            'n', //numeric month no leading zeros
            'm', //numeric month leading zeros
            //year
            'Y', //full numeric year
            'y'  //numeric year: 2 digit
        );
        $replace = array(
            'dd', 'd', 'DD', 'o',
            'MM', 'M', 'm', 'mm',
            'yy', 'y'
        );
        foreach ($pattern as &$p)
            $p = '/' . $p . '/';

        return preg_replace($pattern, $replace, $dateString);
    }
	
	///////////////////////////////////////////////////////////////
	
	private function _getMinDates($id_carrier)
	{
		if (!(int)$id_carrier)
			return false;
		$carrier_rule = $this->_getCarrierRuleWithIdCarrier2((int)$id_carrier);
		if (empty($carrier_rule))
			return false;

		
		$date_now = time(); // Date on timestamp format
			
		$hour_now = date("H");
		$minute_now = date("i");
		$day_now = strtolower(date("D"));
		
		if ($hour_now < 10 || ($hour_now == 10 && $minute_now ==00)   )
		{
			if ($day_now == "mon")
				$date_delivery_time =	$carrier_rule['lundi1'];
			elseif ($day_now == "tue")
				$date_delivery_time =	$carrier_rule['mardi1'];
			elseif ($day_now == "wed")
				$date_delivery_time =	$carrier_rule['mercredi1'];
			elseif ($day_now == "thu")
				$date_delivery_time =	$carrier_rule['jeudi1'];
			elseif ($day_now == "fri")
				$date_delivery_time =	$carrier_rule['vendredi1'];
			elseif ($day_now == "sat")
				$date_delivery_time =	$carrier_rule['samedi1'];
			elseif ($day_now == "sun")
				$date_delivery_time =	$carrier_rule['dimanche1'];
		}
		else
		{
			if ($day_now == "mon")
				$date_delivery_time =	$carrier_rule['lundi2'];
			elseif ($day_now == "tue")
				$date_delivery_time =	$carrier_rule['mardi2'];
			elseif ($day_now == "wed")
				$date_delivery_time =	$carrier_rule['mercredi2'];
			elseif ($day_now == "thu")
				$date_delivery_time =	$carrier_rule['jeudi2'];
			elseif ($day_now == "fri")
				$date_delivery_time =	$carrier_rule['vendredi2'];
			elseif ($day_now == "sat")
				$date_delivery_time =	$carrier_rule['samedi2'];
			elseif ($day_now == "sun")
				$date_delivery_time =	$carrier_rule['dimanche2'];
		}
		
		return $date_delivery_time;
	}
	
	private function _getCarrierRuleWithIdCarrier2($id_carrier)
	{
		if (!(int)($id_carrier))
			return false;
		return Db::getInstance()->getRow('
		SELECT *
		FROM `'._DB_PREFIX_.'dateofdelivery_carrier_rule`
		WHERE `id_carrier` = '.(int)$id_carrier
		);
	}
	
	private function _getdateofdelivery($id_carrier)
	{
		if (!(int)($id_carrier))
			return false;
		return Db::getInstance()->getRow('
		SELECT *
		FROM `'._DB_PREFIX_.'dateofdelivery_carrier_rule`
		WHERE `id_carrier` = '.(int)$id_carrier
		);
	}

}
