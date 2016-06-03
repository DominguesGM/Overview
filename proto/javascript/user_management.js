  var userType;
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

  function toggleUserType(userId){

    event.cancelBubble = true;
    if(event.stopPropagation) event.stopPropagation();

    var element = $('#user-' + userId).find('.user-type');
    var newType = (element.hasClass('glyphicon-eye-close') ? 'Contributor' : 'Moderator');
console.log(newType);
    $.ajax({
      type: "post",
      url: "../../api/users/update_user_type.php",
      datatype: "json",
      data: JSON.stringify({'new_type': newType, 'user_id': userId})
    }).done(function(html){
      console.log(html);
      var json = JSON.parse(html);
      if("success" in json){
        $('#user-' + userId).removeAttr('href');
        $('#user-' + userId).html("<div \" class=\"alert alert-success\"><a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">\&times;</a>(newType == 'Contributor' ? 'Promoivdo a Moderador.' : 'Despromovido a Contribuidor.')</div>");
        $('#user-' + userId + ' .alert-success').show().delay(5000).fadeOut(function() {
          $('#user-' + userId).remove();
        });

      }
    });
  }

 function toggleUserStatus(userId){

    event.cancelBubble = true;
    if(event.stopPropagation) event.stopPropagation();
    var element = $('#user-' + userId).find('div > li > small > span .user-status');
    var newStatus = (element.hasClass('text-muted') ? 'Active' : 'Blocked');
console.log(element.length);
    $.ajax({
      type: "post",
      url: "../../api/users/update_user_status.php",
      datatype: "json",
      data: JSON.stringify({'new_status': newStatus, 'user_id': userId})
    }).done(function(html){
      var json = JSON.parse(html);
      console.log(html);
      if("success" in json){
        console.log('ok');
        element.toggleClass('text-muted');
        element.attr('title', (newStatus == 'Blocked' ? 'Desbloquear' : 'Bloquear'))
      }
    });
  }
  
  $(document).ready(function(){
   userType = $('#user-type').val();

   usersScroll();
 });
