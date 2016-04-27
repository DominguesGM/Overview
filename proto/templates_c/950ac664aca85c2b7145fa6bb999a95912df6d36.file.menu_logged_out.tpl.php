<?php /* Smarty version Smarty-3.1.15, created on 2016-04-26 17:56:53
         compiled from "C:\wamp\www\Overview\proto\templates\common\menu_logged_out.tpl" */ ?>
<?php /*%%SmartyHeaderCode:32676571f8fc5e90976-97529131%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '950ac664aca85c2b7145fa6bb999a95912df6d36' => 
    array (
      0 => 'C:\\wamp\\www\\Overview\\proto\\templates\\common\\menu_logged_out.tpl',
      1 => 1461234235,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '32676571f8fc5e90976-97529131',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'BASE_URL' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_571f8fc6009753_54050206',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_571f8fc6009753_54050206')) {function content_571f8fc6009753_54050206($_smarty_tpl) {?><a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
pages/users/register.php">Register</a>
<form action="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
actions/users/login.php" method="post">
  <input type="text" placeholder="username" name="username">
  <input type="password" placeholder="password" name="password">
  <input type="submit" value=">">
</form>
<?php }} ?>
