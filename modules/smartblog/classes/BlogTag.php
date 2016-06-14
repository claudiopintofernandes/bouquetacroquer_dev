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

class BlogTag extends ObjectModel
{
	public $id_tag;
	public $id_lang;
	public $name;

	public static $definition = array('table' => 'smart_blog_tag', 'primary' => 'id_tag', 'multilang' => false, 'fields' => array('id_tag' => array('type' => self::TYPE_BOOL, 'validate' => 'isunsignedInt'), 'id_lang' => array('type' => self::TYPE_INT, 'validate' => 'isunsignedInt'), 'name' => array('type' => self::TYPE_STRING, 'validate' => 'isString')),);

	public static function tagExists($tag, $id_lang = null)
	{
		if ($id_lang == null) $id_lang = (int)Context::getContext()->language->id;

		$sql = 'SELECT id_tag FROM '._DB_PREFIX_.'smart_blog_tag WHERE id_lang='.$id_lang.' AND name="'.$tag.'"';

		if (! $posts = Db::getInstance()->executeS($sql)) return false;
		return $posts[0]['id_tag'];
	}
}