<?php /* Smarty version Smarty-3.1.19, created on 2016-04-25 19:51:21
         compiled from "/srv/data/web/vhosts/www.bouquetacroquer.fr/htdocs/modules/pk_bannercarousel/views/templates/admin/messages.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2019002861571e5919d5a2e9-19581850%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'bee066fab9ab37f70bdf96c332ae940f49124c1a' => 
    array (
      0 => '/srv/data/web/vhosts/www.bouquetacroquer.fr/htdocs/modules/pk_bannercarousel/views/templates/admin/messages.tpl',
      1 => 1453301956,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2019002861571e5919d5a2e9-19581850',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'id' => 0,
    'text' => 0,
    'class' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_571e5919d84bc4_07590932',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_571e5919d84bc4_07590932')) {function content_571e5919d84bc4_07590932($_smarty_tpl) {?><div id="<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
-response" <?php if (!isset($_smarty_tpl->tpl_vars['text']->value)) {?>style="display:none;"<?php }?> class="alert alert-<?php if (isset($_smarty_tpl->tpl_vars['class']->value)) {?><?php echo $_smarty_tpl->tpl_vars['class']->value;?>
<?php }?>">
	<?php if (isset($_smarty_tpl->tpl_vars['text']->value)) {?><?php echo $_smarty_tpl->tpl_vars['text']->value;?>
<?php }?>
</div><?php }} ?>
