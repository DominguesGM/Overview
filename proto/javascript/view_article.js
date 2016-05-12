function warn(errorMessage){
  $("#create-alert").html("<div \" class=\"alert alert-danger\"><a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">\&times;</a>"
      + errorMessage + "</div>");

  window.scrollTo(0, 0);
  return false;
}

function newReport(){
  $('a[data-toggle="modal"], button[data-toggle="modal"]').click(function () {
    var item_id = -1;

    if (typeof $(this).data('id') !== 'undefined') {
      item_id = $(this).data('id');
    }else{
      return;
    }

    $('#report-item-id').val(item_id);

    var reporType = item_id.indexOf("article") != -1 ? 'artigo' : 'comentário';

    $('#report-form h4').html('<span class="glyphicon glyphicon-flag"></span> Reportar ' + reporType);
  });
}

function edit(){
  var articleId = $('#article-id').val();
  if(articleId == undefined){
    return;
  }

  window.location.replace(BASE_URL + 'pages/articles/edit_article.php?id=' + articleId);
}

function eliminate(){
	var articleId = $('#article-id').val();
  if(articleId == undefined){
      return;
  }

 	$.ajax({
      type: "post",
      url: "../../api/articles/delete_article.php",
      datatype: "json",
      data: JSON.stringify({'id': articleId})
    }).done(function(html){
      var json = JSON.parse(html);
      if("success" in json){
        window.location.replace(BASE_URL);
      }else if("error" in json){
        warn(json['error']);
      }
    });
}

function upvoteArticle(userId){

    var articleId = $('#article-id').val(); 
    if(articleId == undefined){
      return;
    }

    $.ajax({
        type: "post",
        url: "../../api/articles/vote_article.php",
        datatype: "json",
        data: JSON.stringify({'type': 'up', 'user_id': userId, 'article_id': articleId})
      }).done(function(html){
        var json = JSON.parse(html);
        if("success" in json){
          $('#article-score').html(json['success']);
          $('#article-down-vote').addClass('text-muted');
          $('#article-up q  -vote').removeClass('text-muted');
        }
      });
}

function downvoteArticle(userId){

   var articleId = $('#article-id').val(); 
    if(articleId == undefined){
      return;
    }

    $.ajax({
        type: "post",
        url: "../../api/articles/vote_article.php",
        datatype: "json",
        data: JSON.stringify({'type': 'down', 'user_id': userId, 'article_id': articleId})
      }).done(function(html){
        var json = JSON.parse(html);
        if("success" in json){
          $('#article-score').html(json['success']);
          $('#article-up-vote').addClass('text-muted');
          $('#article-down-vote').removeClass('text-muted');
        }
      });
}

function upvoteComment(userId, commentId){

    $.ajax({
        type: "post",
        url: "../../api/comments/vote_comment.php",
        datatype: "json",
        data: JSON.stringify({'type': 'up', 'user_id': userId, 'comment_id': commentId})
      }).done(function(html){
        var json = JSON.parse(html);
        if("success" in json){
          
        }
      });
}

function downvoteComment(userId, commentId){

    $.ajax({
        type: "post",
        url: "../../api/comments/vote_comment.php",
        datatype: "json",
        data: JSON.stringify({'type': 'down', 'user_id': userId, 'comment_id': commentId})
      }).done(function(html){
        var json = JSON.parse(html);
        if("success" in json){
          
        }
      });
}

function postComment(userId, userName, userPicture){
    var articleId = $('#article-id').val(); 
    if(articleId == undefined){
      return;
    }

    var content = $('#new-comment').val(); 
    if(content == undefined || content.trim() == ""){
      return;
    }
    
    $.ajax({
        type: "post",
        url: "../../api/comments/post_comment.php",
        datatype: "json",
        data: JSON.stringify({'user_id': userId, 'article_id': articleId, 'content': content})
      }).done(function(html){
        var json = JSON.parse(html);
        if("success" in json){
          $('#new-comment').val("");
          $('#comments-list').prepend("<div class=\"media comment\"><p class=\"pull-right\"><small>" + json['comment_date'] + "</small></p><div class=\"comment-vote\"><a href=\"#\"><i class=\"fa fa-arrow-up\"></i></a><br><a href=\"#\"><i class=\"fa fa-arrow-down\"></i></a></div><a class=\"media-left\" href=\"" + BASE_URL + "users/profile.php?id=" + userId + "\"><img class=\"img-circle comment-user-picture\" src=\"" + BASE_URL + userPicture + "\"></a><div class=\"media-body\"><h4 class=\"media-heading user_name\"><a href=\"" + BASE_URL + "users/profile.php?id=" + userId + "\">" + userName + "</a></h4>" + content + "<p><small>0 pontos</small></p><div class=\"report-comment\"><small><a data-id=\"comment#" + json['id'] + "\" data-toggle=\"modal\" data-target=\"#report-form\"><span data-placement=\"bottom\" class=\"glyphicon glyphicon-flag\"></span>Reportar comentário</a></small></div></div></div>");
        }
      });
}

function submitReport(userId){
    var articleId = $('#article-id').val(); 
    if(articleId == undefined){
      return false;
    }
    
    var itemId = $('#report-item-id').val();
    var commentId = null;
    if(itemId.indexOf("article") == -1){
      commentId = itemId.match(/[1-9]+/)[0];
    }

    var description = $('#report-description').val();
    if(description.trim() == ""){
      return false;
    }

console.log({'user_id': userId, 'article_id': articleId, 'comment_id': commentId, 'description': description});

    $.ajax({
        type: "post",
        url: "../../api/reports/create_report.php",
        datatype: "json",
        data: JSON.stringify({'user_id': userId, 'article_id': articleId, 'comment_id': commentId, 'description': description})
      }).done(function(html){
          console.log(html);
        var json = JSON.parse(html);

        if("success" in json){
          console.log('success');
        }else{
          console.log('error');
          warn("Ocorreu um erro ao reportar o " + (commentId != null ? 'comentário.' : 'artigo.'));
        }
      });

      return true;
}

function main(){
  newReport();
$('.carousel').carousel({
  interval: false
});
}

$(document).ready(main);
