<?php /* Smarty version Smarty-3.1.15, created on 2016-06-03 03:59:05
         compiled from "C:\wamp\www\Overview\proto\templates\common\user_menu.tpl" */ ?>
<?php /*%%SmartyHeaderCode:170475729f94e1814f9-54439382%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ba2927f2e6ffd6c98f7c42153dcbba82742554d3' => 
    array (
      0 => 'C:\\wamp\\www\\Overview\\proto\\templates\\common\\user_menu.tpl',
      1 => 1464919137,
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
    'BASE_URL' => 0,
    'ID' => 0,
    'PICTURE' => 0,
    'TYPE' => 0,
    'STATUS' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5729f94e3901a9_11697449')) {function content_5729f94e3901a9_11697449($_smarty_tpl) {?><ul class="dropdown-menu multi-level" role="menu">
  <li><a class="text-center" href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
pages/users/profile.php?id=<?php echo $_smarty_tpl->tpl_vars['ID']->value;?>
">
    <img class="img-circle" height="50" width="50" alt="Imagem de perfil" src="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
<?php echo $_smarty_tpl->tpl_vars['PICTURE']->value;?>
">
  </a></li>

  <li><a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
pages/users/profile.php?id=<?php echo $_smarty_tpl->tpl_vars['ID']->value;?>
"><span class="glyphicon glyphicon-user"></span> Perfil</a></li>
  <li><a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
pages/users/articles.php"><span class="glyphicon glyphicon-duplicate"></span> Artigos</a></li>
  <li><a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
pages/users/notifications.php"><span class="glyphicon glyphicon-envelope"></span> Notificações</a></li>

  <?php if ($_smarty_tpl->tpl_vars['TYPE']->value!='Contributor'&&($_smarty_tpl->tpl_vars['STATUS']->value=='Active'||$_smarty_tpl->tpl_vars['STATUS']->value=='Warned')) {?>
    <li class="divider"></li>
    <li class="dropdown-submenu"><a tabindex="-1" href="#"><span class="glyphicon glyphicon-eye-open"></span> Moderação</a>
        <ul class="dropdown-menu">
          <li><a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
pages/moderation/reports.php"><span class="glyphicon glyphicon-flag"></span> Itens reportados</a></li>
          <li><a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
pages/moderation/contributors.php"><span class="fa fa-users"></span> Contribuidores</a></li>
        </ul>
    </li>
  <?php }?>

  <?php if ($_smarty_tpl->tpl_vars['TYPE']->value=='Administrator'&&($_smarty_tpl->tpl_vars['STATUS']->value=='Active'||$_smarty_tpl->tpl_vars['STATUS']->value=='Warned')) {?>
    <li class="dropdown-submenu"><a tabindex="-1" href="#"><span class="glyphicon glyphicon-lock"></span> Administração</a>
        <ul class="dropdown-menu">
        <li><a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
pages/administration/moderators.php"><span class="fa fa-users"></span> Moderadores</a></li>
        <li><a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
pages/administration/categories.php"><span class="glyphicon glyphicon-tag"></span> Categorias</a></li>
        </ul>
    </li>
  <?php }?>

  <li class="divider"></li>
  <li><a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
actions/users/logout.php"><span class="glyphicon glyphicon-share"></span> Sair</a></li>
</ul>
<?php }} ?>
