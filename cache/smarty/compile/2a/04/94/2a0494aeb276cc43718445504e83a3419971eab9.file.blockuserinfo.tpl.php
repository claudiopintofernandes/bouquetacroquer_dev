<?php /* Smarty version Smarty-3.1.19, created on 2016-03-08 01:59:36
         compiled from "/srv/data/web/vhosts/www.bouquetacroquer.fr/htdocs/themes/alysum/modules/blockuserinfo/blockuserinfo.tpl" */ ?>
<?php /*%%SmartyHeaderCode:175949421156de23f82512a7-85087269%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2a0494aeb276cc43718445504e83a3419971eab9' => 
    array (
      0 => '/srv/data/web/vhosts/www.bouquetacroquer.fr/htdocs/themes/alysum/modules/blockuserinfo/blockuserinfo.tpl',
      1 => 1453302234,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '175949421156de23f82512a7-85087269',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'logged' => 0,
    'link' => 0,
    'cookie' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_56de23f828e026_59017238',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56de23f828e026_59017238')) {function content_56de23f828e026_59017238($_smarty_tpl) {?><!-- Block user information module HEADER -->
<div id="header_user" class="dib">
	<ul id="header_nav">				
		<li id="header_user_info">
			<svg class="svgic main_color svgic-login"><use xlink:href="#si-login"></use></svg>
			<?php if ($_smarty_tpl->tpl_vars['logged']->value) {?>
				<a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value->getPageLink('my-account',true), ENT_QUOTES, 'UTF-8', true);?>
" class="account main_color_hvr main_color" rel="nofollow"><?php echo $_smarty_tpl->tpl_vars['cookie']->value->customer_firstname;?>
 <?php echo $_smarty_tpl->tpl_vars['cookie']->value->customer_lastname;?>
</a>
				<a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value->getPageLink('index',true,null,"mylogout"), ENT_QUOTES, 'UTF-8', true);?>
" title="<?php echo smartyTranslate(array('s'=>'Log me out','mod'=>'blockuserinfo'),$_smarty_tpl);?>
" class="logout main_color_hvr" rel="nofollow"><?php echo smartyTranslate(array('s'=>'Sign out','mod'=>'blockuserinfo'),$_smarty_tpl);?>
</a>
			<?php } else { ?>
				<a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value->getPageLink('my-account',true), ENT_QUOTES, 'UTF-8', true);?>
" class="login main_color_hvr" rel="nofollow"><?php echo smartyTranslate(array('s'=>'Sign in','mod'=>'blockuserinfo'),$_smarty_tpl);?>
</a> <?php echo smartyTranslate(array('s'=>'or','mod'=>'blockuserinfo'),$_smarty_tpl);?>
 <a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value->getPageLink('my-account',true), ENT_QUOTES, 'UTF-8', true);?>
" class="login main_color_hvr"><?php echo smartyTranslate(array('s'=>'Register','mod'=>'blockuserinfo'),$_smarty_tpl);?>
</a>
			<?php }?>
		</li>
	</ul>
</div>
<!-- /Block user information module HEADER --><?php }} ?>
