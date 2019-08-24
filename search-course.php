    <?php include 'controllers/base/head.php' ?>
        <body>
          <!-- #header -->
            <?php include 'controllers/nav/nav.php' ?>
            <?php
                if(isset($_GET['searid']) && !empty($_GET['searid'])){
                        $searchid = $_GET['searid'];
                        $searcherr = False;
                }else{
                        $searcherr = True;
                        $searchid = "";
                }
            ?>
            <!-- start banner Area -->
            <section class="banner-area relative about-banner" id="home">
                <div class="overlay overlay-bg"></div>
                <div class="container">
                    <div class="row d-flex align-items-center justify-content-center">
                        <div class="about-content col-lg-12">
                            <h1 class="text-white">
                                Search Results
                            </h1>
                            <p class="text-white link-nav"><a href="index.php">Home </a>  <span class="lnr lnr-arrow-right"></span>  <a href="courses.php"> Search Results</a></p>
                        </div>
                    </div>
                </div>
            </section>
            <!-- End banner Area -->

            <!-- Start popular-courses Area -->
            <?php include 'controllers/courses/search-result.php' ?>
            <!-- End popular-courses Area -->

            <!-- Start search-course Area -->
            <?php include 'controllers/forms/search.php'; ?>
            <!-- End search-course Area -->

            <!-- start footer Area -->
            <?php include 'controllers/base/footer.php' ?>
            <!-- End footer Area -->
           <?php include 'controllers/base/js.php' ?>
        </body>
    </html>