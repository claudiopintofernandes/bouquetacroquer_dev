{assign var='row1_cols_count' value=2}
{if ($carousel_cfg.block1.disable == 1 &&  $carousel_cfg.block2.disable == 1)}
	{assign var='row1_visibility' value=0}
{elseif ($carousel_cfg.block1.disable == 1 || $carousel_cfg.block2.disable == 1)}
	{assign var='row1_visibility' value=1}
	{assign var='row1_cols_count' value=1}
{else}
	{assign var='row1_visibility' value=1}
{/if}

{if $row1_visibility == 1}
	<div class="{if $tony_cfg.theme_home_left_menu != '1'}container{else}row{/if}">
		<div class="row">
			<div class="product_row">
				{foreach from=$carousel_cfg item=blockdata key=blockid}
					{if (($blockid == 'block1' || $blockid == 'block2') && $blockdata.disable != 1) }
						<div class="span{if $row1_cols_count == 2}{if $tony_cfg.theme_home_left_menu != '1'}6{else}9{/if}{else}{if $tony_cfg.theme_home_left_menu != '1'}12{else}9{/if}{/if}">
							<h2>{$blockdata.block_title}</h2>

							<div class="carousel es-carousel-wrapper style1">
								<div class="es-carousel">
									<div class="row small_with_description">
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
													 itemscope itemtype="http://schema.org/Product">

													<div class="product-image-wrapper onhover animate scale">
														<a href="{$product.link|escape:'htmlall':'UTF-8'}"><img
																	src="{$link->getImageLink($product.link_rewrite, $product.id_image, $img_name_normal)}"
																	alt="{$product.name|escape:'htmlall':'UTF-8'}"
																	id="home{$blockid}_ajax_id_product_{$product.id_product|intval}_pimage"
																	class="product-retina"
																	data-image2x="{$link->getImageLink($product.link_rewrite, $product.id_image, $products_img_normal2x)}"
																	itemprop="image"></a>
													</div>
													<div class="wrapper-hover">
														{if $blockdata.show_p_title == 1}
															<div class="product-name"><a
																		href="{$product.link|escape:'htmlall':'UTF-8'}"{if $blockdata.product_color} style="color:{$blockdata.product_color} !important;"{/if}
																		itemprop="name">{$product.name|escape:'htmlall':'UTF-8'|truncate:{$title_truncate}:'...'}</a>
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
												<div class="preview{if $blockdata.products_img_dimensions != 'big'} small{/if} hidden-tablet hidden-phone">
													<div class="wrapper">
														{if count($product.tony_images) > 1 && $blockdata.show_p_images == '1'}
															<div class="col-1">
																{foreach from=$product.tony_images item=image key=k}
																	{if $k < 4}
																		<a href="{$product.link|escape:'htmlall':'UTF-8'}"
																		   data-rel="{$link->getImageLink($product.link_rewrite, $image.id_image, $img_name_normal)}"
																		   class="image product-retina-rel"
																		   data-image2x="{$link->getImageLink($product.link_rewrite, $image.id_image, $products_img_normal2x)}"><img
																					src="{$link->getImageLink($product.link_rewrite, $image.id_image, $img_name_normal)}"
																					alt="{$product.name|escape:'htmlall':'UTF-8'}"
																					class="thumb product-retina"
																					data-image2x="{$link->getImageLink($product.link_rewrite, $image.id_image, $products_img_normal2x)}"/></a>
																	{/if}
																{/foreach}

																{if (int)$k == 0}
																	&nbsp;
																{/if}
															</div>
														{/if}
														<div class="col-2">
															{if $roll_over}
																<div class="big_image"><a
																			href="{$product.link|escape:'htmlall':'UTF-8'}"><img
																				src="{$link->getImageLink($product.link_rewrite, $roll_over, $img_name_normal)}"
																				class="roll_over_img product-retina"
																				alt="{$product.name|escape:'htmlall':'UTF-8'}"
																				data-image2x="{$link->getImageLink($product.link_rewrite, $roll_over, $products_img_normal2x)}"></a>
																</div>
															{else}
																<div class="big_image"><a
																			href="{$product.link|escape:'htmlall':'UTF-8'}"><img
																				src="{$link->getImageLink($product.link_rewrite, $product.id_image, $img_name_normal)}"
																				class="roll_over_img product-retina"
																				alt="{$product.name|escape:'htmlall':'UTF-8'}"
																				data-image2x="{$link->getImageLink($product.link_rewrite, $product.id_image, $products_img_normal2x)}"></a>
																</div>
															{/if}
															<div class="wrapper-hover">
																<div class="product-name"><a
																			href="{$product.link|escape:'htmlall':'UTF-8'}"{if $blockdata.product_color} style="color:{$blockdata.product_color} !important;"{/if}>{$product.name|escape:'htmlall':'UTF-8'}</a>
																</div>
																<div class="wrapper">
																	<div class="product-price">

																		{if (!$PS_CATALOG_MODE AND ((isset($product.show_price) && $product.show_price) || (isset($product.available_for_order) && $product.available_for_order)))}
																			{if isset($product.reduction) && $product.reduction && isset($product.show_price) && $product.show_price && !$PS_CATALOG_MODE}
																				<span class="new"{if $blockdata.price_special_color} style="color:{$blockdata.price_special_color} !important;"{/if}>{if !$priceDisplay}{convertPrice price=$product.price}{else}{convertPrice price=$product.price_tax_exc}{/if}</span>
																				<span class="old"{if $blockdata.price_old_color} style="color:{$blockdata.price_old_color} !important;"{/if}>{if !$priceDisplay}{convertPrice price=$product.price_without_reduction}{else}{convertPrice price=$product.price_without_reduction}{/if}</span>
																			{elseif isset($product.show_price) && $product.show_price && !isset($restricted_country_mode)}
																				<span class="price"
																					  style="display: inline;{if $blockdata.price_color}color:{$blockdata.price_color} !important;{/if}">{if !$priceDisplay}{convertPrice price=$product.price}{else}{convertPrice price=$product.price_tax_exc}{/if}</span>{/if}
																		{/if}
																	</div>

																	{include file="$tpl_dir./product-label-discount.tpl" product=$product}
																	{include file="$tpl_dir./product-quick-view.tpl" product=$product title={l s='Quick View' mod='tonyproductscarousel'} imgrel="home{$blockid}_ajax_id_product_{$product.id_product|intval}"}



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
																</div>
																<div class="product-link">
																	{if isset($comparator_max_item) && $comparator_max_item}
																		{l s='Add to compare' mod='tonyproductscarousel'}
																		<input type="checkbox" class="comparator"
																			   id="comparator_item_{$product.id_product}"
																			   value="comparator_item_{$product.id_product}"
																			   {if isset($compareProducts) && in_array($product.id_product, $compareProducts)}checked="checked"{/if}
																			   style="margin:0px;"/>
																	{/if}
																</div>
																{include file="$tpl_dir./product-rating.tpl" rating=$product.rating}
															</div>
														</div>
													</div>
												</div>
											{/foreach}

										</div>
									</div>
								</div>
							</div>


						</div>
					{/if}
				{/foreach}

			</div>
		</div>
	</div>
{/if}

