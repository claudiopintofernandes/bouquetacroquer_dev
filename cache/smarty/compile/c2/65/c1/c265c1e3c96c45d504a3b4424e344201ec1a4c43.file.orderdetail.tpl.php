<?php /* Smarty version Smarty-3.1.19, created on 2016-03-08 08:10:23
         compiled from "/srv/data/web/vhosts/www.bouquetacroquer.fr/htdocs/modules/eydatepicker/views/templates/hook/orderdetail.tpl" */ ?>
<?php /*%%SmartyHeaderCode:142281278156de7adf23c526-30911297%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c265c1e3c96c45d504a3b4424e344201ec1a4c43' => 
    array (
      0 => '/srv/data/web/vhosts/www.bouquetacroquer.fr/htdocs/modules/eydatepicker/views/templates/hook/orderdetail.tpl',
      1 => 1453301898,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '142281278156de7adf23c526-30911297',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'shipping_date' => 0,
    'shipping_hour' => 0,
    'basedir' => 0,
    'tokencommon' => 0,
    'shipping_date_raw' => 0,
    'id' => 0,
    'id_order' => 0,
    'dateFormat' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_56de7adf2717b9_30990875',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56de7adf2717b9_30990875')) {function content_56de7adf2717b9_30990875($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_escape')) include '/srv/data/web/vhosts/www.bouquetacroquer.fr/htdocs/tools/smarty/plugins/modifier.escape.php';
?>

<div class="panel">
	<fieldset>
		<legend><?php echo smartyTranslate(array('s'=>'Selected Shipping Date','mod'=>'eydatepicker'),$_smarty_tpl);?>
</legend>

		<div class="clear" style="float: left; margin-right: 10px;"><a href="#" id="delivery_text"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['shipping_date']->value, ENT_QUOTES, 'UTF-8', true);?>
 <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['shipping_hour']->value, ENT_QUOTES, 'UTF-8', true);?>
</a>

			<form action="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['basedir']->value, ENT_QUOTES, 'UTF-8', true);?>
modules/eydatepicker/controllers/delivery_info.php?token=<?php echo $_smarty_tpl->tpl_vars['tokencommon']->value;?>
" method="POST" id="delivery_form" style="display: none" class="form-inline">
				<div class="form-group">
					<input type="text" value="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['dateFormat'][0][0]->dateFormat(array('date'=>$_smarty_tpl->tpl_vars['shipping_date_raw']->value,'full'=>0),$_smarty_tpl);?>
" id="shipping_date" name="shipping_date_raw" readonly="readonly" />
				</div>
				<div class="form-group">
					<input type="text" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['shipping_hour']->value, ENT_QUOTES, 'UTF-8', true);?>
" name="shipping_hour" />
				</div>
				<input type="hidden" id="processed_shipping_date" name="shipping_date" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['shipping_date']->value, ENT_QUOTES, 'UTF-8', true);?>
" />
				<input type="hidden" name="id" value="<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['id']->value, 'intval');?>
" />
				<input type="hidden" name="id_order" value="<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['id_order']->value, 'intval');?>
" />				
				<input type="submit" class="btn btn-info" value="update" />
			</form>

		</div>
	</fieldset>
</div>

<script type="text/javascript">
	
		$('#delivery_text').click(function() {
			$('#delivery_text').hide();
			$('#delivery_form').show();

			return false;
		});

		$('#delivery_form').submit(function() {
			submittedForm = $(this);
			$.post(submittedForm.attr('action'), submittedForm.serialize()).done(function(data) {
				$('#delivery_form').text(data);
			});
			return false;
		});

		$('#shipping_date').datepicker({
			dateFormat: '<?php echo $_smarty_tpl->tpl_vars['dateFormat']->value;?>
',
			showOn: "button",
			showOn: "both",
					onSelect: function(dateText, inst) {
						var theDate = new Date(Date.parse($(this).datepicker('getDate')));
						var dateFormatted = $.datepicker.formatDate('yy-mm-dd', theDate);
						$('#processed_shipping_date').val(dateFormatted);
					}
		});
	
</script><?php }} ?>
