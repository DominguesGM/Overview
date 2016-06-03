<?php /* Smarty version Smarty-3.1.15, created on 2016-06-03 15:33:07
         compiled from "C:\wamp\www\Overview\proto\templates\users\contributors.tpl" */ ?>
<?php /*%%SmartyHeaderCode:6259575095b6b23322-68123135%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0d6aea6e2c131c0752113a8726c3230750fae027' => 
    array (
      0 => 'C:\\wamp\\www\\Overview\\proto\\templates\\users\\contributors.tpl',
      1 => 1464943953,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '6259575095b6b23322-68123135',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_575095b6e40fb8_09107880',
  'variables' => 
  array (
    'contributors' => 0,
    'BASE_URL' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_575095b6e40fb8_09107880')) {function content_575095b6e40fb8_09107880($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('common/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<?php echo $_smarty_tpl->getSubTemplate ('common/status_messages.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<div class="container">
  <div class="col-md-12">
    <hgroup class="mb20">
      <br>
      <h1><span class="fa fa-users"></span> Contribuidores</h1>
      <input id="user-type" type="hidden" value="Contributor">
    </hgroup>
  </div>

  <div id="all-contributors" class="col-md-12">
    <br>
    <div id="list-users" class="nav nav-pills nav-stacked">
      <?php if (count($_smarty_tpl->tpl_vars['contributors']->value)==0) {?> <div class="no-users">Não existem contribuidores.</div><?php }?>
      <?php $_smarty_tpl->tpl_vars["users"] = new Smarty_variable($_smarty_tpl->tpl_vars['contributors']->value, null, 0);?>
      <?php echo $_smarty_tpl->getSubTemplate ('users/users.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

    </div>
  </div>
</div>

<script src="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
javascript/user_management.js"></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
lib/slimScroll/jquery.slimscroll.min.js"></script>
<?php echo $_smarty_tpl->getSubTemplate ('common/footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php }} ?>
