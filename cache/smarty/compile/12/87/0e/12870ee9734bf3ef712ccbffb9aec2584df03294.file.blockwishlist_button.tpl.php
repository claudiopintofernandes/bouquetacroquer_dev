<?php /* Smarty version Smarty-3.1.19, created on 2016-03-08 02:03:29
         compiled from "/srv/data/web/vhosts/www.bouquetacroquer.fr/htdocs/themes/alysum/modules/blockwishlist/blockwishlist_button.tpl" */ ?>
<?php /*%%SmartyHeaderCode:38266471856de24e1d44e03-86155417%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '12870ee9734bf3ef712ccbffb9aec2584df03294' => 
    array (
      0 => '/srv/data/web/vhosts/www.bouquetacroquer.fr/htdocs/themes/alysum/modules/blockwishlist/blockwishlist_button.tpl',
      1 => 1453302235,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '38266471856de24e1d44e03-86155417',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'product' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_56de24e1d5afb1_37482094',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56de24e1d5afb1_37482094')) {function content_56de24e1d5afb1_37482094($_smarty_tpl) {?><div class="wishlist">
	<a
	class="button addToWishlist wishlistProd_<?php echo intval($_smarty_tpl->tpl_vars['product']->value['id_product']);?>
" 
	href="#" 
	data-wishid="<?php echo intval($_smarty_tpl->tpl_vars['product']->value['id_product']);?>
"
	rel="<?php echo intval($_smarty_tpl->tpl_vars['product']->value['id_product']);?>
" title="<?php echo smartyTranslate(array('s'=>'Add to wishlist','mod'=>'blockwishlist'),$_smarty_tpl);?>
">
		<svg class="svgic svgic-wishlist"><use xlink:href="#si-wishlist"></use></svg>
	</a>
</div><?php }} ?>
