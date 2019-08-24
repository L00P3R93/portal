<?php
    session_start();
    $temp= $_SESSION['username'];
    ini_set("display_errors",1);
    if(isset($_POST)){
        require '../connection/dbconn.php';
        $user_shortbio=$_REQUEST['user_shortbio'];
        $user_dob=$_REQUEST['user_dob'];
        $sql3="UPDATE users SET user_shortbio='$user_shortbio',user_dob='$user_dob' WHERE username = '$temp'";
        $user_name=$_SESSION['username'];
        $sql4="INSERT INTO users (user_shortbio,user_dob) VALUES ('$user_shortbio','$user_dob') WHERE username = $temp";
        $result = mysqli_query($dbconn,"SELECT * FROM users WHERE username = '$user_name'");
        if( mysqli_num_rows($result) > 0) {
            mysqli_query($dbconn,$sql3)or die(mysqli_error($dbconn));
            header("location:../edit-profile.php?user_name=$user_name");
        }
        else{
            mysqli_query($dbconn,$sql3)or die(mysqli_error($dbconn));
            header("location:../edit-profile.php?user_name=$user_name");
        }  
    }    
?>