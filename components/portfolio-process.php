<?php
    //ini_set("display_errors",1);
    error_reporting(0);
    session_start();
    $temp=$_SESSION['username'];

    if(isset($_POST)){

        require '../connection/dbconn.php';
        require '../data/data.php';

    	$title = mysqli_real_escape_string($dbconn,$_REQUEST['post_name']);
        $body = mysqli_real_escape_string($dbconn,$_REQUEST['post_body']);
        //$userid = get_specific_data($dbconn,'users','username',$temp,'user_id');
        $id = mysqli_real_escape_string($dbconn,$_GET['id']);



        //Setting the default Backgruond Image if no file
        $Destination = '../userfiles/gallery';
        if(!isset($_FILES['BackgroundImageFile']) || !is_uploaded_file($_FILES['BackgroundImageFile']['tmp_name'])){
            $BackgroundNewImageName= 'default.jpg';
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


        //Setting and Processing the uploaded file
        $Destination = '../userfiles/gallery';
        if(!isset($_FILES['ImageFile']) || !is_uploaded_file($_FILES['ImageFile']['tmp_name'])){
            $NewImageName= 'default.jpg';
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
        if(!empty($_REQUEST['post_sub'])){
            //$result = mysqli_query($dbconn, "SELECT * FROM posts WHERE id =$id");
            if(isset($_FILES['ImageFile']))
            {
                $sql2="UPDATE portfolios SET  username='$temp',title='$title',image='$BackgroundNewImageName',descr='$body' WHERE id=$id";
                $r = mysqli_query($dbconn,$sql2)or die(mysqli_error($dbconn));

            }else {
                //Upload product image to database
                $sql1="UPDATE portfolios SET  username='$temp',title='$title',image='$NewImageName',descr='$body' WHERE id=$id";
                $r=mysqli_query($dbconn,$sql1)or die(mysqli_error($dbconn));
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
                $sql3 = "INSERT INTO portfolios(username,title,image,descr) VALUES('$temp','$title','$BackgroundNewImageName','$body')";
                $r = mysqli_query($dbconn, $sql3)or die(mysqli_error($dbconn));
            }else{
                $sql3 = "INSERT INTO portfolios(username,title,image,descr) VALUES('$temp','$title','$NewImageName','$body')";
                $r = mysqli_query($dbconn, $sql3)or die(mysqli_error($dbconn));
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
        if(isset($id)){

    		header("location:../portfolio.php?id=$id&url=port");
        }else{
        	header("location:../portfolio.php?url=port");
        }

    }
?>