<?php /* Smarty version Smarty-3.1.19, created on 2016-03-08 02:03:29
         compiled from "/srv/data/web/vhosts/www.bouquetacroquer.fr/htdocs/themes/alysum/category.tpl" */ ?>
<?php /*%%SmartyHeaderCode:142692199456de24e1587700-14290917%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2584bd333664b1bbf9b510e7c13587de4c5fcec0' => 
    array (
      0 => '/srv/data/web/vhosts/www.bouquetacroquer.fr/htdocs/themes/alysum/category.tpl',
      1 => 1453302266,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '142692199456de24e1587700-14290917',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'category' => 0,
    'subcategories' => 0,
    'products' => 0,
    'categoryNameComplement' => 0,
    'scenes' => 0,
    'description_short' => 0,
    'theme_settings' => 0,
    'cookie' => 0,
    'link' => 0,
    'subcategory' => 0,
    'categorySize' => 0,
    'img_cat_dir' => 0,
    'mediumSize' => 0,
    'view_type' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_56de24e17427e8_27891124',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56de24e17427e8_27891124')) {function content_56de24e17427e8_27891124($_smarty_tpl) {?>
<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tpl_dir']->value)."./errors.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php if (isset($_smarty_tpl->tpl_vars['category']->value)) {?>
	<?php if ($_smarty_tpl->tpl_vars['category']->value->id&&$_smarty_tpl->tpl_vars['category']->value->active) {?>
		<h1 class="page-heading<?php if ((isset($_smarty_tpl->tpl_vars['subcategories']->value)&&!$_smarty_tpl->tpl_vars['products']->value)||(isset($_smarty_tpl->tpl_vars['subcategories']->value)&&$_smarty_tpl->tpl_vars['products']->value)||!isset($_smarty_tpl->tpl_vars['subcategories']->value)&&$_smarty_tpl->tpl_vars['products']->value) {?> product-listing<?php }?>">
			<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['category']->value->name, ENT_QUOTES, 'UTF-8', true);?>
<?php if (isset($_smarty_tpl->tpl_vars['categoryNameComplement']->value)) {?>&nbsp;<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['categoryNameComplement']->value, ENT_QUOTES, 'UTF-8', true);?>
<?php }?>
		</h1>

		<?php if ($_smarty_tpl->tpl_vars['scenes']->value||$_smarty_tpl->tpl_vars['category']->value->description||$_smarty_tpl->tpl_vars['category']->value->id_image) {?>
			<div class="content_scene_cat">
            	 <?php if ($_smarty_tpl->tpl_vars['scenes']->value) {?>
                 	<div class="content_scene">
                        <!-- Scenes -->
                        <?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tpl_dir']->value)."./scenes.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('scenes'=>$_smarty_tpl->tpl_vars['scenes']->value), 0);?>

                        <?php if ($_smarty_tpl->tpl_vars['category']->value->description) {?>
                            <div class="cat_desc">
                            <?php if (strlen($_smarty_tpl->tpl_vars['category']->value->description)>350) {?>
                                <div id="category_description_short"><?php echo $_smarty_tpl->tpl_vars['description_short']->value;?>
</div>
                                <div id="category_description_full" style="display:none"><?php echo $_smarty_tpl->tpl_vars['category']->value->description;?>
</div>
                                <a href="#" onclick="$('#category_description_short').hide(); $('#category_description_full').show(); $(this).hide(); return false;" class="lnk_more"><?php echo smartyTranslate(array('s'=>'More'),$_smarty_tpl);?>
</a>
                            <?php } else { ?>
                                <div><?php echo $_smarty_tpl->tpl_vars['category']->value->description;?>
</div>
                            <?php }?>
                            </div>
                        <?php }?>
                        </div>
                  <?php } else { ?>
                    <!-- Category image -->
                    <div class="content_scene_cat_bg" <?php if ($_smarty_tpl->tpl_vars['category']->value->id_image) {?><?php }?>>
                    	<?php if (isset($_smarty_tpl->tpl_vars['theme_settings']->value)&&($_smarty_tpl->tpl_vars['theme_settings']->value['cat_title']==1)) {?>
                    	<img class="cat_image" src="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['link']->value->getCatImageLink($_smarty_tpl->tpl_vars['category']->value->link_rewrite,$_smarty_tpl->tpl_vars['category']->value->id_image,('category_').($_smarty_tpl->tpl_vars['cookie']->value->img_name)), ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" width="870" height="300" alt="" title="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['description_short']->value, ENT_QUOTES, 'UTF-8', true);?>
" />
                    	<?php }?>
                        <?php if ($_smarty_tpl->tpl_vars['category']->value->description) {?>
                        <?php if (isset($_smarty_tpl->tpl_vars['theme_settings']->value)&&($_smarty_tpl->tpl_vars['theme_settings']->value['cat_title']==1)) {?>
                            <div class="cat_desc">
	                            <h2 class="category-name trajan">
	                                <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['category']->value->name, ENT_QUOTES, 'UTF-8', true);?>
<?php if (isset($_smarty_tpl->tpl_vars['categoryNameComplement']->value)) {?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['categoryNameComplement']->value, ENT_QUOTES, 'UTF-8', true);?>
<?php }?>
	                            </h2>
	                            <?php if (strlen($_smarty_tpl->tpl_vars['category']->value->description)>350) {?>
	                                <div id="category_description_short"><?php echo $_smarty_tpl->tpl_vars['description_short']->value;?>
</div>
	                                <div id="category_description_full" style="display:none"><?php echo $_smarty_tpl->tpl_vars['category']->value->description;?>
</div>
	                                <a href="#" onclick="$('#category_description_short').hide(); $('#category_description_full').show(); $(this).hide(); return false;" class="lnk_more"><?php echo smartyTranslate(array('s'=>'More'),$_smarty_tpl);?>
</a>
	                            <?php } else { ?>
	                                <div><?php echo $_smarty_tpl->tpl_vars['category']->value->description;?>
</div>
	                            <?php }?>
                            </div>
                        <?php }?>
                     <?php }?>
                     </div>
                  <?php }?>
            </div>
		<?php }?>
		<?php if (isset($_smarty_tpl->tpl_vars['subcategories']->value)) {?>
		<!-- Subcategories -->
			<?php if (isset($_smarty_tpl->tpl_vars['theme_settings']->value)&&($_smarty_tpl->tpl_vars['theme_settings']->value['subcategories']==1)) {?>
			<div id="subcategories">
				<h3 class="subcategory-heading"><?php echo smartyTranslate(array('s'=>'Subcategories'),$_smarty_tpl);?>
</h3>
				<ul class="inline_list">
				<?php  $_smarty_tpl->tpl_vars['subcategory'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['subcategory']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['subcategories']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['subcategory']->key => $_smarty_tpl->tpl_vars['subcategory']->value) {
$_smarty_tpl->tpl_vars['subcategory']->_loop = true;
?>
					<li>
	                	<div class="subcategory-image">
							<a class="img" href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value->getCategoryLink($_smarty_tpl->tpl_vars['subcategory']->value['id_category'],$_smarty_tpl->tpl_vars['subcategory']->value['link_rewrite']), ENT_QUOTES, 'UTF-8', true);?>
" title="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['subcategory']->value['name'], ENT_QUOTES, 'UTF-8', true);?>
" class="img">
							<?php if ($_smarty_tpl->tpl_vars['subcategory']->value['id_image']) {?>
								<img class="replace-2x" src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value->getCatImageLink($_smarty_tpl->tpl_vars['subcategory']->value['link_rewrite'],$_smarty_tpl->tpl_vars['subcategory']->value['id_image'],('category_').($_smarty_tpl->tpl_vars['cookie']->value->img_name)), ENT_QUOTES, 'UTF-8', true);?>
" alt="" width="<?php echo $_smarty_tpl->tpl_vars['categorySize']->value['width'];?>
" height="<?php echo $_smarty_tpl->tpl_vars['categorySize']->value['height'];?>
" />
							<?php } else { ?>
								<img class="replace-2x" src="<?php echo $_smarty_tpl->tpl_vars['img_cat_dir']->value;?>
default-category_<?php echo $_smarty_tpl->tpl_vars['cookie']->value->img_name;?>
.jpg" alt="" width="<?php echo $_smarty_tpl->tpl_vars['mediumSize']->value['width'];?>
" height="<?php echo $_smarty_tpl->tpl_vars['mediumSize']->value['height'];?>
" />
							<?php }?>
						</a>
	                   	</div>
						<h5><a class="subcategory-name" href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value->getCategoryLink($_smarty_tpl->tpl_vars['subcategory']->value['id_category'],$_smarty_tpl->tpl_vars['subcategory']->value['link_rewrite']), ENT_QUOTES, 'UTF-8', true);?>
"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['truncate'][0][0]->smarty_modifier_truncate(htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['truncate'][0][0]->smarty_modifier_truncate($_smarty_tpl->tpl_vars['subcategory']->value['name'],25,'...'), ENT_QUOTES, 'UTF-8', true),350);?>
</a></h5>
						<?php if ($_smarty_tpl->tpl_vars['subcategory']->value['description']) {?>
							<div class="cat_desc"><?php echo $_smarty_tpl->tpl_vars['subcategory']->value['description'];?>
</div>
						<?php }?>
					</li>
				<?php } ?>
				</ul>
			</div>
			<?php }?>
		<?php }?>

		<?php if ($_smarty_tpl->tpl_vars['products']->value) {?>
			<div class="content_sortPagiBar">				
				<div class="sortPagiBar clearfix">
					<div class="views_float">
						<?php echo $_smarty_tpl->getSubTemplate ("./product-compare.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

						<?php echo $_smarty_tpl->getSubTemplate ("./product-sort.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
											
					</div>
					<?php if (isset($_smarty_tpl->tpl_vars['theme_settings']->value['allcookies']['listingView'])) {?>
						<?php if ($_smarty_tpl->tpl_vars['theme_settings']->value['allcookies']['listingView']=='view_grid') {?>
							<?php $_smarty_tpl->tpl_vars['view_type'] = new Smarty_variable("view_grid", null, 0);?>
						<?php }?>
						<?php if ($_smarty_tpl->tpl_vars['theme_settings']->value['allcookies']['listingView']=='view_list') {?>
							<?php $_smarty_tpl->tpl_vars['view_type'] = new Smarty_variable("view_list", null, 0);?>
						<?php }?>
					<?php } else { ?>
						<?php if ($_smarty_tpl->tpl_vars['theme_settings']->value['view']=='view_grid') {?>
							<?php $_smarty_tpl->tpl_vars['view_type'] = new Smarty_variable("view_grid", null, 0);?>
						<?php }?>
						<?php if ($_smarty_tpl->tpl_vars['theme_settings']->value['view']=='view_list') {?>
							<?php $_smarty_tpl->tpl_vars['view_type'] = new Smarty_variable("view_list", null, 0);?>
						<?php }?>
					<?php }?>
					<?php if (isset($_smarty_tpl->tpl_vars['theme_settings']->value)&&($_smarty_tpl->tpl_vars['theme_settings']->value['lc_buttons']==1)) {?>
					<div class="views dib">
						<div class="view_btn dib<?php if ($_smarty_tpl->tpl_vars['view_type']->value=='view_grid') {?> active<?php }?> smooth02" id="view_grid" title="grid"></div><span class="grid_title"><?php echo smartyTranslate(array('s'=>'Grid'),$_smarty_tpl);?>
</span>
						<div class="view_btn dib<?php if ($_smarty_tpl->tpl_vars['view_type']->value=='view_list') {?> active<?php }?> smooth02" id="view_list" title="list"></div><span class="list_title"><?php echo smartyTranslate(array('s'=>'List'),$_smarty_tpl);?>
</span>
					</div>					
					<?php }?>
				</div>
			</div>
			<div id="listing_view" class="<?php echo $_smarty_tpl->tpl_vars['view_type']->value;?>
">
				<?php echo $_smarty_tpl->getSubTemplate ("./product-list.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('products'=>$_smarty_tpl->tpl_vars['products']->value), 0);?>

			</div>
			<div class="content_sortPagiBar content_sortPagiBarFooter">
				<div class="sortPagiBar sortPagiBarFooter clearfix">
					<?php echo $_smarty_tpl->getSubTemplate ("./nbr-product-page.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('paginationId'=>'bottom'), 0);?>

					<?php echo $_smarty_tpl->getSubTemplate ("./pagination.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('paginationId'=>'bottom'), 0);?>

				</div>
			</div>
		<?php } else { ?>
			<p class="warning alert alert-warning"><?php echo smartyTranslate(array('s'=>'There are no products in this category.'),$_smarty_tpl);?>
</p>
		<?php }?>
	<?php } elseif ($_smarty_tpl->tpl_vars['category']->value->id) {?>
		<p class="warning alert alert-warning"><?php echo smartyTranslate(array('s'=>'This category is currently unavailable.'),$_smarty_tpl);?>
</p>
	<?php }?>
<?php }?><?php }} ?>
