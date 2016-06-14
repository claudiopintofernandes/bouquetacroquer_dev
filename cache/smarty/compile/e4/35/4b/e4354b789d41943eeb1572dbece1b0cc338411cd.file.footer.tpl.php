<?php /* Smarty version Smarty-3.1.19, created on 2016-03-08 01:59:42
         compiled from "/srv/data/web/vhosts/www.bouquetacroquer.fr/htdocs/modules/eydatepicker/views/templates/hook/footer.tpl" */ ?>
<?php /*%%SmartyHeaderCode:23294673756de23fe495146-01727579%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e4354b789d41943eeb1572dbece1b0cc338411cd' => 
    array (
      0 => '/srv/data/web/vhosts/www.bouquetacroquer.fr/htdocs/modules/eydatepicker/views/templates/hook/footer.tpl',
      1 => 1453301897,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '23294673756de23fe495146-01727579',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'page_name' => 0,
    'basedir' => 0,
    'modulename' => 0,
    'langcode' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_56de23fe4c3e10_96653149',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56de23fe4c3e10_96653149')) {function content_56de23fe4c3e10_96653149($_smarty_tpl) {?>
 <?php if ($_smarty_tpl->tpl_vars['page_name']->value=='product'||$_smarty_tpl->tpl_vars['page_name']->value=='quick-order'||$_smarty_tpl->tpl_vars['page_name']->value=='order'||$_smarty_tpl->tpl_vars['page_name']->value=='order-opc') {?>
	<script src="<?php echo $_smarty_tpl->tpl_vars['basedir']->value;?>
modules/<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['modulename']->value, ENT_QUOTES, 'UTF-8', true);?>
/js/jquery-ui-1.10.1.custom.min.js"></script>
	<?php if ($_smarty_tpl->tpl_vars['langcode']->value!='en') {?>
		<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.1/i18n/jquery-ui-i18n.min.js"></script>
	<?php }?>
	<script type="text/javascript">
		<?php if ($_smarty_tpl->tpl_vars['langcode']->value!='en') {?>	
			
			$(function() {
				$.datepicker.setDefaults($.datepicker.regional.<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['langcode']->value, ENT_QUOTES, 'UTF-8', true);?>
);	
			});
			
		<?php }?>
	</script>
<?php }?><?php }} ?>
