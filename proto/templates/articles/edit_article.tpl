{include file='common/header.tpl'}

{include file='common/status_messages.tpl'}

<div class="row">
  <div class="col-lg-12">
    <h1 class="page-header">
      <span class="glyphicon glyphicon-pencil"></span> Editar artigo
    </h1>

    <h2>
      <div class="btn-simple pull-right text-muted" id="delete">
         <span onclick="eliminate()" data-placement="bottom" data-toggle="tooltip" title="Eliminar" class="glyphicon glyphicon-trash"></span>
       </div>

      <div class="btn-simple pull-right text-muted" id="discard">
        <span onclick="discard()" data-placement="bottom" data-toggle="tooltip" title="Cancelar" class="glyphicon glyphicon-remove">&nbsp</span>
      </div>

      <div class="btn-simple pull-right text-muted" id="save">
        <span onclick="save()" data-placement="bottom" data-toggle="tooltip" title="Guardar" class="glyphicon glyphicon-ok">&nbsp</span>
      </div>
    </h2>
  </div>
</div>

<div class="container-fluid">

  <div class="row">
    <div class="col-md-2 col-sm-12 col-xs-12">
      <img src="{$BASE_URL}{$article['author_picture']}" class="img-circle" width="80px"/>
      <h4>{$article['first_name']} {$article['last_name']}</h4>
    </div>

    <div class="col-md-8 col-sm-12 col-xs-12">
      <form id="edit-form" class="form-horizontal" role="form" action="{$BASE_URL}actions/articles/edit_article.php" method="post" enctype="multipart/form-data" onsubmit="return save();">

        <input id="article-id" type="hidden" class="form-control" name="id" value="{$article['id']}"/>

        <div id="edit-alert"></div>

        <div class="form-group">
          <label for="title">
            Título
          </label>
          <input type="text" class="form-control" name="title" placeholder="Título" value="{$article['title']}"/>
        </div>

        <div class="form-group">
          <label for="category">
            Categoria
          </label>
          <br>
          <select name="category" id="category">
            <option value="---">Selecione uma categoria</option>
            {foreach $articleCategories as $category}
                <option value="{$category['id']}" {if $category['id'] == $article['category']} selected  {/if}>{$category['name']}</option>
            {/foreach}
          </select>
        </div>

        <div class="form-group">
          <label for="summary">
            Sumário
          </label>
          <textarea style="overflow:auto;resize:vertical" class="form-control" id="summary" name="summary" rows="5" placeholder="Insira um pequeno resumo da notícia...">{$article['summary']}</textarea>
        </div>

        <div class="form-group">
          <label for="content">
            Conteúdo
          </label>
          <textarea style="overflow:auto;resize:vertical" class="form-control" id="content" name="content" rows="10">{$article['content']}</textarea>
        </div>

        <div class="form-group">
          <label for="images-upload">
            Imagens
          </label>
            {include file='common/small_image_gallery.tpl'}
            {assign "nImages" "0"}
            {include file='common/browse_button.tpl'}
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

          <span class="pull-right">&nbsp</span>

          <button type="submit" onclick="eliminate()" class="pull-right btn btn-primary">
           <span class="glyphicon glyphicon-trash"></span> Eliminar
         </button>

        </div>

      </form>
    </div>
  </div>
</div>
</div>

<!-- rich text -->
<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
<script src="{$BASE_URL}javascript/rich_text.js"></script>

<script src="{$BASE_URL}javascript/edit_article.js"></script>

{include file='common/footer.tpl'}
