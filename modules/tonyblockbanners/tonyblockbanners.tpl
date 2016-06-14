{if count($tonybanners) > 0}
	<div class="container">
		{foreach from=$tonybanners item=tonybanner}
			<div class="row animate-delay-outer">
				{foreach from=$tonybanner item=banner}
					<div class="span3 block_img animate-delay scale"><a
								href="{$banner.link}"{if $banner.new_window == 1} target="_blank"{/if}><img
									src="{$banner.image}" alt=""
									{if $banner.retina_image == 'true'}data-retina="true"{/if}/></a></div>
				{/foreach}
			</div>
		{/foreach}
	</div>
{/if}