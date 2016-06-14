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

class AdminBlogCategoryController extends AdminController
{

	public $module;

	public function __construct()
	{
		$this->table = 'smart_blog_category';
		$this->className = 'BlogCategory';
		$this->module = 'smartblog';
		$this->lang = true;
		$this->bootstrap = true;
		$this->need_instance = 0;
		$this->context = Context::getContext();
		if (Shop::isFeatureActive()) Shop::addTableAssociation($this->table, array('type' => 'shop'));
		parent::__construct();
		$this->fields_list = array('id_smart_blog_category' => array('title' => $this->l('Id'), 'width' => 100, 'type' => 'text',), 'meta_title' => array('title' => $this->l('Title'), 'width' => 440, 'type' => 'text', 'lang' => true), 'active' => array('title' => $this->l('Status'), 'width' => '70', 'align' => 'center', 'active' => 'status', 'type' => 'bool', 'orderby' => false));

		$this->_join = 'LEFT JOIN '._DB_PREFIX_.'smart_blog_category_shop sbs ON a.id_smart_blog_category=sbs.id_smart_blog_category && sbs.id_shop IN('.implode(',', Shop::getContextListShopID()).')';

		$this->_select = 'sbs.id_shop';
		$this->defaultOrderBy = 'a.id_smart_blog_category';
		$this->defaultorderWay = 'DESC';

		if (Shop::isFeatureActive() && Shop::getContext() != Shop::CONTEXT_SHOP)
			$this->_group = 'GROUP BY a.id_smart_blog_category';

		parent::__construct();
	}

	public function renderForm()
	{
		$img_desc = '';
		$img_desc .= $this->l('Upload a Avatar from your computer.<br/>N.B : Only jpg image is allowed');
		if (Tools::getvalue('id_smart_blog_category') != '' && Tools::getvalue('id_smart_blog_category') != null)
			$img_desc .= '<br/><img style="height:auto;width:300px;clear:both;border:1px solid black;" alt="" src="'.__PS_BASE_URI__.'modules/smartblog/images/category/'.Tools::getvalue('id_smart_blog_category').'.jpg" /><br />';
		$this->fields_form = array('legend' => array('title' => $this->l('Blog Category'),), 'input' => array(array('type' => 'text', 'label' => $this->l('Meta Title'), 'name' => 'meta_title', 'size' => 60, 'required' => true, 'desc' => $this->l('Enter Your Category Name'), 'lang' => true,), array('type' => 'textarea', 'label' => $this->l('Description'), 'name' => 'description', 'lang' => true, 'rows' => 10, 'cols' => 62, 'class' => 'rte', 'autoload_rte' => true, 'required' => false, 'desc' => $this->l('Enter Your Category Description')), array('type' => 'file', 'label' => $this->l('Category Image:'), 'name' => 'category_image', 'display_image' => false, 'desc' => $img_desc), array('type' => 'text', 'label' => $this->l('Meta Keyword'), 'name' => 'meta_keyword', 'lang' => true, 'size' => 60, 'required' => false, 'desc' => $this->l('Enter Your Category Meta Keyword. Separated by comma(,)')), array('type' => 'textarea', 'label' => $this->l('Meta Description'), 'name' => 'meta_description', 'rows' => 10, 'cols' => 62, 'lang' => true, 'required' => false, 'desc' => $this->l('Enter Your Category Meta Description')), array('type' => 'text', 'label' => $this->l('Link Rewrite'), 'name' => 'link_rewrite', 'size' => 60, 'lang' => true, 'required' => true, 'desc' => $this->l('Enetr Your Category Slug. Use In SEO Friendly URL')), array('type' => 'select', 'label' => $this->l('Parent Category'), 'name' => 'id_parent', 'options' => array('query' => BlogCategory::getCategory(), 'id' => 'id_smart_blog_category', 'name' => 'meta_title'), 'desc' => $this->l('Select Your Parent Category')),

			array('type' => 'radio', 'label' => $this->l('Status'), 'name' => 'active', 'required' => false, 'class' => 't', 'is_bool' => true, 'values' => array(array('id' => 'active', 'value' => 1, 'label' => $this->l('Enabled')), array('id' => 'active', 'value' => 0, 'label' => $this->l('Disabled'))))), 'submit' => array('title' => $this->l('Save'), 'class' => 'button'));

		if (Shop::isFeatureActive())
			$this->fields_form['input'][] = array('type' => 'shop', 'label' => $this->l('Shop association:'), 'name' => 'checkBoxShopAsso',);

		if (! ($this->loadObject(true))) return;

		$this->fields_form['submit'] = array('title' => $this->l('Save   '), 'class' => 'button');
		return parent::renderForm();
	}

