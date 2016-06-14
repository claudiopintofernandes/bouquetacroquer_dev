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
<!-- Top horizontal menu -->
<div class="container">
	<div class="row">
		<div class="span12">
			<nav>
			</nav>
		</div>
		<div class="spy-left">
			<div class="logo"><a href="{$base_dir}" title="{$shop_name|escape:'htmlall':'UTF-8'}"><img class="logo"
																									   src="{$logo_url}"
																									   alt="{$shop_name|escape:'htmlall':'UTF-8'}"
																									   {if $logo_image_width}width="{$logo_image_width}"{/if} {if $logo_image_height}height="{$logo_image_height}" {/if} /></a>
			</div>
		</div>
		<div class="spy-right">
			<div class="spyshop"></div>
			<div class="form-search-wrapper">
				<form class="form-search" id="form-search-spy" action="{$link->getPageLink('search', true)}"
					  method="get">
					<input type="hidden" name="controller" value="search"/>
					<input type="hidden" name="orderby" value="position"/>
					<input type="hidden" name="orderway" value="desc"/>
					<input type="text" class="search-query" placeholder="{l s='search ...' mod='tonythemeblocktopmenu'}"
						   name="search_query" id="search-input-2">
					<button type="submit" class="btn" onClick="document.getElementById('orm-search-spy').submit()"><i
								class="icon-search-2"></i></button>
				</form>
			</div>

		</div>
	</div>
</div>
<!-- /Top horizontal menu -->