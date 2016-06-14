<?php /* Smarty version Smarty-3.1.19, created on 2016-03-08 01:59:36
         compiled from "/srv/data/web/vhosts/www.bouquetacroquer.fr/htdocs/themes/alysum/modules/blocksearch/blocksearch-top.tpl" */ ?>
<?php /*%%SmartyHeaderCode:172342351656de23f82df4d0-77518811%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '10476970ae87650f16db900f24cdbec723de51ea' => 
    array (
      0 => '/srv/data/web/vhosts/www.bouquetacroquer.fr/htdocs/themes/alysum/modules/blocksearch/blocksearch-top.tpl',
      1 => 1453302232,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '172342351656de23f82df4d0-77518811',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'link' => 0,
    'ENT_QUOTES' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_56de23f8306b54_57464802',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56de23f8306b54_57464802')) {function content_56de23f8306b54_57464802($_smarty_tpl) {?><!-- Block search module TOP -->
<div id="search_block_top" class="smooth05">
	<form id="searchbox" method="get" action="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value->getPageLink('search',null,null,null,false,null,true), ENT_QUOTES, 'UTF-8', true);?>
" >
		<input type="hidden" name="controller" value="search" />
		<input type="hidden" name="orderby" value="position" />
		<input type="hidden" name="orderway" value="desc" />
		<input class="search_query" type="text" id="search_query_top" name="search_query" value="<?php if (isset($_GET['search_query'])) {?><?php echo stripslashes(htmlentities($_GET['search_query'],$_smarty_tpl->tpl_vars['ENT_QUOTES']->value,'utf-8'));?>
<?php }?>" placeholder="<?php echo smartyTranslate(array('s'=>'Search...','mod'=>'blocksearch'),$_smarty_tpl);?>
" />
		<button type="submit" name="submit_search" class="searchbutton smooth02 main_bg_hvr">
			<svg class="svgic svgic-search smooth02 main_color"><use xlink:href="#si-search"></use></svg>
		</button>
	</form>
</div>
<!-- /Block search module TOP --><?php }} ?>
