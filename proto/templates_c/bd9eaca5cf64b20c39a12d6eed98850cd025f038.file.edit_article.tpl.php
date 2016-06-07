<?php /* Smarty version Smarty-3.1.15, created on 2016-06-07 12:52:37
         compiled from "C:\wamp\www\Overview\proto\templates\articles\edit_article.tpl" */ ?>
<?php /*%%SmartyHeaderCode:24705729d53e7a7388-45458464%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'bd9eaca5cf64b20c39a12d6eed98850cd025f038' => 
    array (
      0 => 'C:\\wamp\\www\\Overview\\proto\\templates\\articles\\edit_article.tpl',
      1 => 1465252972,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '24705729d53e7a7388-45458464',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_5729d53eea3416_83681281',
  'variables' => 
  array (
    'BASE_URL' => 0,
    'article' => 0,
    'articleCategories' => 0,
    'category' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5729d53eea3416_83681281')) {function content_5729d53eea3416_83681281($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('common/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<?php echo $_smarty_tpl->getSubTemplate ('common/status_messages.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<div class="row">
  <div class="col-lg-12">
    <h1 class="page-header">
      <span class="glyphicon glyphicon-pencil"></span> Editar artigo
    </h1>

    <div class="option-buttons">
      <div class="btn-simple pull-right text-muted" id="delete">
         <span onclick="eliminate()" data-placement="bottom" data-toggle="tooltip" title="Eliminar" class="selectable glyphicon glyphicon-trash"></span>
       </div>

      <div class="btn-simple pull-right text-muted" id="discard">
        <span onclick="discard()" data-placement="bottom" data-toggle="tooltip" title="Cancelar" class="selectable glyphicon glyphicon-remove">&nbsp;</span>
      </div>

      <div class="btn-simple pull-right text-muted" id="save">
        <span onclick="save()" data-placement="bottom" data-toggle="tooltip" title="Guardar" class="selectable glyphicon glyphicon-ok">&nbsp;</span>
      </div>
    </div>
  </div>
</div>

<div class="container-fluid">

  <div class="row">
    <div class="text-center col-md-2 col-sm-12 col-xs-12">
      <img alt="Autor do artigo" src="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
<?php echo $_smarty_tpl->tpl_vars['article']->value['author_picture'];?>
" class="img-circle" height="80" width="80"/>
      <h4><?php echo $_smarty_tpl->tpl_vars['article']->value['first_name'];?>
 <?php echo $_smarty_tpl->tpl_vars['article']->value['last_name'];?>
</h4>
    </div>

    <div class="col-md-8 col-sm-12 col-xs-12">
      <form id="edit-form" class="form-horizontal" action="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
actions/articles/edit_article.php" method="post" enctype="multipart/form-data" onsubmit="return save();">

        <input id="article-id" type="hidden" class="form-control" name="id" value="<?php echo $_smarty_tpl->tpl_vars['article']->value['id'];?>
"/>

        <div id="edit-alert"></div>

        <div class="form-group">
          <label for="title">
            Título
          </label>
          <input type="text" class="form-control" name="title" placeholder="Título" value="<?php echo $_smarty_tpl->tpl_vars['article']->value['title'];?>
"/>
        </div>

        <div class="form-group">
          <label for="category">
            Categoria
          </label>
          <br>
          <select name="category" id="category">
            <option value="---">Selecione uma categoria</option>
            <?php  $_smarty_tpl->tpl_vars['category'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['category']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['articleCategories']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['category']->key => $_smarty_tpl->tpl_vars['category']->value) {
$_smarty_tpl->tpl_vars['category']->_loop = true;
?>
                <option value="<?php echo $_smarty_tpl->tpl_vars['category']->value['id'];?>
" <?php if ($_smarty_tpl->tpl_vars['category']->value['id']==$_smarty_tpl->tpl_vars['article']->value['category']) {?> selected  <?php }?>><?php echo $_smarty_tpl->tpl_vars['category']->value['name'];?>
</option>
            <?php } ?>
          </select>
        </div>

        <div class="form-group">
          <label for="summary">
            Sumário
          </label>
          <textarea style="overflow:auto;resize:vertical" class="form-control" id="summary" name="summary" rows="5" placeholder="Insira um pequeno resumo da notícia..."><?php echo $_smarty_tpl->tpl_vars['article']->value['summary'];?>
</textarea>
        </div>

        <div class="form-group">
          <label for="content">
            Conteúdo
          </label>
          <textarea style="overflow:auto;resize:vertical" class="form-control" id="content" name="content" rows="10"><?php echo $_smarty_tpl->tpl_vars['article']->value['content'];?>
</textarea>
        </div>

        <div class="form-group">
          <label for="images-upload">
            Imagens
          </label>
            <?php echo $_smarty_tpl->getSubTemplate ('common/small_image_gallery.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

            <?php $_smarty_tpl->tpl_vars["nImages"] = new Smarty_variable("0", null, 0);?>
            <?php echo $_smarty_tpl->getSubTemplate ('common/browse_button.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

        </div>

        <br>

        <div class="form-group">
          <button type="submit" class="pull-right btn btn-primary">
            <span class="glyphicon glyphicon-ok"></span> Guardar
          </button>

          <span class="pull-right">&nbsp;</span>

          <button type="button" onclick="discard()" class="pull-right btn btn-primary">
            <span class="glyphicon glyphicon-remove"></span> Cancelar
          </button>

          <span class="pull-right">&nbsp;</span>

          <button type="submit" onclick="eliminate()" class="pull-right btn btn-primary">
           <span class="glyphicon glyphicon-trash"></span> Eliminar
         </button>

        </div>

      </form>
    </div>
  </div>
</div>

<!-- rich text -->
<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
<script src="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
javascript/rich_text.js"></script>

<script src="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
lib/bootbox/bootbox.min.js"></script>
<script src="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
javascript/edit_article.js"></script>

<?php echo $_smarty_tpl->getSubTemplate ('common/footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php }} ?>
