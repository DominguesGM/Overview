<?php /* Smarty version Smarty-3.1.15, created on 2016-04-28 01:48:26
         compiled from "C:\wamp\www\Overview\proto\templates\users\register.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1273557214fcad178a7-46195800%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3cb7c00e1d46c10e1c4d0b43e34079a9cc60d417' => 
    array (
      0 => 'C:\\wamp\\www\\Overview\\proto\\templates\\users\\register.tpl',
      1 => 1461796505,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1273557214fcad178a7-46195800',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'ID' => 0,
    'BASE_URL' => 0,
    'FORM_VALUES' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_57214fcb29c800_55352681',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_57214fcb29c800_55352681')) {function content_57214fcb29c800_55352681($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('common/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<?php if ($_smarty_tpl->tpl_vars['ID']->value) {?>
  header('Location: ' . $BASE_URL);
<?php }?>

<div class="container">

  <div id="loginbox" style="display:none; margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
    <div class="panel panel-info" >
      <div class="panel-heading">
        <div class="panel-title">Entrar</div>
        <div style="float:right; font-size: 80%; position: relative; top:-10px"><a href="#">Esqueceu a password?</a></div>
      </div>

      <div style="padding-top:30px" class="panel-body" >

        <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>

        <form id="loginform" class="form-horizontal" role="form" action="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
actions/users/login.php" method="post">

          <div style="margin-bottom: 25px" class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
            <input id="login-email" type="text" class="form-control" name="email" value="<?php echo $_smarty_tpl->tpl_vars['FORM_VALUES']->value['email'];?>
" placeholder="Email">
          </div>

          <div style="margin-bottom: 25px" class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
            <input id="login-password" type="password" class="form-control" name="password" value="<?php echo $_smarty_tpl->tpl_vars['FORM_VALUES']->value['password'];?>
" placeholder="Password">
          </div>

          <div style="margin-top:10px" class="form-group">
            <!-- Button -->
            <div class="col-sm-12 controls">
              <input type="submit" id="btn-signup" type="button" class="btn btn-primary" value="Entrar">
              <!--<input type="submit" id="btn-signin" type="button" class="btn btn-primary"><i class="icon-hand-right"></i>Entrar </button>-->
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

  <div id="signupbox" style="margin-top:50px" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
    <div class="panel panel-info">
      <div class="panel-heading">
        <div class="panel-title">Registar</div>
        <div style="float:right; font-size: 85%; position: relative; top:-10px"><a id="signinlink" href="#" onclick="$('#signupbox').hide(); $('#loginbox').show()">Entrar</a></div>
      </div>
      <div class="panel-body" >
        <form id="signupform" class="form-horizontal" role="form" action="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
actions/users/register.php" method="post" enctype="multipart/form-data" onsubmit="return checkRegisterForm();">

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
              <?php echo $_smarty_tpl->getSubTemplate ('common/browse_button.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

            </div>
          </div>

          <div class="form-group">
                <div class="col-md-offset-3 col-md-9">
                <label class="control-label">
                 <input type="checkbox" id="terms"> Li e aceito os
                   <a href="./terms_of_use.php" target="_blank" required>Termos de Uso</a>.
                </label>
              </div>
            </div>

          <div class="form-group">
            <!-- Button -->
            <div class="col-md-offset-3 col-md-9">
              <!--<button id="btn-signup" type="button" class="btn btn-primary"><i class="icon-hand-right"></i>Sign up</button>-->
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
