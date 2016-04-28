<?php
  include_once('../../config/init.php');
  
  // TODO add others?
  unset($_SESSION['ID']);
  session_destroy();
  
  header('Location: ' . $BASE_URL);
?>
