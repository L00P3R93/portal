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
    .details li {
      list-style: none;
    }
    li {
        margin-bottom:10px;
    }
   .tital{
       text-align:right;
   }
   .contant_i{
        color: #631e1e;
        border-bottom: 1px solid #cea7a7;
   }

</style>
<body data-spy="scroll" data-target=".onpage-navigation" data-offset="60">
    <main>
    <?php include 'controllers/navigation/first-navigation.php' ?>
    <div class="container">
        <div class="jumbotron">
            <?php $userid = $_GET['id']; ?>
            <div class="row">
                  <div class="col-md-3 col-xs-12 col-sm-6 col-lg-3">
                    <div class="thumbnail text-center photo_view_postion_b" >
                      <img src="../userfiles/avatars/<?php echo get_specific_data($dbconn,'users','user_id',$userid,'avatar') ?>" alt="<?php echo get_specific_data($dbconn,'users','user_id',$userid,'fname') ?>" class="img">
                    </div>
                  </div>
                <div class="col-md-9 col-xs-12 col-sm-6 col-lg-9">
                    <div class="" style="border-bottom:1px solid black">
                        <h2><?php echo get_specific_data($dbconn,'users','user_id',$userid,'f_name') ?> <?php echo get_specific_data($dbconn,'users','user_id',$userid,'l_name') ?></h2>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-4">
                            <ul class=" details">
                                <li><p><span class="glyphicon glyphicon-earphone one" style="width:50px;"></span>+91 90000 00000</p></li>
                                <li><p><span class="glyphicon glyphicon-envelope one" style="width:50px;"></span>somerandom@email.com</p></li>
                                <li><p><span class="glyphicon glyphicon-map-marker one" style="width:50px;"></span>Hyderabad</p></li>
                                <li><p><span class="glyphicon glyphicon-credit-card one" style="width:50px;"></span>66330007</p></li>
                            </ul>
                        </div>
                        <div class="col-md-8">
                            <div>Birthday:</div>
                            <div>Gender:</div>
                            <div>Ethnicity:</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="form-group row">
                    <div class="col-md-12">
                        <div class="form-group" style="border-bottom:1px solid black">
                            <h2>CONTACT INFO</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="col-sm-6 col-xs-6 tital " >Height(feet):</div><div class="col-sm-6 col-xs-6 contant_i">Prasad</div>
                    <div class="clearfix"></div><div class="bot-border"></div>
                    <div class="col-sm-6 col-xs-6 tital " >Weight(lbs):</div><div class="col-sm-6 col-xs-6 contant_i">Prasad</div>
                    <div class="clearfix"></div><div class="bot-border"></div>
                    <div class="col-sm-6 col-xs-6 tital " >Hair Color:</div><div class="col-sm-6 col-xs-6 contant_i">Prasad</div>
                    <div class="clearfix"></div><div class="bot-border"></div>
                    <div class="col-sm-6 col-xs-6 tital " >Hair Length:</div><div class="col-sm-6 col-xs-6 contant_i">Prasad</div>
                    <div class="clearfix"></div><div class="bot-border"></div>
                    <div class="col-sm-6 col-xs-6 tital " >Suit/Dress:</div><div class="col-sm-6 col-xs-6 contant_i">Prasad</div>
                    <div class="clearfix"></div><div class="bot-border"></div>
                 </div>
                     <div class="col-md-4">
                        <div class="col-sm-6 col-xs-6 tital " >Shirt Size:</div><div class="col-sm-6 col-xs-6 contant_i">Prasad</div>
                        <div class="clearfix"></div><div class="bot-border"></div>
                        <div class="col-sm-6 col-xs-6 tital " >Shoe Size:</div><div class="col-sm-6 col-xs-6 contant_i">Prasad</div>
                        <div class="clearfix"></div><div class="bot-border"></div>
                        <div class="col-sm-6 col-xs-6 tital " >Bust:</div><div class="col-sm-6 col-xs-6 contant_i">Prasad</div>
                        <div class="clearfix"></div><div class="bot-border"></div>
                        <div class="col-sm-6 col-xs-6 tital " >Waist:</div><div class="col-sm-6 col-xs-6 contant_i">Prasad</div>
                        <div class="clearfix"></div><div class="bot-border"></div>
                        <div class="col-sm-6 col-xs-6 tital " >Inseam:</div><div class="col-sm-6 col-xs-6 contant_i">Prasad</div>
                        <div class="clearfix"></div><div class="bot-border"></div>
                     </div>
                     <div class="col-md-4">
                        <div class="col-sm-6 col-xs-6 tital " >Hips:</div><div class="col-sm-6 col-xs-6 contant_i">Prasad</div>
                        <div class="clearfix"></div><div class="bot-border"></div>
                        <div class="col-sm-6 col-xs-6 tital " >Glove:</div><div class="col-sm-6 col-xs-6 contant_i">Prasad</div>
                        <div class="clearfix"></div><div class="bot-border"></div>
                        <div class="col-sm-6 col-xs-6 tital " >Hat:</div><div class="col-sm-6 col-xs-6 contant_i">Prasad</div>
                        <div class="clearfix"></div><div class="bot-border"></div>
                     </div>
                    </div>

                    <div class="row">
                      <div class="form-group row">
                        <div class="col-md-12">
                            <div class="form-group" style="border-bottom:1px solid black">
                                <h2>CAR INFO</h2>
                            </div>
                            <div class="col-md-6">
                                <div class="col-sm-4 col-xs-6 tital " >Brand:</div><div class="col-sm-8 col-xs-6 contant_i">Prasad</div>
                                <div class="clearfix"></div><div class="bot-border"></div>
                                <div class="col-sm-4 col-xs-6 tital " >Year:</div><div class="col-sm-8 col-xs-6 contant_i">Prasad</div>
                                <div class="clearfix"></div><div class="bot-border"></div>
                             </div>
                           <div class="col-md-6">
                                <div class="col-sm-4 col-xs-6 tital " >Model:</div><div class="col-sm-8 col-xs-6 contant_i">Prasad</div>
                                <div class="clearfix"></div><div class="bot-border"></div>
                                <div class="col-sm-4 col-xs-6 tital " >Color:</div><div class="col-sm-8 col-xs-6 contant_i">Prasad</div>
                                <div class="clearfix"></div><div class="bot-border"></div>
                             </div>

                        </div>
                      </div>
                    </div>

                </div>
            </div>

    <div>
        <a id="back2blog" class="pull-right" href="../index.php">Back to Main</a>
    </div>
    <!--Footer-->
    <?php include 'controllers/base/footer.php' ?>