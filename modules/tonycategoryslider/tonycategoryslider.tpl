<section class="slider">
  <div class="flexslider small">
    <ul class="slides">
    {foreach from=$catslider item=slide}
      <li> {if $slide.link}<a href="{$slide.link}"{if $slide.new_window} target="_blank"{/if}>{/if}<img src="{$slide.image}" alt="{$slide.alt}" />{if $slide.link}</a>{/if} </li>
    {/foreach}
    </ul>
  </div>
</section>