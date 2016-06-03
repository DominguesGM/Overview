{include file='common/header.tpl'}

{include file='common/status_messages.tpl'}

<link rel="shortcut icon" href="facivon.ico">

<!-- search CSS -->
<link href="{$BASE_URL}css/profile.css" rel="stylesheet">

<div class="container1">
  <div class="container">
    <div class="row">
      <div class="col-md-offset-1 col-md-10 col-lg-offset-1 col-lg-10">

        <div class="profile">
          <div class="col-sm-12">
            <div class="col-xs-12 col-sm-8">
              <h2>{$FIRST_NAME} {$LAST_NAME}</h2>
              <h4>{$TYPE}</h4>
              <p><strong>Sobre...</strong></p>
              <p>{$user['about']}</p>
            </div>

            <div class="col-xs-12 col-sm-4 text-center">
              <figure>
                <img src="{$BASE_URL}{$PICTURE}" alt="{$FIRST_NAME} {$LAST_NAME}" class="img-circle img-responsive" height="80" width="80">
              </figure>
            </div>
          </div>

          <div class="col-xs-12 divider text-center">
            <div class="col-xs-12 col-sm-4 emphasis">
              <h2><strong>22</strong></h2>
              <p><small>Artigos</small></p>
            </div>
            <div class="col-xs-12 col-sm-4 emphasis">
              <h2><strong>{$user['followers']}</strong></h2>
              <p><small>A seguir</small></p>
            </div>
            <div class="col-xs-12 col-sm-4 emphasis">
              <h2><strong>{$user['followers']}</strong></h2>
              <p><small>Seguidores</small></p>
            </div>
          </div>

          <div class="col-xs-12 divider text-center">
            <button style="margin-top:30px" class="btn btn-primary btn-block"><span class="glyphicon glyphicon-plus"></span> Seguir </button>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div id="wall" class="container">

    <div class="row">
      <div class="col-md-offset-2 col-md-4 col-sm-4 col-xs-4">
        <div class="col-md-3 col-sm-3 col-xs-3">
          <img src="http://packetcode.com/apps/wall-design/image.jpg" class="img-circle" width="60px"/>
        </div>
        <div class="col-md-9 col-sm-9 col-xs-9">
          <b>John Doe posted a new article.</b>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-offset-3 col-md-6 col-sm-6 col-xs-6">
        <article class="search-result row">
          <span class="image-box" data-score="321"><img class="img-thumbnail" src="http://placehold.it/75x75" alt=""></span>
          <div class="col-xs-12 col-sm-12 col-md-7 excerpet">
            <h3><a href="#" title="">Voluptatem, exercitationem, suscipit, distinctio</a></h3>
          </div>
          <span class="clearfix borda"></span>
        </article>

        <div class="text-muted"><small>posted 2 minutes ago</small></div>
      </div>
    </div>
  </div>
</div>
</div>

<script src="{$BASE_URL}javascript/profile.js"></script>
<script type="text/javascript" src="{$BASE_URL}lib/slimScroll/jquery.slimscroll.min.js"></script>
{include file='common/footer.tpl'}
