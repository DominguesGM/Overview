{include file='common/header.tpl'}

{include file='common/status_messages.tpl'}
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
                    <img src="{$BASE_URL}images/assets/loading.gif" style="width: 50px;height: 50px;">
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

<script type="text/javascript" src="{$BASE_URL}lib/slimScroll/jquery.slimscroll.min.js"></script>
<script type="text/javascript" src="{$BASE_URL}javascript/category_management.js"></script>
<script src="{$BASE_URL}lib/bootbox/bootbox.min.js"></script>
<link rel="stylesheet" href="{$BASE_URL}css/categories.css">
{include file='common/footer.tpl'}
