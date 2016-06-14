<?php

if (!defined('_PS_VERSION_'))
	exit;

class tonyblockproductinfocustom extends Module {

	public function __construct() {
		$this->name = 'tonyblockproductinfocustom';
		$this->tab = 'Other';
		$this->version = '1.0';
		$this->author = 'TonyTheme';
		$this->need_instance = 0;

		parent::__construct();

		$this->displayName = $this->l('Product custom data');
		$this->description = $this->l('Adds custom html block or custom products to the product page');
		$this->confirmUninstall = $this->l('Are you sure you want to uninstall?');

		$this->m_def_value = serialize(array());

		if (get_magic_quotes_gpc()) {
			$this->stripslashes_rec($_GET);
			$this->stripslashes_rec($_POST);
		}
	}

	public function stripslashes_rec(&$link) {
		if (is_array($link)) {
			foreach ($link as &$element)
				$this->stripslashes_rec($element);
		} else
			$link = stripslashes($link);
		return true;
	}

	public function install() {
		if (Shop::isFeatureActive())
			Shop::setContext(Shop::CONTEXT_ALL);

		$ret = parent::install() && $this->registerHook('displayAdminProductsExtra') && $this->registerHook('actionProductUpdate') && $this->registerHook('displayProductCustomBlock') && $this->registerHook('displayProductTab') && $this->registerHook('displayProductTabContent') && $this->registerHook('displayProductNavigation');

		return $ret;
	}

	public function uninstall() {
		$ret = parent::uninstall();

		return $ret;
	}

