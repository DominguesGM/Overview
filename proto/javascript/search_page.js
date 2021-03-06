/**
 * Created by Gil on 03/05/2016.
 */

var categoryListing = false;
var offset = 0;
var limit = 4;
var category = "";
var query = "";
var queryType = "";
var currentResultCount = 0;
var categories;
var noResultsHTMLString = "<p>Nenhuns resultados encontrados para os parâmetros usados.</p>";
var searchMeta1 = '<div class="col-md-12"><hgroup class="mb20"><br><h1>Resultados</h1><h2 class="lead">Mostrando resultados para "<strong id="query-string" class="text-danger">';
var searchMeta2 = '</strong>" em <strong id="query-type" class="text-danger">';
var searchMeta3 = '</strong>';
var searchMetaCategory1 = '<span id="category-conditional"> da categoria <strong id="query-category" class="text-danger">';
var searchMetaCategory2 = '</strong></span>';
var searchMetaEnd = '</h2></hgroup></div><div class="col-md-12"><section id="item-container" class="col-xs-12"></section></div>';


$(document).ready(function(){
    $("#type-selector option[value='Artigo']").attr("selected", true);

    var tempCategory = $('div#result-container').data("category");

    if(typeof tempCategory != "undefined")
        categoryListing = true;

    if(categoryListing != true) {
        loadCategories();

        $("#type-selector").change(function () {
            if ($(this).val() == "Contribuidor")
                $('#category-selector').remove();
            else {
                generateCategorySelect();
            }
        });
    } else{
        category = tempCategory;
        queryType = "Artigo";
        noResultsHTMLString = "<p>Nenhum artigo criado nesta categoria.</p>";
        executeQuery();
    }
});


function prepareUsersHtml(usersArray){
    var html = "";
    for(var i = 0; i < usersArray.length; i++){
        html += '<article class="search-result row"><span class="image-box-Contribuidor" data-score="';
        html += 0;
        html += '"><img class="img-thumbnail" alt="Imagem do utilizador ' + usersArray[i]['first_name'] + " " + usersArray[i]['last_name'] + '" src="';
        html += BASE_URL + usersArray[i]['path'];
        html += '" alt=""></span><div class="col-xs-12 col-sm-12 col-md-7 excerpet"><h3><a href="' +BASE_URL+ 'pages/users/profile.php?id=' + usersArray[i]['id'] +'">';
        html += usersArray[i]['first_name'] + " " + usersArray[i]['last_name'];
        html += '</a></h3><p>';
        html += usersArray[i]['about'];
        html += '</h></div><span class="clearfix borda"></span></article>';
    }

    return html;
}

function prepareArticlesHtml(articlesArray){
    var html = "";
    for(var i = 0; i < articlesArray.length; i++){
        html += '<article class="search-result row"><span class="image-box" data-score="';
        html += articlesArray[i]['score'];
        html += '"><img class="img-thumbnail" alt="Imagem do artigo ' + articlesArray[i]['article_id'] + '" src="';
        html += BASE_URL + articlesArray[i]['path'];
        html += '" alt=""></span><div class="col-xs-12 col-sm-12 col-md-2"><ul class="meta-search"><li><i class="glyphicon glyphicon-calendar"></i> <span>';
        html += articlesArray[i]['date'];
        html += '</span></li><li><i class="glyphicon glyphicon-tags"></i> <span>';
        html += '<span class="category-link">' + articlesArray[i]['name'] + '</span>';
        html += '</span></li>';
        html += '</ul></div><div class="col-xs-12 col-sm-12 col-md-7 excerpet"><h3><a href="' + BASE_URL + 'pages/articles/article.php?id=' + articlesArray[i]['article_id'] +  '" title="">';
        html += articlesArray[i]['title'];
        html += '</a></h3><p>';
        html += articlesArray[i]['summary'];
        html += '</div><span class="clearfix borda"></span></article>';
    }

    return html;
}


function loadCategories(){
    $.getJSON(BASE_URL + "api/articles/get_categories.php", function(result){
        categories = result;
        generateCategorySelect();
    });
}

function generateCategorySelect(){
    $('.selectors').append('<select id="category-selector" class="form-control" name="category"></select>');
    var option = '<option value=""></option>';

    $('#category-selector').append(option);

    $.each(categories, function(key, category){
        var option = $('<option value="' + category['name'] + '">' + category['name'] + '</option>');

        $('#category-selector').append(option);
    });

    $("#category-selector option[value='"+category+"']").attr("selected", true);
}

