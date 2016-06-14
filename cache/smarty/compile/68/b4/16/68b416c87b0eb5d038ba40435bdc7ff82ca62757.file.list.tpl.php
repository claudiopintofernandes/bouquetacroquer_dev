<?php /* Smarty version Smarty-3.1.19, created on 2016-03-10 01:34:57
         compiled from "/srv/data/web/vhosts/www.bouquetacroquer.fr/htdocs/modules/ph_simpleblog/views/templates/front/list.tpl" */ ?>
<?php /*%%SmartyHeaderCode:41740829956e0c131b4cef7-19013894%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '68b416c87b0eb5d038ba40435bdc7ff82ca62757' => 
    array (
      0 => '/srv/data/web/vhosts/www.bouquetacroquer.fr/htdocs/modules/ph_simpleblog/views/templates/front/list.tpl',
      1 => 1453301943,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '41740829956e0c131b4cef7-19013894',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'is_category' => 0,
    'navigationPipe' => 0,
    'blogCategory' => 0,
    'is_16' => 0,
    'posts' => 0,
    'blogMainTitle' => 0,
    'gridHtmlCols' => 0,
    'post' => 0,
    'tag' => 0,
    'cookie' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_56e0c131d449f5_08925342',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56e0c131d449f5_08925342')) {function content_56e0c131d449f5_08925342($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/srv/data/web/vhosts/www.bouquetacroquer.fr/htdocs/tools/smarty/plugins/modifier.date_format.php';
?><?php if (Configuration::get('PH_BLOG_DISPLAY_BREADCRUMBS')) {?>
	<?php $_smarty_tpl->_capture_stack[0][] = array('path', null, null); ob_start(); ?>
		<a href="<?php echo ph_simpleblog::getLink();?>
"><?php echo smartyTranslate(array('s'=>'Blog','mod'=>'ph_simpleblog'),$_smarty_tpl);?>
</a>
		<?php if ($_smarty_tpl->tpl_vars['is_category']->value==true) {?>
			<span class="navigation-pipe"><?php echo $_smarty_tpl->tpl_vars['navigationPipe']->value;?>
</span><?php echo $_smarty_tpl->tpl_vars['blogCategory']->value->name;?>

		<?php }?>
	<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>
	<?php if (!$_smarty_tpl->tpl_vars['is_16']->value) {?><?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tpl_dir']->value)."./breadcrumb.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }?>
<?php }?>

<?php if (isset($_smarty_tpl->tpl_vars['posts']->value)&&count($_smarty_tpl->tpl_vars['posts']->value)>0) {?>
<div class="ph_simpleblog simpleblog-<?php if ($_smarty_tpl->tpl_vars['is_category']->value) {?>category<?php } else { ?>home<?php }?>">
	<?php if ($_smarty_tpl->tpl_vars['is_category']->value==true) {?>
	<?php if (Configuration::get('PH_BLOG_DISPLAY_CATEGORY_IMAGE')&&isset($_smarty_tpl->tpl_vars['blogCategory']->value->image)) {?>
		<div class="simpleblog-category-image">
			<img src="<?php echo $_smarty_tpl->tpl_vars['blogCategory']->value->image;?>
" alt="<?php echo $_smarty_tpl->tpl_vars['blogCategory']->value->name;?>
" class="img-responsive" />
		</div>
		<?php }?>
		<h1><?php echo $_smarty_tpl->tpl_vars['blogCategory']->value->name;?>
</h1>		
		<?php if (!empty($_smarty_tpl->tpl_vars['blogCategory']->value->description)&&Configuration::get('PH_BLOG_DISPLAY_CAT_DESC')) {?>
		<div class="ph_cat_description">
			<?php echo $_smarty_tpl->tpl_vars['blogCategory']->value->description;?>

		</div>
		<?php }?>
	<?php } else { ?>
		<h1><?php echo $_smarty_tpl->tpl_vars['blogMainTitle']->value;?>
</h1>
	<?php }?>

	<div class="ph_row">
		<?php  $_smarty_tpl->tpl_vars['post'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['post']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['posts']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['post']->key => $_smarty_tpl->tpl_vars['post']->value) {
$_smarty_tpl->tpl_vars['post']->_loop = true;
?>
		<div class="<?php echo $_smarty_tpl->tpl_vars['gridHtmlCols']->value;?>
 post-container" data-postid="<?php echo $_smarty_tpl->tpl_vars['post']->value['id_simpleblog_post'];?>
">
			<?php if ($_smarty_tpl->tpl_vars['gridHtmlCols']->value=="ph_col_medium") {?> <!--MEDIUM-->
				<div class="blog-info">
					<?php if (Configuration::get('PH_BLOG_DISPLAY_DATE')) {?>
					<div class="blog-date main_bg">
						<div><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['post']->value['date_add'],"%e <span>%b</span>");?>
</div>
					</div>
					<?php }?>					
					<div class="blog-post-likes likes_<?php echo $_smarty_tpl->tpl_vars['post']->value['id_simpleblog_post'];?>
" onclick="addRating(<?php echo $_smarty_tpl->tpl_vars['post']->value['id_simpleblog_post'];?>
);"><svg class="svgic svgic-like smooth05"><use xlink:href="#si-like"></use></svg><div class="lmromandemi"><?php echo $_smarty_tpl->tpl_vars['post']->value['likes'];?>
</div></div>
				</div>
			<?php }?>
			<div class="post-item">
				<?php if (isset($_smarty_tpl->tpl_vars['post']->value['banner'])&&Configuration::get('PH_BLOG_DISPLAY_THUMBNAIL')) {?>
					<figure>
						<a href="<?php echo $_smarty_tpl->tpl_vars['post']->value['banner'];?>
" class="blog-main-image" title="">
							<?php if ((Configuration::get('PH_BLOG_LIST_LAYOUT')=='full')||(Configuration::get('PH_BLOG_LIST_LAYOUT')=='full_medium')) {?>
								<img src="<?php echo $_smarty_tpl->tpl_vars['post']->value['banner_wide'];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['post']->value['meta_title'];?>
" class="img-responsive" />
							<?php } else { ?>
								<img src="<?php echo $_smarty_tpl->tpl_vars['post']->value['banner_thumb'];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['post']->value['meta_title'];?>
" class="img-responsive" />
							<?php }?>
						</a>
						<?php if ($_smarty_tpl->tpl_vars['gridHtmlCols']->value=="ph_col_small") {?> <!--MEDIUM-->
							<div class="blog-info">
								<?php if (Configuration::get('PH_BLOG_DISPLAY_DATE')) {?>
								<div class="blog-date main_bg">
									<div><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['post']->value['date_add'],"%e <span>%b</span>");?>
</div>
								</div>
								<?php }?>					
								<div class="blog-post-likes likes_<?php echo $_smarty_tpl->tpl_vars['post']->value['id_simpleblog_post'];?>
" onclick="addRating(<?php echo $_smarty_tpl->tpl_vars['post']->value['id_simpleblog_post'];?>
);"><svg class="svgic svgic-like smooth05"><use xlink:href="#si-like"></use></svg><div class="lmromandemi"><?php echo $_smarty_tpl->tpl_vars['post']->value['likes'];?>
</div></div>
							</div>
						<?php }?>
					</figure>
				<?php }?>
				<div class="post-additional-info">
					<?php if ($_smarty_tpl->tpl_vars['gridHtmlCols']->value=="ph_col") {?> <!--NOT MEDIUM-->
						<?php if (Configuration::get('PH_BLOG_DISPLAY_DATE')) {?>
						<div class="blog-date main_bg">
							<div><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['post']->value['date_add'],"%e <span>%b</span>");?>
</div>
						</div>
						<?php }?>					
						<div class="blog-post-likes likes_<?php echo $_smarty_tpl->tpl_vars['post']->value['id_simpleblog_post'];?>
" onclick="addRating(<?php echo $_smarty_tpl->tpl_vars['post']->value['id_simpleblog_post'];?>
);"><svg class="svgic svgic-like smooth05"><use xlink:href="#si-like"></use></svg><div class="lmromandemi"><?php echo $_smarty_tpl->tpl_vars['post']->value['likes'];?>
</div></div>
					<?php }?>					
					<?php if (($_smarty_tpl->tpl_vars['gridHtmlCols']->value=="ph_col_medium")||($_smarty_tpl->tpl_vars['gridHtmlCols']->value=="ph_col_small")) {?> <!--MEDIUM SMALL-->
					<h2>
						<a href="<?php echo $_smarty_tpl->tpl_vars['post']->value['url'];?>
" title="<?php echo $_smarty_tpl->tpl_vars['post']->value['meta_title'];?>
"><?php echo $_smarty_tpl->tpl_vars['post']->value['meta_title'];?>
</a>
					</h2>
					<?php }?>
					<div class="blog-post-data">
						<?php if (isset($_smarty_tpl->tpl_vars['post']->value['author'])&&!empty($_smarty_tpl->tpl_vars['post']->value['author'])&&Configuration::get('PH_BLOG_DISPLAY_AUTHOR')) {?>
							<span class="post-author">
								<?php echo $_smarty_tpl->tpl_vars['post']->value['author'];?>

							</span>
						<?php }?>
						<?php if ($_smarty_tpl->tpl_vars['is_category']->value==false&&Configuration::get('PH_BLOG_DISPLAY_CATEGORY')) {?>
							<span class="post-category">
								<a href="<?php echo $_smarty_tpl->tpl_vars['post']->value['category_url'];?>
" title=""><?php echo $_smarty_tpl->tpl_vars['post']->value['category'];?>
</a>
							</span>
						<?php }?>					

						<?php if (isset($_smarty_tpl->tpl_vars['post']->value['tags'])&&$_smarty_tpl->tpl_vars['post']->value['tags']&&Configuration::get('PH_BLOG_DISPLAY_TAGS')) {?>
							<span class="post-tags clear dib">
								<?php  $_smarty_tpl->tpl_vars['tag'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['tag']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['post']->value['tags']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['tag']->total= $_smarty_tpl->_count($_from);
 $_smarty_tpl->tpl_vars['tag']->iteration=0;
foreach ($_from as $_smarty_tpl->tpl_vars['tag']->key => $_smarty_tpl->tpl_vars['tag']->value) {
$_smarty_tpl->tpl_vars['tag']->_loop = true;
 $_smarty_tpl->tpl_vars['tag']->iteration++;
 $_smarty_tpl->tpl_vars['tag']->last = $_smarty_tpl->tpl_vars['tag']->iteration === $_smarty_tpl->tpl_vars['tag']->total;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['tagsLoop']['last'] = $_smarty_tpl->tpl_vars['tag']->last;
?>
									<?php echo $_smarty_tpl->tpl_vars['tag']->value;?>
<?php if (!$_smarty_tpl->getVariable('smarty')->value['foreach']['tagsLoop']['last']) {?>, <?php }?>
								<?php } ?>
							</span>
						<?php }?>
					</div>
				</div><!-- .additional-info -->

				<div class="post-info">
					<?php if (($_smarty_tpl->tpl_vars['gridHtmlCols']->value=="ph_col")||(Configuration::get('PH_BLOG_LIST_LAYOUT')=='grid')) {?> <!--BIG-->
					<h2>
						<a href="<?php echo $_smarty_tpl->tpl_vars['post']->value['url'];?>
" title="<?php echo $_smarty_tpl->tpl_vars['post']->value['meta_title'];?>
"><?php echo $_smarty_tpl->tpl_vars['post']->value['meta_title'];?>
</a>
					</h2>
					<?php }?>
					<?php if (Configuration::get('PH_BLOG_DISPLAY_DESCRIPTION')) {?>
						<?php echo $_smarty_tpl->tpl_vars['post']->value['short_content'];?>

					<?php }?><br/>
					<a href="<?php echo $_smarty_tpl->tpl_vars['post']->value['url'];?>
" class="button" title="<?php echo smartyTranslate(array('s'=>'Permalink to','mod'=>'ph_simpleblog'),$_smarty_tpl);?>
 <?php echo $_smarty_tpl->tpl_vars['post']->value['meta_title'];?>
"><?php echo smartyTranslate(array('s'=>'Read more','mod'=>'ph_simpleblog'),$_smarty_tpl);?>
</a>
				</div>	
				<div class="clearfix"></div>
			</div>
			<div class="clearfix"></div>
		</div><!-- .ph_col -->
		<?php } ?>
	</div><!-- .ph_row -->
		
	<?php if ($_smarty_tpl->tpl_vars['is_category']->value) {?>
		<?php echo $_smarty_tpl->getSubTemplate ("./pagination.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('rewrite'=>$_smarty_tpl->tpl_vars['blogCategory']->value->link_rewrite,'type'=>'category'), 0);?>

	<?php } else { ?>
		<?php echo $_smarty_tpl->getSubTemplate ("./pagination.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('rewrite'=>false,'type'=>false), 0);?>

	<?php }?>
</div><!-- .ph_simpleblog -->
<?php } else { ?>
	<p class="warning"><?php echo smartyTranslate(array('s'=>'There are no posts','mod'=>'ph_simpleblog'),$_smarty_tpl);?>
</p>
<?php }?>
<script>
var currentBlog = '<?php if ($_smarty_tpl->tpl_vars['is_category']->value) {?>category<?php } else { ?>home<?php }?>';
$(window).load(function() {
	$('body').addClass('simpleblog simpleblog-'+currentBlog);
});

$(document).ready(function(){
	$.each($(".post-container"), function( index, value ) {
		  var pid = $(value).data("postid");
		  if ($.cookie('guest_<?php echo $_smarty_tpl->tpl_vars['cookie']->value->id_guest;?>
_'+pid) == "voted") {
			$(".likes_"+pid).addClass("voted");
		}
	});	
});
function addRating(item_id){	
	if ($.cookie('guest_<?php echo $_smarty_tpl->tpl_vars['cookie']->value->id_guest;?>
_'+item_id) != "voted") {
		$.cookie('guest_<?php echo $_smarty_tpl->tpl_vars['cookie']->value->id_guest;?>
_'+item_id, 'voted');
		var request = $.ajax({
		  type: "POST",
		  url: baseDir+'modules/ph_simpleblog/ajax.php',
		  data: { 
		  	action:'addRating',
			item_id : item_id 
		  },
		  success: function(result){             
		    	var data = $.parseJSON(result);
				if (data.status == 'success') {		
					$(".likes_"+item_id+" div").text(data.message);
					$(".likes_"+item_id).addClass("voted");
				} else {
					alert(data.message);
				}
		    }
		}); 		
	} else {
		$.cookie('guest_<?php echo $_smarty_tpl->tpl_vars['cookie']->value->id_guest;?>
_'+item_id, '');
		var request = $.ajax({
		  type: "POST",
		  url: baseDir+'modules/ph_simpleblog/ajax.php',
		  data: { 
		  	action:'removeRating',
			item_id : item_id 
			},
		  success: function(result){             
		    	var data = $.parseJSON(result);
				if (data.status == 'success') {		
					$(".likes_"+item_id).removeClass("voted");
					$(".likes_"+item_id+" div").text(data.message);
				} else {
					alert(data.message);
				}
		    }
		});
	}
	return false;
}

</script><?php }} ?>
