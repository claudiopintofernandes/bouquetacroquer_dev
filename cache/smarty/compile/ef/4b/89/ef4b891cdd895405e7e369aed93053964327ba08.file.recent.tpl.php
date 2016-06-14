<?php /* Smarty version Smarty-3.1.19, created on 2016-03-08 02:15:40
         compiled from "/srv/data/web/vhosts/www.bouquetacroquer.fr/htdocs/modules/ph_recentposts/views/templates/hook/recent.tpl" */ ?>
<?php /*%%SmartyHeaderCode:155554876456de27bc466d26-73493000%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ef4b891cdd895405e7e369aed93053964327ba08' => 
    array (
      0 => '/srv/data/web/vhosts/www.bouquetacroquer.fr/htdocs/modules/ph_recentposts/views/templates/hook/recent.tpl',
      1 => 1453301932,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '155554876456de27bc466d26-73493000',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'page_name' => 0,
    'posts' => 0,
    'gridHtmlCols' => 0,
    'post' => 0,
    'tag' => 0,
    'cookie' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_56de27bc51dfa4_95391838',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56de27bc51dfa4_95391838')) {function content_56de27bc51dfa4_95391838($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/srv/data/web/vhosts/www.bouquetacroquer.fr/htdocs/tools/smarty/plugins/modifier.date_format.php';
?><?php if ($_smarty_tpl->tpl_vars['page_name']->value=="index") {?>
<div class="ph_simpleblog simpleblog-recent homemodule load-animate">
	<?php if (isset($_smarty_tpl->tpl_vars['posts']->value)&&count($_smarty_tpl->tpl_vars['posts']->value)>0) {?>
	<table class="title-table">
      <tr>
        <td class="w50p"><span class="right-wing title-wing"></span></td>
        <td class="carousel-title"><h3 class="lmroman"><?php echo smartyTranslate(array('s'=>'Recent posts','mod'=>'ph_recentposts'),$_smarty_tpl);?>
</h3></td>
        <td class="w50p"><span class="left-wing title-wing"></span></td>
      </tr>
    </table>
	<div class="ph_row simpleblog-recentposts">
		<?php  $_smarty_tpl->tpl_vars['post'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['post']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['posts']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['post']->key => $_smarty_tpl->tpl_vars['post']->value) {
$_smarty_tpl->tpl_vars['post']->_loop = true;
?>
		<div class="post-item <?php echo $_smarty_tpl->tpl_vars['gridHtmlCols']->value;?>
 post-item-<?php echo $_smarty_tpl->tpl_vars['post']->value['id_simpleblog_post'];?>
">
			<div class="post-item" data-postid="<?php echo $_smarty_tpl->tpl_vars['post']->value['id_simpleblog_post'];?>
">
				<?php if (isset($_smarty_tpl->tpl_vars['post']->value['banner'])&&Configuration::get('PH_BLOG_DISPLAY_THUMBNAIL')) {?>
					<figure>
						<a href="<?php echo $_smarty_tpl->tpl_vars['post']->value['url'];?>
" title="" class="blog-main-image" style="background-image: url('<?php echo $_smarty_tpl->tpl_vars['post']->value['banner_wide'];?>
')">
						</a>
						<div class="blog-info">
							<?php if (Configuration::get('PH_BLOG_DISPLAY_DATE')) {?>
							<div class="blog-date main_bg bshadow lmromandemi">
								<div><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['post']->value['date_add'],"%e <span>%b</span>");?>
</div>
							</div>
							<?php }?>					
							<div class="blog-post-likes grayshadow likes_<?php echo $_smarty_tpl->tpl_vars['post']->value['id_simpleblog_post'];?>
" onclick="addRating(<?php echo $_smarty_tpl->tpl_vars['post']->value['id_simpleblog_post'];?>
);"><svg class="svgic svgic-like"><use xlink:href="#si-like"></use></svg><div class="lmromandemi"><?php echo $_smarty_tpl->tpl_vars['post']->value['likes'];?>
</div></div>
						</div>						
					</figure>
				<?php }?>
				<div class="blog-post-info">
					<h2 class="lmroman">
						<a href="<?php echo $_smarty_tpl->tpl_vars['post']->value['url'];?>
" title="<?php echo $_smarty_tpl->tpl_vars['post']->value['meta_title'];?>
" class="ellipsis"><?php echo $_smarty_tpl->tpl_vars['post']->value['meta_title'];?>
</a>
					</h2>
					<div class="post-additional-info">
						<?php if (isset($_smarty_tpl->tpl_vars['post']->value['author'])&&!empty($_smarty_tpl->tpl_vars['post']->value['author'])&&Configuration::get('PH_BLOG_DISPLAY_AUTHOR')) {?><span class="post-author dib"><?php echo $_smarty_tpl->tpl_vars['post']->value['author'];?>
 </span><?php }?>
						<?php if (($_smarty_tpl->tpl_vars['post']->value['tags'])) {?>
							<span class="post-tags dib"><?php  $_smarty_tpl->tpl_vars['tag'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['tag']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['post']->value['tags']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['tags']['index']=-1;
foreach ($_from as $_smarty_tpl->tpl_vars['tag']->key => $_smarty_tpl->tpl_vars['tag']->value) {
$_smarty_tpl->tpl_vars['tag']->_loop = true;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['tags']['index']++;
?><?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['tags']['index']!=0) {?>, <?php }?><?php echo $_smarty_tpl->tpl_vars['tag']->value;?>
<?php } ?></span>
						<?php }?>
						<span class="post-views dib"><svg class="svgic svgic-eye"><use xlink:href="#si-eye"></use></svg> <?php echo $_smarty_tpl->tpl_vars['post']->value['views'];?>
</span>
					</div><!-- .additional-info -->
					<?php if (Configuration::get('PH_BLOG_DISPLAY_DESCRIPTION')) {?>
						<div class="blog-post-desc"><?php echo substr($_smarty_tpl->tpl_vars['post']->value['short_content'],0,175);?>
<?php if (strlen($_smarty_tpl->tpl_vars['post']->value['short_content'])>175) {?>...<?php }?></div>
					<?php }?>
					<a href="<?php echo $_smarty_tpl->tpl_vars['post']->value['url'];?>
" class="button" title="<?php echo smartyTranslate(array('s'=>'Permalink to','mod'=>'ph_recentposts'),$_smarty_tpl);?>
 <?php echo $_smarty_tpl->tpl_vars['post']->value['meta_title'];?>
"><?php echo smartyTranslate(array('s'=>'Read more','mod'=>'ph_recentposts'),$_smarty_tpl);?>
</a>
				</div>	
				
			</div>
		</div>
		<?php } ?>
	</div><!-- .ph_row -->
	<?php } else { ?>
	<p class="warning"><?php echo smartyTranslate(array('s'=>'There are no posts','mod'=>'ph_recentposts'),$_smarty_tpl);?>
</p>
<?php }?>
</div><!-- .ph_simpleblog -->
<script>
jQuery(document).ready(function() {
	$.each($(".simpleblog-recent .post-item"), function( index, value ) {
		  var pid = $(value).data("postid");
		  if ($.cookie('guest_<?php echo $_smarty_tpl->tpl_vars['cookie']->value->id_guest;?>
_'+pid) == "voted") {
			$(".post-item-"+pid+" .blog-post-likes").addClass("voted");
		}
	});	
  	$(".simpleblog-recentposts").flexisel({
        pref: "recposts",
        visibleItems: 2,
        animationSpeed: 500,
        autoPlay: true,
        autoPlaySpeed: 3000,            
        pauseOnHover: true,
        enableResponsiveBreakpoints: true,
        clone : true,
        responsiveBreakpoints: { 
            portrait: { 
                changePoint:320,
                visibleItems: 1
            }, 
            landscape: { 
                changePoint:480,
                visibleItems: 1
            },
            tablet: { 
                changePoint:768,
                visibleItems: 2
            },
            tablet_land: { 
                changePoint:1001,
                visibleItems: 2
            }
        }
  	});	
  	$(".simpleblog-recent").find(".flexisel-nav").appendTo(".simpleblog-recent .carousel-title");
});
function addRating(item_id){	
	if ($.cookie('guest_<?php echo $_smarty_tpl->tpl_vars['cookie']->value->id_guest;?>
_'+item_id) != "voted") {
		$.cookie('guest_<?php echo $_smarty_tpl->tpl_vars['cookie']->value->id_guest;?>
_'+item_id, 'voted');
		$.post(baseDir+'modules/ph_simpleblog/ajax.php', {
			action:'addRating',
			item_id : item_id
		}, 
		function (data) {
			if (data.status == 'success') {		
				$(".post-item-"+item_id+" .blog-post-likes").addClass("voted");
				$(".post-item-"+item_id+" .blog-post-likes div").text(data.message);
			} else {
				alert(data.message);
			}
			
		}, 'json');
	} else {
		$.cookie('guest_<?php echo $_smarty_tpl->tpl_vars['cookie']->value->id_guest;?>
_'+item_id, '');
		$.post(baseDir+'modules/ph_simpleblog/ajax.php', {
			action:'removeRating',
			item_id : item_id
		}, 
		function (data) {
			if (data.status == 'success') {		
				$(".post-item-"+item_id+" .blog-post-likes div").text(data.message);
				$(".post-item-"+item_id+" .blog-post-likes").removeClass("voted");
			} else {
				alert(data.message);
			}
			
		}, 'json');
	}
	return false;
}
</script>
<?php }?><?php }} ?>
