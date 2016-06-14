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
(function($) {
	$(function() {
		if (!isTouchDevice()) {
			if ($('.parallax').length > 0) {
				$('.parallax').parallax({
					speed: 0.1,
					axis: 'y'
				});
			}
		}
		$('.carousel-testimonials .flexslider').flexslider({
			animation: 'slide',
			pauseOnHover: true,
			controlNav: false,
			animationSpeed: 300,
			rtl: isRTL,
			prevText: '<i class=\'prev icon-left-thin\'></i>',
			nextText: '<i class=\'next icon-right-thin\'></i>'

		});
	});
})(jQuery);