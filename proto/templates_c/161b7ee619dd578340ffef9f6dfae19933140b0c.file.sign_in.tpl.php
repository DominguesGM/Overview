<?php /* Smarty version Smarty-3.1.15, created on 2016-05-04 12:50:09
         compiled from "C:\wamp\www\Overview\proto\templates\common\sign_in.tpl" */ ?>
<?php /*%%SmartyHeaderCode:54535729d3e17275b9-17245940%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '161b7ee619dd578340ffef9f6dfae19933140b0c' => 
    array (
      0 => 'C:\\wamp\\www\\Overview\\proto\\templates\\common\\sign_in.tpl',
      1 => 1461784723,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '54535729d3e17275b9-17245940',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'BASE_URL' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_5729d3e17c0142_88462718',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5729d3e17c0142_88462718')) {function content_5729d3e17c0142_88462718($_smarty_tpl) {?><ul id="login-dp" class="dropdown-menu">
  <li>
    <div class="row">
      <div class="col-md-12">
        Entrar com
        <div class="social-buttons">
          <a href="#" class="btn btn-fb"><i class="fa fa-facebook"></i> Facebook</a>
          <a href="#" class="btn btn-tw"><i class="fa fa-twitter"></i> Twitter</a>
        </div>
        ou
        <form class="form" role="form" method="post" action="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
actions/users/login.php" accept-charset="UTF-8" id="login-nav">
          <div class="form-group">
            <label class="sr-only" for="email">Email </label>
            <input type="email" class="form-control" name="email" placeholder="Email" required>
          </div>
          <div class="form-group">
            <label class="sr-only" for="password">Password</label>
            <input type="password" class="form-control" name="password" placeholder="Password" required>
            <div class="help-block text-right"><a href="">Esqueceu a password?</a></div>
          </div>
          <div class="form-group">
            <button type="submit" class="btn btn-primary btn-block">Entrar</button>
          </div>
        </form>
      </div>
      <div class="bottom text-center">
        Novo aqui? <a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
pages/users/register.php"><b>Registar</b></a>
      </div>
    </div>
  </li>
</ul>
<?php }} ?>
