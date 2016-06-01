<?php
  include_once('../../config/init.php');
  include_once($BASE_DIR .'database/articles.php');  

  if (!$_POST['title'] || !$_POST['summary'] || !$_POST['content'] || !$_POST['category']) {
    $_SESSION['error_messages'][] = 'Todos os campos são de preenchimento obrigatório.';
    $_SESSION['form_values'] = $_POST;
    header("Location: $BASE_URL" . 'pages/articles/create_article.php');
    exit;
  }

  $title = strip_tags($_POST['title']);
  $images = $_FILES['images-upload'];
  $imageTypes = array();

  foreach ($images['name'] as $filename) {    
    $imageTypes[] = strtolower(end(explode(".", $filename)));
  }
  
  try {
   $articleId = createArticle($_SESSION['id'], $title, $_POST['category'], $_POST['summary'], $_POST['content'], $imageTypes);
    
   for($i = 0; $i < count($imageTypes); $i++) {
    move_uploaded_file($images["tmp_name"][$i], $BASE_DIR . 'images/articles/article_'. $articleId . '-' . $i . '.' . $imageTypes[$i]);
    chmod($BASE_DIR . 'images/articles/article_'. $articleId . '-' . $i . '.' . $imageTypes[$i], 0644);
   }
  } catch (Exception $e) {
    print $e->getMessage();
    $_SESSION['error_messages'][] = 'Ocorreu um erro ao guardar o artigo.';
    $_SESSION['form_values'] = $_POST;
    //header("Location: $BASE_URL" . 'pages/articles/create_article.php');
    exit;
  }
  
  $_SESSION['success_messages'][] = 'Artigo publicado.'; 
  header("Location: $BASE_URL" . "pages/articles/article.php?id=$articleId");
?>
