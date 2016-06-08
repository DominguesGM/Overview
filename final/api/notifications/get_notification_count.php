<?php
  include_once('../../config/init.php');
  include_once($BASE_DIR .'database/notifications.php');
  include_once($BASE_DIR .'api/users/check_access.php');
  
  if(!contributor_access()){
    echo json_encode(array('error' => 'Erro ao obter contagem: Acesso negado.'));
    exit;   
  }
    
  try {
    $count = getNotificationCount($_SESSION['id']);
  } catch (Exception $e) {        
    echo json_encode(array('error' => 'Erro ao obter contagem.', 'detail' => $e->getMessage()));
    exit;
  }
    
  echo json_encode(array('success' => $count));
?>