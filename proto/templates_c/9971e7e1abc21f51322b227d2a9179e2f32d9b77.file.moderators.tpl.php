<?php /* Smarty version Smarty-3.1.15, created on 2016-06-05 19:51:48
         compiled from "C:\wamp\www\lbaw\Overview\proto\templates\users\moderators.tpl" */ ?>
<?php /*%%SmartyHeaderCode:16009575466b4ba7937-05703769%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9971e7e1abc21f51322b227d2a9179e2f32d9b77' => 
    array (
      0 => 'C:\\wamp\\www\\lbaw\\Overview\\proto\\templates\\users\\moderators.tpl',
      1 => 1465007457,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '16009575466b4ba7937-05703769',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'ID' => 0,
    'moderatorAccess' => 0,
    'administratorAccess' => 0,
    'moderators' => 0,
    'BASE_URL' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_575466b50fb532_30318887',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_575466b50fb532_30318887')) {function content_575466b50fb532_30318887($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('common/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<?php echo $_smarty_tpl->getSubTemplate ('common/status_messages.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<div class="container">
  <div class="col-md-12">
    <hgroup class="mb20">
      <br>
      <h1><span class="fa fa-users"></span> Moderadores</h1>
      <input id="user-type" type="hidden" value="Moderator">
      <input id="user-id" type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['ID']->value;?>
">
      <input id="moderator-access" type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['moderatorAccess']->value;?>
">
      <input id="administrator-access" type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['administratorAccess']->value;?>
">
    </hgroup>
  </div>

  <div id="all-moderators" class="col-md-12">
    <br>
    <div id="list-users" class="nav nav-pills nav-stacked">
      <?php if (count($_smarty_tpl->tpl_vars['moderators']->value)==0) {?> <div class="no-users button-link" onclick="getUsers()">Não existem moderadores.</div><?php }?>
      <?php $_smarty_tpl->tpl_vars["users"] = new Smarty_variable($_smarty_tpl->tpl_vars['moderators']->value, null, 0);?>
      <?php echo $_smarty_tpl->getSubTemplate ('users/users.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

    </div>
  </div>
</div>

<script src="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
javascript/user_management.js"></script>
<?php echo $_smarty_tpl->getSubTemplate ('common/footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php }} ?>
