<?php include 'components/authentication.php' ?>
<?php include 'components/session-check.php' ?>
<?php include 'controllers/base/head.php' ?>
<style type="text/css">
    #products{

        height:100%;
    }
     .sizer{
        width: 355.5px;
        height: 200px;
        /*border-radius: 30px;*/
    }
    footer {
        position: relative;
        margin-top: 60%;
    }
    #back2blog {
        margin-right: 40px;
        margin-top: 300px;
    }
    .beaut{
        margin-left: 3% !important;
        /*margin-right: 10% !important;*/
    }
</style>
<body data-spy="scroll" data-target=".onpage-navigation" data-offset="60">
    <main>
    <?php include 'controllers/navigation/first-navigation.php' ?>
    <div id="products" class="container-fluid">
        <h1 class="page-header text-center">Dashboard</h1>
        <hr />

        <div class="card-deck">
            <?php
                $rows = mysqli_num_rows(mysqli_query($dbconn,"SELECT * FROM courses"));
                for($i=0; $i<=$rows; $i++){ ?>
                    <div class="card">
                        <img class="card-img-top" src="../userfiles/courses/<?php echo get_data($dbconn,$i,'course_img','courses'); ?>" alt="<?php echo get_data($dbconn,$i,'course_img','courses'); ?>">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo get_data($dbconn,$i,'course_name','courses');?></h5>
                            <p class="card-text"><?php echo get_data($dbconn,$i,'descr','courses');?></p>
                        </div>
                        <div class="card-footer">
                            <small class="text-muted">Last updated 3 mins ago</small>
                        </div>
                    </div>
               <?php
               if($i == 3){
                   break;
               }

               } ?>
        </div>
        <div class="mb-50 mt-150"><hr /></div>
        <div class="card-deck">
                <?php
                for($i=3; $i<$rows; $i++){ ?>
                <div class="card">
                    <img class="card-img-top" src="../userfiles/courses/<?php echo get_data($dbconn,$i,'course_img','courses'); ?>" alt="<?php echo get_data($dbconn,$i,'course_img','courses'); ?>">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo get_data($dbconn,$i,'course_name','courses');?></h5>
                        <p class="card-text"><?php echo get_data($dbconn,$i,'descr','courses');?></p>
                    </div>
                    <div class="card-footer">
                        <small class="text-muted">Last updated 3 mins ago</small>
                    </div>
                </div>
                <?php
                if($i == 6){
                    break;
                }
                } ?>
        </div>
        <div>
            <a id="back2blog" class="pull-right" href="../index.php">Back to Main Site</a>
        </div>
    </div>
    <!--Footer-->
    <?php include 'controllers/base/footer.php' ?>


