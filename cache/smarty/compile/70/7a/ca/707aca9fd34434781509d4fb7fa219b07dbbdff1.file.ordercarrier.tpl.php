<?php /* Smarty version Smarty-3.1.19, created on 2016-03-08 02:02:12
         compiled from "/srv/data/web/vhosts/www.bouquetacroquer.fr/htdocs/modules/eydatepicker/views/templates/hook/ordercarrier.tpl" */ ?>
<?php /*%%SmartyHeaderCode:179134565556de2494cecf51-70292442%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '707aca9fd34434781509d4fb7fa219b07dbbdff1' => 
    array (
      0 => '/srv/data/web/vhosts/www.bouquetacroquer.fr/htdocs/modules/eydatepicker/views/templates/hook/ordercarrier.tpl',
      1 => 1453301898,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '179134565556de2494cecf51-70292442',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'show_calendar_inline' => 0,
    'ey_delivery_info' => 0,
    'disableDays' => 0,
    'disableWeekDays' => 0,
    'dateFormat' => 0,
    'minDate' => 0,
    'maxDate' => 0,
    'basedir' => 0,
    'avail_carrier_list' => 0,
    'minDates' => 0,
    'is_calendar_required' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_56de2494d4cc74_08813379',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56de2494d4cc74_08813379')) {function content_56de2494d4cc74_08813379($_smarty_tpl) {?>
<div id="datepicker_container" <?php if (!$_smarty_tpl->tpl_vars['show_calendar_inline']->value) {?>class="form-inline"<?php }?>>

    <div class="form-group">
        <label><?php echo smartyTranslate(array('s'=>'Select Date of Delivery','mod'=>'eydatepicker'),$_smarty_tpl);?>
</label> <br />

        <?php if ($_smarty_tpl->tpl_vars['show_calendar_inline']->value) {?>
            <div id="shipping_date"></div>
        <?php } else { ?>
            <input class="form-control" type="text" id="shipping_date" name="shipping_date_raw" value="<?php if (isset($_smarty_tpl->tpl_vars['ey_delivery_info']->value)) {?><?php echo $_smarty_tpl->tpl_vars['ey_delivery_info']->value['formatted_shipping_date'];?>
<?php }?>" placeholder="<?php echo smartyTranslate(array('s'=>'Pick your desired delivery date','mod'=>'eydatepicker'),$_smarty_tpl);?>
" readonly="readonly" />
        <?php }?>        
        <input type="hidden" id="processed_shipping_date" name="shipping_date" value="<?php if (isset($_smarty_tpl->tpl_vars['ey_delivery_info']->value)) {?><?php echo $_smarty_tpl->tpl_vars['ey_delivery_info']->value['shipping_date'];?>
<?php }?>" />
    </div>

    <script type="text/javascript">
		

        
//ajax timouts settings
            $.ajaxSetup({
                timeout: 10000, //10 secs
                cache: false //disable cache by default
            });

            /* create an array of days which need to be disabled */
            var disabledDays = <?php echo $_smarty_tpl->tpl_vars['disableDays']->value;?>
;
            var disableWeekDays = <?php echo $_smarty_tpl->tpl_vars['disableWeekDays']->value;?>
