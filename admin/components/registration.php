<?php
    session_start();
    include '../connection/dbconn.php';
    if(isset($_REQUEST['signup_button'])){
        $user_email=$_REQUEST['user_email'];
        $user_firstname=$_REQUEST['user_firstname'];
        //$user_middlename = $_REQUEST['user_middlename'];
        $user_lastname=$_REQUEST['user_lastname'];
        $user_name=$_REQUEST['user_name'];
        $user_password=$_REQUEST['user_password'];
        $user_password2=$_REQUEST['user_password2'];
        //$level=$_REQUEST['level'];
        $reset = rand(0,99999);

        $sql1="INSERT INTO users(username,password,reset_phrase,f_name,l_name,email,join_date) VALUES('$user_name','$user_password2','$reset','$user_firstname','$user_lastname','$user_email',CURRENT_TIMESTAMP)";
        mysqli_query($dbconn,$sql1) or die(mysqli_error($dbconn));
        $_SESSION['username'] = $user_name;
        header('Location: ../update-profile-after-registration.php?user_name='.$user_name.'');

    }
?>