<?php
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

include_once(dirname(__FILE__).'/../../../config/config.inc.php');
include_once(dirname(__FILE__).'/../../../config/settings.inc.php');
include_once(dirname(__FILE__).'/../../../classes/Cookie.php');

$selDateRaw = Tools::getValue('selDate');
$temp = explode('-', $selDateRaw);
$selDate = $temp[0].'-'.($temp[1] < 10 ? '0'.$temp[1] : $temp[1]).'-'.($temp[2] < 10 ? '0'.$temp[2] : $temp[2]);
$selTime = Tools::getValue('selTime');

$day = date('N', strtotime($selDateRaw));

$sel_date = date('Y-m-d', strtotime($selDateRaw));
$cur_date = date('Y-m-d', time());

$context_shop_id = (int)Shop::getContextShopID(true);
$data = Db::getInstance()->ExecuteS('SELECT hours FROM  '._DB_PREFIX_.'availableweekdays WHERE id_shop='.(int)$context_shop_id.' AND active=1 AND day=\''.(int)$day.'\' ORDER BY hours');
if (empty($data))
{
	/* get all shop settings if we don't have data for this shop */
	$data = Db::getInstance()->ExecuteS('SELECT hours FROM  '._DB_PREFIX_.'availableweekdays WHERE id_shop=0 AND active=1 AND day=\''.(int)$day.'\' ORDER BY hours');
}

$hours = $hours_raw = '';
if (isset($data[0]))
{
	$hours_raw = $data[0]['hours'];
	$hours = explode(',', $hours_raw);
}

/* order hours */
if (isset($hours[0]) && !empty($hours[0]))
{
	/* check hour format */
	$hour_format = 'H:i';
	if (strstr($hours_raw, 'AM') !== false || strstr($hours_raw, 'PM') !== false)
		$hour_format = 'h:i A';


	$options = '';
	foreach ($hours as $hour)
	{
		if ($cur_date == $sel_date)
		{
			/* remove past hours */
			$range_item = explode('-', $hour);
			$range_item_final = (isset($range_item[1]) ? $range_item[1] : $range_item[0]);

			/* date hour of range item */
			$current_time = time();
			$range_item_date = date('Y-m-d ', $current_time).' '.$range_item_final;

			$hour_item_time = strtotime($range_item_date);

			$preparation_time = Configuration::get('PS_HOURS_TO_PREPARE_ORDER') * 3600;

			/* don't display past items */
			if ($hour_item_time < $current_time + $preparation_time)
				continue;
			else
			{
				$interval_start_time = strtotime(date('Y-m-d ', $current_time).' '.$range_item[0]);
				/* only first item passed the hour */
				if ($current_time + $preparation_time > $interval_start_time)
					$hour = date($hour_format, $current_time + $preparation_time).(isset($range_item[1]) ? '-'.$range_item[1] : '');
			}
		}
		$options .= '<option value="'.$hour.'" '.($selTime == $hour?' selected':'').'>'.$hour.'</option>';
	}
	if (!empty($options)) {
        echo '<label>'.Translate::getModuleTranslation('eydatepicker', 'Select Time of Delivery', 'eydatepicker').'</label> <br />';
		echo '<select name="shipping_hour" id="shipping_hour" class="form-control" onChange="update_dates();">'.$options.'</select>';
    }
}

$is_onepagecheckoutps = false;
if (Module::isInstalled('onepagecheckoutps')){
	$module = Module::getInstanceByName('onepagecheckoutps');
	if (Validate::isLoadedObject($module) && $module->active)
		$is_onepagecheckoutps = true;
}

if (Configuration::get('PS_ORDER_PROCESS_TYPE') != 0 && !$is_onepagecheckoutps)
{
	/* onestepcheckout */
	$link = new LinkCore();
	?>
	<script type="text/JavaScript">
		function update_dates() {
		var recyclablePackage = 0;
		var gift = 0;
		var giftMessage = '';
		var idCarrier = 0;

		var shipping_hour = '';
		var shipping_date = '<?php echo !empty($selDateRaw) ? $selDateRaw : ''; ?>';

		if($('#shipping_hour').length) {
		shipping_hour = $('#shipping_hour').val();
		}

		if($('#processed_shipping_date').length) {
		shipping_date = $('#processed_shipping_date').val();
		}

		if ($('input#recyclable:checked').length)
		recyclablePackage = 1;
		if ($('input#gift:checked').length)
		{
		gift = 1;
		giftMessage = encodeURIComponent($('textarea#gift_message').val());
		}

		if ($('input[name=id_carrier]:checked').length)
		{
		idCarrier = $('input[name=id_carrier]:checked').val();
		checkedCarrier = idCarrier;
		}

		$.ajax({
		type: 'POST',
		url: orderOpcUrl,
		async: false,
		cache: false,
		dataType : "json",
		data: 'ajax=true&method=updateCarrierAndGetPayments&shipping_date='+shipping_date+'&shipping_hour='+shipping_hour+'&id_carrier=' + idCarrier + '&recyclable=' + recyclablePackage + '&gift=' + gift + '&gift_message=' + giftMessage + '&token=' + static_token ,
		success: function(jsonData)
		{
		if (jsonData.hasError)
		{
		var errors = '';
		for(error in jsonData.errors)

		if(error != 'indexOf')
		errors += jsonData.errors[error] + "\n";
		alert(errors);
		}
		else
		{
		updateCartSummary(jsonData.summary);
		updatePaymentMethods(jsonData);
		updateHookShoppingCart(jsonData.summary.HOOK_SHOPPING_CART);
		updateHookShoppingCartExtra(jsonData.summary.HOOK_SHOPPING_CART_EXTRA);
		$('#opc_payment_methods-overlay').fadeOut('slow');
		$('#opc_delivery_methods-overlay').fadeOut('slow');
		}
		},
		error: function(XMLHttpRequest, textStatus, errorThrown) {alert("TECHNICAL ERROR: unable to save carrier \n\nDetails:\nError thrown: " + XMLHttpRequest + "\n" + 'Text status: ' + textStatus);}
		});
		}
		update_dates();
	</script>
	<?php
} 
else
{
	?>
	<script type="text/JavaScript">
		function update_dates() {}
	</script>
	<?php
}