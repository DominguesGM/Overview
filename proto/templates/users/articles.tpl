{include file='common/header.tpl'}

{include file='common/status_messages.tpl'}

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
        <div id="list-articles" class="nav nav-pills nav-stacked">
          {if $articles|count == 0} <li class="button-link" onclick="getArticles()">Nenhum artigo.</li>{/if}
          {foreach $articles as $article}

            <div class="short_news_item">
              <a href="{$BASE_URL}pages/articles/article.php?id={$article['id']}"><h4>{$article['title']}</h4></a>
              <span class="image-box" data-score="{$article['score']}"><img class="img-thumbnail" src="{$BASE_URL}{$article['image_article']}" alt="{$article['title']}"></span>
              <p class="summary">{$article['summary']}</p>
            </div>

          {/foreach}
        </div>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript" src="{$BASE_URL}lib/slimScroll/jquery.slimscroll.min.js"></script>
{include file='common/footer.tpl'}
