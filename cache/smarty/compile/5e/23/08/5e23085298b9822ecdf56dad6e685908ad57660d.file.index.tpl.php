<?php /* Smarty version Smarty-3.1.19, created on 2016-03-10 14:55:06
         compiled from "/srv/data/web/vhosts/www.bouquetacroquer.fr/htdocs/modules/eydatepicker/views/templates/admin/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:181061449656e17cba9f2aa7-16917920%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5e23085298b9822ecdf56dad6e685908ad57660d' => 
    array (
      0 => '/srv/data/web/vhosts/www.bouquetacroquer.fr/htdocs/modules/eydatepicker/views/templates/admin/index.tpl',
      1 => 1453301897,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '181061449656e17cba9f2aa7-16917920',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'basedir' => 0,
    'modulename' => 0,
    'web_path_backoffice' => 0,
    'IS_MULTISHOP' => 0,
    'shop_list_html_select' => 0,
    'web_path_controllers' => 0,
    'tokencommon' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_56e17cbaafb796_51069281',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56e17cbaafb796_51069281')) {function content_56e17cbaafb796_51069281($_smarty_tpl) {?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="">
		<meta name="author" content="">	

		<link href="//netdna.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
		<link href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['basedir']->value, ENT_QUOTES, 'UTF-8', true);?>
modules/<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['modulename']->value, ENT_QUOTES, 'UTF-8', true);?>
/css/bootstrap-editable.css" rel="stylesheet" type="text/css" />

		<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
		<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>

		<script src="//netdna.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>

		<link href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['basedir']->value, ENT_QUOTES, 'UTF-8', true);?>
modules/<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['modulename']->value, ENT_QUOTES, 'UTF-8', true);?>
/css/admin.css" rel="stylesheet" type="text/css" />
		<script src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['basedir']->value, ENT_QUOTES, 'UTF-8', true);?>
modules/<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['modulename']->value, ENT_QUOTES, 'UTF-8', true);?>
/js/admin/moment.min.js"></script>
		<script src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['basedir']->value, ENT_QUOTES, 'UTF-8', true);?>
modules/<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['modulename']->value, ENT_QUOTES, 'UTF-8', true);?>
/js/admin/bootstrap-editable.min.js"></script>
		<script src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['basedir']->value, ENT_QUOTES, 'UTF-8', true);?>
modules/<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['modulename']->value, ENT_QUOTES, 'UTF-8', true);?>
/js/admin/bootbox.min.js"></script>
		<script src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['basedir']->value, ENT_QUOTES, 'UTF-8', true);?>
modules/<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['modulename']->value, ENT_QUOTES, 'UTF-8', true);?>
/js/admin/parsley.min.js"></script>
		<script src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['basedir']->value, ENT_QUOTES, 'UTF-8', true);?>
modules/<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['modulename']->value, ENT_QUOTES, 'UTF-8', true);?>
/js/admin/app.js"></script>
		<title><?php echo smartyTranslate(array('s'=>'Datepicker with hours','mod'=>'eydatepicker'),$_smarty_tpl);?>
</title>
	</head>
	<body>

		<div class="container">

			<div class="row">
				<div class="col-sm-12">

					<div class="panel panel-info">
						<div class="panel-heading">
							<h3 class="panel-title">
								<?php echo smartyTranslate(array('s'=>'Datepicker with hours','mod'=>'eydatepicker'),$_smarty_tpl);?>

								<span class="pull-right">
									<a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['web_path_backoffice']->value, ENT_QUOTES, 'UTF-8', true);?>
">
										<small><span class="glyphicon glyphicon-arrow-left"></span> RETOUR</small>
									</a>
								</span>								
							</h3>

						</div>
						<div class="panel-body">

							<?php if ($_smarty_tpl->tpl_vars['IS_MULTISHOP']->value==1) {?>
								<div class="field">
									<label class="conf_title"><?php echo smartyTranslate(array('s'=>'Select shop','mod'=>'eydatepicker'),$_smarty_tpl);?>
</label>
									<div class="margin-form">
										<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['shop_list_html_select']->value, ENT_QUOTES, 'UTF-8', true);?>

										<p class="preference_description"><?php echo smartyTranslate(array('s'=>'Choose for which shop you wish to update configuration','mod'=>'eydatepicker'),$_smarty_tpl);?>
</p>
									</div>
								</div>
							<?php }?>		

							<div id="navigation_tabs">
								<ul class="nav nav-tabs">
									
										<li class="active"><a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['web_path_controllers']->value, ENT_QUOTES, 'UTF-8', true);?>
configuration.php?token=<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['tokencommon']->value, ENT_QUOTES, 'UTF-8', true);?>
" data-toggle="tab"><span class="glyphicon glyphicon-wrench"></span> Configuration</a></li>
										<li><a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['web_path_controllers']->value, ENT_QUOTES, 'UTF-8', true);?>
availableweekdays.php?token=<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['tokencommon']->value, ENT_QUOTES, 'UTF-8', true);?>
" data-toggle="tab"><span class="glyphicon glyphicon-calendar"></span> Disponibilité en semaine</a></li>
										<li><a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['web_path_controllers']->value, ENT_QUOTES, 'UTF-8', true);?>
restricteddays.php?token=<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['tokencommon']->value, ENT_QUOTES, 'UTF-8', true);?>
" data-toggle="tab"><span class="glyphicon glyphicon-ban-circle"></span> Restriction Jours (Jours fériés)</a></li>									
<!--										
										<li class="active"><a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['web_path_controllers']->value, ENT_QUOTES, 'UTF-8', true);?>
register.php?token=<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['tokencommon']->value, ENT_QUOTES, 'UTF-8', true);?>
" data-toggle="tab">Register</a></li>			
									
  										<li><a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['web_path_controllers']->value, ENT_QUOTES, 'UTF-8', true);?>
support.php?token=<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['tokencommon']->value, ENT_QUOTES, 'UTF-8', true);?>
" data-toggle="tab"><span class="glyphicon glyphicon-question-sign"></span> Support</a></li> -->
								</ul>
							</div>
						</div>
					</div>

				</div>
			</div>

		</div><?php }} ?>
