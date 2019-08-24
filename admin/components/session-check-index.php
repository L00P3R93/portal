<?php
    session_start();
    error_reporting(0);
    require 'connection/dbconn.php';
    if($_SESSION['username']){
        header("location:home.php");
    }
?>