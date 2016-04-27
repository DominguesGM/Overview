<?php /* Smarty version Smarty-3.1.15, created on 2016-04-27 11:18:21
         compiled from "C:\wamp\www\Overview\proto\templates\common\sign_in.tpl" */ ?>
<?php /*%%SmartyHeaderCode:3375571fb560e0e3c5-92990932%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '161b7ee619dd578340ffef9f6dfae19933140b0c' => 
    array (
      0 => 'C:\\wamp\\www\\Overview\\proto\\templates\\common\\sign_in.tpl',
      1 => 1461716983,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3375571fb560e0e3c5-92990932',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_571fb560e1cd44_90650752',
  'variables' => 
  array (
    'BASE_URL' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_571fb560e1cd44_90650752')) {function content_571fb560e1cd44_90650752($_smarty_tpl) {?><ul id="login-dp" class="dropdown-menu">
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
            <label class="sr-only" for="exampleInputEmail2">Email </label>
            <input type="email" class="form-control" id="exampleInputEmail2" placeholder="Email" required>
          </div>
          <div class="form-group">
            <label class="sr-only" for="exampleInputPassword2">Password</label>
            <input type="password" class="form-control" id="exampleInputPassword2" placeholder="Password" required>
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
