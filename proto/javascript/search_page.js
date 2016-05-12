/**
 * Created by Gil on 03/05/2016.
 */

var offset = 0;
var limit = 4;
var category = "";
var query = "";
var queryType = "";
var currentResultCount = 0;
var categories;


$(document).ready(function(){
    query = $('#query-string').html();
    queryType = $('#query-type').html();
    if(queryType == "Artigo"){
        category = $('#query-category').html();
    }
    var listHtml = "";

    $('#search-form-button').click(function(a){
        $('#search-form').submit();
    });


    loadCategories();

    $("#type-selector").change(function(){
        if($(this).val() == "Contribuidor")
            $('#category-selector').remove();
        else {
            generateCategorySelect();
        }
    });

    if(!(/^[a-zA-Z]*$/.test(query)) || !(/^[a-zA-Z]*$/.test(queryType)))
        return;


    if(queryType == "Contribuidor"){
        $("#type-selector option[value='Contribuidor']").attr("selected", true);
        $.ajax({
            url:"../api/users/search.php",
            method: "GET",
            data: {'keyword':query, 'offset': offset, 'limit': limit }
        }).done(function(html){
            var jsonResponse = JSON.parse(html);
            listHtml = prepareUsersHtml(jsonResponse['users']);
            $('#item-container').append(listHtml);
            currentResultCount = jsonResponse['count'];
        });
    }

    if(queryType == "Artigo"){
        $("#type-selector option[value='Artigo']").attr("selected", true);
        $.ajax({
            url:"../api/articles/search.php",
            method: "GET",
            data: {'keyword':query, 'offset': offset, 'limit': limit, 'category': category}
        }).done(function(html){
            var jsonResponse = JSON.parse(html);
            listHtml = prepareArticlesHtml(jsonResponse['articles']);
            $('#item-container').append(listHtml);
            currentResultCount = jsonResponse['count'];
        });
    }

    offset += limit;

    $(window).scroll(function() {
        if($(window).scrollTop() + $(window).height() == $(document).height()) {
            if(currentResultCount  == limit) {
                if (queryType == "Contribuidor") {
                    $.ajax({
                        url: "../api/users/search.php",
                        method: "GET",
                        data: {'keyword': query, 'offset': offset, 'limit': limit}
                    }).done(function (html) {
                        var jsonResponse = JSON.parse(html);
                        $('#result-count').html(jsonResponse['count']);
                        listHtml = prepareUsersHtml(jsonResponse['users']);
                        $('#item-container').append(listHtml);
                        currentResultCount = jsonResponse['count'];
                    });
                }

                if (queryType == "Artigo") {
                    $.ajax({
                        url: "../api/articles/search.php",
                        method: "GET",
                        data: {'keyword': query, 'offset': offset, 'limit': limit, 'category': category}
                    }).done(function (html) {
                        var jsonResponse = JSON.parse(html);
                        $('#result-count').html(jsonResponse['count']);
                        listHtml = prepareArticlesHtml(jsonResponse['articles']);
                        $('#item-container').append(listHtml);
                        currentResultCount = jsonResponse['count'];
                    });
                }
                offset += limit;
            }
        }

    });

});


function prepareUsersHtml(usersArray){
    var html = "";
    for(var i = 0; i < usersArray.length; i++){
        html += '<article class="search-result row"><span class="image-box-Contribuidor" data-score="';
        html += 0;
        html += '"><img class="img-thumbnail" src="';
        html += BASE_URL + usersArray[i]['path'];
        html += '" alt=""></span><div class="col-xs-12 col-sm-12 col-md-7 excerpet"><h3><a href="#">';
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
        html += '"><img class="img-thumbnail" src="';
        html += BASE_URL + articlesArray[i]['path'];
        html += '" alt=""></span><div class="col-xs-12 col-sm-12 col-md-2"><ul class="meta-search"><li><i class="glyphicon glyphicon-calendar"></i> <span>';
        html += articlesArray[i]['publication_date'];
        html += '</span></li><li><i class="glyphicon glyphicon-tags"></i> <span>';
        html += '<a href="' + BASE_URL + 'pages/search.php?type=Artigo&category=' + articlesArray[i]['name'] + '">' + articlesArray[i]['name'] + '</a>';
        html += '</span></li>';
        html += '</ul></div><div class="col-xs-12 col-sm-12 col-md-7 excerpet"><h3><a href="' + BASE_URL + 'pages/articles/view_article.php?id=' + articlesArray[i]['id'] +  '" title="">';
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
        if(queryType == "Artigo") {
            generateCategorySelect();
        }
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
}