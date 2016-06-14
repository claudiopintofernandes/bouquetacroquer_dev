{if count($tonyslider)==0}
  {assign var=mode value="disabled"}
{elseif count($tonyslider)==1}
  {assign var=mode value="single"}  
{else}
  {assign var=mode value="multiple"}  
{/if}

{if $mode <> 'disabled'}
{$slider_js}
{foreach from=$google_fonts item=css}
    <link href="{$css}" rel="stylesheet" type="text/css" media="all" />
{/foreach}
<section class="slider hidden-phone">
      <div id="layerslider-container" class="container">
        <div id="layerslider" style="width: 1370px; height: 490px; margin: 0 auto;">
        
        {foreach from=$tonyslider item=slide}
          <div class="ls-layer" rel="{$slide.slider_opt}">
            <img src="{$slide.image}" class="ls-bg"/>
            {foreach from=$slide.txt item=text key=idx}  
              <div class="text ls-s{$idx}" style="{$text.style} {$text.slider_params}">
                {if $text.txt1}{if $text.link}<a href="{$text.link}"{if $text.new_window == 1} target="_blank"{/if}>{/if}<span class="size2"{if $text.color1} style="color:{$text.color1} !important;"{/if}><span{if $text.font && $text.font <> 'Default'} style="font-family:{$text.font} !important;"{/if}>{$text.txt1}</span></span>{/if}{if $text.link}</a>{/if}
                {if $text.txt2}{if $text.link}<a href="{$text.link}"{if $text.new_window == 1} target="_blank"{/if}>{/if}<span class="size1"{if $text.color2} style="color:{$text.color2} !important;"{/if}><span{if $text.font && $text.font <> 'Default'} style="font-family:{$text.font} !important;"{/if}>{$text.txt2}</span></span>{/if}{if $text.link}</a>{/if}
              </div>
             {/foreach}
             
             {if $slide.link}<a href="{$slide.link}" class="ls-link"{if $slide.new_window == 1} target="_blank"{/if}></a>{/if} 
          </div>
        {/foreach}
        {if $mode == 'multiple'}  
          <div id="prev_slide"><i class='icon-left-open-3'></i></div>
          <div id="next_slide"><i class='icon-right-open-3'></i></div>
        {/if}  
        </div>
      </div>
    </section>
{/if}    