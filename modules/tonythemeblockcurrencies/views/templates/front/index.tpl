{*
* TonyTheme
*
* NOTICE OF LICENSE
*
* This source file is licensed under the OSL-3.0
* that is bundled with this package in the file LICENSE.txt.
*
*  @author TonyTheme
*  @copyright TonyTheme
*  @license Open Software License v. 3.0 (OSL-3.0)
*}
<!-- Currency block -->
{if $no_selector == 0 && count($currencies) > 1}
	<span class="link_label">{l s='Currency' mod='tonythemeblockcurrencies'}:</span>
	<div class="fadelink"> <a href="#">{$blockcurrencies_sign}</a>
		<div class="ul_wrapper">
			<ul>
				{foreach from=$currencies key=k item=f_currency}
					<li {if $cookie->id_currency == $f_currency.id_currency}class="selected"{/if}>
						<a href="javascript:setCurrency({$f_currency.id_currency});" title="{$f_currency.name}">{$f_currency.sign}&nbsp;{$f_currency.name}</a>
					</li>
				{/foreach}
			</ul>
		</div>
	</div>
{/if}
<!-- /Currency block -->
