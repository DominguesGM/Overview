<?php
  session_set_cookie_params(3600, "/~lbaw1566/"); //FIXME
  session_start();

  error_reporting(E_ERROR | E_WARNING); // E_NOTICE by default

  $BASE_DIR = '/opt/lbaw/lbaw1566/public_html/proto/'; //FIXME
  $BASE_URL = '/~lbaw1566/proto/'; //FIXME

  $conn = new PDO('pgsql:host=dbm.fe.up.pt;port=5432;dbname=lbaw1566', 'lbaw1566', 'GH43P4H8'); //FIXME
  $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $conn->exec('SET SCHEMA \'lbaw\''); //FIXME?

  include_once($BASE_DIR . 'lib/smarty/Smarty.class.php');

  $smarty = new Smarty;
  $smarty->template_dir = $BASE_DIR . 'templates/';
  $smarty->compile_dir = $BASE_DIR . 'templates_c/';
  $smarty->assign('BASE_URL', $BASE_URL);

  $smarty->assign('ERROR_MESSAGES', $_SESSION['error_messages']);
  $smarty->assign('FIELD_ERRORS', $_SESSION['field_errors']);
  $smarty->assign('SUCCESS_MESSAGES', $_SESSION['success_messages']);
  $smarty->assign('FORM_VALUES', $_SESSION['form_values']);

  $smarty->assign('ID', $_SESSION['id']);
  $smarty->assign('EMAIL', $_SESSION['email']);
  $smarty->assign('PICTURE', $_SESSION['picture']);
  $smarty->assign('STATUS', $_SESSION['status']);
  $smarty->assign('TYPE', $_SESSION['type']);
  $smarty->assign('FIRST_NAME', $_SESSION['first_name']);
  $smarty->assign('LAST_NAME', $_SESSION['last_name']);
  
  unset($_SESSION['success_messages']);
  unset($_SESSION['error_messages']);
  unset($_SESSION['field_errors']);
  unset($_SESSION['form_values']);
?>
