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

/* validator compatibility */
if (1 == 0)
	$smarty = null;

/* define admin just to force init admin environment */
if (!defined('_PS_ADMIN_DIR_'))
	define('_PS_ADMIN_DIR_', realpath(getcwd().'../../../admin/'));

if (!defined('PS_ADMIN_DIR'))
	define('PS_ADMIN_DIR', _PS_ADMIN_DIR_);

include_once('../../../config/config.inc.php');

/* check access */
$context = Context::getContext();

/* get shop uri */
$shop_url = ShopUrl::getShopUrls($context->shop->id)->where('main', '=', 1)->getFirst();
$shop_uri = $shop_url->physical_uri;

if (!$context->employee)
{
	$context->employee->logout();
	Tools::redirect($shop_uri.Configuration::get('PS_DPCKR_ADMIN_DIR').DS.$context->link->getAdminLink('AdminLogin'));
}

/* set up common variables */
$smarty->assign('showreg', 1);

$settings = array();
$settings['root_path_models'] = realpath(dirname(__FILE__).'/../models').'/';

require($settings['root_path_models'].'AppModel.php');

$smarty->assign('basedir', $shop_uri);
$smarty->assign('modulename', 'eydatepicker');
$smarty->assign('web_path_templates', $shop_uri.'modules/eydatepicker/views/templates/');
$smarty->assign('web_path_controllers', $shop_uri.'modules/eydatepicker/controllers/');
$smarty->assign('web_path_backoffice', $shop_uri.Configuration::get('PS_DPCKR_ADMIN_DIR').'/'.$context->link->getAdminLink('AdminModules').'&configure=dateofdelivery');

/* multishop code */
if (!(!Shop::isFeatureActive() || Shop::getTotalShops(false, null) < 2))
{
	if (Tools::getIsset('ids'))
	{
		$context->cookie->__set('ids', (int)Tools::getValue('ids'));
		$context->cookie->write();
		echo 'ok'.Tools::getValue('ids');
		exit;
	}
	Shop::setContext(Shop::CONTEXT_SHOP, (int)$context->cookie->ids);
	$smarty->assign('IS_MULTISHOP', 1);
}
else
	$smarty->assign('IS_MULTISHOP', 0);

/* get shops */
if (!(!Shop::isFeatureActive() || Shop::getTotalShops(false, null) < 2))
{
	$context_shop_id = Shop::getContextShopID(true);

	$shops = array();
	$html = '<select id="ids" name="ids">';
	$html .= '<option value="0">'.Translate::getAdminTranslation('All shops').'</option>';
	$tree = Shop::getTree();
	foreach ($tree as $gID => $group_data)
		foreach ($group_data['shops'] as $sID => $shopData)
			if ($shopData['active'])
				$html .= '<option '.($context_shop_id == $sID ? ' selected="selected" ' : '').' value="'.$sID.'">&raquo; '.
						htmlspecialchars($group_data['name']).' - '.$shopData['name'].'</option>';

	$html .= '</select>';
	$smarty->assign('shop_list_html_select', $html);
	$smarty->assign('context_shop_id', $context_shop_id);
}


$token = Tools::getAdminToken('eydatepicker'.$context->employee->id);
if ($token != Tools::getValue('token'))
{
	echo 'token missing';
	exit;
}

$smarty->assign('tokencommon', $token);
