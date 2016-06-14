<?php

if (!defined('_PS_VERSION_'))
	exit;

function tonytheme_product_sorter($a, $b) {
	if ($a['sort'] == $b['sort']) {
		return 0;
	}
	return ($a['sort'] < $b['sort']) ? -1 : 1;
}

class tonyproductscarousel extends Module {

	public function __construct() {
		$this->name = 'tonyproductscarousel';
		$this->tab = 'Other';
		$this->version = '1.0';
		$this->author = 'TonyTheme';
		$this->need_instance = 0;

		parent::__construct();

		$this->displayName = $this->l('Home page products carousel');
		$this->description = $this->l('Add several products sections to your home page');
		$this->confirmUninstall = $this->l('Are you sure you want to uninstall?');

		$default_language = (int) Configuration::get('PS_LANG_DEFAULT');
		$this->m_def_value = array(
			'g_display_mode' => 'full',
			'block1' =>
			array(
				'disable' => false,
				'products' => '',
				'custom_products' => '1,2',
				'max_products' => '20',
				'title' =>
				array(
					$default_language => 'NEW PRODUCTS',
				),
				'show_p_title' => '1',
				'show_p_price' => '1',
				'show_p_buy_now' => '1',
				'show_p_images' => '1',
				'show_random' => '0',
				'product_color' => '',
				'price_color' => '',
				'price_special_color' => '',
				'price_old_color' => '',
				'products_img_dimensions' => 'small',
			),
			'block2' =>
			array(
				'disable' => false,
				'products' => 'special',
				'custom_products' => '',
				'max_products' => '20',
				'title' =>
				array(
					$default_language => 'SALE PRODUCTS',
				),
				'show_p_title' => '1',
				'show_p_price' => '1',
				'show_p_buy_now' => '1',
				'show_p_images' => '1',
				'show_random' => '0',
				'product_color' => '',
				'price_color' => '',
				'price_special_color' => '',
				'price_old_color' => '',
				'products_img_dimensions' => 'small',
			),
			'block3' =>
			array(
				'disable' => false,
				'products' => 'special',
				'custom_products' => '',
				'max_products' => '20',
				'title' =>
				array(
					$default_language => 'BESTSELLERS',
				),
				'show_p_title' => '1',
				'show_p_price' => '1',
				'show_p_buy_now' => '1',
				'show_p_images' => '1',
				'show_random' => '0',
				'product_color' => '',
				'price_color' => '',
				'price_special_color' => '',
				'price_old_color' => '',
				'products_img_dimensions' => 'big',
			),
			'block4' =>
			array(
				'disable' => false,
				'products' => '',
				'custom_products' => '1,2,3,4,5,6,7,8',
				'max_products' => '20',
				'title' =>
				array(
					$default_language => 'Popular Products',
				),
				'show_p_title' => '1',
				'show_p_price' => '1',
				'show_p_buy_now' => '1',
				'show_p_images' => '1',
				'show_random' => '0',
				'product_color' => '',
				'price_color' => '',
				'price_special_color' => '',
				'price_old_color' => '',
				'products_img_dimensions' => 'big',
			),
		);
		$this->m_def_value = serialize($this->m_def_value);
	}

	public function install() {
		/* if (Shop::isFeatureActive())
		  Shop::setContext(Shop::CONTEXT_ALL); */

		$ret = parent::install() && $this->registerHook('home') && Configuration::updateValue('TONY_PRODUCTS_CAROUSEL', $this->m_def_value);

		return $ret;
	}

	public function uninstall() {
		$ret = parent::uninstall() && Configuration::deleteByName('TONY_PRODUCTS_CAROUSEL');

		return $ret;
	}

