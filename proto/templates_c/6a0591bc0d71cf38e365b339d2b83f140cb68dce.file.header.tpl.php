<?php /* Smarty version Smarty-3.1.15, created on 2016-05-05 23:45:07
         compiled from "C:\wamp\www\Overview\proto\templates\common\header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:155885729d3e0c18dd1-75233695%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6a0591bc0d71cf38e365b339d2b83f140cb68dce' => 
    array (
      0 => 'C:\\wamp\\www\\Overview\\proto\\templates\\common\\header.tpl',
      1 => 1462484560,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '155885729d3e0c18dd1-75233695',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_5729d3e1305cf2_36928665',
  'variables' => 
  array (
    'BASE_URL' => 0,
    'FIRST_NAME' => 0,
    'LAST_NAME' => 0,
    'ID' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5729d3e1305cf2_36928665')) {function content_5729d3e1305cf2_36928665($_smarty_tpl) {?><!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="lbaw1566">

  <title>Overview</title>

  <script src="http://code.jquery.com/jquery-1.10.2.min.js"></script>

  <script src="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
javascript/main.js"></script>

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

  <!-- image_gallery CSS-->
  <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
css/image_gallery.css">

  <!-- small_image_gallery -->
  <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
lib/fancybox/source/jquery.fancybox.css" type="text/css" media="screen" />
  <script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
lib/fancybox/source/jquery.fancybox.pack.js?v=2.1.5"></script>

  <!-- image upload -->
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
lib/fileinput/css/fileinput.css" media="all" rel="stylesheet" type="text/css" />
  <script src="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
lib/fileinput/js/fileinput.js" type="text/javascript"></script>
  <script src="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
lib/fileinput/js/fileinput_locale_pt.js"></script>

  <!-- rich text -->
  <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
  <script src="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
javascript/rich_text.js"></script>
</head>

<body>
  <!-- START OF SIDEBAR -->
  <div id="wrapper" class="toggled">

    <!-- Sidebar -->
    <div id="sidebar-wrapper">
      <ul id="all-categories" class="sidebar-nav">
        <li>
          <a href="#">Trending</a>
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
            <a class="navbar-brand" href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
">Overview</a>
          </div>
          <!-- Collect the nav links, forms, and other content for toggling -->
          <ul class="nav navbar-nav navbar-right">
            <li>
              <a id="search-button"><i class="fa fa-search header-fa"></i></a>
            </li>
            <li>
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><b><i class="fa fa-user header-fa"></i></b> <span class="caret"><?php echo $_smarty_tpl->tpl_vars['FIRST_NAME']->value;?>
 <?php echo $_smarty_tpl->tpl_vars['LAST_NAME']->value;?>
</span></a>
              <?php if ($_smarty_tpl->tpl_vars['ID']->value) {?>
                <?php echo $_smarty_tpl->getSubTemplate ('common/user_menu.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

              <?php } else { ?>
                <?php echo $_smarty_tpl->getSubTemplate ('common/sign_in.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

              <?php }?>
            </li>
          </ul>
          <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
      </nav>

      <!-- Page Content -->
      <div class="container">
<?php }} ?>
