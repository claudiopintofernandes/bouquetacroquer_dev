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
 <p>
	{l s='Thank you for using our module. Please take a moment to register it. It allows us to continue our work' mod='eydatepicker'}
</p>
<form id="datepicker_ajax_form" action="{$web_path_controllers|escape:'html':'UTF-8'}/register.php?action=update&token={$tokencommon|escape:'html':'UTF-8'}" method="POST">
	<div class="form-group">
		<label class="conf_title">{l s='Email used to order the module' mod='eydatepicker'}</label>
		<div class="margin-form">
			<input id="customer_email" class="form-control" type="email" required="required" name="customer_email" />
		</div>
	</div>
	<div class="form-group">
		<label class="conf_title">{l s='Your order number' mod='eydatepicker'}</label>
		<div class="margin-form">
			<input id="customer_email" class="form-control" type="number" required="required" name="order_number" />
		</div>
	</div>
	<div class="form-group"><input type="submit" name="submitConfiguration" value="{l s='Register module' mod='eydatepicker'}" class="btn btn-primary" /></div>	
</form>		