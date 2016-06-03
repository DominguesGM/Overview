  var userType;
  var moderatorAccess;
  var administratorAccess;
  var offset = 0;
  var limit = 15;
  var currentResultCount = 15;

  function usersScroll(){
    offset += limit;

    $(window).scroll(function() {
      if($(window).scrollTop() + $(window).height() == $(document).height()) {
        if(currentResultCount  == limit) {
          $.ajax({
            url: "../../api/users/get_users.php",
            method: "get",
            datatype: "json",
            data: {'type': userType, 'offset': offset, 'limit': limit}
          }).done(function (html) {

            var jsonResponse = JSON.parse(html);
            if('error' in jsonResponse){
              return;
            }

            console.log('requested');

            currentResultCount = jsonResponse['users'].length;
            newUsers = prepareUsersHtml(jsonResponse['users']);
            
            if($('#list-users .no-users')!= undefined){
              $('#list-users').html(newUsers);
            }else{
              $('#list-users').append(newUsers);
            }
          });

          offset += limit;
        }
      }
    });
  }

  function prepareUsersHtml(users){

  }


  function getUserHtml(userId, userName, userPicture, userType, userStatus){
    var html = '<div id="' + userId + '" href="' + BASE_URL + 'pages/users/profile.php?id=' + userId +'" class="selectable user-card button-link col-md-3"><div class="text-center button-link col-xs-8 col-md-8">';
    html += '<a href="' + BASE_URL + 'pages/users/profile.php?id=' + userId +'">';
    html += '<img class="img-circle" height="100" width="100" alt="Imagem de perfil" src="' + BASE_URL + userPicture + '"></a>';
    html += '<h4 class="user_name"><a href="' + BASE_URL + 'users/profile.php?id=' + userId + '">' + userName + '</a></h4></div>';
    html += '<div class="pull-left col-xs-4 col-md-4">';

    if((moderatorAccess || administratorAccess) && currentUserId != userId){
      html+= '<ul class="btn-simple all-blogs">';

      if(administratorAccess){
        html += '<li class="user-info"><small><span onclick="toggleUserType(' + userId + ')" data-placement="right" data-toggle="tooltip" title="' + (userType =='Moderator' ? 'Despromover moderador' : 'Promover a moderador') + '" class="user-type text-muted selectable ' + (userType =='Moderator' ? 'glyphicon glyphicon-eye-close' : 'glyphicon glyphicon-eye-open') + '"></span></small></li>';
      }

      html += '<li class="user-info"><small><span onclick="toggleUserStatus(' + userId + ')" data-placement="right" data-toggle="tooltip" title="' + (userStatus != 'Blocked' ? 'Bloquear' : 'Desbloquear') + '" class="user-status glyphicon glyphicon-ban-circle selectable ' + (userStatus == 'Blocked' ? 'blocked' : 'text-muted') + '"></span></small></li></ul>';
    }

    html += '</div></div>';
    return html;
  }


  function toggleUserType(userId){

    event.cancelBubble = true;
    if(event.stopPropagation) event.stopPropagation();

    var element = $('#user-' + userId + ' .user-type');
    var newType = (element.hasClass('glyphicon-eye-close') ? 'Contributor' : 'Moderator');
    console.log(newType);
    $.ajax({
      type: "post",
      url: "../../api/users/update_user_type.php",
      datatype: "json",
      data: JSON.stringify({'new_type': newType, 'user_id': userId})
    }).done(function(html){
      var json = JSON.parse(html);
      if("success" in json){
        $('#user-' + userId).removeAttr('href');
        $('#user-' + userId).html("<div \" class=\"alert alert-success\"><a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">\&times;</a>" + (newType == 'Moderator' ? 'Promoivdo a Moderador.' : 'Despromovido a Contribuidor.') + "</div>");
        $('#user-' + userId + ' .alert-success').show().delay(5000).fadeOut(function() {
          $('#user-' + userId).remove();
        });

      }
    });
  }

  function toggleUserStatus(userId){

    event.cancelBubble = true;
    if(event.stopPropagation) event.stopPropagation();

    var element = $('#user-' + userId + ' .user-status');
    var newStatus = (element.hasClass('text-muted') ? 'Active' : 'Blocked');

    $.ajax({
      type: "post",
      url: "../../api/users/update_user_status.php",
      datatype: "json",
      data: JSON.stringify({'new_status': newStatus, 'user_id': userId})
    }).done(function(html){
      var json = JSON.parse(html);

      if("success" in json){
        element.toggleClass('text-muted');
        element.toggleClass('blocked');
        element.attr('title', (newStatus == 'Blocked' ? 'Desbloquear' : 'Bloquear'))
      }
    });
  }

  $(document).ready(function(){
   userType = $('#user-type').val();
   currentUserId = $('#user-id').val();
   moderatorAccess = $('#moderator-access').val();
   administratorAccess = $('#administrator-access').val();

   usersScroll();
 });
