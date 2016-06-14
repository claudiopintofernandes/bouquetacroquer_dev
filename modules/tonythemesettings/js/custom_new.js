jQuery(document).ready(function() {

    jQuery('.flexslider.center').flexslider({
        animation: "slide",
        pauseOnHover: true,
        controlNav: false,
		rtl: isRTL,
        prevText: "<i class='icon-right-open-3'></i>",
        nextText: "<i class='icon-right-open-3'></i>"

    });
	
	
	var  PreviewSliderHeight = function() {

	var big_image_height= jQuery('a.cloud-zoom img').height();
	if (big_image_height == 0)
	  big_image_height = 340;
	var preview_image_height= jQuery('div.more-views ul.slides li:first-child').height();
	var slider_height = Math.round (big_image_height/preview_image_height) *preview_image_height - 10;
	jQuery(".flexslider.more-views .flex-viewport").css({
        "min-height": slider_height + "px"
    });
};

function load_slider()
{
jQuery('.flexslider.more-views').flexslider({
        animation: "slide",
		autoplay: false,
		minItems: 5,
		animationLoop: true,
		direction: "vertical",
        controlNav: false,
		slideshow: false,
        prevText: "<i class='icon-down-open-1'></i>",
        nextText: "<i class='icon-up-open-1'></i>",
        start: PreviewSliderHeight
    });
}
	
	$(('a.cloud-zoom img')).load(function(){
	 load_slider();
   }); 
   load_slider();
	ColumnOff();
	
	jQuery(window).resize(function () {
	PreviewSliderHeight();
	});
});

function ColumnOff() {
	 if (!jQuery('#column_right').length > 0 && !jQuery('#column_left').length > 0 ) {
        jQuery('#column_center').removeClass("span6").addClass("span12");
      }
	 else {if (!jQuery('#column_right').length > 0 || !jQuery('#column_left').length > 0 ) {
        jQuery('#column_center').removeClass("span6").addClass("span9");
      }}
};


