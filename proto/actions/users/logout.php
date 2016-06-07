<?php
  include_once('../../config/init.php');
  
  unset($_SESSION['id']);
  unset($_SESSION['email']);
  unset($_SESSION['picture']);
  unset($_SESSION['status']);
  unset($_SESSION['type']);
  unset($_SESSION['first_name']);
  unset($_SESSION['last_name']);
  
  session_destroy();
  
  header('Location:'.$BASE_URL);
?>
