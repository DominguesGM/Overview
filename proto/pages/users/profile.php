<?php
  include_once('../../config/init.php');
  include_once($BASE_DIR .'database/users.php');
  include_once($BASE_DIR .'database/articles.php');
  include_once($BASE_DIR .'database/articles_users.php');
  include_once($BASE_DIR .'api/users/check_access.php');
  
  $userId = $_GET['id'];
  
  if(!isset($userId)) {
    $userId = $_SESSION['id'];
  }
  
  if(!isset($userId)) {
    $_SESSION['error_messages'][] = 'Acesso negado.';
    header("Location: $BASE_URL");
    exit;
  }
  
  $user = getUserById($userId);
  
  switch ($user['type']) {
    case 'Contributor':
      $user['type'] = 'Contribuidor';
      break;
    case 'Moderator':
      $user['type'] = 'Moderador';
      break;
    case 'Administrator':
      $user['type'] = 'Administrador';
      break;
    default:
      break;
  }
  
  $user['nArticles'] = getArticleCount($userId);
  $user['nFollowers'] = getFollowersCount($userId);
  $user['nFollowees'] = getFollowingCount($userId);
  $user['follow_status'] = getFollowStatus($_SESSION['id'], $userId);
  
  if($userId==$_SESSION['id']){
    $userStories = getFolloweesArticles($userId);
  }else{
    $userStories = getUserArticles($userId, $user);
  }
  
  $smarty->assign('user', $user);
  $smarty->assign('userStories', $userStories);
      
  $smarty->display('users/profile.tpl'); 
?>