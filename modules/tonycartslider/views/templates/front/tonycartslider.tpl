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
<script type="text/javascript">
    // <![CDATA[
    $(document).ready(function () {

        jQuery.fn.swap = function (b) {
            b = jQuery(b)[0];
            var a = this[0];
            var t = a.parentNode.insertBefore(document.createTextNode(''), a);
            b.parentNode.insertBefore(a, b);
            t.parentNode.insertBefore(b, t);
            t.parentNode.removeChild(t);
            return this;
        };

        jQuery("#right_toolbar .shoppingcart").mouseenter(function () {
            $("#top-minicart-wrapper .inner-wrapper").swap("#right-minicart-wrapper .inner-wrapper");
            $("#right_toolbar #right-minicart-wrapper").show();
            jQuery(this).find(".shopping_cart_mini").stop(true, true).fadeIn(200, "linear");
        });

        jQuery("#right_toolbar .shoppingcart").mouseleave(function () {
            jQuery(this).find(".shopping_cart_mini").stop(true, true).fadeOut(200, "linear");
            $("#right_toolbar #right-minicart-wrapper").hide();
            $("#right-minicart-wrapper").swap("#top-minicart-wrapper");
        });


        $("#search-input").autocomplete({
            source: '{$ajax_search_url}',
            id: 'ui-search-wrapper',
            minLength: 3,
            appendTo: '#autocomplete-results-wrapper',
            open: function () {
                $(this).autocomplete('widget').css('z-index', 5000);
                return false;
            },
            select: function (event, ui) {
                if (ui.item.link != '')
                    document.location.href = ui.item.link;
            }
        });


    });
    // ]]>
</script>
<div id="right_toolbar" class="hidden-phone hidden-tablet">
    {if $smalllogo}
        <div><a href="{$base_dir}" title="{$shop_name|escape:'htmlall':'UTF-8'}"><img src="{$smalllogo}" alt=""
                                                                                      data-retina="true"></a></div>{/if}

    <div class="shoppingcart" id="cart_block">
        <div class="fadelink"><span class="pull-right"> <a href="{$link->getPageLink($order_process, true)}"
                                                           title="{l s='View my shopping cart' mod='tonycartslider'}"
                                                           rel="nofollow" class="btn"><i
                            class="icon-basket icon-2x"></i></a> </span><span
                    class="ajax_cart_quantity badge badge-inverse"
                    {if $cart_qties <= 0}style="display:none;"{/if}>{$cart_qties}</span>

            <div class="shopping_cart_mini hidden-phone hidden-tablet" id="right-minicart-wrapper">
            </div>

        </div>
    </div>

    <div class="search_wrapper">
        <form class="form-search" id="form-search-right" method="get" action="{$link->getPageLink('search', true)}">
            <input type="hidden" name="controller" value="search"/>
            <input type="hidden" name="orderby" value="position"/>
            <input type="hidden" name="orderway" value="desc"/>
            {literal}
            <button type="submit" class="btn" onClick="document.getElementById('form-search-right').submit()"><i
                        class="icon-search-2 icon-large"></i></button>
            <input type="text" class="input-medium search-query"
                   value="{/literal}{l s='search' mod='tonycartslider'}{literal}"
                   onblur="if (this.value == '') {this.value = '{/literal}{l s='search' mod='tonycartslider'}{literal}';}"
                   onfocus="if(this.value == '{/literal}{l s='search' mod='tonycartslider'}{literal}') {this.value = '';}"
                   name="search_query">{/literal}
        </form>
    </div>
    <div id="back-top"><a href="#top"><i class="icon-up-2"></i></a></div>
</div>
