<?php
  include_once('../../config/init.php');
  include_once($BASE_DIR .'database/users.php');  

  if (!$_POST['email'] || !$_POST['password']) {
    $_SESSION['error_messages'][] = 'Invalid login';
    $_SESSION['form_values'] = $_POST;
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    exit;
  }

  $email = $_POST['email'];
  $password = $_POST['password'];
  
  $login = checkLogin($email, $password);
  
  if ($login !== false) {    
    if($login['status'] === 'Unverified'){
       $_SESSION['error_messages'][] = 'Login failed: unverified e-mail';    
    }else{    
      $_SESSION['id'] = $login['id'];
      $_SESSION['success_messages'][] = 'Login successful';
    }  
  } else {
    $_SESSION['error_messages'][] = 'Login failed: invalid credentials';  
  }
  
 header('Location: ' . $_SERVER['HTTP_REFERER']);
?>
