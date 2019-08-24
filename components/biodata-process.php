<?php
    include '../dbconn/dbconn.php';
    include '../admin/data/data.php';
    $username = $_GET['username'];
    if($_POST){
       $title = mysqli_real_escape_string($dbconn, $_REQUEST['title']);
       $surname = mysqli_real_escape_string($dbconn, $_REQUEST['surname']);
       $firstname = mysqli_real_escape_string($dbconn, $_REQUEST['firstname']);
       $idno = mysqli_real_escape_string($dbconn, $_REQUEST['idno']);
       $boxnumber = mysqli_real_escape_string($dbconn, $_REQUEST['boxnumber']);
       $townname = mysqli_real_escape_string($dbconn, $_REQUEST['townname']);
       $towncode = mysqli_real_escape_string($dbconn, $_REQUEST['towncode']);
       $mobileno = mysqli_real_escape_string($dbconn, $_REQUEST['mobileno']);
       $email = mysqli_real_escape_string($dbconn, $_REQUEST['email']);
       $nationality = mysqli_real_escape_string($dbconn, $_REQUEST['nationality']);
       $dob = mysqli_real_escape_string($dbconn, $_REQUEST['dob']);
       $religion = mysqli_real_escape_string($dbconn, $_REQUEST['religion']);
       $gender = mysqli_real_escape_string($dbconn, $_REQUEST['gender']);
       $imparement = mysqli_real_escape_string($dbconn, $_REQUEST['imparement']);
       $imparementdetails = mysqli_real_escape_string($dbconn, $_REQUEST['imparementdetails']);

       $bioid =  mysqli_real_escape_string($dbconn, $_REQUEST['bioid']);
       $applid =  mysqli_real_escape_string($dbconn, $_REQUEST['applid']);
       $courseid =  mysqli_real_escape_string($dbconn, $_REQUEST['courseid']);
       $userid =  mysqli_real_escape_string($dbconn, $_REQUEST['userid']);
       $regno = get_specific_data($dbconn,'applications','appl_id',$applid,'reg_no');
       $applcode = get_specific_data($dbconn,'applications','appl_id',$applid,'appl_code');
       $coursename = get_specific_data($dbconn,'applications','appl_id',$applid,'course_name');
       if(isset($bioid) && !empty($bioid)){
           //UPDATE
           $sql = "UPDATE biodata SET appl_id='$applid',course_id='$courseid',user_id='$userid',reg_no='$regno',appl_code='$applcode',course_name='$coursename',username='$username',title='$title',fname='$firstname',lname='$surname',idno='$idno',box='$boxnumber',town='$townname',town_code='$towncode',mobile='$mobileno',email='$email',nationality='$nationality',dob='$dob',religion='$religion',gender='$gender',disabled='$imparement',disability='$imparementdetails' WHERE bio_id=$bioid";
            $r = mysqli_query($dbconn, $sql) or die(mysqli_error($dbconn));

            if($r){
               header("location: ../admit.php?user_name=$username&upd=1&step=1");
            }else{
                header("location: ../admit.php?user_name=$username&upd=0&step=1");
            }
       }else{
            //INSERT
            $sql = "INSERT INTO biodata(appl_id,course_id,user_id,reg_no,appl_code,course_name,username,title,fname,lname,idno,box,town,town_code,mobile,email,nationality,dob,religion,gender,disabled,disability) VALUES('$applid','$courseid','$userid','$regno','$applcode','$coursename','$username','$title','$firstname','$surname','$idno','$boxnumber','$townname','$towncode','$mobileno','$email','$nationality','$dob','$religion','$gender','$imparement','$imparementdetails')";
            $r = mysqli_query($dbconn, $sql) or die(mysqli_error($dbconn));

            if($r){
               header("location: ../admit.php?user_name=$username&ins=1&step=school");
            }else{
                header("location: ../admit.php?user_name=$username&ins=0&step=school");
            }
       }



    }

?>