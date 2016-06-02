<?php
  include_once('../../config/init.php');
  include_once($BASE_DIR .'database/notifications.php');
  include_once($BASE_DIR .'api/users/check_access.php');

  if(!isset($_SESSION['id'])){
    echo json_encode(array('error' => 'Erro ao obter notificações: Acesso negado.'));
    exit;
  }
  
  if(!isset($_GET['offset']) || !isset($_GET['limit'])){
    echo json_encode(array('error' => 'Erro ao obter notificações.'));
    exit;
  }
  
  try{      
       $result['notifications'] = getNotifications($_SESSION['id'], NULL, $_GET['limit'], $_GET['offset']);
       $result['notificationCount'] = getNotificationCount($_SESSION['id']); 
  } catch (Exception $e) {        
    echo json_encode(array('error' => 'Erro ao obter notifications.', 'detail' => $e->getMessage()));
    exit;
  }
    
  echo json_encode(array('success' => $result));
?>