<p class="payment_module">
	<a href="javascript:document.paybox_form.submit();" title="{l s='Pay with Paybox' mod='paybox'}">
		<img src="{$base_dir}modules/payboxca/{$pbx_picture}.jpg" alt="{l s='Pay with Paybox' mod='paybox'}" />
		{$pbx_text}
	</a>
</p>
<form action="{$pbx_link|escape:'htmlall':'UTF-8'}" method="post" name="paybox_form">
	<input type="hidden" name="PBX_SITE" value="{$PBX_SITE|escape:'htmlall':'UTF-8'}" />
	<input type="hidden" name="PBX_RANG" value="{$PBX_RANG|escape:'htmlall':'UTF-8'}" />
	<input type="hidden" name="PBX_IDENTIFIANT" value="{$PBX_IDENTIFIANT|escape:'htmlall':'UTF-8'}" />
	<input type="hidden" name="PBX_TOTAL" value="{$PBX_TOTAL|escape:'htmlall':'UTF-8'}" />
	<input type="hidden" name="PBX_DEVISE" value="{$PBX_DEVISE|escape:'htmlall':'UTF-8'}" />
	<input type="hidden" name="PBX_CMD" value="{$PBX_CMD|escape:'htmlall':'UTF-8'}" />
	<input type="hidden" name="PBX_PORTEUR" value="{$PBX_PORTEUR|escape:'htmlall':'UTF-8'}" />
	<input type="hidden" name="PBX_RETOUR" value="{$PBX_RETOUR|escape:'htmlall':'UTF-8'}" />
	<input type="hidden" name="PBX_HASH" value="{$PBX_HASH|escape:'htmlall':'UTF-8'}" />
	<input type="hidden" name="PBX_TIME" value="{$PBX_TIME|escape:'htmlall':'UTF-8'}" />
	<input type="hidden" name="PBX_LANGUE" value="{$PBX_LANGUE|escape:'htmlall':'UTF-8'}" />
	<input type="hidden" name="PBX_ANNULE" value="{$PBX_ANNULE|escape:'htmlall':'UTF-8'}" />
	<input type="hidden" name="PBX_EFFECTUE" value="{$PBX_EFFECTUE|escape:'htmlall':'UTF-8'}" />
	<input type="hidden" name="PBX_REFUSE" value="{$PBX_REFUSE|escape:'htmlall':'UTF-8'}" />
	<input type="hidden" name="PBX_REPONDRE_A" value="{$PBX_REPONDRE_A|escape:'htmlall':'UTF-8'}" />
	<input type="hidden" name="PBX_HMAC" value="{$PBX_HMAC|escape:'htmlall':'UTF-8'}" />
</form>