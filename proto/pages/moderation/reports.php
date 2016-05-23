<?php
  include_once('../../config/init.php');
  include_once($BASE_DIR .'database/reports.php');
  include_once($BASE_DIR .'api/users/check_access.php');
  
  if(!moderator_access()) {
    $_SESSION['error_messages'][] = 'Acesso negado.';
    header("Location: $BASE_URL");
    exit;
  }
  
  $reports = getReports();
  
  $smarty->assign('reports', $reports);
      
  $smarty->display('moderation/reports.tpl'); 
?>