<?php
  include_once('../../config/init.php');
  include_once($BASE_DIR .'database/comments.php');
  include_once($BASE_DIR .'api/users/check_access.php');

  $body = file_get_contents('php://input');
  
  if(!isset($body)){
  	$_SESSION['error_messages'][] = 'Erro desconhecido.';
    echo json_encode(array('error' => "Erro desconhecido."));
    exit;
  }
  
  $request = json_decode($body, true);
  
  if(!isset($request['comment_id']) || !isset($request['user_id']) || !isset($request['type'])){
    echo json_encode(array('error' => "Erro desconhecido."));
    exit;
  }

  if(!contributor_access()){
    echo json_encode(array('error' => "Acesso negado."));
    exit;   
  }
  
  try {
   $action = 'new';
    
   if($request['type'] == 'up'){
    $score = upvoteComment($request['comment_id'], $request['user_id']); 
   }else if($request['type'] == 'down'){
    $score = downvoteComment($request['comment_id'], $request['user_id']);
   }else{
     echo json_encode(array('error' => 'Erro desconhecido'));
     exit;
   }
   
  } catch (Exception $e) {    
    if(strpos($e->getMessage(), 'duplicate')){
      try{
        $action = 'delete';
        
        if($request['type'] == 'up'){
          $score = deleteUpvoteComment($request['comment_id'], $request['user_id']); 
        }else if($request['type'] == 'down'){
          $score = deleteDownvoteComment($request['comment_id'], $request['user_id']);
        }  
      } catch (Exception $e) {
        echo json_encode(array('error' => 'Erro desconhecido.', 'detail' => $e->getMessage()));
        exit;
      }
    }else{ 
      echo json_encode(array('error' => 'Erro desconhecido', 'detail' => $e->getMessage()));
      exit;
    }
  }
    
  echo json_encode(array('success' => $score, 'action' => $action));
?>