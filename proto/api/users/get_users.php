<?php
  include_once('../../config/init.php');
  include_once($BASE_DIR .'database/users.php');
  include_once($BASE_DIR .'api/users/check_access.php');

  if(!moderator_access()){
    echo json_encode(array('error' => 'Erro ao obter utilizadores: Acesso negado.'));
    exit;   
  }
  
  if(!isset($_GET['type']) || !isset($_GET['offset']) || !isset($_GET['limit'])){
    echo json_encode(array('error' => 'Erro ao obter utilizadores.'));
    exit;
  }
  
  try{
       $result['users'] = getUsersByType($_GET['type'], $_GET['limit'], $_GET['offset']);   
  } catch (Exception $e) {        
    echo json_encode(array('error' => 'Erro ao obter utilizadores.', 'detail' => $e->getMessage()));
    exit;
  }
    
  echo json_encode(array('success' => $result));
?>