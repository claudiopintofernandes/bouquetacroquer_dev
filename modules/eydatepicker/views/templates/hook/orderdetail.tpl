{*
/*
* NOTICE OF LICENSE
* 
* A friendly notice to thank you for been honest.
* The plugin has to be used only if purchased from https://addons.prestashop.com or directly from developer
* Reselling, sharing or using the same licence for multiple shops is prohibited 
* 
* @author Radu G.
* @copyright  Radu G.
*/
*}

<div class="panel">
	<fieldset>
		<legend>{l s='Selected Shipping Date' mod='eydatepicker'}</legend>

		<div class="clear" style="float: left; margin-right: 10px;"><a href="#" id="delivery_text">{$shipping_date|escape:'html':'UTF-8'} {$shipping_hour|escape:'html':'UTF-8'}</a>

			<form action="{$basedir|escape:'html':'UTF-8'}modules/eydatepicker/controllers/delivery_info.php?token={$tokencommon}" method="POST" id="delivery_form" style="display: none" class="form-inline">
				<div class="form-group">
					<input type="text" value="{dateFormat date=$shipping_date_raw full=0}" id="shipping_date" name="shipping_date_raw" readonly="readonly" />
				</div>
				<div class="form-group">
					<input type="text" value="{$shipping_hour|escape:'html':'UTF-8'}" name="shipping_hour" />
				</div>
				<input type="hidden" id="processed_shipping_date" name="shipping_date" value="{$shipping_date|escape:'html':'UTF-8'}" />
				<input type="hidden" name="id" value="{$id|escape:'intval'}" />
				<input type="hidden" name="id_order" value="{$id_order|escape:'intval'}" />				
				<input type="submit" class="btn btn-info" value="update" />
			</form>

		</div>
	</fieldset>
</div>

<script type="text/javascript">
	{literal}
		$('#delivery_text').click(function() {
			$('#delivery_text').hide();
			$('#delivery_form').show();

			return false;
		});

		$('#delivery_form').submit(function() {
			submittedForm = $(this);
			$.post(submittedForm.attr('action'), submittedForm.serialize()).done(function(data) {
				$('#delivery_form').text(data);
			});
			return false;
		});

		$('#shipping_date').datepicker({
			dateFormat: '{/literal}{$dateFormat}{literal}',
			showOn: "button",
			showOn: "both",
					onSelect: function(dateText, inst) {
						var theDate = new Date(Date.parse($(this).datepicker('getDate')));
						var dateFormatted = $.datepicker.formatDate('yy-mm-dd', theDate);
						$('#processed_shipping_date').val(dateFormatted);
					}
		});
	{/literal}
</script>