<?php
  include_once('../../config/init.php');
  include_once($BASE_DIR .'database/users.php');
  include_once($BASE_DIR .'api/users/check_access.php');

  $body = file_get_contents('php://input');
  
  if(!isset($body)){
    echo json_encode(array('error' => 'Erro ao alterar o estado do utilizador.'));
    exit;
  }
  
  if(!moderator_access()){
    echo json_encode(array('error' => 'Erro ao alterar o estado do utilizador: Acesso negado.'));
    exit;   
  }
  
  $request = json_decode($body, true);
  
  if(!isset($request['user_id']) || !isset($request['new_status'])){
    echo json_encode(array('error' => 'Erro ao alterar o estado do utilizador.'));
    exit;
  }
  
  try {
    $newStatus = $request['new_status'];
    $status = getUserStatus($request['user_id']);
    
    switch ($status) {
      case 'Warned':      
        if($request['new_status']==='Warned'){
          $newStatus = "Blocked";
        }
        break;      
      default:
        break;
    }

    updateUserStatus($request['user_id'], $newStatus);
  } catch (Exception $e) {        
    echo json_encode(array('error' => 'Erro ao alterar o estado do utilizador.', 'detail' => $e->getMessage()));
    exit;
  }
    
  echo json_encode(array('success' => "O estado do utilizador foi alterado."));
?>