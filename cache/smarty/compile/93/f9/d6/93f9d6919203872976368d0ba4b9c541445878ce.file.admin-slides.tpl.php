<?php /* Smarty version Smarty-3.1.19, created on 2016-03-14 17:18:56
         compiled from "/srv/data/web/vhosts/www.bouquetacroquer.fr/htdocs/modules/pk_smallslider/views/templates/admin/admin-slides.tpl" */ ?>
<?php /*%%SmartyHeaderCode:36987682256e6e470d422c9-90891875%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '93f9d6919203872976368d0ba4b9c541445878ce' => 
    array (
      0 => '/srv/data/web/vhosts/www.bouquetacroquer.fr/htdocs/modules/pk_smallslider/views/templates/admin/admin-slides.tpl',
      1 => 1453302033,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '36987682256e6e470d422c9-90891875',
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
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_56e6e470e06433_68352619',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56e6e470e06433_68352619')) {function content_56e6e470e06433_68352619($_smarty_tpl) {?>

<fieldset id="list_slide" class="">
    <legend><?php echo smartyTranslate(array('s'=>'Slides'),$_smarty_tpl);?>
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
        <span class="order"><?php echo smartyTranslate(array('s'=>"Order"),$_smarty_tpl);?>
</span>
        <span class="title"><?php echo smartyTranslate(array('s'=>"Title"),$_smarty_tpl);?>
</span>
        <span class="active"><?php echo smartyTranslate(array('s'=>"Active"),$_smarty_tpl);?>
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
                            <span class="title"><?php echo $_smarty_tpl->tpl_vars['slide']->value['title'];?>
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
                                      <img src="<?php echo $_smarty_tpl->tpl_vars['module_dir']->value;?>
uploads/thumbs/admin_<?php echo $_smarty_tpl->tpl_vars['slide']->value['image'];?>
" />
                                      <div class="file_input">
                                          <input type="file" name="newImage" class="file"/>
                                          <div>
										      <span></span>
										      <input type="submit" value="<?php echo smartyTranslate(array('s'=>'Change image'),$_smarty_tpl);?>
"/>
									      </div>
                                      </div>
                                  </div>
                                  <div class="form_cont">
                                      <div class="title input">
                                          <label><?php echo smartyTranslate(array('s'=>'Title'),$_smarty_tpl);?>
: </label>
                                          <input type="text" name="title" class="tooltip2" size="41" value="<?php echo $_smarty_tpl->tpl_vars['slide']->value['title'];?>
" title="<?php echo smartyTranslate(array('s'=>'This will be the title on the slide.'),$_smarty_tpl);?>
" /> 
                                      </div>
                                      <div class="url input">
                                      	<label><?php echo smartyTranslate(array('s'=>'Url'),$_smarty_tpl);?>
: </label>
                                      	<input type="text" name="url" class="tooltip2" size="41" value="<?php echo $_smarty_tpl->tpl_vars['slide']->value['url'];?>
" title="<?php echo smartyTranslate(array('s'=>'ex. http://myshop.com/promotions'),$_smarty_tpl);?>
" />           
                                      </div>
                                      <div class="target">
                                          <label><?php echo smartyTranslate(array('s'=>'Blank target'),$_smarty_tpl);?>
: </label>
                                          <input type="checkbox" name="target" class="tooltip2" value="1" <?php if ($_smarty_tpl->tpl_vars['slide']->value['target']==1) {?>checked="true"<?php }?> title="<?php echo smartyTranslate(array('s'=>'Check this if you want to open the link in new window.'),$_smarty_tpl);?>
" />
                                      </div>
                                      <div class="alt input">
                                          <label><?php echo smartyTranslate(array('s'=>'Image alt'),$_smarty_tpl);?>
: </label>
                                          <input type="text" name="alt" class="tooltip2" size="41" value="<?php echo $_smarty_tpl->tpl_vars['slide']->value['alt'];?>
" title="<?php echo smartyTranslate(array('s'=>'The image alt, alternate text for the image'),$_smarty_tpl);?>
" />
                                      </div>
                                      
                                      <div class="switch">
                                          <label><?php echo smartyTranslate(array('s'=>'Active'),$_smarty_tpl);?>
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
                                      <input type="submit" name="deleteSlide" value="<?php echo smartyTranslate(array('s'=>'Delete'),$_smarty_tpl);?>
" id="delete-slide" class="red disabled" />   
                                      <input type="submit" name="editSlide" value="<?php echo smartyTranslate(array('s'=>'Update'),$_smarty_tpl);?>
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