	public function hookDisplayAdminProductsExtra($params) {
		$link = new Link();

		$id = (int) Tools::getValue('id_product');

		$config = $this->getcfg($id);
		if (!is_array($config))
			$config = array();

		$languages = $this->context->controller->getLanguages();
		$id_lang = (int) Context::getContext()->language->id;
		$def_values = array();

		$def_values = $config[$id];

		$content_html = '';
		foreach ($languages as $language) {
			$content_html .= '
<div id="content_' . (int) $language['id_lang'] . '" style="display: ' . ($language['id_lang'] == $id_lang ? 'block' : 'none') . ';">
  <textarea class="autoload_rte" name="content_[' . (int) $language['id_lang'] . ']" cols="97" rows="15">' . $def_values['html'][$language['id_lang']] . '</textarea>
</div>        
        ';
			$content_bottom_html .= '
<div id="content_bottom_' . (int) $language['id_lang'] . '" style="display: ' . ($language['id_lang'] == $id_lang ? 'block' : 'none') . ';">
  <textarea class="autoload_rte" name="content_bottom_[' . (int) $language['id_lang'] . ']" cols="97" rows="15">' . $def_values['html_bottom'][$language['id_lang']] . '</textarea>
</div>        
        ';
			$video_html .= '
<div id="video_' . (int) $language['id_lang'] . '" style="display: ' . ($language['id_lang'] == $id_lang ? 'block' : 'none') . ';">
  <input type="text" name="video_[' . (int) $language['id_lang'] . ']" size="100" value="' . $def_values['video'][$language['id_lang']] . '">
</div>        
        ';
			$title_html .= '
<div id="title_' . (int) $language['id_lang'] . '" style="display: ' . ($language['id_lang'] == $id_lang ? 'block' : 'none') . ';">
  <input type="text" name="title_[' . (int) $language['id_lang'] . ']" size="100" value="' . $def_values['title'][$language['id_lang']] . '">
</div>        
        ';
			$title_bottom_html .= '
<div id="title_bottom_' . (int) $language['id_lang'] . '" style="display: ' . ($language['id_lang'] == $id_lang ? 'block' : 'none') . ';">
  <input type="text" name="title_bottom_[' . (int) $language['id_lang'] . ']" size="100" value="' . $def_values['title_bottom'][$language['id_lang']] . '">
</div>        
        ';
		}

		$content .= '
<style>
.conf-set{margin-bottom:10px;}
.conf-title{width:200px;font-weight:bold;text-align:right;vertical-align:top;padding-top:3px;}
.conf-table td{padding:0 5px 10px 0;}
.comment{font-size:11px;}
.language_flags {
	display: none;
	float: left;
	background: #FFF;
	margin: 4px;
	padding: 8px;
	width: 80px;
	border: 1px solid #555;
}

.pointer {
	cursor: pointer;
}
</style>


<fieldset>  
<legend>' . $this->l('Right column block') . '</legend>
<input type="hidden" name="update-custom-data" value="1">
   <table class="conf-table">
   <tr>                                 
     <td class="conf-title">' . $this->l('Block Title') . ':</td>
     <td class="conf-value">' . $this->displayFlags($languages, (int) $id_lang, 'title', 'title', true) . '</div><p style="clear: both;"> </p>' . $title_html . '</td>
   </tr>      
   <tr>                                 
     <td class="conf-title">' . $this->l('Video Link') . ':</td>
     <td class="conf-value">' . $this->displayFlags($languages, (int) $id_lang, 'video', 'video', true) . '</div><p style="clear: both;"> </p>' . $video_html . '</td>
   </tr>
   <tr>
     <td class="conf-title">' . $this->l('Related products') . ':</td>
     <td class="conf-value"><input type="text" name="rel_products" size="100" value="' . $def_values['rel_products'] . '"/><div class="comment">' . $this->l('Comma separeted list with product IDs') . '</div></td>
   </tr>
   <tr>
     <td class="conf-title">' . $this->l('Custom HTML') . ':</td>
     <td class="conf-value">' . $this->displayFlags($languages, (int) $id_lang, 'content', 'content', true) . '</div><p style="clear: both;"> </p>' . $content_html . '</td>
   </tr>
  </table>
</fieldset>

<fieldset>  
<legend>' . $this->l('Bottom block') . '</legend>
   <table class="conf-table">
   <tr>                                 
     <td class="conf-title">' . $this->l('Block Title') . ':</td>
     <td class="conf-value">' . $this->displayFlags($languages, (int) $id_lang, 'title_bottom', 'title_bottom', true) . '</div><p style="clear: both;"> </p>' . $title_bottom_html . '</td>
   </tr>      
   <tr>
     <td class="conf-title">' . $this->l('Custom HTML') . ':</td>
     <td class="conf-value">' . $this->displayFlags($languages, (int) $id_lang, 'content_bottom', 'content_bottom', true) . '</div><p style="clear: both;"> </p>' . $content_bottom_html . '</td>
   </tr>
  </table>
</fieldset>  

<div class="panel-footer">
	<a href="' . $link->getAdminLink('AdminProducts') . '" class="btn btn-default"><i class="process-icon-cancel"></i> Cancel</a>
	<button type="submit" name="submitAddproduct" class="btn btn-default pull-right"><i class="process-icon-save"></i> Save</button>
	<button type="submit" name="submitAddproductAndStay" class="btn btn-default pull-right"><i class="process-icon-save"></i>Save and stay</button>
</div>
      ';


		return $content;
	}

	function hookdisplayProductTab($params) {
		$id = (int) Tools::getValue('id_product');

		$config = $this->getcfg($id);
		$current_language = $this->context->language->id;

		if (!is_array($config))
			$config = array();


		if (!isset($config[$id]) || !strlen($config[$id]['title_bottom'][$current_language]))
			return '';

		return '<li><a id="more_custom_tab" href="#idTabcustom1">' . $config[$id]['title_bottom'][$current_language] . '</a></li>';
	}

	function hookdisplayProductTabContent($params) {
		$id = (int) Tools::getValue('id_product');

		$config = $this->getcfg($id);
		$current_language = $this->context->language->id;
		if (!is_array($config))
			$config = array();


		if (!isset($config[$id]))
			return '';

		return '<div id="idTabcustom1">' . $config[$id]['html_bottom'][$current_language] . '</div>';
	}

