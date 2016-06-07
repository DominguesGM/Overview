<!DOCTYPE html>
<html lang="pt-PT">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="lbaw1566">

  <title>Overview</title>

  <!--<script src="http://code.jquery.com/jquery-1.10.2.min.js"></script>-->
  <!-- jQuery -->
  <script src="{$BASE_URL}javascript/jquery.js"></script>

  <!-- Bootstrap Core CSS -->
  <link href="{$BASE_URL}css/bootstrap.min.css" rel="stylesheet">

  <!-- Font Awesome Core CSS -->
  <link href="{$BASE_URL}css/font-awesome.min.css" rel="stylesheet">

  <!-- Custom CSS -->
  <link href="{$BASE_URL}css/main.css" rel="stylesheet">

  <!-- Login Form CSS -->
  <link href="{$BASE_URL}css/sign_in.css" rel="stylesheet">

  <!-- Search Page CSS -->
  <link href="{$BASE_URL}css/search.css" rel="stylesheet">

  <!-- browse_button CSS -->
  <link href="{$BASE_URL}css/browse_button.css" rel="stylesheet">

  <!-- image_gallery CSS-->
  <link rel="stylesheet" href="{$BASE_URL}css/image_gallery.css">

  <!-- small_image_gallery -->
  <link rel="stylesheet" href="{$BASE_URL}lib/fancybox/source/jquery.fancybox.css" type="text/css" media="screen" />
  <script type="text/javascript" src="{$BASE_URL}lib/fancybox/source/jquery.fancybox.pack.js?v=2.1.5"></script>

  <!-- image upload -->
  <link href="{$BASE_URL}lib/fileinput/css/fileinput.css" media="all" rel="stylesheet" type="text/css" />
  <script src="{$BASE_URL}lib/fileinput/js/fileinput.js" type="text/javascript"></script>
  <script src="{$BASE_URL}lib/fileinput/js/fileinput_locale_pt.js"></script>

  <!-- Bootstrap Core JavaScript -->
  <script src="{$BASE_URL}javascript/bootstrap.min.js"></script>
</head>

<body>
  <!-- START OF SIDEBAR -->
  <div id="wrapper" class="toggled">

    <!-- Sidebar -->
    <div id="sidebar-wrapper">
      <ul id="all-categories" class="sidebar-nav">
        <li>
          {if isset($ID)}
            <a href="{$BASE_URL}pages/category.php?category=Following">Following</a>
          {/if}
        </li>
      </ul>
    </div>
    <!-- END OF SIDEBAR -->

    <div id="page-content-wrapper">
      <!-- Navigation -->
      <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container">
          <a id="menu-toggle"><i class="fa fa-bars"></i></a>
          <!-- Brand and toggle get grouped for better mobile display -->
          <div class="navbar-header">
            <a class="navbar-brand" href="{$BASE_URL}">Overview</a>
          </div>
          <!-- Collect the nav links, forms, and other content for toggling -->
          <ul class="nav navbar-nav navbar-right">
            <li>
              <a data-placement="bottom" data-toggle="tooltip" title="Procuar" id="search-button" href="{$BASE_URL}pages/search.php"><i class="fa fa-search header-fa"></i></a>
            </li>
            {if $ID}
            <li>
              <a data-placement="bottom" data-toggle="tooltip" title="Criar artigo" id="new-article-button" href="{$BASE_URL}pages/articles/create_article.php"><i class="fa fa-plus header-fa"></i></a>
            </li>
            {/if}
            <li>
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><b><i class="fa fa-user header-fa"></i></b> <span>{$FIRST_NAME} {$LAST_NAME}</span></a>
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

      <!-- Page Content -->
      <div class="container">
