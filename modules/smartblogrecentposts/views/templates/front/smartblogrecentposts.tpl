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
{if isset($posts) AND !empty($posts)}
	<div id="recent_article_block_left"  class="block blogModule boxPlain">
		<h4>
			{l s='Recent Articles' mod='smartblogrecentposts'}
		</h4>
		<div class="block_content">
			<ul class="tree dynamized">
				{foreach from=$posts item="post"}
					{assign var="options" value=null}
					{$options.id_post= $post.id_smart_blog_post}
					{$options.slug= $post.link_rewrite}
					<li>
						<a title="{$post.meta_title}" href="{smartblog::getSmartBlogLink('smartblog_post',$options)}">{$post.meta_title|truncate:45}</a>
					</li>
				{/foreach}
            </ul>
		</div>
	</div>
{/if}