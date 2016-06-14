<?php /* Smarty version Smarty-3.1.19, created on 2016-03-14 10:56:10
         compiled from "/srv/data/web/vhosts/www.bouquetacroquer.fr/htdocs/modules/cheque/views/templates/hook/payment_return.tpl" */ ?>
<?php /*%%SmartyHeaderCode:172565904656e68aba8ac379-74124796%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2360a7aa8f7100f4924430a8107e7c7ef0eb6980' => 
    array (
      0 => '/srv/data/web/vhosts/www.bouquetacroquer.fr/htdocs/modules/cheque/views/templates/hook/payment_return.tpl',
      1 => 1453301881,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '172565904656e68aba8ac379-74124796',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'status' => 0,
    'shop_name' => 0,
    'total_to_pay' => 0,
    'chequeName' => 0,
    'chequeAddress' => 0,
    'reference' => 0,
    'id_order' => 0,
    'link' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_56e68aba9245b2_60325181',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56e68aba9245b2_60325181')) {function content_56e68aba9245b2_60325181($_smarty_tpl) {?>

<?php if ($_smarty_tpl->tpl_vars['status']->value=='ok') {?>
	<p><?php echo smartyTranslate(array('s'=>'Your order on %s is complete.','sprintf'=>$_smarty_tpl->tpl_vars['shop_name']->value,'mod'=>'cheque'),$_smarty_tpl);?>

		<br /><br />
		<?php echo smartyTranslate(array('s'=>'Your check must include:','mod'=>'cheque'),$_smarty_tpl);?>

		<br /><br />- <?php echo smartyTranslate(array('s'=>'Payment amount.','mod'=>'cheque'),$_smarty_tpl);?>
 <span class="price"><strong><?php echo $_smarty_tpl->tpl_vars['total_to_pay']->value;?>
</strong></span>
		<br /><br />- <?php echo smartyTranslate(array('s'=>'Payable to the order of','mod'=>'cheque'),$_smarty_tpl);?>
 <strong><?php if ($_smarty_tpl->tpl_vars['chequeName']->value) {?><?php echo $_smarty_tpl->tpl_vars['chequeName']->value;?>
<?php } else { ?>___________<?php }?></strong>
		<br /><br />- <?php echo smartyTranslate(array('s'=>'Mail to','mod'=>'cheque'),$_smarty_tpl);?>
 <strong><?php if ($_smarty_tpl->tpl_vars['chequeAddress']->value) {?><?php echo $_smarty_tpl->tpl_vars['chequeAddress']->value;?>
<?php } else { ?>___________<?php }?></strong>
		<?php if (!isset($_smarty_tpl->tpl_vars['reference']->value)) {?>
			<br /><br />- <?php echo smartyTranslate(array('s'=>'Do not forget to insert your order number #%d.','sprintf'=>$_smarty_tpl->tpl_vars['id_order']->value,'mod'=>'cheque'),$_smarty_tpl);?>

		<?php } else { ?>
			<br /><br />- <?php echo smartyTranslate(array('s'=>'Do not forget to insert your order reference %s.','sprintf'=>$_smarty_tpl->tpl_vars['reference']->value,'mod'=>'cheque'),$_smarty_tpl);?>

		<?php }?>
		<br /><br /><?php echo smartyTranslate(array('s'=>'An email has been sent to you with this information.','mod'=>'cheque'),$_smarty_tpl);?>

		<br /><br /><strong><?php echo smartyTranslate(array('s'=>'Your order will be sent as soon as we receive your payment.','mod'=>'cheque'),$_smarty_tpl);?>
</strong>
		<br /><br /><?php echo smartyTranslate(array('s'=>'For any questions or for further information, please contact our','mod'=>'cheque'),$_smarty_tpl);?>
 <a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value->getPageLink('contact',true), ENT_QUOTES, 'UTF-8', true);?>
"><?php echo smartyTranslate(array('s'=>'customer service department.','mod'=>'cheque'),$_smarty_tpl);?>
</a>.
	</p>
<?php } else { ?>
	<p class="warning">
		<?php echo smartyTranslate(array('s'=>'We have noticed that there is a problem with your order. If you think this is an error, you can contact our','mod'=>'cheque'),$_smarty_tpl);?>
 
		<a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value->getPageLink('contact',true), ENT_QUOTES, 'UTF-8', true);?>
"><?php echo smartyTranslate(array('s'=>'customer service department.','mod'=>'cheque'),$_smarty_tpl);?>
</a>.
	</p>
<?php }?>
<?php }} ?>
