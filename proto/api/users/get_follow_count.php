<?php
  include_once('../../config/init.php');
  include_once($BASE_DIR .'database/users.php');

  if(!isset($_GET['user_id'])){
    echo json_encode(array('error' => 'Erro ao obter contagem: dados em falta.'));
    exit;
  }
    
  try {
    $count['nFollowers'] = getFollowersCount($_GET['user_id']);
    $count['nFollowees'] = getFollowingCount($_GET['user_id']);    
  } catch (Exception $e) {        
    echo json_encode(array('error' => 'Erro obter contagem.', 'detail' => $e->getMessage()));
    exit;
  }
    
  echo json_encode(array('success' => $count));
?>