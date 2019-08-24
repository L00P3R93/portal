<?php
    ini_set("display_errors",1);
    session_start();
    $temp=$_SESSION['username'];
    if(isset($_POST)){
        require '../connection/dbconn.php';
        $Destination = '../userfiles/background-images';
        if(!isset($_FILES['BackgroundImageFile']) || !is_uploaded_file($_FILES['BackgroundImageFile']['tmp_name'])){
            $BackgroundNewImageName= 'default-background.jpg';
            move_uploaded_file($_FILES['BackgroundImageFile']['tmp_name'], "$Destination/$BackgroundNewImageName");
        }
        else{
            $RandomNum = rand(0, 9999999999);
            $ImageName = str_replace(' ','-',strtolower($_FILES['BackgroundImageFile']['name']));
            $ImageType = $_FILES['BackgroundImageFile']['type'];
            $ImageExt = substr($ImageName, strrpos($ImageName, '.'));
            $ImageExt = str_replace('.','',$ImageExt);
            $ImageName      = preg_replace("/\.[^.\s]{3,4}$/", "", $ImageName);
            $BackgroundNewImageName = $ImageName.'-'.$RandomNum.'.'.$ImageExt;
            move_uploaded_file($_FILES['BackgroundImageFile']['tmp_name'], "$Destination/$BackgroundNewImageName");
        }
        $sql1="UPDATE users SET backgroundpic='$BackgroundNewImageName' WHERE username = '$temp'";
        $sql2="INSERT INTO users (backgroundpic) VALUES ('$BackgroundNewImageName') WHERE username = '$temp'";
        $result = mysqli_query($dbconn,"SELECT * FROM users WHERE username = '$temp'");
        if( mysqli_num_rows($result) > 0) {
            if(!empty($_FILES['BackgroundImageFile']['name'])){
                mysqli_query($dbconn,$sql1)or die(mysqli_error($dbconn));
                header("location:../edit-profile.php?user_name=$temp");
            }
        } 
        else {
            mysqli_query($dbconn,$sql2)or die(mysqli_error($dbconn));
            header("location:../edit-profile.php?user_name=$temp");
        }
        $Destination = '../userfiles/avatars';
        if(!isset($_FILES['ImageFile']) || !is_uploaded_file($_FILES['ImageFile']['tmp_name'])){
            $NewImageName= 'default.png';
            move_uploaded_file($_FILES['ImageFile']['tmp_name'], "$Destination/$NewImageName");
        }
        else{
            $RandomNum   = rand(0, 9999999999);
            $ImageName = str_replace(' ','-',strtolower($_FILES['ImageFile']['name']));
            $ImageType = $_FILES['ImageFile']['type'];
            $ImageExt = substr($ImageName, strrpos($ImageName, '.'));
            $ImageExt = str_replace('.','',$ImageExt);
            $ImageName = preg_replace("/\.[^.\s]{3,4}$/", "", $ImageName);
            $NewImageName = $ImageName.'-'.$RandomNum.'.'.$ImageExt;
            move_uploaded_file($_FILES['ImageFile']['tmp_name'], "$Destination/$NewImageName");
        }
        $sql5="UPDATE users SET avatar='$NewImageName' WHERE username = '$temp'";
        $sql6="INSERT INTO users (avatar) VALUES ('$NewImageName') WHERE username = '$temp'";
        $result = mysqli_query($dbconn,"SELECT * FROM users WHERE username = '$temp'");
        if( mysqli_num_rows($result) > 0) {
            if(!empty($_FILES['ImageFile']['name'])){
                mysqli_query($dbconn,$sql5)or die(mysqli_error($dbconn));
                header("location:../edit-profile.php?user_name=$temp");
            }
        } 
        else {
            mysqli_query($dbconn,$sql6)or die(mysqli_error($dbconn));
            header("location:../edit-profile.php?user_name=$temp");
        }
        $user_firstname=$_REQUEST['user_firstname'];
        $user_lastname=$_REQUEST['user_lastname'];
        $user_email=$_REQUEST['user_email'];
        $user_password=$_REQUEST['user_password'];
        $user_shortbio=$_REQUEST['user_shortbio'];
        //$user_longbio=$_REQUEST['user_longbio'];
        $user_dob=$_REQUEST['user_dob'];
        $user_gender=$_REQUEST['user_gender'];

        $sql3="UPDATE users SET password='$user_password',first_n='$user_firstname',last_n='$user_lastname',email='$user_email',gender='$user_gender',user_shortbio='$user_shortbio',user_dob='$user_dob' WHERE username = '$temp'";
            mysqli_query($dbconn,$sql3)or die(mysqli_error($dbconn));
            header("location:../edit-profile.php?user_name=$temp&request=profile-update&status=success");
    }    
?>