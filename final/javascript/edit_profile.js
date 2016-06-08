var userId;

 /**
   * Alerts management.
   */
   function warn(message){
    $("#profile-alert").html("<div \" class=\"alert alert-danger\"><a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">\&times;</a>"
      + message + "</div>");

    window.scrollTo(0, 0);
    return false;
  }

 /**
   * Registration validation.
   */
   function checkProfileForm(){
    var password = $("#profileform [name='password']").val();

    if(password == '' || !(/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/.test(password))){
      return warn("A password deve conter pelo menos uma letra e um número e no mínimo 8 caracteres.");
    }

    if(password != $("#profileform [name='password_conf']").val()){
      return warn("As passwords introduzidas não são iguais.");
    }

    return true;
  }


function discard(){
	window.location.replace(BASE_URL + 'pages/users/profile.php?id=' + userId);
}

function deactivateAccount(){
	bootbox.confirm({
      message:"<strong>Tem a certeza que pretende desativar a sua conta?</strong><br>Se proceder com a desativação, as suas credenciais deixarão de ser válidas.", 
      locale: "pt",
      callback: function(result){
        if(result){
          deactivationConfirmed();
        }
      }
    });
}

function deactivationConfirmed(){

$.ajax({
      type: "post",
      url: "../../api/users/update_user_status.php",
      datatype: "json",
      data: JSON.stringify({'new_status': 'Inactive', 'user_id': userId})
    }).done(function(html){
      var json = JSON.parse(html);

      console.log(html);
      if("success" in json){
     	 window.location.replace(BASE_URL + 'actions/users/logout.php');
      }
    });
}

$(document).ready(function(){
  userId = $('#user-id').val();

  $('[data-toggle="tooltip"]').tooltip();   
});