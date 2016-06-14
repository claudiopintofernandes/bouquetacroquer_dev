<?php /* Smarty version Smarty-3.1.19, created on 2016-03-10 14:52:04
         compiled from "/srv/data/web/vhosts/www.bouquetacroquer.fr/htdocs/modules/tablerateshipping/views/templates/admin/header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:33967952156e17c04541ef2-52485157%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '33b1c7720f2da10ce09636e34a33ba13a136bbe9' => 
    array (
      0 => '/srv/data/web/vhosts/www.bouquetacroquer.fr/htdocs/modules/tablerateshipping/views/templates/admin/header.tpl',
      1 => 1453302100,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '33967952156e17c04541ef2-52485157',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'post_success_count' => 0,
    'post_success' => 0,
    'post_warning_count' => 0,
    'post_warning' => 0,
    'post_error_count' => 0,
    'post_error' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_56e17c0458fed8_22254269',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56e17c0458fed8_22254269')) {function content_56e17c0458fed8_22254269($_smarty_tpl) {?>

<div id="ktrs-content" class="bootstrap">
    <?php if ($_smarty_tpl->tpl_vars['post_success_count']->value!=0) {?>
        <div class="alert alert-success">
            <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['post_success']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>

        </div>
    <?php }?>
    <?php if ($_smarty_tpl->tpl_vars['post_warning_count']->value!=0) {?>
        <div class="alert alert-warning">
            <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['post_warning']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>

        </div>
    <?php }?>
    <?php if ($_smarty_tpl->tpl_vars['post_error_count']->value!=0) {?>
    <div class="alert alert-danger">
        <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['post_error']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>

    </div>
<?php }?><?php }} ?>
