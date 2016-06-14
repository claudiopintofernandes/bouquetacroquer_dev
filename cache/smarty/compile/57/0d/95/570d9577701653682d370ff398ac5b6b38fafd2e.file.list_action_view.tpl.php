<?php /* Smarty version Smarty-3.1.19, created on 2016-03-08 08:10:35
         compiled from "/srv/data/web/vhosts/www.bouquetacroquer.fr/htdocs/admin796hmo5yb/themes/default/template/helpers/list/list_action_view.tpl" */ ?>
<?php /*%%SmartyHeaderCode:59567064156de7aebc7b010-15379149%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '570d9577701653682d370ff398ac5b6b38fafd2e' => 
    array (
      0 => '/srv/data/web/vhosts/www.bouquetacroquer.fr/htdocs/admin796hmo5yb/themes/default/template/helpers/list/list_action_view.tpl',
      1 => 1453301503,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '59567064156de7aebc7b010-15379149',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'href' => 0,
    'action' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_56de7aebc92484_13134800',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56de7aebc92484_13134800')) {function content_56de7aebc92484_13134800($_smarty_tpl) {?>
<a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['href']->value, ENT_QUOTES, 'UTF-8', true);?>
" title="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['action']->value, ENT_QUOTES, 'UTF-8', true);?>
" >
	<i class="icon-search-plus"></i> <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['action']->value, ENT_QUOTES, 'UTF-8', true);?>

</a><?php }} ?>
