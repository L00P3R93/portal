<?php
    $userid = get_specific_data($dbconn,'users','username',$_SESSION['username'],'user_id');
    $applid = get_specific_data($dbconn,'applications','user_id',$userid,'appl_id');
    $regno = get_specific_data($dbconn,'applications','user_id',$userid,'reg_no');
    $courseid = get_specific_data($dbconn,'applications','user_id',$userid,'course_id');
    $bioid = get_specific_data($dbconn,'biodata','user_id',$userid,'bio_id');
    $schoolid = get_specific_data($dbconn,'schooldata','user_id',$userid,'school_id');

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
                    Yo have not yet submitted the your Personal  details :
                    <a href="admit.php?user_name=<?php echo $_SESSION['username']; ?>&step=biodata" class="btn btn-primary">
                        Click here to fill your personal school details
                    </a>
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
                    Yo have not yet submitted the your Previous School details :
                    <a href="admit.php?user_name=<?php echo $_SESSION['username']; ?>&step=biodata" class="btn btn-primary">
                        Click here to fill your previous school details
                    </a>
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
        <tr>
            <td><?php echo get_specific_data($dbconn,'biodata','user_id',$userid,'lname') ?></td>
            <td>Main Campus</td>
            <td><?php echo get_specific_data($dbconn,'biodata','user_id',$userid,'course_name') ?></td>
            <td>Department of <?php echo get_specific_data($dbconn,'courses','course_id',get_specific_data($dbconn,'biodata','user_id',$userid,'course_id'),'course_dept') ?></td>
            <td><?php echo get_specific_data($dbconn,'biodata','user_id',$userid,'reg_no') ?></td>
        </tr>
    </table>
