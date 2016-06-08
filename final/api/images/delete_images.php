<?php
  include_once('../../config/init.php');
  include_once($BASE_DIR .'database/images.php');
  include_once($BASE_DIR .'api/users/check_access.php');
  
  /*if(!contributor_access()){
    $_SESSION['error_messages'][] = 'Erro ao eliminar imagens: Acesso negado.';
    $_SESSION['form_values'] = $_POST;
    echo json_encode(array('error' => "Erro ao eliminar imagens: Acesso negado."));
    exit;   
  }*/
  
  $body = file_get_contents('php://input');
  
  if(!isset($body)){
  	$_SESSION['error_messages'][] = 'Erro desconhecido.';
    $_SESSION['form_values'] = $_POST;
    echo json_encode(array('error' => "Erro desconhecido."));
    exit;
  }
  
  try{
    $request = json_decode($body, true);
    $imageList = $request['images'];
     
    foreach ($imageList as $image) {
        $path = deleteImage($image['id']);        
        try{
          unlink($BASE_DIR . $path);
        }catch(Exception $e1){
          continue;
        }   
    }  
  }catch(Exception $e2){
    $_SESSION['error_messages'][] = 'Erro desconhecido.';
    $_SESSION['form_values'] = $_POST;
    echo json_encode(array('error' => $e2->getMessage()));
    exit;
  }

  echo json_encode(array('success' => "Imagens eliminadas."));
?>