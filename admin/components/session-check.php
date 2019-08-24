<?php
    session_start();
    require 'connection/dbconn.php';
    if(!$_SESSION['username']){
        header("location:login.php?session=notset");
    }
?>