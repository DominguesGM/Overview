<?php
  include_once('../../config/init.php');
  include_once($BASE_DIR .'database/notifications.php');
  include_once($BASE_DIR .'api/users/check_access.php');

  $body = file_get_contents('php://input');
  
  if(!isset($body)){
    echo json_encode(array('error' => 'Erro ao enviar notificação.'));
    exit;
  }
  
  if(!moderator_access()){
    echo json_encode(array('error' => 'Erro ao enviar notificação: Acesso negado.'));
    exit;   
  }
  
  $request = json_decode($body, true);
  
  if(!isset($request['sender']) || !isset($request['receiver']) || !isset($request['message'])){
    echo json_encode(array('error' => 'Erro ao enviar notificação.'));
    exit;
  }
  
  try {
    createNotification($request['sender'], $request['receiver'], $request['message']);
  } catch (Exception $e) {        
    echo json_encode(array('error' => 'Erro ao enviar notificação.', 'detail' => $e->getMessage()));
    exit;
  }
    
  echo json_encode(array('success' => 'Notificação enviada.'));
?>