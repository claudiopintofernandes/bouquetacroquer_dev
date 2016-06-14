{*
* SmartDataSoft
*
* NOTICE OF LICENSE
*
* This source file is licensed under the GPLv3
* that is bundled with this package in the file LICENSE.txt.
*
*  @author SmartDataSoft
*  @copyright SmartDataSoft
*  @license GNU General Public License v3
*}
{if isset($tags) AND !empty($tags)}
	<div  id="tags_blog_block_left" class="block blogModule boxPlain">
		<h4>
			{l s='Tags Post' mod='smartblogtag'}
		</h4>
		<div class="block_content tags-cloud">
            {foreach from=$tags item="tag"}
				{assign var="options" value=null}
                {$options.tag = $tag.name}
                {if $tag!=""}
                    <a href="{smartblog::getSmartBlogLink('smartblog_tag',$options)}">{$tag.name|escape:'htmlall'}</a>
                {/if}
            {/foreach}
		</div>
	</div>
{/if}