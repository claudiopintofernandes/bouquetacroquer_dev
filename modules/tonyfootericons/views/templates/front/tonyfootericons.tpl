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
<div class="container" id="footer_bottom">
	<div class="row">
		<div class="span12">
			<div class="pull-left noHover"><span class="hidden-phone payment_icons">
            {if $tonyfooterlinks.p1 == 1}<img src="{$img_dir}payment1.png" alt="" width="30" height="19">{/if}
					{if $tonyfooterlinks.p2 == 1}<img src="{$img_dir}payment2.png" alt="" width="30" height="19">{/if}
					{if $tonyfooterlinks.p3 == 1}<img src="{$img_dir}payment3.png" alt="" width="30" height="19">{/if}
					{if $tonyfooterlinks.p4 == 1}<img src="{$img_dir}payment4.png" alt="" width="30" height="19">{/if}
					{if $tonyfooterlinks.p5 == 1}<img src="{$img_dir}payment5.png" alt="" width="30" height="19">{/if}
          </span><span class="text">{$tonyfooterlinks.copy}</span></div>
			<div class="pull-right noHover">
				{if $tonyfooterlinks.s0}<a href="{$tonyfooterlinks.s0}" target="_blank"><i class="icon-facebook-circled-1"></i></a>&nbsp;{/if}
				{if $tonyfooterlinks.s1}<a href="{$tonyfooterlinks.s1}" target="_blank"><i class="icon-twitter-circled-1"></i></a>&nbsp;{/if}
				{if $tonyfooterlinks.s2}<a href="{$tonyfooterlinks.s2}" target="_blank"><i class="icon-linkedin-circled"></i></a>&nbsp;{/if}
				{if $tonyfooterlinks.s3}<a href="{$tonyfooterlinks.s3}" target="_blank"><i class="icon-pinterest-circled"></i></a>&nbsp;{/if}
				{if $tonyfooterlinks.s4}<a href="{$tonyfooterlinks.s4}" target="_blank"><i class="icon-gplus-circled-1"></i></a>{/if}
			</div>
		</div>
	</div>
</div>