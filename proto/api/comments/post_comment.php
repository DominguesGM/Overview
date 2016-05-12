<?php
  include_once('../../config/init.php');
  include_once($BASE_DIR .'database/comments.php');
  include_once($BASE_DIR .'api/users/check_access.php');

  $body = file_get_contents('php://input');
  
  if(!isset($body)){
  	$_SESSION['error_messages'][] = 'Erro desconhecido.';
    echo json_encode(array('error' => "Erro desconhecido."));
    exit;
  }
  
  $request = json_decode($body, true);
  
  if(!isset($request['article_id']) || !isset($request['user_id']) || !isset($request['content'])){
    echo json_encode(array('error' => "Erro desconhecido."));
    exit;
  }

  if(!contributor_access()){
    echo json_encode(array('error' => "Acesso negado."));
    exit;   
  }
  
  try {
    $result = createComment($request['user_id'], $request['article_id'], $request['content']);
    $result['success'] = "Comentário publicado.";
  } catch (Exception $e) {
    print $e->getMessage();
      
    echo json_encode(array('error' => "Erro desconhecido."));
    exit;
  }
    
  echo json_encode($result);
?>