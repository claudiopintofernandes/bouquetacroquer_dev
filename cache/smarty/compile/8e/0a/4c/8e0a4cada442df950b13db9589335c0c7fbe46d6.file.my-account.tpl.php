<?php /* Smarty version Smarty-3.1.19, created on 2016-03-08 15:11:31
         compiled from "/srv/data/web/vhosts/www.bouquetacroquer.fr/htdocs/themes/alysum/modules/blockwishlist/my-account.tpl" */ ?>
<?php /*%%SmartyHeaderCode:37975373256dedd939f6a70-40473776%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8e0a4cada442df950b13db9589335c0c7fbe46d6' => 
    array (
      0 => '/srv/data/web/vhosts/www.bouquetacroquer.fr/htdocs/themes/alysum/modules/blockwishlist/my-account.tpl',
      1 => 1453302236,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '37975373256dedd939f6a70-40473776',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'wishlist_link' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_56dedd93a40f35_07674447',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56dedd93a40f35_07674447')) {function content_56dedd93a40f35_07674447($_smarty_tpl) {?>

<!-- MODULE WishList -->
<li class="lnk_wishlist">
	<a href="<?php echo $_smarty_tpl->tpl_vars['wishlist_link']->value;?>
" title="<?php echo smartyTranslate(array('s'=>'My wishlists','mod'=>'blockwishlist'),$_smarty_tpl);?>
">
		<i class="icon-wishlist"></i><span><?php echo smartyTranslate(array('s'=>'My wishlists','mod'=>'blockwishlist'),$_smarty_tpl);?>
</span>
	</a>
</li>
<!-- END : MODULE WishList --><?php }} ?>
