  var selectNewReport = '<h4 class="text-muted">Selecione um item para rever.</h4>';
  var reportSelected = false;
  var reportedId;
  var userId;
  var reportId;
  var articleId;
  var commentId;
  var type;
  var baseAddress;

  var limit = 5;
  var offset = [];
  var currentResultCount = [];

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
 * Scroll management.
 */
 function reportsScroll(){
  offset['article'] += limit;
  offset['comment'] += limit;

  $('#content-article').slimScroll({
    height: '70vh',
    allowPageScroll: true
  });

  $('#content-comment').slimScroll({
    height: '70vh',
    allowPageScroll: true
  });

  $('#list-comment-reports').slimScroll({
    height: '60vh',
    allowPageScroll: true
  });

  $('#list-article-reports').slimScroll({
    height: '60vh',
    allowPageScroll: true
  });

  $("#all-article-reports").bind('slimscroll', function(e, pos){
    if(pos == 'bottom') {
      scrollReports('article');
    }
  });

  $("#all-comment-reports").bind('slimscroll', function(e, pos){
    if(pos == 'bottom') {
      scrollReports('comment');
    }
  });
}

function scrollReports(type){
  console.log('request? ' + type); 
  if(currentResultCount[type]  == limit) {
    console.log('requested ' + type); 
    getReports(type);
  }
}

function scrollToById(container, target){
  var aTag = $('#' + target);

  $("#" + container).animate({scrollTop: aTag.offset().top},'slow');
}

function getReports(type, userRequest){
  console.log('requested');

  $.ajax({
    url: "../../api/reports/get_reports.php",
    method: "get",
    datatype: "json",
    data: {'type': type, 'offset': offset[type], 'limit': limit}
  }).done(function (html) {

    var jsonResponse = JSON.parse(html);
    if('error' in jsonResponse){
      return;
    }
    jsonResponse = jsonResponse['success'];
    currentResultCount[type] = jsonResponse['reports'].length;

    if(currentResultCount[type]==0){
      return;
    }

    newReports = prepareReportsHtml(jsonResponse['reports']);

    if(userRequest){
      $('#list-' + type + '-reports').html(newReports)
    }else{
      $('#list-' + type + '-reports').append(newReports);          
    }
  });

  offset['type'] += limit;
}

function prepareReportsHtml(reports){
  var html = "";

  for(var i = 0; i < reports.length; i++){
    html += getReportSummary(reports[i]['id'], reports[i]['report_date'], 
      reports[i]['description'], reports[i]['reported_by'],
      reports[i]['reporter_picture'], reports[i]['reporter_first_name'],
      reports[i]['reporter_last_name'], reports[i]['article_id'], reports[i]['comment_id']);
  }

  return html;
}

function getReportSummary(reportId, reportDate, description, reportedBy, reporterPicture, reporterFirstName, reporterLastName, articleId, commentId){
  var html = '<li id="report-' + reportId + '" class="report button-link" onclick="displayReport(' + (commentId != null ? '"article"' : '"report"') + ', "'+ BASE_URL +'pages/articles/view_article.php?id=' + articleId + '",' + reportId + ',' + articleId +')">'
  html += '<div class="media">';
  html += '<p class="pull-right text-muted"><small>' + reportDate + '</small></p>';
  html += '<a class="media-left" href="' + BASE_URL +'/pages/users/profile.php?id=' + reportedBy + '">';
  html += '<img class="img-circle" height="40" width="40" src="' + BASE_URL + reporterPicture + '" alt="' + reporterFirstName + ' ' + reporterLastName + '"></a>';
  html += '<span><h5 class="user_name"><a href="' + BASE_URL +'/pages/users/profile.php?id=' + reportedBy + '">' + reporterFirstName + ' ' + reporterLastName + '</a></h5></span>';
  html += '<p>' + description + '</p>';
  html += '<div class="delete btn-simple pull-right text-muted"><small><span onclick="deleteReport(' + reportId + ')" data-placement="left" data-toggle="tooltip" title="Descartar" class="glyphicon glyphicon-remove"></span></small></div></div>';
  return html;
}

