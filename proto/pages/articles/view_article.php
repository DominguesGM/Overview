<?php
  include_once('../../config/init.php');
  include_once($BASE_DIR .'database/articles.php');
  include_once($BASE_DIR .'database/comments.php');
  include_once($BASE_DIR .'api/users/check_access.php');
 
  if(!isset($_GET['id'])) {
    $_SESSION['error_messages'][] = 'Artigo não encontrado.';
    exit;
  }
 
  $article = getArticleById($_GET['id']);
  
  if(!$article) {
    $_SESSION['error_messages'][] = 'Artigo não encontrado.';
    exit;
  }
  
  $article['id'] = $_GET['id'];
  $article['author_picture'] = getImagePath($article['picture']);
  $article['category'] = getArticleCategory($article['id']);
  $article['vote'] = getArticleVote($article['id'], $_SESSION['id']);
  $article['report'] = getArticleReport($article['id'], $_SESSION['id']);
  
  $articleImages = getArticleImages($_GET['id']);
  $articleComments = getArticleComments($_GET['id'], 'ALL', 0, $_SESSION['id']);
  
  $smarty->assign('article', $article);
  $smarty->assign('articleImages', $articleImages);
  $smarty->assign('articleComments', $articleComments);
  $smarty->assign('editPermission', edition_access($article['id']));
  $smarty->assign('contributorAccess', contributor_access());
      
  $smarty->display('articles/article.tpl'); 
?>