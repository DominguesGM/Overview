{include file='common/header.tpl'}

{include file='common/status_messages.tpl'}

<!-- image_gallery CSS-->
<link rel="stylesheet" href="{$BASE_URL}css/reports.css">

<div class="container">
  <div class="col-md-12">
    <hgroup class="mb20">
      <br>
      <h1><span class="glyphicon glyphicon-flag"></span> Itens reportados</h1>
      <h2 class="lead"><strong id="report-count">{$nReports}</strong> {if $nReports == 1} item foi reportado e requer{else} itens foram reportados e requerem{/if} revisão</h2>
    </hgroup>
  </div>

    <div class="all-reports tab-content col-md-3">
      <ul class="nav nav-pills btn-group pull-right">
        <li class="active"><a onclick="resetSelectedItem('article')" data-toggle="pill" href="#article-reports"><span class="glyphicon glyphicon-duplicate"></span> Artigos</a></li>
        <li><a onclick="resetSelectedItem('comment')" data-toggle="pill" href="#comment-reports"><span class="glyphicon glyphicon-comment"></span> Comentários</a></li>
      </ul>
    </div>

    <div id="moderator-tools" class="col-md-9"></div>

    <div class="tab-content col-md-12">
    <div id="article-reports" class="tab-pane fade in active">
      <div id="all-article-reports" sytle="overflow-y: auto;" class="h-scroll col-md-3">
        <br>
        <ul id="list-article-reports" class="nav nav-pills nav-stacked">
          {if $articleReports|count == 0} <li class="report button-link" onclick="getReports('article', true)">Nenhum artigo requer a atenção.</li>{/if}
          {foreach $articleReports as $article}
          <li id="report-{$article['id']}" class="report button-link" onclick="displayReport('article','{$BASE_URL}',{$article['id']}, {$article['article_id']})">
            <div class="media">
              <p class="pull-right text-muted"><small>{$article['report_date']}</small></p>
              <a class="media-left" href="{$BASE_URL}pages/users/profile.php?id={$article['reported_by']}">
                <img class="img-circle" height="40" width="40" src="{$BASE_URL}{$article['reporter_picture']}" alt="{$article['reporter_first_name']} {$article['reporter_last_name']}">
              </a>
              <span><h5 class="user_name"><a href="{$BASE_URL}pages/users/profile.php?id={$article['reported_by']}">{$article['reporter_first_name']} {$article['reporter_last_name']}</a></h5></span>
              <p>{$article['description']}</p>
              <div class="delete btn-simple pull-right text-muted">
                <small><span onclick="deleteReport({$article['id']})" data-placement="left" data-toggle="tooltip" title="Descartar" class="glyphicon glyphicon-remove"></span></small>
              </div>
            </div>
          </li>
          {/foreach}
        </ul>
      </div>

      <section id="content-article" sytle="overflow: auto;" class="h-scroll col-md-9"></section>
    </div>


    <div id="comment-reports" class="tab-pane fade in">
      <div id="all-comment-reports" sytle="overflow-y: auto;" class="h-scroll col-md-3">
        <br>
        <ul id="list-comment-reports" class="nav nav-pills nav-stacked">
          {if $commentReports|count == 0} <li class="report button-link" onclick="getReports('comment', true)">Nenhum comentário requer a atenção.</li>{/if}
          {foreach $commentReports as $comment}
          <li id="report-{$comment['id']}" class="report button-link" onclick="displayReport('comment','{$BASE_URL}',{$comment['id']}, {$comment['article_id']}, {$comment['comment_id']})">
            <div class="media">
              <p class="pull-right text-muted"><small>{$comment['report_date']}</small></p>
              <a class="media-left" href="{$BASE_URL}pages/users/profile.php?id={$comment['reported_by']}">
                <img class="img-circle" height="40" width="40" src="{$BASE_URL}{$comment['reporter_picture']}" alt="{$comment['reporter_first_name']} {$comment['reporter_last_name']}">
              </a>
              <span><h5 class="user_name"><a href="{$BASE_URL}pages/users/profile.php?id={$comment['reported_by']}">{$comment['reporter_first_name']} {$comment['reporter_last_name']}</a></h5></span>
              <p>{$comment['description']}</p>
              <div class="delete btn-simple pull-right text-muted">
                <small><span onclick="deleteReport({$comment['id']})" data-placement="left" data-toggle="tooltip" title="Descartar" class="glyphicon glyphicon-remove"></span></small>
              </div>
            </div>
          </li>
          {/foreach}
        </ul>
      </div>
      <section id="content-comment" sytle="overflow: auto;" class="h-scroll col-md-9"></section>
    </div>
  </div>
  </div>

<script src="{$BASE_URL}javascript/reports.js"></script>
<script src="{$BASE_URL}lib/bootbox/bootbox.min.js"></script>
<script type="text/javascript" src="{$BASE_URL}lib/slimScroll/jquery.slimscroll.min.js"></script>
{include file='common/footer.tpl'}