function displayReport(typeP, baseAddressP, reportIdP, articleIdP, commentIdP){
    // update info on current report
    type = typeP;
    baseAddress = baseAddressP;
    reportId = reportIdP;
    articleId = articleIdP;
    commentId = commentIdP;

    console.log(commentId + ' ,' + articleId);

    $( "#content-" + type ).load(baseAddress + 'pages/articles/view_article.php?id=' + articleId, 
      function( response, status, xhr ) {
        
        if( status == "error" ){
          var typeTemp = type;
          var reportIdTemp = reportId;
          resetSelectedItem();
            $("#content-" + typeTemp).html("<div \" class=\"alert alert-success\"><a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">\&times;</a>O item já foi revisto.</div>");
            $("#content-" + typeTemp + ' .alert-success').show().delay(5000).fadeOut(function() {
                $("#content-" + typeTemp).html(selectNewReport);
            });
            $("#report-" + reportIdTemp).remove();
          return;
        }
        
        reportSelected = true;

        // if the reported item is a comment, scroll to it
        if(type=='comment'){

          // if the comment is not found
          if($("#comment-" + commentId).length==0){
            var typeTemp = type;
            var reportIdTemp = reportId;
            resetSelectedItem();
            $("#content-" + typeTemp).html("<div \" class=\"alert alert-success\"><a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">\&times;</a>O item já foi revisto.</div>");
            $("#content-" + typeTemp + ' .alert-success').show().delay(5000).fadeOut(function() {
                $("#content-" + typeTemp).html(selectNewReport);
            });
            $("#report-" + reportIdTemp).remove();
            return;
          }

          $("#comment-" + commentId).css("background-color", "#ff8080");
          scrollToById("content-comment", 'comment-' + commentId);
          
          reportedId = $("#comment-" + commentId + ' .comment-user').val();
        }else if(type=='article') {
          reportedId = $("#user-id").val();
        }
          
          // load moderator tools
          toggleModeratorTools();
      });

    // highlight new selected report
    $( "#list-" + type +"-reports li").removeClass('active-report');
    $( "#" + type +"-report-" + reportId).addClass('active-report');

    // wait for loading
    $( "#content-" + type ).html('<img class="center-block" height="80" widht="80" alt="Waiting..." src="' + baseAddress + 'images/assets/loading.gif">');


    console.log(baseAddress + 'pages/articles/view_article.php?id=' + articleId);
  }

  function refreshReport(){
    displayReport(type, baseAddress, reportId, articleId, commentId);
  }

  function toggleModeratorTools(){
    var toolsHtml = "";
    if(type=='article'){
      toolsHtml = getArticleControl();
    }else if(type=='comment'){
      toolsHtml = getCommentControl();
    }
 
    $( "#moderator-tools" ).html(toolsHtml);
    $('[data-toggle=tooltip]').tooltip();
  }

  function resetSelectedItem(newType){
    newType = (newType!=undefined ? newType : type);
    reportSelected = false;
    $( "#list-" + type +"-reports li").removeClass('active-report');
    $("#content-" + newType).html(selectNewReport);
    type = null;
    toggleModeratorTools();
    baseAddress = null;
    reportId = null;
    articleId = null;
    commentId = null;
  }

  function getArticleControl(){
    var html = '<div class="btn-group pull-right" role="group" aria-label="Ferramentas de moderação">';
    html += '<button onclick="finishReview()" data-placement="bottom" data-toggle="tooltip" title="Marcar como revisto" type="button" class="btn btn-secondary"><span class="glyphicon glyphicon-ok"></span> Revisto</button>';
    html += '<button onclick="refreshReport()" data-placement="bottom" data-toggle="tooltip" title="Recarregar o artigo" type="button" class="btn btn-secondary"><span class="glyphicon glyphicon-refresh"></span> Atualizar</button>';
    html += '<button onclick="editArticle()" data-placement="bottom" data-toggle="tooltip" title="Editar o artigo" type="button" class="btn btn-secondary"><span class="glyphicon glyphicon-pencil"></span> Editar</button>';
    html += '<button onclick="finishReview(' + articleId + ')" data-placement="bottom" data-toggle="tooltip" title="Eliminar o artigo" type="button" class="btn btn-secondary"><span class="glyphicon glyphicon-remove"></span> Eliminar</button>';
    html += '<button onclick="blockUser()" data-placement="bottom" data-toggle="tooltip" title="Bloquear o autor" type="button" class="btn btn-secondary"><span class="glyphicon glyphicon-ban-circle"></span> Bloquear</button></div>';    

    return html;
  }

  function getCommentControl(){
    var html = '<div class="btn-group pull-right" role="group" aria-label="Ferramentas de moderação">';
    html += '<button onclick="finishReview()" data-placement="bottom" data-toggle="tooltip" title="Marcar como revisto" type="button" class="btn btn-secondary"><span class="glyphicon glyphicon-ok"></span> Revisto</button>';
    html += '<button onclick="finishReview(' + commentId + ')" data-placement="bottom" data-toggle="tooltip" title="Eliminar o comentário" type="button" class="btn btn-secondary"><span class="glyphicon glyphicon-remove"></span> Eliminar</button>';
    html += '<button onclick="blockUser()" data-placement="bottom" data-toggle="tooltip" title="Bloquear o autor" type="button" class="btn btn-secondary"><span class="glyphicon glyphicon-ban-circle"></span> Bloquear</button></div>';

    return html;
  }

  function editArticle(){
    if(reportSelected){
      $("<a>").attr("href", (baseAddress + 'pages/articles/edit_article.php?id=' + articleId)).attr("target", "_blank")[0].click();
    }
  }

  function deleteArticle(message){
    if(!reportSelected){
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
        console.log('article deleted');
        submitReview(message);
      }else if("error" in json){
        warn(json['error']);
      }
    });
  }

   function deleteComment(message){
    if(!reportSelected){
      return;
    }

    $.ajax({
      type: "post",
      url: "../../api/comments/delete_comment.php",
      datatype: "json",
      data: JSON.stringify({'id': commentId})
    }).done(function(html){
      var json = JSON.parse(html);
      if("success" in json){
        console.log('comment deleted');
        submitReview(message);
      }else if("error" in json){
        warn(json['error']);
      }
    });
  }

  function blockUser(){
    bootbox.confirm({
      message:"Tem a certeza que pretende bloquear o autor deste " + (commentId != null ? 'comentário?' : 'artigo?'), 
      locale: "pt",
      callback: function(result){
        if(result){
          setUserStatus('Blocked');
        }
      }
    });
  }

  function setUserStatus(newStatus){
    if(!reportSelected){
      return;
    }

    if(userId == reportedId){
      return;
    }

    $.ajax({
      type: "post",
      url: "../../api/users/update_user_status.php",
      datatype: "json",
      data: JSON.stringify({'user_id': reportedId, 'new_status': newStatus})
    }).done(function(html){
      var json = JSON.parse(html);
    if("error" in json){
      warn(json['error']);
    }
  });
  }


