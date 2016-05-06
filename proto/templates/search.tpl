{include file='common/header.tpl'}

<div class="container">
    <div class="col-md-12">
        <hgroup class="mb20">
            <br>
            <h1>Search results</h1>
            <h2 class="lead"><strong class="text-danger" id="result-count"></strong> results were found for the search for <strong id="query-string" class="text-danger">{$SEARCH_QUERY}</strong> in <strong id="query-type" class="text-danger">{$SEARCH_TYPE}</strong></h2>
        </hgroup>
    </div>

    <div class="col-md-12">
        <section id="item-container" class="col-md-12 col-sm-6 col-md-18">
            <article class="search-result row">
                <span class="image-box" data-score="321"><img class="img-thumbnail" src="http://placehold.it/75x75" alt=""></span>
                <div class="col-xs-12 col-sm-12 col-md-2">
                    <ul class="meta-search">
                        <li><i class="glyphicon glyphicon-calendar"></i> <span>02/15/2014</span></li>
                        <li><i class="glyphicon glyphicon-time"></i> <span>4:28 pm</span></li>
                        <li><i class="glyphicon glyphicon-tags"></i> <span>Category1</span></li>
                    </ul>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-7 excerpet">
                    <h3><a href="#" title="">Voluptatem, exercitationem, suscipit, distinctio</a></h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatem, exercitationem, suscipit, distinctio, qui sapiente aspernatur molestiae non corporis magni sit sequi iusto debitis delectus doloremque.</p>
                    <span class="plus"><a href="#" title="Lorem ipsum"><i class="glyphicon glyphicon-plus"></i></a></span>
                </div>
                <span class="clearfix borda"></span>
            </article>

            <article class="search-result row">
                <span class="image-box" data-score="321"><img class="img-thumbnail" src="http://placehold.it/75x75" alt=""></span>
                <div class="col-xs-12 col-sm-12 col-md-2">
                    <ul class="meta-search">
                        <li><i class="glyphicon glyphicon-calendar"></i> <span>02/15/2014</span></li>
                        <li><i class="glyphicon glyphicon-time"></i> <span>4:28 pm</span></li>
                        <li><i class="glyphicon glyphicon-tags"></i> <span>Category1</span></li>
                    </ul>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-7 excerpet">
                    <h3><a href="#" title="">Voluptatem, exercitationem, suscipit, distinctio</a></h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatem, exercitationem, suscipit, distinctio, qui sapiente aspernatur molestiae non corporis magni sit sequi iusto debitis delectus doloremque.</p>
                    <span class="plus"><a href="#" title="Lorem ipsum"><i class="glyphicon glyphicon-plus"></i></a></span>
                </div>
                <span class="clearfix borda"></span>
            </article>


            <article class="search-result row">
                <span class="image-box" data-score="321"><img class="img-thumbnail" src="http://placehold.it/75x75" alt=""></span>
                <div class="col-xs-12 col-sm-12 col-md-2">
                    <ul class="meta-search">
                        <li><i class="glyphicon glyphicon-calendar"></i> <span>02/15/2014</span></li>
                        <li><i class="glyphicon glyphicon-time"></i> <span>4:28 pm</span></li>
                        <li><i class="glyphicon glyphicon-tags"></i> <span>Category1</span></li>
                    </ul>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-7 excerpet">
                    <h3><a href="#" title="">Voluptatem, exercitationem, suscipit, distinctio</a></h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatem, exercitationem, suscipit, distinctio, qui sapiente aspernatur molestiae non corporis magni sit sequi iusto debitis delectus doloremque.</p>
                    <span class="plus"><a href="#" title="Lorem ipsum"><i class="glyphicon glyphicon-plus"></i></a></span>
                </div>
                <span class="clearfix borda"></span>
            </article>
        </section>
    </div>
</div>

<script src="{$BASE_URL}javascript/search_page.js"></script>

{include file='common/footer.tpl'}
