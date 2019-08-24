<?php
    //ini_set("display_errors",1);
    error_reporting(0);
    session_start();
    $temp=$_SESSION['username'];
    require '../connection/dbconn.php';
    require '../data/data.php';
    $userid= mysqli_real_escape_string($dbconn,$_REQUEST['user_id']);
    //$upllevel= mysqli_real_escape_string($dbconn,$_REQUEST['uploader_level']);
    $userlevel= mysqli_real_escape_string($dbconn,$_REQUEST['user_level']);
	$username = mysqli_real_escape_string($dbconn,$_REQUEST['user_username']);
    $table = mysqli_real_escape_string($dbconn,$_REQUEST['user_table']);
    if(isset($_REQUEST['user_suspend'])){
     //Upload product image to database
        $sql1="UPDATE $table SET suspend=0 WHERE id=$userid";
        $r=mysqli_query($dbconn,$sql1)or die(mysqli_error($dbconn));
        if($r){
            header("location:../users.php?username=$username&id=$userid&url=users&sus=success");
        }else{
            header("location:../users.php?username=$username&id=$userid&url=users&sus=fail");
        }

    }else if(isset($_REQUEST['user_delete'])) {
        $sql2="DELETE FROM $table WHERE id=$userid";
        $r=mysqli_query($dbconn,$sql2)or die(mysqli_error($dbconn));
        if($r){
            header("location:../users.php?username=$username&id=$userid&url=users&del=success");
        }else{
            header("location:../users.php?username=$username&id=$userid&url=users&del=fail");
        }
    }
?>