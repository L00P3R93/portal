<?php include 'components/authentication.php' ?>
<?php include 'components/session-check.php' ?>
<?php include 'controllers/base/head.php' ?>
<script type="text/javascript">

    function checkUploads(form){
        var natid = form.natid.value;
        var kcse = form.kcse.value;
        if(natid == "" || kcse == ""){
            alert("You have not selected any documents to upload!");
            return false;
        }else{
            return true;
        }
    }

    function applGenLetter(form){
        var fname =  form.fname.value;
        var lname = form.lname.value;
        var reg = form.reg.value;
        var coursename = form.coursename.value;
        var dept = form.dept.value;

         var body = "I am happy to inform you that you have been admitted into the School of\n"+dept+
                    " to pursue a Bachelor of Science in "+coursename+"\n"+
                    "subject to presentation of your original academic certificates on the day\n"+
                    "of registration.\n\n"+
                    "You are expected to report on September 09, 2019. On registration day,\nyou are required"+
                    " to pay the fees before you are registered. All Payments\nmust be made in banker\'s cheque"+
                    " or money order only payable to the\nUniversity of Eastern Africa, Baraton.\n\n"+
                    "During the orientation week, you will be required to do a full medical\ncheckup at"+
                    " the University Hospital at a cost of Ksh 2500.\n\n"+
                    "We look forward to seeing you here as a student and trust that you will\nfind"+
                    " your studies enjoyable and fulfilling in a christian environment.";

        var getImageFromUrl = function(url, callback) {
            var img = new Image();
            img.onError = function() {
                alert('Cannot load image: "'+url+'"');
            };
            img.onload = function() {
                callback(img);
            };
            img.src = url;
        }

        var createPDF = function(imgData) {
            var doc = new jsPDF();

            // This is a modified addImage example which requires jsPDF 1.0+
            // You can check the former one at examples/js/basic.js

            doc.addImage(imgData, 'PNG', 50, 10, 100, 18, 'monkey'); // Cache the image using the alias 'monkey'
            //doc.addImage('monkey', 70, 10, 100, 120); // use the cached 'monkey' image, JPEG is optional regardless
            // As you can guess, using the cached image reduces the generated PDF size by 50%!

            // Rotate Image - new feature as of 2014-09-20
            /*doc.addImage({
                imageData : imgData,
                angle     : -20,
                x         : 10,
                y         : 78,
                w         : 45,
                h         : 58
            });*/

            // Output as Data URI
            doc.output('datauri');
            doc.setLineWidth(1);
            doc.line(20, 40, 200, 40);
            doc.text(20,50, fname+" "+lname);
            doc.text(20,60, reg);
            doc.text(20,70, "Dear Sir/Madam,");
            doc.text(50,80, "RE: ADMISSION LETTER");
            doc.text(20,90,body);
            doc.save(reg+'.pdf');
        }

        getImageFromUrl('bara.png', createPDF);
        return false;
    }

    function admGenLetter(form){
        var fname =  form.fname.value;
        var lname = form.lname.value;
        var reg = form.reg.value;
        var coursename = form.coursename.value;
        var dept = form.dept.value;

         var body = "I am happy to inform you that you have been admitted into the School of\n"+dept+
                    " to pursue a Bachelor of Science in "+coursename+"\n"+
                    "subject to presentation of your original academic certificates on the day\n"+
                    "of registration.\n\n";

        var getImageFromUrl = function(url, callback) {
            var img = new Image();
            img.onError = function() {
                alert('Cannot load image: "'+url+'"');
            };
            img.onload = function() {
                callback(img);
            };
            img.src = url;
        }

        var createPDF = function(imgData) {
            var doc = new jsPDF();

            // This is a modified addImage example which requires jsPDF 1.0+
            // You can check the former one at examples/js/basic.js

            doc.addImage(imgData, 'PNG', 50, 10, 100, 18, 'monkey'); // Cache the image using the alias 'monkey'
            //doc.addImage('monkey', 70, 10, 100, 120); // use the cached 'monkey' image, JPEG is optional regardless
            // As you can guess, using the cached image reduces the generated PDF size by 50%!

            // Rotate Image - new feature as of 2014-09-20
            /*doc.addImage({
                imageData : imgData,
                angle     : -20,
                x         : 10,
                y         : 78,
                w         : 45,
                h         : 58
            });*/

            // Output as Data URI
            doc.output('datauri');
            doc.setLineWidth(1);
            doc.line(20, 40, 200, 40);
            doc.text(20,50, fname+" "+lname);
            doc.text(20,60, reg);
            doc.text(20,70, "Dear Sir/Madam,");
            doc.text(50,80, "RE: ACCEPTANCE LETTER");
            doc.text(20,90,body);
            doc.save(reg+'.pdf');
        }

        getImageFromUrl('bara.png', createPDF);
        return false;
    }



