<?php
    error_reporting(0); 
    session_start();
    $temp= $_SESSION['username'];

    ini_set("display_errors",1);
    if(isset($_POST)){
        require '../connection/dbconn.php';
        session_start();
        $Destination = '../userfiles/avatars';

        if(!isset($_FILES['ImageFile']) || !is_uploaded_file($_FILES['ImageFile']['tmp_name'])){
            $NewImageName= 'default.jpg';
            move_uploaded_file($_FILES['ImageFile']['tmp_name'], "$Destination/$NewImageName");
        }
        else{
            $RandomNum = rand(0, 9999999999);
            $ImageName = str_replace(' ','-',strtolower($_FILES['ImageFile']['name']));
            $ImageType = $_FILES['ImageFile']['type'];
            $ImageExt = substr($ImageName, strrpos($ImageName, '.'));
            $ImageExt = str_replace('.','',$ImageExt);
            $ImageName = preg_replace("/\.[^.\s]{3,4}$/", "", $ImageName);
            $NewImageName = $ImageName.'-'.$RandomNum.'.'.$ImageExt;
            move_uploaded_file($_FILES['ImageFile']['tmp_name'], "$Destination/$NewImageName");
        }
        $user_firstname=$_REQUEST['user_firstname'];
        $user_lastname=$_REQUEST['user_lastname'];
        $user_id_no=$_REQUEST['user_id_no'];
        $user_phone=$_REQUEST['user_phone'];
        //$user_age=$_REQUEST['user_age'];
        //$mpesa=$_REQUEST['mpesa'];
        $gender=$_REQUEST['gender'];
        $user_email=$_REQUEST['user_email'];
        //$user_password=$_REQUEST['user_password'];


        $sql3="UPDATE users SET f_name='$user_firstname',l_name='$user_lastname',ID='$user_id_no',email='$user_email',phone='$user_phone',Gender='$gender',avatar='$NewImageName' WHERE username = '$temp'";
        $user_name=$_SESSION['user_name'];
        mysqli_query($dbconn,$sql3)or die(mysqli_error($dbconn));
        header("location:../../home.php?user_name=$temp&url=home");

    }
?>