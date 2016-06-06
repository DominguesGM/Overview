<?php /* Smarty version Smarty-3.1.15, created on 2016-06-05 22:14:29
         compiled from "C:\wamp\www\lbaw\Overview\proto\templates\users\contributors.tpl" */ ?>
<?php /*%%SmartyHeaderCode:18385575488256b57e7-86231694%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'fae0ae549389f3a82811997aac98bd1267f7de48' => 
    array (
      0 => 'C:\\wamp\\www\\lbaw\\Overview\\proto\\templates\\users\\contributors.tpl',
      1 => 1465007457,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '18385575488256b57e7-86231694',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'ID' => 0,
    'contributorAccess' => 0,
    'administratorAccess' => 0,
    'contributors' => 0,
    'BASE_URL' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_575488258421b9_91762585',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_575488258421b9_91762585')) {function content_575488258421b9_91762585($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('common/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<?php echo $_smarty_tpl->getSubTemplate ('common/status_messages.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<div class="container">
  <div class="col-md-12">
    <hgroup class="mb20">
      <br>
      <h1><span class="fa fa-users"></span> Contribuidores</h1>
      <input id="user-type" type="hidden" value="Contributor">
      <input id="user-id" type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['ID']->value;?>
">
      <input id="contributor-access" type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['contributorAccess']->value;?>
">
      <input id="administrator-access" type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['administratorAccess']->value;?>
">
    </hgroup>
  </div>

  <div id="all-contributors" class="col-md-12">
    <br>
    <div id="list-users" class="nav nav-pills nav-stacked">
      <?php if (count($_smarty_tpl->tpl_vars['contributors']->value)==0) {?> <div class="no-users button-link" onclick="getUsers()">Não existem moderadores.</div><?php }?>
      <?php $_smarty_tpl->tpl_vars["users"] = new Smarty_variable($_smarty_tpl->tpl_vars['contributors']->value, null, 0);?>
      <?php echo $_smarty_tpl->getSubTemplate ('users/users.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

    </div>
  </div>
</div>

<script src="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
javascript/user_management.js"></script>
<?php echo $_smarty_tpl->getSubTemplate ('common/footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php }} ?>
