<?php /* Smarty version Smarty-3.1.15, created on 2016-05-12 11:52:31
         compiled from "C:\wamp\www\lbaw\Overview\proto\templates\common\user_menu.tpl" */ ?>
<?php /*%%SmartyHeaderCode:313135734525fb7bb93-54775437%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b70f3e494f9a514dca4f60963818a9596273d779' => 
    array (
      0 => 'C:\\wamp\\www\\lbaw\\Overview\\proto\\templates\\common\\user_menu.tpl',
      1 => 1461834565,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '313135734525fb7bb93-54775437',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'BASE_URL' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_5734525fc4af87_93659788',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5734525fc4af87_93659788')) {function content_5734525fc4af87_93659788($_smarty_tpl) {?><ul class="dropdown-menu">
  <!-- include user picture-->
  <li><a href="#"><span class="glyphicon glyphicon-user"></span> Perfil</a></li>
  <li><a href="#"><span class="glyphicon glyphicon-envelope"></span> Notificações</a></li>

  <<?php ?>?
  if($_SESSION['type']!= 'Contributor'
  && $_SESSION['status']!= 'Blocked'
  && $_SESSION['status']!= 'Inactive'){
  ?<?php ?>>
  <li class="divider"></li>
  <li><a href="#"><span class="glyphicon glyphicon-eye-open"></span> Área de Moderação</a></li>

  <<?php ?>? }
  if($_SESSION['type'] == 'Administrator'
  && $_SESSION['status']!= 'Blocked'
  && $_SESSION['status']!= 'Inactive'){
  ?<?php ?>>
  <li><a href="#"><span class="glyphicon glyphicon-lock"></span> Área de Administração</a></li>
  <<?php ?>? } ?<?php ?>>
  <li class="divider"></li>
  <li><a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
actions/users/logout.php"><span class="glyphicon glyphicon-share"></span> Sair</a></li>
</ul>
<?php }} ?>
