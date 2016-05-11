<?php
  include_once('../../config/init.php');
  include_once($BASE_DIR .'database/articles.php');
  
  if($_SESSION['id']){
     header('Location: ' . $BASE_URL);
  }else{
    $smarty->display('articles/article.tpl');
  }
?>
