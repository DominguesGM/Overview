{include file='common/header.tpl'}

<div class="container">
    <div class="row">
        <div class="col-md-6 col-xs-offset-3">
            <form id="search-form">
                <div class="selectors">
                    <select id="type-selector" class="form-control" name="type">
                        <option value="Artigo">Artigo</option>
                        <option value="Contribuidor">Contribuidor</option>
                    </select>
                </div>
                <div class="input-group">
                    <input id="search-box" type="text" class="form-control" name="query" placeholder="Pesquise no Overview...">

                    <span class="input-group-btn">
                      <button id="search-form-button" class="btn btn-default" type="button"><span class="glyphicon glyphicon-search"></span></button>
                    </span>
                </div>
            </form>
        </div>
    </div>
</div>

<div id="result-container" class="container">

</div>
<script src="{$BASE_URL}javascript/search_page.js"></script>

{include file='common/footer.tpl'}
