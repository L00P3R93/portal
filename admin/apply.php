<?php include 'components/authentication.php' ?>
<?php include 'components/session-check.php' ?>
<?php include 'controllers/base/head.php' ?>
<?php include 'connection/dbconn.php' ?>
<style type="text/css">
    #planner {
        width: 100%;
        margin: 10px auto;
    }
    .sizer,#imagePreview {
        /*width: 300px;
        /*height: 200px;*/
    }

    footer {
        margin-top: 15%;
    }
    #back2blog {
        margin-right: 40px;
    }
    #btn-sub{
         margin-top: 20%;
    }
    .inputsl{
        padding: 4px 11px !important;
    }

</style>
<script>
    function deleteCheck(form){
        var id = form.del_appl_id.value;
        if(id == ""){
                alert("You have not Selected an Application Record To Delete!");
                return false;
        }else{
            var r = confirm("Are you sure you want to delete Application Record Id ="+id);
            if(r){
                    return true;
            }else{
                    return false;
            }

        }
    }

    function applApprove(){
        var r = confirm("Are you sure you want to Approve This Application?");
        if (r){
            return true;
        }
        return false;
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
            doc.text(20,70, "Dear Mr/Mrs/Miss "+fname+" "+lname+",");
            doc.text(50,80, "RE: ADMISSION LETTER");
            doc.text(20,90,body);
            doc.save(reg+'.pdf');
        }

        getImageFromUrl('bara.png', createPDF);
        return false;
    }
