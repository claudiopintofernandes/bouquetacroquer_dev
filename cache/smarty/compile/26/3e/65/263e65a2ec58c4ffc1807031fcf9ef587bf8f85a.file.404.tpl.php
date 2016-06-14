<?php /* Smarty version Smarty-3.1.19, created on 2016-03-08 02:01:19
         compiled from "/srv/data/web/vhosts/www.bouquetacroquer.fr/htdocs/themes/alysum/404.tpl" */ ?>
<?php /*%%SmartyHeaderCode:5681556356de245fd34f53-54145952%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '263e65a2ec58c4ffc1807031fcf9ef587bf8f85a' => 
    array (
      0 => '/srv/data/web/vhosts/www.bouquetacroquer.fr/htdocs/themes/alysum/404.tpl',
      1 => 1453302265,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '5681556356de245fd34f53-54145952',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'link' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_56de245fd777a4_12791711',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56de245fd777a4_12791711')) {function content_56de245fd777a4_12791711($_smarty_tpl) {?>
<div class="wht_bg">
	<div class="wrap_indent">
		<div class="pagenotfound">
			<h1><?php echo smartyTranslate(array('s'=>'This page is not available'),$_smarty_tpl);?>
</h1>
			<p>
				<?php echo smartyTranslate(array('s'=>'We\'re sorry, but the Web address you\'ve entered is no longer available.'),$_smarty_tpl);?>

			</p>

			<h3><?php echo smartyTranslate(array('s'=>'To find a product, please type its name in the field below.'),$_smarty_tpl);?>
</h3>
			<form action="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value->getPageLink('search'), ENT_QUOTES, 'UTF-8', true);?>
" method="post" class="std">
				<fieldset>
					<p>
						<label for="search"><?php echo smartyTranslate(array('s'=>'Search our product catalog:'),$_smarty_tpl);?>
</label>
						<input id="search_query" name="search_query" type="text" />
						<input type="submit" name="Submit" value="OK" class="button_small" />
					</p>
				</fieldset>
			</form>
		</div>
	</div>
</div><?php }} ?>