;
			
            function restrictDays(date) {
                var m = date.getMonth(), d = date.getDate(), y = date.getFullYear();
                var weekDay = date.getDay();
                for (i = 0; i < disabledDays.length; i++) {
                    if ($.inArray((m + 1) + '-' + d, disabledDays) != -1) {
                        return [false];
                    }
                }

                if ($.inArray(weekDay, disableWeekDays) != -1) {
                    return [false];
                }
+6
                return [true];
            }

            $(document).ready(function () {
                $('#shipping_date').datepicker({
            <?php if (isset($_smarty_tpl->tpl_vars['ey_delivery_info']->value)) {?>defaultDate: '<?php echo $_smarty_tpl->tpl_vars['ey_delivery_info']->value['formatted_shipping_date'];?>
',<?php }?>
            		
                    dateFormat: '<?php echo $_smarty_tpl->tpl_vars['dateFormat']->value;?>
',
                    /*minDate: <?php echo $_smarty_tpl->tpl_vars['minDate']->value;?>
,*/
                    maxDate: <?php echo $_smarty_tpl->tpl_vars['maxDate']->value;?>
,
                    constrainInput: true,
                    beforeShowDay: restrictDays,
                    showOn: "button",
                    buttonImage: "<?php echo $_smarty_tpl->tpl_vars['basedir']->value;?>
modules/eydatepicker/img/calendar.gif",
                                buttonImageOnly: true,
                                showOn: "both",
                                        onSelect: function (dateText, inst) {
                                            var theDate = new Date(Date.parse($(this).datepicker('getDate')));
                                            var dateFormatted = $.datepicker.formatDate('yy-mm-dd', theDate);
                                            $('#processed_shipping_date').val(dateFormatted);
                                            loadPage(dateFormatted);
                                        }
                            });
                        });


                        function loadPage(rawDate) {
                            $("#hoursDiv").load(baseDir + "modules/eydatepicker/controllers/time_interval.php", {selDate: rawDate});
                        }
            
            <?php if (isset($_smarty_tpl->tpl_vars['ey_delivery_info']->value)) {?>
                
                    $("#hoursDiv").load(baseDir + "modules/eydatepicker/controllers/time_interval.php", {selDate: '<?php echo $_smarty_tpl->tpl_vars['ey_delivery_info']->value["shipping_date"];?>
', selTime: '<?php echo $_smarty_tpl->tpl_vars['ey_delivery_info']->value["shipping_hour"];?>
'});
                
            <?php }?>
            



            function check_shipping_date() {
                is_calendar_required = $('#calendar_required').val();

                if (is_calendar_required != 1) {
                    return true;
                }

                if ($('#processed_shipping_date').val() == '') {
                    alert(datepickerWarning);
                    $('#shipping_date').focus();
                    $('#shipping_date').trigger('click');
                    return false;
                }
                else {
                    return true;
                }
            }

            function hideCalendar() {
                var availCarrierList = <?php echo $_smarty_tpl->tpl_vars['avail_carrier_list']->value;?>
;
                var selected_carrier = parseInt($('.delivery_option_radio:checked').val());
				var min_dates = <?php echo $_smarty_tpl->tpl_vars['minDates']->value;?>
;
				var min_date = min_dates[selected_carrier];
				 $('#shipping_date').datepicker('option','minDate',min_date);
                if (availCarrierList.indexOf(selected_carrier) > -1) {
                    // show calendar 
                    $('#datepicker_container').show();
                    $('#calendar_required').val(parseInt(<?php echo $_smarty_tpl->tpl_vars['is_calendar_required']->value;?>
));
                } else {
                    $('#datepicker_container').hide();
                    $('#calendar_required').val(0);
                }
            }
            
            $(document).ready(function () {
                if ($('#order form').length) {
                    $('#order form').submit(function () {
                        return check_shipping_date()
                    });
                }
                else {
                    //one page checkout
                    $('#HOOK_PAYMENT a').die("click");
                    $('#HOOK_PAYMENT a').live("click", function () {
                        return check_shipping_date()
                    });
                    $('#paypal_payment_form').live("submit", function () {
                        return check_shipping_date()
                    });
                }
                $('.delivery_option_radio').die("click");
                $('.delivery_option_radio').click(function () {
                    hideCalendar();
                });
                hideCalendar();
            });
            
        </script>
        <div class="form-group" id="hoursDiv"></div>
    </div>
    <input type="hidden" id="calendar_required" name="calendar_required" value="<?php echo $_smarty_tpl->tpl_vars['is_calendar_required']->value;?>
" /><?php }} ?>
