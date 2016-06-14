<?php /* Smarty version Smarty-3.1.19, created on 2016-04-25 19:51:21
         compiled from "/srv/data/web/vhosts/www.bouquetacroquer.fr/htdocs/modules/pk_bannercarousel/views/templates/admin/new.tpl" */ ?>
<?php /*%%SmartyHeaderCode:107202495571e5919b433c5-63786226%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '42915a0c13e45946411c95544958a5c8c002ece9' => 
    array (
      0 => '/srv/data/web/vhosts/www.bouquetacroquer.fr/htdocs/modules/pk_bannercarousel/views/templates/admin/new.tpl',
      1 => 1453301956,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '107202495571e5919b433c5-63786226',
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
  'unifunc' => 'content_571e5919bd0911_29807025',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_571e5919bd0911_29807025')) {function content_571e5919bd0911_29807025($_smarty_tpl) {?><div id="new" class="minic-container">
    <form id="form-new" class="" method="post" action="<?php echo $_smarty_tpl->tpl_vars['slider']->value['postAction'];?>
" enctype="multipart/form-data">
        <div class="minic-top">
            <h3><?php echo smartyTranslate(array('s'=>'New slide','mod'=>'pk_bannercarousel'),$_smarty_tpl);?>

                <a href="http://module.minic.ro/minic-slider-news/using-the-feedback-and-bug-report/" target="_blank" class="help"><?php echo smartyTranslate(array('s'=>'help & tips','mod'=>'pk_bannercarousel'),$_smarty_tpl);?>
</a>
            </h3>
            <a href="#new" class="minic-close">x</a>
        </div>
        <div class="minic-content">
            <div class="title input-holder">
                <label><?php echo smartyTranslate(array('s'=>'Title','mod'=>'pk_bannercarousel'),$_smarty_tpl);?>
</label>
                <input type="text" name="title" class="tooltip2" placeholder="<?php echo smartyTranslate(array('s'=>'The title of the slide'),$_smarty_tpl);?>
" title="<?php echo smartyTranslate(array('s'=>'This will be the title on the slide.','mod'=>'pk_bannercarousel'),$_smarty_tpl);?>
" /> 
            </div>
            <div class="url input-holder">
                <label><?php echo smartyTranslate(array('s'=>'Url','mod'=>'pk_bannercarousel'),$_smarty_tpl);?>
</label>
                <input type="text" name="url" class="tooltip2" placeholder="<?php echo smartyTranslate(array('s'=>'Link of the slide'),$_smarty_tpl);?>
" title="<?php echo smartyTranslate(array('s'=>'ex. http://myshop.com/promotions','mod'=>'pk_bannercarousel'),$_smarty_tpl);?>
" />  
                <span><?php echo smartyTranslate(array('s'=>'Blank target','mod'=>'pk_bannercarousel'),$_smarty_tpl);?>
</span>
                <input type="checkbox" name="target" class="tooltip2" placeholder="1" title="<?php echo smartyTranslate(array('s'=>'Check this if you want to open the link in new window.','mod'=>'pk_bannercarousel'),$_smarty_tpl);?>
" />         
            </div>
            <div class="image input-holder">
                <label><?php echo smartyTranslate(array('s'=>'Image','mod'=>'pk_bannercarousel'),$_smarty_tpl);?>
</label>
                <input type="file" name="image" id="image-chooser" class="tooltip2" title="<?php echo smartyTranslate(array('s'=>'Choose an image, only .jpg, .png, .gif are allowed.','mod'=>'pk_bannercarousel'),$_smarty_tpl);?>
" /><br/><br/>
                <p class="warning">Recommended width of image - 440px</p>
            </div>
            <div class="imageName input-holder">
                <label><?php echo smartyTranslate(array('s'=>'Image name','mod'=>'pk_bannercarousel'),$_smarty_tpl);?>
</label>
                <input type="text" name="imageName" class="tooltip2" placeholder="<?php echo smartyTranslate(array('s'=>'Image name'),$_smarty_tpl);?>
" title="<?php echo smartyTranslate(array('s'=>'Optional! The name of the uploaded image without extension. The white spaces will be replaces with underscore ( _ )','mod'=>'pk_bannercarousel'),$_smarty_tpl);?>
" />           
            </div>
            <?php if ($_smarty_tpl->tpl_vars['slider']->value['options']['single']==1) {?>
            <div class="input-holder language">
                <label><?php echo smartyTranslate(array('s'=>'Language','mod'=>'pk_bannercarousel'),$_smarty_tpl);?>
</label>
                <select name="language" class="" title="<?php echo smartyTranslate(array('s'=>'The language of the slide.','mod'=>'pk_bannercarousel'),$_smarty_tpl);?>
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
            <div class="alt input-holder">
                <label><?php echo smartyTranslate(array('s'=>'Image alt','mod'=>'pk_bannercarousel'),$_smarty_tpl);?>
</label>
                <input type="text" name="alt" class="tooltip2" placeholder="<?php echo smartyTranslate(array('s'=>'An alternate text for the image'),$_smarty_tpl);?>
" title="<?php echo smartyTranslate(array('s'=>'The image alt, alternate text for the image','mod'=>'pk_bannercarousel'),$_smarty_tpl);?>
" />
            </div>
            <!--<div class="caption input-holder"> 
                <label><?php echo smartyTranslate(array('s'=>'Caption','mod'=>'pk_bannercarousel'),$_smarty_tpl);?>
</label>
                <textarea type="text" name="caption" cols=40 rows=6 class="tooltip2" title="<?php echo smartyTranslate(array('s'=>'Be carefull, too long text isnt good and FULL HTML is allowed.'),$_smarty_tpl);?>
" placeholder="<?php echo smartyTranslate(array('s'=>'The slide text','mod'=>'pk_bannercarousel'),$_smarty_tpl);?>
"></textarea>                      
            </div>-->
            
        </div>
        <div class="minic-bottom">
            <input type="submit" name="submitNewSlide" value="<?php echo smartyTranslate(array('s'=>'Add Slide','mod'=>'pk_bannercarousel'),$_smarty_tpl);?>
" class="green button-large" />
            <?php if ($_smarty_tpl->tpl_vars['slider']->value['options']['single']==0) {?>
                <input type="hidden" name="language" value="<?php echo $_smarty_tpl->tpl_vars['slider']->value['lang']['default']['id_lang'];?>
" />
            <?php }?>
            <a href="#new" class="minic-close button-large lgrey"><?php echo smartyTranslate(array('s'=>'Close','mod'=>'pk_bannercarousel'),$_smarty_tpl);?>
</a>
        </div>
    </form>
</div>
<?php }} ?>
