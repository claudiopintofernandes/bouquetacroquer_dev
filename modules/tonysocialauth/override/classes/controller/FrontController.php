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

class FrontController extends FrontControllerCore
{
	public function init()
	{
		$context = Context::getContext();
		$cookie = & $context->cookie;

		if (Tools::getIsset(Tools::getValue('mylogout')))
		{
			require_once(_PS_MODULE_DIR_.'tonysocialauth/sdk/facebook/facebook.php');

			$facebook = new Facebook(array('appId' => Configuration::get('tonysocialauth_FB_CONNECT_APPID'), 'secret' => Configuration::get('_FB_CONNECT_APPKEY'),));
			$facebook->destroySession();

			unset($cookie->tonysocialauth_tw_access_token);
			$cookie->write;
		}

		return parent::init();
	}
}
