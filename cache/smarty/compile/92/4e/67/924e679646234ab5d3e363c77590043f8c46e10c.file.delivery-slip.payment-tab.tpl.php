<?php /* Smarty version Smarty-3.1.19, created on 2016-06-06 17:51:41
         compiled from "/srv/data/web/vhosts/www.bouquetacroquer.fr/htdocs/pdf/delivery-slip.payment-tab.tpl" */ ?>
<?php /*%%SmartyHeaderCode:37350760057559c0d8a5847-13479004%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '924e679646234ab5d3e363c77590043f8c46e10c' => 
    array (
      0 => '/srv/data/web/vhosts/www.bouquetacroquer.fr/htdocs/pdf/delivery-slip.payment-tab.tpl',
      1 => 1453302157,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '37350760057559c0d8a5847-13479004',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'order_invoice' => 0,
    'payment' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_57559c0d8c9193_54031923',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_57559c0d8c9193_54031923')) {function content_57559c0d8c9193_54031923($_smarty_tpl) {?>
<table id="payment-tab" width="100%" cellpadding="4" cellspacing="0">
	<tr>
		<td class="payment center small grey bold" width="44%"><?php echo smartyTranslate(array('s'=>'Payment Method','pdf'=>'true'),$_smarty_tpl);?>
</td>
		<td class="payment left white" width="56%">
			<table width="100%" border="0">
				<?php  $_smarty_tpl->tpl_vars['payment'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['payment']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['order_invoice']->value->getOrderPaymentCollection(); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['payment']->key => $_smarty_tpl->tpl_vars['payment']->value) {
$_smarty_tpl->tpl_vars['payment']->_loop = true;
?>
					<tr>
						<td class="right small"><?php echo $_smarty_tpl->tpl_vars['payment']->value->payment_method;?>
</td>
						<td class="right small"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['displayPrice'][0][0]->displayPriceSmarty(array('currency'=>$_smarty_tpl->tpl_vars['payment']->value->id_currency,'price'=>$_smarty_tpl->tpl_vars['payment']->value->amount),$_smarty_tpl);?>
</td>
					</tr>
				<?php }
if (!$_smarty_tpl->tpl_vars['payment']->_loop) {
?>
					<tr>
						<td><?php echo smartyTranslate(array('s'=>'No payment','pdf'=>'true'),$_smarty_tpl);?>
</td>
					</tr>
				<?php } ?>
			</table>
		</td>
	</tr>
</table>
<?php }} ?>
