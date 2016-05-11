function eliminate(){
	var articleId = $('#article-id').val();

  	$.ajax({
        type: "get",
        url: "../../api/delete_article.php",
        datatype: "json",
        data: JSON.stringify({'id': articleId})
      }).done(function(html){
        var json = JSON.parse(html);
        if("success" in json){
          window.location.replace(BASE_URL);
        }
      });
}

function main(){
$('.carousel').carousel({
  interval: false
});
}

$(document).ready(main);
