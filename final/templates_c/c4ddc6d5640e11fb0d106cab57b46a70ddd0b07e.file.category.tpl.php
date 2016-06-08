<?php /* Smarty version Smarty-3.1.15, created on 2016-06-06 14:45:45
         compiled from "C:\wamp\www\Overview\proto\templates\category.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1924957557079d1dd87-46308050%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c4ddc6d5640e11fb0d106cab57b46a70ddd0b07e' => 
    array (
      0 => 'C:\\wamp\\www\\Overview\\proto\\templates\\category.tpl',
      1 => 1465201849,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1924957557079d1dd87-46308050',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'category' => 0,
    'BASE_URL' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_57557079e60ff6_09543935',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_57557079e60ff6_09543935')) {function content_57557079e60ff6_09543935($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('common/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<div id="result-container" class="container" data-category="<?php echo $_smarty_tpl->tpl_vars['category']->value;?>
">

</div>
<script src="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
javascript/search_page.js"></script>

<?php echo $_smarty_tpl->getSubTemplate ('common/footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php }} ?>
