<?php /* Smarty version Smarty-3.1.19, created on 2016-03-10 14:52:04
         compiled from "/srv/data/web/vhosts/www.bouquetacroquer.fr/htdocs/modules/tablerateshipping/views/templates/admin/shipping-details.tpl" */ ?>
<?php /*%%SmartyHeaderCode:23904719156e17c045eee05-08326239%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '15f62d8d43d4ee4db6b14aef3f079bb11ab5bb53' => 
    array (
      0 => '/srv/data/web/vhosts/www.bouquetacroquer.fr/htdocs/modules/tablerateshipping/views/templates/admin/shipping-details.tpl',
      1 => 1453302100,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '23904719156e17c045eee05-08326239',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'token' => 0,
    'module_name' => 0,
    'selected_carrrier_id' => 0,
    'carrier_dropdown' => 0,
    'condition_name' => 0,
    'use_pre_tax_price' => 0,
    'csv_separator' => 0,
    'select_carrier_dropdown' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_56e17c04673250_03447010',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56e17c04673250_03447010')) {function content_56e17c04673250_03447010($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_escape')) include '/srv/data/web/vhosts/www.bouquetacroquer.fr/htdocs/tools/smarty/plugins/modifier.escape.php';
?>

<div class="row">
	<div class="col-md-8">
		<form id="form-shippingdetails" action="index.php?controller=AdminModules&token=<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['token']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>

			&configure=<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['module_name']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
&tab_module=shipping_logistics&module_name=<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['module_name']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>

			&selected_carrrier_id=<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['selected_carrrier_id']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" method="post" class="form-horizontal">
			<div class="panel  panel-default">
				<div class="panel-heading"><img src="../img/admin/tab-shipping.gif" /> <span><?php echo smartyTranslate(array('s'=>'Shipping Details','mod'=>'tablerateshipping'),$_smarty_tpl);?>
</span></div>
				<div class="panel-body">
					<div class="form-group">
						<label for="carrier_id" class="col-sm-3 control-label required"> <?php echo smartyTranslate(array('s'=>'Override carriers','mod'=>'tablerateshipping'),$_smarty_tpl);?>
</label>
						<div class="col-sm-9"><?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['carrier_dropdown']->value, 'UTF-8');?>
</div>
					</div>
					
					<div class="form-group">
						<label for="condition_name" class="col-sm-3 control-label"> <?php echo smartyTranslate(array('s'=>'Shipping condition','mod'=>'tablerateshipping'),$_smarty_tpl);?>
</label>
						<div class="col-sm-9"><select id="condition_name" name="condition_name" class="form-control">
							<option<?php if ($_smarty_tpl->tpl_vars['condition_name']->value=='weight') {?> selected="selected"<?php }?> value="weight"><?php echo smartyTranslate(array('s'=>'Weight vs. Destination','mod'=>'tablerateshipping'),$_smarty_tpl);?>
</option>
							<option<?php if ($_smarty_tpl->tpl_vars['condition_name']->value=='price') {?> selected="selected"<?php }?> value="price"><?php echo smartyTranslate(array('s'=>'Price vs. Destination','mod'=>'tablerateshipping'),$_smarty_tpl);?>
</option>
							<option<?php if ($_smarty_tpl->tpl_vars['condition_name']->value=='quantity') {?> selected="selected"<?php }?> value="quantity"><?php echo smartyTranslate(array('s'=>'# of Items vs. Destination','mod'=>'tablerateshipping'),$_smarty_tpl);?>
</option>
							<option<?php if ($_smarty_tpl->tpl_vars['condition_name']->value=='volume') {?> selected="selected"<?php }?> value="volume"><?php echo smartyTranslate(array('s'=>'Volume (w x h x d) vs. Destination','mod'=>'tablerateshipping'),$_smarty_tpl);?>
</option>
						</select></div>
					</div>
					
					<div id="use_pre_tax_price_form_group" class="form-group">
						<label for="use_pre_tax_price" class="col-sm-3 control-label"> <?php echo smartyTranslate(array('s'=>'Use pre tax price','mod'=>'tablerateshipping'),$_smarty_tpl);?>
</label>
						<div class="col-sm-9"><select id="use_pre_tax_price" name="use_pre_tax_price" class="form-control">
							<option<?php if ($_smarty_tpl->tpl_vars['use_pre_tax_price']->value=='no') {?> selected="selected"<?php }?> value="no"><?php echo smartyTranslate(array('s'=>'No','mod'=>'tablerateshipping'),$_smarty_tpl);?>
</option>
							<option<?php if ($_smarty_tpl->tpl_vars['use_pre_tax_price']->value=='yes') {?> selected="selected"<?php }?> value="yes"><?php echo smartyTranslate(array('s'=>'Yes','mod'=>'tablerateshipping'),$_smarty_tpl);?>
</option>
						</select></div>
					</div>
					
					<div class="form-group">
						<label for="csv_separator" class="col-sm-3 control-label required"> <?php echo smartyTranslate(array('s'=>'CSV file separator','mod'=>'tablerateshipping'),$_smarty_tpl);?>
</label>
						<div class="col-sm-9"><input type="text" id="csv_separator" name="csv_separator" class="form-control" value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['csv_separator']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" /></div>
					</div>
				</div>
				<div class="panel-footer">
					<button type="submit" name="btnSubmitShipDetails" value="1" class="btn btn-default pull-right">
						<i class="process-icon-save"></i><?php echo smartyTranslate(array('s'=>'Update settings','mod'=>'tablerateshipping'),$_smarty_tpl);?>

					</button>
				</div>
			</div>
		</form>
	</div>
	<div class="col-md-4">
		<div class="panel panel-default">
			<div class="panel-heading"><img src="../img/admin/information.png" /> <span><?php echo smartyTranslate(array('s'=>'Links','mod'=>'tablerateshipping'),$_smarty_tpl);?>
</span></div>
			<div class="panel-body">
				<p><img src="../img/admin/separator_breadcrumb.png"> &nbsp;<a target="_blank" 
				href="https://www.kahanit.com//documentation/kahanit-table-rate-shipping-module-prestashop/index.html"><?php echo smartyTranslate(array('s'=>'Documentation','mod'=>'tablerateshipping'),$_smarty_tpl);?>
</a></p>
				<p><img src="../img/admin/separator_breadcrumb.png"> &nbsp;<a target="_blank" 
				href="https://www.kahanit.com//submit-ticket"><?php echo smartyTranslate(array('s'=>'Support','mod'=>'tablerateshipping'),$_smarty_tpl);?>
</a></p>
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading"><img src="../modules/<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['module_name']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
/views/img/select-carrier.png" /> <span><?php echo smartyTranslate(array('s'=>'Select Carrier','mod'=>'tablerateshipping'),$_smarty_tpl);?>
</span></div>
			<div class="panel-body">
				<div id="select-carrier"><?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['select_carrier_dropdown']->value, 'UTF-8');?>
</div>
			</div>
		</div>
	</div>
</div><?php }} ?>
