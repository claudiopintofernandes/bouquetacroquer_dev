<?php
  if (!defined('_PS_VERSION_'))
  	exit;
  
  function tonymanufacturerslider_sort($a,$b)
  {
    if ($a['sort_order'] == $b['sort_order']) 
    {
        return 0;
    }
    return ($a['sort_order'] < $b['sort_order']) ? -1 : 1;

  }  
 
  class tonymanufacturerslider extends Module
   {
     public function __construct()
    {
      $this->name = 'tonymanufacturerslider';
		  $this->tab = 'Other';
		  $this->version = '1.0';
		  $this->author = 'TonyTheme';
		  $this->need_instance = 0;
		  
		  parent::__construct();
		  
		  $this->displayName = $this->l('Manufacturers slider');
		  $this->description = $this->l('Adds slider with store manufacturers');
		  $this->confirmUninstall = $this->l('Are you sure you want to uninstall?');
		  
		  $this->m_def_value = '';
		  
    }
    
    public function install()
    {
      if (Shop::isFeatureActive())
        Shop::setContext(Shop::CONTEXT_ALL);
      
      $ret = parent::install() && $this->registerHook('home') && $this->registerHook('header') && $this->registerHook('displayModuleManufacturer');
      
      return $ret;   
    }
    
    public function uninstall()
    {
      $ret = parent::uninstall();
      
      return $ret;
    }
    
    public function hookHeader()
    {
      $this->context->controller->addCSS(($this->_path).'css/tonymanufacturerslider.css', 'all');
      $this->context->controller->addJS(($this->_path).'js/tonymanufacturerslider.js');
      $this->context->controller->addJS(($this->_path).'js/jquery.jcarousel.min.js');
    }
    
    public function hookdisplayModuleManufacturer($params)
    {
      $params['force_display'] = 1;
      return $this->hookDisplayHome($params);
    }
    
    public function hookDisplayHome($params)
    {
      if ($this->is_left_menu_enabled() && !isset($params['force_display']))
        return '';
      $config = unserialize(Configuration::get($this->name.'_SETTINGS'));
      $manufacturers = Manufacturer::getManufacturers(false, 0, true, 1, 16);
      
      foreach($manufacturers as &$item)
      {
        $item['image'] = (!file_exists(_PS_MANU_IMG_DIR_.$item['id_manufacturer'].'-'.ImageType::getFormatedName('large').'.jpg')) ? $this->context->language->iso_code.'-default' : $item['id_manufacturer'];
        $item['sort_order'] = (int)$config['sort_order'][$item['id_manufacturer']];
      }
      
      uasort($manufacturers,'tonymanufacturerslider_sort');
      
      $this->context->smarty->assign(array(
			  'manufacturers' => $manufacturers,
		  ));
      
		  
      return ($this->display(__FILE__, 'tonymanufacturerslider.tpl'));
    }
    
    public function getContent()
    {
      return $this->displayForm();
    }
    
    public function displayForm()
    {
      $config = unserialize(Configuration::get($this->name.'_SETTINGS'));
      
      $errors = '';
      if (Tools::isSubmit('save'))
      {
         $ret = $_POST['m'];
              
         $config['sort_order'] = $ret;
         
         Configuration::updateValue($this->name.'_SETTINGS', serialize($config), true);
         
         Tools::redirectAdmin(AdminController::$currentIndex.'&configure='.$this->name.'&token='.Tools::getAdminTokenLite('AdminModules').'&updated');
        
      }
      
      $message = '';
      if (isset($_GET['updated']))
        $message = $this->displayConfirmation($this->l('Updated'));
      
      $manufacturers = Manufacturer::getManufacturers();
      foreach($manufacturers as &$man)
      {
        $man['sort_order'] = (int)$config['sort_order'][$man['id_manufacturer']]; 
      }
      
      
      uasort($manufacturers,'tonymanufacturerslider_sort');
      
      $manufacturers_html = '';
      
      foreach($manufacturers as $m)
      {
        $manufacturers_html .= '
<tr>
    <td class="conf-title">'.$m['name'].'</td>
    <td class="conf-value"><input type="text" name="m['.$m['id_manufacturer'].']" value="'.$config['sort_order'][$m['id_manufacturer']].'"></td>
  </tr>        
        ';
      }
        
        
      $content = $message.'
<style>
.conf-set{margin-bottom:10px;}
.conf-title{width:200px;font-weight:bold;text-align:right;}
.conf-table td{padding:0 5px 10px 0;}
.slider-div{float:left;text-align:center;padding:10px;}
</style>

<form method="post" enctype="multipart/form-data">
<fieldset class="conf-set">
<legend>'.$this->l('Manufacturers display order').' ['.(Shop::getContext() == Shop::CONTEXT_SHOP ? $this->l('shop').' '.$this->context->shop->name : $this->l('all shops')).']</legend>

<table class="conf-table">
'.$manufacturers_html.'
</table>

<input type="submit" name="save" value="'.$this->l('Save').'" class="button" style="cursor:pointer;">
</fieldset>

</form>
      ';
      
      return $content;
      
    }
    function is_left_menu_enabled()
    {
      return (int)Configuration::get('TONYTHEME_LEFT_MENU');
    }
    
    

    
    
    
    
    
   } 	