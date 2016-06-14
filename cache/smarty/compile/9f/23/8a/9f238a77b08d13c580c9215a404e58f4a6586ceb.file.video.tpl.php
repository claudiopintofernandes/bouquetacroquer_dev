<?php /* Smarty version Smarty-3.1.19, created on 2016-03-09 15:38:57
         compiled from "/srv/data/web/vhosts/www.bouquetacroquer.fr/htdocs/modules/pk_themesettings/views/admin/video.tpl" */ ?>
<?php /*%%SmartyHeaderCode:184386705356e03581358556-89158252%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9f238a77b08d13c580c9215a404e58f4a6586ceb' => 
    array (
      0 => '/srv/data/web/vhosts/www.bouquetacroquer.fr/htdocs/modules/pk_themesettings/views/admin/video.tpl',
      1 => 1453302059,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '184386705356e03581358556-89158252',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'show_video' => 0,
    'id_lang' => 0,
    'languages' => 0,
    'pk_video_id' => 0,
    'show_custom_tab' => 0,
    'pk_custom_tab_name' => 0,
    'pk_custom_tab' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_56e035813afd06_45422818',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56e035813afd06_45422818')) {function content_56e035813afd06_45422818($_smarty_tpl) {?>
<input type="hidden" name="modulealysumthemesettings_loaded" value="1">
<div id="product-suppliers" class="panel product-tab">
	<input type="hidden" name="submitted_tabs[]" value="ModulePk_themesettings" />
	<div class="separation"></div>
	<fieldset style="border:none;">
		<?php if ($_smarty_tpl->tpl_vars['show_video']->value==1) {?>
		<div class="form-group">
			<label class="control-label col-lg-3" for="video_id_<?php echo $_smarty_tpl->tpl_vars['id_lang']->value;?>
">
				<?php echo smartyTranslate(array('s'=>'Youtube Video ID','mod'=>'pk_themesettings'),$_smarty_tpl);?>
:
			</label>
			<div class="col-lg-9">
				<?php echo $_smarty_tpl->getSubTemplate ("controllers/products/input_text_lang.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('languages'=>$_smarty_tpl->tpl_vars['languages']->value,'input_value'=>$_smarty_tpl->tpl_vars['pk_video_id']->value,'input_name'=>"video_id"), 0);?>

			</div>
		</div><br/><br/>
		<?php }?>
		<?php if ($_smarty_tpl->tpl_vars['show_custom_tab']->value==1) {?>
		<div class="form-group">
			<label class="control-label col-lg-3" for="custom_tab_name_<?php echo $_smarty_tpl->tpl_vars['id_lang']->value;?>
">
				<?php echo smartyTranslate(array('s'=>'Custom Tab Name','mod'=>'pk_themesettings'),$_smarty_tpl);?>
:
			</label>
			<div class="col-lg-9">
				<?php echo $_smarty_tpl->getSubTemplate ("controllers/products/input_text_lang.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('languages'=>$_smarty_tpl->tpl_vars['languages']->value,'input_value'=>$_smarty_tpl->tpl_vars['pk_custom_tab_name']->value,'input_name'=>"custom_tab_name"), 0);?>

			</div>
		</div><br/><br/>

		<div class="form-group">
			<label class="control-label col-lg-3" for="custom_tab_<?php echo $_smarty_tpl->tpl_vars['id_lang']->value;?>
">
				<?php echo $_smarty_tpl->getSubTemplate ("controllers/products/multishop/checkbox.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('field'=>"custom_tab",'type'=>"tinymce",'multilang'=>"true"), 0);?>

				<?php echo smartyTranslate(array('s'=>'Custom Tab Content','mod'=>'pk_themesettings'),$_smarty_tpl);?>
:
			</label>
			<div class="col-lg-9">
				<?php echo $_smarty_tpl->getSubTemplate ("controllers/products/textarea_lang.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('languages'=>$_smarty_tpl->tpl_vars['languages']->value,'input_name'=>'custom_tab','class'=>"autoload_rte",'input_value'=>$_smarty_tpl->tpl_vars['pk_custom_tab']->value), 0);?>

			</div>
		</div><br/><br/>
		<?php }?>
    </fieldset>
    <div class="panel-footer">
		<button type="submit" name="submitAddproduct" class="btn btn-default pull-right"><i class="process-icon-save"></i> <?php echo smartyTranslate(array('s'=>'Save'),$_smarty_tpl);?>
</button>
		<button type="submit" name="submitAddproductAndStay" class="btn btn-default pull-right"><i class="process-icon-save"></i> <?php echo smartyTranslate(array('s'=>'Save and stay'),$_smarty_tpl);?>
</button>
	</div>
	<div class="clear">&nbsp;</div>
</div>
<script type="text/javascript">
	hideOtherLanguage(default_language);
</script><?php }} ?>
