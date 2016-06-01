<?php
  include_once('../../config/init.php');
  include_once($BASE_DIR .'database/reports.php');
  include_once($BASE_DIR .'api/users/check_access.php');

  if(!moderator_access()){
    echo json_encode(array('error' => 'Erro ao obter itens: Acesso negado.'));
    exit;   
  }
  
  if(!isset($_GET['type']) || !isset($_GET['offset']) || !isset($_GET['limit'])){
    echo json_encode(array('error' => 'Erro ao obter itens2.'));
    exit;
  }
  
  try{    
    if($_GET['type']==='article'){
       $result['reports'] = getArticleReports(false, $_GET['limit'], $_GET['offset']);
    }else if($_GET['type']==='comment'){
       $result['reports'] = getCommentReports(false, $_GET['limit'], $_GET['offset']);
    } 
  } catch (Exception $e) {        
    echo json_encode(array('error' => 'Erro ao obter itens.', 'detail' => $e->getMessage()));
    exit;
  }
    
  echo json_encode(array('success' => $result));
?>