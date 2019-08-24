<?php
  if($_POST){
    require '../connection/dbconn.php';
    require '../data/data.php';
    $userid = mysqli_real_escape_string($dbconn, $_REQUEST['userid']);
    $admstatus = 'Approved';
    $student_status = 'Approved';
    $sql = "UPDATE users SET adm_status='$admstatus', student_status='$student_status' WHERE user_id='$userid'";
    $q = mysqli_query($dbconn,$sql) or die(mysqli_error($dbconn));
    if($q){
        header('location: ../admit.forms.php?id='.$userid.'&app=success');
    }else{
        header('location: ../admit.forms.php?id='.$userid.'&app=fail');
    }
}


?>