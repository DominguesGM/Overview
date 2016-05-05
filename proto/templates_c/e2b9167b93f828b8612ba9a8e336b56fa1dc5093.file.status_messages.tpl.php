<?php /* Smarty version Smarty-3.1.15, created on 2016-05-05 16:55:21
         compiled from "C:\wamp\www\Overview\proto\templates\common\status_messages.tpl" */ ?>
<?php /*%%SmartyHeaderCode:30820572b5cf20687f7-55673984%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e2b9167b93f828b8612ba9a8e336b56fa1dc5093' => 
    array (
      0 => 'C:\\wamp\\www\\Overview\\proto\\templates\\common\\status_messages.tpl',
      1 => 1462460106,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '30820572b5cf20687f7-55673984',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_572b5cf2154406_68697601',
  'variables' => 
  array (
    'ERROR_MESSAGES' => 0,
    'error' => 0,
    'SUCCESS_MESSAGES' => 0,
    'success' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_572b5cf2154406_68697601')) {function content_572b5cf2154406_68697601($_smarty_tpl) {?><div id="error_messages">
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
