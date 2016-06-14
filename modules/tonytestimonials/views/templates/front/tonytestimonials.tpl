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
<!--TESTIMONIALS-->
{if $tonyslider}
	<div class="container">
		<div class="row">
			<div class="span12">
				<div class="parallax-block parallax fullwidth-block">
					<div class="container">
						<div class="row">
							<div class="span8 offset2">
								<div id="fst_comments_scroll" class="fst_comments_scroll">
									<h3>{$label}</h3>

									<div class="carousel-testimonials">
										<div class="quotes">&#8220;</div>
										<div class="flexslider">
											<ul class="slides">
												{foreach key=key item=item from=$tonyslider}
													<li id="quote-{$item.id}" class="cbp-qtcontent quote first">
														<p class="testimonials-text">{$item.text|escape}</p>

														<p>
													<span class="testimonial-author">
														<cite class="author"><strong>{$item.name|escape}
																, {$item.position|escape}</strong></cite>
													</span>
														</p>
													</li>
												{/foreach}
											</ul>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
{/if}
<!--END TESTIMONIALS-->