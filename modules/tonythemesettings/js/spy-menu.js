$(document).ready(function () {
    jQuery(function () {
        jQuery(window).scroll(function () {
            if (jQuery(".container").width() > 767) {
                if (jQuery(this).scrollTop() > jQuery('#header .wrapper_w').height() + 60 + jQuery('#topline').height()) {
                    jQuery('#spy').addClass('fix');
                    if (jQuery('#megamenu').length) {
                        jQuery('#spy nav').html(jQuery('#megamenu:first').clone());
                        $('#spy #nav > li').hover(function() {
                            var top = $(this).position().top+$(this).height();
                            $(this).find('> ul').css({top: top});
                            $(this).find('> ul, > ul > li > ul.list_in_column').show();
                        }, function() {
                            $(this).find('> ul, > ul > li > ul.list_in_column').hide();
                        });
                    } else if (jQuery('#nav.simple').length) {
                        jQuery('#spy nav').html(jQuery('#nav.simple:first').clone());
                    }
                    jQuery('#spy .spyshop').html(jQuery('.pull-right.padding-1 .shoppingcart').clone());
                    jQuery("#spy .shoppingcart .fadelink").mouseenter(function () {
                        jQuery(this).parent().find(".shopping_cart_mini").stop(true, true).fadeIn(200, "linear");
                    });
                    jQuery("#spy .shoppingcart .fadelink").mouseleave(function () {
                        jQuery(this).parent().find(".shopping_cart_mini").stop(true, true).fadeOut(200, "linear");
                    });
                } else {
                    jQuery('#spy').removeClass('fix');
                }
            }
        });

    });
});