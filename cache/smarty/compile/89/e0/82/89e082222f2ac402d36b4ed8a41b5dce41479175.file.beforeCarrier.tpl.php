<?php /* Smarty version Smarty-3.1.19, created on 2016-03-08 02:02:12
         compiled from "/srv/data/web/vhosts/www.bouquetacroquer.fr/htdocs/modules/dateofdelivery/beforeCarrier.tpl" */ ?>
<?php /*%%SmartyHeaderCode:99677646456de2494bff451-64348130%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '89e082222f2ac402d36b4ed8a41b5dce41479175' => 
    array (
      0 => '/srv/data/web/vhosts/www.bouquetacroquer.fr/htdocs/modules/dateofdelivery/beforeCarrier.tpl',
      1 => 1453301893,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '99677646456de2494bff451-64348130',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'datesDelivery' => 0,
    'by_address' => 0,
    'date' => 0,
    'nbPackages' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_56de2494c8c763_99440942',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56de2494c8c763_99440942')) {function content_56de2494c8c763_99440942($_smarty_tpl) {?>

<?php if (count($_smarty_tpl->tpl_vars['datesDelivery']->value)) {?>
	<script type="text/javascript">
	
		var datesDelivery = {};
	
	<?php  $_smarty_tpl->tpl_vars['by_address'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['by_address']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['datesDelivery']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['by_address']->key => $_smarty_tpl->tpl_vars['by_address']->value) {
$_smarty_tpl->tpl_vars['by_address']->_loop = true;
?>
		datesDelivery[<?php echo $_smarty_tpl->tpl_vars['by_address']->key;?>
] = {};
		<?php  $_smarty_tpl->tpl_vars['date'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['date']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['by_address']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['date']->key => $_smarty_tpl->tpl_vars['date']->value) {
$_smarty_tpl->tpl_vars['date']->_loop = true;
?>
			<?php if ($_smarty_tpl->tpl_vars['date']->value&&isset($_smarty_tpl->tpl_vars['date']->value[0])) {?>
				datesDelivery[<?php echo $_smarty_tpl->tpl_vars['by_address']->key;?>
]["<?php echo $_smarty_tpl->tpl_vars['date']->key;?>
"] = {};
				datesDelivery[<?php echo $_smarty_tpl->tpl_vars['by_address']->key;?>
]["<?php echo $_smarty_tpl->tpl_vars['date']->key;?>
"]['minimal'] = ["<?php echo $_smarty_tpl->tpl_vars['date']->value[0][0];?>
",<?php echo $_smarty_tpl->tpl_vars['date']->value[0][1];?>
];
				datesDelivery[<?php echo $_smarty_tpl->tpl_vars['by_address']->key;?>
]["<?php echo $_smarty_tpl->tpl_vars['date']->key;?>
"]['maximal'] = ["<?php echo $_smarty_tpl->tpl_vars['date']->value[1][0];?>
",<?php echo $_smarty_tpl->tpl_vars['date']->value[1][1];?>
];
			<?php }?>
		<?php } ?>
	<?php } ?>
	

	function refreshDateOfDelivery()
	{
		var date_from = null;
		var date_to = null;
		var set = true;
		$.each($('.delivery_option_radio:checked'), function()
		{
			var date = datesDelivery[$(this).attr('name').replace(/delivery_option\[(.*)\]/, '$1')][$(this).val()];
			if (typeof(date) != 'undefined')
			{
				if (date_from == null || date_from[1] < date['minimal'][1])
					date_from = date['minimal'];
				if (date_to == null || date_to[1] < date['maximal'][1])
					date_to = date['maximal'];
			}
			else
				set = false;
		});

		if (date_from != null && date_to != null && set)
		{
			$('p#dateofdelivery').show();
			$('span#minimal').html('<b>'+date_from[0]+'</b>');
			/*$('span#maximal').html('<b>'+date_to[0]+'</b>');*/
		}
		else
			$('p#dateofdelivery').hide();
	}
	$(function(){
		refreshDateOfDelivery();
		$('input[name^=delivery_option]').change(function(){
			refreshDateOfDelivery();
		});
	});
	
	</script>

	<br />
	<p id="dateofdelivery">
		<?php if ($_smarty_tpl->tpl_vars['nbPackages']->value<=1) {?>
			<?php echo smartyTranslate(array('s'=>'Approximate date of delivery with this carrier is between','mod'=>'dateofdelivery'),$_smarty_tpl);?>

		<?php } else { ?>
			<?php echo smartyTranslate(array('s'=>'There are %s packages, that will be approximately delivered with the delivery option you choose between','sprintf'=>$_smarty_tpl->tpl_vars['nbPackages']->value,'mod'=>'dateofdelivery'),$_smarty_tpl);?>

		<?php }?>
			<span style="color: #b70c66" id="minimal"></span> 
            <!--<?php echo smartyTranslate(array('s'=>'and','mod'=>'dateofdelivery'),$_smarty_tpl);?>
 <span id="maximal"></span> <sup>*</sup>-->
		<br />
		<!--<span style="font-size:10px;margin:0;padding:0;"><sup>*</sup> <?php echo smartyTranslate(array('s'=>'with direct payment methods (e.g. credit card)','mod'=>'dateofdelivery'),$_smarty_tpl);?>
</span>-->
	</p>
<?php }?>
<?php }} ?>
