<?php /* Smarty version Smarty-3.1.19, created on 2016-03-08 02:30:41
         compiled from "/srv/data/web/vhosts/www.bouquetacroquer.fr/htdocs/themes/alysum/contact-form.tpl" */ ?>
<?php /*%%SmartyHeaderCode:146862660656de2b416d1fa6-53000726%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '59c9c5c36854a97a78a06d3d5d98066dd876703e' => 
    array (
      0 => '/srv/data/web/vhosts/www.bouquetacroquer.fr/htdocs/themes/alysum/contact-form.tpl',
      1 => 1455904451,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '146862660656de2b416d1fa6-53000726',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'customerThread' => 0,
    'theme_settings' => 0,
    'confirmation' => 0,
    'base_dir' => 0,
    'alreadySent' => 0,
    'request_uri' => 0,
    'contacts' => 0,
    'contact' => 0,
    'email' => 0,
    'PS_CATALOG_MODE' => 0,
    'isLogged' => 0,
    'orderList' => 0,
    'order' => 0,
    'orderedProductList' => 0,
    'id_order' => 0,
    'products' => 0,
    'product' => 0,
    'fileupload' => 0,
    'message' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_56de2b418aa040_17724157',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56de2b418aa040_17724157')) {function content_56de2b418aa040_17724157($_smarty_tpl) {?>
<?php $_smarty_tpl->_capture_stack[0][] = array('path', null, null); ob_start(); ?><?php echo smartyTranslate(array('s'=>'Contact'),$_smarty_tpl);?>
<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>
<h1 class="page-heading bottom-indent">
    <?php echo smartyTranslate(array('s'=>'Customer service'),$_smarty_tpl);?>
 - <?php if (isset($_smarty_tpl->tpl_vars['customerThread']->value)&&$_smarty_tpl->tpl_vars['customerThread']->value) {?><?php echo smartyTranslate(array('s'=>'Your reply'),$_smarty_tpl);?>
<?php } else { ?><?php echo smartyTranslate(array('s'=>'Contact us'),$_smarty_tpl);?>
<?php }?>
</h1>

<div class="wht_bg">
    <div class="wrap_indent">
    <?php if ($_smarty_tpl->tpl_vars['theme_settings']->value['show_map']==1) {?>
        <div id="map-canvas2" style="height:250px; margin-bottom:20px"></div>
        <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>
        <script>
        function initialize2() {
          var myLatlng2 = new google.maps.LatLng(<?php echo $_smarty_tpl->tpl_vars['theme_settings']->value['location_lat'];?>
,<?php echo $_smarty_tpl->tpl_vars['theme_settings']->value['location_lng'];?>
);
          var mapOptions2 = {
            zoom: 9,
            center: myLatlng2,
            mapTypeId: google.maps.MapTypeId.ROADMAP
          }
          var map2 = new google.maps.Map(document.getElementById('map-canvas2'), mapOptions2);
          var marker2 = new google.maps.Marker({
              position: myLatlng2,
              map: map2
          });
        }
        google.maps.event.addDomListener(window, 'load', initialize2);
        </script>
    <?php }?>        
<?php if (isset($_smarty_tpl->tpl_vars['confirmation']->value)) {?>
	<p class="alert alert-success"><?php echo smartyTranslate(array('s'=>'Your message has been successfully sent to our team.'),$_smarty_tpl);?>
</p>
	<ul class="footer_links clearfix">
		<li>
            <a class="btn btn-default button button-small" href="<?php echo $_smarty_tpl->tpl_vars['base_dir']->value;?>
">
                <span>
                    <i class="icon-chevron-left"></i><?php echo smartyTranslate(array('s'=>'Home'),$_smarty_tpl);?>

                </span>
            </a>
        </li>
	</ul>
<?php } elseif (isset($_smarty_tpl->tpl_vars['alreadySent']->value)) {?>
	<p class="alert alert-warning"><?php echo smartyTranslate(array('s'=>'Your message has already been sent.'),$_smarty_tpl);?>
</p>
	<ul class="footer_links clearfix">
		<li>
            <a class="btn btn-default button button-small" href="<?php echo $_smarty_tpl->tpl_vars['base_dir']->value;?>
">
                <span>
                    <i class="icon-chevron-left"></i><?php echo smartyTranslate(array('s'=>'Home'),$_smarty_tpl);?>

                </span>
            </a>
        </li>
	</ul>
<?php } else { ?>
	<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tpl_dir']->value)."./errors.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

	<form action="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['request_uri']->value, ENT_QUOTES, 'UTF-8', true);?>
" method="post" class="contact-form-box" enctype="multipart/form-data">
		<fieldset>
        <h3 class="page-subheading"><?php echo smartyTranslate(array('s'=>'Send a message'),$_smarty_tpl);?>
</h3>
        <div class="clearfix">
            <div class="col-xs-12 col-md-6">
                <div class="form-group">
                    <label for="id_contact"><?php echo smartyTranslate(array('s'=>'Subject Heading'),$_smarty_tpl);?>
</label>
                <?php if (isset($_smarty_tpl->tpl_vars['customerThread']->value['id_contact'])) {?>
                        <?php  $_smarty_tpl->tpl_vars['contact'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['contact']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['contacts']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['contact']->key => $_smarty_tpl->tpl_vars['contact']->value) {
$_smarty_tpl->tpl_vars['contact']->_loop = true;
?>
                            <?php if ($_smarty_tpl->tpl_vars['contact']->value['id_contact']==$_smarty_tpl->tpl_vars['customerThread']->value['id_contact']) {?>
                                <input type="text" class="form-control" id="contact_name" name="contact_name" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['contact']->value['name'], ENT_QUOTES, 'UTF-8', true);?>
" readonly="readonly" />
                                <input type="hidden" name="id_contact" value="<?php echo $_smarty_tpl->tpl_vars['contact']->value['id_contact'];?>
" />
                            <?php }?>
                        <?php } ?>
                </div> <!-- .selector1 -->
                <?php } else { ?>
                    <select id="id_contact" class="form-control" name="id_contact" onchange="showElemFromSelect('id_contact', 'desc_contact')">
                        <option value="0"><?php echo smartyTranslate(array('s'=>'-- Choose --'),$_smarty_tpl);?>
</option>
                        <?php  $_smarty_tpl->tpl_vars['contact'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['contact']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['contacts']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['contact']->key => $_smarty_tpl->tpl_vars['contact']->value) {
$_smarty_tpl->tpl_vars['contact']->_loop = true;
?>
                            <option value="<?php echo intval($_smarty_tpl->tpl_vars['contact']->value['id_contact']);?>
" <?php if (isset($_REQUEST['id_contact'])&&$_REQUEST['id_contact']==$_smarty_tpl->tpl_vars['contact']->value['id_contact']) {?>selected="selected"<?php }?>><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['contact']->value['name'], ENT_QUOTES, 'UTF-8', true);?>
</option>
                        <?php } ?>
                    </select>
                </div> <!-- .col-xs-12 .col-md-3 -->
                    <div id="desc_contact0" class="desc_contact">&nbsp;</div>
                    <?php  $_smarty_tpl->tpl_vars['contact'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['contact']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['contacts']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['contact']->key => $_smarty_tpl->tpl_vars['contact']->value) {
$_smarty_tpl->tpl_vars['contact']->_loop = true;
?>
                        <div id="desc_contact<?php echo intval($_smarty_tpl->tpl_vars['contact']->value['id_contact']);?>
" class="desc_contact contact-title" style="display:none;">
                            <i class="icon-comment-alt"></i><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['contact']->value['description'], ENT_QUOTES, 'UTF-8', true);?>

                        </div>
                    <?php } ?>
                <?php }?>
                <div class="form-group">
                    <label for="email"><?php echo smartyTranslate(array('s'=>'Email address'),$_smarty_tpl);?>
</label>
                    <?php if (isset($_smarty_tpl->tpl_vars['customerThread']->value['email'])) {?>
                        <input class="form-control grey" type="text" id="email" name="from" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['customerThread']->value['email'], ENT_QUOTES, 'UTF-8', true);?>
" readonly="readonly" />
                    <?php } else { ?>
                        <input class="form-control grey validate" type="text" id="email" name="from" data-validate="isEmail" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['email']->value, ENT_QUOTES, 'UTF-8', true);?>
" />
                    <?php }?>
                </div>
                <?php if (!$_smarty_tpl->tpl_vars['PS_CATALOG_MODE']->value) {?>
                    <?php if ((!isset($_smarty_tpl->tpl_vars['customerThread']->value['id_order'])||$_smarty_tpl->tpl_vars['customerThread']->value['id_order']>0)) {?>
                        <div class="form-group">
                            <label><?php echo smartyTranslate(array('s'=>'Order reference'),$_smarty_tpl);?>
</label>
                            <?php if (!isset($_smarty_tpl->tpl_vars['customerThread']->value['id_order'])&&isset($_smarty_tpl->tpl_vars['isLogged']->value)&&$_smarty_tpl->tpl_vars['isLogged']->value) {?>
                                <select name="id_order" class="form-control">
                                    <option value="0"><?php echo smartyTranslate(array('s'=>'-- Choose --'),$_smarty_tpl);?>
</option>
                                    <?php  $_smarty_tpl->tpl_vars['order'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['order']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['orderList']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['order']->key => $_smarty_tpl->tpl_vars['order']->value) {
$_smarty_tpl->tpl_vars['order']->_loop = true;
?>
                                        <option value="<?php echo intval($_smarty_tpl->tpl_vars['order']->value['value']);?>
" <?php if (intval($_smarty_tpl->tpl_vars['order']->value['selected'])) {?>selected="selected"<?php }?>><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['order']->value['label'], ENT_QUOTES, 'UTF-8', true);?>
</option>
                                    <?php } ?>
                                </select>
                            <?php } elseif (!isset($_smarty_tpl->tpl_vars['customerThread']->value['id_order'])&&empty($_smarty_tpl->tpl_vars['isLogged']->value)) {?>
                                <input class="form-control grey" type="text" name="id_order" id="id_order" value="<?php if (isset($_smarty_tpl->tpl_vars['customerThread']->value['id_order'])&&intval($_smarty_tpl->tpl_vars['customerThread']->value['id_order'])>0) {?><?php echo intval($_smarty_tpl->tpl_vars['customerThread']->value['id_order']);?>
<?php } else { ?><?php if (isset($_POST['id_order'])&&!empty($_POST['id_order'])) {?><?php echo intval($_POST['id_order']);?>
<?php }?><?php }?>" />
                            <?php } elseif (intval($_smarty_tpl->tpl_vars['customerThread']->value['id_order'])>0) {?>
                                <input class="form-control grey" type="text" name="id_order" id="id_order" value="<?php echo intval($_smarty_tpl->tpl_vars['customerThread']->value['id_order']);?>
" readonly="readonly" />
                            <?php }?>
                        </div>
                    <?php }?>
                    <?php if (isset($_smarty_tpl->tpl_vars['isLogged']->value)&&$_smarty_tpl->tpl_vars['isLogged']->value) {?>
                        <div class="form-group">
                            <label><?php echo smartyTranslate(array('s'=>'Product'),$_smarty_tpl);?>
</label>
                            <?php if (!isset($_smarty_tpl->tpl_vars['customerThread']->value['id_product'])) {?>
                                <?php  $_smarty_tpl->tpl_vars['products'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['products']->_loop = false;
 $_smarty_tpl->tpl_vars['id_order'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['orderedProductList']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['products']->index=-1;
foreach ($_from as $_smarty_tpl->tpl_vars['products']->key => $_smarty_tpl->tpl_vars['products']->value) {
$_smarty_tpl->tpl_vars['products']->_loop = true;
 $_smarty_tpl->tpl_vars['id_order']->value = $_smarty_tpl->tpl_vars['products']->key;
 $_smarty_tpl->tpl_vars['products']->index++;
 $_smarty_tpl->tpl_vars['products']->first = $_smarty_tpl->tpl_vars['products']->index === 0;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['products']['first'] = $_smarty_tpl->tpl_vars['products']->first;
?>
                                    <select name="id_product" id="<?php echo $_smarty_tpl->tpl_vars['id_order']->value;?>
_order_products" class="product_select form-control" style="<?php if (!$_smarty_tpl->getVariable('smarty')->value['foreach']['products']['first']) {?> display:none; <?php }?>" <?php if (!$_smarty_tpl->getVariable('smarty')->value['foreach']['products']['first']) {?>disabled="disabled" <?php }?>>
                                        <option value="0"><?php echo smartyTranslate(array('s'=>'-- Choose --'),$_smarty_tpl);?>
</option>
                                        <?php  $_smarty_tpl->tpl_vars['product'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['product']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['products']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['product']->key => $_smarty_tpl->tpl_vars['product']->value) {
$_smarty_tpl->tpl_vars['product']->_loop = true;
?>
                                            <option value="<?php echo intval($_smarty_tpl->tpl_vars['product']->value['value']);?>
"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['label'], ENT_QUOTES, 'UTF-8', true);?>
</option>
                                        <?php } ?>
                                    </select>
                                <?php } ?>
                            <?php } elseif ($_smarty_tpl->tpl_vars['customerThread']->value['id_product']>0) {?>
                                <input class="form-control grey" type="text" name="id_product" id="id_product" value="<?php echo intval($_smarty_tpl->tpl_vars['customerThread']->value['id_product']);?>
" readonly="readonly" />
                            <?php }?>
                        </div>
                    <?php }?>
                <?php }?>
                <?php if ($_smarty_tpl->tpl_vars['fileupload']->value==1) {?>
                    <p class="form-group">
                        <label for="fileUpload"><?php echo smartyTranslate(array('s'=>'Attach File'),$_smarty_tpl);?>
</label>
                        <input type="hidden" name="MAX_FILE_SIZE" value="2000000" />
                        <input type="file" name="fileUpload" id="fileUpload" class="form-control" />
                    </p>
                <?php }?>
            </div>
            <div class="col-xs-12 col-md-6">
                <div class="form-group">
                    <label for="message"><?php echo smartyTranslate(array('s'=>'Message'),$_smarty_tpl);?>
</label>
                    <textarea class="form-control" id="message" name="message"><?php if (isset($_smarty_tpl->tpl_vars['message']->value)) {?><?php echo stripslashes(htmlspecialchars($_smarty_tpl->tpl_vars['message']->value, ENT_QUOTES, 'UTF-8', true));?>
<?php }?></textarea>
                </div>
            </div>
        </div>
        <div class="submit">
            <input type="submit" name="submitMessage" id="submitMessage" value="<?php echo smartyTranslate(array('s'=>'Send'),$_smarty_tpl);?>
" class="button_large" />
		</div>
	</fieldset>
</form>
<?php }?>
</div>
</div><?php }} ?>
