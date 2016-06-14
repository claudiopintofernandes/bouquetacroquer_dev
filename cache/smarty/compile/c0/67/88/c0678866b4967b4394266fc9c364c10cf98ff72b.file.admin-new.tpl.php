<?php /* Smarty version Smarty-3.1.19, created on 2016-03-14 17:18:56
         compiled from "/srv/data/web/vhosts/www.bouquetacroquer.fr/htdocs/modules/pk_smallslider/views/templates/admin/admin-new.tpl" */ ?>
<?php /*%%SmartyHeaderCode:201704985556e6e470c58c57-70784103%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c0678866b4967b4394266fc9c364c10cf98ff72b' => 
    array (
      0 => '/srv/data/web/vhosts/www.bouquetacroquer.fr/htdocs/modules/pk_smallslider/views/templates/admin/admin-new.tpl',
      1 => 1453302033,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '201704985556e6e470c58c57-70784103',
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
  'unifunc' => 'content_56e6e470ce1840_51165001',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56e6e470ce1840_51165001')) {function content_56e6e470ce1840_51165001($_smarty_tpl) {?>

<fieldset id="newSlide" class="hidden-div">
    <legend><?php echo smartyTranslate(array('s'=>'Add New Slide'),$_smarty_tpl);?>
</legend> 
    <form method="post" action="<?php echo $_smarty_tpl->tpl_vars['slider']->value['postAction'];?>
" enctype="multipart/form-data">        
        <div id="new">
            <div class="title input">
                <label><?php echo smartyTranslate(array('s'=>'Title'),$_smarty_tpl);?>
</label>
                <input type="text" name="title" size="41" class="ghost-text tooltip2" value="<?php echo smartyTranslate(array('s'=>'The title of the slide'),$_smarty_tpl);?>
" title="<?php echo smartyTranslate(array('s'=>'This will be the title on the slide.'),$_smarty_tpl);?>
" /> 
            </div>
            <div class="url input">
                <label><?php echo smartyTranslate(array('s'=>'Url'),$_smarty_tpl);?>
</label>
                <input type="text" name="url" size="41" class="ghost-text tooltip2" value="<?php echo smartyTranslate(array('s'=>'Link of the slide'),$_smarty_tpl);?>
" title="<?php echo smartyTranslate(array('s'=>'ex. http://myshop.com/promotions'),$_smarty_tpl);?>
" />           
            </div>
            <div class="target">
                <label><?php echo smartyTranslate(array('s'=>'Blank target'),$_smarty_tpl);?>
</label>
                <input type="checkbox" name="target" class="tooltip2" value="1" title="<?php echo smartyTranslate(array('s'=>'Check this if you want to open the link in new window.'),$_smarty_tpl);?>
" />
            </div>
            <div class="image input">
                <label><?php echo smartyTranslate(array('s'=>'Image'),$_smarty_tpl);?>
</label>
                <input type="file" name="image" size="29" id="image-chooser" class="tooltip2" title="<?php echo smartyTranslate(array('s'=>'Choose an image, only .jpg, .png, .gif are allowed.'),$_smarty_tpl);?>
" />
            </div>
            <div class="imageName input">
                <label><?php echo smartyTranslate(array('s'=>'Image name'),$_smarty_tpl);?>
</label>
                <input type="text" name="imageName" size="41" class="ghost-text tooltip2" value="<?php echo smartyTranslate(array('s'=>'Image name'),$_smarty_tpl);?>
" title="<?php echo smartyTranslate(array('s'=>'Optional! The name of the uploaded image without extension. The white spaces will be replaces with underscore ( _ )'),$_smarty_tpl);?>
" />           
            </div>
            <?php if ($_smarty_tpl->tpl_vars['slider']->value['options']['single']==1) {?>
                <div class="language">
                    <label><?php echo smartyTranslate(array('s'=>'Language'),$_smarty_tpl);?>
</label>
                    <select name="language" class="tooltip2" title="<?php echo smartyTranslate(array('s'=>'The language of the slide.'),$_smarty_tpl);?>
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
                <label><?php echo smartyTranslate(array('s'=>'Image alt'),$_smarty_tpl);?>
</label>
                <input type="text" name="alt" size="41" class="ghost-text tooltip2" value="<?php echo smartyTranslate(array('s'=>'An alternate text for the image'),$_smarty_tpl);?>
" title="<?php echo smartyTranslate(array('s'=>'The image alt, alternate text for the image'),$_smarty_tpl);?>
" />
            </div>
            <!--<div class="caption"> 
                <label><?php echo smartyTranslate(array('s'=>'Caption'),$_smarty_tpl);?>
</label>
                <textarea type="text" name="caption" cols=40 rows=6 class="ghost-text tooltip2" title="<?php echo smartyTranslate(array('s'=>'Be carefull, too long text isnt good and FULL HTML is allowed.'),$_smarty_tpl);?>
"><?php echo smartyTranslate(array('s'=>'The slide text'),$_smarty_tpl);?>
</textarea>                      
            </div>-->
            <div class="button_cont">
                <input type="submit" name="submitNewSlide" value="<?php echo smartyTranslate(array('s'=>'Add Slide'),$_smarty_tpl);?>
" class="green large" />
                <?php if ($_smarty_tpl->tpl_vars['slider']->value['options']['single']==0) {?>
                    <input type="hidden" name="language" value="<?php echo $_smarty_tpl->tpl_vars['slider']->value['lang']['default']['id_lang'];?>
" />
                <?php }?>
            </div> 
        </div> 
        <div class="comments"> 
            <h3><?php echo smartyTranslate(array('s'=>"Few important notes"),$_smarty_tpl);?>
</h3>
            <p><?php echo smartyTranslate(array('s'=>'The Nivo Slider is now'),$_smarty_tpl);?>
 <b><a href="http://nivo.dev7studios.com/2012/05/30/the-nivo-slider-is-responsive/" target="_blank"><?php echo smartyTranslate(array('s'=>'responsive'),$_smarty_tpl);?>
</a></b>!</p>
            <p><?php echo smartyTranslate(array('s'=>'If you dont want title and/or captions text than leave empty those fields.'),$_smarty_tpl);?>
</p>
            <p><?php echo smartyTranslate(array('s'=>'The images wont be resized automatically to the same size, you need to resize them manually!'),$_smarty_tpl);?>
</p>
            <p><?php echo smartyTranslate(array('s'=>'You can upload different sized images for different language.'),$_smarty_tpl);?>
</p>
            <p><?php echo smartyTranslate(array('s'=>'If you want you can upload the same image to different language. They will be renamed but its better if you give them a normal name.'),$_smarty_tpl);?>
</p>
            <p><?php echo smartyTranslate(array('s'=>'More than 8 image looks ugly if you use thumbnails in center column.'),$_smarty_tpl);?>
</p>
        </div>
    </form>
</fieldset><?php }} ?>
