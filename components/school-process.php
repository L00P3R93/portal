<?php
    include '../dbconn/dbconn.php';
    include '../admin/data/data.php';
    $username = $_GET['username'];
    if($_POST){
       $schoolname = mysqli_real_escape_string($dbconn, $_REQUEST['schoolname']);
       $schoolbox = mysqli_real_escape_string($dbconn, $_REQUEST['schoolbox']);
       $town = mysqli_real_escape_string($dbconn, $_REQUEST['town']);
       $fromdate = mysqli_real_escape_string($dbconn, $_REQUEST['fromdate']);
       $todate = mysqli_real_escape_string($dbconn, $_REQUEST['todate']);
       $examtype = mysqli_real_escape_string($dbconn, $_REQUEST['examtype']);
       $grade = mysqli_real_escape_string($dbconn, $_REQUEST['grade']);
       $otherschoolname = mysqli_real_escape_string($dbconn, $_REQUEST['otherschoolname']);
       $otherschoolbox = mysqli_real_escape_string($dbconn, $_REQUEST['otherschoolbox']);
       $othertown = mysqli_real_escape_string($dbconn, $_REQUEST['othertown']);
       $otherfromdate = mysqli_real_escape_string($dbconn, $_REQUEST['otherfromdate']);
       $othertodate = mysqli_real_escape_string($dbconn, $_REQUEST['othertodate']);
       $otherexamtype = mysqli_real_escape_string($dbconn, $_REQUEST['otherexamtype']);
       $othergrade = mysqli_real_escape_string($dbconn, $_REQUEST['othergrade']);

       $schoolid =  mysqli_real_escape_string($dbconn, $_REQUEST['schoolid']);
       $bioid =  mysqli_real_escape_string($dbconn, $_REQUEST['bioid']);
       $applid =  mysqli_real_escape_string($dbconn, $_REQUEST['applid']);
       $courseid =  mysqli_real_escape_string($dbconn, $_REQUEST['courseid']);
       $userid =  mysqli_real_escape_string($dbconn, $_REQUEST['userid']);
       if(isset($schoolid) && !empty($schoolid)){
           //UPDATE
           $sql = "UPDATE biodata SET bio_id='$bioid',user_id='$userid',school_name='$schoolname',school_box='$r$schoolboxegno',
           town='$town',fromdate='$fromdate',todate='$todate',examtype='$examtype',grade='$grade',otherschool_name='$otherschoolname',
           otherschool_box='$otherschoolbox',othertown='$othertown',otherfromdate='$otherfromdate',othertodate='$othertodate',otherexamtype='$otherexamtype',othergrade='$othergrade' WHERE school_id=$schoolid";
            $r = mysqli_query($dbconn, $sql) or die(mysqli_error($dbconn));

            if($r){
               header("location: ../admit.php?user_name=$username&upd=1&step=profile");
            }else{
                header("location: ../admit.php?user_name=$username&upd=0&step=profile");
            }
       }else{
            //INSERT
            $sql = "INSERT INTO schooldata(bio_id,user_id,school_name,school_box,town,fromdate,todate,examtype,grade,otherschool_name,otherschool_box,othertown,otherfromdate,othertodate,otherexamtype,othergrade)
            VALUES('$bioid','$userid','$schoolname','$schoolbox','$town','$fromdate','$todate','$examtype','$grade',
            '$otherschoolname','$otherschoolbox','$othertown','$otherfromdate','$othertodate','$otherexamtype','$othergrade')";
            $r = mysqli_query($dbconn, $sql) or die(mysqli_error($dbconn));

            if($r){
               header("location: ../admit.php?user_name=$username&ins=1&step=profile");
            }else{
                header("location: ../admit.php?user_name=$username&ins=0&step=profile");
            }
       }



    }

?>