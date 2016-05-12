{include file='common/header.tpl'}

<div class="container">
    <div class="row">
        <div class="col-md-6 col-xs-offset-3">
            <form id="search-form" method="get" action="">
                <div class="selectors">
                    <select id="type-selector" class="form-control" name="type">
                        <option value="Contribuidor">Contribuidor</option>
                        <option value="Artigo">Artigo</option>
                    </select>
                </div>
                <div class="input-group">
                    <input type="text" class="form-control" name="query" placeholder="Search on Overview...">

                    <span class="input-group-btn">
                      <button id="search-form-button" class="btn btn-default" type="button"><span class="glyphicon glyphicon-search"></span></button>
                    </span>
                </div>
            </form>
        </div>
    </div>
</div>

{if $SEARCH_TYPE == "Contribuidor" || $SEARCH_TYPE == "Artigo"}
<div class="container">
    <div class="col-md-12">
        <hgroup class="mb20">
            <br>
            <h1>Search results</h1>
            <h2 class="lead">Showing results for "<strong id="query-string" class="text-danger">{$SEARCH_QUERY}</strong>" in <strong id="query-type" class="text-danger">{$SEARCH_TYPE}</strong> {if $SEARCH_TYPE == "Artigo" && $SEARCH_CATEGORY != ""}of category <strong id="query-category" class="text-danger">{$SEARCH_CATEGORY}</strong>{/if}</h2>
        </hgroup>
    </div>

    <div class="col-md-12">
        <section id="item-container" class="col-md-12 col-sm-6 col-md-18">
        </section>
    </div>
</div>
{/if}
<script src="{$BASE_URL}javascript/search_page.js"></script>

{include file='common/footer.tpl'}
