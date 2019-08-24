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
        width: 300px;
        height: 200px;
    }

    footer {
        position: relative;
        margin-top: 35%;
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

<script type="text/javascript">
    function confirmAdm(form){
        var id = form.userid.value;
        var r = confirm("Confirm Admission Approval of User ID: "+id);
        if(r){
            return true;
        }else{
            return false;
        }
    }

</script>
<body data-spy="scroll" data-target=".onpage-navigation" data-offset="60">
    <main>
    <?php include 'controllers/navigation/first-navigation.php' ?>
        <div class="container" id="planner">

        <?php
          if($_GET['app'] == 'success'){ ?>
            <script type="text/javascript">
                alert("Admission Approved Successfully!");
            </script>
        <?php  }else if($_GET['app'] == 'fail'){  ?>
            <script type="text/javascript">
                alert("Admission Approval Failed!");
            </script>
        <?php }?>
        <h3 class="text-center">Admission Details Review</h3>
        <hr><br>
        <?php
            $userid = $_GET['id'];
            $applid = get_specific_data($dbconn,'applications','user_id',$userid,'appl_id');
            $regno = get_specific_data($dbconn,'applications','user_id',$userid,'reg_no');
            $courseid = get_specific_data($dbconn,'applications','user_id',$userid,'course_id');
            $bioid = get_specific_data($dbconn,'biodata','user_id',$userid,'bio_id');
            $schoolid = get_specific_data($dbconn,'schooldata','user_id',$userid,'school_id');
            $docid = get_specific_data($dbconn,'uploads','user_id',$userid,'doc_id')
        ?>

        <table cellpadding="0" cellspacing="0" border="1" class="table  table-bordered" id="viewtable" style="border-color:#CCCCCC" >
            <?php
              if(isset($bioid)&&!empty($bioid)){ ?>
            <tr>
                    <td><b>Name</b></td>
                    <td> <?php echo get_specific_data($dbconn,'biodata','user_id',$userid,'lname') ?> <?php echo get_specific_data($dbconn,'biodata','user_id',$userid,'fname') ?></td>
                    <td><b>Id Number</b></td>
                    <td> <?php echo get_specific_data($dbconn,'biodata','user_id',$userid,'idno') ?></td>
                </tr>
                <tr>
                    <td><b>Gender</b></td>
                    <td> <?php echo get_specific_data($dbconn,'biodata','user_id',$userid,'gender') ?></td>
                    <td><b>Date OF Birth</b></td>
                    <td> <?php echo get_specific_data($dbconn,'biodata','user_id',$userid,'dob') ?></td>
                </tr>
               <tr>
                    <td><b>Religion</b></td>
                    <td><?php echo get_specific_data($dbconn,'biodata','user_id',$userid,'religion') ?> </td>
                    <td><b>P.O. Box</b></td>
                    <td><?php echo get_specific_data($dbconn,'biodata','user_id',$userid,'box') ?></td>
                </tr>
                <tr>
                    <td><b>Phone Number</b></td>
                    <td> <?php echo get_specific_data($dbconn,'biodata','user_id',$userid,'mobile') ?></td>
                    <td><b>Town</b></td>
                    <td> <?php echo get_specific_data($dbconn,'biodata','user_id',$userid,'town') ?></td>
                </tr>
                <tr>
                    <td><b>Email</b></td>
                    <td> <?php echo get_specific_data($dbconn,'biodata','user_id',$userid,'email') ?></td>
                    <td><b>Town Code</b></td>
                    <td><?php echo get_specific_data($dbconn,'biodata','user_id',$userid,'town_code') ?></td>
                </tr>
                <tr>
                    <td><b>Country</b></td>
                    <td> <?php echo get_specific_data($dbconn,'biodata','user_id',$userid,'nationality') ?></td>
                    <td><b>Disabled</b></td>
                    <td><?php echo get_specific_data($dbconn,'biodata','user_id',$userid,'disabled') ?></td>
                </tr>
          	    <tr>
                    <td><b>Date Created </b></td>
                    <td> <?php echo get_specific_data($dbconn,'biodata','user_id',$userid,'add_date') ?></td>
                    <td><b>Admission Status </b></td>
                    <td> <?php echo get_specific_data($dbconn,'users','user_id',$userid,'adm_status') ?></td>
                </tr>
            <?php  }else{ ?>
                <tr>
                    <td colspan='8'>
                        <div class="alert alert-danger text-center">
                           Personal Details have yet to be submitted
                            <!--<a href="admit.php?user_name=<?php echo $_SESSION['username']; ?>&step=biodata" class="btn btn-primary">
                                Click here to fill your personal school details
                            </a>-->
                        </div>
                    </td>
                </tr>
            <?php  } ?>

        </table>
        <br><br></br>
        <table cellpadding="0" cellspacing="0" border="1" class="table  table-bordered" id="viewtable" style="border-color:#CCCCCC" >
            <tr>
                <th colspan="7" class="col-md-12 text-center"><h3>Previous School Details</h3></th>
            </tr>
            <tr>
                <th>Category</th>
                <th>School Name</th>
                <th>School Box</th>
                <th>Grade</th>
                <th>School town</th>
                <th>From Date:</th>
                <th>To Date:</th>
            </tr>
            <?php
              if(isset($schoolid) && !empty($schoolid)){ ?>
            <tr>
                <td>High School</td>
                <td><?php echo get_specific_data($dbconn,'schooldata','user_id',$userid,'school_name') ?></td>
                <td><?php echo get_specific_data($dbconn,'schooldata','user_id',$userid,'school_box') ?></td>
                <td><?php echo get_specific_data($dbconn,'schooldata','user_id',$userid,'grade') ?></td>
                <td><?php echo get_specific_data($dbconn,'schooldata','user_id',$userid,'town') ?></td>
                <td><?php echo get_specific_data($dbconn,'schooldata','user_id',$userid,'fromdate') ?></td>
                <td><?php echo get_specific_data($dbconn,'schooldata','user_id',$userid,'todate') ?></td>
            </tr>
            <tr>
                <td>Other School</td>
                <td><?php echo get_specific_data($dbconn,'schooldata','user_id',$userid,'otherschool_name') ?></td>
                <td><?php echo get_specific_data($dbconn,'schooldata','user_id',$userid,'otherschool_box') ?></td>
                <td><?php echo get_specific_data($dbconn,'schooldata','user_id',$userid,'othergrade') ?></td>
                <td><?php echo get_specific_data($dbconn,'schooldata','user_id',$userid,'othertown') ?></td>
                <td><?php echo get_specific_data($dbconn,'schooldata','user_id',$userid,'otherfromdate') ?></td>
                <td><?php echo get_specific_data($dbconn,'schooldata','user_id',$userid,'othertodate') ?></td>
            </tr>
              <?php }else{ ?>
            <tr>
                <td colspan='8'>
                    <div class="alert alert-danger text-center">
                        Previous School details have yet to be submitted
                        <!--<a href="admit.php?user_name=<?php echo $_SESSION['username']; ?>&step=biodata" class="btn btn-primary">
                            Click here to fill your previous school details
                        </a> -->
                    </div>
                </td>
            </tr>
            <?php  } ?>


        </table>
        <br><br>
        <table cellpadding="0" cellspacing="0" border="1" class="table  table-bordered" id="viewtable" style="border-color:#CCCCCC" >
            <tr>
                <th colspan="7" class="col-md-12 text-center"><h3>Document Upload Details</h3></th>
            </tr>
            <tr>
                <th>Document Name</th>
                <th>Document File</th>
            </tr>
            <?php
                if(isset($docid) && !empty($docid)){ ?>

                <?php
                  $rws = get_rows_data($dbconn,'uploads','user_id',$userid);
                  for($i=0; $i<$rws; $i++){?>
            <tr>
                <td><?php echo get_cond_data($dbconn,$i,'doc_name','uploads','user_id',$userid); ?></td>
                <td>
                    <a target="_blank" href="../userfiles/appl_uploads/<?php echo get_cond_data($dbconn,$i,'doc_file','uploads','user_id',$userid); ?>"><?php echo get_cond_data($dbconn,$i,'doc_file','uploads','user_id',$userid); ?></a>

                </td>
            </tr>
                <?php  } ?>


                <?php }else{ ?>
            <tr>
                <td colspan='8'>
                    <div class="alert alert-danger text-center">
                            Documents have yet to be submitted
                            <!--<a href="admit.php?user_name=<?php echo $_SESSION['username']; ?>&step=biodata" class="btn btn-primary">
                                    Click here to fill your previous school details
                            </a> -->
                    </div>
                </td>
            </tr>
            <?php  } ?>
        </table>

        <br></br>

        <table cellpadding="0" cellspacing="0" border="1" class="table  table-bordered" id="viewtable" style="border-color:#CCCCCC" >
            <thead>
                <tr>
                    <th colspan="5" class="col-md-12 text-center">
                        <h3>Course Details</h3>
                    </th>
                </tr>
                <tr>
                    <th>Surname</th>
                    <th>Campus</th>
                    <th>Course</th>
                    <th>Department</th>
                    <Th>Registration Number</th>
                </tr>
            </thead>
            <?php
              if(isset($applid)&&!empty($applid)){ ?>
            <tr>
                <td><?php echo get_specific_data($dbconn,'biodata','user_id',$userid,'lname') ?></td>
                <td><?php echo "Main Campus"?></td>
                <td><?php echo get_specific_data($dbconn,'biodata','user_id',$userid,'course_name') ?></td>
                <td><?php echo "Department of ".get_specific_data($dbconn,'courses','course_id',get_specific_data($dbconn,'biodata','user_id',$userid,'course_id'),'course_dept') ?></td>
                <td><?php echo get_specific_data($dbconn,'biodata','user_id',$userid,'reg_no') ?></td>
            </tr>
            <?php  }else{ ?>
                <tr>
                    <td colspan='8'>
                        <div class="alert alert-danger text-center">
                           Course Application Details have yet to be submitted
                            <!--<a href="admit.php?user_name=<?php echo $_SESSION['username']; ?>&step=biodata" class="btn btn-primary">
                                Click here to fill your personal school details
                            </a>-->
                        </div>
                    </td>
                </tr>
            <?php  } ?>

        </table>

    </div>
    <br><br><br>
    <center>
        <form action="components/admit.process.php" method="post" enctype="multipart/form-data" onsubmit="return confirmAdm(this);">
            <input type="hidden" name="userid" id="userid" value="<?php echo $userid ?>" />
            <button type="submit" class="btn btn-primary ladda-button font-alt" name="adm" id="adm" value="Adm Approve">Approve Admission</button>
        </form>
    </center>
    <div>
        <a id="back2blog" class="pull-right" href="../index.php">Back to Main</a>
    </div>
    <!--Footer-->
    <?php include 'controllers/base/footer.php' ?>

