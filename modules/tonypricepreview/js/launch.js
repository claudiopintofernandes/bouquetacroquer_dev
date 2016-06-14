/**
 * TonyTheme
 *
 * NOTICE OF LICENSE
 *
 * This source file is licensed under the OSL-3.0
 * that is bundled with this package in the file LICENSE.txt.
 *
 * @author    TonyTheme
 * @copyright TonyTheme
 * @license   Open Software License v. 3.0 (OSL-3.0)
 */

function tonypricepreview_recalc() {
    var qnt = $("#quantity_wanted").val();
    if ($("#our_price_display").data('price')) {
        var price = $("#our_price_display").data('price');
    } else {
        var price = $("#our_price_display").html();
        price = price.replace(",", ".");
        price = parseFloat(price.replace(currencySign, ""));
        $("#our_price_display").data('price', price);
    }
    var amount = qnt * price;
    if ($('#quantityDiscount tbody tr').length) {
        var discounts = [];
        $('#quantityDiscount tbody tr').each(function () {
            discounts.push({
                type: $(this).data('discount-type'),
                qnt: $(this).data('discount-quantity'),
                discount: $(this).data('discount'),
            });
        });
        discounts.sort(function (a, b) {
            return a.qnt < b.qnt;
        });
        for (var i = 0; i < discounts.length; i++) {
            if (qnt >= discounts[i].qnt) {
                if (discounts[i].type == 'percentage') {
                    amount = amount * (1 - discounts[i].discount / 100);
                } else if (discounts[i].type == 'amount') {
                    amount = amount - discounts[i].discount;
                }
                break;
            }
        }
        var discountPrice = amount / qnt;
        $('#our_price_display').text(formatCurrency(discountPrice, currencyFormat, currencySign, currencyBlank));
    }
    return formatCurrency(amount, currencyFormat, currencySign, currencyBlank);
}
$(document).ready(function () {
    $('#quantity_wanted').tipsy({
        title: tonypricepreview_recalc,
        gravity: 's', trigger: 'focus'
    });
    $('#quantity_wanted').keyup(function () {
        $('#quantity_wanted').tipsy("hide");
        $('#quantity_wanted').tipsy("show");
    });
    $("#decrease,#increase").click(function () {
        $('#quantity_wanted').tipsy("hide");
        $('#quantity_wanted').tipsy("show");
    });
});