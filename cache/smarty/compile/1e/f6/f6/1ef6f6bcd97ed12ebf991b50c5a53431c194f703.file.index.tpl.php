<?php /* Smarty version Smarty-3.1.19, created on 2016-03-08 02:15:40
         compiled from "/srv/data/web/vhosts/www.bouquetacroquer.fr/htdocs/themes/alysum/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:193706732056de27bc041623-26128697%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1ef6f6bcd97ed12ebf991b50c5a53431c194f703' => 
    array (
      0 => '/srv/data/web/vhosts/www.bouquetacroquer.fr/htdocs/themes/alysum/index.tpl',
      1 => 1453302267,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '193706732056de27bc041623-26128697',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'HOOK_HOME_TAB_CONTENT' => 0,
    'HOOK_HOME_TAB' => 0,
    'HOOK_HOME' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_56de27bc0a6449_05881824',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56de27bc0a6449_05881824')) {function content_56de27bc0a6449_05881824($_smarty_tpl) {?>
<?php if (isset($_smarty_tpl->tpl_vars['HOOK_HOME_TAB_CONTENT']->value)&&trim($_smarty_tpl->tpl_vars['HOOK_HOME_TAB_CONTENT']->value)) {?>
    <?php if (isset($_smarty_tpl->tpl_vars['HOOK_HOME_TAB']->value)&&trim($_smarty_tpl->tpl_vars['HOOK_HOME_TAB']->value)) {?>
        <ul id="home-page-tabs" class="nav nav-tabs clearfix">
			<?php echo $_smarty_tpl->tpl_vars['HOOK_HOME_TAB']->value;?>

		</ul>
	<?php }?>
	<div class="tab-content view_grid">
		<?php echo $_smarty_tpl->tpl_vars['HOOK_HOME_TAB_CONTENT']->value;?>

	</div>
<?php }?>
<?php if (isset($_smarty_tpl->tpl_vars['HOOK_HOME']->value)&&trim($_smarty_tpl->tpl_vars['HOOK_HOME']->value)) {?>
		<?php echo $_smarty_tpl->tpl_vars['HOOK_HOME']->value;?>

<?php }?><?php }} ?>
