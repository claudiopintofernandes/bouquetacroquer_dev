{*
/**
 * NOTICE OF LICENSE
 * 
 * A friendly notice to thank you for been honest.
 * The plugin has to be used only if purchased from https://addons.prestashop.com or directly from developer
 * Reselling, sharing or using the same licence for multiple shops is prohibited 
 * 
 *  @author    Radu G.
 *  @copyright ecommy.com
 *  @license   https://www.ecommy.com/licence.txt
 */
 *}
 {if isset($ey_date)}
	<div class="info-order box">
		<p><strong class="dark">{l s='Delivery date/hour' mod='eydatepicker'}</strong> <span class="color-myaccount">{$ey_date|escape:'html':'UTF-8'} {$ey_hour|escape:'html':'UTF-8'}</span></p>
	</div>
{/if}