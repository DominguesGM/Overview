{include file='common/header.tpl'}

{include file='common/status_messages.tpl'}

<!-- image_gallery CSS-->
<link rel="stylesheet" href="{$BASE_URL}css/articles.css">

<div class="container">
  <div class="col-md-12">
    <hgroup class="mb20">
      <br>
      <h1><span class="glyphicon glyphicon-duplicate"></span> Artigos</h1>
      <h2 class="lead"><strong id="article-count">{$nArticles}</strong> {if $nArticles == 1} artigo {/if}</h2>
    </hgroup>
  </div>

    <div id="article-tools" class="col-md-9"></div>

    <div class="tab-content col-md-12">
    <div id="articles" class="tab-pane fade in active">
      <div id="all-articles" class="col-md-3">
        <br>
        <ul id="list-articles" class="nav nav-pills nav-stacked">
          {if $articles|count == 0} <li class="button-link" onclick="getArticles()">Nenhum artigo.</li>{/if}
          {foreach $articles as $article}
          <li id="article-{$article['id']}" class="report button-link" onclick="displayArticle('{$BASE_URL}',{$article['id']})">
            <div class="media">
              <p class="pull-right text-muted"><small>{$article['publication_date']}</small></p>
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
  </div>
</div>

<script src="{$BASE_URL}javascript/reports.js"></script>
<script src="{$BASE_URL}lib/bootbox/bootbox.min.js"></script>
<script type="text/javascript" src="{$BASE_URL}lib/slimScroll/jquery.slimscroll.min.js"></script>
{include file='common/footer.tpl'}
