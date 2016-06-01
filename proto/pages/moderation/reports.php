<?php
  include_once('../../config/init.php');
  include_once($BASE_DIR .'database/reports.php');
  include_once($BASE_DIR .'api/users/check_access.php');
  
  if(!moderator_access()) {
    $_SESSION['error_messages'][] = 'Acesso negado.';
    header("Location: $BASE_URL");
    exit;
  }
     
  $smarty->assign('articleReports', getArticleReports(false, 5, 0));
  $smarty->assign('commentReports', getCommentReports(false, 5, 0));
  $smarty->assign('nReports', getReportCount());
      
  $smarty->display('moderation/reports.tpl'); 
?>