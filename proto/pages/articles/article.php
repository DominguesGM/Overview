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
  $article['category'] = getArticleCategory($article['id']);
  $article['vote'] = getArticleVote($article['id'], $_SESSION['id']);
  $article['report'] = getArticleReport($article['id'], $_SESSION['id']);
  
  $articleImages = getArticleImages($_GET['id']);
  $articleComments = getArticleComments($_GET['id'], 10, 0, $_SESSION['id']);
  $relatedArticles = searchArticle('', 0, 4, $article['category']['name']);
  
  $smarty->assign('article', $article);
  $smarty->assign('articleImages', $articleImages);
  $smarty->assign('articleComments', $articleComments);
  $smarty->assign('relatedArticles', $relatedArticles);
  $smarty->assign('editPermission', edition_access($article['id']));
  $smarty->assign('contributorAccess', contributor_access());
      
  $smarty->display('articles/view_article.tpl'); 
?>