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

class TonyTestimonials extends Module
{

	public function __construct()
	{
		$this->name = 'tonytestimonials';
		$this->tab = 'front_office_features';
		$this->version = '1.0';
		$this->author = 'TonyTheme';
		$this->need_instance = 0;
		$this->module_key = '39034886a62663fa5f8392c47133d42f';

		parent::__construct();

		$this->displayName = $this->l('Testimonials');
		$this->description = $this->l('Adds testimonials block');
		$this->confirmUninstall = $this->l('Are you sure you want to uninstall?');
	}

	public function install()
	{
		if (Shop::isFeatureActive()) Shop::setContext(Shop::CONTEXT_ALL);

		$cfg = array();
		$cfg['button_color'] = '#c4c4c4';
		$cfg['button_hover_color'] = '#29abe2';

		$cfg = serialize($cfg);
		$ret = parent::install() && $this->registerHook('home') && $this->registerHook('header') && $this->installDb() && Configuration::updateValue($this->name.'_settings', $cfg);

		return $ret;
	}

	public function installDb()
	{
		$query = '
			CREATE TABLE IF NOT EXISTS `'._DB_PREFIX_.'tonytestimonials` (
				`slide_id` INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
				`id_shop` INT(11) UNSIGNED NOT NULL,
				sort_order int default 0,
				`name` varchar(32),
				`position` varchar(45),
				`text` text,
				INDEX (`id_shop`)
			) ENGINE = '._MYSQL_ENGINE_.' CHARACTER SET utf8 COLLATE utf8_general_ci;
		';
		$query2 = '
			INSERT INTO `'._DB_PREFIX_.'tonytestimonials` (`slide_id`, `id_shop`, `sort_order`, `name`, `position`, `text`) VALUES
				(1, 1, 1, \'John Smith\', \'Director of Marketing\', \'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec eros tellus, scelerisque nec, magnis dis parturient nibh egestas orci. Aliquam lectus. Morbi eget dolor ullamcorper massa pellentesque sagittis. Morbi sit amet quam. Nulla mauris ipsum, convallis ut, vestibulum eu, tincidunt vel, nisi.\'),
				(2, 1, 2, \'Jodie Smith\', \'Designer and Developer\', \'Morbi pharetra ac tellus sed blandit. Sed consequat felis nec nulla euismod imperdiet. Sed id feugiat diam. Aenean purus dui, imperdiet vitae sollicitudin at, vehicula ut quam. Quisque sodales diam nec pellentesque faucibus. Donec volutpat rutrum metus, vel ullamcorper urna rhoncus laoreet.\'),
				(3, 1, 3, \'John Doe\', \'Manager\', \'Etiam vel odio a urna sagittis pharetra in nec orci. Phasellus volutpat eu lorem non rhoncus. Aenean elementum turpis ac justo posuere ultricies. Donec in orci erat. Duis bibendum euismod tortor quis placerat.\');
		';
		return Db::getInstance()->execute($query) && Db::getInstance()->execute($query2);
	}

	private function uninstallDb()
	{
		Db::getInstance()->execute('DROP TABLE if exists `'._DB_PREFIX_.'tonytestimonials`');
		return true;
	}

	public function uninstall()
	{
		Configuration::deleteByName($this->name.'_settings');
		if (! parent::uninstall() || ! $this->uninstallDB()) return false;
		return true;
	}

	public function hookHeader()
	{
		$css_files = array('style.css',);
		foreach ($css_files as $css)
			$this->context->controller->addCSS($this->_path.'css/'.$css, 'tonytheme');
		$js_files = array('jquery.parallax.js', 'launch.js',);
		foreach ($js_files as $js)
			$this->context->controller->addJS(($this->_path).'js/'.$js);
	}

	public function displayForm()
	{
		$do = Tools::getValue('do');

		switch ($do)
		{
			case 'removeslide':
			case 'removeslideimage':
			{
				$ssid = (int)Tools::getValue('ssid');
				$lngid = (int)Tools::getValue('lid');
				$query = 'select cfg from '._DB_PREFIX_."tonytestimonials where slide_id='$ssid'";
				$rows = Db::getInstance()->executeS($query);
				$cfg = unserialize($rows[0]['cfg']);

				if ($do == 'removeslideimage')
				{
					$image = $cfg['images'][$lngid];
					@unlink(_PS_MODULE_DIR_.$this->name.'/slides/'.$image);
					unset($cfg['images'][$lngid]);
					$cfg = Db::getInstance()->_escape(serialize($cfg));
					$query = 'update '._DB_PREFIX_."tonytestimonials set cfg='$cfg' where slide_id='$ssid'";
					Db::getInstance()->execute($query);

					Tools::redirectAdmin(AdminController::$currentIndex.'&configure='.$this->name.'&token='.Tools::getAdminTokenLite('AdminModules').'&do=addnewslide&ssid='.$ssid);
				}
				else
				{
					$query = 'delete from '._DB_PREFIX_."tonytestimonials where slide_id='$ssid'";
					Db::getInstance()->execute($query);

					Tools::redirectAdmin(AdminController::$currentIndex.'&configure='.$this->name.'&token='.Tools::getAdminTokenLite('AdminModules'));
				}
			}
				break;
			case 'addnewslide':
			{
				$ssid = (int)Tools::getValue('ssid');
				$this->_clearCache('tonytestimonials.tpl');
				$content = $this->addNewSlide($ssid);
			}
				break;
			default:
				$content = $this->main();
		}

		return $content;
	}

	private function addNewSlide($id = 0)
	{
		//$languages = $this->context->controller->getLanguages();
		//$default_language = (int)Configuration::get('PS_LANG_DEFAULT');
		//$id_lang = (int)Context::getContext()->language->id;
		$id_shop = (int)Shop::getContextShopID();
		$def_values = array();

		if ($id != 0)
		{
			$query = 'select * from '._DB_PREFIX_."tonytestimonials where slide_id='$id'";
			$rows = Db::getInstance()->executeS($query);

			$def_values = $rows[0];
		}
		else
			$def_values['cfg'] = array();

		$message = '';
		$image_sql = '';

		$hidden_inputs = '';
		$errors = '';
		if (Tools::isSubmit('addnew'))
		{
			$name = Tools::getValue('name');
			$position = Tools::getValue('position');
			$sort_order = (int)Tools::getValue('sort_order');
			$text = Tools::getValue('text');

			$def_values['name'] = $name;
			$def_values['position'] = $position;
			$def_values['sort_order'] = $sort_order;
			$def_values['text'] = $text;

			$name = Db::getInstance()->_escape($name);
			$position = Db::getInstance()->_escape($position);
			$position = Db::getInstance()->_escape($position);
			$text = strip_tags(Db::getInstance()->_escape($text));
			if ($id != 0)
			{
				$query = 'update '._DB_PREFIX_."tonytestimonials set id_shop='{$id_shop}',{$image_sql}sort_order='$sort_order',name='$name',position='$position',text='$text' where slide_id='$id'";
				Db::getInstance()->execute($query);
				$slide_id = $id;
			}
			else
			{
				$query = 'insert into '._DB_PREFIX_."tonytestimonials set id_shop='{$id_shop}',{$image_sql}sort_order='$sort_order',name='$name',position='$position',text='$text'";
				Db::getInstance()->execute($query);
				$slide_id = Db::getInstance()->Insert_ID();
			}

			Tools::redirectAdmin(AdminController::$currentIndex.'&configure='.$this->name.'&token='.Tools::getAdminTokenLite('AdminModules').'&do=addnewslide&ssid='.$slide_id.'&updated');
		}

		$u = Tools::getValue('updated', false);
		if ($u !== false) $message = $this->displayConfirmation($this->l('Updated'));

		$content = $message;

		if (isset($errors) && $errors) $content .= $this->displayError($errors);

		$content .= '
			<style>
			.conf-set{margin-bottom:10px;}
			.conf-title{width:200px;font-weight:bold;text-align:right;vertical-align:top;padding-top:6px;}
			.conf-table td{padding:0 5px 10px 0;}
			.comment{font-size:11px;}
			.conf-value{background-color:#e4e4e4;padding:5px 0 5px 0;}
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
			.conf-table textarea { width: 714px; height: 240px; resize: vertical; }
			</style>
			<form method="post" enctype="multipart/form-data">
			'.$hidden_inputs.'
			<fieldset class="conf-set">
			<legend>'.$this->l('Add new testimonial').' ['.(Shop::getContext() == Shop::CONTEXT_SHOP ? $this->l('shop').' '.$this->context->shop->name : $this->l('all shops')).']</legend>

			<a href="'.AdminController::$currentIndex.'&configure='.$this->name.'&token='.Tools::getAdminTokenLite('AdminModules').'"><input type="button" value="'.$this->l('Back').'" class="button" style="cursor:pointer;"></a>
			<table class="conf-table">
			<tr>
				<td class="conf-title">'.$this->l('Name').':</td>
				<td class="conf-value"><input type="text" name="name" size="32" value="'.$def_values['name'].'"></td>
			</tr>
			<tr>
				<td class="conf-title">'.$this->l('Position').':</td>
				<td class="conf-value"><input type="text" name="position" size="45" value="'.$def_values['position'].'"></td>
			</tr>
			<tr>
				<td class="conf-title">'.$this->l('Sort order').':</td>
				<td class="conf-value"><input type="text" name="sort_order" size="10" value="'.$def_values['sort_order'].'"></td>
			</tr>
			<tr>
				<td class="conf-title">'.$this->l('Text').':</td>
				<td class="conf-value"><textarea name="text">'.htmlspecialchars(str_replace('<br>', "\n", $def_values['text'])).'</textarea></td>
			</tr>
			</table>

			<input type="submit" name="addnew" value="'.$this->l('Save').'" class="button" style="cursor:pointer;">
			</fieldset>

			</form>
		';

		return $content;
	}

	private function main()
	{
		$id_shop = (int)Shop::getContextShopID();
		//$img_path = _MODULE_DIR_.$this->name.'/slides/';
		//$default_language = (int)Configuration::get('PS_LANG_DEFAULT');

		$query = 'select * from '._DB_PREFIX_."tonytestimonials where id_shop='$id_shop' order by sort_order asc";
		$rows = Db::getInstance()->executeS($query);

		$slides = array();

		$content = '';
		foreach ($rows as $row)
			$slides[] = $row;
		ksort($slides);

		foreach ($slides as $group => $row)
		{
			$l = $group + 1;
			$content .= '<fieldset class="conf-set"><legend>'.$this->l('Testimonial').' '.$l.'</legend>';

			$content .= '
				<div class="slider-div">          
					<div><b>'.$row['text'].'</b></div><br />
					<div>'.htmlspecialchars(implode(', ', array($row['name'], $row['position']))).'</div><br />
					[<a href="'.(AdminController::$currentIndex).'&token='.Tools::getAdminTokenLite('AdminModules').'&configure='.$this->name.'&do=addnewslide&ssid='.$row['slide_id'].'">'.$this->l('Edit').'</a>]
					[<a href="'.(AdminController::$currentIndex).'&token='.Tools::getAdminTokenLite('AdminModules').'&configure='.$this->name.'&do=removeslide&ssid='.$row['slide_id'].'">'.$this->l('Delete').'</a>]
				</div>
			';

			$content .= '</fieldset>';
		}

		$cfg = unserialize(Configuration::get($this->name.'_settings'));

		if (! is_array($cfg)) $cfg = array();

		$content = '
			<style>
			.conf-set{margin-bottom:10px;}
			.conf-title{width:250px;font-weight:bold;text-align:right;}
			.conf-table td{padding:0 5px 10px 0;}
			.slider-div{float:left;text-align:left;padding:10px;}
			.text-div{float:left;padding:10px;}
			.comment{font-size:11px;}
			.lbl-txt{font-size:12px;padding:3px;}
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
			'.$content.'
			<a href="'.AdminController::$currentIndex.'&token='.Tools::getAdminTokenLite('AdminModules').'&configure='.$this->name.'&do=addnewslide'.'"><input type="button" name="addnew" value="'.$this->l('Add testimonial').'" class="button"></a>
			</fieldset>


				  ';
		return $content;
	}

	public function getContent()
	{
		if (Tools::isSubmit('savesett'))
		{
			$cfg = array();

			$cfg['button_color'] = Tools::getValue('button_color');
			$cfg['button_hover_color'] = Tools::getValue('button_hover_color');
			foreach ($this->slider_options as $id => $data)
				$cfg[$id] = Tools::getValue($id);
			$cfg = serialize($cfg);
			Configuration::updateValue($this->name.'_settings', $cfg);
			$this->_clearCache('tonytestimonials.tpl');
		}

		$this->context->controller->addJS(_PS_JS_DIR_.'jquery/plugins/jquery.colorpicker.js');
		$js = '
			<script type="text/javascript">
			$(document).ready(function() {
			  $(".mColorPicker").mColorPicker();
			});  
			</script>      
		';
		return $js.$this->displayForm();
	}

	public function hookDisplayHome($params)
	{
		//$current_language = $this->context->language->id;
		$id_shop = (int)Shop::getContextShopID();

		$query = 'select * from '._DB_PREFIX_."tonytestimonials where id_shop='$id_shop' order by sort_order asc";
		$rows = Db::getInstance()->executeS($query);

		$slider = array();

		foreach ($rows as $row)
			$slider[] = @array('name' => $row['name'], 'position' => $row['position'], 'text' => $row['text'],);

		$this->context->smarty->assign(array('label' => $this->displayName, 'tonyslider' => $slider,));

		return ($this->display(__FILE__, 'views/templates/front/tonytestimonials.tpl'));
	}

}
