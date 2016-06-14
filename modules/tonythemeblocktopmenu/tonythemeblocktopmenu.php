<?php
/**
 * 2007-2013 PrestaShop
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Academic Free License (AFL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/afl-3.0.php
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@prestashop.com so we can send you a copy immediately.
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade PrestaShop to newer
 * versions in the future. If you wish to customize PrestaShop for your
 * needs please refer to http://www.prestashop.com for more information.
 *
 * @author    PrestaShop SA <contact@prestashop.com>
 * @copyright PrestaShop SA
 * @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
 *  International Registered Trademark & Property of PrestaShop SA
 */

require(dirname(__FILE__).'/menutoplinks.class.php');

class TonyThemeBlockTopMenu extends Module
{

	private $menu = array();
	private $html = '';
	private $user_groups;

	/*
	 * Pattern for matching config values
	 */
	private $pattern = '/^([A-Z_]*)[0-9]+/';

	/*
	 * Name of the controller
	 * Used to set item selected or not in top menu
	 */
	private $page_name = '';

	/*
	 * Spaces per depth in BO
	 */
	private $spacer_size = '5';

	public function __construct()
	{
		$this->name = 'tonythemeblocktopmenu';
		$this->tab = 'front_office_features';
		$this->version = 1.5;
		$this->author = 'PrestaShop';

		parent::__construct();

		$this->displayName = $this->l('TonyTheme Top horizontal menu');
		$this->description = $this->l('Add a new horizontal menu to the top of your e-commerce website.');

		if (get_magic_quotes_gpc())
		{
			$this->stripslashesRec($_GET);
			$this->stripslashesRec($_POST);
		}
	}

	public function install()
	{
		if (! parent::install() || ! $this->registerHook('displayTop') || ! $this->registerHook('displayTopSpy') || !
			Configuration::updateGlobalValue('MOD_TONYBLOCKTOPMENU_ITEMS', 'CAT2,LNK2,LNK1') || ! $this->registerHook('actionObjectCategoryUpdateAfter') || ! $this->registerHook('actionObjectCategoryDeleteAfter') || ! $this->registerHook('actionObjectCmsUpdateAfter') || ! $this->registerHook('actionObjectCmsDeleteAfter') || ! $this->registerHook('actionObjectSupplierUpdateAfter') || ! $this->registerHook('actionObjectSupplierDeleteAfter') || ! $this->registerHook('actionObjectManufacturerUpdateAfter') || ! $this->registerHook('actionObjectManufacturerDeleteAfter') || ! $this->registerHook('actionObjectProductUpdateAfter') || ! $this->registerHook('actionObjectProductDeleteAfter') || ! $this->registerHook('categoryUpdate') || ! $this->registerHook('actionShopDataDuplication') || ! $this->installDB()) return false;
		return true;
	}

