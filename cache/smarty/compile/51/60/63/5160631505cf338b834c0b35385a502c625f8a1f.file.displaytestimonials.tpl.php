<?php /* Smarty version Smarty-3.1.19, created on 2016-03-08 09:19:02
         compiled from "/srv/data/web/vhosts/www.bouquetacroquer.fr/htdocs/modules/pk_testimonials/views/templates/front/displaytestimonials.tpl" */ ?>
<?php /*%%SmartyHeaderCode:65707445956de8af699e3b1-70618342%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5160631505cf338b834c0b35385a502c625f8a1f' => 
    array (
      0 => '/srv/data/web/vhosts/www.bouquetacroquer.fr/htdocs/modules/pk_testimonials/views/templates/front/displaytestimonials.tpl',
      1 => 1453302038,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '65707445956de8af699e3b1-70618342',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'testimonials' => 0,
    'nr' => 0,
    'currentpage' => 0,
    'link' => 0,
    'prevpage' => 0,
    'totalpages' => 0,
    'nextpage' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_56de8af6a6b6a1_78986597',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56de8af6a6b6a1_78986597')) {function content_56de8af6a6b6a1_78986597($_smarty_tpl) {?><!-- Block testimonial module -->
<div id="block_testimonials" class="homemodule">
	<h1 class="page-heading">
        <?php echo smartyTranslate(array('s'=>'Testimonials','mod'=>'pk_testimonials'),$_smarty_tpl);?>

    </h1>
	<div id="testimonials-list">
		<?php if (isset($_smarty_tpl->tpl_vars['testimonials']->value)) {?>				  
			<?php  $_smarty_tpl->tpl_vars['nr'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['nr']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['testimonials']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['nr']->key => $_smarty_tpl->tpl_vars['nr']->value) {
$_smarty_tpl->tpl_vars['nr']->_loop = true;
?>				  
				<?php if ($_smarty_tpl->tpl_vars['nr']->value) {?>
				<div class="testimonial">
					<strong class="testimonialhead"><?php echo $_smarty_tpl->tpl_vars['nr']->value['testimonial_title'];?>
</strong>
					<div id="text">
						<div class="testimonialbody">						
							<?php echo $_smarty_tpl->tpl_vars['nr']->value['testimonial_main_message'];?>

						</div>
					</div>
					
					<ul>
						<li><strong><?php echo smartyTranslate(array('s'=>'Submitted By:','mod'=>'pk_testimonials'),$_smarty_tpl);?>
</strong> <?php echo $_smarty_tpl->tpl_vars['nr']->value['testimonial_submitter_name'];?>
</li>
						<li><strong><?php echo smartyTranslate(array('s'=>'Submitted Date:','mod'=>'pk_testimonials'),$_smarty_tpl);?>
</strong> <?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['nr']->value['date_added']);?>
</li>
					</ul>					
				</div>
				<?php }?>
			<?php } ?>
		<?php } else { ?>
			<h1><?php echo smartyTranslate(array('s'=>'No Testimonials Yet!','mod'=>'pk_testimonials'),$_smarty_tpl);?>
</h1>
		<?php }?>
	</div>
	<div id="paginationTop">
		<?php if ($_smarty_tpl->tpl_vars['currentpage']->value>1) {?>
			<a href='<?php echo $_smarty_tpl->tpl_vars['link']->value->getModuleLink("pk_testimonials","testimonials");?>
&amp;currentpage=1'><?php echo smartyTranslate(array('s'=>'Last','mod'=>'pk_testimonials'),$_smarty_tpl);?>
</a>
			
			<a href='<?php echo $_smarty_tpl->tpl_vars['link']->value->getModuleLink("pk_testimonials","testimonials");?>
&amp;currentpage=<?php echo $_smarty_tpl->tpl_vars['prevpage']->value;?>
'><?php echo smartyTranslate(array('s'=>'Previous','mod'=>'pk_testimonials'),$_smarty_tpl);?>
</a>			
		<?php }?>		  
		[<?php echo $_smarty_tpl->tpl_vars['currentpage']->value;?>
]
		<?php if ($_smarty_tpl->tpl_vars['currentpage']->value!=$_smarty_tpl->tpl_vars['totalpages']->value) {?>	    
			<a href='<?php echo $_smarty_tpl->tpl_vars['link']->value->getModuleLink("pk_testimonials","testimonials");?>
&amp;currentpage=<?php echo $_smarty_tpl->tpl_vars['nextpage']->value;?>
'><?php echo smartyTranslate(array('s'=>'Next','mod'=>'pk_testimonials'),$_smarty_tpl);?>
</a>
			<a href='<?php echo $_smarty_tpl->tpl_vars['link']->value->getModuleLink("pk_testimonials","testimonials");?>
&amp;currentpage=<?php echo $_smarty_tpl->tpl_vars['totalpages']->value;?>
'><?php echo smartyTranslate(array('s'=>'Last','mod'=>'pk_testimonials'),$_smarty_tpl);?>
</a>
		<?php }?>
	</div>
	<div class="addblocktestimonial">
		<a class="button addblocktestimonial" href="<?php echo $_smarty_tpl->tpl_vars['link']->value->getModuleLink('pk_testimonials','addtestimonial');?>
">Write Testimonial</a>
	</div>
</div> <!-- /end paginationTop div -->
<!-- /Block testimonial module --><?php }} ?>
