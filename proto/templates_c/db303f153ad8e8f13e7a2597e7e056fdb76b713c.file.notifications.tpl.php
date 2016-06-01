<?php /* Smarty version Smarty-3.1.15, created on 2016-06-01 23:33:35
         compiled from "C:\wamp\www\Overview\proto\templates\users\notifications.tpl" */ ?>
<?php /*%%SmartyHeaderCode:22474574f4c9ec607b8-67172373%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'db303f153ad8e8f13e7a2597e7e056fdb76b713c' => 
    array (
      0 => 'C:\\wamp\\www\\Overview\\proto\\templates\\users\\notifications.tpl',
      1 => 1464816813,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '22474574f4c9ec607b8-67172373',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_574f4ca09acb35_04605043',
  'variables' => 
  array (
    'BASE_URL' => 0,
    'nNotifications' => 0,
    'notifications' => 0,
    'notification' => 0,
    'notificaiton' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_574f4ca09acb35_04605043')) {function content_574f4ca09acb35_04605043($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('common/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<?php echo $_smarty_tpl->getSubTemplate ('common/status_messages.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<!-- image_gallery CSS-->
<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
css/notifications.css">

<div class="container">
  <div class="col-md-12">
    <hgroup class="mb20">
      <br>
      <h1><span class="glyphicon glyphicon-envelope"></span> Notificações</h1>
      <h2 class="lead"><strong id="notification-count"><?php echo $_smarty_tpl->tpl_vars['nNotifications']->value;?>
</strong> <?php if ($_smarty_tpl->tpl_vars['nNotifications']->value==1) {?> notificação<?php } else { ?> notificações<?php }?> por ler</h2>
    </hgroup>
  </div>

  <div id="reader-tools" class="col-md-9"></div>

    <div class="tab-content col-md-12">
    <div id="notifications" class="tab-pane fade in active">
      <div id="all-notifications" sytle="overflow-y: auto;" class="h-scroll col-md-8">
        <br>
        <ul id="list-notifications" class="nav nav-pills nav-stacked">
          <?php if (count($_smarty_tpl->tpl_vars['notifications']->value)==0) {?> <li class="notification button-link" onclick="getNotifications()">Não tem notificações.</li><?php }?>
          <?php  $_smarty_tpl->tpl_vars['notification'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['notification']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['notifications']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['notification']->key => $_smarty_tpl->tpl_vars['notification']->value) {
$_smarty_tpl->tpl_vars['notification']->_loop = true;
?>
          <li id="notification-<?php echo $_smarty_tpl->tpl_vars['notification']->value['id'];?>
" class="<?php if (!$_smarty_tpl->tpl_vars['notification']->value['is_read']) {?>unread-notification <?php }?> notification button-link" onclick="displayNotification(<?php echo $_smarty_tpl->tpl_vars['notification']->value['id'];?>
)">
            <div class="media">
              <p class="pull-right text-muted"><small><?php echo $_smarty_tpl->tpl_vars['notificaiton']->value['sent_date'];?>
</small></p>
              <a class="media-left" href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
pages/users/profile.php?id=<?php echo $_smarty_tpl->tpl_vars['notification']->value['sender'];?>
">
                <img class="img-circle" height="40" width="40" src="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
<?php echo $_smarty_tpl->tpl_vars['notification']->value['sender_picture'];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['notification']->value['sender_first_name'];?>
 <?php echo $_smarty_tpl->tpl_vars['notification']->value['sender_last_name'];?>
">
              </a>
              <span><h5 class="user_name"><a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
pages/users/profile.php?id=<?php echo $_smarty_tpl->tpl_vars['notification']->value['sender'];?>
"><?php echo $_smarty_tpl->tpl_vars['notification']->value['sender_first_name'];?>
 <?php echo $_smarty_tpl->tpl_vars['notification']->value['sender_last_name'];?>
</a></h5></span>
              <p><?php echo $_smarty_tpl->tpl_vars['notification']->value['message'];?>
</p>
              <div class="delete btn-simple pull-right text-muted">
                <small><span onclick="deleteNotification(<?php echo $_smarty_tpl->tpl_vars['notification']->value['id'];?>
)" data-placement="left" data-toggle="tooltip" title="Apagar" class="glyphicon glyphicon-remove"></span></small>
              </div>
            </div>
          </li>
          <?php } ?>
        </ul>
      </div>
    </div>
  </div>
  </div>
  </div>
</div>

<script src="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
javascript/notifications.js"></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
lib/slimScroll/jquery.slimscroll.min.js"></script>
<?php echo $_smarty_tpl->getSubTemplate ('common/footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php }} ?>
