<?php
  include_once('../../config/init.php');
  include_once($BASE_DIR .'database/articles.php');
  include_once($BASE_DIR .'api/users/check_access.php');
 
  if(!isset($_GET['id'])) {
    $_SESSION['error_messages'][] = 'Artigo não encontrado.';
    header("Location: $BASE_URL");
  }
 
  $article = getArticleById($_GET['id']);
  
  if(!isset($article)) {
    $_SESSION['error_messages'][] = 'Artigo não encontrado.';
    header("Location: $BASE_URL");
  }
  
  $article['author_picture'] = getImagePath($article['picture']);
  $article['category'] = getArticleCategory($article['id'])['category_id'];
  $articleCategories = getArticleCategories();
  $articleImages = getArticleImages($_GET['id']);
  
  if($_SESSION['id'] === $article['author']
     || moderator_access()){
    $smarty->assign('article', $article);
    $smarty->assign('articleCategories', $articleCategories);
    $smarty->assign('articleImages', $articleImages);   
    $smarty->display('articles/edit_article.tpl');
  }else{
    $_SESSION['error_messages'][] = 'Acesso negado.';
    header("Location: $BASE_URL");
  }
  
?>