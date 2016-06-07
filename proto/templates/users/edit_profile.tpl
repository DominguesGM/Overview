{include file='common/header.tpl'}
<div class="container">
  <div style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
    <div class="panel panel-info">
      <div class="panel-heading">
        <div class="panel-title">Editar perfil</div>
      </div>
      <div class="panel-body" >

        <form id="profileform" class="form-horizontal" role="form" action="{$BASE_URL}actions/users/update_profile.php" method="post" enctype="multipart/form-data" onsubmit="return checkProfileForm();">
          {include file='common/status_messages.tpl'}
          <div id="profile-alert"></div>

          <input type="hidden" id="user-id" name="user-id" value="{$ID}">

          <div class="form-group">
            <label for="email" class="col-md-3 control-label">Email</label>
            <div class="col-md-9">
              <input type="email" class="form-control" name="email" placeholder="Email" value="{$EMAIL}" required readonly="">
            </div>
          </div>

          <div class="form-group">
            <label for="firstname" class="col-md-3 control-label">Nome</label>
            <div class="col-md-9">
              <input type="text" class="form-control" name="firstname" placeholder="Nome" value="{$FIRST_NAME}" required>
            </div>
          </div>

          <div class="form-group">
            <label for="lastname" class="col-md-3 control-label">Apelido</label>
            <div class="col-md-9">
              <input type="text" class="form-control" name="lastname" placeholder="Apelido" value="{$LAST_NAME}" required>
            </div>
          </div>

          <div class="form-group">
            <label for="password" class="col-md-3 control-label">Password</label>
            <div class="col-md-9">
              <input type="password" class="form-control" name="password" placeholder="Password" required data-toggle="tooltip" title="Introduza uma password com uma letra e um número e no mínimo 8 caracteres" data-placement="bottom">
            </div>
          </div>

          <div class="form-group">
            <label for="password_conf" class="col-md-3 control-label"></label>
            <div class="col-md-9">
              <input type="password" class="form-control" name="password_conf" placeholder="Confirmar password" required data-toggle="tooltip" title="Introduza uma password com uma letra e um número e no mínimo 8 caracteres" data-placement="bottom">
            </div>
          </div>

          <div class="form-group">
            <label for="about" class="col-md-3 control-label">Sobre si</label>
            <div class="col-md-9">
              <textarea style="overflow:auto;resize:vertical" class="form-control" name="about" rows="5" placeholder="Escreva qualquer coisa sobre si..." required>{$user.about}</textarea>
            </div>
          </div>

          <div class="form-group">
            <input type="hidden" id="picture_id" name="picture_id" value="{$user.picture}">
            <label for="photo" class="col-md-3 control-label">Fotografia</label>
            <div class="col-md-9">
              <div class='col-sm-9 col-xs-9 col-md-9 col-lg-9'>
                <a class="thumbnail fancybox" rel="ligthbox" href="{$BASE_URL}{$PICTURE}">
                  <img class="img-responsive" src="{$BASE_URL}{$PICTURE}" data-toggle="tooltip" title="Fotografia atual" data-placement="right"/>
                </a>
              </div>
              <div class="input-group">
                <span class="input-group-btn">
                  <span class="btn btn-primary btn-file" data-toggle="tooltip" title="Selecione uma fotografia para substituir a atual" data-placement="right">
                    Procurar&hellip; <input name="photo" type="file" accept="image/*">
                  </span>
                  <br>
                </span>
                <input type="text" class="form-control" readonly>
              </div>
            </div>
          </div>

          <div class="form-group">
            <br>
            <label for="buttons" class="col-md-3 control-label"></label>
            <div class="col-md-9">
              {if $ID==$user.id && $TYPE != 'Administrator'}
              <button type="button" onclick="deactivateAccount()" class="btn btn-primary">
                <span class="glyphicon glyphicon-trash"></span> Desativar
              </button>

              <span class="pull-right">&nbsp;</span>
              {/if}

              <button type="button" onclick="discard()" class="btn btn-primary">
                <span class="glyphicon glyphicon-remove"></span> Cancelar
              </button>

              <span class="pull-right">&nbsp;</span>

              <button type="submit" class="btn btn-primary">
                <span class="glyphicon glyphicon-ok"></span> Guardar
              </button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
$(".fancybox").fancybox({
  helpers : {
    overlay : {
      css : {
        'background' : 'rgba(58, 42, 45, 0.95)'
      }
    }
  }
});
</script>
<script src="{$BASE_URL}lib/bootbox/bootbox.min.js"></script>
<script src="{$BASE_URL}javascript/edit_profile.js"></script>

{include file='common/footer.tpl'}