$('#search-form-button').click(function(a){
    a.preventDefault();

    setArguments();
    executeQuery();

});

$('#search-box').keydown(function(a){
    if(a.which == 13) {
        a.preventDefault();
    }
});
$('#search-box').keyup(function(a) {
    if(a.which == 13) {
        setArguments();
        executeQuery();
    }
});

function setArguments(){
    query = $('#search-box').val();
    queryType =$('#type-selector').val();
    if(queryType == "Artigo")
        category = $('#category-selector').val();
}

function executeQuery(){
    offset = 0;
    limit = 4;

    var metaHtml;
    var articleUrlRequest = "../api/articles/search.php";

    var loadingImage = $('<img class="loadingIcon" src="'+BASE_URL+'images/assets/loading.gif" alt="loading icon" style="width: 50px;height: 50px;">');

    if(!categoryListing) {
        metaHtml = searchMeta1 + query + searchMeta2 + queryType + searchMeta3;
        if (category != "" && category != undefined)
            metaHtml += searchMetaCategory1 + category + searchMetaCategory2;
        metaHtml += searchMetaEnd;
    } else {
        if(category == "Following")
            articleUrlRequest = "../api/articles/get_following_articles.php";
        metaHtml = '<div class="col-md-12"><hgroup class="mb20"><br><h1>'+category+'</h1></hgroup></div><div class="col-md-12"><section id="item-container" class="col-md-12 col-sm-6 col-md-18"></section></div>';
    }

    $('#result-container').html(metaHtml);

    $('#item-container').append(loadingImage);

    if(queryType == "Contribuidor"){
        $.ajax({
            url:"../api/users/search.php",
            method: "GET",
            data: {'keyword':query, 'offset': offset, 'limit': limit }
        }).done(function(html){
            var jsonResponse = JSON.parse(html);
            $('img.loadingIcon').remove();
            var listHtml = prepareUsersHtml(jsonResponse['users']);
            $('#item-container').append(listHtml);
            currentResultCount = jsonResponse['count'];
            if(currentResultCount == 0){
                $('#item-container').html(noResultsHTMLString);
            }
        });
    }

    if(queryType == "Artigo"){
        $.ajax({
            url:articleUrlRequest,
            method: "GET",
            data: {'keyword':query, 'offset': offset, 'limit': limit, 'category': category}
        }).done(function(html){
            var jsonResponse = JSON.parse(html);
            $('img.loadingIcon').remove();
            var listHtml = prepareArticlesHtml(jsonResponse['articles']);
            $('#item-container').append(listHtml);
            currentResultCount = jsonResponse['count'];
            if(currentResultCount == 0){
                $('#item-container').html(noResultsHTMLString);
            } else {
                categoryLink();
            }
        });
    }

    offset += limit;

    $(window).unbind('scroll');

    $(window).scroll(function() {
        if($(window).scrollTop() + $(window).height() == $(document).height()) {
            if(currentResultCount  == limit) {
                $('#result-container').append(loadingImage);


                if (queryType == "Contribuidor") {
                    $.ajax({
                        url: "../api/users/search.php",
                        method: "GET",
                        data: {'keyword': query, 'offset': offset, 'limit': limit}
                    }).done(function (html) {
                        var jsonResponse = JSON.parse(html);
                        $('img.loadingIcon').remove();
                        $('#result-count').html(jsonResponse['count']);
                        var listHtml = prepareUsersHtml(jsonResponse['users']);
                        $('#item-container').append(listHtml);
                        currentResultCount = jsonResponse['count'];
                    });
                }

                if (queryType == "Artigo") {
                    $.ajax({
                        url: articleUrlRequest,
                        method: "GET",
                        data: {'keyword': query, 'offset': offset, 'limit': limit, 'category': category}
                    }).done(function (html) {
                        var jsonResponse = JSON.parse(html);
                        $('img.loadingIcon').remove();
                        $('#result-count').html(jsonResponse['count']);
                        var listHtml = prepareArticlesHtml(jsonResponse['articles']);
                        $('#item-container').append(listHtml);
                        currentResultCount = jsonResponse['count'];
                        categoryLink();
                    });
                }
                offset += limit;
            }
        }

    });
}

function categoryLink(){
    $('.category-link').unbind('click');
    $('.category-link').click(function (a) {
        query = "";
        queryType = "Artigo";
        category = $(this).html();
        if(!categoryListing) {
            $("#category-selector option[value='" + category + "']").attr("selected", true);
            executeQuery();
        } else {
            window.location.replace(BASE_URL+'pages/category.php?category='+$(this).html());
        }
    });
}
