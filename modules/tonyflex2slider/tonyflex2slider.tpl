<section class="slider ">
    <div class="flexslider big">
        <ul class="slides">
{foreach from=$tonyslider item=slide}
  <li data-prev="{$slide.prev_slide}" data-next="{$slide.next_slide}">
                    {if $slide.link}<a href="{$slide.link}"{if $slide.new_window == 1} target="_blank"{/if}>{/if}<img src="{$slide.image}" alt="" />{if $slide.link}</a>{/if}
                </li>
{/foreach}        
                            
                    </ul>
        <div class="next-slider"><img src="{$tonyslider[0].next_slide}"  alt=""></div>
        <div class="prev-slider"><img src="{$tonyslider[0].prev_slide}"  alt=""></div>
            </div>
</section>


