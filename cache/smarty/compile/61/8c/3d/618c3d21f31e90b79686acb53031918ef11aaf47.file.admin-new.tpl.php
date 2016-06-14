<?php /* Smarty version Smarty-3.1.19, created on 2016-04-25 19:13:06
         compiled from "/srv/data/web/vhosts/www.bouquetacroquer.fr/htdocs/modules/pk_promominicslider/views/templates/admin/admin-new.tpl" */ ?>
<?php /*%%SmartyHeaderCode:816657527571e50220379d2-51424923%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '618c3d21f31e90b79686acb53031918ef11aaf47' => 
    array (
      0 => '/srv/data/web/vhosts/www.bouquetacroquer.fr/htdocs/modules/pk_promominicslider/views/templates/admin/admin-new.tpl',
      1 => 1453302013,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '816657527571e50220379d2-51424923',
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
  'unifunc' => 'content_571e50220e6b77_75457891',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_571e50220e6b77_75457891')) {function content_571e50220e6b77_75457891($_smarty_tpl) {?>

<fieldset id="newSlide" class="hidden-div">
    <legend><?php echo smartyTranslate(array('s'=>'Add New Slide','mod'=>'pk_promominicslider'),$_smarty_tpl);?>
</legend> 
    <form method="post" action="<?php echo $_smarty_tpl->tpl_vars['slider']->value['postAction'];?>
" enctype="multipart/form-data">        
        <div id="new">
            <div class="title input">
                <label><?php echo smartyTranslate(array('s'=>'Title','mod'=>'pk_promominicslider'),$_smarty_tpl);?>
</label>
                <input type="text" name="title" size="41" class="ghost-text sl-tooltip" value="<?php echo smartyTranslate(array('s'=>'The title of the slide','mod'=>'pk_promominicslider'),$_smarty_tpl);?>
" title="<?php echo smartyTranslate(array('s'=>'This will be the title on the slide.','mod'=>'pk_promominicslider'),$_smarty_tpl);?>
" /> 
            </div>
            <div class="url input">
                <label><?php echo smartyTranslate(array('s'=>'Url','mod'=>'pk_promominicslider'),$_smarty_tpl);?>
</label>
                <input type="text" name="url" size="41" class="ghost-text sl-tooltip" value="<?php echo smartyTranslate(array('s'=>'Link of the slide','mod'=>'pk_promominicslider'),$_smarty_tpl);?>
" title="<?php echo smartyTranslate(array('s'=>'ex. http://myshop.com/promotions','mod'=>'pk_promominicslider'),$_smarty_tpl);?>
" />           
            </div>
            <div class="target">
                <label><?php echo smartyTranslate(array('s'=>'Blank target','mod'=>'pk_promominicslider'),$_smarty_tpl);?>
</label>
                <input type="checkbox" name="target" class="sl-tooltip" value="1" title="<?php echo smartyTranslate(array('s'=>'Check this if you want to open the link in new window.','mod'=>'pk_promominicslider'),$_smarty_tpl);?>
" />
            </div>
            <div class="image input">
                <label><?php echo smartyTranslate(array('s'=>'Image','mod'=>'pk_promominicslider'),$_smarty_tpl);?>
</label>
                <input type="file" name="image" size="29" id="image-chooser" class="sl-tooltip" title="<?php echo smartyTranslate(array('s'=>'Choose an image, only .jpg, .png, .gif are allowed.','mod'=>'pk_promominicslider'),$_smarty_tpl);?>
" />
                <strong style="margin-left:154px; color:#ff715c"><?php echo smartyTranslate(array('s'=>'Recommended image dimensions are 568x568px','mod'=>'pk_promominicslider'),$_smarty_tpl);?>
</strong>
            </div>
            <div class="imageName input">
                <label><?php echo smartyTranslate(array('s'=>'Image name','mod'=>'pk_promominicslider'),$_smarty_tpl);?>
</label>
                <input type="text" name="imageName" size="41" class="ghost-text sl-tooltip" value="<?php echo smartyTranslate(array('s'=>'Image name','mod'=>'pk_promominicslider'),$_smarty_tpl);?>
" title="<?php echo smartyTranslate(array('s'=>'Optional! The name of the uploaded image without extension. The white spaces will be replaces with underscore ( _ )','mod'=>'pk_promominicslider'),$_smarty_tpl);?>
" />           
            </div>
            <?php if ($_smarty_tpl->tpl_vars['slider']->value['options']['single']==1) {?>
                <div class="language">
                    <label><?php echo smartyTranslate(array('s'=>'Language','mod'=>'pk_promominicslider'),$_smarty_tpl);?>
</label>
                    <select name="language" class="sl-tooltip" style="display:inline" title="<?php echo smartyTranslate(array('s'=>'The language of the slide.','mod'=>'pk_promominicslider'),$_smarty_tpl);?>
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
                <label><?php echo smartyTranslate(array('s'=>'Image alt','mod'=>'pk_promominicslider'),$_smarty_tpl);?>
</label>
                <input type="text" name="alt" size="41" class="ghost-text sl-tooltip" value="<?php echo smartyTranslate(array('s'=>'An alternate text for the image','mod'=>'pk_promominicslider'),$_smarty_tpl);?>
" title="<?php echo smartyTranslate(array('s'=>'The image alt, alternate text for the image','mod'=>'pk_promominicslider'),$_smarty_tpl);?>
" />
            </div>
            <div class="caption"> 
                <label><?php echo smartyTranslate(array('s'=>'Caption','mod'=>'pk_promominicslider'),$_smarty_tpl);?>
</label>
                <textarea type="text" name="caption" cols=40 rows=6 class="ghost-text sl-tooltip" title="<?php echo smartyTranslate(array('s'=>'Be carefull, too long text isnt good and FULL HTML is allowed.','mod'=>'pk_promominicslider'),$_smarty_tpl);?>
"><?php echo smartyTranslate(array('s'=>'The slide text','mod'=>'pk_promominicslider'),$_smarty_tpl);?>
</textarea>                      
            </div>
            <div class="button_cont">
                <input type="submit" name="submitNewSlide" value="<?php echo smartyTranslate(array('s'=>'Add Slide','mod'=>'pk_promominicslider'),$_smarty_tpl);?>
" class="green large" />
                <?php if ($_smarty_tpl->tpl_vars['slider']->value['options']['single']==0) {?>
                    <input type="hidden" name="language" value="<?php echo $_smarty_tpl->tpl_vars['slider']->value['lang']['default']['id_lang'];?>
" />
                <?php }?>
            </div> 
        </div> 
    </form>
</fieldset><?php }} ?>
