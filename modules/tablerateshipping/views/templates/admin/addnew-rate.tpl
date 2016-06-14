{*
 * Overrides carrier shipping with Table Rate Shipping
 * 
 * Table Rate Shipping by Kahanit(https://www.kahanit.com/) is licensed under a 
 * Creative Creative Commons Attribution-NoDerivatives 4.0 International License.
 * Based on a work at https://www.kahanit.com/.
 * Permissions beyond the scope of this license may be available at https://www.kahanit.com/.
 * To view a copy of this license, visit http://creativecommons.org/licenses/by-nd/4.0/.
 * 
 * @author    Amit Sidhpura <amit@kahanit.com>
 * @copyright 2015 Kahanit
 * @license   http://creativecommons.org/licenses/by-nd/4.0/
 *}

<div class="modal fade bs-example-modal-lg" id="modaladdnewrate" tabindex="-1" role="dialog" aria-labelledby="modaladdnewratelabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">
					<span aria-hidden="true">&times;</span><span class="sr-only">{l s='Close' mod='tablerateshipping'}</span>
				</button>
				<h4 class="modal-title" id="modaladdnewratelabel"></h4>
			</div>
			<form action="index.php?controller=AdminModules&token={$token|escape:'htmlall':'UTF-8'}
			&configure={$module_name|escape:'htmlall':'UTF-8'}&tab_module=shipping_logistics&module_name={$module_name|escape:'htmlall':'UTF-8'}
			&action={$action|escape:'htmlall':'UTF-8'}&selected_carrrier_id={$selected_carrrier_id|escape:'htmlall':'UTF-8'}" method="post" class="form-horizontal">
				<div class="panel">
					<div class="panel-body">
						<div class="form-group">
							<label for="zone_id" class="col-lg-3 control-label">{l s='Zone' mod='tablerateshipping'}</label>
							<div class="col-lg-9"><select id="zone_id" name="zone_id" class="form-control">
							<option value="">*</option>
							{foreach from=$zones item=zone}
							<option value="{$zone.id_zone|escape:'htmlall':'UTF-8'}">{$zone.name|escape:'htmlall':'UTF-8'}</option>
							{/foreach}
							</select></div>
						</div>
						
						<div class="form-group">
							<label for="country_id" class="col-lg-3 control-label">{l s='Country' mod='tablerateshipping'}</label>
							<div class="col-lg-9"><select id="country_id" name="country_id" class="form-control">
							<option value="">*</option>
							{foreach from=$countries item=country}
							<option value="{$country.id_country|escape:'htmlall':'UTF-8'}">{$country.name|escape:'htmlall':'UTF-8'}</option>
							{/foreach}
							</select></div>
						</div>
						
						<div class="form-group">
							<label for="state_id" class="col-lg-3 control-label"><img style="display:none;" id="state_loader" src="../img/loader.gif" alt="Loading..." />
							{l s='Region/State' mod='tablerateshipping'}</label>
							<div class="col-lg-9"><select id="state_id" name="state_id" class="form-control">
							<option value="">*</option>
							</select></div>
						</div>
						
						<div class="form-group">
							<label for="city" class="col-lg-3 control-label">{l s='City' mod='tablerateshipping'}</label>
							<div class="col-lg-9"><input type="text" id="city" name="city" class="form-control" value="" size="30" /></div>
						</div>
						
						<div class="form-group">
							<label for="zip_from" class="col-lg-3 control-label">{l s='Zip/Post code from' mod='tablerateshipping'}</label>
							<div class="col-lg-9"><input type="text" id="zip_from" name="zip_from" class="form-control" value="" size="30" /></div>
						</div>
						
						<div class="form-group">
							<label for="zip_to" class="col-lg-3 control-label">{l s='Zip/Post code to' mod='tablerateshipping'}</label>
							<div class="col-lg-9"><input type="text" id="zip_to" name="zip_to" class="form-control" value="" size="30" /></div>
						</div>
						
						<div class="form-group">
							<label for="condition_from" class="col-lg-3 control-label">{$label_condition_from|escape:'htmlall':'UTF-8'}</label>
							<div class="col-lg-9"><input type="text" id="condition_from" name="condition_from" class="form-control" value="" size="30" /></div>
						</div>
						
						<div class="form-group">
							<label for="condition_to" class="col-lg-3 control-label">{$label_condition_to|escape:'htmlall':'UTF-8'}</label>
							<div class="col-lg-9"><input type="text" id="condition_to" name="condition_to" class="form-control" value="" size="30" /></div>
						</div>
						
						<div class="form-group">
							<label for="price" class="col-lg-3 control-label"><span class="label-tooltip" data-toggle="tooltip" data-html="true" title="{l s='It can also be a formula: `2*$c + 5` where `$c` is unit increase in condition value (weight, price or quantity).' mod='tablerateshipping'}">{l s='Price' mod='tablerateshipping'}</span></label>
							<div class="col-lg-9"><input type="text" id="price" name="price" class="form-control" value="" size="30" /></div>
						</div>
						
						<div class="form-group">
							<label for="comment" class="col-lg-3 control-label">{l s='Comment' mod='tablerateshipping'}</label>
							<div class="col-lg-9"><textarea id="comment" name="comment" class="form-control" rows="5" cols="50"></textarea></div>
						</div>
					</div>
					
					<div class="panel-footer">
						<input type="hidden" id="id_carrier_table_rate" name="id_carrier_table_rate" value="" />
						<input type="hidden" id="id_carrier" name="id_carrier" value="{$selected_carrrier_id|escape:'htmlall':'UTF-8'}" />
						<button type="submit" name="btnSubmitSaveRate" value="1" class="btn btn-default pull-right">
							<i class="process-icon-save"></i>{l s='Save' mod='tablerateshipping'}
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
					<span aria-hidden="true">&times;</span><span class="sr-only">{l s='Close' mod='tablerateshipping'}</span>
				</button>
				<h4 class="modal-title" id="modalcsvimportlabel"><img src="../img/admin/add.gif" /> <span>{l s='Import CSV' mod='tablerateshipping'}</span></h4>
			</div>
			<form action="index.php?controller=AdminModules&token={$token|escape:'htmlall':'UTF-8'}
			&configure={$module_name|escape:'htmlall':'UTF-8'}&tab_module=shipping_logistics&module_name={$module_name|escape:'htmlall':'UTF-8'}
			&action=csvupload&selected_carrrier_id={$selected_carrrier_id|escape:'htmlall':'UTF-8'}" method="post" enctype="multipart/form-data" class="form-horizontal">
				<div class="panel">
					<div class="panel-body">
						<div class="form-group">
							<label for="csv_file" class="col-lg-3 control-label">{l s='Select CSV file' mod='tablerateshipping'}</label>
							<div class="col-lg-9"><input type="file" name="file" class="form-control" id="csv_file" /></div>
						</div>
					</div>
					
					<div class="panel-footer">
						<button type="submit" name="btnSubmitCSVUpload" value="1" class="btn btn-default pull-right">
							<i class="process-icon-save"></i>{l s='Upload' mod='tablerateshipping'}
						</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>