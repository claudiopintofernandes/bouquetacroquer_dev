<?php /* Smarty version Smarty-3.1.19, created on 2016-03-08 01:59:36
         compiled from "/srv/data/web/vhosts/www.bouquetacroquer.fr/htdocs/modules/pk_vertflexmenu/pk_vertflexmenu.tpl" */ ?>
<?php /*%%SmartyHeaderCode:72618269956de23f8cbc9c7-01473384%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a402cb999435833e346abc5b1e2a37299e26a41e' => 
    array (
      0 => '/srv/data/web/vhosts/www.bouquetacroquer.fr/htdocs/modules/pk_vertflexmenu/pk_vertflexmenu.tpl',
      1 => 1453302063,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '72618269956de23f8cbc9c7-01473384',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'vertflexmenu' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_56de23f8cc8af9_71355297',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56de23f8cc8af9_71355297')) {function content_56de23f8cc8af9_71355297($_smarty_tpl) {?><div class="vert-flexmenu-container block list-module">	
	<h4 class="title_block"><?php echo smartyTranslate(array('s'=>'Categories','mod'=>'pk_vertflexmenu'),$_smarty_tpl);?>
</h4>
	<div class="vert-flexmenu">
		<ul><?php echo $_smarty_tpl->tpl_vars['vertflexmenu']->value;?>
</ul>
	</div>
</div><?php }} ?>
