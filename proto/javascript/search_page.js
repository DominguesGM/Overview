/**
 * Created by Gil on 03/05/2016.
 */
var results_per_page = 10;


$(document).ready(function(){
    var query = $('#query-string').html();
    var queryType = $('#query-type').html();
    var listHtml = "";



    if(queryType == "user"){
        $.ajax({
            url:"../api/users/search.php",
            method: "GET",
            data: {'keyword':query }
        }).done(function(html){
            var jsonResponse = JSON.parse(html);
            $('#result-count').html(jsonResponse['count']);
            listHtml = prepareUsersHtml(jsonResponse['users']);
            alert(listHtml);
            $('#item-container').html(listHtml);
        });
    }

    if(queryType == "article"){
        $.ajax({
            url:"../api/articles/search.php",
            method: "GET",
            data: {'query':query}
        }).done(function(response){

        });
    }

});


function prepareUsersHtml(usersArray){
    var html = "";
    for(var i = 0; i < usersArray.length; i++){
        html += '<article class="search-result row"><span class="image-box" data-score="';
        html += 0;
        html += '"><img class="img-thumbnail" src="';
        html += usersArray[i]['path'];
        html += '" alt=""></span><div class="col-xs-12 col-sm-12 col-md-7 excerpet"><h3><a href="#">';
        html += usersArray[i]['first_name'] + " " + usersArray[i]['last_name'];
        html += '</a></h3><p>';
        html += usersArray[i]['about'];
        html += '</h></div><span class="clearfix borda"></span></article>';
    }

    return html;
}