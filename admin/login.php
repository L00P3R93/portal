<?php //include 'components/session-check-index.php' ?>
<?php include 'controllers/base/head.php' ?>
<?php
error_reporting(0);
if(isset($_GET['reset'])){
  $reset_url = $_GET['reset'];
  if($reset_url == 'success'){
        $message="Password Changed Successfully. Please Log In.";
  }else{
        $message="Error! Password Update Process Failed. Try again";
  }
}

?>
<style type="text/css">
    .form-signin {
      width: 100%;
      max-width: 420px;
      padding: 15px;
      margin: 0 auto;
    }

    .form-label-group {
      position: relative;
      margin-bottom: 1rem;
    }

    .form-label-group > input,
    .form-label-group > label {
      padding: var(--input-padding-y) var(--input-padding-x);
    }

    .form-label-group > label {
      position: absolute;
      top: 0;
      left: 0;
      display: block;
      width: 100%;
      margin-bottom: 0; /* Override default `<label>` margin */
      line-height: 1.5;
      color: #495057;
      border: 1px solid transparent;
      border-radius: .25rem;
      transition: all .1s ease-in-out;
    }

    .form-label-group input::-webkit-input-placeholder {
      color: transparent;
    }

    .form-label-group input:-ms-input-placeholder {
      color: transparent;
    }

    .form-label-group input::-ms-input-placeholder {
      color: transparent;
    }

    .form-label-group input::-moz-placeholder {
      color: transparent;
    }

    .form-label-group input::placeholder {
      color: transparent;
    }

    .form-label-group input:not(:placeholder-shown) {
      padding-top: calc(var(--input-padding-y) + var(--input-padding-y) * (2 / 3));
      padding-bottom: calc(var(--input-padding-y) / 3);
    }

    .form-label-group input:not(:placeholder-shown) ~ label {
      padding-top: calc(var(--input-padding-y) / 3);
      padding-bottom: calc(var(--input-padding-y) / 3);
      font-size: 12px;
      color: #777;
    }
    .login-main {
        max-width: 320px;
        margin: 0 auto;
    }
    .logger{
        color: #3bc492;
    }

    :root {
      --input-padding-x: .75rem;
      --input-padding-y: .75rem;
    }

    html,
    body {
      height: 100%;
    }

    body {
      display: -ms-flexbox;
      display: -webkit-box;
      display: flex;
      -ms-flex-align: center;
      -ms-flex-pack: center;
      -webkit-box-align: center;
      align-items: center;
      -webkit-box-pack: center;
      justify-content: center;
      padding-top: 40px;
      padding-bottom: 40px;
      background-color: #f5f5f5;
    }


    .form-control {
        display: block !important;
        width: 100% !important;
        padding: .375rem .75rem;
        font-size: 1rem !important;
        line-height: 1.5 !important;
        color: #495057 !important;
        background-color: #fff !important;
        background-clip: padding-box !important;
        border: 1px solid #ced4da !important;
        border-radius: .25rem !important;
        transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out !important;
    }

</style>

<body>
    <script type="text/javascript">
        //ChangeIt();
    </script>
    <form class="form-signin" role="form" action="components/login-process.php" method="post">
        <?php
               if(isset($_GET['reset'])){
            ?>
            <div id="messageBox" class="alert alert-success" role="alert">
                <h5><?php echo $message;?></h5>
            </div>
            <?php } ?>
            <div class="text-center mb-4">
                <h1 class="h3 mb-3 font-weight-normal">Please <span class="logger">Log In</span> or <a href="register.php">Sign Up</a></h1>
            </div>

            <div class="form-label-group">
                <input type="text" id="username" name="username" class="form-control" placeholder="Email address" required autofocus>
                <label for="username">Username</label>
            </div>

            <div class="form-label-group">
                <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required>
                <label for="inputPassword">Password</label>
            </div>

            <div class="checkbox mb-3">
                <label>
                  <a href="forgot.php">Forgot Your Password?</a>
                </label>
            </div>
            <button class="btn btn-lg btn-primary btn-block" type="submit" name="login_button">Sign in</button>
            <p class="mt-5 mb-3 text-muted text-center">&copy; 2017-2018</p>
            <div>
                <a id="back2blog" class="mt-5 mb-3 text-center" href="../index.php"><b>Back to UEAB Home Page</b></a>
            </div>
    </form>
    <!--<div class="container">
        <div class="row">
            <?php
               if(isset($_GET['reset'])){
            ?>
            <div id="messageBox" class="alert alert-success" role="alert">
                <h5><?php echo $message;?></h5>
            </div>
            <?php } ?>
          <div class="login-main">
              <h3 style="color:#65aeee;">Please <span class="logger">Log In</span> or <a href="register.php">Sign Up</a></h3>

              <form role="form" action="components/login-process.php" method="post" name="login">
                  <div id="pics">
                      <ul id="logos">
                          <li><img class="size" src="assets/img/facebook.png" /></li>
                          <li><img class="size" src="assets/img/google-plus.png" /></li>
                          <li><img class="size" src="assets/img/instagram.png" /></li>
                          <li><img class="size" src="assets/img/linkedin.png" /></li>
                          <li><img class="size" src="assets/img/twitter.png" /></li>
                      </ul>
                  </div>
                  <hr />
                  <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon">Username or Email:</span>
                            <input type="text" class="form-control" id="inputUsernameEmail" name="username" placeholder="Username" autocomplete="off">
                        </div>
                  </div>
                  <div class="form-group">
                       <div class="input-group">
                            <span class="input-group-addon">Password:</span>
                            <input type="password" class="form-control" id="inputPassword" name="password" placeholder="Password" autocomplete="off">
                       </div>
                  </div>
                   <div class="form-group">
                        <a href="forgot.php">Forgot Password</a>
                    </div>
                  <button type="submit" class="btn btn btn-primary ladda-button" data-style="zoom-in" value="Sign In" name="login_button">
                      Log In
                  </button>
              </form>
            </div>
        </div>-->

    <!--</div>-->
</body>