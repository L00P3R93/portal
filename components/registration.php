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
        $level=$_REQUEST['level'];

        if($level=='farmers'){
            $sql1="INSERT INTO farmers(username,f_name,l_name,password,email,join_date) VALUES('$user_name','$user_firstname','$user_lastname','$user_password','$user_email',CURRENT_TIMESTAMP)";
            mysqli_query($dbconn,$sql1) or die(mysqli_error($dbconn));
            $_SESSION['username'] = $user_name;
            header('Location: ../update-profile-after-registration.php?user_name='.$user_name.'&lvl='.$level);
        }else if($level=='vendors'){
             $sql2="INSERT INTO vendors(username,f_name,l_name,password,email,join_date) VALUES('$user_name','$user_firstname','$user_lastname','$user_password','$user_email',CURRENT_TIMESTAMP)";
            mysqli_query($dbconn,$sql2) or die(mysqli_error($dbconn));
            $_SESSION['username'] = $user_name;
            header('Location: ../update-profile-after-registration.php?user_name='.$user_name.'&lvl='.$level);
        }else if($level=='agents'){
             $sql3="INSERT INTO agents(username,f_name,l_name,password,email,join_date) VALUES('$user_name','$user_firstname','$user_lastname','$user_password','$user_email',CURRENT_TIMESTAMP)";
            mysqli_query($dbconn,$sql3) or die(mysqli_error($dbconn));
            $_SESSION['username'] = $user_name;
            header('Location: ../update-profile-after-registration.php?user_name='.$user_name.'&lvl='.$level);
        }

    }
?>