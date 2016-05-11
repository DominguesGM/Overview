function checkRegisterForm(){
	if($("#signupform [name='password']").val()
		!= $("#signupform [name='password_conf']").val()){

		$("#signupform #signupalert").find('span').html("As passwords introduzidas não são iguais.");
		$("#signupform #signupalert").toggle(true);
		window.scrollTo(0, 0);
		return false; 
	}	

	if(!document.getElementById('terms').checked){
		$("#signupform #signupalert").find('span').html("Antes de efetuar o registo deve aceitar os Termos de Uso.");
		$("#signupform #signupalert").toggle(true);
		window.scrollTo(0, 0);
		return false; 
	}

	return true;
};



function register(){

  // get the form info
  var values = getFormInfo();

  if(values['type'] != "" && values['nameTag'] && values['description'] != "" && values['city'] != "" && values['time'] != ""){
    var currentDate = new Date();
    var eventDate = new Date(values['time']);
    if(currentDate < eventDate){
      $.ajax({
        type: "post",
        url: "database/action_new_event.php",
        datatype: "json",
        data: JSON.stringify(values)
      }).done(function(html){
        console.log(html);
        var json = JSON.parse(html);
        if("success" in json){
          $("[name=id]").val(json['success']);
          document.new_event.submit();
          //window.location.replace("./?event="+json['success']);
      	}
      });
    } else {
      alert("Please check the date...");
    }
  }
  // verify contents integrity
  // send ajax to action_register.php
  // checks json input. check if success is set, or error is set
  // redirect to index, with the cookie set in case of success
}
