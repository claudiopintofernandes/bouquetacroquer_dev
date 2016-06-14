(function($) {
	$(function() {
		$('#layerslider').layerSlider({
			thumbnailNavigation: 'hover',
			hoverPrevNext: true,
			keybNav: false,
			navPrevNext: true,
			navStartStop: false,
			navButtons: false,
			pauseOnHover: false,
			showCircleTimer: false,
			skin: $('#layerslider').data('skin'),
			skinsPath: baseDir + 'themes/buyshop/css/skins/',
			cbInit: function(element) {
				jQuery('.ls-nav-prev').append('<i class="icon-left-open-3"></i>');
				jQuery('.ls-nav-next').append('<i class="icon-right-open-3"></i>');
			},
			cbPrev: function(data) {
				if (isTouchDevice()) {
					$('#layerslider').find('.ls-nav-prev, .ls-nav-next').show();
				}
			},
			cbNext: function(data) {
				if (isTouchDevice()) {
					$('#layerslider').find('.ls-nav-prev, .ls-nav-next').show();
				}
			}
		});
	});
})(jQuery);