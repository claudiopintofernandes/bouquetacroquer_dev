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

class TonySocialAuth extends Module
{

	public function __construct()
	{
		$this->name = 'tonysocialauth';
		$this->tab = 'others';
		$this->version = '1.0';
		$this->author = 'TonyTheme';
		$this->need_instance = 0;
		$this->module_key = '39034886a62663fa5f8392c47133d42f';

		parent::__construct();

		$this->displayName = $this->l('Social networks authentication module');
		$this->description = $this->l('Lets your customers authenticate with facebook and twitter');
		$this->confirmUninstall = $this->l('Are you sure you want to uninstall?');
		//$this->ps_versions_compliancy = array('min' => '1.5');

		$this->m_fb_connect_appid = Configuration::get($this->name.'_FB_CONNECT_APPID');
		$this->fb_connect_appkey = Configuration::get($this->name.'_FB_CONNECT_APPKEY');
		$this->tw_app_key = Configuration::get($this->name.'_TW_APP_KEY');
		$this->tw_app_secret = Configuration::get($this->name.'_TW_APP_SECRET');
	}

	public function installDB()
	{
		return Db::getInstance()->execute('CREATE TABLE IF NOT EXISTS `'._DB_PREFIX_.'tonysocialauth_fb_profiles` (
  			`id_customer` int(10) unsigned,
  			`social_id` varchar(50) NOT NULL,
  			`id_shop` int(11) NOT NULL DEFAULT \'1\',
  			auth_type enum(\'facebook\',\'twitter\'),
  			PRIMARY KEY (`id_customer`),
  			KEY(social_id)
  			)
  		');
	}

	public function install()
	{
		if (Shop::isFeatureActive()) Shop::setContext(Shop::CONTEXT_ALL);

		$ret = parent::install() && $this->registerHook('header') && $this->registerHook('displayTool') && $this->installDB();

		return $ret;
	}

	public function login($email)
	{
		$customer = new Customer();

		$authentication = $customer->getByEmail(trim($email));

		if (! $authentication || ! $customer->id)
		{
			$this->errors[] = Tools::displayError($this->l('Authentication failed.'));
			return false;
		}
		else
		{
			$this->context->cookie->id_compare = isset($this->context->cookie->id_compare) ? $this->context->cookie->id_compare : CompareProduct::getIdCompareByIdCustomer($customer->id);
			$this->context->cookie->id_customer = (int)($customer->id);
			$this->context->cookie->customer_lastname = $customer->lastname;
			$this->context->cookie->customer_firstname = $customer->firstname;
			$this->context->cookie->logged = 1;
			$customer->logged = 1;
			$this->context->cookie->is_guest = $customer->isGuest();
			$this->context->cookie->passwd = $customer->passwd;
			$this->context->cookie->email = $customer->email;

			// Add customer to the context
			$this->context->customer = $customer;

			if (Configuration::get('PS_CART_FOLLOWING') && (empty($this->context->cookie->id_cart) || Cart::getNbProducts($this->context->cookie->id_cart) == 0) && $id_cart = (int)Cart::lastNoneOrderedCart($this->context->customer->id)) $this->context->cart = new Cart($id_cart);
			else
			{
				$this->context->cart->id_carrier = 0;
				$this->context->cart->setDeliveryOption(null);
				$this->context->cart->id_address_delivery = Address::getFirstCustomerAddressId((int)($customer->id));
				$this->context->cart->id_address_invoice = Address::getFirstCustomerAddressId((int)($customer->id));
			}
			$this->context->cart->id_customer = (int)$customer->id;
			$this->context->cart->secure_key = $customer->secure_key;
			$this->context->cart->save();
			$this->context->cookie->id_cart = (int)$this->context->cart->id;
			$this->context->cookie->update();
			$this->context->cart->autosetProductAddress();

			Hook::exec('actionAuthentication');

			// Login information have changed, so we check if the cart rules still apply
			CartRule::autoRemoveFromCart($this->context);
			CartRule::autoAddToCart($this->context);

			$this->success = $this->l('Facebook authorization was successfull.');
			return true;
		}
	}

	public function register($email, $socid, $soctype, $fname = '', $lname = '', $gender = '')
	{
		$id_shop = (int)Shop::getContextShopID();

		if (! Customer::customerExists($email))
		{
			$customer = new Customer();
			if ($gender == 'male') $_POST['id_gender'] = 1;
			else if ($gender == 'female') $_POST['id_gender'] = 2;
			else
				$_POST['id_gender'] = 0;
			$_POST['lastname'] = $lname;
			$_POST['firstname'] = $fname;
			$_POST['passwd'] = Tools::substr(md5(time().$lname.$fname), 0, 6);
			$_POST['email'] = $email;

			$this->errors = $customer->validateControler();

			if (! count($this->errors))
			{
				$customer->active = 1;
				if (! $customer->add())
				{
					$this->errors[] = Tools::displayError($this->l('An error occurred while creating your account'));
					return false;
				}
				else
				{
					$query = 'insert into '._DB_PREFIX_."tonysocialauth_fb_profiles set id_customer='".(int)$customer->id."',social_id='".$socid."',auth_type='$soctype',id_shop='{$id_shop}'";
					Db::getInstance()->execute($query);

					//$email_var = array('{firstname}' => $customer->firstname, '{lastname}' => $customer->lastname, '{email}' => $customer->email, '{passwd}' => '');

					//if (! Mail::Send((int)$this->context->cookie->id_lang, 'account', 'Welcome!', $email_var, $customer->email, $customer->firstname.' '.$customer->lastname))
					//$this->errors[] = Tools::displayError($this->l('Cannot send email'));

					$this->context->cookie->id_customer = (int)$customer->id;
					$this->context->cookie->customer_lastname = $customer->lastname;
					$this->context->cookie->customer_firstname = $customer->firstname;
					$this->context->cookie->passwd = $customer->passwd;
					$this->context->cookie->logged = 1;
					$this->context->cookie->email = $customer->email;

					Module::hookExec('createAccount', array('_POST' => $_POST, 'newCustomer' => $customer));

					$this->success = $this->l(($soctype == 'facebook' ? 'Facebook' : 'Twitter').' authorization was successfull.');

					return $this->login($email);
				}
			}
		}
		else
		{
			$this->errors[] = Tools::displayError($this->l('A user already exists with this email address: ').$email);
			$facebook = new Facebook(array('appId' => Configuration::get('tonysocialauth_FB_CONNECT_APPID'), 'secret' => Configuration::get('_FB_CONNECT_APPKEY'),));
			$facebook->destroySession();

			return false;
		}
	}

	public function hookDisplayTool($params)
	{
		$context = Context::getContext();
		$cookie = & $context->cookie;

		$this->context->controller->addCSS($this->_path.'css/tonysocialauth.css');
		$this->context->controller->addJS($this->_path.'js/tonysocialauth.js');

		//$id_shop = (int)Shop::getContextShopID();
		$fb_enabled = (Tools::strlen($this->m_fb_connect_appid) != 0 && Tools::strlen($this->fb_connect_appkey) != 0 && ! $this->context->customer->isLogged());
		$tw_enabled = (Tools::strlen($this->tw_app_key) != 0 && Tools::strlen($this->tw_app_secret) != 0 && ! $this->context->customer->isLogged());
		$redirect_to_my_acc = false;

		if ($tw_enabled)
		{
			require_once(_PS_MODULE_DIR_.$this->name.'/sdk/twitter/twitteroauth.php');
			require_once(_PS_MODULE_DIR_.$this->name.'/classes/class_twitter.php');

			$ret = Tools::getValue('oauth_token', false);
			if ($ret !== false)
			{
				$twitter = new Twitter($cookie->tonysocialauth_oauth_token, $cookie->tonysocialauth_oauth_secret);
				$twitter->verifyCallback();
			}
			elseif ((Tools::getValue('tonysocialauth_reg_step_2', false) !== false) && ! $this->context->customer->isLogged())
			{
				$twitter = new Twitter($cookie->tonysocialauth_oauth_token, $cookie->tonysocialauth_oauth_secret);
				if ($twitter->isAuth())
				{
					$email = Tools::getValue('email');
					$tonysocialauth_tw_data = unserialize($cookie->tonysocialauth_tw_data);

					if (Tools::strlen($email) == 0) $this->errors[] = Tools::displayError($this->l('Incorrect email address.'));
					elseif (isset($tonysocialauth_tw_data['tw_user_id']))
					{
						if ($this->register($email, $tonysocialauth_tw_data['tw_user_id'], 'twitter', $tonysocialauth_tw_data['tw_user_name'], $tonysocialauth_tw_data['tw_user_name']))
						{
							$redirect_to_my_acc = true;
							$tw_enabled = false;
							$fb_enabled = false;
						}
						else
							$redirect_to_my_acc = false;

						unset($cookie->tonysocialauth_tw_data);
						unset($cookie->tonysocialauth_tw_access_token);
						$cookie->write;
					}
					else
						$this->errors[] = Tools::displayError($this->l('Authentication failed.'));
				}
				else
					$this->errors[] = Tools::displayError($this->l('Authentication failed.'));
			}
			else
			{
				$twitter = new Twitter();
				$this->context->smarty->assign(array('tw_login_url' => $twitter->getAuthLink()));
			}


			if (! $this->context->customer->isLogged() && count($this->errors) == 0)
			{
				if ($twitter->isAuth())
				{
					$twme = $twitter->m_connection->get('account/verify_credentials');

					if (! $this->context->customer->isLogged())
					{
						$query = 'select id_customer from '._DB_PREFIX_."tonysocialauth_fb_profiles where  social_id='".$twme->id."' and auth_type='twitter'";
						$rows = Db::getInstance()->executeS($query);
						$ret = $rows[0];

						if (isset($ret['id_customer'])) //Login
						{
							$query = 'select email from '._DB_PREFIX_."customer where id_customer='{$ret['id_customer']}'";
							$rows = Db::getInstance()->executeS($query);
							$ret = $rows[0];

							if ($this->login($ret['email']))
							{
								$tw_enabled = false;
								$fb_enabled = false;

								unset($cookie->tonysocialauth_tw_data);
								unset($cookie->tonysocialauth_tw_access_token);
								$cookie->write;

								$redirect_to_my_acc = true;
							}
						}
						else //Register
						{
							$tonysocialauth_tw_data = array('tw_user_id' => $twme->id, 'tw_user_name' => $twme->name,);

							$cookie->tonysocialauth_tw_data = serialize($tonysocialauth_tw_data);

							$cookie->write();

							$js_code = '<script type="text/javascript">$(document).ready(function(){socialauth_email()});</script>';
							$this->context->smarty->assign('js_code', $js_code);
							$form = '
								<form method="post" action="'.(Tools::getHttpHost(true, true).__PS_BASE_URI__).'">
								<input type="hidden" name="tonysocialauth_reg_step_2" value="1">             
								<label style="line-height:30px !important">'.$this->l('Your email address').':</label>
								<input type="text" name="email" value="" style="margin-bottom:0px !important;" id="tonysocialauth-frm-email">
								<input type="submit" name="sbmt" value="'.$this->l('Continue').'" class="button" id="tonysocialauth-frm-sbmt">
								</form>                
							';
							$this->context->smarty->assign('result_message', $form);
						}
					}
				}
			}
		}

		if ($fb_enabled)
		{
			require_once(_PS_MODULE_DIR_.$this->name.'/sdk/facebook/facebook.php');

			$facebook = new Facebook(array('appId' => $this->m_fb_connect_appid, 'secret' => $this->fb_connect_appkey,));
			{
				$user = $facebook->getUser();

				if ($user)
				{
					try
					{
						$me = $facebook->api('/me');
					} catch (FacebookApiException $e)
					{
						error_log($e);
						$me = null;
					}
				}

				if ($me && ! $this->context->customer->isLogged())
				{
					//
					$query = 'select id_customer from '._DB_PREFIX_."tonysocialauth_fb_profiles where  social_id='{$me['id']}' and auth_type='facebook'";
					$rows = Db::getInstance()->executeS($query);
					$ret = $rows[0];

					if (isset($ret['id_customer'])) //Login
					{
						if ($this->login($me['email']))
						{
							$tw_enabled = false;
							$fb_enabled = false;

							$redirect_to_my_acc = true;
						}
					}
					else //Register
						if ($this->register($me['email'], $me['id'], 'facebook', $me['first_name'], $me['last_name'], $me['gender'])) $redirect_to_my_acc = true;
				}
				else
				{
					$params = array('scope' => 'email',);

					$this->context->smarty->assign(array('fb_login_url' => $facebook->getLoginUrl($params),));
				}
			}
		}


		$this->context->smarty->assign(array('fb_enabled' => $fb_enabled));
		$this->context->smarty->assign(array('tw_enabled' => $tw_enabled));

		$this->context->smarty->assign(array('fb_login_img' => $this->context->link->protocol_content.Tools::getMediaServer($this->name)._MODULE_DIR_.$this->name.'/img/facebook_16.png'));
		$this->context->smarty->assign(array('tw_login_img' => $this->context->link->protocol_content.Tools::getMediaServer($this->name)._MODULE_DIR_.$this->name.'/img/twitter_16.png'));

		if ($redirect_to_my_acc)
		{
			$js_code = '<script type="text/javascript">document.location.href="'.$this->context->link->getPageLink('my-account', true).'"</script>';
			$this->context->smarty->assign('js_code', $js_code);
		}
		elseif (count($this->errors))
		{
			$error_text = implode('<br />', $this->errors);
			$this->context->smarty->assign('result_message', $error_text);
			$js_code = '<script type="text/javascript">$(document).ready(function(){socialauth_error()});</script>';
			$this->context->smarty->assign('js_code', $js_code);
		}
		elseif (Tools::strlen($this->success))
		{
			$this->context->smarty->assign('result_message', $this->success);
			$js_code = '<script type="text/javascript">$(document).ready(function(){socialauth_success()});</script>';
			$this->context->smarty->assign('js_code', $js_code);
		}

		return ($this->display(__FILE__, 'views/templates/front/index.tpl'));
	}

	public function uninstall()
	{
		if (! parent::uninstall()) return false;

		return Db::getInstance()->execute('DROP TABLE `'._DB_PREFIX_.'tonysocialauth_fb_profiles`') && Configuration::deleteByName($this->name.'_FB_CONNECT_APPID') && Configuration::deleteByName($this->name.'_FB_CONNECT_APPKEY');
	}

	public function getContent()
	{
		$errors = '';
		$output = '<h2>'.$this->displayName.'</h2>';
		if (Tools::isSubmit('submitFBKey'))
		{
			$fb_connect_appid = (Tools::getValue('fb_connect_appid'));
			Configuration::updateValue($this->name.'_FB_CONNECT_APPID', $fb_connect_appid);

			$fb_connect_appkey = (Tools::getValue('fb_connect_appkey'));
			Configuration::updateValue($this->name.'_FB_CONNECT_APPKEY', $fb_connect_appkey);

			$tw_app_key = (Tools::getValue('tw_app_key'));
			Configuration::updateValue($this->name.'_TW_APP_KEY', $tw_app_key);

			$tw_app_secret = (Tools::getValue('tw_app_secret'));
			Configuration::updateValue($this->name.'_TW_APP_SECRET', $tw_app_secret);
			if (isset($errors) && $errors) $output .= $this->displayError(implode('<br />', $errors));
			else
				$output .= $this->displayConfirmation($this->l('Settings updated'));
		}
		return $output.$this->displayForm();
	}

	public function displayForm()
	{
		$output = '
			<style>
			.comments{font-size:11px;}
			</style>
			<form action="'.$_SERVER['REQUEST_URI'].'" method="post">
				<fieldset><legend><img src="'.$this->_path.'logo.gif" alt="" title="" />'.$this->l('Settings').'</legend>
					<label>'.$this->l('Facebook AppID').'</label>
					<div class="margin-form">
						<input type="text" size="100" name="fb_connect_appid" value="'.Tools::getValue('fb_connect_appid', Configuration::get($this->name.'_FB_CONNECT_APPID')).'" />
					</div>

					<label>'.$this->l('Facebook App Key').'</label>
					<div class="margin-form">
						<input type="text" size="100" name="fb_connect_appkey" value="'.Tools::getValue('fb_connect_appkey', Configuration::get($this->name.'_FB_CONNECT_APPKEY')).'" />
						<div class="comments">How get Application Id and Secret Key - <a href="http://youtu.be/aRAFrVF_hKQ" target="_blank">http://youtu.be/aRAFrVF_hKQ</a></div>
					</div>


					<label>'.$this->l('Twitter App Key').'</label>
					<div class="margin-form">
						<input type="text" size="100" name="tw_app_key" value="'.Tools::getValue('tw_app_key', Configuration::get($this->name.'_TW_APP_KEY')).'" />
					</div>
					<label>'.$this->l('Twitter App Secret').'</label>
					<div class="margin-form">
						<input type="text" size="100" name="tw_app_secret" value="'.Tools::getValue('tw_app_secret', Configuration::get($this->name.'_TW_APP_SECRET')).'" />
						<div class="comments">How get Consumer key and Consumer secret  - <a href="http://youtu.be/1wHs7HsOOE4" target="_blank">http://youtu.be/1wHs7HsOOE4</a></div>
					</div>
					<input type="submit" name="submitFBKey" value="'.$this->l('Save').'" class="button" />
				</fieldset>
			</form>
		';
		return $output;
	}

}
