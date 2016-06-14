<?php /* Smarty version Smarty-3.1.19, created on 2016-03-10 14:55:27
         compiled from "/srv/data/web/vhosts/www.bouquetacroquer.fr/htdocs/modules/eydatepicker/views/templates/admin/restricteddays.tpl" */ ?>
<?php /*%%SmartyHeaderCode:109033136356e17ccf586a49-38427294%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c833850d97d83341b3d518cfcd048e9369aec07e' => 
    array (
      0 => '/srv/data/web/vhosts/www.bouquetacroquer.fr/htdocs/modules/eydatepicker/views/templates/admin/restricteddays.tpl',
      1 => 1453301897,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '109033136356e17ccf586a49-38427294',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'web_path_controllers' => 0,
    'tokencommon' => 0,
    'data' => 0,
    'row' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_56e17ccf6839e7_43081158',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56e17ccf6839e7_43081158')) {function content_56e17ccf6839e7_43081158($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_escape')) include '/srv/data/web/vhosts/www.bouquetacroquer.fr/htdocs/tools/smarty/plugins/modifier.escape.php';
?>
  <!-- Button trigger modal -->
  <a data-toggle="modal" href="#addNewModal" class="btn btn-primary">Ajouter nouveau</a>

  <!-- Modal -->
  <div class="modal fade" id="addNewModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Ajouter nouveau</h4>
        </div>
        <div class="modal-body">
<form class="form-horizontal" data-validate="parsley" novalidate="novalidate" action="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['web_path_controllers']->value, ENT_QUOTES, 'UTF-8', true);?>
/restricteddays.php?action=new&token=<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['tokencommon']->value, ENT_QUOTES, 'UTF-8', true);?>
" method="POST" id="newEntryFrm" role="form">
  <div class="form-group">
    <label class="col-lg-3 control-label">Description</label>
    <div class="col-lg-7">
      <input type="text" required="required" class="form-control" name="description" placeholder="e.g. Christmas">
    </div>
  </div>
  <div class="form-group">
    <label class="col-lg-3 control-label">Jour</label>
    <div class="col-lg-7">
      <select class="form-control" name="day">
<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['day'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['day']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['day']['name'] = 'day';
$_smarty_tpl->tpl_vars['smarty']->value['section']['day']['loop'] = is_array($_loop=31) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['day']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['day']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['day']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['day']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['day']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['day']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['day']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['day']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['day']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['day']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['day']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['day']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['day']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['day']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['day']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['day']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['day']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['day']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['day']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['day']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['day']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['day']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['day']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['day']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['day']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['day']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['day']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['day']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['day']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['day']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['day']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['day']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['day']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['day']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['day']['total']);
?> 
    <option value="<?php echo smarty_modifier_escape($_smarty_tpl->getVariable('smarty')->value['section']['day']['iteration'], 'intval');?>
"><?php echo smarty_modifier_escape($_smarty_tpl->getVariable('smarty')->value['section']['day']['iteration'], 'intval');?>
 </option>
<?php endfor; endif; ?>
	  </select>
    </div>
  </div>
   <div class="form-group">
    <label class="col-lg-3 control-label">Mois</label>
    <div class="col-lg-7">
      <select class="form-control" name="month">
<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['month'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['month']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['month']['name'] = 'month';
$_smarty_tpl->tpl_vars['smarty']->value['section']['month']['loop'] = is_array($_loop=12) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['month']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['month']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['month']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['month']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['month']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['month']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['month']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['month']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['month']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['month']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['month']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['month']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['month']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['month']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['month']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['month']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['month']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['month']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['month']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['month']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['month']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['month']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['month']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['month']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['month']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['month']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['month']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['month']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['month']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['month']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['month']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['month']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['month']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['month']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['month']['total']);
?> 
    <option value="<?php echo smarty_modifier_escape($_smarty_tpl->getVariable('smarty')->value['section']['month']['iteration'], 'intval');?>
"><?php echo smarty_modifier_escape($_smarty_tpl->getVariable('smarty')->value['section']['month']['iteration'], 'intval');?>
 </option>
<?php endfor; endif; ?>
	  </select>
    </div>
  </div> 
    <div class="form-group">
    <label class="col-lg-3 control-label">Active</label>
    <div class="col-lg-7">
		<label class="checkbox-inline">
		  <input type="checkbox" id="inlineCheckbox1" name="active" value="1"> enabled or disabled
		</label>
    </div>
  </div>  
</form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
		  <button type="button" class="btn btn-primary" id="newEntryBtn">Enregistrer</button>
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->


<table class="table">
	<thead>
		<th>Description</th>
		<th>Jour</th>
		<th>Mois</th>
		<th>Status</th>
		<th>Actions</th>
	</thead>
	<tbody>
<?php  $_smarty_tpl->tpl_vars['row'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['row']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['data']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['row']->key => $_smarty_tpl->tpl_vars['row']->value) {
$_smarty_tpl->tpl_vars['row']->_loop = true;
?>
		<tr>
			<td>
				<a href="#" class="editable_description" data-name="description" data-type="text" data-pk="<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['row']->value['id'], 'intval');?>
" data-url="<?php echo $_smarty_tpl->tpl_vars['web_path_controllers']->value;?>
/restricteddays.php?action=update&token=<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['tokencommon']->value, ENT_QUOTES, 'UTF-8', true);?>
" data-title="Description"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['row']->value['description'], ENT_QUOTES, 'UTF-8', true);?>
</a>
			</td>
			<td>
				<a href="#" class="editable_day" data-name="day" data-value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['row']->value['day'], ENT_QUOTES, 'UTF-8', true);?>
" data-type="combodate" data-pk="<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['row']->value['id'], 'intval');?>
" data-url="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['web_path_controllers']->value, ENT_QUOTES, 'UTF-8', true);?>
/restricteddays.php?action=update&token=<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['tokencommon']->value, ENT_QUOTES, 'UTF-8', true);?>
" data-title="Day"><?php if ($_smarty_tpl->tpl_vars['row']->value['day']<10) {?>0<?php }?><?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['row']->value['day'], 'intval');?>
</a>
			</td>
			<td>
				<a href="#" class="editable_month" data-name="month" data-value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['row']->value['month'], ENT_QUOTES, 'UTF-8', true);?>
" data-type="combodate" data-pk="<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['row']->value['id'], 'intval');?>
" data-url="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['web_path_controllers']->value, ENT_QUOTES, 'UTF-8', true);?>
/restricteddays.php?action=update&token=<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['tokencommon']->value, ENT_QUOTES, 'UTF-8', true);?>
" data-title="Month"><?php if ($_smarty_tpl->tpl_vars['row']->value['month']<10) {?>0<?php }?><?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['row']->value['month'], 'intval');?>
</a>
			</td>			
			<td>
				<a href="#" class="editable_active" data-name="active" data-value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['row']->value['active'], ENT_QUOTES, 'UTF-8', true);?>
" data-type="select" data-pk="<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['row']->value['id'], 'intval');?>
" data-url="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['web_path_controllers']->value, ENT_QUOTES, 'UTF-8', true);?>
/restricteddays.php?action=update&token=<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['tokencommon']->value, ENT_QUOTES, 'UTF-8', true);?>
" data-title="Status"><?php if ($_smarty_tpl->tpl_vars['row']->value['active']==1) {?><span class="label label-success">active</span><?php } else { ?><span class="label label-warning">inactive</span><?php }?></a>
			</td>
			<td><a class="delete_item btn btn-xs btn-danger" href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['web_path_controllers']->value, ENT_QUOTES, 'UTF-8', true);?>
restricteddays.php?action=delete&id=<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['row']->value['id'], 'intval');?>
&token=<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['tokencommon']->value, ENT_QUOTES, 'UTF-8', true);?>
">Delete</a></td>
		</tr>
<?php } ?>

	</tbody>
</table>

<script type="text/JavaScript">

	$.fn.editable.defaults.mode = 'popup';
	$('.editable_description').editable();	
    $('.editable_day').editable({
        format: 'D',    
        viewformat: 'DD',    
        template: 'D',    
        combodate: {
                minuteStep: 1
        }
    });	
    $('.editable_month').editable({
        format: 'MM',    
        viewformat: 'MM',    
        template: 'MMM',    
        combodate: {
                minuteStep: 1
        }
    });		
    $('.editable_active').editable({  
        source: [
              {value: 1, text: 'active'},
              {value: 0, text: 'inactive'}
           ]
    });	
	$('#newEntryBtn').click(function() {
		return $('#newEntryFrm').submit();
	});
	
	$('#newEntryFrm').submit(function() {
		if($( '#newEntryFrm' ).parsley( 'validate' )) {
			submittedForm = $(this);
			$.post( submittedForm.attr('action'), submittedForm.serialize()).done(function(data) {
				$('#addNewModal').modal('hide');
			});
		}
		return false;
	});	
	
	// after the modal closes
	$('#addNewModal').on('hidden.bs.modal', function () {
		// reload tab
		var current_index = $("#navigation_tabs").tabs("option", "active");
		$("#navigation_tabs").tabs('load', current_index);
	});
	
	$('.delete_item').click(function () {
		if (!confirm("Are you sure you want to delete?")) { return false; }
	
		$.get( $(this).attr('href'), function( data ) {
			// reload tab
			var current_index = $("#navigation_tabs").tabs("option", "active");
			$("#navigation_tabs").tabs('load', current_index);
		});
		return false;
	});
	
</script><?php }} ?>
