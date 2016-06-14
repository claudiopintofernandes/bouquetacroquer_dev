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
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="">
		<meta name="author" content="">	

		<link href="//netdna.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
		<link href="{$basedir|escape:'html':'UTF-8'}modules/{$modulename|escape:'html':'UTF-8'}/css/bootstrap-editable.css" rel="stylesheet" type="text/css" />

		<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
		<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>

		<script src="//netdna.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>

		<link href="{$basedir|escape:'html':'UTF-8'}modules/{$modulename|escape:'html':'UTF-8'}/css/admin.css" rel="stylesheet" type="text/css" />
		<script src="{$basedir|escape:'html':'UTF-8'}modules/{$modulename|escape:'html':'UTF-8'}/js/admin/moment.min.js"></script>
		<script src="{$basedir|escape:'html':'UTF-8'}modules/{$modulename|escape:'html':'UTF-8'}/js/admin/bootstrap-editable.min.js"></script>
		<script src="{$basedir|escape:'html':'UTF-8'}modules/{$modulename|escape:'html':'UTF-8'}/js/admin/bootbox.min.js"></script>
		<script src="{$basedir|escape:'html':'UTF-8'}modules/{$modulename|escape:'html':'UTF-8'}/js/admin/parsley.min.js"></script>
		<script src="{$basedir|escape:'html':'UTF-8'}modules/{$modulename|escape:'html':'UTF-8'}/js/admin/app.js"></script>
		<title>{l s='Datepicker with hours' mod='eydatepicker'}</title>
	</head>
	<body>

		<div class="container">

			<div class="row">
				<div class="col-sm-12">

					<div class="panel panel-info">
						<div class="panel-heading">
							<h3 class="panel-title">
								{l s='Datepicker with hours' mod='eydatepicker'}
								<span class="pull-right">
									<a href="{$web_path_backoffice|escape:'html':'UTF-8'}">
										<small><span class="glyphicon glyphicon-arrow-left"></span> RETOUR</small>
									</a>
								</span>								
							</h3>

						</div>
						<div class="panel-body">

							{if $IS_MULTISHOP == 1}
								<div class="field">
									<label class="conf_title">{l s='Select shop' mod='eydatepicker'}</label>
									<div class="margin-form">
										{$shop_list_html_select|escape:'html':'UTF-8'}
										<p class="preference_description">{l s='Choose for which shop you wish to update configuration' mod='eydatepicker'}</p>
									</div>
								</div>
							{/if}		

							<div id="navigation_tabs">
								<ul class="nav nav-tabs">
									
										<li class="active"><a href="{$web_path_controllers|escape:'html':'UTF-8'}configuration.php?token={$tokencommon|escape:'html':'UTF-8'}" data-toggle="tab"><span class="glyphicon glyphicon-wrench"></span> Configuration</a></li>
										<li><a href="{$web_path_controllers|escape:'html':'UTF-8'}availableweekdays.php?token={$tokencommon|escape:'html':'UTF-8'}" data-toggle="tab"><span class="glyphicon glyphicon-calendar"></span> Disponibilité en semaine</a></li>
										<li><a href="{$web_path_controllers|escape:'html':'UTF-8'}restricteddays.php?token={$tokencommon|escape:'html':'UTF-8'}" data-toggle="tab"><span class="glyphicon glyphicon-ban-circle"></span> Restriction Jours (Jours fériés)</a></li>									
<!--										
										<li class="active"><a href="{$web_path_controllers|escape:'html':'UTF-8'}register.php?token={$tokencommon|escape:'html':'UTF-8'}" data-toggle="tab">Register</a></li>			
									
  										<li><a href="{$web_path_controllers|escape:'html':'UTF-8'}support.php?token={$tokencommon|escape:'html':'UTF-8'}" data-toggle="tab"><span class="glyphicon glyphicon-question-sign"></span> Support</a></li> -->
								</ul>
							</div>
						</div>
					</div>

				</div>
			</div>

		</div>