{if $carousel_cfg.block3.disable != 1}
	<div class="{if $tony_cfg.theme_home_left_menu != '1'}container{else}row{/if}">
		<h2>{$carousel_cfg.block3.block_title}</h2>

		<div class="carousel es-carousel-wrapper style0">
			<div class="es-carousel">
				<div class="row">
					<div class="product_outer">

						{foreach from=$carousel_cfg.block3.products_list item=product}

							{if isset($product.tony_images[1])}
								{assign var="roll_over" value=$product.tony_images[1].id_image}
							{else}
								{assign var="roll_over" value=false}
							{/if}

							{if $carousel_cfg.block3.products_img_dimensions == 'big'}
								{assign var="img_name_normal" value="tonytheme_product"}
								{assign var="title_truncate" value="35"}
							{else}
								{assign var="img_name_normal" value="tonytheme_product_small"}
								{assign var="title_truncate" value="25"}
							{/if}
							{capture assign=products_img_normal2x}{$img_name_normal}_2x{/capture}
							<div class="{if $carousel_cfg.block3.products_img_dimensions == 'big'}span3{else}span2{/if} product ajax_block_product"
								 itemscope itemtype="http://schema.org/Product">
								<meta itemprop="manufacturer" content="{$product.manufacturer_name}"/>
								<div class="product-image-wrapper onhover animate scale">
									{if isset($product.on_sale) && $product.on_sale && isset($product.show_price) && $product.show_price && !$PS_CATALOG_MODE}
										<div class="product_label label_sale_top_right">{l s='SALE' mod='tonyproductscarousel'}</div>{/if}
									{if isset($product.new) && $product.new == 1}
										<div class="product_label label_new_top_left">{l s='NEW' mod='tonyproductscarousel'}</div>{/if}
									<a href="{$product.link|escape:'htmlall':'UTF-8'}" class="product_image"><img
												src="{$link->getImageLink($product.link_rewrite, $product.id_image, $img_name_normal)}"
												alt="{$product.name|escape:'htmlall':'UTF-8'}"
												id="homeblock3_ajax_id_product_{$product.id_product|intval}_pimage"
												class="product-retina"
												data-image2x="{$link->getImageLink($product.link_rewrite, $product.id_image, $products_img_normal2x)}"
												itemprop="image"></a>
								</div>
								{include file="$tpl_dir./product-countdown.tpl" product=$product bid=1}
								<div class="wrapper-hover">
									{if $carousel_cfg.block3.show_p_title == 1}
										<div class="product-name"><a
													href="{$product.link|escape:'htmlall':'UTF-8'}"{if $carousel_cfg.block3.product_color} style="color:{$carousel_cfg.block3.product_color} !important;"{/if}
													itemprop="name">{$product.name|escape:'htmlall':'UTF-8'|truncate:{$title_truncate}:'...'}</a>
										</div>
									{/if}
									<div class="wrapper">
										{if $carousel_cfg.block3.show_p_price == 1}
											<div class="product-price" itemprop="offers" itemscope
												 itemtype="http://schema.org/Offer">
												<meta itemprop="priceCurrency" content="{$currency->iso_code}"/>
												<meta itemprop="name" content="{$product.name}"/>

												{if (!$PS_CATALOG_MODE AND ((isset($product.show_price) && $product.show_price) || (isset($product.available_for_order) && $product.available_for_order)))}
													{if isset($product.reduction) && $product.reduction && isset($product.show_price) && $product.show_price && !$PS_CATALOG_MODE}
														<span class="new"{if $carousel_cfg.block3.price_special_color} style="color:{$carousel_cfg.block3.price_special_color} !important;"{/if}
															  itemprop="price">{if !$priceDisplay}{convertPrice price=$product.price}{else}{convertPrice price=$product.price_tax_exc}{/if}</span>
														<span class="old"{if $carousel_cfg.block3.price_old_color} style="color:{$carousel_cfg.block3.price_old_color} !important;"{/if}>{if !$priceDisplay}{convertPrice price=$product.price_without_reduction}{else}{convertPrice price=$product.price_without_reduction}{/if}</span>
													{elseif isset($product.show_price) && $product.show_price && !isset($restricted_country_mode)}
														<span class="price"
															  style="display: inline;{if $carousel_cfg.block3.price_color}color:{$carousel_cfg.block3.price_color} !important;{/if}"
															  itemprop="price">
																						{if !$priceDisplay}{convertPrice price=$product.price}

																						{else}
																							{convertPrice price=$product.price_tax_exc}
																						{/if}
																						</span>
													{/if}
												{/if}
											</div>
										{/if}
										{include file="$tpl_dir./product-label-discount.tpl" product=$product}
										{if $carousel_cfg.block3.show_p_buy_now== 1}
											<div class="product-tocart">
												{if ($product.id_product_attribute == 0 || (isset($add_prod_display) && ($add_prod_display == 1))) && $product.available_for_order && !isset($restricted_country_mode) && $product.minimal_quantity <= 1 && $product.customizable != 2 && !$PS_CATALOG_MODE}
													{if ($product.allow_oosp || $product.quantity > 0)}
														{if isset($static_token)}
															<a class="ajax_add_to_cart_button exclusive"
															   rel="homeblock3_ajax_id_product_{$product.id_product|intval}"
															   href="{$link->getPageLink('cart',false, NULL, "add=1&amp;id_product={$product.id_product|intval}&amp;token={$static_token}", false)}"
															   title="{l s='Add to cart' mod='tonyproductscarousel'}"><i
																		class="icon-basket"></i></a>
														{else}
															<a class="ajax_add_to_cart_button exclusive"
															   rel="homeblock3_ajax_id_product_{$product.id_product|intval}"
															   href="{$link->getPageLink('cart',false, NULL, "add=1&amp;id_product={$product.id_product|intval}", false)}"
															   title="{l s='Add to cart' mod='tonyproductscarousel'}"><i
																		class="icon-basket"></i></a>
														{/if}
													{else}
														&nbsp;
													{/if}
												{/if}
											</div>
										{/if}
									</div>
								</div>
							</div>
							<div class="preview{if $carousel_cfg.block3.products_img_dimensions != 'big'} small{/if} hidden-tablet hidden-phone">
								<div class="wrapper">
									{if isset($product.new) && $product.new == 1}
										<div class="product_label label_new_top_left">{l s='NEW' mod='tonyproductscarousel'}</div>{/if}
									{if isset($product.on_sale) && $product.on_sale && isset($product.show_price) && $product.show_price && !$PS_CATALOG_MODE}
										<div class="product_label label_sale_top_right">{l s='SALE' mod='tonyproductscarousel'}</div>{/if}

									{if count($product.tony_images) > 1 && $carousel_cfg.block3.show_p_images == '1'}
										<div class="col-1"
											 {if isset($product.new) && $product.new == 1}style="padding-top:15px;"{/if}>
											{foreach from=$product.tony_images item=image key=k}
												{if $k < 4}
													<a href="{$product.link|escape:'htmlall':'UTF-8'}"
													   data-rel="{$link->getImageLink($product.link_rewrite, $image.id_image, $img_name_normal)}"
													   class="image product-retina-rel"
													   data-image2x="{$link->getImageLink($product.link_rewrite, $image.id_image, $products_img_normal2x)}"><img
																src="{$link->getImageLink($product.link_rewrite, $image.id_image, $img_name_normal)}"
																alt="{$product.name|escape:'htmlall':'UTF-8'}"
																class="thumb product-retina"
																data-image2x="{$link->getImageLink($product.link_rewrite, $image.id_image, $products_img_normal2x)}"/></a>
												{/if}
											{/foreach}

											{if (int)$k == 0}
												&nbsp;
											{/if}
										</div>
									{/if}
									<div class="col-2">
										{if $roll_over}
											<div class="big_image"><a
														href="{$product.link|escape:'htmlall':'UTF-8'}"><img
															src="{$link->getImageLink($product.link_rewrite, $roll_over, $img_name_normal)}"
															class="roll_over_img product-retina"
															alt="{$product.name|escape:'htmlall':'UTF-8'}"
															data-image2x="{$link->getImageLink($product.link_rewrite, $roll_over, $products_img_normal2x)}"></a>
											</div>
										{else}
											<div class="big_image"><a
														href="{$product.link|escape:'htmlall':'UTF-8'}"><img
															src="{$link->getImageLink($product.link_rewrite, $product.id_image, $img_name_normal)}"
															class="roll_over_img product-retina"
															alt="{$product.name|escape:'htmlall':'UTF-8'}"
															data-image2x="{$link->getImageLink($product.link_rewrite, $product.id_image, $products_img_normal2x)}"></a>
											</div>
										{/if}
										<div class="wrapper-hover">
											<div class="product-name"><a
														href="{$product.link|escape:'htmlall':'UTF-8'}"{if $carousel_cfg.block3.product_color} style="color:{$carousel_cfg.block3.product_color} !important;"{/if}>{$product.name|escape:'htmlall':'UTF-8'}</a>
											</div>
											<div class="wrapper">
												<div class="product-price">

													{if (!$PS_CATALOG_MODE AND ((isset($product.show_price) && $product.show_price) || (isset($product.available_for_order) && $product.available_for_order)))}
														{if isset($product.reduction) && $product.reduction && isset($product.show_price) && $product.show_price && !$PS_CATALOG_MODE}
															<span class="new"{if $carousel_cfg.block3.price_special_color} style="color:{$carousel_cfg.block3.price_special_color} !important;"{/if}>{if !$priceDisplay}{convertPrice price=$product.price}{else}{convertPrice price=$product.price_tax_exc}{/if}</span>
															<span class="old"{if $carousel_cfg.block3.price_old_color} style="color:{$carousel_cfg.block3.price_old_color} !important;"{/if}>{if !$priceDisplay}{convertPrice price=$product.price_without_reduction}{else}{convertPrice price=$product.price_without_reduction}{/if}</span>
														{elseif isset($product.show_price) && $product.show_price && !isset($restricted_country_mode)}
															<span class="price"
																  style="display: inline;{if $carousel_cfg.block3.price_color}color:{$carousel_cfg.block3.price_color} !important;{/if}">{if !$priceDisplay}{convertPrice price=$product.price}{else}{convertPrice price=$product.price_tax_exc}{/if}</span>{/if}
													{/if}
												</div>
												{include file="$tpl_dir./product-label-discount.tpl" product=$product}
												{include file="$tpl_dir./product-quick-view.tpl" product=$product title={l s='Quick View' mod='tonyproductscarousel'} imgrel="homeblock3_ajax_id_product_{$product.id_product|intval}" }

												<div class="product-tocart">{if ($product.id_product_attribute == 0 || (isset($add_prod_display) && ($add_prod_display == 1))) && $product.available_for_order && !isset($restricted_country_mode) && $product.minimal_quantity <= 1 && $product.customizable != 2 && !$PS_CATALOG_MODE}
														{if ($product.allow_oosp || $product.quantity > 0)}
															{if isset($static_token)}
																<a class="ajax_add_to_cart_button exclusive"
																   rel="homeblock3_ajax_id_product_{$product.id_product|intval}"
																   href="{$link->getPageLink('cart',false, NULL, "add=1&amp;id_product={$product.id_product|intval}&amp;token={$static_token}", false)}"
																   title="{l s='Add to cart' mod='tonyproductscarousel'}"><i
																			class="icon-basket"></i></a>
															{else}
																<a class="ajax_add_to_cart_button exclusive"
																   rel="homeblock3_ajax_id_product_{$product.id_product|intval}"
																   href="{$link->getPageLink('cart',false, NULL, "add=1&amp;id_product={$product.id_product|intval}", false)}"
																   title="{l s='Add to cart' mod='tonyproductscarousel'}"><i
																			class="icon-basket"></i></a>
															{/if}
														{else}
															&nbsp;
														{/if}
													{/if}</div>
											</div>
											<div class="product-link">
												{if isset($comparator_max_item) && $comparator_max_item}
													{l s='Add to compare' mod='tonyproductscarousel'}
													<input type="checkbox" class="comparator"
														   id="comparator_item_{$product.id_product}"
														   value="comparator_item_{$product.id_product}"
														   {if isset($compareProducts) && in_array($product.id_product, $compareProducts)}checked="checked"{/if}
														   style="margin:0px;"/>
												{/if}
											</div>
											{include file="$tpl_dir./product-rating.tpl" rating=$product.rating}
										</div>
									</div>
								</div>
							</div>
						{/foreach}


					</div>
				</div>
			</div>
		</div>
	</div>
{/if}
{if $tony_cfg.theme_home_left_menu != '1'}
	<div class="line"></div>
{/if}

