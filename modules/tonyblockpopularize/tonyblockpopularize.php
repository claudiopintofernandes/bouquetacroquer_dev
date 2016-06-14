<?php
  if (!defined('_PS_VERSION_'))
  	exit;
  	
  function tonypop_sort($a,$b)
  {
    if ($a['sort_order'] == $b['sort_order']) 
    {
        return 0;
    }
    return ($a['sort_order'] < $b['sort_order']) ? -1 : 1;

  }
 
   class tonyblockpopularize extends Module
   {
     public function __construct()
    {
      $this->name = 'tonyblockpopularize';
		  $this->tab = 'Other';
		  $this->version = '1.0';
		  $this->author = 'TonyTheme';
		  $this->need_instance = 0;
		  
		  parent::__construct();
		  
		  $this->displayName = $this->l('Popularize block');
		  $this->description = $this->l('Adds an block with various info(about, social widgets, contacts, etc.)');
		  $this->confirmUninstall = $this->l('Are you sure you want to uninstall?');
		  
		  if (get_magic_quotes_gpc())
		  {
		    $this->stripslashes_rec($_GET);
		    $this->stripslashes_rec($_POST);
      }
		  
		  $default_language = (int)Configuration::get('PS_LANG_DEFAULT');
		  $this->m_def_value = serialize(Array
(
    0 => Array
        (
            'title' => Array($default_language => 'ABOUT PRESTO'),

            'content' => Array
                (
                    $default_language => '<p><strong>You can edit this in admin<br /></strong></p>
<p><strong>Fusce eu dui. Integer vel nibh sit amet turpis vulputate aliquet. </strong>Phasellus id tesque a leo. Donec consequat lectus sed felis. Quisque vestibulum massa. Nulla ornare. Nulla libero.</p>
<p>Nullam ac nisi non eros gravida venenatis.<br /> Ut euismod, turpis sollicitudin lobortis pellentesque, libero massa dapibus dui, eu dictum justo urna et mi. Integer dictum est vitae sem.</p>
<p>Vestibulum justo. Nulla mauris ipsum, convallis ut, vestibulum eu, tincidunt vel, nisi. Curabitur molestie euismod erat. Proin eros odio, mattis rutrum.</p>',
                ),

            'sort_order' => 1,
            'icon' => '<i class="icon-info-circled"></i>',
        ),

    1 => Array
        (
            'title' => Array
                (
                    $default_language => 'FACEBOOK',
                ),

            'content' => Array
                (
                    $default_language => '<p><strong>You can edit this in admin</strong></p>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_En/all.js#xfbml=1";
  fjs.parentNode.insertBefore(js, fjs);
}(document, \'script\', \'facebook-jssdk\'));</script>
<div class="fb-like-box" data-href="https://www.facebook.com/themeforest" data-width="270" data-height="300" data-show-faces="true" data-stream="false" data-show-border="false" data-header="false"></div>
',
                ),

            'sort_order' => 2,
            'icon' => '<i class="icon-facebook-circled-1"></i>'
        ),

    2 => Array
        (
            'title' => Array
                (
                    $default_language => 'TWITTER FEEDS',
                ),

            'content' => Array
                (
                    $default_language => '<p><strong>You can edit this in admin</strong></p>

<p><a class="twitter-timeline" href="https://twitter.com/googledevs" data-widget-id="362596981383786496" data-border-color="#ffffff" data-chrome="noheader nofooter noscrollbar"></a></p>
<script type="text/javascript">// <![CDATA[
!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?\'http\':\'https\';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");
// ]]></script>',
                ),

            'sort_order' => 3,
            'icon' => '<i class="icon-twitter-circled-1"></i>',
        ),

    3 => Array
        (
            'title' => Array
                (
                    $default_language => 'CONTACT US',
                ),

            'content' => Array
                (
                    $default_language => '<p><strong>You can edit this in admin</strong></p>
<ul class="icons">
<li><em class="icon-phone"></em><strong>CONTACT PHONE:</strong><br /> 321321321, 321321321</li>
<li><em class="icon-mobile-alt"></em><strong>CELL PHONE:</strong><br /> 123123123, 123123123</li>
<li><em class="icon-mail-1"></em><strong>E-MAIL ADDRESSES:</strong><br /> <a href="mailto:sales@mydomain.com">SALES@MYDOMAIL.COM</a> <br /> <a href="mailto:info@mydomain.com">INFO@MYDOMAIN.COM</a></li>
<li><em class="icon-skype"></em><strong>SKYPE:</strong><br /> TEST.SHOP, SHOP.TEST</li>
</ul>',
                ),

            'sort_order' => 4,
            'icon' => '<i class="icon-mail-circled"></i>'
        )

))
;
		  
    }
    
    public function install()
    {
      if (Shop::isFeatureActive())
        Shop::setContext(Shop::CONTEXT_ALL);
      
      $ret = parent::install() && $this->registerHook('home') && $this->registerHook('displayBlockPopularize') && $this->registerHook('displayBlockPopularize2') && Configuration::updateValue('TONY_HOME_POPULARIZE', '') && Configuration::updateValue('TONY_HOME_POPULARIZE', $this->m_def_value, true) && Configuration::updateValue('TONY_HOME_POPULARIZE_SHOW', '1');
      
      return $ret;   
    }
    
    public function uninstall()
    {
      $ret = parent::uninstall() && Configuration::deleteByName('TONY_HOME_POPULARIZE') && Configuration::deleteByName('TONY_HOME_POPULARIZE_SHOW');
      
      return $ret;
    }
    
    public function hookdisplayBlockPopularize($params)
    {
      $show_mode = (int)Configuration::get('TONY_HOME_POPULARIZE_SHOW');
      $params['force_display'] = 1;
      if ($show_mode)
        return $this->hookDisplayHome($params);
      else
        return '';  
    }
    
    public function hookdisplayBlockPopularize2($params)
    {
      $params['force_display'] = 1;
      return $this->hookDisplayHome($params);
    }
    
    public function hookDisplayHome($params)
    {
      if ($this->is_left_menu_enabled() && !isset($params['force_display']))
        return '';
        
      $current_language = $this->context->language->id;
      $config = unserialize(Configuration::get('TONY_HOME_POPULARIZE'));
      if (!is_array($config))
        $config = array();
      
      usort($config,'tonypop_sort');
      
      foreach($config as &$cfg)
      {
        $cfg['title'] = $cfg['title'][$current_language];        
        $cfg['content'] = $cfg['content'][$current_language];
      }  
      
      $cols_count = 4;
      $rows_count = ceil(count($config) / $cols_count);
      $result = array();
      $index = 0;
      
      for($i = 0; $i < $rows_count;$i++) 
      {
        for($j = 0; $j < $cols_count;$j++)
        {
          if (isset($config[$index]))
            $result[$i][$j] = $config[$index];
          $index++;       
        }
      }
      
      $this->context->smarty->assign(array(
			  'tonyblocks' => $result,
		  ));
      
      return ($this->display(__FILE__, 'tonyblockpopularize.tpl'));
    }
    
    public function displayForm()
    {
      if (Tools::isSubmit('savesett'))
      {
        $show_mode = (int)Tools::getValue('show_mode');
        Configuration::updateValue('TONY_HOME_POPULARIZE_SHOW', $show_mode);
        Tools::redirectAdmin(AdminController::$currentIndex.'&configure='.$this->name.'&token='.Tools::getAdminTokenLite('AdminModules').'&updated');
      }
      
      $do = Tools::getValue('do');
      $config = unserialize(Configuration::get('TONY_HOME_POPULARIZE'));
      
      if (!is_array($config))
        $config = array();
      
      $content = '';
      
      switch($do)
      {
        case 'remove':
        {
          $id = (int)Tools::getValue('id');
          unset($config[$id]);
          
          Configuration::updateValue('TONY_HOME_POPULARIZE', serialize($config), true);
          $this->_clearCache('tonyblockpopularize.tpl');
          
          Tools::redirectAdmin(AdminController::$currentIndex.'&configure='.$this->name.'&token='.Tools::getAdminTokenLite('AdminModules'));
        }break;
        case 'addnew':
        {
          $content = $this->_add_block($config);
        }break;
        default:
        {
          
          $content = $this->_main($config);
        }
      }
      
      return $content;
    }
    
    public function getContent()
    {
      return $this->displayForm();
    }
    
    function _main($config)
    { 
      $message = '';
      if (isset($_GET['updated']))
        $message = $this->displayConfirmation($this->l('Updated'));
      uasort($config,'tonypop_sort');
      $default_language = (int)Configuration::get('PS_LANG_DEFAULT');
      $content = '';
      $index = 1;
      foreach($config as $id=>$cfg)
      {
        $content .= '
<tr>
  <td width="300"><b>'.$index.'. '.$cfg['title'][$default_language].'</b></td>
  <td>  [<a href="'.(AdminController::$currentIndex).'&token='.Tools::getAdminTokenLite('AdminModules').'&configure='.$this->name.'&do=addnew&id='.$id.'">'.$this->l('Edit').'</a>]
    [<a href="'.(AdminController::$currentIndex).'&token='.Tools::getAdminTokenLite('AdminModules').'&configure='.$this->name.'&do=remove&id='.$id.'">'.$this->l('Delete').'</a>]
  </td>
</tr>        
        ';
        
        $index++;
      }
      
      $show_mode = Configuration::get('TONY_HOME_POPULARIZE_SHOW');
      
      $content = $message.'
<style>
.conf-set{margin-bottom:10px;}
.conf-title{width:200px;font-weight:bold;text-align:right;}
.conf-table td{padding:0 5px 10px 0;}
.slider-div{float:left;text-align:center;padding:10px;}
</style>

<form method="post">
<fieldset class="conf-set">
<legend>'.$this->l('Blocks').' ['.(Shop::getContext() == Shop::CONTEXT_SHOP ? $this->l('shop').' '.$this->context->shop->name : $this->l('all shops')).']</legend>

<fieldset class="conf-set" style="font-size:12px;">
<legend>'.$this->l('Display options').'</legend>
<table class="conf-table">      
<tr>
    <td class="conf-title">'.$this->l('Show on all pages').':</td>
    <td class="conf-value"><input type="checkbox" name="show_mode" value="1" '.($show_mode == 1 ? 'checked' : '').'></td>
</tr>
</table>
<input type="submit" name="savesett" value="'.$this->l('Save').'" class="button" style="cursor:pointer;">
</fieldset>

<table class="conf-table">
'.$content.'
</table>

<a href="'.AdminController::$currentIndex.'&token='.Tools::getAdminTokenLite('AdminModules').'&configure='.$this->name.'&do=addnew'.'"><input type="button" name="addnew" value="'.$this->l('Add Block').'" class="button" style="cursor:pointer;"></a>
</fieldset>

</form>
      ';
      
      return $content;
      
    }
    
    public function stripslashes_rec(&$link) 
    {
      if (is_array($link)) {
        foreach ($link as &$element)
          $this->stripslashes_rec($element);
        } else $link = stripslashes($link);
      return true;
    }

    
    function _add_block($config)
    {
      $languages = $this->context->controller->getLanguages();
      $id_lang = (int)Context::getContext()->language->id;
      $id = isset($_GET['id']) ? (int)$_GET['id'] : false;
      $def_values = array();
      
      if ($id !== false) 
      {
        $def_values = $config[$id];
      }
      
      if (Tools::isSubmit('addnew'))
      {
        $title = Tools::getValue('title_');
        $content = Tools::getValue('content_');
        $sort_order = (int)Tools::getValue('sort_order');
        $icon = Tools::getValue('icon');
        
        if ($id !== false)
        {
          $config[$id] = array(
            'title' => $title,
            'content' => $content,
            'sort_order' => $sort_order,
            'icon' => $icon 
          );
        }
        else
        {
          $config[] = array(
            'title' => $title,
            'content' => $content,
            'sort_order' => $sort_order,
            'icon' => $icon          
          );
        }

        Configuration::updateValue('TONY_HOME_POPULARIZE', serialize($config), true);
        $this->_clearCache('tonyblockpopularize.tpl');
        
        Tools::redirectAdmin(AdminController::$currentIndex.'&configure='.$this->name.'&token='.Tools::getAdminTokenLite('AdminModules').'&updated');
      }

      
      
      
      $title_html = '';
      $content_html = '';
      foreach ($languages as $language)
      {
        $title_html .= '
<div id="title_'.(int)$language['id_lang'].'" style="display: '.($language['id_lang'] == $id_lang ? 'block' : 'none').';">
  <input type="text" name="title_['.(int)$language['id_lang'].']" size="100" value="'.$def_values['title'][$language['id_lang']].'">
</div>        
        ';
        $content_html .= '
<div id="content_'.(int)$language['id_lang'].'" style="display: '.($language['id_lang'] == $id_lang ? 'block' : 'none').';">
  <textarea class="rte" name="content_['.(int)$language['id_lang'].']" cols="97" rows="15">'.$def_values['content'][$language['id_lang']].'</textarea>
</div>        
        ';
      }
      
      $icon_opts = '';
      $icons = array('Info'=>'icon-info-circled','Facebook'=>'icon-facebook-circled-1','Twitter'=>'icon-twitter-circled-1','Contact'=>'icon-mail-circled');
      foreach($icons as $title=>$id)
      {
        $selected = ($def_values['icon'] == $id) ? 'selected' : '';
        $icon_opts .= '<option value="'.$id.'" '.$selected.'>'.$title.'</option>';
      }
      
      $mce = $this->add_tinymce();
      $content = $mce.'
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
  <fieldset class="conf-set">
   <legend>'.$this->l('Add new block').' ['.(Shop::getContext() == Shop::CONTEXT_SHOP ? $this->l('shop').' '.$this->context->shop->name : $this->l('all shops')).']</legend>
   
   <a href="'.AdminController::$currentIndex.'&configure='.$this->name.'&token='.Tools::getAdminTokenLite('AdminModules').'"><input type="button" value="'.$this->l('Back').'" class="button" style="cursor:pointer;"></a>
   
   <table class="conf-table">      
   <tr>
      <td class="conf-title">'.$this->l('Title').':</td>
      <td class="conf-value">'.$this->displayFlags($languages, (int)$id_lang, 'title', 'title', true).'</div><p style="clear: both;"> </p>'.$title_html.'</td>
   </tr>
   <tr>
    <td class="conf-title">'.$this->l('Title icon').':</td>
    <td class="conf-value"><textarea cols="50" rows="3" name="icon">'.$def_values['icon'].'</textarea></td>
    </tr>
   <tr>
    <td class="conf-title">'.$this->l('Content').':</td>
    <td class="conf-value">'.$this->displayFlags($languages, (int)$id_lang, 'content', 'content', true).'</div><p style="clear: both;"> </p>'.$content_html.'</td>
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
    
    function add_tinymce()
    {
      return '';
      $iso = $this->context->language->iso_code;
      $id_lang_default = (int)Configuration::get('PS_LANG_DEFAULT');
      
      $content = '';
  		if (version_compare(_PS_VERSION_, '1.4.0.0') >= 0)
  		{
  			$content .= '
  			<script type="text/javascript">	
  				var iso = \''.(file_exists(_PS_ROOT_DIR_.'/js/tiny_mce/langs/'.$iso.'.js') ? $iso : 'en').'\' ;
  				var pathCSS = \''._THEME_CSS_DIR_.'\' ;
  				var ad = \''.dirname($_SERVER['PHP_SELF']).'\' ;
  			</script>
  			<script type="text/javascript" src="'.__PS_BASE_URI__.'js/tiny_mce/tiny_mce.js"></script>
  			<script type="text/javascript" src="'.__PS_BASE_URI__.'js/tinymce.inc.js"></script>
  			<script language="javascript" type="text/javascript">
  				id_language = Number('.$id_lang_default.');
  				tinySetup();
  			</script>';
  		}	
  		else
  		{
  			$content .= '
  			<script type="text/javascript" src="'.__PS_BASE_URI__.'js/tinymce/jscripts/tiny_mce/tiny_mce.js"></script>
  			<script type="text/javascript">
  				tinyMCE.init({
  					mode : "textareas",
  					theme : "advanced",
  					plugins : "safari,pagebreak,style,layer,table,advimage,advlink,inlinepopups,media,searchreplace,contextmenu,paste,directionality,fullscreen",
  					theme_advanced_buttons1 : "newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,styleselect,formatselect,fontselect,fontsizeselect",
  					theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,,|,forecolor,backcolor",
  					theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,media,|,ltr,rtl,|,fullscreen",
  					theme_advanced_buttons4 : "insertlayer,moveforward,movebackward,absolute,|,styleprops,|,cite,abbr,acronym,del,ins,attribs,|,pagebreak",
  					theme_advanced_toolbar_location : "top",
  					theme_advanced_toolbar_align : "left",
  					theme_advanced_statusbar_location : "bottom",
  					theme_advanced_resizing : false,
  					content_css : "'.__PS_BASE_URI__.'themes/'._THEME_NAME_.'/css/global.css",
  					document_base_url : "'.__PS_BASE_URI__.'",
  					width: "600",
  					height: "auto",
  					font_size_style_values : "8pt, 10pt, 12pt, 14pt, 18pt, 24pt, 36pt",
  					template_external_list_url : "lists/template_list.js",
  					external_link_list_url : "lists/link_list.js",
  					external_image_list_url : "lists/image_list.js",
  					media_external_list_url : "lists/media_list.js",
  					elements : "nourlconvert",
  					entity_encoding: "raw",
  					convert_urls : false,
  					language : "'.(file_exists(_PS_ROOT_DIR_.'/js/tinymce/jscripts/tiny_mce/langs/'.$iso.'.js') ? $iso : 'en').'"
  				});
  				id_language = Number('.$id_lang_default.');
  			</script>';
  		}
		  return $content;
    }
    
    function is_left_menu_enabled()
    {
      return (int)Configuration::get('TONYTHEME_LEFT_MENU');
    }
    
   } 	