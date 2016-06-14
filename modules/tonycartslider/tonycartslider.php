<?php
/**
 * TonyTheme
 *
 * NOTICE OF LICENSE
 *
 * This source file is licensed under the OSL-3.0
 * that is bundled with this package in the file LICENSE.txt.
 *
 * @author    TonyTheme
 * @copyright TonyTheme
 * @license   Open Software License v. 3.0 (OSL-3.0)
 */

if (! defined('_PS_VERSION_')) exit;

class TonyCartSlider extends Module
{
	public function __construct()
	{
		$this->name = 'tonycartslider';
		$this->tab = 'front_office_features';
		$this->version = '1.0';
		$this->author = 'TonyTheme';
		$this->need_instance = 0;
		$this->module_key = '39034886a62663fa5f8392c47133d42f';

		parent::__construct();

		$this->displayName = $this->l('Shopping cart slider module');
		$this->description = $this->l('Hidden shopping cart block on the right column');
		$this->confirmUninstall = $this->l('Are you sure you want to uninstall?');

		$this->m_def_value = 'a:1:{s:5:"image";s:14:"logo_small.png";}';

	}

	public function install()
	{
		if (Shop::isFeatureActive()) Shop::setContext(Shop::CONTEXT_ALL);

		$ret = parent::install() && $this->registerHook('header') && $this->registerHook('top') && Configuration::updateValue('TONY_CART_SLIDER', '') && Configuration::updateValue('TONY_CART_SLIDER', $this->m_def_value, true);

		return $ret;
	}

	public function uninstall()
	{
		$ret = parent::uninstall() && Configuration::deleteByName('TONY_CART_SLIDER');

		return $ret;
	}

	public function displayForm()
	{
		$path = _MODULE_DIR_.$this->name.'/img/';
		$config = unserialize(Configuration::get('TONY_CART_SLIDER'));

		$uploaded_image = '';
		if (Tools::strlen($config['image'])) $uploaded_image = '<img src="'.$path.$config['image'].'">&nbsp;[<a href="'.(AdminController::$currentIndex).'&token='.Tools::getAdminTokenLite('AdminModules').'&configure='.$this->name.'&do=removeimage">'.$this->l('Delete image').'</a>]';

		$do = Tools::GetValue('do');
		if ($do == 'removeimage')
		{
			$config['image'] = '';
			Configuration::updateValue('TONY_CART_SLIDER', serialize($config), true);
			$this->_clearCache('tonycartslider.tpl');
			Tools::redirectAdmin(AdminController::$currentIndex.'&configure='.$this->name.'&token='.Tools::getAdminTokenLite('AdminModules').'&updated');
		}

		$errors = '';
		if (Tools::isSubmit('save'))
		{
			$this->_clearCache('tonycartslider.tpl');
			$image = $config['image'];
			if (isset($_FILES['image']) && isset($_FILES['image']['tmp_name']) && ! empty($_FILES['image']['tmp_name']))
			{
				if ($error = ImageManager::validateUpload($_FILES['image'], Tools::convertBytes(ini_get('upload_max_filesize')))) $errors .= $error;
				else
				{
					$file_name = $_FILES['image']['name'];

					if (! move_uploaded_file($_FILES['image']['tmp_name'], _PS_MODULE_DIR_.$this->name.'/img/'.$file_name)) $errors .= $this->l('File upload error.');
					else
					{
						$uploaded_image = '<img src="'.$path.$file_name.'">';
						$image = $file_name;
					}
				}
			}

			if (! $errors)
			{
				$config['image'] = $image;

				Configuration::updateValue('TONY_CART_SLIDER', serialize($config), true);

				Tools::redirectAdmin(AdminController::$currentIndex.'&configure='.$this->name.'&token='.Tools::getAdminTokenLite('AdminModules').'&updated');
			}

		}

		$message = '';
		$u = Tools::getValue('updated', false);
		if ($u !== false) $message = $this->displayConfirmation($this->l('Updated'));

		$content = $message.'
<style>
.conf-set{margin-bottom:10px;}
.conf-title{width:200px;font-weight:bold;text-align:right;}
.conf-table td{padding:0 5px 10px 0;}
.slider-div{float:left;text-align:center;padding:10px;}
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

<form method="post" enctype="multipart/form-data">
<fieldset class="conf-set">
<legend>'.$this->l('Cart slider').' ['.(Shop::getContext() == Shop::CONTEXT_SHOP ? $this->l('shop').' '.$this->context->shop->name : $this->l('all shops')).']</legend>

<table>
  <tr>
    <td class="conf-title">'.$this->l('Small logo').':</td>
    <td class="conf-value"><input type="file" name="image"><br />'.$uploaded_image.'</td>
  </tr>
</table>

<input type="submit" name="save" value="'.$this->l('Save').'" class="button" style="cursor:pointer;">
</fieldset>

</form>
      ';

		return $content;

	}

