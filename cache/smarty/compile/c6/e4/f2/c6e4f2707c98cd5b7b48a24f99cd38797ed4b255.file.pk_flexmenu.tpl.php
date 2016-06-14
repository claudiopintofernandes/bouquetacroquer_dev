<?php /* Smarty version Smarty-3.1.19, created on 2016-03-08 01:59:44
         compiled from "/srv/data/web/vhosts/www.bouquetacroquer.fr/htdocs/modules/pk_flexmenu/pk_flexmenu.tpl" */ ?>
<?php /*%%SmartyHeaderCode:107303814856de2400d8f3b3-11678064%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c6e4f2707c98cd5b7b48a24f99cd38797ed4b255' => 
    array (
      0 => '/srv/data/web/vhosts/www.bouquetacroquer.fr/htdocs/modules/pk_flexmenu/pk_flexmenu.tpl',
      1 => 1453301966,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '107303814856de2400d8f3b3-11678064',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'base_dir' => 0,
    'shop_name' => 0,
    'logo_url' => 0,
    'theme_settings' => 0,
    'flexmenu' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_56de2400dc4a66_69993350',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56de2400dc4a66_69993350')) {function content_56de2400dc4a66_69993350($_smarty_tpl) {?><div class="flexmenu-container">	
	<div class="page_width">
		<div class="flexmenu">
			<div class="mobileMenuTitle lmromandemi"><?php echo smartyTranslate(array('s'=>'Menu','mod'=>'pk_flexmenu'),$_smarty_tpl);?>
</div>
			<ul class="flexmenu_ul">
				<li class="menu_logo">
					<a href="<?php echo $_smarty_tpl->tpl_vars['base_dir']->value;?>
" title="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['shop_name']->value, ENT_QUOTES, 'UTF-8', true);?>
">
						<img src="<?php echo $_smarty_tpl->tpl_vars['logo_url']->value;?>
" alt="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['shop_name']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" <?php if (isset($_smarty_tpl->tpl_vars['theme_settings']->value['logo_type'])&&$_smarty_tpl->tpl_vars['theme_settings']->value['logo_type']==1) {?>hidden<?php }?> />
						<span id="logo-text" class="<?php if (isset($_smarty_tpl->tpl_vars['theme_settings']->value['logo_type'])&&$_smarty_tpl->tpl_vars['theme_settings']->value['logo_type']==0) {?>hidden<?php }?>">
								<?php if (isset($_smarty_tpl->tpl_vars['theme_settings']->value['logo_text'])) {?><span class="logo main_color"><?php echo $_smarty_tpl->tpl_vars['theme_settings']->value['logo_text'];?>
</span><?php }?>
						</span>	
					</a>
				</li>
				<?php echo $_smarty_tpl->tpl_vars['flexmenu']->value;?>

			</ul>
		</div>
	</div>
</div><?php }} ?>