/**
 *  Terminate the review
 */ 
 function finishReview(deleteItemRequest){
  if(!reportSelected){
    return;
  }

  var html = '<div class="row">  ' +
  '<div class="col-md-12"> ' +
  '<form class="form-horizontal"> ' +
  '<div class="form-group"> ' +
  '<label class="col-md-4 control-label" for="message">Mensagem</label> ' +
  '<div class="col-md-8"> ' +
  '<textarea id="message" style="overflow:auto;resize:vertical" class="form-control input-md" name="message" rows="3" placeholder="Mensagem..."></textarea>'+
  '<span class="help-block">Introduza uma descrição da ação de moderação.</span> </div> ' +
  '</div> ' +
  '<div class="form-group"> ' +
  '<label class="col-md-4 control-label" for="transgression">Houve violação dos Termos de Uso?</label> ' +
  '<div class="col-md-8"> <div class="radio"> <label for="transgression-0"> ' +
  '<input type="radio" name="transgression" id="transgression-0" value="false" checked="checked"> ' +
  'Sim </label> ' +
  '</div><div class="radio"> <label for="transgression-1"> ' +
  '<input type="radio" name="transgression" id="transgression-1" value="false"> Não </label> ' +
  '</div> ' +
  '</div> </div>' +
  '</form> </div>  </div>';

  bootbox.dialog({
    title: '<span class="glyphicon glyphicon-eye-open"></span> Terminar revisão',
    message: html,
    buttons: {
      cancell: {
       label: "Cancelar",
       className: "btn-primary",
       callback: function (){}
     },
     success: {
      label: (deleteItemRequest ? 'Apagar o item e terminar' : 'Terminar revisão'),
      className: "btn-primary",
      callback: function (){
        var message = $('#message').val();
        var transgression = ($("input[name='transgression']:checked").val()=='true');

        if(deleteItemRequest){
          deleteItem(message, transgression);
        }else{
          submitReview(message, transgression);                            
        }
      }
    }      
  }
});
}

