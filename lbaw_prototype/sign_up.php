<?php
include('template/header.html');
?>

<div class="container">

  <div id="loginbox" style="display:none; margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
    <div class="panel panel-info" >
      <div class="panel-heading">
        <div class="panel-title">Sign in</div>
        <div style="float:right; font-size: 80%; position: relative; top:-10px"><a href="#">Forgot your password?</a></div>
      </div>

      <div style="padding-top:30px" class="panel-body" >

        <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>

        <form id="loginform" class="form-horizontal" role="form">

          <div style="margin-bottom: 25px" class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
            <input id="login-username" type="text" class="form-control" name="username" value="" placeholder="Email address">
          </div>

          <div style="margin-bottom: 25px" class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
            <input id="login-password" type="password" class="form-control" name="password" placeholder="Password">
          </div>

          <div class="input-group">
            <div class="checkbox">
              <label>
                <input id="login-remember" type="checkbox" name="remember" value="1"> Remember me
              </label>
            </div>
          </div>

          <div style="margin-top:10px" class="form-group">
            <!-- Button -->
            <div class="col-sm-12 controls">
              <button id="btn-signin" type="button" class="btn btn-primary"><i class="icon-hand-right"></i>Sign in </button>
              <a id="btn-fblogin" href="#" class="btn btn-fb"><i class="fa fa-facebook"></i> Sign in with Facebook </a>
              <a id="btn-twlogin" href="#" class="btn btn-tw"><i class="fa fa-twitter"></i> Sign in with Twitter </a>
            </div>
          </div>

          <div class="form-group">
            <div class="col-md-12 control">
              <div style="border-top: 1px solid#888; padding-top:15px; font-size:85%" >
                New here?
                <a href="#" onClick="$('#loginbox').hide(); $('#signupbox').show()">
                  Sign up
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
        <div class="panel-title">Sign up</div>
        <div style="float:right; font-size: 85%; position: relative; top:-10px"><a id="signinlink" href="#" onclick="$('#signupbox').hide(); $('#loginbox').show()">Sign in</a></div>
      </div>
      <div class="panel-body" >
        <form id="signupform" class="form-horizontal" role="form">

          <div id="signupalert" style="display:none" class="alert alert-danger">
            <p>Error: </p>
            <span></span>
          </div>

          <div class="form-group">
            <label for="email" class="col-md-3 control-label">Email</label>
            <div class="col-md-9">
              <input type="text" class="form-control" name="email" placeholder="Email Address">
            </div>
          </div>

          <div class="form-group">
            <label for="firstname" class="col-md-3 control-label">First Name</label>
            <div class="col-md-9">
              <input type="text" class="form-control" name="firstname" placeholder="First Name">
            </div>
          </div>

          <div class="form-group">
            <label for="lastname" class="col-md-3 control-label">Last Name</label>
            <div class="col-md-9">
              <input type="text" class="form-control" name="lastname" placeholder="Last Name">
            </div>
          </div>

          <div class="form-group">
            <label for="password" class="col-md-3 control-label">Password</label>
            <div class="col-md-9">
              <input type="password" class="form-control" name="passwd" placeholder="Password">
            </div>
          </div>

          <div class="form-group">
            <label for="password_conf" class="col-md-3 control-label"></label>
            <div class="col-md-9">
              <input type="password" class="form-control" name="passwd_conf" placeholder="Confirm Password">
            </div>
          </div>

          <div class="form-group">
            <label for="password_conf" class="col-md-3 control-label"></label>
            <div class="col-md-9">
              <label class="control-label">
                 <input type="checkbox"> I have read and accepted the
                 <a href="./terms_of_use.php" target="_blank">Terms of Use</a>.
              </label>
            </div>
          </div>

          <div class="form-group">
            <!-- Button -->
            <div class="col-md-offset-3 col-md-9">
              <button id="btn-signup" type="button" class="btn btn-primary"><i class="icon-hand-right"></i>Sign up</button>
            </div>
          </div>

          <div style="border-top: 1px solid #999; padding-top:20px"  class="form-group">

            <div class="col-md-offset-3 col-md-9">
              <div class="social-buttons">
                <a href="#" class="btn btn-fb"><i class="fa fa-facebook"></i> Sign up with Facebook</a>
                <a href="#" class="btn btn-tw"><i class="fa fa-twitter"></i> Sign up with Twitter</a>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<?php
include('template/footer.html');
?>
