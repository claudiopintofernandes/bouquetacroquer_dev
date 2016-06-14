<?php /* Smarty version Smarty-3.1.19, created on 2016-03-10 09:18:16
         compiled from "/srv/data/web/vhosts/www.bouquetacroquer.fr/htdocs/themes/alysum/identity.tpl" */ ?>
<?php /*%%SmartyHeaderCode:4584596956e12dc8bd6379-00348133%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9c147eac02c50af91e69fb68180c4c66e150147d' => 
    array (
      0 => '/srv/data/web/vhosts/www.bouquetacroquer.fr/htdocs/themes/alysum/identity.tpl',
      1 => 1453302267,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '4584596956e12dc8bd6379-00348133',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'link' => 0,
    'navigationPipe' => 0,
    'confirmation' => 0,
    'pwd_changed' => 0,
    'email' => 0,
    'genders' => 0,
    'gender' => 0,
    'days' => 0,
    'v' => 0,
    'sl_day' => 0,
    'months' => 0,
    'k' => 0,
    'sl_month' => 0,
    'years' => 0,
    'sl_year' => 0,
    'newsletter' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_56e12dc8d16536_57982005',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56e12dc8d16536_57982005')) {function content_56e12dc8d16536_57982005($_smarty_tpl) {?><?php $_smarty_tpl->_capture_stack[0][] = array('path', null, null); ob_start(); ?>
    <a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value->getPageLink('my-account',true), ENT_QUOTES, 'UTF-8', true);?>
">
        <?php echo smartyTranslate(array('s'=>'My account'),$_smarty_tpl);?>

    </a>
    <span class="navigation-pipe">
        <?php echo $_smarty_tpl->tpl_vars['navigationPipe']->value;?>

    </span>
    <span class="navigation_page">
        <?php echo smartyTranslate(array('s'=>'Your personal information'),$_smarty_tpl);?>

    </span>
<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>
<div class="wht_bg ident">
    <div class="wrap_indent">
    <h1 class="page-subheading">
        <?php echo smartyTranslate(array('s'=>'Your personal information'),$_smarty_tpl);?>

    </h1>
    
    <?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tpl_dir']->value)."./errors.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

    
    <?php if (isset($_smarty_tpl->tpl_vars['confirmation']->value)&&$_smarty_tpl->tpl_vars['confirmation']->value) {?>
        <p class="alert alert-success">
            <?php echo smartyTranslate(array('s'=>'Your personal information has been successfully updated.'),$_smarty_tpl);?>

            <?php if (isset($_smarty_tpl->tpl_vars['pwd_changed']->value)) {?><br /><?php echo smartyTranslate(array('s'=>'Your password has been sent to your email:'),$_smarty_tpl);?>
 <?php echo $_smarty_tpl->tpl_vars['email']->value;?>
<?php }?>
        </p>
    <?php } else { ?>
        <p class="info-title">
            <?php echo smartyTranslate(array('s'=>'Please be sure to update your personal information if it has changed.'),$_smarty_tpl);?>

        </p>
        <p class="required">
            <sup>*</sup><?php echo smartyTranslate(array('s'=>'Required field'),$_smarty_tpl);?>

        </p>
        <form action="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value->getPageLink('identity',true), ENT_QUOTES, 'UTF-8', true);?>
" method="post" class="std">
            <div class="clearfix form-group">
                <label><?php echo smartyTranslate(array('s'=>'Title'),$_smarty_tpl);?>
</label>
                <?php  $_smarty_tpl->tpl_vars['gender'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['gender']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['genders']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['gender']->key => $_smarty_tpl->tpl_vars['gender']->value) {
$_smarty_tpl->tpl_vars['gender']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['gender']->key;
?>
                    <div class="radio-inline">
                        <label for="id_gender<?php echo $_smarty_tpl->tpl_vars['gender']->value->id;?>
" class="top">
                        <input type="radio" name="id_gender" id="id_gender<?php echo $_smarty_tpl->tpl_vars['gender']->value->id;?>
" value="<?php echo intval($_smarty_tpl->tpl_vars['gender']->value->id);?>
" <?php if (isset($_POST['id_gender'])&&$_POST['id_gender']==$_smarty_tpl->tpl_vars['gender']->value->id) {?>checked="checked"<?php }?> />
                        <?php echo $_smarty_tpl->tpl_vars['gender']->value->name;?>
</label>
                    </div>
                <?php } ?>
            </div>
            <div class="required form-group">
                <label for="firstname" class="required">
                    <?php echo smartyTranslate(array('s'=>'First name'),$_smarty_tpl);?>
 
                </label>
                <input class="is_required validate form-control" data-validate="isName" type="text" id="firstname" name="firstname" value="<?php echo $_POST['firstname'];?>
" />
            </div>
            <div class="required form-group">
                <label for="lastname" class="required">
                    <?php echo smartyTranslate(array('s'=>'Last name'),$_smarty_tpl);?>
 
                </label>
                <input class="is_required validate form-control" data-validate="isName" type="text" name="lastname" id="lastname" value="<?php echo $_POST['lastname'];?>
" />
            </div>
            <div class="required form-group">
                <label for="email" class="required">
                    <?php echo smartyTranslate(array('s'=>'E-mail address'),$_smarty_tpl);?>
 
                </label>
                <input class="is_required validate form-control" data-validate="isEmail" type="email" name="email" id="email" value="<?php echo $_POST['email'];?>
" />
            </div>
            <div class="form-group">
                <label>
                    <?php echo smartyTranslate(array('s'=>'Date of Birth'),$_smarty_tpl);?>

                </label>
                <div class="row">
                    <div class="col-xs-4">
                        <select name="days" id="days" class="form-control">
                            <option value="">-</option>
                            <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['days']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
?>
                                <option value="<?php echo $_smarty_tpl->tpl_vars['v']->value;?>
" <?php if (($_smarty_tpl->tpl_vars['sl_day']->value==$_smarty_tpl->tpl_vars['v']->value)) {?>selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['v']->value;?>
&nbsp;&nbsp;</option>
                            <?php } ?>
                        </select>

                    </div>
                    <div class="col-xs-4">
                        <select id="months" name="months" class="form-control">
                            <option value="">-</option>
                            <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['months']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
                                <option value="<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
" <?php if (($_smarty_tpl->tpl_vars['sl_month']->value==$_smarty_tpl->tpl_vars['k']->value)) {?>selected="selected"<?php }?>><?php echo smartyTranslate(array('s'=>$_smarty_tpl->tpl_vars['v']->value),$_smarty_tpl);?>
&nbsp;</option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="col-xs-4">
                        <select id="years" name="years" class="form-control">
                            <option value="">-</option>
                            <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['years']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
?>
                                <option value="<?php echo $_smarty_tpl->tpl_vars['v']->value;?>
" <?php if (($_smarty_tpl->tpl_vars['sl_year']->value==$_smarty_tpl->tpl_vars['v']->value)) {?>selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['v']->value;?>
&nbsp;&nbsp;</option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
            </div>
            <div class="required form-group">
                <label for="old_passwd" class="required">
                    <?php echo smartyTranslate(array('s'=>'Current Password'),$_smarty_tpl);?>
 
                </label>
                <input class="is_required validate form-control" type="password" data-validate="isPasswd" name="old_passwd" id="old_passwd" />
            </div>
            <div class="password form-group">
                <label for="passwd">
                    <?php echo smartyTranslate(array('s'=>'New Password'),$_smarty_tpl);?>

                </label>
                <input class="is_required validate form-control" type="password" data-validate="isPasswd" name="passwd" id="passwd" />
            </div>
            <div class="password form-group">
                <label for="confirmation">
                    <?php echo smartyTranslate(array('s'=>'Confirmation'),$_smarty_tpl);?>

                </label>
                <input class="is_required validate form-control" type="password" data-validate="isPasswd" name="confirmation" id="confirmation" />
            </div>
            <?php if ($_smarty_tpl->tpl_vars['newsletter']->value) {?>
                <div class="checkbox">
                    <label for="newsletter">
                        <input type="checkbox" id="newsletter" name="newsletter" value="1" <?php if (isset($_POST['newsletter'])&&$_POST['newsletter']==1) {?> checked="checked"<?php }?>/>
                        <?php echo smartyTranslate(array('s'=>'Sign up for our newsletter!'),$_smarty_tpl);?>

                    </label>
                </div>
                <div class="checkbox">
                    <label for="optin">
                        <input type="checkbox" name="optin" id="optin" value="1" <?php if (isset($_POST['optin'])&&$_POST['optin']==1) {?> checked="checked"<?php }?>/>
                        <?php echo smartyTranslate(array('s'=>'Receive special offers from our partners!'),$_smarty_tpl);?>

                    </label>
                </div>
            <?php }?>
            <div class="form-group">
                <input type="submit" name="submitIdentity" class="btn btn-default button button-medium" value="<?php echo smartyTranslate(array('s'=>'Save'),$_smarty_tpl);?>
" />
            </div>
            <p id="security_informations" class="text-right">
                <i><?php echo smartyTranslate(array('s'=>'[Insert customer data privacy clause here, if applicable]'),$_smarty_tpl);?>
</i>
            </p>
        </form> <!-- .std -->
    <?php }?>
</div>
</div><?php }} ?>
