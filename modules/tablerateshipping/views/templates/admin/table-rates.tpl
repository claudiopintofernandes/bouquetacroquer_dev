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
	<a name="anchorratetable" id="anchorratetable"></a>
	<div class="col-md-12" id="block-ratetable">
		<form action="index.php?controller=AdminModules&token={$token|escape:'htmlall':'UTF-8'}
			&configure={$module_name|escape:'htmlall':'UTF-8'}&tab_module=shipping_logistics&module_name={$module_name|escape:'htmlall':'UTF-8'}
			&selected_carrrier_id={$selected_carrrier_id|escape:'htmlall':'UTF-8'}" method="post" class="form-horizontal">
			<div class="panel panel-default">
				<div class="panel-heading"><img src="../img/admin/date.png" /> <span>{l s='Table Rates' mod='tablerateshipping'}
				({if $condition_name == 'weight'}
					{l s='Weight vs. Destination' mod='tablerateshipping'}
				{elseif $condition_name == 'price'}
					{l s='Price vs. Destination' mod='tablerateshipping'}
				{elseif $condition_name == 'quantity'}
					{l s='# of Items vs. Destination' mod='tablerateshipping'}
				{else}
					{l s='Volume (w x h x d) vs. Destination' mod='tablerateshipping'}
				{/if})</span></div>
				<div class="panel-body">
					<div class="action_buttons">
						{$pagination|escape:'UTF-8'}
						<div class="btn-group">
							<a id="actionaddnew" class="btn btn-default" href="javascript:void(0);">{l s='Add new' mod='tablerateshipping'}</a>
							<a id="actionimportcsv" class="btn btn-default"  href="javascript:void(0);">{l s='Import CSV' mod='tablerateshipping'}</a>
							<a target="_blank" class="btn btn-default" href="{$path_uri|escape:'htmlall':'UTF-8'}export.php?token={$getstates_token|escape:'htmlall':'UTF-8'}&
								condition_name={$condition_name|escape:'htmlall':'UTF-8'}&csv_separator={$csv_separator|escape:'htmlall':'UTF-8'}&selected_carrrier_id={$selected_carrrier_id|escape:'htmlall':'UTF-8'}">
								{l s='Export CSV' mod='tablerateshipping'}</a>
							<a target="_blank" class="btn btn-default" href="{$path_uri|escape:'htmlall':'UTF-8'}sample.php?token={$getstates_token|escape:'htmlall':'UTF-8'}&
								condition_name={$condition_name|escape:'htmlall':'UTF-8'}&csv_separator={$csv_separator|escape:'htmlall':'UTF-8'}">
								{l s='Sample CSV' mod='tablerateshipping'}</a>
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
									<th><span class="title_box">{l s='Zone' mod='tablerateshipping'}</th>
									<th><span class="title_box">{l s='Country' mod='tablerateshipping'}</th>
									<th><span class="title_box">{l s='Region/State' mod='tablerateshipping'}</th>
									<th><span class="title_box">{l s='City' mod='tablerateshipping'}</span></th>
									<th><span class="title_box">{l s='Zip/Post code from' mod='tablerateshipping'}</span></th>
									<th><span class="title_box">{l s='Zip/Post code to' mod='tablerateshipping'}</span></th>
									<th><span class="title_box">{$label_condition_from|escape:'htmlall':'UTF-8'}</span></th>
									<th><span class="title_box">{$label_condition_to|escape:'htmlall':'UTF-8'}</span></th>
									<th><span class="title_box">{l s='Price' mod='tablerateshipping'}</span></th>
									<th class="center">{l s='Actions' mod='tablerateshipping'}</th>
								</tr>
							</thead>
							<tbody>
							{if $table_rates|count != 0}
								{foreach from=$table_rates item=table_rate}
								<tr id="tr-{$table_rate.id_carrier_table_rate|escape:'htmlall':'UTF-8'}">
									<td class="center"><input type="checkbox" name="tableRateBox[]" value="{$table_rate.id_carrier_table_rate|escape:'htmlall':'UTF-8'}" class="noborder"></td>
									<td>{($table_rate.zone == '')?'*':$table_rate.zone|escape:'htmlall':'UTF-8'}</td>
									<td>{if $table_rate.country == ''}*
										{else}{$table_rate.country|escape:'htmlall':'UTF-8'} ({$table_rate.c_iso_code|escape:'htmlall':'UTF-8'}){/if}</td>
									<td>{if $table_rate.state == ''}*
										{else}{$table_rate.state|escape:'htmlall':'UTF-8'} ({$table_rate.s_iso_code|escape:'htmlall':'UTF-8'}){/if}</td>
									<td>{($table_rate.dest_city == '')?'*':$table_rate.dest_city|escape:'htmlall':'UTF-8'}</td>
									<td>{($table_rate.dest_zip_from == '')?'*':$table_rate.dest_zip_from|escape:'htmlall':'UTF-8'}</td>
									<td>{($table_rate.dest_zip_to == '')?'*':$table_rate.dest_zip_to|escape:'htmlall':'UTF-8'}</td>
									<td>{$table_rate.condition_value_from|escape:'htmlall':'UTF-8'}</td>
									<td>{$table_rate.condition_value_to|escape:'htmlall':'UTF-8'}</td>
									<td>{$table_rate.price|escape:'htmlall':'UTF-8'}</td>
									<td class="center" style="white-space: nowrap;">
										<script type="text/javascript">
										$.data($("#tr-{$table_rate.id_carrier_table_rate|escape:'htmlall':'UTF-8'}")[0], "params", {
											id_carrier_table_rate: "{$table_rate.id_carrier_table_rate|escape:'htmlall':'UTF-8'}",
											zone_id: "{($table_rate.id_zone == '0')?'':$table_rate.id_zone|escape:'htmlall':'UTF-8'}",
											country_id: "{($table_rate.id_country == '0')?'':$table_rate.id_country|escape:'htmlall':'UTF-8'}",
											state_id: "{($table_rate.id_state == '0')?'*':$table_rate.id_state|escape:'htmlall':'UTF-8'}",
											city: "{($table_rate.dest_city == '')?'*':$table_rate.dest_city|escape:'htmlall':'UTF-8'}",
											zip_from: "{($table_rate.dest_zip_from == '')?'*':$table_rate.dest_zip_from|escape:'htmlall':'UTF-8'}",
											zip_to: "{($table_rate.dest_zip_to == '')?'*':$table_rate.dest_zip_to|escape:'htmlall':'UTF-8'}",
											condition_from: "{($table_rate.condition_value_from == '')?'*':$table_rate.condition_value_from|escape:'htmlall':'UTF-8'}",
											condition_to: "{($table_rate.condition_value_to == '')?'*':$table_rate.condition_value_to|escape:'htmlall':'UTF-8'}",
											price: "{$table_rate.price|escape:'htmlall':'UTF-8'}",
											comment: "{$table_rate.comment|replace:'"':'\"'|regex_replace:'/[\r\t\n]+/':'\\n'}"
										});
										</script>
										<a class="edit" href="javascript:void(0);" title="Edit">
											<img src="../img/admin/edit.gif" alt="Edit">
										</a>
										<a href="index.php?controller=AdminModules&token={$token|escape:'htmlall':'UTF-8'}
											&configure={$module_name|escape:'htmlall':'UTF-8'}&tab_module=shipping_logistics&module_name={$module_name|escape:'htmlall':'UTF-8'}
											&action=deleteit&id_carrier_table_rate={$table_rate.id_carrier_table_rate|escape:'htmlall':'UTF-8'}
											&selected_carrrier_id={$selected_carrrier_id|escape:'htmlall':'UTF-8'}" class="delete"
											onclick="if (confirm('{l s='Are you sure?' mod='tablerateshipping'}')) return true; else event.stopPropagation();event.preventDefault();"
											title="Delete">
											<img src="../img/admin/delete.gif" alt="Delete">
										</a>
									</td>
								</tr>
								{/foreach}
							{else}
								<tr>
									<td colspan="11" align="center">{l s='No records found' mod='tablerateshipping'}</td>
								</tr>
							{/if}
							</tbody>
						</table>
					</div>
				</div>
				<div class="panel-footer">
					<div class="action_buttons">
						{$pagination|escape:'UTF-8'}
						<div class="btn-group">
							<input type="submit" name="btnSubmitDeleteSelected" value="{l s='Delete selected' mod='tablerateshipping'}" class="btn btn-default" 
							onclick="if (confirm('{l s='Are you sure?' mod='tablerateshipping'}')) return true; else event.stopPropagation();event.preventDefault();">
							<a class="btn btn-default" href="index.php?controller=AdminModules&token={$token|escape:'htmlall':'UTF-8'}
							&configure={$module_name|escape:'htmlall':'UTF-8'}&tab_module=shipping_logistics&module_name={$module_name|escape:'htmlall':'UTF-8'}
							&action=deleteall&selected_carrrier_id={$selected_carrrier_id|escape:'htmlall':'UTF-8'}"
							onclick="if (confirm('{l s='Are you sure?' mod='tablerateshipping'}')) return true; else event.stopPropagation();event.preventDefault();">
							{l s='Delete all' mod='tablerateshipping'}</a>
						</div>
					</div>
				</div>
			</div>
		</form>
	</div>
</div>