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
 {if $page_name == 'product' || $page_name == 'quick-order' || $page_name == 'order' || $page_name == 'order-opc'}
	<link href="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.1/themes/base/jquery-ui.css" rel="stylesheet" type="text/css" />
	<link href="{$basedir|escape:'html':'UTF-8'}modules/{$modulename|escape:'html':'UTF-8'}/css/front.css" rel="stylesheet" type="text/css" />
	<script type="text/javascript">
		var datepickerWarning = "{l s='Please pick your desired delivery date' mod='eydatepicker'}";
	</script>
{/if}