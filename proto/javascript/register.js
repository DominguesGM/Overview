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

$(document).ready(function(e){
	
});
