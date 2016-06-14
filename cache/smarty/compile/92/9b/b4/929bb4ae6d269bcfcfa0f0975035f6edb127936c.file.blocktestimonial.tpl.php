<?php /* Smarty version Smarty-3.1.19, created on 2016-03-08 02:15:40
         compiled from "/srv/data/web/vhosts/www.bouquetacroquer.fr/htdocs/modules/pk_testimonials/views/templates/front/blocktestimonial.tpl" */ ?>
<?php /*%%SmartyHeaderCode:53251233356de27bc39c362-17631629%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '929bb4ae6d269bcfcfa0f0975035f6edb127936c' => 
    array (
      0 => '/srv/data/web/vhosts/www.bouquetacroquer.fr/htdocs/modules/pk_testimonials/views/templates/front/blocktestimonial.tpl',
      1 => 1453302038,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '53251233356de27bc39c362-17631629',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'page_name' => 0,
    'hookn' => 0,
    'displayImage' => 0,
    'testimonial_bg' => 0,
    'link' => 0,
    'testims' => 0,
    'nr' => 0,
    'theme_settings' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_56de27bc3fb592_21510164',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56de27bc3fb592_21510164')) {function content_56de27bc3fb592_21510164($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['page_name']->value=="index") {?>
<!-- Block testimonial module -->
<div id="block_testimonials" class="homemodule<?php if ($_smarty_tpl->tpl_vars['hookn']->value!='') {?> load-animate<?php }?><?php if ($_smarty_tpl->tpl_vars['displayImage']->value==0) {?> no-bg<?php }?>">
	<div class="testimonials-bg"<?php if (($_smarty_tpl->tpl_vars['displayImage']->value==1)) {?> style="background-image:url('<?php echo $_smarty_tpl->tpl_vars['testimonial_bg']->value;?>
');"<?php }?>>
		<div class="page_width">
			<div class="testimonials-wrapper">
			<a href="<?php echo $_smarty_tpl->tpl_vars['link']->value->getModuleLink('pk_testimonials','testimonials');?>
" class="testimonial-blocktitle lmromandemi"><?php echo smartyTranslate(array('s'=>'Testimonials','mod'=>'pk_testimonials'),$_smarty_tpl);?>
</a>
		    <ul id="<?php echo $_smarty_tpl->tpl_vars['hookn']->value;?>
testimonials">
				<?php if (isset($_smarty_tpl->tpl_vars['testims']->value)) {?>		  
				<?php  $_smarty_tpl->tpl_vars['nr'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['nr']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['testims']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['nr']->key => $_smarty_tpl->tpl_vars['nr']->value) {
$_smarty_tpl->tpl_vars['nr']->_loop = true;
?>	
				<li class="testimonial">
					<div class="indent">
						<div class="testimonial-body">
							<div class="item-wrapper">
				    			<div class="testimonial-title<?php if (($_smarty_tpl->tpl_vars['nr']->value['testimonial_title']=="“")) {?> nt main_color<?php }?>"><?php echo $_smarty_tpl->tpl_vars['nr']->value['testimonial_title'];?>
</div>
				    			<div class="testimonial-message"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['truncate'][0][0]->smarty_modifier_truncate($_smarty_tpl->tpl_vars['nr']->value['testimonial_main_message'],250);?>
</div>	
				    		</div>
			    			<div class="bott"></div>
			    		</div>
			    		<div class="testimonial-avatar"><?php echo $_smarty_tpl->tpl_vars['nr']->value['avatar'];?>
</div>	    			
			    		<div class="testimonial-author lmroman"><?php echo $_smarty_tpl->tpl_vars['nr']->value['testimonial_submitter_name'];?>
, <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['truncate'][0][0]->smarty_modifier_truncate($_smarty_tpl->tpl_vars['nr']->value['date_added'],13,'');?>
</div>
				    </div>
			    </li>
				<?php } ?>
				<?php }?>
		    </ul>
		    </div>
	    </div>
    </div>
</div>
<script>
$(document).ready(function() {
   $("#<?php echo $_smarty_tpl->tpl_vars['hookn']->value;?>
testimonials").flexisel({
    pref: "testimonials",
    visibleItems: 1,
    animationSpeed: 1000,
    autoPlay: false,
    autoPlaySpeed: 3500,            
    pauseOnHover: true,
    enableResponsiveBreakpoints: false,
    clone : true    
  });
  <?php if (($_smarty_tpl->tpl_vars['hookn']->value!='')&&($_smarty_tpl->tpl_vars['displayImage']->value==1)&&($_smarty_tpl->tpl_vars['theme_settings']->value['preset']!=4)) {?>
  	parallax($(".testimonials-bg"));
  <?php }?>
});
</script>
<!-- /Block testimonial module -->
<?php }?><?php }} ?>
