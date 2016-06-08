<?php
  include_once('../../config/init.php');
  include_once($BASE_DIR .'database/users.php');
  include_once($BASE_DIR .'api/users/check_access.php');
    
  if(!isset($_SESSION['id'])) {
    $_SESSION['error_messages'][] = 'Acesso negado: Autenticação necessária.';
    header("Location: $BASE_URL");
    exit;
  }
  
  $user = getUserById($_SESSION['id']);
  
  if(!isset($user)) {
    $_SESSION['error_messages'][] = 'O utilizador que procura não existe.';
    header("Location: $BASE_URL");
    exit;
  }
  
  $smarty->assign('user', $user);      
  $smarty->display('users/edit_profile.tpl'); 
?>