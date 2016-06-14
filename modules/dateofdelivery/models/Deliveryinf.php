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

class Deliveryinf extends AppModel
{

	public $id;
	public $table = 'eydpckr_delivery_info';

	public function getDeliveryInfo($order_id)
	{
		$results = Db::getInstance()->getRow('SELECT * FROM '._DB_PREFIX_.$this->table.' WHERE id_order=\''.(int)$order_id.'\'');
		return $results;
	}

	public function getDeliveryInfoByCartId($cart_id)
	{
		$results = Db::getInstance()->getRow('SELECT * FROM '._DB_PREFIX_.$this->table.' WHERE id_cart=\''.(int)$cart_id.'\'');
		return $results;
	}

}
