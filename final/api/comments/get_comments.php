<?php
  include_once('../../config/init.php');
  include_once($BASE_DIR .'database/comments.php');
  include_once($BASE_DIR .'api/users/check_access.php');
  
  if(!isset($_GET['article_id']) || !isset($_GET['offset']) || !isset($_GET['limit'])){
    echo json_encode(array('error' => 'Erro desconhecido.'));
    exit;
  }
  
  if(contributor_access()){
    $userId = $_SESSION['id'];
  }
 
  try {
    $result['comments'] = getArticleComments($_GET['article_id'], $_GET['limit'], $_GET['offset'], $userId);
    $result['nComments'] = count($result['comments']); 
  } catch (Exception $e) {
    print $e->getMessage();
    echo json_encode(array('error' => $e->getMessage()));
    exit;
  }
    
  echo json_encode($result);
?>