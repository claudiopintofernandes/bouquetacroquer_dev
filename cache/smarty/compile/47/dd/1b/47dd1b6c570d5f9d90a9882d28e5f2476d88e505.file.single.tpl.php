<?php /* Smarty version Smarty-3.1.19, created on 2016-03-08 02:15:40
         compiled from "/srv/data/web/vhosts/www.bouquetacroquer.fr/htdocs/modules/pk_layeredslider/views/templates/front/single.tpl" */ ?>
<?php /*%%SmartyHeaderCode:79227021356de27bc1c49f3-62120426%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '47dd1b6c570d5f9d90a9882d28e5f2476d88e505' => 
    array (
      0 => '/srv/data/web/vhosts/www.bouquetacroquer.fr/htdocs/modules/pk_layeredslider/views/templates/front/single.tpl',
      1 => 1453301985,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '79227021356de27bc1c49f3-62120426',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'minicSlider' => 0,
    'defLang' => 0,
    'slides' => 0,
    'image' => 0,
    'subImages' => 0,
    'imgName' => 0,
    'imgId' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_56de27bc256850_89563538',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56de27bc256850_89563538')) {function content_56de27bc256850_89563538($_smarty_tpl) {?><div id="layered-theme" class="homemodule load-animate">
    <?php if ($_smarty_tpl->tpl_vars['minicSlider']->value['options']['buttons']==1) {?>
    <ul class="controls">
        <li class="status"></li>
        <li class="prev"></li>
        <li class="pause"></li>
        <li class="next"></li>
    </ul>
    <?php }?>
    <?php if ($_smarty_tpl->tpl_vars['minicSlider']->value['options']['control']==1) {?>
    <ul class="nav">
        <?php  $_smarty_tpl->tpl_vars['image'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['image']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['slides']->value[$_smarty_tpl->tpl_vars['defLang']->value]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['image']->key => $_smarty_tpl->tpl_vars['image']->value) {
$_smarty_tpl->tpl_vars['image']->_loop = true;
?>
        <li data-id="<?php echo $_smarty_tpl->tpl_vars['image']->value['id_slide'];?>
"></li>
        <?php } ?>
    </ul>
    <?php }?>
    <div id="layered">
        <ul>
            <?php  $_smarty_tpl->tpl_vars['image'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['image']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['slides']->value[$_smarty_tpl->tpl_vars['defLang']->value]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['image']->key => $_smarty_tpl->tpl_vars['image']->value) {
$_smarty_tpl->tpl_vars['image']->_loop = true;
?>            
            <li class="animate-in" id="slide<?php echo $_smarty_tpl->tpl_vars['image']->value['id_slide'];?>
" data-id="<?php echo $_smarty_tpl->tpl_vars['image']->value['id_slide'];?>
" data-info="shop<?php echo $_smarty_tpl->tpl_vars['image']->value['id_shop'];?>
langiso<?php echo $_smarty_tpl->tpl_vars['image']->value['lang_iso'];?>
">
                <img src="<?php echo $_smarty_tpl->tpl_vars['minicSlider']->value['path']['images'];?>
<?php echo $_smarty_tpl->tpl_vars['image']->value['image'];?>
" class="slide<?php echo $_smarty_tpl->tpl_vars['image']->value['id_slide'];?>
 mainImg" alt="<?php if ($_smarty_tpl->tpl_vars['image']->value['alt']) {?><?php echo $_smarty_tpl->tpl_vars['image']->value['alt'];?>
<?php }?>" />
                <div class="slide-text">
                    <?php if ($_smarty_tpl->tpl_vars['subImages']->value[$_smarty_tpl->tpl_vars['image']->value['lang_iso']][$_smarty_tpl->tpl_vars['image']->value['id_slide']][0]!='') {?>
                        <div class="page_width">
                        <?php  $_smarty_tpl->tpl_vars['imgName'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['imgName']->_loop = false;
 $_smarty_tpl->tpl_vars['imgId'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['subImages']->value[$_smarty_tpl->tpl_vars['image']->value['lang_iso']][$_smarty_tpl->tpl_vars['image']->value['id_slide']]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['imgName']->key => $_smarty_tpl->tpl_vars['imgName']->value) {
$_smarty_tpl->tpl_vars['imgName']->_loop = true;
 $_smarty_tpl->tpl_vars['imgId']->value = $_smarty_tpl->tpl_vars['imgName']->key;
?>
                            <img src="<?php echo $_smarty_tpl->tpl_vars['minicSlider']->value['path']['images'];?>
<?php echo $_smarty_tpl->tpl_vars['imgName']->value;?>
" class="slideImg<?php echo $_smarty_tpl->tpl_vars['imgId']->value;?>
" alt="<?php echo $_smarty_tpl->tpl_vars['imgId']->value;?>
" />
                        <?php } ?>
                        </div>
                    <?php }?>
                    <div id="htmlcaption_<?php echo $_smarty_tpl->tpl_vars['image']->value['id_slide'];?>
" class="slide-text-<?php echo $_smarty_tpl->tpl_vars['image']->value['id_slide'];?>
 slide-content">
                        <h3 class="trajan"><?php echo $_smarty_tpl->tpl_vars['image']->value['title'];?>
</h3>
                        <p><?php echo $_smarty_tpl->tpl_vars['image']->value['caption'];?>
</p>
                        <?php if (($_smarty_tpl->tpl_vars['image']->value['url']!='')) {?><a href="<?php echo $_smarty_tpl->tpl_vars['image']->value['url'];?>
" <?php if (($_smarty_tpl->tpl_vars['image']->value['target']==1)) {?>target="_blank"<?php }?> class="button"><?php echo smartyTranslate(array('s'=>'Details','mod'=>'pk_layeredslider'),$_smarty_tpl);?>
</a><?php }?>
                    </div>
                </div>
            </li>
            <?php } ?>            
        </ul>
    </div>
</div><?php }} ?>
