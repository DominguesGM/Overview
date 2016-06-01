{include file='common/header.tpl'}

{include file='common/status_messages.tpl'}

<!-- image_gallery CSS-->
<link rel="stylesheet" href="{$BASE_URL}css/notifications.css">

<div class="container">
  <div class="col-md-12">
    <hgroup class="mb20">
      <br>
      <h1><span class="glyphicon glyphicon-envelope"></span> Notificações</h1>
      <h2 class="lead"><strong id="notification-count">{$nNotifications}</strong> {if $nNotifications == 1} notificação{else} notificações{/if} por ler</h2>
    </hgroup>
  </div>

  <div id="reader-tools" class="col-md-9"></div>

    <div class="tab-content col-md-12">
    <div id="notifications" class="tab-pane fade in active">
      <div id="all-notifications" sytle="overflow-y: auto;" class="h-scroll col-md-8">
        <br>
        <ul id="list-notifications" class="nav nav-pills nav-stacked">
          {if $notifications|count == 0} <li class="notification button-link" onclick="getNotifications()">Não tem notificações.</li>{/if}
          {foreach $notifications as $notification}
          <li id="notification-{$notification['id']}" class="{if !$notification['is_read']}unread-notification {/if} notification button-link" onclick="displayNotification({$notification['id']})">
            <div class="media">
              <p class="pull-right text-muted"><small>{$notificaiton['sent_date']}</small></p>
              <a class="media-left" href="{$BASE_URL}pages/users/profile.php?id={$notification['sender']}">
                <img class="img-circle" height="40" width="40" src="{$BASE_URL}{$notification['sender_picture']}" alt="{$notification['sender_first_name']} {$notification['sender_last_name']}">
              </a>
              <span><h5 class="user_name"><a href="{$BASE_URL}pages/users/profile.php?id={$notification['sender']}">{$notification['sender_first_name']} {$notification['sender_last_name']}</a></h5></span>
              <p>{$notification['message']}</p>
              <div class="delete btn-simple pull-right text-muted">
                <small><span onclick="deleteNotification({$notification['id']})" data-placement="left" data-toggle="tooltip" title="Apagar" class="glyphicon glyphicon-remove"></span></small>
              </div>
            </div>
          </li>
          {/foreach}
        </ul>
      </div>
    </div>
  </div>
  </div>
  </div>
</div>

<script src="{$BASE_URL}javascript/notifications.js"></script>
<script type="text/javascript" src="{$BASE_URL}lib/slimScroll/jquery.slimscroll.min.js"></script>
{include file='common/footer.tpl'}
