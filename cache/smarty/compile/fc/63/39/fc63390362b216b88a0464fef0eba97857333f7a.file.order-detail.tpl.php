<?php /* Smarty version Smarty-3.1.19, created on 2016-03-08 14:31:45
         compiled from "/srv/data/web/vhosts/www.bouquetacroquer.fr/htdocs/modules/eydatepicker/views/templates/hook/order-detail.tpl" */ ?>
<?php /*%%SmartyHeaderCode:152548658256ded441b93866-32707444%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'fc63390362b216b88a0464fef0eba97857333f7a' => 
    array (
      0 => '/srv/data/web/vhosts/www.bouquetacroquer.fr/htdocs/modules/eydatepicker/views/templates/hook/order-detail.tpl',
      1 => 1453301897,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '152548658256ded441b93866-32707444',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'ey_date' => 0,
    'ey_hour' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_56ded441bc5759_49534758',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56ded441bc5759_49534758')) {function content_56ded441bc5759_49534758($_smarty_tpl) {?>
 <?php if (isset($_smarty_tpl->tpl_vars['ey_date']->value)) {?>
	<div class="info-order box">
		<p><strong class="dark"><?php echo smartyTranslate(array('s'=>'Delivery date/hour','mod'=>'eydatepicker'),$_smarty_tpl);?>
</strong> <span class="color-myaccount"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['ey_date']->value, ENT_QUOTES, 'UTF-8', true);?>
 <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['ey_hour']->value, ENT_QUOTES, 'UTF-8', true);?>
</span></p>
	</div>
<?php }?><?php }} ?>
