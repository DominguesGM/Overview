{include file='common/header.tpl'}

    {assign var="categoryId" value="0"}
    <!-- Category Row generator -->
    {foreach from=$categoriesByLine item=articlesByCategory}
        <!-- Category display -->
        {foreach from=$articlesByCategory item=article}
            <!-- Article Display -->
        {/foreach}
    {/foreach}



{include file='common/footer.tpl'}
