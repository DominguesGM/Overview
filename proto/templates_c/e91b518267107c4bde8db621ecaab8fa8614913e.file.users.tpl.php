<?php /* Smarty version Smarty-3.1.15, created on 2016-06-05 19:51:49
         compiled from "C:\wamp\www\lbaw\Overview\proto\templates\users\users.tpl" */ ?>
<?php /*%%SmartyHeaderCode:3726575466b52d38d5-05928045%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e91b518267107c4bde8db621ecaab8fa8614913e' => 
    array (
      0 => 'C:\\wamp\\www\\lbaw\\Overview\\proto\\templates\\users\\users.tpl',
      1 => 1465007457,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3726575466b52d38d5-05928045',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'users' => 0,
    'user' => 0,
    'BASE_URL' => 0,
    'moderatorAccess' => 0,
    'administratorAccess' => 0,
    'ID' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_575466b55307c1_67791951',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_575466b55307c1_67791951')) {function content_575466b55307c1_67791951($_smarty_tpl) {?><?php  $_smarty_tpl->tpl_vars['user'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['user']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['users']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['user']->key => $_smarty_tpl->tpl_vars['user']->value) {
$_smarty_tpl->tpl_vars['user']->_loop = true;
?>
<div id="user-<?php echo $_smarty_tpl->tpl_vars['user']->value['id'];?>
" href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
pages/users/profile.php?id=<?php echo $_smarty_tpl->tpl_vars['user']->value['id'];?>
" class="selectable user-card button-link col-md-3">
  <div class="text-center button-link col-xs-8 col-md-8">
  <a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
pages/users/profile.php?id=<?php echo $_smarty_tpl->tpl_vars['user']->value['id'];?>
">
    <img class="img-circle" height="100" width="100" alt="Imagem de perfil" src="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
<?php echo $_smarty_tpl->tpl_vars['user']->value['path'];?>
">
  </a>
  <h4 class="user_name"><a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
users/profile.php?id=<?php echo $_smarty_tpl->tpl_vars['user']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['user']->value['first_name'];?>
 <?php echo $_smarty_tpl->tpl_vars['user']->value['last_name'];?>
</a></h4>
  </div>
  <div class="pull-left col-xs-4 col-md-4">
  <?php if (($_smarty_tpl->tpl_vars['moderatorAccess']->value||$_smarty_tpl->tpl_vars['administratorAccess']->value)&&$_smarty_tpl->tpl_vars['user']->value['id']!=$_smarty_tpl->tpl_vars['ID']->value) {?>
  <ul class="btn-simple all-blogs">
    <?php if ($_smarty_tpl->tpl_vars['administratorAccess']->value&&$_smarty_tpl->tpl_vars['user']->value['id']!=$_smarty_tpl->tpl_vars['ID']->value) {?>
    <li class="user-info">
      <small>
        <span onclick="toggleUserType(<?php echo $_smarty_tpl->tpl_vars['user']->value['id'];?>
)" data-placement="right" data-toggle="tooltip" title="<?php if ($_smarty_tpl->tpl_vars['user']->value['type']=='Moderator') {?>Despromover moderador<?php } else { ?>Promover a moderador<?php }?>" class="user-type text-muted selectable <?php if ($_smarty_tpl->tpl_vars['user']->value['type']=='Moderator') {?>glyphicon glyphicon-eye-close<?php } else { ?>glyphicon glyphicon-eye-open<?php }?>"></span>
      </small>
    </li>
    <?php }?>
    <li class="user-info">
      <small>
        <span onclick="toggleUserStatus(<?php echo $_smarty_tpl->tpl_vars['user']->value['id'];?>
)" data-placement="right" data-toggle="tooltip" title="<?php if ($_smarty_tpl->tpl_vars['user']->value['status']!='Blocked') {?>Bloquear<?php } else { ?>Desbloquear<?php }?>" class="user-status glyphicon glyphicon-ban-circle selectable <?php if ($_smarty_tpl->tpl_vars['user']->value['status']=='Blocked') {?>blocked <?php } else { ?> text-muted <?php }?>">
        </span>
      </small>
    </li>
  </ul>
  <?php }?>
  </div>
</div>
<?php } ?>
<?php }} ?>
