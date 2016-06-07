<div class="container">
  <div class="row">
    <div class="col-md-8 col-lg-8">
      <div class="blog-stripe">
        <div>
          <input type="hidden" id="article-id" value="{$article['id']}">
          <input type="hidden" id="author-id" value="{$article['author']}">
          <input type="hidden" id="user-id" value="{$ID}">
          <div class="page-header">
            <h2>{$article['title']}</h2>
            <h4><span class="glyphicon glyphicon-tag"></span><a href="{$BASE_URL}pages/category.php?category={$article['category']['name']}"> {$article['category']['name']} </a></h4>
            <div id="article-score" class="article-score">{$article['score']} ponto{if $article['score'] != 1 && $article['score'] != -1}s{/if}</div>
          </div>
          <div class="auhtor">
            <input id="access-level" type="hidden" value="{$contributorAccess}">
            <em><a href="{$BASE_URL}pages/users/profile.php?id={$article['author']}">{$article['first_name']} {$article['last_name']}</a></em>
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
    </div>
  </div>

  <div class="row">
    <!-- Facebook -->
    <a href="https://www.facebook.com/sharer/sharer.php?u=" title="Share on Facebook" target="_blank" class="btn btn-facebook"><i class="fa fa-facebook"></i> Facebook</a>

    <!-- Twitter -->
    <a href="http://twitter.com/home?status=" title="Share on Twitter" target="_blank" class="btn btn-twitter"><i class="fa fa-twitter"></i> Twitter</a>

    <!-- Google+ -->
    <a href="https://plus.google.com/share?url=" title="Share on Google+" target="_blank" class="btn btn-googleplus"><i class="fa fa-google-plus"></i> Google+</a>
  </div>
  {$contributorAccess=false}
  {include file='articles/article_comments.tpl'}
</div>

<script src="{$BASE_URL}javascript/view_article.js"></script>
