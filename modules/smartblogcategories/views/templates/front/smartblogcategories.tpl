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
{if isset($categories) AND !empty($categories)}
	<div id="categories_block_left"  class="block blogModule boxPlain">
		<h4>
			{l s='Blog Categories' mod='smartblogcategories'}
		</h4>
		<div class="block_content">
			<ul class="tree dynamized">
				{foreach from=$categories item="category"}
					{assign var="options" value=null}
					{$options.id_category = $category.id_smart_blog_category}
					{$options.slug = $category.link_rewrite}
					<li>
						<a href="{smartblog::getSmartBlogLink('smartblog_category',$options)}">{$category.meta_title} ({$category.count})</a>
					</li>
				{/foreach}
			</ul>
		</div>
	</div>
{/if}