	public function getContent()
	{
		return $this->displayForm();
	}

	public function hookDisplayTop($params)
	{
		if (Configuration::get('PS_CATALOG_MODE')) return;

		$config = unserialize(Configuration::get('TONY_CART_SLIDER'));

		if (Tools::strlen($config['image'])) $smalllogo = $this->context->link->protocol_content.Tools::getMediaServer($this->name)._MODULE_DIR_.$this->name.'/img/'.$config['image'];
		else
			$smalllogo = '';
		$ajax_search_url = __PS_BASE_URI__.'modules/tonycartslider/ajax_search.php';

		$this->smarty->assign(array('cart_qties' => $this->context->cart->nbProducts(), 'order_process' => Configuration::get('PS_ORDER_PROCESS_TYPE') ? 'order-opc' : 'order', 'smalllogo' => $smalllogo, 'ajax_search_url' => $ajax_search_url));

		return ($this->display(__FILE__, 'views/templates/front/tonycartslider.tpl'));
	}

	public function hookHeader($params)
	{
		$this->context->controller->addJS($this->_path.'js/jquery-ui-1.9.2.custom.js');
		$this->context->controller->addCSS($this->_path.'css/ui-lightness/jquery-ui-1.9.2.custom.css');
		$this->context->controller->addCSS($this->_path.'css/tonycartslider.css');
	}

	public function getSearchResults()
	{
		$currency = $this->context->currency->id;

		$limit = (int)Tools::getValue('limit');
		if ($limit <= 0 || $limit > 100) $limit = 5;

		$query = Tools::replaceAccentedChars(urldecode(Tools::getValue('term')));
		$orderBy = Tools::getProductsOrder('by', Tools::getValue('orderby'));
		$orderWay = Tools::getProductsOrder('way', Tools::getValue('orderway'));

		$search = Search::find($this->context->language->id, $query, 1, $limit, $orderBy, $orderWay);
		$result = array();

		if ($search['total'] == 0) $result[] = array('value' => '', 'label' => '', 'link' => '', 'html' => '<div class="aucomplete-more">'.$this->l('Sorry, nothing found for ').'<b>'.$query.'</b></div>');
		else
		{
			$link = new Link();
			foreach ($search['result'] as $index => $product)
			{
				if ($index > $limit) break;
				$src = $this->context->link->protocol_content.$link->getImageLink($product['link_rewrite'], $product['id_image'], 'tonytheme_product');

				$product_link = $link->getProductLink($product['id_product']);
				if ((int)((bool)Configuration::get('PS_CATALOG_MODE') || ! (bool)Group::getCurrent()->show_prices)) $price = '';
				else
					$price = '<span class="aucomplete-pprice">'.Tools::displayPrice($product['price'], $currency).'</span>';

				$label = '
<div class="aucomplete-item">
  <span class="aucomplete-pimage"><a href="'.$product_link.'"><img src="'.$src.'" style="width:70px;"/></a></span>
  <div>
    <span class="aucomplete-ptitle"><a href="'.$product_link.'">'.$product['name'].'</a></span>
    <div class="aucomplete-pdesc">'.Tools::truncateString($product['description_short'], 50).'</a></div>
    '.$price.'
  </div>  
</div>
<div class="clear"></div>          
          ';

				$result[] = array('value' => $product['name'], 'label' => $product['name'], 'price' => $product['price'], 'link' => $product_link, 'html' => $label);
			}

			if ($search['total'] > $limit)
			{
				$search_results_link = $this->context->link->getPageLink('search', null, null, array('search_query' => Tools::getValue('term')));

				$label = '<div class="aucomplete-more"><a href="'.$search_results_link.'">'.sprintf($this->l('View all %s items'), $search['total']).'</a></div>';

				$result[] = array('value' => '', 'label' => '', 'link' => '', 'html' => $label);

			}
		}

		return Tools::jsonEncode($result);
	}

}