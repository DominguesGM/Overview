<?php /* Smarty version Smarty-3.1.15, created on 2016-06-03 03:54:59
         compiled from "C:\wamp\www\Overview\proto\templates\users\moderators.tpl" */ ?>
<?php /*%%SmartyHeaderCode:281775750e2689101f3-58708109%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'fc8301e927b689ba482b6d42e0eb7dcba815621f' => 
    array (
      0 => 'C:\\wamp\\www\\Overview\\proto\\templates\\users\\moderators.tpl',
      1 => 1464918806,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '281775750e2689101f3-58708109',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_5750e268b07898_04482576',
  'variables' => 
  array (
    'moderators' => 0,
    'BASE_URL' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5750e268b07898_04482576')) {function content_5750e268b07898_04482576($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('common/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<?php echo $_smarty_tpl->getSubTemplate ('common/status_messages.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<div class="container">
  <div class="col-md-12">
    <hgroup class="mb20">
      <br>
      <h1><span class="fa fa-users"></span> Moderadores</h1>
      <input id="user-type" type="hidden" value="moderators">
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
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
lib/slimScroll/jquery.slimscroll.min.js"></script>
<?php echo $_smarty_tpl->getSubTemplate ('common/footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php }} ?>
