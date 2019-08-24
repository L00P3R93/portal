<?php
    if($_POST){
        include '../connection/dbconn.php';
        require '../data/data.php';
        $user_name=mysqli_real_escape_string($dbconn,$_GET['usn']);
        //$level=mysqli_real_escape_string($dbconn,$_GET['level']);
        $reset = mysqli_real_escape_string($dbconn,$_GET['reset']);
        $password1 = mysqli_real_escape_string($dbconn,$_REQUEST['user_password']);
        $password2 = mysqli_real_escape_string($dbconn,$_REQUEST['user_password2']);
        $user_id = get_specific_data($dbconn,'users','username',$user_name,'user_id');

        $sql1="UPDATE users SET password='$password1',reset_phrase='$reset' WHERE user_id=$user_id";
        $r = mysqli_query($dbconn,$sql1);
        if($r){
            header('Location: ../login.php?reset=success');
        }else{
            header('Location: ../login.php?reset=fail');
        }

    }
?>
