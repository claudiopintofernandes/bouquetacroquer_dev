{if count($tonyslider)==0}
  {assign var=mode value="disabled"}
{elseif count($tonyslider)==1}
  {assign var=mode value="single"}  
{else}
  {assign var=mode value="multiple"}  
{/if}

{if $mode <> 'disabled'}
{foreach from=$google_fonts item=css}
    <link href="{$css}" rel="stylesheet" type="text/css" media="all" />
{/foreach}
<div class="loader hidden-phone" id="flex-slider-loader"></div>     
<section class="slider var1 hidden-phone">
    <div class = 'fluidHeight'>
      <div class = 'sliderContainer'>
        <div {if $mode == 'multiple'}class = 'iosSlider'{else}class = 'singleSlider'{/if} id="iosSlider">
          <div class="slider container">
          
{foreach from=$tonyslider item=slider_items}
  <div class="item">
    {foreach from=$slider_items item=slide}
      <div class="box"> 
      {if $slide.link}<a href="{$slide.link}"{if $slide.new_window == 1} target="_blank"{/if}>{/if}<img src="{$slide.image}" {if $slide.w || $slide.h}{if $slide.w}width="{$slide.w}"{/if}{if $slide.h} height="{$slide.h}"{/if}{/if} class="slider_img" alt=""/>{if $slide.link}</a>{/if}
      {if ($slide.txt1 || $slide.txt2)}
        <div class="text" style="{$slide.style}">
          {if $slide.txt1}<h6{if $slide.color1} style="color:{$slide.color1} !important;"{/if}><span{if $slide.font && $slide.font <> 'Default'} style="font-family:{$slide.font} !important;"{/if}>{$slide.txt1}</span></h6>{/if}
          {if $slide.txt2}<h5{if $slide.color2} style="color:{$slide.color2} !important;"{/if}><span{if $slide.font && $slide.font <> 'Default'} style="font-family:{$slide.font} !important;"{/if}>{$slide.txt2}</span></h5>{/if}
        </div>
      {/if}  
      </div>
    {/foreach}
  </div>
{/foreach}          
  
            
          </div>
          {if $mode == 'multiple'}
          <div id="prev_slide"><i class='icon-left-open-3'></i></div>
          <div id="next_slide"><i class='icon-right-open-3'></i></div>
          <div id="left_screen"> </div>
          <div id="right_screen"> </div>
          {/if}
        </div>
      </div>
    </div>
  </section>
{/if}  