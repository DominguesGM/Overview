<ul class="dropdown-menu">
  <!-- include user picture-->
  <li><a href="#"><span class="glyphicon glyphicon-user"></span> Perfil</a></li>
  <li><a href="#"><span class="glyphicon glyphicon-envelope"></span> Notificações</a></li>

  <?
  if($_SESSION['type']!= 'Contributor'
  && $_SESSION['staus']!= 'Blocked'
  && $_SESSION['staus']!= 'Inactive'){
  ?>
  <li class="divider"></li>
  <li><a href="#"><span class="glyphicon glyphicon-eye-open"></span> Área de Moderação</a></li>

  <? }
  if($_SESSION['type'] == 'Administrator'
  && $_SESSION['staus']!= 'Blocked'
  && $_SESSION['staus']!= 'Inactive'){
  ?>
  <li><a href="#"><span class="glyphicon glyphicon-lock"></span> Área de Administração</a></li>
  <? } ?>
  <li class="divider"></li>
  <li><a href="{$BASE_URL}actions/users/logout.php"><span class="glyphicon glyphicon-share"></span> Sair</a></li>
</ul>
