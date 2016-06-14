<?php /* Smarty version Smarty-3.1.19, created on 2016-03-08 15:04:06
         compiled from "/srv/data/web/vhosts/www.bouquetacroquer.fr/htdocs/admin796hmo5yb/themes/default/template/helpers/list/list_action_edit.tpl" */ ?>
<?php /*%%SmartyHeaderCode:32300055956dedbd6abb2d9-39503512%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'bf974082f3316c1ce0d198a81f12993e129262ee' => 
    array (
      0 => '/srv/data/web/vhosts/www.bouquetacroquer.fr/htdocs/admin796hmo5yb/themes/default/template/helpers/list/list_action_edit.tpl',
      1 => 1453301503,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '32300055956dedbd6abb2d9-39503512',
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
  'unifunc' => 'content_56dedbd6ad3d61_84768090',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56dedbd6ad3d61_84768090')) {function content_56dedbd6ad3d61_84768090($_smarty_tpl) {?>
<a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['href']->value, ENT_QUOTES, 'UTF-8', true);?>
" title="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['action']->value, ENT_QUOTES, 'UTF-8', true);?>
" class="edit">
	<i class="icon-pencil"></i> <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['action']->value, ENT_QUOTES, 'UTF-8', true);?>

</a><?php }} ?>
