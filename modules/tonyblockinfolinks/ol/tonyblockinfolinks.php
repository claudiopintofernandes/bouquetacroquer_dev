<?php
  if (!defined('_PS_VERSION_'))
  	exit;
  
  function tonlnx_sort($a,$b)
  {
    if ($a['sort_order'] == $b['sort_order']) 
    {
        return 0;
    }
    return ($a['sort_order'] < $b['sort_order']) ? -1 : 1;

  }	
 
   class tonyblockinfolinks extends Module
   {
     public function __construct()
    {
      $this->name = 'tonyblockinfolinks';
		  $this->tab = 'Other';
		  $this->version = '1.0';
		  $this->author = 'TonyTheme';
		  $this->need_instance = 0;
		  
		  parent::__construct();   
		  
		  $this->displayName = $this->l('Home page links');
		  $this->description = $this->l('Adds an information block with custom links');
		  $this->confirmUninstall = $this->l('Are you sure you want to uninstall?');
		  
		  $default_language = (int)Configuration::get('PS_LANG_DEFAULT');
		  
		  $this->m_def_value = 

Array
(
    '0' => Array
        (
            'title' => Array
                (
                    $default_language => 'FREE SHIPPING',
                ),

            'link' =>'', 
            'icon' => '<span class="icon_circle dark"><i class="icon-truck"></i></span>',
            'new_window' => 0,
            'sort_order' => 1,
        ),

    '1' => Array
        (
            'title' => Array
                (
                     $default_language => 'CASH ON DELIVERY',
                ),

            'link' =>'', 
            'icon' => '<span class="icon_circle light"><i class="icon-dollar"></i></span>',
            'new_window' => 0,
            'sort_order' => 2,
        ),

    '2' => Array
        (
            'title' => Array
                (
                    $default_language => '30-DAY RETURNS',
                ),

            'link' =>'', 
            'icon' => '<span class="icon_circle dark"><i class="icon-clock"></i></span>',
            'new_window' => 0,
            'sort_order' => 3,
        ),

    '3' => Array
        (
            'title' => Array
                (
                    $default_language => 'World Shipping',
                ),

            'link' =>'', 
            'icon' => '<span class="icon_circle light"><i class="icon-flight"></i></span>',
            'new_window' => 0,
            'sort_order' => 4,
        )

);
      $this->m_def_value = serialize($this->m_def_value);

		  
    }
    
    public function install()
    {
      /*if (Shop::isFeatureActive())
        Shop::setContext(Shop::CONTEXT_ALL);*/
      
      $ret = parent::install() && $this->registerHook('home') && Configuration::updateValue('TONY_BLOCK_LINKS', '', true) && Configuration::updateValue('TONY_BLOCK_LINKS', $this->m_def_value, true) && $this->registerHook('displayModuleInfoLinks');
      
      return $ret;   
    }
    
    public function uninstall()
    {
      $ret = parent::uninstall() && Configuration::deleteByName('TONY_BLOCK_LINKS');
      
      return $ret;
    }
    
    public function hookdisplayModuleInfoLinks($params)
    {
      $params['force_display'] = 1;
      return $this->hookDisplayHome($params);
    }
    
    public function hookDisplayHome($params)
    {
      if ($this->is_left_menu_enabled() && !isset($params['force_display']))
        return '';
      $config = unserialize(Configuration::get('TONY_BLOCK_LINKS'));
      $id_lang = (int)Context::getContext()->language->id;

      
      if (!is_array($config))
        $config = array();
      
      $total = count($config);
      foreach($config as $index=>&$data)
      {
        $data['title'] = $data['title'][$id_lang];
        if ($index == 0)
          $data['pos_class'] = 'first_item';
        elseif($index == ($total - 1))
          $data['pos_class'] = 'last_item';
        else
          $data['pos_class'] = '';    
      }
      
      $result = array();
      while($ret = @array_splice($config,0,2))
        $result[] = $ret; 
      
      $this->context->smarty->assign(array(
			  'links_cfg' => $result,
		  ));  
      
      return ($this->display(__FILE__, 'tonyblockinfolinks.tpl'));
    }
    
    public function displayForm()
    {
      $do = Tools::getValue('do');
      $config = unserialize(Configuration::get('TONY_BLOCK_LINKS'));
      $content = '';
      
      switch($do)
      {
        case 'remove':
        {
          $id = (int)Tools::getValue('bid');
          
          unset($config[$id]);  
          
          Configuration::updateValue('TONY_BLOCK_LINKS', serialize($config), true);
          
          Tools::redirectAdmin(AdminController::$currentIndex.'&configure='.$this->name.'&token='.Tools::getAdminTokenLite('AdminModules').'&updated');  
           
        }break;
        case 'addnew':
        {
          $content = $this->_add_new();  
        }break;
        default:
        {
          $content = $this->_main();
        }
      }
      
      return $content;
    }
    
    function _main()
    {
      $config = unserialize(Configuration::get('TONY_BLOCK_LINKS'));
      uasort($config,'tonlnx_sort');
      $id_lang = (int)Context::getContext()->language->id;
      
      $content = '';
      
      foreach($config as $id=>$data)
      {
        $content .= '
<tr>          
  <td width="300"><b>'.htmlspecialchars($data['title'][$id_lang]).'</b></td>
  <td>  [<a href="'.(AdminController::$currentIndex).'&token='.Tools::getAdminTokenLite('AdminModules').'&configure='.$this->name.'&do=addnew&bid='.$id.'">'.$this->l('Edit').'</a>]
    [<a href="'.(AdminController::$currentIndex).'&token='.Tools::getAdminTokenLite('AdminModules').'&configure='.$this->name.'&do=remove&bid='.$id.'">'.$this->l('Delete').'</a>]
  </td>  
</tr>        
        ';
        
      }
      
      if (isset($_GET['updated']))
        $message = $this->displayConfirmation($this->l('Updated'));
        
      $content = $message.'
<style>
.conf-set{margin-bottom:10px;}
.conf-title{width:200px;font-weight:bold;text-align:right;}
.conf-table td{padding-bottom:10px;}
.slider-div{float:left;text-align:center;padding:10px;}
</style>

<form method="post">
<fieldset class="conf-set">
<legend>'.$this->l('Links').' ['.(Shop::getContext() == Shop::CONTEXT_SHOP ? $this->l('shop').' '.$this->context->shop->name : $this->l('all shops')).']</legend>

<table cellpadding="5">
'.$content.'
</table>

<a href="'.AdminController::$currentIndex.'&token='.Tools::getAdminTokenLite('AdminModules').'&configure='.$this->name.'&do=addnew'.'"><input type="button" name="addnew" value="'.$this->l('Add New').'" class="button" style="cursor:pointer;"></a>
</fieldset>

</form>
      ';
      
      return $content; 
    }
    
    function _add_new()
    {
      $config = unserialize(Configuration::get('TONY_BLOCK_LINKS'));
      $id = isset($_GET['bid']) ? (int)$_GET['bid'] : false;
      $languages = $this->context->controller->getLanguages();
      $id_lang = (int)Context::getContext()->language->id;
      
      if ($id !== false) 
      {
        $def_values = $config[$id];
      }
      $errors = '';
      if (Tools::isSubmit('addnew'))
      {
        if (!$errors)
        {
          $title = Tools::getValue('title');
          if ($id !== false)
          {
            $config[$id] = array(
              'title' => $title,
              'link' => Tools::getValue('link'),
              'icon' => Tools::getValue('icon'),
              'new_window' => (int)Tools::getValue('new_window'),
              'sort_order' => (int)Tools::getValue('sort_order'),
        
            );
          }
          else
          {
            $config[] = array(
              'title' => $title,
              'link' => Tools::getValue('link'),
              'icon' => Tools::getValue('icon'),
              'new_window' => (int)Tools::getValue('new_window'),
              'sort_order' => (int)Tools::getValue('sort_order'),          
            );
          }
          
          Configuration::updateValue('TONY_BLOCK_LINKS', serialize($config), true);
          
          $this->_clearCache('tonyblockinfolinks.tpl');
          
          Tools::redirectAdmin(AdminController::$currentIndex.'&configure='.$this->name.'&token='.Tools::getAdminTokenLite('AdminModules').'&updated');
        }  
      }
      
      $content = '';
      if ($errors)
			  $content .= $this->displayError($errors);
			
      $title_html = '';
      foreach ($languages as $language)
      {
        $title_html .= '
<div id="title_'.(int)$language['id_lang'].'" style="display: '.($language['id_lang'] == $id_lang ? 'block' : 'none').';">
<input type="text" name="title['.(int)$language['id_lang'].']" value="'.$def_values['title'][$language['id_lang']].'" size="50">        
</div>          
        ';
      }  
			  
      $content .= '
<style>
.conf-set{margin-bottom:10px;}
.conf-title{width:200px;font-weight:bold;text-align:right;}
.conf-table td{padding-bottom:10px;}
</style>

<form method="post" enctype="multipart/form-data">
  <fieldset class="conf-set">
   <legend>'.$this->l('Add new Link').' ['.(Shop::getContext() == Shop::CONTEXT_SHOP ? $this->l('shop').' '.$this->context->shop->name : $this->l('all shops')).']</legend>
   
   <a href="'.AdminController::$currentIndex.'&configure='.$this->name.'&token='.Tools::getAdminTokenLite('AdminModules').'"><input type="button" value="'.$this->l('Back').'" class="button" style="cursor:pointer;"></a>
   
   <table class="conf-table">
          <tr>
            <td class="conf-title">'.$this->l('Text').':</td>
            <td class="conf-value"><div>'.$this->displayFlags($languages, (int)$id_lang, 'title', 'title', true).'</div><p style="clear: both;"> </p>'.$title_html.'</td>
          </tr>
          <tr>
              <td class="conf-title">'.$this->l('Icon').':</td>
              <td class="conf-value"><textarea name="icon" cols="47" rows="2" name="icon">'.$def_values['icon'].'</textarea></td>
          </tr>
          <tr>
            <td class="conf-title">'.$this->l('Link').':</td>
            <td class="conf-value"><input type="text" name="link" value="'.$def_values['link'].'" size="50"></td>
          </tr>
          <tr>
              <td class="conf-title">'.$this->l('Open target in new window').':</td>
              <td class="conf-value"><input type="checkbox" name="new_window" value="1" '.($def_values['new_window'] == 1 ? 'checked' : '').'></td>
          </tr>
          <tr>
            <td class="conf-title">'.$this->l('Sort order').':</td>
            <td class="conf-value"><input type="text" name="sort_order" value="'.$def_values['sort_order'].'" size="3"></td>
          </tr>
          
        </table>

  <input type="submit" name="addnew" value="'.$this->l('Save').'" class="button" style="cursor:pointer;">
 </fieldset>  
</form>      
      ';
      
      return $content;
    }
    
       
    public function getContent()
    {
      return $message.$this->displayForm();
    }
    
    function is_left_menu_enabled()
    {
      return (int)Configuration::get('TONYTHEME_LEFT_MENU');
    }
    
   } 	