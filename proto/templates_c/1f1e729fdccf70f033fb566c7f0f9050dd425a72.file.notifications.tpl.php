<?php /* Smarty version Smarty-3.1.15, created on 2016-06-05 22:14:22
         compiled from "C:\wamp\www\lbaw\Overview\proto\templates\users\notifications.tpl" */ ?>
<?php /*%%SmartyHeaderCode:191585754881ec60970-69925666%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1f1e729fdccf70f033fb566c7f0f9050dd425a72' => 
    array (
      0 => 'C:\\wamp\\www\\lbaw\\Overview\\proto\\templates\\users\\notifications.tpl',
      1 => 1465007457,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '191585754881ec60970-69925666',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'BASE_URL' => 0,
    'nNotifications' => 0,
    'PICTURE' => 0,
    'FIRST_NAME' => 0,
    'LAST_NAME' => 0,
    'notifications' => 0,
    'notification' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_5754881ee1a456_47216879',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5754881ee1a456_47216879')) {function content_5754881ee1a456_47216879($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('common/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<?php echo $_smarty_tpl->getSubTemplate ('common/status_messages.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


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

  <div class="text-center col-md-2 col-sm-12 col-xs-12">
    <img alt="Imagem de perfil" src="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
<?php echo $_smarty_tpl->tpl_vars['PICTURE']->value;?>
" class="img-circle" height="80" width="80"/>
    <h4><?php echo $_smarty_tpl->tpl_vars['FIRST_NAME']->value;?>
 <?php echo $_smarty_tpl->tpl_vars['LAST_NAME']->value;?>
</h4>
  </div>

  <div id="all-notifications" class="col-md-9">
    <br>
    <ul id="list-notifications" class="nav nav-pills nav-stacked">
      <?php if (count($_smarty_tpl->tpl_vars['notifications']->value)==0) {?> <li class="notification button-link" onclick="getNotifications()">Não tem notificações.</li><?php }?>
      <?php  $_smarty_tpl->tpl_vars['notification'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['notification']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['notifications']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['notification']->key => $_smarty_tpl->tpl_vars['notification']->value) {
$_smarty_tpl->tpl_vars['notification']->_loop = true;
?>
      <li id="notification-<?php echo $_smarty_tpl->tpl_vars['notification']->value['id'];?>
" class="<?php if (!$_smarty_tpl->tpl_vars['notification']->value['is_read']) {?>unread-notification <?php }?> notification button-link" onclick="setNotificationRead(<?php echo $_smarty_tpl->tpl_vars['notification']->value['id'];?>
)">
        <div class="media">
          <p class="pull-right text-muted"><small><?php echo $_smarty_tpl->tpl_vars['notification']->value['sent_date'];?>
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
          <span class="sender-name"><a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
pages/users/profile.php?id=<?php echo $_smarty_tpl->tpl_vars['notification']->value['sender'];?>
"><?php echo $_smarty_tpl->tpl_vars['notification']->value['sender_first_name'];?>
 <?php echo $_smarty_tpl->tpl_vars['notification']->value['sender_last_name'];?>
</a></span>
          <p><?php echo $_smarty_tpl->tpl_vars['notification']->value['message'];?>
</p>
          <div class="btn-simple pull-right text-muted">
            <?php if (!$_smarty_tpl->tpl_vars['notification']->value['is_read']) {?>
            <small><span onclick="toggleNotificationRead(<?php echo $_smarty_tpl->tpl_vars['notification']->value['id'];?>
)" data-placement="left" data-toggle="tooltip" title="Marcar como lida" class="notification-read delete glyphicon glyphicon-envelope"></span></small>
            <?php } else { ?>
            <small><span onclick="toggleNotificationRead(<?php echo $_smarty_tpl->tpl_vars['notification']->value['id'];?>
)" data-placement="left" data-toggle="tooltip" title="Marcar como não lida" class="notification-read delete glyphicon glyphicon-envelope"></span></small>
            <?php }?>
            <span>&nbsp;&nbsp;</span>
            <small><span onclick="deleteNotification(<?php echo $_smarty_tpl->tpl_vars['notification']->value['id'];?>
)" data-placement="left" data-toggle="tooltip" title="Apagar" class="delete glyphicon glyphicon-remove"></span></small>
          </div>
        </div>
      </li>
      <?php } ?>
    </ul>
  </div>
</div>

<script src="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
javascript/notifications.js"></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
lib/slimScroll/jquery.slimscroll.min.js"></script>
<?php echo $_smarty_tpl->getSubTemplate ('common/footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php }} ?>
