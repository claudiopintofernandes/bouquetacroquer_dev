<?php /* Smarty version Smarty-3.1.19, created on 2016-03-12 12:05:14
         compiled from "/srv/data/web/vhosts/www.bouquetacroquer.fr/htdocs/mails/fr/order_conf_cart_rules.txt" */ ?>
<?php /*%%SmartyHeaderCode:69833984056e3f7eaec6139-01207210%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '927f8462631986cd17b9e52db6b687f92729a0b6' => 
    array (
      0 => '/srv/data/web/vhosts/www.bouquetacroquer.fr/htdocs/mails/fr/order_conf_cart_rules.txt',
      1 => 1453301829,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '69833984056e3f7eaec6139-01207210',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'list' => 0,
    'cart_rule' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_56e3f7eaf3b631_01956529',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56e3f7eaf3b631_01956529')) {function content_56e3f7eaf3b631_01956529($_smarty_tpl) {?><?php  $_smarty_tpl->tpl_vars['cart_rule'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['cart_rule']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['cart_rule']->key => $_smarty_tpl->tpl_vars['cart_rule']->value) {
$_smarty_tpl->tpl_vars['cart_rule']->_loop = true;
?>
	<?php echo $_smarty_tpl->tpl_vars['cart_rule']->value['voucher_name'];?>
  <?php echo $_smarty_tpl->tpl_vars['cart_rule']->value['voucher_reduction'];?>

<?php } ?><?php }} ?>
