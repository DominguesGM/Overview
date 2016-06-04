<?php /* Smarty version Smarty-3.1.15, created on 2016-06-04 03:06:53
         compiled from "C:\wamp\www\lbaw\Overview\proto\templates\category.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1437575229adbc8f65-06501334%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7256457939f49170579b139beba3bb2047d462e2' => 
    array (
      0 => 'C:\\wamp\\www\\lbaw\\Overview\\proto\\templates\\category.tpl',
      1 => 1465001138,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1437575229adbc8f65-06501334',
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
  'unifunc' => 'content_575229ae251d16_25793193',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_575229ae251d16_25793193')) {function content_575229ae251d16_25793193($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('common/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<div id="result-container" class="container" data-category="<?php echo $_smarty_tpl->tpl_vars['category']->value;?>
">

</div>
<script src="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
javascript/search_page.js"></script>

<?php echo $_smarty_tpl->getSubTemplate ('common/footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php }} ?>
