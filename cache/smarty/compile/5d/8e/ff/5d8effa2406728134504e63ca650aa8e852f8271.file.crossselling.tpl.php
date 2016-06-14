<?php /* Smarty version Smarty-3.1.19, created on 2016-03-08 10:07:21
         compiled from "/srv/data/web/vhosts/www.bouquetacroquer.fr/htdocs/themes/alysum/modules/blockcart/crossselling.tpl" */ ?>
<?php /*%%SmartyHeaderCode:146713860156de9649de16c2-75363577%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5d8effa2406728134504e63ca650aa8e852f8271' => 
    array (
      0 => '/srv/data/web/vhosts/www.bouquetacroquer.fr/htdocs/themes/alysum/modules/blockcart/crossselling.tpl',
      1 => 1453302225,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '146713860156de9649de16c2-75363577',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'orderProducts' => 0,
    'orderProduct' => 0,
    'alysum_image' => 0,
    'restricted_country_mode' => 0,
    'PS_CATALOG_MODE' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_56de9649ead088_84130665',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56de9649ead088_84130665')) {function content_56de9649ead088_84130665($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_replace')) include '/srv/data/web/vhosts/www.bouquetacroquer.fr/htdocs/tools/smarty/plugins/modifier.replace.php';
?>
<?php if (isset($_smarty_tpl->tpl_vars['orderProducts']->value)&&count($_smarty_tpl->tpl_vars['orderProducts']->value)>0) {?>
	<div class="crossseling-content">
		<h2><?php echo smartyTranslate(array('s'=>'Customers who bought this product also bought:','mod'=>'blockcart'),$_smarty_tpl);?>
</h2>
		<div id="blockcart_list">
			<ul id="blockcart_caroucel">
				<?php  $_smarty_tpl->tpl_vars['orderProduct'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['orderProduct']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['orderProducts']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['orderProduct']->key => $_smarty_tpl->tpl_vars['orderProduct']->value) {
$_smarty_tpl->tpl_vars['orderProduct']->_loop = true;
?>
					<li>
						<div class="crosselling-item-wrapper">
						<div class="product-image-container">
							<a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['orderProduct']->value['link'], ENT_QUOTES, 'UTF-8', true);?>
" title="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['orderProduct']->value['name']);?>
" class="lnk_img">
								<?php $_smarty_tpl->tpl_vars["alysum_image"] = new Smarty_variable(smarty_modifier_replace($_smarty_tpl->tpl_vars['orderProduct']->value['image'],'medium_default','home_default'), null, 0);?>
								<img class="img-responsive" src="<?php echo mb_strtolower($_smarty_tpl->tpl_vars['alysum_image']->value, 'UTF-8');?>
" alt="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['orderProduct']->value['name']);?>
" />
							</a>
						</div>
						<p class="product-name">
							<a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['orderProduct']->value['link'], ENT_QUOTES, 'UTF-8', true);?>
" title="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['orderProduct']->value['name']);?>
">
								<?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['truncate'][0][0]->smarty_modifier_truncate($_smarty_tpl->tpl_vars['orderProduct']->value['name'],15,'...'), ENT_QUOTES, 'UTF-8', true);?>

							</a>
						</p>
						<?php if ($_smarty_tpl->tpl_vars['orderProduct']->value['show_price']==1&&!isset($_smarty_tpl->tpl_vars['restricted_country_mode']->value)&&!$_smarty_tpl->tpl_vars['PS_CATALOG_MODE']->value) {?>
							<span class="price_display">
								<span class="price"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['convertPrice'][0][0]->convertPrice(array('price'=>$_smarty_tpl->tpl_vars['orderProduct']->value['displayed_price']),$_smarty_tpl);?>
</span>
							</span>
						<?php }?>
					</div>
					</li>
				<?php } ?>
			</ul>
		</div>
	</div>
<?php }?><?php }} ?>
