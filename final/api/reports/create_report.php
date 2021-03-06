<?php
  include_once('../../config/init.php');
  include_once($BASE_DIR .'database/reports.php');
  include_once($BASE_DIR .'api/users/check_access.php');

  $body = file_get_contents('php://input');
  
  if(!isset($body)){
    echo json_encode(array('error' => 'Erro ao reportar o item.'));
    exit;
  }
  
  if(!contributor_access()){
    echo json_encode(array('error' => 'Erro ao reportar o item: Acesso negado.'));
    exit;   
  }
  
  $request = json_decode($body, true);
  
  if(!isset($request['user_id']) || (!isset($request['article_id']) && !isset($request['comment_id'])) || !isset($request['description'])){
    echo json_encode(array('error' => 'Erro ao reportar o item.'));
    exit;
  }
  
  try {
    createReport($request['user_id'], $request['article_id'], $request['comment_id'], $request['description']);
  } catch (Exception $e) {        
    echo json_encode(array('error' => 'Erro ao reportar o item.', 'detail' => $e->getMessage()));
    exit;
  }
    
  echo json_encode(array('success' => "Item reportado."));
?>