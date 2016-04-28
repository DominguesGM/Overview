<?php
  include_once('../../config/init.php');
  include_once($BASE_DIR .'database/users.php');
  
  if($_SESSION['id']){
     header('Location: ' . $BASE_URL);
  }else{
    $smarty->display('users/register.tpl');
  }
?>
