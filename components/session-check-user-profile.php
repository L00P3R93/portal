<?php
    session_start();
    require 'connection/dbconn.php';
    $user_username = mysqli_real_escape_string($database,$_REQUEST['user_name']);
    $current_user = $_SESSION['user_name'];
    if($_SESSION['user_name']){
        header("location:profile.php?user_name=$user_name&current_user=$current_user");
    }
?>