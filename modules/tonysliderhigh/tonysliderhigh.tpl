<script type="text/javascript">
jQuery(document).ready(function() {
jQuery('.flexslider.banners').flexslider({
        animation: "slide",
        pauseOnHover: true,
        controlNav: false,
		rtl: isRTL,
        prevText: "<i class='icon-left-thin'></i>",
        nextText: "<i class='icon-right-thin'></i>"

    });
});    
</script>      
      
      <div {if $display == 'home'}class="span3"{/if}>
          <div class="banners_outer">
            <div class="flexslider banners">
              <ul class="slides">
               {foreach from=$slider item=slide}
                 <li> {if $slide.link}<a href="{$slide.link}"{if $slide.new_window} target="_blank"{/if}>{/if}<img src="{$slide.image}" alt="{$slide.alt}" />{if $slide.link}</a>{/if} </li>
               {/foreach}
              </ul>
            </div>
          </div>
        </div>