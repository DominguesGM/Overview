<?php
  include_once('../../config/init.php');
  include_once($BASE_DIR .'database/users.php');
    
  if(isset($_SESSION['id'])){
     header('Location: ' . $BASE_URL);
  }else{
    $smarty->assign('email', $_GET['email']);
    $smarty->display('users/register.tpl');
  }
?>
