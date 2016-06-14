<?php /* Smarty version Smarty-3.1.19, created on 2016-03-10 01:34:52
         compiled from "/srv/data/web/vhosts/www.bouquetacroquer.fr/htdocs/modules/pk_testimonials/views/templates/front/addtestimonial.tpl" */ ?>
<?php /*%%SmartyHeaderCode:75607687156e0c12c870796-28685507%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '25d488ab7137dfc069ff303e6d5885c17ecf4012' => 
    array (
      0 => '/srv/data/web/vhosts/www.bouquetacroquer.fr/htdocs/modules/pk_testimonials/views/templates/front/addtestimonial.tpl',
      1 => 1453302037,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '75607687156e0c12c870796-28685507',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'recaptcha' => 0,
    'captchakey' => 0,
    'base_dir' => 0,
    'http_host' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_56e0c12c918102_32076629',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56e0c12c918102_32076629')) {function content_56e0c12c918102_32076629($_smarty_tpl) {?><!-- Block testimonial module -->
<?php $_smarty_tpl->_capture_stack[0][] = array('path', null, null); ob_start(); ?>
    <?php echo smartyTranslate(array('s'=>'Add Testimonial','mod'=>'pk_testimonials'),$_smarty_tpl);?>

<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>
<h1 class="page-heading">
    <?php echo smartyTranslate(array('s'=>'Add Testimonial','mod'=>'pk_testimonials'),$_smarty_tpl);?>

</h1>
<span class="subtitle"><?php echo smartyTranslate(array('s'=>'We welcome your testimonials - please enter yours using the form below','mod'=>'pk_testimonials'),$_smarty_tpl);?>
</span>
<div id="block_testimonials_submit">
  <form class="testimonialForm custom-inputs" id="testimonialForm" name="testimonialForm" method="post" enctype="multipart/form-data" action="" >
    <fieldset>
      <ol>
        <li class="testim-name form-group">
          <label for="name" class="i-name f-label"><?php echo smartyTranslate(array('s'=>'Name','mod'=>'pk_testimonials'),$_smarty_tpl);?>
<em>*</em></label>
          <input name="testimonial_submitter_name"  value="" id="testimonial_submitter_name" class="required form-control" maxlength="20" type="text" /></li>
        <li class="testim-email">
          <label for="name" class="i-email f-label"><?php echo smartyTranslate(array('s'=>'Email','mod'=>'pk_testimonials'),$_smarty_tpl);?>
<em>*</em></label>
          <input name="testimonial_submitter_email"  value="" id="testimonial_submitter_email" class="required form-control" maxlength="40" type="email" /></li>
        <li class="testim-summary">
          <label for="testimonial_title" class="i-other f-label"><?php echo smartyTranslate(array('s'=>'Summary','mod'=>'pk_testimonials'),$_smarty_tpl);?>
<em>*</em></label>
          <input name="testimonial_title" value="" id="testimonial_title" class="required form-control"  maxlength="40" type="text" /></li>
        <li class="testim-body">
          <label for="testimonial_main_message" class="i-message t-label"><?php echo smartyTranslate(array('s'=>'Your Testimonial','mod'=>'pk_testimonials'),$_smarty_tpl);?>
</label>
          <textarea cols="33" rows="5" name="testimonial_main_message" id="testimonial_main_message" class="required form-control" maxlength="240"></textarea></li>
      </ol>
      <div class='alert'></div>
    </fieldset>
    <?php if ($_smarty_tpl->tpl_vars['recaptcha']->value) {?>
      <fieldset>
        <div id="captcha_body"></div>
      </fieldset>      
    <?php }?>
    <input type="submit" class="button" name="testimonial" value="<?php echo smartyTranslate(array('s'=>'Submit Testimonial','mod'=>'pk_testimonials'),$_smarty_tpl);?>
"  />
  </form>
</div>
<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['addJsDef'][0][0]->addJsDef(array('addtestimonial'=>true),$_smarty_tpl);?>
<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['addJsDef'][0][0]->addJsDef(array('recaptcha'=>$_smarty_tpl->tpl_vars['recaptcha']->value),$_smarty_tpl);?>
<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['addJsDef'][0][0]->addJsDef(array('captchakey'=>$_smarty_tpl->tpl_vars['captchakey']->value),$_smarty_tpl);?>
<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['addJsDef'][0][0]->addJsDef(array('base_dir'=>$_smarty_tpl->tpl_vars['base_dir']->value),$_smarty_tpl);?>
<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['addJsDef'][0][0]->addJsDef(array('http_host'=>$_smarty_tpl->tpl_vars['http_host']->value),$_smarty_tpl);?>
<?php $_smarty_tpl->smarty->_tag_stack[] = array('addJsDefL', array('name'=>'field_error')); $_block_repeat=true; echo $_smarty_tpl->smarty->registered_plugins['block']['addJsDefL'][0][0]->addJsDefL(array('name'=>'field_error'), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
<?php echo smartyTranslate(array('s'=>'Please fill in all the required fields.','mod'=>'pk_productsCarousel_single','js'=>1),$_smarty_tpl);?>
<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['addJsDefL'][0][0]->addJsDefL(array('name'=>'field_error'), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
<?php $_smarty_tpl->smarty->_tag_stack[] = array('addJsDefL', array('name'=>'captcha_error')); $_block_repeat=true; echo $_smarty_tpl->smarty->registered_plugins['block']['addJsDefL'][0][0]->addJsDefL(array('name'=>'captcha_error'), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
<?php echo smartyTranslate(array('s'=>'Please type captcha words correctly and try again!','mod'=>'pk_productsCarousel_single','js'=>1),$_smarty_tpl);?>
<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['addJsDefL'][0][0]->addJsDefL(array('name'=>'captcha_error'), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
<?php $_smarty_tpl->smarty->_tag_stack[] = array('addJsDefL', array('name'=>'success')); $_block_repeat=true; echo $_smarty_tpl->smarty->registered_plugins['block']['addJsDefL'][0][0]->addJsDefL(array('name'=>'success'), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
<?php echo smartyTranslate(array('s'=>'Your message has been sent and will be published soon.','mod'=>'pk_productsCarousel_single','js'=>1),$_smarty_tpl);?>
<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['addJsDefL'][0][0]->addJsDefL(array('name'=>'success'), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
<?php $_smarty_tpl->smarty->_tag_stack[] = array('addJsDefL', array('name'=>'DB_error')); $_block_repeat=true; echo $_smarty_tpl->smarty->registered_plugins['block']['addJsDefL'][0][0]->addJsDefL(array('name'=>'DB_error'), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
<?php echo smartyTranslate(array('s'=>'Can\'t add testimonial to DB.','mod'=>'pk_productsCarousel_single','js'=>1),$_smarty_tpl);?>
<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['addJsDefL'][0][0]->addJsDefL(array('name'=>'DB_error'), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
<?php $_smarty_tpl->smarty->_tag_stack[] = array('addJsDefL', array('name'=>'other')); $_block_repeat=true; echo $_smarty_tpl->smarty->registered_plugins['block']['addJsDefL'][0][0]->addJsDefL(array('name'=>'other'), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
<?php echo smartyTranslate(array('s'=>'Something is wrong. Please try again.','mod'=>'pk_productsCarousel_single','js'=>1),$_smarty_tpl);?>
<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['addJsDefL'][0][0]->addJsDefL(array('name'=>'other'), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>

<!-- /Block testimonial module --><?php }} ?>
