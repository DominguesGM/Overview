{foreach $users as $user}
<div id="user-{$user['id']}" href="{$BASE_URL}pages/users/profile.php?id={$user['id']}" class="selectable user-card button-link col-md-3">
  <div class="text-center button-link col-xs-8 col-md-8">
  <a href="{$BASE_URL}pages/users/profile.php?id={$user['id']}">
    <img class="img-circle" height="100" width="100" alt="Imagem de perfil" src="{$BASE_URL}{$user['path']}">
  </a>
  <h4 class="user_name"><a href="{$BASE_URL}users/profile.php?id={$user['id']}">{$user['first_name']} {$user['last_name']}</a></h4>
  </div>
  <div class="pull-left col-xs-4 col-md-4">
  {if ($moderatorAccess || $administratorAccess) && $user['id'] != $ID}
  <ul class="btn-simple all-blogs">
    {if $administratorAccess && $user['id'] != $ID}
    <li class="user-info">
      <small>
        <span onclick="toggleUserType({$user['id']})" data-placement="right" data-toggle="tooltip" title="{if $user['type']=='Moderator'}Despromover moderador{else}Promover a moderador{/if}" class="user-type text-muted selectable {if $user['type']=='Moderator'}glyphicon glyphicon-eye-close{else}glyphicon glyphicon-eye-open{/if}"></span>
      </small>
    </li>
    {/if}
    <li class="user-info">
      <small>
        <span onclick="toggleUserStatus({$user['id']})" data-placement="right" data-toggle="tooltip" title="{if $user['status']!='Blocked'}Bloquear{else}Desbloquear{/if}" class="user-status glyphicon glyphicon-ban-circle selectable {if $user['status']=='Blocked'}blocked {else} text-muted {/if}">
        </span>
      </small>
    </li>
  </ul>
  {/if}
  </div>
</div>
{/foreach}
