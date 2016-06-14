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
    <div class="container">
        <div class="row">
            <div class="blog_block" id="blog-wrapper">
                <div class="span{if $tony_cfg.theme_home_left_menu != '1'}12{else}9{/if}">
                    <h2>{l s='From the Blog' mod='smartblogrecentposts'}</h2>

                    <div class="carousel es-carousel-wrapper style1">
                        <div class="es-carousel">
                            <div class="row">
                                <div class="product_outer">
                                    {foreach from=$posts item=post}
                                        {assign var="options" value=null}
                                        {$options.id_post= $post.id_smart_blog_post}
                                        {$options.slug= $post.link_rewrite}
                                        <div class="span{if $tony_cfg.theme_home_left_menu != '1'}6{else}3{/if} product">
                                            <div class="row">
                                                <div class="span{if $tony_cfg.theme_home_left_menu != '1'}3{else}{/if}">
                                                    <img src="{$modules_dir}/smartblog/images/{$post.post_img}-single-default.jpg"
                                                         alt="{$post.meta_title}" class="animate scale"></div>
                                                <div class="span3">
                                                    <h5><a title="{$post.meta_title}"
                                                           href="{smartblog::getSmartBlogLink('smartblog_post',$options)}">{$post.meta_title|truncate:45}</a>
                                                    </h5>

                                                    <p class="posts"><span
                                                                class="info">{$post.created|date_format:"%b %d, %Y"}</span>
                                                    </p>

                                                    <div class="post-desc">{$post.short_description|strip_tags|truncate:400:'...'}</div>
                                                </div>
                                            </div>
                                        </div>
                                    {/foreach}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
{/if}