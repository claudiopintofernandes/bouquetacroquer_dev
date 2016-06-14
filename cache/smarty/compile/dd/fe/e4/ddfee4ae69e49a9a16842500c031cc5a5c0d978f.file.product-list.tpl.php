<?php /* Smarty version Smarty-3.1.19, created on 2016-03-08 02:03:29
         compiled from "/srv/data/web/vhosts/www.bouquetacroquer.fr/htdocs/themes/alysum/product-list.tpl" */ ?>
<?php /*%%SmartyHeaderCode:84087873756de24e1929294-32719174%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ddfee4ae69e49a9a16842500c031cc5a5c0d978f' => 
    array (
      0 => '/srv/data/web/vhosts/www.bouquetacroquer.fr/htdocs/themes/alysum/product-list.tpl',
      1 => 1453302269,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '84087873756de24e1929294-32719174',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'products' => 0,
    'page_name' => 0,
    'nbLi' => 0,
    'nbItemsPerLine' => 0,
    'nbItemsPerLineTablet' => 0,
    'id' => 0,
    'class' => 0,
    'active' => 0,
    'nbItemsPerLineMobile' => 0,
    'totModulo' => 0,
    'totModuloTablet' => 0,
    'totModuloMobile' => 0,
    'product' => 0,
    'comparator_max_item' => 0,
    'cookie' => 0,
    'link' => 0,
    'homeSize' => 0,
    'PS_CATALOG_MODE' => 0,
    'to' => 0,
    'add_prod_display' => 0,
    'restricted_country_mode' => 0,
    'static_token' => 0,
    'quick_view' => 0,
    'priceDisplay' => 0,
    'compared_products' => 0,
    'p' => 0,
    'custID' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_56de24e1cf61e0_66770252',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56de24e1cf61e0_66770252')) {function content_56de24e1cf61e0_66770252($_smarty_tpl) {?><?php if (!is_callable('smarty_function_math')) include '/srv/data/web/vhosts/www.bouquetacroquer.fr/htdocs/tools/smarty/plugins/function.math.php';
if (!is_callable('smarty_modifier_replace')) include '/srv/data/web/vhosts/www.bouquetacroquer.fr/htdocs/tools/smarty/plugins/modifier.replace.php';
?>
<?php if (isset($_smarty_tpl->tpl_vars['products']->value)) {?>
	
	<?php if ($_smarty_tpl->tpl_vars['page_name']->value!='index'&&$_smarty_tpl->tpl_vars['page_name']->value!='product') {?>
		<?php $_smarty_tpl->tpl_vars['nbItemsPerLine'] = new Smarty_variable(3, null, 0);?>
		<?php $_smarty_tpl->tpl_vars['nbItemsPerLineTablet'] = new Smarty_variable(2, null, 0);?>
		<?php $_smarty_tpl->tpl_vars['nbItemsPerLineMobile'] = new Smarty_variable(3, null, 0);?>
	<?php } else { ?>
		<?php $_smarty_tpl->tpl_vars['nbItemsPerLine'] = new Smarty_variable(4, null, 0);?>
		<?php $_smarty_tpl->tpl_vars['nbItemsPerLineTablet'] = new Smarty_variable(3, null, 0);?>
		<?php $_smarty_tpl->tpl_vars['nbItemsPerLineMobile'] = new Smarty_variable(2, null, 0);?>
	<?php }?>
	
	<?php $_smarty_tpl->tpl_vars['nbLi'] = new Smarty_variable(count($_smarty_tpl->tpl_vars['products']->value), null, 0);?>
	<?php echo smarty_function_math(array('equation'=>"nbLi/nbItemsPerLine",'nbLi'=>$_smarty_tpl->tpl_vars['nbLi']->value,'nbItemsPerLine'=>$_smarty_tpl->tpl_vars['nbItemsPerLine']->value,'assign'=>'nbLines'),$_smarty_tpl);?>

	<?php echo smarty_function_math(array('equation'=>"nbLi/nbItemsPerLineTablet",'nbLi'=>$_smarty_tpl->tpl_vars['nbLi']->value,'nbItemsPerLineTablet'=>$_smarty_tpl->tpl_vars['nbItemsPerLineTablet']->value,'assign'=>'nbLinesTablet'),$_smarty_tpl);?>

	<!-- Products list -->
	<ul<?php if (isset($_smarty_tpl->tpl_vars['id']->value)&&$_smarty_tpl->tpl_vars['id']->value) {?> id="<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
"<?php }?> class="product_list<?php if (isset($_smarty_tpl->tpl_vars['class']->value)&&$_smarty_tpl->tpl_vars['class']->value) {?> <?php echo $_smarty_tpl->tpl_vars['class']->value;?>
<?php }?><?php if (isset($_smarty_tpl->tpl_vars['active']->value)&&$_smarty_tpl->tpl_vars['active']->value==1) {?> active<?php }?>">
	<?php  $_smarty_tpl->tpl_vars['product'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['product']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['products']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['product']->total= $_smarty_tpl->_count($_from);
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['products']['total'] = $_smarty_tpl->tpl_vars['product']->total;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['products']['iteration']=0;
foreach ($_from as $_smarty_tpl->tpl_vars['product']->key => $_smarty_tpl->tpl_vars['product']->value) {
$_smarty_tpl->tpl_vars['product']->_loop = true;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['products']['iteration']++;
?>
		<?php echo smarty_function_math(array('equation'=>"(total%perLine)",'total'=>$_smarty_tpl->getVariable('smarty')->value['foreach']['products']['total'],'perLine'=>$_smarty_tpl->tpl_vars['nbItemsPerLine']->value,'assign'=>'totModulo'),$_smarty_tpl);?>

		<?php echo smarty_function_math(array('equation'=>"(total%perLineT)",'total'=>$_smarty_tpl->getVariable('smarty')->value['foreach']['products']['total'],'perLineT'=>$_smarty_tpl->tpl_vars['nbItemsPerLineTablet']->value,'assign'=>'totModuloTablet'),$_smarty_tpl);?>

		<?php echo smarty_function_math(array('equation'=>"(total%perLineT)",'total'=>$_smarty_tpl->getVariable('smarty')->value['foreach']['products']['total'],'perLineT'=>$_smarty_tpl->tpl_vars['nbItemsPerLineMobile']->value,'assign'=>'totModuloMobile'),$_smarty_tpl);?>

		<?php if ($_smarty_tpl->tpl_vars['totModulo']->value==0) {?><?php $_smarty_tpl->tpl_vars['totModulo'] = new Smarty_variable($_smarty_tpl->tpl_vars['nbItemsPerLine']->value, null, 0);?><?php }?>
		<?php if ($_smarty_tpl->tpl_vars['totModuloTablet']->value==0) {?><?php $_smarty_tpl->tpl_vars['totModuloTablet'] = new Smarty_variable($_smarty_tpl->tpl_vars['nbItemsPerLineTablet']->value, null, 0);?><?php }?>
		<?php if ($_smarty_tpl->tpl_vars['totModuloMobile']->value==0) {?><?php $_smarty_tpl->tpl_vars['totModuloMobile'] = new Smarty_variable($_smarty_tpl->tpl_vars['nbItemsPerLineMobile']->value, null, 0);?><?php }?>
		<li <?php if ($_smarty_tpl->tpl_vars['page_name']->value=="category") {?>id="category2"<?php }?> class="ajax_block_product<?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['products']['iteration']%$_smarty_tpl->tpl_vars['nbItemsPerLine']->value==0) {?> last-in-line<?php } elseif ($_smarty_tpl->getVariable('smarty')->value['foreach']['products']['iteration']%$_smarty_tpl->tpl_vars['nbItemsPerLine']->value==1) {?> first-in-line<?php }?><?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['products']['iteration']>($_smarty_tpl->getVariable('smarty')->value['foreach']['products']['total']-$_smarty_tpl->tpl_vars['totModulo']->value)) {?> last-line<?php }?><?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['products']['iteration']%$_smarty_tpl->tpl_vars['nbItemsPerLineTablet']->value==0) {?> last-item-of-tablet-line<?php } elseif ($_smarty_tpl->getVariable('smarty')->value['foreach']['products']['iteration']%$_smarty_tpl->tpl_vars['nbItemsPerLineTablet']->value==1) {?> first-item-of-tablet-line<?php }?><?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['products']['iteration']%$_smarty_tpl->tpl_vars['nbItemsPerLineMobile']->value==0) {?> last-item-of-mobile-line<?php } elseif ($_smarty_tpl->getVariable('smarty')->value['foreach']['products']['iteration']%$_smarty_tpl->tpl_vars['nbItemsPerLineMobile']->value==1) {?> first-item-of-mobile-line<?php }?><?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['products']['iteration']>($_smarty_tpl->getVariable('smarty')->value['foreach']['products']['total']-$_smarty_tpl->tpl_vars['totModuloMobile']->value)) {?> last-mobile-line<?php }?>" data-productid="<?php echo $_smarty_tpl->tpl_vars['product']->value['id_product'];?>
" data-rewrite="<?php echo $_smarty_tpl->tpl_vars['product']->value['link_rewrite'];?>
">
			<div class="product-container" itemscope itemtype="http://schema.org/Product">
				<div class="left_block">
					<?php if (isset($_smarty_tpl->tpl_vars['comparator_max_item']->value)&&$_smarty_tpl->tpl_vars['comparator_max_item']->value) {?>
						<div class="compare">
							<a class="add_to_compare" href="#" data-id-product="<?php echo $_smarty_tpl->tpl_vars['product']->value['id_product'];?>
" title="<?php echo smartyTranslate(array('s'=>'Add to Compare'),$_smarty_tpl);?>
"><?php echo smartyTranslate(array('s'=>'Add to Compare'),$_smarty_tpl);?>
</a>
						</div>
					<?php }?>
				</div>
				<div class="center_block">
					<div class="product-image-container">
						<a class="product_img_link" href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['link'], ENT_QUOTES, 'UTF-8', true);?>
" title="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['name'], ENT_QUOTES, 'UTF-8', true);?>
" itemprop="url">
							<img class="replace-2x img-responsive pimg-<?php echo $_smarty_tpl->tpl_vars['product']->value['id_product'];?>
" src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value->getImageLink($_smarty_tpl->tpl_vars['product']->value['link_rewrite'],$_smarty_tpl->tpl_vars['product']->value['id_image'],('home_').($_smarty_tpl->tpl_vars['cookie']->value->img_name)), ENT_QUOTES, 'UTF-8', true);?>
" alt="<?php if (!empty($_smarty_tpl->tpl_vars['product']->value['legend'])) {?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['legend'], ENT_QUOTES, 'UTF-8', true);?>
<?php } else { ?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['name'], ENT_QUOTES, 'UTF-8', true);?>
<?php }?>" title="<?php if (!empty($_smarty_tpl->tpl_vars['product']->value['legend'])) {?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['legend'], ENT_QUOTES, 'UTF-8', true);?>
<?php } else { ?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['name'], ENT_QUOTES, 'UTF-8', true);?>
<?php }?>" <?php if (isset($_smarty_tpl->tpl_vars['homeSize']->value)) {?> width="<?php echo $_smarty_tpl->tpl_vars['homeSize']->value['width'];?>
" height="<?php echo $_smarty_tpl->tpl_vars['homeSize']->value['height'];?>
"<?php }?> itemprop="image" />
							<span class="subimage-container pid_<?php echo $_smarty_tpl->tpl_vars['product']->value['id_product'];?>
"></span>
							<span class="attimage-container aid_<?php echo $_smarty_tpl->tpl_vars['product']->value['id_product'];?>
"></span>
							<span class="product-flags">
								<?php if ((!$_smarty_tpl->tpl_vars['PS_CATALOG_MODE']->value&&((isset($_smarty_tpl->tpl_vars['product']->value['show_price'])&&$_smarty_tpl->tpl_vars['product']->value['show_price'])||(isset($_smarty_tpl->tpl_vars['product']->value['available_for_order'])&&$_smarty_tpl->tpl_vars['product']->value['available_for_order'])))) {?>
									<?php if (isset($_smarty_tpl->tpl_vars['product']->value['online_only'])&&$_smarty_tpl->tpl_vars['product']->value['online_only']) {?>
										<span class="online_only"><?php echo smartyTranslate(array('s'=>'Online only'),$_smarty_tpl);?>
</span><br/>
									<?php }?>
								<?php }?>
								<?php if (isset($_smarty_tpl->tpl_vars['product']->value['on_sale'])&&$_smarty_tpl->tpl_vars['product']->value['on_sale']&&isset($_smarty_tpl->tpl_vars['product']->value['show_price'])&&$_smarty_tpl->tpl_vars['product']->value['show_price']&&!$_smarty_tpl->tpl_vars['PS_CATALOG_MODE']->value) {?>
									<?php } elseif (isset($_smarty_tpl->tpl_vars['product']->value['reduction'])&&$_smarty_tpl->tpl_vars['product']->value['reduction']&&isset($_smarty_tpl->tpl_vars['product']->value['show_price'])&&$_smarty_tpl->tpl_vars['product']->value['show_price']&&!$_smarty_tpl->tpl_vars['PS_CATALOG_MODE']->value) {?>
										<?php if (($_smarty_tpl->tpl_vars['cookie']->value->reduced_label==1)) {?>
										<span class="discount"><?php echo smartyTranslate(array('s'=>'Reduced price!'),$_smarty_tpl);?>
</span><br/>
										<?php }?>
									<?php }?>
								<!--<?php if (isset($_smarty_tpl->tpl_vars['product']->value['new'])&&$_smarty_tpl->tpl_vars['product']->value['new']==1) {?><span class="new"><?php echo smartyTranslate(array('s'=>'New'),$_smarty_tpl);?>
</span><br/><?php }?>-->
								<?php if (isset($_smarty_tpl->tpl_vars['product']->value['on_sale'])&&$_smarty_tpl->tpl_vars['product']->value['on_sale']&&isset($_smarty_tpl->tpl_vars['product']->value['show_price'])&&$_smarty_tpl->tpl_vars['product']->value['show_price']&&!$_smarty_tpl->tpl_vars['PS_CATALOG_MODE']->value) {?>
									<span class="sale-box">
										<span class="sale-label"><?php echo smartyTranslate(array('s'=>'Sale!'),$_smarty_tpl);?>
</span>
									</span><br/>
								<?php }?>
								<?php if ((!$_smarty_tpl->tpl_vars['PS_CATALOG_MODE']->value&&((isset($_smarty_tpl->tpl_vars['product']->value['show_price'])&&$_smarty_tpl->tpl_vars['product']->value['show_price'])||(isset($_smarty_tpl->tpl_vars['product']->value['available_for_order'])&&$_smarty_tpl->tpl_vars['product']->value['available_for_order'])))) {?>
									<?php if (isset($_smarty_tpl->tpl_vars['product']->value['specific_prices'])&&$_smarty_tpl->tpl_vars['product']->value['specific_prices']&&isset($_smarty_tpl->tpl_vars['product']->value['specific_prices']['reduction'])&&$_smarty_tpl->tpl_vars['product']->value['specific_prices']['reduction']) {?>
										<?php if ($_smarty_tpl->tpl_vars['product']->value['specific_prices']['reduction_type']=='percentage') {?>
											<span class="price-percent-reduction">-<?php echo $_smarty_tpl->tpl_vars['product']->value['specific_prices']['reduction']*100;?>
%</span>
										<?php }?>
									<?php }?>
								<?php }?>												
							</span>							
						</a>
						<?php if (($_smarty_tpl->tpl_vars['cookie']->value->ts_countdown==1)) {?>
				        <?php $_smarty_tpl->tpl_vars['to'] = new Smarty_variable(explode("-",$_smarty_tpl->tpl_vars['product']->value['specific_prices']['to']), null, 0);?> 
				        <?php if (isset($_smarty_tpl->tpl_vars['product']->value['specific_prices']['to'])&&($_smarty_tpl->tpl_vars['to']->value[0]!="0000")) {?>
				        	<div class="countdown countdown-<?php echo intval($_smarty_tpl->tpl_vars['product']->value['id_product']);?>
"></div>
				        	<script>
				        	$(document).ready(function(){
				        		$(function() {
								    $('.countdown-<?php echo intval($_smarty_tpl->tpl_vars['product']->value['id_product']);?>
').countdown({
								        date: "<?php echo smarty_modifier_replace($_smarty_tpl->tpl_vars['product']->value['specific_prices']['to'],' ','T');?>
",
								          render: function(data) {
								            $(this.el).html("<div>" + this.leadingZeros(data.days, 2) + " <span><?php echo smartyTranslate(array('s'=>'Days'),$_smarty_tpl);?>
</span></div><div>" + this.leadingZeros(data.hours, 2) + " <span><?php echo smartyTranslate(array('s'=>'Hours'),$_smarty_tpl);?>
</span></div><div>" + this.leadingZeros(data.min, 2) + " <span><?php echo smartyTranslate(array('s'=>'Min'),$_smarty_tpl);?>
</span></div><div>" + this.leadingZeros(data.sec, 2) + " <span><?php echo smartyTranslate(array('s'=>'Sec'),$_smarty_tpl);?>
</span></div>");
								          }
								    });
								});
				        	});
				        	</script>			        	
				        <?php }?>
				        <?php }?>
				        <?php if (($_smarty_tpl->tpl_vars['cookie']->value->color_label==1)) {?>
						<?php if (isset($_smarty_tpl->tpl_vars['product']->value['color_list'])) {?>
							<div class="color-list-container"><?php if ($_smarty_tpl->tpl_vars['product']->value['color_list']) {?><?php echo $_smarty_tpl->tpl_vars['product']->value['color_list'];?>
<?php } else { ?>&nbsp;<?php }?></div>
						<?php }?>
						<?php }?>
						<h3 itemprop="name" class="ellipsis">
							<?php if (isset($_smarty_tpl->tpl_vars['product']->value['pack_quantity'])&&$_smarty_tpl->tpl_vars['product']->value['pack_quantity']) {?><?php echo (intval($_smarty_tpl->tpl_vars['product']->value['pack_quantity'])).(' x ');?>
<?php }?>
							<a class="product-name" href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['link'], ENT_QUOTES, 'UTF-8', true);?>
" title="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['name'], ENT_QUOTES, 'UTF-8', true);?>
" itemprop="url" >
								<?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['truncate'][0][0]->smarty_modifier_truncate($_smarty_tpl->tpl_vars['product']->value['name'],28,'...'), ENT_QUOTES, 'UTF-8', true);?>

							</a>
						</h3>	
					</div>
					<div class="product-info">
						<h3 itemprop="name">
							<?php if (isset($_smarty_tpl->tpl_vars['product']->value['pack_quantity'])&&$_smarty_tpl->tpl_vars['product']->value['pack_quantity']) {?><?php echo (intval($_smarty_tpl->tpl_vars['product']->value['pack_quantity'])).(' x ');?>
<?php }?>
							<a class="product-name" href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['link'], ENT_QUOTES, 'UTF-8', true);?>
" title="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['name'], ENT_QUOTES, 'UTF-8', true);?>
" itemprop="url" >
								<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['name'], ENT_QUOTES, 'UTF-8', true);?>

							</a>
						</h3>	
						<?php if (($_smarty_tpl->tpl_vars['cookie']->value->cat_rating==1)) {?>									
						<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0][0]->smartyHook(array('h'=>'displayProductListReviews','product'=>$_smarty_tpl->tpl_vars['product']->value),$_smarty_tpl);?>

						<?php }?>
						<p class="product-desc" itemprop="description">
							<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['truncate'][0][0]->smarty_modifier_truncate(strip_tags($_smarty_tpl->tpl_vars['product']->value['description_short']),360,'...');?>

						</p>
						<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0][0]->smartyHook(array('h'=>"displayProductDeliveryTime",'product'=>$_smarty_tpl->tpl_vars['product']->value),$_smarty_tpl);?>

						<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0][0]->smartyHook(array('h'=>"displayProductPriceBlock",'product'=>$_smarty_tpl->tpl_vars['product']->value,'type'=>"weight"),$_smarty_tpl);?>
					
					</div>
					<div class="right_block">
						<div class="button-container">
							<?php if (($_smarty_tpl->tpl_vars['product']->value['id_product_attribute']==0||(isset($_smarty_tpl->tpl_vars['add_prod_display']->value)&&($_smarty_tpl->tpl_vars['add_prod_display']->value==1)))&&$_smarty_tpl->tpl_vars['product']->value['available_for_order']&&!isset($_smarty_tpl->tpl_vars['restricted_country_mode']->value)&&$_smarty_tpl->tpl_vars['product']->value['minimal_quantity']<=1&&$_smarty_tpl->tpl_vars['product']->value['customizable']!=2&&!$_smarty_tpl->tpl_vars['PS_CATALOG_MODE']->value) {?>
								<?php if (($_smarty_tpl->tpl_vars['product']->value['allow_oosp']||$_smarty_tpl->tpl_vars['product']->value['quantity']>0)) {?>
									<?php if (isset($_smarty_tpl->tpl_vars['static_token']->value)) {?>
										<a class="button ajax_add_to_cart_button dib btn btn-default" href="<?php ob_start();?><?php echo intval($_smarty_tpl->tpl_vars['product']->value['id_product']);?>
<?php $_tmp1=ob_get_clean();?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value->getPageLink('cart',false,null,"add=1&amp;id_product=".$_tmp1."&amp;token=".((string)$_smarty_tpl->tpl_vars['static_token']->value),false), ENT_QUOTES, 'UTF-8', true);?>
" rel="nofollow" title="<?php echo smartyTranslate(array('s'=>'Add to cart'),$_smarty_tpl);?>
" data-id-product="<?php echo intval($_smarty_tpl->tpl_vars['product']->value['id_product']);?>
">
											<i></i><?php echo smartyTranslate(array('s'=>'Add to cart'),$_smarty_tpl);?>

										</a><br class="lst" />
									<?php } else { ?>
										<a class="button ajax_add_to_cart_button dib btn btn-default" href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value->getPageLink('cart',false,null,'add=1&amp;id_product={$product.id_product|intval}',false), ENT_QUOTES, 'UTF-8', true);?>
" rel="nofollow" title="<?php echo smartyTranslate(array('s'=>'Add to cart'),$_smarty_tpl);?>
" data-id-product="<?php echo intval($_smarty_tpl->tpl_vars['product']->value['id_product']);?>
">
											<i></i><?php echo smartyTranslate(array('s'=>'Add to cart'),$_smarty_tpl);?>

										</a><br class="lst" />
									<?php }?>						
								<?php } else { ?>
									<span class="button ajax_add_to_cart_button dib btn btn-default disabled">
										<i></i><?php echo smartyTranslate(array('s'=>'Add to cart'),$_smarty_tpl);?>

									</span><br class="lst" />
								<?php }?>
							<?php }?>
							<?php if ($_smarty_tpl->tpl_vars['page_name']->value!='index') {?>
				 				<div class="functional-buttons dib clearfix smooth02<?php if (($_smarty_tpl->tpl_vars['cookie']->value->cat_wishlist_butt==0)) {?> hide_wishlist<?php }?>">
									<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0][0]->smartyHook(array('h'=>'displayProductListFunctionalButtons','product'=>$_smarty_tpl->tpl_vars['product']->value),$_smarty_tpl);?>

								</div>
							<?php }?>
							<?php if (($_smarty_tpl->tpl_vars['cookie']->value->cat_quickview_butt==1)) {?>
							<?php if (isset($_smarty_tpl->tpl_vars['quick_view']->value)&&$_smarty_tpl->tpl_vars['quick_view']->value) {?>
								<a class="quick-view dib button" href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['link'], ENT_QUOTES, 'UTF-8', true);?>
" rel="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['link'], ENT_QUOTES, 'UTF-8', true);?>
" title="<?php echo smartyTranslate(array('s'=>'Quick view'),$_smarty_tpl);?>
"><svg class="svgic svgic-search"><use xlink:href="#si-search"></use></svg></a>
							<?php }?>
							<?php }?>
						</div>	
						<?php if ((!$_smarty_tpl->tpl_vars['PS_CATALOG_MODE']->value&&((isset($_smarty_tpl->tpl_vars['product']->value['show_price'])&&$_smarty_tpl->tpl_vars['product']->value['show_price'])||(isset($_smarty_tpl->tpl_vars['product']->value['available_for_order'])&&$_smarty_tpl->tpl_vars['product']->value['available_for_order'])))) {?>
							<div itemprop="offers" itemscope itemtype="http://schema.org/Offer" class="content_price">
								<?php if (isset($_smarty_tpl->tpl_vars['product']->value['show_price'])&&$_smarty_tpl->tpl_vars['product']->value['show_price']&&!isset($_smarty_tpl->tpl_vars['restricted_country_mode']->value)) {?>
									<?php if (isset($_smarty_tpl->tpl_vars['product']->value['specific_prices'])&&$_smarty_tpl->tpl_vars['product']->value['specific_prices']&&isset($_smarty_tpl->tpl_vars['product']->value['specific_prices']['reduction'])&&$_smarty_tpl->tpl_vars['product']->value['specific_prices']['reduction']) {?>
										<span class="old-price product-price">
											<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['displayWtPrice'][0][0]->displayWtPrice(array('p'=>$_smarty_tpl->tpl_vars['product']->value['price_without_reduction']),$_smarty_tpl);?>

										</span>
									<?php }?>
									A partir de :<span itemprop="price" class="price product-price">
										<?php if (!$_smarty_tpl->tpl_vars['priceDisplay']->value) {?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['convertPrice'][0][0]->convertPrice(array('price'=>$_smarty_tpl->tpl_vars['product']->value['price']),$_smarty_tpl);?>
<?php } else { ?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['convertPrice'][0][0]->convertPrice(array('price'=>$_smarty_tpl->tpl_vars['product']->value['price_tax_exc']),$_smarty_tpl);?>
<?php }?></span><br/><meta itemprop="priceCurrency" content="<?php echo $_smarty_tpl->tpl_vars['priceDisplay']->value;?>
" /><?php }?>
							</div>
						<?php }?>
						<?php if ((!$_smarty_tpl->tpl_vars['PS_CATALOG_MODE']->value&&((isset($_smarty_tpl->tpl_vars['product']->value['show_price'])&&$_smarty_tpl->tpl_vars['product']->value['show_price'])||(isset($_smarty_tpl->tpl_vars['product']->value['available_for_order'])&&$_smarty_tpl->tpl_vars['product']->value['available_for_order'])))) {?>
							<?php if (isset($_smarty_tpl->tpl_vars['product']->value['available_for_order'])&&$_smarty_tpl->tpl_vars['product']->value['available_for_order']&&!isset($_smarty_tpl->tpl_vars['restricted_country_mode']->value)) {?>
								<span itemprop="offers" itemscope itemtype="http://schema.org/Offer" class="availability hidden">
									<?php if (($_smarty_tpl->tpl_vars['product']->value['allow_oosp']||$_smarty_tpl->tpl_vars['product']->value['quantity']>0)) {?>
										<span class="available-now">
											<link itemprop="availability" href="http://schema.org/InStock" /><?php echo smartyTranslate(array('s'=>'In Stock'),$_smarty_tpl);?>

										</span>
									<?php } elseif ((isset($_smarty_tpl->tpl_vars['product']->value['quantity_all_versions'])&&$_smarty_tpl->tpl_vars['product']->value['quantity_all_versions']>0)) {?>
										<span class="available-dif">
											<link itemprop="availability" href="http://schema.org/LimitedAvailability" /><?php echo smartyTranslate(array('s'=>'Product available with different options'),$_smarty_tpl);?>

										</span>
									<?php } else { ?>
										<span class="out-of-stock">
											<link itemprop="availability" href="http://schema.org/OutOfStock" /><?php echo smartyTranslate(array('s'=>'Out of stock'),$_smarty_tpl);?>

										</span>
									<?php }?>
								</span>
							<?php }?>
						<?php }?>
					</div>
				</div>				
			</div><!-- .product-container> -->
			<div class="clearfix"></div>
		</li>
	<?php } ?>
	</ul>
<?php $_smarty_tpl->smarty->_tag_stack[] = array('addJsDefL', array('name'=>'min_item')); $_block_repeat=true; echo $_smarty_tpl->smarty->registered_plugins['block']['addJsDefL'][0][0]->addJsDefL(array('name'=>'min_item'), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
<?php echo smartyTranslate(array('s'=>'Please select at least one product','js'=>1),$_smarty_tpl);?>
<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['addJsDefL'][0][0]->addJsDefL(array('name'=>'min_item'), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>

<?php $_smarty_tpl->smarty->_tag_stack[] = array('addJsDefL', array('name'=>'max_item')); $_block_repeat=true; echo $_smarty_tpl->smarty->registered_plugins['block']['addJsDefL'][0][0]->addJsDefL(array('name'=>'max_item'), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
<?php echo smartyTranslate(array('s'=>'You cannot add more than %d product(s) to the product comparison','sprintf'=>$_smarty_tpl->tpl_vars['comparator_max_item']->value,'js'=>1),$_smarty_tpl);?>
<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['addJsDefL'][0][0]->addJsDefL(array('name'=>'max_item'), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>

<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['addJsDef'][0][0]->addJsDef(array('comparator_max_item'=>$_smarty_tpl->tpl_vars['comparator_max_item']->value),$_smarty_tpl);?>

<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['addJsDef'][0][0]->addJsDef(array('comparedProductsIds'=>$_smarty_tpl->tpl_vars['compared_products']->value),$_smarty_tpl);?>

<?php }?>
<?php if ((isset($_smarty_tpl->tpl_vars['cookie']->value->id_customer))) {?>
	<?php $_smarty_tpl->tpl_vars['custID'] = new Smarty_variable($_smarty_tpl->tpl_vars['cookie']->value->id_customer, null, 0);?>
<?php } elseif ((isset($_smarty_tpl->tpl_vars['cookie']->value->id_guest))) {?>
	<?php $_smarty_tpl->tpl_vars['custID'] = new Smarty_variable($_smarty_tpl->tpl_vars['cookie']->value->id_guest, null, 0);?>
<?php } else { ?>
	<?php $_smarty_tpl->tpl_vars['custID'] = new Smarty_variable(0, null, 0);?>
<?php }?>
<script>
$(document).ready(function() {
	$(".color_pick").hover(
			function () {
				var attrid = $(this).data("attrid");
				var pid = $(this).data("pid");
				var link_rewrite = $(this).closest(".ajax_block_product").data("rewrite");
				$.ajax({
				    type: 'POST',
				    url: baseDir+'modules/pk_themesettings/ajax.php',
				    data: 'getImgByAttr=1&pid='+pid+'&attrid='+attrid+'&link_rewrite='+link_rewrite+'&imgName=home_<?php echo $_smarty_tpl->tpl_vars['cookie']->value->img_name;?>
',
				    success: function(result){
				      if (result == '0')
				      {
				        console.log('no data')
				      } else {                          
				      	if (JSON.parse(result) != false) {
				      		console.log(JSON.parse(result));
					        $(".aid_"+pid).append('<img class="colorimg im_'+attrid+'" src="'+JSON.parse(result)+'" alt="" />');
					    } else {
					    	console.log("No image for this color");
					    }
				      }
				    }
				});    
			},	 
			function () {
				$('.colorimg').remove();
			}
		);	
	$.ajax({
	    type: 'POST',
	    url: baseDir+'modules/pk_themesettings/ajax.php',
	    data: 'id=<?php  $_smarty_tpl->tpl_vars['p'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['p']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['products']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['p']->total= $_smarty_tpl->_count($_from);
 $_smarty_tpl->tpl_vars['p']->iteration=0;
foreach ($_from as $_smarty_tpl->tpl_vars['p']->key => $_smarty_tpl->tpl_vars['p']->value) {
$_smarty_tpl->tpl_vars['p']->_loop = true;
 $_smarty_tpl->tpl_vars['p']->iteration++;
 $_smarty_tpl->tpl_vars['p']->last = $_smarty_tpl->tpl_vars['p']->iteration === $_smarty_tpl->tpl_vars['p']->total;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['prd']['last'] = $_smarty_tpl->tpl_vars['p']->last;
?><?php echo $_smarty_tpl->tpl_vars['p']->value['id_product'];?>
<?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['prd']['last']) {?><?php } else { ?>,<?php }?><?php } ?>&customer=<?php echo $_smarty_tpl->tpl_vars['custID']->value;?>
&lang_id=<?php echo $_smarty_tpl->tpl_vars['cookie']->value->id_lang;?>
&imgName=home_<?php echo $_smarty_tpl->tpl_vars['cookie']->value->img_name;?>
&wishlist=blockwishlist&favorites=favoriteproducts',
	    success: function(result){
	      if (result == '0')
	      {
	        console.log("no data")
	      } 
		  else {                   
			var pData = JSON.parse(result);					

			if (pData.modules.enabled.wishlist == "disabled" || pData.modules.installed.wishlist == "not_installed") $(".product_wishlist").hide();
		  	//if (pData.modules.enabled.favorites == "disabled" || pData.modules.installed.favorites == "not_installed") $(".product_like").hide();
		   	jQuery.each(pData.isInWishlist, function(index, value) {
		   		if (value == true) {
			   		$(".product_list").find(".wishlistProd_"+index).addClass("active");
			   	}
		   	});		
		   	jQuery.each(pData.subimage, function(index, value) {
		   		if (value != "no_image") {
			   		$(".pid_"+index).append("<img src='"+value+"' alt='' />");
			   		$(".pid_"+index).parent().addClass('hasSubImage');
			   	}
		   	});
	      }
	    }
	 });
	$.get(baseDir+'modules/pk_themesettings/ajax.php', { theme_settings: "get" }, function(data) {
		var opt = JSON.parse(data);
		if (opt.reduced_label == 1) {		  	
	  		$(".discount").removeClass('hidden');
	  	}
	  	if (opt.availability_label == 1) {		  	
	  		$(".availability").removeClass('hidden');
	  	}
	});
});
</script><?php }} ?>
