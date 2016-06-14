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
<!-- Block languages module -->
{if count($languages) > 1}
	<span class="link_label">{l s='Language' mod='tonyblocklanguages'}:</span>
	{foreach from=$languages key=k item=language name="languages"}
		{if $language.iso_code == $lang_iso}
			{assign var="current" value=$language}
		{/if}
	{/foreach}
	{if $current}
		<div class="fadelink">
			<a href="#"><img src="{$img_lang_dir}{$current.id_lang}.jpg" alt="{$current.iso_code}" style="width:16px;height:11px;"/> {$current.name}</a>
			<div class="ul_wrapper">
				<ul>
					{foreach from=$languages key=k item=language name="languages"}
						<li {if $language.iso_code == $lang_iso}class="selected_language"{/if}>
							{if $language.iso_code != $lang_iso}
								{assign var=indice_lang value=$language.id_lang}
								{if isset($lang_rewrite_urls.$indice_lang)}
									<a href="{$lang_rewrite_urls.$indice_lang|escape:htmlall}" title="{$language.name}">
									{else}
										<a href="{$link->getLanguageLink($language.id_lang)|escape:htmlall}" title="{$language.name}">

										{/if}
									{/if}
									<img src="{$img_lang_dir}{$language.id_lang}.jpg" alt="{$language.iso_code}" width="16" height="11" /> {$language.name}
									{if $language.iso_code != $lang_iso}
									</a>
								{/if}
						</li>
					{/foreach}
				</ul>
			</div>
		</div>
	{/if}
{/if}
<!-- /Block languages module -->
