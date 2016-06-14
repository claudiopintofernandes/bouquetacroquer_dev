<?php
  if (!defined('_PS_VERSION_'))
  	exit;
 
   class tonythemesocialsharer extends Module
   {
     public function __construct()
    {
      $this->name = 'tonythemesocialsharer';
		  $this->tab = 'Other';
		  $this->version = '1.0';
		  $this->author = 'TonyTheme';
		  $this->need_instance = 0;
		  
		  parent::__construct();
		  
		  $this->displayName = $this->l('Social networks share');
		  $this->description = $this->l('Lets share your site pages in social networks');
		  $this->confirmUninstall = $this->l('Are you sure you want to uninstall?');
		  
		  $this->def_value = '<!-- AddThis Button BEGIN -->
<div class="addthis_toolbox addthis_default_style ">
<a class="addthis_button_preferred_1"></a>
<a class="addthis_button_preferred_2"></a>
<a class="addthis_button_preferred_3"></a>
<a class="addthis_button_preferred_4"></a>
<a class="addthis_button_compact"></a>
<a class="addthis_counter addthis_bubble_style"></a>
</div>
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=xa-51dea4a652152d44"></script>
<!-- AddThis Button END -->';
		  
    }
    
    public function install()
    {
      if (Shop::isFeatureActive())
        Shop::setContext(Shop::CONTEXT_ALL);
      
      $ret = parent::install() && $this->registerHook('DisplayRightColumnProduct') && Configuration::updateValue('TONY_SOCIAL_LINKS', '') && Configuration::updateValue('TONY_SOCIAL_LINKS', $this->def_value,true) && $this->registerHook('header');
      
      return $ret;   
    }
    
    public function displayForm()
    {
      if (isset($_GET['updated']))
        $message = $this->displayConfirmation($this->l('Updated'));
      
      if (Tools::isSubmit('save'))
      {
        $code = Tools::getValue('code');
        Configuration::updateValue('TONY_SOCIAL_LINKS', $code, true);
        
        Tools::redirectAdmin(AdminController::$currentIndex.'&configure='.$this->name.'&token='.Tools::getAdminTokenLite('AdminModules').'&updated');
      }  
      
      $def_value = Configuration::get('TONY_SOCIAL_LINKS'); 
      
      $content = $message.'
<style>
.conf-set{margin-bottom:10px;}
.conf-title{width:200px;font-weight:bold;text-align:right;}
.conf-table td{padding:0 5px 10px 0;}
.slider-div{float:left;text-align:center;padding:10px;}
.comment{font-size:11px;}
</style>

<form method="post">
<fieldset class="conf-set">
<legend>'.$this->l('Config').'</legend>

<table class="conf-table">
  <tr>
    <td class="conf-title">'.$this->l('Code').':</td>
    <td class="conf-value"><textarea name="code" cols="100" rows="10">'.$def_value.'</textarea>
    <div class="comment">Social share code</div>
    </td>
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
    
    function hookDisplayRightColumnProduct($param)
    {
      $code = Configuration::get('TONY_SOCIAL_LINKS');
      
      $this->context->smarty->assign(array(
			  'code' => $code,
		  ));
		  
		  return ($this->display(__FILE__, 'tonythemesocialsharer.tpl'));
    }
    
    public function hookExtraLeft($params)
    {
      return $this->hookDisplayRightColumnProduct($params);
    }
    
    public function hookRightColumn($params)
    {
      return $this->hookDisplayRightColumnProduct($params); 
    }
    public function hookLeftColumn($params)
    {
      return $this->hookDisplayRightColumnProduct($params); 
    }
    public function hookHome($params)
    {
      return $this->hookDisplayRightColumnProduct($params); 
    }
    public function hookFooter($params)
    {
      return $this->hookDisplayRightColumnProduct($params); 
    }
    
    public function hookHeader()
    {
      global $link;
      
      if (isset($_GET['id_product']) && (int)$_GET['id_product'])
      {
        $id_lang = (int)Context::getContext()->language->id;
        $product = new Product((int)$_GET['id_product']);
        $images = $product->getImages($id_lang);
        
        if (isset($images[0]))
        {
          $image_link = $link->getImageLink($product->link_rewrite,$images[0]['id_image'],'tonytheme_product');
          $this->context->smarty->assign(array(
			     'main_image_link' => $image_link,
		      ));
		  
		      return ($this->display(__FILE__, 'tonythemesocialsharer-meta.tpl'));
        }

        
      }
      else
        return '';
    }
    
   } 	