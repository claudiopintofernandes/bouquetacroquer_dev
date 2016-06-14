{if $custom_block.show_mode == 'html' && $custom_block.html && !isset($smarty.get.quickview)}
	<div class="product_custom">
		<h2>{$custom_block.title}</h2>
		{$custom_block.html}
	</div>
{else if $custom_block.show_mode == 'products' && $custom_block.related_products}
	<div class="product_related">
		<h4>{$custom_block.title}</h4>
		<div class="flexslider vertical">
			<ul class="slides">
				{foreach from=$custom_block.related_products item='product'}
					<li><a href="{$product.link|escape:'htmlall':'UTF-8'}"><img src="{$link->getImageLink($product.link_rewrite, $product.id_image, 'tonytheme_product_related')}" alt="" class="product-retina" data-image2x="{$link->getImageLink($product.link_rewrite, $product.id_image, 'tonytheme_product_related_2x')}"></a></a></li>
						{/foreach}  
			</ul>
		</div>
	</div>
{/if}              

{if $custom_block.video}
	<script type="text/javascript">
		$(document).ready(function() {
			$("#thumbs_list_frame_cloudzoom").append('<li style="display:block;"><a href="#" id="product-video-launcher"><i class="icon-right-open-1"></i></a> </li>');
			$("#product-video-launcher").click(function() {
				$.fancybox({
					'href': '{$custom_block.video}',
					'type': 'iframe'
				});
				return false;
			});
		});
	</script>
{/if}
