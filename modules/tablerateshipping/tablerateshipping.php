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

if (!defined('_PS_VERSION_')) {
    exit;
}

require_once(dirname(__FILE__).'/classes/CarrierTableRate.php');
require_once(dirname(__FILE__).'/classes/ZebraPagination.php');
require_once(dirname(__FILE__).'/classes/EqStack.php');
require_once(dirname(__FILE__).'/classes/EqParser.php');

/**
 * Class TableRateShipping
 */
class TableRateShipping extends CarrierModule
{
    public $id_carrier = '';

    private $html = '';

    private $post_error = array();

    private $post_warning = array();

    private $post_success = array();

    public $carrier_ids = '';

    public $condition_name = 'weight';

    public $use_pre_tax_price = 'no';

    public $csv_separator = ',';

    public $selected_carrrier_id = '';

    public $label_weight_from = 'Weight from';

    public $label_weight_to = 'Weight to';

    public $label_price_from = 'Price from';

    public $label_price_to = 'Price to';

    public $label_quantity_from = 'Quantity from';

    public $label_quantity_to = 'Quantity to';

    public $label_volume_from = 'Volume from';

    public $label_volume_to = 'Volume to';

    public $label_condition_from = '';

    public $label_condition_to = '';

    public $id_carrier_table_rate = '';

    public $zone_id = '';

    public $country_id = '';

    public $state_id = '';

    public $city = '';

    public $zip_from = '';

    public $zip_to = '';

    public $condition_from = '0';

    public $condition_to = '0';

    public $price = '0';

    public $comment = '';

