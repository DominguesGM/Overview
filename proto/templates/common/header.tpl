<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="lbaw1566">

  <title>Overview</title>

  <script src="http://code.jquery.com/jquery-1.10.2.min.js"></script>

  <!-- Bootstrap Core CSS -->
  <link href="{$BASE_URL}css/bootstrap.min.css" rel="stylesheet">

  <!-- Font Awesome Core CSS -->
  <link href="{$BASE_URL}css/font-awesome.min.css" rel="stylesheet">

  <!-- Custom CSS -->
  <link href="{$BASE_URL}css/main.css" rel="stylesheet">

  <!-- Login Form CSS -->
  <link href="{$BASE_URL}css/sign_in.css" rel="stylesheet">

  <!-- browse_button CSS -->
  <link href="{$BASE_URL}css/browse_button.css" rel="stylesheet">

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
            <a class="navbar-brand" href="{$BASE_URL}">Overview</a>
          </div>
          <!-- Collect the nav links, forms, and other content for toggling -->
          <ul class="nav navbar-nav">
            <li>
              <a id="search-button"><i class="fa fa-search header-fa"></i></a>
            </li>
            <li>
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><b><i class="fa fa-user header-fa"></i></b> <span class="caret"></span></a>
              {if $ID}
                {include file='common/user_menu.tpl'}
              {else}
                {include file='common/sign_in.tpl'}
              {/if}
            </li>
          </ul>
          <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
      </nav>

      {$id|@var_dump}
      {$id1|@var_dump}
      {$ID|@var_dump}
      {$EMAIL|@var_dump}

      <!-- Page Content -->
      <div class="container">
