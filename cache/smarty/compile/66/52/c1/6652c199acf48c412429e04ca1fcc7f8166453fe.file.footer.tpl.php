<?php /* Smarty version Smarty-3.1.19, created on 2016-03-10 14:52:04
         compiled from "/srv/data/web/vhosts/www.bouquetacroquer.fr/htdocs/modules/tablerateshipping/views/templates/admin/footer.tpl" */ ?>
<?php /*%%SmartyHeaderCode:188145803756e17c046bcdd0-93232876%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6652c199acf48c412429e04ca1fcc7f8166453fe' => 
    array (
      0 => '/srv/data/web/vhosts/www.bouquetacroquer.fr/htdocs/modules/tablerateshipping/views/templates/admin/footer.tpl',
      1 => 1453302100,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '188145803756e17c046bcdd0-93232876',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'display_name' => 0,
    'version' => 0,
    'page' => 0,
    'token' => 0,
    'module_name' => 0,
    'country_id' => 0,
    'state_id' => 0,
    'path_uri' => 0,
    'getstates_token' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_56e17c04704ba2_29278565',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56e17c04704ba2_29278565')) {function content_56e17c04704ba2_29278565($_smarty_tpl) {?>

<div class="module-text"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['display_name']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
 (v<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['version']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
)</div>
<script type="text/javascript">
$(function()
{
	<?php if ($_smarty_tpl->tpl_vars['page']->value!=false) {?>'location.hash = "#anchorratetable";'<?php }?>

	$.data($("#carrier_id")[0], "changed", "no");

	$("#carrier_id").change(function()
	{
		$.data($("#carrier_id")[0], "changed", "yes");
	});

	$("#form-shippingdetails").submit(function()
	{
		if($.data($("#carrier_id")[0], "changed") == "yes")
		{
			if(confirm("<?php echo smartyTranslate(array('s'=>'Rates defined for deselected carriers will be deleted?','mod'=>'tablerateshipping'),$_smarty_tpl);?>
"))
			{
				return true;
			}
			else
			{
				event.stopPropagation();event.preventDefault();
			}
		}
	});

	$("#select-carrier select").change(function()
	{
		window.location = "index.php?controller=AdminModules&token=<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['token']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
&\
			configure=<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['module_name']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
&tab_module=shipping_logistics&module_name=<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['module_name']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
&\
			selected_carrrier_id="+$(this).val();
	});

	updateStates("<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['country_id']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
", "<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['state_id']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
");

	$("#country_id").change(function()
	{
		updateStates($(this).val(), "");
	});

	$("#actionaddnew").click(function()
	{
		$("#zone_id").val("");
		$("#country_id").val("");
		updateStates("", "");
		$("#city").val("*");
		$("#zip_from").val("*");
		$("#zip_to").val("*");
		$("#condition_from").val(0);
		$("#condition_to").val(0);
		$("#price").val(0);
		$("#comment").val("");

		$("#modaladdnewrate").find(".modal-title").html(
			"<img src=\"../img/admin/add.gif\" /> <span><?php echo smartyTranslate(array('s'=>'Add New Rate','mod'=>'tablerateshipping'),$_smarty_tpl);?>
</span>"
		);
		$("#modaladdnewrate").modal("show");
		$("#zone_id").focus();
	});

	$("#actionimportcsv").click(function()
	{
		$("#modalcsvimport").modal("show");
		$("#csv_file").focus();
	});

	$("#tabletablerate tr").dblclick(function() {
		$(this).find(".edit").trigger("click");
	});

	$("#tabletablerate .edit").click(function()
	{
		var params = $.data($(this).parent().parent()[0], "params");

		$("#zone_id").val(params.zone_id);
		$("#country_id").val(params.country_id);
		updateStates(params.country_id,
			params.state_id);
		$("#city").val(params.city);
		$("#zip_from").val(params.zip_from);
		$("#zip_to").val(params.zip_to);
		$("#condition_from").val(params.condition_from);
		$("#condition_to").val(params.condition_to);
		$("#price").val(params.price);
		$("#comment").val(params.comment);
		$("#id_carrier_table_rate").val(params.id_carrier_table_rate);

		$("#modaladdnewrate").find(".modal-title").html(
			"<img src=\"../img/admin/edit.gif\" /> <span><?php echo smartyTranslate(array('s'=>'Edit Rate','mod'=>'tablerateshipping'),$_smarty_tpl);?>
</span>"
		);
		$("#modaladdnewrate").modal("show");
		$("#zone_id").focus();
	});
});

function updateStates(country_id, state_id)
{
	$.ajax(
	{
		type: "POST",
		url: "<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['path_uri']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
getstates.php",
		data: "token=<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['getstates_token']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
&country_id="+
			country_id+"&state_id="+state_id,
		dataType: "html",
		beforeSend: function()
		{
			$("#state_loader").show();
		},
		success: function(data)
		{
			$("#state_id").html(data);
			$("#state_loader").hide();
			$("#state_id").trigger("statesloaded");
		}
	});
}
</script>

</div><?php }} ?>