	public function renderList()
	{
		$this->addRowAction('edit');
		$this->addRowAction('delete');
		return parent::renderList();
	}

	public function postProcess()
	{
		if (Tools::isSubmit('deletesmart_blog_category') && Tools::getValue('id_smart_blog_category') != '')
		{
			$id_lang = (int)Context::getContext()->language->id;
			$catpost = (int)SmartBlogPost::getToltalByCategory($id_lang, Tools::getValue('id_smart_blog_category'));
			if ((int)$catpost != 0)
				$this->errors[] = Tools::displayError('You need to delete all posts associate with this category .');
			else
			{
				$blog_category = new BlogCategory((int)Tools::getValue('id_smart_blog_category'));
				if (! $blog_category->delete())
					$this->errors[] = Tools::displayError('An error occurred while deleting the object.').' <b>'.$this->table.' ('.Db::getInstance()->getMsgError().')</b>';
				else
				{
					Hook::exec('actionsbdeletecat', array('BlogCategory' => $blog_category));
					Tools::redirectAdmin($this->context->link->getAdminLink('AdminBlogCategory'));
				}
			}
		}
		elseif (Tools::isSubmit('submitAddsmart_blog_category'))
		{
			parent::validateRules();
			if (count($this->errors)) return false;
			if (! $id_smart_blog_category = (int)Tools::getValue('id_smart_blog_category'))
			{
				$blog_category = new BlogCategory();

				$languages = Language::getLanguages(false);
				foreach ($languages as $language)
				{
					$title = str_replace('"', '', htmlspecialchars_decode(html_entity_decode(Tools::getValue('meta_title_'.$language['id_lang']))));
					$blog_category->meta_title[$language['id_lang']] = $title;
					$blog_category->meta_keyword[$language['id_lang']] = Tools::getValue('meta_keyword_'.$language['id_lang']);
					$blog_category->meta_description[$language['id_lang']] = Tools::getValue('meta_description_'.$language['id_lang']);
					$blog_category->description[$language['id_lang']] = Tools::getValue('description_'.$language['id_lang']);
					if (Tools::getValue('link_rewrite_'.$language['id_lang']) == '' && Tools::getValue('link_rewrite_'.$language['id_lang']) == null)
						$blog_category->link_rewrite[$language['id_lang']] = str_replace(array(' ', ':', '\\', '/', '#', '!', '*', '.', '?'), '-', Tools::getValue('meta_title_'.$language['id_lang']));
					else
						$blog_category->link_rewrite[$language['id_lang']] = str_replace(array(' ', ':', '\\', '/', '#', '!', '*', '.', '?'), '-', Tools::getValue('link_rewrite_'.$language['id_lang']));
				}
				$blog_category->id_parent = Tools::getValue('id_parent');
				$blog_category->position = Tools::getValue('position');
				$blog_category->desc_limit = Tools::getValue('desc_limit');
				$blog_category->active = Tools::getValue('active');
				$blog_category->created = Date('y-m-d H:i:s');
				$blog_category->modified = Date('y-m-d H:i:s');

				if (! $blog_category->save()) $this->errors[] = Tools::displayError('An error has occurred: Can\'t save the current object');
				else
				{
					Hook::exec('actionsbnewcat', array('BlogCategory' => $blog_category));
					$this->processImageCategory($_FILES, $blog_category->id);
					Tools::redirectAdmin($this->context->link->getAdminLink('AdminBlogCategory'));
				}
			}
			elseif ($id_smart_blog_category = Tools::getValue('id_smart_blog_category'))
			{
				$blog_category = new BlogCategory($id_smart_blog_category);
				$languages = Language::getLanguages(false);
				foreach ($languages as $language)
				{
					$title = str_replace('"', '', htmlspecialchars_decode(html_entity_decode(Tools::getValue('meta_title_'.$language['id_lang']))));
					$blog_category->meta_title[$language['id_lang']] = $title;
					$blog_category->meta_keyword[$language['id_lang']] = Tools::getValue('meta_keyword_'.$language['id_lang']);
					$blog_category->meta_description[$language['id_lang']] = Tools::getValue('meta_description_'.$language['id_lang']);
					$blog_category->description[$language['id_lang']] = Tools::getValue('description_'.$language['id_lang']);
					$blog_category->link_rewrite[$language['id_lang']] = str_replace(array(' ', ':', '\\', '/', '#', '!', '*', '.', '?'), '-', Tools::getValue('link_rewrite_'.$language['id_lang']));
				}

				$blog_category->id_parent = Tools::getValue('id_parent');
				$blog_category->position = Tools::getValue('position');
				$blog_category->desc_limit = Tools::getValue('desc_limit');
				$blog_category->active = Tools::getValue('active');
				$blog_category->modified = Date('y-m-d H:i:s');
				if (! $blog_category->update()) $this->errors[] = Tools::displayError('An error occurred while updating an object.').' <b>'.$this->table.' ('.Db::getInstance()->getMsgError().')</b>';
				else
					Hook::exec('actionsbupdatecat', array('BlogCategory' => $blog_category));
				$this->processImageCategory($_FILES, $blog_category->id_smart_blog_category);
				Tools::redirectAdmin($this->context->link->getAdminLink('AdminBlogCategory'));
			}
		}
		elseif (Tools::isSubmit('statussmart_blog_category') && Tools::getValue($this->identifier))
		{

			if ($this->tabAccess['edit'] === '1')
				if (Validate::isLoadedObject($object = $this->loadObject()))
				{
					if ($object->toggleStatus())
					{
						Hook::exec('actionsbtogglecat', array('SmartBlogCat' => $this->object));
						//$identifier = ((int)$object->id_parent ? '&id_smart_blog_category='.(int)$object->id_parent : '');
						Tools::redirectAdmin($this->context->link->getAdminLink('AdminBlogCategory'));
					}
					else
						$this->errors[] = Tools::displayError('An error occurred while updating the status.');
				}
				else
					$this->errors[] = Tools::displayError('An error occurred while updating the status for an object.').' <b>'.$this->table.'</b> '.Tools::displayError('(cannot load object)');
			else
				$this->errors[] = Tools::displayError('You do not have permission to edit this.');
		}
		elseif (Tools::isSubmit('smart_blog_categoryOrderby') && Tools::isSubmit('smart_blog_categoryOrderway'))
		{
			$this->defaultOrderBy = Tools::getValue('smart_blog_categoryOrderby');
			$this->defaultorderWay = Tools::getValue('smart_blog_categoryOrderway');
		}
	}

