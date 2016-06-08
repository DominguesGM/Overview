<?php /* Smarty version Smarty-3.1.15, created on 2016-05-12 11:54:48
         compiled from "C:\wamp\www\lbaw\Overview\proto\templates\common\browse_button.tpl" */ ?>
<?php /*%%SmartyHeaderCode:7972573452e84f78f5-78352185%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '39f69033a70cca023f7b47dc6a0cd77a5700a1a3' => 
    array (
      0 => 'C:\\wamp\\www\\lbaw\\Overview\\proto\\templates\\common\\browse_button.tpl',
      1 => 1462549008,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '7972573452e84f78f5-78352185',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'nImages' => 0,
    'BASE_URL' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_573452e8522cc0_29098601',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_573452e8522cc0_29098601')) {function content_573452e8522cc0_29098601($_smarty_tpl) {?><input id="images-upload" name="images-upload[]" type="file" multiple data-show-upload="false" data-min-file-count="<?php echo $_smarty_tpl->tpl_vars['nImages']->value;?>
" data-show-preview="true">
<script src="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
javascript/browse_button_multifile.js"></script>
<?php }} ?>
