<?php /* Smarty version Smarty-3.1.15, created on 2016-06-06 15:47:06
         compiled from "C:\wamp\www\Overview\proto\templates\administration\categories.tpl" */ ?>
<?php /*%%SmartyHeaderCode:748957557eda53f545-70035101%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6f1cad5cd6abbc0cbbe4bff60291bbb4f1e49f00' => 
    array (
      0 => 'C:\\wamp\\www\\Overview\\proto\\templates\\administration\\categories.tpl',
      1 => 1465220802,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '748957557eda53f545-70035101',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'BASE_URL' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_57557eda6b5868_60079425',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_57557eda6b5868_60079425')) {function content_57557eda6b5868_60079425($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('common/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


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
<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
css/categories.css">
<?php echo $_smarty_tpl->getSubTemplate ('common/footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php }} ?>
