{include file='common/header.tpl'}

{include file='common/status_messages.tpl'}

<div class="container">
    <div class="row">
        <div class="col-md-8 col-lg-8">
            <div class="blog-stripe">
                <div>
                    <input type="hidden" id="article-id" value="{$article['id']}">
                    <div class="page-header">
                        <h2>{$article['title']}
                          {if $editPermission}
                           <div class="small btn-simple pull-right text-muted" id="delete">
                             <span onclick="eliminate()" data-placement="bottom" data-toggle="tooltip" title="Eliminar" class="glyphicon glyphicon-trash"></span>
                           </div>
                           <div class="small btn-simple pull-right text-muted" id="edit">
                             <span onclick="edit()" data-placement="bottom" data-toggle="tooltip" title="Editar" class="glyphicon glyphicon-pencil">&nbsp</span>
                           </div>
                           {/if}
                        </h2>
                        <div id="article-score" class="article-score">{$article['score']} ponto{if $comment['score'] != 1}s{/if}</div>
                        {if $ID}
                        <div class="article-scoring">
                          <a onclick="upvoteArticle({$ID})"><i id="article-up-vote" class="{if $article['vote'] == 'down'} text-muted {/if} fa fa-arrow-up"></i></a>
                          <br>
                          <a onclick="downvoteArticle({$ID})"><i id="article-down-vote" class="{if $article['vote'] == 'up'} text-muted {/if}fa fa-arrow-down"></i></a>
                        </div>
                        {/if}
                    </div>
                     <div class="auhtor">
                       <em><a href="{$BASE_URL}users/profile.php?id={$article['author']}">{$article['first_name']} {$article['last_name']}</a></em>
                       <span class="article-date">&nbsp{$article['publication_date']}</span>
                     </div>
                    <br>
                    <div class="article-summary">{$article['summary']}</div>
                </div>
                <br>
                {include file='common/image_gallery.tpl'}
                <div class="article-body">{$article['content']}</div>
            </div>
            <br>
            {if $ID}
            <div class="report-article"><a data-id="article#{$article['id']}" data-toggle="modal" data-target="#report-form"><span data-placement="bottom" class="glyphicon glyphicon-flag"></span>Reportar artigo</a></div>
            {/if}
        </div>
        {include file='articles/related_articles.tpl'}
    </div>

    <div class="row">
      <!-- Facebook -->
      <a href="https://www.facebook.com/sharer/sharer.php?u=" title="Share on Facebook" target="_blank" class="btn btn-facebook"><i class="fa fa-facebook"></i> Facebook</a>

      <!-- Twitter -->
      <a href="http://twitter.com/home?status=" title="Share on Twitter" target="_blank" class="btn btn-twitter"><i class="fa fa-twitter"></i> Twitter</a>

      <!-- Google+ -->
      <a href="https://plus.google.com/share?url=" title="Share on Google+" target="_blank" class="btn btn-googleplus"><i class="fa fa-google-plus"></i> Google+</a>
    </div>

    {include file='articles/article_comments.tpl'}
</div>

{include file='articles/report.tpl'}

<script src="{$BASE_URL}javascript/view_article.js"></script>

{include file='common/footer.tpl'}
