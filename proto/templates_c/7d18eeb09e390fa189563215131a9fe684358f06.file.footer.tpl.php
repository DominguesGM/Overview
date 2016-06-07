<?php /* Smarty version Smarty-3.1.15, created on 2016-06-07 03:10:56
         compiled from "C:\wamp\www\lbaw\Overview\proto\templates\common\footer.tpl" */ ?>
<?php /*%%SmartyHeaderCode:289595721e88570d9f5-09750137%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7d18eeb09e390fa189563215131a9fe684358f06' => 
    array (
      0 => 'C:\\wamp\\www\\lbaw\\Overview\\proto\\templates\\common\\footer.tpl',
      1 => 1465261817,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '289595721e88570d9f5-09750137',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_5721e88576ee14_20788268',
  'variables' => 
  array (
    'BASE_URL' => 0,
    'ID' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5721e88576ee14_20788268')) {function content_5721e88576ee14_20788268($_smarty_tpl) {?></div>
<hr>

<!-- Footer -->
<footer>
    <div class="row text-center">
        <div class="col-lg-12">
                <p>Copyright &copy; Overview 2016</p>
        </div>
    </div>
    <!-- /.row -->
</footer>

</div>
<div class="scroll-top-wrapper ">
  <span class="scroll-top-inner">
    <i class="fa fa-2x fa-arrow-circle-up"></i>
  </span>
</div>
</div>

<!-- browse_button Script -->
<script src="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
javascript/browse_button.js"></script>

<!-- Header and Sidebar Script -->
<script>BASE_URL = "<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
"</script>

<!-- Register Script -->
<?php if (!$_smarty_tpl->tpl_vars['ID']->value) {?>
<script src="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
javascript/register.js"></script>
<?php }?>

<script src="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
javascript/main.js"></script>

</body>

</html>
<?php }} ?>
