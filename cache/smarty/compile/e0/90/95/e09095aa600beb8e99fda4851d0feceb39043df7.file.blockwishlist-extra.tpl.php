<?php /* Smarty version Smarty-3.1.19, created on 2016-03-08 02:33:03
         compiled from "/srv/data/web/vhosts/www.bouquetacroquer.fr/htdocs/themes/alysum/modules/blockwishlist/blockwishlist-extra.tpl" */ ?>
<?php /*%%SmartyHeaderCode:147245154556de2bcfce4838-04613950%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e09095aa600beb8e99fda4851d0feceb39043df7' => 
    array (
      0 => '/srv/data/web/vhosts/www.bouquetacroquer.fr/htdocs/themes/alysum/modules/blockwishlist/blockwishlist-extra.tpl',
      1 => 1453302235,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '147245154556de2bcfce4838-04613950',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'page_name' => 0,
    'id_product' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_56de2bcfcfc8a0_99290231',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56de2bcfcfc8a0_99290231')) {function content_56de2bcfcfc8a0_99290231($_smarty_tpl) {?>
<p class="buttons_bottom_block"><a href="#" id="wishlist_button" <?php if ($_smarty_tpl->tpl_vars['page_name']->value!="product") {?>class="button"<?php }?> onclick="WishlistCart('wishlist_block_list', 'add', '<?php echo intval($_smarty_tpl->tpl_vars['id_product']->value);?>
', $('#idCombination').val(), document.getElementById('quantity_wanted').value); return false;" title="<?php echo smartyTranslate(array('s'=>'Add to my wishlist','mod'=>'blockwishlist'),$_smarty_tpl);?>
">&raquo; <?php echo smartyTranslate(array('s'=>'Add to my wishlist','mod'=>'blockwishlist'),$_smarty_tpl);?>
</a></p><?php }} ?>
