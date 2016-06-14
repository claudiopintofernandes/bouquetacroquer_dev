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

class SmartBlogModuleFrontController extends ModuleFrontController
{
	public function initContent()
	{
		parent::initContent();
		if (Tools::getvalue('id_category') && Tools::getvalue('id_category') != null)
			$this->context->smarty->assign(BlogCategory::getMetaByCategory(Tools::getvalue('id_category')));
		if (Tools::getvalue('id_post') && Tools::getvalue('id_post') != null)
			$this->context->smarty->assign(SmartBlogPost::getPostMetaByPost(Tools::getvalue('id_post')));
		if (Tools::getvalue('id_category') == null && Tools::getvalue('id_post') == null)
		{
			$meta = array();
			$meta['meta_title'] = Configuration::get('smartblogmetatitle');
			$meta['meta_description'] = Configuration::get('smartblogmetadescrip');
			$meta['meta_keywords'] = Configuration::get('smartblogmetakeyword');
			$this->context->smarty->assign($meta);
		}
		if (Configuration::get('smartshowcolumn') == 0)
			$this->context->smarty->assign(array('HOOK_LEFT_COLUMN' => Hook::exec('displaySmartBlogLeft'), 'HOOK_RIGHT_COLUMN' => Hook::exec('displaySmartBlogRight')));
		elseif (Configuration::get('smartshowcolumn') == 1)
			$this->context->smarty->assign(array('HOOK_LEFT_COLUMN' => Hook::exec('displaySmartBlogLeft')));
		elseif (Configuration::get('smartshowcolumn') == 2)
			$this->context->smarty->assign(array('HOOK_RIGHT_COLUMN' => Hook::exec('displaySmartBlogRight')));
		elseif (Configuration::get('smartshowcolumn') == 3)
			$this->context->smarty->assign(array());
		else
			$this->context->smarty->assign(array('HOOK_LEFT_COLUMN' => Hook::exec('displaySmartBlogLeft'), 'HOOK_RIGHT_COLUMN' => Hook::exec('displaySmartBlogRight')));
	}
}