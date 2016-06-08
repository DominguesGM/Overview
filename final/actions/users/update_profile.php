<?php
  include_once('../../config/init.php');
  include_once($BASE_DIR .'database/users.php');  

  if (!$_POST['user-id'] || !$_POST['firstname'] || !$_POST['lastname'] || !$_POST['password'] || !$_POST['picture_id'] || !$_POST['about']) {
    $_SESSION['error_messages'][] = 'Todos os campos são necessários.';
    $_SESSION['form_values'] = $_POST;
    header("Location: $BASE_URL" . "pages/users/edit_profile.php?id=$userId");
    exit;
  }

  $userId = strip_tags($_POST['user-id']);
  $firstName = strip_tags($_POST['firstname']);
  $lastName = strip_tags($_POST['lastname']);
  $about = strip_tags($_POST['about']);
  $pictureId = strip_tags($_POST['picture_id']);
  $password = $_POST['password'];

  $photo = $_FILES['photo'];
  
  if($photo['name']==""){
    $photo = null;
  }
  
  if($photo){
    $extension = end(explode(".", $photo["name"]));
  }

  try {
    updateUserInfo($userId, $firstName, $lastName, $password, $about);
    $_SESSION['first_name'] = $firstName;
    $_SESSION['last_name'] = $lastName; 
  
    if($photo){
      setImagePath($pictureId, "images/users/profile_$userId.$extension");
      move_uploaded_file($photo["tmp_name"], $BASE_DIR . "images/users/profile_" . $userId . '.' . $extension);
      $_SESSION['picture'] = "images/users/profile_" . $userId . '.' . $extension;
      chmod($BASE_DIR . "images/users/profile_" . $userId . '.' . $extension, 0644);
    }
    
  } catch (PDOException $e) {
    $_SESSION['error_messages'][] = 'Erro ao criar a conta de utilizador.';

    $_SESSION['form_values'] = $_POST;
    header("Location: $BASE_URL" . "pages/users/profile.php?id=$userId");
    exit;
  }
    
  $_SESSION['success_messages'][] = 'Alterações guardadas.';  
  header("Location: $BASE_URL" . "pages/users/profile.php?id=$userId");
?>
