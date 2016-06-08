<?php
  include_once('../../config/init.php');
  include_once($BASE_DIR .'database/articles.php');
  include_once($BASE_DIR .'api/users/check_access.php');

  $body = file_get_contents('php://input');
  
  if(!isset($body)){
  	$_SESSION['error_messages'][] = 'Erro desconhecido.';
    echo json_encode(array('error' => "Erro desconhecido."));
    exit;
  }
  
  $request = json_decode($body, true);
  
  if(!isset($request['id'])){
    echo json_encode(array('error' => "Erro desconhecido."));
    exit;
  }

  if(!contributor_access()){
    echo json_encode(array('error' => "Acesso negado."));
    exit;   
  }
  
  try {
   $articleImages = getArticleImages($request['id']);
   deleteArticle($request['id']);
    
   foreach ($articleImages as $image) {
    unlink($BASE_DIR . $image['path']);
   }
   
  } catch (Exception $e) {
    print $e->getMessage();
        
    echo json_encode(array('error' => 'Erro ao eliminar o artigo.'));
    exit;
  }
  
  $_SESSION['success_messages'][] = 'Artigo eliminado.';  
  echo json_encode(array('success' => 'Artigo eliminado.'));
?>