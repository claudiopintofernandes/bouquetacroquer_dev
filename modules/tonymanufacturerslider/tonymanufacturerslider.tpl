<div class="container">
	<div class="row">
		<div class="brands_block" id="manufacturers-wrapper">
			<div class="span12">
				<h2 class="brands_title">{l s='Brands' mod='tonymanufacturerslider'}</h2>
				<ul class="jcarousel-skin-buyshop">
					{foreach from=$manufacturers item=manufacturer name=manufacturers}          
						<li><a href="{$link->getmanufacturerLink($manufacturer.id_manufacturer, $manufacturer.link_rewrite)|escape:'htmlall':'UTF-8'}" title="{$manufacturer.name|escape:'htmlall':'UTF-8'}"><img src="{$img_manu_dir}{$manufacturer.image|escape:'htmlall':'UTF-8'}-manufacturer_slider.jpg" alt="{$manufacturer.name|escape:'htmlall':'UTF-8'}" /></a></li>
							{/foreach}
				</ul>
			</div>
		</div>
	</div>
</div>

{if count($manufacturers) > 5}
	<script type="text/javascript">
		$('#manufacturers-wrapper ul').jcarousel({
			vertical: false,
			visible: 5,
			scroll: 3,
			rtl: isRTL,
			buttonNextHTML: '<a class="btn icon-right-open-3 icon-2x"></a>',
			buttonPrevHTML: '<a class="btn icon-left-open-3 icon-2x"></a>'
		});
	</script>
{/if}