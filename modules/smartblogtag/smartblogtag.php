<?php
/**
 * SmartBlog
 *
 * NOTICE OF LICENSE
 *
 * This source file is licensed under the OSL-3.0
 * that is bundled with this package in the file LICENSE.txt.
 *
 * @author    SmartSataSoft
 * @copyright SmartSataSoft
 * @license   Open Software License v. 3.0 (OSL-3.0)
 */

if (! defined('_PS_VERSION_')) exit;
require_once(_PS_MODULE_DIR_.'smartblog/smartblog.php');

class SmartBlogTag extends Module
{

	public function __construct()
	{
		$this->name = 'smartblogtag';
		$this->tab = 'front_office_features';
		$this->version = '2.0.1';
		$this->bootstrap = true;
		$this->author = 'SmartDataSoft';
		$this->secure_key = Tools::encrypt($this->name);

		parent::__construct();

		$this->displayName = $this->l('Smart Blog Tag');
		$this->description = $this->l('The Most Powerfull Presta shop Blog  Module\'s tag - by smartdatasoft');
		$this->confirmUninstall = $this->l('Are you sure you want to delete your details ?');
	}

	public function install()
	{
		//$langs = Language::getLanguages();
		//$id_lang = (int)Configuration::get('PS_LANG_DEFAULT');
		if (! parent::install() || ! $this->registerHook('leftColumn') || ! $this->registerHook('actionsbdeletepost') || ! $this->registerHook('actionsbnewpost') || ! $this->registerHook('actionsbupdatepost') || ! $this->registerHook('actionsbtogglepost') || ! $this->registerHook('displaySmartBlogLeft')) return false;
		Configuration::updateGlobalValue('smartshowposttag', 5);
		return true;
	}

	public function uninstall()
	{
		$this->deleteCache();
		if (! parent::uninstall()) return false;
		Configuration::deleteByName('smartshowposttag');
		return true;
	}

	public function deleteCache()
	{
		return $this->_clearCache('smartblogtag.tpl', $this->getCacheId());
	}

	public function hookLeftColumn($params)
	{
		if (Module::isInstalled('smartblog') != 1)
		{
			$this->smarty->assign(array('smartmodname' => $this->name));
			return $this->display(__FILE__, 'views/templates/front/install_required.tpl');
		}
		else
		{
			//if (!$this->isCached('smartblogtag.tpl', $this->getCacheId())) {
			$id_lang = $this->context->language->id;
			if (Configuration::get('smartshowposttag') != '' && Configuration::get('smartshowposttag') != null) $limit = Configuration::get('smartshowposttag');
			else
				$limit = 10;
			$id_lang_default = configuration::get('PS_LANG_DEFAULT');
			$sqllangdefault = 'SELECT t.id_tag, t.name, COUNT(p.id_post) AS `count` FROM '._DB_PREFIX_.'smart_blog_post_tag p INNER JOIN 
						'._DB_PREFIX_.'smart_blog_post_shop s ON p.id_post=s.id_smart_blog_post AND s.id_shop = '.(int)Context::getContext()->shop->id.' INNER JOIN 
						'._DB_PREFIX_.'smart_blog_tag t ON p.id_tag= t.id_tag where t.id_lang = '.(int)$id_lang_default.' GROUP BY t.id_tag LIMIT '.$limit;

			$sql = 'SELECT t.id_tag, t.name, COUNT(p.id_post) AS `count` FROM '._DB_PREFIX_.'smart_blog_post_tag p INNER JOIN 
						'._DB_PREFIX_.'smart_blog_post_shop s ON p.id_post=s.id_smart_blog_post AND s.id_shop = '.(int)Context::getContext()->shop->id.' INNER JOIN 
						'._DB_PREFIX_.'smart_blog_tag t ON p.id_tag= t.id_tag where t.id_lang = '.(int)$id_lang.' GROUP BY t.id_tag LIMIT '.$limit;

			$tags = Db::getInstance()->ExecuteS($sql);

			if (empty($tags)) $tags = Db::getInstance()->ExecuteS($sqllangdefault);

			$this->smarty->assign(array('tags' => $tags));
			//}
			return $this->display(__FILE__, 'views/templates/front/smartblogtag.tpl' /* , $this->getCacheId() */);
		}
	}

	public function hookRightColumn($params)
	{
		return $this->hookLeftColumn($params);
	}

	public function hookdisplaySmartBlogLeft($params)
	{
		return $this->hookLeftColumn($params);
	}

	public function hookdisplaySmartBlogRight($params)
	{
		return $this->hookLeftColumn($params);
	}

	public function getContent()
	{
		$html = '';
		if (Tools::isSubmit('save'.$this->name))
		{
			Configuration::updateValue('smartshowposttag', Tools::getvalue('smartshowposttag'));
			$html = $this->displayConfirmation($this->l('The settings have been updated successfully.'));
			$helper = $this->settingForm();
			$html .= $helper->generateForm($this->fields_form);
			return $html;
		}
		else
		{
			$helper = $this->settingForm();
			$html .= $helper->generateForm($this->fields_form);
			return $html;
		}
	}

	public function settingForm()
	{
		$default_lang = (int)Configuration::get('PS_LANG_DEFAULT');
		$this->fields_form[0]['form'] = array('legend' => array('title' => $this->l('General Setting'),), 'input' => array(array('type' => 'text', 'label' => $this->l('Number of Tag Show'), 'name' => 'smartshowposttag', 'size' => 15, 'required' => true)), 'submit' => array('title' => $this->l('Save'), 'class' => 'button'));

		$helper = new HelperForm();
		$helper->module = $this;
		$helper->name_controller = $this->name;
		$helper->token = Tools::getAdminTokenLite('AdminModules');
		$helper->currentIndex = AdminController::$currentIndex.'&configure='.$this->name;
		foreach (Language::getLanguages(false) as $lang) $helper->languages[] = array('id_lang' => $lang['id_lang'], 'iso_code' => $lang['iso_code'], 'name' => $lang['name'], 'is_default' => ($default_lang == $lang['id_lang'] ? 1 : 0));
		$helper->toolbar_btn = array('save' => array('desc' => $this->l('Save'), 'href' => AdminController::$currentIndex.'&configure='.$this->name.'&save'.$this->name.'token='.Tools::getAdminTokenLite('AdminModules'),));
		$helper->default_form_language = $default_lang;
		$helper->allow_employee_form_lang = $default_lang;
		$helper->title = $this->displayName;
		$helper->show_toolbar = true;
		$helper->toolbar_scroll = true;
		$helper->submit_action = 'save'.$this->name;

		$helper->fields_value['smartshowposttag'] = Configuration::get('smartshowposttag');
		return $helper;
	}

	public function hookactionsbdeletepost($params)
	{
		return $this->deleteCache();
	}

	public function hookactionsbnewpost($params)
	{
		return $this->deleteCache();
	}

	public function hookactionsbupdatepost($params)
	{
		return $this->deleteCache();
	}

	public function hookactionsbtogglepost($params)
	{
		return $this->deleteCache();
	}

}
