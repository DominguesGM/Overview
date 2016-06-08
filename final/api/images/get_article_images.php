<?php
  include_once('../../config/init.php');
  include_once($BASE_DIR .'database/articles.php');
  include_once($BASE_DIR .'api/check_access.php');
  
  if(!contribitor_access()){
    $_SESSION['error_messages'][] = 'Request denied.';
    echo json_encode(array('error' => "Acesso negado."));
    exit;   
  }
  
  $body = file_get_contents('php://input');
  
  if(!isset($body)){
  	$_SESSION['error_messages'][] = 'All fields are mandatory';
    echo json_encode(array('error' => "Erro desconhecido."));
    exit;
  }
  
  $request = json_decode($body, true);
  
  $images = getArticleImages($request['id']);

  echo json_encode(array('success' => $images));
?>