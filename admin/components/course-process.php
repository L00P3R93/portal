<?php

    //ini_set("display_errors",1);
    error_reporting(0);
    session_start();
    $username=$_SESSION['username'];

    if($_POST ){
        require '../connection/dbconn.php';
        require '../data/data.php';
        if(isset($_POST['tsave_btn']) && $_POST['tsave_btn'] == "Save Course"){
            $courseid = mysqli_real_escape_string($dbconn, $_REQUEST['other_course_id']);
            $math = mysqli_real_escape_string($dbconn, $_REQUEST['tmath']);
            $eng = mysqli_real_escape_string($dbconn, $_REQUEST['teng']);
            $phy = mysqli_real_escape_string($dbconn, $_REQUEST['tphy']);
            $chem = mysqli_real_escape_string($dbconn, $_REQUEST['tchem']);
            $bio = mysqli_real_escape_string($dbconn, $_REQUEST['tbio']);

            $sql = "UPDATE courses SET math='$math',eng='$eng',physics='$phy',chem='$chem',bio='$bio' WHERE course_id='$courseid'";
            $r = mysqli_query($dbconn, $sql) or die(mysqli_error($dbconn));

            if($r){
                header("location: ../courses.php?user_name=$username&url=course&tupd=1&id=$courseid");
            }else{
                header("location: ../courses.php?user_name=$username&url=course&tupd=0&id=$courseid");
            }

        }else if(isset($_POST['del_btn']) && $_POST['del_btn'] == "Delete Course"){
            $courseid = mysqli_real_escape_string($dbconn, $_REQUEST['del_course_id']);
            $sql_del = "DELETE FROM courses WHERE course_id = $courseid";
            $r_del = mysqli_query($dbconn, $sql_del);
            if($r_del){
                header("location: ../courses.php?user_name=$username&url=course&del=1&id=$courseid");
            }else{
                header("location: ../courses.php?user_name=$username&url=course&del=0&id=$courseid");
            }
        }
    }

?>