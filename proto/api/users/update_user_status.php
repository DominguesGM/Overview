<?php
  include_once('../../config/init.php');
  include_once($BASE_DIR .'database/reports.php');
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
  
  if(!isset($request['user_id'])){
    echo json_encode(array('error' => 'Erro ao alterar o estado do utilizador.'));
    exit;
  }
  
  try {
    setReportReviewed($request['report_id']);
  } catch (Exception $e) {        
    echo json_encode(array('error' => 'Erro ao rever o item.', 'detail' => $e->getMessage()));
    exit;
  }
    
  echo json_encode(array('success' => "Item revisto."));
?>