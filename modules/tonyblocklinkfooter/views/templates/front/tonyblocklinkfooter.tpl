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
<!-- Block links module -->
<div id="links_block_footer" class="block">
	<div class="block_content">
		<h4>
			{if $url}<a href="{$url}">{$title}</a>{else}{$title}{/if}</h4>
		{foreach from=$tonyblocklinkfooter_links item=link}
			{if isset($link.$lang)}
				<p>
					<a href="{$link.url|htmlentities}"{if $link.newWindow} onclick="window.open(this.href);return false;"{/if}>{$link.$lang}</a>
				</p>
			{/if}
		{/foreach}
	</div>
</div>
<!-- Block links module -->
