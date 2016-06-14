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

class TonyFooterIcons extends Module
{
	public function __construct()
	{
		$this->name = 'tonyfootericons';
		$this->tab = 'front_office_features';
		$this->version = '1.0';
		$this->author = 'TonyTheme';
		$this->need_instance = 0;
		$this->module_key = '39034886a62663fa5f8392c47133d42f';

		parent::__construct();

		$this->displayName = $this->l('Footer line icons and texts');
		$this->description = $this->l('Adds payment,social icons and copyright text in the footer');
		$this->confirmUninstall = $this->l('Are you sure you want to uninstall?');

		$default_language = (int)Configuration::get('PS_LANG_DEFAULT');

		$this->m_def_value = serialize(array('p1' => 1, 'p2' => 1, 'p3' => 1, 'p4' => 1, 'p5' => 1, 's0' => 'http://facebook.com', 's1' => 'http://twitter.com', 's2' => 'http://linkedin.com', 's3' => 'http://pinterest.com', 's4' => 'http://google.com', 'copy' => Array($default_language => '&copy; '.date('Y').' <a href="#">TonyTheme</a>. All Rights Reserved.')));

	}

	public function install()
	{
		if (Shop::isFeatureActive()) Shop::setContext(Shop::CONTEXT_ALL);

		$ret = parent::install() && $this->registerHook('displayFooterTool') && Configuration::updateValue('TONY_HOME_FOOTER_LNX', '') && Configuration::updateValue('TONY_HOME_FOOTER_LNX', $this->m_def_value, true);

		return $ret;
	}

	public function uninstall()
	{
		$ret = parent::uninstall() && Configuration::deleteByName('TONY_HOME_FOOTER_LNX');

		return $ret;
	}

	public function hookDisplayFooterTool($params)
	{
		$config = unserialize(Configuration::get('TONY_HOME_FOOTER_LNX'));
		$current_language = $this->context->language->id;

		$config['copy'] = $config['copy'][$current_language];

		$this->context->smarty->assign(array('tonyfooterlinks' => $config,));

		return ($this->display(__FILE__, 'views/templates/front/tonyfootericons.tpl'));
	}

	public function displayForm()
	{
		$u = Tools::getValue('updated', false);
		if ($u !== false) $message = $this->displayConfirmation($this->l('Updated'));

		$languages = $this->context->controller->getLanguages();
		$id_lang = (int)Context::getContext()->language->id;

		$def_values = unserialize(Configuration::get('TONY_HOME_FOOTER_LNX'));
		if (! is_array($def_values)) $def_values = array();

		if (Tools::isSubmit('save'))
		{
			$def_values = array('p1' => (int)Tools::getValue('p1'), 'p2' => (int)Tools::getValue('p2'), 'p3' => (int)Tools::getValue('p3'), 'p4' => (int)Tools::getValue('p4'), 'p5' => (int)Tools::getValue('p5'), 's0' => Tools::getValue('s0'), 's1' => Tools::getValue('s1'), 's2' => Tools::getValue('s2'), 's3' => Tools::getValue('s3'), 's4' => Tools::getValue('s4'), 'copy' => Tools::getValue('copy_'),);

			Configuration::updateValue('TONY_HOME_FOOTER_LNX', serialize($def_values), true);

			Tools::redirectAdmin(AdminController::$currentIndex.'&configure='.$this->name.'&token='.Tools::getAdminTokenLite('AdminModules').'&updated');
		}

		$img_path = _MODULE_DIR_.$this->name.'/payment/';

		$icons = array('icon-facebook-circled-1' => 'Facebook', 'icon-twitter-circled-1' => 'Twitter', 'icon-linkedin-circled' => 'Linkedin', 'icon-pinterest-circled' => 'Pinterest', 'icon-gplus-circled-1' => 'Google Plus');
		$icons_html = '';
		$index = 0;

		foreach ($icons as $id => $title)
		{
			$name = 's'.$index;
			$icons_html .= '
                <tr>
                    <td class="conf-title">'.$title.'</td>
                    <td class="conf-value"><input type="text" name="'.$name.'" value="'.$def_values[$name].'" size="100"></td>
                </tr>
            ';
			$index ++;
		}

		$copy_html = '';
		foreach ($languages as $language)
		{
			$copy_html .= '
                <div id="copy_'.(int)$language['id_lang'].'" style="display: '.($language['id_lang'] == $id_lang ? 'block' : 'none').';">
                  <input type="text" name="copy_['.(int)$language['id_lang'].']" size="100" value="'.htmlspecialchars($def_values['copy'][$language['id_lang']]).'">
                </div>
            ';
		}

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

        <form method="post">
        <fieldset class="conf-set">
        <legend>'.$this->l('Icons').' ['.(Shop::getContext() == Shop::CONTEXT_SHOP ? $this->l('shop').' '.$this->context->shop->name : $this->l('all shops')).']</legend>

        <table class="conf-table">
          <tr>
            <td class="conf-title"><img src="'.$img_path.'payment1.png"></td>
            <td class="conf-value"><input type="checkbox" name="p1" value="1" '.($def_values['p1'] == 1 ? 'checked' : '').'></td>
          </tr>
          <tr>
            <td class="conf-title"><img src="'.$img_path.'payment2.png"></td>
            <td class="conf-value"><input type="checkbox" name="p2" value="1" '.($def_values['p2'] == 1 ? 'checked' : '').'></td>
          </tr>
          <tr>
            <td class="conf-title"><img src="'.$img_path.'payment3.png"></td>
            <td class="conf-value"><input type="checkbox" name="p3" value="1" '.($def_values['p3'] == 1 ? 'checked' : '').'></td>
          </tr>
          <tr>
            <td class="conf-title"><img src="'.$img_path.'payment4.png"></td>
            <td class="conf-value"><input type="checkbox" name="p4" value="1" '.($def_values['p4'] == 1 ? 'checked' : '').'></td>
          </tr>
          <tr>
            <td class="conf-title"><img src="'.$img_path.'payment5.png"></td>
            <td class="conf-value"><input type="checkbox" name="p5" value="1" '.($def_values['p5'] == 1 ? 'checked' : '').'></td>
          </tr>
          '.$icons_html.'
          <tr>
            <td class="conf-title">'.$this->l('Copyright text').':</td>
            <td class="conf-value">'.$this->displayFlags($languages, (int)$id_lang, 'copy', 'copy', true).'</div><p style="clear: both;"> </p>'.$copy_html.'</td>
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

}