<?php /* Smarty version Smarty-3.1.19, created on 2016-03-08 01:59:37
         compiled from "/srv/data/web/vhosts/www.bouquetacroquer.fr/htdocs/themes/alysum/modules/blocknewsletter/blocknewsletter.tpl" */ ?>
<?php /*%%SmartyHeaderCode:16551178756de23f91ab302-87523832%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9ef0a67b739a51862020f5543c8f38161478765d' => 
    array (
      0 => '/srv/data/web/vhosts/www.bouquetacroquer.fr/htdocs/themes/alysum/modules/blocknewsletter/blocknewsletter.tpl',
      1 => 1453302231,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '16551178756de23f91ab302-87523832',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'msg' => 0,
    'nw_error' => 0,
    'link' => 0,
    'value' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_56de23f91dc3e2_85743363',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56de23f91dc3e2_85743363')) {function content_56de23f91dc3e2_85743363($_smarty_tpl) {?><!-- Block Newsletter module-->
<div id="newsletter_block_left" class="block">
	<div class="newsletter-bg hidden sec_bg"></div>
	<h4 class="dib"><?php echo smartyTranslate(array('s'=>'sign up to receive the latest news','mod'=>'blocknewsletter'),$_smarty_tpl);?>
</h4>
	<div class="block_content dib">
	<?php if (isset($_smarty_tpl->tpl_vars['msg']->value)&&$_smarty_tpl->tpl_vars['msg']->value) {?>
		<p class="dib <?php if ($_smarty_tpl->tpl_vars['nw_error']->value) {?>warning_inline<?php } else { ?>success_inline<?php }?>"><?php echo $_smarty_tpl->tpl_vars['msg']->value;?>
</p>
	<?php }?>
		<form action="<?php echo $_smarty_tpl->tpl_vars['link']->value->getPageLink('index');?>
" method="post" class="dib">
			<input type="text" name="email" size="18" 
				value="<?php if (isset($_smarty_tpl->tpl_vars['value']->value)&&$_smarty_tpl->tpl_vars['value']->value) {?><?php echo $_smarty_tpl->tpl_vars['value']->value;?>
<?php } else { ?><?php echo smartyTranslate(array('s'=>'your e-mail','mod'=>'blocknewsletter'),$_smarty_tpl);?>
<?php }?>" 
				onfocus="javascript:if(this.value=='<?php echo smartyTranslate(array('s'=>'your e-mail','mod'=>'blocknewsletter'),$_smarty_tpl);?>
')this.value='';" 
				onblur="javascript:if(this.value=='')this.value='<?php echo smartyTranslate(array('s'=>'your e-mail','mod'=>'blocknewsletter'),$_smarty_tpl);?>
';" 
				class="inputNew" />
				<input type="submit" value="<?php echo smartyTranslate(array('s'=>'Sign Up','mod'=>'blocknewsletter'),$_smarty_tpl);?>
" class="button_mini lmromancaps" name="submitNewsletter" />
			<input type="hidden" name="action" value="0" />
		</form>
	</div>
</div>
<script>
$(document).ready(function() {
	if ( $('#footer #newsletter_block_left')[0] ) {
        $(".newsletter-bg").removeClass('hidden').appendTo(".footer-relative");
    }
});
</script>
<!-- /Block Newsletter module-->
<?php }} ?>
