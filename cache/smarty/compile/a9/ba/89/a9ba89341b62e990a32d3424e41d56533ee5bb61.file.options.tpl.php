<?php /* Smarty version Smarty-3.1.19, created on 2016-04-25 19:51:21
         compiled from "/srv/data/web/vhosts/www.bouquetacroquer.fr/htdocs/modules/pk_bannercarousel/views/templates/admin/options.tpl" */ ?>
<?php /*%%SmartyHeaderCode:508717183571e5919955a82-75079699%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a9ba89341b62e990a32d3424e41d56533ee5bb61' => 
    array (
      0 => '/srv/data/web/vhosts/www.bouquetacroquer.fr/htdocs/modules/pk_bannercarousel/views/templates/admin/options.tpl',
      1 => 1453301956,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '508717183571e5919955a82-75079699',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'slider' => 0,
    'effect' => 0,
    'current' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_571e5919af9692_03770269',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_571e5919af9692_03770269')) {function content_571e5919af9692_03770269($_smarty_tpl) {?><div id="options" class="minic-container">
    <form id="form-option" class="" method="post" action="<?php echo $_smarty_tpl->tpl_vars['slider']->value['postAction'];?>
">
        <div class="minic-top">
            <h3><?php echo smartyTranslate(array('s'=>'Options','mod'=>'pk_bannercarousel'),$_smarty_tpl);?>
</h3>
            <a href="#options" class="minic-close">x</a>
            <br class="clearfix" />
        </div>
        <div class="minic-content">
            <!-- Animation type -->
            
            <!--<h3 style="width:100%;<?php if ($_smarty_tpl->tpl_vars['slider']->value['options']['random']==1) {?> display:none<?php }?>"><?php echo smartyTranslate(array('s'=>'Animation type','mod'=>'pk_bannercarousel'),$_smarty_tpl);?>
</h3>
            <div class="select" <?php if ($_smarty_tpl->tpl_vars['slider']->value['options']['random']==1) {?>style="display:none"<?php }?>>      
                <div class="used">
                    <label><i class="icon-info-sign tooltip2" title="<?php echo smartyTranslate(array('s'=>'These are the animation effects, choose one or more and click to the Add button.'),$_smarty_tpl);?>
"></i><?php echo smartyTranslate(array('s'=>'Unused effects','mod'=>'pk_bannercarousel'),$_smarty_tpl);?>
</label>
                    <select multiple="multiple" id="select1" name="nivo_effect[]" >
                        <?php  $_smarty_tpl->tpl_vars['effect'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['effect']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['slider']->value['options']['effect']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['effect']->key => $_smarty_tpl->tpl_vars['effect']->value) {
$_smarty_tpl->tpl_vars['effect']->_loop = true;
?>
                            <option><?php echo $_smarty_tpl->tpl_vars['effect']->value;?>
</option>
                        <?php } ?>
                    </select>   
                    <input name="left2right" value="<?php echo smartyTranslate(array('s'=>'Add'),$_smarty_tpl);?>
" type="button" id="add" class="button-small green tooltip2" title="<?php echo smartyTranslate(array('s'=>'Click to add effect','mod'=>'pk_bannercarousel'),$_smarty_tpl);?>
">
                </div> 
                <div class="unused">
                    <label><i class="icon-info-sign tooltip2" title="<?php echo smartyTranslate(array('s'=>'These are the used animation effects, you can select and remove them, if its empty then all will be used ( random ).'),$_smarty_tpl);?>
"></i><?php echo smartyTranslate(array('s'=>'Used effects','mod'=>'pk_bannercarousel'),$_smarty_tpl);?>
</label>
                    <select multiple="multiple" id="select2" name="nivo_current[]" >
                        <?php  $_smarty_tpl->tpl_vars['current'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['current']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['slider']->value['options']['current']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['current']->key => $_smarty_tpl->tpl_vars['current']->value) {
$_smarty_tpl->tpl_vars['current']->_loop = true;
?>
                            <option><?php echo $_smarty_tpl->tpl_vars['current']->value;?>
</option>
                        <?php } ?>
                    </select>   
                    <input name="right2left" value="<?php echo smartyTranslate(array('s'=>'Remove'),$_smarty_tpl);?>
" type="button" id="remove" class="button-small grey tooltip2" title="<?php echo smartyTranslate(array('s'=>'Click to remove effect','mod'=>'pk_bannercarousel'),$_smarty_tpl);?>
">
                </div> 
            </div>    
            <div class="clearfix"></div>
            <br/><br/><br/>
             Slice and Box animation          
            <h3 <?php if ($_smarty_tpl->tpl_vars['slider']->value['options']['random']==1) {?>style="display:none"<?php }?>><?php echo smartyTranslate(array('s'=>'Slice and Box animation configuration','mod'=>'pk_bannercarousel'),$_smarty_tpl);?>
</h3>
            <div class="input-holder" <?php if ($_smarty_tpl->tpl_vars['slider']->value['options']['random']==1) {?>style="display:none"<?php }?>>
                <label><?php echo smartyTranslate(array('s'=>'Slices','mod'=>'pk_bannercarousel'),$_smarty_tpl);?>
: </label>
                <input type="text" name="slices" value="<?php echo $_smarty_tpl->tpl_vars['slider']->value['options']['slices'];?>
" class="tooltip2" title="<?php echo smartyTranslate(array('s'=>'The number of Slices for Slice animation','mod'=>'pk_bannercarousel'),$_smarty_tpl);?>
">
            </div>
            <div class="input-holder" <?php if ($_smarty_tpl->tpl_vars['slider']->value['options']['random']==1) {?>style="display:none"<?php }?>>
                <label><?php echo smartyTranslate(array('s'=>'BoxCols','mod'=>'pk_bannercarousel'),$_smarty_tpl);?>
: </label>
                <input type="text" name="cols" value="<?php echo $_smarty_tpl->tpl_vars['slider']->value['options']['cols'];?>
" class="tooltip2" title="<?php echo smartyTranslate(array('s'=>'The number of Cols for Box animations','mod'=>'pk_bannercarousel'),$_smarty_tpl);?>
">
            </div>
            <div class="input-holder" <?php if ($_smarty_tpl->tpl_vars['slider']->value['options']['random']==1) {?>style="display:none"<?php }?>>
                <label><?php echo smartyTranslate(array('s'=>'BoxRows','mod'=>'pk_bannercarousel'),$_smarty_tpl);?>
: </label>
                <input type="text" name="rows" value="<?php echo $_smarty_tpl->tpl_vars['slider']->value['options']['rows'];?>
" class="tooltip2" title="<?php echo smartyTranslate(array('s'=>'The number of Rows for Box animations','mod'=>'pk_bannercarousel'),$_smarty_tpl);?>
">
            </div>
            
             Animation configuration -->
            <h3><?php echo smartyTranslate(array('s'=>'Animation configuration','mod'=>'pk_bannercarousel'),$_smarty_tpl);?>
</h3>
            <div class="input-holder">
                <label><?php echo smartyTranslate(array('s'=>'Speed','mod'=>'pk_bannercarousel'),$_smarty_tpl);?>
: </label>
                <input type="text" name="speed" value="<?php echo $_smarty_tpl->tpl_vars['slider']->value['options']['speed'];?>
" class="tooltip2" title="<?php echo smartyTranslate(array('s'=>'Slide transition speed in miliseconds (default is 0.5 sec)','mod'=>'pk_bannercarousel'),$_smarty_tpl);?>
">                    
            </div>    
            <div class="input-holder">
                <label><?php echo smartyTranslate(array('s'=>'Pause Time','mod'=>'pk_bannercarousel'),$_smarty_tpl);?>
: </label>
                <input type="text" name="pause" value="<?php echo $_smarty_tpl->tpl_vars['slider']->value['options']['pause'];?>
" class="tooltip2" title="<?php echo smartyTranslate(array('s'=>'How long each slide will be shown in miliseconds (default is 3 sec)','mod'=>'pk_bannercarousel'),$_smarty_tpl);?>
">
            </div>
            <div class="input-holder">
                <label><?php echo smartyTranslate(array('s'=>'Visible baners','mod'=>'pk_bannercarousel'),$_smarty_tpl);?>
: </label>
                <input type="text" name="startSlide" value="<?php echo $_smarty_tpl->tpl_vars['slider']->value['options']['startSlide'];?>
" class="tooltip2" title="<?php echo smartyTranslate(array('s'=>'The number of slides which will be visible in carousel','mod'=>'pk_bannercarousel'),$_smarty_tpl);?>
">
            </div>
            <!--<h3><?php echo smartyTranslate(array('s'=>'Width and Height configuration','mod'=>'pk_bannercarousel'),$_smarty_tpl);?>
</h3>
            <div class="input-holder">
                <label><?php echo smartyTranslate(array('s'=>'Slider width','mod'=>'pk_bannercarousel'),$_smarty_tpl);?>
: </label>
                <input type="text" name="width" value="<?php echo $_smarty_tpl->tpl_vars['slider']->value['options']['width'];?>
" class="tooltip2" title="<?php echo smartyTranslate(array('s'=>'If you want to fix the width of the slider than fill this out.','mod'=>'pk_bannercarousel'),$_smarty_tpl);?>
">
            </div>
            <div class="input-holder">
                <label><?php echo smartyTranslate(array('s'=>'Slider height','mod'=>'pk_bannercarousel'),$_smarty_tpl);?>
: </label>
                <input type="text" name="height" value="<?php echo $_smarty_tpl->tpl_vars['slider']->value['options']['height'];?>
" class="tooltip2" title="<?php echo smartyTranslate(array('s'=>'If you want to fix the height of the slider than fill this out.','mod'=>'pk_bannercarousel'),$_smarty_tpl);?>
">
            </div>-->
            <div class="right">
                <!--<h3><?php echo smartyTranslate(array('s'=>'Other options','mod'=>'pk_bannercarousel'),$_smarty_tpl);?>
</h3>
                <div class="switch-holder">
                    <label><i class="icon-info-sign tooltip2" title="<?php echo smartyTranslate(array('s'=>'Turn it ON if you want to show banners as carousel.'),$_smarty_tpl);?>
"></i><?php echo smartyTranslate(array('s'=>'Carousel View','mod'=>'pk_bannercarousel'),$_smarty_tpl);?>
: </label>
                    <div class="switch small <?php if ($_smarty_tpl->tpl_vars['slider']->value['options']['random']) {?>active<?php } else { ?>inactive<?php }?>">
                        <input type="radio" id="r-random" class="" name="random"  value="<?php echo $_smarty_tpl->tpl_vars['slider']->value['options']['random'];?>
" checked="true" />
                    </div>
                </div>-->
                <div class="switch-holder">
                    <label><i class="icon-info-sign tooltip2" title="<?php echo smartyTranslate(array('s'=>'Pause the slider on mouse hover.'),$_smarty_tpl);?>
"></i><?php echo smartyTranslate(array('s'=>'Pause on Mouse Hover','mod'=>'pk_bannercarousel'),$_smarty_tpl);?>
: </label>
                    <div class="switch small <?php if ($_smarty_tpl->tpl_vars['slider']->value['options']['hover']) {?>active<?php } else { ?>inactive<?php }?>">
                        <input type="radio" id="r-hover" class="" name="hover"  value="<?php echo $_smarty_tpl->tpl_vars['slider']->value['options']['hover'];?>
" checked="true" />
                    </div>
                </div>
                <div class="switch-holder">
                    <label><i class="icon-info-sign tooltip2" title="<?php echo smartyTranslate(array('s'=>'Turn it ON if you want the slider to auto slide.'),$_smarty_tpl);?>
"></i><?php echo smartyTranslate(array('s'=>'Auto slide','mod'=>'pk_bannercarousel'),$_smarty_tpl);?>
: </label>
                    <div class="switch small <?php if ($_smarty_tpl->tpl_vars['slider']->value['options']['manual']) {?>active<?php } else { ?>inactive<?php }?>">
                        <input type="radio" id="r-manual" class="" name="manual"  value="<?php echo $_smarty_tpl->tpl_vars['slider']->value['options']['manual'];?>
" checked="true" />
                    </div>
                </div>
                <div class="switch-holder">
                    <label><i class="icon-info-sign tooltip2" title="<?php echo smartyTranslate(array('s'=>'If you want previous and next buttons on the two side of the slider, then turn this on.'),$_smarty_tpl);?>
"></i><?php echo smartyTranslate(array('s'=>'Prev/Next button','mod'=>'pk_bannercarousel'),$_smarty_tpl);?>
: </label>
                    <div class="switch small <?php if ($_smarty_tpl->tpl_vars['slider']->value['options']['buttons']) {?>active<?php } else { ?>inactive<?php }?>">
                        <input type="radio" id="r-buttons" class="" name="buttons"  value="<?php echo $_smarty_tpl->tpl_vars['slider']->value['options']['buttons'];?>
" checked="true" />
                    </div>
                </div><!--
                <div class="switch-holder">
                    <label><i class="icon-info-sign tooltip2" title="<?php echo smartyTranslate(array('s'=>'This controls the navigation, by default these are the litle dots under the slider.'),$_smarty_tpl);?>
"></i><?php echo smartyTranslate(array('s'=>'Control','mod'=>'pk_bannercarousel'),$_smarty_tpl);?>
: </label>
                    <div class="switch small <?php if ($_smarty_tpl->tpl_vars['slider']->value['options']['control']) {?>active<?php } else { ?>inactive<?php }?>">
                        <input type="radio" id="r-control" class="" name="control"  value="<?php echo $_smarty_tpl->tpl_vars['slider']->value['options']['control'];?>
" checked="true" />
                    </div>
                </div>
                <div class="switch-holder" <?php if ($_smarty_tpl->tpl_vars['slider']->value['options']['random']==1) {?>style="display:none"<?php }?>>
                    <label><i class="icon-info-sign tooltip2" title="<?php echo smartyTranslate(array('s'=>'Turn it on if you want thumbnails in the place of the ( control ) litle dots.'),$_smarty_tpl);?>
"></i><?php echo smartyTranslate(array('s'=>'Thumbnails','mod'=>'pk_bannercarousel'),$_smarty_tpl);?>
: </label>
                    <div class="switch small <?php if ($_smarty_tpl->tpl_vars['slider']->value['options']['thumbnail']) {?>active<?php } else { ?>inactive<?php }?>">
                        <input type="radio" id="r-thumbnail" class="" name="thumbnail"  value="<?php echo $_smarty_tpl->tpl_vars['slider']->value['options']['thumbnail'];?>
" checked="true" />
                    </div>
                </div>                -->
                <div class="switch-holder">
                    <label><i class="icon-info-sign tooltip2" title="<?php echo smartyTranslate(array('s'=>'Turn on if you want to use different slides for different languages, otherwise the default language slides will be used for all the languages.'),$_smarty_tpl);?>
"></i><?php echo smartyTranslate(array('s'=>'I need multilanguage','mod'=>'pk_bannercarousel'),$_smarty_tpl);?>
: </label>
                    <div class="switch small <?php if ($_smarty_tpl->tpl_vars['slider']->value['options']['single']) {?>active<?php } else { ?>inactive<?php }?>">
                        <input type="radio" id="r-single" class="" name="single"  value="<?php echo $_smarty_tpl->tpl_vars['slider']->value['options']['single'];?>
" checked="true" />
                    </div>
                </div>
                <!--<div class="switch-holder">
                    <label><i class="icon-info-sign tooltip2" title="<?php echo smartyTranslate(array('s'=>'Turn on if you want to use the Minic Slider only on the home page.'),$_smarty_tpl);?>
"></i><?php echo smartyTranslate(array('s'=>'Home only','mod'=>'pk_bannercarousel'),$_smarty_tpl);?>
: </label>
                    <div class="switch small <?php if ($_smarty_tpl->tpl_vars['slider']->value['options']['front']) {?>active<?php } else { ?>inactive<?php }?>">
                        <input type="radio" id="r-front" class="" name="front"  value="<?php echo $_smarty_tpl->tpl_vars['slider']->value['options']['front'];?>
" checked="true" />
                    </div>
                </div> -->
            </div> 
        </div>
        <div class="minic-bottom">
            <input type="submit" name="submitMinicOptions" value="<?php echo smartyTranslate(array('s'=>'Save','mod'=>'pk_bannercarousel'),$_smarty_tpl);?>
" id="submitOptions" class="button-large green" />
            <a href="#options" class="minic-close button-large lgrey"><?php echo smartyTranslate(array('s'=>'Close','mod'=>'pk_bannercarousel'),$_smarty_tpl);?>
</a>
        </div>
    </form>
</div><?php }} ?>
