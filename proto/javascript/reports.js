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


function scrollTo(container, target){
  var aTag = $('#' + target);

  $("#" + container).animate({scrollTop: aTag.offset().top},'slow');
}

function getReports(type, userRequest){
  console.log('requested');
  $.ajax({
    url: "../../api/reports/get_reports.php",
    method: "get",
    datatype: "json",
    data: {'type': type, 'offset': offset[type], 'limit': limit[type]}
  }).done(function (html) {

    var jsonResponse = JSON.parse(html);
    if('error' in jsonResponse){
      return;
    }

    currentResultCount[type] = jsonResponse['nReports'];
    newReports = prepareReportsHtml(jsonResponse['reports']);

    if(userRequest){
      $('#list-' + type + '-reports').html(newReports)
    }else{
      $('#list-' + type + '-reports').append(newReports);          
    }
  });

  offset['type'] += limit;
}


function finishReview(deleteItem){

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
        label: (deleteItem ? 'Apagar o item e terminar' : 'Terminar revisão'),
        className: "btn-primary",
        callback: function (){
          var message = $('#message').val();
          var transgression = $("input[name='transgression']:checked").val();

          if(deleteItem){
            deleteItem(message, transgression);
          }else{
            submitReview(message, transgression);                            
          }
        }
      }      
   }
 });
}

function submitReview(message, transgression){    
  console.log(message);
  console.log(transgression);

  if(message.trim() != ""){
    sendNotification(message);
  }

  $.ajax({
    type: "post",
    url: "../../api/reports/set_reviewed.php",
    datatype: "json",
    data: JSON.stringify({'reportId': reportId})
  }).done(function(html){
    var json = JSON.parse(html);

    if("success" in json){
      ok(json['success']);
      resetSelectedItem();

    }else{
      warn("Ocorreu um erro ao completar a revisão do " + (commentId != null ? 'comentário.' : 'artigo.'));
    }
  });

  return true;
}

