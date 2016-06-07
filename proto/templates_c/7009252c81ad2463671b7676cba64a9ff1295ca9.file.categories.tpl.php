<?php /* Smarty version Smarty-3.1.15, created on 2016-06-07 03:36:44
         compiled from "C:\wamp\www\lbaw\Overview\proto\templates\administration\categories.tpl" */ ?>
<?php /*%%SmartyHeaderCode:185885756252c188985-95440789%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7009252c81ad2463671b7676cba64a9ff1295ca9' => 
    array (
      0 => 'C:\\wamp\\www\\lbaw\\Overview\\proto\\templates\\administration\\categories.tpl',
      1 => 1465263181,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '185885756252c188985-95440789',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'BASE_URL' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_5756252c271960_29218122',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5756252c271960_29218122')) {function content_5756252c271960_29218122($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('common/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<?php echo $_smarty_tpl->getSubTemplate ('common/status_messages.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<div class="container">
  <div class="col-md-12">
    <hgroup class="mb20">
      <br>
      <h1><span class="glyphicon glyphicon-tag"></span> Categorias </h1>
      <h2 class="lead">Criar ou alterar as categorias de artigos.</h2>
    </hgroup>
  </div>

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
<script src="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
lib/bootbox/bootbox.min.js"></script>
<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
css/categories.css">
<?php echo $_smarty_tpl->getSubTemplate ('common/footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php }} ?>
