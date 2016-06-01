<?php
  include_once('../../config/init.php');
  include_once($BASE_DIR .'database/reports.php');
  include_once($BASE_DIR .'api/users/check_access.php');

  $body = file_get_contents('php://input');
  
  if(!isset($body)){
    echo json_encode(array('error' => 'Erro ao obter contagem.'));
    exit;
  }
  
  if(!contributor_access()){
    echo json_encode(array('error' => 'Erro ao obter contagem: Acesso negado.'));
    exit;   
  }
    
  try {
    $count = getReportCount();
  } catch (Exception $e) {        
    echo json_encode(array('error' => 'Erro obter contagem.', 'detail' => $e->getMessage()));
    exit;
  }
    
  echo json_encode(array('success' => $count));
?>