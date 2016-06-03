{include file='common/header.tpl'}

{include file='common/status_messages.tpl'}

<div class="container">
  <div class="col-md-12">
    <hgroup class="mb20">
      <br>
      <h1><span class="fa fa-users"></span> Moderadores</h1>
      <input id="user-type" type="hidden" value="moderators">
    </hgroup>
  </div>

  <div id="all-moderators" class="col-md-12">
    <br>
    <div id="list-users" class="nav nav-pills nav-stacked">
      {if $moderators|count == 0} <div class="no-users button-link" onclick="getUsers()">Não existem moderadores.</div>{/if}
      {assign "users" $moderators}
      {include file='users/users.tpl'}
    </div>
  </div>
</div>

<script src="{$BASE_URL}javascript/user_management.js"></script>
<script type="text/javascript" src="{$BASE_URL}lib/slimScroll/jquery.slimscroll.min.js"></script>
{include file='common/footer.tpl'}
