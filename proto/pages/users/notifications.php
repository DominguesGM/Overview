<?php
  include_once('../../config/init.php');
  include_once($BASE_DIR .'database/notifications.php');
  include_once($BASE_DIR .'api/users/check_access.php');
  
  if(!contributor_access()) {
    $_SESSION['error_messages'][] = 'Acesso negado.';
    header("Location: $BASE_URL");
    exit;
  }
     
  $smarty->assign('notifications', getNotifications($_SESSION['id'], NULL, 5, 0));
  $smarty->assign('nNotifications', getNotificationCount($_SESSION['id']));
      
  $smarty->display('users/notifications.tpl'); 
?>