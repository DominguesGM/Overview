<?php
  include_once('../../config/init.php');
  include_once($BASE_DIR .'database/users.php');
  include_once($BASE_DIR .'api/users/check_access.php');
  
  if(!moderator_access()) {
    $_SESSION['error_messages'][] = 'Acesso negado.';
    header("Location: $BASE_URL");
    exit;
  }
     
  $smarty->assign('contributors', getUsersByType('Contributor', 15, 0));
  $smarty->assign('moderatorAccess', moderator_access());
  $smarty->assign('administratorAccess', administrator_access());
      
  $smarty->display('users/contributors.tpl'); 
?>