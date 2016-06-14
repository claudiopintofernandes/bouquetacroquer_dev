<div class="pull-right">
  <div class="direction-nav">
{if isset($nav_products.prev)}  
    <a href="{$nav_products.prev.link}" class="btn prev"><i class="icon-left-open-3 icon-2x"></i></a>
    <div class="small_preview prev hidden-phone hidden-tablet"><img src="{$nav_products.prev.image}" width="85" height="85" alt=""></div>
{/if}    
{if isset($nav_products.next)}    
    <a href="{$nav_products.next.link}" class="btn next"><i class="icon-right-open-3 icon-2x"></i></a>
    <div class="small_preview next hidden-phone hidden-tablet"><img src="{$nav_products.next.image}" width="85" height="85" alt=""></div>
  </div>
{/if}  
</div>