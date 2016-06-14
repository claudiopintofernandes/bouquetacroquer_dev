{if $links_cfg}
	<div class="container">
		<div class="custom_blocks margin-1 animate-delay-outer">
			{foreach from=$links_cfg item=block}
				<div class="pull-left">
					<div class="wrapper_w">
						{foreach from=$block item=link}
							{if $link.title}
								<div class="tt-box{if $link.pos_class} {$link.pos_class}{/if} animate-delay fadeUp">
									<div class="inside"> {if $link.link}<a href="{$link.link}"{if $link.new_window} target="_blank"{/if}>{/if}{if $link.icon}{$link.icon}{/if}<span class="text">{$link.title}</span>{if $link.link}</a>{/if} </div>
								</div>
							{/if} 
						{/foreach}
					</div> 
				</div> 
			{/foreach}
		</div>
	</div>  
{/if}  