	public function initToolbar()
	{
		parent::initToolbar();
	}

	public function processImageCategory($files, $id)
	{
		if (isset($files['category_image']) && isset($files['category_image']['tmp_name']) && ! empty($files['category_image']['tmp_name']))
		{
			if (ImageManager::validateUpload($files['category_image'], 4000000)) return $this->displayError($this->l('Invalid image'));
			else
			{
				$ext = Tools::substr($files['category_image']['name'], strrpos($files['category_image']['name'], '.') + 1);
				$file_name = $id.'.'.$ext;
				$path = _PS_MODULE_DIR_.'smartblog/images/category/'.$file_name;
				if (! move_uploaded_file($files['category_image']['tmp_name'], $path)) return $this->displayError($this->l('An error occurred while attempting to upload the file.'));
				else
				{
					if (Configuration::hasContext('category_image', null, Shop::getContext()) && Configuration::get('BLOCKBANNER_IMG') != $file_name) @unlink(dirname(__FILE__).'/'.Configuration::get('BLOCKBANNER_IMG'));

					$images_types = BlogImageType::getImageAllType('category');
					foreach ($images_types as $image_type)
					{
						$dir = _PS_MODULE_DIR_.'smartblog/images/category/'.$id.'-'.Tools::stripslashes($image_type['type_name']).'.jpg';
						if (file_exists($dir)) unlink($dir);
					}
					foreach ($images_types as $image_type)
						ImageManager::resize($path, _PS_MODULE_DIR_.'smartblog/images/category/'.$id.'-'.Tools::stripslashes($image_type['type_name']).'.jpg', (int)$image_type['width'], (int)$image_type['height']);
				}
			}
		}
	}
}
