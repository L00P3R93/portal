<?php
    session_start();
    if(isset($_REQUEST['login_button'])||$_REQUEST['auto']==1){
        require '../connection/dbconn.php';
        $errmsg_arr = array();
        $errflag = false;
        $username=  mysqli_real_escape_string($dbconn,$_GET['username']);
        $password=  mysqli_real_escape_string($dbconn,$_GET['password']);
        if($username == '') {
            $errmsg_arr[] = 'Username missing';
            $errflag = true;
        }
        if($password == '') {
            $errmsg_arr[] = 'Password missing';
            $errflag = true;
        }
        if($errflag) {
            $_SESSION['ERRMSG_ARR'] = $errmsg_arr;
            session_write_close();
            header("location: authentication-check.php");
            exit();
        }

        $sql3="SELECT * FROM vendors WHERE username='$username'AND password='$password'";
        $res3=  mysqli_query($dbconn,$sql3) or die(mysqli_errno());


        $trws3= mysqli_num_rows($res3);

        if($trws3==1 && $res3){

            $rws=  mysqli_fetch_array($res1=3);
            $_SESSION['username']=$rws['username'];
            $_SESSION['password']=$rws['password'];
            $level = $rws['level'];
            //header("location:../loader.php");
            header("location:../../vendors/home.php?user_name=$username&lvl=$level&request=login&status=success");
        }else {
            $errmsg_arr[] = 'username and password not found';
            $errflag = true;
            if($errflag) {
                $_SESSION['ERRMSG_ARR'] = $errmsg_arr;
                session_write_close();
                header("location: ../components/authentication-check.php");
                exit();
            }
        }
    }
?>