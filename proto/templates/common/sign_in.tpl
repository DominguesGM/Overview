<ul id="login-dp" class="dropdown-menu">
  <li>
    <div class="row">
      <div class="col-md-12">
        Entrar com
        <div class="social-buttons">
          <a href="#" class="btn btn-fb"><i class="fa fa-facebook"></i> Facebook</a>
          <a href="#" class="btn btn-tw"><i class="fa fa-twitter"></i> Twitter</a>
        </div>
        ou
        <form class="form" role="form" method="post" action="{$BASE_URL}actions/users/login.php" accept-charset="UTF-8" id="login-nav">
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
        Novo aqui? <a href="{$BASE_URL}pages/users/register.php"><b>Registar</b></a>
      </div>
    </div>
  </li>
</ul>
