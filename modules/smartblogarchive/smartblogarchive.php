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

require_once(_PS_MODULE_DIR_.'smartblog/classes/SmartBlogPost.php');
require_once(_PS_MODULE_DIR_.'smartblog/smartblog.php');

class SmartBlogArchive extends Module
{

	public function __construct()
	{
		$this->name = 'smartblogarchive';
		$this->tab = 'front_office_features';
		$this->version = '2.0.1';
		$this->bootstrap = true;
		$this->author = 'SmartDataSoft';
		$this->secure_key = Tools::encrypt($this->name);

		parent::__construct();

		$this->displayName = $this->l('Smart Blog Archive');
		$this->description = $this->l('The Most Powerfull Presta shop Blog Archive Module\'s - by smartdatasoft');
		$this->confirmUninstall = $this->l('Are you sure you want to delete your details ?');
	}

	public function install()
	{
		//$langs = Language::getLanguages();
		//$id_lang = (int)Configuration::get('PS_LANG_DEFAULT');
		if (! parent::install() || ! $this->registerHook('leftColumn') || ! $this->registerHook('displaySmartBlogLeft') || ! $this->registerHook('actionsbdeletepost') || ! $this->registerHook('actionsbnewpost') || ! $this->registerHook('actionsbupdatepost') || ! $this->registerHook('actionsbtogglepost')) return false;
		return true;
	}

	public function uninstall()
	{
		$this->deleteCache();
		if (! parent::uninstall()) return false;
		return true;
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
			if (! $this->isCached('smartblogarchive.tpl', $this->getCacheId()))
			{
				$id_lang = $this->context->language->id;
				$smart_blog_post = new SmartBlogPost();
				$archives = $smart_blog_post->getArchive();
				$this->smarty->assign(array('archives' => $archives));
			}
			return $this->display(__FILE__, 'views/templates/front/smartblogarchive.tpl', $this->getCacheId());
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

	public function deleteCache()
	{
		return $this->_clearCache('smartblogarchive.tpl', $this->getCacheId());
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

	public function hookdisplaySmartBlogRight($params)
	{
		return $this->hookLeftColumn($params);
	}
}