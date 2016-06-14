<?php /* Smarty version Smarty-3.1.19, created on 2016-03-10 14:55:12
         compiled from "/srv/data/web/vhosts/www.bouquetacroquer.fr/htdocs/modules/eydatepicker/views/templates/admin/availableweekdays.tpl" */ ?>
<?php /*%%SmartyHeaderCode:120901207556e17cc0dd2f39-40525962%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '480e77ac4db6af3df4812d2ad5956050b6b40f67' => 
    array (
      0 => '/srv/data/web/vhosts/www.bouquetacroquer.fr/htdocs/modules/eydatepicker/views/templates/admin/availableweekdays.tpl',
      1 => 1453301897,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '120901207556e17cc0dd2f39-40525962',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'data' => 0,
    'row' => 0,
    'day_names' => 0,
    'web_path_controllers' => 0,
    'tokencommon' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_56e17cc0e37d68_93570951',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56e17cc0e37d68_93570951')) {function content_56e17cc0e37d68_93570951($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_escape')) include '/srv/data/web/vhosts/www.bouquetacroquer.fr/htdocs/tools/smarty/plugins/modifier.escape.php';
?>

<table class="table">
	<thead>
		<th>Jour de la semaine</th>
		<th>Heures de livraison (comma separated / CSV)</th>
		<th>Etat</th>
	</thead>
	<tbody>
<?php  $_smarty_tpl->tpl_vars['row'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['row']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['data']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['row']->key => $_smarty_tpl->tpl_vars['row']->value) {
$_smarty_tpl->tpl_vars['row']->_loop = true;
?>
		<tr>
			<td><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['day_names']->value[$_smarty_tpl->tpl_vars['row']->value['day']], ENT_QUOTES, 'UTF-8', true);?>
</td>
			<td>
				<a href="#" class="editable_hours" data-name="hours" data-type="text" data-pk="<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['row']->value['id'], 'intval');?>
" data-url="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['web_path_controllers']->value, ENT_QUOTES, 'UTF-8', true);?>
/availableweekdays.php?action=update&token=<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['tokencommon']->value, ENT_QUOTES, 'UTF-8', true);?>
" data-title="Heures de livraison (empty not to display)"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['row']->value['hours'], ENT_QUOTES, 'UTF-8', true);?>
</a>
			</td>
			<td>
				<a href="#" class="editable_active" data-name="active" data-type="select" data-pk="<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['row']->value['id'], 'intval');?>
" data-url="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['web_path_controllers']->value, ENT_QUOTES, 'UTF-8', true);?>
/availableweekdays.php?action=update&token=<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['tokencommon']->value, ENT_QUOTES, 'UTF-8', true);?>
" data-title="Status"><?php if ($_smarty_tpl->tpl_vars['row']->value['active']==1) {?><span class="label label-success">active</span><?php } else { ?><span class="label label-warning">inactive</span><?php }?></a>
			</td>
		</tr>
<?php } ?>

	</tbody>
</table>

<script type="text/JavaScript">

	$.fn.editable.defaults.mode = 'popup';
	$('.editable_hours').editable();
    $('.editable_active').editable({
        source: [
              {value: 1, text: 'active'},
              {value: 0, text: 'inactive'}
           ]
    });	
	
</script><?php }} ?>
