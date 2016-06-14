<?php /* Smarty version Smarty-3.1.19, created on 2016-04-25 19:13:05
         compiled from "/srv/data/web/vhosts/www.bouquetacroquer.fr/htdocs/modules/pk_promominicslider/views/templates/admin/admin-options.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1697141029571e5021d34fc6-54141317%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '581e4d6f813bdeb83baedf087f941dc01d4711c7' => 
    array (
      0 => '/srv/data/web/vhosts/www.bouquetacroquer.fr/htdocs/modules/pk_promominicslider/views/templates/admin/admin-options.tpl',
      1 => 1453302013,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1697141029571e5021d34fc6-54141317',
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
  'unifunc' => 'content_571e5021f116c3_91622631',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_571e5021f116c3_91622631')) {function content_571e5021f116c3_91622631($_smarty_tpl) {?>

<fieldset id="option" class="hidden-div">
	<legend><?php echo smartyTranslate(array('s'=>'Options','mod'=>'promominicslider'),$_smarty_tpl);?>
</legend>
	<form id="slider_options" method="post" action="<?php echo $_smarty_tpl->tpl_vars['slider']->value['postAction'];?>
">
		<div id="options" class="container">
			<div class="products-sett">
				<h3><?php echo smartyTranslate(array('s'=>'Products Type','mod'=>'promominicslider'),$_smarty_tpl);?>
</h3>
				<div>
					<label><?php echo smartyTranslate(array('s'=>'Featured products','mod'=>'promominicslider'),$_smarty_tpl);?>
</label>
					<input type="radio" name="products_type" value="1" <?php if ($_smarty_tpl->tpl_vars['slider']->value['options']['products_type']==1) {?>checked="checked"<?php }?>/><br/><br/>					
					<label><?php echo smartyTranslate(array('s'=>'New products','mod'=>'promominicslider'),$_smarty_tpl);?>
</label>
					<input type="radio" name="products_type" value="0" <?php if ($_smarty_tpl->tpl_vars['slider']->value['options']['products_type']==0) {?>checked="checked"<?php }?>/><br/><br/>
					<label><?php echo smartyTranslate(array('s'=>'Special products','mod'=>'promominicslider'),$_smarty_tpl);?>
</label>
					<input type="radio" name="products_type" value="2" <?php if ($_smarty_tpl->tpl_vars['slider']->value['options']['products_type']==2) {?>checked="checked"<?php }?>/><br/>
				</div><br/><br/>
				<h3><?php echo smartyTranslate(array('s'=>'Products Images','mod'=>'promominicslider'),$_smarty_tpl);?>
</h3>
				<div>
					<label><?php echo smartyTranslate(array('s'=>'Full width','mod'=>'promominicslider'),$_smarty_tpl);?>
</label>
					<input type="radio" name="img_view" value="1" <?php if ($_smarty_tpl->tpl_vars['slider']->value['options']['img_view']==1) {?>checked="checked"<?php }?>/><br/><br/>					
					<label><?php echo smartyTranslate(array('s'=>'Full height','mod'=>'promominicslider'),$_smarty_tpl);?>
</label>
					<input type="radio" name="img_view" value="0" <?php if ($_smarty_tpl->tpl_vars['slider']->value['options']['img_view']==0) {?>checked="checked"<?php }?>/>
				</div>
				<br/><br/>
				<h3><?php echo smartyTranslate(array('s'=>'Products Price','mod'=>'promominicslider'),$_smarty_tpl);?>
</h3>
				<div>
					<label><?php echo smartyTranslate(array('s'=>'With reduction','mod'=>'promominicslider'),$_smarty_tpl);?>
</label>
					<input type="radio" name="price_reduction" value="1" <?php if ($_smarty_tpl->tpl_vars['slider']->value['options']['price_reduction']==1) {?>checked="checked"<?php }?>/><br/><br/>					
					<label><?php echo smartyTranslate(array('s'=>'Without reduction','mod'=>'promominicslider'),$_smarty_tpl);?>
</label>
					<input type="radio" name="price_reduction" value="0" <?php if ($_smarty_tpl->tpl_vars['slider']->value['options']['price_reduction']==0) {?>checked="checked"<?php }?>/>
				</div>
			</div>
            <div class="animation">            	
                <h3><?php echo smartyTranslate(array('s'=>'Animation','mod'=>'promominicslider'),$_smarty_tpl);?>
</h3>  
                <div class="select">      
                    <div class="first_select">
                        <label><?php echo smartyTranslate(array('s'=>'Unused effects','mod'=>'promominicslider'),$_smarty_tpl);?>
<span class="info_ico sl-tooltip" title="<?php echo smartyTranslate(array('s'=>'These are the animation effects, choose one or more and click to the Add button.','mod'=>'promominicslider'),$_smarty_tpl);?>
"></span>  </label>
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
                        <input name="left2right" value="<?php echo smartyTranslate(array('s'=>'Add','mod'=>'promominicslider'),$_smarty_tpl);?>
" type="button" id="add" class="green sl-tooltip" title="<?php echo smartyTranslate(array('s'=>'Click to add effect','mod'=>'promominicslider'),$_smarty_tpl);?>
">
					    
                    </div>
                    <div class="second_select">
                        <label><?php echo smartyTranslate(array('s'=>'Used effects','mod'=>'promominicslider'),$_smarty_tpl);?>
<span class="info_ico sl-tooltip" title="<?php echo smartyTranslate(array('s'=>'These are the used animation effects, you can select and remove them, if its empty then all will be used ( random ).','mod'=>'promominicslider'),$_smarty_tpl);?>
"></span></label>
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
                        <input name="right2left" value="<?php echo smartyTranslate(array('s'=>'Remove','mod'=>'promominicslider'),$_smarty_tpl);?>
" type="button" id="remove" class="green sl-tooltip" title="<?php echo smartyTranslate(array('s'=>'Click to remove effect','mod'=>'promominicslider'),$_smarty_tpl);?>
">
                    </div>                   
                </div>    
            </div>
            <div class="slice">
                <h3><?php echo smartyTranslate(array('s'=>'Configure Slice and Box animation','mod'=>'promominicslider'),$_smarty_tpl);?>
</h3>
                <div>
                    <label><?php echo smartyTranslate(array('s'=>'Slices','mod'=>'promominicslider'),$_smarty_tpl);?>
: </label>
				    <input type="text" name="slices" value="<?php echo $_smarty_tpl->tpl_vars['slider']->value['options']['slices'];?>
" class="sl-tooltip" title="<?php echo smartyTranslate(array('s'=>'The number of Slices for Slice animation','mod'=>'promominicslider'),$_smarty_tpl);?>
">
				</div>
                <div>
                    <label><?php echo smartyTranslate(array('s'=>'BoxCols','mod'=>'promominicslider'),$_smarty_tpl);?>
: </label>
				    <input type="text" name="cols" value="<?php echo $_smarty_tpl->tpl_vars['slider']->value['options']['cols'];?>
" class="sl-tooltip" title="<?php echo smartyTranslate(array('s'=>'The number of Cols for Box animations','mod'=>'promominicslider'),$_smarty_tpl);?>
">
			    </div>
                <div>
                	<label><?php echo smartyTranslate(array('s'=>'BoxRows','mod'=>'promominicslider'),$_smarty_tpl);?>
: </label>
			        <input type="text" name="rows" value="<?php echo $_smarty_tpl->tpl_vars['slider']->value['options']['rows'];?>
" class="sl-tooltip" title="<?php echo smartyTranslate(array('s'=>'The number of Rows for Box animations','mod'=>'promominicslider'),$_smarty_tpl);?>
">
			    </div>
            </div>
            <div class="configuration">
                <h3><?php echo smartyTranslate(array('s'=>'Animation Configuration','mod'=>'promominicslider'),$_smarty_tpl);?>
</h3>
                <div>
                    <label><?php echo smartyTranslate(array('s'=>'Speed','mod'=>'promominicslider'),$_smarty_tpl);?>
: </label>
					<input type="text" name="speed" value="<?php echo $_smarty_tpl->tpl_vars['slider']->value['options']['speed'];?>
" class="sl-tooltip" title="<?php echo smartyTranslate(array('s'=>'Slide transition speed in miliseconds (default is 0.5 sec)','mod'=>'promominicslider'),$_smarty_tpl);?>
">                    
                </div>    
                <div>
                    <label><?php echo smartyTranslate(array('s'=>'Pause Time','mod'=>'promominicslider'),$_smarty_tpl);?>
: </label>
					<input type="text" name="pause" value="<?php echo $_smarty_tpl->tpl_vars['slider']->value['options']['pause'];?>
" class="sl-tooltip" title="<?php echo smartyTranslate(array('s'=>'How long each slide will be shown in miliseconds (default is 3 sec)','mod'=>'promominicslider'),$_smarty_tpl);?>
">
                </div>
                <div class="switch">
                    <label><?php echo smartyTranslate(array('s'=>'Pause on Mouse Hover','mod'=>'promominicslider'),$_smarty_tpl);?>
: </label>
					<div class="field switch">
						<input type="radio" id="r-hover" class="" name="hover"  value="<?php echo $_smarty_tpl->tpl_vars['slider']->value['options']['hover'];?>
" checked="true" />
						<label for="r-hover" class="cb-enable <?php if ($_smarty_tpl->tpl_vars['slider']->value['options']['hover']==1) {?>selected<?php }?>" ><span>ON</span></label>
						<label for="r-hover" class="cb-disable <?php if ($_smarty_tpl->tpl_vars['slider']->value['options']['hover']==0) {?>selected<?php }?>" ><span>OFF</span></label>
					</div>
					<span class="info_ico sl-tooltip" title="<?php echo smartyTranslate(array('s'=>'Pause the slider on mouse hover.','mod'=>'promominicslider'),$_smarty_tpl);?>
"></span>
                </div>
                <div class="switch">
                    <label><?php echo smartyTranslate(array('s'=>'Manual slide','mod'=>'promominicslider'),$_smarty_tpl);?>
: </label>
					<div class="field switch">
						<input type="radio" id="r-manual" class="" name="manual"  value="<?php echo $_smarty_tpl->tpl_vars['slider']->value['options']['manual'];?>
" checked="true" />
						<label for="r-manual" class="cb-enable <?php if ($_smarty_tpl->tpl_vars['slider']->value['options']['manual']==1) {?>selected<?php }?>" ><span>ON</span></label>
						<label for="r-manual" class="cb-disable <?php if ($_smarty_tpl->tpl_vars['slider']->value['options']['manual']==0) {?>selected<?php }?>" ><span>OFF</span></label>
					</div>
					<span class="info_ico sl-tooltip" title="<?php echo smartyTranslate(array('s'=>'Turn it ON if you dont want the slider to auto slide.','mod'=>'promominicslider'),$_smarty_tpl);?>
"></span>
                </div>                    
            </div>
            <div class="navigation">
                <h3><?php echo smartyTranslate(array('s'=>'Navigation','mod'=>'promominicslider'),$_smarty_tpl);?>
</h3>
                <div class="switch">
                    <label><?php echo smartyTranslate(array('s'=>'Prev/Next button','mod'=>'promominicslider'),$_smarty_tpl);?>
: </label>
					<div class="field switch">
						<input type="radio" id="r-buttons" class="" name="buttons"  value="<?php echo $_smarty_tpl->tpl_vars['slider']->value['options']['buttons'];?>
" checked="true" />
						<label for="r-buttons" class="cb-enable <?php if ($_smarty_tpl->tpl_vars['slider']->value['options']['buttons']==1) {?>selected<?php }?>" ><span>ON</span></label>
						<label for="r-buttons" class="cb-disable <?php if ($_smarty_tpl->tpl_vars['slider']->value['options']['buttons']==0) {?>selected<?php }?>" ><span>OFF</span></label>
					</div>
					<span class="info_ico sl-tooltip" title="<?php echo smartyTranslate(array('s'=>'If you want previous and next buttons on the two side of the slider, then turn this on.','mod'=>'promominicslider'),$_smarty_tpl);?>
"></span>
                </div>
                <div class="switch">
                    <label><?php echo smartyTranslate(array('s'=>'Control','mod'=>'promominicslider'),$_smarty_tpl);?>
: </label>
					<div class="field switch">
						<input type="radio" id="r-control" class="" name="control"  value="<?php echo $_smarty_tpl->tpl_vars['slider']->value['options']['control'];?>
" checked="true" />
						<label for="r-control" class="cb-enable <?php if ($_smarty_tpl->tpl_vars['slider']->value['options']['control']==1) {?>selected<?php }?>" ><span>ON</span></label>
						<label for="r-control" class="cb-disable <?php if ($_smarty_tpl->tpl_vars['slider']->value['options']['control']==0) {?>selected<?php }?>" ><span>OFF</span></label>
					</div>
					<span class="info_ico sl-tooltip" title="<?php echo smartyTranslate(array('s'=>'This controls the navigation, by default these are the litle dots under the slider.','mod'=>'promominicslider'),$_smarty_tpl);?>
"></span>
                </div>
                <div class="switch">
                    <label><?php echo smartyTranslate(array('s'=>'Thumbnails','mod'=>'promominicslider'),$_smarty_tpl);?>
: </label>
					<div class="field switch">
						<input type="radio" id="r-thumbnail" class="" name="thumbnail"  value="<?php echo $_smarty_tpl->tpl_vars['slider']->value['options']['thumbnail'];?>
" checked="true" />
						<label for="r-thumbnail" class="cb-enable <?php if ($_smarty_tpl->tpl_vars['slider']->value['options']['thumbnail']==1) {?>selected<?php }?>" ><span>ON</span></label>
						<label for="r-thumbnail" class="cb-disable <?php if ($_smarty_tpl->tpl_vars['slider']->value['options']['thumbnail']==0) {?>selected<?php }?>" ><span>OFF</span></label>
					</div>
					<span class="info_ico sl-tooltip" title="<?php echo smartyTranslate(array('s'=>'Turn it on if you want thumbnails in the place of the ( control ) litle dots.','mod'=>'promominicslider'),$_smarty_tpl);?>
"></span>
                </div>   
            </div>
            <div class="other">
                <h3><?php echo smartyTranslate(array('s'=>'Other','mod'=>'promominicslider'),$_smarty_tpl);?>
</h3>                
                <div class="switch">
                    <label><?php echo smartyTranslate(array('s'=>'I need multilanguage','mod'=>'promominicslider'),$_smarty_tpl);?>
: </label>
					<div class="field switch">
						<input type="radio" id="r-single" class="" name="single"  value="<?php echo $_smarty_tpl->tpl_vars['slider']->value['options']['single'];?>
" checked="true" />
						<label for="r-single" class="cb-enable <?php if ($_smarty_tpl->tpl_vars['slider']->value['options']['single']==1) {?>selected<?php }?>" ><span>ON</span></label>
						<label for="r-single" class="cb-disable <?php if ($_smarty_tpl->tpl_vars['slider']->value['options']['single']==0) {?>selected<?php }?>" ><span>OFF</span></label>
					</div>
					<span class="info_ico sl-tooltip" title="<?php echo smartyTranslate(array('s'=>'Turn on if you want to use different slides for different languages, otherwise the default language slides will be used for all the languages.','mod'=>'promominicslider'),$_smarty_tpl);?>
"></span>
                </div>       
                             
                <div class="switch">
                    <label><?php echo smartyTranslate(array('s'=>'Home only','mod'=>'promominicslider'),$_smarty_tpl);?>
: </label>
					<div class="field switch">
						<input type="radio" id="r-front" class="" name="front"  value="<?php echo $_smarty_tpl->tpl_vars['slider']->value['options']['front'];?>
" checked="true" />
						<label for="r-front" class="cb-enable <?php if ($_smarty_tpl->tpl_vars['slider']->value['options']['front']==1) {?>selected<?php }?>" ><span>ON</span></label>
						<label for="r-front" class="cb-disable <?php if ($_smarty_tpl->tpl_vars['slider']->value['options']['front']==0) {?>selected<?php }?>" ><span>OFF</span></label>
					</div>
					<span class="info_ico sl-tooltip" title="<?php echo smartyTranslate(array('s'=>'Turn on if you want to use the Minic Slider only on the home page.','mod'=>'promominicslider'),$_smarty_tpl);?>
"></span>
                </div>   
            </div>
            <div class="button_cont">
				<input type="submit" name="submitOptions" value="<?php echo smartyTranslate(array('s'=>'Update','mod'=>'promominicslider'),$_smarty_tpl);?>
" id="submitOptions" class="green large" />
			</div>
		</div>
	</form>
</fieldset><?php }} ?>
