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
      $_SESSION['email'] = $email;
      $_SESSION['status'] = $login['status'];
      $_SESSION['type'] = $login['type'];
      $_SESSION['first_name'] = $login['first_name'];
      $_SESSION['last_name'] = $login['last_name'];
      $_SESSION['success_messages'][] = 'Login successful';
      
      var_dump($_SESSION);
    }  
  } else {
    $_SESSION['error_messages'][] = 'Login failed: invalid credentials';  
  }
  
 header('Location: ' . $BASE_URL);
?>
