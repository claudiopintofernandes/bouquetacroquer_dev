var getDevicePixelRatio = function() {
        if (window.devicePixelRatio === undefined) { return 1; }
        return window.devicePixelRatio;
    }
function retinaProducts(){
    if (getDevicePixelRatio() > 1)
    {
        jQuery('.product-retina').each(function(){
            jQuery(this).attr('src',jQuery(this).attr('data-image2x'));
        });
        jQuery('.product-retina-rel').each(function(){
            jQuery(this).attr('data-rel',jQuery(this).attr('data-image2x'));
        });
    }
}    
jQuery(document).ready(function () {


var elm=jQuery("#quantity_wanted");function spin(vl){var v = parseInt(elm.val(),10)+vl; if (v > 0) elm.val(v);}jQuery("#increase").click(function(){spin(1);});jQuery("#decrease").click(function(){spin(-1);});

retinaProducts();

  /*var retina = window.devicePixelRatio && window.devicePixelRatio >= 2;
  if (1)
  {
    $(".product_label").removeClass("product_label").addClass("product_label_r");
  }*/
  
  
  
    FluidSlider();

    jQuery('.product .product-image-wrapper').live("mouseenter",function () {
        var pos = jQuery(this).parent().position();
        var width = jQuery(this).outerWidth();
        var width1 = jQuery(this).parent().next(".preview").outerWidth();
        var width2 = width1 - width;
        jQuery(this).parent().next(".preview").css({
            top: pos.top + 10 + "px",
            left: (pos.left - width2 + 30) + "px"
        })
        jQuery(this).parent().next(".preview.small").css({
            top: pos.top + 10 + "px",
            left: (pos.left - width2 + 30) + "px"
        })

        jQuery(".preview").hide();
        jQuery(this).parent().next(".preview").show();
        
        if (jQuery(this).parent().next(".preview").is(":visible"))
          jQuery(this).parent().addClass('hover');
          
		jQuery(this).parent().find(".product_label").css({"z-index" : "300"});
		$('.quickview').show();
        //jQuery(this).parent().next(".preview").css({        "display": "inline-block"    });
    });

    jQuery('.preview').live("mouseleave",function () {
    jQuery('.product').removeClass('hover');
        jQuery(this).stop().hide();
		jQuery(this).parent().find(".product_label").css({"z-index" : "200"});
    });

    jQuery(".preview .image").live("hover",function () {
        var image = jQuery(this).attr("data-rel");
        jQuery(this).parent().parent().find('.col-2 .big_image').stop(true, true).fadeOut(0);
        jQuery(this).parent().parent().find('.col-2 .big_image').stop(true, true).fadeIn(0);
        jQuery(this).parent().parent().find('.col-2 .big_image a').html('<img src="' + image + '"/>');
        jQuery(this).parent().parent().find('.col-2 .quickview').hide();
        return false;

    });

    /*jQuery(".carousel .preview a").click(function () {
        window.location = jQuery(this).attr("href");
    });

    jQuery(".carousel .product a").click(function () {
        window.location = jQuery(this).attr("href");
    });*/

    jQuery(".collapse").collapse();
    jQuery("select.custom").selectbox();

    jQuery("#right_toolbar").hide();

    jQuery(function () {
        jQuery(window).scroll(function () {
            if (jQuery(this).scrollTop() > 150) {
                jQuery('#right_toolbar').fadeIn();
            } else {
                if (jQuery("#right_toolbar .shopping_cart_mini").css("display") == "block") {
                    jQuery("#right_toolbar .shopping_cart_mini").fadeOut();
                }
                jQuery('#right_toolbar').fadeOut();
            }
        });

        jQuery('#back-top a').hover(function () {
            jQuery(this).stop().animate({
                "opacity": 0.6
            });
        }, function () {
            jQuery(this).stop().animate({
                "opacity": 1
            });
        });

        jQuery('#back-top a').click(function () {
            jQuery('body,html').animate({
                scrollTop: 0
            }, 400);
            return false;
        });
    });

    jQuery('.carousel.style0').elastislide({
        easing: 'easeInOutQuad',
        speed: 1200,
        onClick : true,
		rtl: isRTL
    });
    jQuery('.carousel.style1').elastislide({
        easing: 'easeInOutQuad',
        speed: 1200,
        onClick : true,
		rtl: isRTL
    });

    jQuery('.flexslider.vertical').flexslider({
        animation: "slide",
        autoplay: false,
        minItems: 2,
        direction: "vertical",
        pauseOnHover: true,
        controlNav: false,
		rtl: isRTL,
        prevText: "<i class='icon-down'></i>",
        nextText: "<i class='icon-up'></i>"

    });

    jQuery('.flexslider.small').flexslider({
        animation: "slide",
        pauseOnHover: true,
        controlNav: false,
		rtl: isRTL,
        prevText: "<i class='icon-left-open-3'></i>",
        nextText: "<i class='icon-right-open-3'></i>"

    });

    jQuery(".flexslider.big .flex-direction-nav .flex-prev").hover(function () {
        jQuery(".prev-slider").fadeToggle(200, "linear");
    });
    jQuery(".flexslider.big .flex-direction-nav .flex-next").hover(function () {
        jQuery(".next-slider").fadeToggle(200, "linear");
    });

    jQuery('#topline .fadelink, .header_v_2 .fadelink').hover(function () {
        jQuery(this).find(".ul_wrapper").stop(true).fadeToggle(200, "linear");
    });

    jQuery("#header .shoppingcart .fadelink").mouseenter(function () {
        if($(this).parent().parent().attr("id") != 'right_toolbar')
           jQuery(this).parent().find(".shopping_cart_mini").stop(true, true).fadeIn(200, "linear");
    });

    jQuery("#header .shoppingcart .fadelink").mouseleave(function () {
        if($(this).parent().parent().attr("id") != 'right_toolbar')
          jQuery(this).parent().find(".shopping_cart_mini").stop(true, true).fadeOut(200, "linear");
    });

    jQuery("#right_toolbar .shoppingcart").mouseenter(function () {
        jQuery(this).find(".shopping_cart_mini").stop(true, true).fadeIn(200, "linear");
    });

    jQuery("#right_toolbar .shoppingcart").mouseleave(function () {
        jQuery(this).find(".shopping_cart_mini").stop(true, true).fadeOut(200, "linear");
    });

    jQuery(".login_block .login_link").mouseenter(function () {
        jQuery(this).parent().find(".form-login-wrapper").stop(true, false).fadeIn(200, "linear");
    });

    jQuery(".login_block .form-login-wrapper").mouseenter(function () {
        jQuery(this).stop(true, true).fadeIn(0);
        jQuery(this).addClass("active");
    });

    jQuery(".login_block .login_link").mouseleave(function () {
        jQuery(this).parent().find(".form-login-wrapper").stop(true, false).fadeOut(200, "linear");
    });

    jQuery('.login_block .form-login-wrapper input').focusout(function () {
        if (!jQuery(".login_block .form-login-wrapper").hasClass("active")) {
            jQuery(".form-login-wrapper").stop(true, false).fadeOut(200, "linear");
        }
    });
    jQuery(".login_block .form-login-wrapper").mouseleave(function () {
        jQuery(this).removeClass("active");
        if (!jQuery(".login_block .form-login-wrapper input").is(":focus")) {
            jQuery(this).stop(true, false).fadeOut(200, "linear");
        }
    });

    jQuery("#right_toolbar .form-search ").mouseenter(function () {
        jQuery('#right_toolbar .form-search input').animate({
            right: 48,
            width: 275
        }, 300);
    });
    jQuery("#right_toolbar .form-search ").mouseleave(function () {
        jQuery('#right_toolbar .form-search input').stop(true, false).animate({
            right: 20,
            width: 0
        }, 300);
    });

    jQuery('#myTab a').click(function (e) {
        e.preventDefault();
        jQuery(this).tab('show');
    })

    jQuery("#carousel_tabs>a").click(function () {

        jQuery("#carousel_tabs>a").removeClass("active");
        jQuery(this).addClass("active");

        jQuery("#carousel_tabs_content .carousel").hide();
        var t_content = jQuery(this).attr("href");
        jQuery(t_content).show();
    })
    jQuery("#carousel_tabs>a:first").trigger("click");

    jQuery(".es-nav-prev").hover(function () {
        if (!jQuery(this).hasClass("disable")) {
            jQuery(this).parent().parent().find(".small_preview.prev").stop(true, true).fadeToggle(400, "linear");
        }
    });

    jQuery(".es-nav-next").hover(function () {
        if (!jQuery(this).hasClass("disable")) {
            jQuery(this).parent().parent().find(".small_preview.next").stop(true, true).fadeToggle(400, "linear");
        }
    });
    jQuery('.es-nav-prev').mouseleave(function () {
        jQuery(".small_preview.prev").stop(true, true).fadeOut(100, "linear");
    });

    jQuery('.es-nav-next').mouseleave(function () {
        jQuery(".small_preview.next").stop(true, true).fadeOut(100, "linear");
    });

    jQuery(".direction-nav a.prev").hover(function () {
        jQuery(this).parent().find(".small_preview.prev").stop(true, true).fadeToggle(400, "linear");
    });
    jQuery(".direction-nav a.next").hover(function () {
        jQuery(this).parent().find(".small_preview.next").stop(true, true).fadeToggle(400, "linear");
    });

    jQuery(".flexslider.vertical .flex-prev").hover(function () {
        if (!jQuery(this).hasClass("disabled")) {
            jQuery(this).parent().parent().parent().find(".small_previews .small_preview.prev").stop(true, true).fadeToggle(400, "linear");
        }
    });
    jQuery(".flexslider.vertical .flex-next").hover(function () {
        if (!jQuery(this).hasClass("disabled")) {
            jQuery(this).parent().parent().parent().find(".small_previews .small_preview.next").stop(true, true).fadeToggle(400, "linear");
        }
    });

    jQuery('.carousel_prev').mouseleave(function () {
        jQuery(this).parent().parent().find(".small_preview.prev").stop(true, true).fadeOut(100, "linear");
    });

    jQuery('.carousel_next').mouseleave(function () {
        jQuery(this).parent().parent().find(".small_preview.next").stop(true, true).fadeOut(100, "linear");
    });

    jQuery('#password_text').show();

    jQuery('#password_real').hide();

    jQuery('#password_text input').focus(function () {
        jQuery(this).parent().hide();
        jQuery('#password_real').show();
        jQuery('#password_real input').focus();
    });

    jQuery('#password_real input').blur(function () {
        if (jQuery(this).val() == "") {
            jQuery(this).parent().hide();
            jQuery('#password_text').show();
        }
    });


});
jQuery(window).resize(function () {
    jQuery(".collapse").collapse();
    jQuery(".preview").hide();
    jQuery(".small_preview").hide();
    jQuery(".shopping_cart_mini").hide();
    jQuery(".form-login-wrapper").hide();
    FluidSlider();

});

			function slideChange(args) {
			
				try {
					console.log('changed: ' + (args.currentSlideNumber - 1));
				} catch(err) {
				}
				
				jQuery('.indicators .item').removeClass('selected');
				jQuery('.indicators .item:eq(' + (args.currentSlideNumber - 1) + ')').addClass('selected');
			
			};

