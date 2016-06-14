<?php /* Smarty version Smarty-3.1.19, created on 2016-03-08 18:34:56
         compiled from "/srv/data/web/vhosts/www.bouquetacroquer.fr/htdocs/themes/alysum/best-sales.tpl" */ ?>
<?php /*%%SmartyHeaderCode:66358591056df0d402ee460-09621715%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1c36b6460971558385f49bd6d4708aa06c95ff72' => 
    array (
      0 => '/srv/data/web/vhosts/www.bouquetacroquer.fr/htdocs/themes/alysum/best-sales.tpl',
      1 => 1453302266,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '66358591056df0d402ee460-09621715',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'products' => 0,
    'theme_settings' => 0,
    'view_type' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_56df0d403a6660_38863799',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56df0d403a6660_38863799')) {function content_56df0d403a6660_38863799($_smarty_tpl) {?>
<?php $_smarty_tpl->_capture_stack[0][] = array('path', null, null); ob_start(); ?><?php echo smartyTranslate(array('s'=>'Top sellers'),$_smarty_tpl);?>
<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>

<h1 class="page-heading product-listing"><?php echo smartyTranslate(array('s'=>'Top sellers'),$_smarty_tpl);?>
</h1>

<?php if ($_smarty_tpl->tpl_vars['products']->value) {?>
	<div class="content_sortPagiBar">				
		<div class="sortPagiBar clearfix">
			<div class="views_float">				
				<?php echo $_smarty_tpl->getSubTemplate ("./product-sort.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
											
				<?php echo $_smarty_tpl->getSubTemplate ("./nbr-product-page.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

		</div>
			<?php if (isset($_smarty_tpl->tpl_vars['theme_settings']->value['allcookies']['listingView'])) {?>
				<?php if ($_smarty_tpl->tpl_vars['theme_settings']->value['allcookies']['listingView']=='view_grid') {?>
					<?php $_smarty_tpl->tpl_vars['view_type'] = new Smarty_variable("view_grid", null, 0);?>
				<?php }?>
				<?php if ($_smarty_tpl->tpl_vars['theme_settings']->value['allcookies']['listingView']=='view_list') {?>
					<?php $_smarty_tpl->tpl_vars['view_type'] = new Smarty_variable("view_list", null, 0);?>
				<?php }?>
			<?php } else { ?>
				<?php if ($_smarty_tpl->tpl_vars['theme_settings']->value['view']=='view_grid') {?>
					<?php $_smarty_tpl->tpl_vars['view_type'] = new Smarty_variable("view_grid", null, 0);?>
				<?php }?>
				<?php if ($_smarty_tpl->tpl_vars['theme_settings']->value['view']=='view_list') {?>
					<?php $_smarty_tpl->tpl_vars['view_type'] = new Smarty_variable("view_list", null, 0);?>
				<?php }?>
			<?php }?>
			<?php if (isset($_smarty_tpl->tpl_vars['theme_settings']->value)&&($_smarty_tpl->tpl_vars['theme_settings']->value['lc_buttons']==1)) {?>
			<div class="views dib">
				<div class="view_btn dib<?php if ($_smarty_tpl->tpl_vars['view_type']->value=='view_grid') {?> active<?php }?> smooth02" id="view_grid" title="grid"></div><span class="grid_title"><?php echo smartyTranslate(array('s'=>'Grid'),$_smarty_tpl);?>
</span>
				<div class="view_btn dib<?php if ($_smarty_tpl->tpl_vars['view_type']->value=='view_list') {?> active<?php }?> smooth02" id="view_list" title="list"></div><span class="list_title"><?php echo smartyTranslate(array('s'=>'List'),$_smarty_tpl);?>
</span>
			</div>					
			<?php }?>			
		</div>
	</div>
	<div id="listing_view" class="<?php echo $_smarty_tpl->tpl_vars['view_type']->value;?>
">
		<?php echo $_smarty_tpl->getSubTemplate ("./product-list.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('products'=>$_smarty_tpl->tpl_vars['products']->value), 0);?>

	</div>
	<div class="sortPagiBar sortPagiBarFooter clearfix">
		<?php echo $_smarty_tpl->getSubTemplate ("./pagination.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

	</div>
<?php } else { ?>
	<p class="alert alert-warning"><?php echo smartyTranslate(array('s'=>'No top sellers for the moment.'),$_smarty_tpl);?>
</p>
<?php }?><?php }} ?>
