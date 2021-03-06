{include file='common/header.tpl'}

{include file='common/status_messages.tpl'}

<div class="row">
  <div class="col-lg-12">
    <h1 class="page-header">
      <span class="glyphicon glyphicon-pencil"></span> Criar artigo
    </h1>

    <div class="option-buttons">
      <div class="button-link btn-simple pull-right text-muted" id="discard">
        <span onclick="discard()" data-placement="bottom" data-toggle="tooltip" title="Cancelar" class="glyphicon glyphicon-remove"></span>
      </div>

      <div class="button-link btn-simple pull-right text-muted" id="save">
        <span onclick="save()" data-placement="bottom" data-toggle="tooltip" title="Guardar" class="glyphicon glyphicon-ok">&nbsp;</span>
      </div>
    </div>
  </div>
</div>

<div class="container-fluid">

  <div class="row">
    <div class="text-center col-md-2 col-sm-12 col-xs-12">
      <img alt="Autor do artigo" src="{$BASE_URL}{$PICTURE}" class="img-circle" height="80" width="80"/>
      <h4>{$FIRST_NAME} {$LAST_NAME}</h4>
    </div>

    <div class="col-md-8 col-sm-12 col-xs-12">
      <form id="create-form" class="form-horizontal" action="{$BASE_URL}actions/articles/create_article.php" method="post" enctype="multipart/form-data" onsubmit="return checkArticle();">
          <div id="create-alert"></div>
        <div class="form-group">
          <label for="title">
            Título
          </label>
          <input id="title" type="text" class="form-control" name="title" placeholder="Título" value="{$FORM_VALUES.title}"/>
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
          <textarea style="overflow:auto;resize:vertical" class="form-control" id="summary" name="summary" rows="5" placeholder="Insira um pequeno resumo da notícia...">{$FORM_VALUES.summary}</textarea>
        </div>

        <div class="form-group">
          <label for="content">
            Conteúdo
          </label>
          <textarea style="overflow:auto;resize:vertical" class="form-control" id="content" name="content" rows="10">{$FORM_VALUES.content}</textarea>
        </div>

        <div class="form-group">
          <label for="images-upload">
            Imagens
          </label>
            {assign "nImages" "1"}
            {include file='common/browse_button.tpl'}
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

        </div>

      </form>
    </div>
  </div>
</div>

<!-- rich text -->
<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
<script src="{$BASE_URL}javascript/rich_text.js"></script>

<script src="{$BASE_URL}javascript/create_article.js"></script>

{include file='common/footer.tpl'}
