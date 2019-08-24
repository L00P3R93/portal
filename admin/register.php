<?php include 'components/session-check-index.php' ?>
<?php require 'connection/dbconn.php'; ?>
<?php include 'controllers/base/head.php' ?>
<style>
        .inputsl{
            font-size: small;
            padding: 4px 11px !important;
        }
         .form-signin {
            width: 100%;
            max-width: 520px;
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

        .tile {
            color: #660000;
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
        ChangeIt();

        function checkPassword(str){
            //at least one number, one lowercase and one uppercase letter
            //at least six characters
            var re = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}$/;
            return re.test(str);
        }
        function checkForm(form){
            if(form.user_name.value==""){
                alert("Error: Username cannot be blank");
                form.user_name.focus();
                return false;
            }
            re = /^\w+$/;
            if(!re.test(form.user_name.value)){
                alert("Error: Username must contain only letters, numbers and underscore!");
                form.user_name.focus();
                return false;
            }
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
<?php //include 'controllers/navigation/nav-before-login.php' ?>

<?php include 'controllers/form/registration-form.php' ?>

</body>