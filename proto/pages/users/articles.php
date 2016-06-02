<?php
  include_once('../../config/init.php');
  include_once($BASE_DIR .'database/articles.php');
  include_once($BASE_DIR .'api/users/check_access.php');
 
  if(!isset($_SESSION['id'])) {
    $_SESSION['error_messages'][] = 'Acesso negado.';
    header("Location: $BASE_URL");
    exit;
  }
 
  $smarty->assign('articles', getArticlesByAuthor($_SESSION['id']));
  $smarty->assign('contributorAccess', contributor_access());
      
  $smarty->display('users/articles.tpl'); 
?>