<?php
    session_start();
    require '../dbconn/dbconn.php';
    session_destroy();
    header('location:../index.php?logout=success');
?>