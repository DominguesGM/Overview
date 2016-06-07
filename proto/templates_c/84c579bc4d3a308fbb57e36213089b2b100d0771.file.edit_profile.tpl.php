<?php /* Smarty version Smarty-3.1.15, created on 2016-06-07 03:11:40
         compiled from "C:\wamp\www\lbaw\Overview\proto\templates\users\edit_profile.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2423857561f4c752310-14446530%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '84c579bc4d3a308fbb57e36213089b2b100d0771' => 
    array (
      0 => 'C:\\wamp\\www\\lbaw\\Overview\\proto\\templates\\users\\edit_profile.tpl',
      1 => 1465261818,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2423857561f4c752310-14446530',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'BASE_URL' => 0,
    'ID' => 0,
    'EMAIL' => 0,
    'FIRST_NAME' => 0,
    'LAST_NAME' => 0,
    'user' => 0,
    'PICTURE' => 0,
    'TYPE' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_57561f4c80e755_23647471',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_57561f4c80e755_23647471')) {function content_57561f4c80e755_23647471($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('common/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<div class="container">
  <div style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
    <div class="panel panel-info">
      <div class="panel-heading">
        <div class="panel-title">Editar perfil</div>
      </div>
      <div class="panel-body" >

        <form id="profileform" class="form-horizontal" role="form" action="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
actions/users/update_profile.php" method="post" enctype="multipart/form-data" onsubmit="return checkProfileForm();">
          <?php echo $_smarty_tpl->getSubTemplate ('common/status_messages.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

          <div id="profile-alert"></div>

          <input type="hidden" id="user-id" name="user-id" value="<?php echo $_smarty_tpl->tpl_vars['ID']->value;?>
">

          <div class="form-group">
            <label for="email" class="col-md-3 control-label">Email</label>
            <div class="col-md-9">
              <input type="email" class="form-control" name="email" placeholder="Email" value="<?php echo $_smarty_tpl->tpl_vars['EMAIL']->value;?>
" required readonly="">
            </div>
          </div>

          <div class="form-group">
            <label for="firstname" class="col-md-3 control-label">Nome</label>
            <div class="col-md-9">
              <input type="text" class="form-control" name="firstname" placeholder="Nome" value="<?php echo $_smarty_tpl->tpl_vars['FIRST_NAME']->value;?>
" required>
            </div>
          </div>

          <div class="form-group">
            <label for="lastname" class="col-md-3 control-label">Apelido</label>
            <div class="col-md-9">
              <input type="text" class="form-control" name="lastname" placeholder="Apelido" value="<?php echo $_smarty_tpl->tpl_vars['LAST_NAME']->value;?>
" required>
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
              <textarea style="overflow:auto;resize:vertical" class="form-control" name="about" rows="5" placeholder="Escreva qualquer coisa sobre si..." required><?php echo $_smarty_tpl->tpl_vars['user']->value['about'];?>
</textarea>
            </div>
          </div>

          <div class="form-group">
            <input type="hidden" id="picture_id" name="picture_id" value="<?php echo $_smarty_tpl->tpl_vars['user']->value['picture'];?>
">
            <label for="photo" class="col-md-3 control-label">Fotografia</label>
            <div class="col-md-9">
              <div class='col-sm-9 col-xs-9 col-md-9 col-lg-9'>
                <a class="thumbnail fancybox" rel="ligthbox" href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
<?php echo $_smarty_tpl->tpl_vars['PICTURE']->value;?>
">
                  <img class="img-responsive" src="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
<?php echo $_smarty_tpl->tpl_vars['PICTURE']->value;?>
" data-toggle="tooltip" title="Fotografia atual" data-placement="right"/>
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
              <?php if ($_smarty_tpl->tpl_vars['ID']->value==$_smarty_tpl->tpl_vars['user']->value['id']&&$_smarty_tpl->tpl_vars['TYPE']->value!='Administrator') {?>
              <button type="button" onclick="deactivateAccount()" class="btn btn-primary">
                <span class="glyphicon glyphicon-trash"></span> Desativar
              </button>

              <span class="pull-right">&nbsp;</span>
              <?php }?>

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
<script src="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
lib/bootbox/bootbox.min.js"></script>
<script src="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
javascript/edit_profile.js"></script>

<?php echo $_smarty_tpl->getSubTemplate ('common/footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php }} ?>
