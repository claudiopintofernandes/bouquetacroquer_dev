<?php /* Smarty version Smarty-3.1.19, created on 2016-03-10 14:52:13
         compiled from "/srv/data/web/vhosts/www.bouquetacroquer.fr/htdocs/modules/tablerateshipping/views/templates/admin/table-rates.tpl" */ ?>
<?php /*%%SmartyHeaderCode:163099251656e17c0d0a9536-37254782%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0307a995bc94f1a698230f6b9aad60f23e787ed2' => 
    array (
      0 => '/srv/data/web/vhosts/www.bouquetacroquer.fr/htdocs/modules/tablerateshipping/views/templates/admin/table-rates.tpl',
      1 => 1453302100,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '163099251656e17c0d0a9536-37254782',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'token' => 0,
    'module_name' => 0,
    'selected_carrrier_id' => 0,
    'condition_name' => 0,
    'pagination' => 0,
    'path_uri' => 0,
    'getstates_token' => 0,
    'csv_separator' => 0,
    'label_condition_from' => 0,
    'label_condition_to' => 0,
    'table_rates' => 0,
    'table_rate' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_56e17c0d26fd93_47863861',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56e17c0d26fd93_47863861')) {function content_56e17c0d26fd93_47863861($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_escape')) include '/srv/data/web/vhosts/www.bouquetacroquer.fr/htdocs/tools/smarty/plugins/modifier.escape.php';
if (!is_callable('smarty_modifier_replace')) include '/srv/data/web/vhosts/www.bouquetacroquer.fr/htdocs/tools/smarty/plugins/modifier.replace.php';
if (!is_callable('smarty_modifier_regex_replace')) include '/srv/data/web/vhosts/www.bouquetacroquer.fr/htdocs/tools/smarty/plugins/modifier.regex_replace.php';
?>

<div class="row">
	<a name="anchorratetable" id="anchorratetable"></a>
	<div class="col-md-12" id="block-ratetable">
		<form action="index.php?controller=AdminModules&token=<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['token']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>

			&configure=<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['module_name']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
&tab_module=shipping_logistics&module_name=<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['module_name']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>

			&selected_carrrier_id=<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['selected_carrrier_id']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" method="post" class="form-horizontal">
			<div class="panel panel-default">
				<div class="panel-heading"><img src="../img/admin/date.png" /> <span><?php echo smartyTranslate(array('s'=>'Table Rates','mod'=>'tablerateshipping'),$_smarty_tpl);?>

				(<?php if ($_smarty_tpl->tpl_vars['condition_name']->value=='weight') {?>
					<?php echo smartyTranslate(array('s'=>'Weight vs. Destination','mod'=>'tablerateshipping'),$_smarty_tpl);?>

				<?php } elseif ($_smarty_tpl->tpl_vars['condition_name']->value=='price') {?>
					<?php echo smartyTranslate(array('s'=>'Price vs. Destination','mod'=>'tablerateshipping'),$_smarty_tpl);?>

				<?php } elseif ($_smarty_tpl->tpl_vars['condition_name']->value=='quantity') {?>
					<?php echo smartyTranslate(array('s'=>'# of Items vs. Destination','mod'=>'tablerateshipping'),$_smarty_tpl);?>

				<?php } else { ?>
					<?php echo smartyTranslate(array('s'=>'Volume (w x h x d) vs. Destination','mod'=>'tablerateshipping'),$_smarty_tpl);?>

				<?php }?>)</span></div>
				<div class="panel-body">
					<div class="action_buttons">
						<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['pagination']->value, 'UTF-8');?>

						<div class="btn-group">
							<a id="actionaddnew" class="btn btn-default" href="javascript:void(0);"><?php echo smartyTranslate(array('s'=>'Add new','mod'=>'tablerateshipping'),$_smarty_tpl);?>
</a>
							<a id="actionimportcsv" class="btn btn-default"  href="javascript:void(0);"><?php echo smartyTranslate(array('s'=>'Import CSV','mod'=>'tablerateshipping'),$_smarty_tpl);?>
</a>
							<a target="_blank" class="btn btn-default" href="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['path_uri']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
export.php?token=<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['getstates_token']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
&
								condition_name=<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['condition_name']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
&csv_separator=<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['csv_separator']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
&selected_carrrier_id=<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['selected_carrrier_id']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
">
								<?php echo smartyTranslate(array('s'=>'Export CSV','mod'=>'tablerateshipping'),$_smarty_tpl);?>
</a>
							<a target="_blank" class="btn btn-default" href="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['path_uri']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
sample.php?token=<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['getstates_token']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
&
								condition_name=<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['condition_name']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
&csv_separator=<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['csv_separator']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
">
								<?php echo smartyTranslate(array('s'=>'Sample CSV','mod'=>'tablerateshipping'),$_smarty_tpl);?>
</a>
						</div>
					</div>
					<div class="table-responsive">
						<table id="tabletablerate" class="table table-hover">
							<colgroup>
								<col width="3%">
								
								<col width="10%">
								<col width="10%">
								<col width="10%">
								<col width="10%">
								
								<col width="13%">
								<col width="13%">
								
								<col width="8%">
								<col width="8%">
								<col width="8%">
								
								<col width="7%">
							</colgroup>
							<thead>
								<tr class="nodrag nodrop" style="height:40px">
									<th class="center">
										<input type="checkbox" name="checkme" class="noborder" onclick="checkDelBoxes(this.form, 'tableRateBox[]', this.checked)">
									</th>
									<th><span class="title_box"><?php echo smartyTranslate(array('s'=>'Zone','mod'=>'tablerateshipping'),$_smarty_tpl);?>
</th>
									<th><span class="title_box"><?php echo smartyTranslate(array('s'=>'Country','mod'=>'tablerateshipping'),$_smarty_tpl);?>
</th>
									<th><span class="title_box"><?php echo smartyTranslate(array('s'=>'Region/State','mod'=>'tablerateshipping'),$_smarty_tpl);?>
</th>
									<th><span class="title_box"><?php echo smartyTranslate(array('s'=>'City','mod'=>'tablerateshipping'),$_smarty_tpl);?>
</span></th>
									<th><span class="title_box"><?php echo smartyTranslate(array('s'=>'Zip/Post code from','mod'=>'tablerateshipping'),$_smarty_tpl);?>
</span></th>
									<th><span class="title_box"><?php echo smartyTranslate(array('s'=>'Zip/Post code to','mod'=>'tablerateshipping'),$_smarty_tpl);?>
</span></th>
									<th><span class="title_box"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['label_condition_from']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</span></th>
									<th><span class="title_box"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['label_condition_to']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</span></th>
									<th><span class="title_box"><?php echo smartyTranslate(array('s'=>'Price','mod'=>'tablerateshipping'),$_smarty_tpl);?>
</span></th>
									<th class="center"><?php echo smartyTranslate(array('s'=>'Actions','mod'=>'tablerateshipping'),$_smarty_tpl);?>
</th>
								</tr>
							</thead>
							<tbody>
							<?php if (count($_smarty_tpl->tpl_vars['table_rates']->value)!=0) {?>
								<?php  $_smarty_tpl->tpl_vars['table_rate'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['table_rate']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['table_rates']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['table_rate']->key => $_smarty_tpl->tpl_vars['table_rate']->value) {
$_smarty_tpl->tpl_vars['table_rate']->_loop = true;
?>
								<tr id="tr-<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['table_rate']->value['id_carrier_table_rate'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
">
									<td class="center"><input type="checkbox" name="tableRateBox[]" value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['table_rate']->value['id_carrier_table_rate'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" class="noborder"></td>
									<td><?php echo $_smarty_tpl->tpl_vars['table_rate']->value['zone']=='' ? '*' : mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['table_rate']->value['zone'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</td>
									<td><?php if ($_smarty_tpl->tpl_vars['table_rate']->value['country']=='') {?>*
										<?php } else { ?><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['table_rate']->value['country'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
 (<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['table_rate']->value['c_iso_code'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
)<?php }?></td>
									<td><?php if ($_smarty_tpl->tpl_vars['table_rate']->value['state']=='') {?>*
										<?php } else { ?><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['table_rate']->value['state'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
 (<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['table_rate']->value['s_iso_code'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
)<?php }?></td>
									<td><?php echo $_smarty_tpl->tpl_vars['table_rate']->value['dest_city']=='' ? '*' : mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['table_rate']->value['dest_city'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</td>
									<td><?php echo $_smarty_tpl->tpl_vars['table_rate']->value['dest_zip_from']=='' ? '*' : mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['table_rate']->value['dest_zip_from'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</td>
									<td><?php echo $_smarty_tpl->tpl_vars['table_rate']->value['dest_zip_to']=='' ? '*' : mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['table_rate']->value['dest_zip_to'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</td>
									<td><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['table_rate']->value['condition_value_from'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</td>
									<td><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['table_rate']->value['condition_value_to'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</td>
									<td><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['table_rate']->value['price'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</td>
									<td class="center" style="white-space: nowrap;">
										<script type="text/javascript">
										$.data($("#tr-<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['table_rate']->value['id_carrier_table_rate'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
")[0], "params", {
											id_carrier_table_rate: "<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['table_rate']->value['id_carrier_table_rate'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
",
											zone_id: "<?php echo $_smarty_tpl->tpl_vars['table_rate']->value['id_zone']=='0' ? '' : mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['table_rate']->value['id_zone'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
",
											country_id: "<?php echo $_smarty_tpl->tpl_vars['table_rate']->value['id_country']=='0' ? '' : mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['table_rate']->value['id_country'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
",
											state_id: "<?php echo $_smarty_tpl->tpl_vars['table_rate']->value['id_state']=='0' ? '*' : mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['table_rate']->value['id_state'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
",
											city: "<?php echo $_smarty_tpl->tpl_vars['table_rate']->value['dest_city']=='' ? '*' : mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['table_rate']->value['dest_city'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
",
											zip_from: "<?php echo $_smarty_tpl->tpl_vars['table_rate']->value['dest_zip_from']=='' ? '*' : mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['table_rate']->value['dest_zip_from'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
",
											zip_to: "<?php echo $_smarty_tpl->tpl_vars['table_rate']->value['dest_zip_to']=='' ? '*' : mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['table_rate']->value['dest_zip_to'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
",
											condition_from: "<?php echo $_smarty_tpl->tpl_vars['table_rate']->value['condition_value_from']=='' ? '*' : mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['table_rate']->value['condition_value_from'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
",
											condition_to: "<?php echo $_smarty_tpl->tpl_vars['table_rate']->value['condition_value_to']=='' ? '*' : mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['table_rate']->value['condition_value_to'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
",
											price: "<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['table_rate']->value['price'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
",
											comment: "<?php echo smarty_modifier_regex_replace(smarty_modifier_replace($_smarty_tpl->tpl_vars['table_rate']->value['comment'],'"','\"'),'/[\r\t\n]+/','\\n');?>
"
										});
										</script>
										<a class="edit" href="javascript:void(0);" title="Edit">
											<img src="../img/admin/edit.gif" alt="Edit">
										</a>
										<a href="index.php?controller=AdminModules&token=<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['token']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>

											&configure=<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['module_name']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
&tab_module=shipping_logistics&module_name=<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['module_name']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>

											&action=deleteit&id_carrier_table_rate=<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['table_rate']->value['id_carrier_table_rate'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>

											&selected_carrrier_id=<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['selected_carrrier_id']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" class="delete"
											onclick="if (confirm('<?php echo smartyTranslate(array('s'=>'Are you sure?','mod'=>'tablerateshipping'),$_smarty_tpl);?>
')) return true; else event.stopPropagation();event.preventDefault();"
											title="Delete">
											<img src="../img/admin/delete.gif" alt="Delete">
										</a>
									</td>
								</tr>
								<?php } ?>
							<?php } else { ?>
								<tr>
									<td colspan="11" align="center"><?php echo smartyTranslate(array('s'=>'No records found','mod'=>'tablerateshipping'),$_smarty_tpl);?>
</td>
								</tr>
							<?php }?>
							</tbody>
						</table>
					</div>
				</div>
				<div class="panel-footer">
					<div class="action_buttons">
						<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['pagination']->value, 'UTF-8');?>

						<div class="btn-group">
							<input type="submit" name="btnSubmitDeleteSelected" value="<?php echo smartyTranslate(array('s'=>'Delete selected','mod'=>'tablerateshipping'),$_smarty_tpl);?>
" class="btn btn-default" 
							onclick="if (confirm('<?php echo smartyTranslate(array('s'=>'Are you sure?','mod'=>'tablerateshipping'),$_smarty_tpl);?>
')) return true; else event.stopPropagation();event.preventDefault();">
							<a class="btn btn-default" href="index.php?controller=AdminModules&token=<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['token']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>

							&configure=<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['module_name']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
&tab_module=shipping_logistics&module_name=<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['module_name']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>

							&action=deleteall&selected_carrrier_id=<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['selected_carrrier_id']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
"
							onclick="if (confirm('<?php echo smartyTranslate(array('s'=>'Are you sure?','mod'=>'tablerateshipping'),$_smarty_tpl);?>
')) return true; else event.stopPropagation();event.preventDefault();">
							<?php echo smartyTranslate(array('s'=>'Delete all','mod'=>'tablerateshipping'),$_smarty_tpl);?>
</a>
						</div>
					</div>
				</div>
			</div>
		</form>
	</div>
</div><?php }} ?>
