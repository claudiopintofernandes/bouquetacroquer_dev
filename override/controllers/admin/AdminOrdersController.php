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
class AdminOrdersController extends AdminOrdersControllerCore
{
	/*
	* module: eydatepicker
	* date: 2015-10-19 08:18:43
	* version: 4.3.1
	*/
	public function __construct()
	{
		parent::__construct();
		$this->_select .= ', di.shipping_date, di.shipping_hour';
		$this->_join .= 'LEFT JOIN `'._DB_PREFIX_.'eydpckr_delivery_info` di ON (di.`id_order` = a.`id_order` AND di.`id_cart` = a.`id_cart`)';
		$this->fields_list['shipping_date'] = array('title' => $this->l('Shipping Date'), 'width' => 80, 'align' => 'right', 'type' => 'date', 'filter_key' => 'di!shipping_date');
		$this->fields_list['shipping_hour'] = array('title' => $this->l('Shipping Hour'), 'width' => 80, 'align' => 'right', 'type' => 'text', 'filter_key' => 'di!shipping_hour');
	}
}
