<?php /* Smarty version Smarty-3.1.19, created on 2016-03-08 09:19:04
         compiled from "/srv/data/web/vhosts/www.bouquetacroquer.fr/htdocs/modules/pk_testimonials/views/templates/front/testimonials.tpl" */ ?>
<?php /*%%SmartyHeaderCode:196319515656de8af816c312-87308126%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '98b70a44aea6e2cf978131854d4e6957cf515a94' => 
    array (
      0 => '/srv/data/web/vhosts/www.bouquetacroquer.fr/htdocs/modules/pk_testimonials/views/templates/front/testimonials.tpl',
      1 => 1453302038,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '196319515656de8af816c312-87308126',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'testimonials_list' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_56de8af81898f5_79899231',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56de8af81898f5_79899231')) {function content_56de8af81898f5_79899231($_smarty_tpl) {?><?php $_smarty_tpl->_capture_stack[0][] = array('path', null, null); ob_start(); ?>
    <?php echo smartyTranslate(array('s'=>'Testimonials List','mod'=>'pk_testimonials'),$_smarty_tpl);?>

<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>
<?php echo $_smarty_tpl->tpl_vars['testimonials_list']->value;?>
<?php }} ?>
