<?php /* Smarty version Smarty-3.1.15, created on 2016-05-12 11:45:18
         compiled from "C:\wamp\www\lbaw\Overview\proto\templates\common\status_messages.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1904573450aeded414-90889262%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '71291624a3259c085fc40d30440a5aa3466efdf8' => 
    array (
      0 => 'C:\\wamp\\www\\lbaw\\Overview\\proto\\templates\\common\\status_messages.tpl',
      1 => 1462549008,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1904573450aeded414-90889262',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'ERROR_MESSAGES' => 0,
    'error' => 0,
    'SUCCESS_MESSAGES' => 0,
    'success' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_573450af080619_17320930',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_573450af080619_17320930')) {function content_573450af080619_17320930($_smarty_tpl) {?><div id="error_messages">
<?php  $_smarty_tpl->tpl_vars['error'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['error']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['ERROR_MESSAGES']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['error']->key => $_smarty_tpl->tpl_vars['error']->value) {
$_smarty_tpl->tpl_vars['error']->_loop = true;
?>
  <div class="error alert alert-danger">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <?php echo $_smarty_tpl->tpl_vars['error']->value;?>
</div>
<?php } ?>
</div>
<div id="success_messages">
<?php  $_smarty_tpl->tpl_vars['success'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['success']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['SUCCESS_MESSAGES']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['success']->key => $_smarty_tpl->tpl_vars['success']->value) {
$_smarty_tpl->tpl_vars['success']->_loop = true;
?>
  <div class="success alert alert-success">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <?php echo $_smarty_tpl->tpl_vars['success']->value;?>
</div>
<?php } ?>
</div>
<?php }} ?>
