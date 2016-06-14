{*
* SmartBlog
*
* NOTICE OF LICENSE
*
* This source file is licensed under the OSL-3.0
* that is bundled with this package in the file LICENSE.txt.
*
* @author    SmartSataSoft
* @copyright SmartSataSoft
* @license   Open Software License v. 3.0 (OSL-3.0)
*}
{capture name=path}<a href="{smartblog::getSmartBlogLink('smartblog')}">{l s='All Blog News' mod='smartblog'}</a>
     {if $title_category != ''}
    <span class="navigation-pipe">{$navigationPipe}</span>{$title_category}{/if}{/capture}
 
    {if $postcategory == ''}
             <p class="error">{l s='No Post in This Tag' mod='smartblog'}</p>
    {else}
    <div id="smartblogcat" class="block">
{foreach from=$postcategory item=post}
    {include file="./category_loop.tpl" postcategory=$postcategory}
{/foreach}
    </div>
{/if}
{if isset($smartcustomcss)}
    <style>
        {$smartcustomcss}
    </style>
{/if}