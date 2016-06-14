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

class AdminBlogcommentController extends ModuleAdminController
{
	public $asso_type = 'shop';

	public function __construct()
	{
		$this->table = 'smart_blog_comment';
		$this->className = 'Blogcomment';
		$this->module = 'smartblog';
		$this->context = Context::getContext();
		$this->bootstrap = true;
		if (Shop::isFeatureActive()) Shop::addTableAssociation($this->table, array('type' => 'shop'));
		parent::__construct();

		$this->fields_list = array('id_smart_blog_comment' => array('title' => $this->l('Id'), 'width' => 100, 'type' => 'text',), 'name' => array('title' => $this->l('Name'), 'width' => 150, 'type' => 'text'), 'content' => array('title' => $this->l('Comment'), 'width' => 340, 'type' => 'text'), 'created' => array('title' => $this->l('Date'), 'width' => 60, 'type' => 'text', 'lang' => true), 'active' => array('title' => $this->l('Status'), 'width' => '70', 'align' => 'center', 'active' => 'status', 'type' => 'bool', 'orderby' => false));

		$this->_join = 'LEFT JOIN '._DB_PREFIX_.'smart_blog_comment_shop sbs ON a.id_smart_blog_comment=sbs.id_smart_blog_comment && sbs.id_shop IN('.implode(',', Shop::getContextListShopID()).')';

		$this->_select = 'sbs.id_shop';
		$this->defaultOrderBy = 'a.id_smart_blog_comment';
		$this->defaultorderWay = 'DESC';

		if (Shop::isFeatureActive() && Shop::getContext() != Shop::CONTEXT_SHOP)
			$this->_group = 'GROUP BY a.id_smart_blog_comment';

		parent::__construct();
	}

	public function renderList()
	{
		$this->addRowAction('edit');
		$this->addRowAction('delete');
		return parent::renderList();
	}

	public function renderForm()
	{
		$this->fields_form = array('legend' => array('title' => $this->l('Blog Comment'),), 'input' => array(array('type' => 'textarea', 'label' => $this->l('Comment'), 'name' => 'content', 'rows' => 10, 'cols' => 62, 'class' => 'rte', 'autoload_rte' => false, 'required' => false, 'desc' => $this->l('Enter Your Category Description')), array('type' => 'radio', 'label' => $this->l('Status'), 'name' => 'active', 'required' => false, 'class' => 't', 'is_bool' => true, 'values' => array(array('id' => 'active', 'value' => 1, 'label' => $this->l('Enabled')), array('id' => 'active', 'value' => 0, 'label' => $this->l('Disabled'))))), 'submit' => array('title' => $this->l('Save'), 'class' => 'button'));

		if (! ($this->loadObject(true))) return;

		$this->fields_form['submit'] = array('title' => $this->l('Save   '), 'class' => 'button');
		return parent::renderForm();
	}

	public function initToolbar()
	{
		parent::initToolbar();
	}
}