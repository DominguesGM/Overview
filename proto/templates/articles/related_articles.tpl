<div class="col-md-4 col-lg-4">
  <div class="page-header">
    <h3><span class="glyphicon glyphicon-tag"></span>
      <a href="{$BASE_URL}pages/category.php?category={$article['category']['name']}">{$article['category']['name']} </a>
    </h3>
  </div>

  <ul class="all-blogs">
    {foreach $relatedArticles as $relatedArticle}
    {if $relatedArticle['article_id'] != $article['id']}
    <li class="media">
      <a class="pull-left" href="{$BASE_URL}pages/articles/article.php?id={$relatedArticle['article_id']}">
        <img alt="{$relatedArticle['title']}" src="{$BASE_URL}{$relatedArticle['path']}" width="100" height="100">
      </a>
      <div class="media-body">
        <h4 class="media-heading"><a class="pull-left" href="{$BASE_URL}pages/articles/article.php?id={$relatedArticle['article_id']}">{$relatedArticle['title']}</a></h4>
        <div class="auhtor">
          <em><a href="{$BASE_URL}pages/users/profile.php?id={$relatedArticle['author']}">{$relatedArticle['first_name']} {$relatedArticle['last_name']}</a></em>
          <span class="article-date">&nbsp;{$relatedArticle['date']}</span>
        </div>
      </div>
    </li>
    {/if}
    {/foreach}
  </ul>
</div>
