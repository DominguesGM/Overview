var userId;

function updateFollowCount(followee){
	console.log(followee);
  $.ajax({
    type: "get",
    url: "../../api/users/get_follow_count.php",
    datatype: "json",
    data: {'user_id': followee}
  }).done(function(html){
    var json = JSON.parse(html);
    console.log(html);
    if("success" in json){
    	console.log('success');
        $('#nFollowers').text(json['success']['nFollowers']);
        $('#nFollowees').text(json['success']['nFollowees']);
    }
  });
}

function toggleFollowStatus(followee){
  console.log('follow toggle');

  var startFollowing = $('#follow-button span').hasClass('glyphicon-plus');

  $.ajax({
    type: "post",
    url: "../../api/users/toggle_follow.php",
    datatype: "json",
    data: JSON.stringify({'follower': userId, 'followee': followee, 'follow': startFollowing})
  }).done(function(htmlResponse){
    var json = JSON.parse(htmlResponse);

    if("success" in json){
      var span = $('#follow-button span');
      span.toggleClass('glyphicon-plus');
      span.toggleClass('glyphicon-minus');
      $('#follow-button').html((startFollowing? ' Não seguir' : ' Seguir'));
      $('#follow-button').prepend(span);
      updateFollowCount(followee);
    }
  });
}

function editAccount(){
	window.location.replace(BASE_URL + 'pages/users/edit_profile.php');
}

$(document).ready(function(){
  userId = $('#user-id').val();

   $('#wall').slimScroll({
    height: '80vh',
    allowPageScroll: true
  });
  
});