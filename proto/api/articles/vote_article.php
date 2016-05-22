<?php
  include_once('../../config/init.php');
  include_once($BASE_DIR .'database/articles.php');
  include_once($BASE_DIR .'api/users/check_access.php');

  $body = file_get_contents('php://input');
  
  if(!isset($body)){
  	$_SESSION['error_messages'][] = 'Erro desconhecido.';
    echo json_encode(array('error' => "Erro desconhecido."));
    exit;
  }
  
  $request = json_decode($body, true);
  
  if(!isset($request['article_id']) || !isset($request['user_id']) || !isset($request['type'])){
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
      $score = upvoteArticle($request['article_id'], $request['user_id']); 
   }else if($request['type'] == 'down'){
      $score = downvoteArticle($request['article_id'], $request['user_id']);
   }
   
  } catch (Exception $e) {    
    if(strpos($e->getMessage(), 'duplicate')){
      try{
        $action = 'delete';
        if($request['type'] == 'up'){
          $score = deleteUpvoteArticle($request['article_id'], $request['user_id']); 
        }else if($request['type'] == 'down'){
          $score = deleteDownvoteArticle($request['article_id'], $request['user_id']);
        }
      }catch (Exception $e) {
        echo json_encode(array('error' => 'Erro desconhecido.'));
        exit;
      } 
    }else{
      echo json_encode(array('error' => 'Erro desconhecido.'));
      exit;
    }
  }
    
  echo json_encode(array('success' => $score, 'action' => $action));
?>