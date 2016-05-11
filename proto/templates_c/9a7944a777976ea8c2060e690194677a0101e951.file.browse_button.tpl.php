<?php /* Smarty version Smarty-3.1.15, created on 2016-05-05 12:31:38
         compiled from "C:\wamp\www\Overview\proto\templates\common\browse_button.tpl" */ ?>
<?php /*%%SmartyHeaderCode:265165729d53f502c88-55657384%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9a7944a777976ea8c2060e690194677a0101e951' => 
    array (
      0 => 'C:\\wamp\\www\\Overview\\proto\\templates\\common\\browse_button.tpl',
      1 => 1462444140,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '265165729d53f502c88-55657384',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_5729d53f552245_59633550',
  'variables' => 
  array (
    'nImages' => 0,
    'BASE_URL' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5729d53f552245_59633550')) {function content_5729d53f552245_59633550($_smarty_tpl) {?><input id="images-upload" name="images-upload[]" type="file" multiple data-show-upload="false" data-min-file-count="<?php echo $_smarty_tpl->tpl_vars['nImages']->value;?>
" data-show-preview="true">
<script src="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
javascript/browse_button_multifile.js"></script>
<?php }} ?>
