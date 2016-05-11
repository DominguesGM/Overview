<?php
  include_once('../../config/init.php');
  include_once($BASE_DIR .'database/articles.php');
  include_once($BASE_DIR .'database/comments.php');
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
  $articleImages = getArticleImages($_GET['id']);
  $articleComments = getArticleComments($_GET['id'], 10);
  $article['nComments'] = getArticleCommentsCount($_GET['id']);
  
  $smarty->assign('article', $article);
  $smarty->assign('articleImages', $articleImages);
  $smarty->assign('articleComments', $articleComments);
  $smarty->assign('editPermission', ($_SESSION['id'] === $article['author'] || moderator_access()));
      
  $smarty->display('articles/view_article.tpl'); 
?>