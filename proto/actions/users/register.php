<?php
  include_once('../../config/init.php');
  include_once($BASE_DIR .'database/users.php');  

  if (!$_POST['email'] || !$_POST['firstname'] || !$_POST['lastname'] || !$_POST['password'] || !$_POST['about']) {
    $_SESSION['error_messages'][] = 'All fields are mandatory';
    $_SESSION['form_values'] = $_POST;
    header("Location: $BASE_URL" . 'pages/users/register.php');
    exit;
  }

  $email = strip_tags($_POST['email']);
  $firstName = strip_tags($_POST['firstname']);
  $lastName = strip_tags($_POST['lastname']);
  $about = strip_tags($_POST['about']);
  $password = $_POST['password'];

  $photo = $_FILES['photo'];
  $extension = end(explode(".", $photo["name"]));

    print $email . ' ' . $firstName . ' ' . $lastName . ' ' . $about . ' ' . $password;

  try {
    $result = createUser($firstName, $lastName, $email, $password, $about, $extension);
    $userId = $result[0];
    $validationCode = substr($result[1], 0, 8);    
  
    // TODO support no picture upload
    move_uploaded_file($photo["tmp_name"], $BASE_DIR . "images/users/" . $userId . '.' . $extension); // this is dangerous
    chmod($BASE_DIR . "images/users/" . $userId . '.' . $extension, 0644);
  } catch (PDOException $e) {
  
    if(strpos($e->getMessage(), 'users_pkey') !== false) {
      $_SESSION['error_messages'][] = 'O email já existe.';
      $_SESSION['field_errors']['username'] = 'O email já existe.';
    }else $_SESSION['error_messages'][] = 'Erro ao criar a conta de utilizador.';

    print $e->getMessage();
    $_SESSION['form_values'] = $_POST;
    header("Location: $BASE_URL" . 'pages/users/register.php');
    exit;
  }
  
$headers = 'From: no-reply@overview.org' . "\r\n" . 'X-Mailer: PHP/' . phpversion();

  //  mail($email, 'Overview', "Bem-vindo ao Overview! \r\nFoi efetuado um registo associado a esta conta de e-mail. \r\nEnviamos, abaixo, o código para activar a conta: \r\n $validationCode\r\n\r\nObrigado,\r\nA equipa Overview.", $headers);
    
    $_SESSION['success_messages'][] = 'Conta de utilizador criada.';  
   header("Location: $BASE_URL");
?>
