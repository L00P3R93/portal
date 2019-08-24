<?php
    require '../dbconn/dbconn.php';
    $username = mysqli_real_escape_string($dbconn, $_REQUEST['username']);
    if($_POST){
        $Destination = '../userfiles/avatars';

        if(!isset($_FILES['profile']) || !is_uploaded_file($_FILES['profile']['tmp_name'])){
            $NewImageName= 'default.jpg';
            move_uploaded_file($_FILES['profile']['tmp_name'], "$Destination/$NewImageName");
        }
        else{
            $RandomNum = rand(0, 9999999999);
            $ImageName = str_replace(' ','-',strtolower($_FILES['profile']['name']));
            $ImageType = $_FILES['profile']['type'];
            $ImageExt = substr($ImageName, strrpos($ImageName, '.'));
            $ImageExt = str_replace('.','',$ImageExt);
            $ImageName = preg_replace("/\.[^.\s]{3,4}$/", "", $ImageName);
            $NewImageName = $ImageName.'-'.$RandomNum.'.'.$ImageExt;
            move_uploaded_file($_FILES['profile']['tmp_name'], "$Destination/$NewImageName");
        }
        $userid = mysqli_real_escape_string($dbconn, $_REQUEST['userid']);
        $sql="UPDATE users SET avatar='$NewImageName' WHERE user_id =$userid";
        $r = mysqli_query($dbconn, $sql) or die(mysqli_error($dbconn));
        if($r){
           header("location: ../admit.php?user_name=$username&ins=1&step=uploads");
        }else{
            header("location: ../admit.php?user_name=$username&ins=0&step=uploads");
        }
    }
?>