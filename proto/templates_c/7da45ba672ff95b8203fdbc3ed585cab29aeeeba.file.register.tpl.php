<?php /* Smarty version Smarty-3.1.15, created on 2016-05-12 11:52:24
         compiled from "C:\wamp\www\lbaw\Overview\proto\templates\users\register.tpl" */ ?>
<?php /*%%SmartyHeaderCode:172725734525849fd79-92266011%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7da45ba672ff95b8203fdbc3ed585cab29aeeeba' => 
    array (
      0 => 'C:\\wamp\\www\\lbaw\\Overview\\proto\\templates\\users\\register.tpl',
      1 => 1462549008,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '172725734525849fd79-92266011',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'email' => 0,
    'BASE_URL' => 0,
    'FORM_VALUES' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_573452587259a3_38675681',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_573452587259a3_38675681')) {function content_573452587259a3_38675681($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('common/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<div class="container">
  <div id="loginbox" style="<?php if (!$_smarty_tpl->tpl_vars['email']->value) {?> display:none <?php }?> margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">

    <div class="panel panel-info" >
      <div class="panel-heading">
        <div class="panel-title">Entrar</div>
        <div style="float:right; font-size: 80%; position: relative; top:-10px"><a href="#">Esqueceu a password?</a></div>
      </div>

      <div style="padding-top:30px" class="panel-body" >
        <form id="loginform" class="form-horizontal" role="form" action="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
actions/users/login.php" method="post">

          <?php echo $_smarty_tpl->getSubTemplate ('common/status_messages.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


          <div style="margin-bottom: 25px" class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
            <input id="login-email" type="text" class="form-control" name="email" <?php if ($_smarty_tpl->tpl_vars['email']->value) {?> value="<?php echo $_smarty_tpl->tpl_vars['email']->value;?>
" <?php } else { ?> value="<?php echo $_smarty_tpl->tpl_vars['FORM_VALUES']->value['email'];?>
" <?php }?> placeholder="Email">
          </div>

          <div style="margin-bottom: 25px" class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
            <input id="login-password" type="password" class="form-control" name="password" value="<?php echo $_smarty_tpl->tpl_vars['FORM_VALUES']->value['password'];?>
" placeholder="Password">
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

  <div id="signupbox" <?php if ($_smarty_tpl->tpl_vars['email']->value) {?> style="display:none" <?php }?> style="margin-top:50px" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
    <div class="panel panel-info">
      <div class="panel-heading">
        <div class="panel-title">Registar</div>
        <div style="float:right; font-size: 85%; position: relative; top:-10px"><a id="signinlink" href="#" onclick="$('#signupbox').hide(); $('#loginbox').show()">Entrar</a></div>
      </div>
      <div class="panel-body" >

        <form id="signupform" class="form-horizontal" role="form" action="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
actions/users/register.php" method="post" enctype="multipart/form-data" onsubmit="return checkRegisterForm();">

          <?php echo $_smarty_tpl->getSubTemplate ('common/status_messages.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


          <div id="signupalert" style="display:none" class="alert alert-danger">
            <p>Erro: </p>
            <span></span>
          </div>

          <div class="form-group">
            <label for="email" class="col-md-3 control-label">Email</label>
            <div class="col-md-9">
              <input type="email" class="form-control" name="email" placeholder="Email" value="<?php echo $_smarty_tpl->tpl_vars['FORM_VALUES']->value['email'];?>
" required>
            </div>
          </div>

          <div class="form-group">
            <label for="firstname" class="col-md-3 control-label">Nome</label>
            <div class="col-md-9">
              <input type="text" class="form-control" name="firstname" placeholder="Nome" value="<?php echo $_smarty_tpl->tpl_vars['FORM_VALUES']->value['firstname'];?>
" required>
            </div>
          </div>

          <div class="form-group">
            <label for="lastname" class="col-md-3 control-label">Apelido</label>
            <div class="col-md-9">
              <input type="text" class="form-control" name="lastname" placeholder="Apelido" value="<?php echo $_smarty_tpl->tpl_vars['FORM_VALUES']->value['lastname'];?>
" required>
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
                <a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
pages/users/terms_of_use.php" target="_blank" class="fancybox">Termos de Uso</a>.
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

<?php echo $_smarty_tpl->getSubTemplate ('common/footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php }} ?>