	public function hookDisplayHome($params) {
		$config = unserialize(Configuration::get('TONY_PRODUCTS_CAROUSEL'));
		$id_lang = (int) Context::getContext()->language->id;
		$category = new Category(Context::getContext()->shop->getCategory(), $id_lang);
		$orderBy = Tools::getProductsOrder('by', Tools::getValue('orderby'));
		$orderWay = Tools::getProductsOrder('way', Tools::getValue('orderway'));

		foreach ($config as $blockID => &$data) {
			if (!is_array($data))
				continue;
			$data['products_list'] = array();
			$data['block_title'] = $data['title'][$id_lang];
			if ((int) $data['disable'] == 1)
				continue;

			$max_products = (int) $data['max_products'];
			$max_products = ($max_products == 0) ? 20 : $max_products;
			$products = array();

			switch ($data['products']) {
				case 'new': {
						if ($data['show_random'] == 1) {
							$max_fetch = 1000;
						} else
							$max_fetch = $max_products;

						$products = Product::getNewProducts((int) ($params['cookie']->id_lang), 0, $max_fetch);

						if ($products === false)
							$products = array();

						if ($data['show_random'] == 1 && count($products)) {
							shuffle($products);
							$products = array_slice($products, 0, $max_products);
						}
					}break;

				case 'featured': {
						if ($data['show_random'] == 1) {
							$max_fetch = 1000;
						} else
							$max_fetch = $max_products;

						$products = $category->getProducts($id_lang, 1, $max_fetch);
						if ($products === false)
							$products = array();

						if ($data['show_random'] == 1 && count($products)) {
							shuffle($products);
							$products = array_slice($products, 0, $max_products);
						}
					}break;

				case 'special': {
						if ($data['show_random'] == 1) {
							$max_fetch = 1000;
						} else
							$max_fetch = $max_products;

						$products = Product::getPricesDrop($id_lang, 0, $max_fetch, false, $orderBy, $orderWay);
						if ($products === false)
							$products = array();

						if ($data['show_random'] == 1 && count($products)) {
							shuffle($products);
							$products = array_slice($products, 0, $max_products);
						}
					}break;

				case 'best': {
						if ($data['show_random'] == 1) {
							$max_fetch = 1000;
						} else
							$max_fetch = $max_products;

						$products = ProductSale::getBestSales($id_lang, 0, $max_fetch, $orderBy, $orderWay);
						if ($products === false)
							$products = array();

						if ($data['show_random'] == 1 && count($products)) {
							shuffle($products);
							$products = array_slice($products, 0, $max_products);
						}
					}break;

				default: {
						if ($data['show_random'] == 1) {
							$max_fetch = 1000;
						} else
							$max_fetch = $max_products;

						$products = explode(',', $data['custom_products']);
						$custom_products = array();
						foreach ($products as $product) {
							$product = (int) $product;
							if ($product)
								$custom_products[] = $product;
						}

						$products_sort_order = array();
						foreach ($custom_products as $index => $id) {
							$id = (int) $id;
							if ($id) {
								$products_sort_order[$id] = $index;
							}
						}

						if (count($custom_products)) {
							$products = $this->_get_products_by_id($custom_products, $max_fetch, $orderBy, $orderWay);

							foreach ($products as &$p)
								$p['sort'] = $products_sort_order[$p['id_product']];

							@usort($products, "tonytheme_product_sorter");

							if ($data['show_random'] == 1 && count($products)) {
								shuffle($products);
								$products = array_slice($products, 0, $max_products);
							}
						}
					};
			}

			if (count($products) == 0)
				$data['disable'] = 1;
			$data['products_list'] = $products;
		}

		$config_mode = $config['g_display_mode'];
		if (strlen($config_mode) == 0)
			$config_mode = 'full';

		unset($config['g_display_mode']);
		$this->context->smarty->assign(array(
			'carousel_cfg' => $config,
		));

		$hover_mode = Configuration::get('TONYTHEME_PRODUCT_HOVER_MODE');

		if ($config_mode == 'full') {
			if ($hover_mode == 'simple')
				return ($this->display(__FILE__, 'tonyproductscarousel_hover2.tpl'));
			else
				return ($this->display(__FILE__, 'tonyproductscarousel.tpl'));
		}
		elseif ($config_mode == 'tabbed') {
			if ($hover_mode == 'simple')
				return ($this->display(__FILE__, 'tonyproductscarousel_hover2_tabbed.tpl'));
			else
				return ($this->display(__FILE__, 'tonyproductscarousel_tabbed.tpl'));
		} else {
			return ($this->display(__FILE__, 'tonyproductscarousel_isotope.tpl'));
		}
	}

	public function _get_products_by_id($products, $max, $order_by, $order_way) {
		$page_number = 0;
		$nb_products = $max;
		$groups = FrontController::getCurrentCustomerGroups();
		$sql_groups = (count($groups) ? 'IN (' . implode(',', $groups) . ')' : '= 1');
		$id_lang = (int) Context::getContext()->language->id;
		$interval = Validate::isUnsignedInt(Configuration::get('PS_NB_DAYS_NEW_PRODUCT')) ? Configuration::get('PS_NB_DAYS_NEW_PRODUCT') : 20;

		$products_sql = implode(',', $products);
		$order_table = '';
		if ($order_by == 'date_add' || $order_by == 'date_upd')
			$order_table = 'product_shop';
		elseif ($order_by == 'price')
			$order_table = 'p';


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
				ORDER BY ' . (!empty($order_table) ? '`' . pSQL($order_table) . '`.' : '') . '`' . pSQL($order_by) . '` ' . pSQL($order_way) . '
				LIMIT ' . (int) ($page_number * $nb_products) . ', ' . (int) $nb_products;

		$result = Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS($query);
		if (!$result)
			return false;
		else
			return Product::getProductsProperties($id_lang, $result);
	}

