<?php

  include_once('../../config/init.php');  
  
  function contributor_access(){
    return isset($_SESSION['id']) &&
    isset($_SESSION['email']) &&
    ($_SESSION['type'] === 'Contributor' || $_SESSION['type'] === 'Moderator' || $_SESSION['type'] === 'Administrator' ) && 
    ($_SESSION['status'] === 'Active' || $_SESSION['status'] === 'Warned');
  }
  
  function moderator_access(){
    return isset($_SESSION['id']) &&
    isset($_SESSION['email']) &&
    ($_SESSION['type'] === 'Moderator' || $_SESSION['type'] === 'Administrator' ) && 
    ($_SESSION['status'] === 'Active' || $_SESSION['status'] === 'Warned');
  }
  
  function administrator_access(){
    return isset($_SESSION['id']) &&
    isset($_SESSION['email']) &&
    $_SESSION['type'] === 'Administrator';
  }
?>