// TODO
function sendNotification(message){
  $.ajax({
    type: "post",
    url: "../../api/notifications/create_notification.php",
    datatype: "json",
    data: JSON.stringify({'sender': userId, 'receiver': , 'message': message})
  }).done(function(html){
    var json = JSON.parse(html);

    if("success" in json){
      ok(json['success']);

      if(commentId){
        $("#comment-report-" + commentId).html(getCommentReportLink(commentId, true));
      }else{
        $("#article-report-" + articleId).html(getArticleReportLink(articleId, true));
      }

    }else{
      warn("Ocorreu um erro ao reportar o " + (commentId != null ? 'comentário.' : 'artigo.'));
    }
  });

}

  /*
   * Report management.
   */
   function setReviewed(reportId){

    $.ajax({
      type: "post",
      url: "../../api/reports/set_reviewed.php",
      datatype: "json",
      data: JSON.stringify({'report_id': reportId})
    }).done(function(html){
      var json = JSON.parse(html);
      if("success" in json){
        Example.show('teste');
        $("#" + reportId).html("<div \" class=\"alert alert-success\"><a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">\&times;</a>Item revisto.</div>");
        $("#" + reportId).show().delay(5000).fadeOut();
      }else if("error" in json){
        warn(json['error']);
      }
    });
  }


  function refreshReport(){
    displayReport(type, baseAddress, reportId, articleId, commentId);
  }

  function displayReport(typeP, baseAddressP, reportIdP, articleIdP, commentIdP){
    // update info on current report
    type = typeP;
    baseAddress = baseAddressP;
    reportId = reportIdP;
    articleId = articleIdP;
    commentId = commentIdP;

    $( "#content-" + type ).load(baseAddress + 'pages/articles/view_article.php?id=' + articleId, 
      function( response, status, xhr ) {
        if( status == "error" ){
          warn("Não foi possível encontrar o artigo.");
        }

        // if the reported item is a comment, scroll to it
        if(type=='comment'){
          $("#"+ type +'-' + commentId).css("background-color", "#ff8080");
          scrollTo("content-" + type,type +'-' + commentId);
        }
      });

    // highlight new selected report
    $( "#list-" + type +"-reports li").removeClass('active-report');
    $( "#" + type +"-report-" + reportId).addClass('active-report');

    // load report context
    $( "#content-" + type ).html('<img class="center-block" height="80" widht="80" alt="Waiting..." src="' + baseAddress + 'images/assets/loading.gif">');

    // load moderator tools
    var moderatorTools = (type === 'article' ? getArticleControl() : getCommentControl());
    $( "#moderator-tools" ).html(moderatorTools);
    $('[data-toggle=tooltip]').tooltip();

    console.log(baseAddress + 'pages/articles/view_article.php?id=' + articleId);
  }

  function getArticleControl(){
    var html = '<div class="btn-group pull-right" role="group" aria-label="Ferramentas de moderação">';
    html += '<button onclick="newReportFeedback()" data-placement="bottom" data-toggle="tooltip" title="Marcar como revisto" type="button" class="btn btn-secondary"><span class="glyphicon glyphicon-ok"></span> Revisto</button>';
    html += '<button onclick="refreshReport()" data-placement="bottom" data-toggle="tooltip" title="Recarregar o artigo" type="button" class="btn btn-secondary"><span class="glyphicon glyphicon-refresh"></span> Atualizar</button>';
    html += '<button onclick="editArticle()" data-placement="bottom" data-toggle="tooltip" title="Editar o artigo" type="button" class="btn btn-secondary"><span class="glyphicon glyphicon-pencil"></span> Editar</button>';
    html += '<button onclick="removeArticle(' + articleId + ')" data-placement="bottom" data-toggle="tooltip" title="Eliminar o artigo" type="button" class="btn btn-secondary"><span class="glyphicon glyphicon-remove"></span> Eliminar</button></div>';
//      <button onclick="newReportFeedback()" data-placement="bottom" data-toggle="tooltip" title="Bloquear o autor" type="button" class="btn btn-secondary"><span class="glyphicon glyphicon-ban-circle"></span> Bloquear</button>    

return html;
}

function getCommentControl(){
  var html = '<div class="btn-group pull-right" role="group" aria-label="Ferramentas de moderação">';
  html += '<button onclick="newReportFeedback()" data-placement="bottom" data-toggle="tooltip" title="Marcar como revisto" type="button" class="btn btn-secondary"><span class="glyphicon glyphicon-ok"></span> Revisto</button>';
  html += '<button onclick="refreshReport()" data-placement="bottom" data-toggle="tooltip" title="Recarregar o artigo" type="button" class="btn btn-secondary"><span class="glyphicon glyphicon-refresh"></span> Atualizar</button>';
  html += '<button onclick="removeArticle(' + articleId + ')" data-placement="bottom" data-toggle="tooltip" title="Eliminar o comentário" type="button" class="btn btn-secondary"><span class="glyphicon glyphicon-remove"></span> Eliminar</button></div>';

  return html;
}

function getReportSummary(reportId, reportDate, description, reportedBy, reporterPicture, reporterFirstName, reporterLastName, articleId, commentId){
  var html = '<li id="article-report-' + reportId + '" class="report button-link" onclick="displayReport(' + (commentId != null ? 'article' : 'report') + ','+ BASE_URL +'pages/articles/view_article.php?id=' + articleId + ',' + reportId + ',' + article_id +')">'
      html += '<div class="media">';
      html += '<p class="pull-right text-muted"><small>' + reportDate + '</small></p>';
      html += '<a class="media-left" href="' + BASE_URL +'/pages/users/profile.php?id=' + reportedBy + '">';
      html += '<img class="img-circle" height="40" width="40" src="' + BASE_URL + reporterPicture + '" alt="' + reporterFirstName + ' ' + reporterLastName + '"></a>';
      html += '<span><h5 class="user_name"><a href="' + BASE_URL +'/pages/users/profile.php?id=' + reportedBy + '">' + reporterFirstName + ' ' + reporterLastName + '</a></h5></span>';
      html += '<p>' + description + '</p></div></li>';

      return html;
}

function editArticle(){
  $("<a>").attr("href", (baseAddress + 'pages/articles/edit_article.php?id=' + articleId)).attr("target", "_blank")[0].click();
}

function removeArticle(){
  $.ajax({
    type: "post",
    url: "../../api/articles/delete_article.php",
    datatype: "json",
    data: JSON.stringify({'id': articleId})
  }).done(function(html){
    var json = JSON.parse(html);
    if("success" in json){
      $("#" + reportId).html("<div \" class=\"alert alert-success\"><a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">\&times;</a>Item revisto.</div>");
      $("#" + reportId).show().delay(5000).fadeOut();
    }else if("error" in json){
      warn(json['error']);
    }
  });
}

function removeReport(reportId){
  $.ajax({
    type: "post",
    url: "../../api/reports/delete_report.php",
    datatype: "json",
    data: JSON.stringify({'id': reportId})
  }).done(function(html){
    var json = JSON.parse(html);
    if("success" in json){
      $("#" + reportId).html("<div \" class=\"alert alert-success\"><a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">\&times;</a>Item revisto.</div>");
      $("#" + reportId).show().delay(5000).fadeOut();
    }else if("error" in json){
      warn(json['error']);
    }
  });
}


$(document).ready(function(){
  offset.article = 0;
  offset.comment = 0;
  currentResultCount.article = limit;
  currentResultCount.comment = limit;

  //newReportFeedback();
  reportsScroll();
});