<?php
  include_once('../../config/init.php');
  include_once($BASE_DIR .'database/users.php');
  include_once($BASE_DIR .'api/users/check_access.php');

  $body = file_get_contents('php://input');
  
  if(!isset($body)){
    echo json_encode(array('error' => 'Erro ao alterar o tipo do utilizador.'));
    exit;
  }
  
  if(!administrator_access()){
    echo json_encode(array('error' => 'Erro ao alterar o tipo do utilizador: Acesso negado.'));
    exit;   
  }
  
  $request = json_decode($body, true);
  
  if(!isset($request['user_id']) || !isset($request['new_type'])){
    echo json_encode(array('error' => 'Erro ao alterar o tipo do utilizador.'));
    exit;
  }
  
  try {
    updateUserType($request['user_id'], $request['new_type']);
  } catch (Exception $e) {        
    echo json_encode(array('error' => 'Erro ao alterar o tipo do utilizador.', 'detail' => $e->getMessage()));
    exit;
  }
    
  echo json_encode(array('success' => "O tipo do utilizador foi alterado."));
?>