function FluidSlider() {
    var slider_native_width = 1170;
    var slider_native_height = 498;

    var sideW = (jQuery(window).width() - jQuery('.container').width()) * 0.5;
if (sideW >= 56) {
jQuery('.slider.var1 #next_slide').css("right", sideW - 55 + "px");
jQuery('.slider.var1 #prev_slide').css("left", sideW - 56 + "px");
} else {
jQuery('.slider.var1 #next_slide').css("right", sideW + "px");
jQuery('.slider.var1 #prev_slide').css("left", sideW + "px");
}
var slideH = jQuery('.container').width() * slider_native_height / slider_native_width;
jQuery('.slider.var1 .fluidHeight').css("height", slideH + 5 + "px");
jQuery('.slider.var1 .sliderContainer').css("height", slideH + 5 + "px");
jQuery('.slider.var1 #left_screen').css("height", slideH + 5 + "px");
jQuery('.slider.var1 #right_screen').css("height", slideH + 5 + "px");
jQuery('.slider.var1 #left_screen').css("width", sideW + "px");
jQuery('.slider.var1 #right_screen').css("width", sideW + 1 + "px");
jQuery('.slider.var2 .fluidHeight').css("height", slideH + "px");
jQuery('.slider.var2 .sliderContainer').css("height", slideH + "px");
}

function TopSlider() {
    var w0 = jQuery(document).width();
    var w1 = (w0 - jQuery(".container").width()) * 0.5 - 0;
    jQuery(".flexslider.big .flex-direction-nav .flex-next").css({
        "right": w1 + "px"
    });
    jQuery(".flexslider.big .flex-direction-nav .flex-prev").css({
        "left": w1 + "px"
    });
    jQuery(".flexslider.big .next-slider").css({
        "right": w1 + "px"
    });
    jQuery(".flexslider.big .prev-slider").css({
        "left": w1 + "px"
    });
};