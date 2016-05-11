{include file='common/header.tpl'}

{include file='common/status_messages.tpl'}

{$article|@var_dump}
<div class="container">
    <div class="row">
        <div class="col-md-8 col-lg-8">
            <div class="blog-stripe">
                <div>
                    <div>
                        <div class="article-title"><h2>{$article['title']}</h2></div>
                        <div class="article-score">{$article['score']}</div>
                        <!-- TODO score implementation-->
                        <div class="article-scoring"><a href="#"><i class="fa fa-arrow-up"></i></a><br><a href="#"><i class="fa fa-arrow-down"></i></a></div>
                    </div>
                    <div class="article-summary">{$article['summary']}</div>
                    <p class="author"><a href="{$BASE_URL}users/profile.php?id={$article['author']}">{$article['first_name']} {$article['last_name']}</a>
                    </p>
                </div>
                {include file='common/image_gallery.tpl'}
                <div class="article-body">{$article['content']}</div>
            </div>
            <!-- TODO implement report description -->
            <div class="report-article"><a href="#" >Reportar artigo</a></div>
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

<script src="{$BASE_URL}javascript/view_article.js"></script>

{include file='common/footer.tpl'}
