<!--popuparize start-->
{if count($tonyblocks)}
	<div class="footer-line"></div>
	<div class="{if $page_name != 'index'}container{else}container{/if}" style="padding-bottom:{if $tony_cfg.color_scheme == 'dark'}37px;{else}70px;{/if}">
		{foreach from=$tonyblocks item=row}
			<div class="row animate-delay-outer">
				{foreach from=$row item=block key=id name=popa}
					{if $smarty.foreach.popa.index == 0 || $smarty.foreach.popa.index == 2}
						<div class="span6">
							<div class="row">
					{/if}
					<div class="span3 animate-delay fadeUp">
						<h4>{if $block.icon}{$block.icon}{/if}{$block.title}</h4>
						<div class="cleancode">
							{$block.content}
						</div>
					</div>
					{if $smarty.foreach.popa.index == 1 || $smarty.foreach.popa.index == 3}
							</div>
						</div>  
					{/if}
				{/foreach}
			</div>
		{/foreach}      
	</div> 
{/if}    
<!--popuparize end-->