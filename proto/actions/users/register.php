<?php
  include_once('../../config/init.php');
  include_once($BASE_DIR .'database/users.php');  

  if (!$_POST['email'] || !$_POST['firstname'] || !$_POST['lastname'] || !$_POST['password'] || !$_POST['about']) {
    $_SESSION['error_messages'][] = 'Todos os campos são necessários.';
    $_SESSION['form_values'] = $_POST;
    header("Location: $BASE_URL" . 'pages/users/authentication.php');
    exit;
  }

  $email = strip_tags($_POST['email']);
  $firstName = strip_tags($_POST['firstname']);
  $lastName = strip_tags($_POST['lastname']);
  $about = strip_tags($_POST['about']);
  $password = $_POST['password'];

  $photo = $_FILES['photo'];
  
  if($photo['name']==""){
    $photo = null;
  }
  
  if($photo){
    $extension = end(explode(".", $photo["name"]));
  }else{
    $extension = 'png';
  } 

  try {
    $result = createUser($firstName, $lastName, $email, $password, $about, $extension);
    $userId = $result[0];
    $validationCode = substr($result[1], 0, 16);    
  
    if($photo){
      move_uploaded_file($photo["tmp_name"], $BASE_DIR . "images/users/profile_" . $userId . '.' . $extension);
    }else{
      copy($BASE_DIR . "images/users/default.png",  $BASE_DIR . "images/users/profile_" . $userId . '.' . $extension);
    }
    
    chmod($BASE_DIR . "images/users/profile_" . $userId . '.' . $extension, 0644);
  } catch (PDOException $e) {
  
    if(strpos($e->getMessage(), 'contributor_email_key') !== false) {
      $_SESSION['error_messages'][] = 'O email introduzido já se encontra registado.';
    }else $_SESSION['error_messages'][] = 'Erro ao criar a conta de utilizador.';

    print $e->getMessage();
    $_SESSION['form_values'] = $_POST;
    header("Location: $BASE_URL" . 'pages/users/authentication.php');
    exit;
  }
  
  // TODO implement email verification
  //$headers = 'From: no-reply@overview.org' . "\r\n" . 'X-Mailer: PHP/' . phpversion();
  //print mail($email, 'Overview', "Bem-vindo ao Overview! \r\nFoi efetuado um registo associado a esta conta de e-mail. \r\nSiga o link abaixo para activar a conta: \r\n $BASE_URL/action/users/verify.php?email=$email&token=$validationCode\r\n\r\nObrigado,\r\nA equipa Overview.", $headers);
  
  $_SESSION['success_messages'][] = 'Registo efetuado.';  
  header("Location: $BASE_URL" . "pages/users/authentication.php");
?>
