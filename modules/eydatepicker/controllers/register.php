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
{
	$smarty = null;
	$showreg = null;
}
if ($showreg == 1)
{
	Tools::redirect(__PS_BASE_URI__.'modules/eydatepicker/controllers/admin.php');
	exit;
}

$smarty->display(realpath(dirname(__FILE__).'/../views/templates').'/admin/register.tpl');
