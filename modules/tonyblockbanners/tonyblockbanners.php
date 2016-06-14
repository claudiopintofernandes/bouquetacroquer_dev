<?php
  if (!defined('_PS_VERSION_'))
  	exit;
 
  function tonybnr_sort($a,$b)
  {
    if ($a['sort_order'] == $b['sort_order']) 
    {
        return 0;
    }
    return ($a['sort_order'] < $b['sort_order']) ? -1 : 1;

  }	
 
   class tonyblockbanners extends Module
   {
     public function __construct()
    {
      $this->name = 'tonyblockbanners';
		  $this->tab = 'Other';
		  $this->version = '1.0';
		  $this->author = 'TonyTheme';
		  $this->need_instance = 0;
		  
		  parent::__construct();
		  
		  $this->displayName = $this->l('Home page banners');
		  $this->description = $this->l('Adds an banners block with custom links');
		  $this->confirmUninstall = $this->l('Are you sure you want to uninstall?');
		  $this->m_def_value = 'a:4:{i:0;a:4:{s:4:"link";s:0:"";s:10:"new_window";i:0;s:10:"sort_order";i:1;s:5:"image";s:8:"img1.png";}i:1;a:4:{s:4:"link";s:0:"";s:10:"new_window";i:0;s:10:"sort_order";i:2;s:5:"image";s:8:"img2.png";}i:2;a:4:{s:4:"link";s:0:"";s:10:"new_window";i:0;s:10:"sort_order";i:3;s:5:"image";s:8:"img3.png";}i:3;a:4:{s:4:"link";s:0:"";s:10:"new_window";i:0;s:10:"sort_order";i:4;s:5:"image";s:8:"img4.png";}}';
		  
    }
    
    public function install()
    {
      if (Shop::isFeatureActive())
        Shop::setContext(Shop::CONTEXT_ALL);
      
      $ret = parent::install() && $this->registerHook('home') && $this->registerHook('displayModuleBanners') && Configuration::updateValue('TONY_HOME_BANNERS', $this->m_def_value, true);
      
      return $ret;   
    }
    
    public function uninstall()
    {
      $ret = parent::uninstall() && Configuration::deleteByName('TONY_HOME_BANNERS');
      
      return $ret;
    }
    
    public function hookdisplayModuleBanners($params)
    {
      $params['force_display'] = 1;
      return $this->hookDisplayHome($params);
    }
    
    public function hookDisplayHome($params)
    {
      $config = unserialize(Configuration::get('TONY_HOME_BANNERS'));
      if (!is_array($config))
        $config = array();
        
      uasort($config,'tonybnr_sort');
      
      foreach($config as &$cfg)
      {
        $retina_image = 'false';
        if (preg_match("/^(.*)\.(.*)$/",$cfg['image'],$ret))
        {
          $retina_image_src = $ret[1].'_2x.'.$ret[2];
          if (file_exists(_PS_MODULE_DIR_.$this->name.'/images/'.$retina_image_src))
            $retina_image = 'true';  
        }
        $cfg['image'] = $this->context->link->protocol_content.Tools::getMediaServer($this->name)._MODULE_DIR_.$this->name.'/images/'.$cfg['image'];
        $cfg['retina_image'] = $retina_image;
      }
      
      $result = array();
      if (count($config))
      {
        while($ret = @array_splice($config,0,4))
          $result[] = $ret;
      }
      
      $this->context->smarty->assign(array(
			  'tonybanners' => $result,
		  ));
      
      if (isset($params['force_display']))
      {
        $this->context->smarty->assign(array(
			  'hideonhome' => 1,
		  ));
      }
      
      
      return ($this->display(__FILE__, 'tonyblockbanners.tpl'));
    }
    
    public function displayForm()
    {
      $do = Tools::getValue('do');
      $config = unserialize(Configuration::get('TONY_HOME_BANNERS'));
      $content = '';
      
      switch($do)
      {
        case 'removebanner':
        case 'removebannerimage':
        {
          $id = (int)Tools::getValue('bid');
          $image = $config[$id]['image'];
          
          if ($do == 'removebannerimage')
            $config[$id]['image'] = '';
          else
            unset($config[$id]);  
          
          @unlink(_PS_MODULE_DIR_.$this->name.'/images/'.$image);
          
          Configuration::updateValue('TONY_HOME_BANNERS', serialize($config), true);
          
          if ($do == 'removebannerimage')
            Tools::redirectAdmin(AdminController::$currentIndex.'&configure='.$this->name.'&token='.Tools::getAdminTokenLite('AdminModules').'&do=addnewbanner&bid='.$id);
          else
            Tools::redirectAdmin(AdminController::$currentIndex.'&configure='.$this->name.'&token='.Tools::getAdminTokenLite('AdminModules'));  
           
        }break;
        case 'addnewbanner':
        {
          $content = $this->_add_banner();  
        }break;
        default:
        {
          $content = $this->_main();
        }
      }
      
      return $content;
    }
    
    public function getContent()
    {
      return $this->displayForm();
    }
    
    function _main()
    {
      $config = unserialize(Configuration::get('TONY_HOME_BANNERS'));
      uasort($config,'tonybnr_sort');
      $img_path = _MODULE_DIR_.$this->name.'/images/';
      
      $content = '';
      
      foreach($config as $id=>$data)
      {
        $content .= '
<tr>          
  <td><img src="'.$img_path.$data['image'].'" width="270"></td>
  <td>  [<a href="'.(AdminController::$currentIndex).'&token='.Tools::getAdminTokenLite('AdminModules').'&configure='.$this->name.'&do=addnewbanner&bid='.$id.'">'.$this->l('Edit').'</a>]
    [<a href="'.(AdminController::$currentIndex).'&token='.Tools::getAdminTokenLite('AdminModules').'&configure='.$this->name.'&do=removebanner&bid='.$id.'">'.$this->l('Delete').'</a>]
  </td>  
</tr>        
        ';
        
      }
      
      $message = '';
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
<legend>'.$this->l('Banners').' ['.(Shop::getContext() == Shop::CONTEXT_SHOP ? $this->l('shop').' '.$this->context->shop->name : $this->l('all shops')).']</legend>

<table>
'.$content.'
</table>

<a href="'.AdminController::$currentIndex.'&token='.Tools::getAdminTokenLite('AdminModules').'&configure='.$this->name.'&do=addnewbanner'.'"><input type="button" name="addnew" value="'.$this->l('Add Banner').'" class="button" style="cursor:pointer;"></a>
</fieldset>

</form>
      ';
      
      return $content; 
    }
    
    function _add_banner()
    {
      $path = _MODULE_DIR_.$this->name.'/images/';
      $config = unserialize(Configuration::get('TONY_HOME_BANNERS'));
      $id = isset($_GET['bid']) ? (int)$_GET['bid'] : false;
      $uploaded_image = '';
      
      if ($id !== false) 
      {
        $def_values = $config[$id];
        if (strlen($def_values['image']))
		      $uploaded_image = '<img src="'.$path.$def_values['image'].'">&nbsp;[<a href="'.(AdminController::$currentIndex).'&token='.Tools::getAdminTokenLite('AdminModules').'&configure='.$this->name.'&do=removebannerimage&bid='.$id.'">'.$this->l('Delete image').'</a>]';
        
      }
      
      
      $errors = '';
      if (Tools::isSubmit('addnew'))
      {
        $link = Tools::getValue('link');
        $new_window = (int)Tools::getValue('new_window');
        $sort_order = (int)Tools::getValue('sort_order');
        $image = $def_values['image'];
        
        if (isset($_FILES['image']) && isset($_FILES['image']['tmp_name']) && !empty($_FILES['image']['tmp_name']))
        {
          if ($error = ImageManager::validateUpload($_FILES['image'], Tools::convertBytes(ini_get('upload_max_filesize'))))
					 $errors .= $this->l('File upload error.');
  				else
  				{
  				  $file_name = $_FILES['image']['name'];
  				  
  				  if (!move_uploaded_file($_FILES['image']['tmp_name'], _PS_MODULE_DIR_.$this->name.'/images/'.$file_name))
						  $errors .= $this->l('File upload error.');
						else
            {
               $uploaded_image = '<img src="'.$path.$file_name.'">';
               $image = $file_name;
            }  
  				}
        }
        elseif(strlen($def_values['image']) == 0)
          $errors .= $this->l('You need to upload banner image');
        
        if (!$errors)
        {
          if ($id !== false)
          {
            $config[$id] = array(
              'link' => $link,
              'new_window' => $new_window,
              'sort_order' => $sort_order, 
              'image' => $image          
            );
          }
          else
          {
            $config[] = array(
              'link' => $link,
              'new_window' => $new_window,
              'sort_order' => $sort_order, 
              'image' => $image          
            );
          }
          
          Configuration::updateValue('TONY_HOME_BANNERS', serialize($config), true);
          
          $this->_clearCache('tonyblockbanners.tpl');
          
          Tools::redirectAdmin(AdminController::$currentIndex.'&configure='.$this->name.'&token='.Tools::getAdminTokenLite('AdminModules').'&updated');
        }  
      }
      
      $content = '';
      if ($errors)
			  $content .= $this->displayError($errors);
			  
      $content .= '
<style>
.conf-set{margin-bottom:10px;}
.conf-title{width:200px;font-weight:bold;text-align:right;}
.conf-table td{padding-bottom:10px;}
</style>

<form method="post" enctype="multipart/form-data">
  <fieldset class="conf-set">
   <legend>'.$this->l('Add new banner').' ['.(Shop::getContext() == Shop::CONTEXT_SHOP ? $this->l('shop').' '.$this->context->shop->name : $this->l('all shops')).']</legend>
   
   <a href="'.AdminController::$currentIndex.'&configure='.$this->name.'&token='.Tools::getAdminTokenLite('AdminModules').'"><input type="button" value="'.$this->l('Back').'" class="button" style="cursor:pointer;"></a>
   
   <table class="conf-table">      
   <tr>
      <td class="conf-title">'.$this->l('Image').':</td>
      <td class="conf-value"><input type="file" name="image"><br />'.$uploaded_image.'</td>
   </tr>
   <tr>
    <td class="conf-title">'.$this->l('Link').':</td>
    <td class="conf-value"><input type="text" name="link" size="100" value="'.$def_values['link'].'"></td>
    </tr>
    <tr>
    <td class="conf-title">'.$this->l('Open target in new window').':</td>
    <td class="conf-value"><input type="checkbox" name="new_window" value="1" '.($def_values['new_window'] == 1 ? 'checked' : '').'></td>
    </tr>
    <tr>
    <td class="conf-title">'.$this->l('Sort order').':</td>
    <td class="conf-value"><input type="text" name="sort_order" size="5" value="'.$def_values['sort_order'].'"></td>
    </tr>
  </table>

  <input type="submit" name="addnew" value="'.$this->l('Save').'" class="button" style="cursor:pointer;">
 </fieldset>  
</form>      
      ';
      
      return $content;
    } 
    
    
   } 	