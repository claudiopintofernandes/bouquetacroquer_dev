<?php
  if (!defined('_PS_VERSION_'))
  	exit;
 
   class tonyflex2slider extends Module
   {
     public function __construct()
    {
      $this->name = 'tonyflex2slider';
		  $this->tab = 'Other';
		  $this->version = '1.0';
		  $this->author = 'TonyTheme';
		  $this->need_instance = 0;
		  
		  parent::__construct();
		  
		  $this->displayName = $this->l('Home page Flex slider');
		  $this->description = $this->l('Adds an flex slider to your home page');
		  $this->confirmUninstall = $this->l('Are you sure you want to uninstall?');
		  
	  
    }
    
    public function install()
    {
      if (Shop::isFeatureActive())
        Shop::setContext(Shop::CONTEXT_ALL);
      
      $cfg['button_color'] = '#c4c4c4';
      $cfg['button_hover_color'] = '#29abe2';
      
      $cfg = serialize($cfg);
      $ret = parent::install() && $this->registerHook('home') && $this->registerHook('header') && $this->registerHook('displayTopSlider') && $this->installDb() && Configuration::updateValue($this->name.'_settings', $cfg);
      
      return $ret;   
    }
    
    public function installDb()
    {
      $query = '
    CREATE TABLE IF NOT EXISTS `'._DB_PREFIX_.'flex2_tonyhomeslider` (
			`slide_id` INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
			`id_shop` INT(11) UNSIGNED NOT NULL,
			image varchar(255),
			sort_order int default 0,
			image_width int default 0,
			image_height int default 0,
			link text,
			cfg text,
			`new_window` TINYINT( 1 ) NOT NULL,
			INDEX (`id_shop`)
		) ENGINE = '._MYSQL_ENGINE_.' CHARACTER SET utf8 COLLATE utf8_general_ci;      
      ';
      
      $query2 = '
INSERT INTO `'._DB_PREFIX_.'flex2_tonyhomeslider` (`slide_id`, `id_shop`, `image`, `sort_order`, `image_width`, `image_height`, `link`, `cfg`, `new_window`) VALUES 
(1, 1, \'\', 2, 0, 0, \'\', \'a:1:{s:6:"images";a:1:{i:1;s:9:"anim3.gif";}}\', 0),
(2, 1, \'\', 3, 0, 0, \'\', \'a:1:{s:6:"images";a:1:{i:1;s:11:"slider2.jpg";}}\', 0),
(3, 1, \'\', 4, 0, 0, \'\', \'a:1:{s:6:"images";a:1:{i:1;s:18:"slide_featured.jpg";}}\', 0)
     
      ';
      

          
       
      
      $ret = Db::getInstance()->execute($query) && Db::getInstance()->execute($query2);
      
      return $ret;
      
    }
    
    private function uninstallDb()
	  { 
	 	 Db::getInstance()->execute('DROP TABLE if exists `'._DB_PREFIX_.'flex2_tonyhomeslider`');
		 return true;
	  }
	  
	  public function uninstall()
  	{
  	  Configuration::deleteByName($this->name.'_settings');
  		if (!parent::uninstall() ||
  			!$this->uninstallDB())
  			return false;
  		return true;
  	}
    
    public function hookHeader()
    {
      $this->context->controller->addJS(($this->_path).'js/launch.js');
      
    }
    
    public function displayForm()
    {
      $do = Tools::getValue('do');
      
      switch($do)
      {
        case 'removeslide':
        case 'removeslideimage':
        {
          $ssid = (int)Tools::getValue('ssid');
          $lngid = (int)Tools::getValue('lid');
          $query = "select cfg from "._DB_PREFIX_."flex2_tonyhomeslider where slide_id='$ssid'";
          $rows = Db::getInstance()->executeS($query);
          $cfg = unserialize($rows[0]['cfg']);
          
          
          
          if ($do == 'removeslideimage')
          {
            $image = $cfg['images'][$lngid];
            @unlink(_PS_MODULE_DIR_.$this->name.'/slides/'.$image);
            unset($cfg['images'][$lngid]);
            $cfg = Db::getInstance()->_escape(serialize($cfg));
            $query = "update "._DB_PREFIX_."flex2_tonyhomeslider set cfg='$cfg' where slide_id='$ssid'";
            Db::getInstance()->execute($query);
          
            Tools::redirectAdmin(AdminController::$currentIndex.'&configure='.$this->name.'&token='.Tools::getAdminTokenLite('AdminModules').'&do=addnewslide&ssid='.$ssid);
          }
          else
          {
            $query = "delete from "._DB_PREFIX_."flex2_tonyhomeslider where slide_id='$ssid'";
            Db::getInstance()->execute($query);
            
            Tools::redirectAdmin(AdminController::$currentIndex.'&configure='.$this->name.'&token='.Tools::getAdminTokenLite('AdminModules'));
          }  
          
        }break;
        case 'addnewslide':
        {
          $ssid = (int)Tools::getValue('ssid');
          $this->_clearCache('tonyflex2slider.tpl');
          $content = $this->_add_new_slide($ssid);
        }break;
        default:
          $content = $this->_main();
      }
      
      return $content;
    }
    
        
    function _add_new_slide($id = 0)
    {
      $languages = $this->context->controller->getLanguages();
		  $default_language = (int)Configuration::get('PS_LANG_DEFAULT');
		  $id_lang = (int)Context::getContext()->language->id;
		  $path = _MODULE_DIR_.$this->name.'/slides/';
		  $id_shop = (int)Shop::getContextShopID();
		  $def_values = array();
		  $uploaded_image = '';
		  
		  if ($id != 0)
		  {
		    $query = "select * from "._DB_PREFIX_."flex2_tonyhomeslider where slide_id='$id'";
		    $rows = Db::getInstance()->executeS($query);
		    
		    $def_values = $rows[0];
		    $def_values['cfg'] = unserialize($def_values['cfg']);
		    if (!is_array($def_values['cfg']))
		      $def_values['cfg'] = array();
		    
		    /*if (strlen($def_values['image']))
		      $uploaded_image = '<img src="'.$path.$def_values['image'].'" width="70%">&nbsp;[<a href="'.(AdminController::$currentIndex).'&token='.Tools::getAdminTokenLite('AdminModules').'&configure='.$this->name.'&do=removeslideimage&ssid='.$id.'">'.$this->l('Delete image').'</a>]';*/
		    
      }
      else
        $def_values['cfg'] = array();
      
      $image_inputs = '';
      foreach ($languages as $language)
      {
        $uploaded_image = '';
        if (strlen($def_values['cfg']['images'][$language['id_lang']]))
        {
		      $uploaded_image = '<img src="'.$path.$def_values['cfg']['images'][$language['id_lang']].'" width="70%">&nbsp;[<a href="'.(AdminController::$currentIndex).'&token='.Tools::getAdminTokenLite('AdminModules').'&configure='.$this->name.'&do=removeslideimage&ssid='.$id.'&lid='.$language['id_lang'].'">'.$this->l('Delete image').'</a>]';
        }  
        $image_inputs .= '
<div id="image_block_'.(int)$language['id_lang'].'" style="display: '.($language['id_lang'] == $id_lang ? 'block' : 'none').';">        
  <input type="file" name="image['.(int)$language['id_lang'].']"><br />'.$uploaded_image.'
</div>        
        ';
        
      }
      
		  
		  $message = '';
		  $image_sql = '';
		  
      $hidden_inputs = '';
      if (Tools::isSubmit('addnew'))
      {
        $link = Tools::getValue('link');
        $new_win = (int)Tools::getValue('new_window');
        $image_width = (int)Tools::getValue('image_width');
        $image_height = (int)Tools::getValue('image_height');
        $font = Db::getInstance()->_escape(Tools::getValue('font'));
        $sort_order = (int)Tools::getValue('sort_order');
        
        $def_values['link'] = $link;
        $def_values['new_window'] = $new_win;
        $def_values['sort_order'] = $sort_order;
        $def_values['font'] = $font;
        $def_values['image_width'] = $image_width;
        $def_values['image_height'] = $image_height;
        
    
        if (isset($_FILES['image']))
        {
          foreach($_FILES['image']['name'] as $language_id=>$image_name)
          {
            if (strlen($image_name) == 0)
              continue;
            
            $image = array(
              'name'=>$_FILES['image']['name'][$language_id],
              'type'=>$_FILES['image']['type'][$language_id],
              'tmp_name'=>$_FILES['image']['tmp_name'][$language_id],
              'error'=>$_FILES['image']['error'][$language_id],
              'size'=>$_FILES['image']['size'][$language_id],
            );  
            if ($error = ImageManager::validateUpload($image, Tools::convertBytes(ini_get('upload_max_filesize'))))
  					 $errors .= $error;
    				else
    				{
    				  $file_name = $image_name;
              $tmp_name = $_FILES['image']['tmp_name'][$language_id];
    				  
    				  if (!move_uploaded_file($tmp_name, _PS_MODULE_DIR_.$this->name.'/slides/'.$file_name))
  						  $errors .= $this->l('File upload error.');
  						else
              {
                 $def_values['cfg']['images'][$language_id] = $file_name;
                 ImageManager::resize(_PS_MODULE_DIR_.$this->name.'/slides/'.$file_name, _PS_MODULE_DIR_.$this->name.'/slides/previews/'.$file_name,454,190);
              }  
    				}
          }
        }
        
        $def_values['cfg'] = Db::getInstance()->_escape(serialize($def_values['cfg']));
        
        if (!$errors)
        {
          $link = Db::getInstance()->_escape($link);
          if ($id != 0)
          {
            $query = "update "._DB_PREFIX_."flex2_tonyhomeslider set cfg='{$def_values['cfg']}',id_shop='{$id_shop}',{$image_sql}sort_order='$sort_order',image_width='$image_width',image_height='$image_height',link='$link',new_window='$new_win' where slide_id='$id'";
            Db::getInstance()->execute($query);
            $slide_id = $id;
          }  
          else
          {
            $query = "insert into "._DB_PREFIX_."flex2_tonyhomeslider set cfg='{$def_values['cfg']}',id_shop='{$id_shop}',{$image_sql}sort_order='$sort_order',image_width='$image_width',image_height='$image_height',link='$link',new_window='$new_win'";
            Db::getInstance()->execute($query);
            $slide_id = Db::getInstance()->Insert_ID();
            
          }    
          
           
          Tools::redirectAdmin(AdminController::$currentIndex.'&configure='.$this->name.'&token='.Tools::getAdminTokenLite('AdminModules').'&do=addnewslide&ssid='.$slide_id.'&updated');
          
        }  
        
      }
      
      if (isset($_GET['updated']))
        $message = $this->displayConfirmation($this->l('Updated'));
      
      $content = $message;

      if (isset($errors))
			  $content .= $this->displayError($errors);
      
      
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
</style>
<form method="post" enctype="multipart/form-data">
'.$hidden_inputs.'
<fieldset class="conf-set">
<legend>'.$this->l('Add new slide').' ['.(Shop::getContext() == Shop::CONTEXT_SHOP ? $this->l('shop').' '.$this->context->shop->name : $this->l('all shops')).']</legend>

<a href="'.AdminController::$currentIndex.'&configure='.$this->name.'&token='.Tools::getAdminTokenLite('AdminModules').'"><input type="button" value="'.$this->l('Back').'" class="button" style="cursor:pointer;"></a>
<table class="conf-table">      
<tr>
    <td class="conf-title">'.$this->l('Image').':</td>
    <td class="conf-value">
    <div>'.$this->displayFlags($languages, (int)$id_lang, 'image_block', 'image_block', true).'</div><p style="clear: both;"> </p>
      '.$image_inputs.'
    </div>  
    </td>
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
    <td class="conf-value"><input type="text" name="sort_order" size="10" value="'.$def_values['sort_order'].'"></td>
</tr>
</table>

<input type="submit" name="addnew" value="'.$this->l('Save').'" class="button" style="cursor:pointer;">
</fieldset>

</form>
      ';
      
      return $content;
    }
    
    function _main()
    {
      $id_shop = (int)Shop::getContextShopID();
      $img_path = _MODULE_DIR_.$this->name.'/slides/';
      $default_language = (int)Configuration::get('PS_LANG_DEFAULT'); 
      
      $query = "select * from "._DB_PREFIX_."flex2_tonyhomeslider where id_shop='$id_shop' order by sort_order asc";
      $rows = Db::getInstance()->executeS($query);
      
      $slides = array();
      
      $content = '';
      foreach($rows as $row)
      {
        $slides[] = $row; 
      }
      ksort($slides);
      
      foreach($slides as $group=>$row)
      {
        $l = $group + 1;                                  
        $content .= '<fieldset class="conf-set"><legend>'.$this->l('Layer').' '.$l.'</legend>';
        $images = unserialize($row['cfg']);
        if (!is_array($images))
          $images = array();
        
        $image = current($images['images']);
        
        $content .= '
<div class="slider-div">          
<img src="'.$img_path.$image.'" width="200"><br />
    [<a href="'.(AdminController::$currentIndex).'&token='.Tools::getAdminTokenLite('AdminModules').'&configure='.$this->name.'&do=addnewslide&ssid='.$row['slide_id'].'">'.$this->l('Edit').'</a>]
    [<a href="'.(AdminController::$currentIndex).'&token='.Tools::getAdminTokenLite('AdminModules').'&configure='.$this->name.'&do=removeslide&ssid='.$row['slide_id'].'">'.$this->l('Delete').'</a>]
</div>
         ';
       
        $content .= '</fieldset>';
         
      }
      
      
     
      $cfg = unserialize(Configuration::get($this->name.'_settings'));
      
      if (!is_array($cfg))
        $cfg = array();
      
      
      $content = '
<style>
.conf-set{margin-bottom:10px;}
.conf-title{width:250px;font-weight:bold;text-align:right;}
.conf-table td{padding:0 5px 10px 0;}
.slider-div{float:left;text-align:center;padding:10px;}
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

<a href="'.AdminController::$currentIndex.'&token='.Tools::getAdminTokenLite('AdminModules').'&configure='.$this->name.'&do=addnewslide'.'"><input type="button" name="addnew" value="'.$this->l('Add slide').'" class="button"></a>
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
        foreach($this->slider_options as $id=>$data)
        {
          $cfg[$id] = Tools::getValue($id); 
        }
        $cfg = serialize($cfg);
        Configuration::updateValue($this->name.'_settings', $cfg);
        $this->_clearCache('tonyflex2slider.tpl');
        
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
    
    public function hookdisplayTopSlider($params)
    {
      return $this->hookDisplayHome($params);
    }
    public function hookDisplayHome($params)
    {
      $current_language = $this->context->language->id;
		  $id_shop = (int)Shop::getContextShopID();
		  
		  $query = "select * from "._DB_PREFIX_."flex2_tonyhomeslider where id_shop='$id_shop' order by sort_order asc";
		  $rows = Db::getInstance()->executeS($query);
		  
		  $slider = array();
		  $google_fonts = array();
		  
		  foreach($rows as $index=>$row)
		  {
        $cfg = unserialize($row['cfg']);
        if (!is_array($cfg))
           $cfg = array();
         
        $images = $cfg['images'];

        if (!isset($images[$current_language]))
          continue;
        $row['image'] = $images[$current_language]; 
           
        $slider[] = @array(
          'image'=>$this->context->link->protocol_content.Tools::getMediaServer($this->name)._MODULE_DIR_.$this->name.'/slides/'.$row['image'],
          'link'=>$row['link'],
          'new_window'=>$row['new_window'],
          'preview'=>$this->context->link->protocol_content.Tools::getMediaServer($this->name)._MODULE_DIR_.$this->name.'/slides/previews/'.$row['image'],
        );  
      }
      
      foreach($slider as $index=>&$slide)
      {
        if (isset($slider[$index + 1]))
          $next_idx = $index + 1;
        else
          $next_idx = 0;
        
        if (isset($slider[$index - 1]))
          $prev_idx = $index - 1;
        else
          $prev_idx = count($slider) - 1;  
               
        $slide['next_slide'] = $slider[$next_idx]['preview'];
        $slide['prev_slide'] = $slider[$prev_idx]['preview'];
      }
      
      
      $this->context->smarty->assign(array(
			  'tonyslider' => $slider,
		  ));
		  
      return ($this->display(__FILE__, 'tonyflex2slider.tpl'));
    }
    

    
   } 	