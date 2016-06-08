<ul class="dropdown-menu multi-level user-menu" role="menu">
  <li><a class="text-center" href="{$BASE_URL}pages/users/profile.php?id={$ID}">
    <img class="img-circle" height="75" width="75" alt="Imagem de perfil" src="{$BASE_URL}{$PICTURE}">
  </a></li>

  <li><a href="{$BASE_URL}pages/users/profile.php?id={$ID}"><span class="glyphicon glyphicon-user"></span> Perfil</a></li>
  <li><a href="{$BASE_URL}pages/users/articles.php"><span class="glyphicon glyphicon-duplicate"></span> Artigos</a></li>
  <li><a href="{$BASE_URL}pages/users/notifications.php"><span class="glyphicon glyphicon-envelope"></span> Notificações</a></li>

  <li class="divider"></li>

  {if $TYPE != 'Contributor' && ($STATUS == 'Active' || $STATUS == 'Warned')}
    <li class="dropdown-submenu pull-left"><a tabindex="-1" href="#"><span class="glyphicon glyphicon-eye-open"></span> Moderação</a>
        <ul class="dropdown-menu">
          <li><a href="{$BASE_URL}pages/moderation/reports.php"><span class="glyphicon glyphicon-flag"></span> Itens reportados</a></li>
          <li><a href="{$BASE_URL}pages/moderation/contributors.php"><span class="fa fa-users"></span> Contribuidores</a></li>
        </ul>
    </li>
  {/if}

  {if $TYPE == 'Administrator' && ($STATUS == 'Active' || $STATUS == 'Warned')}
    <li class="dropdown-submenu pull-left"><a tabindex="-1" href="#"><span class="glyphicon glyphicon-lock"></span> Administração</a>
        <ul class="dropdown-menu">
        <li><a href="{$BASE_URL}pages/administration/moderators.php"><span class="fa fa-users"></span> Moderadores</a></li>
        <li><a href="{$BASE_URL}pages/administration/categories.php"><span class="glyphicon glyphicon-tag"></span> Categorias</a></li>
        </ul>
    </li>
  {/if}

  <li><a href="{$BASE_URL}actions/users/logout.php"><span class="glyphicon glyphicon-share"></span> Sair</a></li>
</ul>
