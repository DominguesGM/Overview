{include file='common/header.tpl'}

{include file='common/status_messages.tpl'}

<div id="alert"></div>

<div class="container">
  <div class="row">
    <div class="col-md-8 col-lg-8">
      <div class="blog-stripe">
        <div>
          <input type="hidden" id="article-id" value="{$article['id']}">
          <input type="hidden" id="author-id" value="{$article['author']}">
          <input type="hidden" id="user-id" value="{$ID}">
          <div class="page-header">
            <h2>{$article['title']}
              {if $editPermission}
              <div class="selectable small btn-simple pull-right text-muted" id="delete">
                <span onclick="eliminate()" data-placement="bottom" data-toggle="tooltip" title="Eliminar" class="glyphicon glyphicon-trash"></span>
              </div>
              <div class="selectable small btn-simple pull-right text-muted" id="edit">
                <span onclick="edit()" data-placement="bottom" data-toggle="tooltip" title="Editar" class="glyphicon glyphicon-pencil">&nbsp;</span>
              </div>
              {/if}
            </h2>
            <div id="article-score" class="article-score">{$article['score']} ponto{if $article['score'] != 1 && $article['score'] != -1}s{/if}</div>
            {if $contributorAccess}
            <div class="article-scoring">
              <a onclick="upvoteArticle({$ID})"><i id="article-up-vote" class="vote {if $article['vote'] != 'up' } text-muted {/if} fa fa-arrow-up"></i></a>
              <br>
              <a onclick="downvoteArticle({$ID})"><i id="article-down-vote" class="vote {if $article['vote'] != 'down'} text-muted {/if}fa fa-arrow-down"></i></a>
            </div>
            {/if}
          </div>
          <div class="auhtor">
            <input id="access-level" type="hidden" value="{$contributorAccess}">
            <em><a href="{$BASE_URL}pages/users/profile.php?id={$article['author']}">{$article['first_name']} {$article['last_name']}</a></em>
            <span class="article-date">&nbsp;{$article['publication_date']}</span>
          </div>
          <br>
          <div class="article-summary">{$article['summary']}</div>
        </div>
        <br>
        {include file='common/image_gallery.tpl'}
        <div class="article-body">{$article['content']}</div>
      </div>
      <br>
      {if $contributorAccess}
      <div id="article-report">
        {if $article['report']}
        <div class="pull-right text-muted"><span data-placement="bottom" class="glyphicon glyphicon-flag"></span>Artigo reportado</div>
        {else}
        <div class="selectable pull-right"><a data-id="article#{$article['id']}" data-toggle="modal" data-target="#report-form"><span data-placement="bottom" class="glyphicon glyphicon-flag"></span>Reportar artigo</a></div>
        {/if}
      </div>
      {/if}

    </div>
    {include file='articles/related_articles.tpl'}
  </div>

  <div class="row">
    <div class="col-md-8">
      <div class="page-header">
        <h3 class="share"><span class="fa fa-share-alt"></span> Partilhar </h3>
      </div>

      <!-- Facebook-->
      <div style="display:inline-block; vertical-align:top;">
        {include file='articles/sharing/facebook.tpl'}
      </div>

      <!-- Twitter -->
      <div style="display:inline-block; vertical-align:top;">
        {include file='articles/sharing/twitter.tpl'}
      </div>

      <!-- Google+ -->
      <div style="display:inline-block; vertical-align:top;">
        {include file='articles/sharing/google_plus.tpl'}
      </div>
    </div>
  </div>

  {include file='articles/article_comments.tpl'}
</div>

{include file='articles/report.tpl'}

<script src="{$BASE_URL}lib/bootbox/bootbox.min.js"></script>
<script src="{$BASE_URL}javascript/view_article.js"></script>

{include file='common/footer.tpl'}
