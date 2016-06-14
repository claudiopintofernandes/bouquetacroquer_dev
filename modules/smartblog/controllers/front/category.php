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

include_once(dirname(__FILE__).'/../../classes/controllers/FrontController.php');

class SmartBlogCategoryModuleFrontController extends SmartblogModuleFrontController
{
	public $ssl = true;
	public $smart_blog_category;

	public function init()
	{
		parent::init();
	}

	public function initContent()
	{
		parent::initContent();
		$category_status = '';
		$totalpages = '';
		$cat_image = 'no';
		$categoryinfo = '';
		$title_category = '';
		$cat_link_rewrite = '';
		$blogcomment = new Blogcomment();
		$smart_blog_post = new SmartBlogPost();
		$blog_category = new BlogCategory();
		$blog_post_category = new BlogPostCategory();
		//$id_category = Tools::getvalue('id_category');
		$posts_per_page = Configuration::get('smartpostperpage');
		$limit_start = 0;
		$limit = $posts_per_page;
		if (! $id_category = Tools::getvalue('id_category'))
			$total = $smart_blog_post->getToltal($this->context->language->id);
		else
		{
			$total = $smart_blog_post->getToltalByCategory($this->context->language->id, $id_category);
			Hook::exec('actionsbcat', array('id_category' => Tools::getvalue('id_category')));
		}
		if ($total != '' || $total != 0) $totalpages = ceil($total / $posts_per_page);
		if ((boolean)Tools::getValue('page'))
		{
			$c = Tools::getValue('page');
			$limit_start = $posts_per_page * ($c - 1);
		}
		if (! $id_category = Tools::getvalue('id_category'))
			$all_news = $smart_blog_post->getAllPost($this->context->language->id, $limit_start, $limit);
		else
		{
			if (file_exists(_PS_MODULE_DIR_.'smartblog/images/category/'.$id_category.'.jpg'))
				$cat_image = $id_category;
			else
				$cat_image = 'no';
			$categoryinfo = $blog_category->getNameCategory($id_category);
			$title_category = $categoryinfo[0]['meta_title'];
			$category_status = $categoryinfo[0]['active'];
			$cat_link_rewrite = $categoryinfo[0]['link_rewrite'];
			if ($category_status == 1)
				$all_news = $blog_post_category->getToltalByCategory($this->context->language->id, $id_category, $limit_start, $limit);
			elseif ($category_status == 0)
				$all_news = '';
		}
		$i = 0;
		if (! empty($all_news))
		{
			$to = array();
			foreach ($all_news as $item)
			{
				$to[$i] = $blogcomment->getToltalComment($item['id_post']);
				$i ++;
			}
			$j = 0;
			foreach ($to as $item)
			{
				if ($item == '')
					$all_news[$j]['totalcomment'] = 0;
				else
					$all_news[$j]['totalcomment'] = $item;
				$j ++;
			}
		}

		$this->context->smarty->assign(array('postcategory' => $all_news, 'category_status' => $category_status, 'title_category' => $title_category, 'cat_link_rewrite' => $cat_link_rewrite, 'id_category' => $id_category, 'cat_image' => $cat_image, 'categoryinfo' => $categoryinfo, 'smartshowauthorstyle' => Configuration::get('smartshowauthorstyle'), 'smartshowauthor' => Configuration::get('smartshowauthor'), 'limit' => isset($limit) ? $limit : 0, 'limit_start' => isset($limit_start) ? $limit_start : 0, 'c' => isset($c) ? $c : 1, 'total' => $total, 'smartblogliststyle' => Configuration::get('smartblogliststyle'), 'smartcustomcss' => Configuration::get('smartcustomcss'), 'smartshownoimg' => Configuration::get('smartshownoimg'), 'smartdisablecatimg' => Configuration::get('smartdisablecatimg'), 'smartshowviewed' => Configuration::get('smartshowviewed'), 'post_per_page' => $posts_per_page, 'pagenums' => $totalpages - 1, 'totalpages' => $totalpages));

		$template_name = 'postcategory.tpl';

		$this->setTemplate($template_name);
	}
}