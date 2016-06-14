<?php /* Smarty version Smarty-3.1.19, created on 2016-03-08 14:31:00
         compiled from "/srv/data/web/vhosts/www.bouquetacroquer.fr/htdocs/pdf/header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:54811538856ded414aee690-90323786%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '26fc35c09771172215f9c76bcca3b796f5bf0f11' => 
    array (
      0 => '/srv/data/web/vhosts/www.bouquetacroquer.fr/htdocs/pdf/header.tpl',
      1 => 1453302158,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '54811538856ded414aee690-90323786',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'logo_path' => 0,
    'width_logo' => 0,
    'height_logo' => 0,
    'header' => 0,
    'date' => 0,
    'title' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_56ded414b20ea7_31949524',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56ded414b20ea7_31949524')) {function content_56ded414b20ea7_31949524($_smarty_tpl) {?>
<table style="width: 100%">
<tr>
	<td style="width: 50%">
		<?php if ($_smarty_tpl->tpl_vars['logo_path']->value) {?>
			<img src="<?php echo $_smarty_tpl->tpl_vars['logo_path']->value;?>
" style="width:<?php echo $_smarty_tpl->tpl_vars['width_logo']->value;?>
px; height:<?php echo $_smarty_tpl->tpl_vars['height_logo']->value;?>
px;" />
		<?php }?>
	</td>
	<td style="width: 50%; text-align: right;">
		<table style="width: 100%">
			<tr>
				<td style="font-weight: bold; font-size: 14pt; color: #444; width: 100%"><?php if (isset($_smarty_tpl->tpl_vars['header']->value)) {?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['header']->value, ENT_QUOTES, 'UTF-8', true);?>
<?php }?></td>
			</tr>
			<tr>
				<td style="font-size: 14pt; color: #9E9F9E"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['date']->value, ENT_QUOTES, 'UTF-8', true);?>
</td>
			</tr>
			<tr>
				<td style="font-size: 14pt; color: #9E9F9E"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['title']->value, ENT_QUOTES, 'UTF-8', true);?>
</td>
			</tr>
		</table>
	</td>
</tr>
</table>

<?php }} ?>
