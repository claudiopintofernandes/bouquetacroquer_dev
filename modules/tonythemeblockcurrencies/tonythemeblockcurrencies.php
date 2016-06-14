<?php
/**
 * TonyTheme
 *
 * NOTICE OF LICENSE
 *
 * This source file is licensed under the OSL-3.0
 * that is bundled with this package in the file LICENSE.txt.
 *
 * @author    TonyTheme
 * @copyright TonyTheme
 * @license   Open Software License v. 3.0 (OSL-3.0)
 */

if (!defined('_PS_VERSION_'))
	exit;

class TonyThemeBlockCurrencies extends Module
{

	public function __construct()
	{
		$this->name = 'tonythemeblockcurrencies';
		$this->tab = 'front_office_features';
		$this->version = 0.1;
		$this->author = 'TonyTheme';
		$this->need_instance = 0;
		$this->module_key = '39034886a62663fa5f8392c47133d42f';

		parent::__construct();

		$this->displayName = $this->l('Currency block');
		$this->description = $this->l('Adds a block allowing customers to choose their preferred shopping currency.');
	}

	public function install()
	{
		return parent::install() && $this->registerHook('displayTool');
	}

	private function prepareHook($params)
	{
		if (Configuration::get('PS_CATALOG_MODE'))
			$this->smarty->assign('no_selector', 1);
		else
			$this->smarty->assign('no_selector', 0);

		$this->smarty->assign('blockcurrencies_sign', $this->context->currency->sign);

		return true;
	}

	/**
	 * Returns module content for header tool
	 *
	 * @param array $params Parameters
	 * @return string Content
	 */
	public function hookDisplayTool($params)
	{
		if ($this->prepareHook($params))
			return $this->display(__FILE__, 'views/templates/front/index.tpl');
	}

}
