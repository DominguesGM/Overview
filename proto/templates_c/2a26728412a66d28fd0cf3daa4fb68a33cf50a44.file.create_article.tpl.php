<?php /* Smarty version Smarty-3.1.15, created on 2016-06-01 20:05:54
         compiled from "C:\wamp\www\Overview\proto\templates\articles\create_article.tpl" */ ?>
<?php /*%%SmartyHeaderCode:11514572b601d378084-11401176%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2a26728412a66d28fd0cf3daa4fb68a33cf50a44' => 
    array (
      0 => 'C:\\wamp\\www\\Overview\\proto\\templates\\articles\\create_article.tpl',
      1 => 1464803182,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '11514572b601d378084-11401176',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_572b601d5c2d58_68976611',
  'variables' => 
  array (
    'BASE_URL' => 0,
    'PICTURE' => 0,
    'FIRST_NAME' => 0,
    'LAST_NAME' => 0,
    'FORM_VALUES' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_572b601d5c2d58_68976611')) {function content_572b601d5c2d58_68976611($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('common/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<?php echo $_smarty_tpl->getSubTemplate ('common/status_messages.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<div class="row">
  <div class="col-lg-12">
    <h1 class="page-header">
      <span class="glyphicon glyphicon-pencil"></span> Criar artigo
    </h1>

    <h2>
      <div class="button-link btn-simple pull-right text-muted" id="discard">
        <span onclick="discard()" data-placement="bottom" data-toggle="tooltip" title="Cancelar" class="glyphicon glyphicon-remove"></span>
      </div>

      <div class="button-link btn-simple pull-right text-muted" id="save">
        <span onclick="save()" data-placement="bottom" data-toggle="tooltip" title="Guardar" class="glyphicon glyphicon-ok">&nbsp</span>
      </div>
    </h2>
  </div>
</div>

<div class="container-fluid">

  <div class="row">
    <div class="col-md-2 col-sm-12 col-xs-12">
      <img src="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
<?php echo $_smarty_tpl->tpl_vars['PICTURE']->value;?>
" class="img-circle" width="80px"/>
      <h4><?php echo $_smarty_tpl->tpl_vars['FIRST_NAME']->value;?>
 <?php echo $_smarty_tpl->tpl_vars['LAST_NAME']->value;?>
</h4>
    </div>

    <div class="col-md-8 col-sm-12 col-xs-12">
      <form id="create-form" class="form-horizontal" role="form" action="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
actions/articles/create_article.php" method="post" enctype="multipart/form-data" onsubmit="return checkArticle();">

        <div id="create-alert"></div>

        <div class="form-group">
          <label for="title">
            Título
          </label>
          <input id="title" type="text" class="form-control" name="title" placeholder="Título" value="<?php echo $_smarty_tpl->tpl_vars['FORM_VALUES']->value['title'];?>
"/>
        </div>

        <div class="form-group">
          <label for="category">
            Categoria
          </label>
          <br>
          <select name="category" id="category">
            <option value="---">Selecione uma categoria</option>
          </select>
        </div>

        <div class="form-group">
          <label for="summary">
            Sumário
          </label>
          <textarea style="overflow:auto;resize:vertical" class="form-control" id="summary" name="summary" rows="5" placeholder="Insira um pequeno resumo da notícia..."><?php echo $_smarty_tpl->tpl_vars['FORM_VALUES']->value['summary'];?>
</textarea>
        </div>

        <div class="form-group">
          <label for="content">
            Conteúdo
          </label>
          <textarea style="overflow:auto;resize:vertical" class="form-control" id="content" name="content" rows="10"><?php echo $_smarty_tpl->tpl_vars['FORM_VALUES']->value['content'];?>
</textarea>
        </div>

        <div class="form-group">
          <label for="images-upload">
            Imagens
          </label>
            <?php $_smarty_tpl->tpl_vars["nImages"] = new Smarty_variable("1", null, 0);?>
            <?php echo $_smarty_tpl->getSubTemplate ('common/browse_button.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

        </div>

        <br>

        <div class="form-group">
          <button type="submit" class="pull-right btn btn-primary">
            <span class="glyphicon glyphicon-ok"></span> Guardar
          </button>

          <span class="pull-right">&nbsp</span>

          <button type="button" onclick="discard()" class="pull-right btn btn-primary">
            <span class="glyphicon glyphicon-remove"></span> Cancelar
          </button>

        </div>

      </form>
    </div>
  </div>
</div>
</div>

<!-- rich text -->
<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
<script src="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
javascript/rich_text.js"></script>

<script src="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
javascript/create_article.js"></script>

<?php echo $_smarty_tpl->getSubTemplate ('common/footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php }} ?>
