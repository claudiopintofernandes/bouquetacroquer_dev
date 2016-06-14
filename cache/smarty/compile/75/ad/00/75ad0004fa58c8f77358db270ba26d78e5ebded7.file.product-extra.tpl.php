<?php /* Smarty version Smarty-3.1.19, created on 2016-03-08 02:33:03
         compiled from "/srv/data/web/vhosts/www.bouquetacroquer.fr/htdocs/modules/dateofdelivery/product-extra.tpl" */ ?>
<?php /*%%SmartyHeaderCode:72666650656de2bcfd955c9-31664679%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '75ad0004fa58c8f77358db270ba26d78e5ebded7' => 
    array (
      0 => '/srv/data/web/vhosts/www.bouquetacroquer.fr/htdocs/modules/dateofdelivery/product-extra.tpl',
      1 => 1453301894,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '72666650656de2bcfd955c9-31664679',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'datesDelivery' => 0,
    'product' => 0,
    'carriers_name' => 0,
    'carriers_id' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_56de2bcfdd2b76_99117785',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56de2bcfdd2b76_99117785')) {function content_56de2bcfdd2b76_99117785($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/srv/data/web/vhosts/www.bouquetacroquer.fr/htdocs/tools/smarty/plugins/modifier.date_format.php';
?>
<br><br>
<div class="shipping">
  <h3 class="shipping-title">Livraison prévue à partir du :</h3>
  <ul class="shipping-details">
    <?php  $_smarty_tpl->tpl_vars['dateDelivery'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['dateDelivery']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['datesDelivery']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['dateDelivery']->index=-1;
foreach ($_from as $_smarty_tpl->tpl_vars['dateDelivery']->key => $_smarty_tpl->tpl_vars['dateDelivery']->value) {
$_smarty_tpl->tpl_vars['dateDelivery']->_loop = true;
 $_smarty_tpl->tpl_vars['dateDelivery']->index++;
?>
      <?php if ($_smarty_tpl->tpl_vars['product']->value->id_category_default!=12&&$_smarty_tpl->tpl_vars['product']->value->id_category_default!=13) {?>
        <li class="shipping-detail">
          <span class="shipping-type">> <?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['dateDelivery']->index;?>
<?php $_tmp1=ob_get_clean();?><?php echo $_smarty_tpl->tpl_vars['carriers_name']->value[$_tmp1];?>
</span><span class="shipping-date"><?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['dateDelivery']->index;?>
<?php $_tmp2=ob_get_clean();?><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['datesDelivery']->value[$_tmp2][0][1],"%d/%m/%Y");?>
</span>
        </li>
      <?php } else {?><?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['dateDelivery']->index;?>
<?php $_tmp3=ob_get_clean();?><?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['dateDelivery']->index;?>
<?php $_tmp4=ob_get_clean();?><?php if ($_smarty_tpl->tpl_vars['carriers_id']->value[$_tmp3]==33||$_smarty_tpl->tpl_vars['carriers_id']->value[$_tmp4]==39) {?>
        <li class="shipping-detail">
          <span class="shipping-type">> <?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['dateDelivery']->index;?>
<?php $_tmp5=ob_get_clean();?><?php echo $_smarty_tpl->tpl_vars['carriers_name']->value[$_tmp5];?>
</span><span class="shipping-date"><?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['dateDelivery']->index;?>
<?php $_tmp6=ob_get_clean();?><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['datesDelivery']->value[$_tmp6][0][1],"%d/%m/%Y");?>
</span>
        </li>
      <?php }}?>
    <?php } ?>
  </ul>
  <span class="info">Dates à titre indicatif</span>
</div>
<?php }} ?>
