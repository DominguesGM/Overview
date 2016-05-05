<?php
  include_once('../../config/init.php');
  include_once($BASE_DIR .'database/articles.php');

  $categories = getArticleCategories();  

  echo json_encode($categories);
?>