	public function hookactionProductUpdate($params) {
		if (!isset($_POST['update-custom-data']))
			return;

		$id_product = Tools::getValue('id_product');
		$config = $this->getcfg($id_product);
		if (!is_array($config))
			$config = array();
		$languages = $this->context->controller->getLanguages();
		$id_lang = (int) Context::getContext()->language->id;

		$video = Tools::getValue('video_');
		$title = Tools::getValue('title_');
		$title_bottom = Tools::getValue('title_bottom_');
		$rel_products = Tools::getValue('rel_products');
		$html = Tools::getValue('content_');
		$html_bottom = Tools::getValue('content_bottom_');


		$config[$id_product] = array(
			'video' => $video,
			'title' => $title,
			'title_bottom' => $title_bottom,
			'rel_products' => $rel_products,
			'html' => $html,
			'html_bottom' => $html_bottom
		);

		$this->savecfg($config, $id_product);
		$this->_clearCache('tonyblockproductinfocustom.tpl');

		return true;
	}

	public function hookDisplayProductCustomBlock($params) {

		$id = (int) Tools::getValue('id_product');
		$config = $this->getcfg($id);

		$current_language = $this->context->language->id;
		if (!is_array($config))
			$config = array();


		if (!isset($config[$id]))
			return '';

		$data = $config[$id];
		$data['video'] = $data['video'][$current_language];
		$data['title'] = $data['title'][$current_language];
		$data['title_bottom'] = $data['title_bottom'][$current_language];
		$data['html_bottom'] = $data['html_bottom'][$current_language];
		$data['html'] = $data['html'][$current_language];
		$data['show_mode'] = strlen($data['html']) ? 'html' : 'products';
		if (strlen($data['rel_products'])) {
			$orderBy = Tools::getProductsOrder('by', Tools::getValue('orderby'));
			$orderWay = Tools::getProductsOrder('way', Tools::getValue('orderway'));

			$products = explode(',', $data['rel_products']);
			$custom_products = array();
			foreach ($products as $product) {
				$product = (int) $product;
				if ($product)
					$custom_products[] = $product;
			}

			if (count($custom_products)) {
				$products = $this->_get_products_by_id($custom_products, 20, $orderBy, $orderWay);
				if (count($products)) {
					$data['related_products'] = $products;
					$data['show_mode'] = 'products';
				}
			}
		}

		$this->smarty->assign(array(
			'custom_block' => $data
		));

		return ($this->display(__FILE__, 'tonyblockproductinfocustom.tpl'));
	}

	public function _get_products_by_id($products, $max, $order_by, $order_way) {
		$page_number = 0;
		$nb_products = $max;
		$groups = FrontController::getCurrentCustomerGroups();
		$sql_groups = (count($groups) ? 'IN (' . implode(',', $groups) . ')' : '= 1');
		$id_lang = (int) Context::getContext()->language->id;
		$interval = Validate::isUnsignedInt(Configuration::get('PS_NB_DAYS_NEW_PRODUCT')) ? Configuration::get('PS_NB_DAYS_NEW_PRODUCT') : 20;

		$products_sql = implode(',', $products);

		$query = 'SELECT p.*, product_shop.*, stock.out_of_stock, IFNULL(stock.quantity, 0) as quantity,
					pl.`description`, pl.`description_short`, pl.`link_rewrite`, pl.`meta_description`,
					pl.`meta_keywords`, pl.`meta_title`, pl.`name`,
					m.`name` AS manufacturer_name, p.`id_manufacturer` as id_manufacturer,
					MAX(image_shop.`id_image`) id_image, il.`legend`,
					t.`rate`, pl.`meta_keywords`, pl.`meta_title`, pl.`meta_description`,
					DATEDIFF(p.`date_add`, DATE_SUB(NOW(),
					INTERVAL ' . $interval . ' DAY)) > 0 AS new
				FROM `' . _DB_PREFIX_ . 'product` p 
				' . Shop::addSqlAssociation('product', 'p', false) . '
				LEFT JOIN `' . _DB_PREFIX_ . 'product_lang` pl
					ON p.`id_product` = pl.`id_product`
					AND pl.`id_lang` = ' . (int) $id_lang . Shop::addSqlRestrictionOnLang('pl') . '
				LEFT JOIN `' . _DB_PREFIX_ . 'image` i ON (i.`id_product` = p.`id_product`)' .
				Shop::addSqlAssociation('image', 'i', false, 'image_shop.cover=1') . '
				LEFT JOIN `' . _DB_PREFIX_ . 'image_lang` il ON (i.`id_image` = il.`id_image` AND il.`id_lang` = ' . (int) $id_lang . ')
				LEFT JOIN `' . _DB_PREFIX_ . 'manufacturer` m ON (m.`id_manufacturer` = p.`id_manufacturer`)
				LEFT JOIN `' . _DB_PREFIX_ . 'tax_rule` tr ON (product_shop.`id_tax_rules_group` = tr.`id_tax_rules_group`)
					AND tr.`id_country` = ' . (int) Context::getContext()->country->id . '
					AND tr.`id_state` = 0
				LEFT JOIN `' . _DB_PREFIX_ . 'tax` t ON (t.`id_tax` = tr.`id_tax`)
				' . Product::sqlStock('p') . '
				WHERE product_shop.`active` = 1
					AND p.`visibility` != \'none\'
					AND p.`id_product` IN (
						' . $products_sql . '
					)
				GROUP BY product_shop.id_product
				LIMIT ' . (int) ($page_number * $nb_products) . ', ' . (int) $nb_products;

		$result = Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS($query);
		if (!$result)
			return false;
		else
			return Product::getProductsProperties($id_lang, $result);
	}

