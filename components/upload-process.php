<?php
    require '../dbconn/dbconn.php';
    $username = $_GET['username'];
    if($_POST){
        $Destination = '../userfiles/appl_uploads';

        if(!isset($_FILES['document']) || !is_uploaded_file($_FILES['document']['tmp_name'])){
            $NewDocumentName= 'None';
            move_uploaded_file($_FILES['document']['tmp_name'], "$Destination/$NewDocumentName");
        }
        else{
            $RandomNum = rand(0, 9999999999);
            $ImageName = str_replace(' ','-',strtolower($_FILES['document']['name']));
            $ImageType = $_FILES['document']['type'];
            $ImageExt = substr($ImageName, strrpos($ImageName, '.'));
            $ImageExt = str_replace('.','',$ImageExt);
            $ImageName = preg_replace("/\.[^.\s]{3,4}$/", "", $ImageName);
            $NewDocumentName = $ImageName.'-'.$RandomNum.'.'.$ImageExt;
            move_uploaded_file($_FILES['document']['tmp_name'], "$Destination/$NewDocumentName");
        }

        $applid = mysqli_real_escape_string($dbconn, $_REQUEST['applid']);
        $userid = mysqli_real_escape_string($dbconn, $_REQUEST['userid']);
        $docname = mysqli_real_escape_string($dbconn, $_REQUEST['documentname']);

        $sql="INSERT INTO uploads(appl_id,user_id,doc_name,doc_file) VALUES('$applid','$userid','$docname','$NewDocumentName')";
        $r = mysqli_query($dbconn, $sql) or die(mysqli_error($dbconn));
        if($r){
           header("location: ../admit.php?user_name=$username&ins=1&step=uploads");
        }else{
            header("location: ../admit.php?user_name=$username&ins=0&step=uploads");
        }
    }

?>