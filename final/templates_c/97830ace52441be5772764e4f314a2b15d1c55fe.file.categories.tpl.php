<?php /* Smarty version Smarty-3.1.15, created on 2016-06-06 02:38:28
         compiled from "C:\wamp\www\lbaw\Overview\proto\templates\moderation\categories.tpl" */ ?>
<?php /*%%SmartyHeaderCode:29113575469412f3871-68559102%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '97830ace52441be5772764e4f314a2b15d1c55fe' => 
    array (
      0 => 'C:\\wamp\\www\\lbaw\\Overview\\proto\\templates\\moderation\\categories.tpl',
      1 => 1465173456,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '29113575469412f3871-68559102',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_575469413e4458_97915140',
  'variables' => 
  array (
    'BASE_URL' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_575469413e4458_97915140')) {function content_575469413e4458_97915140($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('common/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<?php echo $_smarty_tpl->getSubTemplate ('common/status_messages.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<div class="container">
    <div class="row">
        <div class="col-xs-5 col-xs-offset-1">
            <div id="categoryContainer">
                <ul id="category-edit-listing">
                </ul>
            </div>
        </div>
        <div class="col-xs-6 input-edit">
            <form id="add-edit-form">
                <div class="input-group">
                    <input id="category-box" type="text" class="form-control" name="query" placeholder="Adicione uma categoria">

                    <span class="input-group-btn">
                      <button id="save-form-button" class="btn btn-default" type="button"><span class="glyphicon glyphicon-plus"></span></button>
                    </span>
                </div>
            </form>
        </div>
    </div>
</div>

<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
lib/slimScroll/jquery.slimscroll.min.js"></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
javascript/category_management.js"></script>
<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
css/categories.css">
<?php echo $_smarty_tpl->getSubTemplate ('common/footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>
