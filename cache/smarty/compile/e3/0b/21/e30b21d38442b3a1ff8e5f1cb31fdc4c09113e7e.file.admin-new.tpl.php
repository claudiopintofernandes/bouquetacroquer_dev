<?php /* Smarty version Smarty-3.1.19, created on 2016-03-11 14:49:08
         compiled from "/srv/data/web/vhosts/www.bouquetacroquer.fr/htdocs/modules/pk_layeredslider/views/templates/admin/admin-new.tpl" */ ?>
<?php /*%%SmartyHeaderCode:206768203756e2ccd45185e0-44418531%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e30b21d38442b3a1ff8e5f1cb31fdc4c09113e7e' => 
    array (
      0 => '/srv/data/web/vhosts/www.bouquetacroquer.fr/htdocs/modules/pk_layeredslider/views/templates/admin/admin-new.tpl',
      1 => 1453301984,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '206768203756e2ccd45185e0-44418531',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'slider' => 0,
    'lang' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_56e2ccd4585c07_50890634',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56e2ccd4585c07_50890634')) {function content_56e2ccd4585c07_50890634($_smarty_tpl) {?>

<fieldset id="newSlide" class="hidden-div">
    <legend><?php echo smartyTranslate(array('s'=>'Add New Slide','mod'=>'pk_layeredslider'),$_smarty_tpl);?>
</legend> 
    <form method="post" action="<?php echo $_smarty_tpl->tpl_vars['slider']->value['postAction'];?>
" enctype="multipart/form-data">        
        <div id="new">
            <div class="title input">
                <label><?php echo smartyTranslate(array('s'=>'Title','mod'=>'pk_layeredslider'),$_smarty_tpl);?>
</label>
                <input type="text" name="title" size="41" class="ghost-text tooltip2" value="<?php echo smartyTranslate(array('s'=>'The title of the slide','mod'=>'pk_layeredslider'),$_smarty_tpl);?>
" title="<?php echo smartyTranslate(array('s'=>'This will be the title on the slide.','mod'=>'pk_layeredslider'),$_smarty_tpl);?>
" /> 
            </div>
            <div class="url input">
                <label><?php echo smartyTranslate(array('s'=>'Url','mod'=>'pk_layeredslider'),$_smarty_tpl);?>
</label>
                <input type="text" name="url" size="41" class="ghost-text tooltip2" value="<?php echo smartyTranslate(array('s'=>'Link of the slide','mod'=>'pk_layeredslider'),$_smarty_tpl);?>
" title="<?php echo smartyTranslate(array('s'=>'ex. http://myshop.com/promotions','mod'=>'pk_layeredslider'),$_smarty_tpl);?>
" />           
            </div>
            <div class="target">
                <label><?php echo smartyTranslate(array('s'=>'Blank target','mod'=>'pk_layeredslider'),$_smarty_tpl);?>
</label>
                <input type="checkbox" name="target" class="tooltip2" value="1" title="<?php echo smartyTranslate(array('s'=>'Check this if you want to open the link in new window.','mod'=>'pk_layeredslider'),$_smarty_tpl);?>
" />
            </div>
            <div class="image input">
                <label><?php echo smartyTranslate(array('s'=>'Image','mod'=>'pk_layeredslider'),$_smarty_tpl);?>
</label>
                <input type="file" name="image" size="29" id="image-chooser" class="tooltip2" title="<?php echo smartyTranslate(array('s'=>'Choose an image, only .jpg, .png, .gif are allowed.','mod'=>'pk_layeredslider'),$_smarty_tpl);?>
" />
            </div>
            <div class="imageName input">
                <label><?php echo smartyTranslate(array('s'=>'Image name','mod'=>'pk_layeredslider'),$_smarty_tpl);?>
</label>
                <input type="text" name="imageName" size="41" class="ghost-text tooltip2" value="<?php echo smartyTranslate(array('s'=>'Image name','mod'=>'pk_layeredslider'),$_smarty_tpl);?>
" title="<?php echo smartyTranslate(array('s'=>'Optional! The name of the uploaded image without extension. The white spaces will be replaces with underscore ( _ )','mod'=>'pk_layeredslider'),$_smarty_tpl);?>
" />           
            </div>
            <?php if ($_smarty_tpl->tpl_vars['slider']->value['options']['single']==1) {?>
                <div class="language">
                    <label><?php echo smartyTranslate(array('s'=>'Language','mod'=>'pk_layeredslider'),$_smarty_tpl);?>
</label>
                    <select name="language" class="tooltip2" title="<?php echo smartyTranslate(array('s'=>'The language of the slide.','mod'=>'pk_layeredslider'),$_smarty_tpl);?>
">
                        <?php  $_smarty_tpl->tpl_vars['lang'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['lang']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['slider']->value['lang']['all']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['lang']->key => $_smarty_tpl->tpl_vars['lang']->value) {
$_smarty_tpl->tpl_vars['lang']->_loop = true;
?>
                            <option value="<?php echo $_smarty_tpl->tpl_vars['lang']->value['id_lang'];?>
" <?php if ($_smarty_tpl->tpl_vars['lang']->value['id_lang']==$_smarty_tpl->tpl_vars['slider']->value['lang']['default']['id_lang']) {?>selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['lang']->value['name'];?>
</option>
                        <?php } ?>
                    </select>
                </div>
            <?php }?>
            <div class="alt input">
                <label><?php echo smartyTranslate(array('s'=>'Image alt','mod'=>'pk_layeredslider'),$_smarty_tpl);?>
</label>
                <input type="text" name="alt" size="41" class="ghost-text tooltip2" value="<?php echo smartyTranslate(array('s'=>'An alternate text for the image','mod'=>'pk_layeredslider'),$_smarty_tpl);?>
" title="<?php echo smartyTranslate(array('s'=>'The image alt, alternate text for the image','mod'=>'pk_layeredslider'),$_smarty_tpl);?>
" />
            </div>
            <div class="caption"> 
                <label><?php echo smartyTranslate(array('s'=>'Caption','mod'=>'pk_layeredslider'),$_smarty_tpl);?>
</label>
                <textarea type="text" name="caption" cols=40 rows=6 class="ghost-text tooltip2" title="<?php echo smartyTranslate(array('s'=>'Be carefull, too long text isnt good and FULL HTML is allowed.','mod'=>'pk_layeredslider'),$_smarty_tpl);?>
"><?php echo smartyTranslate(array('s'=>'The slide text','mod'=>'pk_layeredslider'),$_smarty_tpl);?>
</textarea>                      
            </div>
            <div class="button_cont">
                <input type="submit" name="submitNewSlide" value="<?php echo smartyTranslate(array('s'=>'Add Slide','mod'=>'pk_layeredslider'),$_smarty_tpl);?>
" class="green large" />
                <?php if ($_smarty_tpl->tpl_vars['slider']->value['options']['single']==0) {?>
                    <input type="hidden" name="language" value="<?php echo $_smarty_tpl->tpl_vars['slider']->value['lang']['default']['id_lang'];?>
" />
                <?php }?>
            </div> 
        </div> 
        <div class="comments"> 
           
        </div>
    </form>
</fieldset><?php }} ?>