</script>

        <body>
          <!-- #header -->
            <?php include 'controllers/nav/nav.php' ?>
            <?php
               if($_GET['res'] == '1'){ ?>
                    <script type="text/javascript">
                        alert("Your Application Has been Successfully Submitted");
                    </script>
               <?php } else if($_GET['res'] == '0'){ ?>
                    <script type="text/javascript">
                        alert("Error! Application Submit Has Failed");
                    </script>
            <?php }  ?>
            <!-- start banner Area -->
            <section class="banner-area relative about-banner" id="home">
                <div class="overlay overlay-bg"></div>
                <div class="container">
                    <div class="row d-flex align-items-center justify-content-center">
                        <div class="about-content col-lg-12">
                            <h1 class="text-white">
                                Apply Courses
                            </h1>
                            <p class="text-white link-nav"><a href="index.php">Home </a>  <span class="lnr lnr-arrow-right"></span>  <a href="courses.php"> Apply Courses</a></p>
                        </div>
                    </div>
                </div>
            </section>
            <!-- End banner Area -->
           <section class="contact-page-area section-gap">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                             <div>
                                <h1>Your Applications:</h1>
                                <hr />
                            </div>
                            <?php   if($_GET['ins'] == 'success'){ ?>
                                    <script type="text/javascript">
                                        alert("Asset Record Inserted Successfully!");
                                    </script>
                            <?php    }else if($_GET['upd'] == 'success'){ ?>
                                    <script type="text/javascript">
                                        alert("Asset Record Updated Successfully!");
                                    </script>
                            <?php    }    ?>
                            <?php if(get_specific_data($dbconn,'appl_pending','user_name',$_SESSION['username'],'approved') == '1'){ ?>
                            <div class="alert alert-success">
                                <p>Your Application for the Course <b><?php echo get_specific_data($dbconn,'appl_pending','user_name',$_SESSION['username'],'course_name');?></b> has been approved click <a href="admit.php?user_name=<?php echo $_SESSION['username'] ?>&step=biodata">Here</a> to go to <a href="admit.php?user_name=<?php echo $_SESSION['username'] ?>&step=biodata">admissions</a> and start admission process.</p>
                            </div>
                            <?php  } ?>
                            <div class="table-responsive-lg">
                                <table class="table table-hover table-striped">
                                    <caption>List of your Applications</caption>
                                    <thead class="thead-dark">
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">View Letter</th>
                                            <th scope="col">Acceptance Letter</th>
                                            <th scope="col">Applicatio No.</th>
                                            <th scope="col">Username</th>
                                            <th scope="col">Course No</th>
                                            <th scope="col">Course Name</th>
                                            <th scope="col">Approval Status</th>
                                            <th scope="col">Application Date</th>
                                            <th scope="col">Admissions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $username = $_SESSION['username'];
                                            $sql = "SELECT * FROM appl_pending WHERE user_name='$username'";
                                            $q = mysqli_query($dbconn,$sql);
                                            $rws = mysqli_num_rows($q);
                                            for($i=1; $i<=$rws; $i++){ ?>
                                                <tr>
                                                    <th scope="row"><?php echo $i; ?></th>
                                                    <td>
                                                        <?php if(get_cond_data($dbconn,$i-1,'approved','appl_pending','user_name',$username) == '0')
                                                        {
                                                            echo 'None';
                                                        }else{ ?>
                                                        <form action="" method="post" onsubmit="return applGenLetter(this);">
                                                            <input type="hidden" name="fname" id="fname" value="<?php echo get_specific_data($dbconn,'users','user_id',get_cond_data($dbconn,$i-1,'user_id','appl_pending','user_name',$username),'f_name') ?>"/>
                                                            <input type="hidden" name="lname" id="lname" value="<?php echo get_specific_data($dbconn,'users','user_id',get_cond_data($dbconn,$i-1,'user_id','appl_pending','user_name',$username),'l_name') ?>"/>
                                                            <input type="hidden" name="reg" id="reg" value="<?php echo get_specific_data($dbconn,'applications','user_id',get_cond_data($dbconn,$i-1,'user_id','appl_pending','user_name',$username),'reg_no'); ?>"/>
                                                            <input type="hidden" name="coursename" id="coursename" value="<?php echo get_cond_data($dbconn,$i-1,'course_name','appl_pending','user_name',$username); ?>"/>
                                                            <input type="hidden" name="dept" id="dept" value="<?php echo get_specific_data($dbconn,'courses','course_id',get_cond_data($dbconn,$i-1,'course_id','appl_pending','user_name',$username),'course_dept') ?>"/>
                                                            <button type="submit" class="btn btn-secondary del_btn">View</button>
                                                        </form>
                                                        <?php } ?>
                                                    </td>
                                                    <td>
                                                        <?php if(get_cond_data($dbconn,$i-1,'approved','appl_pending','user_name',$username) == '0')
                                                        {
                                                            echo 'None';
                                                        }else{ ?>
                                                        <form action="" method="post" onsubmit="return admGenLetter(this);">
                                                            <input type="hidden" name="fname" id="fname" value="<?php echo get_specific_data($dbconn,'users','user_id',get_cond_data($dbconn,$i-1,'user_id','appl_pending','user_name',$username),'f_name') ?>"/>
                                                            <input type="hidden" name="lname" id="lname" value="<?php echo get_specific_data($dbconn,'users','user_id',get_cond_data($dbconn,$i-1,'user_id','appl_pending','user_name',$username),'l_name') ?>"/>
                                                            <input type="hidden" name="reg" id="reg" value="<?php echo get_specific_data($dbconn,'applications','user_id',get_cond_data($dbconn,$i-1,'user_id','appl_pending','user_name',$username),'reg_no'); ?>"/>
                                                            <input type="hidden" name="coursename" id="coursename" value="<?php echo get_cond_data($dbconn,$i-1,'course_name','appl_pending','user_name',$username); ?>"/>
                                                            <input type="hidden" name="dept" id="dept" value="<?php echo get_specific_data($dbconn,'courses','course_id',get_cond_data($dbconn,$i-1,'course_id','appl_pending','user_name',$username),'course_dept') ?>"/>
                                                            <button type="submit" class="btn btn-secondary del_btn">View</button>
                                                        </form>
                                                        <?php } ?>
                                                    </td>
                                                    <td><?php echo get_cond_data($dbconn,$i-1,'appl_code','appl_pending','user_name',$username); ?></td>
                                                    <td><?php echo get_cond_data($dbconn,$i-1,'user_name','appl_pending','user_name',$username); ?></td>
                                                    <td><?php echo get_cond_data($dbconn,$i-1,'course_code','appl_pending','user_name',$username); ?></td>
                                                    <td><?php echo get_cond_data($dbconn,$i-1,'course_name','appl_pending','user_name',$username); ?></td>
                                                    <td><?php if(get_cond_data($dbconn,$i-1,'approved','appl_pending','user_name',$username) == '0'){ echo 'Pending';}else{echo 'Approved';} ?></td>
                                                    <td><?php echo get_cond_data($dbconn,$i-1,'add_date','appl_pending','user_name',$username); ?></td>
                                                    <td>
                                                        <?php
                                                        if(get_cond_data($dbconn,$i-1,'approved','appl_pending','user_name',$username) == '0'){
                                                            echo 'Pending';
                                                        }else{ ?>
                                                        <a href="admit.php?user_name=<?php echo $_SESSION['username'] ?>">Admissions</a>
                                                        <?php } ?>
                                                    </td>
                                                </tr>
                                           <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12 mt-50">
                            <div>
                                <h1>Course Application Form:</h1>
                                <hr />
                            </div>
                            <div>
                                <?php
                                    if(isset($_GET['courseid']) && !empty($_GET['courseid'])){
                                        $q1=mysqli_query($dbconn,"SELECT * FROM appl_pending WHERE course_id=$_GET[courseid]");
                                        $comp=mysqli_fetch_assoc($q1);
                                        $applid=$comp['appl_id'];
                                        $applcode=$comp['appl_code'];
                                        $coursename = get_specific_data($dbconn,'courses','course_id',$_GET['courseid'],'course_name');;
                                        $coursecode =  get_specific_data($dbconn,'courses','course_id',$_GET['courseid'],'course_code');
                                        //$username = $_SESSION['username'];
                                        $applfee =  get_specific_data($dbconn,'courses','course_id',$_GET['courseid'],'appl_fee');
                                        $quorum = get_specific_data($dbconn,'courses','course_id',$_GET['courseid'],'quorum');
                                        $fname = get_specific_data($dbconn, 'users','username',$_SESSION['username'], 'f_name');
                                        $lname = get_specific_data($dbconn, 'users','username',$_SESSION['username'], 'l_name');

                                    } else{
                                        $applcode= "";
                                        $coursename = "";
                                        $coursecode =  "";
                                        $applfee =  "";
                                        $quorum = "";
                                        $fname = "";
                                        $lname = "";
                                    }
                                ?>
                                <form id="applForm" enctype="multipart/form-data" action="components/apply-process.php?user_name=<?php echo $_SESSION['username']; ?>" method="post" onsubmit="return checkUploads(this);">
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="inputEmail4">First Name:</label>
                                            <input type="text" class="form-control" name="fname" placeholder="First Name" value="<?php echo $fname; ?>" required="required">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="inputEmail4">Last Name:</label>
                                            <input type="text" class="form-control" name="lname" placeholder="Last Name" value="<?php echo $lname; ?>" required="required">
                                        </div>

                                    </div>
                                    <hr />
                                    <div class="form-row">
                                        <div class="form-group col-md-4">
                                            <label for="inputEmail4">Application Code:</label>
                                            <fieldset disabled>
                                                <input type="text" class="form-control"  placeholder="Application Code" value="<?php echo $applcode; ?>">
                                            </fieldset>
                                            <input type="hidden" class="form-control" name="applcode" value="<?php echo $applcode; ?>">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="inputEmail4">Course Code:</label>
                                            <fieldset disabled>
                                                <input type="text" class="form-control"  placeholder="Course Code" value="<?php echo $coursecode; ?>">
                                            </fieldset>
                                            <input type="hidden" class="form-control" name="coursecode" value="<?php echo $coursecode; ?>">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="inputEmail4">Course Name:</label>
                                            <fieldset disabled>
                                                <input type="text" class="form-control" placeholder="Course Name" value="<?php echo $coursename; ?>">

                                            </fieldset>
                                            <input type="hidden" class="form-control" name="coursename" value="<?php echo $coursename; ?>">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-4">
                                            <label for="natid" >Upload National ID</label>
                                            <input  name="natid" id="natid" class="form-control"  type="file">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="kcse" >Upload KCSE result slip/Certificate </label>
                                            <input  name="kcse" id="kcse" class="form-control"  type="file">
                                        </div>
                                    </div>

                                    <button type="submit" class="btn btn-primary applyBtn">Apply</button>
                                    <input type="hidden" name="appl_id" value="<?php echo $applid; ?>" />
                                    <input type="hidden" name="course_id" value="<?php echo $_GET['courseid']; ?>" />
                                    <input type="hidden" name="save_btn" value="Save Asset" />
                                </form>
                            </div>

                        </div>
                    </div>

                </div>
    </section>
            <!-- Start popular-courses Area -->
            <?php include 'controllers/courses/popular-courses.php' ?>
            <!-- End popular-courses Area -->

            <!-- start footer Area -->
            <?php include 'controllers/base/footer.php' ?>
            <!-- End footer Area -->
           <?php include 'controllers/base/js.php' ?>
        </body>
    </html>