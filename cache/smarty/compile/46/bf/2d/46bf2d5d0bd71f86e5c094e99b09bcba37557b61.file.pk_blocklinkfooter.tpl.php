<?php /* Smarty version Smarty-3.1.19, created on 2016-03-08 01:59:37
         compiled from "/srv/data/web/vhosts/www.bouquetacroquer.fr/htdocs/modules/pk_blocklinkfooter/pk_blocklinkfooter.tpl" */ ?>
<?php /*%%SmartyHeaderCode:371437556de23f925d5f8-76832114%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '46bf2d5d0bd71f86e5c094e99b09bcba37557b61' => 
    array (
      0 => '/srv/data/web/vhosts/www.bouquetacroquer.fr/htdocs/modules/pk_blocklinkfooter/pk_blocklinkfooter.tpl',
      1 => 1453301959,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '371437556de23f925d5f8-76832114',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'url' => 0,
    'title' => 0,
    'blocklinkfooter_links' => 0,
    'lang' => 0,
    'blocklink_link' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_56de23f9288e84_81570170',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56de23f9288e84_81570170')) {function content_56de23f9288e84_81570170($_smarty_tpl) {?><!-- Block links module -->
<div id="links_block_footer" class="block">
	<div class="block_content">
		<h4 class="dropdown-cntrl dd_el_mobile">
		<?php if ($_smarty_tpl->tpl_vars['url']->value=="!") {?>
			<a href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</a>
		<?php } else { ?>
			<?php echo $_smarty_tpl->tpl_vars['title']->value;?>

		<?php }?>
		</h4>
		<ul class="block_content dropdown-content dd_container_mobile">
		<?php  $_smarty_tpl->tpl_vars['blocklink_link'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['blocklink_link']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['blocklinkfooter_links']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['blocklink_link']->key => $_smarty_tpl->tpl_vars['blocklink_link']->value) {
$_smarty_tpl->tpl_vars['blocklink_link']->_loop = true;
?>
			<?php if (isset($_smarty_tpl->tpl_vars['blocklink_link']->value[$_smarty_tpl->tpl_vars['lang']->value])) {?> 
			<li><a href="<?php echo htmlentities($_smarty_tpl->tpl_vars['blocklink_link']->value['url']);?>
"<?php if ($_smarty_tpl->tpl_vars['blocklink_link']->value['newWindow']) {?> onclick="window.open(this.href);return false;"<?php }?>><?php echo $_smarty_tpl->tpl_vars['blocklink_link']->value[$_smarty_tpl->tpl_vars['lang']->value];?>
</a></li>
			<?php }?>
		<?php } ?>
		</ul>
	</div>
</div>
<!-- Block links module -->
<?php }} ?>
