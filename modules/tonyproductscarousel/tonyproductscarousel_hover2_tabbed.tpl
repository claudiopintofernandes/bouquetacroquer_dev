<div class="{if $tony_cfg.theme_home_left_menu != '1'}container{else}row{/if}">
	<h2 id="carousel_tabs">
		{assign var='total_blocks' value=count($carousel_cfg)}
		{foreach from=$carousel_cfg item=blockdata key=blockid name=popularize}
			{if $blockdata.disable != 1 && isset($blockdata.block_title)}
				<a href="#{$blockid}" onclick="return false">{$blockdata.block_title}</a>
				{if $smarty.foreach.popularize.index != $total_blocks - 1}&nbsp;/&nbsp;{/if}
			{/if}
		{/foreach}
	</h2>

	<div id="carousel_tabs_content">

		{foreach from=$carousel_cfg item=blockdata key=blockid name=popularize}
			{if $blockdata.disable != 1 && isset($blockdata.block_title)}
				<div class="carousel es-carousel-wrapper style0" id="{$blockid}">
					<div class="es-carousel">
						<div class="row {if $blockdata.products_img_dimensions != 'big'}small_with_description{/if}">

							<div class="product_outer">

								{foreach from=$blockdata.products_list item=product}

									{if isset($product.tony_images[1])}
										{assign var="roll_over" value=$product.tony_images[1].id_image}
									{else}
										{assign var="roll_over" value=false}
									{/if}

									{if $blockdata.products_img_dimensions == 'big'}
										{assign var="img_name_normal" value="tonytheme_product"}
										{assign var="title_truncate" value="35"}
									{else}
										{assign var="img_name_normal" value="tonytheme_product_small"}
										{assign var="title_truncate" value="50"}
									{/if}
									{capture assign=products_img_normal2x}{$img_name_normal}_2x{/capture}
									<div class="{if $blockdata.products_img_dimensions == 'big'}span3{else}span2{/if} product ajax_block_product"
										 style="overflow:hidden !important;" itemscope
										 itemtype="http://schema.org/Product">
										<meta itemprop="manufacturer" content="{$product.manufacturer_name}"/>
										<div class="product-wrapper">
											{if isset($product.on_sale) && $product.on_sale && isset($product.show_price) && $product.show_price && !$PS_CATALOG_MODE}
												<div class="product_label label_sale_top_right">{l s='SALE' mod='tonyproductscarousel'}</div>{/if}
											{if isset($product.new) && $product.new == 1}
												<div class="product_label label_new_top_left">{l s='NEW' mod='tonyproductscarousel'}</div>{/if}
											<div class="image-wrapper" style="overflow:hidden;">
												<a href="{$product.link|escape:'htmlall':'UTF-8'}"
												   class="product_image">
													<div class="view1 onhover animate scale"><img
																src="{$link->getImageLink($product.link_rewrite, $product.id_image, $img_name_normal)}"
																alt="{$product.name|escape:'htmlall':'UTF-8'}"
																id="home{$blockid}_ajax_id_product_{$product.id_product|intval}_pimage"
																class="product-retina"
																data-image2x="{$link->getImageLink($product.link_rewrite, $product.id_image, $products_img_normal2x)}"
																itemprop="image"></div>
													<div class="view2">
														{if isset($product.tony_images[1])}
															<img src="{$link->getImageLink($product.link_rewrite, $product.tony_images[1].id_image, $img_name_normal)}"
																 alt="{$product.name|escape:'htmlall':'UTF-8'}"
																 class="product-retina"
																 data-image2x="{$link->getImageLink($product.link_rewrite, $product.tony_images[1].id_image, $products_img_normal2x)}">
														{else}
															<img src="{$link->getImageLink($product.link_rewrite, $product.id_image, $img_name_normal)}"
																 alt="{$product.name|escape:'htmlall':'UTF-8'}"
																 class="product-retina"
																 data-image2x="{$link->getImageLink($product.link_rewrite, $product.id_image, $products_img_normal2x)}">
														{/if}
													</div>
												</a>
												{include file="$tpl_dir./product-quick-view.tpl" product=$product title={l s='Quick View' mod='tonyproductscarousel'} imgrel="home{$blockid}_ajax_id_product_{$product.id_product|intval}" hide=1}
											</div>
											{include file="$tpl_dir./product-countdown.tpl" product=$product bid=10}
											<div class="wrapper-hover">
												{if $blockdata.show_p_title == 1}
													<div class="product-name"><a
																href="{$product.link|escape:'htmlall':'UTF-8'}"{if $blockdata.product_color} style="color:{$blockdata.product_color} !important;"{/if}
																itemprop="name">{$product.name|escape:'htmlall':'UTF-8'}</a>
													</div>
												{/if}

												<div class="wrapper">
													{if $blockdata.show_p_price == 1}
														<div class="product-price" itemprop="offers" itemscope
															 itemtype="http://schema.org/Offer">
															<meta itemprop="priceCurrency"
																  content="{$currency->iso_code}"/>
															<meta itemprop="name" content="{$product.name}"/>

															{if (!$PS_CATALOG_MODE AND ((isset($product.show_price) && $product.show_price) || (isset($product.available_for_order) && $product.available_for_order)))}
																{if isset($product.reduction) && $product.reduction && isset($product.show_price) && $product.show_price && !$PS_CATALOG_MODE}
																	<span class="new"{if $blockdata.price_special_color} style="color:{$blockdata.price_special_color} !important;"{/if}
																		  itemprop="price">{if !$priceDisplay}{convertPrice price=$product.price}{else}{convertPrice price=$product.price_tax_exc}{/if}</span>
																	<span class="old"{if $blockdata.price_old_color} style="color:{$blockdata.price_old_color} !important;"{/if}>{if !$priceDisplay}{convertPrice price=$product.price_without_reduction}{else}{convertPrice price=$product.price_without_reduction}{/if}</span>
																{elseif isset($product.show_price) && $product.show_price && !isset($restricted_country_mode)}
																	<span class="price"
																		  style="display: inline;{if $blockdata.price_color}color:{$blockdata.price_color} !important;{/if}"
																		  itemprop="price">{if !$priceDisplay}{convertPrice price=$product.price}{else}{convertPrice price=$product.price_tax_exc}{/if}</span>{/if}
															{/if}
														</div>
													{/if}
													{include file="$tpl_dir./product-label-discount.tpl" product=$product}
													{if $blockdata.show_p_buy_now== 1}
														<div class="product-tocart">{if ($product.id_product_attribute == 0 || (isset($add_prod_display) && ($add_prod_display == 1))) && $product.available_for_order && !isset($restricted_country_mode) && $product.minimal_quantity <= 1 && $product.customizable != 2 && !$PS_CATALOG_MODE}
																{if ($product.allow_oosp || $product.quantity > 0)}
																	{if isset($static_token)}
																		<a class="ajax_add_to_cart_button exclusive"
																		   rel="home{$blockid}_ajax_id_product_{$product.id_product|intval}"
																		   href="{$link->getPageLink('cart',false, NULL, "add=1&amp;id_product={$product.id_product|intval}&amp;token={$static_token}", false)}"
																		   title="{l s='Add to cart' mod='tonyproductscarousel'}"><i
																					class="icon-basket"></i></a>
																	{else}
																		<a class="ajax_add_to_cart_button exclusive"
																		   rel="home{$blockid}_ajax_id_product_{$product.id_product|intval}"
																		   href="{$link->getPageLink('cart',false, NULL, "add=1&amp;id_product={$product.id_product|intval}", false)}"
																		   title="{l s='Add to cart' mod='tonyproductscarousel'}"><i
																					class="icon-basket"></i></a>
																	{/if}
																{else}
																	&nbsp;
																{/if}
															{/if}</div>
													{/if}
												</div>
											</div>
										</div>
									</div>
								{/foreach}
							</div>
						</div>
					</div>
				</div>
			{/if}
		{/foreach}


	</div>
</div>