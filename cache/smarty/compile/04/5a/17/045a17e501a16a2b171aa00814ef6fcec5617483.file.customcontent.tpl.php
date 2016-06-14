<?php /* Smarty version Smarty-3.1.19, created on 2016-03-08 02:33:03
         compiled from "/srv/data/web/vhosts/www.bouquetacroquer.fr/htdocs/modules/pk_themesettings/views/frontend/customcontent.tpl" */ ?>
<?php /*%%SmartyHeaderCode:30661503056de2bcfe883f0-47076033%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '045a17e501a16a2b171aa00814ef6fcec5617483' => 
    array (
      0 => '/srv/data/web/vhosts/www.bouquetacroquer.fr/htdocs/modules/pk_themesettings/views/frontend/customcontent.tpl',
      1 => 1453302059,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '30661503056de2bcfe883f0-47076033',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'pk_custom_tab' => 0,
    'pk_video_id' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_56de2bcfeae1e2_81843213',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56de2bcfeae1e2_81843213')) {function content_56de2bcfeae1e2_81843213($_smarty_tpl) {?>
<?php if ((isset($_smarty_tpl->tpl_vars['pk_custom_tab']->value)&&($_smarty_tpl->tpl_vars['pk_custom_tab']->value!=''))) {?>
<section data-section="12" class="page-product-box">
	<div class="rte">
	<?php echo $_smarty_tpl->tpl_vars['pk_custom_tab']->value;?>

	</div>
</section>
<?php }?>
<?php if ((isset($_smarty_tpl->tpl_vars['pk_video_id']->value)&&($_smarty_tpl->tpl_vars['pk_video_id']->value!=''))) {?>
<section data-section="13" class="page-product-box">
	<div class="rte">
		<!--[if !IE]> -->
		<div class="videoWrapper"><iframe id="ytplayer" type="text/html" width="420" height="270" src="https://www.youtube.com/embed/<?php echo $_smarty_tpl->tpl_vars['pk_video_id']->value;?>
" frameborder="0"></iframe></div>
		<!-- <![endif]-->
		<!--[if gt IE 8]>
		<div class="videoWrapper"><iframe id="ytplayer" type="text/html" width="420" height="270" src="http://www.youtube.com/embed/<?php echo $_smarty_tpl->tpl_vars['pk_video_id']->value;?>
" frameborder="0"></iframe></div>
		<![endif]-->
		<!--[if lte IE 8]>
		<object id="ytplayer" width="420" height="270"><param name="movie" value="https://www.youtube-nocookie.com/v/<?php echo $_smarty_tpl->tpl_vars['pk_video_id']->value;?>
?hl=en_US&amp;version=3&amp;rel=0"></param><param name="allowFullScreen" value="true"></param><param name="allowscriptaccess" value="always"></param><embed src="https://www.youtube-nocookie.com/v/<?php echo $_smarty_tpl->tpl_vars['pk_video_id']->value;?>
?hl=en_US&amp;version=3&amp;rel=0" type="application/x-shockwave-flash" width="420" height="270" allowscriptaccess="always" allowfullscreen="true"></embed></object>		    
		<![endif]-->  
		</div>
</section>
<?php }?><?php }} ?>
