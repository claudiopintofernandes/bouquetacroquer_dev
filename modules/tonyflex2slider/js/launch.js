jQuery(document).ready(function() {
	jQuery(function() {
		jQuery('.flexslider.big').flexslider({
			animation: "slide",
			controlNav: false,
			animationLoop: true,
			slideshowSpeed: 7000, //Integer: Set the speed of the slideshow cycling, in milliseconds
			animationSpeed: 600,
			direction: "horizontal",
			prevText: "<i class='icon-left-thin'></i>",
			nextText: "<i class='icon-right-thin'></i>",
			rtl: isRTL,
			pauseOnHover: true,
			start: function() {
				jQuery('.loader-slider').stop().animate({'width': jQuery('.flexslider.big').width() + 'px'}, this.slideshowSpeed - this.animationSpeed);
				jQuery('.flexslider.big li > a > img').animate({'opacity': 1});
				elementsAnimate();
			},
			pause: false,
			before: function(slider) {
				jQuery('.loader-slider').hide().css({width: '0'});

			},
			after: function(slider) {
				data_prev = jQuery(slider.slides[slider.currentSlide]).attr('data-prev');
				data_next = jQuery(slider.slides[slider.currentSlide]).attr('data-next');

				jQuery('.next-slider img').attr('src', data_next);
				jQuery('.prev-slider img').attr('src', data_prev);

				jQuery('.loader-slider').hide();

				if (this.pause)
					return;
				/*.stop(true)*/
				jQuery('.loader-slider').show().animate({width: jQuery('.flexslider.big').width() + 'px'}, this.slideshowSpeed - this.animationSpeed, 'linear', function() {
					jQuery('.loader-slider').hide().css({width: '0'});
				});
			},
			pauseOn: function(slider) {
				this.pause = true;
				time = jQuery('.loader-slider').width() * this.slideshowSpeed / jQuery('.flexslider.big').width();
				jQuery('.loader-slider').stop(true);
				jQuery('.loader-slider').hide().css({width: '0'});
			},
			pauseOff: function(slider) {
				this.pause = false;
				time = (jQuery('.flexslider.big').width() - jQuery('.loader-slider').width()) * this.slideshowSpeed / jQuery('.flexslider.big').width();
				//console.log(time);
				jQuery('.loader-slider').stop(true).show().animate({width: jQuery('.flexslider.big').width() + 'px'}, time, 'linear', function() {
					jQuery('.loader-slider').hide().css({width: '0'});
				});
			},
		});

		jQuery(".flexslider.big .flex-direction-nav .flex-prev").hover(function() {
			jQuery(".prev-slider").show();
		}, function() {
			jQuery(".prev-slider").hide();
		});
		jQuery(".flexslider.big .flex-direction-nav .flex-next").hover(function() {
			jQuery(".next-slider").show();
		}, function() {
			jQuery(".next-slider").hide();

		});
		TopSlider();
	});

	jQuery(window).resize(function() {
		TopSlider();
	});
});

