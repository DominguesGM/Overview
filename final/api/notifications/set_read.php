<?php
  include_once('../../config/init.php');
  include_once($BASE_DIR .'database/notifications.php');
  include_once($BASE_DIR .'api/users/check_access.php');

  $body = file_get_contents('php://input');
  
  if(!isset($body)){
    echo json_encode(array('error' => 'Erro ao marcar notificação.'));
    exit;
  }
  
  if(!contributor_access()){
    echo json_encode(array('error' => 'Erro ao marcar notificação: Acesso negado.'));
    exit;   
  }
  
  $request = json_decode($body, true);
  
  if(!isset($request['id']) || !isset($request['is_read'])){
    echo json_encode(array('error' => 'Erro ao marcar notificação.'));
    exit;
  } 
  
  try {
    setNotificationRead($request['id'], $request['is_read']);
  } catch (Exception $e) {        
    echo json_encode(array('error' => 'Erro ao marcar notificação.', 'detail' => $e->getMessage()));
    exit;
  }
    
  echo json_encode(array('success' => 'Notificação marcada.'));
?>