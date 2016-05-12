<?php
  include_once('../../config/init.php');
  include_once($BASE_DIR .'database/articles.php');
  include_once($BASE_DIR .'api/users/check_access.php');
  
  if(!contributor_access()){
     $_SESSION['error_messages'][] = 'Acesso negado.';
     header("Location: $BASE_URL");
     exit;
  }
  
  $smarty->display('articles/create_article.tpl');
?>