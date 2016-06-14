<?php /* Smarty version Smarty-3.1.19, created on 2016-03-08 01:59:44
         compiled from "/srv/data/web/vhosts/www.bouquetacroquer.fr/htdocs/modules/pk_layeredslider/views/templates/front/front.tpl" */ ?>
<?php /*%%SmartyHeaderCode:109968107356de2401010707-93467256%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'bec2c293936188f4c948becac72414c520432f00' => 
    array (
      0 => '/srv/data/web/vhosts/www.bouquetacroquer.fr/htdocs/modules/pk_layeredslider/views/templates/front/front.tpl',
      1 => 1453301984,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '109968107356de2401010707-93467256',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'page_name' => 0,
    'minicSlider' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_56de240103f879_69816035',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56de240103f879_69816035')) {function content_56de240103f879_69816035($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['page_name']->value=="index") {?>
    <!-- LAYERED SLIDER -->    
    <?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['minicSlider']->value['tpl']), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

    <script type="text/javascript">
        $(document).ready(function(){
            var noOfPlays = 0;
            var options = {
                preloader: true,
                nextButton: true,
                prevButton: true,
                animateStartingFrameIn: true,
                reverseAnimationsWhenNavigatingBackwards: false,
                numericKeysGoToFrames: false,
                swipeNavigation: true,
                pauseOnHover: <?php if ($_smarty_tpl->tpl_vars['minicSlider']->value['options']['hover']==1) {?>true<?php } else { ?>false<?php }?>,
                autoPlay: <?php if ($_smarty_tpl->tpl_vars['minicSlider']->value['options']['manual']==1) {?>true<?php } else { ?>false<?php }?>,
                autoPlayDirection: 1,
                autoPlayDelay: <?php if ($_smarty_tpl->tpl_vars['minicSlider']->value['options']['pause']!='') {?><?php echo $_smarty_tpl->tpl_vars['minicSlider']->value['options']['pause'];?>
<?php } else { ?>5000<?php }?>,
                cycle: true
            };

            var sequence = $("#layered").sequence(options).data("sequence");
            var wdth = $("#layered-theme .nav").width();
            var wdth2 = $("#layered-theme .controls").width();
            $("#layered-theme .nav").css({ "left": "50%", "marginLeft": -(wdth/2) });        
            $("#layered-theme .controls").css({ "left": "50%", "marginLeft": -(wdth2/2) });        

            function autoChangePagination() {
                $("#layered-theme .nav li").removeClass("active main_bg");
                $("#layered-theme .nav li:nth-child("+sequence.nextFrameID+")").addClass("active main_bg");
            }

            sequence.beforeNextFrameAnimatesIn = function() {
                if(sequence.nextFrameID == 4) {
                    noOfPlays = 1;
                }
                if(sequence.nextFrameID == 1 && noOfPlays  > 0) {
                    sequence.stopAutoPlay();
                }
                autoChangePagination();
            }
            $("#layered-theme .nav li").addClass("main_bg_hvr smooth02");

            $("#layered-theme .nav").on("click", "li", function() {
                sequence.startAutoPlay();
                sequence.settings.pauseOnHover = true;
                $("#layered-theme .nav li").removeClass("active main_bg");
                $(this).addClass("active main_bg");

                sequence.nextFrameID = $(this).index()+1;
                sequence.goTo(sequence.nextFrameID);
            });
        });
    </script>
    <!-- END OF LAYERED SLIDER -->
<?php }?><?php }} ?>
