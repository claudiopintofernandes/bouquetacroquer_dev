<?php /* Smarty version Smarty-3.1.19, created on 2016-03-10 14:55:08
         compiled from "/srv/data/web/vhosts/www.bouquetacroquer.fr/htdocs/modules/eydatepicker/views/templates/admin/configuration.tpl" */ ?>
<?php /*%%SmartyHeaderCode:88536118756e17cbc21a950-86597448%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e2403384a7c875a08f4bb34933d0c8bacbf0c2e5' => 
    array (
      0 => '/srv/data/web/vhosts/www.bouquetacroquer.fr/htdocs/modules/eydatepicker/views/templates/admin/configuration.tpl',
      1 => 1453301897,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '88536118756e17cbc21a950-86597448',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'web_path_controllers' => 0,
    'tokencommon' => 0,
    'PS_CALENDAR_INLINE' => 0,
    'PS_CALENDAR_REQUIRED' => 0,
    'carriers' => 0,
    'carrier' => 0,
    'PSDK_CARRIERS_FILTER' => 0,
    'PS_CUTOFF_HOUR' => 0,
    'PS_FIRST_AVAILABLE_DELIVERY_DAY' => 0,
    'PS_HOURS_TO_PREPARE_ORDER' => 0,
    'PS_FUTURE_DAYS' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_56e17cbc2e45c4_12203008',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56e17cbc2e45c4_12203008')) {function content_56e17cbc2e45c4_12203008($_smarty_tpl) {?>
<form id="datepicker_ajax_form" action="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['web_path_controllers']->value, ENT_QUOTES, 'UTF-8', true);?>
/configuration.php?action=update&token=<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['tokencommon']->value, ENT_QUOTES, 'UTF-8', true);?>
" method="POST">
    <div class="form-group">
        <label class="conf_title"><?php echo smartyTranslate(array('s'=>'Show calendar inline?','mod'=>'eydatepicker'),$_smarty_tpl);?>
</label>

        <input type="radio" name="PS_CALENDAR_INLINE" id="active_on" value="1"<?php if ($_smarty_tpl->tpl_vars['PS_CALENDAR_INLINE']->value==1) {?> checked="checked"<?php }?>/>
        <label class="t" for="active_on"> Oui </label>
        <input type="radio" name="PS_CALENDAR_INLINE" id="active_off" value="0"<?php if ($_smarty_tpl->tpl_vars['PS_CALENDAR_INLINE']->value!=1) {?> checked="checked"<?php }?>/>
        <label class="t" for="active_off"> Non </label>
        <p class="help-block"><?php echo smartyTranslate(array('s'=>'Shows the calendar inline rather than using an input field','mod'=>'eydatepicker'),$_smarty_tpl);?>
</p>
    </div>
    <div class="form-group">
        <label class="conf_title"><?php echo smartyTranslate(array('s'=>'Make selection required','mod'=>'eydatepicker'),$_smarty_tpl);?>
</label>

        <input type="radio" name="PS_CALENDAR_REQUIRED" id="required_on" value="1"<?php if (isset($_smarty_tpl->tpl_vars['PS_CALENDAR_REQUIRED']->value)&&$_smarty_tpl->tpl_vars['PS_CALENDAR_REQUIRED']->value==1) {?> checked="checked"<?php }?>/>
        <label class="t" for="required_on"> Oui </label>
        <input type="radio" name="PS_CALENDAR_REQUIRED" id="required_off" value="0"<?php if (!isset($_smarty_tpl->tpl_vars['PS_CALENDAR_REQUIRED']->value)||$_smarty_tpl->tpl_vars['PS_CALENDAR_REQUIRED']->value!=1) {?> checked="checked"<?php }?>/>
        <label class="t" for="required_off"> Non </label>
        <p class="help-block"><?php echo smartyTranslate(array('s'=>'Forces the calendar as required','mod'=>'eydatepicker'),$_smarty_tpl);?>
</p>
    </div>
    <div class="form-group">
        <label for="carrierList"><?php echo smartyTranslate(array('s'=>'Show for Carriers','mod'=>'eydatepicker'),$_smarty_tpl);?>
</label>
        <select multiple class="form-control" id="carrierList" name="PSDK_CARRIERS_FILTER[]">
            <?php  $_smarty_tpl->tpl_vars['carrier'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['carrier']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['carriers']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['carrier']->key => $_smarty_tpl->tpl_vars['carrier']->value) {
$_smarty_tpl->tpl_vars['carrier']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['carrier']->key;
?>
                <option value="<?php echo $_smarty_tpl->tpl_vars['carrier']->value['id_carrier'];?>
" <?php if (in_array($_smarty_tpl->tpl_vars['carrier']->value['id_carrier'],$_smarty_tpl->tpl_vars['PSDK_CARRIERS_FILTER']->value)) {?>selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['carrier']->value['name'];?>
 (<?php echo $_smarty_tpl->tpl_vars['carrier']->value['delay'];?>
)</option>
            <?php } ?>
        </select>
        <p class="help-block"><?php echo smartyTranslate(array('s'=>'Datepicker will apppear for selected carriers only','mod'=>'eydatepicker'),$_smarty_tpl);?>
</p>
    </div>
    
  <input type="hidden" class="form-control required number" size="20" name="PS_CUTOFF_HOUR" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['PS_CUTOFF_HOUR']->value, ENT_QUOTES, 'UTF-8', true);?>
">  
   <input type="hidden" class="form-control required number" size="20" name="PS_FIRST_AVAILABLE_DELIVERY_DAY" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['PS_FIRST_AVAILABLE_DELIVERY_DAY']->value, ENT_QUOTES, 'UTF-8', true);?>
"> 
<input type="hidden" class="form-control required number" size="20" name="PS_HOURS_TO_PREPARE_ORDER" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['PS_HOURS_TO_PREPARE_ORDER']->value, ENT_QUOTES, 'UTF-8', true);?>
">
<input type="hidden" class="form-control required number" size="20" name="PS_FUTURE_DAYS" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['PS_FUTURE_DAYS']->value, ENT_QUOTES, 'UTF-8', true);?>
">


    
<!--    
    <div class="form-group">
        <label class="conf_title"><?php echo smartyTranslate(array('s'=>'Cut off Hour','mod'=>'eydatepicker'),$_smarty_tpl);?>
</label>
        <input type="text" class="form-control required number" size="20" name="PS_CUTOFF_HOUR" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['PS_CUTOFF_HOUR']->value, ENT_QUOTES, 'UTF-8', true);?>
">
        <p class="help-block"><?php echo smartyTranslate(array('s'=>'Hour from wich the very next available day is not enabled anymore. Input a number between 0 and 23','mod'=>'eydatepicker'),$_smarty_tpl);?>
</p>
    </div>
    <div class="form-group">
        <label class="conf_title"><?php echo smartyTranslate(array('s'=>'First Delivery Day','mod'=>'eydatepicker'),$_smarty_tpl);?>
</label>
        <input type="text" class="form-control required number" size="20" name="PS_FIRST_AVAILABLE_DELIVERY_DAY" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['PS_FIRST_AVAILABLE_DELIVERY_DAY']->value, ENT_QUOTES, 'UTF-8', true);?>
">
        <p class="help-block"><?php echo smartyTranslate(array('s'=>'First Available Delivery Day - e.g. 1 means one day after purchasing date','mod'=>'eydatepicker'),$_smarty_tpl);?>
</p>
    </div>
    <div class="form-group">
        <label class="conf_title"><?php echo smartyTranslate(array('s'=>'Hours to prepare order','mod'=>'eydatepicker'),$_smarty_tpl);?>
</label>
        <input type="text" class="form-control required number" size="20" name="PS_HOURS_TO_PREPARE_ORDER" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['PS_HOURS_TO_PREPARE_ORDER']->value, ENT_QUOTES, 'UTF-8', true);?>
">
        <p class="help-block"><?php echo smartyTranslate(array('s'=>'When deliverying in the same day you may want past hour intervals not to show for selection. Decimals values are supported, for example 0.5=30min','mod'=>'eydatepicker'),$_smarty_tpl);?>
</p>
    </div>
    <div class="form-group">
        <label class="conf_title"><?php echo smartyTranslate(array('s'=>'Days ahead','mod'=>'eydatepicker'),$_smarty_tpl);?>
</label>
        <input type="text" class="form-control required number" size="20" name="PS_FUTURE_DAYS" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['PS_FUTURE_DAYS']->value, ENT_QUOTES, 'UTF-8', true);?>
">
        <p class="help-block"><?php echo smartyTranslate(array('s'=>'How many days ahead to show in calendar?','mod'=>'eydatepicker'),$_smarty_tpl);?>
</p>
    </div>
-->
    <div class="margin-form"><input type="submit" name="submitConfiguration" value="<?php echo smartyTranslate(array('s'=>'Save','mod'=>'eydatepicker'),$_smarty_tpl);?>
" class="btn btn-primary" /></div>
</form>


<script type="text/JavaScript">
    	
        $('#datepicker_ajax_form').submit(function() {
        if($( '#datepicker_ajax_form' ).parsley( 'validate' )) {
        submittedForm = $(this);
        $.post( submittedForm.attr('action'), submittedForm.serialize()).done(function(data) {
        bootbox.alert(data);
        });
        }
        return false;
        });	
    	
</script><?php }} ?>
