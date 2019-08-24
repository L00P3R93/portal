<?php
    //ini_set("display_errors",1);
    error_reporting(0);
    require '../connection/dbconn.php';
    require '../data/data.php';
    session_start();
    $username = $_GET['user_name'];
    $approved_app_id = $_REQUEST['del_appl_id'];
    if(isset($_REQUEST['del_btn2'])){
    
        $sql_del = "DELETE FROM applications WHERE appl_id=$approved_app_id";
        $q_del = mysqli_query($dbconn,$sql_del) or die(mysqli_error($dbconn));
        if($q_del){
            header('location: ../apply.php?user_name='.$username.'&del=success');
        }else{
            header('location: ../apply.php?user_name='.$username.'&del=fail');
        }
    }

?>