	public function hookdisplayProductNavigation($params) {
		global $category, $link;

		$productID = (int) $_GET['id_product'];
		$categoryID = (int) $_GET['cid'];

		if (!$categoryID) {
			$product = new Product($productID);
			$categoryID = $product->id_category_default;
		}


		if (!$productID || !$categoryID)
			return '';

		$orderBy = Tools::getProductsOrder('by', Tools::getValue('orderby'));
		$orderWay = Tools::getProductsOrder('way', Tools::getValue('orderway'));

		$siblings = $this->getProductSiblings($categoryID, $orderBy, $orderWay);

		if (count($siblings) == 0)
			return '';

		$prev_id = 0;
		$next_id = 0;

		foreach ($siblings as $i => $p) {
			if ($p['id_product'] == $productID) {
				$prev_id = isset($siblings[$i - 1]) ? $siblings[$i - 1]['id_product'] : 0;
				$next_id = isset($siblings[$i + 1]) ? $siblings[$i + 1]['id_product'] : 0;
				break;
			}
		}

		$result = array();

		if ($prev_id) {
			$prev_product = new Product($prev_id);
			$cover_img = $prev_product->getCover($prev_id);
			$my_link = $this->addParamsToLink($prev_product->getLink(), $categoryID, $orderBy, $orderWay);

			$result['prev'] = array(
				'link' => $my_link,
				'image' => $link->getImageLink($prev_product->link_rewrite, $cover_img['id_image'], 'tonytheme_product'),
			);
		}
		if ($next_id) {
			$prev_product = new Product($next_id);
			$cover_img = $prev_product->getCover($next_id);
			$my_link = $this->addParamsToLink($prev_product->getLink(), $categoryID, $orderBy, $orderWay);

			$result['next'] = array(
				'link' => $my_link,
				'image' => $link->getImageLink($prev_product->link_rewrite, $cover_img['id_image'], 'tonytheme_product'),
			);
		}

		$this->context->smarty->assign(array(
			'nav_products' => $result,
		));
		return ($this->display(__FILE__, 'blockproductnavigation.tpl'));
	}

	public function addParamsToLink($link, $category_id, $order_by, $order_way) {
		if (strpos($link, "?") === false)
			$uri_delim = '?';
		else
			$uri_delim = '&';

		$link .= $uri_delim . 'orderby=' . $order_by . '&orderway=' . $order_way . '&cid=' . $category_id;

		return $link;
	}

