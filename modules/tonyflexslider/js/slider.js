$(window).load(function(){    
	
	var W = 1170;

  $("#flex-slider-loader").remove();
  $("#iosSlider").show();
   
	jQuery(".slider .iosSlider .item").children(".box").each(function () {
        var w = 0;
        var pic = jQuery(this).find("img");
        /*pic.removeAttr("width");
        pic.removeAttr("height");
        pic.css({
            width: 'auto',
            height: 'auto'
        });*/
        //w = pic.width() * 100 / W - 0.02;
        //w = pic[0].naturalWidth * 100 / W - 0.02;
        //w = pic.width() * 100 / W - 0.02;
        w = pic.width() >= jQuery(".container").width() ? 100 :  pic.width() * 100 / W - 0.02; 
       jQuery(this).css("width", w + "%");
       //pic.addClass("fullwidth");
    });
	
    jQuery('.singleSlider .item,.iosSlider .item').masonry({
        itemSelector: '.box',
        columnWidth: 1
    });

    jQuery('.iosSlider').iosSlider({
		    snapToChildren: true,
        desktopClickDrag: false,
        infiniteSlider: true,
        snapSlideCenter: true,
        //autoSlide:true,
        navPrevSelector: jQuery("#prev_slide"),
        navNextSelector: jQuery("#next_slide")

    });
    
    
});
