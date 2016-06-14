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

class BlogImageType extends ObjectModel
{
	public $id_smart_blog_imagetype;
	public $type_name;
	public $width;
	public $height;
	public $type;
	public $active = 1;

	public static $definition = array('table' => 'smart_blog_imagetype', 'primary' => 'id_smart_blog_imagetype', 'multilang' => false, 'fields' => array('width' => array('type' => self::TYPE_INT, 'validate' => 'isunsignedInt', 'required' => true), 'height' => array('type' => self::TYPE_INT, 'validate' => 'isunsignedInt', 'required' => true), 'type_name' => array('type' => self::TYPE_STRING, 'validate' => 'isString', 'required' => true), 'type' => array('type' => self::TYPE_STRING, 'validate' => 'isString', 'required' => true), 'active' => array('type' => self::TYPE_BOOL, 'validate' => 'isBool', 'required' => true),),);

	public static function getImageAllType($type)
	{
		$img_type = Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS('
                                    SELECT * FROM `'._DB_PREFIX_.'smart_blog_imagetype` where `active` = 1 and `type` = "'.$type.'"');
		return $img_type;
	}

	public static function getImageAll()
	{
		$img_type = Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS('
                                    SELECT * FROM `'._DB_PREFIX_.'smart_blog_imagetype` where active = 1');
		return $img_type;
	}

	public static function getImageByType($type_name)
	{
		$img_type = Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS('
                                    SELECT * FROM `'._DB_PREFIX_.'smart_blog_imagetype` where active = 1 and type_name = "'.$type_name.'"');
		return $img_type;
	}

	public static function imageGenerate()
	{
		$get_blog_image = SmartBlogPost::getBlogImage();
		$get_cate_image = BlogCategory::getCatImage();
		$get_author_image = _PS_MODULE_DIR_.'smartblog/images/avatar/avatar.jpg';
		$category_types = BlogImageType::getImageAllType('Category');
		$posts_types = BlogImageType::getImageAllType('post');
		$author_types = BlogImageType::getImageAllType('Author');

		foreach ($category_types as $image_type)
		{
			foreach ($get_cate_image as $cat_img)
			{
				$path = _PS_MODULE_DIR_.'smartblog/images/category/'.$cat_img['id_smart_blog_category'].'.jpg';
				ImageManager::resize($path, _PS_MODULE_DIR_.'smartblog/images/category/'.$cat_img['id_smart_blog_category'].'-'.Tools::stripslashes($image_type['type_name']).'.jpg', (int)$image_type['width'], (int)$image_type['height']);
			}
		}
		foreach ($posts_types as $image_type)
		{
			foreach ($get_blog_image as $blog_img)
			{

				$path = _PS_MODULE_DIR_.'smartblog/images/'.$blog_img['id_smart_blog_post'].'.jpg';
				ImageManager::resize($path, _PS_MODULE_DIR_.'smartblog/images/'.$blog_img['id_smart_blog_post'].'-'.Tools::stripslashes($image_type['type_name']).'.jpg', (int)$image_type['width'], (int)$image_type['height']);
			}
		}
		foreach ($author_types as $author_type)
			ImageManager::resize($get_author_image, _PS_MODULE_DIR_.'smartblog/images/avatar/avatar-'.Tools::stripslashes($author_type['type_name']).'.jpg', (int)$author_type['width'], (int)$author_type['height']);
	}

	public static function imageDelete()
	{
		$get_blog_image = SmartBlogPost::getBlogImage();
		//$get_author_image = __PS_BASE_URI__.'modules/smartblog/images/avatar/avatar.jpg';
		$get_cate_image = BlogCategory::getCatImage();
		$category_types = BlogImageType::getImageAllType('category');
		$posts_types = BlogImageType::getImageAllType('post');
		$author_types = BlogImageType::getImageAllType('author');
		foreach ($category_types as $image_type)
		{
			foreach ($get_cate_image as $cat_img)
			{

				$dir = _PS_MODULE_DIR_.'smartblog/images/category/'.$cat_img['id_smart_blog_category'].'-'.Tools::stripslashes($image_type['type_name']).'.jpg';
				if (file_exists($dir)) unlink($dir);
			}
		}
		foreach ($posts_types as $image_type)
		{
			foreach ($get_blog_image as $blog_img)
			{

				$dir = _PS_MODULE_DIR_.'smartblog/images/'.$blog_img['id_smart_blog_post'].'-'.Tools::stripslashes($image_type['type_name']).'.jpg';
				if (file_exists($dir)) unlink($dir);
			}
		}
		foreach ($author_types as $image_type)
		{
			$dir = _PS_MODULE_DIR_.'smartblog/images/avatar/avatar-'.Tools::stripslashes($image_type['type_name']).'.jpg';
			if (file_exists($dir)) unlink($dir);
		}
	}
}