<?php
  include_once('../../config/init.php');
  include_once($BASE_DIR .'database/articles.php');  

  if (!$_POST['id']) {
    $_SESSION['error_messages'][] = 'Erro desconhecido.';
    $_SESSION['form_values'] = $_POST;
    header("Location: $BASE_URL");
    exit;
  }

  try {
   $articleImages = getArticleImages($_POST['id']);
   deleteArticle($_POST['id']);
    
   foreach ($articleImages as $image) {
    unlink($BASE_DIR . $image['path']);
   }
   
   print 'done';
  } catch (Exception $e) {
    print $e->getMessage();
    
    $_SESSION['error_messages'][] = 'Erro ao eliminar o artigo.';
    $_SESSION['form_values'] = $_POST;
    header("Location: $BASE_URL" . 'pages/articles/view_article.php?id=' . $_POST['id']);
    exit;
  }
  
  $_SESSION['success_messages'][] = 'Artigo eliminado.';  
  header("Location: $BASE_URL"); // TODO change redirects??
?>