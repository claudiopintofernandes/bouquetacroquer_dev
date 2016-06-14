<?php /* Smarty version Smarty-3.1.19, created on 2016-03-08 14:31:16
         compiled from "/srv/data/web/vhosts/www.bouquetacroquer.fr/htdocs/modules/ETransactionsEpayment/views/templates/hook/payment_return.fr.tpl" */ ?>
<?php /*%%SmartyHeaderCode:110704229156ded4247495a9-63180531%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c6e0a0e54019bdf78d2b922136859023581566b9' => 
    array (
      0 => '/srv/data/web/vhosts/www.bouquetacroquer.fr/htdocs/modules/ETransactionsEpayment/views/templates/hook/payment_return.fr.tpl',
      1 => 1453374536,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '110704229156ded4247495a9-63180531',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'shop_name' => 0,
    'base_dir' => 0,
    'base_dir_ssl' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_56ded4247780c2_30874553',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56ded4247780c2_30874553')) {function content_56ded4247780c2_30874553($_smarty_tpl) {?>
<p>Votre commande sur <strong class="bold"><?php echo $_smarty_tpl->tpl_vars['shop_name']->value;?>
</strong> est validée.</p>
<p>Vous avez choisi la méthode de paiement <img src="<?php echo $_smarty_tpl->tpl_vars['base_dir']->value;?>
modules/ETransactionsEpayment/img/etransactions-small.png" />.</p>
<p>Votre commande vous sera envoyée dans les plus brefs délais.</p>
<p>Pour tout question ou plus d'information, merci de contacter notre <a href="<?php echo $_smarty_tpl->tpl_vars['base_dir_ssl']->value;?>
contact-form.php">service client</a>.</p>
<?php }} ?>
