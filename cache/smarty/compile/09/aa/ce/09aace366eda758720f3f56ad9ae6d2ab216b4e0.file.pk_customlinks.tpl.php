<?php /* Smarty version Smarty-3.1.19, created on 2016-03-08 01:59:44
         compiled from "/srv/data/web/vhosts/www.bouquetacroquer.fr/htdocs/modules/pk_customlinks/pk_customlinks.tpl" */ ?>
<?php /*%%SmartyHeaderCode:27554667056de2400a9c117-17530514%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '09aace366eda758720f3f56ad9ae6d2ab216b4e0' => 
    array (
      0 => '/srv/data/web/vhosts/www.bouquetacroquer.fr/htdocs/modules/pk_customlinks/pk_customlinks.tpl',
      1 => 1453301961,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '27554667056de2400a9c117-17530514',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'main_links' => 0,
    'link' => 0,
    'pk_returnAllowed' => 0,
    'pk_voucherAllowed' => 0,
    'wishlist_link' => 0,
    'pk_wishlist' => 0,
    'p' => 0,
    'cookie' => 0,
    'restricted_country_mode' => 0,
    'PS_CATALOG_MODE' => 0,
    'token' => 0,
    'favorite_module' => 0,
    'pk_favoriteProducts' => 0,
    'watchlist' => 0,
    'img_prod_dir' => 0,
    'lang_iso' => 0,
    'compared_products' => 0,
    'pk_compare' => 0,
    'customlinks_links' => 0,
    'lang' => 0,
    'blocklink_link' => 0,
    'page_name' => 0,
    'comparator_max_item' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_56de2400cfb765_39133206',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56de2400cfb765_39133206')) {function content_56de2400cfb765_39133206($_smarty_tpl) {?><!-- Block customlinks module -->
<div id="pk_customlinks" class="dib">
	<ul>
		<?php if ($_smarty_tpl->tpl_vars['main_links']->value['myacc']==true) {?>
		<li class="pk_account dd_el dib smooth02 main_bg_hvr">
			<a href="#" title="<?php echo smartyTranslate(array('s'=>'My Account','mod'=>'pk_customlinks'),$_smarty_tpl);?>
"><svg class="svgic main_color svgic-account"><use xlink:href="#si-account"></use></svg><span><?php echo smartyTranslate(array('s'=>'My Account','mod'=>'pk_customlinks'),$_smarty_tpl);?>
</span></a>
			<div class="dd_container main_bg">
				<div class="indent">
				<ul>
					<li><a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value->getPageLink('history',true), ENT_QUOTES, 'UTF-8', true);?>
" title="<?php echo smartyTranslate(array('s'=>'My orders','mod'=>'pk_customlinks'),$_smarty_tpl);?>
" rel="nofollow"><?php echo smartyTranslate(array('s'=>'My orders','mod'=>'pk_customlinks'),$_smarty_tpl);?>
</a></li>
					<?php if ($_smarty_tpl->tpl_vars['pk_returnAllowed']->value) {?><li><a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value->getPageLink('order-follow',true), ENT_QUOTES, 'UTF-8', true);?>
" title="<?php echo smartyTranslate(array('s'=>'My returns','mod'=>'pk_customlinks'),$_smarty_tpl);?>
" rel="nofollow"><?php echo smartyTranslate(array('s'=>'My merchandise returns','mod'=>'pk_customlinks'),$_smarty_tpl);?>
</a></li><?php }?>
					<li><a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value->getPageLink('order-slip',true), ENT_QUOTES, 'UTF-8', true);?>
" title="<?php echo smartyTranslate(array('s'=>'My credit slips','mod'=>'pk_customlinks'),$_smarty_tpl);?>
" rel="nofollow"><?php echo smartyTranslate(array('s'=>'My credit slips','mod'=>'pk_customlinks'),$_smarty_tpl);?>
</a></li>
					<li><a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value->getPageLink('addresses',true), ENT_QUOTES, 'UTF-8', true);?>
" title="<?php echo smartyTranslate(array('s'=>'My addresses','mod'=>'pk_customlinks'),$_smarty_tpl);?>
" rel="nofollow"><?php echo smartyTranslate(array('s'=>'My addresses','mod'=>'pk_customlinks'),$_smarty_tpl);?>
</a></li>
					<li><a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value->getPageLink('identity',true), ENT_QUOTES, 'UTF-8', true);?>
" title="<?php echo smartyTranslate(array('s'=>'Manage my personal information','mod'=>'pk_customlinks'),$_smarty_tpl);?>
" rel="nofollow"><?php echo smartyTranslate(array('s'=>'My personal info','mod'=>'pk_customlinks'),$_smarty_tpl);?>
</a></li>
					<?php if ($_smarty_tpl->tpl_vars['pk_voucherAllowed']->value) {?><li><a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value->getPageLink('discount',true), ENT_QUOTES, 'UTF-8', true);?>
" title="<?php echo smartyTranslate(array('s'=>'My vouchers','mod'=>'pk_customlinks'),$_smarty_tpl);?>
" rel="nofollow"><?php echo smartyTranslate(array('s'=>'My vouchers','mod'=>'pk_customlinks'),$_smarty_tpl);?>
</a></li><?php }?>
				</ul>
				</div>
			</div>
		</li><?php }?><?php if (($_smarty_tpl->tpl_vars['wishlist_link']->value!='')&&($_smarty_tpl->tpl_vars['main_links']->value['mywsh']==true)) {?><li class="pk_wishlist dd_el dib smooth02 main_bg_hvr">
			<a href="<?php echo $_smarty_tpl->tpl_vars['wishlist_link']->value;?>
" title="<?php echo smartyTranslate(array('s'=>'My Wishlist','mod'=>'pk_customlinks'),$_smarty_tpl);?>
"><svg class="svgic main_color svgic-wishlist"><use xlink:href="#si-wishlist"></use></svg><span><?php echo smartyTranslate(array('s'=>'My Wishlist','mod'=>'pk_customlinks'),$_smarty_tpl);?>
 (<span class="wlQty"><?php if (!empty($_smarty_tpl->tpl_vars['pk_wishlist']->value["wishlist_products"])) {?><?php echo count($_smarty_tpl->tpl_vars['pk_wishlist']->value["wishlist_products"]);?>
<?php } else { ?>0<?php }?></span>)</span></a>
			<div id="pk_wishlist" class="dd_container main_bg">
				<div class="indent">
				<ul class="wishlist-list">
				<?php if ($_smarty_tpl->tpl_vars['pk_wishlist']->value["wishlist_products"]) {?>			
					<?php  $_smarty_tpl->tpl_vars['p'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['p']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['pk_wishlist']->value["wishlist_products"]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['p']->total= $_smarty_tpl->_count($_from);
 $_smarty_tpl->tpl_vars['p']->iteration=0;
 $_smarty_tpl->tpl_vars['p']->index=-1;
foreach ($_from as $_smarty_tpl->tpl_vars['p']->key => $_smarty_tpl->tpl_vars['p']->value) {
$_smarty_tpl->tpl_vars['p']->_loop = true;
 $_smarty_tpl->tpl_vars['p']->iteration++;
 $_smarty_tpl->tpl_vars['p']->index++;
 $_smarty_tpl->tpl_vars['p']->first = $_smarty_tpl->tpl_vars['p']->index === 0;
 $_smarty_tpl->tpl_vars['p']->last = $_smarty_tpl->tpl_vars['p']->iteration === $_smarty_tpl->tpl_vars['p']->total;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['i']['first'] = $_smarty_tpl->tpl_vars['p']->first;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['i']['last'] = $_smarty_tpl->tpl_vars['p']->last;
?>		
						<li class="clearfix <?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['i']['first']) {?>first_item<?php } elseif ($_smarty_tpl->getVariable('smarty')->value['foreach']['i']['last']) {?>last_item<?php } else { ?>item<?php }?>">
							<a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value->getProductLink($_smarty_tpl->tpl_vars['p']->value['id_product'],$_smarty_tpl->tpl_vars['p']->value['link_rewrite'],$_smarty_tpl->tpl_vars['p']->value['category_rewrite']), ENT_QUOTES, 'UTF-8', true);?>
" class="WishListProdImage content_img">
								<img src="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['link']->value->getImageLink($_smarty_tpl->tpl_vars['p']->value['link_rewrite'],$_smarty_tpl->tpl_vars['p']->value['image'],('medium_').($_smarty_tpl->tpl_vars['cookie']->value->img_name)), ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" width="63" height="63" alt=""/>
							</a>
							<div class="text_desc">
								<span class="pName">
									<a class="cart_block_product_name"
									href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value->getProductLink($_smarty_tpl->tpl_vars['p']->value['id_product'],$_smarty_tpl->tpl_vars['p']->value['link_rewrite'],$_smarty_tpl->tpl_vars['p']->value['category_rewrite']), ENT_QUOTES, 'UTF-8', true);?>
"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['truncate'][0][0]->smarty_modifier_truncate($_smarty_tpl->tpl_vars['p']->value['name'],50,'...'), ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</a>
								</span>
								<?php if (!isset($_smarty_tpl->tpl_vars['restricted_country_mode']->value)&&!$_smarty_tpl->tpl_vars['PS_CATALOG_MODE']->value) {?><div class="price"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['convertPrice'][0][0]->convertPrice(array('price'=>$_smarty_tpl->tpl_vars['p']->value['price']),$_smarty_tpl);?>
</div><?php }?>
								<a class="ajax_cart_block_remove_link" href="javascript:;" onclick="javascript:WishlistCart('wishlist_block_list', 'delete', '<?php echo $_smarty_tpl->tpl_vars['p']->value['id_product'];?>
', <?php echo $_smarty_tpl->tpl_vars['p']->value['id_product_attribute'];?>
, '0', '<?php echo $_smarty_tpl->tpl_vars['token']->value;?>
'); $(this).closest('li').hide('fast'); $('.wlQty').text((parseInt($('.wlQty').text()))-1);$('#pk_wishlist').css({ 'height':'auto' });" title="<?php echo smartyTranslate(array('s'=>'remove this product from my wishlist','mod'=>'pk_customlinks'),$_smarty_tpl);?>
"></a>
							</div>
						</li>						
					<?php } ?>
				<?php } else { ?>
					<li class="no-products"><?php echo smartyTranslate(array('s'=>'No products','mod'=>'pk_customlinks'),$_smarty_tpl);?>
</li>
				<?php }?>
				</ul>
				</div>
			</div>
		</li><?php }?><?php if (($_smarty_tpl->tpl_vars['favorite_module']->value==1)&&($_smarty_tpl->tpl_vars['main_links']->value['myfav']==true)) {?><li class="pk_favorites dd_el dib smooth02 main_bg_hvr">
			<a href="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['link']->value->getModuleLink('favoriteproducts','account'), ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" title="<?php echo smartyTranslate(array('s'=>'My Favorites','mod'=>'pk_customlinks'),$_smarty_tpl);?>
"><svg class="svgic main_color svgic-like"><use xlink:href="#si-like"></use></svg><span><?php echo smartyTranslate(array('s'=>'My Favorites','mod'=>'pk_customlinks'),$_smarty_tpl);?>
 (<span class="favQty"><?php if (!empty($_smarty_tpl->tpl_vars['pk_favoriteProducts']->value)) {?><?php echo count($_smarty_tpl->tpl_vars['pk_favoriteProducts']->value);?>
<?php } else { ?>0<?php }?></span>)</span></a>
			<div class="favoritelist dd_container main_bg">
				<div class="indent">
				<ul>
				<?php if ($_smarty_tpl->tpl_vars['pk_favoriteProducts']->value) {?>								
					<?php  $_smarty_tpl->tpl_vars['p'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['p']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['pk_favoriteProducts']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['p']->key => $_smarty_tpl->tpl_vars['p']->value) {
$_smarty_tpl->tpl_vars['p']->_loop = true;
?>
					<li class="favoriteproduct clearfix">
						<a href="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['link']->value->getProductLink($_smarty_tpl->tpl_vars['p']->value['id_product'],null,null,null,null,$_smarty_tpl->tpl_vars['p']->value['id_shop']), ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" class="favProdImage content_img">
							<img src="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['link']->value->getImageLink($_smarty_tpl->tpl_vars['p']->value['link_rewrite'],$_smarty_tpl->tpl_vars['p']->value['image'],('medium_').($_smarty_tpl->tpl_vars['cookie']->value->img_name)), ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" width="63" height="63" alt=""/>
						</a>
						<div class="text_desc">
							<span class="pName">
								<a href="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['link']->value->getProductLink($_smarty_tpl->tpl_vars['p']->value['id_product'],null,null,null,null,$_smarty_tpl->tpl_vars['p']->value['id_shop']), ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['p']->value['name'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</a>
							</span>
							<?php if (!isset($_smarty_tpl->tpl_vars['restricted_country_mode']->value)&&!$_smarty_tpl->tpl_vars['PS_CATALOG_MODE']->value) {?><div class="price"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['convertPrice'][0][0]->convertPrice(array('price'=>$_smarty_tpl->tpl_vars['p']->value['price']),$_smarty_tpl);?>
</div><?php }?>
							<a href="#" onclick="return false" class="remove" rel="ajax_id_favoriteproduct_<?php echo $_smarty_tpl->tpl_vars['p']->value['id_product'];?>
" data-buttonID="<?php echo $_smarty_tpl->tpl_vars['p']->value['id_product'];?>
">&nbsp</a>
						</div>
					</li>
					<?php } ?>				
				<?php } else { ?>
					<li class="no-products"><?php echo smartyTranslate(array('s'=>'No favorite products have been determined just yet. ','mod'=>'pk_customlinks'),$_smarty_tpl);?>
</li>
				<?php }?>					
				</ul>
				</div>
			</div>
		</li><?php }?><?php if ($_smarty_tpl->tpl_vars['main_links']->value['mywtl']==true) {?><li class="pk_watchlist dd_el dib smooth02 main_bg_hvr"><a href="#" title="<?php echo smartyTranslate(array('s'=>'Recently viewed products','mod'=>'pk_customlinks'),$_smarty_tpl);?>
"><svg class="svgic main_color svgic-eye"><use xlink:href="#si-eye"></use></svg><span><?php echo smartyTranslate(array('s'=>'Watch List','mod'=>'pk_customlinks'),$_smarty_tpl);?>
 <span>(<?php echo count($_smarty_tpl->tpl_vars['watchlist']->value);?>
)</span></span></a>
			<div class="watchlist dd_container main_bg">
				<div class="indent">
				<ul>
					<?php if ($_smarty_tpl->tpl_vars['watchlist']->value) {?>
					<?php  $_smarty_tpl->tpl_vars['p'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['p']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['watchlist']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['p']->total= $_smarty_tpl->_count($_from);
 $_smarty_tpl->tpl_vars['p']->iteration=0;
 $_smarty_tpl->tpl_vars['p']->index=-1;
foreach ($_from as $_smarty_tpl->tpl_vars['p']->key => $_smarty_tpl->tpl_vars['p']->value) {
$_smarty_tpl->tpl_vars['p']->_loop = true;
 $_smarty_tpl->tpl_vars['p']->iteration++;
 $_smarty_tpl->tpl_vars['p']->index++;
 $_smarty_tpl->tpl_vars['p']->first = $_smarty_tpl->tpl_vars['p']->index === 0;
 $_smarty_tpl->tpl_vars['p']->last = $_smarty_tpl->tpl_vars['p']->iteration === $_smarty_tpl->tpl_vars['p']->total;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['loop']['first'] = $_smarty_tpl->tpl_vars['p']->first;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['loop']['last'] = $_smarty_tpl->tpl_vars['p']->last;
?>
						<li class="clearfix<?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['loop']['last']) {?> last_item<?php } elseif ($_smarty_tpl->getVariable('smarty')->value['foreach']['loop']['first']) {?> first_item<?php } else { ?> item<?php }?>">
							<a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['p']->value->product_link, ENT_QUOTES, 'UTF-8', true);?>
" title="<?php echo smartyTranslate(array('s'=>'About','mod'=>'pk_customlinks'),$_smarty_tpl);?>
 <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['p']->value->name, ENT_QUOTES, 'UTF-8', true);?>
" class="content_img">
							<img width="63" height="63" src="<?php if (isset($_smarty_tpl->tpl_vars['p']->value->id_image)&&$_smarty_tpl->tpl_vars['p']->value->id_image) {?><?php echo $_smarty_tpl->tpl_vars['link']->value->getImageLink($_smarty_tpl->tpl_vars['p']->value->link_rewrite,$_smarty_tpl->tpl_vars['p']->value->cover,('medium_').($_smarty_tpl->tpl_vars['cookie']->value->img_name));?>
<?php } else { ?><?php echo $_smarty_tpl->tpl_vars['img_prod_dir']->value;?>
<?php echo $_smarty_tpl->tpl_vars['lang_iso']->value;?>
-default-medium_default.jpg<?php }?>" alt="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['p']->value->legend, ENT_QUOTES, 'UTF-8', true);?>
" />
							</a>
							<div class="text_desc">
								<span class="pName">
									<a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['p']->value->product_link, ENT_QUOTES, 'UTF-8', true);?>
" title="<?php echo smartyTranslate(array('s'=>'About','mod'=>'pk_customlinks'),$_smarty_tpl);?>
 <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['p']->value->name, ENT_QUOTES, 'UTF-8', true);?>
"><?php echo $_smarty_tpl->tpl_vars['p']->value->name;?>
</a>
								</span>
								<?php if (!isset($_smarty_tpl->tpl_vars['restricted_country_mode']->value)&&!$_smarty_tpl->tpl_vars['PS_CATALOG_MODE']->value) {?><div class="price"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['convertPrice'][0][0]->convertPrice(array('price'=>$_smarty_tpl->tpl_vars['p']->value->price),$_smarty_tpl);?>
</div><?php }?>
							</div>
						</li>
					<?php } ?>
					<?php } else { ?>
						<li class="no-products"><?php echo smartyTranslate(array('s'=>'No viewed products yet.','mod'=>'pk_customlinks'),$_smarty_tpl);?>
</li>
					<?php }?>
				</ul>
			</div>
			</div>
		</li><?php }?><?php if ($_smarty_tpl->tpl_vars['main_links']->value['mycmp']==true) {?><li class="pk_compare dd_el dib smooth02 main_bg_hvr"><a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value->getPageLink('products-comparison'), ENT_QUOTES, 'UTF-8', true);?>
" title="<?php echo smartyTranslate(array('s'=>'Compare List','mod'=>'pk_customlinks'),$_smarty_tpl);?>
"><svg class="svgic main_color svgic-compare"><use xlink:href="#si-compare"></use></svg><span><?php echo smartyTranslate(array('s'=>'Compare List','mod'=>'pk_customlinks'),$_smarty_tpl);?>
 (<span class="total-compare-val"><?php echo count($_smarty_tpl->tpl_vars['compared_products']->value);?>
</span>)</span></a>
			<div class="compare dd_container main_bg">
				<div class="indent">
				<ul>
					<?php if ($_smarty_tpl->tpl_vars['pk_compare']->value) {?>
						<?php  $_smarty_tpl->tpl_vars['p'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['p']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['pk_compare']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['p']->total= $_smarty_tpl->_count($_from);
 $_smarty_tpl->tpl_vars['p']->iteration=0;
 $_smarty_tpl->tpl_vars['p']->index=-1;
foreach ($_from as $_smarty_tpl->tpl_vars['p']->key => $_smarty_tpl->tpl_vars['p']->value) {
$_smarty_tpl->tpl_vars['p']->_loop = true;
 $_smarty_tpl->tpl_vars['p']->iteration++;
 $_smarty_tpl->tpl_vars['p']->index++;
 $_smarty_tpl->tpl_vars['p']->first = $_smarty_tpl->tpl_vars['p']->index === 0;
 $_smarty_tpl->tpl_vars['p']->last = $_smarty_tpl->tpl_vars['p']->iteration === $_smarty_tpl->tpl_vars['p']->total;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['loop']['first'] = $_smarty_tpl->tpl_vars['p']->first;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['loop']['last'] = $_smarty_tpl->tpl_vars['p']->last;
?>
							<li data-id-product="$p.id" class="clearfix<?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['loop']['last']) {?> last_item<?php } elseif ($_smarty_tpl->getVariable('smarty')->value['foreach']['loop']['first']) {?> first_item<?php } else { ?> item<?php }?>">						
								<a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value->getProductLink($_smarty_tpl->tpl_vars['p']->value['id'],$_smarty_tpl->tpl_vars['p']->value['link_rewrite']), ENT_QUOTES, 'UTF-8', true);?>
" title="<?php echo smartyTranslate(array('s'=>'About','mod'=>'pk_customlinks'),$_smarty_tpl);?>
 <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['p']->value['name'], ENT_QUOTES, 'UTF-8', true);?>
" class="content_img">
									<img width="63" height="63" src="<?php echo $_smarty_tpl->tpl_vars['link']->value->getImageLink($_smarty_tpl->tpl_vars['p']->value['link_rewrite'],$_smarty_tpl->tpl_vars['p']->value['cover'],('medium_').($_smarty_tpl->tpl_vars['cookie']->value->img_name));?>
" alt="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['p']->value['name'], ENT_QUOTES, 'UTF-8', true);?>
" />
								</a>
								<div class="text_desc">
									<span class="pName">
										<a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value->getProductLink($_smarty_tpl->tpl_vars['p']->value['id'],$_smarty_tpl->tpl_vars['p']->value['link_rewrite']), ENT_QUOTES, 'UTF-8', true);?>
" title="<?php echo smartyTranslate(array('s'=>'About','mod'=>'pk_customlinks'),$_smarty_tpl);?>
 <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['p']->value['name'], ENT_QUOTES, 'UTF-8', true);?>
"><?php echo $_smarty_tpl->tpl_vars['p']->value['name'];?>
</a>
									</span>
									<?php if (!isset($_smarty_tpl->tpl_vars['restricted_country_mode']->value)&&!$_smarty_tpl->tpl_vars['PS_CATALOG_MODE']->value) {?>
										<div class="price"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['convertPrice'][0][0]->convertPrice(array('price'=>$_smarty_tpl->tpl_vars['p']->value['specprice']),$_smarty_tpl);?>
</div>
									<?php }?>
								</div>
							</li>
						<?php } ?>
					<?php } else { ?>
						<li class="no-products"><?php echo smartyTranslate(array('s'=>'No products to compare.','mod'=>'pk_customlinks'),$_smarty_tpl);?>
</li>
					<?php }?>
				</ul>
			</div>
			</div>
		</li><?php }?><?php  $_smarty_tpl->tpl_vars['blocklink_link'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['blocklink_link']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['customlinks_links']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['blocklink_link']->key => $_smarty_tpl->tpl_vars['blocklink_link']->value) {
$_smarty_tpl->tpl_vars['blocklink_link']->_loop = true;
?><?php if (isset($_smarty_tpl->tpl_vars['blocklink_link']->value[$_smarty_tpl->tpl_vars['lang']->value])) {?><li class="dib">
				<a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['blocklink_link']->value['url'], ENT_QUOTES, 'UTF-8', true);?>
"<?php if ($_smarty_tpl->tpl_vars['blocklink_link']->value['newWindow']) {?> onclick="window.open(this.href);return false;"<?php }?>><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['blocklink_link']->value[$_smarty_tpl->tpl_vars['lang']->value], ENT_QUOTES, 'UTF-8', true);?>
</a>
			</li><?php }?><?php } ?>
	</ul>
</div>
<!-- /Block customlinks module -->
<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['addJsDef'][0][0]->addJsDef(array('page_name'=>$_smarty_tpl->tpl_vars['page_name']->value),$_smarty_tpl);?>
<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['addJsDef'][0][0]->addJsDef(array('comparator_max_item'=>$_smarty_tpl->tpl_vars['comparator_max_item']->value),$_smarty_tpl);?>
<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['addJsDef'][0][0]->addJsDef(array('ajaxPath'=>addslashes($_smarty_tpl->tpl_vars['link']->value->getModuleLink('favoriteproducts','actions',array('process'=>'remove'),true))),$_smarty_tpl);?>
<?php }} ?>
