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
	<script src="{$basedir}modules/{$modulename|escape:'html':'UTF-8'}/js/jquery-ui-1.10.1.custom.min.js"></script>
	{if $langcode != 'en'}
		<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.1/i18n/jquery-ui-i18n.min.js"></script>
	{/if}
	<script type="text/javascript">
		{if $langcode != 'en'}	
			{literal}
			$(function() {
				$.datepicker.setDefaults($.datepicker.regional.{/literal}{$langcode|escape:'html':'UTF-8'}{literal});	
			});
			{/literal}
		{/if}
	</script>
{/if}