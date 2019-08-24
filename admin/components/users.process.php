<?php
    //ini_set("display_errors",1);
    //error_reporting(0);
    require '../connection/dbconn.php';
    require '../data/data.php';
    session_start();
    $username = $_GET['user_name'];
    $userid = mysqli_real_escape_string($dbconn,$_REQUEST['del_user_id']);
    if(isset($_REQUEST['del_btn'])){
        $sql_del = "DELETE FROM users WHERE user_id=$userid";
        $q_del = mysqli_query($dbconn,$sql_del) or die(mysqli_error($dbconn));
        if($q_del){
            header('location: ../users.php?user_name='.$username.'&del=success');
        }else{
            header('location: ../users.php?user_name='.$username.'&del=fail');
        }
    }


?>