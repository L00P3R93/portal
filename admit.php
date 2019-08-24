<?php include 'components/authentication.php' ?>
<?php include 'components/session-check.php' ?>
<?php include 'controllers/base/head.php' ?>


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
                                Student Admission Details
                            </h1>
                            <p class="text-white link-nav"><a href="index.php">Home </a>  <span class="lnr lnr-arrow-right"></span>  <a href="admit.php"> Admission</a></p>
                        </div>
                    </div>
                </div>
            </section>
            <!-- End banner Area -->
           <section class="contact-page-area section-gap">
                <div class="container">
                <?php include 'controllers/forms/admit-form.php' ?>
                </div>
    </section>
            <!-- start footer Area -->
            <?php include 'controllers/base/footer.php' ?>
            <!-- End footer Area -->
           <?php include 'controllers/base/js.php' ?>
        </body>
    </html>