<?php /* Smarty version Smarty-3.1.19, created on 2016-03-08 01:59:42
         compiled from "/srv/data/web/vhosts/www.bouquetacroquer.fr/htdocs/modules/pk_blockfacebooklike/pk_blockfacebooklike.tpl" */ ?>
<?php /*%%SmartyHeaderCode:200745598956de23fe35b783-56315695%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9462eeecf9c632d16361eaa767d178d14b855ba5' => 
    array (
      0 => '/srv/data/web/vhosts/www.bouquetacroquer.fr/htdocs/modules/pk_blockfacebooklike/pk_blockfacebooklike.tpl',
      1 => 1453301958,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '200745598956de23fe35b783-56315695',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'FB_page_URL' => 0,
    'company_logo' => 0,
    'FB_data' => 0,
    'company_name' => 0,
    'show_faces' => 0,
    'err' => 0,
    'modulePath' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_56de23fe3a8021_81393116',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56de23fe3a8021_81393116')) {function content_56de23fe3a8021_81393116($_smarty_tpl) {?><div class="block facebook-box">
	<h4 class="dropdown-cntrl dd_el_mobile"><?php echo smartyTranslate(array('s'=>'Facebook','mod'=>'pk_blockfacebooklike'),$_smarty_tpl);?>
</h4>
	<div class="dropdown-content dd_container_mobile">
		<a href="<?php echo $_smarty_tpl->tpl_vars['FB_page_URL']->value;?>
" target="_blank" class="likeButton sec_bg main_bg_hvr"><?php echo smartyTranslate(array('s'=>'Like','mod'=>'pk_blockfacebooklike'),$_smarty_tpl);?>
</a>
		<div class="block_content">
			<div class="fb_info_top">
				<?php if ($_smarty_tpl->tpl_vars['company_logo']->value) {?>
				<img src="https://graph.facebook.com/<?php echo $_smarty_tpl->tpl_vars['FB_data']->value['id'];?>
/picture" alt="" class="fb_avatar" />
				<?php }?>
				<div class="fb_info">
					<?php if ($_smarty_tpl->tpl_vars['company_name']->value) {?>
					<div><?php echo $_smarty_tpl->tpl_vars['FB_data']->value['name'];?>
</div>
					<?php }?>				
				</div>
			</div>
			<div class="fb_fans"><?php echo smartyTranslate(array('s'=>'%s people like','sprintf'=>$_smarty_tpl->tpl_vars['FB_data']->value['likes'],'mod'=>'pk_blockfacebooklike'),$_smarty_tpl);?>
 <a href="<?php echo $_smarty_tpl->tpl_vars['FB_page_URL']->value;?>
" target="_blank"><?php echo $_smarty_tpl->tpl_vars['FB_data']->value['name'];?>
</a></div>
			<?php if ($_smarty_tpl->tpl_vars['show_faces']->value) {?>
			<div class="hidden"><?php echo $_smarty_tpl->tpl_vars['err']->value;?>
</div>
			<ul class="fb_followers">
				<?php if (file_exists($_smarty_tpl->tpl_vars['modulePath']->value)) {?> 
					<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['modulePath']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

				<?php }?>
			</ul>
			<?php }?>
		</div>
	</div>
</div>
<?php }} ?>
