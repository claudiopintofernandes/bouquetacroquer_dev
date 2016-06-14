<?php /* Smarty version Smarty-3.1.19, created on 2016-03-10 14:52:13
         compiled from "/srv/data/web/vhosts/www.bouquetacroquer.fr/htdocs/modules/tablerateshipping/views/templates/admin/addnew-rate.tpl" */ ?>
<?php /*%%SmartyHeaderCode:101446331556e17c0d2eafc0-81781551%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0feabee3859f65e2980f1129a1d0a0da73a5ea38' => 
    array (
      0 => '/srv/data/web/vhosts/www.bouquetacroquer.fr/htdocs/modules/tablerateshipping/views/templates/admin/addnew-rate.tpl',
      1 => 1453302100,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '101446331556e17c0d2eafc0-81781551',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'token' => 0,
    'module_name' => 0,
    'action' => 0,
    'selected_carrrier_id' => 0,
    'zones' => 0,
    'zone' => 0,
    'countries' => 0,
    'country' => 0,
    'label_condition_from' => 0,
    'label_condition_to' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_56e17c0d373d28_99936903',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56e17c0d373d28_99936903')) {function content_56e17c0d373d28_99936903($_smarty_tpl) {?>

<div class="modal fade bs-example-modal-lg" id="modaladdnewrate" tabindex="-1" role="dialog" aria-labelledby="modaladdnewratelabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">
					<span aria-hidden="true">&times;</span><span class="sr-only"><?php echo smartyTranslate(array('s'=>'Close','mod'=>'tablerateshipping'),$_smarty_tpl);?>
</span>
				</button>
				<h4 class="modal-title" id="modaladdnewratelabel"></h4>
			</div>
			<form action="index.php?controller=AdminModules&token=<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['token']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>

			&configure=<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['module_name']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
&tab_module=shipping_logistics&module_name=<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['module_name']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>

			&action=<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['action']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
&selected_carrrier_id=<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['selected_carrrier_id']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" method="post" class="form-horizontal">
				<div class="panel">
					<div class="panel-body">
						<div class="form-group">
							<label for="zone_id" class="col-lg-3 control-label"><?php echo smartyTranslate(array('s'=>'Zone','mod'=>'tablerateshipping'),$_smarty_tpl);?>
</label>
							<div class="col-lg-9"><select id="zone_id" name="zone_id" class="form-control">
							<option value="">*</option>
							<?php  $_smarty_tpl->tpl_vars['zone'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['zone']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['zones']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['zone']->key => $_smarty_tpl->tpl_vars['zone']->value) {
$_smarty_tpl->tpl_vars['zone']->_loop = true;
?>
							<option value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['zone']->value['id_zone'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['zone']->value['name'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</option>
							<?php } ?>
							</select></div>
						</div>
						
						<div class="form-group">
							<label for="country_id" class="col-lg-3 control-label"><?php echo smartyTranslate(array('s'=>'Country','mod'=>'tablerateshipping'),$_smarty_tpl);?>
</label>
							<div class="col-lg-9"><select id="country_id" name="country_id" class="form-control">
							<option value="">*</option>
							<?php  $_smarty_tpl->tpl_vars['country'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['country']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['countries']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['country']->key => $_smarty_tpl->tpl_vars['country']->value) {
$_smarty_tpl->tpl_vars['country']->_loop = true;
?>
							<option value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['country']->value['id_country'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['country']->value['name'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</option>
							<?php } ?>
							</select></div>
						</div>
						
						<div class="form-group">
							<label for="state_id" class="col-lg-3 control-label"><img style="display:none;" id="state_loader" src="../img/loader.gif" alt="Loading..." />
							<?php echo smartyTranslate(array('s'=>'Region/State','mod'=>'tablerateshipping'),$_smarty_tpl);?>
</label>
							<div class="col-lg-9"><select id="state_id" name="state_id" class="form-control">
							<option value="">*</option>
							</select></div>
						</div>
						
						<div class="form-group">
							<label for="city" class="col-lg-3 control-label"><?php echo smartyTranslate(array('s'=>'City','mod'=>'tablerateshipping'),$_smarty_tpl);?>
</label>
							<div class="col-lg-9"><input type="text" id="city" name="city" class="form-control" value="" size="30" /></div>
						</div>
						
						<div class="form-group">
							<label for="zip_from" class="col-lg-3 control-label"><?php echo smartyTranslate(array('s'=>'Zip/Post code from','mod'=>'tablerateshipping'),$_smarty_tpl);?>
</label>
							<div class="col-lg-9"><input type="text" id="zip_from" name="zip_from" class="form-control" value="" size="30" /></div>
						</div>
						
						<div class="form-group">
							<label for="zip_to" class="col-lg-3 control-label"><?php echo smartyTranslate(array('s'=>'Zip/Post code to','mod'=>'tablerateshipping'),$_smarty_tpl);?>
</label>
							<div class="col-lg-9"><input type="text" id="zip_to" name="zip_to" class="form-control" value="" size="30" /></div>
						</div>
						
						<div class="form-group">
							<label for="condition_from" class="col-lg-3 control-label"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['label_condition_from']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</label>
							<div class="col-lg-9"><input type="text" id="condition_from" name="condition_from" class="form-control" value="" size="30" /></div>
						</div>
						
						<div class="form-group">
							<label for="condition_to" class="col-lg-3 control-label"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['label_condition_to']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</label>
							<div class="col-lg-9"><input type="text" id="condition_to" name="condition_to" class="form-control" value="" size="30" /></div>
						</div>
						
						<div class="form-group">
							<label for="price" class="col-lg-3 control-label"><span class="label-tooltip" data-toggle="tooltip" data-html="true" title="<?php echo smartyTranslate(array('s'=>'It can also be a formula: `2*$c + 5` where `$c` is unit increase in condition value (weight, price or quantity).','mod'=>'tablerateshipping'),$_smarty_tpl);?>
"><?php echo smartyTranslate(array('s'=>'Price','mod'=>'tablerateshipping'),$_smarty_tpl);?>
</span></label>
							<div class="col-lg-9"><input type="text" id="price" name="price" class="form-control" value="" size="30" /></div>
						</div>
						
						<div class="form-group">
							<label for="comment" class="col-lg-3 control-label"><?php echo smartyTranslate(array('s'=>'Comment','mod'=>'tablerateshipping'),$_smarty_tpl);?>
</label>
							<div class="col-lg-9"><textarea id="comment" name="comment" class="form-control" rows="5" cols="50"></textarea></div>
						</div>
					</div>
					
					<div class="panel-footer">
						<input type="hidden" id="id_carrier_table_rate" name="id_carrier_table_rate" value="" />
						<input type="hidden" id="id_carrier" name="id_carrier" value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['selected_carrrier_id']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" />
						<button type="submit" name="btnSubmitSaveRate" value="1" class="btn btn-default pull-right">
							<i class="process-icon-save"></i><?php echo smartyTranslate(array('s'=>'Save','mod'=>'tablerateshipping'),$_smarty_tpl);?>

						</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
<div class="modal fade bs-example-modal-lg" id="modalcsvimport" tabindex="-1" role="dialog" aria-labelledby="modalcsvimportlabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">
					<span aria-hidden="true">&times;</span><span class="sr-only"><?php echo smartyTranslate(array('s'=>'Close','mod'=>'tablerateshipping'),$_smarty_tpl);?>
</span>
				</button>
				<h4 class="modal-title" id="modalcsvimportlabel"><img src="../img/admin/add.gif" /> <span><?php echo smartyTranslate(array('s'=>'Import CSV','mod'=>'tablerateshipping'),$_smarty_tpl);?>
</span></h4>
			</div>
			<form action="index.php?controller=AdminModules&token=<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['token']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>

			&configure=<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['module_name']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
&tab_module=shipping_logistics&module_name=<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['module_name']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>

			&action=csvupload&selected_carrrier_id=<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['selected_carrrier_id']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" method="post" enctype="multipart/form-data" class="form-horizontal">
				<div class="panel">
					<div class="panel-body">
						<div class="form-group">
							<label for="csv_file" class="col-lg-3 control-label"><?php echo smartyTranslate(array('s'=>'Select CSV file','mod'=>'tablerateshipping'),$_smarty_tpl);?>
</label>
							<div class="col-lg-9"><input type="file" name="file" class="form-control" id="csv_file" /></div>
						</div>
					</div>
					
					<div class="panel-footer">
						<button type="submit" name="btnSubmitCSVUpload" value="1" class="btn btn-default pull-right">
							<i class="process-icon-save"></i><?php echo smartyTranslate(array('s'=>'Upload','mod'=>'tablerateshipping'),$_smarty_tpl);?>

						</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div><?php }} ?>
