<?php include 'connection/dbconn.php' ?>
<?php include 'controllers/base/head.php' ?>
<?php

  if(isset($_REQUEST['reset_button'])){
        $user_name=$_REQUEST['username'];
        $email = $_REQUEST['username'];
        //$level=$_REQUEST['level'];
        $reset = $_REQUEST['reset'];
        $message="";
        $sql = "SELECT * FROM users WHERE reset_phrase='$reset' AND username='$user_name'";
        $r = mysqli_query($dbconn,$sql);
        $rws = mysqli_num_rows($r);
        if($rws == 1){
            $user = mysqli_fetch_array($r);
            $reset = rand(0,99999);
            $message = "Success! New Reset Code is ".$reset.". Do NOT forget this Reset Code";
        }else{
            $message = "Error: Reset Code does not Exist!";
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
<script type="text/javascript">
        ChangeIt();


        function checkPassword(str){
            //at least one number, one lowercase and one uppercase letter
            //at least six characters
            var re = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}$/;
            return re.test(str);
        }
        function checkForm(form){
            if(form.user_password.value != "" && form.user_password.value == form.user_password2.value){
                if(!checkPassword(form.user_password.value)){
                    alert("The Password must contain one Number, one Lowercase and one Uppercase letter");
                    form.user_password.focus();
                    return false;
                }
            }else{
                alert("Error: Password do not match!");
                form.user_password.focus();
                return false;
            }
            return true;
        }
    </script>
<body>
    <form class="form-signin" role="form" action="components/update-pswd-process.php?usn=<?php echo $user['username'];?>&reset=<?php echo $reset;?>" method="post" enctype="multipart/form-data">
        <div class="text-center mb-4">
            <h1 class="h3 mb-3 font-weight-normal">Fill in Your Username or Email and Your Reset Code: </h1>
        </div>
        <div class="text-center mb-4">
            <?php if(!empty($message)){ ?>
            <div id="alertDiv" class="alert alert-success" role="alert">
                <h4><?php echo $message;?></h4>
            </div>
            <?php } ?>
        </div>
        <div class="form-label-group">
            <input type="text" id="username" name="username" class="form-control" placeholder="Username" readonly required autofocus>
            <label for="username">Username</label>
        </div>

        <div class="form-label-group">
            <input type="text" id="update_reset" name="update_reset" class="form-control" placeholder="Reset Code" value="<?php echo $reset; ?>" readonly required>
            <label for="update_reset">New Reset Code</label>
        </div>

        <div class="form-label-group">
            <input type="password" id="user_password" name="user_password" class="form-control" placeholder="Enter New Password" required>
            <label for="user_password">New Password</label>
        </div>

        <div class="form-label-group">
            <input type="password" id="user_password2" name="user_password2" class="form-control" placeholder="Confirm New Password" required>
            <label for="user_password2">Confirm Password</label>
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit" name="update_button">Submit</button>
        <p class="mt-5 mb-3 text-muted text-center">&copy; 2017-2018</p>
        <div>
            <a id="back2blog" class="mt-5 mb-3 text-center" href="../index.php"><b>Back to UEAB Home Page</b></a>
        </div>
    </form>
</body>