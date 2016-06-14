<?php /* Smarty version Smarty-3.1.19, created on 2016-03-10 14:50:59
         compiled from "/srv/data/web/vhosts/www.bouquetacroquer.fr/htdocs/modules/dateofdelivery/views/templates/hook/button_config.tpl" */ ?>
<?php /*%%SmartyHeaderCode:56626660556e17bc3778f13-75329087%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'eb1485fc5c1638807c86f43e6c7a6f538b57b758' => 
    array (
      0 => '/srv/data/web/vhosts/www.bouquetacroquer.fr/htdocs/modules/dateofdelivery/views/templates/hook/button_config.tpl',
      1 => 1453301893,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '56626660556e17bc3778f13-75329087',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'config_url' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_56e17bc378a1c3_04841726',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56e17bc378a1c3_04841726')) {function content_56e17bc378a1c3_04841726($_smarty_tpl) {?>

<div class="row">
	<div class="col-lg-9">
		<a href="<?php echo $_smarty_tpl->tpl_vars['config_url']->value;?>
" class="btn btn-primary button"><?php echo smartyTranslate(array('s'=>'CONFIGURATION','mod'=>'dateofdelivery'),$_smarty_tpl);?>
</a>
	</div>
</div>
<br/>
<?php }} ?>
