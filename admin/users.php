<?php include 'components/authentication.php' ?>
<?php include 'components/session-check.php' ?>
<?php include 'controllers/base/head.php' ?>
<?php include 'connection/dbconn.php' ?>
<style type="text/css">
    #planner {
        margin-top:10px;
        margin-bottom: 50px;

    }
    .sizer,#imagePreview {
        width: 300px;
        height: 200px;
    }

    .selector{
        background-color: #5C9DFF;
    }

    .user-background{
        background-color: #8A8A8A;
    }

    footer {
        position: relative;
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
    .footer{
        margin-top: 30%;
        position: relative;
    }

</style>
<script type="text/javascript">
    function deleteCheck(form){
        var id = form.del_user_id.value;
        if(id == ""){
                alert("You have not Selected a User Record To Delete!");
                return false;
        }else{
            var r = confirm("Are you sure you want to delete User Record Id ="+id);
            if(r){
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
                        <th scope="col">Email</th>
                        <th scope="col">Application_Status</th>
                        <th scope="col">Admission_Status</th>
                        <th scope="col">Student_Status</th>
                        <th scope="col">Admission Forms</th>
                        <!--<th scope="col">User_Profile</th>-->
                    </tr>
                </thead>
                <tbody>
                    <?php


                        $rws = get_rows($dbconn, 'users');
                        for($i=0; $i<$rws; $i++){ ?>
                            <tr>
                                <th scope="row"><?php echo $i+1; ?></th>

                                <td>
                                    <form action="components/users.process.php?user_name=<?php echo $_SESSION['username']; ?>&act=d3l&id=<?php echo get_data($dbconn,$i,'user_id','users');?>" method="post" onsubmit="return deleteCheck(this);">
                                        <input type="hidden" name="del_user_id" value="<?php echo get_data($dbconn,$i,'user_id','users');?>" />
                                        <button type="submit" class="btn btn-secondary del_btn"><i class="fa fa-trash-o"></i></button>
                                        <input type="hidden" name="del_btn" value="Delete User" />
                                    </form>
                                </td>
                                <td><?php echo get_data($dbconn,$i,'username','users'); ?></td>
                                <td><?php echo get_data($dbconn,$i,'email','users'); ?></td>
                                <td><?php echo get_data($dbconn,$i,'appl_status','users'); ?></td>
                                <td><?php echo get_data($dbconn,$i,'adm_status','users'); ?></td>
                                <td><?php echo get_data($dbconn,$i,'student_status','users'); ?></td>
                                <!--<td><a href="profile.php?id=<?php echo get_data($dbconn,$i,'user_id','users');?>">View Profile</a></td>-->
                                <td><a href="admit.forms.php?id=<?php echo get_data($dbconn,$i,'user_id','users');?>">View</a></td>


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

