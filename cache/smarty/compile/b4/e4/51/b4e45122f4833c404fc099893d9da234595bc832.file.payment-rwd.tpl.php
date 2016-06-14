<?php /* Smarty version Smarty-3.1.19, created on 2016-03-08 14:30:03
         compiled from "/srv/data/web/vhosts/www.bouquetacroquer.fr/htdocs/modules/ETransactionsEpayment/views/templates/hook/payment-rwd.tpl" */ ?>
<?php /*%%SmartyHeaderCode:39660356856ded3db1b8210-35872421%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b4e45122f4833c404fc099893d9da234595bc832' => 
    array (
      0 => '/srv/data/web/vhosts/www.bouquetacroquer.fr/htdocs/modules/ETransactionsEpayment/views/templates/hook/payment-rwd.tpl',
      1 => 1453374536,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '39660356856ded3db1b8210-35872421',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'ETransactionsReason' => 0,
    'ETransactionsProduction' => 0,
    'ETransactionsCards' => 0,
    'card' => 0,
    'ETransactionsRecurring' => 0,
    'ETransactionsImagePath' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_56ded3db222908_98212083',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56ded3db222908_98212083')) {function content_56ded3db222908_98212083($_smarty_tpl) {?>
<?php if ($_smarty_tpl->tpl_vars['ETransactionsReason']->value=='cancel') {?>

<div class="row">
	<div class="col-xs-12 col-md-6">
		<div class="alert alert-danger" style="margin-left:15px;">
			<?php echo smartyTranslate(array('s'=>'Payment canceled.','mod'=>'ETransactionsEpayment'),$_smarty_tpl);?>

		</div>
	</div>
</div>
<?php }?>

<?php if ($_smarty_tpl->tpl_vars['ETransactionsReason']->value=='error') {?>
<div class="row">
	<div class="col-xs-12 col-md-6">
		<div class="alert alert-danger" style="margin-left:15px;">
			<?php echo smartyTranslate(array('s'=>'Payment refused by ETransactions.','mod'=>'ETransactionsEpayment'),$_smarty_tpl);?>

		</div>
	</div>
</div>
<?php }?>

<?php if (!$_smarty_tpl->tpl_vars['ETransactionsProduction']->value) {?>
<div class="row">
	<div class="col-xs-12 col-md-6">
		<div class="alert alert-danger" style="margin-left:15px;">
			<?php echo smartyTranslate(array('s'=>'The payment ETransactions is in test mode.','mod'=>'ETransactionsEpayment'),$_smarty_tpl);?>

		</div>
	</div>
</div>
<?php }?>


<?php  $_smarty_tpl->tpl_vars['card'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['card']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['ETransactionsCards']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['card']->key => $_smarty_tpl->tpl_vars['card']->value) {
$_smarty_tpl->tpl_vars['card']->_loop = true;
?>
<div class="row">
	<div class="col-xs-12 col-md-6">
		<p class="payment_module ETRANS_epayment_module">
			<a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['card']->value['url'], ENT_QUOTES, 'UTF-8', true);?>
" style="background-image: url(<?php echo $_smarty_tpl->tpl_vars['card']->value['image'];?>
)" title="<?php echo $_smarty_tpl->tpl_vars['card']->value['card'];?>
">
				<?php echo smartyTranslate(array('s'=>'Pay by','mod'=>'ETransactionsEpayment'),$_smarty_tpl);?>
 <?php echo $_smarty_tpl->tpl_vars['card']->value['label'];?>

			</a>
		</p>
	</div>
</div>
<?php } ?>


<?php if (!empty($_smarty_tpl->tpl_vars['ETransactionsRecurring']->value)) {?>
<div class="row">
	<div class="col-xs-12 col-md-6">
		<p class="payment_module ETRANS_epayment_3x"  style="background-image: url(<?php echo $_smarty_tpl->tpl_vars['ETransactionsImagePath']->value;?>
/Paiement_3X.png)" >		
            <?php  $_smarty_tpl->tpl_vars['card'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['card']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['ETransactionsRecurring']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['card']->key => $_smarty_tpl->tpl_vars['card']->value) {
$_smarty_tpl->tpl_vars['card']->_loop = true;
?>
				<a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['card']->value['url'], ENT_QUOTES, 'UTF-8', true);?>
&amp;recurring=1">
					<img src="<?php echo $_smarty_tpl->tpl_vars['card']->value['image'];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['card']->value['card'];?>
" title="<?php echo $_smarty_tpl->tpl_vars['card']->value['card'];?>
" /> <?php echo smartyTranslate(array('s'=>'Pay','mod'=>'ETransactionsEpayment'),$_smarty_tpl);?>
 <?php echo smartyTranslate(array('s'=>'card in 3 times without fees','mod'=>'ETransactionsEpayment'),$_smarty_tpl);?>

				</a>
			<?php } ?>			
		</p>
	</div>
</div>
<?php }?>
<?php }} ?>
