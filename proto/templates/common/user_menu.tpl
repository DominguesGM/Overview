<ul class="dropdown-menu">
  <!-- include user picture-->
  <li><a href="#"><span class="glyphicon glyphicon-user"></span> Perfil</a></li>
  <li><a href="#"><span class="glyphicon glyphicon-envelope"></span> Notificações</a></li>

  {if $TYPE != 'Contributor' && ($STATUS == 'Active' || $STATUS == 'Warned')}
    <li class="divider"></li>
    <li><a href="#"><span class="glyphicon glyphicon-eye-open"></span> Área de Moderação</a></li>
  {/if}

  {if $TYPE == 'Administrator' && ($STATUS == 'Active' || $STATUS == 'Warned')}
    <li><a href="#"><span class="glyphicon glyphicon-lock"></span> Área de Administração</a></li>
  {/if}

  <li class="divider"></li>
  <li><a href="{$BASE_URL}actions/users/logout.php"><span class="glyphicon glyphicon-share"></span> Sair</a></li>
</ul>
