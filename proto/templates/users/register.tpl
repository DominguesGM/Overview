{include file='common/header.tpl'}

<div class="container">
  <div id="loginbox" style="{if !$email} display:none {/if} margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">

    <div class="panel panel-info" >
      <div class="panel-heading">
        <div class="panel-title">Entrar</div>
        <div style="float:right; font-size: 80%; position: relative; top:-10px"><a href="#">Esqueceu a password?</a></div>
      </div>

      <div style="padding-top:30px" class="panel-body" >
        <form id="loginform" class="form-horizontal" role="form" action="{$BASE_URL}actions/users/login.php" method="post">

          {include file='common/status_messages.tpl'}

          <div style="margin-bottom: 25px" class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
            <input id="login-email" type="text" class="form-control" name="email" {if $email} value="{$email}" {else} value="{$FORM_VALUES.email}" {/if} placeholder="Email">
          </div>

          <div style="margin-bottom: 25px" class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
            <input id="login-password" type="password" class="form-control" name="password" value="{$FORM_VALUES.password}" placeholder="Password">
          </div>

          <div style="margin-top:10px" class="form-group">
            <div class="col-sm-12 controls">
              <input type="submit" id="btn-signup" type="button" class="btn btn-primary" value="Entrar">
              <a id="btn-fblogin" href="#" class="btn btn-fb"><i class="fa fa-facebook"></i> Entrar com Facebook </a>
              <a id="btn-twlogin" href="#" class="btn btn-tw"><i class="fa fa-twitter"></i> Entrar com Twitter </a>
            </div>
          </div>

          <div class="form-group">
            <div class="col-md-12 control">
              <div style="border-top: 1px solid#888; padding-top:15px; font-size:85%" >
                Novo aqui?
                <a href="#" onClick="$('#loginbox').hide(); $('#signupbox').show()">
                  Registar
                </a>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>

  <div id="signupbox" {if $email} style="display:none" {/if} style="margin-top:50px" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
    <div class="panel panel-info">
      <div class="panel-heading">
        <div class="panel-title">Registar</div>
        <div style="float:right; font-size: 85%; position: relative; top:-10px"><a id="signinlink" href="#" onclick="$('#signupbox').hide(); $('#loginbox').show()">Entrar</a></div>
      </div>
      <div class="panel-body" >

        <form id="signupform" class="form-horizontal" role="form" action="{$BASE_URL}actions/users/register.php" method="post" enctype="multipart/form-data" onsubmit="return checkRegisterForm();">

          {include file='common/status_messages.tpl'}

          <div id="signupalert" style="display:none" class="alert alert-danger">
            <p>Erro: </p>
            <span></span>
          </div>

          <div class="form-group">
            <label for="email" class="col-md-3 control-label">Email</label>
            <div class="col-md-9">
              <input type="email" class="form-control" name="email" placeholder="Email" value="{$FORM_VALUES.email}" required>
            </div>
          </div>

          <div class="form-group">
            <label for="firstname" class="col-md-3 control-label">Nome</label>
            <div class="col-md-9">
              <input type="text" class="form-control" name="firstname" placeholder="Nome" value="{$FORM_VALUES.firstname}" required>
            </div>
          </div>

          <div class="form-group">
            <label for="lastname" class="col-md-3 control-label">Apelido</label>
            <div class="col-md-9">
              <input type="text" class="form-control" name="lastname" placeholder="Apelido" value="{$FORM_VALUES.lastname}" required>
            </div>
          </div>

          <div class="form-group">
            <label for="password" class="col-md-3 control-label">Password</label>
            <div class="col-md-9">
              <input type="password" class="form-control" name="password" placeholder="Password" required>
            </div>
          </div>

          <div class="form-group">
            <label for="password_conf" class="col-md-3 control-label"></label>
            <div class="col-md-9">
              <input type="password" class="form-control" name="password_conf" placeholder="Confirmar password" required>
            </div>
          </div>

          <div class="form-group">
            <label for="about" class="col-md-3 control-label">Sobre si</label>
            <div class="col-md-9">
              <textarea style="overflow:auto;resize:vertical" class="form-control" name="about" rows="5" placeholder="Escreva qualquer coisa sobre si..." required></textarea>
            </div>
          </div>

          <div class="form-group">
            <label for="photo" class="col-md-3 control-label">Fotografia</label>
            <div class="col-md-9">
              <div class="input-group">
                <span class="input-group-btn">
                  <span class="btn btn-primary btn-file">
                    Procurar&hellip; <input name="photo" type="file" accept="image/*">
                  </span>
                  <br>
                </span>
                <input type="text" class="form-control" readonly>
              </div>
            </div>
          </div>

          <div class="form-group">
            <div class="col-md-offset-3 col-md-9">
              <label class="control-label">
                <input type="checkbox" id="terms" required> Li e aceito os
                <a href="{$BASE_URL}pages/users/terms_of_use.php" target="_blank" class="fancybox">Termos de Uso</a>.
              </label>
            </div>
          </div>

          <div class="form-group">
            <div class="col-md-offset-3 col-md-9">
              <input type="submit" id="btn-signup" type="button" class="btn btn-primary" value="Registar">
            </div>
          </div>

          <div style="border-top: 1px solid #999; padding-top:20px"  class="form-group">
            <div class="col-md-offset-3 col-md-9">
              <div class="social-buttons">
                <a href="#" class="btn btn-fb"><i class="fa fa-facebook"></i> Entrar com Facebook</a>
                <a href="#" class="btn btn-tw"><i class="fa fa-twitter"></i> Entrar com Twitter</a>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

{include file='common/footer.tpl'}
