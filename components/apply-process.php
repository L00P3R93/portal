<?php
    //ini_set("display_errors",1);
    //error_reporting(0);
    session_start();
    $username = $_GET['user_name'];
    if($_POST){
        require '../dbconn/dbconn.php';
        require '../admin/data/data.php';
        $NewImageName = '';
        $radio = mysqli_real_escape_string($dbconn, $_REQUEST['radio1']);

        if(isset($_REQUEST['applcode']) && !empty($_REQUEST['applcode'])){
            $applcode = mysqli_real_escape_string($dbconn, $_REQUEST['applcode']);
        }else{
            $applcode = "APPL_".rand(0,99999);
        }

        $Destination = '../userfiles/appl_uploads'; 
        if(!isset($_FILES['natid']) || !is_uploaded_file($_FILES['natid']['tmp_name'])){
            $NewDocumentName1= 'None';
            move_uploaded_file($_FILES['natid']['tmp_name'], "$Destination/$NewDocumentName1");
        }
        else{
            $RandomNum = rand(0, 9999999999);
            $ImageName = str_replace(' ','-',strtolower($_FILES['natid']['name']));
            $ImageType = $_FILES['natid']['type'];
            $ImageExt = substr($ImageName, strrpos($ImageName, '.'));
            $ImageExt = str_replace('.','',$ImageExt);
            $ImageName = preg_replace("/\.[^.\s]{3,4}$/", "", $ImageName);
            $NewDocumentName1 = $ImageName.'-'.$RandomNum.'.'.$ImageExt;
            move_uploaded_file($_FILES['natid']['tmp_name'], "$Destination/$NewDocumentName1");
        }

        if(!isset($_FILES['kcse']) || !is_uploaded_file($_FILES['kcse']['tmp_name'])){
            $NewDocumentName2= 'None';
            move_uploaded_file($_FILES['kcse']['tmp_name'], "$Destination/$NewDocumentName2");
        }
        else{
            $RandomNum = rand(0, 9999999999);
            $ImageName = str_replace(' ','-',strtolower($_FILES['kcse']['name']));
            $ImageType = $_FILES['kcse']['type'];
            $ImageExt = substr($ImageName, strrpos($ImageName, '.'));
            $ImageExt = str_replace('.','',$ImageExt);
            $ImageName = preg_replace("/\.[^.\s]{3,4}$/", "", $ImageName);
            $NewDocumentName2 = $ImageName.'-'.$RandomNum.'.'.$ImageExt;
            move_uploaded_file($_FILES['kcse']['tmp_name'], "$Destination/$NewDocumentName2");
        }


        $coursecode = mysqli_real_escape_string($dbconn, $_REQUEST['coursecode']);
        $coursename = mysqli_real_escape_string($dbconn, $_REQUEST['coursename']);
        $courseid = mysqli_real_escape_string($dbconn, $_REQUEST['course_id']);
        $userid = get_specific_data($dbconn, 'users','username',$username,'user_id');

        $sql = "INSERT INTO appl_pending(appl_code,course_id,course_code,course_name,user_id,user_name,natid,kcse) VALUES('$applcode','$courseid','$coursecode','$coursename','$userid','$username','$NewDocumentName1','$NewDocumentName2')";
        $r = mysqli_query($dbconn, $sql) or die(mysqli_error($dbconn));

        if($r){
           header("location: ../apply.php?user_name=$username&res=1");
        }else{
            header("location: ../apply.php?user_name=$username&res=0");
        }
    }


?>