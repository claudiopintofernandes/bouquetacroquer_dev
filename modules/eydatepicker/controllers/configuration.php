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
	$smarty = null;

if (Tools::getValue('action') == 'update')
{
    Configuration::updateValue('PSDK_CARRIERS_FILTER', serialize(Tools::getValue('PSDK_CARRIERS_FILTER')));
	Configuration::updateValue('PS_CUTOFF_HOUR', Tools::getValue('PS_CUTOFF_HOUR'));
	Configuration::updateValue('PS_HOURS_TO_PREPARE_ORDER', Tools::getValue('PS_HOURS_TO_PREPARE_ORDER'));
	Configuration::updateValue('PS_FUTURE_DAYS', Tools::getValue('PS_FUTURE_DAYS'));
	Configuration::updateValue('PS_CALENDAR_INLINE', Tools::getValue('PS_CALENDAR_INLINE'));
	Configuration::updateValue('PS_CALENDAR_REQUIRED', Tools::getValue('PS_CALENDAR_REQUIRED'));
	Configuration::updateValue('PS_FIRST_AVAILABLE_DELIVERY_DAY', Tools::getValue('PS_FIRST_AVAILABLE_DELIVERY_DAY'));
	echo 'Data has been saved';
	exit;
}

$carriers_filter = unserialize(Configuration::get('PSDK_CARRIERS_FILTER'));
if(!is_array($carriers_filter)) {
    $carriers_filter = array();
}
$smarty->assign('PSDK_CARRIERS_FILTER', $carriers_filter);

$carriers = $carriers = Carrier::getCarriers($context->language->id,false,false,false,null,ALL_CARRIERS);
$smarty->assign('carriers', $carriers);

$smarty->assign('BE_SAFE', Configuration::get('BE_SAFE'));
$smarty->assign('PS_CUTOFF_HOUR', Configuration::get('PS_CUTOFF_HOUR'));
$smarty->assign('PS_HOURS_TO_PREPARE_ORDER', Configuration::get('PS_HOURS_TO_PREPARE_ORDER'));
$smarty->assign('PS_FUTURE_DAYS', Configuration::get('PS_FUTURE_DAYS'));
$smarty->assign('PS_CALENDAR_INLINE', Configuration::get('PS_CALENDAR_INLINE'));
$smarty->assign('PS_CALENDAR_REQUIRED', Configuration::get('PS_CALENDAR_REQUIRED'));
$smarty->assign('PS_FIRST_AVAILABLE_DELIVERY_DAY', Configuration::get('PS_FIRST_AVAILABLE_DELIVERY_DAY'));

$smarty->display(realpath(dirname(__FILE__).'/../views/templates').'/admin/configuration.tpl');
