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
	$settings = null;
}

/* load model */
require($settings['root_path_models'].'Restricteddays.php');
$restricteddaysModel = new Restricteddays;

switch (Tools::getValue('action'))
{
	case 'update':
		$restricteddaysModel->id = (int)Tools::getValue('pk');
		$restricteddaysModel->updateField(Tools::getValue('name'), Tools::getValue('value'));
		echo 1;
		exit;
		break;
	case 'new':
		$restricteddaysModel->insert(array(
			'description' => pSQL(Tools::getValue('description')),
			'day' => (int)Tools::getValue('day'),
			'month' => (int)Tools::getValue('month'),
			'active' => (int)Tools::getValue('active')
		));
		echo 1;
		exit;
	case 'delete':
		$restricteddaysModel->id = (int)Tools::getValue('id');
		$restricteddaysModel->delete();
		echo 1;
		exit;
}

$data = $restricteddaysModel->getData();

$smarty->assign('data', $data);
$smarty->display(realpath(dirname(__FILE__).'/../views/templates').'/admin/restricteddays.tpl');

