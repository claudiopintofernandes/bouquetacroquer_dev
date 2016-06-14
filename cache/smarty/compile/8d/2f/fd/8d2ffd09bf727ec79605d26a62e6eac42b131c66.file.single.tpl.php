<?php /* Smarty version Smarty-3.1.19, created on 2016-03-08 03:32:04
         compiled from "/srv/data/web/vhosts/www.bouquetacroquer.fr/htdocs/modules/ph_simpleblog/views/templates/front/single.tpl" */ ?>
<?php /*%%SmartyHeaderCode:86552269856de39a423f014-51172231%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8d2ffd09bf727ec79605d26a62e6eac42b131c66' => 
    array (
      0 => '/srv/data/web/vhosts/www.bouquetacroquer.fr/htdocs/modules/ph_simpleblog/views/templates/front/single.tpl',
      1 => 1453301944,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '86552269856de39a423f014-51172231',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'navigationPipe' => 0,
    'post' => 0,
    'is_16' => 0,
    'tag' => 0,
    'lang_iso' => 0,
    'cookie' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_56de39a43a08c1_08658103',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56de39a43a08c1_08658103')) {function content_56de39a43a08c1_08658103($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/srv/data/web/vhosts/www.bouquetacroquer.fr/htdocs/tools/smarty/plugins/modifier.date_format.php';
?><?php if (Configuration::get('PH_BLOG_DISPLAY_BREADCRUMBS')) {?>
	<?php $_smarty_tpl->_capture_stack[0][] = array('path', null, null); ob_start(); ?>
		<a href="<?php echo ph_simpleblog::getLink();?>
"><?php echo smartyTranslate(array('s'=>'Blog','mod'=>'ph_simpleblog'),$_smarty_tpl);?>
</a>
		<span class="navigation-pipe"><?php echo $_smarty_tpl->tpl_vars['navigationPipe']->value;?>
</span> <a href="<?php echo $_smarty_tpl->tpl_vars['post']->value->category_url;?>
"><?php echo $_smarty_tpl->tpl_vars['post']->value->category;?>
</a>
		<span class="navigation-pipe"><?php echo $_smarty_tpl->tpl_vars['navigationPipe']->value;?>
</span> <?php echo $_smarty_tpl->tpl_vars['post']->value->meta_title;?>

	<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>
	<?php if (!$_smarty_tpl->tpl_vars['is_16']->value) {?><?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tpl_dir']->value)."./breadcrumb.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }?>
<?php }?>

<div class="ph_simpleblog simpleblog-single" data-postid="<?php echo $_smarty_tpl->tpl_vars['post']->value->id_simpleblog_post;?>
">
	<div class="img_container">
		<img src="<?php echo $_smarty_tpl->tpl_vars['post']->value->banner;?>
" alt="<?php echo $_smarty_tpl->tpl_vars['post']->value->meta_title;?>
" title="<?php echo $_smarty_tpl->tpl_vars['post']->value->meta_title;?>
" />
	</div>	
	<div class="blog-info">
		<?php if (Configuration::get('PH_BLOG_DISPLAY_DATE')) {?>
		<div class="blog-date main_bg">
			<div><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['post']->value->date_add,"%e <span>%b</span>");?>
</div>
		</div>
		<?php }?>					
		<div class="blog-post-likes likes_<?php echo $_smarty_tpl->tpl_vars['post']->value->id_simpleblog_post;?>
" onclick="addRating(<?php echo $_smarty_tpl->tpl_vars['post']->value->id_simpleblog_post;?>
);"><svg class="svgic svgic-like"><use xlink:href="#si-like"></use></svg><div class="lmromandemi"><?php echo $_smarty_tpl->tpl_vars['post']->value->likes;?>
</div></div>

		<div class="post-additional-info">
			<?php if (isset($_smarty_tpl->tpl_vars['post']->value->author)&&!empty($_smarty_tpl->tpl_vars['post']->value->author)&&Configuration::get('PH_BLOG_DISPLAY_AUTHOR')) {?>
				<span class="post-author">
					<?php echo $_smarty_tpl->tpl_vars['post']->value->author;?>
 
				</span>
			<?php }?>

			<?php if (Configuration::get('PH_BLOG_DISPLAY_CATEGORY')) {?>
				<span class="post-category">
					<a href="<?php echo $_smarty_tpl->tpl_vars['post']->value->category_url;?>
" title=""><?php echo $_smarty_tpl->tpl_vars['post']->value->category;?>
</a>
				</span>
			<?php }?>			

			<?php if ($_smarty_tpl->tpl_vars['post']->value->tags&&Configuration::get('PH_BLOG_DISPLAY_TAGS')&&isset($_smarty_tpl->tpl_vars['post']->value->tags_list)) {?>
				<span class="post-tags clear">
					<?php  $_smarty_tpl->tpl_vars['tag'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['tag']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['post']->value->tags_list; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
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
		</div><!-- .additional-info -->

	</div>	
	<div class="post-content">
		<h1><?php echo $_smarty_tpl->tpl_vars['post']->value->meta_title;?>
</h1>
		<div class="post-content"><?php echo $_smarty_tpl->tpl_vars['post']->value->content;?>
</div>
	</div><!-- .post-content -->

	<?php if (Configuration::get('PH_BLOG_DISPLAY_SHARER')) {?>
		<div class="post-share-buttons">
			<div class="fb-like" data-href="http://<?php echo $_SERVER['HTTP_HOST'];?>
<?php echo $_SERVER['REQUEST_URI'];?>
" data-width="80" data-height="20" data-colorscheme="light" data-layout="button_count" data-action="like" data-show-faces="false" data-send="false"></div>
			<a href="https://twitter.com/share" class="twitter-share-button" data-url="http://<?php echo $_SERVER['HTTP_HOST'];?>
<?php echo $_SERVER['REQUEST_URI'];?>
">Tweet</a>
			<div class="g-plusone" data-size="medium" data-annotation="none" data-href="http://<?php echo $_SERVER['HTTP_HOST'];?>
<?php echo $_SERVER['REQUEST_URI'];?>
"></div>
		</div><!-- .share-buttons -->
	<?php }?>

	<?php if (Configuration::get('PH_BLOG_FB_COMMENTS')) {?>
		<div class="fb-comments" data-href="http://<?php echo $_SERVER['HTTP_HOST'];?>
<?php echo $_SERVER['REQUEST_URI'];?>
" data-colorscheme="light" data-numposts="5" data-width="535"></div>
	<?php }?>
</div><!-- .ph_simpleblog -->

<?php if (Configuration::get('PH_BLOG_FB_INIT')) {?>
<script>
var lang_iso = '<?php echo $_smarty_tpl->tpl_vars['lang_iso']->value;?>
_<?php echo strtoupper($_smarty_tpl->tpl_vars['lang_iso']->value);?>
';
(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/"+lang_iso+"/all.js#xfbml=1";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));

</script>
<?php }?>

<script>
$(function() {
	$('body').addClass('simpleblog simpleblog-single');
});

!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');

(function() {
    var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
    po.src = 'https://apis.google.com/js/plusone.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
})();

$(document).ready(function(){
	var pid = $(".ph_simpleblog").data("postid");
	if ($.cookie('guest_<?php echo $_smarty_tpl->tpl_vars['cookie']->value->id_guest;?>
_'+pid) == "voted") {
		$(".blog-post-likes").addClass("voted");
	}
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
					$(".blog-post-likes").addClass("voted");
					$(".blog-post-likes div").text(data.message);
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
					$(".blog-post-likes").removeClass("voted");
					$(".blog-post-likes div").text(data.message);
				} else {
					alert(data.message);
				}
		    }
		});
	}
	return false;
}
</script><?php }} ?>
