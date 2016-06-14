<?php /* Smarty version Smarty-3.1.19, created on 2016-03-08 01:59:44
         compiled from "/srv/data/web/vhosts/www.bouquetacroquer.fr/htdocs/themes/alysum/header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:39331702756de24007bef23-34471707%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4b9182fce4e5a1bd9d3614f9a2fb35c4eebadf50' => 
    array (
      0 => '/srv/data/web/vhosts/www.bouquetacroquer.fr/htdocs/themes/alysum/header.tpl',
      1 => 1453302266,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '39331702756de24007bef23-34471707',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'lang_iso' => 0,
    'meta_title' => 0,
    'meta_description' => 0,
    'meta_keywords' => 0,
    'nobots' => 0,
    'nofollow' => 0,
    'favicon_url' => 0,
    'img_update_time' => 0,
    'theme_settings' => 0,
    'css_files' => 0,
    'css_uri' => 0,
    'media' => 0,
    'HOOK_HEADER' => 0,
    'page_name' => 0,
    'logged' => 0,
    'body_classes' => 0,
    'hide_left_column' => 0,
    'hide_right_column' => 0,
    'content_only' => 0,
    'restricted_country_mode' => 0,
    'geolocation_country' => 0,
    'base_dir' => 0,
    'shop_name' => 0,
    'logo_url' => 0,
    'logo_image_width' => 0,
    'logo_image_height' => 0,
    'HOOK_TOP' => 0,
    'HOOK_LEFT_COLUMN' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_56de24009c31d8_28929510',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56de24009c31d8_28929510')) {function content_56de24009c31d8_28929510($_smarty_tpl) {?><?php if (!is_callable('smarty_function_implode')) include '/srv/data/web/vhosts/www.bouquetacroquer.fr/htdocs/tools/smarty/plugins/function.implode.php';
?><!DOCTYPE HTML>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7 " lang="<?php echo $_smarty_tpl->tpl_vars['lang_iso']->value;?>
"><![endif]-->
<!--[if IE 7]><html class="no-js lt-ie9 lt-ie8 ie7" lang="<?php echo $_smarty_tpl->tpl_vars['lang_iso']->value;?>
"><![endif]-->
<!--[if IE 8]><html class="no-js lt-ie9 ie8" lang="<?php echo $_smarty_tpl->tpl_vars['lang_iso']->value;?>
"><![endif]-->
<!--[if gt IE 8]> <html class="no-js ie9" lang="<?php echo $_smarty_tpl->tpl_vars['lang_iso']->value;?>
"><![endif]-->
<html lang="<?php echo $_smarty_tpl->tpl_vars['lang_iso']->value;?>
">
	<head>
		<meta charset="utf-8" />
		<title><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['meta_title']->value, ENT_QUOTES, 'UTF-8', true);?>
</title>
<?php if (isset($_smarty_tpl->tpl_vars['meta_description']->value)&&$_smarty_tpl->tpl_vars['meta_description']->value) {?>
		<meta name="description" content="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['meta_description']->value, ENT_QUOTES, 'UTF-8', true);?>
" />
<?php }?>
<?php if (isset($_smarty_tpl->tpl_vars['meta_keywords']->value)&&$_smarty_tpl->tpl_vars['meta_keywords']->value) {?>
		<meta name="keywords" content="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['meta_keywords']->value, ENT_QUOTES, 'UTF-8', true);?>
" />
<?php }?>
		<meta name="generator" content="PrestaShop" />
		<meta name="robots" content="<?php if (isset($_smarty_tpl->tpl_vars['nobots']->value)) {?>no<?php }?>index,<?php if (isset($_smarty_tpl->tpl_vars['nofollow']->value)&&$_smarty_tpl->tpl_vars['nofollow']->value) {?>no<?php }?>follow" />
		<meta name="viewport" content="width=device-width, minimum-scale=0.25, maximum-scale=1.6, initial-scale=1.0" /> 
		<link rel="icon" type="image/vnd.microsoft.icon" href="<?php echo $_smarty_tpl->tpl_vars['favicon_url']->value;?>
?<?php echo $_smarty_tpl->tpl_vars['img_update_time']->value;?>
" />
		<link rel="shortcut icon" type="image/x-icon" href="<?php echo $_smarty_tpl->tpl_vars['favicon_url']->value;?>
?<?php echo $_smarty_tpl->tpl_vars['img_update_time']->value;?>
" />
		<?php if (isset($_smarty_tpl->tpl_vars['theme_settings']->value)) {?><meta name="application-name" content="<?php echo $_smarty_tpl->tpl_vars['theme_settings']->value['version'];?>
" /><?php }?>
	<?php if (isset($_smarty_tpl->tpl_vars['css_files']->value)) {?><?php  $_smarty_tpl->tpl_vars['media'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['media']->_loop = false;
 $_smarty_tpl->tpl_vars['css_uri'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['css_files']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['media']->key => $_smarty_tpl->tpl_vars['media']->value) {
$_smarty_tpl->tpl_vars['media']->_loop = true;
 $_smarty_tpl->tpl_vars['css_uri']->value = $_smarty_tpl->tpl_vars['media']->key;
?>
	<link href="<?php echo $_smarty_tpl->tpl_vars['css_uri']->value;?>
" rel="stylesheet" type="text/css" media="<?php echo $_smarty_tpl->tpl_vars['media']->value;?>
" />
	<?php } ?><?php }?>
	<?php if (isset($_smarty_tpl->tpl_vars['theme_settings']->value)&&($_smarty_tpl->tpl_vars['theme_settings']->value['used_fonts']!=false)) {?>
		<link href='http<?php if (Tools::usingSecureMode()) {?>s<?php }?>://fonts.googleapis.com/css?family=<?php echo $_smarty_tpl->tpl_vars['theme_settings']->value['used_fonts'];?>
' rel='stylesheet' type='text/css' />		
	<?php }?>
		<?php echo $_smarty_tpl->tpl_vars['HOOK_HEADER']->value;?>
	
	<!--[if IE 8]>
		<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		<script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
	<![endif]--> 
	</head>
	<body<?php if (isset($_smarty_tpl->tpl_vars['page_name']->value)) {?> id="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['page_name']->value, ENT_QUOTES, 'UTF-8', true);?>
"<?php }?> class="<?php if ($_smarty_tpl->tpl_vars['logged']->value) {?>registered <?php } else { ?>guest <?php }?><?php if (isset($_smarty_tpl->tpl_vars['page_name']->value)) {?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['page_name']->value, ENT_QUOTES, 'UTF-8', true);?>
<?php }?><?php if (isset($_smarty_tpl->tpl_vars['body_classes']->value)&&count($_smarty_tpl->tpl_vars['body_classes']->value)) {?> <?php echo smarty_function_implode(array('value'=>$_smarty_tpl->tpl_vars['body_classes']->value,'separator'=>' '),$_smarty_tpl);?>
<?php }?><?php if ($_smarty_tpl->tpl_vars['hide_left_column']->value) {?> hide-left-column<?php }?><?php if ($_smarty_tpl->tpl_vars['hide_right_column']->value) {?> hide-right-column<?php }?><?php if ($_smarty_tpl->tpl_vars['content_only']->value) {?> content_only<?php } else { ?> not_content_only<?php }?> lang_<?php echo $_smarty_tpl->tpl_vars['lang_iso']->value;?>
 preset<?php echo $_smarty_tpl->tpl_vars['theme_settings']->value['preset'];?>
<?php if ($_smarty_tpl->tpl_vars['theme_settings']->value['widescreen']==0) {?> fixed-width<?php }?>">
	<?php echo $_smarty_tpl->getSubTemplate ("./svg.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

	<?php if (!$_smarty_tpl->tpl_vars['content_only']->value) {?>
		<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0][0]->smartyHook(array('h'=>"displayBanner"),$_smarty_tpl);?>

		<?php if (isset($_smarty_tpl->tpl_vars['restricted_country_mode']->value)&&$_smarty_tpl->tpl_vars['restricted_country_mode']->value) {?>
		<div id="restricted-country">
			<p><?php echo smartyTranslate(array('s'=>'You cannot place a new order from your country.'),$_smarty_tpl);?>
 <span class="bold"><?php echo $_smarty_tpl->tpl_vars['geolocation_country']->value;?>
</span></p>
		</div>
		<?php }?>
		<?php if (($_smarty_tpl->tpl_vars['page_name']->value=="index")) {?><div class="loader-bg"></div><?php }?>
		<div id="white_bg" class="smooth05<?php if (($_smarty_tpl->tpl_vars['page_name']->value=="index")) {?> blured<?php }?>">
		<?php if (isset($_smarty_tpl->tpl_vars['theme_settings']->value)&&$_smarty_tpl->tpl_vars['theme_settings']->value['toTop']==1) {?>
		<div id="scrollTop" class="bshadow main_bg"><a href="#"><svg class="svgic svgic-arrowdown"><use xlink:href="#si-arrowdown"></use></svg></a></div>
		<?php }?>
		<div class="<?php if (isset($_smarty_tpl->tpl_vars['theme_settings']->value)&&isset($_smarty_tpl->tpl_vars['theme_settings']->value['pattern'])) {?>back_<?php echo $_smarty_tpl->tpl_vars['theme_settings']->value['pattern'];?>
<?php }?>" id="pattern">
			<div class="page_width header">			
				<!-- Header -->
				<div id="header">
					<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0][0]->smartyHook(array('h'=>"displayNav"),$_smarty_tpl);?>

					<div id="header_logo" <?php if (isset($_smarty_tpl->tpl_vars['theme_settings']->value)&&($_smarty_tpl->tpl_vars['theme_settings']->value['logo_center']==1)) {?>class="align_center"<?php }?>>
						<a id="header_logo_img" href="<?php echo $_smarty_tpl->tpl_vars['base_dir']->value;?>
" title="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['shop_name']->value, ENT_QUOTES, 'UTF-8', true);?>
">
							<img  class="logo<?php if (isset($_smarty_tpl->tpl_vars['theme_settings']->value['logo_type'])&&$_smarty_tpl->tpl_vars['theme_settings']->value['logo_type']==1) {?> hidden<?php }?>" src="<?php echo $_smarty_tpl->tpl_vars['logo_url']->value;?>
" alt="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['shop_name']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
"<?php if ($_smarty_tpl->tpl_vars['logo_image_width']->value) {?> width="<?php echo $_smarty_tpl->tpl_vars['logo_image_width']->value;?>
" <?php }?><?php if ($_smarty_tpl->tpl_vars['logo_image_height']->value) {?> height="<?php echo $_smarty_tpl->tpl_vars['logo_image_height']->value;?>
" <?php }?>/>
							<span id="logo-text" class="<?php if (isset($_smarty_tpl->tpl_vars['theme_settings']->value['logo_type'])&&$_smarty_tpl->tpl_vars['theme_settings']->value['logo_type']==0) {?>hidden<?php }?>">
								<?php if (isset($_smarty_tpl->tpl_vars['theme_settings']->value['logo_text'])) {?><span class="logo"><?php echo $_smarty_tpl->tpl_vars['theme_settings']->value['logo_text'];?>
</span><?php }?>
								<?php if (isset($_smarty_tpl->tpl_vars['theme_settings']->value['slogan'])) {?><span class="slogan"><?php echo $_smarty_tpl->tpl_vars['theme_settings']->value['slogan'];?>
</span><?php }?>	
							</span>	
						</a>
					</div>
					<?php echo $_smarty_tpl->tpl_vars['HOOK_TOP']->value;?>

					<?php if (isset($_smarty_tpl->tpl_vars['theme_settings']->value)&&($_smarty_tpl->tpl_vars['theme_settings']->value['c_block']==1)) {?>
					<div class="c_block">
					<?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['theme_settings']->value['email_ph_acc2']!='';?>
<?php $_tmp21=ob_get_clean();?><?php if (($_smarty_tpl->tpl_vars['theme_settings']->value['email_ph_acc']!='')||($_tmp21)) {?>
					<div class="header-box contact-phones pull-right clearfix">
						<span class="header-box-icon dib main_color"><svg class="svgic svgic-headphones"><use xlink:href="#si-headphones"></use></svg></span><ul class="pull-left dib">
							<?php if (($_smarty_tpl->tpl_vars['theme_settings']->value['email_ph_acc']!='')) {?><li><?php echo $_smarty_tpl->tpl_vars['theme_settings']->value['email_ph_acc'];?>
</li><?php }?>
							<?php if (($_smarty_tpl->tpl_vars['theme_settings']->value['email_ph_acc2']!='')) {?><li><?php echo $_smarty_tpl->tpl_vars['theme_settings']->value['email_ph_acc2'];?>
</li><?php }?>
						</ul>
					</div><!-- End .contact-phones -->	
					<?php }?>	
					<?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['theme_settings']->value['email_em_acc']!='';?>
<?php $_tmp22=ob_get_clean();?><?php if (($_smarty_tpl->tpl_vars['theme_settings']->value['email_sk_acc']!='')||($_tmp22)) {?>
					<div class="header-box contact-infos pull-right">
						<ul>
							<?php if (($_smarty_tpl->tpl_vars['theme_settings']->value['email_sk_acc']!='')) {?><li><span class="header-box-icon main_color"><svg class="svgic svgic-skype"><use xlink:href="#si-skype"></use></svg></span><?php echo $_smarty_tpl->tpl_vars['theme_settings']->value['email_sk_acc'];?>
</li><?php }?>
							<?php if (($_smarty_tpl->tpl_vars['theme_settings']->value['email_em_acc']!='')) {?><li><span class="header-box-icon main_color"><svg class="svgic svgic-email"><use xlink:href="#si-email"></use></svg></span><a class="mailto-link" href="mailto:<?php echo $_smarty_tpl->tpl_vars['theme_settings']->value['email_em_acc'];?>
"><?php echo $_smarty_tpl->tpl_vars['theme_settings']->value['email_em_acc'];?>
</a></li><?php }?>
						</ul>
					</div><!-- End .contact-infos -->	
					<?php }?>	    							
					</div>    			
					<?php }?>		
					<?php if (($_smarty_tpl->tpl_vars['theme_settings']->value['preset']==6)&&($_smarty_tpl->tpl_vars['page_name']->value=="index")) {?>
					<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0][0]->smartyHook(array('h'=>'menu'),$_smarty_tpl);?>

					<?php }?>	
				</div>
			</div>
			<?php if (($_smarty_tpl->tpl_vars['theme_settings']->value['preset']!=6)) {?>
			<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0][0]->smartyHook(array('h'=>'menu'),$_smarty_tpl);?>

			<?php }?>
			<?php if (($_smarty_tpl->tpl_vars['theme_settings']->value['preset']==6)&&($_smarty_tpl->tpl_vars['page_name']->value!="index")) {?>
			<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0][0]->smartyHook(array('h'=>'menu'),$_smarty_tpl);?>

			<?php }?>	
			<div class="top_slider">
				<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0][0]->smartyHook(array('h'=>'top_slider'),$_smarty_tpl);?>

			</div>
			<div class="page_width">
				<div id="columns" class="clearfix<?php if (isset($_smarty_tpl->tpl_vars['theme_settings']->value)&&($_smarty_tpl->tpl_vars['theme_settings']->value['homepage_column']=='1')) {?><?php if (($_smarty_tpl->tpl_vars['theme_settings']->value['column']=='right')) {?> right_col<?php } else { ?> left_col<?php }?><?php }?>">
					<?php if ($_smarty_tpl->tpl_vars['page_name']->value!='index'&&$_smarty_tpl->tpl_vars['page_name']->value!='pagenotfound') {?>
						<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tpl_dir']->value)."./breadcrumb.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

					<?php }?>		
					<?php if ($_smarty_tpl->tpl_vars['page_name']->value=="index") {?>
						<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0][0]->smartyHook(array('h'=>'hook_home_01'),$_smarty_tpl);?>

						<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0][0]->smartyHook(array('h'=>'hook_home_02'),$_smarty_tpl);?>
											
						<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0][0]->smartyHook(array('h'=>'hook_home_03'),$_smarty_tpl);?>
				
						<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0][0]->smartyHook(array('h'=>'hook_home_04'),$_smarty_tpl);?>
				
						<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0][0]->smartyHook(array('h'=>'hook_home_05'),$_smarty_tpl);?>
				
						<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0][0]->smartyHook(array('h'=>'hook_home_06'),$_smarty_tpl);?>
								
						<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0][0]->smartyHook(array('h'=>'hook_home_07'),$_smarty_tpl);?>

						<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0][0]->smartyHook(array('h'=>'hook_home_08'),$_smarty_tpl);?>

					<?php }?>		
					<!-- Center -->
					<?php if ($_smarty_tpl->tpl_vars['page_name']->value=="index") {?>
					<div id="center_column" <?php if (isset($_smarty_tpl->tpl_vars['HOOK_LEFT_COLUMN']->value)&&trim($_smarty_tpl->tpl_vars['HOOK_LEFT_COLUMN']->value)&&!$_smarty_tpl->tpl_vars['hide_left_column']->value&&($_smarty_tpl->tpl_vars['theme_settings']->value['homepage_column']==1)&&($_smarty_tpl->tpl_vars['page_name']->value!="products-comparison")&&($_smarty_tpl->tpl_vars['page_name']->value!="product")&&($_smarty_tpl->tpl_vars['page_name']->value!="category")) {?>class="column_exist"<?php }?>>
					<?php } else { ?>
					<div id="center_column" <?php if ($_smarty_tpl->tpl_vars['page_name']->value=="category") {?>style="width:100%"<?php }?> <?php if (isset($_smarty_tpl->tpl_vars['HOOK_LEFT_COLUMN']->value)&&trim($_smarty_tpl->tpl_vars['HOOK_LEFT_COLUMN']->value)&&!$_smarty_tpl->tpl_vars['hide_left_column']->value&&($_smarty_tpl->tpl_vars['page_name']->value!="products-comparison")&&($_smarty_tpl->tpl_vars['page_name']->value!="product")&&($_smarty_tpl->tpl_vars['page_name']->value!="category")) {?>class="column_exist"<?php }?>>
					<?php }?>
						<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0][0]->smartyHook(array('h'=>"displayTopColumn"),$_smarty_tpl);?>

	<?php }?><?php }} ?>