function deleteItem(message, transgression){
  console.log('type');
  if(type=='article'){
    deleteArticle(message, transgression);
  }else if(type=='comment'){
    deleteComment(message, transgression);
  }
}

function submitReview(message, transgression){    
  console.log(message);

  if(transgression){
    setUserStatus('Warned');

    if(message.trim() != ""){
        message = 'Um ' + (commentId != null ? 'comentário.' : 'artigo.') + ' que publicou foi alvo de uma ação de moderação.';
    }
  }

  if(message.trim() != ""){
    sendNotification(message);
    return;
  }

  setReportReviewed();
}

function setReportReviewed(){
   if(!reportSelected){
    return;
  }

  $.ajax({
    type: "post",
    url: "../../api/reports/set_reviewed.php",
    datatype: "json",
    data: JSON.stringify({'report_id': reportId})
  }).done(function(html){
    var json = JSON.parse(html);

    if("success" in json){
      var typeTemp = type;
      var reportIdTemp = reportId;
      resetSelectedItem();
      $("#content-" + typeTemp).html("<div \" class=\"alert alert-success\"><a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">\&times;</a>O item foi revisto.</div>");
      $("#content-" + typeTemp + ' .alert-success').show().delay(5000).fadeOut(function() {
                $("#content-" + typeTemp).html(selectNewReport);
            });
      $("#report-" + reportIdTemp).remove();      
    }else{
      warn("Ocorreu um erro ao completar a revisão do " + (commentId != null ? 'comentário.' : 'artigo.'));
    }
  });
}

function sendNotification(message){
  if(!reportSelected){
    return;
  }

  if(userId == reportedId){
    setReportReviewed();
  }

  $.ajax({
    type: "post",
    url: "../../api/notifications/create_notification.php",
    datatype: "json",
    data: JSON.stringify({'sender': userId, 'receiver': reportedId, 'message': message})
  }).done(function(html){
    var json = JSON.parse(html);

    if("success" in json){
      setReportReviewed();
    }else{
      warn("Ocorreu um erro ao enviar a notificação.");
    }
  });
}

function updateReportCount(){
  $.ajax({
    type: "get",
    url: "../../api/reports/get_report_count.php",
    datatype: "json"
  }).done(function(html){
    var json = JSON.parse(html);
    if("success" in json){
      $("#report-count").html(json['success']);
    }
  });
}

function deleteReport(reportId){
  console.log('deleting');

  event.cancelBubble = true;
  if(event.stopPropagation) event.stopPropagation();

  $.ajax({
    type: "post",
    url: "../../api/reports/delete_report.php",
    datatype: "json",
    data: JSON.stringify({'report_id': reportId})
  }).done(function(html){
    var json = JSON.parse(html);
    if("success" in json){
      updateReportCount();
      resetSelectedItem();
      $("#report-" + reportId).after("<div \" class=\"alert alert-success\"><a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">\&times;</a>Item descartado.</div>");    
      $("#report-" + reportId).remove();
    }
  });
}

$(document).ready(function(){
  offset.article = 0;
  offset.comment = 0;
  currentResultCount.article = limit;
  currentResultCount.comment = limit;
  
  resetSelectedItem('article');
  reportsScroll();
});