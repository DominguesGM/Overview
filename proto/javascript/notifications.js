  var reportSelected = false;
  var senderId;
  var userId;

  var limit = 5;
  var offset;
  var currentResultCount;

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
 function notificationsScroll(){
  offset += limit;

  $('#list-notifications').slimScroll({
    height: '60vh',
    allowPageScroll: true
  });

  $("#all-notifications").bind('slimscroll', function(e, pos){
    if(pos == 'bottom') {
      scrollNotifications();
    }
  });
}

function scrollNotifications(){
  console.log('request?'); 
  if(currentResultCount == limit) {
    console.log('requested '); 
    getNotifications();
  }
}

function getNotifications(userRequest){
  console.log('requested');

  $.ajax({
    url: "../../api/notifications/get_notifications.php",
    method: "get",
    datatype: "json",
    data: {'offset': offset, 'limit': limit}
  }).done(function (html) {

    var jsonResponse = JSON.parse(html);
    if('error' in jsonResponse){
      return;
    }
    jsonResponse = jsonResponse['success'];
    currentResultCount = jsonResponse['notifications'].length;

    if(currentResultCount==0){
      return;
    }

    newNotifications = prepareReportsHtml(jsonResponse['notifications']);

    if(userRequest){
      $('#list-notifications').html(newNotifications)
    }else{
      $('#list-notifications').append(newNotifications);          
    }
  });

  offset += limit;
}

function prepareNotificationsHtml(notifications){
  var html = "";

  for(var i = 0; i < notifications.length; i++){
    html += getNotificationSummary(notifications[i]['id'], notifications[i]['sent_date'], 
      notifications[i]['message'], notifications[i]['sent_by'],
      notifications[i]['sender_picture'], notifications[i]['sender_first_name'],
      notifications[i]['sender_last_name']);
  }

  return html;
}

function getNotificaitonSummary(notificationId, sentDate, message, sentBy, senderPicture, senderFirstName, senderLastName){
  var html = '<li id="notification-' + notificationId + '" class="notification button-link" onclick="displayNotification("' + notificationId +')">';
  html += '<div class="media">';
  html += '<p class="pull-right text-muted"><small>' + senttDate + '</small></p>';
  html += '<a class="media-left" href="' + BASE_URL +'/pages/users/profile.php?id=' + sentBy + '">';
  html += '<img class="img-circle" height="40" width="40" src="' + BASE_URL + senderPicture + '" alt="' + senderFirstName + ' ' + senderLastName + '"></a>';
  html += '<span><h5 class="user_name"><a href="' + BASE_URL +'/pages/users/profile.php?id=' + sentBy + '">' + senderFirstName + ' ' + senderLastName + '</a></h5></span>';
  html += '<p>' + message + '</p>';
  html += '<div class="delete btn-simple pull-right text-muted"><small><span onclick="deleteNotification(' + notificationId + ')" data-placement="left" data-toggle="tooltip" title="Apagar" class="glyphicon glyphicon-remove"></span></small></div></div>';
  return html;
}

function displayNotification(notificationIdP){
    // update info on current notification
    notificationId = notificationIdP;
  }

  function toggleReaderTools(){
    var toolsHtml = "";
    if(notificationSelected){
      toolsHtml = getArticleControl();
    }
 
    $( "#reader-tools" ).html(toolsHtml);
    $('[data-toggle=tooltip]').tooltip();
  }

  function resetSelectedItem(){
    notificationSelected = false;
    $("#list-notifications li").removeClass('active-notification');
    
    //$("#content-" + newType).html(selectNewReport);

    toggleReaderTools();
    baseAddress = null;
    notidicationId = null;
  }

  function getMessageControl(){
    var html = '<div class="btn-group pull-right" role="group" aria-label="Ferramentas de moderação">';
    html += '<button onclick="finishReview()" data-placement="bottom" data-toggle="tooltip" title="Marcar como lida" type="button" class="btn btn-secondary"><span class="glyphicon glyphicon-ok"></span> Lida</button>';
    html += '<button onclick="finishReview(' + commentId + ')" data-placement="bottom" data-toggle="tooltip" title="Apagar" type="button" class="btn btn-secondary"><span class="glyphicon glyphicon-remove"></span> Apagar</button>';

    return html;
  }

function setNotificationRead(notificationId){
   if(!notificationSelected){
    return;
  }

  $.ajax({
    type: "post",
    url: "../../api/notifications/set_read.php",
    datatype: "json",
    data: JSON.stringify({'id': notificationId})
  }).done(function(html){
    var json = JSON.parse(html);

    if("success" in json){
      //TOOD change color
    }
  });
}

function updateNotificationCount(){
  $.ajax({
    type: "get",
    url: "../../api/notifications/get_notification_count.php",
    datatype: "json"
  }).done(function(html){
    var json = JSON.parse(html);
    if("success" in json){
      $("#notification-count").html(json['success']);
    }
  });
}

function deleteNotification(notificationId){
  console.log('deleting');

  event.cancelBubble = true;
  if(event.stopPropagation) event.stopPropagation();

  $.ajax({
    type: "post",
    url: "../../api/notifications/delete_notification.php",
    datatype: "json",
    data: JSON.stringify({'id': notificationId})
  }).done(function(html){
    var json = JSON.parse(html);
    if("success" in json){
      updateNotificationCount();
      resetSelectedItem();
      $("#notification-" + notificationId).after("<div \" class=\"alert alert-success\"><a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">\&times;</a>Notificação apagada.</div>");    
      $("#notification-" + notificationId).remove();
    }
  });
}

$(document).ready(function(){
  offset = 0;
  currentResultCount = limit;
  
  resetSelectedItem();
  notificationsScroll();
});