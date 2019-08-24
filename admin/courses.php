<?php include 'components/authentication.php' ?>
<?php include 'components/session-check.php' ?>
<?php include 'controllers/base/head.php' ?>
<?php include 'connection/dbconn.php' ?>



<style type="text/css">
    #planner {
        margin: 10px 0 10px 4px;
    }
    .sizer,#imagePreview {
        width: 300px;
        height: 200px;
    }

    footer {
        position: relative;
        margin-top: 10%;
    }
    #back2blog {
        margin-right: 40px;
    }
    #btn-sub{
         margin-top: 10%;
    }
    .inputsl{
        padding: 4px 11px !important;
    }
    .beaut{
        /*margin-left: 1% !important;
       padding-right: 200px !important; */
    }

    #more{
        margin: 100px auto;
    }

    
    .applyBtn {
        margin-left: 50%;
        padding-top: 15%;
    }

</style>
<script>
    function deleteCheck(form){
            var id = form.del_course_id.value;
            if(id == ""){
                    alert("You have not Selected a Course Record To Delete!");
                    return false;
            }else{
                var r = confirm("Are you sure you want to delete Course Record Id ="+id);
                if(r == true){
                        return true;
                }else{
                        return false;
                }
            }
    }
</script>
<body data-spy="scroll" data-target=".onpage-navigation" data-offset="60">
    <main>
    <?php include 'controllers/navigation/first-navigation.php' ?>
    <div id="planner" class="container-fluid">
        <h2 class="maker">Course Management Panel</h2>
        <hr />
        <?php  $usn = $_GET['user_name']; ?>
        <?php
          if($_GET['ins'] == 'q'){ ?>
            <script type="text/javascript">
                alert("Course Inserted Successfully!");
            </script>
        <?php  }else if($_GET['upd'] == '1' || $_GET['tupd'] == '1'){  ?>
            <script type="text/javascript">
                alert("Course Updated Successfully!");
            </script>
        <?php }else if($_GET['del'] == '1'){ ?>
            <script type="text/javascript">
                alert("Course Deleted Successfully!");
            </script>
        <?php } ?>
        <div class="row">
            <div class="col-md-4 plans">

                <div class="list-group">
                    <a href="courses.php?user_name=<?php echo $usn;?>&url=course" class="list-group-item list-group-item-action flex-column align-items-start list-group-item-dark">
                        <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-1"><i class="fa fa-plus-circle"></i> New Course</h5>
                        </div>
                    </a>
                    <?php
                    $r = mysqli_query($dbconn,"SELECT * FROM courses ORDER BY course_id ASC");
                    while($lists = mysqli_fetch_assoc($r)){ ?>
                    <a href="courses.php?user_name=<?php echo $usn;?>&id=<?php echo $lists['course_id']; ?>&url=course" class="list-group-item list-group-item-action flex-column align-items-start <?php selected($_GET['id'], $lists['course_id'], 'active') ?>">
                        <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-1"><?php echo $lists['course_name'];?></h5>
                            <small class="text-muted"></small>
                        </div>
                        <p class="mb-1"><?php echo /*substr(*/$lists['descr']/*,0,50)*/;?></p>
                        <small class="text-muted"><?php echo "KSH. ".number_format($lists['fpy'],2,'.',',');?></small>
                    </a>
                    <?php } ?>

                </div>

        	</div>
            <div class="col-md-8 content">
                <div id="formdiv">
                    <?php
                        if(isset($_GET['id'])){
                            $course = mysqli_fetch_assoc(mysqli_query($dbconn, "SELECT * FROM courses WHERE course_id = '$_GET[id]'"));
                        }

                        if(empty($course['course_name']) && empty($course['course_dept'])){
                            $uname=$_SESSION['username'];
                            $coursecode = "N/A";
                            $coursename = "Enter Course Name";
                            $coursedept  = "-- Choose a Department --";
                            $courseimg = "default.jpg";
                            $kcse = "-- Choose Grade --";
                            $quorum = "Enter Course Quorum";
                            $duration = "-- Choose Course Duration --";
                            $descr = "Enter Course Description";
                            $fpy = "Enter Fee Amount";
                            $applfee = "-- Choose Application Charges --";

                        }else{
                            $uplname=$course['username'];
                            $coursecode = $course['course_code'];
                            $coursename = $course['course_name'];
                            $coursedept  = $course['course_dept'];
                            $courseimg = $course['course_img'];
                            $kcse = $course['kcse'];
                            $quorum = $course['quorum'];
                            $duration = $course['duration'];
                            $descr = $course['descr'];
                            $fpy = $course['fpy'];
                            $applfee = $course['appl_fee'];
                        }
                    ?>
                   <div id="formMessage">
                        <?php if(isset($message)) {echo $message;}  ?>

                    </div>
                    <form action="components/posts-form-process.php?id=<?php echo $course['course_id']; ?>" method="post" enctype="multipart/form-data" id="UploadForm">
                        <div class="form-group float-label-control">
                            <label for="">Course Name: </label>
                            <input type="text" class="form-control" placeholder="<?php echo $coursename;?>" name="coursename" value="<?php echo $coursename;?>">
                        </div>
                        <div class="form-group float-label-control">
                            <label for="">Course Code: </label>
                            <input type="text" class="form-control" placeholder="<?php echo $coursecode;?>" name="coursecode" value="<?php echo $coursecode;?>" readonly>
                        </div>
                        <div class="form-group float-label-control">
                            <label for="">Course Department:</label>
                             <select class="form-control inputsl" id="coursedept" name="coursedept">
                                <option selected><?php echo $coursedept; ?></option>
                                <option value="Computing" >Computing</option>
                                <option value="Engineering" >Engineering</option>
                                <option value="Human Resource" >Human Resource</option>
                                <option value="Pure & Applied Sciences" >Pure &amp; Applied Sciences</option>
                                <option value="Statistics">Statistics</option>
                                <option value="Health Sciences">Health Sciences</option>
                            </select>
                        </div>
                        <div class="form-group float-label-control">
                            <label for="">KCSE Average Grade:</label>
                             <select class="form-control inputsl" id="kcse" name="kcse">
                                <option selected><?php echo $kcse; ?></option>
                                <option value="A" >A</option>
                                <option value="A-" >A-</option>
                                <option value="B+" >B+</option>
                                <option value="B" >B</option>
                                <option value="B-">B-</option>
                                <option value="C+">C+</option>
                            </select>
                        </div>
                        <div class="form-group float-label-control">
                            <label for="">Course Quorum: </label>
                            <input type="text" class="form-control" placeholder="<?php echo $quorum;?>" name="quorum" value="<?php echo $quorum;?>">
                        </div>
                        <div class="form-group float-label-control">
                            <label for="">Course Duration: </label>
                            <select class="form-control inputsl" id="duration" name="duration">
                                <option selected><?php echo $duration; ?></option>
                                <option value="3" >3 Years</option>
                                <option value="4" >4 Years</option>
                                <option value="5" >5 Years</option>
                                <option value="6" >6 Years</option>
                            </select>
                        </div>
                        <div class="form-group float-label-control fr-view">
                            <label for="">Course Description:</label>
                            <textarea class="form-control editable"  name="descr" rows="10" placeholder="Enter Course Description" value=""><?php echo $course['descr'];?></textarea>
                        </div>
                        <div class="form-group float-label-control">
                            <label for="">Course Fee Per Year: </label>
                            <input type="text" class="form-control" placeholder="<?php echo $fpy;?>" name="fpy" value="<?php echo $fpy;?>">
                        </div>
                        <div class="form-group float-label-control">
                            <label for="">Course Application Charges</label>
                             <select class="form-control inputsl" id="applfee" name="applfee">
                                <option selected><?php echo $applfee; ?></option>
                                <option value="1000" >KSH. 1,000.00</option>
                                <option value="1500" >KSH. 1,500.00</option>
                                <option value="2000" >KSH. 2,000.00</option>
                            </select>
                        </div>
                        <div class="form-group float-label-control">
                            <label for="inputAddress">Upload Course Image:</label>
                            <br>
                            <input type="file" name="ImageFile"/>
                        </div>
                        <div class="form-group float-label-control">
                            <label for="inputAddress">Current Image:</label>
                            <div class="shortpreview" >
                                <img class="post_img" src="../userfiles/courses/<?php echo $courseimg;?>">
                                <input type="hidden" name="avatar" value="<?php echo $courseimg;?>"/>
                            </div>
                        </div>
                        <div id="btn-sub">
                            <button type="submit" class="btn btn-primary ladda-button font-alt" style=" margin-left: 0px;">Save</button>
                            <input type="hidden" name="post_sub" value="<?php echo $course['course_id'];?>" />
                        </div>

                    </form>
                </div>
             </div>
        </div>
        <div id="more" class="container" >
            <h2>Other Course Settings</h2>
            <hr />
            <div class="table-responsive-lg">
                <table class="table table-sm table-hover table-striped">
                    <caption>List of All Courses</caption>
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Edit</th>
                            <th scope="col">Delete</th>
                            <th scope="col">Course Code</th>
                            <th scope="col">Course Name</th>
                            <th scope="col">Course Dept</th>
                            <th scope="col">KCSE</th>
                            <th scope="col">Mathematics</th>
                            <th scope="col">English</th>
                            <th scope="col">Physics</th>
                            <th scope="col">Chemistry</th>
                            <th scope="col">Biology</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $q = mysqli_query($dbconn,"SELECT * FROM courses");
                            $course = mysqli_fetch_assoc($q);
                            $rws = mysqli_num_rows($q);
                            for($i=0; $i<$rws; $i++){ ?>
                                <tr>
                                    <th scope="row"><?php echo $i+1; ?></th>
                                    <td><a href="courses.php?user_name=<?php echo $usn;?>&id=<?php echo get_data($dbconn,$i,'course_id','courses'); ?>&url=course&cid=<?php echo get_data($dbconn,$i,'course_id','courses');?>&ac=ed1#tform">Edit</a></td>
                                    <td>
                                        <form action="components/course-process.php?user_name=<?php echo $_SESSION['username']; ?>&act=d3l&cid=<?php echo get_data($dbconn,$i,'course_id','courses');?>" method="post" onsubmit="return deleteCheck(this);">
                                            <input type="hidden" name="del_course_id" value="<?php echo get_data($dbconn,$i,'course_id','courses');?>" />
                                            <button type="submit" class="btn btn-secondary del_btn"><i class="fa fa-trash-o"></i></button>
                                            <input type="hidden" name="del_btn" value="Delete Course" />
                                        </form>
                                    </td>
                                    <td><?php echo get_data($dbconn,$i,'course_code','courses'); ?></td>
                                    <td><?php echo get_data($dbconn,$i,'course_name','courses'); ?></td>
                                    <td><?php echo get_data($dbconn,$i,'course_dept','courses'); ?></td>
                                    <td><?php echo get_data($dbconn,$i,'kcse','courses'); ?></td>
                                    <td><?php echo get_data($dbconn,$i,'math','courses'); ?></td>
                                    <td><?php echo get_data($dbconn,$i,'eng','courses'); ?></td>
                                    <td><?php echo get_data($dbconn,$i,'physics','courses'); ?></td>
                                    <td><?php echo get_data($dbconn,$i,'chem','courses'); ?></td>
                                    <td><?php echo get_data($dbconn,$i,'bio','courses'); ?></td>
                                </tr>
                           <?php } ?>
                    </tbody>
                </table>
            </div>
            <?php
              if(isset($_GET['ac']) && $_GET['ac'] == 'ed1'){
                  $cid = $_GET['cid'];
                  $cname = get_specific_data($dbconn,'courses','course_id',$cid,'course_name');
                  $code = get_specific_data($dbconn,'courses','course_id',$cid,'course_code');
                  $cdept = get_specific_data($dbconn,'courses','course_id',$cid,'course_dept');
                  $tkcse = get_specific_data($dbconn,'courses','course_id',$cid,'kcse');
                  $math = get_specific_data($dbconn,'courses','course_id',$cid,'math');
                  $eng = get_specific_data($dbconn,'courses','course_id',$cid,'eng');
                  $phy = get_specific_data($dbconn,'courses','course_id',$cid,'physics');
                  $bio = get_specific_data($dbconn,'courses','course_id',$cid,'bio');

              }else{
                $cname = "Course Name";
                $code = "Course Code";
                $cdept = "Course Department";
                $tkcse = "KCSE Mean Grade";
                $math = "Mathematics Points";
                $eng = "English Points";
                $phy = "Physics Points";
                $bio = "Biology Points";
              }

            ?>

            <form id="tform" action="components/course-process.php?user_name=<?php echo $_SESSION['username']; ?>&act=tab4m&cid=<?php echo $course['course_id'];?>" method="post">
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="inputEmail4">Course Code:</label>
                        <fieldset disabled>
                             <input type="text" class="form-control" name="tcoursecode" placeholder="Course Code" value="<?php echo $code; ?>" >
                        </fieldset>

                    </div>
                    <div class="form-group col-md-4">
                        <label for="inputEmail4">Course Name:</label>
                        <fieldset disabled>
                              <input type="text" class="form-control" name="tcoursename" placeholder="Course Name" value="<?php echo $cname; ?>" >
                        </fieldset>

                    </div>
                    <div class="form-group col-md-4">
                        <label for="inputEmail4">Course Department:</label>
                        <fieldset disabled>
                            <input type="text" class="form-control" name="tcoursedept" placeholder="Course Department" value="<?php echo $cdept; ?>" >
                        </fieldset>

                    </div>
                </div>
                <hr />
                <div class="form-group fmaker">
                    <h4>The Following Part is used for setting the required Grades for Relevant Subjects: </h4>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="inputPassword4">KCSE</label>
                        <fieldset disabled>
                             <input type="text" class="form-control" name="tkcse" placeholder="KCSE Mean Grade" value="<?php echo $tkcse; ?>" >
                        </fieldset>

                    </div>
                    <div class="form-group col-md-4">
                        <label for="inputPassword4">Mathematics</label>
                        <select name="tmath" class="form-control inputsl">
                                <option selected><?php echo $math." Points"; ?></option>
                                <?php
                                    for($i=0; $i<13; $i++){ ?>
                                <option value="<?php echo $i; ?>"><?php echo $i." Points"; ?></option>
                                <?php  }  ?>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="inputPassword4">English</label>
                        <select name="teng" class="form-control inputsl">
                            <option selected><?php echo $eng; ?></option>
                            <?php
                              for($i=0; $i<13; $i++){ ?>
                            <option value="<?php echo $i ?>"><?php echo $i." Points" ?></option>
                            <?php  }  ?>
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="inputPassword4">Physics</label>
                        <select name="tphy" class="form-control inputsl">
                                <option selected><?php echo $phy." Points"; ?></option>
                                <?php
                                    for($i=0; $i<13; $i++){ ?>
                                <option value="<?php echo $i; ?>"><?php echo $i." Points"; ?></option>
                                <?php  }  ?>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="inputPassword4">Chemistry</label>
                        <select name="tchem" class="form-control inputsl">
                                <option selected><?php echo $chem." Points"; ?></option>
                                <?php
                                    for($i=0; $i<13; $i++){ ?>
                                <option value="<?php echo $i; ?>"><?php echo $i." Points"; ?></option>
                                <?php  }  ?>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="inputPassword4">Biology</label>
                        <select name="tbio" class="form-control inputsl">
                                <option selected><?php echo $bio." Points"; ?></option>
                                <?php
                                    for($i=0; $i<13; $i++){ ?>
                                <option value="<?php echo $i; ?>"><?php echo $i." Points"; ?></option>
                                <?php  }  ?>
                        </select>
                    </div>
                </div>

                <div class="form-row applyBtn">
                    <div class="form-group col-md-12">
                        <button type="submit" class="btn btn-primary">Apply</button>
                        <input type="hidden" name="other_course_id" value="<?php echo $cid; ?>" />
                        <input type="hidden" name="tsave_btn" value="Save Course" />
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div>
        <a id="back2blog" class="pull-right" href="../index.php">Back to Main</a>
    </div>
    <!--Footer-->
    <?php include 'controllers/base/footer.php' ?>