</script>
<body data-spy="scroll" data-target=".onpage-navigation" data-offset="60">
    <main>
    <?php include 'controllers/navigation/first-navigation.php' ?>
    <div id="planner" class="container-fluid">
        <h2 class="maker">Pending Applications</h2>
        <hr />
        <div class="table-responsive">
            <table class="table table-striped">
                <caption>List of Pending Applications</caption>
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Approve</th>
                        <!--<th scope="col">Deny</th>-->
                        <th scope="col">Delete</th>
                        <th scope="col">Appication Code</th>
                        <th scope="col">Course Code</th>
                        <th scope="col">Course Name</th>
                        <th scope="col">UserName</th>
                        <th scope="col">National_ID</th>

                        <th scope="col">KCSE</th>
                        <th scope="col">Date</th>
                        <th scope="col">Status</th>

                    </tr>
                </thead>
                <tbody>
                    <?php
                        $q = mysqli_query($dbconn,"SELECT * FROM appl_pending WHERE approved='0'");
                        $course = mysqli_fetch_assoc($q);
                        $rws = mysqli_num_rows($q);
                        for($i=1; $i<=$rws; $i++){ ?>
                            <tr>
                                <th scope="row"><?php echo $i; ?></th>
                                <td><a href="components/apply-process.php?user_name=<?php echo $_SESSION['username']; ?>&act=appr&apid=<?php echo get_cond_data($dbconn,$i-1,'appl_id','appl_pending','approved','0');?>" onclick=" return applApprove(this);">Approve</a></td>
                                <!--<td><a href="components/apply-process.php?user_name=<?php echo $_SESSION['username']; ?>&act=d3n&apid=<?php echo get_data($dbconn,$i-1,'appl_id','appl_pending');?>" onclick="return applDeny(this)">Deny</a></td>-->
                                <td>
                                    <form action="components/apply-process.php?user_name=<?php echo $_SESSION['username']; ?>&act=d3l&apid=<?php echo get_cond_data($dbconn,$i-1,'appl_id','appl_pending','approved','0');?>" method="post" onsubmit="return deleteCheck(this);">
                                        <input type="hidden" name="del_appl_id" value="<?php echo get_cond_data($dbconn,$i-1,'appl_id','appl_pending','approved','0');?>" />
                                        <button type="submit" class="btn btn-secondary del_btn"><i class="fa fa-trash-o"></i></button>
                                        <input type="hidden" name="del_btn" value="Delete Course" />
                                    </form>
                                </td>
                                <td><?php echo get_cond_data($dbconn,$i-1,'appl_code','appl_pending','approved','0'); ?></td>
                                <td><?php echo get_cond_data($dbconn,$i-1,'course_code','appl_pending','approved','0'); ?></td>
                                <td><?php echo get_cond_data($dbconn,$i-1,'course_name','appl_pending','approved','0'); ?></td>
                                <td><?php echo get_cond_data($dbconn,$i-1,'user_name','appl_pending','approved','0'); ?></td>
                                <td><a target="_blank" href="../userfiles/appl_uploads/<?php echo get_cond_data($dbconn,$i-1,'natid','appl_pending','approved','0'); ?>"><?php echo get_cond_data($dbconn,$i-1,'natid','appl_pending','approved','0'); ?></a></td>
                                <td><a target="_blank" href="../userfiles/appl_uploads/<?php echo get_cond_data($dbconn,$i-1,'kcse','appl_pending','approved','0'); ?>"><?php echo get_cond_data($dbconn,$i-1,'kcse','appl_pending','approved','0'); ?></a></td>
                                <td><?php echo get_cond_data($dbconn,$i-1,'add_date','appl_pending','approved','0'); ?></td>

                                <td><?php  if(get_cond_data($dbconn,$i-1,'approved','appl_pending','approved','0') == '0'){echo 'PENDING';}else{echo 'APPROVED';} ?></td>
                            </tr>
                       <?php } ?>
                </tbody>
            </table>
        </div>

        <h2 class="maker">Approved Applications</h2>
        <hr />
        <div class="table-responsive">
            <table class="table table-striped">
                <caption>List of Approved Applications</caption>
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">#</th>
                        <!--<th scope="col">Send Letter</th>-->
                        <th scope="col">View Letter</th>
                        <th scope="col">Delete</th>
                        <th scope="col">Appication Code</th>
                        <th scope="col">Course Code</th>
                        <th scope="col">Course Name</th>
                        <th scope="col">UserName</th>
                        <th scope="col">Registration Number</th>
                        <th scope="col">Date</th>

                    </tr>
                </thead>
                <tbody>
                    <?php
                        $q = mysqli_query($dbconn,"SELECT * FROM applications");
                        $course = mysqli_fetch_assoc($q);
                        $rws = mysqli_num_rows($q);
                        for($i=0; $i<$rws; $i++){ ?>
                            <tr>
                                <th scope="row"><?php echo $i+1; ?></th>
                                <!--<td><a href="#" onclick="applApprove()">Send</a></td>-->
                                <td>
                                    <form action="" method="post" onsubmit="return applGenLetter(this);">

                                        <input type="hidden" name="fname" id="fname" value="<?php echo get_specific_data($dbconn,'users','user_id',get_data($dbconn,$i,'user_id','applications'),'f_name') ?>"/>
                                        <input type="hidden" name="lname" id="lname" value="<?php echo get_specific_data($dbconn,'users','user_id',get_data($dbconn,$i,'user_id','applications'),'l_name') ?>"/>
                                        <input type="hidden" name="reg" id="reg" value="<?php echo get_data($dbconn,$i,'reg_no','applications'); ?>"/>
                                        <input type="hidden" name="coursename" id="coursename" value="<?php echo get_data($dbconn,$i,'course_name','applications'); ?>"/>
                                        <input type="hidden" name="dept" id="dept" value="<?php echo get_specific_data($dbconn,'courses','course_id',get_data($dbconn,$i,'course_id','applications'),'course_dept') ?>"/>
                                        <button type="submit" class="btn btn-secondary del_btn">View</button>
                                    </form>
                                </td>
                                <td>
                                    <form action="components/approved.process.php?user_name=<?php echo $_SESSION['username']; ?>&act=d3l&apid2=<?php echo get_data($dbconn,$i,'appl_id','applications');?>" method="post" onsubmit="return deleteCheck(this);">
                                        <input type="hidden" name="del_appl_id" value="<?php echo get_data($dbconn,$i,'appl_id','applications');?>" />
                                        <button type="submit" class="btn btn-secondary del_btn"><i class="fa fa-trash-o"></i></button>
                                        <input type="hidden" name="del_btn2" value="Delete Course" />
                                    </form>
                                </td>
                                <td><?php echo get_data($dbconn,$i,'appl_code','applications'); ?></td>
                                <td><?php echo get_data($dbconn,$i,'course_code','applications'); ?></td>
                                <td><?php echo get_data($dbconn,$i,'course_name','applications'); ?></td>
                                <td><?php echo get_data($dbconn,$i,'user_name','applications'); ?></td>
                                <td><?php echo get_data($dbconn,$i,'reg_no','applications'); ?></td>
                                <td><?php echo get_data($dbconn,$i,'add_date','applications'); ?></td>
                            </tr>
                       <?php } ?>
                </tbody>
            </table>
        </div>
    </div>

        <div>
            <a id="back2blog" class="pull-right" href="../index.php">Back to Main</a>
        </div>
    <!--Footer-->
    <?php include 'controllers/base/footer.php' ?>

