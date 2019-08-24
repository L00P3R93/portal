<?php
    //ini_set("display_errors",1);
    error_reporting(0);
    session_start();
    $temp=$_SESSION['username'];

    if(isset($_POST)){

        require '../connection/dbconn.php';
        require '../data/data.php';

        $courseid = mysqli_real_escape_string($dbconn,$_GET['id']);
        if($_REQUEST['coursecode'] == ""){
           $coursecode = "CRSE".rand(0,9999);
        }else{
            $coursecode = mysqli_real_escape_string($dbconn,$_REQUEST['coursecode']);
        }

        $coursename = mysqli_real_escape_string($dbconn,$_REQUEST['coursename']);
        $coursedept  = mysqli_real_escape_string($dbconn,$_REQUEST['coursedept']);
        //$courseimg = "default.jpg";
        $kcse = mysqli_real_escape_string($dbconn,$_REQUEST['kcse']);
        $quorum = mysqli_real_escape_string($dbconn,$_REQUEST['quorum']);
        $duration = mysqli_real_escape_string($dbconn,$_REQUEST['duration']);
        $descr = mysqli_real_escape_string($dbconn,$_REQUEST['descr']);
        $fpy = mysqli_real_escape_string($dbconn,$_REQUEST['fpy']);
        $applfee = mysqli_real_escape_string($dbconn,$_REQUEST['applfee']);




        //Setting and Processing the uploaded file
        $Destination = '../../userfiles/courses';
        if(!isset($_FILES['ImageFile']) || !is_uploaded_file($_FILES['ImageFile']['tmp_name'])){
            $NewImageName= $_REQUEST['avatar'];
            move_uploaded_file($_FILES['ImageFile']['tmp_name'], "$Destination/$NewImageName");
        }
        else{
            $RandomNum  = rand(0, 9999999999);
            $ImageName = str_replace(' ','-',strtolower($_FILES['ImageFile']['name']));
            $ImageType = $_FILES['ImageFile']['type'];
            $ImageExt = substr($ImageName, strrpos($ImageName, '.'));
            $ImageExt = str_replace('.','',$ImageExt);
            $ImageName = preg_replace("/\.[^.\s]{3,4}$/", "", $ImageName);
            $NewImageName = $ImageName.'-'.$RandomNum.'.'.$ImageExt;
            move_uploaded_file($_FILES['ImageFile']['tmp_name'], "$Destination/$NewImageName");
        }

        //Uploading values into the database
        if(isset($_REQUEST['post_sub']) && !empty($_REQUEST['post_sub'])){
            //$result = mysqli_query($dbconn, "SELECT * FROM posts WHERE id =$id");
            if(isset($_FILES['ImageFile']))
            {

             //Upload product image to database
                $sql1="UPDATE courses SET  course_code='$coursecode', course_name='$coursename',  course_dept='$coursedept', course_img='$NewImageName', kcse='$kcse', quorum='$quorum', duration='$duration', descr='$descr', fpy='$fpy', appl_fee='$applfee' WHERE course_id=$courseid";
                $r=mysqli_query($dbconn,$sql1)or die(mysqli_error($dbconn));
                header("location:../courses.php?id=$courseid&url=course&upd=success");
            }else {
                $sql2="UPDATE courses SET  course_code='$coursecode', course_name='$coursename',  course_dept='$coursedept', course_img='$NewImageName', kcse='$kcse', quorum='$quorum', duration='$duration', descr='$descr', fpy='$fpy', appl_fee='$applfee' WHERE course_id=$courseid";
                $r = mysqli_query($dbconn,$sql2)or die(mysqli_error($dbconn));
                header("location:../courses.php?id=$courseid&url=course&upd=success");
            }
            //Setting the error message
            if($r)
            {
                echo $message = '<p class="alert alert-success">Update Successful!</p>';
            }else{
                $message = '<p class="alert alert-danger">Could not Update Post because: '.mysqli_errno($dbconn);
                $message .= '<p class="alert alert-danger">'.$sql3.'</p>';
                echo $message;
            }

        }else {
            if(isset($_FILES['ImageFile'])){
                $sql3 = "INSERT INTO courses(course_code,course_name,course_dept,course_img,kcse,quorum,duration,descr,fpy,appl_fee) VALUES('$coursecode','$coursename','$coursedept','$NewImageName','$kcse','$quorum','$duration','$descr','$fpy','$applfee')";
                $r = mysqli_query($dbconn, $sql3)or die(mysqli_error($dbconn));
                header("location:../courses.php?id=$courseid&url=course&ins=1");
            }else{
                $sql3 = "INSERT INTO courses(course_code,course_name,course_dept,course_img,kcse,quorum,duration,descr,fpy,appl_fee) VALUES('$coursecode','$coursename','$coursedept','$BackgroundNewImageName','$kcse','$quorum','$duration','$descr','$fpy','$applfee')";
                $r = mysqli_query($dbconn, $sql3)or die(mysqli_error($dbconn));
                header("location:../courses.php?id=$courseid&url=course&ins=1");
            }

            if($r)
            {
                echo $message = '<p class="alert alert-success">New Post Added Successfully!</p>';
            }else{
                $message = '<p class="alert alert-danger">Could not Add Post because: '.mysqli_errno($dbconn);
                $message .= '<p class="alert alert-danger">'.$sql4.'</p>';
                echo $message;
            }
        }
        if(isset($courseid)){

        }else{
        	header("location:../courses.php?url=course&status=success");
        }

    }
?>