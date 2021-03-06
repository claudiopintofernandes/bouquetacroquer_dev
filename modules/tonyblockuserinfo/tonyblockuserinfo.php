<?php
/**
 * 2007-2014 PrestaShop
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Academic Free License (AFL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/afl-3.0.php
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@prestashop.com so we can send you a copy immediately.
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade PrestaShop to newer
 * versions in the future. If you wish to customize PrestaShop for your
 * needs please refer to http://www.prestashop.com for more information.
 *
 * @author    PrestaShop SA <contact@prestashop.com>
 * @copyright PrestaShop SA
 * @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
 *  International Registered Trademark & Property of PrestaShop SA
 */

if (! defined('_PS_VERSION_')) exit;

class TonyBlockUserInfo extends Module
{

	public function __construct()
	{
		$this->name = 'tonyblockuserinfo';
		$this->tab = 'front_office_features';
		$this->version = '1.0.0';
		$this->author = 'TonyTheme';
		$this->need_instance = 0;

		parent::__construct();

		$this->displayName = $this->l('User info block');
		$this->description = $this->l('Adds a block that displays information about the customer.');
		$this->ps_versions_compliancy = array('min' => '1.6', 'max' => _PS_VERSION_);
	}

	public function install()
	{
		return (parent::install() && $this->registerHook('displayTool'));
	}

	/**
	 * Returns module content for header tool
	 *
	 * @param array $params Parameters
	 * @return string Content
	 */
	public function hookDisplayTool($params)
	{
		if (! $this->active) return;

		$this->smarty->assign(array('cart' => $this->context->cart, 'cart_qties' => $this->context->cart->nbProducts(), 'logged' => $this->context->customer->isLogged(), 'customerName' => ($this->context->customer->logged ? $this->context->customer->firstname.' '.$this->context->customer->lastname : false), 'firstName' => ($this->context->customer->logged ? $this->context->customer->firstname : false), 'lastName' => ($this->context->customer->logged ? $this->context->customer->lastname : false), 'order_process' => Configuration::get('PS_ORDER_PROCESS_TYPE') ? 'order-opc' : 'order'));
		return $this->display(__FILE__, 'views/templates/front/tonyblockuserinfo.tpl');
	}

	public function hookDisplayHeader($params)
	{
		$this->context->controller->addCSS(($this->_path).'css/style.css', 'all');
	}

}
