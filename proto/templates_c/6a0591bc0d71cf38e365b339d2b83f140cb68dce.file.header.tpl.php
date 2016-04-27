<?php /* Smarty version Smarty-3.1.15, created on 2016-04-26 20:44:02
         compiled from "C:\wamp\www\Overview\proto\templates\common\header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:3639571f8fc54f1826-77472469%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6a0591bc0d71cf38e365b339d2b83f140cb68dce' => 
    array (
      0 => 'C:\\wamp\\www\\Overview\\proto\\templates\\common\\header.tpl',
      1 => 1461696239,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3639571f8fc54f1826-77472469',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_571f8fc5b2d863_35765548',
  'variables' => 
  array (
    'BASE_URL' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_571f8fc5b2d863_35765548')) {function content_571f8fc5b2d863_35765548($_smarty_tpl) {?><!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Overview</title>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js" type="text/javascript"></script>

  <!-- Bootstrap Core CSS -->
  <link href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
css/bootstrap.min.css" rel="stylesheet">

  <!-- Font Awesome Core CSS -->
  <link href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
css/font-awesome.min.css" rel="stylesheet">

  <!-- Custom CSS -->
  <link href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
css/main.css" rel="stylesheet">

  <!-- Login Form CSS -->
  <link href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
css/sign_in.css" rel="stylesheet">

  <!-- browse_button CSS -->
  <link href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
css/browse_button.css" rel="stylesheet">

</head>

<body>
  <!-- START OF SIDEBAR -->
  <div id="wrapper" class="toggled">

    <!-- Sidebar -->
    <div id="sidebar-wrapper">
      <ul class="sidebar-nav">
        <li>
          <a href="#">Trending</a>
        </li>
        <li>
          <a href="#">World</a>
        </li>
        <li>
          <a href="#">Europe</a>
        </li>
        <li>
          <a href="#">Economy</a>
        </li>
        <li>
          <a href="#">Sports</a>
        </li>
        <li>
          <a href="#">Culture</a>
        </li>
      </ul>
    </div>
    <!-- END OF SIDEBAR -->

    <div id="page-content-wrapper">
      <!-- Navigation -->
      <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
          <a id="menu-toggle"><i class="fa fa-bars"></i></a>
          <!-- Brand and toggle get grouped for better mobile display -->
          <div class="navbar-header">
            <a class="navbar-brand" href="#">Overview</a>
          </div>
          <!-- Collect the nav links, forms, and other content for toggling -->
            <ul class="nav navbar-nav">
              <li>
                <a id="search-button"><i class="fa fa-search header-fa"></i></a>
              </li>
              <li>
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><b><i class="fa fa-user header-fa"></i></b> <span class="caret"></span></a>
                  <?php echo $_smarty_tpl->getSubTemplate ('common/sign_in.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

              </li>
            </ul>
          <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
      </nav>

      <!-- Page Content -->
      <div class="container">
<?php }} ?>
