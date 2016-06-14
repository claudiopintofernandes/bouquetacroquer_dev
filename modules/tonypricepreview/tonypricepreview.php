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

if (! defined('_PS_VERSION_')) exit;

class TonyPricePreview extends Module
{
	public function __construct()
	{
		$this->name = 'tonypricepreview';
		$this->tab = 'others';
		$this->version = '1.0';
		$this->author = 'TonyTheme';
		$this->need_instance = 0;

		parent::__construct();

		$this->displayName = 'Product price preview';
		$this->description = $this->l('Product price preview');
		$this->confirmUninstall = $this->l('Are you sure you want to uninstall?');
	}

	public function install()
	{
		if (Shop::isFeatureActive()) Shop::setContext(Shop::CONTEXT_ALL);

		$ret = parent::install() && $this->registerHook('header');

		return $ret;
	}

	public function hookHeader($params)
	{
		$this->context->controller->addCSS($this->_path.'css/tipsy.css');
		$this->context->controller->addJs($this->_path.'js/jquery.tipsy.js');
		$this->context->controller->addJs($this->_path.'js/launch.js');
	}
}