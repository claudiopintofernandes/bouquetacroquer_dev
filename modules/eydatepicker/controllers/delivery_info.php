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

require('common.php');
/* validator compatibility */
if (1 == 0)
	$settings = null;


/* load model */
require($settings['root_path_models'].'Deliveryinf.php');
$deliveryinfoModel = new Deliveryinf;

$deliveryinfoModel->id = (int)Tools::getValue('id');
$id_order = (int)Tools::getValue('id_order');
if ($deliveryinfoModel->id > 0)
{
	$deliveryinfoModel->updateField('shipping_date', Tools::getValue('shipping_date'));
	$deliveryinfoModel->updateField('shipping_hour', Tools::getValue('shipping_hour'));
}
else
{
	$deliveryinfoModel->insert(array(
		'id_cart' => 0,
		'id_order' => $id_order,
		'shipping_hour' => pSQL(Tools::getValue('shipping_hour')),
		'shipping_date' => pSQL(Tools::getValue('shipping_date'))
	));
}
echo 'data has been saved';
