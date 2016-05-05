<?php
  include_once('../../config/init.php');
  include_once($BASE_DIR .'database/users.php');  

  if (!isset($_GET['token']) || !isset($_GET['email'])) {
    $_SESSION['error_messages'][] = 'Validation failed';
    $_SESSION['form_values'] = $_GET;
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    exit;
  }
 
  $result = validateEmail($_GET['email'], $_GET['token']);
  
  if ($result !== false) {    
     $_SESSION['success_messages'][] = 'Validation successful'; 
  } else {
    $_SESSION['error_messages'][] = 'Validation failed';  
  }
   
 header('Location: ' . $BASE_URL);
?>