	public function displayForm() {
		$config = unserialize(Configuration::get('TONY_PRODUCTS_CAROUSEL'));
		$languages = $this->context->controller->getLanguages();
		$id_lang = (int) Context::getContext()->language->id;


		if (Tools::isSubmit('savecarousel')) {
			$this->_clearCache('tonyproductscarousel.tpl');

			$config = array(
				'g_display_mode' => Tools::getValue('g_display_mode'),
				'block1' => array(
					'disable' => Tools::getValue('b1_disable'),
					'products' => Tools::getValue('b1_products'),
					'custom_products' => Tools::getValue('b1_custom_products'),
					'max_products' => Tools::getValue('b1_max_products'),
					'title' => Tools::getValue('b1_title'),
					'show_p_title' => Tools::getValue('b1_show_p_title'),
					'show_p_price' => Tools::getValue('b1_show_p_price'),
					'show_p_buy_now' => Tools::getValue('b1_show_p_buy_now'),
					'show_p_images' => Tools::getValue('b1_show_p_images'),
					'show_random' => Tools::getValue('b1_show_random'),
					'product_color' => Tools::getValue('b1_product_color'),
					'price_color' => Tools::getValue('b1_price_color'),
					'price_special_color' => Tools::getValue('b1_price_special_color'),
					'price_old_color' => Tools::getValue('b1_price_old_color'),
					'products_img_dimensions' => Tools::getValue('b1_products_img_dimensions'),
				),
				'block2' => array(
					'disable' => Tools::getValue('b2_disable'),
					'products' => Tools::getValue('b2_products'),
					'custom_products' => Tools::getValue('b2_custom_products'),
					'max_products' => Tools::getValue('b2_max_products'),
					'title' => Tools::getValue('b2_title'),
					'show_p_title' => Tools::getValue('b2_show_p_title'),
					'show_p_price' => Tools::getValue('b2_show_p_price'),
					'show_p_buy_now' => Tools::getValue('b2_show_p_buy_now'),
					'show_p_images' => Tools::getValue('b2_show_p_images'),
					'show_random' => Tools::getValue('b2_show_random'),
					'product_color' => Tools::getValue('b2_product_color'),
					'price_color' => Tools::getValue('b2_price_color'),
					'price_special_color' => Tools::getValue('b2_price_special_color'),
					'price_old_color' => Tools::getValue('b2_price_old_color'),
					'products_img_dimensions' => Tools::getValue('b2_products_img_dimensions'),
				),
				'block3' => array(
					'disable' => Tools::getValue('b3_disable'),
					'products' => Tools::getValue('b3_products'),
					'custom_products' => Tools::getValue('b3_custom_products'),
					'max_products' => Tools::getValue('b3_max_products'),
					'title' => Tools::getValue('b3_title'),
					'show_p_title' => Tools::getValue('b3_show_p_title'),
					'show_p_price' => Tools::getValue('b3_show_p_price'),
					'show_p_buy_now' => Tools::getValue('b3_show_p_buy_now'),
					'show_p_images' => Tools::getValue('b3_show_p_images'),
					'show_random' => Tools::getValue('b3_show_random'),
					'product_color' => Tools::getValue('b3_product_color'),
					'price_color' => Tools::getValue('b3_price_color'),
					'price_special_color' => Tools::getValue('b3_price_special_color'),
					'price_old_color' => Tools::getValue('b3_price_old_color'),
					'products_img_dimensions' => Tools::getValue('b3_products_img_dimensions'),
				),
				'block4' => array(
					'disable' => Tools::getValue('b4_disable'),
					'products' => Tools::getValue('b4_products'),
					'custom_products' => Tools::getValue('b4_custom_products'),
					'max_products' => Tools::getValue('b4_max_products'),
					'title' => Tools::getValue('b4_title'),
					'show_p_title' => Tools::getValue('b4_show_p_title'),
					'show_p_price' => Tools::getValue('b4_show_p_price'),
					'show_p_buy_now' => Tools::getValue('b4_show_p_buy_now'),
					'show_p_images' => Tools::getValue('b4_show_p_images'),
					'show_random' => Tools::getValue('b4_show_random'),
					'product_color' => Tools::getValue('b4_product_color'),
					'price_color' => Tools::getValue('b4_price_color'),
					'price_special_color' => Tools::getValue('b4_price_special_color'),
					'price_old_color' => Tools::getValue('b4_price_old_color'),
					'products_img_dimensions' => Tools::getValue('b4_products_img_dimensions'),
				),
			);


			Configuration::updateValue('TONY_PRODUCTS_CAROUSEL', serialize($config));
			$message = $this->displayConfirmation($this->l('Updated'));
		}

		$products_types = array('Featured products' => 'featured', 'New products' => 'new', 'Special products' => 'special', 'Bestsellers' => 'best');



		$b1_products_opts = '';
		$b2_products_opts = '';
		$b3_products_opts = '';
		$b4_products_opts = '';
		foreach ($products_types as $title => $id) {
			$selected = ($config['block1']['products'] == $id) ? 'selected' : '';
			$b1_products_opts .= '<option value="' . $id . '" ' . $selected . '>' . $title . '</option>';
			$selected = ($config['block2']['products'] == $id) ? 'selected' : '';
			$b2_products_opts .= '<option value="' . $id . '" ' . $selected . '>' . $title . '</option>';
			$selected = ($config['block3']['products'] == $id) ? 'selected' : '';
			$b3_products_opts .= '<option value="' . $id . '" ' . $selected . '>' . $title . '</option>';
			$selected = ($config['block4']['products'] == $id) ? 'selected' : '';
			$b4_products_opts .= '<option value="' . $id . '" ' . $selected . '>' . $title . '</option>';
		}

		$b1_title = '';
		$b2_title = '';
		$b3_title = '';
		$b4_title = '';

		foreach ($languages as $language) {
			$b1_title .= '
<div id="b1_title_' . (int) $language['id_lang'] . '" style="display: ' . ($language['id_lang'] == $id_lang ? 'block' : 'none') . ';">
<input type="text" name="b1_title[' . (int) $language['id_lang'] . ']" value="' . $config['block1']['title'][$language['id_lang']] . '" size="50">        
</div>
        ';
			$b2_title .= '
<div id="b2_title_' . (int) $language['id_lang'] . '" style="display: ' . ($language['id_lang'] == $id_lang ? 'block' : 'none') . ';">
<input type="text" name="b2_title[' . (int) $language['id_lang'] . ']" value="' . $config['block2']['title'][$language['id_lang']] . '" size="50">        
</div>
        ';
			$b3_title .= '
<div id="b3_title_' . (int) $language['id_lang'] . '" style="display: ' . ($language['id_lang'] == $id_lang ? 'block' : 'none') . ';">
<input type="text" name="b3_title[' . (int) $language['id_lang'] . ']" value="' . $config['block3']['title'][$language['id_lang']] . '" size="50">        
</div>
        ';
			$b4_title .= '
<div id="b4_title_' . (int) $language['id_lang'] . '" style="display: ' . ($language['id_lang'] == $id_lang ? 'block' : 'none') . ';">
<input type="text" name="b4_title[' . (int) $language['id_lang'] . ']" value="' . $config['block4']['title'][$language['id_lang']] . '" size="50">        
</div>
        ';
		}

		$params = array('Big (235x250)' => 'big', 'Small (160x170)' => 'small');
		$opt_html1 = '';
		$opt_html2 = '';
		$opt_html3 = '';
		$opt_html4 = '';

		foreach ($params as $title => $val) {
			$selected = ($config['block1']['products_img_dimensions'] == $val) ? 'selected' : '';
			$opt_html1 .= '<option value="' . $val . '" ' . $selected . '>' . $title . '</option>';

			$selected = ($config['block2']['products_img_dimensions'] == $val) ? 'selected' : '';
			$opt_html2 .= '<option value="' . $val . '" ' . $selected . '>' . $title . '</option>';

			$selected = ($config['block3']['products_img_dimensions'] == $val) ? 'selected' : '';
			$opt_html3 .= '<option value="' . $val . '" ' . $selected . '>' . $title . '</option>';

			$selected = ($config['block4']['products_img_dimensions'] == $val) ? 'selected' : '';
			$opt_html4 .= '<option value="' . $val . '" ' . $selected . '>' . $title . '</option>';
		}

		$display_opts = '';
		$display_modes = array('isotope' => 'Isotope', 'tabbed' => 'Tabbed', 'full' => 'Full');
		$def_value = isset($config['g_display_mode']) ? $config['g_display_mode'] : 'isotope';

		foreach ($display_modes as $id => $title) {
			$selected = ($id == $def_value) ? 'selected' : '';
			$display_opts .= '<option value="' . $id . '" ' . $selected . '>' . $title . '</option>';
		}



		$content = $message . '
<style>
.conf-set{margin-bottom:10px;}
.conf-title{width:200px;font-weight:bold;text-align:right;vertical-align:top;padding-top:3px;font-size:13px;}
.conf-value{font-size:13px;}
.conf-table td{padding:0 5px 10px 0;}
.slider-div{float:left;text-align:center;padding:10px;}
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

<form method="post">
<fieldset class="conf-set">
<legend>' . $this->l('Products carousel') . ' [' . (Shop::getContext() == Shop::CONTEXT_SHOP ? $this->l('shop') . ' ' . $this->context->shop->name : $this->l('all shops')) . ']</legend>

<table class="conf-table">
<tr>
  <td colspan="2">
    <fieldset class="conf-set">
      <legend>' . $this->l('Global settings') . '</legend>
      
      <table class="conf-table">
        <tr>
          <td class="conf-title">' . $this->l('Display mode') . '</td>
          <td class="conf-value"><select name="g_display_mode">' . $display_opts . '</select></td>
        </tr>
      </table>
      
    </fieldset>
  </td>
</tr>
  <tr>
    <td valign="top">
      <fieldset class="conf-set">
        <legend>' . $this->l('Block 1') . '</legend>
        
        <table class="conf-table">
          <tr>
            <td class="conf-title">' . $this->l('Disable') . ':</td>
            <td class="conf-value"><input type="checkbox" name="b1_disable" value="1" ' . ($config['block1']['disable'] == 1 ? 'checked' : '') . '></td>
          </tr>
          <tr>
            <td class="conf-title">' . $this->l('Title') . ':</td>
            <td class="conf-value"><div>' . $this->displayFlags($languages, (int) $id_lang, 'b1_title', 'b1_title', true) . '</div><p style="clear: both;"> </p>' . $b1_title . '</td>
          </tr>
          <tr>
            <td class="conf-title">' . $this->l('Products') . ':</td>
            <td class="conf-value"><select name="b1_products"><option value="">---</option>' . $b1_products_opts . '</select></td>
          </tr>
          <tr>
            <td class="conf-title">' . $this->l('Custom product IDs') . ':</td>
            <td class="conf-value"><input type="text" name="b1_custom_products" value="' . $config['block1']['custom_products'] . '" size="50"><div class="comment">' . $this->l('Comma separeted list with product IDs') . '</div></td>
          </tr>
          <tr>
            <td class="conf-title">' . $this->l('Max products') . ':</td>
            <td class="conf-value"><input type="text" name="b1_max_products" value="' . $config['block1']['max_products'] . '" size="10"><div class="comment">' . $this->l('0 - unlimited') . '</div></td>
          </tr>
          <tr>
            <td class="conf-title">' . $this->l('Display options') . ':</td>
            <td class="conf-value">
              <input type="checkbox" name="b1_show_p_title" value="1" ' . ($config['block1']['show_p_title'] == 1 ? 'checked' : '') . '> ' . $this->l('Show product name') . '<br />
              <input type="checkbox" name="b1_show_p_price" value="1" ' . ($config['block1']['show_p_price'] == 1 ? 'checked' : '') . '> ' . $this->l('Show product price') . '<br />
              <input type="checkbox" name="b1_show_p_buy_now" value="1" ' . ($config['block1']['show_p_buy_now'] == 1 ? 'checked' : '') . '> ' . $this->l('Show "buy now" button') . '<br />
              <input type="checkbox" name="b1_show_p_images" value="1" ' . ($config['block1']['show_p_images'] == 1 ? 'checked' : '') . '> ' . $this->l('Show additional product images') . '<br />
              <input type="checkbox" name="b1_show_random" value="1" ' . ($config['block1']['show_random'] == 1 ? 'checked' : '') . '> ' . $this->l('Show products randomly') . '<br />
            </td>
          </tr>
          <tr>
            <td class="conf-title">' . $this->l('Product name color') . ':</td>
            <td class="conf-value"><input type="text" name="b1_product_color" value="' . $config['block1']['product_color'] . '" class="color mColorPickerInput mColorPicker" data-hex="true"></td>
        </tr>
        <tr>
            <td class="conf-title">' . $this->l('Product regular price color') . ':</td>
            <td class="conf-value"><input type="text" name="b1_price_color" value="' . $config['block1']['price_color'] . '" class="color mColorPickerInput mColorPicker" data-hex="true"></td>
        </tr>
        <tr>
            <td class="conf-title">' . $this->l('Product special price color') . ':</td>
            <td class="conf-value"><input type="text" name="b1_price_special_color" value="' . $config['block1']['price_special_color'] . '" class="color mColorPickerInput mColorPicker" data-hex="true"></td>
        </tr>
        <tr>
            <td class="conf-title">' . $this->l('Product old price color') . ':</td>
            <td class="conf-value"><input type="text" name="b1_price_old_color" value="' . $config['block1']['price_old_color'] . '" class="color mColorPickerInput mColorPicker" data-hex="true"></td>
        </tr>
        <tr>
            <td class="conf-title">' . $this->l('Products images dimension') . ':</td>
            <td class="conf-value"><select name="b1_products_img_dimensions"><option value="">Default</option>' . $opt_html1 . '</select></td>
        </tr>
        </table>
        
      </fieldset>
    </td>
    <td valign="top">
      <fieldset class="conf-set">
        <legend>' . $this->l('Block 2') . '</legend>
        <table class="conf-table">
          <tr>
            <td class="conf-title">' . $this->l('Disable') . ':</td>
            <td class="conf-value"><input type="checkbox" name="b2_disable" value="1" ' . ($config['block2']['disable'] == 1 ? 'checked' : '') . '></td>
          </tr>
          <tr>
            <td class="conf-title">' . $this->l('Title') . ':</td>
            <td class="conf-value"><div>' . $this->displayFlags($languages, (int) $id_lang, 'b2_title', 'b2_title', true) . '</div><p style="clear: both;"> </p>' . $b2_title . '</td>
          </tr>
          <tr>
            <td class="conf-title">' . $this->l('Products') . ':</td>
            <td class="conf-value"><select name="b2_products"><option value="">---</option>' . $b2_products_opts . '</select></td>
          </tr>
          <tr>
            <td class="conf-title">' . $this->l('Custom product IDs') . ':</td>
            <td class="conf-value"><input type="text" name="b2_custom_products" value="' . $config['block2']['custom_products'] . '" size="50"><div class="comment">' . $this->l('Comma separeted list with product IDs') . '</div></td>
          </tr>
          <tr>
            <td class="conf-title">' . $this->l('Max products') . ':</td>
            <td class="conf-value"><input type="text" name="b2_max_products" value="' . $config['block2']['max_products'] . '" size="10"><div class="comment">' . $this->l('0 - unlimited') . '</div></td>
          </tr>
          <tr>
            <td class="conf-title">' . $this->l('Display options') . ':</td>
            <td class="conf-value">
              <input type="checkbox" name="b2_show_p_title" value="1" ' . ($config['block2']['show_p_title'] == 1 ? 'checked' : '') . '> ' . $this->l('Show product name') . '<br />
              <input type="checkbox" name="b2_show_p_price" value="1" ' . ($config['block2']['show_p_price'] == 1 ? 'checked' : '') . '> ' . $this->l('Show product price') . '<br />
              <input type="checkbox" name="b2_show_p_buy_now" value="1" ' . ($config['block2']['show_p_buy_now'] == 1 ? 'checked' : '') . '> ' . $this->l('Show "buy now" button') . '<br />
              <input type="checkbox" name="b2_show_p_images" value="1" ' . ($config['block2']['show_p_images'] == 1 ? 'checked' : '') . '> ' . $this->l('Show additional product images') . '<br />
              <input type="checkbox" name="b2_show_random" value="1" ' . ($config['block2']['show_random'] == 1 ? 'checked' : '') . '> ' . $this->l('Show products randomly') . '<br />
            </td>
          </tr>
          <tr>
            <td class="conf-title">' . $this->l('Product name color') . ':</td>
            <td class="conf-value"><input type="text" name="b2_product_color" value="' . $config['block2']['product_color'] . '" class="color mColorPickerInput mColorPicker" data-hex="true"></td>
        </tr>
          <tr>
            <td class="conf-title">' . $this->l('Product regular price color') . ':</td>
            <td class="conf-value"><input type="text" name="b2_price_color" value="' . $config['block2']['price_color'] . '" class="color mColorPickerInput mColorPicker" data-hex="true"></td>
        </tr>
        <tr>
            <td class="conf-title">' . $this->l('Product special price color') . ':</td>
            <td class="conf-value"><input type="text" name="b2_price_special_color" value="' . $config['block2']['price_special_color'] . '" class="color mColorPickerInput mColorPicker" data-hex="true"></td>
        </tr>
        <tr>
            <td class="conf-title">' . $this->l('Product old price color') . ':</td>
            <td class="conf-value"><input type="text" name="b2_price_old_color" value="' . $config['block2']['price_old_color'] . '" class="color mColorPickerInput mColorPicker" data-hex="true"></td>
        </tr>
        <tr>
            <td class="conf-title">' . $this->l('Products images dimension') . ':</td>
            <td class="conf-value"><select name="b2_products_img_dimensions"><option value="">Default</option>' . $opt_html2 . '</select></td>
        </tr>
        </table>
      </fieldset>
    </td>
  </tr>
  <tr>
    <td colspan="2" valign="top">
      <fieldset class="conf-set">
        <legend>' . $this->l('Block 3') . '</legend>
        
        <table class="conf-table">
          <tr>
            <td class="conf-title">' . $this->l('Disable') . ':</td>
            <td class="conf-value"><input type="checkbox" name="b3_disable" value="1" ' . ($config['block3']['disable'] == 1 ? 'checked' : '') . '></td>
          </tr>
          <tr>
            <td class="conf-title">' . $this->l('Title') . ':</td>
            <td class="conf-value"><div>' . $this->displayFlags($languages, (int) $id_lang, 'b3_title', 'b3_title', true) . '</div><p style="clear: both;"> </p>' . $b3_title . '</td>
          </tr>
          <tr>
            <td class="conf-title">' . $this->l('Products') . ':</td>
            <td class="conf-value"><select name="b3_products"><option value="">---</option>' . $b3_products_opts . '</select></td>
          </tr>
          <tr>
            <td class="conf-title">' . $this->l('Custom product IDs') . ':</td>
            <td class="conf-value"><input type="text" name="b3_custom_products" value="' . $config['block3']['custom_products'] . '" size="50"><div class="comment">' . $this->l('Comma separeted list with product IDs') . '</div></td>
          </tr>
          <tr>
            <td class="conf-title">' . $this->l('Max products') . ':</td>
            <td class="conf-value"><input type="text" name="b3_max_products" value="' . $config['block3']['max_products'] . '" size="10"><div class="comment">' . $this->l('0 - unlimited') . '</div></td>
          </tr>
          <tr>
            <td class="conf-title">' . $this->l('Display options') . ':</td>
            <td class="conf-value">
              <input type="checkbox" name="b3_show_p_title" value="1" ' . ($config['block3']['show_p_title'] == 1 ? 'checked' : '') . '> ' . $this->l('Show product name') . '<br />
              <input type="checkbox" name="b3_show_p_price" value="1" ' . ($config['block3']['show_p_price'] == 1 ? 'checked' : '') . '> ' . $this->l('Show product price') . '<br />
              <input type="checkbox" name="b3_show_p_buy_now" value="1" ' . ($config['block3']['show_p_buy_now'] == 1 ? 'checked' : '') . '> ' . $this->l('Show "buy now" button') . '<br />
              <input type="checkbox" name="b3_show_p_images" value="1" ' . ($config['block3']['show_p_images'] == 1 ? 'checked' : '') . '> ' . $this->l('Show additional product images') . '<br />
              <input type="checkbox" name="b3_show_random" value="1" ' . ($config['block3']['show_random'] == 1 ? 'checked' : '') . '> ' . $this->l('Show products randomly') . '<br />
            </td>
          </tr>
          <tr>
            <td class="conf-title">' . $this->l('Product name color') . ':</td>
            <td class="conf-value"><input type="text" name="b3_product_color" value="' . $config['block3']['product_color'] . '" class="color mColorPickerInput mColorPicker" data-hex="true"></td>
        </tr>
          <tr>
            <td class="conf-title">' . $this->l('Product regular price color') . ':</td>
            <td class="conf-value"><input type="text" name="b3_price_color" value="' . $config['block3']['price_color'] . '" class="color mColorPickerInput mColorPicker" data-hex="true"></td>
        </tr>
        <tr>
            <td class="conf-title">' . $this->l('Product special price color') . ':</td>
            <td class="conf-value"><input type="text" name="b3_price_special_color" value="' . $config['block3']['price_special_color'] . '" class="color mColorPickerInput mColorPicker" data-hex="true"></td>
        </tr>
        <tr>
            <td class="conf-title">' . $this->l('Product old price color') . ':</td>
            <td class="conf-value"><input type="text" name="b3_price_old_color" value="' . $config['block3']['price_old_color'] . '" class="color mColorPickerInput mColorPicker" data-hex="true"></td>
        </tr>
        <tr>
            <td class="conf-title">' . $this->l('Products images dimension') . ':</td>
            <td class="conf-value"><select name="b3_products_img_dimensions"><option value="">Default</option>' . $opt_html3 . '</select></td>
        </tr>
        </table>
      </fieldset>
    </td>
  </tr>
  <tr>
    <td colspan="2" valign="top">
      <fieldset class="conf-set">
        <legend>' . $this->l('Block 4') . '</legend>
        
        <table class="conf-table">
          <tr>
            <td class="conf-title">' . $this->l('Disable') . ':</td>
            <td class="conf-value"><input type="checkbox" name="b4_disable" value="1" ' . ($config['block4']['disable'] == 1 ? 'checked' : '') . '></td>
          </tr>
          <tr>
            <td class="conf-title">' . $this->l('Title') . ':</td>
            <td class="conf-value"><div>' . $this->displayFlags($languages, (int) $id_lang, 'b4_title', 'b4_title', true) . '</div><p style="clear: both;"> </p>' . $b4_title . '</td>
          </tr>
          <tr>
            <td class="conf-title">' . $this->l('Products') . ':</td>
            <td class="conf-value"><select name="b4_products"><option value="">---</option>' . $b4_products_opts . '</select></td>
          </tr>
          <tr>
            <td class="conf-title">' . $this->l('Custom product IDs') . ':</td>
            <td class="conf-value"><input type="text" name="b4_custom_products" value="' . $config['block4']['custom_products'] . '" size="50"><div class="comment">' . $this->l('Comma separeted list with product IDs') . '</div></td>
          </tr>
          <tr>
            <td class="conf-title">' . $this->l('Max products') . ':</td>
            <td class="conf-value"><input type="text" name="b4_max_products" value="' . $config['block4']['max_products'] . '" size="10"><div class="comment">' . $this->l('0 - unlimited') . '</div></td>
          </tr>
          <tr>
            <td class="conf-title">' . $this->l('Display options') . ':</td>
            <td class="conf-value">
              <input type="checkbox" name="b4_show_p_title" value="1" ' . ($config['block4']['show_p_title'] == 1 ? 'checked' : '') . '> ' . $this->l('Show product name') . '<br />
              <input type="checkbox" name="b4_show_p_price" value="1" ' . ($config['block4']['show_p_price'] == 1 ? 'checked' : '') . '> ' . $this->l('Show product price') . '<br />
              <input type="checkbox" name="b4_show_p_buy_now" value="1" ' . ($config['block4']['show_p_buy_now'] == 1 ? 'checked' : '') . '> ' . $this->l('Show "buy now" button') . '<br />
              <input type="checkbox" name="b4_show_p_images" value="1" ' . ($config['block4']['show_p_images'] == 1 ? 'checked' : '') . '> ' . $this->l('Show additional product images') . '<br />
              <input type="checkbox" name="b4_show_random" value="1" ' . ($config['block4']['show_random'] == 1 ? 'checked' : '') . '> ' . $this->l('Show products randomly') . '<br />
            </td>
          </tr>
          <tr>
            <td class="conf-title">' . $this->l('Product name color') . ':</td>
            <td class="conf-value"><input type="text" name="b4_product_color" value="' . $config['block4']['product_color'] . '" class="color mColorPickerInput mColorPicker" data-hex="true"></td>
        </tr>
          <tr>
            <td class="conf-title">' . $this->l('Product regular price color') . ':</td>
            <td class="conf-value"><input type="text" name="b4_price_color" value="' . $config['block4']['price_color'] . '" class="color mColorPickerInput mColorPicker" data-hex="true"></td>
        </tr>
        <tr>
            <td class="conf-title">' . $this->l('Product special price color') . ':</td>
            <td class="conf-value"><input type="text" name="b4_price_special_color" value="' . $config['block4']['price_special_color'] . '" class="color mColorPickerInput mColorPicker" data-hex="true"></td>
        </tr>
        <tr>
            <td class="conf-title">' . $this->l('Product old price color') . ':</td>
            <td class="conf-value"><input type="text" name="b4_price_old_color" value="' . $config['block4']['price_old_color'] . '" class="color mColorPickerInput mColorPicker" data-hex="true"></td>
        </tr>
        <tr>
            <td class="conf-title">' . $this->l('Products images dimension') . ':</td>
            <td class="conf-value"><select name="b4_products_img_dimensions"><option value="">Default</option>' . $opt_html4 . '</select></td>
        </tr>
        </table>
      </fieldset>
    </td>
  </tr>
</table>

<input type="submit" name="savecarousel" value="' . $this->l('Save') . '" class="button" style="cursor:pointer;">
</fieldset>

</form>      
      ';
		return $content;
	}

	public function getContent() {
		$this->context->controller->addJS(_PS_JS_DIR_ . 'jquery/plugins/jquery.colorpicker.js');
		$js = '
<script type="text/javascript">
$(document).ready(function() {
  $(".mColorPicker").mColorPicker();
});  
</script>      
      ';
		return $js . $message . $this->displayForm();
	}

}
