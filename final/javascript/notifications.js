  var limit = 5;
  var offset;
  var currentResultCount;

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
  var html = '<li id="notification-' + notificationId + '" class="' + (!isRead ? 'unread-notification' : '') + ' notification button-link" onclick="setNotificationRead(' + notificationId + ')">';
  html += '<div class="media"><p class="pull-right text-muted"><small>' + sentDate + '</small></p>';
  html += '<a class="media-left" href="' + BASE_URL + 'pages/users/profile.php?id=' + sentBy + '">';
  html += '<img class="img-circle" height="40" width="40" src="' + BASE_URL + senderPicture + '" alt="' + senderFirstName + ' ' + senderLastName + '">';
  html += '</a><span class="sender-name"><a href="'+ BASE_URL + 'pages/users/profile.php?id=' + sentBy + '">' + senderFirstName + ' ' + senderLastName + '</a></span>';
  html += '<p>' + message + '</p><div class="btn-simple pull-right text-muted">';

  if(isRead){
    html += '<small><span onclick="toggleNotificationRead(' + notificationId + ')" data-placement="left" data-toggle="tooltip" title="Marcar como lida" class="notification-read delete glyphicon glyphicon-envelope"></span></small>';
  }else{
    html += '<small><span onclick="toggleNotificationRead(' + notificationId + ')" data-placement="left" data-toggle="tooltip" title="Marcar como não lida" class="notification-read delete glyphicon glyphicon-envelope"></span></small>';
  }
  html += '<span>&nbsp&nbsp</span>';
  html += '<small><span onclick="deleteNotification(' + notificationId + ')" data-placement="left" data-toggle="tooltip" title="Apagar" class="delete glyphicon glyphicon-remove"></span></small>';
  html += '</div></div></li>';
  
  return html;
}

function setNotificationRead(notificationId){
  if($('#notification-' + notificationId).hasClass('unread-notification')){
    toggleNotificationRead(notificationId);
  }
}

function toggleNotificationRead(notificationId){

  event.cancelBubble = true;
  if(event.stopPropagation) event.stopPropagation();

  var isRead = $('#notification-' + notificationId).hasClass('unread-notification');

  $.ajax({
    type: "post",
    url: "../../api/notifications/set_read.php",
    datatype: "json",
    data: JSON.stringify({'id': notificationId, 'is_read': isRead.toString()})
  }).done(function(html){
    console.log(html);
    var json = JSON.parse(html);

    if("success" in json){
      $('#notification-' + notificationId).toggleClass('unread-notification');
      $('#notification-' + notificationId).find('.unread-notification').attr('title', "Marcar como " + (isRead ? 'não ' : '') + "lida");
      updateNotificationCount();
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

      if(json['success']==0){
        $("#list-notifications").html('<li class="notification button-link" onclick="getNotifications()">Não tem notificações.</li>');
      }
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
      $("#notification-" + notificationId).after("<div \" class=\"alert alert-success\"><a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">\&times;</a>Notificação apagada.</div>");    
      $("#notification-" + notificationId).remove();
    }
  });
}

$(document).ready(function(){
  offset = 0;
  currentResultCount = limit;
  
  notificationsScroll();
});