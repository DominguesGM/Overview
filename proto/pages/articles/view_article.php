<?php
  include_once('../../config/init.php');
  include_once($BASE_DIR .'database/articles.php');
  include_once($BASE_DIR .'database/comments.php');
  include_once($BASE_DIR .'api/users/check_access.php');
 
  if(!isset($_GET['id'])) {
    $_SESSION['error_messages'][] = 'Artigo não encontrado.';
    header("Location: $BASE_URL");
    exit;
  }
 
  $article = getArticleById($_GET['id']);
  
  if(!$article) {
    $_SESSION['error_messages'][] = 'Artigo não encontrado.';
    header("Location: $BASE_URL");
    exit;
  }
  
  $article['id'] = $_GET['id'];
  $article['author_picture'] = getImagePath($article['picture']);
  $article['category'] = getArticleCategory($article['id'])['category_id'];
  $article['vote'] = getArticleVote($article['id'], $_SESSION['id']); 
  
  $articleImages = getArticleImages($_GET['id']);
  $articleComments = getArticleComments($_GET['id'], 10);
  $article['nComments'] = getArticleCommentsCount($_GET['id']);
  
  $smarty->assign('article', $article);
  $smarty->assign('articleImages', $articleImages);
  $smarty->assign('articleComments', $articleComments);
  $smarty->assign('editPermission', edition_access($article['id']));
      
  $smarty->display('articles/view_article.tpl'); 
?>