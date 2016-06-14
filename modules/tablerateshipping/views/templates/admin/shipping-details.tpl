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

<div class="row">
	<div class="col-md-8">
		<form id="form-shippingdetails" action="index.php?controller=AdminModules&token={$token|escape:'htmlall':'UTF-8'}
			&configure={$module_name|escape:'htmlall':'UTF-8'}&tab_module=shipping_logistics&module_name={$module_name|escape:'htmlall':'UTF-8'}
			&selected_carrrier_id={$selected_carrrier_id|escape:'htmlall':'UTF-8'}" method="post" class="form-horizontal">
			<div class="panel  panel-default">
				<div class="panel-heading"><img src="../img/admin/tab-shipping.gif" /> <span>{l s='Shipping Details' mod='tablerateshipping'}</span></div>
				<div class="panel-body">
					<div class="form-group">
						<label for="carrier_id" class="col-sm-3 control-label required"> {l s='Override carriers' mod='tablerateshipping'}</label>
						<div class="col-sm-9">{$carrier_dropdown|escape:'UTF-8'}</div>
					</div>
					
					<div class="form-group">
						<label for="condition_name" class="col-sm-3 control-label"> {l s='Shipping condition' mod='tablerateshipping'}</label>
						<div class="col-sm-9"><select id="condition_name" name="condition_name" class="form-control">
							<option{if $condition_name == 'weight'} selected="selected"{/if} value="weight">{l s='Weight vs. Destination' mod='tablerateshipping'}</option>
							<option{if $condition_name == 'price'} selected="selected"{/if} value="price">{l s='Price vs. Destination' mod='tablerateshipping'}</option>
							<option{if $condition_name == 'quantity'} selected="selected"{/if} value="quantity">{l s='# of Items vs. Destination' mod='tablerateshipping'}</option>
							<option{if $condition_name == 'volume'} selected="selected"{/if} value="volume">{l s='Volume (w x h x d) vs. Destination' mod='tablerateshipping'}</option>
						</select></div>
					</div>
					
					<div id="use_pre_tax_price_form_group" class="form-group">
						<label for="use_pre_tax_price" class="col-sm-3 control-label"> {l s='Use pre tax price' mod='tablerateshipping'}</label>
						<div class="col-sm-9"><select id="use_pre_tax_price" name="use_pre_tax_price" class="form-control">
							<option{if $use_pre_tax_price == 'no'} selected="selected"{/if} value="no">{l s='No' mod='tablerateshipping'}</option>
							<option{if $use_pre_tax_price == 'yes'} selected="selected"{/if} value="yes">{l s='Yes' mod='tablerateshipping'}</option>
						</select></div>
					</div>
					
					<div class="form-group">
						<label for="csv_separator" class="col-sm-3 control-label required"> {l s='CSV file separator' mod='tablerateshipping'}</label>
						<div class="col-sm-9"><input type="text" id="csv_separator" name="csv_separator" class="form-control" value="{$csv_separator|escape:'htmlall':'UTF-8'}" /></div>
					</div>
				</div>
				<div class="panel-footer">
					<button type="submit" name="btnSubmitShipDetails" value="1" class="btn btn-default pull-right">
						<i class="process-icon-save"></i>{l s='Update settings' mod='tablerateshipping'}
					</button>
				</div>
			</div>
		</form>
	</div>
	<div class="col-md-4">
		<div class="panel panel-default">
			<div class="panel-heading"><img src="../img/admin/information.png" /> <span>{l s='Links' mod='tablerateshipping'}</span></div>
			<div class="panel-body">
				<p><img src="../img/admin/separator_breadcrumb.png"> &nbsp;<a target="_blank" 
				href="https://www.kahanit.com//documentation/kahanit-table-rate-shipping-module-prestashop/index.html">{l s='Documentation' mod='tablerateshipping'}</a></p>
				<p><img src="../img/admin/separator_breadcrumb.png"> &nbsp;<a target="_blank" 
				href="https://www.kahanit.com//submit-ticket">{l s='Support' mod='tablerateshipping'}</a></p>
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading"><img src="../modules/{$module_name|escape:'htmlall':'UTF-8'}/views/img/select-carrier.png" /> <span>{l s='Select Carrier' mod='tablerateshipping'}</span></div>
			<div class="panel-body">
				<div id="select-carrier">{$select_carrier_dropdown|escape:'UTF-8'}</div>
			</div>
		</div>
	</div>
</div>