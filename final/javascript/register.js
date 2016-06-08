 /**
   * Alerts management.
   */
   function warn(message){
    $("#signup-alert").html("<div \" class=\"alert alert-danger\"><a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">\&times;</a>"
      + message + "</div>");

    window.scrollTo(0, 0);
    return false;
  }

 /**
   * Registration validation.
   */
   function checkRegisterForm(){
    var password = $("#signupform [name='password']").val();

    if(password == '' || !(/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/.test(password))){
      return warn("A password deve conter pelo menos uma letra e um número e no mínimo 8 caracteres.");
    }

    if(password != $("#signupform [name='password_conf']").val()){
      return warn("As passwords introduzidas não são iguais.");
    }	

    if(!document.getElementById('terms').checked){
      return warn("Antes de efetuar o registo deve aceitar os Termos de Uso.");
    }

    return true;
  }

  $(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip(); 
  });