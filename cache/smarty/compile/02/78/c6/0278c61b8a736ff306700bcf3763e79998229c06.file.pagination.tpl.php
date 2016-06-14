<?php /* Smarty version Smarty-3.1.19, created on 2016-03-10 01:34:57
         compiled from "/srv/data/web/vhosts/www.bouquetacroquer.fr/htdocs/modules/ph_simpleblog/views/templates/front/pagination.tpl" */ ?>
<?php /*%%SmartyHeaderCode:74810040356e0c131d81b96-47513799%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0278c61b8a736ff306700bcf3763e79998229c06' => 
    array (
      0 => '/srv/data/web/vhosts/www.bouquetacroquer.fr/htdocs/modules/ph_simpleblog/views/templates/front/pagination.tpl',
      1 => 1453301943,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '74810040356e0c131d81b96-47513799',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'start' => 0,
    'stop' => 0,
    'p' => 0,
    'p_previous' => 0,
    'type' => 0,
    'rewrite' => 0,
    'pages_nb' => 0,
    'p_next' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_56e0c131e412c1_89750995',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56e0c131e412c1_89750995')) {function content_56e0c131e412c1_89750995($_smarty_tpl) {?><!-- Pagination -->
<div id="pagination" class="pagination simpleblog-pagination">
<?php if ($_smarty_tpl->tpl_vars['start']->value!=$_smarty_tpl->tpl_vars['stop']->value) {?>
	<ul class="pagination">
	<?php if ($_smarty_tpl->tpl_vars['p']->value!=1) {?>
		<?php $_smarty_tpl->tpl_vars['p_previous'] = new Smarty_variable($_smarty_tpl->tpl_vars['p']->value-1, null, 0);?>
		<li id="pagination_previous" class="pagination_previous"><a href="<?php echo SimpleBlogPost::getPageLink($_smarty_tpl->tpl_vars['p_previous']->value,$_smarty_tpl->tpl_vars['type']->value,$_smarty_tpl->tpl_vars['rewrite']->value);?>
">&laquo;&nbsp;<?php echo smartyTranslate(array('s'=>'Previous','mod'=>'ph_simpleblog'),$_smarty_tpl);?>
</a></li>
	<?php } else { ?>
		<li id="pagination_previous" class="disabled pagination_previous"><span>&laquo;&nbsp;<?php echo smartyTranslate(array('s'=>'Previous','mod'=>'ph_simpleblog'),$_smarty_tpl);?>
</span></li>
	<?php }?>
	<?php if ($_smarty_tpl->tpl_vars['start']->value>3) {?>
		<li><a href="<?php echo SimpleBlogPost::getPageLink(1,$_smarty_tpl->tpl_vars['type']->value,$_smarty_tpl->tpl_vars['rewrite']->value);?>
">1</a></li>
		<li class="truncate">...</li>
	<?php }?>
	<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['pagination'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['pagination']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['pagination']['name'] = 'pagination';
$_smarty_tpl->tpl_vars['smarty']->value['section']['pagination']['start'] = (int) $_smarty_tpl->tpl_vars['start']->value;
$_smarty_tpl->tpl_vars['smarty']->value['section']['pagination']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['stop']->value+1) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['pagination']['step'] = ((int) 1) == 0 ? 1 : (int) 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['pagination']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['pagination']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['pagination']['loop'];
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['pagination']['start'] < 0)
    $_smarty_tpl->tpl_vars['smarty']->value['section']['pagination']['start'] = max($_smarty_tpl->tpl_vars['smarty']->value['section']['pagination']['step'] > 0 ? 0 : -1, $_smarty_tpl->tpl_vars['smarty']->value['section']['pagination']['loop'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['pagination']['start']);
else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['pagination']['start'] = min($_smarty_tpl->tpl_vars['smarty']->value['section']['pagination']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['pagination']['step'] > 0 ? $_smarty_tpl->tpl_vars['smarty']->value['section']['pagination']['loop'] : $_smarty_tpl->tpl_vars['smarty']->value['section']['pagination']['loop']-1);
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['pagination']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['pagination']['total'] = min(ceil(($_smarty_tpl->tpl_vars['smarty']->value['section']['pagination']['step'] > 0 ? $_smarty_tpl->tpl_vars['smarty']->value['section']['pagination']['loop'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['pagination']['start'] : $_smarty_tpl->tpl_vars['smarty']->value['section']['pagination']['start']+1)/abs($_smarty_tpl->tpl_vars['smarty']->value['section']['pagination']['step'])), $_smarty_tpl->tpl_vars['smarty']->value['section']['pagination']['max']);
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['pagination']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['pagination']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['pagination']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['pagination']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['pagination']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['pagination']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['pagination']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['pagination']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['pagination']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['pagination']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['pagination']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['pagination']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['pagination']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['pagination']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['pagination']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['pagination']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['pagination']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['pagination']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['pagination']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['pagination']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['pagination']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['pagination']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['pagination']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['pagination']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['pagination']['total']);
?>
		<?php if ($_smarty_tpl->tpl_vars['p']->value==$_smarty_tpl->getVariable('smarty')->value['section']['pagination']['index']) {?>
			<li class="current"><span><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['p']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</span></li>
		<?php } else { ?>
			<li><a href="<?php echo SimpleBlogPost::getPageLink($_smarty_tpl->getVariable('smarty')->value['section']['pagination']['index'],$_smarty_tpl->tpl_vars['type']->value,$_smarty_tpl->tpl_vars['rewrite']->value);?>
"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->getVariable('smarty')->value['section']['pagination']['index'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</a></li>
		<?php }?>
	<?php endfor; endif; ?>
	<?php if ($_smarty_tpl->tpl_vars['pages_nb']->value>$_smarty_tpl->tpl_vars['stop']->value+2) {?>
		<li class="truncate">...</li>
		<li><a href="<?php echo SimpleBlogPost::getPageLink($_smarty_tpl->tpl_vars['pages_nb']->value,$_smarty_tpl->tpl_vars['type']->value,$_smarty_tpl->tpl_vars['rewrite']->value);?>
"><?php echo intval($_smarty_tpl->tpl_vars['pages_nb']->value);?>
</a></li>
	<?php }?>
	<?php if ($_smarty_tpl->tpl_vars['pages_nb']->value>1&&$_smarty_tpl->tpl_vars['p']->value!=$_smarty_tpl->tpl_vars['pages_nb']->value) {?>
		<?php $_smarty_tpl->tpl_vars['p_next'] = new Smarty_variable($_smarty_tpl->tpl_vars['p']->value+1, null, 0);?>
		<li id="pagination_next" class="pagination_next"><a href="<?php echo SimpleBlogPost::getPageLink($_smarty_tpl->tpl_vars['p_next']->value,$_smarty_tpl->tpl_vars['type']->value,$_smarty_tpl->tpl_vars['rewrite']->value);?>
"><?php echo smartyTranslate(array('s'=>'Next','mod'=>'ph_simpleblog'),$_smarty_tpl);?>
&nbsp;&raquo;</a></li>
	<?php } else { ?>
		<li id="pagination_next" class="disabled pagination_next"><span><?php echo smartyTranslate(array('s'=>'Next','mod'=>'ph_simpleblog'),$_smarty_tpl);?>
&nbsp;&raquo;</span></li>
	<?php }?>
	</ul>
<?php }?>
</div>
<!-- /Pagination -->		<?php }} ?>
