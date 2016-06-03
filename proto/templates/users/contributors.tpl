{include file='common/header.tpl'}

{include file='common/status_messages.tpl'}

<div class="container">
  <div class="col-md-12">
    <hgroup class="mb20">
      <br>
      <h1><span class="fa fa-users"></span> Contribuidores</h1>
      <input id="user-type" type="hidden" value="contributors">
    </hgroup>
  </div>

  <div id="all-contributors" class="col-md-12">
    <br>
    <div id="list-users" class="nav nav-pills nav-stacked">
      {if $contributors|count == 0} <div class="no-users">Não existem contribuidores.</div>{/if}
      {assign "users" $contributors}
      {include file='users/users.tpl'}
    </div>
  </div>
</div>

<script src="{$BASE_URL}javascript/user_management.js"></script>
<script type="text/javascript" src="{$BASE_URL}lib/slimScroll/jquery.slimscroll.min.js"></script>
{include file='common/footer.tpl'}
