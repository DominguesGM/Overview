<?php /* Smarty version Smarty-3.1.15, created on 2016-06-05 19:51:31
         compiled from "C:\wamp\www\lbaw\Overview\proto\templates\common\user_menu.tpl" */ ?>
<?php /*%%SmartyHeaderCode:313135734525fb7bb93-54775437%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b70f3e494f9a514dca4f60963818a9596273d779' => 
    array (
      0 => 'C:\\wamp\\www\\lbaw\\Overview\\proto\\templates\\common\\user_menu.tpl',
      1 => 1465007457,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '313135734525fb7bb93-54775437',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_5734525fc4af87_93659788',
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
<?php if ($_valid && !is_callable('content_5734525fc4af87_93659788')) {function content_5734525fc4af87_93659788($_smarty_tpl) {?><ul class="dropdown-menu multi-level" role="menu">
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
