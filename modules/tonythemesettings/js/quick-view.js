var qview_lnk;
$(document).ready(function() {

	$('a.quickview').fancybox({
		'hideOnContentClick': false,
		autoDimensions: false,
		autoSize: false,
		type: 'iframe',
		width: 800,
		height: 600,
		centerOnScroll: true,
		mouseWheel: false,
		autoCenter: false,
		padding: 0,
		loop: false,
		arrows: false,
		helpers: {
			overlay: {
				locked: false
			}
		}
	});

	$('a.quickview').click(function(event) {
		qview_lnk = this;
	});

	$(".image-wrapper").live("mouseenter", function() {
		$(this).find('.quickviewhover2').show();
	});
	$(".image-wrapper").live("mouseleave", function() {
		$(this).find('.quickviewhover2').hide();
	});

});

function buyshop_addToCart(pid, aid, q)
{
	if (window.undefined != ajaxCart) {
		ajaxCart.add(pid, aid, false, qview_lnk, q, null);
		$.fancybox.close();
		return false;
	}
	return true;
}



