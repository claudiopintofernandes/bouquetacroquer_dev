<?php /* Smarty version Smarty-3.1.19, created on 2016-03-10 14:50:59
         compiled from "/srv/data/web/vhosts/www.bouquetacroquer.fr/htdocs/modules/dateofdelivery/views/templates/hook/button.tpl" */ ?>
<?php /*%%SmartyHeaderCode:118722610456e17bc35e7863-11514261%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3c7e8a8706cc23ff56fd783643fcfe3b4d1b063e' => 
    array (
      0 => '/srv/data/web/vhosts/www.bouquetacroquer.fr/htdocs/modules/dateofdelivery/views/templates/hook/button.tpl',
      1 => 1453301893,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '118722610456e17bc35e7863-11514261',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'add_url' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_56e17bc36848b1_21941570',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56e17bc36848b1_21941570')) {function content_56e17bc36848b1_21941570($_smarty_tpl) {?>

<div class="row">
	<div class="col-lg-9">
		<a href="<?php echo $_smarty_tpl->tpl_vars['add_url']->value;?>
" class="btn btn-primary button"><?php echo smartyTranslate(array('s'=>'Add a new carrier rule','mod'=>'dateofdelivery'),$_smarty_tpl);?>
</a>
	</div>
</div>
<br/>
<?php }} ?>
