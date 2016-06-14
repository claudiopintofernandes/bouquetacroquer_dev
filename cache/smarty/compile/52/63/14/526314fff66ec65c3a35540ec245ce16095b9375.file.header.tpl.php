<?php /* Smarty version Smarty-3.1.19, created on 2016-03-08 01:59:36
         compiled from "/srv/data/web/vhosts/www.bouquetacroquer.fr/htdocs/modules/eydatepicker/views/templates/hook/header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2664292556de23f8052dc3-82196432%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '526314fff66ec65c3a35540ec245ce16095b9375' => 
    array (
      0 => '/srv/data/web/vhosts/www.bouquetacroquer.fr/htdocs/modules/eydatepicker/views/templates/hook/header.tpl',
      1 => 1453301897,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2664292556de23f8052dc3-82196432',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'page_name' => 0,
    'basedir' => 0,
    'modulename' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_56de23f808de92_45135121',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56de23f808de92_45135121')) {function content_56de23f808de92_45135121($_smarty_tpl) {?>
 <?php if ($_smarty_tpl->tpl_vars['page_name']->value=='product'||$_smarty_tpl->tpl_vars['page_name']->value=='quick-order'||$_smarty_tpl->tpl_vars['page_name']->value=='order'||$_smarty_tpl->tpl_vars['page_name']->value=='order-opc') {?>
	<link href="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.1/themes/base/jquery-ui.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['basedir']->value, ENT_QUOTES, 'UTF-8', true);?>
modules/<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['modulename']->value, ENT_QUOTES, 'UTF-8', true);?>
/css/front.css" rel="stylesheet" type="text/css" />
	<script type="text/javascript">
		var datepickerWarning = "<?php echo smartyTranslate(array('s'=>'Please pick your desired delivery date','mod'=>'eydatepicker'),$_smarty_tpl);?>
";
	</script>
<?php }?><?php }} ?>
