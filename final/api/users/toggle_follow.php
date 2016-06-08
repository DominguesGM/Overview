<?php
  include_once('../../config/init.php');
  include_once($BASE_DIR .'database/users.php');

  $body = file_get_contents('php://input');
  
  if(!isset($body)){
    echo json_encode(array('error' => 'Erro ao começar ou parar de seguir utilizador: faltam dados.'));
    exit;
  }
  
  $request = json_decode($body, true);
  
  if(!isset($request['follower']) || !isset($request['followee']) || !isset($request['follow'])){
    echo json_encode(array('error' => 'Erro ao começar ou parar de seguir utilizador: faltam dados.'));
    exit;
  }
    
  if(!isset($_SESSION['id']) || ($request['follower'] != $_SESSION['id'] && $request['followee']!= $_SESSION['id'])){
    echo json_encode(array('error' => 'Erro ao começar ou parar de seguir utilizador: Acesso negado.'));
    exit;   
  }
  
  
  try {
    if($request['follow']){
      follow($request['follower'], $request['followee']);
    }else{
      unfollow($request['follower'], $request['followee']);
    }    
        
  } catch (Exception $e) {        
    echo json_encode(array('error' => 'Erro ao começar ou parar de seguir utilizador.', 'detail' => $e->getMessage()));
    exit;
  }
    
  echo json_encode(array('success' => ($request['follow'] ? "Seguiu" : "Deixou de seguir") . " o utilizador."));
?>