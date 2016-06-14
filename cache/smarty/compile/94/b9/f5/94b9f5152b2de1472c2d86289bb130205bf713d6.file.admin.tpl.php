<?php /* Smarty version Smarty-3.1.19, created on 2016-04-25 19:13:05
         compiled from "/srv/data/web/vhosts/www.bouquetacroquer.fr/htdocs/modules/pk_promominicslider/views/templates/admin/admin.tpl" */ ?>
<?php /*%%SmartyHeaderCode:835071194571e5021c04e09-05422421%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '94b9f5152b2de1472c2d86289bb130205bf713d6' => 
    array (
      0 => '/srv/data/web/vhosts/www.bouquetacroquer.fr/htdocs/modules/pk_promominicslider/views/templates/admin/admin.tpl',
      1 => 1453302013,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '835071194571e5021c04e09-05422421',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'slider' => 0,
    'error' => 0,
    'confirmation' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_571e5021cf9083_22582104',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_571e5021cf9083_22582104')) {function content_571e5021cf9083_22582104($_smarty_tpl) {?>

<script type="text/javascript">
    $(document).ready(function() {       
        // Sortable
        $("ul.languages").sortable({
            opacity: 0.6,
            cursor: "move",
            update: function(event, ui) {
                var list = $(this);
                var number;
                var response;
                $.getJSON(
                    "<?php echo $_smarty_tpl->tpl_vars['slider']->value['sortUrl'];?>
", 
                    {slides: $(this).sortable("serialize")}, 
                    function(response){
                        console.log(response.success);
                        if(response.success == "true"){
                            showResponse($("#fixed_conf"), "<?php echo smartyTranslate(array('s'=>'Saved successfull','mod'=>'pk_promominicslider'),$_smarty_tpl);?>
");
                            var i = 1;
                            list.children("li").each(function(){
                                number = i;
                                if(i < 10){ 
                                    number = "0"+i; 
                                }
                                $(this).find(".order").text(number);
                                i++;
                            });
                        }else{
                            showResponse($("#fixed_error"), "<?php echo smartyTranslate(array('s'=>'Something went wrong, please refresh the page and try again','mod'=>'pk_promominicslider'),$_smarty_tpl);?>
"); 
                        }
                  }
                );
            }
        });         
    });
</script>

<?php if (isset($_smarty_tpl->tpl_vars['error']->value)) {?><div class="error"><?php echo $_smarty_tpl->tpl_vars['error']->value;?>
</div><?php }?>
<?php if (isset($_smarty_tpl->tpl_vars['confirmation']->value)) {?><div class="conf"><?php echo $_smarty_tpl->tpl_vars['confirmation']->value;?>
</div><?php }?>
<div id="fixed_conf" class="conf response" style="display:none;"><p></p><span class="close">x</span></div>
<div id="fixed_error" class="error response" style="display:none;"><p></p><span class="close">x</span></div>

<div class="slider_admin">
    <div id="slider_header">        
        <div id="slider_navigation" class="slider_navigation">
            <a href="#newSlide" id="addNew-button" class="menu"><?php echo smartyTranslate(array('s'=>'Add New','mod'=>'pk_promominicslider'),$_smarty_tpl);?>
</a>
            <a href="#option" id="options-button" class="menu"><?php echo smartyTranslate(array('s'=>'Options','mod'=>'pk_promominicslider'),$_smarty_tpl);?>
</a>
            <div class="clearfix"></div>
        </div>
    </div>
    <?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['slider']->value['tpl']['options']), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

    <?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['slider']->value['tpl']['new']), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

    <?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['slider']->value['tpl']['slides']), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

        
    <div id="deleteWindow" class="confirmation_window">
        <div class="conf_header">
            <a href="#" class="close_confirm deny-delete">x</a>
            <h3><?php echo smartyTranslate(array('s'=>'Confirmation','mod'=>'pk_promominicslider'),$_smarty_tpl);?>
</h3>
        </div>
        <div class="confirmation_content">
            <span class="warning_img"></span>
            <p><?php echo smartyTranslate(array('s'=>'Are you sure? If so than you have to know that the image and all of its data will be deleted! I suggest to use the active state switch, and turn it off.','mod'=>'pk_promominicslider'),$_smarty_tpl);?>
</p>
        </div>
        <div class="button_box">
            <div class="confirm-b">
                <a href="#" class="confirm-delete"><?php echo smartyTranslate(array('s'=>'Yes','mod'=>'pk_promominicslider'),$_smarty_tpl);?>
</a>
            </div>
            <div class="deny-b">
                <a href="#" class="deny-delete"><?php echo smartyTranslate(array('s'=>'No','mod'=>'pk_promominicslider'),$_smarty_tpl);?>
</a>
            </div>
        </div>
    </div>    
    <div id="sendInfoWindow" class="confirmation_window">
        <div class="conf_header">
            <a href="#" class="close_confirm deny-delete">x</a>
            <h3><?php echo smartyTranslate(array('s'=>'Help Us!','mod'=>'pk_promominicslider'),$_smarty_tpl);?>
</h3>
        </div>
        <div class="confirmation_content">
            <p><?php echo smartyTranslate(array('s'=>'By clicking to the YES button, you agree to send some basic information to us. This mean we can keep tracking how much active module we have.','mod'=>'pk_promominicslider'),$_smarty_tpl);?>
</p>
            <p><b><?php echo smartyTranslate(array('s'=>'Don`t worry we`ll be discrete with this information','mod'=>'pk_promominicslider'),$_smarty_tpl);?>
:</b></p>
            <ul>
                <li><?php echo smartyTranslate(array('s'=>'Domain','mod'=>'pk_promominicslider'),$_smarty_tpl);?>
: <b><?php echo $_smarty_tpl->tpl_vars['slider']->value['info']['domain'];?>
</b></li>
                <li><?php echo smartyTranslate(array('s'=>'Version','mod'=>'pk_promominicslider'),$_smarty_tpl);?>
: <b><?php echo $_smarty_tpl->tpl_vars['slider']->value['info']['version'];?>
</b></li>
                <li><?php echo smartyTranslate(array('s'=>'PS Version','mod'=>'pk_promominicslider'),$_smarty_tpl);?>
: <b><?php echo $_smarty_tpl->tpl_vars['slider']->value['info']['psVersion'];?>
</b></li>
            </ul>
            <form>
                <p><?php echo smartyTranslate(array('s'=>'If you wish to riecive news about our updates, new modules (there will be...) than please fill this out.','mod'=>'pk_promominicslider'),$_smarty_tpl);?>
</p>
                <div>
                    <label><?php echo smartyTranslate(array('s'=>'Email','mod'=>'pk_promominicslider'),$_smarty_tpl);?>
:</label>
                    <input type="text" id="sendInfoEmail" name="infoEmail" />
                </div>  
            </form>
            <h3><?php echo smartyTranslate(array('s'=>'Thank you for your help!','mod'=>'pk_promominicslider'),$_smarty_tpl);?>
</h3>
        </div>
        <div class="button_box">
            <div class="confirm-b">
                <a href="#" id="sendInfo" class="confirm-delete"><?php echo smartyTranslate(array('s'=>'Yes','mod'=>'pk_promominicslider'),$_smarty_tpl);?>
</a>
            </div>
            <div class="deny-b">
                <a href="#" class="deny-delete"><?php echo smartyTranslate(array('s'=>'No','mod'=>'pk_promominicslider'),$_smarty_tpl);?>
</a>
            </div>
        </div>
    </div>  
</div>			<?php }} ?>
