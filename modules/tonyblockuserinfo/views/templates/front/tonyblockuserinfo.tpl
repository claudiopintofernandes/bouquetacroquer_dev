{*
* 2007-2013 PrestaShop
*
* NOTICE OF LICENSE
*
* This source file is subject to the Academic Free License (AFL 3.0)
* that is bundled with this package in the file LICENSE.txt.
* It is also available through the world-wide-web at this URL:
* http://opensource.org/licenses/afl-3.0.php
* If you did not receive a copy of the license and are unable to
* obtain it through the world-wide-web, please send an email
* to license@prestashop.com so we can send you a copy immediately.
*
* DISCLAIMER
*
* Do not edit or add to this file if you wish to upgrade PrestaShop to newer
* versions in the future. If you wish to customize PrestaShop for your
* needs please refer to http://www.prestashop.com for more information.
*
*  @author    PrestaShop SA <contact@prestashop.com>
*  @copyright PrestaShop SA
*  @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*  International Registered Trademark & Property of PrestaShop SA
*}
<!-- Block user information module -->
<span class="hidden-phone">
	{if !$logged}
		<a href="{$link->getPageLink('my-account', true)}"
		   title="{l s='Login to your customer account' mod='tonyblockuserinfo'}"
		   rel="nofollow">{l s='Login' mod='tonyblockuserinfo'}</a>
		 /
		<a href="{$link->getPageLink('my-account', true)}">{l s='Register' mod='tonyblockuserinfo'}</a>

				{else}

		<a href="{$link->getPageLink('my-account', true)}"><span>{$cookie->customer_firstname} {$cookie->customer_lastname}</span></a>
		<a href="{$link->getPageLink('index', true, NULL, "mylogout")}"
		   title="{l s='Log me out' mod='tonyblockuserinfo'}">{l s='Log out' mod='tonyblockuserinfo'}</a>
	{/if}
	&nbsp;&nbsp;</span>
<div class="fadelink"><a href="#">{l s='Account' mod='tonyblockuserinfo'}</a>

	<div class="ul_wrapper">
		<ul>
			{if $logged}
				{if $has_customer_an_address}
					<li><a href="{$link->getPageLink('address', true)}"
						   title="{l s='Add my first address' mod='tonyblockuserinfo'}">{l s='Add my first address' mod='tonyblockuserinfo'}</a></li>
				{/if}
				<li><a href="{$link->getPageLink('history', true)}"
					   title="{l s='Orders' mod='tonyblockuserinfo'}">{l s='Order history and details' mod='tonyblockuserinfo'}</a></li>
				{if $returnAllowed}
					<li><a href="{$link->getPageLink('order-follow', true)}"
						   title="{l s='Merchandise returns' mod='tonyblockuserinfo'}">{l s='My merchandise returns' mod='tonyblockuserinfo'}</a></li>
				{/if}
				<li><a href="{$link->getPageLink('order-slip', true)}"
					   title="{l s='Credit slips' mod='tonyblockuserinfo'}">{l s='My credit slips' mod='tonyblockuserinfo'}</a></li>
				<li><a href="{$link->getPageLink('addresses', true)}" title="{l s='Addresses' mod='tonyblockuserinfo'}">{l s='My addresses' mod='tonyblockuserinfo'}</a>
				</li>
				<li><a href="{$link->getPageLink('identity', true)}"
					   title="{l s='Information' mod='tonyblockuserinfo'}">{l s='My personal information' mod='tonyblockuserinfo'}</a></li>
				{if $voucherAllowed}
					<li><a href="{$link->getPageLink('discount', true)}"
						   title="{l s='Vouchers' mod='tonyblockuserinfo'}">{l s='My vouchers' mod='tonyblockuserinfo'}</a></li>
				{/if}
				{hook h='displayCustomerAccount'}
				<li><a href="{$link->getPageLink('index', true, NULL, "mylogout")}"
					   title="{l s='Log me out' mod='tonyblockuserinfo'}">{l s='Log out' mod='tonyblockuserinfo'}</a></li>
			{else}
				<li><a href="{$link->getPageLink('my-account', true)}">{l s='Login' mod='tonyblockuserinfo'}</a></li>
				<li><a href="{$link->getPageLink('my-account', true)}">{l s='Register' mod='tonyblockuserinfo'}</a></li>
			{/if}

		</ul>
	</div>
</div>
<!-- /Block user information module -->