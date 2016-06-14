<?php /* Smarty version Smarty-3.1.19, created on 2016-03-08 01:59:36
         compiled from "/srv/data/web/vhosts/www.bouquetacroquer.fr/htdocs/modules/pk_smallslider/views/templates/front/front.tpl" */ ?>
<?php /*%%SmartyHeaderCode:61234446856de23f8b54be1-73681012%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'def1c6e1fb1cffbad206d5e25b11c7ef3eb6f4db' => 
    array (
      0 => '/srv/data/web/vhosts/www.bouquetacroquer.fr/htdocs/modules/pk_smallslider/views/templates/front/front.tpl',
      1 => 1453302033,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '61234446856de23f8b54be1-73681012',
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
  'unifunc' => 'content_56de23f8bd3700_17237354',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56de23f8bd3700_17237354')) {function content_56de23f8bd3700_17237354($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['page_name']->value!='index') {?>
    <?php if ($_smarty_tpl->tpl_vars['minicSlider']->value['options']['front']==1) {?>
            <!-- MINIC SLIDER -->
        <?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['minicSlider']->value['tpl']), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

    <?php } else { ?>
        <!-- MINIC SLIDER -->
        <?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['minicSlider']->value['tpl']), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

    <?php }?> 

<script type="text/javascript">
$(window).load(function() {
    $('#minicslider_nivo').nivoSlider({
        effect: '<?php if ($_smarty_tpl->tpl_vars['minicSlider']->value['options']['current']!='') {?><?php echo $_smarty_tpl->tpl_vars['minicSlider']->value['options']['current'];?>
<?php } else { ?>random<?php }?>', 
        slices: <?php if ($_smarty_tpl->tpl_vars['minicSlider']->value['options']['slices']!='') {?><?php echo $_smarty_tpl->tpl_vars['minicSlider']->value['options']['slices'];?>
<?php } else { ?>6<?php }?>, 
        boxCols: <?php if ($_smarty_tpl->tpl_vars['minicSlider']->value['options']['slices']!='') {?><?php echo $_smarty_tpl->tpl_vars['minicSlider']->value['options']['cols'];?>
<?php } else { ?>3<?php }?>, 
        boxRows: <?php if ($_smarty_tpl->tpl_vars['minicSlider']->value['options']['rows']!='') {?><?php echo $_smarty_tpl->tpl_vars['minicSlider']->value['options']['rows'];?>
<?php } else { ?>3<?php }?>, 
        animSpeed: <?php if ($_smarty_tpl->tpl_vars['minicSlider']->value['options']['speed']!='') {?><?php echo $_smarty_tpl->tpl_vars['minicSlider']->value['options']['speed'];?>
<?php } else { ?>500<?php }?>, 
        pauseTime: <?php if ($_smarty_tpl->tpl_vars['minicSlider']->value['options']['pause']!='') {?><?php echo $_smarty_tpl->tpl_vars['minicSlider']->value['options']['pause'];?>
<?php } else { ?>3000<?php }?>, 
        startSlide: <?php if ($_smarty_tpl->tpl_vars['minicSlider']->value['options']['startSlide']!='') {?><?php echo $_smarty_tpl->tpl_vars['minicSlider']->value['options']['startSlide'];?>
<?php } else { ?>0<?php }?>,
        directionNav: false, 
        controlNav: <?php if ($_smarty_tpl->tpl_vars['minicSlider']->value['options']['control']==1) {?>true<?php } else { ?>false<?php }?>, 
        controlNavThumbs: false,
        pauseOnHover: <?php if ($_smarty_tpl->tpl_vars['minicSlider']->value['options']['hover']==1) {?>true<?php } else { ?>false<?php }?>, 
        manualAdvance: <?php if ($_smarty_tpl->tpl_vars['minicSlider']->value['options']['manual']==1) {?>true<?php } else { ?>false<?php }?>, 
        prevText: '', 
        nextText: '', 
        randomStart: <?php if ($_smarty_tpl->tpl_vars['minicSlider']->value['options']['random']==1) {?>true<?php } else { ?>false<?php }?>
    });
});
</script>   
<div class="clearfix"></div>
<?php }?><?php }} ?>
