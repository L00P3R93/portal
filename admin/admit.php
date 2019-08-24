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

<body data-spy="scroll" data-target=".onpage-navigation" data-offset="60">
    <main>
    <?php include 'controllers/navigation/first-navigation.php' ?>
        <div class="container" id="planner">
        <h3 class="text-center">All Registered Users</h3>
        <hr><br>
        <?php if($_GET['del'] == 'success'){ ?>
            <script type="text/javascript">
                alert("User Deleted Successfully!");
            </script>
        <?php } ?>
        <div class="table-responsive">
            <table class="table table-striped">
                <caption>List of registered users</caption>
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Delete</th>
                        <th scope="col">Username</th>
                        <th scope="col">Application_Status</th>
                        <th scope="col">Admission_Status</th>
                        <th scope="col">Student_Status</th>
                        <!--<th scope="col">User_Profile</th>-->
                        <th scope="col">Admission Forms</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $rws = get_rows_data($dbconn,'users','appl_status','Approved');
                        for($i=0; $i<$rws; $i++){ ?>
                            <tr>
                                <th scope="row"><?php echo $i+1; ?></th>

                                <td>
                                    <form action="components/users.process.php?user_name=<?php echo $_SESSION['username']; ?>&act=d3l&id=<?php echo get_cond_data($dbconn,$i,'user_id','users','appl_status','Approved');?>" method="post" onsubmit="return deleteCheck(this);">
                                        <input type="hidden" name="del_user_id" value="<?php echo get_cond_data($dbconn,$i,'user_id','users','appl_status','Approved');?>" />
                                        <button type="submit" class="btn btn-secondary del_btn"><i class="fa fa-trash-o"></i></button>
                                        <input type="hidden" name="del_btn" value="Delete User" />
                                    </form>
                                </td>
                                <td><?php echo get_cond_data($dbconn,$i,'username','users','appl_status','Approved'); ?></td>
                                <td><?php echo get_cond_data($dbconn,$i,'appl_status','users','appl_status','Approved'); ?></td>
                                <td><?php echo get_cond_data($dbconn,$i,'adm_status','users','appl_status','Approved'); ?></td>
                                <td><?php echo get_cond_data($dbconn,$i,'student_status','users','appl_status','Approved'); ?></td>
                                <!--<td><a href="profile.php?id=<?php echo get_cond_data($dbconn,$i,'user_id','users','appl_status','Approved');?>">Profile</a></td>-->
                                <td><a href="admit.forms.php?id=<?php echo get_cond_data($dbconn,$i,'user_id','users','appl_status','Approved');?>">View</a></td>
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

