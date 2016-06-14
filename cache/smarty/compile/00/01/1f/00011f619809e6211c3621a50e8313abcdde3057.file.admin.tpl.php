<?php /* Smarty version Smarty-3.1.19, created on 2016-04-25 19:51:21
         compiled from "/srv/data/web/vhosts/www.bouquetacroquer.fr/htdocs/modules/pk_bannercarousel/views/templates/admin/admin.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1897180453571e591981ca56-22498637%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '00011f619809e6211c3621a50e8313abcdde3057' => 
    array (
      0 => '/srv/data/web/vhosts/www.bouquetacroquer.fr/htdocs/modules/pk_bannercarousel/views/templates/admin/admin.tpl',
      1 => 1453301956,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1897180453571e591981ca56-22498637',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'slider' => 0,
    'error' => 0,
    'minic' => 0,
    'confirmation' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_571e591991b713_97631013',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_571e591991b713_97631013')) {function content_571e591991b713_97631013($_smarty_tpl) {?><script type="text/javascript">
    $(document).ready(function() {

        // Sortable
        $("ul.languages").sortable({
            opacity: 0.6,
            cursor: 'move',
            handle: '.orderer',
            update: function(event, ui) {
                var list = $(this);
                var number;
                var response;
                $.getJSON(
                    "<?php echo $_smarty_tpl->tpl_vars['slider']->value['sortUrl'];?>
", 
                    {slides: $(this).sortable("serialize")}, 
                    function(response){
                        if(response.success == "true"){
                            showResponse($("#sortable"), "<?php echo smartyTranslate(array('s'=>'Saved successfull','mod'=>'pk_bannercarousel'),$_smarty_tpl);?>
", 'conf');
                            var i = 1;
                            list.children("li").each(function(){
                                number = i;
                                if(i < 10){ 
                                    number = "0"+i; 
                                }
                                $(this).find(".order").text(number);
                                i++;
                            });
                        }else{
                            showResponse($("#sortable"), "<?php echo smartyTranslate(array('s'=>'Something went wrong, please refresh the page and try again','mod'=>'pk_bannercarousel'),$_smarty_tpl);?>
", 'error'); 
                        }
                  }
                );
            }
        });         
    });
</script>
		

<div id="minic">
    <?php if ($_smarty_tpl->tpl_vars['error']->value) {?>
        <?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['minic']->value['admin_tpl_path'])."messages.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('id'=>"main",'text'=>$_smarty_tpl->tpl_vars['error']->value,'class'=>'error'), 0);?>

    <?php }?>
    <?php if ($_smarty_tpl->tpl_vars['confirmation']->value) {?>
        <?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['minic']->value['admin_tpl_path'])."messages.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('id'=>"main",'text'=>$_smarty_tpl->tpl_vars['confirmation']->value,'class'=>'success'), 0);?>

    <?php }?>
    <div class="header">      
        <div id="navigation">
            <a href="#new" id="new-button" class="minic-open"><?php echo smartyTranslate(array('s'=>'Add New','mod'=>'pk_bannercarousel'),$_smarty_tpl);?>
</a>
            <a href="#options" id="options-button" class="minic-open"><?php echo smartyTranslate(array('s'=>'Options','mod'=>'pk_bannercarousel'),$_smarty_tpl);?>
</a>
        </div>
    </div>
    <!-- Options -->
    <?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['minic']->value['admin_tpl_path'])."options.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

    <!-- New -->
    <?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['minic']->value['admin_tpl_path'])."new.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

    <!-- Slides -->
    <?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['minic']->value['admin_tpl_path'])."slides.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

</div><?php }} ?>