	public function installDb()
	{
		//$cats = explode(',', Configuration::get('MOD_TONYBLOCKTOPMENU_ITEMS'));
		//$default_language = (int)Configuration::get('PS_LANG_DEFAULT');
		//$id_shop = (int)Shop::getContextShopID();

		$ret = (Db::getInstance()->execute('
		CREATE TABLE IF NOT EXISTS `'._DB_PREFIX_.'tonylinksmenutop` (
			`id_tonylinksmenutop` INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
			`id_shop` INT(11) UNSIGNED NOT NULL,
			`new_window` TINYINT( 1 ) NOT NULL,
			INDEX (`id_shop`)
		) ENGINE = '._MYSQL_ENGINE_.' CHARACTER SET utf8 COLLATE utf8_general_ci;') && Db::getInstance()->execute('
			 CREATE TABLE IF NOT EXISTS `'._DB_PREFIX_.'tonylinksmenutop_lang` (
			`id_tonylinksmenutop` INT(11) UNSIGNED NOT NULL,
			`id_lang` INT(11) UNSIGNED NOT NULL,
			`id_shop` INT(11) UNSIGNED NOT NULL,
			`label` VARCHAR( 128 ) NOT NULL ,
			`link` VARCHAR( 128 ) NOT NULL ,
			INDEX ( `id_tonylinksmenutop` , `id_lang`, `id_shop`)
		) ENGINE = '._MYSQL_ENGINE_.' CHARACTER SET utf8 COLLATE utf8_general_ci;') && Db::getInstance()->execute('
			 CREATE TABLE IF NOT EXISTS `'._DB_PREFIX_.'tonylinksmenutop_customhtml` (
			`id_tonylinksmenutop` varchar(50) NOT NULL,
			`id_lang` INT(11) UNSIGNED NOT NULL,
			`id_shop` INT(11) UNSIGNED NOT NULL,
			html text,
      badges text,
      customhtml text,
      enabled text,
			PRIMARY KEY ( `id_tonylinksmenutop` , `id_lang`, `id_shop`)
		) ENGINE = '._MYSQL_ENGINE_.' CHARACTER SET utf8 COLLATE utf8_general_ci;')//Add custom data

		);

		Db::getInstance()->execute('INSERT INTO `'._DB_PREFIX_.'tonylinksmenutop` (`id_tonylinksmenutop`, `id_shop`, `new_window`) VALUES
			(1, 1, 0),
			(2, 1, 0);');
		Db::getInstance()->execute('INSERT INTO `'._DB_PREFIX_."tonylinksmenutop_lang` (`id_tonylinksmenutop`, `id_lang`, `id_shop`, `label`, `link`) VALUES
			(1, 1, 1, 'Custom Block', '#'),
			(1, 2, 1, '', ''),
			(2, 1, 1, 'Blog', 'index.php?fc=module&module=smartblog&controller=category');");

		$default_html = Db::getInstance()->_escape('<div class="shadow">
		<div class="col-third"><img src="themes/buyshop/img/custom_block_img1.png" alt="" />
		<h3><br />Login using facebook/twitter accounts</h3>
		<p>This is a HTML block; you can create it via admin panel. There are many blocks like this on site. They are created especially to set to everybody\'s preferences. If you have any questions please make a request via our <a href="#">contact form</a></p>
		</div>
		<div class="col-third"><img src="themes/buyshop/img/custom_block_img2.png" alt="" />
		<h3><br /> Festive themes</h3>
		<p>This is a HTML block; you can create it via admin panel. There are many blocks like this on site. They are created especially to set to everybody\'s preferences. If you have any questions please make a request via our <a href="#">contact form</a></p>
		</div>
		<div class="col-third"><img src="themes/buyshop/img/custom_block_img3.png" alt="" width="230" height="180" />
		<h3><br /> Parallax slider</h3>
		<p>This is a HTML block; you can create it via admin panel. There are many blocks like this on site. They are created especially to set to everybody\'s preferences. If you have any questions please make a request via our <a href="http://buyshop.ethemeuk.com/magento/index.php/contacts">contact form</a></p>
		</div>
		</div>');

		Db::getInstance()->execute('INSERT INTO `'._DB_PREFIX_."tonylinksmenutop_customhtml` (`id_tonylinksmenutop`, `id_lang`, `id_shop`, `html`, `badges`, `customhtml`, `enabled`) VALUES
			('LNK1', 1, 1, '".$default_html."', NULL, NULL, NULL),
			('LNK2', 1, 1, '', NULL, NULL, NULL);");

		return $ret;
	}

	public function uninstall()
	{
		if (! parent::uninstall() || ! Configuration::deleteByName('MOD_TONYBLOCKTOPMENU_ITEMS') || ! $this->uninstallDB()) return false;
		return true;
	}

	private function uninstallDb()
	{
		Db::getInstance()->execute('DROP TABLE `'._DB_PREFIX_.'tonylinksmenutop`');
		Db::getInstance()->execute('DROP TABLE `'._DB_PREFIX_.'tonylinksmenutop_lang`');
		Db::getInstance()->execute('DROP TABLE `'._DB_PREFIX_.'tonylinksmenutop_customhtml`');
		return true;
	}

	public function getContent()
	{
		$id_lang = (int)Context::getContext()->language->id;
		$languages = $this->context->controller->getLanguages();
		$default_language = (int)Configuration::get('PS_LANG_DEFAULT');

		$labels = Tools::getValue('label') ? array_filter(Tools::getValue('label'), 'strlen') : array();
		$links_label = Tools::getValue('link') ? array_filter(Tools::getValue('link'), 'strlen') : array();
		$spacer = str_repeat('&nbsp;', $this->spacer_size);
		$div_lang_name = 'link_label';

		$update_cache = false;

		if (Tools::isSubmit('submitBlocktopmenu'))
		{
			//$blockhtml = '';

			foreach ($_POST as $var_name => $var_value)
			{
				if (preg_match('/^blockhtml_(.*)/', $var_name, $ret))
				{
					$block_id = $ret[1];
					if (is_array($var_value))
					{
						$id_shop = (int)Shop::getContextShopID();
						foreach ($var_value as $lng_id => $html)
						{
							$lng_id = (int)$lng_id;
							$html = Db::getInstance()->_escape($html);

							$badges = array();
							$customhtml = array();
							$enabled = array();
							foreach ($_POST as $k => $v)
							{
								if (preg_match('/^child_cat_(.*)/', $k, $ret))
								{
									$childid = $ret[1];
									$badges[$childid] = $v[$lng_id];
								}
								if (preg_match('/^child_customhtml_cat_(.*)/', $k, $ret))
								{
									$childid = $ret[1];
									$customhtml[$childid] = $v[$lng_id];
								}
								if (preg_match('/^child_enabled_cat_(.*)/', $k, $ret))
								{
									$childid = $ret[1];
									$value = Tools::strlen($v[$lng_id]) ? 0 : 1;
									$enabled[$childid] = $value;
								}
							}

							$badges = Db::getInstance()->_escape(serialize($badges));
							$customhtml = Db::getInstance()->_escape(serialize($customhtml));
							$enabled = Db::getInstance()->_escape(serialize($enabled));

							$query = 'replace into '._DB_PREFIX_."tonylinksmenutop_customhtml set id_tonylinksmenutop='$block_id',id_lang='$lng_id',id_shop='$id_shop',html='$html',badges='{$badges}',customhtml='{$customhtml}',enabled='{$enabled}'";
							Db::getInstance()->execute($query);
						}
					}
				}
			}

			if (Configuration::updateValue('MOD_TONYBLOCKTOPMENU_ITEMS', Tools::getValue('items'))) $this->html .= $this->displayConfirmation($this->l('The settings have been updated.'));
			else
				$this->html .= $this->displayError($this->l('Unable to update settings.'));
			$update_cache = true;
		}
		else if (Tools::isSubmit('submitBlocktopmenuLinks'))
		{

			if ((! count($links_label)) && (! count($labels)));
			else if (! count($links_label)) $this->html .= $this->displayError($this->l('Please complete the "link" field.'));
			else if (! count($labels)) $this->html .= $this->displayError($this->l('Please add a label'));
			else if (! isset($labels[$default_language])) $this->html .= $this->displayError($this->l('Please add a label for your default language.'));
			else
			{
				TonyMenuTopLinks::add(Tools::getValue('link'), Tools::getValue('label'), Tools::getValue('new_window', 0), (int)Shop::getContextShopID());
				$this->html .= $this->displayConfirmation($this->l('The link has been added.'));
			}
			$update_cache = true;
		}
		else if (Tools::isSubmit('submitBlocktopmenuRemove'))
		{
			$id_tonylinksmenutop = Tools::getValue('id_tonylinksmenutop', 0);
			TonyMenuTopLinks::remove($id_tonylinksmenutop, (int)Shop::getContextShopID());
			Configuration::updateValue('MOD_TONYBLOCKTOPMENU_ITEMS', str_replace(array('LNK'.$id_tonylinksmenutop.',', 'LNK'.$id_tonylinksmenutop), '', Configuration::get('MOD_TONYBLOCKTOPMENU_ITEMS')));
			$this->html .= $this->displayConfirmation($this->l('The link has been removed'));
			$update_cache = true;
		}
		else if (Tools::isSubmit('submitBlocktopmenuEdit'))
		{
			$id_tonylinksmenutop = (int)Tools::getValue('id_tonylinksmenutop', 0);
			$id_shop = (int)Shop::getContextShopID();

			if (! Tools::isSubmit('link'))
			{
				$tmp = TonyMenuTopLinks::getLinkLang($id_tonylinksmenutop, $id_shop);
				$links_label_edit = $tmp['link'];
				$labels_edit = $tmp['label'];
				$new_window_edit = $tmp['new_window'];
			}
			else
			{
				TonyMenuTopLinks::update(Tools::getValue('link'), Tools::getValue('label'), Tools::getValue('new_window', 0), (int)$id_shop, (int)$id_tonylinksmenutop, (int)$id_tonylinksmenutop);
				$this->html .= $this->displayConfirmation($this->l('The link has been edited'));
			}
			$update_cache = true;
		}

		if ($update_cache) $this->clearMenuCache();

		$this->html .= '
		<fieldset>
			<div class="multishop_info">
			'.$this->l('The modifications will be applied to').' '.(Shop::getContext() == Shop::CONTEXT_SHOP ? $this->l('shop').' '.$this->context->shop->name : $this->l('all shops')).'.
			</div>
			<legend><img src="'.$this->_path.'logo.gif" alt="" title="" />'.$this->l('Settings').'</legend>
			<form action="'.Tools::safeOutput($_SERVER['REQUEST_URI']).'" method="post" id="form">
				<div style="display: none">
				<label>'.$this->l('Items').'</label>
				<div class="margin-form">
					<input type="text" name="items" id="itemsInput" value="'.Tools::safeOutput(Configuration::get('MOD_TONYBLOCKTOPMENU_ITEMS')).'" size="70" />
				</div>
				</div>

				<div class="clear">&nbsp;</div>
				<table style="margin-left: 130px;">
					<tbody>
						<tr>
							<td style="padding-left: 20px;" valign="top">
								<select multiple="multiple" id="availableItems" style="width: 300px; height: 160px;">';

		// BEGIN CMS
		$this->html .= '<optgroup label="'.$this->l('CMS').'">';
		$this->getCMSOptions(0, 1, $id_lang);
		$this->html .= '</optgroup>';

		// BEGIN SUPPLIER
		$this->html .= '<optgroup label="'.$this->l('Supplier').'">';
		$suppliers = Supplier::getSuppliers(false, $id_lang);
		foreach ($suppliers as $supplier) $this->html .= '<option value="SUP'.$supplier['id_supplier'].'">'.$spacer.$supplier['name'].'</option>';
		$this->html .= '</optgroup>';

		// BEGIN Manufacturer
		$this->html .= '<optgroup label="'.$this->l('Manufacturer').'">';
		$manufacturers = Manufacturer::getManufacturers(false, $id_lang);
		foreach ($manufacturers as $manufacturer) $this->html .= '<option value="MAN'.$manufacturer['id_manufacturer'].'">'.$spacer.$manufacturer['name'].'</option>';
		$this->html .= '</optgroup>';

		// BEGIN Categories
		$this->html .= '<optgroup label="'.$this->l('Categories').'">';
		$this->getCategoryOption(1, (int)$id_lang, (int)Shop::getContextShopID());
		$this->html .= '</optgroup>';

		// BEGIN Shops
		if (Shop::isFeatureActive())
		{
			$this->html .= '<optgroup label="'.$this->l('Shops').'">';
			$shops = Shop::getShopsCollection();
			foreach ($shops as $shop)
			{
				if (! $shop->setUrl() && ! $shop->getBaseURL()) continue;
				$this->html .= '<option value="SHOP'.(int)$shop->id.'">'.$spacer.$shop->name.'</option>';
			}
			$this->html .= '</optgroup>';
		}

		// BEGIN Products
		$this->html .= '<optgroup label="'.$this->l('Products').'">';
		$this->html .= '<option value="PRODUCT" style="font-style:italic">'.$spacer.$this->l('Choose product ID').'</option>';
		$this->html .= '</optgroup>';

		// BEGIN Menu Top Links
		$this->html .= '<optgroup label="'.$this->l('Menu Top Links').'">';
		$links = TonyMenuTopLinks::gets($id_lang, null, (int)Shop::getContextShopID());
		foreach ($links as $link)
		{
			if ($link['label'] == '')
			{
				$link = TonyMenuTopLinks::get($link['id_tonylinksmenutop'], $default_language, (int)Shop::getContextShopID());
				$this->html .= '<option value="LNK'.(int)$link[0]['id_tonylinksmenutop'].'">'.$spacer.$link[0]['label'].'</option>';
			}
			else
				$this->html .= '<option value="LNK'.(int)$link['id_tonylinksmenutop'].'">'.$spacer.$link['label'].'</option>';
		}
		$this->html .= '</optgroup>';

		$this->html .= '</select><br />
								<br />
								<a href="#" id="addItem" style="border: 1px solid rgb(170, 170, 170); margin: 2px; padding: 2px; text-align: center; display: block; text-decoration: none; background-color: rgb(250, 250, 250); color: rgb(18, 52, 86);">'.$this->l('Add').' &gt;&gt;</a>
							</td>
							<td>
<table>
<tr><td valign="top">
								<select multiple="multiple" id="items" style="width: 300px; height: 160px;">';
		$this->makeMenuOption();
		$this->html .= '</select>

    <br/>
								<br/>
								<a href="#" id="removeItem" style="border: 1px solid rgb(170, 170, 170); margin: 2px; padding: 2px; text-align: center; display: block; text-decoration: none; background-color: rgb(250, 250, 250); color: rgb(18, 52, 86);">&lt;&lt; '.$this->l('Remove').'</a>
</td>
<td id="htmlblock-wrapper" valign="top" style="height:250px;">
</td>
</tr></table>
							</td>
						</tr>
					</tbody>
				</table>
				<div class="clear">&nbsp;</div>
				<script type="text/javascript">
				$(document).ready(function(){
					$("#addItem").click(add);
					$("#availableItems").dblclick(add);
					$("#removeItem").click(remove);
					$("#items").dblclick(remove);

          $("#items").click(function(){
          var curr = $(this).val();
          $("#htmlblock-wrapper").html("");
					$.ajax({
					   type: \'POST\',
					   url: \''.__PS_BASE_URI__.'\' + \'modules/tonythemeblocktopmenu/ajax_get_htmlblock.php\',
					   data: \'id=\'+curr,
					   success: function(result)
					   {
					     $("#htmlblock-wrapper").html(result);
             }
					});
					  return false;
          });
					function add()
					{
						$("#availableItems option:selected").each(function(i){
							var val = $(this).val();
							var text = $(this).text();
							text = text.replace(/(^\s*)|(\s*$)/gi,"");
							if (val == "PRODUCT")
							{
								val = prompt("'.$this->l('Set ID product').'");
								if (val == null || val == "" || isNaN(val))
									return;
								text = "'.$this->l('Product ID').' "+val;
								val = "PRD"+val;
							}
							$("#items").append("<option value=\""+val+"\">"+text+"</option>");
						});
						serialize();
						return false;
					}
					function remove()
					{
						$("#items option:selected").each(function(i){
							$(this).remove();
						});
						serialize();
						return false;
					}
					function serialize()
					{
						var options = "";
						$("#items option").each(function(i){
							options += $(this).val()+",";
						});
						$("#itemsInput").val(options.substr(0, options.length - 1));
					}
				});
				</script>
				<p class="center">
					<input type="submit" name="submitBlocktopmenu" value="'.$this->l('Save	').'" class="button" style="cursor:pointer;" />
				</p>
			</form>
		</fieldset><br />';

		$this->html .= '
<style>
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
			<legend><img src="../img/admin/add.gif" alt="" title="" />'.$this->l('Add Menu Top Link').'</legend>
			<form action="'.Tools::safeOutput($_SERVER['REQUEST_URI']).'" method="post" id="form">

				';
		foreach ($languages as $language)
		{
			$this->html .= '
					<div id="link_label_'.(int)$language['id_lang'].'" style="display: '.($language['id_lang'] == $id_lang ? 'block' : 'none').';">
				<label>'.$this->l('Label').'</label>
				<div class="margin-form">
						<input type="text" name="label['.(int)$language['id_lang'].']" id="label_'.(int)$language['id_lang'].'" size="70" value="'.(isset($labels_edit[$language['id_lang']]) ? Tools::safeOutput($labels_edit[$language['id_lang']]) : '').'" />
			  </div>
					';

			$this->html .= '
				  <label>'.$this->l('Link').'</label>
				<div class="margin-form">
					<input type="text" name="link['.(int)$language['id_lang'].']" id="link_'.(int)$language['id_lang'].'" value="'.(isset($links_label_edit[$language['id_lang']]) ? Tools::safeOutput($links_label_edit[$language['id_lang']]) : '').'" size="70" />
				</div>
				</div>';
		}

		$this->html .= '<label>'.$this->l('Language').'</label>
				<div class="margin-form">'.$this->displayFlags($languages, (int)$id_lang, $div_lang_name, 'link_label', true).'</div><p style="clear: both;"> </p>';

		$this->html .= '<label style="clear: both;">'.$this->l('New Window').'</label>
				<div class="margin-form">
					<input style="clear: both;" type="checkbox" name="new_window" value="1" '.(isset($new_window_edit) && $new_window_edit ? 'checked' : '').'/>
				</div>
<div class="margin-form">';

		if (Tools::isSubmit('id_tonylinksmenutop')) $this->html .= '<input type="hidden" name="id_tonylinksmenutop" value="'.(int)Tools::getValue('id_tonylinksmenutop').'" />';

		if (Tools::isSubmit('submitBlocktopmenuEdit')) $this->html .= '<input type="submit" name="submitBlocktopmenuEdit" value="'.$this->l('Edit').'" class="button" style="cursor:pointer;" />';

		$this->html .= '
					<input type="submit" name="submitBlocktopmenuLinks" value="'.$this->l('Add	').'" class="button" style="cursor:pointer;" />
</div>

			</form>
		</fieldset><br />';

		$links = TonyMenuTopLinks::gets((int)$id_lang, null, (int)Shop::getContextShopID());

		if (! count($links)) return $this->html;

		$this->html .= '
		<fieldset>
			<legend><img src="../img/admin/details.gif" alt="" title="" />'.$this->l('List Menu Top Link').'</legend>
			<table style="width:100%;">
				<thead>
					<tr style="text-align: left;">
						<th>'.$this->l('Id Link').'</th>
						<th>'.$this->l('Label').'</th>
						<th>'.$this->l('Link').'</th>
						<th>'.$this->l('New Window').'</th>
						<th>'.$this->l('Action').'</th>
					</tr>
				</thead>
				<tbody>';
		foreach ($links as $link)
		{
			$this->html .= '
					<tr>
						<td>'.(int)$link['id_tonylinksmenutop'].'</td>
						<td>'.Tools::safeOutput($link['label']).'</td>
						<td><a href="'.Tools::safeOutput($link['link']).'"'.(($link['new_window']) ? ' target="_blank"' : '').'>'.Tools::safeOutput($link['link']).'</a></td>
						<td>'.(($link['new_window']) ? $this->l('Yes') : $this->l('No')).'</td>
						<td>
							<form action="'.Tools::safeOutput($_SERVER['REQUEST_URI']).'" method="post">
								<input type="hidden" name="id_tonylinksmenutop" value="'.(int)$link['id_tonylinksmenutop'].'" />
								<input type="submit" name="submitBlocktopmenuEdit" value="'.$this->l('Edit').'" class="button" style="cursor:pointer;" />
								<input type="submit" name="submitBlocktopmenuRemove" value="'.$this->l('Remove').'" class="button" style="cursor:pointer;"/>
							</form>
						</td>
					</tr>';
		}
		$this->html .= '</tbody>
			</table>
		</fieldset>';
		return $this->html;
	}

	private function getMenuItems()
	{
		return explode(',', Configuration::get('MOD_TONYBLOCKTOPMENU_ITEMS'));
	}

	private function makeMenuOption()
	{
		$menu_item = $this->getMenuItems();
		$id_lang = (int)$this->context->language->id;
		$id_shop = (int)Shop::getContextShopID();
		foreach ($menu_item as $item)
		{
			if (! $item) continue;

			preg_match($this->pattern, $item, $values);
			$id = (int)Tools::substr($item, Tools::strlen($values[1]), Tools::strlen($item));

			switch (Tools::substr($item, 0, Tools::strlen($values[1])))
			{
				case 'CAT':
					$category = new Category((int)$id, (int)$id_lang);
					if (Validate::isLoadedObject($category)) $this->html .= '<option value="CAT'.$id.'">'.$category->name.'</option>'.PHP_EOL;
					break;

				case 'PRD':
					$product = new Product((int)$id, true, (int)$id_lang);
					if (Validate::isLoadedObject($product)) $this->html .= '<option value="PRD'.$id.'">'.$product->name.'</option>'.PHP_EOL;
					break;

				case 'CMS':
					$cms = new CMS((int)$id, (int)$id_lang);
					if (Validate::isLoadedObject($cms)) $this->html .= '<option value="CMS'.$id.'">'.$cms->meta_title.'</option>'.PHP_EOL;
					break;

				case 'CMS_CAT':
					$category = new CMSCategory((int)$id, (int)$id_lang);
					if (Validate::isLoadedObject($category)) $this->html .= '<option value="CMS_CAT'.$id.'">'.$category->name.'</option>'.PHP_EOL;
					break;

				case 'MAN':
					$manufacturer = new Manufacturer((int)$id, (int)$id_lang);
					if (Validate::isLoadedObject($manufacturer)) $this->html .= '<option value="MAN'.$id.'">'.$manufacturer->name.'</option>'.PHP_EOL;
					break;

				case 'SUP':
					$supplier = new Supplier((int)$id, (int)$id_lang);
					if (Validate::isLoadedObject($supplier)) $this->html .= '<option value="SUP'.$id.'">'.$supplier->name.'</option>'.PHP_EOL;
					break;

				case 'LNK':
					$link = TonyMenuTopLinks::get((int)$id, (int)$id_lang, (int)$id_shop);
					if (count($link))
					{
						if (! isset($link[0]['label']) || ($link[0]['label'] == ''))
						{
							$default_language = Configuration::get('PS_LANG_DEFAULT');
							$link = TonyMenuTopLinks::get($link[0]['id_tonylinksmenutop'], (int)$default_language, (int)Shop::getContextShopID());
						}
						$this->html .= '<option value="LNK'.$link[0]['id_tonylinksmenutop'].'">'.$link[0]['label'].'</option>';
					}
					break;
				case 'SHOP':
					$shop = new Shop((int)$id);
					if (Validate::isLoadedObject($shop)) $this->html .= '<option value="SHOP'.(int)$id.'">'.$shop->name.'</option>'.PHP_EOL;
					break;
			}
		}
	}

	private function makeMenu()
	{
		$menu_items = $this->getMenuItems();
		$id_lang = (int)$this->context->language->id;
		$id_shop = (int)Shop::getContextShopID();

		foreach ($menu_items as $item)
		{
			if (! $item) continue;

			preg_match($this->pattern, $item, $value);
			$id = (int)Tools::substr($item, Tools::strlen($value[1]), Tools::strlen($item));

			$item = Db::getInstance()->_escape($item);
			$query = 'select * from '._DB_PREFIX_."tonylinksmenutop_customhtml where id_lang='$id_lang' and id_shop='$id_shop' and id_tonylinksmenutop='{$item}'";
			$rows = Db::getInstance()->executeS($query);

			$item_html = $rows[0]['html'];
			$item_badges = unserialize($rows[0]['badges']);
			$item_custom_html = unserialize($rows[0]['customhtml']);
			$item_enabled = unserialize($rows[0]['enabled']);

			switch (Tools::substr($item, 0, Tools::strlen($value[1])))
			{
				case 'CAT':

					$id_lang = $id_lang ? (int)$id_lang : (int)Context::getContext()->language->id;
					$c = new Category((int)$id, $id_lang);
					$category = array();

					$category_link = $c->getLink();
					$selected = ($this->page_name == 'category' && ((int)Tools::getValue('id_category') == $id)) ? 1 : 0;
					$is_intersected = array_intersect($c->getGroups(), $this->user_groups);

					if ($is_intersected)
					{
						$this->getCategory((int)$id, $category);
						foreach ($category as $index => &$cat)
						{
							if (isset($item_badges[$cat['id']]))
								$cat['badge'] = $item_badges[$cat['id']];
							if (isset($item_custom_html[$cat['id']]))
								$cat['customhtml'] = $item_custom_html[$cat['id']];
							if ((int)($item_enabled[$cat['id']]) != 0)
								unset($category[$index]);
						}
						$label = $c->name;
						if ($c->id_category == 1 || $c->id_category == 2)
							$category_link = __PS_BASE_URI__;
						foreach ($category as &$catitem) $catitem['image'] = $this->context->link->getCatImageLink($catitem['link_rewrite'], $catitem['id'], 'tonytheme_category_icon');
						$this->menu[] = array('link' => $category_link, 'label' => $label, 'selected' => $selected, 'type' => 'CAT', 'childs' => $category, 'htmlblock' => $item_html, 'target' => '');
					}

					break;

				case 'PRD':
					$selected = ($this->page_name == 'product' && (Tools::getValue('id_product') == $id)) ? 1 : 0;
					$product = new Product((int)$id, true, (int)$id_lang);
					if (! is_null($product->id)) $this->menu[] = array('link' => $product->getLink(), 'label' => $product->name, 'selected' => $selected, 'htmlblock' => $item_html, 'target' => '', 'childs' => '');
					break;

				case 'CMS':
					$selected = ($this->page_name == 'cms' && (Tools::getValue('id_cms') == $id)) ? 1 : 0;
					$cms = CMS::getLinks((int)$id_lang, array($id));
					if (count($cms)) $this->menu[] = array('link' => $cms[0]['link'], 'label' => $cms[0]['meta_title'], 'selected' => $selected, 'htmlblock' => $item_html, 'target' => '', 'childs' => '');
					break;

				case 'CMS_CAT':
					$category = new CMSCategory((int)$id, (int)$id_lang);
					if (count($category))
					{
						$childs = array();
						$this->getCMSMenuItems($category->id, $childs);
						$this->menu[] = array('link' => $category->getLink(), 'label' => $category->name, 'childs' => $childs, 'htmlblock' => $item_html, 'target' => '', 'childs' => '');
					}
					break;

				case 'MAN':
					$selected = ($this->page_name == 'manufacturer' && (Tools::getValue('id_manufacturer') == $id)) ? 1 : 0;
					$manufacturer = new Manufacturer((int)$id, (int)$id_lang);
					if (! is_null($manufacturer->id))
					{
						if ((int)Configuration::get('PS_REWRITING_SETTINGS')) $manufacturer->link_rewrite = Tools::link_rewrite($manufacturer->name, false);
						else
							$manufacturer->link_rewrite = 0;
						$link = new Link;
						$this->menu[] = array('link' => $link->getManufacturerLink((int)$id, $manufacturer->link_rewrite), 'label' => $manufacturer->name, 'selected' => $selected, 'htmlblock' => $item_html, 'target' => '', 'childs' => '');
					}
					break;

				case 'SUP':
					$selected = ($this->page_name == 'supplier' && (Tools::getValue('id_supplier') == $id)) ? 1 : 0;
					$supplier = new Supplier((int)$id, (int)$id_lang);
					if (! is_null($supplier->id))
					{
						$link = new Link;
						$this->menu[] = array('link' => $link->getSupplierLink((int)$id, $supplier->link_rewrite), 'label' => $supplier->name, 'selected' => $selected, 'htmlblock' => $item_html, 'target' => '', 'childs' => '');
					}
					break;

				case 'SHOP':
					$selected = ($this->page_name == 'index' && ($this->context->shop->id == $id)) ? 1 : 0;
					$shop = new Shop((int)$id);
					if (Validate::isLoadedObject($shop))
					{
						$link = new Link;
						$this->menu[] = array('link' => $shop->getBaseURL(), 'label' => $shop->name, 'selected' => $selected, 'htmlblock' => $item_html, 'target' => '', 'childs' => '');
					}
					break;
				case 'LNK':
					$link = TonyMenuTopLinks::get((int)$id, (int)$id_lang, (int)$id_shop);
					if (count($link))
					{
						if (! isset($link[0]['label']) || ($link[0]['label'] == ''))
						{
							$default_language = Configuration::get('PS_LANG_DEFAULT');
							$link = TonyMenuTopLinks::get($link[0]['id_tonylinksmenutop'], $default_language, (int)Shop::getContextShopID());
						}
						$this->menu[] = array('link' => $link[0]['link'], 'label' => $link[0]['label'], 'target' => (($link[0]['new_window']) ? '_blank' : ''), 'htmlblock' => $item_html, 'childs' => '');
					}
					break;
			}
		}
	}

	private function getCategoryOption($id_category = 1, $id_lang = false, $id_shop = false, $recursive = true)
	{
		$id_lang = $id_lang ? (int)$id_lang : (int)Context::getContext()->language->id;
		$category = new Category((int)$id_category, (int)$id_lang, (int)$id_shop);

		if (is_null($category->id)) return;

		if ($recursive)
		{
			$children = Category::getChildren((int)$id_category, (int)$id_lang, true, (int)$id_shop);
			$spacer = str_repeat('&nbsp;', $this->spacer_size * (int)$category->level_depth);
		}

		$shop = (object)Shop::getShop((int)$category->getShopID());
		$this->html .= '<option value="CAT'.(int)$category->id.'">'.(isset($spacer) ? $spacer : '').$category->name.' ('.$shop->name.')</option>';

		if (isset($children) && count($children)) foreach ($children as $child) $this->getCategoryOption((int)$child['id_category'], (int)$id_lang, (int)$child['id_shop']);
	}

	private function getCategory($id_category, &$cats, $id_lang = false, $id_shop = false)
	{
		$id_lang = $id_lang ? (int)$id_lang : (int)Context::getContext()->language->id;
		$category = new Category((int)$id_category, (int)$id_lang);

		//if ($category->level_depth > 1) $category_link = $category->getLink();
		//else
		//	$category_link = $this->context->link->getPageLink('index');

		if (is_null($category->id)) return;

		$children = Category::getChildren((int)$id_category, (int)$id_lang, true, (int)$id_shop);

		//$selected = ($this->page_name == 'category' && ((int)Tools::getValue('id_category') == $id_category)) ? 1 : 0;

		$is_intersected = array_intersect($category->getGroups(), $this->user_groups);
		// filter the categories that the user is allowed to see and browse
		if (! empty($is_intersected))
		{

			//$childs = array();

			if (count($children))
			{
				foreach ($children as $child)
				{
					$cat_childs = array();
					$this->getCategory((int)$child['id_category'], $cat_childs, (int)$id_lang, (int)$child['id_shop']);
					$category2 = new Category((int)$child['id_category'], (int)$id_lang);
					$category_link2 = $category2->getLink();
					$cats[] = array('link' => $category_link2, 'label' => $category2->name, 'childs' => $cat_childs, 'id' => $category2->id_category, 'link_rewrite' => $category2->link_rewrite);
				}
			}

			//$cats[] = array('link'=>$category_link,'label'=>$category->name,'selected'=>$selected,'childs'=>$childs);
		}
	}

	private function getCMSMenuItems($parent, &$childs, $depth = 1, $id_lang = false)
	{
		$id_lang = $id_lang ? (int)$id_lang : (int)Context::getContext()->language->id;

		if ($depth > 3) return;

		$categories = $this->getCMSCategories(false, (int)$parent, (int)$id_lang);
		$pages = $this->getCMSPages((int)$parent);

		if (count($categories) || count($pages))
		{
			foreach ($pages as $page)
			{
				$cms = new CMS($page['id_cms'], (int)$id_lang);
				$links = $cms->getLinks((int)$id_lang, array((int)$cms->id));

				$selected = ($this->page_name == 'cms' && ((int)Tools::getValue('id_cms') == $page['id_cms'])) ? 1 : 0;
				$childs[] = array('link' => $links[0]['link'], 'label' => $cms->meta_title, 'selected' => $selected);
			}
		}
	}

	private function getCMSOptions($parent = 0, $depth = 1, $id_lang = false)
	{
		$id_lang = $id_lang ? (int)$id_lang : (int)Context::getContext()->language->id;

		$categories = $this->getCMSCategories(false, (int)$parent, (int)$id_lang);
		$pages = $this->getCMSPages((int)$parent, false, (int)$id_lang);

		$spacer = str_repeat('&nbsp;', $this->spacer_size * (int)$depth);

		foreach ($categories as $category)
		{
			$this->html .= '<option value="CMS_CAT'.$category['id_cms_category'].'" style="font-weight: bold;">'.$spacer.$category['name'].'</option>';
			$this->getCMSOptions($category['id_cms_category'], (int)$depth + 1, (int)$id_lang);
		}

		foreach ($pages as $page) $this->html .= '<option value="CMS'.$page['id_cms'].'">'.$spacer.$page['meta_title'].'</option>';
	}

	protected function getCacheId($name = null)
	{
		parent::getCacheId($name);
		$page_name = in_array($this->page_name, array('category', 'supplier', 'manufacturer', 'cms', 'product')) ? $this->page_name : 'index';
		return 'tonythemeblocktopmenu|'.(int)Tools::usingSecureMode().'|'.$page_name.'|'.(int)$this->context->shop->id.'|'.implode(', ', $this->user_groups).'|'.(int)$this->context->language->id.'|'.(int)Tools::getValue('id_category').'|'.(int)Tools::getValue('id_manufacturer').'|'.(int)Tools::getValue('id_supplier').'|'.(int)Tools::getValue('id_cms').'|'.(int)Tools::getValue('id_product');
	}

	public function hookDisplayTop($param)
	{
		$this->user_groups = ($this->context->customer->isLogged() ? $this->context->customer->getGroups() : array(Configuration::get('PS_UNIDENTIFIED_GROUP')));
		$this->page_name = Dispatcher::getInstance()->getController();

		if (! $this->isCached('tonythemeblocktopmenu.tpl', $this->getCacheId()))
		{
			$this->makeMenu();

			foreach ($this->menu as &$item)
			{
				if (is_array($item['childs']))
				{
					if (Tools::strlen($item['htmlblock'])) if ($item['type'] == 'CAT') $splice = 4;
					else
						$splice = 4;
					else
					{
						if ($item['type'] == 'CAT') $splice = 6;
						else
							$splice = 6;
					}

					$childs = array();
					while ($ret = @array_splice($item['childs'], 0, $splice)) $childs[] = $ret;

					$item['childs'] = $childs;
				}
			}
			$this->smarty->assign('MENU', $this->menu);
			$this->smarty->assign('this_path', $this->_path);
		}

		$this->context->controller->addCSS($this->_path.'css/megamenu.css');

		$html = $this->display(__FILE__, 'views/templates/front/tonythemeblocktopmenu.tpl' /*, $this->getCacheId()*/);
		return $html;
	}

	public function hookDisplayTopSpy($param)
	{
		$this->user_groups = ($this->context->customer->isLogged() ? $this->context->customer->getGroups() : array(Configuration::get('PS_UNIDENTIFIED_GROUP')));
		$this->page_name = Dispatcher::getInstance()->getController();

		if (! $this->isCached('tonythemeblocktopmenu_spy.tpl', $this->getCacheId()))
		{
			$this->makeMenu();

			foreach ($this->menu as &$item)
			{
				if (is_array($item['childs']))
				{
					if (Tools::strlen($item['htmlblock'])) if ($item['type'] == 'CAT')
						$splice = 4;
					else
						$splice = 4;
					else
					{
						if ($item['type'] == 'CAT')
							$splice = 6;
						else
							$splice = 3;
					}

					$childs = array();
					while ($ret = @array_splice($item['childs'], 0, $splice)) $childs[] = $ret;

					$item['childs'] = $childs;
				}
			}
			$this->smarty->assign('MENU', $this->menu);
			$this->smarty->assign('this_path', $this->_path);
		}

		//$this->context->controller->addJS($this->_path.'js/hoverIntent.js');
		//$this->context->controller->addJS($this->_path.'js/superfish-modified.js');
		//$this->context->controller->addCSS($this->_path.'css/superfish-modified.css');
		$this->context->controller->addCSS($this->_path.'css/megamenu.css');

		$html = $this->display(__FILE__, 'views/templates/front/tonythemeblocktopmenu_spy.tpl', $this->getCacheId());
		return $html;
	}

	private function getCMSCategories($recursive = false, $parent = 1, $id_lang = false)
	{
		$id_lang = $id_lang ? (int)$id_lang : (int)Context::getContext()->language->id;

		if ($recursive === false)
		{
			$sql = 'SELECT bcp.`id_cms_category`, bcp.`id_parent`, bcp.`level_depth`, bcp.`active`, bcp.`position`, cl.`name`, cl.`link_rewrite`
				FROM `'._DB_PREFIX_.'cms_category` bcp
				INNER JOIN `'._DB_PREFIX_.'cms_category_lang` cl
				ON (bcp.`id_cms_category` = cl.`id_cms_category`)
				WHERE cl.`id_lang` = '.(int)$id_lang.'
				AND bcp.`id_parent` = '.(int)$parent;

			return Db::getInstance()->executeS($sql);
		}
		else
		{
			$sql = 'SELECT bcp.`id_cms_category`, bcp.`id_parent`, bcp.`level_depth`, bcp.`active`, bcp.`position`, cl.`name`, cl.`link_rewrite`
				FROM `'._DB_PREFIX_.'cms_category` bcp
				INNER JOIN `'._DB_PREFIX_.'cms_category_lang` cl
				ON (bcp.`id_cms_category` = cl.`id_cms_category`)
				WHERE cl.`id_lang` = '.(int)$id_lang.'
				AND bcp.`id_parent` = '.(int)$parent;

			$results = Db::getInstance()->executeS($sql);
			$categories = array();
			foreach ($results as $result)
			{
				$sub_categories = $this->getCMSCategories(true, $result['id_cms_category'], (int)$id_lang);
				if ($sub_categories && count($sub_categories) > 0) $result['sub_categories'] = $sub_categories;
				$categories[] = $result;
			}

			return isset($categories) ? $categories : false;
		}
	}

	private function getCMSPages($id_cms_category, $id_shop = false, $id_lang = false)
	{
		$id_shop = ($id_shop !== false) ? (int)$id_shop : (int)Context::getContext()->shop->id;
		$id_lang = $id_lang ? (int)$id_lang : (int)Context::getContext()->language->id;

		$sql = 'SELECT c.`id_cms`, cl.`meta_title`, cl.`link_rewrite`
			FROM `'._DB_PREFIX_.'cms` c
			INNER JOIN `'._DB_PREFIX_.'cms_shop` cs
			ON (c.`id_cms` = cs.`id_cms`)
			INNER JOIN `'._DB_PREFIX_.'cms_lang` cl
			ON (c.`id_cms` = cl.`id_cms`)
			WHERE c.`id_cms_category` = '.(int)$id_cms_category.'
			AND cs.`id_shop` = '.(int)$id_shop.'
			AND cl.`id_lang` = '.(int)$id_lang.'
			AND c.`active` = 1
			ORDER BY `position`';

		return Db::getInstance()->executeS($sql);
	}

	public function hookActionObjectCategoryUpdateAfter($params)
	{
		$this->clearMenuCache();
	}

	public function hookActionObjectCategoryDeleteAfter($params)
	{
		$this->clearMenuCache();
	}

	public function hookActionObjectCmsUpdateAfter($params)
	{
		$this->clearMenuCache();
	}

	public function hookActionObjectCmsDeleteAfter($params)
	{
		$this->clearMenuCache();
	}

	public function hookActionObjectSupplierUpdateAfter($params)
	{
		$this->clearMenuCache();
	}

	public function hookActionObjectSupplierDeleteAfter($params)
	{
		$this->clearMenuCache();
	}

	public function hookActionObjectManufacturerUpdateAfter($params)
	{
		$this->clearMenuCache();
	}

	public function hookActionObjectManufacturerDeleteAfter($params)
	{
		$this->clearMenuCache();
	}

	public function hookActionObjectProductUpdateAfter($params)
	{
		$this->clearMenuCache();
	}

	public function hookActionObjectProductDeleteAfter($params)
	{
		$this->clearMenuCache();
	}

	public function hookCategoryUpdate($params)
	{
		$this->clearMenuCache();
	}

	private function clearMenuCache()
	{
		$this->_clearCache('tonythemeblocktopmenu.tpl');
		$this->_clearCache('tonythemeblocktopmenu_spy.tpl');
	}

	public function hookActionShopDataDuplication($params)
	{
		$linksmenutop = Db::getInstance()->executeS('
			SELECT *
			FROM '._DB_PREFIX_.'tonylinksmenutop
			WHERE id_shop = '.(int)$params['old_id_shop']);

		foreach ($linksmenutop as $id => $link)
		{
			Db::getInstance()->execute('
				INSERT IGNORE INTO '._DB_PREFIX_.'tonylinksmenutop (id_tonylinksmenutop, id_shop, new_window)
				VALUES (null, '.(int)$params['new_id_shop'].', '.(int)$link['new_window'].')');

			$linksmenutop[$id]['new_id_tonylinksmenutop'] = Db::getInstance()->Insert_ID();
		}

		foreach ($linksmenutop as $id => $link)
		{
			$lang = Db::getInstance()->executeS('
					SELECT id_lang, '.(int)$params['new_id_shop'].', label, link
					FROM '._DB_PREFIX_.'tonylinksmenutop_lang
					WHERE id_tonylinksmenutop = '.(int)$link['id_tonylinksmenutop'].' AND id_shop = '.(int)$params['old_id_shop']);

			foreach ($lang as $l) Db::getInstance()->execute('
					INSERT IGNORE INTO '._DB_PREFIX_.'tonylinksmenutop_lang (id_tonylinksmenutop, id_lang, id_shop, label, link)
					VALUES ('.(int)$link['new_id_tonylinksmenutop'].', '.(int)$l['id_lang'].', '.(int)$params['new_id_shop'].', '.(int)$l['label'].', '.(int)$l['link'].' )');
		}
	}

	public function getCustomHtmlForm($item_id)
	{
		$sub_cats_html = '';
		$id_lang = (int)Context::getContext()->language->id;
		//$default_language = (int)Configuration::get('PS_LANG_DEFAULT');
		$languages = Language::getLanguages(false);
		$id_shop = (int)Shop::getContextShopID();

		$item_id = Db::getInstance()->_escape($item_id);
		//Get default values
		$rows = Db::getInstance()->executeS('
			select * from '._DB_PREFIX_.'tonylinksmenutop_customhtml
			  where id_tonylinksmenutop=\''.$item_id.'\' and id_shop=\''.$id_shop.'\'
		');

		$def_values = array();
		foreach ($rows as $row)
		{
			$def_values[$row['id_lang']]['html'] = $row['html'];
			$def_values[$row['id_lang']]['badges'] = unserialize($row['badges']);
			$def_values[$row['id_lang']]['customhtml'] = unserialize($row['customhtml']);
			$def_values[$row['id_lang']]['enabled'] = unserialize($row['enabled']);
		}


		$category_id = 0;
		if (preg_match('/^CAT([\d]+)$/', $item_id, $ret))
		{ //this is category
			$category_id = $ret[1];
			$children = Category::getChildren((int)$category_id, (int)$id_lang, true, (int)$id_shop);
		}


		$content = '
<style>    
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
    <fieldset><legend>'.$this->l('Menu parameters').'</legend><div style="float:left;">'.$this->l('Language').'</div>
				<div style="float:left;">'.$this->displayFlags($languages, (int)$id_lang, 'html_block', 'html_block', true).'</div><p style="clear: both;"> </p>';

		foreach ($languages as $language)
		{
			if ($category_id)
			{
				$sub_cats_html = '<h4>'.$this->l('Child categories:').'</h4><table>';
				foreach ($children as $cat)
				{
					$sub_cats_html .= '<tr><td><b>'.$cat['name'].'</b></td></tr>';
					$sub_cats_html .= '<tr>';
					$checked = ((int)$def_values[$language['id_lang']]['enabled'][$cat['id_category']] == 0) ? 'checked' : '';
					$sub_cats_html .= '<td>'.$this->l('Enable').':<input type="checkbox" name="child_enabled_cat_'.$cat['id_category'].'['.(int)$language['id_lang'].']" value="0" '.$checked.'/></td>';
					$sub_cats_html .= '</tr>';
					$sub_cats_html .= '<tr>';
					$sub_cats_html .= '<td>'.$this->l('Badge').':<input type="text" name="child_cat_'.$cat['id_category'].'['.(int)$language['id_lang'].']" value="'.htmlspecialchars($def_values[$language['id_lang']]['badges'][$cat['id_category']]).'" size="55"/></td>';
					$sub_cats_html .= '</tr>';
					$sub_cats_html .= '<tr>';
					$sub_cats_html .= '<td>'.$this->l('Custom html').':<br /><textarea name="child_customhtml_cat_'.$cat['id_category'].'['.(int)$language['id_lang'].']" style="width:400px;height:100px;">'.$def_values[$language['id_lang']]['customhtml'][$cat['id_category']].'</textarea></td>';
					$sub_cats_html .= '</tr>';
					$sub_cats_html .= '<tr><td><hr style="border:1px solid grey !important;"/></td></tr>';
				}
				$sub_cats_html .= '</table>';
			}

			$content .= '
					<div id="html_block_'.(int)$language['id_lang'].'" style="display: '.($language['id_lang'] == $id_lang ? 'block' : 'none').';">
				<div>
          <h4>'.$this->l('Custom HTML block').'</h4>
						<textarea name="blockhtml_'.$item_id.'['.(int)$language['id_lang'].']" id="label_'.(int)$language['id_lang'].'" cols="70" rows="8">'.$def_values[$language['id_lang']]['html'].'</textarea>
			  </div>
        '.$sub_cats_html.'
			  </div>
					';
		}

		$content .= '</fieldset>';


		return $content;
	}

	public function stripslashesRec(&$link)
	{
		if (is_array($link))
			foreach ($link as &$element) $this->stripslashesRec($element);
		else
			$link = Tools::stripslashes($link);
		return true;
	}

}
