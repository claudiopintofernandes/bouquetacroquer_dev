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
<!-- Social networks authentication module -->
<span class="hidden-small-desktop">{$tony_cfg.header_welcome_msg} &nbsp;&nbsp;</span>
{$js_code}
{if $fb_enabled || $tw_enabled}
	<div id="soc-auth-msg">
		<div class="message">
			<div class="inside">{$result_message}</div>
		</div>
	</div>
	<div class="login_social hidden-tablet hidden-phone"><span>{l s='Login' mod='tonysocialauth'} <span
					class="hidden-phone">{l s='using' mod='tonysocialauth'}:</span></span>&nbsp;&nbsp;
		{if $fb_enabled}
			<a href="{$fb_login_url}" class="auth-img"><img src="{$fb_login_img}" data-retina="true"></a>
		{/if}
		{if $tw_enabled}
			<a href="{$tw_login_url}" class="auth-img"><img src="{$tw_login_img}" data-retina="true"></a>
		{/if}
	</div>
{/if}
<!-- /Social networks authentication module -->
