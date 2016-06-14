<?php /* Smarty version Smarty-3.1.19, created on 2016-03-08 02:15:40
         compiled from "/srv/data/web/vhosts/www.bouquetacroquer.fr/htdocs/modules/pk_bannercarousel/views/templates/front/front-top.tpl" */ ?>
<?php /*%%SmartyHeaderCode:205489043856de27bc2cbde3-71281573%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c102bda87209762b0d1840a2832d809acb893f52' => 
    array (
      0 => '/srv/data/web/vhosts/www.bouquetacroquer.fr/htdocs/modules/pk_bannercarousel/views/templates/front/front-top.tpl',
      1 => 1453301956,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '205489043856de27bc2cbde3-71281573',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'slides' => 0,
    'minicSlider' => 0,
    'page_name' => 0,
    'image' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_56de27bc322131_55637691',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56de27bc322131_55637691')) {function content_56de27bc322131_55637691($_smarty_tpl) {?><?php if (count($_smarty_tpl->tpl_vars['slides']->value)!=0) {?>
    <?php if ($_smarty_tpl->tpl_vars['minicSlider']->value['options']['front']==1&&$_smarty_tpl->tpl_vars['page_name']->value!='index') {?>
        <!-- Banner Carousel Slider -->
    <?php } else { ?>
    <div class="banners_carousel container homemodule load-animate">
        <div class="banners_carousel-container">
        <div id="banners_carousel" class="banners_carousel_top theme-default<?php if ($_smarty_tpl->tpl_vars['minicSlider']->value['options']['thumbnail']==1&&$_smarty_tpl->tpl_vars['minicSlider']->value['options']['control']!=0) {?> controlnav-thumbs<?php }?>">   
              <ul id="sliderCarousel" class="slides bannersCarousel sliderCarousel_top">
                  <?php  $_smarty_tpl->tpl_vars['image'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['image']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['slides']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['image']->key => $_smarty_tpl->tpl_vars['image']->value) {
$_smarty_tpl->tpl_vars['image']->_loop = true;
?>
                  <li class="dib">
                      <div class="banners_carousel_wrap">
                      <?php if ($_smarty_tpl->tpl_vars['image']->value['url']!='') {?><a href="<?php echo $_smarty_tpl->tpl_vars['image']->value['url'];?>
" <?php if ($_smarty_tpl->tpl_vars['image']->value['target']==1) {?>target="_blank"<?php }?>><?php }?>
                          <img src="<?php echo $_smarty_tpl->tpl_vars['minicSlider']->value['path']['images'];?>
<?php echo $_smarty_tpl->tpl_vars['image']->value['image'];?>
" class="slider_image" 
                              alt="<?php if ($_smarty_tpl->tpl_vars['image']->value['alt']) {?><?php echo $_smarty_tpl->tpl_vars['image']->value['alt'];?>
<?php }?>" />
                      <?php if ($_smarty_tpl->tpl_vars['image']->value['url']!='') {?></a><?php }?>
                      </div>
                  </li>
                  <?php } ?>
              </ul>
        </div> 
        </div>
    </div>
        <?php if (count($_smarty_tpl->tpl_vars['slides']->value)>=$_smarty_tpl->tpl_vars['minicSlider']->value['options']['startSlide']) {?>        
        <script type="text/javascript">
            $(window).load(function() {
              var v_num = <?php echo $_smarty_tpl->tpl_vars['minicSlider']->value['options']['startSlide'];?>
;
                 $(".sliderCarousel_top").flexisel({
                      pref: "ban-top",
                      visibleItems: v_num,
                      animationSpeed: 500,
                      autoPlay: false,
                      autoPlaySpeed: 3000,            
                      pauseOnHover: true,
                      enableResponsiveBreakpoints: true,
                      clone : true,
                      responsiveBreakpoints: { 
                          portrait: { 
                              changePoint:400,
                              visibleItems: 1
                          }, 
                          landscape: { 
                              changePoint:768,
                              visibleItems: 1
                          },
                          tablet: { 
                              changePoint:991,
                              visibleItems: 2
                          },
                          tablet_land: { 
                              changePoint:1199,
                              visibleItems: v_num
                          }
                      }
                  });   
            });        
        </script>   
        <?php }?>
    <?php }?>
<?php }?><?php }} ?>
