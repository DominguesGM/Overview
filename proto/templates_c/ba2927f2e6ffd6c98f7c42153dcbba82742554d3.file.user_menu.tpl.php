<?php /* Smarty version Smarty-3.1.15, created on 2016-05-12 12:06:24
         compiled from "C:\wamp\www\Overview\proto\templates\common\user_menu.tpl" */ ?>
<?php /*%%SmartyHeaderCode:170475729f94e1814f9-54439382%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ba2927f2e6ffd6c98f7c42153dcbba82742554d3' => 
    array (
      0 => 'C:\\wamp\\www\\Overview\\proto\\templates\\common\\user_menu.tpl',
      1 => 1463047577,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '170475729f94e1814f9-54439382',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_5729f94e3901a9_11697449',
  'variables' => 
  array (
    'TYPE' => 0,
    'STATUS' => 0,
    'BASE_URL' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5729f94e3901a9_11697449')) {function content_5729f94e3901a9_11697449($_smarty_tpl) {?><ul class="dropdown-menu">
  <!-- include user picture-->
  <li><a href="#"><span class="glyphicon glyphicon-user"></span> Perfil</a></li>
  <li><a href="#"><span class="glyphicon glyphicon-envelope"></span> Notificações</a></li>

  <?php if ($_smarty_tpl->tpl_vars['TYPE']->value!='Contributor'&&($_smarty_tpl->tpl_vars['STATUS']->value=='Active'||$_smarty_tpl->tpl_vars['STATUS']->value=='Warned')) {?>
    <li class="divider"></li>
    <li><a href="#"><span class="glyphicon glyphicon-eye-open"></span> Área de Moderação</a></li>
  <?php }?>

  <?php if ($_smarty_tpl->tpl_vars['TYPE']->value=='Administrator'&&($_smarty_tpl->tpl_vars['STATUS']->value=='Active'||$_smarty_tpl->tpl_vars['STATUS']->value=='Warned')) {?>
    <li><a href="#"><span class="glyphicon glyphicon-lock"></span> Área de Administração</a></li>
  <?php }?>

  <li class="divider"></li>
  <li><a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
actions/users/logout.php"><span class="glyphicon glyphicon-share"></span> Sair</a></li>
</ul>
<?php }} ?>
