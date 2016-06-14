jQuery(document).ready(function () {

$(".brands_block a img").mouseover(function(){
    $(".brands_block a img").removeClass("brands_active").addClass("brands_n_active");
    $(this).removeClass( "brands_n_active").addClass("brands_active");
}).mouseout(function(){
    $(".brands_block a img").removeClass( "brands_n_active").removeClass("brands_active");
});


    
});    