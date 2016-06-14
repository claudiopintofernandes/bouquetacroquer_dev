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

<div class="module-text">{$display_name|escape:'htmlall':'UTF-8'} (v{$version|escape:'htmlall':'UTF-8'})</div>
<script type="text/javascript">
$(function()
{
	{if $page != false}'location.hash = "#anchorratetable";'{/if}

	$.data($("#carrier_id")[0], "changed", "no");

	$("#carrier_id").change(function()
	{
		$.data($("#carrier_id")[0], "changed", "yes");
	});

	$("#form-shippingdetails").submit(function()
	{
		if($.data($("#carrier_id")[0], "changed") == "yes")
		{
			if(confirm("{l s='Rates defined for deselected carriers will be deleted?' mod='tablerateshipping'}"))
			{
				return true;
			}
			else
			{
				event.stopPropagation();event.preventDefault();
			}
		}
	});

	$("#select-carrier select").change(function()
	{
		window.location = "index.php?controller=AdminModules&token={$token|escape:'htmlall':'UTF-8'}&\
			configure={$module_name|escape:'htmlall':'UTF-8'}&tab_module=shipping_logistics&module_name={$module_name|escape:'htmlall':'UTF-8'}&\
			selected_carrrier_id="+$(this).val();
	});

	updateStates("{$country_id|escape:'htmlall':'UTF-8'}", "{$state_id|escape:'htmlall':'UTF-8'}");

	$("#country_id").change(function()
	{
		updateStates($(this).val(), "");
	});

	$("#actionaddnew").click(function()
	{
		$("#zone_id").val("");
		$("#country_id").val("");
		updateStates("", "");
		$("#city").val("*");
		$("#zip_from").val("*");
		$("#zip_to").val("*");
		$("#condition_from").val(0);
		$("#condition_to").val(0);
		$("#price").val(0);
		$("#comment").val("");

		$("#modaladdnewrate").find(".modal-title").html(
			"<img src=\"../img/admin/add.gif\" /> <span>{l s='Add New Rate' mod='tablerateshipping'}</span>"
		);
		$("#modaladdnewrate").modal("show");
		$("#zone_id").focus();
	});

	$("#actionimportcsv").click(function()
	{
		$("#modalcsvimport").modal("show");
		$("#csv_file").focus();
	});

	$("#tabletablerate tr").dblclick(function() {
		$(this).find(".edit").trigger("click");
	});

	$("#tabletablerate .edit").click(function()
	{
		var params = $.data($(this).parent().parent()[0], "params");

		$("#zone_id").val(params.zone_id);
		$("#country_id").val(params.country_id);
		updateStates(params.country_id,
			params.state_id);
		$("#city").val(params.city);
		$("#zip_from").val(params.zip_from);
		$("#zip_to").val(params.zip_to);
		$("#condition_from").val(params.condition_from);
		$("#condition_to").val(params.condition_to);
		$("#price").val(params.price);
		$("#comment").val(params.comment);
		$("#id_carrier_table_rate").val(params.id_carrier_table_rate);

		$("#modaladdnewrate").find(".modal-title").html(
			"<img src=\"../img/admin/edit.gif\" /> <span>{l s='Edit Rate' mod='tablerateshipping'}</span>"
		);
		$("#modaladdnewrate").modal("show");
		$("#zone_id").focus();
	});
});

function updateStates(country_id, state_id)
{
	$.ajax(
	{
		type: "POST",
		url: "{$path_uri|escape:'htmlall':'UTF-8'}getstates.php",
		data: "token={$getstates_token|escape:'htmlall':'UTF-8'}&country_id="+
			country_id+"&state_id="+state_id,
		dataType: "html",
		beforeSend: function()
		{
			$("#state_loader").show();
		},
		success: function(data)
		{
			$("#state_id").html(data);
			$("#state_loader").hide();
			$("#state_id").trigger("statesloaded");
		}
	});
}
</script>

</div>