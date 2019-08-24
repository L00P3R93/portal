<?php include 'components/authentication.php' ?>
<?php include 'components/session-check.php' ?>
<?php include 'controllers/base/head.php' ?>
<?php include 'connection/dbconn.php' ?>

<?php
  if($_POST){
    $startdate=mysqli_real_escape_string($dbconn, $_REQUEST['startdate']);
    $enddate=mysqli_real_escape_string($dbconn, $_REQUEST['enddate']);

    $startdate=date('Y-m-d', strtotime($startdate));
    $enddate=date('Y-m-d', strtotime($enddate));

    $approved = 'Approved';
    $sql = "SELECT * FROM users WHERE (join_date >= '$startdate' AND join_date <= '$enddate') AND adm_status='$approved'";
    $query = mysqli_query($dbconn, $sql);

    while($tab = mysqli_fetch_assoc($query)){
        $userid = $tab['user_id'];
        $table .='
                <tr>
                    <td>'.get_specific_data($dbconn,'applications','user_id',$userid,'appl_code').'</td>
                    <td>'.get_specific_data($dbconn,'applications','user_id',$userid,'course_code').'</td>
                    <td>'.get_specific_data($dbconn,'applications','user_id',$userid,'course_name').'</td>
                    <td>'.$tab['username'].'</td>
                    <td>'.get_specific_data($dbconn,'applications','user_id',$userid,'reg_no').'</td>
                    <td>'.$tab['join_date'].'</td>
                </tr>';
    }
  }

?>
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
            <h3 class="text-center">Admission Reports</h3>
            <hr>
            <br>
            <form action="reports.admissions.php" method="post" enctyp="multipart/form-data">
                <div class="row">
                    <div class="form-group col-md-4">
                        <label for="">Start Date</label>
                        <input type="date" name="startdate" id="startdate" class="form-control" />
                    </div>
                    <div class="form-group col-md-4">
                        <label for="">End Date</label>
                        <input type="date" name="enddate" id="endstartdate" class="form-control" />
                    </div>
                    <div class="form-group col-md-4">
                        <button type="submit" class="btn btn-primary ladda-button font-alt mt-20" name="app" id="app" value="Adm Approve">Generate</button>
                    </div>
                </div>
                <br><br>
                <div class="row">
                    <div class="form-group col-md-4">
                        <strong>Start Date:&nbsp;</strong><?php echo $startdate; ?>
                    </div>
                    <div class="form-group col-md-4">
                        <strong>End Date:&nbsp;</strong><?php echo $enddate; ?>
                    </div>
                </div>
                <div class="table-responsive">


                    <table class="table table-striped">
                        <caption>List of Approved Admissions</caption>
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">Appication Code</th>
                                <th scope="col">Course Code</th>
                                <th scope="col">Course Name</th>
                                <th scope="col">UserName</th>
                                <th scope="col">Registration Number</th>
                                <th scope="col">Date</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php if(isset($table)&&!empty($table)){
                                echo $table;
                            }else{
                                echo "No Records Found";
                            } ?>
                        </tbody>
                    </table>
                </div>

            </form>

        </div>
    <div>
        <a id="back2blog" class="pull-right" href="../index.php">Back to Main</a>
    </div>
    <!--Footer-->
    <?php include 'controllers/base/footer.php' ?>