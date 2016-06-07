{include file='common/header.tpl'}

{include file='common/status_messages.tpl'}

    {assign var="categoryId" value=0}
    <!-- Category Row generator -->
    {foreach from=$categoriesByLine item=articlesByCategory}
        <!-- Category display -->
        <div class="row news-row">
        {foreach from=$articlesByCategory item=category}
            <!-- Category Display -->
            <div class="col-sm-4 portfolio-item short_category_item">
                <h2 class="main_category"><a href="{$BASE_URL}pages/category.php?category={$categories.$categoryId.name}">{$categories.$categoryId.name}</a></h2>
                {assign var="categoryId" value=$categoryId+1}
                <div class="short_category_content">
                    {if count($category) > 0}
                        {foreach from=$category item=article}
                            <!-- Article Display -->
                            <div class="short_news_item">
                                <a href="{$BASE_URL}pages/articles/article.php?id={$article.article_id}"><h4>{$article.title}</h4></a>
                                <span class="image-box" data-score="{$article.score}"><img class="img-thumbnail" src="{$BASE_URL}{$article.path}" alt="{$article.title}"></span>
                                <p class="summary">{$article.summary}</p>
                            </div>
                        {/foreach}
                    {else}
                        <p>Ainda não existem notícias nesta categoría.</p>
                    {/if}
                </div>
            </div>
        {/foreach}
        </div>
    {/foreach}



{include file='common/footer.tpl'}
