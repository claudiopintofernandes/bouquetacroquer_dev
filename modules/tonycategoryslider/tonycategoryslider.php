<?php
  if (!defined('_PS_VERSION_'))
  	exit;
 
   class tonycategoryslider extends Module
   {
     var $m_cat_opts;
     
     public function __construct()
    {
      $this->name = 'tonycategoryslider';
		  $this->tab = 'Other';
		  $this->version = '1.0';
		  $this->author = 'TonyTheme';
		  $this->need_instance = 0;
		  
		  parent::__construct();
		  
		  $this->displayName = $this->l('Category page slider');
		  $this->description = $this->l('Adds an image slider to category page');
		  $this->confirmUninstall = $this->l('Are you sure you want to uninstall?');
		  
    }
    
    public function install()
    {
	  if (!file_exists(_PS_MODULE_DIR_.$this->name.'/slides/')) {
		@mkdir(_PS_MODULE_DIR_.$this->name.'/slides/');
	  }
	
      if (Shop::isFeatureActive())
        Shop::setContext(Shop::CONTEXT_ALL);
      
      $ret = parent::install() && $this->registerHook('displayCategoryTop') && $this->registerHook('header') && $this->installDb();
      $cfg['button_color'] = '#9D3BC6';
      $cfg = serialize($cfg);
      Configuration::updateValue($this->name.'_settings', $cfg);
      $this->update_css();
      
      return $ret;   
    }
    
    public function installDb()
    {
      $query = '
    CREATE TABLE IF NOT EXISTS `'._DB_PREFIX_.'tonycategoryslider` (
			`slide_id` INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
			`id_shop` INT(11) UNSIGNED NOT NULL,
			`new_window` TINYINT( 1 ) NOT NULL,
			image varchar(255),
			link text,
			categoryID int,
			sort_order int default 0,
			INDEX (`id_shop`),
			KEY(categoryID)
		) ENGINE = '._MYSQL_ENGINE_.' CHARACTER SET utf8 COLLATE utf8_general_ci;      
      ';
      
      $query2 = '
    CREATE TABLE IF NOT EXISTS `'._DB_PREFIX_.'tonycategoryslider_texts` (
			`slide_id` INT UNSIGNED NOT NULL,
			`id_lang` INT(11) UNSIGNED NOT NULL,
      txt1 varchar(255), 
			KEY(slide_id,id_lang)
		) ENGINE = '._MYSQL_ENGINE_.' CHARACTER SET utf8 COLLATE utf8_general_ci;      
      ';
      
      return Db::getInstance()->execute($query) && Db::getInstance()->execute($query2);
      
    }
    
    private function uninstallDb()
	  { 
	 	 Db::getInstance()->execute('DROP TABLE if exists `'._DB_PREFIX_.'tonycategoryslider`');
	 	 Db::getInstance()->execute('DROP TABLE if exists `'._DB_PREFIX_.'tonycategoryslider_texts`');
		 return true;
	  }
	  
	  public function uninstall()
  	{
  		if (!parent::uninstall() ||
  			!$this->uninstallDB())
  			return false;
  		return true;
  	}
    
    public function hookHeader()
    {
      $current_id = (int)Tools::getValue('id_category');
      if ($current_id)
      {
        $this->context->controller->addCSS(($this->_path).'css/flexslider.css', 'all');
        $this->context->controller->addCSS(($this->_path).'css/customization.css', 'all');
      }  
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
          $query = "select image from "._DB_PREFIX_."tonycategoryslider where slide_id='$ssid'";
          $rows = Db::getInstance()->executeS($query);
          $image = $rows[0]['image'];
          
          @unlink(_PS_MODULE_DIR_.$this->name.'/slides/'.$image);
          
          if ($do == 'removeslideimage')
          {
            $query = "update "._DB_PREFIX_."tonycategoryslider set image='' where slide_id='$ssid'";
            Db::getInstance()->execute($query);
          
            Tools::redirectAdmin(AdminController::$currentIndex.'&configure='.$this->name.'&token='.Tools::getAdminTokenLite('AdminModules').'&do=addnewslide&ssid='.$ssid);
          }
          else
          {
            $query = "delete from "._DB_PREFIX_."tonycategoryslider where slide_id='$ssid'";
            Db::getInstance()->execute($query);
          
            Tools::redirectAdmin(AdminController::$currentIndex.'&configure='.$this->name.'&token='.Tools::getAdminTokenLite('AdminModules'));
          }  
          
        }break;
        case 'addnewslide':
        {
          $ssid = (int)Tools::getValue('ssid');
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
		    $query = "select * from "._DB_PREFIX_."tonycategoryslider where slide_id='$id'";
		    $rows = Db::getInstance()->executeS($query);
		    
		    $def_values = $rows[0];
		    
		    if (strlen($def_values['image']))
		      $uploaded_image = '<img src="'.$path.$def_values['image'].'">&nbsp;[<a href="'.(AdminController::$currentIndex).'&token='.Tools::getAdminTokenLite('AdminModules').'&configure='.$this->name.'&do=removeslideimage&ssid='.$id.'">'.$this->l('Delete image').'</a>]';
		    
        $query = "select * from "._DB_PREFIX_."tonycategoryslider_texts where slide_id='{$def_values['slide_id']}'";
        $rows = Db::getInstance()->executeS($query);
        
        foreach($rows as $row)
        {
          $def_values['txt1'][$row['id_lang']] = $row['txt1'];
        }
      }
      
		  
		  $message = '';
		  $image_sql = '';
		  
      $hidden_inputs = '';
      if (Tools::isSubmit('addnew'))
      {
        $this->_clearCache('tonycategoryslider.tpl');
        $link = Tools::getValue('link');
        $new_win = (int)Tools::getValue('new_window');
        $sort_order = (int)Tools::getValue('sort_order');
        $categoryID = Tools::getValue('categoryID');
        
        $def_values['link'] = $link;
        $def_values['new_window'] = $new_win;
        $def_values['sort_order'] = $sort_order;
        $def_values['categoryID'] = $categoryID;

        if (isset($_FILES['image']) && isset($_FILES['image']['tmp_name']) && !empty($_FILES['image']['tmp_name']))
        {
          if ($error = ImageManager::validateUpload($_FILES['image'], Tools::convertBytes(ini_get('upload_max_filesize'))))
					 $errors .= $error;
  				else
  				{
  				  $file_name = $_FILES['image']['name'];
  				  $file_name = $this->get_file_name($file_name, _PS_MODULE_DIR_.$this->name.'/slides/');
  				  
  				  if (!move_uploaded_file($_FILES['image']['tmp_name'], _PS_MODULE_DIR_.$this->name.'/slides/'.$file_name))
						  $errors .= $this->l('File upload error.');
						else
            {
               $hidden_inputs .= '<input type="hidden" name="uploaded_file" value="'.$file_name.'">';
               $uploaded_image = '<img src="'.$path.$file_name.'">';
               $image_sql = "image='{$file_name}',";
            }  
  				}
        }
        elseif(strlen($def_values['image']) == 0)
          $errors .= $this->l('You need to upload slide image');
        
        if (!$errors)
        {
          $link = Db::getInstance()->_escape($link);
          $categoryID = Db::getInstance()->_escape($categoryID);
          if ($id != 0)
          {
            $query = "update "._DB_PREFIX_."tonycategoryslider set id_shop='{$id_shop}',new_window='$new_win',link='$link',{$image_sql}categoryID='$categoryID',sort_order='$sort_order' where slide_id='$id'";
            Db::getInstance()->execute($query);
            $slide_id = $id;
          }  
          else
          {
            $query = "insert into "._DB_PREFIX_."tonycategoryslider set id_shop='{$id_shop}',new_window='$new_win',{$image_sql}link='$link',categoryID='$categoryID',sort_order='$sort_order'";
            Db::getInstance()->execute($query);
            $slide_id = Db::getInstance()->Insert_ID();
            
          }    
          
          
          
          
          if (is_array($_POST['txt1_']))
          {
            foreach($_POST['txt1_'] as $lng_id=>$data)
            {
              $data1 = Db::getInstance()->_escape($data);
             
           
              if ($id != 0)
                $query = "update "._DB_PREFIX_."tonycategoryslider_texts set txt1='$data1' where slide_id='$id' and id_lang='$lng_id'";
              else
                $query = "insert into "._DB_PREFIX_."tonycategoryslider_texts set slide_id='$slide_id',id_lang='$lng_id',txt1='$data1'";
              
              Db::getInstance()->execute($query);
              
              $def_values['txt1'][$lng_id] = $data; 
            }

          }
          
          Tools::redirectAdmin(AdminController::$currentIndex.'&configure='.$this->name.'&token='.Tools::getAdminTokenLite('AdminModules').'&do=addnewslide&ssid='.$slide_id.'&updated');
          
        }  
        
      }
      
      if (isset($_GET['updated']))
        $message = $this->displayConfirmation($this->l('Updated'));
      
      $content = $message;

      if (isset($errors))
			  $content .= $this->displayError($errors);
			
      $group_opts = '';
      
      $txt_inputs = '';
		  foreach ($languages as $language)
		  {
		    $txt_inputs .= '
<div id="html_block_'.(int)$language['id_lang'].'" style="display: '.($language['id_lang'] == $id_lang ? 'block' : 'none').';">
				<div>
						<table>
              <tr><td><input type="text" name="txt1_['.(int)$language['id_lang'].']" size="50" value="'.$def_values['txt1'][$language['id_lang']].'"></td>
              </tr>
            </table>  
			  </div>
			  </div>		    
        ';
      }
      
      $cats = Category::getCategories();
      $current = array('infos'=>array('name'=>'All'));
      $this->recurseCategory($cats,current($cats),key($cats),$def_values['categoryID']);
      
			
      $content .= '
<style>
.conf-set{margin-bottom:10px;}
.conf-title{width:200px;font-weight:bold;text-align:right;}
.conf-table td{padding:0 5px 10px 0;}
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
    <td class="conf-title">'.$this->l('Category ID').':</td>
    <td class="conf-value"><select name="categoryID">'.$this->m_cat_opts.'</select></td>
</tr>      
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
    <td class="conf-value"><input type="text" name="sort_order" size="10" value="'.$def_values['sort_order'].'"></td>
</tr>

<tr>
    <td class="conf-title">'.$this->l('Alternative Text').':</td>
    <td class="conf-value">
    <div>'.$this->displayFlags($languages, (int)$id_lang, 'html_block', 'html_block', true).'</div><p style="clear: both;"> </p>
      '.$txt_inputs.'
    </td>
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
      $id_lang = (int)Context::getContext()->language->id; 
      
      $query = "select * from "._DB_PREFIX_."tonycategoryslider where id_shop='$id_shop' order by categoryID asc, sort_order asc";
      $rows = Db::getInstance()->executeS($query);
      
      $slides = array();
      
      $content = '';
      foreach($rows as $row)
      {
        $slides[$row['categoryID']][] = $row; 
      }
      ksort($slides);
      
      foreach($slides as $group=>$rows)
      {
        if ($group == 1)//Root
          $title = $this->l("All Categories");
        else
        {
          $title = $this->l("Category - ");
          $category = new Category($group,$id_lang);
          $title .= $category->name; 
        }  
        
        $content .= '<fieldset class="conf-set"><legend>'.$title.'</legend>';
        foreach($rows as $row)
        {
          $content .= '
<div class="slider-div">          
<img src="'.$img_path.$row['image'].'" width="200"><br />
    [<a href="'.(AdminController::$currentIndex).'&token='.Tools::getAdminTokenLite('AdminModules').'&configure='.$this->name.'&do=addnewslide&ssid='.$row['slide_id'].'">'.$this->l('Edit').'</a>]
    [<a href="'.(AdminController::$currentIndex).'&token='.Tools::getAdminTokenLite('AdminModules').'&configure='.$this->name.'&do=removeslide&ssid='.$row['slide_id'].'">'.$this->l('Delete').'</a>]
</div>         
         ';
        }  
        
        $content .= '</fieldset>';
         
      }  
      
      $cfg = unserialize(Configuration::get($this->name.'_settings'));
      if (!is_array($cfg))
        $cfg = array();
     
      
      
      $content = '
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
<legend>'.$this->l('Slider configuration').' ['.(Shop::getContext() == Shop::CONTEXT_SHOP ? $this->l('shop').' '.$this->context->shop->name : $this->l('all shops')).']</legend>

<fieldset class="conf-set">
<legend>'.$this->l('Color options').'</legend>
<table class="conf-table">      
<tr>
    <td class="conf-title">'.$this->l('Button color').':</td>
    <td class="conf-value"><input type="text" name="button_color" value="'.$cfg['button_color'].'" class="color mColorPickerInput mColorPicker" data-hex="true"><div class="comment">Set color for navigation buttons</div></td>
</tr>
</table>
<input type="submit" name="savesett" value="'.$this->l('Save').'" class="button" style="cursor:pointer;">
</fieldset>

'.$content.'

<a href="'.AdminController::$currentIndex.'&token='.Tools::getAdminTokenLite('AdminModules').'&configure='.$this->name.'&do=addnewslide'.'"><input type="button" name="addnew" value="'.$this->l('Add slide').'" class="button" style="cursor:pointer;"></a>
</fieldset>

</form>
      ';
      
      return $content;
    }
    
    public function getContent()
    {
      if (Tools::isSubmit('savesett'))
      {
        $cfg = array();
        
        $cfg['button_color'] = Tools::getValue('button_color');
        $cfg = serialize($cfg);
        Configuration::updateValue($this->name.'_settings', $cfg);
        
        $this->update_css();
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
    
    public function hookdisplayCategoryTop($params)
    {
      $current_language = $this->context->language->id;
      $current_id = (int)Tools::getValue('id_category');
      if ($current_id == 0)
        $current_id = 1;
		  $id_shop = (int)Shop::getContextShopID();
		  
		  $query = "select * from "._DB_PREFIX_."tonycategoryslider where id_shop='$id_shop' and categoryID='$current_id' order by categoryID asc, sort_order asc";
		  $rows = Db::getInstance()->executeS($query);
		  
		  if ((count($rows) == 0) && ($current_id != 1))
		  {
		    $current_id = 1;
		    $query = "select * from "._DB_PREFIX_."tonycategoryslider where id_shop='$id_shop' and categoryID='$current_id' order by categoryID asc, sort_order asc";
		    $rows = Db::getInstance()->executeS($query);
      }
		  
      if (count($rows) == 0)
        return '';  
		  
		  
		  $slider = array();
		  
		  foreach($rows as $row)
		  {
		    $query = "select * from "._DB_PREFIX_."tonycategoryslider_texts where slide_id='{$row['slide_id']}' and id_lang='$current_language'";
		    $rows2 = Db::getInstance()->executeS($query);
		    $texts = $rows2[0];
		    
		    $slider[] = array(
          'new_window'=>(int)$row['new_window'],
          'image'=>$this->context->link->protocol_content.Tools::getMediaServer($this->name)._MODULE_DIR_.$this->name.'/slides/'.$row['image'],
          'link'=>$row['link'],
          'alt'=>$texts['txt1'],
        );
      }
      
      ksort($slider);
      
      $this->context->smarty->assign(array(
			  'catslider' => $slider,
		  ));
		  
      return ($this->display(__FILE__, 'tonycategoryslider.tpl'));
    }
    
    public function recurseCategory($categories, $current, $id_category = 1, $id_selected = 1)
  	{
  	  $name = ($current['infos']['name'] == 'Root') ? $this->l('All categories') : $current['infos']['name'];
  	  
  	  if ($id_category > 0)
  	  {
  		  $this->m_cat_opts .= '<option value="'.$id_category.'"'.(($id_selected == $id_category) ? ' selected="selected"' : '').'>'.
  		  str_repeat('&nbsp;', $current['infos']['level_depth'] * 5).stripslashes($name).'</option>';
  		}  
  		if (isset($categories[$id_category]))
  			foreach (array_keys($categories[$id_category]) as $key)
  				$this->recurseCategory($categories, $categories[$id_category][$key], $key, $id_selected);
  	}
  	
  	function update_css()
    {
      $css_files = array('customization.css');
  	  @chmod(_PS_MODULE_DIR_.$this->name.'/css',0755);
  	  $cfg = unserialize(Configuration::get($this->name.'_settings'));
      if (!is_array($cfg))
        $cfg = array();
      
  	  $search = array(
  	  '{$button_color}',
      );
  	  $replace = array(
  	  $cfg['button_color'],
      );
  	  
  	  foreach($css_files as $file)
  	  {
  	    @chmod(_PS_MODULE_DIR_.$this->name.'/css/'.$file,0755);
  	    
  	    $file_content = file_get_contents(_PS_MODULE_DIR_.$this->name.'/css/template_'.$file);
  	    $file_content = str_replace($search,$replace,$file_content);
  	    file_put_contents(_PS_MODULE_DIR_.$this->name.'/css/'.$file,$file_content);
      }
    }
    
    function get_file_name($original_name, $folder)
    {
      static $i = 1;
      
      if (file_exists($folder.$original_name))
      {
        $new_name = '';
        if (preg_match("/^([0-9]+)_(.*)/",$original_name,$ret))
        {
          $new_name = ($ret[1] + 1).'_'.$ret[2]; 
        }
        else
          $new_name = '1_'.$original_name;
        
        return self::get_file_name($new_name, $folder); 
      }
      else
        return $original_name;
    }
  	
    
   } 	