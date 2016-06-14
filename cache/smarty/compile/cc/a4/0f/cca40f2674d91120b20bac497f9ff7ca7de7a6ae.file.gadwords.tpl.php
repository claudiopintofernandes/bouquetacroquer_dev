<?php /* Smarty version Smarty-3.1.19, created on 2016-03-25 14:39:54
         compiled from "/srv/data/web/vhosts/www.bouquetacroquer.fr/htdocs/modules/gadwords/views/templates/admin/gadwords.tpl" */ ?>
<?php /*%%SmartyHeaderCode:176594220256f53faaa41289-73597805%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cca40f2674d91120b20bac497f9ff7ca7de7a6ae' => 
    array (
      0 => '/srv/data/web/vhosts/www.bouquetacroquer.fr/htdocs/modules/gadwords/views/templates/admin/gadwords.tpl',
      1 => 1458913192,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '176594220256f53faaa41289-73597805',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'module_dir' => 0,
    'code' => 0,
    'landing_page' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_56f53faaab4dc1_41322253',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56f53faaab4dc1_41322253')) {function content_56f53faaab4dc1_41322253($_smarty_tpl) {?>

<div class="panel">
	<div class="row gadwords-header">
		<div class="col-xs-6 text-center">
			<img id="adwords_logo" src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['module_dir']->value, ENT_QUOTES, 'UTF-8', true);?>
img/header_logo.jpg" alt="<?php echo smartyTranslate(array('s'=>'Google AdWords','mod'=>'gadwords'),$_smarty_tpl);?>
" />
		</div>
		<div class="col-xs-6 text-center">
			<span class="items-video-promotion"><object type="text/html" data="<?php echo smartyTranslate(array('s'=>'//www.youtube.com/embed/25AKLJAk-Lk?rel=0&amp;controls=0&amp;showinfo=0','mod'=>'gadwords'),$_smarty_tpl);?>
" width="400" height="225"></object></span>
		</div>
	</div>
	<hr />
	<div class="gadwords-content">
		<div class="row">
			<div class="col-xs-12">
				<p>
					<b>
						<?php echo smartyTranslate(array('s'=>'Show your ad to people at the very moment they are searching for what you offer. Google and PrestaShop increase your advertising investment by offering free advertising after you start spending!','mod'=>'gadwords'),$_smarty_tpl);?>

					</b>
				</p>

				<ul>
					<li><?php echo smartyTranslate(array('s'=>'Add your promotional code from Prestashop after entering billing details, and we will automatically credit your account when you spend a minimum credit*.','mod'=>'gadwords'),$_smarty_tpl);?>
</li>
					<li><?php echo smartyTranslate(array('s'=>'Got questions? Call at 0800 169 0489, and a Google AdWords expert will help you build your first campaign and offer tips on how to get the most out of AdWords.','mod'=>'gadwords'),$_smarty_tpl);?>
</li>
				</ul>
				<br/>
				<div class="col-xs-12 text-center">
						<h4><?php echo smartyTranslate(array('s'=>'Your Google AdWords promotional code for your shop is','mod'=>'gadwords'),$_smarty_tpl);?>
:</h4>
						<pre id="adwords_voucher"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['code']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</pre>
						<p><a href="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['landing_page']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" target="_blank" title="Google AdWords"><?php echo smartyTranslate(array('s'=>'Start your campaign now with your promotional code','mod'=>'gadwords'),$_smarty_tpl);?>
</a></p>
				</div>
				<em class="small">
					* <?php echo smartyTranslate(array('s'=>'terms and conditions apply.','mod'=>'gadwords'),$_smarty_tpl);?>

				</em>
			</div>
		</div>
	</div>
</div>
<?php }} ?>
