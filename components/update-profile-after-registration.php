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
        $user_age=$_REQUEST['user_age'];
        $user_lvl=$_REQUEST['user_lvl'];
        $gender=$_REQUEST['gender'];
        $user_email=$_REQUEST['user_email'];
        $user_password=$_REQUEST['user_password'];

        if($user_lvl=='farmer'){
            $sql3="UPDATE farmers SET f_name='$user_firstname',l_name='$user_lastname',id_no='$user_id_no',password='$user_password',email='$user_email',phone_no='$user_phone',age='$user_age',gender='$gender',avatar='$NewImageName' WHERE username = '$temp'";
            $user_name=$_SESSION['user_name'];
            $sql4="INSERT INTO farmers (f_name,l_name,id_no,password,email,phone_no,age,gender,avatar) VALUES ('$user_firstname','$user_lastname','$user_id_no','$user_password','$user_email','$user_phone','$user_age','$gender','$NewImageName') WHERE username = $temp";
            $result = mysqli_query($dbconn,"SELECT * FROM farmers WHERE username = '$user_name'");
            if( mysqli_num_rows($result) > 0) {
                mysqli_query($dbconn,$sql3)or die(mysqli_error($dbconn));
                header("location:../../farmers/index.php?user_name=$temp&lvl=$user_lvl");
            }
            else{
                mysqli_query($dbconn,$sql3)or die(mysqli_error($dbconn));
                header("location:../../farmers/index.php?user_name=$temp&lvl=$user_lvl");
            }
        }else if($user_lvl=='vendor'){
            $sql3="UPDATE vendors SET f_name='$user_firstname',l_name='$user_lastname',id_no='$user_id_no',password='$user_password',email='$user_email',phone_no='$user_phone',age='$user_age',gender='$gender',avatar='$NewImageName' WHERE username = '$temp'";
            $user_name=$_SESSION['user_name'];
            $sql4="INSERT INTO vendors (f_name,l_name,id_no,password,email,phone_no,age,gender,avatar) VALUES ('$user_firstname','$user_lastname','$user_id_no','$user_password','$user_email','$user_phone','$user_age','$gender','$NewImageName') WHERE username = $temp";
            $result = mysqli_query($dbconn,"SELECT * FROM vendors WHERE username = '$user_name'");
            if( mysqli_num_rows($result) > 0) {
                mysqli_query($dbconn,$sql3)or die(mysqli_error($dbconn));
                header("location:../../vendors/index.php?user_name=$temp&lvl=$user_lvl");
            }
            else{
                mysqli_query($dbconn,$sql3)or die(mysqli_error($dbconn));
                header("location:../../vendors/index.php?user_name=$temp&lvl=$user_lvl");
            }
        }else if($user_lvl=='agent'){
            $sql3="UPDATE agents SET f_name='$user_firstname',l_name='$user_lastname',id_no='$user_id_no',password='$user_password',email='$user_email',phone_no='$user_phone',age='$user_age',gender='$gender',avatar='$NewImageName' WHERE username = '$temp'";
            $user_name=$_SESSION['user_name'];
            $sql4="INSERT INTO agents (f_name,l_name,id_no,password,email,phone_no,age,gender,avatar) VALUES ('$user_firstname','$user_lastname','$user_id_no','$user_password','$user_email','$user_phone','$user_age','$gender','$NewImageName') WHERE username = $temp";
            $result = mysqli_query($dbconn,"SELECT * FROM agents WHERE username = '$user_name'");
            if( mysqli_num_rows($result) > 0) {
                mysqli_query($dbconn,$sql3)or die(mysqli_error($dbconn));
                header("location:../../agents/index.php?user_name=$temp&lvl=$user_lvl");
            }
            else{
                mysqli_query($dbconn,$sql3)or die(mysqli_error($dbconn));
                header("location:../../agents/index.php?user_name=$temp&lvl=$user_lvl");
            }
        }


    }
?>