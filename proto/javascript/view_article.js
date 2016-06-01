  var offset = 0;
  var limit = 10;
  var currentResultCount = 10;
  var articleId = -1;
  var userId = -1;
  var contributorAccess = false;

  /**
   * Alerts management.
   */

   function warn(message){
    $("#alert").html("<div \" class=\"alert alert-danger\"><a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">\&times;</a>"
      + message + "</div>");

    window.scrollTo(0, 0);
    return false;
  }

  function ok(message){
    $("#alert").html("<div \" class=\"alert alert-success\"><a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">\&times;</a>"
      + message + "</div>");

    window.scrollTo(0, 0);
    return false;
  }


  /**
   * Comment management.
   */

   function getCommentHtml(commentId, commentDate, content, score, postedBy, firstName, lastName, path, vote, report){
    var commentHtml = '<div id="' + commentId + '" class=\"media comment\">';
    commentHtml += '<input class="comment-user" type="hidden" value="' + postedBy + '">';
    commentHtml += "<p class=\"pull-right\"><small>" + commentDate + "</small></p>";

    if(contributorAccess){
      commentHtml += '<div id="comment-' + commentId + '" class="comment-vote"><a onclick="upvoteComment(' + commentId + ')"><i id="comment-up-vote-' + commentId + '"';
      commentHtml += 'class="vote ' + (vote != 'up' ? 'text-muted' : '') + ' fa fa-arrow-up"></i></a><br>';
      commentHtml += '<a onclick="downvoteComment('+ commentId + ')"><i id="comment-down-vote-' + commentId + '" class="vote ' + (vote != 'up' ? 'text-muted' : '') + ' fa fa-arrow-down"></i></a></div>';
    }

    commentHtml += '<a class="media-left" href="' + BASE_URL + 'pages/users/profile.php?id=' + postedBy + '"><img alt="Autor do comentário" class="img-circle comment-user-picture" src="' + BASE_URL + path + '"></a>';
    commentHtml += '<div class="media-body"><h4 class="media-heading user_name"><a href="' + BASE_URL + 'pages/users/profile.php?id=' + postedBy + '">' + firstName + ' ' + lastName + '</a></h4>';
    commentHtml += content;
    commentHtml += '<p><small id="comment-score-' + commentId + '" class="text-muted">' + score + ((score != 1 && score != -1) ? ' pontos' : ' ponto') + '</small></p>';

    if(contributorAccess){
      commentHtml += '<div id="comment-report-' + commentId + '">';
      if(report){
        commentHtml += '<div class="report-comment text-muted"><span data-placement="bottom" class="glyphicon glyphicon-flag"></span>Comentário reportado</div>';
      }else{
        commentHtml += '<div class="selectable report-comment"><small><a data-id="' + commentId + '" data-toggle="modal" data-target="#report-form"><span data-placement="bottom" class="glyphicon glyphicon-flag"></span>Reportar comentário</a></small></div>';
      }
      commentHtml += '</div>';
    }
    
    commentHtml += '</div></div>';

    return commentHtml;
  }

  function prepareCommentsHtml(commentsList){

    var html = "";

    for(var i = 0; i < commentsList.length; i++){
      html += getCommentHtml(commentsList[i]['id'],
       commentsList[i]['comment_date'], commentsList[i]['content'], 
       commentsList[i]['score'], commentsList[i]['posted_by'], 
       commentsList[i]['first_name'], commentsList[i]['last_name'], 
       commentsList[i]['path'], commentsList[i]['vote'], commentsList[i]['report']);
    }

    return html;
  }

  function commentsScroll(){
    offset += limit;

    $(window).scroll(function() {
      if($(window).scrollTop() + $(window).height() == $(document).height()) {
        if(currentResultCount  == limit) {
          $.ajax({
            url: "../../api/comments/get_comments.php",
            method: "get",
            datatype: "json",
            data: {'article_id': articleId, 'offset': offset, 'limit': limit}
          }).done(function (html) {

            var jsonResponse = JSON.parse(html);
            if('error' in jsonResponse){
              return;
            }

            currentResultCount = jsonResponse['nComments'];
            newComments = prepareCommentsHtml(jsonResponse['comments']);
            $('#comments-list').append(newComments);
          });

          offset += limit;
        }
      }
    });
  }

  function upvoteComment(commentId){
    commentVote('up', userId, commentId);
  }

  function downvoteComment(commentId){
    commentVote('down', userId, commentId);
  }

  function commentVote(type, userId, commentId){
    $.ajax({
      type: "post",
      url: "../../api/comments/vote_comment.php",
      datatype: "json",
      data: JSON.stringify({'type': type, 'user_id': userId, 'comment_id': commentId})
    }).done(function(html){
      commentVoted(type, commentId, html);
    });
  }

  function commentVoted(type, commentId, html){
    var json = JSON.parse(html);

    if("success" in json){
      $('#comment-score-' + commentId).html(json['success'] + (json['success']!=1 ? ' pontos' : ' ponto'));
      $('#comment-up-vote-' + commentId).addClass('text-muted');
      $('#comment-down-vote-' + commentId).addClass('text-muted');

      if(json['action']=='new'){
        if(type=='up'){
          $('#comment-up-vote-' + commentId).removeClass('text-muted');
        }else if(type=='down'){
          $('#comment-down-vote-' + commentId).removeClass('text-muted');
        }
      }
    }
  }

  function postComment(userId, firstName, lastName, userPicture){
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
        $('#comments-list').prepend(getCommentHtml(json['id'],
         json['comment_date'], content, 
         0, json['posted_by'], 
         firstName, lastName, 
         userPicture, 'none', null));
      }
    });
  }

  /*
   * Report management.
   */
   function getCommentReportLink(commentId, reported){
    if(reported){
      return "<div class=\"report-comment text-muted\"><small><span data-placement=\"bottom\" class=\"glyphicon glyphicon-flag\"></span>Comentário reportado</small></div>"
    }else{
      return "<div class=\"selectable report-comment\"><small><a data-id=\"comment#" + commentId + "\" data-toggle=\"modal\" data-target=\"#report-form\"><span data-placement=\"bottom\" class=\"glyphicon glyphicon-flag\"></span>Reportar comentário</a></small></div>";
    }
  }

  function getArticleReportLink(articleId, reported){
    if(reported){
      return "<div class=\"report-article text-muted\"><span data-placement=\"bottom\" class=\"glyphicon glyphicon-flag\"></span>Artigo reportado</div>"
    }else{
      return "<div class=\"selectable report-article\"><small><a data-id=\"article#" + articleId + "\" data-toggle=\"modal\" data-target=\"#article-form\"><span data-placement=\"bottom\" class=\"glyphicon glyphicon-flag\"></span>Reportar artigo</a></small></div>";
    }
  }

  function newReport(){
    $('a[data-toggle="modal"], button[data-toggle="modal"]').click(function () {
      var reportHtml = '<div class="modal-dialog"><div class="modal-content"><div class="modal-header"><button type="button" class="close" data-dismiss="modal">&times;</button><h4 class="modal-title"></h4></div><div class="modal-body"><input type="hidden" id="report-item-id"><p>Porque motivo pretende reportar este item?</p><textarea id="report-description" style="overflow:auto;resize:vertical" class="form-control" rows="2" ></textarea></div><div class="modal-footer"><button onclick="submitReport(' + userId + ');" type="button" class="pull-right btn btn-primary" data-dismiss="modal"><span class="glyphicon glyphicon-flag"></span>Reportar</button><span class="pull-right">&nbsp</span><button type="button" class="pull-right btn btn-primary" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span>Cancelar</button></div></div></div>';
      $('#report-form').html(reportHtml);

      var item_id = -1;

      if (typeof $(this).data('id') == 'undefined') {
        return;
      }

      item_id = $(this).data('id');

      $('#report-item-id').val(item_id);
      $('#report-form h4').html('<span class="glyphicon glyphicon-flag"></span> Reportar ' + (item_id.indexOf("article") != -1 ? 'artigo' : 'comentário'));
    });
  }

  function submitReport(userId){    
    var itemId = $('#report-item-id').val();
    var commentId = null;
    if(itemId.indexOf("article") == -1){
      commentId = itemId.match(/[0-9]+/)[0];
    }

    var description = $('#report-description').val();
    if(description.trim() == ""){
      return false;
    }

    $.ajax({
      type: "post",
      url: "../../api/reports/create_report.php",
      datatype: "json",
      data: JSON.stringify({'user_id': userId, 'article_id': (itemId.indexOf("article") != -1 ? articleId : null), 'comment_id': commentId, 'description': description})
    }).done(function(html){
      var json = JSON.parse(html);

      if("success" in json){
        ok(json['success']);

        if(commentId){
          $("#comment-report-" + commentId).html(getCommentReportLink(commentId, true));
        }else{
          $("#article-report").html(getArticleReportLink(articleId, true));
        }

      }else{
        warn("Ocorreu um erro ao reportar o " + (commentId != null ? 'comentário.' : 'artigo.'));
      }
    });

    return true;
  }

  /*
   * Article management.
   */

   function edit(){
    window.location.replace(BASE_URL + 'pages/articles/edit_article.php?id=' + articleId);
  }

  function eliminate(){
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
   articleVote('up', userId);
 }

 function downvoteArticle(userId){
   articleVote('down', userId);
 }

 function articleVote(type, userId){
   $.ajax({
    type: "post",
    url: "../../api/articles/vote_article.php",
    datatype: "json",
    data: JSON.stringify({'type': type, 'user_id': userId, 'article_id': articleId})
  }).done(function(html){
    articleVoted(type, html);
  });
}

function articleVoted(type, html){
  var json = JSON.parse(html);
  
  if("success" in json){
    $('#article-score').html(json['success'] + (json['success']!=1 ? ' pontos' : ' ponto'));

    $('#article-up-vote').addClass('text-muted');
    $('#article-down-vote').addClass('text-muted');

    if(json['action']=='new'){
      if(type == 'up'){
        $('#article-up-vote').removeClass('text-muted');
      }else if(type == 'down'){
        $('#article-down-vote').removeClass('text-muted');
      }
    }
  }
}


$(document).ready(function(){
 articleId = $('#article-id').val();
 userId = $('#user-id').val();
 contributorAccess = $('#access-level').val();
 
 $('.carousel').carousel({
  interval: false
});

 newReport();
 commentsScroll();
});