<div class="{if $tony_cfg.theme_home_left_menu != '1'}container{else}row{/if}">
	{if $carousel_cfg.block4.disable != 1}
		{capture assign=high_slider}{hook h='displayHighSliderOnHome'}{/capture}
		<h2>{$carousel_cfg.block4.block_title}</h2>
		<div class="row">
			<div class="product_row">
				<div class="{if strlen($high_slider)}span9{else}span{if $tony_cfg.theme_home_left_menu != '1'}12{else}9{/if}{/if}">
					<div class="row {if $carousel_cfg.block4.products_img_dimensions == 'big'}big_with_description{else}small_with_description{/if}">
						{foreach from=$carousel_cfg.block4.products_list item=product}

							{if isset($product.tony_images[1])}
								{assign var="roll_over" value=$product.tony_images[1].id_image}
							{else}
								{assign var="roll_over" value=false}
							{/if}
							{if $carousel_cfg.block4.products_img_dimensions == 'big'}
								{assign var="img_name_normal" value="tonytheme_product"}
								{assign var="title_truncate" value="35"}
							{else}
								{assign var="img_name_normal" value="tonytheme_product_small"}
								{assign var="title_truncate" value="25"}
							{/if}
							{capture assign=products_img_normal2x}{$img_name_normal}_2x{/capture}
							<div class="{if $carousel_cfg.block4.products_img_dimensions == 'big'}span3{else}span2{/if} product ajax_block_product"
								 itemscope itemtype="http://schema.org/Product">
								<meta itemprop="manufacturer" content="{$product.manufacturer_name}"/>
								<div class="product-image-wrapper onhover animate scale">
									{if isset($product.on_sale) && $product.on_sale && isset($product.show_price) && $product.show_price && !$PS_CATALOG_MODE}
										<div class="product_label label_sale_top_right">{l s='SALE' mod='tonyproductscarousel'}</div>{/if}
									{if isset($product.new) && $product.new == 1}
										<div class="product_label label_new_top_left">{l s='NEW' mod='tonyproductscarousel'}</div>{/if}
									<a href="{$product.link|escape:'htmlall':'UTF-8'}" class="product_image"><img
												src="{$link->getImageLink($product.link_rewrite, $product.id_image, $img_name_normal)}"
												alt="{$product.name|escape:'htmlall':'UTF-8'}"
												id="homeblock4_ajax_id_product_{$product.id_product|intval}_pimage"
												class="product-retina"
												data-image2x="{$link->getImageLink($product.link_rewrite, $product.id_image, $products_img_normal2x)}"
												itemprop="image"></a>
								</div>
								{include file="$tpl_dir./product-countdown.tpl" product=$product bid=2}
								<div class="wrapper-hover">
									{if $carousel_cfg.block4.show_p_title == 1}
										<div class="product-name"><a
													href="{$product.link|escape:'htmlall':'UTF-8'}"{if $carousel_cfg.block4.product_color} style="color:{$carousel_cfg.block4.product_color} !important;"{/if}
													itemprop="name">{$product.name|escape:'htmlall':'UTF-8'|truncate:{$title_truncate}:'...'}</a>
										</div>
									{/if}
									<div class="wrapper">
										{if $carousel_cfg.block4.show_p_price == 1}
											<div class="product-price" itemprop="offers" itemscope
												 itemtype="http://schema.org/Offer">
												<meta itemprop="priceCurrency" content="{$currency->iso_code}"/>
												<meta itemprop="name" content="{$product.name}"/>
												{if (!$PS_CATALOG_MODE AND ((isset($product.show_price) && $product.show_price) || (isset($product.available_for_order) && $product.available_for_order)))}
													{if isset($product.reduction) && $product.reduction && isset($product.show_price) && $product.show_price && !$PS_CATALOG_MODE}
														<span class="new"{if $carousel_cfg.block4.price_special_color} style="color:{$carousel_cfg.block4.price_special_color} !important;"{/if}
															  itemprop="price">{if !$priceDisplay}{convertPrice price=$product.price}{else}{convertPrice price=$product.price_tax_exc}{/if}</span>
														<span class="old"{if $carousel_cfg.block4.price_old_color} style="color:{$carousel_cfg.block4.price_old_color} !important;"{/if}>{if !$priceDisplay}{convertPrice price=$product.price_without_reduction}{else}{convertPrice price=$product.price_without_reduction}{/if}</span>
													{elseif isset($product.show_price) && $product.show_price && !isset($restricted_country_mode)}
														<span class="price"
															  style="display: inline;{if $carousel_cfg.block4.price_color}color:{$carousel_cfg.block4.price_color} !important;{/if}"
															  itemprop="price">{if !$priceDisplay}{convertPrice price=$product.price}{else}{convertPrice price=$product.price_tax_exc}{/if}</span>{/if}
												{/if}
											</div>
										{/if}
										{include file="$tpl_dir./product-label-discount.tpl" product=$product}
										{if $carousel_cfg.block4.show_p_buy_now== 1}
											<div class="product-tocart">{if ($product.id_product_attribute == 0 || (isset($add_prod_display) && ($add_prod_display == 1))) && $product.available_for_order && !isset($restricted_country_mode) && $product.minimal_quantity <= 1 && $product.customizable != 2 && !$PS_CATALOG_MODE}
													{if ($product.allow_oosp || $product.quantity > 0)}
														{if isset($static_token)}
															<a class="ajax_add_to_cart_button exclusive"
															   rel="homeblock4_ajax_id_product_{$product.id_product|intval}"
															   href="{$link->getPageLink('cart',false, NULL, "add=1&amp;id_product={$product.id_product|intval}&amp;token={$static_token}", false)}"
															   title="{l s='Add to cart' mod='tonyproductscarousel'}"><i
																		class="icon-basket"></i></a>
														{else}
															<a class="ajax_add_to_cart_button exclusive"
															   rel="homeblock4_ajax_id_product_{$product.id_product|intval}"
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
							<div class="preview{if $carousel_cfg.block4.products_img_dimensions != 'big'} small{/if} hidden-tablet hidden-phone">
								<div class="wrapper">

									{if isset($product.new) && $product.new == 1}
										<div class="product_label label_new_top_left">{l s='NEW' mod='tonyproductscarousel'}</div>{/if}
									{if isset($product.on_sale) && $product.on_sale && isset($product.show_price) && $product.show_price && !$PS_CATALOG_MODE}
										<div class="product_label label_sale_top_right">{l s='SALE' mod='tonyproductscarousel'}</div>{/if}

									{if count($product.tony_images) > 1 && $carousel_cfg.block4.show_p_images == '1'}
										<div class="col-1"
											 {if isset($product.new) && $product.new == 1}style="padding-top:15px;"{/if}>
											{foreach from=$product.tony_images item=image key=k}
												{if $k < 4}
													<a href="{$product.link|escape:'htmlall':'UTF-8'}"
													   data-rel="{$link->getImageLink($product.link_rewrite, $image.id_image, $img_name_normal)}"
													   class="image product-retina-rel"
													   data-image2x="{$link->getImageLink($product.link_rewrite, $image.id_image, $products_img_normal2x)}"><img
																src="{$link->getImageLink($product.link_rewrite, $image.id_image, $img_name_normal)}"
																alt="{$product.name|escape:'htmlall':'UTF-8'}"
																class="thumb product-retina"
																data-image2x="{$link->getImageLink($product.link_rewrite, $image.id_image, $products_img_normal2x)}"/></a>
												{/if}
											{/foreach}

											{if (int)$k == 0}
												&nbsp;
											{/if}
										</div>
									{/if}
									<div class="col-2">
										{if $roll_over}
											<div class="big_image"><a
														href="{$product.link|escape:'htmlall':'UTF-8'}"><img
															src="{$link->getImageLink($product.link_rewrite, $roll_over, $img_name_normal)}"
															class="roll_over_img product-retina"
															alt="{$product.name|escape:'htmlall':'UTF-8'}"
															data-image2x="{$link->getImageLink($product.link_rewrite, $roll_over, $products_img_normal2x)}"></a>
											</div>
										{else}
											<div class="big_image"><a
														href="{$product.link|escape:'htmlall':'UTF-8'}"><img
															src="{$link->getImageLink($product.link_rewrite, $product.id_image, $img_name_normal)}"
															class="roll_over_img product-retina"
															alt="{$product.name|escape:'htmlall':'UTF-8'}"
															data-image2x="{$link->getImageLink($product.link_rewrite, $product.id_image, $products_img_normal2x)}"></a>
											</div>
										{/if}
										<div class="wrapper-hover">
											<div class="product-name"><a
														href="{$product.link|escape:'htmlall':'UTF-8'}"{if $carousel_cfg.block4.product_color} style="color:{$carousel_cfg.block4.product_color} !important;"{/if}>{$product.name|escape:'htmlall':'UTF-8'}</a>
											</div>
											<div class="wrapper">
												<div class="product-price">
													{if (!$PS_CATALOG_MODE AND ((isset($product.show_price) && $product.show_price) || (isset($product.available_for_order) && $product.available_for_order)))}
														{if isset($product.reduction) && $product.reduction && isset($product.show_price) && $product.show_price && !$PS_CATALOG_MODE}
															<span class="new"{if $carousel_cfg.block4.price_special_color} style="color:{$carousel_cfg.block4.price_special_color} !important;"{/if}>{if !$priceDisplay}{convertPrice price=$product.price}{else}{convertPrice price=$product.price_tax_exc}{/if}</span>
															<span class="old"{if $carousel_cfg.block4.price_old_color} style="color:{$carousel_cfg.block4.price_old_color} !important;"{/if}>{if !$priceDisplay}{convertPrice price=$product.price_without_reduction}{else}{convertPrice price=$product.price_without_reduction}{/if}</span>
														{elseif isset($product.show_price) && $product.show_price && !isset($restricted_country_mode)}
															<span class="price"
																  style="display: inline;{if $carousel_cfg.block4.price_color}color:{$carousel_cfg.block4.price_color} !important;{/if}">{if !$priceDisplay}{convertPrice price=$product.price}{else}{convertPrice price=$product.price_tax_exc}{/if}</span>{/if}
													{/if}
												</div>
												{include file="$tpl_dir./product-label-discount.tpl" product=$product}
												{include file="$tpl_dir./product-quick-view.tpl" product=$product title={l s='Quick View' mod='tonyproductscarousel'} imgrel="homeblock4_ajax_id_product_{$product.id_product|intval}" }

												<div class="product-tocart">{if ($product.id_product_attribute == 0 || (isset($add_prod_display) && ($add_prod_display == 1))) && $product.available_for_order && !isset($restricted_country_mode) && $product.minimal_quantity <= 1 && $product.customizable != 2 && !$PS_CATALOG_MODE}
														{if ($product.allow_oosp || $product.quantity > 0)}
															{if isset($static_token)}
																<a class="ajax_add_to_cart_button exclusive"
																   rel="homeblock4_ajax_id_product_{$product.id_product|intval}"
																   href="{$link->getPageLink('cart',false, NULL, "add=1&amp;id_product={$product.id_product|intval}&amp;token={$static_token}", false)}"
																   title="{l s='Add to cart' mod='tonyproductscarousel'}"><i
																			class="icon-basket"></i></a>
															{else}
																<a class="ajax_add_to_cart_button exclusive"
																   rel="homeblock4_ajax_id_product_{$product.id_product|intval}"
																   href="{$link->getPageLink('cart',false, NULL, "add=1&amp;id_product={$product.id_product|intval}", false)}"
																   title="{l s='Add to cart' mod='tonyproductscarousel'}"><i
																			class="icon-basket"></i></a>
															{/if}
														{else}
															&nbsp;
														{/if}
													{/if}</div>
											</div>
											<div class="product-link">
												{if isset($comparator_max_item) && $comparator_max_item}
													{l s='Add to compare' mod='tonyproductscarousel'}
													<input type="checkbox" class="comparator"
														   id="comparator_item_{$product.id_product}"
														   value="comparator_item_{$product.id_product}"
														   {if isset($compareProducts) && in_array($product.id_product, $compareProducts)}checked="checked"{/if}
														   style="margin:0px;"/>
												{/if}
											</div>
											{include file="$tpl_dir./product-rating.tpl" rating=$product.rating}
										</div>
									</div>
								</div>
							</div>
						{/foreach}
					</div>
				</div>
			</div>
			{$high_slider}
		</div>
	{/if}
</div>