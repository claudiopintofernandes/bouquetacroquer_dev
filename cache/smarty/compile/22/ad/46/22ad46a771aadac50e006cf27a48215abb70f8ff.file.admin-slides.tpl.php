<?php /* Smarty version Smarty-3.1.19, created on 2016-03-11 14:49:08
         compiled from "/srv/data/web/vhosts/www.bouquetacroquer.fr/htdocs/modules/pk_layeredslider/views/templates/admin/admin-slides.tpl" */ ?>
<?php /*%%SmartyHeaderCode:209856904456e2ccd45b8d32-56926088%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '22ad46a771aadac50e006cf27a48215abb70f8ff' => 
    array (
      0 => '/srv/data/web/vhosts/www.bouquetacroquer.fr/htdocs/modules/pk_layeredslider/views/templates/admin/admin-slides.tpl',
      1 => 1453301984,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '209856904456e2ccd45b8d32-56926088',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'slider' => 0,
    'lang' => 0,
    'iso' => 0,
    'slide' => 0,
    'module_dir' => 0,
    'k' => 0,
    'imageName' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_56e2ccd4b87124_13682968',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56e2ccd4b87124_13682968')) {function content_56e2ccd4b87124_13682968($_smarty_tpl) {?>

<fieldset id="list_slide" class="">
    <legend><?php echo smartyTranslate(array('s'=>'Slides','mod'=>'pk_layeredslider'),$_smarty_tpl);?>
</legend>
    <div>
    <div id="navigation">
        <?php if ($_smarty_tpl->tpl_vars['slider']->value['options']['single']==0) {?>
            <a href="#<?php echo $_smarty_tpl->tpl_vars['slider']->value['lang']['default']['iso_code'];?>
_slides" class="navigation active">
                <img src="<?php echo $_smarty_tpl->tpl_vars['slider']->value['lang']['lang_dir'];?>
<?php echo $_smarty_tpl->tpl_vars['slider']->value['lang']['default']['id_lang'];?>
.jpg" />
                <?php echo $_smarty_tpl->tpl_vars['slider']->value['lang']['default']['name'];?>

            </a>
        <?php } else { ?>
            <?php  $_smarty_tpl->tpl_vars['lang'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['lang']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['slider']->value['lang']['all']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['lang']->key => $_smarty_tpl->tpl_vars['lang']->value) {
$_smarty_tpl->tpl_vars['lang']->_loop = true;
?>
                <a href="#<?php echo $_smarty_tpl->tpl_vars['lang']->value['iso_code'];?>
_slides" class="navigation <?php if ($_smarty_tpl->tpl_vars['lang']->value['iso_code']==$_smarty_tpl->tpl_vars['slider']->value['lang']['default']['iso_code']) {?>active<?php }?>">
                    <img src="<?php echo $_smarty_tpl->tpl_vars['slider']->value['lang']['lang_dir'];?>
<?php echo $_smarty_tpl->tpl_vars['lang']->value['id_lang'];?>
.jpg" />
                    <?php echo $_smarty_tpl->tpl_vars['lang']->value['name'];?>

                </a>
            <?php } ?>    
        <?php }?>
    </div>
    <div class="titles">
        <span class="order"><?php echo smartyTranslate(array('s'=>"Order",'mod'=>'pk_layeredslider'),$_smarty_tpl);?>
</span>
        <span class="title"><?php echo smartyTranslate(array('s'=>"Title",'mod'=>'pk_layeredslider'),$_smarty_tpl);?>
</span>
        <span class="active"><?php echo smartyTranslate(array('s'=>"Active",'mod'=>'pk_layeredslider'),$_smarty_tpl);?>
</span>
        <span class="arrow"></span>    
    </div>        
    <div class="slides_holder">
        <?php  $_smarty_tpl->tpl_vars['lang'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['lang']->_loop = false;
 $_smarty_tpl->tpl_vars['iso'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['slider']->value['slides']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['lang']->key => $_smarty_tpl->tpl_vars['lang']->value) {
$_smarty_tpl->tpl_vars['lang']->_loop = true;
 $_smarty_tpl->tpl_vars['iso']->value = $_smarty_tpl->tpl_vars['lang']->key;
?>
            <ul id="<?php echo $_smarty_tpl->tpl_vars['iso']->value;?>
_slides" class="languages">
                <?php  $_smarty_tpl->tpl_vars['slide'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['slide']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lang']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['slide']->key => $_smarty_tpl->tpl_vars['slide']->value) {
$_smarty_tpl->tpl_vars['slide']->_loop = true;
?>
                    <li id="order_<?php echo $_smarty_tpl->tpl_vars['slide']->value['id_slide'];?>
h<?php echo $_smarty_tpl->tpl_vars['slide']->value['id_order'];?>
" class="slide_elem" >
                        <div class="slide_header <?php if ($_smarty_tpl->tpl_vars['slide']->value['active']!=1) {?>inactive<?php }?>">
                            <span class="order">
                                <span></span>
                                <?php if ($_smarty_tpl->tpl_vars['slide']->value['id_order']<=9) {?>0<?php }?><?php echo $_smarty_tpl->tpl_vars['slide']->value['id_order'];?>

                            </span>
                            <span class="title"><?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['slide']->value['title']);?>
</span>
                            <span class="<?php if ($_smarty_tpl->tpl_vars['slide']->value['active']==1) {?>active<?php } else { ?>deactivated<?php }?>"></span>
                            <span class="arrow"></span>
                        </div>
                        <div class="slide_body">
                              <form id="<?php echo $_smarty_tpl->tpl_vars['iso']->value;?>
_<?php echo $_smarty_tpl->tpl_vars['slide']->value['id_order'];?>
" method="post" action="<?php echo $_smarty_tpl->tpl_vars['slider']->value['postAction'];?>
" enctype="multipart/form-data">
                                  <div class="image_holder">
                                    <div style="overflow:hidden; width:100%">
                                      <h4><?php echo smartyTranslate(array('s'=>'Main Image','mod'=>'pk_layeredslider'),$_smarty_tpl);?>
</h4>                 
                                        <img src="<?php echo $_smarty_tpl->tpl_vars['module_dir']->value;?>
uploads/thumbs/<?php echo $_smarty_tpl->tpl_vars['slide']->value['image'];?>
" />
                                        <div class="file_input">
                                          <input type="file" name="newImage" class="file"/>
                                          <div>
                  										      <span></span>
                  										      <input type="submit" value="<?php echo smartyTranslate(array('s'=>'Change image','mod'=>'pk_layeredslider'),$_smarty_tpl);?>
"/>
                  									      </div>
                                        </div>
                                      </div>           
                                      <?php if ($_smarty_tpl->tpl_vars['slider']->value['subImages'][$_smarty_tpl->tpl_vars['iso']->value][$_smarty_tpl->tpl_vars['slide']->value['id_slide']][0]!='') {?>
                                        <div style="overflow:hidden; width:100%">
                                          <?php  $_smarty_tpl->tpl_vars['imageName'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['imageName']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['slider']->value['subImages'][$_smarty_tpl->tpl_vars['iso']->value][$_smarty_tpl->tpl_vars['slide']->value['id_slide']]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['imageName']->key => $_smarty_tpl->tpl_vars['imageName']->value) {
$_smarty_tpl->tpl_vars['imageName']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['imageName']->key;
?>
                                          <h4><?php echo smartyTranslate(array('s'=>'Sub Image','mod'=>'pk_layeredslider'),$_smarty_tpl);?>
 0<?php echo $_smarty_tpl->tpl_vars['k']->value+1;?>
</h4>                 
                                              <div class="admin_img">
                                                <img src="<?php echo $_smarty_tpl->tpl_vars['module_dir']->value;?>
uploads/thumbs/<?php echo $_smarty_tpl->tpl_vars['imageName']->value;?>
" />
                                              </div>
                                              <div class="clear remove_subimage">
                                                <label><?php echo smartyTranslate(array('s'=>'Remove Image','mod'=>'pk_layeredslider'),$_smarty_tpl);?>
: </label>
                                                <input type="checkbox" name="remove_subimage_<?php echo $_smarty_tpl->tpl_vars['slide']->value['id_slide'];?>
_<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
" value="1" />
                                              </div>
                                              <div class="clear before">
                                                <h4><?php echo smartyTranslate(array('s'=>'Position before Showing','mod'=>'pk_layeredslider'),$_smarty_tpl);?>
:</h4>
                                                <div class="clmn col01">
                                                  <label><?php echo smartyTranslate(array('s'=>'Top','mod'=>'pk_layeredslider'),$_smarty_tpl);?>
: </label>
                                                  <input type="text" name="before-top_<?php echo $_smarty_tpl->tpl_vars['iso']->value;?>
_<?php echo $_smarty_tpl->tpl_vars['slide']->value['id_slide'];?>
_<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
" class="tooltip2" size="10" value="<?php echo $_smarty_tpl->tpl_vars['slider']->value['slideEffects'][$_smarty_tpl->tpl_vars['iso']->value][$_smarty_tpl->tpl_vars['slide']->value['id_slide']][$_smarty_tpl->tpl_vars['k']->value]['before']['top'];?>
" title="<?php echo smartyTranslate(array('s'=>'This is top position in % of image before it will be shown','mod'=>'pk_layeredslider'),$_smarty_tpl);?>
" /> 
                                                </div>
                                                <div class="clmn col02">
                                                  <label><?php echo smartyTranslate(array('s'=>'Left','mod'=>'pk_layeredslider'),$_smarty_tpl);?>
: </label>
                                                  <input type="text" name="before-left_<?php echo $_smarty_tpl->tpl_vars['iso']->value;?>
_<?php echo $_smarty_tpl->tpl_vars['slide']->value['id_slide'];?>
_<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
" class="tooltip2" size="10" value="<?php echo $_smarty_tpl->tpl_vars['slider']->value['slideEffects'][$_smarty_tpl->tpl_vars['iso']->value][$_smarty_tpl->tpl_vars['slide']->value['id_slide']][$_smarty_tpl->tpl_vars['k']->value]['before']['left'];?>
" title="<?php echo smartyTranslate(array('s'=>'This is left position in % of image before it will be shown','mod'=>'pk_layeredslider'),$_smarty_tpl);?>
" />
                                                </div>
                                                <div class="clmn col03">
                                                  <label><?php echo smartyTranslate(array('s'=>'Duration','mod'=>'pk_layeredslider'),$_smarty_tpl);?>
: </label>
                                                  <input type="text" name="before-duration_<?php echo $_smarty_tpl->tpl_vars['iso']->value;?>
_<?php echo $_smarty_tpl->tpl_vars['slide']->value['id_slide'];?>
_<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
" class="tooltip2" size="10" value="<?php echo $_smarty_tpl->tpl_vars['slider']->value['slideEffects'][$_smarty_tpl->tpl_vars['iso']->value][$_smarty_tpl->tpl_vars['slide']->value['id_slide']][$_smarty_tpl->tpl_vars['k']->value]['before']['duration'];?>
" title="<?php echo smartyTranslate(array('s'=>'This is a time in seconds what will take animation before this image will be shown','mod'=>'pk_layeredslider'),$_smarty_tpl);?>
" /> 
                                                </div>
                                                <div class="clmn col04">
                                                  <label><?php echo smartyTranslate(array('s'=>'Rotation','mod'=>'pk_layeredslider'),$_smarty_tpl);?>
: </label>
                                                  <input type="text" name="before-rotation_<?php echo $_smarty_tpl->tpl_vars['iso']->value;?>
_<?php echo $_smarty_tpl->tpl_vars['slide']->value['id_slide'];?>
_<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
" class="tooltip2" size="10" value="<?php echo $_smarty_tpl->tpl_vars['slider']->value['slideEffects'][$_smarty_tpl->tpl_vars['iso']->value][$_smarty_tpl->tpl_vars['slide']->value['id_slide']][$_smarty_tpl->tpl_vars['k']->value]['before']['rotation'];?>
" title="<?php echo smartyTranslate(array('s'=>'This is a rotation angle in degrees of image before it will be shown','mod'=>'pk_layeredslider'),$_smarty_tpl);?>
" /> 
                                                </div>
                                                <div class="clmn col05">
                                                  <label><?php echo smartyTranslate(array('s'=>'Opacity','mod'=>'pk_layeredslider'),$_smarty_tpl);?>
: </label>
                                                  <input type="text" name="before-opacity_<?php echo $_smarty_tpl->tpl_vars['iso']->value;?>
_<?php echo $_smarty_tpl->tpl_vars['slide']->value['id_slide'];?>
_<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
" class="tooltip2" size="10" value="<?php echo $_smarty_tpl->tpl_vars['slider']->value['slideEffects'][$_smarty_tpl->tpl_vars['iso']->value][$_smarty_tpl->tpl_vars['slide']->value['id_slide']][$_smarty_tpl->tpl_vars['k']->value]['before']['opacity'];?>
" title="<?php echo smartyTranslate(array('s'=>'This is a opacity in % of image before it will be shown','mod'=>'pk_layeredslider'),$_smarty_tpl);?>
" /> 
                                                </div>
                                              </div>
                                              <div class="clear on">
                                                <h4><?php echo smartyTranslate(array('s'=>'Position on Showing','mod'=>'pk_layeredslider'),$_smarty_tpl);?>
:</h4>
                                                <div class="clmn col01">
                                                  <label><?php echo smartyTranslate(array('s'=>'Top','mod'=>'pk_layeredslider'),$_smarty_tpl);?>
: </label>
                                                  <input type="text" name="on-top_<?php echo $_smarty_tpl->tpl_vars['iso']->value;?>
_<?php echo $_smarty_tpl->tpl_vars['slide']->value['id_slide'];?>
_<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
" class="tooltip2" size="10" value="<?php echo $_smarty_tpl->tpl_vars['slider']->value['slideEffects'][$_smarty_tpl->tpl_vars['iso']->value][$_smarty_tpl->tpl_vars['slide']->value['id_slide']][$_smarty_tpl->tpl_vars['k']->value]['in']['top'];?>
" title="<?php echo smartyTranslate(array('s'=>'This is top position in % of image when it will be shown','mod'=>'pk_layeredslider'),$_smarty_tpl);?>
" /> 
                                                </div>
                                                <div class="clmn col02">
                                                  <label><?php echo smartyTranslate(array('s'=>'Left','mod'=>'pk_layeredslider'),$_smarty_tpl);?>
: </label>
                                                  <input type="text" name="on-left_<?php echo $_smarty_tpl->tpl_vars['iso']->value;?>
_<?php echo $_smarty_tpl->tpl_vars['slide']->value['id_slide'];?>
_<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
" class="tooltip2" size="10" value="<?php echo $_smarty_tpl->tpl_vars['slider']->value['slideEffects'][$_smarty_tpl->tpl_vars['iso']->value][$_smarty_tpl->tpl_vars['slide']->value['id_slide']][$_smarty_tpl->tpl_vars['k']->value]['in']['left'];?>
" title="<?php echo smartyTranslate(array('s'=>'This is left position in % of image when it will be shown','mod'=>'pk_layeredslider'),$_smarty_tpl);?>
" /> 
                                                </div>
                                                <div class="clmn col03">
                                                  <label><?php echo smartyTranslate(array('s'=>'Duration','mod'=>'pk_layeredslider'),$_smarty_tpl);?>
: </label>
                                                  <input type="text" name="on-duration_<?php echo $_smarty_tpl->tpl_vars['iso']->value;?>
_<?php echo $_smarty_tpl->tpl_vars['slide']->value['id_slide'];?>
_<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
" class="tooltip2" size="10" value="<?php echo $_smarty_tpl->tpl_vars['slider']->value['slideEffects'][$_smarty_tpl->tpl_vars['iso']->value][$_smarty_tpl->tpl_vars['slide']->value['id_slide']][$_smarty_tpl->tpl_vars['k']->value]['in']['duration'];?>
" title="<?php echo smartyTranslate(array('s'=>'This is a time in seconds what will take animation when this image will be shown','mod'=>'pk_layeredslider'),$_smarty_tpl);?>
" /> 
                                                </div>
                                                <div class="clmn col04">
                                                  <label><?php echo smartyTranslate(array('s'=>'Rotation','mod'=>'pk_layeredslider'),$_smarty_tpl);?>
: </label>
                                                  <input type="text" name="on-rotation_<?php echo $_smarty_tpl->tpl_vars['iso']->value;?>
_<?php echo $_smarty_tpl->tpl_vars['slide']->value['id_slide'];?>
_<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
" class="tooltip2" size="10" value="<?php echo $_smarty_tpl->tpl_vars['slider']->value['slideEffects'][$_smarty_tpl->tpl_vars['iso']->value][$_smarty_tpl->tpl_vars['slide']->value['id_slide']][$_smarty_tpl->tpl_vars['k']->value]['in']['rotation'];?>
" title="<?php echo smartyTranslate(array('s'=>'This is a rotation angle in degrees of image when it will be shown','mod'=>'pk_layeredslider'),$_smarty_tpl);?>
" /> 
                                                </div>
                                                <div class="clmn col05">
                                                  <label><?php echo smartyTranslate(array('s'=>'Opacity','mod'=>'pk_layeredslider'),$_smarty_tpl);?>
: </label>
                                                  <input type="text" name="on-opacity_<?php echo $_smarty_tpl->tpl_vars['iso']->value;?>
_<?php echo $_smarty_tpl->tpl_vars['slide']->value['id_slide'];?>
_<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
" class="tooltip2" size="10" value="<?php echo $_smarty_tpl->tpl_vars['slider']->value['slideEffects'][$_smarty_tpl->tpl_vars['iso']->value][$_smarty_tpl->tpl_vars['slide']->value['id_slide']][$_smarty_tpl->tpl_vars['k']->value]['in']['opacity'];?>
" title="<?php echo smartyTranslate(array('s'=>'This is a opacity in % of image when it will be shown','mod'=>'pk_layeredslider'),$_smarty_tpl);?>
" /> 
                                                </div>
                                              </div>
                                              <div class="clear after">
                                                <h4><?php echo smartyTranslate(array('s'=>'Position after Showing','mod'=>'pk_layeredslider'),$_smarty_tpl);?>
:</h4>
                                                <div class="clmn col01">
                                                  <label><?php echo smartyTranslate(array('s'=>'Top','mod'=>'pk_layeredslider'),$_smarty_tpl);?>
: </label>
                                                  <input type="text" name="after-top_<?php echo $_smarty_tpl->tpl_vars['iso']->value;?>
_<?php echo $_smarty_tpl->tpl_vars['slide']->value['id_slide'];?>
_<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
" class="tooltip2" size="10" value="<?php echo $_smarty_tpl->tpl_vars['slider']->value['slideEffects'][$_smarty_tpl->tpl_vars['iso']->value][$_smarty_tpl->tpl_vars['slide']->value['id_slide']][$_smarty_tpl->tpl_vars['k']->value]['after']['top'];?>
" title="<?php echo smartyTranslate(array('s'=>'This is top position in % of image after it will be shown','mod'=>'pk_layeredslider'),$_smarty_tpl);?>
" /> 
                                                </div>
                                                <div class="clmn col02">
                                                  <label><?php echo smartyTranslate(array('s'=>'Left','mod'=>'pk_layeredslider'),$_smarty_tpl);?>
: </label>
                                                  <input type="text" name="after-left_<?php echo $_smarty_tpl->tpl_vars['iso']->value;?>
_<?php echo $_smarty_tpl->tpl_vars['slide']->value['id_slide'];?>
_<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
" class="tooltip2" size="10" value="<?php echo $_smarty_tpl->tpl_vars['slider']->value['slideEffects'][$_smarty_tpl->tpl_vars['iso']->value][$_smarty_tpl->tpl_vars['slide']->value['id_slide']][$_smarty_tpl->tpl_vars['k']->value]['after']['left'];?>
" title="<?php echo smartyTranslate(array('s'=>'This is left position in % of image after it will be shown','mod'=>'pk_layeredslider'),$_smarty_tpl);?>
" /> 
                                                </div>
                                                <div class="clmn col03">
                                                  <label><?php echo smartyTranslate(array('s'=>'Duration','mod'=>'pk_layeredslider'),$_smarty_tpl);?>
: </label>
                                                  <input type="text" name="after-duration_<?php echo $_smarty_tpl->tpl_vars['iso']->value;?>
_<?php echo $_smarty_tpl->tpl_vars['slide']->value['id_slide'];?>
_<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
" class="tooltip2" size="10" value="<?php echo $_smarty_tpl->tpl_vars['slider']->value['slideEffects'][$_smarty_tpl->tpl_vars['iso']->value][$_smarty_tpl->tpl_vars['slide']->value['id_slide']][$_smarty_tpl->tpl_vars['k']->value]['after']['duration'];?>
" title="<?php echo smartyTranslate(array('s'=>'This is a time in seconds what will take animation after this image will be shown','mod'=>'pk_layeredslider'),$_smarty_tpl);?>
" /> 
                                                </div>
                                                <div class="clmn col04">
                                                  <label><?php echo smartyTranslate(array('s'=>'Rotation','mod'=>'pk_layeredslider'),$_smarty_tpl);?>
: </label>
                                                  <input type="text" name="after-rotation_<?php echo $_smarty_tpl->tpl_vars['iso']->value;?>
_<?php echo $_smarty_tpl->tpl_vars['slide']->value['id_slide'];?>
_<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
" class="tooltip2" size="10" value="<?php echo $_smarty_tpl->tpl_vars['slider']->value['slideEffects'][$_smarty_tpl->tpl_vars['iso']->value][$_smarty_tpl->tpl_vars['slide']->value['id_slide']][$_smarty_tpl->tpl_vars['k']->value]['after']['rotation'];?>
" title="<?php echo smartyTranslate(array('s'=>'This is a rotation angle in degrees of image after it will be shown','mod'=>'pk_layeredslider'),$_smarty_tpl);?>
" /> 
                                                </div>
                                                <div class="clmn col05">
                                                  <label><?php echo smartyTranslate(array('s'=>'Opacity','mod'=>'pk_layeredslider'),$_smarty_tpl);?>
: </label>
                                                  <input type="text" name="after-opacity_<?php echo $_smarty_tpl->tpl_vars['iso']->value;?>
_<?php echo $_smarty_tpl->tpl_vars['slide']->value['id_slide'];?>
_<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
" class="tooltip2" size="10" value="<?php echo $_smarty_tpl->tpl_vars['slider']->value['slideEffects'][$_smarty_tpl->tpl_vars['iso']->value][$_smarty_tpl->tpl_vars['slide']->value['id_slide']][$_smarty_tpl->tpl_vars['k']->value]['after']['opacity'];?>
" title="<?php echo smartyTranslate(array('s'=>'This is a opacity in percentage of image after it will be shown','mod'=>'pk_layeredslider'),$_smarty_tpl);?>
" /> 
                                                </div>
                                              </div>
                                          <?php } ?>
                                            <div class="file_input">
                                              <input type="file" name="subimage" class="file"/>
                                              <div>
                                                <span></span>
                                                <input type="submit" value="<?php echo smartyTranslate(array('s'=>'Add image','mod'=>'pk_layeredslider'),$_smarty_tpl);?>
"/>
                                              </div>
                                            </div>
                                        </div>
                                      <?php } else { ?>
                                        <div class="file_input">
                                          <input type="file" name="subimage" class="file"/>
                                          <div>
                                            <span></span>
                                            <input type="submit" value="<?php echo smartyTranslate(array('s'=>'Add image','mod'=>'pk_layeredslider'),$_smarty_tpl);?>
"/>
                                          </div>
                                        </div>
                                      <?php }?>                                      
                                  </div>
                                  <div class="form_cont">
                                      <div class="title input">
                                          <label><?php echo smartyTranslate(array('s'=>'Title','mod'=>'pk_layeredslider'),$_smarty_tpl);?>
: </label>
                                          <input type="text" name="title" class="tooltip2" size="41" value="<?php echo $_smarty_tpl->tpl_vars['slide']->value['title'];?>
" title="<?php echo smartyTranslate(array('s'=>'This will be the title on the slide.','mod'=>'pk_layeredslider'),$_smarty_tpl);?>
" /> 
                                      </div>
                                      <div class="url input">
                                      	<label><?php echo smartyTranslate(array('s'=>'Url','mod'=>'pk_layeredslider'),$_smarty_tpl);?>
: </label>
                                      	<input type="text" name="url" class="tooltip2" size="41" value="<?php echo $_smarty_tpl->tpl_vars['slide']->value['url'];?>
" title="<?php echo smartyTranslate(array('s'=>'ex. http://myshop.com/promotions','mod'=>'pk_layeredslider'),$_smarty_tpl);?>
" />           
                                      </div>
                                      <div class="target">
                                          <label><?php echo smartyTranslate(array('s'=>'Blank target','mod'=>'pk_layeredslider'),$_smarty_tpl);?>
: </label>
                                          <input type="checkbox" name="target" class="tooltip2" value="1" <?php if ($_smarty_tpl->tpl_vars['slide']->value['target']==1) {?>checked="true"<?php }?> title="<?php echo smartyTranslate(array('s'=>'Check this if you want to open the link in new window.','mod'=>'pk_layeredslider'),$_smarty_tpl);?>
" />
                                      </div>
                                      <div class="alt input">
                                          <label><?php echo smartyTranslate(array('s'=>'Image alt','mod'=>'pk_layeredslider'),$_smarty_tpl);?>
: </label>
                                          <input type="text" name="alt" class="tooltip2" size="41" value="<?php echo $_smarty_tpl->tpl_vars['slide']->value['alt'];?>
" title="<?php echo smartyTranslate(array('s'=>'The image alt, alternate text for the image','mod'=>'pk_layeredslider'),$_smarty_tpl);?>
" />
                                      </div>
                                      <div class="caption"> 
                                      	<label><?php echo smartyTranslate(array('s'=>'Caption','mod'=>'pk_layeredslider'),$_smarty_tpl);?>
: </label>
                                      	<textarea type="text" name="caption" class="tooltip2" cols="40" rows="6" title="<?php echo smartyTranslate(array('s'=>'Be carefull, too long text isnt good and HTML is not allowed.','mod'=>'pk_layeredslider'),$_smarty_tpl);?>
" ><?php echo $_smarty_tpl->tpl_vars['slide']->value['caption'];?>
</textarea>                      
                                      </div>
                                      <div style="overflow:hidden">
                                        <h4><?php echo smartyTranslate(array('s'=>'Text Section Width','mod'=>'pk_layeredslider'),$_smarty_tpl);?>
</h4> 
                                        <div class="text-section_width three_column"> 
                                          <input type="text" name="text_section_width_<?php echo $_smarty_tpl->tpl_vars['iso']->value;?>
_<?php echo $_smarty_tpl->tpl_vars['slide']->value['id_slide'];?>
" class="tooltip2" size="41" value="<?php echo $_smarty_tpl->tpl_vars['slider']->value['text_width'][$_smarty_tpl->tpl_vars['iso']->value][$_smarty_tpl->tpl_vars['slide']->value['id_slide']];?>
" title="<?php echo smartyTranslate(array('s'=>'The width of section where slide test placed','mod'=>'pk_layeredslider'),$_smarty_tpl);?>
" />
                                        </div>
                                        <div class="clearfix"></div>
                                        <div class="clear before">
                                        <h4><?php echo smartyTranslate(array('s'=>'Text Position before Showing','mod'=>'pk_layeredslider'),$_smarty_tpl);?>
:</h4>
                                        <div class="clmn col01">
                                          <label><?php echo smartyTranslate(array('s'=>'Top','mod'=>'pk_layeredslider'),$_smarty_tpl);?>
: </label>
                                          <input type="text" name="text-before-top_<?php echo $_smarty_tpl->tpl_vars['iso']->value;?>
_<?php echo $_smarty_tpl->tpl_vars['slide']->value['id_slide'];?>
" class="tooltip2" size="10" value="<?php echo $_smarty_tpl->tpl_vars['slider']->value['slidesText'][$_smarty_tpl->tpl_vars['iso']->value][$_smarty_tpl->tpl_vars['slide']->value['id_slide']]['before']['top'];?>
" title="<?php echo smartyTranslate(array('s'=>'This is top position in % of text before it will be shown','mod'=>'pk_layeredslider'),$_smarty_tpl);?>
" /> 
                                        </div>
                                        <div class="clmn col02">
                                          <label><?php echo smartyTranslate(array('s'=>'Left','mod'=>'pk_layeredslider'),$_smarty_tpl);?>
: </label>
                                          <input type="text" name="text-before-left_<?php echo $_smarty_tpl->tpl_vars['iso']->value;?>
_<?php echo $_smarty_tpl->tpl_vars['slide']->value['id_slide'];?>
" class="tooltip2" size="10" value="<?php echo $_smarty_tpl->tpl_vars['slider']->value['slidesText'][$_smarty_tpl->tpl_vars['iso']->value][$_smarty_tpl->tpl_vars['slide']->value['id_slide']]['before']['left'];?>
" title="<?php echo smartyTranslate(array('s'=>'This is left position in % of text before it will be shown','mod'=>'pk_layeredslider'),$_smarty_tpl);?>
" /> 
                                        </div>
                                        <div class="clmn col03">
                                          <label><?php echo smartyTranslate(array('s'=>'Duration','mod'=>'pk_layeredslider'),$_smarty_tpl);?>
: </label>
                                          <input type="text" name="text-before-duration_<?php echo $_smarty_tpl->tpl_vars['iso']->value;?>
_<?php echo $_smarty_tpl->tpl_vars['slide']->value['id_slide'];?>
" class="tooltip2" size="10" value="<?php echo $_smarty_tpl->tpl_vars['slider']->value['slidesText'][$_smarty_tpl->tpl_vars['iso']->value][$_smarty_tpl->tpl_vars['slide']->value['id_slide']]['before']['duration'];?>
" title="<?php echo smartyTranslate(array('s'=>'This is a time in seconds what will take animation before this text will be shown','mod'=>'pk_layeredslider'),$_smarty_tpl);?>
" />                                         
                                        </div>
                                        <div class="clmn col04">
                                          <label><?php echo smartyTranslate(array('s'=>'Rotation','mod'=>'pk_layeredslider'),$_smarty_tpl);?>
: </label>
                                          <input type="text" name="text-before-rotation_<?php echo $_smarty_tpl->tpl_vars['iso']->value;?>
_<?php echo $_smarty_tpl->tpl_vars['slide']->value['id_slide'];?>
" class="tooltip2" size="10" value="<?php echo $_smarty_tpl->tpl_vars['slider']->value['slidesText'][$_smarty_tpl->tpl_vars['iso']->value][$_smarty_tpl->tpl_vars['slide']->value['id_slide']]['before']['rotation'];?>
" title="<?php echo smartyTranslate(array('s'=>'This is a rotation angle in degrees of text before it will be shown','mod'=>'pk_layeredslider'),$_smarty_tpl);?>
" /> 
                                        </div>
                                        <div class="clmn col05">
                                          <label><?php echo smartyTranslate(array('s'=>'Opacity','mod'=>'pk_layeredslider'),$_smarty_tpl);?>
: </label>
                                          <input type="text" name="text-before-opacity_<?php echo $_smarty_tpl->tpl_vars['iso']->value;?>
_<?php echo $_smarty_tpl->tpl_vars['slide']->value['id_slide'];?>
" class="tooltip2" size="10" value="<?php echo $_smarty_tpl->tpl_vars['slider']->value['slidesText'][$_smarty_tpl->tpl_vars['iso']->value][$_smarty_tpl->tpl_vars['slide']->value['id_slide']]['before']['opacity'];?>
" title="<?php echo smartyTranslate(array('s'=>'This is a opacity in % of text before it will be shown','mod'=>'pk_layeredslider'),$_smarty_tpl);?>
" /> 
                                        </div>
                                      </div>
                                      <div class="clear on">
                                        <h4><?php echo smartyTranslate(array('s'=>'Text Position on Showing','mod'=>'pk_layeredslider'),$_smarty_tpl);?>
:</h4>
                                        <div class="clmn col01">
                                          <label><?php echo smartyTranslate(array('s'=>'Top','mod'=>'pk_layeredslider'),$_smarty_tpl);?>
: </label>
                                          <input type="text" name="text-on-top_<?php echo $_smarty_tpl->tpl_vars['iso']->value;?>
_<?php echo $_smarty_tpl->tpl_vars['slide']->value['id_slide'];?>
" class="tooltip2" size="10" value="<?php echo $_smarty_tpl->tpl_vars['slider']->value['slidesText'][$_smarty_tpl->tpl_vars['iso']->value][$_smarty_tpl->tpl_vars['slide']->value['id_slide']]['in']['top'];?>
" title="<?php echo smartyTranslate(array('s'=>'This is top position of text in % when it will be shown','mod'=>'pk_layeredslider'),$_smarty_tpl);?>
" /> 
                                        </div>
                                        <div class="clmn col02">
                                          <label><?php echo smartyTranslate(array('s'=>'Left','mod'=>'pk_layeredslider'),$_smarty_tpl);?>
: </label>
                                          <input type="text" name="text-on-left_<?php echo $_smarty_tpl->tpl_vars['iso']->value;?>
_<?php echo $_smarty_tpl->tpl_vars['slide']->value['id_slide'];?>
" class="tooltip2" size="10" value="<?php echo $_smarty_tpl->tpl_vars['slider']->value['slidesText'][$_smarty_tpl->tpl_vars['iso']->value][$_smarty_tpl->tpl_vars['slide']->value['id_slide']]['in']['left'];?>
" title="<?php echo smartyTranslate(array('s'=>'This is left position of text in % when it will be shown','mod'=>'pk_layeredslider'),$_smarty_tpl);?>
" /> 
                                        </div>
                                        <div class="clmn col03">
                                          <label><?php echo smartyTranslate(array('s'=>'Duration','mod'=>'pk_layeredslider'),$_smarty_tpl);?>
: </label>
                                          <input type="text" name="text-on-duration_<?php echo $_smarty_tpl->tpl_vars['iso']->value;?>
_<?php echo $_smarty_tpl->tpl_vars['slide']->value['id_slide'];?>
" class="tooltip2" size="10" value="<?php echo $_smarty_tpl->tpl_vars['slider']->value['slidesText'][$_smarty_tpl->tpl_vars['iso']->value][$_smarty_tpl->tpl_vars['slide']->value['id_slide']]['in']['duration'];?>
" title="<?php echo smartyTranslate(array('s'=>'This is a time in seconds what will take animation when this text will be shown','mod'=>'pk_layeredslider'),$_smarty_tpl);?>
" />                                         
                                        </div>
                                        <div class="clmn col04">
                                          <label><?php echo smartyTranslate(array('s'=>'Rotation','mod'=>'pk_layeredslider'),$_smarty_tpl);?>
: </label>
                                          <input type="text" name="text-on-rotation_<?php echo $_smarty_tpl->tpl_vars['iso']->value;?>
_<?php echo $_smarty_tpl->tpl_vars['slide']->value['id_slide'];?>
" class="tooltip2" size="10" value="<?php echo $_smarty_tpl->tpl_vars['slider']->value['slidesText'][$_smarty_tpl->tpl_vars['iso']->value][$_smarty_tpl->tpl_vars['slide']->value['id_slide']]['in']['rotation'];?>
" title="<?php echo smartyTranslate(array('s'=>'This is a rotation angle in degrees of text when it will be shown','mod'=>'pk_layeredslider'),$_smarty_tpl);?>
" /> 
                                        </div>
                                        <div class="clmn col05">
                                          <label><?php echo smartyTranslate(array('s'=>'Opacity','mod'=>'pk_layeredslider'),$_smarty_tpl);?>
: </label>
                                          <input type="text" name="text-on-opacity_<?php echo $_smarty_tpl->tpl_vars['iso']->value;?>
_<?php echo $_smarty_tpl->tpl_vars['slide']->value['id_slide'];?>
" class="tooltip2" size="10" value="<?php echo $_smarty_tpl->tpl_vars['slider']->value['slidesText'][$_smarty_tpl->tpl_vars['iso']->value][$_smarty_tpl->tpl_vars['slide']->value['id_slide']]['in']['opacity'];?>
" title="<?php echo smartyTranslate(array('s'=>'This is a opacity in % of text when it will be shown','mod'=>'pk_layeredslider'),$_smarty_tpl);?>
" /> 
                                        </div>
                                      </div>
                                      <div class="clear after">
                                        <h4><?php echo smartyTranslate(array('s'=>'Text Position after Showing','mod'=>'pk_layeredslider'),$_smarty_tpl);?>
:</h4>
                                        <div class="clmn col01">
                                          <label><?php echo smartyTranslate(array('s'=>'Top','mod'=>'pk_layeredslider'),$_smarty_tpl);?>
: </label>
                                          <input type="text" name="text-after-top_<?php echo $_smarty_tpl->tpl_vars['iso']->value;?>
_<?php echo $_smarty_tpl->tpl_vars['slide']->value['id_slide'];?>
" class="tooltip2" size="10" value="<?php echo $_smarty_tpl->tpl_vars['slider']->value['slidesText'][$_smarty_tpl->tpl_vars['iso']->value][$_smarty_tpl->tpl_vars['slide']->value['id_slide']]['after']['top'];?>
" title="<?php echo smartyTranslate(array('s'=>'This is top position of text in % after it will be shown','mod'=>'pk_layeredslider'),$_smarty_tpl);?>
" /> 
                                        </div>
                                        <div class="clmn col02">
                                          <label><?php echo smartyTranslate(array('s'=>'Left','mod'=>'pk_layeredslider'),$_smarty_tpl);?>
: </label>
                                          <input type="text" name="text-after-left_<?php echo $_smarty_tpl->tpl_vars['iso']->value;?>
_<?php echo $_smarty_tpl->tpl_vars['slide']->value['id_slide'];?>
" class="tooltip2" size="10" value="<?php echo $_smarty_tpl->tpl_vars['slider']->value['slidesText'][$_smarty_tpl->tpl_vars['iso']->value][$_smarty_tpl->tpl_vars['slide']->value['id_slide']]['after']['left'];?>
" title="<?php echo smartyTranslate(array('s'=>'This is left position of text after it will be shown','mod'=>'pk_layeredslider'),$_smarty_tpl);?>
" /> 
                                        </div>
                                        <div class="clmn col03">
                                          <label><?php echo smartyTranslate(array('s'=>'Duration','mod'=>'pk_layeredslider'),$_smarty_tpl);?>
: </label>
                                          <input type="text" name="text-after-duration_<?php echo $_smarty_tpl->tpl_vars['iso']->value;?>
_<?php echo $_smarty_tpl->tpl_vars['slide']->value['id_slide'];?>
" class="tooltip2" size="10" value="<?php echo $_smarty_tpl->tpl_vars['slider']->value['slidesText'][$_smarty_tpl->tpl_vars['iso']->value][$_smarty_tpl->tpl_vars['slide']->value['id_slide']]['after']['duration'];?>
" title="<?php echo smartyTranslate(array('s'=>'This is a time in seconds what will take animation after this text will be shown','mod'=>'pk_layeredslider'),$_smarty_tpl);?>
" />                                         
                                        </div>
                                        <div class="clmn col04">
                                          <label><?php echo smartyTranslate(array('s'=>'Rotation','mod'=>'pk_layeredslider'),$_smarty_tpl);?>
: </label>
                                          <input type="text" name="text-after-rotation_<?php echo $_smarty_tpl->tpl_vars['iso']->value;?>
_<?php echo $_smarty_tpl->tpl_vars['slide']->value['id_slide'];?>
" class="tooltip2" size="10" value="<?php echo $_smarty_tpl->tpl_vars['slider']->value['slidesText'][$_smarty_tpl->tpl_vars['iso']->value][$_smarty_tpl->tpl_vars['slide']->value['id_slide']]['after']['rotation'];?>
" title="<?php echo smartyTranslate(array('s'=>'This is a rotation angle in degrees of text after it will be shown','mod'=>'pk_layeredslider'),$_smarty_tpl);?>
" /> 
                                        </div>
                                        <div class="clmn col05">
                                          <label><?php echo smartyTranslate(array('s'=>'Opacity','mod'=>'pk_layeredslider'),$_smarty_tpl);?>
: </label>
                                          <input type="text" name="text-after-opacity_<?php echo $_smarty_tpl->tpl_vars['iso']->value;?>
_<?php echo $_smarty_tpl->tpl_vars['slide']->value['id_slide'];?>
" class="tooltip2" size="10" value="<?php echo $_smarty_tpl->tpl_vars['slider']->value['slidesText'][$_smarty_tpl->tpl_vars['iso']->value][$_smarty_tpl->tpl_vars['slide']->value['id_slide']]['after']['opacity'];?>
" title="<?php echo smartyTranslate(array('s'=>'This is a opacity in % of text after it will be shown','mod'=>'pk_layeredslider'),$_smarty_tpl);?>
" /> 
                                        </div>
                                      </div>
                                    </div>
                                      <div class="switch">
                                          <label><?php echo smartyTranslate(array('s'=>'Active','mod'=>'pk_layeredslider'),$_smarty_tpl);?>
: </label>
                  						<div class="field switch">
                  							<input type="radio" id="active-e" class="" name="isActive"  value="<?php echo $_smarty_tpl->tpl_vars['slide']->value['active'];?>
" checked="true" />
                  							<label for="r-keyboard-e" class="cb-enable <?php if ($_smarty_tpl->tpl_vars['slide']->value['active']==1) {?>selected<?php }?>" ><span>ON</span></label>
                  							<label for="r-keyboard-d" class="cb-disable <?php if ($_smarty_tpl->tpl_vars['slide']->value['active']==0) {?>selected<?php }?>" ><span>OFF</span></label>
                  						</div>
                                      </div>
                                  </div>     
                                  <div class="button_cont">
                                      <input type="hidden" name="slideId" value="<?php echo $_smarty_tpl->tpl_vars['slide']->value['id_slide'];?>
" />
                                      <input type="hidden" name="orderId" value="<?php echo $_smarty_tpl->tpl_vars['slide']->value['id_order'];?>
" />
                                      <input type="hidden" name="slideIso" value="<?php echo $_smarty_tpl->tpl_vars['slide']->value['lang_iso'];?>
" />
                                      <input type="hidden" name="oldImage" value="<?php echo $_smarty_tpl->tpl_vars['slide']->value['image'];?>
" />    
                                      <input type="submit" name="deleteSlide" value="<?php echo smartyTranslate(array('s'=>'Delete','mod'=>'pk_layeredslider'),$_smarty_tpl);?>
" id="delete-slide" class="red disabled" />   
                                      <input type="submit" name="editSlide" value="<?php echo smartyTranslate(array('s'=>'Update','mod'=>'pk_layeredslider'),$_smarty_tpl);?>
" id="update-slide" class="green" /><br/><br/>
                                      <?php echo smartyTranslate(array('s'=>'You can save all values to file'),$_smarty_tpl);?>
<br/> <?php echo smartyTranslate(array('s'=>'and restore if you will lose them.','mod'=>'pk_layeredslider'),$_smarty_tpl);?>
<br/><br/>
                                      <input type="submit" name="saveNumbers" value="<?php echo smartyTranslate(array('s'=>'Save Values','mod'=>'pk_layeredslider'),$_smarty_tpl);?>
" id="update-slide" class="green" />
                                      <input type="submit" name="loadNumbers" value="<?php echo smartyTranslate(array('s'=>'Restore','mod'=>'pk_layeredslider'),$_smarty_tpl);?>
" id="update-slide" class="green" />       
                                  </div>    
                            </form>
                        </div>  
                    </li>                 
              <?php } ?>    
          </ul>               
      <?php } ?>
    </div>  
    </div>
</fieldset><?php }} ?>
