<?php
    //ini_set("display_errors",1);
    error_reporting(0);
    require '../connection/dbconn.php';
    require '../data/data.php';
    session_start();
    $username = $_GET['user_name'];
    $pend_app_id = $_GET['apid'];

    if(isset($_GET['act']) && !empty($_GET['act'])){
        $action = $_GET['act'];
        if($action == 'appr'){
            $applcode = get_specific_data($dbconn,'appl_pending','appl_id',$pend_app_id,'appl_code');
            $course_id = get_specific_data($dbconn,'appl_pending','appl_id',$pend_app_id,'course_id');
            $course_code = get_specific_data($dbconn,'appl_pending','appl_id',$pend_app_id,'course_code');
            $course_name = get_specific_data($dbconn,'appl_pending','appl_id',$pend_app_id,'course_name');
            $user_id = get_specific_data($dbconn,'appl_pending','appl_id',$pend_app_id,'user_id');
            $user_name = get_specific_data($dbconn,'appl_pending','appl_id',$pend_app_id,'user_name');
            $approved = 1;
            $approved2 = "Approved";
            $natid = get_specific_data($dbconn,'appl_pending','appl_id',$pend_app_id,'natid');
            $kcse = get_specific_data($dbconn,'appl_pending','appl_id',$pend_app_id,'kcse');
            $reg_no = "STUD-".rand(0,9999)."/".date("Y");

            $sql = "INSERT INTO applications(appl_code,course_id,course_code,course_name,user_id,user_name,reg_no,approved,natid,kcse)
             VALUES('$applcode','$course_id','$course_code','$course_name','$user_id','$user_name','$reg_no','$approved','$natid','$kcse')";
            $r = mysqli_query($dbconn, $sql) or die(mysqli_error($dbconn));

            if($r){
                $sql_upd = "UPDATE appl_pending SET approved='$approved' WHERE appl_id=$pend_app_id";
                $q_upd = mysqli_query($dbconn,$sql_upd) or die(mysqli_error($dbconn));

                $sql_upd2 = "UPDATE users SET appl_status='$approved2' WHERE user_id=$user_id";
                $q_upd2 = mysqli_query($dbconn,$sql_upd2) or die(mysqli_error($dbconn));

                if($q_upd && $q_upd2){
                    header("location: ../apply.php?user_name=$username&res=1");
                }
            }else{
                header("location: ../apply.php?user_name=$username&res=0");
            }

        }else if($action == 'd3l'){

            $sql_del = "DELETE FROM appl_pending WHERE appl_id=$pend_app_id";
            $q_del = mysqli_query($dbconn,$sql_del) or die(mysqli_error($dbconn));
            if($q_del){
                header('location: ../apply.php?user_name='.$username.'&del=success');
            }else{
                header('location: ../apply.php?user_name='.$username.'&del=fail');
            }
        }
    }


?>