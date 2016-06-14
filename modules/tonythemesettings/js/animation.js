jQuery(document).ready(function() {

	if (isTouchDevice()) {
		var mobileHover = function() {
			jQuery('*').on('touchstart', function() {
				jQuery(this).trigger('hover');
			}).on('touchend', function() {
				jQuery(this).trigger('hover');
			});
		};
		mobileHover();
		jQuery('body').addClass('touch')
	} else {
		jQuery('body').addClass('notouch')
	}

	if (isiPhone()) {
		jQuery('body').addClass('iphone')
	}
	;

	var trident = !!navigator.userAgent.match(/Trident\/7.0/);
	var net = !!navigator.userAgent.match(/.NET4.0E/);
	var IE11 = trident && net
	var IEold = (navigator.userAgent.match(/MSIE/i) ? true : false);
	if (IE11 || IEold) {
		jQuery('body').addClass('msie');
	} else {
		jQuery('body').addClass('no_msie')
	}

	previewInit();

	elementsAnimate();
});

function elementsAnimate() {
	var windowWidth = window.innerWidth || document.documentElement.clientWidth;
	var animate = $('.animate');
	var animateDelay = $('.animate-delay-outer');
	var animateDelayItem = $('.animate-delay');
	if (windowWidth > 767 && !isiPhone()) {
		animate.bind('inview', function(event, visible) {
			if (visible && !$(this).hasClass("animated")) {
				$(this).addClass("animated");
			}
		});
		animateDelay.bind('inview', function(event, visible) {
			if (visible && !$(this).hasClass("animated")) {
				var j = -1;
				var $this = $(this).find(".animate-delay");
				$this.each(function() {
					var $this = jQuery(this);
					j++;
					setTimeout(function() {
						$this.addClass("animated");
					}, 200 * j);
				});
				$(this).addClass("animated");
			}
		});
	} else {
		animate.each(function() {
			$(this).removeClass('animate');
		});
		animateDelayItem.each(function() {
			$(this).removeClass('animate-delay');
		});
	}
}

function isiPhone() {
	return (
			(navigator.userAgent.toLowerCase().indexOf("iphone") > -1) ||
			(navigator.userAgent.toLowerCase().indexOf("ipod") > -1)
			);
}
function isTouchDevice() {
	return (typeof (window.ontouchstart) != 'undefined') ? true : false;
}

function previewInit() {
	jQuery('.product .product-image-wrapper.onhover').bind('mouseenter', function() {
		var pos = jQuery(this).parent().position();
		var width = jQuery(this).outerWidth();
		var width1 = jQuery(this).parent().next(".preview").outerWidth();
		jQuery(this).parent().addClass('hover');
		var width2 = width1 - width;
		jQuery(this).parent().next(".preview").css({
			top: pos.top + 10 + "px",
			left: (pos.left - width2 + 30) + "px"
		});
		jQuery(this).parent().next(".preview.small").css({
			top: pos.top + 10 + "px",
			left: (pos.left - width2 + 30) + "px"
		});

		jQuery(".preview").hide();
		jQuery(this).parent().next(".preview").show();
	});

	jQuery('.preview').bind('mouseleave', function() {
		jQuery('.product').removeClass('hover');
		jQuery(this).stop().hide();
		$cur_prev = jQuery(this);
		jQuery('.big_image a img', this).attr('src', jQuery('.big_image a img', this).attr("data-rel"));
	});

	jQuery(".preview a.image").bind('mouseenter', function() {
		jQuery(this).parent().next().find('.big_image a img').stop(true, true).animate({
			opacity: 0
		}, 200);
		var image = jQuery(this).attr("data-rel");
		jQuery(this).parent().next().find('.big_image a img').attr('src', image);
		jQuery(this).parent().next().find('.big_image a img').stop(true, true).animate({
			opacity: 1
		}, 800);
		return false;
	});
}