{*
/**
* NOTICE OF LICENSE
* 
* A friendly notice to thank you for been honest.
* The plugin has to be used only if purchased from https://addons.prestashop.com or directly from developer
* Reselling, sharing or using the same licence for multiple shops is prohibited 
* 
*  @author    Radu G.
*  @copyright ecommy.com
*  @license   https://www.ecommy.com/licence.txt
*/
*}
<div id="datepicker_container" {if !$show_calendar_inline}class="form-inline"{/if}>

    <div class="form-group">
        <label>{l s='Select Date of Delivery' mod='eydatepicker'}</label> <br />

        {if $show_calendar_inline}
            <div id="shipping_date"></div>
        {else}
            <input class="form-control" type="text" id="shipping_date" name="shipping_date_raw" value="{if isset($ey_delivery_info)}{$ey_delivery_info['formatted_shipping_date']}{/if}" placeholder="{l s='Pick your desired delivery date' mod='eydatepicker'}" readonly="readonly" />
        {/if}        
        <input type="hidden" id="processed_shipping_date" name="shipping_date" value="{if isset($ey_delivery_info)}{$ey_delivery_info['shipping_date']}{/if}" />
    </div>

    <script type="text/javascript">
		

        {literal}
//ajax timouts settings
            $.ajaxSetup({
                timeout: 10000, //10 secs
                cache: false //disable cache by default
            });

            /* create an array of days which need to be disabled */
            var disabledDays = {/literal}{$disableDays}{literal};
            var disableWeekDays = {/literal}{$disableWeekDays}{literal};
			
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
                $('#shipping_date').datepicker({{/literal}
            {if isset($ey_delivery_info)}defaultDate: '{$ey_delivery_info['formatted_shipping_date']}',{/if}
            {literal}		
                    dateFormat: '{/literal}{$dateFormat}{literal}',
                    /*minDate: {/literal}{$minDate}{literal},*/
                    maxDate: {/literal}{$maxDate}{literal},
                    constrainInput: true,
                    beforeShowDay: restrictDays,
                    showOn: "button",
                    buttonImage: "{/literal}{$basedir}modules/eydatepicker/img/calendar.gif{literal}",
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
            {/literal}
            {if isset($ey_delivery_info)}
                {literal}
                    $("#hoursDiv").load(baseDir + "modules/eydatepicker/controllers/time_interval.php", {selDate: '{/literal}{$ey_delivery_info["shipping_date"]}', selTime: '{$ey_delivery_info["shipping_hour"]}'{literal}});
                {/literal}
            {/if}
            {literal}



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
                var availCarrierList = {/literal}{$avail_carrier_list}{literal};
                var selected_carrier = parseInt($('.delivery_option_radio:checked').val());
				var min_dates = {/literal}{$minDates}{literal};
				var min_date = min_dates[selected_carrier];
				 $('#shipping_date').datepicker('option','minDate',min_date);
                if (availCarrierList.indexOf(selected_carrier) > -1) {
                    // show calendar 
                    $('#datepicker_container').show();
                    $('#calendar_required').val(parseInt({/literal}{$is_calendar_required}{literal}));
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
            {/literal}
        </script>
        <div class="form-group" id="hoursDiv"></div>
    </div>
    <input type="hidden" id="calendar_required" name="calendar_required" value="{$is_calendar_required}" />