	public function getProductSiblings($category_id, $order_by, $order_way) {
		if (empty($order_by))
			$order_by = 'position';

		if (empty($order_way))
			$order_way = 'ASC';
		if ($order_by == 'id_product' || $order_by == 'date_add' || $order_by == 'date_upd')
			$order_by_prefix = 'p';
		elseif ($order_by == 'name')
			$order_by_prefix = 'pl';
		elseif ($order_by == 'manufacturer') {
			$order_by_prefix = 'm';
			$order_by = 'name';
		} elseif ($order_by == 'position')
			$order_by_prefix = 'cp';

		if ($order_by == 'price')
			$order_by = 'orderprice';

		$id_lang = (int) Context::getContext()->language->id;

		$sql = 'SELECT p.id_product,product_shop.price AS orderprice,IFNULL(stock.quantity, 0) as quantity,il.`legend`, m.`name` AS manufacturer_name
				FROM `' . _DB_PREFIX_ . 'category_product` cp
				LEFT JOIN `' . _DB_PREFIX_ . 'product` p
					ON p.`id_product` = cp.`id_product`
				' . Shop::addSqlAssociation('product', 'p') . '
				LEFT JOIN `' . _DB_PREFIX_ . 'product_attribute` pa
				ON (p.`id_product` = pa.`id_product`)
				' . Shop::addSqlAssociation('product_attribute', 'pa', false, 'product_attribute_shop.`default_on` = 1') . '
				' . Product::sqlStock('p', 'product_attribute_shop', false, $context->shop) . '
				LEFT JOIN `' . _DB_PREFIX_ . 'category_lang` cl
					ON (product_shop.`id_category_default` = cl.`id_category`
					AND cl.`id_lang` = ' . (int) $id_lang . Shop::addSqlRestrictionOnLang('cl') . ')
				LEFT JOIN `' . _DB_PREFIX_ . 'product_lang` pl
					ON (p.`id_product` = pl.`id_product`
					AND pl.`id_lang` = ' . (int) $id_lang . Shop::addSqlRestrictionOnLang('pl') . ')
				LEFT JOIN `' . _DB_PREFIX_ . 'image` i
					ON (i.`id_product` = p.`id_product`)' .
				Shop::addSqlAssociation('image', 'i', false, 'image_shop.cover=1') . '
				LEFT JOIN `' . _DB_PREFIX_ . 'image_lang` il
					ON (image_shop.`id_image` = il.`id_image`
					AND il.`id_lang` = ' . (int) $id_lang . ')
				LEFT JOIN `' . _DB_PREFIX_ . 'manufacturer` m
					ON m.`id_manufacturer` = p.`id_manufacturer`
				WHERE product_shop.`id_shop` = ' . (int) $this->context->shop->id . '
					AND cp.`id_category` = ' . (int) $category_id
				. ($active ? ' AND product_shop.`active` = 1' : '')
				. ($front ? ' AND product_shop.`visibility` IN ("both", "catalog")' : '')
				. ($id_supplier ? ' AND p.id_supplier = ' . (int) $id_supplier : '')
				. ' GROUP BY product_shop.id_product ORDER BY ' . (isset($order_by_prefix) ? $order_by_prefix . '.' : '') . '`' . pSQL($order_by) . '` ' . pSQL($order_way) . '';

		$result = Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS($sql);

		return $result;
	}

	function getcfg($id) {
		$result = @file_get_contents(_PS_MODULE_DIR_ . 'tonyblockproductinfocustom/data/cfg_' . $id);

		return unserialize($result);
	}

	function savecfg($result, $id_product) {
		//@chmod(_PS_MODULE_DIR_.'tonyblockproductinfocustom/data/cfg',0755);
		$result = serialize($result);
		file_put_contents(_PS_MODULE_DIR_ . 'tonyblockproductinfocustom/data/cfg_' . $id_product, $result);
		return true;
	}

	/* public function hookDisplayTop($params)
	  {
	  if (Configuration::get('PS_CATALOG_MODE'))
	  return;

	  $config = unserialize(Configuration::get('TONY_CUSTOM_PINFO'));

	  if (strlen($config['image']))
	  $smalllogo = $this->context->link->protocol_content.Tools::getMediaServer($this->name)._MODULE_DIR_.$this->name.'/images/'.$config['image'];
	  else
	  $smalllogo = '';

	  $this->smarty->assign(array(
	  'cart_qties' => $this->context->cart->nbProducts(),
	  'order_process' => Configuration::get('PS_ORDER_PROCESS_TYPE') ? 'order-opc' : 'order',
	  'smalllogo' => $smalllogo,
	  ));

	  return ($this->display(__FILE__, 'tonyblockproductinfocustom.tpl'));
	  } */
}
