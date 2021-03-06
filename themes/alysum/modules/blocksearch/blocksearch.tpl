{*
* 2007-2012 PrestaShop
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
*  @author PrestaShop SA <contact@prestashop.com>
*  @copyright  2007-2012 PrestaShop SA
*  @version  Release: $Revision: 7331 $
*  @license    http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*  International Registered Trademark & Property of PrestaShop SA
*}

<!-- Block search module -->
<div id="search_block_left" class="block exclusive">
	<h4>{l s='Search' mod='blocksearch'}</h4>
	<form method="get" action="{$link->getPageLink('search', true)}" id="searchbox">
		<p class="block_content">
			<label for="search_query_block">{l s='Enter a product name' mod='blocksearch'}</label>
			<input type="hidden" name="orderby" value="position" />
			<input type="hidden" name="controller" value="search" />
			<input type="hidden" name="orderway" value="desc" />
			<input class="search_query" type="text" id="search_query_block" name="search_query" value="{if isset($smarty.get.search_query)}{$smarty.get.search_query|htmlentities:$ENT_QUOTES:'utf-8'|stripslashes}{/if}" />
			<input type="submit" id="search_button" class="button_mini" value="{l s='go' mod='blocksearch'}" />
		</p>
	</form>
</div>
{if $instantsearch}
	<script type="text/javascript">
	// <![CDATA[
		{literal}
		function tryToCloseInstantSearch() {
			if ($('#old_center_column').length > 0)
			{
				$('#center_column').remove();
				$('#old_center_column').attr('id', 'center_column');
				$('#center_column').show();
				return false;
			}
		}
		
		instantSearchQueries = new Array();
		function stopInstantSearchQueries(){
			for(i=0;i<instantSearchQueries.length;i++) {
				instantSearchQueries[i].abort();
			}
			instantSearchQueries = new Array();
		}
		
		$("#search_query_block").keyup(function(){
			if($(this).val().length > 0){
				stopInstantSearchQueries();
				instantSearchQuery = $.ajax({
				url: '{/literal}{if $search_ssl == 1}{$link->getPageLink('search', true)}{else}{$link->getPageLink('search')}{/if}{literal}',
				data: 'instantSearch=1&id_lang={/literal}{$cookie->id_lang}{literal}&q='+$(this).val(),
				dataType: 'html',
				success: function(data){
					if($("#search_query_block").val().length > 0)
					{
						tryToCloseInstantSearch();
						$('#center_column').attr('id', 'old_center_column');
						$('#old_center_column').after('<div id="center_column">'+data+'</div>');
						$('#old_center_column').hide();
						$("#instant_search_results a.close").click(function() {
							$("#search_query_block").val('');
							return tryToCloseInstantSearch();
						});
						return false;
					}
					else
						tryToCloseInstantSearch();
					}
				});
				instantSearchQueries.push(instantSearchQuery);
			}
			else
				tryToCloseInstantSearch();
		});
	// ]]>
	{/literal}
	</script>
{/if}

{if $ajaxsearch}
	<script type="text/javascript">
	// <![CDATA[
	{literal}
		$('document').ready( function() {
			$("#search_query_block")
				.autocomplete(
					'{/literal}{if $search_ssl == 1}{$link->getPageLink('search', true)}{else}{$link->getPageLink('search')}{/if}{literal}', {
						minChars: 3,
						max: 10,
						width: 500,
						selectFirst: false,
						scroll: false,
						dataType: "json",
						formatItem: function(data, i, max, value, term) {
							return value;
						},
						parse: function(data) {
							var mytab = new Array();
							for (var i = 0; i < data.length; i++) {
								var prodImg = getProducts(data[i].id_product, data[i].crewrite);
								var obj = $.parseJSON(prodImg);					
								//var prodPrice = getPrice(data[i].id_product);
								mytab[mytab.length] = { data: data[i], value:  ' <img src="'+ obj.link + '" /><span class="prname">'  + data[i].pname + ' </span><div class="prPrice">'+ obj.price + '</div>'};
								mytab[mytab.length] = { data: data[i], value: data[i].cname + ' > ' + data[i].pname };
							}
							return mytab;
						},
						extraParams: {
							ajaxSearch: 1,
							id_lang: id_lang
						}
					}
				)
				.result(function(event, data, formatted) {
					$('#search_query_block').val(data.pname);
					document.location.href = data.product_link;
				});
			function getProducts(pID, crewrite) {
				var tmp = 0;
				$.ajax({
				    type: 'POST',
				    async:false,
				    url: baseDir + 'modules/pk_themesettings/ajax.php?spID='+pID+'&crewrite='+crewrite+'&imgName=small_default',
				    success: function(result){
				      if (result == '0') {
				        console.log("no data")
				      } else {
						tmp = result;					
				      }
				    }
				});
				return tmp;
			}
		});
	{/literal}
	// ]]>
	</script>
{/if}
<!-- /Block search module -->
