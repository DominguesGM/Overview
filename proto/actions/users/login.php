<?php
  include_once('../../config/init.php');
  include_once($BASE_DIR . 'database/users.php');  

  if (!isset($_POST['email']) || !isset($_POST['password'])) {
    $_SESSION['error_messages'][] = 'A autenticação falhou.';
    $_SESSION['form_values'] = $_POST;
    header('Location: ' . $BASE_URL);
    exit;
  }

  $email = $_POST['email'];
  $password = $_POST['password'];
  
  $login = checkLogin($email, $password);
  
  if ($login !== false) {
    // TODO implement email verification    
    /*if($login['status'] === 'Unverified'){
       $_SESSION['error_messages'][] = 'Login failed: unverified e-mail';    
    }else{*/
      $_SESSION['id'] = $login['id'];
      $_SESSION['picture'] = $login['picture'];
      $_SESSION['email'] = $email;
      $_SESSION['status'] = $login['status'];
      $_SESSION['type'] = $login['type'];
      $_SESSION['first_name'] = $login['first_name'];
      $_SESSION['last_name'] = $login['last_name'];
   //}  
  } else {
    $_SESSION['error_messages'][] = 'Email ou password incorretos.';
    header('Location: ' . $BASE_URL . 'pages/users/authentication.php?email=' . $_POST['email']);
    exit;  
  }
 
 header('Location:'.$_SERVER['HTTP_REFERER']);
?>
