<?php
    session_start();
    require 'dbconn/dbconn.php';
    if(!$_SESSION['username']){
        //header("location:../admin/login.php?session=notset");
    }
?>