    public function __construct()
    {
        $this->name = 'tablerateshipping';
        $this->tab = 'shipping_logistics';
        $this->version = '0.7.6';
        $this->author = 'Kahanit';

        $config = Configuration::getMultiple(array(
            'TABLERATESHIPPING_CARRIER_ID',
            'TABLERATESHIPPING_CONDITION_NAME',
            'TABLERATESHIPPING_USE_PRE_TAX_PRICE',
            'TABLERATESHIPPING_CSV_SEPARATOR'
        ));

        if (isset($config['TABLERATESHIPPING_CARRIER_ID'])) {
            $this->carrier_ids = unserialize($config['TABLERATESHIPPING_CARRIER_ID']);
        }
        if (isset($config['TABLERATESHIPPING_CONDITION_NAME'])) {
            $this->condition_name = $config['TABLERATESHIPPING_CONDITION_NAME'];
        }
        if (isset($config['TABLERATESHIPPING_USE_PRE_TAX_PRICE'])) {
            $this->use_pre_tax_price = $config['TABLERATESHIPPING_USE_PRE_TAX_PRICE'];
        }
        if (isset($config['TABLERATESHIPPING_CSV_SEPARATOR'])) {
            $this->csv_separator = $config['TABLERATESHIPPING_CSV_SEPARATOR'];
        }
        if (Tools::getValue('selected_carrrier_id', false) != false) {
            $this->selected_carrrier_id = Tools::getValue('selected_carrrier_id');
        }

        if (version_compare(_PS_VERSION_, '1.6.0.1') >= 0) {
            $this->bootstrap = true;
        } else {
            $this->bootstrap = false;
        }

        parent::__construct();

        $this->displayName = $this->l('Table Rate Shipping - PrestaShop Shipping by Zip Code Module');
        $this->description = $this->l('Setup shipping charges based on zone, country, state/region, city, zip/post code,
            total weight, total price, total quantity and total volume');
        $this->confirmUninstall = $this->l('Uninstalling the module will also delete all data?');

        if (!isset($this->carrier_ids) || $this->carrier_ids == ''
            || !isset($this->condition_name) || $this->condition_name == ''
            || !isset($this->use_pre_tax_price) || $this->use_pre_tax_price == ''
            || !isset($this->csv_separator) || $this->csv_separator == ''
        ) {
            $this->warning = $this->l('Override carrier and CSV file separator must be configured
			before using Kahanit Table Rate Shipping module.');
        }

        $this->label_weight_from = $this->l('Weight from');
        $this->label_weight_to = $this->l('Weight to');
        $this->label_price_from = $this->l('Price from');
        $this->label_price_to = $this->l('Price to');
        $this->label_quantity_from = $this->l('Quantity from');
        $this->label_quantity_to = $this->l('Quantity to');
        $this->label_volume_from = $this->l('Volume from');
        $this->label_volume_to = $this->l('Volume to');

        $this->updateConditionLabels();
    }

    public function updateConditionLabels()
    {
        if ($this->condition_name == 'weight') {
            $this->label_condition_from = $this->label_weight_from;
            $this->label_condition_to = $this->label_weight_to;
        } else {
            if ($this->condition_name == 'price') {
                $this->label_condition_from = $this->label_price_from;
                $this->label_condition_to = $this->label_price_to;
            } else {
                if ($this->condition_name == 'quantity') {
                    $this->label_condition_from = $this->label_quantity_from;
                    $this->label_condition_to = $this->label_quantity_to;
                } else {
                    $this->label_condition_from = $this->label_volume_from;
                    $this->label_condition_to = $this->label_volume_to;
                }
            }
        }
    }

    public function install()
    {
        if (!parent::install()
            || !$this->registerHook('displayBackOfficeHeader')
            || !$this->registerHook('updateCarrier')
        ) {
            return false;
        }

        Configuration::updateValue('TABLERATESHIPPING_CONDITION_NAME', 'weight');
        Configuration::updateValue('TABLERATESHIPPING_USE_PRE_TAX_PRICE', 'no');
        Configuration::updateValue('TABLERATESHIPPING_CSV_SEPARATOR', ',');

        Db::getInstance()->execute('
			DROP TABLE IF EXISTS `'._DB_PREFIX_.'carrier_table_rate`
		');

        if (!Db::getInstance()->execute('
			CREATE TABLE `'._DB_PREFIX_.'carrier_table_rate` (
				`id_carrier_table_rate` BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT,
				`id_carrier` INT(10) UNSIGNED NOT NULL DEFAULT \'0\',
				`id_shop` INT(11) UNSIGNED NOT NULL DEFAULT \'0\',
				`id_zone` INT(10) UNSIGNED NOT NULL DEFAULT \'0\',
				`id_country` INT(10) UNSIGNED NOT NULL DEFAULT \'0\',
				`id_state` INT(10) UNSIGNED NOT NULL DEFAULT \'0\',
				`dest_city` VARCHAR(64) NOT NULL DEFAULT \'\',
				`dest_zip_from` VARCHAR(12) NOT NULL DEFAULT \'\',
				`dest_zip_to` VARCHAR(12) NOT NULL DEFAULT \'\',
				`condition_name` VARCHAR(20) NOT NULL DEFAULT \'\',
				`condition_value_from` DECIMAL(12,6) NOT NULL DEFAULT \'0.000000\',
				`condition_value_to` DECIMAL(12,6) NOT NULL DEFAULT \'0.000000\',
				`price` VARCHAR(255) NOT NULL DEFAULT \'\',
				`cost` DECIMAL(12,6) NOT NULL DEFAULT \'0.000000\',
				`comment` TEXT NOT NULL,
				PRIMARY KEY (`id_carrier_table_rate`)
			) ENGINE=InnoDB DEFAULT CHARSET=utf8
		')
        ) {
            return false;
        }

        return true;
    }

    public function uninstall()
    {
        if (!parent::uninstall()
            || !$this->unregisterHook('displayBackOfficeHeader')
            || !$this->unregisterHook('updateCarrier')
            || !Configuration::deleteByName('TABLERATESHIPPING_CARRIER_ID')
            || !Configuration::deleteByName('TABLERATESHIPPING_CONDITION_NAME')
            || !Configuration::deleteByName('TABLERATESHIPPING_USE_PRE_TAX_PRICE')
            || !Configuration::deleteByName('TABLERATESHIPPING_CSV_SEPARATOR')
        ) {
            return false;
        }

        CarrierTableRate::clearCarrierFromTableRate($this->name);

        Db::getInstance()->execute('
			DROP TABLE IF EXISTS `'._DB_PREFIX_.'carrier_table_rate`;
		');

        return true;
    }

    public function getContent()
    {
        CarrierTableRate::$error_message = array(
            'id_carrier' => $this->l('Invalid `Carrier Id`'),
            'id_zone' => $this->l('Invalid `Zone`'),
            'id_country' => $this->l('Invalid `Country`'),
            'id_state' => $this->l('Invalid `State`'),
            'dest_city' => $this->l('Invalid `City`'),
            'dest_zip_from' => $this->l('Invalid `Zip/Post code from`'),
            'dest_zip_to' => $this->l('Invalid `Zip/Post code to`'),
            'condition_name' => $this->l('Invalid `Condition`'),
            'price' => $this->l('Invalid `Price`'),
            'comment' => $this->l('Invalid `Comment`'),
            'dest_zip_from_less_then_dest_zip_to' => $this->l('`Zip/Post code from` should be less than `Zip/Post code to`'),
            'condition_value_from_less_than_condition_value_to' =>
                sprintf($this->l('`%s` should be less than `%s`'), $this->label_condition_from,
                    $this->label_condition_to),
            'no_range_if_wildcard' => $this->l('You cannot specify range if wildcard is used in zip/post code'),
            'csv_invalid_format' => $this->l('CSV not properly formatted, please check sample CSV for exact format'),
            'no_records_found' => $this->l('No records found'),
            'total_records_success_error' => $this->l('Total Records: `%d`, success: `%d`, error: `%d`'),
            'please_select_carrier' => $this->l('Please select carrier')
        );

        if (Tools::isSubmit('btnSubmitShipDetails')) {
            $this->postShipDetails();
        }

        if (Tools::isSubmit('btnSubmitCSVUpload')) {
            $this->postCSVUpload();
        }

        if (Tools::isSubmit('btnSubmitDeleteSelected')) {
            $this->postDeleteSelected();
        }

        if (Tools::isSubmit('btnSubmitSaveRate')) {
            $this->postSaveRate();
        }

        if (Tools::getValue('action', false) != false) {
            $this->postActions();
        }

        $this->displayHeader();
        $this->displayShipDetails();
        $this->displayRateTable();
        $this->displayAddNewRate();
        $this->displayFooter();

        return $this->html;
    }

    private function postShipDetails()
    {
        if (!Tools::getValue('condition_name')) {
            $this->post_error[] = $this->l('`Condition name` is required');
        }
        if (!Tools::getValue('use_pre_tax_price')) {
            $this->post_error[] = $this->l('`Use pre tax price` is required');
        }
        if (!Tools::getValue('csv_separator')) {
            $this->post_error[] = $this->l('`CSV file separator` is required');
        }

        if (!count($this->post_error)) {
            Configuration::updateValue('TABLERATESHIPPING_CARRIER_ID', serialize(Tools::getValue('carrier_id')));
            Configuration::updateValue('TABLERATESHIPPING_CONDITION_NAME', Tools::getValue('condition_name'));
            Configuration::updateValue('TABLERATESHIPPING_USE_PRE_TAX_PRICE', Tools::getValue('use_pre_tax_price'));
            Configuration::updateValue('TABLERATESHIPPING_CSV_SEPARATOR', Tools::getValue('csv_separator'));

            $this->carrier_ids = Tools::getValue('carrier_id');
            $this->condition_name = Tools::getValue('condition_name');
            $this->updateConditionLabels();
            $this->use_pre_tax_price = Tools::getValue('use_pre_tax_price');
            $this->csv_separator = Tools::getValue('csv_separator');

            CarrierTableRate::setCarrierForTableRate($this->carrier_ids, $this->name);
            CarrierTableRate::deleteUnwanted($this->carrier_ids);

            $this->post_success[] = $this->l('Shipping details updated');
        }
    }

    private function postCSVUpload()
    {
        $path = _PS_ADMIN_DIR_.'/import/'.date('YmdHis').'-';
        if (isset($_FILES['file']) && !empty($_FILES['file']['error'])) {
            switch ($_FILES['file']['error']) {
                case UPLOAD_ERR_INI_SIZE:
                    $this->post_error[] = Tools::displayError('The uploaded file exceeds the upload_max_filesize directive in php.ini.
					If your server configuration allows it, you may add a directive in your .htaccess');
                    break;
                case UPLOAD_ERR_FORM_SIZE:
                    $this->post_error[] = Tools::displayError('The uploaded file exceeds the post_max_size directive in php.ini.
					If your server configuration allows it, you may add a directive in your .htaccess, for example:')
                        .'<br/><a href="'.$this->context->link->getAdminLink('AdminMeta').'" >
					<code>php_value post_max_size 20M</code> '.
                        Tools::displayError('(click to open "Generators" page)').'</a>';
                    break;
                case UPLOAD_ERR_PARTIAL:
                    $this->post_error[] = Tools::displayError('The uploaded file was only partially uploaded');
                    break;
                case UPLOAD_ERR_NO_FILE:
                    $this->post_error[] = Tools::displayError('No file was uploaded');
                    break;
            }
        } elseif (!preg_match('/.*\.csv$/i', $_FILES['file']['name'])) {
            $this->post_error[] = $this->l('The extension of your file should be .csv');
        } elseif (!file_exists($_FILES['file']['tmp_name'])
            || !move_uploaded_file($_FILES['file']['tmp_name'], $path.$_FILES['file']['name'])
        ) {
            $this->post_error[] = $this->l('An error occurred while uploading/copying the file');
        } else {
            chmod($path.$_FILES['file']['name'], 0664);
            $import_result = CarrierTableRate::importCSV($path.$_FILES['file']['name'],
                $this->csv_separator, $this->selected_carrrier_id, $this->condition_name);

            if ($import_result['status'] == 0) {
                $this->post_error[] = $import_result['msg'];
            } else {
                if ($import_result['status'] == 1) {
                    $this->post_success[] = $import_result['msg'];
                } else {
                    $this->post_warning[] = $import_result['msg'];
                }
            }
        }
    }

    private function postDeleteSelected()
    {
        CarrierTableRate::bulkDelete(Tools::getValue('tableRateBox'));
        $this->post_success[] = $this->l('Rates deleted successfully');
    }

    private function postSaveRate()
    {
        $this->id_carrier_table_rate = Tools::getValue('id_carrier_table_rate', '');
        $this->zone_id = Tools::getValue('zone_id', '');
        $this->country_id = Tools::getValue('country_id', '');
        $this->state_id = Tools::getValue('state_id', '');
        $this->city = Tools::getValue('city', '');
        $this->zip_from = Tools::getValue('zip_from', '');
        $this->zip_to = Tools::getValue('zip_to', '');
        $this->condition_from = Tools::getValue('condition_from', '0');
        $this->condition_to = Tools::getValue('condition_to', '0');
        $this->price = Tools::getValue('price', '0');
        $this->comment = Tools::getValue('comment', '');

        $table_rate_shipping = new CarrierTableRate($this->id_carrier_table_rate);
        $table_rate_shipping->id_carrier = $this->selected_carrrier_id;
        $table_rate_shipping->id_zone = $this->zone_id;
        $table_rate_shipping->id_country = $this->country_id;
        $table_rate_shipping->id_state = $this->state_id;
        $table_rate_shipping->dest_city = (($this->city == '*') ? '' : $this->city);
        $table_rate_shipping->dest_zip_from = (($this->zip_from == '*') ? '' : $this->zip_from);
        $table_rate_shipping->dest_zip_to = (($this->zip_to == '*') ? '' : $this->zip_to);
        $table_rate_shipping->condition_name = $this->condition_name;
        $table_rate_shipping->condition_value_from = $this->condition_from;
        $table_rate_shipping->condition_value_to = $this->condition_to;
        $table_rate_shipping->price = $this->price;
        $table_rate_shipping->comment = $this->comment;

        $valid_fields = $table_rate_shipping->validateFields(false, true);

        if ($valid_fields == 1) {
            try {
                $table_rate_shipping->save();
                $this->post_success[] = $this->l('Rate saved successfully');
            } catch (Exception $e) {
                $this->post_error[] = $this->l('Same entry already exists');
            }
        } else {
            $this->post_error[] = $valid_fields;
        }
    }

    private function postActions()
    {
        switch (Tools::getValue('action')) {
            case 'edit':
                $carrier_table_rate = new CarrierTableRate((int)Tools::getValue('id_carrier_table_rate'));
                $table_rate = $carrier_table_rate->getTableRate((int)Tools::getValue('id_carrier_table_rate'),
                    $this->context->language->id);

                $this->id_carrier_table_rate = $table_rate['id_carrier_table_rate'];
                $this->selected_carrrier_id = $table_rate['id_carrier'];
                $this->zone_id = $table_rate['id_zone'];
                $this->country_id = $table_rate['id_country'];
                $this->state_id = $table_rate['id_state'];
                $this->city = $table_rate['dest_city'];
                $this->zip_from = $table_rate['dest_zip_from'];
                $this->zip_to = $table_rate['dest_zip_to'];
                $this->condition_from = $table_rate['condition_value_from'];
                $this->condition_to = $table_rate['condition_value_to'];
                $this->price = $table_rate['price'];
                $this->comment = $table_rate['comment'];

                break;
            case 'deleteit':
                $carrier_table_rate = new CarrierTableRate((int)Tools::getValue('id_carrier_table_rate'));
                $carrier_table_rate->delete();
                $this->post_success[] = $this->l('Rate deleted successfully');

                break;
            case 'deleteall':
                CarrierTableRate::bulkDelete(array(), true, $this->selected_carrrier_id, $this->condition_name);
                $this->post_success[] = $this->l('All rates deleted successfully');

                break;
        }
    }

    private function displayHeader()
    {
        $this->context->smarty->assign(array(
            'post_success_count' => count($this->post_success),
            'post_success' => implode('<br />', $this->post_success),
            'post_warning_count' => count($this->post_warning),
            'post_warning' => implode('<br />', $this->post_warning),
            'post_error_count' => count($this->post_error),
            'post_error' => implode('<br />', $this->post_error)
        ));

        $this->html .= $this->display(__FILE__, 'views/templates/admin/header.tpl');
    }

    private function displayShipDetails()
    {
        $carriers = Carrier::getCarriers($this->context->language->id, true, false, false, null, ALL_CARRIERS);
        $overridden_carriers = array();

        $overridden_carriers[] = array(
            'id_carrier' => '',
            'name' => $this->l('-- Select Carrier --'),
            'delay' => ''
        );
        if (is_array($this->carrier_ids)) {
            foreach ($carriers as $carrier) {
                if (in_array($carrier['id_carrier'], $this->carrier_ids)) {
                    $overridden_carriers[] = $carrier;
                }
            }
        }

        $this->context->smarty->assign(array(
            'module_name' => $this->name,
            'token' => Tools::getValue('token'),
            'selected_carrrier_id' => $this->selected_carrrier_id,
            'carrier_dropdown' => $this->getCarriersDropDown('carrier_id[]', $carriers,
                Tools::getValue('carrier_id', $this->carrier_ids), true, 'carrier_id'),
            'condition_name' => Tools::getValue('condition_name', $this->condition_name),
            'use_pre_tax_price' => Tools::getValue('use_pre_tax_price', $this->use_pre_tax_price),
            'csv_separator' => htmlentities(Tools::getValue('csv_separator', $this->csv_separator), ENT_COMPAT,
                'UTF-8'),
            'select_carrier_dropdown' => $this->getCarriersDropDown('selected_carrrier_id', $overridden_carriers,
                Tools::getValue('selected_carrrier_id', $this->selected_carrrier_id), false)
        ));

        $this->html .= $this->display(__FILE__, 'views/templates/admin/shipping-details.tpl');
    }

    private function displayRateTable()
    {
        if (Tools::getValue('selected_carrrier_id', false) == false) {
            return;
        }

        $pagination = new ZebraPagination();

        $records_per_page = 15;
        $pagination->padding(false);
        $pagination->labels($this->l('Previous page'), $this->l('Next page'));
        $pagination->records(CarrierTableRate::getNumRows($this->selected_carrrier_id, $this->condition_name));
        $pagination->recordsPerPage($records_per_page);

        $carrier_table_rate = new CarrierTableRate();
        $table_rates = $carrier_table_rate->getTableRates($this->context->language->id, $this->selected_carrrier_id,
            $this->condition_name,
            true, $records_per_page, ($pagination->getPage() - 1) * $records_per_page, 'ct.id_carrier_table_rate',
            'ASC');

        $this->context->smarty->assign(array(
            'module_name' => $this->name,
            'token' => Tools::getValue('token'),
            'condition_name' => $this->condition_name,
            'path_uri' => $this->getPathUri(),
            'getstates_token' => Tools::substr(Tools::encrypt('tablerateshipping/getstates'), 0, 10),
            'csv_separator' => $this->csv_separator,
            'label_condition_from' => $this->label_condition_from,
            'label_condition_to' => $this->label_condition_to,
            'selected_carrrier_id' => $this->selected_carrrier_id,
            'table_rates' => $table_rates,
            'pagination' => $pagination->render(true)
        ));

        $this->html .= $this->display(__FILE__, 'views/templates/admin/table-rates.tpl');
    }

    private function displayAddNewRate()
    {
        if (Tools::getValue('selected_carrrier_id', false) == false) {
            return;
        }

        $zones = Zone::getZones();
        $countries = Country::getCountries($this->context->language->id);

        $this->context->smarty->assign(array(
            'module_name' => $this->name,
            'action' => ((Tools::getValue('action', false) == 'edit') ? 'edit' : 'addnew'),
            'selected_carrrier_id' => $this->selected_carrrier_id,
            'zones' => $zones,
            'countries' => $countries,
            'label_condition_from' => $this->label_condition_from,
            'label_condition_to' => $this->label_condition_to
        ));

        $this->html .= $this->display(__FILE__, 'views/templates/admin/addnew-rate.tpl');
    }

    private function displayfooter()
    {
        $this->context->smarty->assign(array(
            'module_name' => $this->name,
            'display_name' => $this->displayName,
            'version' => $this->version,
            'token' => Tools::getValue('token'),
            'country_id' => $this->country_id,
            'state_id' => $this->state_id,
            'path_uri' => $this->getPathUri(),
            'page' => Tools::getValue('page', false),
            'getstates_token' => Tools::substr(Tools::encrypt('tablerateshipping/getstates'), 0, 10)
        ));

        $this->html .= $this->display(__FILE__, 'views/templates/admin/footer.tpl');
    }

    private function getCarriersDropDown(
        $name = '',
        $carriers = array(),
        $selected = '',
        $multiple = false,
        $id = false,
        $class = false
    ) {
        $html = '<select class="form-control" name="'.$name.'"'.(($multiple) ? ' multiple="multiple"' : '').'
			'.(($id) ? ' id="'.$id.'"' : '').''.(($class) ? ' class="'.$class.'"' : '').'>';

        foreach ($carriers as $carrier) {
            $is_selected = ((is_array($selected)) ? ((in_array($carrier['id_carrier'], $selected)) ?
                ' selected="selected"' : '') : (($carrier['id_carrier'] == $selected) ? ' selected="selected"' : ''));
            $delay = (($carrier['delay'] != '') ? ' ('.$carrier['delay'].')' : '');

            $html .= '<option'.$is_selected.' value="'.$carrier['id_carrier'].'">'.$carrier['name'].$delay.'</option>';
        }

        $html .= '</select>';

        return $html;
    }

    public function hookDisplayBackOfficeHeader()
    {
        if (strcasecmp(Tools::getValue('controller'), 'AdminModules') != 0
            || strcasecmp(Tools::getValue('configure'), $this->name) != 0
        ) {
            return;
        }

        $this->context->controller->addJquery();

        if (!$this->bootstrap) {
            $this->context->controller->addCSS($this->_path.'views/css/bootstrap.min.css');
            $this->context->controller->addCSS($this->_path.'views/css/reset-old.css');

            $this->context->controller->addJquery();
            $this->context->controller->addJS($this->_path.'views/js/bootstrap.min.js');
        }

        $this->context->controller->addCSS($this->_path.'views/css/style.css');

        $this->context->controller->addJS($this->_path.'views/js/back.js');
    }

    public function hookupdateCarrier($params)
    {
        if (in_array((int)$params['id_carrier'], $this->carrier_ids)) {
            $key = array_search((int)$params['id_carrier'], $this->carrier_ids);
            $this->carrier_ids[$key] = (int)$params['carrier']->id;

            Configuration::updateValue('TABLERATESHIPPING_CARRIER_ID', serialize($this->carrier_ids));

            CarrierTableRate::updateIdCarrier((int)$params['id_carrier'], (int)$params['carrier']->id);
            CarrierTableRate::setCarrierForTableRate($this->carrier_ids, $this->name);
        }
    }

    public function getOrderShippingCost($cart, $shipping_cost)
    {
        return $this->calculateShippingPrice($cart, $shipping_cost);
    }

    public function getOrderShippingCostExternal($cart)
    {
        return $this->calculateShippingPrice($cart);
    }

    private function calculateShippingPrice($cart, $shipping_cost = 0)
    {
        if (in_array($this->id_carrier, $this->carrier_ids)) {
            $address = new Address($cart->id_address_delivery, $this->context->language->id);

            $zone_id = Address::getZoneById($cart->id_address_delivery);
            $country_id = $address->id_country;
            $state_id = $address->id_state;
            $city = $address->city;
            $zip = $address->postcode;
            $shipping_details = false;

            $cart_products = $cart->getProducts();
            $tv = 0;

            foreach ($cart_products as $cart_product) {
                $width = $cart_product['width'];
                $height = $cart_product['height'];
                $depth = $cart_product['depth'];
                $quantity = $cart_product['cart_quantity'];

                $tv += $width * $height * $depth * $quantity;
            }

            $vars = array(
                'tw' => $cart->getTotalWeight(),
                'tp' => $cart->getOrderTotal(($this->use_pre_tax_price === 'no') ? true : false, Cart::ONLY_PRODUCTS,
                    $cart->getProducts()),
                'tq' => $cart->nbProducts(),
                'tv' => $tv,
            );

            switch ($this->condition_name) {
                case 'weight':
                    $vars['cv'] = $vars['tw'];
                    $shipping_details = CarrierTableRate::getShippingPrice($this->id_carrier, $zone_id, $country_id,
                        $state_id, $city,
                        $zip, $this->condition_name, $vars['cv']);
                    break;
                case 'price':
                    $vars['cv'] = $vars['tp'];
                    $shipping_details = CarrierTableRate::getShippingPrice($this->id_carrier, $zone_id, $country_id,
                        $state_id, $city,
                        $zip, $this->condition_name, $vars['cv']);
                    break;
                case 'quantity':
                    $vars['cv'] = $vars['tq'];
                    $shipping_details = CarrierTableRate::getShippingPrice($this->id_carrier, $zone_id, $country_id,
                        $state_id, $city,
                        $zip, $this->condition_name, $vars['cv']);
                    break;
                case 'volume':
                    $vars['cv'] = $vars['tv'];
                    $shipping_details = CarrierTableRate::getShippingPrice($this->id_carrier, $zone_id, $country_id,
                        $state_id, $city,
                        $zip, $this->condition_name, $vars['cv']);
                    break;
            }

            if ($shipping_details === false) {
                return false;
            }

            $vars = array_merge($vars, array(
                'cvf' => $shipping_details['condition_value_from'],
                'cvt' => $shipping_details['condition_value_to'],
                'cvi' => $vars['cv'] - $shipping_details['condition_value_from'],
                // 'c' is depricated use 'cvi' instead
                'c' => $vars['cv'] - $shipping_details['condition_value_from'],
            ));

            $eqparser = new EqParser();

            try {
                $shipping_price = $eqparser->solveIF($shipping_details['price'], $vars);
            } catch (Exception $e) {
                return false;
            }

            return ($shipping_cost + $shipping_price) * $this->context->currency->conversion_rate;
        }

        return false;
    }
}