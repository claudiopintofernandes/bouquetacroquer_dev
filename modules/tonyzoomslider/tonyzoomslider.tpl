<!--SLIDER-->
<section class="slider">
    <div id="layerslider-container">
        <div id="layerslider" data-skin="creative" style="width: {$tonyslider[0].width}px; height:{$tonyslider[0].height}px; margin: 0 auto; visibility: hidden;">
            <div class="ls-layer link" style="slidedirection: right; slidedelay: 8000;" onClick="{if $tonyslider[0].new_window == 1}window.open('{$tonyslider[0].link}','_blank'){else}parent.location = '{$tonyslider[0].link}'{/if}">
                <img src="{$tonyslider[0].image}" class="ls-s1 nofade" style="position: absolute; top:0; left: 0; slidedirection: fade ; slideoutdirection :fade; durationin : 100; durationout : 8000; easingin : easeInSine; easingout : easeOutSine; delayin : 0; delayout : 0; showuntil :  100; rotateout : 0; scaleout : 1.2;">
				{$tonyslider[0].custom}
            </div>
			{foreach from=$tonyslider item=slide key=i}
				{if $i==0}{continue}{/if}
				<div style="width: {$slide.width}px; height:{$slide.height}px; margin: 0 auto;">
					<div class="ls-layer link" style="slidedirection: right; slidedelay: 8000;" onClick="{if $slide.new_window == 1}window.open('{$slide.link}','_blank'){else}parent.location = '{$slide.link}'{/if}">
						<img src="{$slide.image}" class="ls-s1 nofade" style="position: absolute; top:0; left: 0; slidedirection:  fade ; slideoutdirection :fade; durationin : 100; durationout : 8000; easingin : easeInSine; easingout : easeOutSine; delayin : 0; delayout : 0; showuntil :  100; rotateout : 0; scaleout : 1.2;">
						{$slide.custom}
					</div>
				</div>
			{/foreach}
        </div>
    </div>
</section>
<!--END SLIDER-->