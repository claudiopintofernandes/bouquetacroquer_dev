<?php

if (!defined('_PS_VERSION_'))
	exit;

include(dirname(__FILE__) . '/lib/qrlib.php');

class tonyqrcode extends Module {

	public function __construct() {
		$this->name = 'tonyqrcode';
		$this->tab = 'others';
		$this->version = '1.0';
		$this->author = 'TonyTheme';
		$this->need_instance = 0;
		$this->module_key = '39034886a62663fa5f8392c47133d42f';

		parent::__construct();

		$this->displayName = $this->l('QR code');
		$this->description = $this->l('Adds QR code with current page URL');
		$this->confirmUninstall = $this->l('Are you sure you want to uninstall?');

		$this->m_def_value = '';
	}

	public function install() {
		if (Shop::isFeatureActive())
			Shop::setContext(Shop::CONTEXT_ALL);

		$ret = parent::install() && $this->registerHook('displayQRcode');
		@chmod(dirname(__FILE__) . '/codes', 0755);

		return $ret;
	}

	public function uninstall() {
		$ret = parent::uninstall();

		return $ret;
	}

	public function hookdisplayQRcode($params) {
		$url = (($_SERVER['HTTPS'] == 'on') ? 'https://' : 'http://') . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
		$hash = md5($url);
		$file_name = $hash . '.png';
		$file_path = dirname(__FILE__) . '/codes/' . $file_name;

		$data = array();

		if (file_exists($file_path))
			$data['image'] = $this->context->link->protocol_content . Tools::getMediaServer($this->name) . _MODULE_DIR_ . $this->name . '/codes/' . $file_name;
		else {
			@QRcode::png($url, $file_path);
			if (file_exists($file_path))
				$data['image'] = $this->context->link->protocol_content . Tools::getMediaServer($this->name) . _MODULE_DIR_ . $this->name . '/codes/' . $file_name;
		}

		$this->context->smarty->assign(array(
			'data' => $data,
		));

		return ($this->display(__FILE__, 'views/templates/front/tonyqrcode.tpl'));
	}

	public function hookRightColumn($params) {
		return $this->hookdisplayQRcode($params);
	}

	public function hookLeftColumn($params) {
		return $this->hookdisplayQRcode($params);
	}

	public function hookHome($params) {
		return $this->hookdisplayQRcode($params);
	}

	public function hookFooter($params) {
		return $this->hookdisplayQRcode($params);
	}

}
