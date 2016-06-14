{*
/*
* NOTICE OF LICENSE
* 
* A friendly notice to thank you for been honest.
* The plugin has to be used only if purchased from https://addons.prestashop.com or directly from developer
* Reselling, sharing or using the same licence for multiple shops is prohibited 
* 
* @author Radu G.
* @copyright  Radu G.
*/
*}
<form id="datepicker_ajax_form" action="{$web_path_controllers|escape:'html':'UTF-8'}/configuration.php?action=update&token={$tokencommon|escape:'html':'UTF-8'}" method="POST">
    <div class="form-group">
        <label class="conf_title">{l s='Show calendar inline?' mod='eydatepicker'}</label>

        <input type="radio" name="PS_CALENDAR_INLINE" id="active_on" value="1"{if $PS_CALENDAR_INLINE==1} checked="checked"{/if}/>
        <label class="t" for="active_on"> Oui </label>
        <input type="radio" name="PS_CALENDAR_INLINE" id="active_off" value="0"{if $PS_CALENDAR_INLINE!=1} checked="checked"{/if}/>
        <label class="t" for="active_off"> Non </label>
        <p class="help-block">{l s='Shows the calendar inline rather than using an input field' mod='eydatepicker'}</p>
    </div>
    <div class="form-group">
        <label class="conf_title">{l s='Make selection required' mod='eydatepicker'}</label>

        <input type="radio" name="PS_CALENDAR_REQUIRED" id="required_on" value="1"{if isset($PS_CALENDAR_REQUIRED) && $PS_CALENDAR_REQUIRED==1} checked="checked"{/if}/>
        <label class="t" for="required_on"> Oui </label>
        <input type="radio" name="PS_CALENDAR_REQUIRED" id="required_off" value="0"{if !isset($PS_CALENDAR_REQUIRED) || $PS_CALENDAR_REQUIRED!=1} checked="checked"{/if}/>
        <label class="t" for="required_off"> Non </label>
        <p class="help-block">{l s='Forces the calendar as required' mod='eydatepicker'}</p>
    </div>
    <div class="form-group">
        <label for="carrierList">{l s='Show for Carriers' mod='eydatepicker'}</label>
        <select multiple class="form-control" id="carrierList" name="PSDK_CARRIERS_FILTER[]">
            {foreach from=$carriers key=k item=carrier}
                <option value="{$carrier.id_carrier}" {if in_array($carrier.id_carrier, $PSDK_CARRIERS_FILTER)}selected{/if}>{$carrier.name} ({$carrier.delay})</option>
            {/foreach}
        </select>
        <p class="help-block">{l s='Datepicker will apppear for selected carriers only' mod='eydatepicker'}</p>
    </div>
    
  <input type="hidden" class="form-control required number" size="20" name="PS_CUTOFF_HOUR" value="{$PS_CUTOFF_HOUR|escape:'html':'UTF-8'}">  
   <input type="hidden" class="form-control required number" size="20" name="PS_FIRST_AVAILABLE_DELIVERY_DAY" value="{$PS_FIRST_AVAILABLE_DELIVERY_DAY|escape:'html':'UTF-8'}"> 
<input type="hidden" class="form-control required number" size="20" name="PS_HOURS_TO_PREPARE_ORDER" value="{$PS_HOURS_TO_PREPARE_ORDER|escape:'html':'UTF-8'}">
<input type="hidden" class="form-control required number" size="20" name="PS_FUTURE_DAYS" value="{$PS_FUTURE_DAYS|escape:'html':'UTF-8'}">


    
<!--    
    <div class="form-group">
        <label class="conf_title">{l s='Cut off Hour' mod='eydatepicker'}</label>
        <input type="text" class="form-control required number" size="20" name="PS_CUTOFF_HOUR" value="{$PS_CUTOFF_HOUR|escape:'html':'UTF-8'}">
        <p class="help-block">{l s='Hour from wich the very next available day is not enabled anymore. Input a number between 0 and 23' mod='eydatepicker'}</p>
    </div>
    <div class="form-group">
        <label class="conf_title">{l s='First Delivery Day' mod='eydatepicker'}</label>
        <input type="text" class="form-control required number" size="20" name="PS_FIRST_AVAILABLE_DELIVERY_DAY" value="{$PS_FIRST_AVAILABLE_DELIVERY_DAY|escape:'html':'UTF-8'}">
        <p class="help-block">{l s='First Available Delivery Day - e.g. 1 means one day after purchasing date' mod='eydatepicker'}</p>
    </div>
    <div class="form-group">
        <label class="conf_title">{l s='Hours to prepare order' mod='eydatepicker'}</label>
        <input type="text" class="form-control required number" size="20" name="PS_HOURS_TO_PREPARE_ORDER" value="{$PS_HOURS_TO_PREPARE_ORDER|escape:'html':'UTF-8'}">
        <p class="help-block">{l s='When deliverying in the same day you may want past hour intervals not to show for selection. Decimals values are supported, for example 0.5=30min' mod='eydatepicker'}</p>
    </div>
    <div class="form-group">
        <label class="conf_title">{l s='Days ahead' mod='eydatepicker'}</label>
        <input type="text" class="form-control required number" size="20" name="PS_FUTURE_DAYS" value="{$PS_FUTURE_DAYS|escape:'html':'UTF-8'}">
        <p class="help-block">{l s='How many days ahead to show in calendar?' mod='eydatepicker'}</p>
    </div>
-->
    <div class="margin-form"><input type="submit" name="submitConfiguration" value="{l s='Save' mod='eydatepicker'}" class="btn btn-primary" /></div>
</form>


<script type="text/JavaScript">
    {literal}	
        $('#datepicker_ajax_form').submit(function() {
        if($( '#datepicker_ajax_form' ).parsley( 'validate' )) {
        submittedForm = $(this);
        $.post( submittedForm.attr('action'), submittedForm.serialize()).done(function(data) {
        bootbox.alert(data);
        });
        }
        return false;
        });	
    {/literal}	
</script>