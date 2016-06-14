<?php /* Smarty version Smarty-3.1.19, created on 2016-03-08 02:33:05
         compiled from "/srv/data/web/vhosts/www.bouquetacroquer.fr/htdocs/themes/alysum/product.tpl" */ ?>
<?php /*%%SmartyHeaderCode:213410449056de2bd18c7e88-81540106%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e03abb1955a9034b02dac19fe3234aa609b1fd81' => 
    array (
      0 => '/srv/data/web/vhosts/www.bouquetacroquer.fr/htdocs/themes/alysum/product.tpl',
      1 => 1453302269,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '213410449056de2bd18c7e88-81540106',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'errors' => 0,
    'priceDisplayPrecision' => 0,
    'priceDisplay' => 0,
    'product' => 0,
    'content_only' => 0,
    'adminActionDisplay' => 0,
    'base_dir' => 0,
    'confirmation' => 0,
    'productPriceWithoutReduction' => 0,
    'productPrice' => 0,
    'have_image' => 0,
    'jqZoomEnabled' => 0,
    'cover' => 0,
    'cookie' => 0,
    'link' => 0,
    'largeSize' => 0,
    'img_prod_dir' => 0,
    'lang_iso' => 0,
    'images' => 0,
    'image' => 0,
    'imageIds' => 0,
    'imageTitle' => 0,
    'mediumSize' => 0,
    'HOOK_PRODUCT_FOOTER' => 0,
    'comments' => 0,
    'theme_settings' => 0,
    'comment' => 0,
    'totalGrade' => 0,
    'totalVotes' => 0,
    'productGrade' => 0,
    'groups' => 0,
    'allow_oosp' => 0,
    'display_qties' => 0,
    'PS_CATALOG_MODE' => 0,
    'PS_STOCK_MANAGEMENT' => 0,
    'last_qties' => 0,
    'packItems' => 0,
    'packItem' => 0,
    'features' => 0,
    'accessories' => 0,
    'quantity_discounts' => 0,
    'attachments' => 0,
    'HOOK_PRODUCT_TAB' => 0,
    'feature' => 0,
    'accessory' => 0,
    'restricted_country_mode' => 0,
    'accessoryLink' => 0,
    'homeSize' => 0,
    'static_token' => 0,
    'display_discount_price' => 0,
    'quantity_discount' => 0,
    'discountPrice' => 0,
    'qtyProductPrice' => 0,
    'attachment' => 0,
    'customizationFormTarget' => 0,
    'customizationFields' => 0,
    'field' => 0,
    'key' => 0,
    'pictures' => 0,
    'pic_dir' => 0,
    'img_dir' => 0,
    'customizationField' => 0,
    'textFields' => 0,
    'img_ps_dir' => 0,
    'HOOK_PRODUCT_TAB_CONTENT' => 0,
    'group' => 0,
    'id_attribute_group' => 0,
    'groupName' => 0,
    'id_attribute' => 0,
    'group_attribute' => 0,
    'colors' => 0,
    'col_img_dir' => 0,
    'img_col_dir' => 0,
    'default_colorpicker' => 0,
    'HOOK_PRODUCT_ACTIONS' => 0,
    'quantityBackup' => 0,
    'to' => 0,
    'tax_enabled' => 0,
    'display_tax_label' => 0,
    'currency' => 0,
    'ecotax_tax_exc' => 0,
    'ecotax_tax_inc' => 0,
    'unit_price' => 0,
    'HOOK_EXTRA_LEFT' => 0,
    'HOOK_PRODUCT_OOS' => 0,
    'HOOK_EXTRA_RIGHT' => 0,
    'attribute_anchor_separator' => 0,
    'attributesCombinations' => 0,
    'currencySign' => 0,
    'currencyRate' => 0,
    'currencyFormat' => 0,
    'currencyBlank' => 0,
    'combinations' => 0,
    'combinationImages' => 0,
    'ecotaxTax_rate' => 0,
    'group_reduction' => 0,
    'no_tax' => 0,
    'customer_group_without_tax' => 0,
    'tax_rate' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_56de2bd2532072_95146216',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56de2bd2532072_95146216')) {function content_56de2bd2532072_95146216($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/srv/data/web/vhosts/www.bouquetacroquer.fr/htdocs/tools/smarty/plugins/modifier.date_format.php';
if (!is_callable('smarty_function_cycle')) include '/srv/data/web/vhosts/www.bouquetacroquer.fr/htdocs/tools/smarty/plugins/function.cycle.php';
if (!is_callable('smarty_function_counter')) include '/srv/data/web/vhosts/www.bouquetacroquer.fr/htdocs/tools/smarty/plugins/function.counter.php';
if (!is_callable('smarty_modifier_replace')) include '/srv/data/web/vhosts/www.bouquetacroquer.fr/htdocs/tools/smarty/plugins/modifier.replace.php';
if (!is_callable('smarty_function_math')) include '/srv/data/web/vhosts/www.bouquetacroquer.fr/htdocs/tools/smarty/plugins/function.math.php';
?>
<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tpl_dir']->value)."./errors.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php if (count($_smarty_tpl->tpl_vars['errors']->value)==0) {?>

	<?php if (!isset($_smarty_tpl->tpl_vars['priceDisplayPrecision']->value)) {?>
		<?php $_smarty_tpl->tpl_vars['priceDisplayPrecision'] = new Smarty_variable(2, null, 0);?>
	<?php }?>
	<?php if (!$_smarty_tpl->tpl_vars['priceDisplay']->value||$_smarty_tpl->tpl_vars['priceDisplay']->value==2) {?>
		<?php $_smarty_tpl->tpl_vars['productPrice'] = new Smarty_variable($_smarty_tpl->tpl_vars['product']->value->getPrice(true,@constant('NULL'),$_smarty_tpl->tpl_vars['priceDisplayPrecision']->value), null, 0);?>
		<?php $_smarty_tpl->tpl_vars['productPriceWithoutReduction'] = new Smarty_variable($_smarty_tpl->tpl_vars['product']->value->getPriceWithoutReduct(false,@constant('NULL')), null, 0);?>
	<?php } elseif ($_smarty_tpl->tpl_vars['priceDisplay']->value==1) {?>
		<?php $_smarty_tpl->tpl_vars['productPrice'] = new Smarty_variable($_smarty_tpl->tpl_vars['product']->value->getPrice(false,@constant('NULL'),$_smarty_tpl->tpl_vars['priceDisplayPrecision']->value), null, 0);?>
		<?php $_smarty_tpl->tpl_vars['productPriceWithoutReduction'] = new Smarty_variable($_smarty_tpl->tpl_vars['product']->value->getPriceWithoutReduct(true,@constant('NULL')), null, 0);?>
	<?php }?>

	<div id="primary_block" class="row" itemscope itemtype="http://schema.org/Product">
		<?php if ($_smarty_tpl->tpl_vars['content_only']->value) {?><div id="cart_block"></div><?php }?>
		<?php if (!$_smarty_tpl->tpl_vars['content_only']->value) {?>
			<div class="container">
				<div class="top-hr"></div>
			</div>
		<?php }?>

		<?php if (isset($_smarty_tpl->tpl_vars['adminActionDisplay']->value)&&$_smarty_tpl->tpl_vars['adminActionDisplay']->value) {?>
			<div id="admin-action">
				<p><?php echo smartyTranslate(array('s'=>'This product is not visible to your customers.'),$_smarty_tpl);?>

					<input type="hidden" id="admin-action-product-id" value="<?php echo $_smarty_tpl->tpl_vars['product']->value->id;?>
" />
					<input type="submit" value="<?php echo smartyTranslate(array('s'=>'Publish'),$_smarty_tpl);?>
" class="exclusive" onclick="submitPublishProduct('<?php echo $_smarty_tpl->tpl_vars['base_dir']->value;?>
<?php echo htmlspecialchars($_GET['ad'], ENT_QUOTES, 'UTF-8', true);?>
', 0, '<?php echo htmlspecialchars($_GET['adtoken'], ENT_QUOTES, 'UTF-8', true);?>
')"/>
					<input type="submit" value="<?php echo smartyTranslate(array('s'=>'Back'),$_smarty_tpl);?>
" class="exclusive" onclick="submitPublishProduct('<?php echo $_smarty_tpl->tpl_vars['base_dir']->value;?>
<?php echo htmlspecialchars($_GET['ad'], ENT_QUOTES, 'UTF-8', true);?>
', 1, '<?php echo htmlspecialchars($_GET['adtoken'], ENT_QUOTES, 'UTF-8', true);?>
')"/>
				</p>
				<p id="admin-action-result"></p>
			</div>
		<?php }?>

		<?php if (isset($_smarty_tpl->tpl_vars['confirmation']->value)&&$_smarty_tpl->tpl_vars['confirmation']->value) {?>
			<p class="confirmation">
				<?php echo $_smarty_tpl->tpl_vars['confirmation']->value;?>

			</p>
		<?php }?>
		<!-- right infos-->  
		<div id="pb-right-column" class="col-xs-12 col-sm-4 col-md-5">
			<!-- product img-->       
			<div class="image_container"> 
			<div id="image-block" class="clearfix">
				<?php if ($_smarty_tpl->tpl_vars['product']->value->on_sale) {?>
					<span class="sale-box">
						<span class="sale-label"><?php echo smartyTranslate(array('s'=>'Sale!'),$_smarty_tpl);?>
</span>
					</span>
				<?php } elseif ($_smarty_tpl->tpl_vars['product']->value->specificPrice&&$_smarty_tpl->tpl_vars['product']->value->specificPrice['reduction']&&$_smarty_tpl->tpl_vars['productPriceWithoutReduction']->value>$_smarty_tpl->tpl_vars['productPrice']->value) {?>
					<span class="discount"><?php echo smartyTranslate(array('s'=>'Reduced price!'),$_smarty_tpl);?>
</span>
				<?php }?> 
				
				<?php if ($_smarty_tpl->tpl_vars['have_image']->value) {?>
					<span id="view_full_size">
						<?php if ($_smarty_tpl->tpl_vars['jqZoomEnabled']->value&&$_smarty_tpl->tpl_vars['have_image']->value&&!$_smarty_tpl->tpl_vars['content_only']->value) {?>
							<a class="jqzoom" title="<?php if (!empty($_smarty_tpl->tpl_vars['cover']->value['legend'])) {?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['cover']->value['legend'], ENT_QUOTES, 'UTF-8', true);?>
<?php } else { ?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value->name, ENT_QUOTES, 'UTF-8', true);?>
<?php }?>" rel="gal1" href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value->getImageLink($_smarty_tpl->tpl_vars['product']->value->link_rewrite,$_smarty_tpl->tpl_vars['cover']->value['id_image'],('thickbox_').($_smarty_tpl->tpl_vars['cookie']->value->img_name)), ENT_QUOTES, 'UTF-8', true);?>
" itemprop="url">
								<img itemprop="image" src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value->getImageLink($_smarty_tpl->tpl_vars['product']->value->link_rewrite,$_smarty_tpl->tpl_vars['cover']->value['id_image'],('large_').($_smarty_tpl->tpl_vars['cookie']->value->img_name)), ENT_QUOTES, 'UTF-8', true);?>
" title="<?php if (!empty($_smarty_tpl->tpl_vars['cover']->value['legend'])) {?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['cover']->value['legend'], ENT_QUOTES, 'UTF-8', true);?>
<?php } else { ?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value->name, ENT_QUOTES, 'UTF-8', true);?>
<?php }?>" alt="<?php if (!empty($_smarty_tpl->tpl_vars['cover']->value['legend'])) {?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['cover']->value['legend'], ENT_QUOTES, 'UTF-8', true);?>
<?php } else { ?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value->name, ENT_QUOTES, 'UTF-8', true);?>
<?php }?>"/>
							</a>
						<?php } else { ?>
							<img id="bigpic" itemprop="image" src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value->getImageLink($_smarty_tpl->tpl_vars['product']->value->link_rewrite,$_smarty_tpl->tpl_vars['cover']->value['id_image'],('large_').($_smarty_tpl->tpl_vars['cookie']->value->img_name)), ENT_QUOTES, 'UTF-8', true);?>
" title="<?php if (!empty($_smarty_tpl->tpl_vars['cover']->value['legend'])) {?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['cover']->value['legend'], ENT_QUOTES, 'UTF-8', true);?>
<?php } else { ?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value->name, ENT_QUOTES, 'UTF-8', true);?>
<?php }?>" alt="<?php if (!empty($_smarty_tpl->tpl_vars['cover']->value['legend'])) {?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['cover']->value['legend'], ENT_QUOTES, 'UTF-8', true);?>
<?php } else { ?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value->name, ENT_QUOTES, 'UTF-8', true);?>
<?php }?>" width="<?php echo $_smarty_tpl->tpl_vars['largeSize']->value['width'];?>
" height="<?php echo $_smarty_tpl->tpl_vars['largeSize']->value['height'];?>
"/>
							<?php if (!$_smarty_tpl->tpl_vars['content_only']->value) {?>
								<span class="span_link no-print"><?php echo smartyTranslate(array('s'=>'View larger'),$_smarty_tpl);?>
</span>
							<?php }?>
						<?php }?>
					</span>
				<?php } else { ?>
					<span id="view_full_size">
						<img itemprop="image" src="<?php echo $_smarty_tpl->tpl_vars['img_prod_dir']->value;?>
<?php echo $_smarty_tpl->tpl_vars['lang_iso']->value;?>
-default-large_<?php echo $_smarty_tpl->tpl_vars['cookie']->value->img_name;?>
.jpg" id="bigpic" alt="" title="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value->name, ENT_QUOTES, 'UTF-8', true);?>
" width="<?php echo $_smarty_tpl->tpl_vars['largeSize']->value['width'];?>
" height="<?php echo $_smarty_tpl->tpl_vars['largeSize']->value['height'];?>
"/>
						<?php if (!$_smarty_tpl->tpl_vars['content_only']->value) {?>
							<span class="span_link">
								<?php echo smartyTranslate(array('s'=>'View larger'),$_smarty_tpl);?>

							</span>
						<?php }?>
					</span>
				<?php }?>
			</div> <!-- end image-block -->

			<?php if (isset($_smarty_tpl->tpl_vars['images']->value)&&count($_smarty_tpl->tpl_vars['images']->value)>0) {?>
				<!-- thumbnails -->
				<div id="views_block" class="clearfix <?php if (isset($_smarty_tpl->tpl_vars['images']->value)&&count($_smarty_tpl->tpl_vars['images']->value)<2) {?>hidden<?php }?>">
					<?php if (isset($_smarty_tpl->tpl_vars['images']->value)&&count($_smarty_tpl->tpl_vars['images']->value)>3) {?>
						<span class="view_scroll_spacer">
							<a id="view_scroll_left" class="btn" title="<?php echo smartyTranslate(array('s'=>'Other views'),$_smarty_tpl);?>
" href="javascript:{}">
								<?php echo smartyTranslate(array('s'=>'Previous'),$_smarty_tpl);?>

							</a>
						</span>
					<?php }?>
					<div id="thumbs_list">
						<ul id="thumbs_list_frame">
						<?php if (isset($_smarty_tpl->tpl_vars['images']->value)) {?>
							<?php  $_smarty_tpl->tpl_vars['image'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['image']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['images']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['image']->total= $_smarty_tpl->_count($_from);
 $_smarty_tpl->tpl_vars['image']->iteration=0;
foreach ($_from as $_smarty_tpl->tpl_vars['image']->key => $_smarty_tpl->tpl_vars['image']->value) {
$_smarty_tpl->tpl_vars['image']->_loop = true;
 $_smarty_tpl->tpl_vars['image']->iteration++;
 $_smarty_tpl->tpl_vars['image']->last = $_smarty_tpl->tpl_vars['image']->iteration === $_smarty_tpl->tpl_vars['image']->total;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['thumbnails']['last'] = $_smarty_tpl->tpl_vars['image']->last;
?>
								<?php $_smarty_tpl->tpl_vars['imageIds'] = new Smarty_variable(((string)$_smarty_tpl->tpl_vars['product']->value->id)."-".((string)$_smarty_tpl->tpl_vars['image']->value['id_image']), null, 0);?>
								<?php if (!empty($_smarty_tpl->tpl_vars['image']->value['legend'])) {?>
									<?php $_smarty_tpl->tpl_vars['imageTitle'] = new Smarty_variable(htmlspecialchars($_smarty_tpl->tpl_vars['image']->value['legend'], ENT_QUOTES, 'UTF-8', true), null, 0);?>
								<?php } else { ?>
									<?php $_smarty_tpl->tpl_vars['imageTitle'] = new Smarty_variable(htmlspecialchars($_smarty_tpl->tpl_vars['product']->value->name, ENT_QUOTES, 'UTF-8', true), null, 0);?>
								<?php }?>
								<li id="thumbnail_<?php echo $_smarty_tpl->tpl_vars['image']->value['id_image'];?>
"<?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['thumbnails']['last']) {?> class="last"<?php }?>>
									<a 
										<?php if ($_smarty_tpl->tpl_vars['jqZoomEnabled']->value&&$_smarty_tpl->tpl_vars['have_image']->value&&!$_smarty_tpl->tpl_vars['content_only']->value) {?>
											href="javascript:void(0);"
											rel="{gallery: 'gal1', smallimage: '<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value->getImageLink($_smarty_tpl->tpl_vars['product']->value->link_rewrite,$_smarty_tpl->tpl_vars['imageIds']->value,('large_').($_smarty_tpl->tpl_vars['cookie']->value->img_name)), ENT_QUOTES, 'UTF-8', true);?>
',largeimage: '<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value->getImageLink($_smarty_tpl->tpl_vars['product']->value->link_rewrite,$_smarty_tpl->tpl_vars['imageIds']->value,('thickbox_').($_smarty_tpl->tpl_vars['cookie']->value->img_name)), ENT_QUOTES, 'UTF-8', true);?>
'}"
										<?php } else { ?>
											href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value->getImageLink($_smarty_tpl->tpl_vars['product']->value->link_rewrite,$_smarty_tpl->tpl_vars['imageIds']->value,('thickbox_').($_smarty_tpl->tpl_vars['cookie']->value->img_name)), ENT_QUOTES, 'UTF-8', true);?>
"
											data-fancybox-group="other-views"
											class="thickbox<?php if ($_smarty_tpl->tpl_vars['image']->value['id_image']==$_smarty_tpl->tpl_vars['cover']->value['id_image']) {?> shown<?php }?>"
										<?php }?>
										title="<?php echo $_smarty_tpl->tpl_vars['imageTitle']->value;?>
">
										<img
											class="img-responsive"
											id="thumb_<?php echo $_smarty_tpl->tpl_vars['image']->value['id_image'];?>
"
											src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value->getImageLink($_smarty_tpl->tpl_vars['product']->value->link_rewrite,$_smarty_tpl->tpl_vars['imageIds']->value,('medium_').($_smarty_tpl->tpl_vars['cookie']->value->img_name)), ENT_QUOTES, 'UTF-8', true);?>
"
											alt="<?php echo $_smarty_tpl->tpl_vars['imageTitle']->value;?>
"
											title="<?php echo $_smarty_tpl->tpl_vars['imageTitle']->value;?>
"
											height="<?php echo $_smarty_tpl->tpl_vars['mediumSize']->value['height'];?>
"
											width="<?php echo $_smarty_tpl->tpl_vars['mediumSize']->value['width'];?>
"
											itemprop="image" />
									</a>
								</li>
							<?php } ?>
						<?php }?>
						</ul>
					</div> <!-- end thumbs_list -->
					<?php if (isset($_smarty_tpl->tpl_vars['images']->value)&&count($_smarty_tpl->tpl_vars['images']->value)>3) {?>
						<a id="view_scroll_right" class="btn" title="<?php echo smartyTranslate(array('s'=>'Other views'),$_smarty_tpl);?>
" href="javascript:{}">
							<?php echo smartyTranslate(array('s'=>'Next'),$_smarty_tpl);?>

						</a>
					<?php }?>
				</div> <!-- end views-block -->
				<!-- end thumbnails -->
			<?php }?>

			<?php if (isset($_smarty_tpl->tpl_vars['images']->value)&&count($_smarty_tpl->tpl_vars['images']->value)>1) {?>
				<p class="resetimg clear">
					<span id="wrapResetImages" style="display: none;">
						<a id="resetImages" href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value->getProductLink($_smarty_tpl->tpl_vars['product']->value), ENT_QUOTES, 'UTF-8', true);?>
">
							<i class="icon-repeat"></i>
							<?php echo smartyTranslate(array('s'=>'Display all pictures'),$_smarty_tpl);?>

						</a>
					</span>
				</p>
			<?php }?>			
		</div><!-- end image_column -->
		<?php if (!$_smarty_tpl->tpl_vars['content_only']->value) {?>
		<?php if (isset($_smarty_tpl->tpl_vars['HOOK_PRODUCT_FOOTER']->value)&&$_smarty_tpl->tpl_vars['HOOK_PRODUCT_FOOTER']->value) {?><?php echo $_smarty_tpl->tpl_vars['HOOK_PRODUCT_FOOTER']->value;?>
<?php }?>
		<?php }?>
		</div> <!-- end pb-right-column -->
		<!-- end right infos--> 

		<!-- left infos -->
		<div id="pb-left-column" class="col-xs-12 col-sm-4">
			<?php if ($_smarty_tpl->tpl_vars['product']->value->online_only) {?>
				<p class="online_only"><?php echo smartyTranslate(array('s'=>'Online only'),$_smarty_tpl);?>
</p>
			<?php }?>
	
			<h1 itemprop="name"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value->name, ENT_QUOTES, 'UTF-8', true);?>
</h1>
			<?php if (isset($_smarty_tpl->tpl_vars['comments']->value)&&($_smarty_tpl->tpl_vars['theme_settings']->value['product_rating']==1)) {?>
				<?php $_smarty_tpl->tpl_vars['totalGrade'] = new Smarty_variable(0, null, 0);?>
				<?php $_smarty_tpl->tpl_vars['totalVotes'] = new Smarty_variable(0, null, 0);?>
				<?php $_smarty_tpl->tpl_vars['productGrade'] = new Smarty_variable(0, null, 0);?>
				<?php  $_smarty_tpl->tpl_vars['comment'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['comment']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['comments']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['comment']->key => $_smarty_tpl->tpl_vars['comment']->value) {
$_smarty_tpl->tpl_vars['comment']->_loop = true;
?>
					<?php if ($_smarty_tpl->tpl_vars['comment']->value['content']) {?>
					<?php $_smarty_tpl->tpl_vars['totalGrade'] = new Smarty_variable($_smarty_tpl->tpl_vars['totalGrade']->value+$_smarty_tpl->tpl_vars['comment']->value['grade'], null, 0);?>
					<?php $_smarty_tpl->tpl_vars['totalVotes'] = new Smarty_variable($_smarty_tpl->tpl_vars['totalVotes']->value+1, null, 0);?>					
					<?php }?>
				<?php } ?>
				<?php if ($_smarty_tpl->tpl_vars['totalVotes']->value>0) {?>
					<?php $_smarty_tpl->tpl_vars['productGrade'] = new Smarty_variable($_smarty_tpl->tpl_vars['totalGrade']->value/$_smarty_tpl->tpl_vars['totalVotes']->value, null, 0);?>
				<?php } else { ?>
					<?php $_smarty_tpl->tpl_vars['productGrade'] = new Smarty_variable(0, null, 0);?>
				<?php }?>
				<div class="comment" id="product_comment">
					<div class="star_content clearfix"itemprop="aggregateRating" itemscope="" itemtype="http://schema.org/AggregateRating">	
					<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']["i"])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']["i"]);
$_smarty_tpl->tpl_vars['smarty']->value['section']["i"]['name'] = "i";
$_smarty_tpl->tpl_vars['smarty']->value['section']["i"]['start'] = (int) 0;
$_smarty_tpl->tpl_vars['smarty']->value['section']["i"]['loop'] = is_array($_loop=5) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']["i"]['step'] = ((int) 1) == 0 ? 1 : (int) 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']["i"]['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']["i"]['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["i"]['loop'];
if ($_smarty_tpl->tpl_vars['smarty']->value['section']["i"]['start'] < 0)
    $_smarty_tpl->tpl_vars['smarty']->value['section']["i"]['start'] = max($_smarty_tpl->tpl_vars['smarty']->value['section']["i"]['step'] > 0 ? 0 : -1, $_smarty_tpl->tpl_vars['smarty']->value['section']["i"]['loop'] + $_smarty_tpl->tpl_vars['smarty']->value['section']["i"]['start']);
else
    $_smarty_tpl->tpl_vars['smarty']->value['section']["i"]['start'] = min($_smarty_tpl->tpl_vars['smarty']->value['section']["i"]['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']["i"]['step'] > 0 ? $_smarty_tpl->tpl_vars['smarty']->value['section']["i"]['loop'] : $_smarty_tpl->tpl_vars['smarty']->value['section']["i"]['loop']-1);
if ($_smarty_tpl->tpl_vars['smarty']->value['section']["i"]['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']["i"]['total'] = min(ceil(($_smarty_tpl->tpl_vars['smarty']->value['section']["i"]['step'] > 0 ? $_smarty_tpl->tpl_vars['smarty']->value['section']["i"]['loop'] - $_smarty_tpl->tpl_vars['smarty']->value['section']["i"]['start'] : $_smarty_tpl->tpl_vars['smarty']->value['section']["i"]['start']+1)/abs($_smarty_tpl->tpl_vars['smarty']->value['section']["i"]['step'])), $_smarty_tpl->tpl_vars['smarty']->value['section']["i"]['max']);
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']["i"]['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']["i"]['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']["i"]['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']["i"]['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']["i"]['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["i"]['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']["i"]['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']["i"]['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']["i"]['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']["i"]['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']["i"]['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']["i"]['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']["i"]['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["i"]['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["i"]['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["i"]['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']["i"]['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["i"]['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["i"]['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']["i"]['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["i"]['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']["i"]['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']["i"]['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']["i"]['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']["i"]['total']);
?>
						<?php if ($_smarty_tpl->tpl_vars['productGrade']->value<=$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']) {?>
							<div class="star dib"><svg class="svgic svgic-star"><use xlink:href="#si-star"></use></svg></div>
							<?php $_smarty_tpl->tpl_vars['rt'] = new Smarty_variable($_smarty_tpl->getVariable('smarty')->value['section']['i']['index'], null, 0);?>
						<?php } else { ?>
							<div class="star dib star_on"><svg class="svgic svgic-star"><use xlink:href="#si-star"></use></svg></div>
						<?php }?>
					<?php endfor; endif; ?>
						<span itemprop="ratingValue" class="hidden"><?php echo $_smarty_tpl->tpl_vars['productGrade']->value;?>
</span>
						<span itemprop="ratingcount" class="hidden"><?php echo $_smarty_tpl->tpl_vars['totalVotes']->value;?>
</span>				
					</div>
				</div>		
			<?php }?>
			<p id="product_reference"<?php if (isset($_smarty_tpl->tpl_vars['groups']->value)||!$_smarty_tpl->tpl_vars['product']->value->reference) {?> style="display: none;"<?php }?>>
				<label><?php echo smartyTranslate(array('s'=>'Model'),$_smarty_tpl);?>
: </label>
				<span class="editable" itemprop="sku"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value->reference, ENT_QUOTES, 'UTF-8', true);?>
</span>
			</p>
			<?php if (isset($_smarty_tpl->tpl_vars['product']->value->manufacturer_name)&&$_smarty_tpl->tpl_vars['product']->value->manufacturer_name!='') {?>
			<p class="product-manufacturer">
				 <span class="value_name"><?php echo smartyTranslate(array('s'=>'Manufacturer:'),$_smarty_tpl);?>
</span> <a href="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['link']->value->getmanufacturerLink($_smarty_tpl->tpl_vars['product']->value->id_manufacturer), ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" itemprop="brand" itemscope itemtype="http://schema.org/Organization"><span itemprop="name"><?php echo $_smarty_tpl->tpl_vars['product']->value->manufacturer_name;?>
</span></a>
			</p>
			<?php }?>
			<?php $_smarty_tpl->_capture_stack[0][] = array('condition', null, null); ob_start(); ?>
				<?php if ($_smarty_tpl->tpl_vars['product']->value->condition=='new') {?><?php echo smartyTranslate(array('s'=>'New'),$_smarty_tpl);?>

				<?php } elseif ($_smarty_tpl->tpl_vars['product']->value->condition=='used') {?><?php echo smartyTranslate(array('s'=>'Used'),$_smarty_tpl);?>

				<?php } elseif ($_smarty_tpl->tpl_vars['product']->value->condition=='refurbished') {?><?php echo smartyTranslate(array('s'=>'Refurbished'),$_smarty_tpl);?>

				<?php }?>
			<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>
			<p id="product_condition"<?php if (!$_smarty_tpl->tpl_vars['product']->value->condition) {?> style="display: none;"<?php }?>>
				<!--<span class="value_name"><?php echo smartyTranslate(array('s'=>'Condition'),$_smarty_tpl);?>
: </spam>
				<span class="editable"><?php echo htmlspecialchars(Smarty::$_smarty_vars['capture']['condition'], ENT_QUOTES, 'UTF-8', true);?>
</span>
			</p>-->			

			<p id="availability_statut">
				<span id="availability_label" class="value_name"><?php echo smartyTranslate(array('s'=>'Availability:'),$_smarty_tpl);?>
</span>
				<span id="availability_value"<?php if ($_smarty_tpl->tpl_vars['product']->value->quantity<=0) {?> class="warning_inline"<?php }?>>
				<?php if ($_smarty_tpl->tpl_vars['product']->value->quantity<=0) {?><?php if ($_smarty_tpl->tpl_vars['allow_oosp']->value) {?><?php echo $_smarty_tpl->tpl_vars['product']->value->available_later;?>
<?php } else { ?><?php echo smartyTranslate(array('s'=>'This product is no longer in stock'),$_smarty_tpl);?>
<?php }?><?php } else { ?><?php echo $_smarty_tpl->tpl_vars['product']->value->available_now;?>
<?php }?>
				</span>
				<!-- number of item in stock -->
				<?php if (($_smarty_tpl->tpl_vars['display_qties']->value==1&&!$_smarty_tpl->tpl_vars['PS_CATALOG_MODE']->value&&$_smarty_tpl->tpl_vars['product']->value->available_for_order)) {?>
				<span id="pQuantityAvailable"<?php if ($_smarty_tpl->tpl_vars['product']->value->quantity<=0) {?> style="display: none;"<?php }?>>
					(<span id="quantityAvailable"><?php echo intval($_smarty_tpl->tpl_vars['product']->value->quantity);?>
</span>
					<span <?php if ($_smarty_tpl->tpl_vars['product']->value->quantity>1) {?> style="display: none;"<?php }?> id="quantityAvailableTxt"><?php echo smartyTranslate(array('s'=>'item in stock'),$_smarty_tpl);?>
</span>
					<span <?php if ($_smarty_tpl->tpl_vars['product']->value->quantity==1) {?> style="display: none;"<?php }?> id="quantityAvailableTxtMultiple"><?php echo smartyTranslate(array('s'=>'items in stock'),$_smarty_tpl);?>
</span>)
				</span>
				<?php }?>
				<?php if ($_smarty_tpl->tpl_vars['PS_STOCK_MANAGEMENT']->value) {?>
					<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0][0]->smartyHook(array('h'=>"displayProductDeliveryTime",'product'=>$_smarty_tpl->tpl_vars['product']->value),$_smarty_tpl);?>

					<span class="warning_inline" id="last_quantities"<?php if (($_smarty_tpl->tpl_vars['product']->value->quantity>$_smarty_tpl->tpl_vars['last_qties']->value||$_smarty_tpl->tpl_vars['product']->value->quantity<=0)||$_smarty_tpl->tpl_vars['allow_oosp']->value||!$_smarty_tpl->tpl_vars['product']->value->available_for_order||$_smarty_tpl->tpl_vars['PS_CATALOG_MODE']->value) {?> style="display: none"<?php }?> ><?php echo smartyTranslate(array('s'=>'Warning: Last items in stock!'),$_smarty_tpl);?>
</span>
				<?php }?>
			</p>
						
			
			<p id="availability_date"<?php if (($_smarty_tpl->tpl_vars['product']->value->quantity>0)||!$_smarty_tpl->tpl_vars['product']->value->available_for_order||$_smarty_tpl->tpl_vars['PS_CATALOG_MODE']->value||!isset($_smarty_tpl->tpl_vars['product']->value->available_date)||$_smarty_tpl->tpl_vars['product']->value->available_date<smarty_modifier_date_format(time(),'%Y-%m-%d')) {?> style="display: none;"<?php }?>>
				<span id="availability_date_label" class="value_name"><?php echo smartyTranslate(array('s'=>'Availability date:'),$_smarty_tpl);?>
</span>
				<span id="availability_date_value"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['dateFormat'][0][0]->dateFormat(array('date'=>$_smarty_tpl->tpl_vars['product']->value->available_date,'full'=>false),$_smarty_tpl);?>
</span>
			</p>

			<?php if ($_smarty_tpl->tpl_vars['product']->value->description_short||count($_smarty_tpl->tpl_vars['packItems']->value)>0) {?>
				<div id="short_description_block">
					<?php if (($_smarty_tpl->tpl_vars['product']->value->description_short)&&($_smarty_tpl->tpl_vars['theme_settings']->value['short_desc']==1)) {?>
						<div id="short_description_content" class="rte align_justify" itemprop="description"><?php echo $_smarty_tpl->tpl_vars['product']->value->description_short;?>
</div>
					<?php }?>

					<!--<?php if (count($_smarty_tpl->tpl_vars['packItems']->value)>0) {?>
						<div class="short_description_pack">
						<h3><?php echo smartyTranslate(array('s'=>'Pack content'),$_smarty_tpl);?>
</h3>
							<?php  $_smarty_tpl->tpl_vars['packItem'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['packItem']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['packItems']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['packItem']->key => $_smarty_tpl->tpl_vars['packItem']->value) {
$_smarty_tpl->tpl_vars['packItem']->_loop = true;
?>
							
							<div class="pack_content">
								<?php echo $_smarty_tpl->tpl_vars['packItem']->value['pack_quantity'];?>
 x <a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value->getProductLink($_smarty_tpl->tpl_vars['packItem']->value['id_product'],$_smarty_tpl->tpl_vars['packItem']->value['link_rewrite'],$_smarty_tpl->tpl_vars['packItem']->value['category']), ENT_QUOTES, 'UTF-8', true);?>
"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['packItem']->value['name'], ENT_QUOTES, 'UTF-8', true);?>
</a>
								<p><?php echo $_smarty_tpl->tpl_vars['packItem']->value['description_short'];?>
</p>
							</div>
							<?php } ?>
						</div>
					<?php }?>-->
				</div> <!-- end short_description_block -->
			<?php }?>
			<?php if (!$_smarty_tpl->tpl_vars['content_only']->value) {?>
				<div class="tab-titles">
					<?php if ($_smarty_tpl->tpl_vars['product']->value->description) {?><h3 class="active-tab" data-title="1"><?php echo smartyTranslate(array('s'=>'More info'),$_smarty_tpl);?>
</h3><?php }?><?php if (isset($_smarty_tpl->tpl_vars['features']->value)&&$_smarty_tpl->tpl_vars['features']->value) {?><h3 data-title="2"><?php echo smartyTranslate(array('s'=>'Data sheet'),$_smarty_tpl);?>
</h3><?php }?><?php if (isset($_smarty_tpl->tpl_vars['accessories']->value)&&$_smarty_tpl->tpl_vars['accessories']->value) {?><h3 data-title="3"><?php echo smartyTranslate(array('s'=>'Accessories'),$_smarty_tpl);?>
</h3><?php }?><?php if ((isset($_smarty_tpl->tpl_vars['quantity_discounts']->value)&&count($_smarty_tpl->tpl_vars['quantity_discounts']->value)>0)) {?><h3 data-title="4"><?php echo smartyTranslate(array('s'=>'Volume discounts'),$_smarty_tpl);?>
</h3><?php }?><?php if (isset($_smarty_tpl->tpl_vars['attachments']->value)&&$_smarty_tpl->tpl_vars['attachments']->value) {?><h3 data-title="5"><?php echo smartyTranslate(array('s'=>'Download'),$_smarty_tpl);?>
</h3><?php }?><?php if (isset($_smarty_tpl->tpl_vars['product']->value)&&$_smarty_tpl->tpl_vars['product']->value->customizable) {?><h3 data-title="6"><?php echo smartyTranslate(array('s'=>'Product customization'),$_smarty_tpl);?>
</h3><?php }?><?php if (isset($_smarty_tpl->tpl_vars['packItems']->value)&&count($_smarty_tpl->tpl_vars['packItems']->value)>0) {?><h3 data-title="7"><?php echo smartyTranslate(array('s'=>'Pack content'),$_smarty_tpl);?>
</h3><?php }?><?php echo $_smarty_tpl->tpl_vars['HOOK_PRODUCT_TAB']->value;?>

				</div>
			
		
				<?php if ($_smarty_tpl->tpl_vars['product']->value->description) {?>
					<!-- More info -->
					<section class="page-product-box active-section" data-section="1">						
						<?php if (isset($_smarty_tpl->tpl_vars['product']->value)&&$_smarty_tpl->tpl_vars['product']->value->description) {?>
							<!-- full description -->
							<div  class="rte"><?php echo $_smarty_tpl->tpl_vars['product']->value->description;?>
</div>
						<?php }?>
					</section>
					<!--end  More info -->
				<?php }?>
				
				
				<?php if (isset($_smarty_tpl->tpl_vars['features']->value)&&$_smarty_tpl->tpl_vars['features']->value) {?>
					<!-- Data sheet -->
					<section class="page-product-box" data-section="2">										
						<table class="table-data-sheet">			
							<?php  $_smarty_tpl->tpl_vars['feature'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['feature']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['features']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['feature']->key => $_smarty_tpl->tpl_vars['feature']->value) {
$_smarty_tpl->tpl_vars['feature']->_loop = true;
?>
							<tr class="<?php echo smarty_function_cycle(array('values'=>"odd,even"),$_smarty_tpl);?>
">
								<?php if (isset($_smarty_tpl->tpl_vars['feature']->value['value'])) {?>			    
								<td><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['feature']->value['name'], ENT_QUOTES, 'UTF-8', true);?>
</td>
								<td><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['feature']->value['value'], ENT_QUOTES, 'UTF-8', true);?>
</td>
								<?php }?>
							</tr>
							<?php } ?>
						</table>
					</section>
					<!--end Data sheet -->
				<?php }?>
								
				<?php if (isset($_smarty_tpl->tpl_vars['accessories']->value)&&$_smarty_tpl->tpl_vars['accessories']->value) {?>
					<!--Accessories -->
					<section class="page-product-box" data-section="3">						
						<div class="block products_block accessories-block clearfix">
							<div class="block_content">
								<ul>
									<?php  $_smarty_tpl->tpl_vars['accessory'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['accessory']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['accessories']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['accessory']->total= $_smarty_tpl->_count($_from);
 $_smarty_tpl->tpl_vars['accessory']->iteration=0;
 $_smarty_tpl->tpl_vars['accessory']->index=-1;
foreach ($_from as $_smarty_tpl->tpl_vars['accessory']->key => $_smarty_tpl->tpl_vars['accessory']->value) {
$_smarty_tpl->tpl_vars['accessory']->_loop = true;
 $_smarty_tpl->tpl_vars['accessory']->iteration++;
 $_smarty_tpl->tpl_vars['accessory']->index++;
 $_smarty_tpl->tpl_vars['accessory']->first = $_smarty_tpl->tpl_vars['accessory']->index === 0;
 $_smarty_tpl->tpl_vars['accessory']->last = $_smarty_tpl->tpl_vars['accessory']->iteration === $_smarty_tpl->tpl_vars['accessory']->total;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['accessories_list']['first'] = $_smarty_tpl->tpl_vars['accessory']->first;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['accessories_list']['last'] = $_smarty_tpl->tpl_vars['accessory']->last;
?>
										<?php if (($_smarty_tpl->tpl_vars['accessory']->value['allow_oosp']||$_smarty_tpl->tpl_vars['accessory']->value['quantity_all_versions']>0||$_smarty_tpl->tpl_vars['accessory']->value['quantity']>0)&&$_smarty_tpl->tpl_vars['accessory']->value['available_for_order']&&!isset($_smarty_tpl->tpl_vars['restricted_country_mode']->value)) {?>
											<?php $_smarty_tpl->tpl_vars['accessoryLink'] = new Smarty_variable($_smarty_tpl->tpl_vars['link']->value->getProductLink($_smarty_tpl->tpl_vars['accessory']->value['id_product'],$_smarty_tpl->tpl_vars['accessory']->value['link_rewrite'],$_smarty_tpl->tpl_vars['accessory']->value['category']), null, 0);?>
											<li class="item product-box ajax_block_product<?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['accessories_list']['first']) {?> first_item<?php } elseif ($_smarty_tpl->getVariable('smarty')->value['foreach']['accessories_list']['last']) {?> last_item<?php } else { ?> item<?php }?> product_accessories_description">
												<div class="product_desc">
													<a 
														href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['accessoryLink']->value, ENT_QUOTES, 'UTF-8', true);?>
"
														title="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['accessory']->value['legend'], ENT_QUOTES, 'UTF-8', true);?>
"
														class="product-image product_image">
														<img
															class="lazyOwl"
															src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value->getImageLink($_smarty_tpl->tpl_vars['accessory']->value['link_rewrite'],$_smarty_tpl->tpl_vars['accessory']->value['id_image'],('home_').($_smarty_tpl->tpl_vars['cookie']->value->img_name)), ENT_QUOTES, 'UTF-8', true);?>
"
															alt="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['accessory']->value['legend'], ENT_QUOTES, 'UTF-8', true);?>
"
															width="<?php echo $_smarty_tpl->tpl_vars['homeSize']->value['width'];?>
"
															height="<?php echo $_smarty_tpl->tpl_vars['homeSize']->value['height'];?>
"
															/>
													</a>
												</div>
												<div class="s_title_block product_accessories_price">
													<h5>
														<a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['accessoryLink']->value, ENT_QUOTES, 'UTF-8', true);?>
">
															<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['truncate'][0][0]->smarty_modifier_truncate($_smarty_tpl->tpl_vars['accessory']->value['name'],18,'...',true), ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>

														</a>
													</h5>
													<?php if ($_smarty_tpl->tpl_vars['accessory']->value['show_price']&&!isset($_smarty_tpl->tpl_vars['restricted_country_mode']->value)&&!$_smarty_tpl->tpl_vars['PS_CATALOG_MODE']->value) {?>
													<span class="price">
														<?php if ($_smarty_tpl->tpl_vars['priceDisplay']->value!=1) {?>
														<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['displayWtPrice'][0][0]->displayWtPrice(array('p'=>$_smarty_tpl->tpl_vars['accessory']->value['price']),$_smarty_tpl);?>
<?php } else { ?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['displayWtPrice'][0][0]->displayWtPrice(array('p'=>$_smarty_tpl->tpl_vars['accessory']->value['price_tax_exc']),$_smarty_tpl);?>

														<?php }?>
													</span>
													<?php }?>
												</div>
												<div class="clearfix" style="margin-top:5px">
													<?php if (!$_smarty_tpl->tpl_vars['PS_CATALOG_MODE']->value&&($_smarty_tpl->tpl_vars['accessory']->value['allow_oosp']||$_smarty_tpl->tpl_vars['accessory']->value['quantity']>0)) {?>
														<div>
															<div>
																<div>
																	<a
																		class="exclusive button ajax_add_to_cart_button"
																		href="<?php ob_start();?><?php echo intval($_smarty_tpl->tpl_vars['accessory']->value['id_product']);?>
<?php $_tmp7=ob_get_clean();?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value->getPageLink('cart',true,null,"qty=1&amp;id_product=".$_tmp7."&amp;token=".((string)$_smarty_tpl->tpl_vars['static_token']->value)."&amp;add"), ENT_QUOTES, 'UTF-8', true);?>
"
																		data-id-product="<?php echo intval($_smarty_tpl->tpl_vars['accessory']->value['id_product']);?>
"
																		title="<?php echo smartyTranslate(array('s'=>'Add to cart'),$_smarty_tpl);?>
">
																		<span><?php echo smartyTranslate(array('s'=>'Add to cart'),$_smarty_tpl);?>
</span>
																	</a>
																</div>
															</div>
														</div>
													<?php }?>
												</div>
											</li>
										<?php }?>
									<?php } ?>
								</ul>
							</div>
						</div>
					</section>
					<!--end Accessories -->
				<?php }?>

				<?php if ((isset($_smarty_tpl->tpl_vars['quantity_discounts']->value)&&count($_smarty_tpl->tpl_vars['quantity_discounts']->value)>0)) {?>
					<!-- quantity discount -->
					<section class="page-product-box" data-section="4">
						<div id="quantityDiscount">
							<table class="std table-produst-discounts">
								<thead>
									<tr>
										<th><?php echo smartyTranslate(array('s'=>'Quantity'),$_smarty_tpl);?>
</th>
										<th><?php if ($_smarty_tpl->tpl_vars['display_discount_price']->value) {?><?php echo smartyTranslate(array('s'=>'Price'),$_smarty_tpl);?>
<?php } else { ?><?php echo smartyTranslate(array('s'=>'Discount'),$_smarty_tpl);?>
<?php }?></th>
										<th><?php echo smartyTranslate(array('s'=>'You Save'),$_smarty_tpl);?>
</th>
									</tr>
								</thead>
								<tbody>
									<?php  $_smarty_tpl->tpl_vars['quantity_discount'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['quantity_discount']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['quantity_discounts']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['quantity_discount']->key => $_smarty_tpl->tpl_vars['quantity_discount']->value) {
$_smarty_tpl->tpl_vars['quantity_discount']->_loop = true;
?>
									<tr id="quantityDiscount_<?php echo $_smarty_tpl->tpl_vars['quantity_discount']->value['id_product_attribute'];?>
" class="quantityDiscount_<?php echo $_smarty_tpl->tpl_vars['quantity_discount']->value['id_product_attribute'];?>
">
									<td><?php echo intval($_smarty_tpl->tpl_vars['quantity_discount']->value['quantity']);?>
</td>             
										
										<td>
											<?php if ($_smarty_tpl->tpl_vars['quantity_discount']->value['price']>=0||$_smarty_tpl->tpl_vars['quantity_discount']->value['reduction_type']=='amount') {?>
												<?php if ($_smarty_tpl->tpl_vars['display_discount_price']->value) {?>
													<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['convertPrice'][0][0]->convertPrice(array('price'=>$_smarty_tpl->tpl_vars['productPrice']->value-floatval($_smarty_tpl->tpl_vars['quantity_discount']->value['real_value'])),$_smarty_tpl);?>

												<?php } else { ?>
													<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['convertPrice'][0][0]->convertPrice(array('price'=>floatval($_smarty_tpl->tpl_vars['quantity_discount']->value['real_value'])),$_smarty_tpl);?>

												<?php }?>
											<?php } else { ?>
												<?php if ($_smarty_tpl->tpl_vars['display_discount_price']->value) {?>
													<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['convertPrice'][0][0]->convertPrice(array('price'=>$_smarty_tpl->tpl_vars['productPrice']->value-floatval(($_smarty_tpl->tpl_vars['productPrice']->value*$_smarty_tpl->tpl_vars['quantity_discount']->value['reduction']))),$_smarty_tpl);?>

												<?php } else { ?>
													<?php echo floatval($_smarty_tpl->tpl_vars['quantity_discount']->value['real_value']);?>
%
												<?php }?>
											<?php }?>
										</td>
										<td>
											<span><?php echo smartyTranslate(array('s'=>'Up to'),$_smarty_tpl);?>
</span>
											<?php if ($_smarty_tpl->tpl_vars['quantity_discount']->value['price']>=0||$_smarty_tpl->tpl_vars['quantity_discount']->value['reduction_type']=='amount') {?>
												<?php $_smarty_tpl->tpl_vars['discountPrice'] = new Smarty_variable($_smarty_tpl->tpl_vars['productPrice']->value-floatval($_smarty_tpl->tpl_vars['quantity_discount']->value['real_value']), null, 0);?>
											<?php } else { ?>
												<?php $_smarty_tpl->tpl_vars['discountPrice'] = new Smarty_variable($_smarty_tpl->tpl_vars['productPrice']->value-floatval(($_smarty_tpl->tpl_vars['productPrice']->value*$_smarty_tpl->tpl_vars['quantity_discount']->value['reduction'])), null, 0);?>
											<?php }?>
											<?php $_smarty_tpl->tpl_vars['discountPrice'] = new Smarty_variable($_smarty_tpl->tpl_vars['discountPrice']->value*$_smarty_tpl->tpl_vars['quantity_discount']->value['quantity'], null, 0);?>
											<?php $_smarty_tpl->tpl_vars['qtyProductPrice'] = new Smarty_variable($_smarty_tpl->tpl_vars['productPrice']->value*$_smarty_tpl->tpl_vars['quantity_discount']->value['quantity'], null, 0);?>
											<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['convertPrice'][0][0]->convertPrice(array('price'=>$_smarty_tpl->tpl_vars['qtyProductPrice']->value-$_smarty_tpl->tpl_vars['discountPrice']->value),$_smarty_tpl);?>

										</td>
									</tr>
									<?php } ?>
								</tbody>
							</table>
						</div>
					</section>
				<?php }?>
				

				<!-- description & features -->
				<?php if ((isset($_smarty_tpl->tpl_vars['product']->value)&&$_smarty_tpl->tpl_vars['product']->value->description)||(isset($_smarty_tpl->tpl_vars['features']->value)&&$_smarty_tpl->tpl_vars['features']->value)||(isset($_smarty_tpl->tpl_vars['accessories']->value)&&$_smarty_tpl->tpl_vars['accessories']->value)||(isset($_smarty_tpl->tpl_vars['HOOK_PRODUCT_TAB']->value)&&$_smarty_tpl->tpl_vars['HOOK_PRODUCT_TAB']->value)||(isset($_smarty_tpl->tpl_vars['attachments']->value)&&$_smarty_tpl->tpl_vars['attachments']->value)||isset($_smarty_tpl->tpl_vars['product']->value)&&$_smarty_tpl->tpl_vars['product']->value->customizable) {?>

					<?php if (isset($_smarty_tpl->tpl_vars['attachments']->value)&&$_smarty_tpl->tpl_vars['attachments']->value) {?>
					<!--Download -->
					<section class="page-product-box" data-section="5">
						<?php  $_smarty_tpl->tpl_vars['attachment'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['attachment']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['attachments']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['attachment']->total= $_smarty_tpl->_count($_from);
 $_smarty_tpl->tpl_vars['attachment']->iteration=0;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['attachements']['iteration']=0;
foreach ($_from as $_smarty_tpl->tpl_vars['attachment']->key => $_smarty_tpl->tpl_vars['attachment']->value) {
$_smarty_tpl->tpl_vars['attachment']->_loop = true;
 $_smarty_tpl->tpl_vars['attachment']->iteration++;
 $_smarty_tpl->tpl_vars['attachment']->last = $_smarty_tpl->tpl_vars['attachment']->iteration === $_smarty_tpl->tpl_vars['attachment']->total;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['attachements']['iteration']++;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['attachements']['last'] = $_smarty_tpl->tpl_vars['attachment']->last;
?>
							<?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['attachements']['iteration']%3==1) {?><div class="row"><?php }?>
								<div class="col-lg-4">
									<h4><a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value->getPageLink('attachment',true,null,"id_attachment=".((string)$_smarty_tpl->tpl_vars['attachment']->value['id_attachment'])), ENT_QUOTES, 'UTF-8', true);?>
"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['attachment']->value['name'], ENT_QUOTES, 'UTF-8', true);?>
</a></h4>
									<p class="text-muted"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['attachment']->value['description'], ENT_QUOTES, 'UTF-8', true);?>
</p>
									<a class="btn btn-default btn-block" href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value->getPageLink('attachment',true,null,"id_attachment=".((string)$_smarty_tpl->tpl_vars['attachment']->value['id_attachment'])), ENT_QUOTES, 'UTF-8', true);?>
">
										<i class="icon-download"></i>
										<?php echo smartyTranslate(array('s'=>"Download"),$_smarty_tpl);?>
 (<?php echo Tools::formatBytes($_smarty_tpl->tpl_vars['attachment']->value['file_size'],2);?>
)
									</a>
									<hr>
								</div>
							<?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['attachements']['iteration']%3==0||$_smarty_tpl->getVariable('smarty')->value['foreach']['attachements']['last']) {?></div><?php }?>
						<?php } ?>
					</section>
					<!--end Download -->
					<?php }?>

					<?php if (isset($_smarty_tpl->tpl_vars['product']->value)&&$_smarty_tpl->tpl_vars['product']->value->customizable) {?>
					<!--Customization -->
					<section class="page-product-box" data-section="6">
						<!-- Customizable products -->
						<form method="post" action="<?php echo $_smarty_tpl->tpl_vars['customizationFormTarget']->value;?>
" enctype="multipart/form-data" id="customizationForm" class="clearfix">
							<p class="infoCustomizable">
								<?php echo smartyTranslate(array('s'=>'After saving your customized product, remember to add it to your cart.'),$_smarty_tpl);?>

								<?php if ($_smarty_tpl->tpl_vars['product']->value->uploadable_files) {?>
								<br />
								<?php echo smartyTranslate(array('s'=>'Allowed file formats are: GIF, JPG, PNG'),$_smarty_tpl);?>
<?php }?>
							</p>
							<?php if (intval($_smarty_tpl->tpl_vars['product']->value->uploadable_files)) {?>
								<div class="customizableProductsFile">
									<h5 class="product-heading-h5"><?php echo smartyTranslate(array('s'=>'Pictures'),$_smarty_tpl);?>
</h5>
									<ul id="uploadable_files" class="clearfix">
										<?php echo smarty_function_counter(array('start'=>0,'assign'=>'customizationField'),$_smarty_tpl);?>

										<?php  $_smarty_tpl->tpl_vars['field'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['field']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['customizationFields']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['field']->key => $_smarty_tpl->tpl_vars['field']->value) {
$_smarty_tpl->tpl_vars['field']->_loop = true;
?>
											<?php if ($_smarty_tpl->tpl_vars['field']->value['type']==0) {?>
												<li class="customizationUploadLine<?php if ($_smarty_tpl->tpl_vars['field']->value['required']) {?> required<?php }?>"><?php $_smarty_tpl->tpl_vars['key'] = new Smarty_variable(((('pictures_').($_smarty_tpl->tpl_vars['product']->value->id)).('_')).($_smarty_tpl->tpl_vars['field']->value['id_customization_field']), null, 0);?>
													<?php if (isset($_smarty_tpl->tpl_vars['pictures']->value[$_smarty_tpl->tpl_vars['key']->value])) {?>
														<div class="customizationUploadBrowse">
															<img src="<?php echo $_smarty_tpl->tpl_vars['pic_dir']->value;?>
<?php echo $_smarty_tpl->tpl_vars['pictures']->value[$_smarty_tpl->tpl_vars['key']->value];?>
_small" alt="" />
																<a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value->getProductDeletePictureLink($_smarty_tpl->tpl_vars['product']->value,$_smarty_tpl->tpl_vars['field']->value['id_customization_field']), ENT_QUOTES, 'UTF-8', true);?>
" title="<?php echo smartyTranslate(array('s'=>'Delete'),$_smarty_tpl);?>
" >
																	<img src="<?php echo $_smarty_tpl->tpl_vars['img_dir']->value;?>
icon/delete.gif" alt="<?php echo smartyTranslate(array('s'=>'Delete'),$_smarty_tpl);?>
" class="customization_delete_icon" width="11" height="13" />
																</a>
														</div>
													<?php }?>
													<div class="customizationUploadBrowse form-group">
														<label class="customizationUploadBrowseDescription">
															<?php if (!empty($_smarty_tpl->tpl_vars['field']->value['name'])) {?>
																<?php echo $_smarty_tpl->tpl_vars['field']->value['name'];?>

															<?php } else { ?>
																<?php echo smartyTranslate(array('s'=>'Please select an image file from your computer'),$_smarty_tpl);?>

															<?php }?>
															<?php if ($_smarty_tpl->tpl_vars['field']->value['required']) {?><sup>*</sup><?php }?>
														</label>
														<input type="file" name="file<?php echo $_smarty_tpl->tpl_vars['field']->value['id_customization_field'];?>
" id="img<?php echo $_smarty_tpl->tpl_vars['customizationField']->value;?>
" class="form-control customization_block_input <?php if (isset($_smarty_tpl->tpl_vars['pictures']->value[$_smarty_tpl->tpl_vars['key']->value])) {?>filled<?php }?>" />
													</div>
												</li>
												<?php echo smarty_function_counter(array(),$_smarty_tpl);?>

											<?php }?>
										<?php } ?>
									</ul>
								</div>
							<?php }?>

							<?php if (intval($_smarty_tpl->tpl_vars['product']->value->text_fields)) {?>
								<div class="customizableProductsText">
									<h5 class="product-heading-h5"><?php echo smartyTranslate(array('s'=>'Text'),$_smarty_tpl);?>
</h5>
									<ul id="text_fields">
									<?php echo smarty_function_counter(array('start'=>0,'assign'=>'customizationField'),$_smarty_tpl);?>

									<?php  $_smarty_tpl->tpl_vars['field'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['field']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['customizationFields']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['field']->key => $_smarty_tpl->tpl_vars['field']->value) {
$_smarty_tpl->tpl_vars['field']->_loop = true;
?>
										<?php if ($_smarty_tpl->tpl_vars['field']->value['type']==1) {?>
											<li class="customizationUploadLine<?php if ($_smarty_tpl->tpl_vars['field']->value['required']) {?> required<?php }?>">
												<label for ="textField<?php echo $_smarty_tpl->tpl_vars['customizationField']->value;?>
">
													<?php $_smarty_tpl->tpl_vars['key'] = new Smarty_variable(((('textFields_').($_smarty_tpl->tpl_vars['product']->value->id)).('_')).($_smarty_tpl->tpl_vars['field']->value['id_customization_field']), null, 0);?>
													<?php if (!empty($_smarty_tpl->tpl_vars['field']->value['name'])) {?>
														<?php echo $_smarty_tpl->tpl_vars['field']->value['name'];?>

													<?php }?>
													<?php if ($_smarty_tpl->tpl_vars['field']->value['required']) {?><sup>*</sup><?php }?>
												</label>
												<textarea name="textField<?php echo $_smarty_tpl->tpl_vars['field']->value['id_customization_field'];?>
" class="form-control customization_block_input" id="textField<?php echo $_smarty_tpl->tpl_vars['customizationField']->value;?>
" rows="3" cols="20"><?php if (isset($_smarty_tpl->tpl_vars['textFields']->value[$_smarty_tpl->tpl_vars['key']->value])) {?><?php echo stripslashes($_smarty_tpl->tpl_vars['textFields']->value[$_smarty_tpl->tpl_vars['key']->value]);?>
<?php }?></textarea>
											</li>
											<?php echo smarty_function_counter(array(),$_smarty_tpl);?>

										<?php }?>
									<?php } ?>
									</ul>
								</div>
							<?php }?>

							<p id="customizedDatas">
								<input type="hidden" name="quantityBackup" id="quantityBackup" value="" />
								<input type="hidden" name="submitCustomizedDatas" value="1" />
								<!--<input type="button" class="button btn btn-default button button-small" value="<?php echo smartyTranslate(array('s'=>'Save'),$_smarty_tpl);?>
" onclick="javascript:saveCustomization()" />-->
								<button  class="button btn btn-default button button-small" onclick="javascript:saveCustomization()">
									<span><?php echo smartyTranslate(array('s'=>'Save'),$_smarty_tpl);?>
</span>
								</button>
								<span id="ajax-loader" style="display:none">
									<img src="<?php echo $_smarty_tpl->tpl_vars['img_ps_dir']->value;?>
loader.gif" alt="loader" />
								</span>
							</p>
						</form>
						<p class="clear required"><sup>*</sup> <?php echo smartyTranslate(array('s'=>'required fields'),$_smarty_tpl);?>
</p>	
					</section>
					<!--end Customization -->
					<?php }?>
				<?php }?>

				<?php if (isset($_smarty_tpl->tpl_vars['packItems']->value)&&count($_smarty_tpl->tpl_vars['packItems']->value)>0) {?>
				<section id="blockpack" data-section="7">
						<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tpl_dir']->value)."./product-list.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('products'=>$_smarty_tpl->tpl_vars['packItems']->value), 0);?>

				</section>
				<?php }?>

				<!--HOOK_PRODUCT_TAB -->				
				<?php if (isset($_smarty_tpl->tpl_vars['HOOK_PRODUCT_TAB_CONTENT']->value)&&$_smarty_tpl->tpl_vars['HOOK_PRODUCT_TAB_CONTENT']->value) {?>
						<?php echo $_smarty_tpl->tpl_vars['HOOK_PRODUCT_TAB_CONTENT']->value;?>

				<?php }?>
				<!--end HOOK_PRODUCT_TAB -->

			<?php }?>
			<!-- pb-right-column1-->
			<div id="pb-right-column1" class="col-xs-12 col-sm-4 col-md-3">
				<div class="box-info-product">					
					<div class="product_attributes clearfix">						
						<?php if (isset($_smarty_tpl->tpl_vars['groups']->value)) {?>
							<!-- attributes -->
							<div id="attributes">
								<div class="clear"></div>
								<?php  $_smarty_tpl->tpl_vars['group'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['group']->_loop = false;
 $_smarty_tpl->tpl_vars['id_attribute_group'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['groups']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['group']->key => $_smarty_tpl->tpl_vars['group']->value) {
$_smarty_tpl->tpl_vars['group']->_loop = true;
 $_smarty_tpl->tpl_vars['id_attribute_group']->value = $_smarty_tpl->tpl_vars['group']->key;
?>
									<?php if (count($_smarty_tpl->tpl_vars['group']->value['attributes'])) {?>
										<fieldset class="attribute_fieldset">
											<label class="attribute_label" <?php if ($_smarty_tpl->tpl_vars['group']->value['group_type']!='color'&&$_smarty_tpl->tpl_vars['group']->value['group_type']!='radio') {?>for="group_<?php echo intval($_smarty_tpl->tpl_vars['id_attribute_group']->value);?>
"<?php }?>><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['group']->value['name'], ENT_QUOTES, 'UTF-8', true);?>
 :&nbsp;</label>
											<?php $_smarty_tpl->tpl_vars["groupName"] = new Smarty_variable("group_".((string)$_smarty_tpl->tpl_vars['id_attribute_group']->value), null, 0);?>
											<div class="attribute_list">
												<?php if (($_smarty_tpl->tpl_vars['group']->value['group_type']=='select')) {?>
													<select name="<?php echo $_smarty_tpl->tpl_vars['groupName']->value;?>
" id="group_<?php echo intval($_smarty_tpl->tpl_vars['id_attribute_group']->value);?>
" class="form-control attribute_select" onchange="findCombination();getProductAttribute();">
														<?php  $_smarty_tpl->tpl_vars['group_attribute'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['group_attribute']->_loop = false;
 $_smarty_tpl->tpl_vars['id_attribute'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['group']->value['attributes']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['group_attribute']->key => $_smarty_tpl->tpl_vars['group_attribute']->value) {
$_smarty_tpl->tpl_vars['group_attribute']->_loop = true;
 $_smarty_tpl->tpl_vars['id_attribute']->value = $_smarty_tpl->tpl_vars['group_attribute']->key;
?>
															<option value="<?php echo intval($_smarty_tpl->tpl_vars['id_attribute']->value);?>
"<?php if ((isset($_GET[$_smarty_tpl->tpl_vars['groupName']->value])&&intval($_GET[$_smarty_tpl->tpl_vars['groupName']->value])==$_smarty_tpl->tpl_vars['id_attribute']->value)||$_smarty_tpl->tpl_vars['group']->value['default']==$_smarty_tpl->tpl_vars['id_attribute']->value) {?> selected="selected"<?php }?> title="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['group_attribute']->value, ENT_QUOTES, 'UTF-8', true);?>
"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['group_attribute']->value, ENT_QUOTES, 'UTF-8', true);?>
</option>
														<?php } ?>
													</select>
												<?php } elseif (($_smarty_tpl->tpl_vars['group']->value['group_type']=='color')) {?>
													<?php if ((!$_smarty_tpl->tpl_vars['theme_settings']->value)||($_smarty_tpl->tpl_vars['theme_settings']->value['product_colorpicker']==1)) {?>
													<div id="dd_<?php echo intval($_smarty_tpl->tpl_vars['id_attribute_group']->value);?>
" class="wrapper-dropdown">
														<?php  $_smarty_tpl->tpl_vars['group_attribute'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['group_attribute']->_loop = false;
 $_smarty_tpl->tpl_vars['id_attribute'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['group']->value['attributes']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['group_attribute']->key => $_smarty_tpl->tpl_vars['group_attribute']->value) {
$_smarty_tpl->tpl_vars['group_attribute']->_loop = true;
 $_smarty_tpl->tpl_vars['id_attribute']->value = $_smarty_tpl->tpl_vars['group_attribute']->key;
?>
															<?php if ($_smarty_tpl->tpl_vars['group']->value['default']==$_smarty_tpl->tpl_vars['id_attribute']->value) {?>
															<i id="color_marker" style="background-color: <?php echo $_smarty_tpl->tpl_vars['colors']->value[$_smarty_tpl->tpl_vars['id_attribute']->value]['value'];?>
;">
																<?php if (file_exists((($_smarty_tpl->tpl_vars['col_img_dir']->value).($_smarty_tpl->tpl_vars['id_attribute']->value)).('.jpg'))) {?>
																	<img id="attr_<?php echo $_smarty_tpl->tpl_vars['id_attribute']->value;?>
" class="<?php if ($_smarty_tpl->tpl_vars['group']->value['default']==$_smarty_tpl->tpl_vars['id_attribute']->value) {?>display<?php } else { ?>hidden<?php }?>" src="<?php echo $_smarty_tpl->tpl_vars['img_col_dir']->value;?>
<?php echo $_smarty_tpl->tpl_vars['id_attribute']->value;?>
.jpg" alt="<?php echo $_smarty_tpl->tpl_vars['colors']->value[$_smarty_tpl->tpl_vars['id_attribute']->value]['name'];?>
" width="19" />
																<?php }?>
															</i>
																<span>
																<?php echo $_smarty_tpl->tpl_vars['colors']->value[$_smarty_tpl->tpl_vars['id_attribute']->value]['name'];?>
												
																</span>
															<?php }?>
														<?php } ?>
														<ul id="color_to_pick_list2" class="dropdown">
															<?php $_smarty_tpl->tpl_vars["default_colorpicker"] = new Smarty_variable('', null, 0);?>
															<?php  $_smarty_tpl->tpl_vars['group_attribute'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['group_attribute']->_loop = false;
 $_smarty_tpl->tpl_vars['id_attribute'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['group']->value['attributes']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['group_attribute']->key => $_smarty_tpl->tpl_vars['group_attribute']->value) {
$_smarty_tpl->tpl_vars['group_attribute']->_loop = true;
 $_smarty_tpl->tpl_vars['id_attribute']->value = $_smarty_tpl->tpl_vars['group_attribute']->key;
?>
															<li<?php if ($_smarty_tpl->tpl_vars['group']->value['default']==$_smarty_tpl->tpl_vars['id_attribute']->value) {?> class="selected"<?php }?>>
																<a id="color_<?php echo intval($_smarty_tpl->tpl_vars['id_attribute']->value);?>
" class="color_pick<?php if (($_smarty_tpl->tpl_vars['group']->value['default']==$_smarty_tpl->tpl_vars['id_attribute']->value)) {?> selected<?php }?>" onclick="colorPickerClick(this);getProductAttribute();<?php if (count($_smarty_tpl->tpl_vars['colors']->value)>0) {?>$('#wrapResetImages').show('slow');$('#dd_<?php echo intval($_smarty_tpl->tpl_vars['id_attribute_group']->value);?>
').find('#color_marker').css('background-color', $(this).find('i').css('background-color'));
																	$('#dd_<?php echo intval($_smarty_tpl->tpl_vars['id_attribute_group']->value);?>
').find('#color_marker img').remove();$('#dd_<?php echo intval($_smarty_tpl->tpl_vars['id_attribute_group']->value);?>
').find('#color_to_pick_list2 #attr_<?php echo $_smarty_tpl->tpl_vars['id_attribute']->value;?>
').clone().prependTo('#dd_<?php echo intval($_smarty_tpl->tpl_vars['id_attribute_group']->value);?>
 i#color_marker');<?php }?>">
																	<i style="background: <?php echo $_smarty_tpl->tpl_vars['colors']->value[$_smarty_tpl->tpl_vars['id_attribute']->value]['value'];?>
;">
																		<?php if (file_exists((($_smarty_tpl->tpl_vars['col_img_dir']->value).($_smarty_tpl->tpl_vars['id_attribute']->value)).('.jpg'))) {?>
																			<img id="attr_<?php echo $_smarty_tpl->tpl_vars['id_attribute']->value;?>
" class="<?php if ($_smarty_tpl->tpl_vars['group']->value['default']==$_smarty_tpl->tpl_vars['id_attribute']->value) {?>display<?php } else { ?>hide<?php }?>" src="<?php echo $_smarty_tpl->tpl_vars['img_col_dir']->value;?>
<?php echo $_smarty_tpl->tpl_vars['id_attribute']->value;?>
.jpg" alt="<?php echo $_smarty_tpl->tpl_vars['colors']->value[$_smarty_tpl->tpl_vars['id_attribute']->value]['name'];?>
" width="19" />
																		<?php }?>
																	</i>
																	<?php echo $_smarty_tpl->tpl_vars['colors']->value[$_smarty_tpl->tpl_vars['id_attribute']->value]['name'];?>

																</a>										
															</li>
															<?php if (($_smarty_tpl->tpl_vars['group']->value['default']==$_smarty_tpl->tpl_vars['id_attribute']->value)) {?>
																<?php $_smarty_tpl->tpl_vars['default_colorpicker'] = new Smarty_variable($_smarty_tpl->tpl_vars['id_attribute']->value, null, 0);?>
															<?php }?>
															<?php } ?>
														</ul>
														<div><b></b></div>
														<input type="hidden" class="color_pick_hidden" name="<?php echo $_smarty_tpl->tpl_vars['groupName']->value;?>
" value="<?php echo $_smarty_tpl->tpl_vars['default_colorpicker']->value;?>
" />
													</div>
													<script>
													$(function() {	 
													    var dd = new DropDown( $('#dd_<?php echo intval($_smarty_tpl->tpl_vars['id_attribute_group']->value);?>
') );
													    $(dd).click(function() { 
													    	$('.wrapper-dropdown').removeClass('active');
													    });	 
													});
													</script>													
													<?php } else { ?>
													<ul id="color_to_pick_list" class="clearfix">
														<?php $_smarty_tpl->tpl_vars["default_colorpicker"] = new Smarty_variable('', null, 0);?>
														<?php  $_smarty_tpl->tpl_vars['group_attribute'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['group_attribute']->_loop = false;
 $_smarty_tpl->tpl_vars['id_attribute'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['group']->value['attributes']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['group_attribute']->key => $_smarty_tpl->tpl_vars['group_attribute']->value) {
$_smarty_tpl->tpl_vars['group_attribute']->_loop = true;
 $_smarty_tpl->tpl_vars['id_attribute']->value = $_smarty_tpl->tpl_vars['group_attribute']->key;
?>
															<li<?php if ($_smarty_tpl->tpl_vars['group']->value['default']==$_smarty_tpl->tpl_vars['id_attribute']->value) {?> class="selected"<?php }?>>
																<a id="color_<?php echo intval($_smarty_tpl->tpl_vars['id_attribute']->value);?>
" class="color_pick<?php if (($_smarty_tpl->tpl_vars['group']->value['default']==$_smarty_tpl->tpl_vars['id_attribute']->value)) {?> selected<?php }?>" style="background: <?php echo $_smarty_tpl->tpl_vars['colors']->value[$_smarty_tpl->tpl_vars['id_attribute']->value]['value'];?>
;" title="<?php echo $_smarty_tpl->tpl_vars['colors']->value[$_smarty_tpl->tpl_vars['id_attribute']->value]['name'];?>
">
																	<?php if (file_exists((($_smarty_tpl->tpl_vars['col_img_dir']->value).($_smarty_tpl->tpl_vars['id_attribute']->value)).('.jpg'))) {?>
																		<img src="<?php echo $_smarty_tpl->tpl_vars['img_col_dir']->value;?>
<?php echo $_smarty_tpl->tpl_vars['id_attribute']->value;?>
.jpg" alt="<?php echo $_smarty_tpl->tpl_vars['colors']->value[$_smarty_tpl->tpl_vars['id_attribute']->value]['name'];?>
" width="20" height="20" />
																	<?php }?>
																</a>
															</li>
															<?php if (($_smarty_tpl->tpl_vars['group']->value['default']==$_smarty_tpl->tpl_vars['id_attribute']->value)) {?>
																<?php $_smarty_tpl->tpl_vars['default_colorpicker'] = new Smarty_variable($_smarty_tpl->tpl_vars['id_attribute']->value, null, 0);?>
															<?php }?>
														<?php } ?>
													</ul>
													<input type="hidden" class="color_pick_hidden" name="<?php echo $_smarty_tpl->tpl_vars['groupName']->value;?>
" value="<?php echo $_smarty_tpl->tpl_vars['default_colorpicker']->value;?>
" />
													<?php }?>
												<?php } elseif (($_smarty_tpl->tpl_vars['group']->value['group_type']=='radio')) {?>
													<ul>
														<?php  $_smarty_tpl->tpl_vars['group_attribute'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['group_attribute']->_loop = false;
 $_smarty_tpl->tpl_vars['id_attribute'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['group']->value['attributes']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['group_attribute']->key => $_smarty_tpl->tpl_vars['group_attribute']->value) {
$_smarty_tpl->tpl_vars['group_attribute']->_loop = true;
 $_smarty_tpl->tpl_vars['id_attribute']->value = $_smarty_tpl->tpl_vars['group_attribute']->key;
?>
															<li>
																<input type="radio" class="attribute_radio" name="<?php echo $_smarty_tpl->tpl_vars['groupName']->value;?>
" value="<?php echo $_smarty_tpl->tpl_vars['id_attribute']->value;?>
" <?php if (($_smarty_tpl->tpl_vars['group']->value['default']==$_smarty_tpl->tpl_vars['id_attribute']->value)) {?> checked="checked"<?php }?> onclick="findCombination();getProductAttribute();" />
																<span><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['group_attribute']->value, ENT_QUOTES, 'UTF-8', true);?>
</span>
															</li>
														<?php } ?>
													</ul>
												<?php }?>
											</div> <!-- end attribute_list -->
										</fieldset>
									<?php }?>
								<?php } ?>
							</div> <!-- end attributes -->
							<?php }?>
							<?php if (($_smarty_tpl->tpl_vars['product']->value->show_price&&!isset($_smarty_tpl->tpl_vars['restricted_country_mode']->value))||isset($_smarty_tpl->tpl_vars['groups']->value)||$_smarty_tpl->tpl_vars['product']->value->reference||(isset($_smarty_tpl->tpl_vars['HOOK_PRODUCT_ACTIONS']->value)&&$_smarty_tpl->tpl_vars['HOOK_PRODUCT_ACTIONS']->value)) {?>
							<!-- quantity wanted -->
							<p id="quantity_wanted_p"<?php if ((!$_smarty_tpl->tpl_vars['allow_oosp']->value&&$_smarty_tpl->tpl_vars['product']->value->quantity<=0)||!$_smarty_tpl->tpl_vars['product']->value->available_for_order||$_smarty_tpl->tpl_vars['PS_CATALOG_MODE']->value) {?> style="display: none;"<?php }?>>
								<label><?php echo smartyTranslate(array('s'=>'Quantity:'),$_smarty_tpl);?>
</label>
								<input
									type="text"
									name="qty"
									id="quantity_wanted"
									class="text"
									value="<?php if (isset($_smarty_tpl->tpl_vars['quantityBackup']->value)) {?><?php echo intval($_smarty_tpl->tpl_vars['quantityBackup']->value);?>
<?php } else { ?><?php if ($_smarty_tpl->tpl_vars['product']->value->minimal_quantity>1) {?><?php echo $_smarty_tpl->tpl_vars['product']->value->minimal_quantity;?>
<?php } else { ?>1<?php }?><?php }?>"
									maxlength="3"
									<?php if ($_smarty_tpl->tpl_vars['product']->value->minimal_quantity>1) {?>onkeyup="checkMinimalQuantity(<?php echo $_smarty_tpl->tpl_vars['product']->value->minimal_quantity;?>
);"<?php }?> />
								<a href="#" data-field-qty="qty" class="btn btn-default button-minus product_quantity_down">
									<span><i class="icon-minus"></i></span>
								</a>
								<a href="#"  data-field-qty="qty" class="btn btn-default button-plus product_quantity_up ">
									<span><i class="icon-plus"></i></span>
								</a>
								<span class="clearfix"></span>
							</p>
							<!-- minimal quantity wanted -->
							<p id="minimal_quantity_wanted_p"<?php if ($_smarty_tpl->tpl_vars['product']->value->minimal_quantity<=1||!$_smarty_tpl->tpl_vars['product']->value->available_for_order||$_smarty_tpl->tpl_vars['PS_CATALOG_MODE']->value) {?> style="display: none;"<?php }?>>
								<?php echo smartyTranslate(array('s'=>'This product is not sold individually. You must select at least'),$_smarty_tpl);?>
 <b id="minimal_quantity_label"><?php echo $_smarty_tpl->tpl_vars['product']->value->minimal_quantity;?>
</b> <?php echo smartyTranslate(array('s'=>'quantity for this product.'),$_smarty_tpl);?>

							</p>
						<?php }?>
					</div> <!-- end product_attributes -->
					<div class="content_prices clearfix<?php if ((($_smarty_tpl->tpl_vars['cookie']->value->ts_countdown==1)&&isset($_smarty_tpl->tpl_vars['product']->value->specificPrice['to']))) {?> countd sec_bord_hvr<?php }?>">
						<?php if ($_smarty_tpl->tpl_vars['product']->value->show_price&&!isset($_smarty_tpl->tpl_vars['restricted_country_mode']->value)&&!$_smarty_tpl->tpl_vars['PS_CATALOG_MODE']->value) {?>
							<!-- prices -->
							<?php if (($_smarty_tpl->tpl_vars['cookie']->value->ts_countdown==1)) {?>
					        <?php $_smarty_tpl->tpl_vars['to'] = new Smarty_variable(explode("-",$_smarty_tpl->tpl_vars['product']->value->specificPrice['to']), null, 0);?> 
					        <?php if (isset($_smarty_tpl->tpl_vars['product']->value->specificPrice['to'])&&($_smarty_tpl->tpl_vars['to']->value[0]!="0000")) {?>
					        	<div class="countdown" title="<?php echo smartyTranslate(array('s'=>'To the end of this offer'),$_smarty_tpl);?>
"></div>
					        	<script>
					        	$(document).ready(function(){
					        		$(function() {
									    $('.countdown').countdown({
									        date: "<?php echo smarty_modifier_replace($_smarty_tpl->tpl_vars['product']->value->specificPrice['to'],' ','T');?>
",
									          render: function(data) {
									            $(this.el).html("<div class='main_bg'>" + this.leadingZeros(data.days, 2) + " <span><?php echo smartyTranslate(array('s'=>'Days'),$_smarty_tpl);?>
</span></div><div class='main_bg'>" + this.leadingZeros(data.hours, 2) + " <span><?php echo smartyTranslate(array('s'=>'Hours'),$_smarty_tpl);?>
</span></div><div class='main_bg'>" + this.leadingZeros(data.min, 2) + " <span><?php echo smartyTranslate(array('s'=>'Min'),$_smarty_tpl);?>
</span></div><div class='main_bg'>" + this.leadingZeros(data.sec, 2) + " <span><?php echo smartyTranslate(array('s'=>'Sec'),$_smarty_tpl);?>
</span></div>");
									            $(this.el).attr('title', this.leadingZeros(data.days, 2)+" <?php echo smartyTranslate(array('s'=>'Days'),$_smarty_tpl);?>
 <?php echo smartyTranslate(array('s'=>'and'),$_smarty_tpl);?>
 "+this.leadingZeros(data.hours, 2)+" <?php echo smartyTranslate(array('s'=>'Hours'),$_smarty_tpl);?>
 <?php echo smartyTranslate(array('s'=>'to the end of this offer'),$_smarty_tpl);?>
");
									          }
									    });
									});
					        	});
					        	</script>			        	
					        <?php }?>
					        <?php }?>
							<div class="price">
								<p class="our_price_display" itemprop="offers" itemscope itemtype="http://schema.org/Offer">
									<?php if ($_smarty_tpl->tpl_vars['product']->value->quantity>0) {?><link itemprop="availability" href="http://schema.org/InStock"/><?php }?>
									<?php if ($_smarty_tpl->tpl_vars['priceDisplay']->value>=0&&$_smarty_tpl->tpl_vars['priceDisplay']->value<=2) {?>
										<span id="our_price_display" itemprop="price"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['convertPrice'][0][0]->convertPrice(array('price'=>$_smarty_tpl->tpl_vars['productPrice']->value),$_smarty_tpl);?>
</span>
										<!--<?php if ($_smarty_tpl->tpl_vars['tax_enabled']->value&&((isset($_smarty_tpl->tpl_vars['display_tax_label']->value)&&$_smarty_tpl->tpl_vars['display_tax_label']->value==1)||!isset($_smarty_tpl->tpl_vars['display_tax_label']->value))) {?>
											<?php if ($_smarty_tpl->tpl_vars['priceDisplay']->value==1) {?><?php echo smartyTranslate(array('s'=>'tax excl.'),$_smarty_tpl);?>
<?php } else { ?><?php echo smartyTranslate(array('s'=>'tax incl.'),$_smarty_tpl);?>
<?php }?>
										<?php }?>-->
										<meta itemprop="priceCurrency" content="<?php echo $_smarty_tpl->tpl_vars['currency']->value->iso_code;?>
" />
										<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0][0]->smartyHook(array('h'=>"displayProductPriceBlock",'product'=>$_smarty_tpl->tpl_vars['product']->value,'type'=>"price"),$_smarty_tpl);?>

									<?php }?>
								</p>
								<p id="reduction_percent" <?php if (!$_smarty_tpl->tpl_vars['product']->value->specificPrice||$_smarty_tpl->tpl_vars['product']->value->specificPrice['reduction_type']!='percentage') {?> style="display:none;"<?php }?>>
									<span id="reduction_percent_display">
										<?php if ($_smarty_tpl->tpl_vars['product']->value->specificPrice&&$_smarty_tpl->tpl_vars['product']->value->specificPrice['reduction_type']=='percentage') {?>-<?php echo $_smarty_tpl->tpl_vars['product']->value->specificPrice['reduction']*100;?>
%<?php }?>
									</span>
								</p>
								<p id="reduction_amount" <?php if (!$_smarty_tpl->tpl_vars['product']->value->specificPrice||$_smarty_tpl->tpl_vars['product']->value->specificPrice['reduction_type']!='amount'||intval($_smarty_tpl->tpl_vars['product']->value->specificPrice['reduction'])==0) {?> style="display:none"<?php }?>>
									<span id="reduction_amount_display">
									<?php if ($_smarty_tpl->tpl_vars['product']->value->specificPrice&&$_smarty_tpl->tpl_vars['product']->value->specificPrice['reduction_type']=='amount'&&intval($_smarty_tpl->tpl_vars['product']->value->specificPrice['reduction'])!=0) {?>
										-<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['convertPrice'][0][0]->convertPrice(array('price'=>$_smarty_tpl->tpl_vars['productPriceWithoutReduction']->value-floatval($_smarty_tpl->tpl_vars['productPrice']->value)),$_smarty_tpl);?>

									<?php }?>
									</span>
								</p>
								<p id="old_price"<?php if (!$_smarty_tpl->tpl_vars['product']->value->specificPrice||!$_smarty_tpl->tpl_vars['product']->value->specificPrice['reduction']) {?> class="hidden"<?php }?>>
									<?php if ($_smarty_tpl->tpl_vars['priceDisplay']->value>=0&&$_smarty_tpl->tpl_vars['priceDisplay']->value<=2) {?>
										<span id="old_price_display"><?php if ($_smarty_tpl->tpl_vars['productPriceWithoutReduction']->value>$_smarty_tpl->tpl_vars['productPrice']->value) {?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['convertPrice'][0][0]->convertPrice(array('price'=>$_smarty_tpl->tpl_vars['productPriceWithoutReduction']->value),$_smarty_tpl);?>
<?php }?></span>
										<!-- <?php if ($_smarty_tpl->tpl_vars['tax_enabled']->value&&$_smarty_tpl->tpl_vars['display_tax_label']->value==1) {?><?php if ($_smarty_tpl->tpl_vars['priceDisplay']->value==1) {?><?php echo smartyTranslate(array('s'=>'tax excl.'),$_smarty_tpl);?>
<?php } else { ?><?php echo smartyTranslate(array('s'=>'tax incl.'),$_smarty_tpl);?>
<?php }?><?php }?> -->
									<?php }?>
								</p>

								<?php if ($_smarty_tpl->tpl_vars['priceDisplay']->value==2) {?>
									<br />
									<span id="pretaxe_price">
										<span id="pretaxe_price_display"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['convertPrice'][0][0]->convertPrice(array('price'=>$_smarty_tpl->tpl_vars['product']->value->getPrice(false,@constant('NULL'))),$_smarty_tpl);?>
</span>
										<?php echo smartyTranslate(array('s'=>'tax excl.'),$_smarty_tpl);?>

									</span>
								<?php }?>
								<div id="add_to_cart" <?php if ((!$_smarty_tpl->tpl_vars['allow_oosp']->value&&$_smarty_tpl->tpl_vars['product']->value->quantity<=0)||!$_smarty_tpl->tpl_vars['product']->value->available_for_order||(isset($_smarty_tpl->tpl_vars['restricted_country_mode']->value)&&$_smarty_tpl->tpl_vars['restricted_country_mode']->value)||$_smarty_tpl->tpl_vars['PS_CATALOG_MODE']->value) {?>style="display:none"<?php }?> class="buttons_bottom_block">
								<?php if (($_smarty_tpl->tpl_vars['product']->value->show_price&&!isset($_smarty_tpl->tpl_vars['restricted_country_mode']->value))||isset($_smarty_tpl->tpl_vars['groups']->value)||$_smarty_tpl->tpl_vars['product']->value->reference||(isset($_smarty_tpl->tpl_vars['HOOK_PRODUCT_ACTIONS']->value)&&$_smarty_tpl->tpl_vars['HOOK_PRODUCT_ACTIONS']->value)) {?>
									<!-- add to cart form-->
									<form id="buy_block" style="margin-top:0" <?php if ($_smarty_tpl->tpl_vars['PS_CATALOG_MODE']->value&&!isset($_smarty_tpl->tpl_vars['groups']->value)&&$_smarty_tpl->tpl_vars['product']->value->quantity>0) {?>class="hidden"<?php }?> action="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value->getPageLink('cart'), ENT_QUOTES, 'UTF-8', true);?>
" method="post">
										<!-- hidden datas -->
										<button type="submit" name="Submit" class="exclusive lmromancaps"><?php echo smartyTranslate(array('s'=>'Add to cart'),$_smarty_tpl);?>
</button>
										<p class="hidden">
											<input type="hidden" name="token" value="<?php echo $_smarty_tpl->tpl_vars['static_token']->value;?>
" />
											<input type="hidden" name="id_product" value="<?php echo intval($_smarty_tpl->tpl_vars['product']->value->id);?>
" id="product_page_product_id" />
											<input type="hidden" name="add" value="1" />
											<input type="hidden" name="id_product_attribute" id="idCombination" value="" />
										</p>
									</form>
								<?php }?>
								</div>
							</div> <!-- end prices -->
					
							<?php if (count($_smarty_tpl->tpl_vars['packItems']->value)&&$_smarty_tpl->tpl_vars['productPrice']->value<$_smarty_tpl->tpl_vars['product']->value->getNoPackPrice()) {?>
								<p class="pack_price"><?php echo smartyTranslate(array('s'=>'Instead of'),$_smarty_tpl);?>
 <span style="text-decoration: line-through;"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['convertPrice'][0][0]->convertPrice(array('price'=>$_smarty_tpl->tpl_vars['product']->value->getNoPackPrice()),$_smarty_tpl);?>
</span></p>
							<?php }?>

							<?php if ($_smarty_tpl->tpl_vars['product']->value->ecotax!=0) {?>
								<p class="price-ecotax"><?php echo smartyTranslate(array('s'=>'Include'),$_smarty_tpl);?>
 <span id="ecotax_price_display"><?php if ($_smarty_tpl->tpl_vars['priceDisplay']->value==2) {?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['convertAndFormatPrice'][0][0]->convertAndFormatPrice($_smarty_tpl->tpl_vars['ecotax_tax_exc']->value);?>
<?php } else { ?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['convertAndFormatPrice'][0][0]->convertAndFormatPrice($_smarty_tpl->tpl_vars['ecotax_tax_inc']->value);?>
<?php }?></span> <?php echo smartyTranslate(array('s'=>'For green tax'),$_smarty_tpl);?>

									<?php if ($_smarty_tpl->tpl_vars['product']->value->specificPrice&&$_smarty_tpl->tpl_vars['product']->value->specificPrice['reduction']) {?>
									<br /><?php echo smartyTranslate(array('s'=>'(not impacted by the discount)'),$_smarty_tpl);?>

									<?php }?>
								</p>
							<?php }?>

							<?php if (!empty($_smarty_tpl->tpl_vars['product']->value->unity)&&$_smarty_tpl->tpl_vars['product']->value->unit_price_ratio>0.000000) {?>
								<?php echo smarty_function_math(array('equation'=>"pprice / punit_price",'pprice'=>$_smarty_tpl->tpl_vars['productPrice']->value,'punit_price'=>$_smarty_tpl->tpl_vars['product']->value->unit_price_ratio,'assign'=>'unit_price'),$_smarty_tpl);?>

								<p class="unit-price"><span id="unit_price_display"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['convertPrice'][0][0]->convertPrice(array('price'=>$_smarty_tpl->tpl_vars['unit_price']->value),$_smarty_tpl);?>
</span> <?php echo smartyTranslate(array('s'=>'per'),$_smarty_tpl);?>
 <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value->unity, ENT_QUOTES, 'UTF-8', true);?>
</p>
							<?php }?>
						<?php }?> 
						<div class="clear"></div>
					</div> <!-- end content_prices -->
					<?php if (!$_smarty_tpl->tpl_vars['content_only']->value) {?>
					<div class="box-cart-bottom">						
						<?php if ($_smarty_tpl->tpl_vars['theme_settings']->value['share_buttons']==1) {?>
						<!-- AddThis Button BEGIN -->
						<div class="addthis_toolbox addthis_default_style">
							<div class="addthis-container">
							<a class="addthis_button_preferred_1"></a>
							<a class="addthis_button_preferred_2"></a>
							<a class="addthis_button_preferred_3"></a>
							<a class="addthis_button_preferred_4"></a>
							<a class="addthis_button_compact"></a>
							<a class="addthis_counter addthis_bubble_style"></a>
							</div>
						</div>
						<script type="text/javascript">
							var addthis_config = { "data_track_addressbar":true }; 
							addthis_config.data_track_addressbar = false;
						</script>
						<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-4f8c6f62449043f7"></script>
						<!-- AddThis Button END -->
						<?php }?>
						<?php if (isset($_smarty_tpl->tpl_vars['HOOK_PRODUCT_ACTIONS']->value)&&$_smarty_tpl->tpl_vars['HOOK_PRODUCT_ACTIONS']->value) {?><?php echo $_smarty_tpl->tpl_vars['HOOK_PRODUCT_ACTIONS']->value;?>
<?php }?><strong></strong>
					</div> <!-- end box-cart-bottom -->
					<ul id="usefull_link_block" class="clearfix">
						<?php if ($_smarty_tpl->tpl_vars['HOOK_EXTRA_LEFT']->value) {?><?php echo $_smarty_tpl->tpl_vars['HOOK_EXTRA_LEFT']->value;?>
<?php }?>
						<!--<li class="print">
							<a href="javascript:print();">
								<?php echo smartyTranslate(array('s'=>'Print'),$_smarty_tpl);?>

							</a>
						</li>-->
					</ul>
				</div> <!-- end box-info-product -->
				<?php }?>
			</div> <!-- end pb-right-column1-->
			<?php if ($_smarty_tpl->tpl_vars['content_only']->value) {?>
				<?php if (isset($_smarty_tpl->tpl_vars['HOOK_PRODUCT_FOOTER']->value)&&$_smarty_tpl->tpl_vars['HOOK_PRODUCT_FOOTER']->value) {?><?php echo $_smarty_tpl->tpl_vars['HOOK_PRODUCT_FOOTER']->value;?>
<?php }?>
				<?php }?>
			<!-- Out of stock hook -->
			<div id="oosHook"<?php if ($_smarty_tpl->tpl_vars['product']->value->quantity>0) {?> style="display: none;"<?php }?>>
				<?php echo $_smarty_tpl->tpl_vars['HOOK_PRODUCT_OOS']->value;?>

			</div>

			<?php if (isset($_smarty_tpl->tpl_vars['HOOK_EXTRA_RIGHT']->value)&&$_smarty_tpl->tpl_vars['HOOK_EXTRA_RIGHT']->value) {?><?php echo $_smarty_tpl->tpl_vars['HOOK_EXTRA_RIGHT']->value;?>
<?php }?>

		</div>
		<!-- end left infos-->
	</div> <!-- end primary_block -->
<script>
$(window).load(function(){
	var blockHeight = $("#image-block").height();
    $("#thumbs_list").height(blockHeight);
	$(".thickbox").fancybox();
});
</script>
<?php if (isset($_GET['ad'])&&$_GET['ad']) {?><?php $_smarty_tpl->smarty->_tag_stack[] = array('addJsDefL', array('name'=>'ad')); $_block_repeat=true; echo $_smarty_tpl->smarty->registered_plugins['block']['addJsDefL'][0][0]->addJsDefL(array('name'=>'ad'), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
<?php echo htmlspecialchars(($_smarty_tpl->tpl_vars['base_dir']->value).($_GET['ad']), ENT_QUOTES, 'UTF-8', true);?>
<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['addJsDefL'][0][0]->addJsDefL(array('name'=>'ad'), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
<?php }?><?php if (isset($_GET['adtoken'])&&$_GET['adtoken']) {?><?php $_smarty_tpl->smarty->_tag_stack[] = array('addJsDefL', array('name'=>'adtoken')); $_block_repeat=true; echo $_smarty_tpl->smarty->registered_plugins['block']['addJsDefL'][0][0]->addJsDefL(array('name'=>'adtoken'), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
<?php echo htmlspecialchars($_GET['adtoken'], ENT_QUOTES, 'UTF-8', true);?>
<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['addJsDefL'][0][0]->addJsDefL(array('name'=>'adtoken'), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
<?php }?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['addJsDef'][0][0]->addJsDef(array('allowBuyWhenOutOfStock'=>$_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['boolval'][0][0]->boolval($_smarty_tpl->tpl_vars['allow_oosp']->value)),$_smarty_tpl);?>
<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['addJsDef'][0][0]->addJsDef(array('availableNowValue'=>preg_replace("%(?<!\\\\)'%", "\'",$_smarty_tpl->tpl_vars['product']->value->available_now)),$_smarty_tpl);?>
<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['addJsDef'][0][0]->addJsDef(array('availableLaterValue'=>preg_replace("%(?<!\\\\)'%", "\'",$_smarty_tpl->tpl_vars['product']->value->available_later)),$_smarty_tpl);?>
<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['addJsDef'][0][0]->addJsDef(array('attribute_anchor_separator'=>preg_replace("%(?<!\\\\)'%", "\'",$_smarty_tpl->tpl_vars['attribute_anchor_separator']->value)),$_smarty_tpl);?>
<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['addJsDef'][0][0]->addJsDef(array('attributesCombinations'=>$_smarty_tpl->tpl_vars['attributesCombinations']->value),$_smarty_tpl);?>
<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['addJsDef'][0][0]->addJsDef(array('currencySign'=>html_entity_decode($_smarty_tpl->tpl_vars['currencySign']->value,2,"UTF-8")),$_smarty_tpl);?>
<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['addJsDef'][0][0]->addJsDef(array('currencyRate'=>floatval($_smarty_tpl->tpl_vars['currencyRate']->value)),$_smarty_tpl);?>
<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['addJsDef'][0][0]->addJsDef(array('currencyFormat'=>intval($_smarty_tpl->tpl_vars['currencyFormat']->value)),$_smarty_tpl);?>
<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['addJsDef'][0][0]->addJsDef(array('currencyBlank'=>intval($_smarty_tpl->tpl_vars['currencyBlank']->value)),$_smarty_tpl);?>
<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['addJsDef'][0][0]->addJsDef(array('currentDate'=>smarty_modifier_date_format(time(),'%Y-%m-%d %H:%M:%S')),$_smarty_tpl);?>
<?php if (isset($_smarty_tpl->tpl_vars['combinations']->value)&&$_smarty_tpl->tpl_vars['combinations']->value) {?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['addJsDef'][0][0]->addJsDef(array('combinations'=>$_smarty_tpl->tpl_vars['combinations']->value),$_smarty_tpl);?>
<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['addJsDef'][0][0]->addJsDef(array('combinationsFromController'=>$_smarty_tpl->tpl_vars['combinations']->value),$_smarty_tpl);?>
<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['addJsDef'][0][0]->addJsDef(array('displayDiscountPrice'=>$_smarty_tpl->tpl_vars['display_discount_price']->value),$_smarty_tpl);?>
<?php $_smarty_tpl->smarty->_tag_stack[] = array('addJsDefL', array('name'=>'upToTxt')); $_block_repeat=true; echo $_smarty_tpl->smarty->registered_plugins['block']['addJsDefL'][0][0]->addJsDefL(array('name'=>'upToTxt'), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
<?php echo smartyTranslate(array('s'=>'Up to','js'=>1),$_smarty_tpl);?>
<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['addJsDefL'][0][0]->addJsDefL(array('name'=>'upToTxt'), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
<?php }?><?php if (isset($_smarty_tpl->tpl_vars['combinationImages']->value)&&$_smarty_tpl->tpl_vars['combinationImages']->value) {?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['addJsDef'][0][0]->addJsDef(array('combinationImages'=>$_smarty_tpl->tpl_vars['combinationImages']->value),$_smarty_tpl);?>
<?php }?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['addJsDef'][0][0]->addJsDef(array('customizationFields'=>$_smarty_tpl->tpl_vars['customizationFields']->value),$_smarty_tpl);?>
<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['addJsDef'][0][0]->addJsDef(array('default_eco_tax'=>floatval($_smarty_tpl->tpl_vars['product']->value->ecotax)),$_smarty_tpl);?>
<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['addJsDef'][0][0]->addJsDef(array('displayPrice'=>intval($_smarty_tpl->tpl_vars['priceDisplay']->value)),$_smarty_tpl);?>
<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['addJsDef'][0][0]->addJsDef(array('ecotaxTax_rate'=>floatval($_smarty_tpl->tpl_vars['ecotaxTax_rate']->value)),$_smarty_tpl);?>
<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['addJsDef'][0][0]->addJsDef(array('group_reduction'=>$_smarty_tpl->tpl_vars['group_reduction']->value),$_smarty_tpl);?>
<?php if (isset($_smarty_tpl->tpl_vars['cover']->value['id_image_only'])) {?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['addJsDef'][0][0]->addJsDef(array('idDefaultImage'=>intval($_smarty_tpl->tpl_vars['cover']->value['id_image_only'])),$_smarty_tpl);?>
<?php } else { ?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['addJsDef'][0][0]->addJsDef(array('idDefaultImage'=>0),$_smarty_tpl);?>
<?php }?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['addJsDef'][0][0]->addJsDef(array('img_ps_dir'=>$_smarty_tpl->tpl_vars['img_ps_dir']->value),$_smarty_tpl);?>
<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['addJsDef'][0][0]->addJsDef(array('img_prod_dir'=>$_smarty_tpl->tpl_vars['img_prod_dir']->value),$_smarty_tpl);?>
<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['addJsDef'][0][0]->addJsDef(array('id_product'=>intval($_smarty_tpl->tpl_vars['product']->value->id)),$_smarty_tpl);?>
<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['addJsDef'][0][0]->addJsDef(array('jqZoomEnabled'=>$_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['boolval'][0][0]->boolval($_smarty_tpl->tpl_vars['jqZoomEnabled']->value)),$_smarty_tpl);?>
<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['addJsDef'][0][0]->addJsDef(array('maxQuantityToAllowDisplayOfLastQuantityMessage'=>intval($_smarty_tpl->tpl_vars['last_qties']->value)),$_smarty_tpl);?>
<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['addJsDef'][0][0]->addJsDef(array('minimalQuantity'=>intval($_smarty_tpl->tpl_vars['product']->value->minimal_quantity)),$_smarty_tpl);?>
<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['addJsDef'][0][0]->addJsDef(array('noTaxForThisProduct'=>$_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['boolval'][0][0]->boolval($_smarty_tpl->tpl_vars['no_tax']->value)),$_smarty_tpl);?>
<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['addJsDef'][0][0]->addJsDef(array('customerGroupWithoutTax'=>$_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['boolval'][0][0]->boolval($_smarty_tpl->tpl_vars['customer_group_without_tax']->value)),$_smarty_tpl);?>
<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['addJsDef'][0][0]->addJsDef(array('oosHookJsCodeFunctions'=>Array()),$_smarty_tpl);?>
<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['addJsDef'][0][0]->addJsDef(array('productHasAttributes'=>$_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['boolval'][0][0]->boolval(isset($_smarty_tpl->tpl_vars['groups']->value))),$_smarty_tpl);?>
<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['addJsDef'][0][0]->addJsDef(array('productPriceTaxExcluded'=>floatval(((($tmp = @$_smarty_tpl->tpl_vars['product']->value->getPriceWithoutReduct(true))===null||$tmp==='' ? 'null' : $tmp)-$_smarty_tpl->tpl_vars['product']->value->ecotax))),$_smarty_tpl);?>
<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['addJsDef'][0][0]->addJsDef(array('productBasePriceTaxExcluded'=>floatval(($_smarty_tpl->tpl_vars['product']->value->base_price-$_smarty_tpl->tpl_vars['product']->value->ecotax))),$_smarty_tpl);?>
<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['addJsDef'][0][0]->addJsDef(array('productBasePriceTaxExcl'=>(floatval($_smarty_tpl->tpl_vars['product']->value->base_price))),$_smarty_tpl);?>
<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['addJsDef'][0][0]->addJsDef(array('productReference'=>htmlspecialchars($_smarty_tpl->tpl_vars['product']->value->reference, ENT_QUOTES, 'UTF-8', true)),$_smarty_tpl);?>
<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['addJsDef'][0][0]->addJsDef(array('productAvailableForOrder'=>$_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['boolval'][0][0]->boolval($_smarty_tpl->tpl_vars['product']->value->available_for_order)),$_smarty_tpl);?>
<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['addJsDef'][0][0]->addJsDef(array('productPriceWithoutReduction'=>floatval($_smarty_tpl->tpl_vars['productPriceWithoutReduction']->value)),$_smarty_tpl);?>
<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['addJsDef'][0][0]->addJsDef(array('productPrice'=>floatval($_smarty_tpl->tpl_vars['productPrice']->value)),$_smarty_tpl);?>
<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['addJsDef'][0][0]->addJsDef(array('productUnitPriceRatio'=>floatval($_smarty_tpl->tpl_vars['product']->value->unit_price_ratio)),$_smarty_tpl);?>
<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['addJsDef'][0][0]->addJsDef(array('productShowPrice'=>$_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['boolval'][0][0]->boolval((!$_smarty_tpl->tpl_vars['PS_CATALOG_MODE']->value&&$_smarty_tpl->tpl_vars['product']->value->show_price))),$_smarty_tpl);?>
<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['addJsDef'][0][0]->addJsDef(array('PS_CATALOG_MODE'=>$_smarty_tpl->tpl_vars['PS_CATALOG_MODE']->value),$_smarty_tpl);?>
<?php if ($_smarty_tpl->tpl_vars['product']->value->specificPrice&&count($_smarty_tpl->tpl_vars['product']->value->specificPrice)) {?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['addJsDef'][0][0]->addJsDef(array('product_specific_price'=>$_smarty_tpl->tpl_vars['product']->value->specificPrice),$_smarty_tpl);?>
<?php } else { ?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['addJsDef'][0][0]->addJsDef(array('product_specific_price'=>array()),$_smarty_tpl);?>
<?php }?><?php if ($_smarty_tpl->tpl_vars['display_qties']->value==1&&$_smarty_tpl->tpl_vars['product']->value->quantity) {?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['addJsDef'][0][0]->addJsDef(array('quantityAvailable'=>$_smarty_tpl->tpl_vars['product']->value->quantity),$_smarty_tpl);?>
<?php } else { ?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['addJsDef'][0][0]->addJsDef(array('quantityAvailable'=>0),$_smarty_tpl);?>
<?php }?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['addJsDef'][0][0]->addJsDef(array('quantitiesDisplayAllowed'=>$_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['boolval'][0][0]->boolval($_smarty_tpl->tpl_vars['display_qties']->value)),$_smarty_tpl);?>
<?php if ($_smarty_tpl->tpl_vars['product']->value->specificPrice&&$_smarty_tpl->tpl_vars['product']->value->specificPrice['reduction']&&$_smarty_tpl->tpl_vars['product']->value->specificPrice['reduction_type']=='percentage') {?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['addJsDef'][0][0]->addJsDef(array('reduction_percent'=>$_smarty_tpl->tpl_vars['product']->value->specificPrice['reduction']*floatval(100)),$_smarty_tpl);?>
<?php } else { ?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['addJsDef'][0][0]->addJsDef(array('reduction_percent'=>0),$_smarty_tpl);?>
<?php }?><?php if ($_smarty_tpl->tpl_vars['product']->value->specificPrice&&$_smarty_tpl->tpl_vars['product']->value->specificPrice['reduction']&&$_smarty_tpl->tpl_vars['product']->value->specificPrice['reduction_type']=='amount') {?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['addJsDef'][0][0]->addJsDef(array('reduction_price'=>floatval($_smarty_tpl->tpl_vars['product']->value->specificPrice['reduction'])),$_smarty_tpl);?>
<?php } else { ?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['addJsDef'][0][0]->addJsDef(array('reduction_price'=>0),$_smarty_tpl);?>
<?php }?><?php if ($_smarty_tpl->tpl_vars['product']->value->specificPrice&&$_smarty_tpl->tpl_vars['product']->value->specificPrice['price']) {?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['addJsDef'][0][0]->addJsDef(array('specific_price'=>floatval($_smarty_tpl->tpl_vars['product']->value->specificPrice['price'])),$_smarty_tpl);?>
<?php } else { ?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['addJsDef'][0][0]->addJsDef(array('specific_price'=>0),$_smarty_tpl);?>
<?php }?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['addJsDef'][0][0]->addJsDef(array('specific_currency'=>$_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['boolval'][0][0]->boolval(($_smarty_tpl->tpl_vars['product']->value->specificPrice&&$_smarty_tpl->tpl_vars['product']->value->specificPrice['id_currency']))),$_smarty_tpl);?>
 <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['addJsDef'][0][0]->addJsDef(array('stock_management'=>intval($_smarty_tpl->tpl_vars['PS_STOCK_MANAGEMENT']->value)),$_smarty_tpl);?>
<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['addJsDef'][0][0]->addJsDef(array('taxRate'=>floatval($_smarty_tpl->tpl_vars['tax_rate']->value)),$_smarty_tpl);?>
<?php $_smarty_tpl->smarty->_tag_stack[] = array('addJsDefL', array('name'=>'doesntExist')); $_block_repeat=true; echo $_smarty_tpl->smarty->registered_plugins['block']['addJsDefL'][0][0]->addJsDefL(array('name'=>'doesntExist'), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
<?php echo smartyTranslate(array('s'=>'This combination does not exist for this product. Please select another combination.','js'=>1),$_smarty_tpl);?>
<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['addJsDefL'][0][0]->addJsDefL(array('name'=>'doesntExist'), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
<?php $_smarty_tpl->smarty->_tag_stack[] = array('addJsDefL', array('name'=>'doesntExistNoMore')); $_block_repeat=true; echo $_smarty_tpl->smarty->registered_plugins['block']['addJsDefL'][0][0]->addJsDefL(array('name'=>'doesntExistNoMore'), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
<?php echo smartyTranslate(array('s'=>'This product is no longer in stock','js'=>1),$_smarty_tpl);?>
<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['addJsDefL'][0][0]->addJsDefL(array('name'=>'doesntExistNoMore'), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
<?php $_smarty_tpl->smarty->_tag_stack[] = array('addJsDefL', array('name'=>'doesntExistNoMoreBut')); $_block_repeat=true; echo $_smarty_tpl->smarty->registered_plugins['block']['addJsDefL'][0][0]->addJsDefL(array('name'=>'doesntExistNoMoreBut'), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
<?php echo smartyTranslate(array('s'=>'with those attributes but is available with others.','js'=>1),$_smarty_tpl);?>
<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['addJsDefL'][0][0]->addJsDefL(array('name'=>'doesntExistNoMoreBut'), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
<?php $_smarty_tpl->smarty->_tag_stack[] = array('addJsDefL', array('name'=>'fieldRequired')); $_block_repeat=true; echo $_smarty_tpl->smarty->registered_plugins['block']['addJsDefL'][0][0]->addJsDefL(array('name'=>'fieldRequired'), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
<?php echo smartyTranslate(array('s'=>'Please fill in all the required fields before saving your customization.','js'=>1),$_smarty_tpl);?>
<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['addJsDefL'][0][0]->addJsDefL(array('name'=>'fieldRequired'), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
<?php $_smarty_tpl->smarty->_tag_stack[] = array('addJsDefL', array('name'=>'uploading_in_progress')); $_block_repeat=true; echo $_smarty_tpl->smarty->registered_plugins['block']['addJsDefL'][0][0]->addJsDefL(array('name'=>'uploading_in_progress'), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
<?php echo smartyTranslate(array('s'=>'Uploading in progress, please be patient.','js'=>1),$_smarty_tpl);?>
<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['addJsDefL'][0][0]->addJsDefL(array('name'=>'uploading_in_progress'), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
<?php $_smarty_tpl->smarty->_tag_stack[] = array('addJsDefL', array('name'=>'product_fileDefaultHtml')); $_block_repeat=true; echo $_smarty_tpl->smarty->registered_plugins['block']['addJsDefL'][0][0]->addJsDefL(array('name'=>'product_fileDefaultHtml'), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
<?php echo smartyTranslate(array('s'=>'No file selected','js'=>1),$_smarty_tpl);?>
<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['addJsDefL'][0][0]->addJsDefL(array('name'=>'product_fileDefaultHtml'), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
<?php $_smarty_tpl->smarty->_tag_stack[] = array('addJsDefL', array('name'=>'product_fileButtonHtml')); $_block_repeat=true; echo $_smarty_tpl->smarty->registered_plugins['block']['addJsDefL'][0][0]->addJsDefL(array('name'=>'product_fileButtonHtml'), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
<?php echo smartyTranslate(array('s'=>'Choose File','js'=>1),$_smarty_tpl);?>
<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['addJsDefL'][0][0]->addJsDefL(array('name'=>'product_fileButtonHtml'), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>

<?php }?><?php }} ?>
