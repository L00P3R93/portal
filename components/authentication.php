<?php
    error_reporting(0);
    session_start();
    require 'dbconn/dbconn.php';
    $_SESSION['username'] = $_GET['user_name'];
?>