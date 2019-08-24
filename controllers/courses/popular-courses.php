<section class="popular-courses-area section-gap courses-page">
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="menu-content pb-70 col-lg-8">
                <div class="title text-center">
                    <h1 class="mb-10">Popular Courses we offer</h1>
                    <p>There is a moment in the life of any aspiring.</p>
                </div>
            </div>
        </div>
        <div class="row">
            <?php for($i=0; $i<=7/*(get_rows($dbconn,'courses') - 1)*/; $i++){ ?>
            <div class="single-popular-carusel col-lg-3 col-md-6">
                <div class="thumb-wrap relative">
                    <div class="thumb relative">
                        <div class="overlay overlay-bg"></div>
                        <img class="img-fluid" src="userfiles/courses/<?php echo get_data($dbconn,$i,'course_img','courses'); ?>" alt="<?php echo get_data($dbconn,$i,'course_img','courses'); ?>">
                    </div>
                    <div class="meta d-flex justify-content-between">
                        <!--<p><span class="lnr lnr-users"></span> 355 <span class="lnr lnr-bubble"></span>35</p>-->
                        <h4><?php echo "KSH. ".number_format(get_data($dbconn,$i,'fpy','courses'),2, '.', ','); ?></h4>
                    </div>
                </div>
                <div class="details">
                    <a href="course-details.php?user_name=<?php echo $_SESSION['username']; ?>&courseid=<?php echo get_data($dbconn,$i,'course_id','courses'); ?>">
                        <h4>
                            <?php echo get_data($dbconn,$i,'course_name','courses'); ?>
                        </h4>
                    </a>
                    <p>
                        <?php echo get_data($dbconn,$i,'descr','courses'); ?>
                    </p>
                </div>
            </div>
            <?php  } ?>
            <!--<div class="single-popular-carusel col-lg-3 col-md-6">
                <div class="thumb-wrap relative">
                    <div class="thumb relative">
                        <div class="overlay overlay-bg"></div>
                        <img class="img-fluid" src="assets/img/p1.jpg" alt="">
                    </div>
                    <div class="meta d-flex justify-content-between">
                        <p><span class="lnr lnr-users"></span> 355 <span class="lnr lnr-bubble"></span>35</p>
                        <h4>$150</h4>
                    </div>
                </div>
                <div class="details">
                    <a href="course-details.php">
                        <h4>
                            Learn Designing
                        </h4>
                    </a>
                    <p>
                        When television was young, there was a hugely popular show based on the still popular fictional characte
                    </p>
                </div>
            </div>
            <div class="single-popular-carusel col-lg-3 col-md-6">
                <div class="thumb-wrap relative">
                    <div class="thumb relative">
                        <div class="overlay overlay-bg"></div>
                        <img class="img-fluid" src="assets/img/p2.jpg" alt="">
                    </div>
                    <div class="meta d-flex justify-content-between">
                        <p><span class="lnr lnr-users"></span> 355 <span class="lnr lnr-bubble"></span>35</p>
                        <h4>$150</h4>
                    </div>
                </div>
                <div class="details">
                    <a href="course-details.php">
                        <h4>
                            Learn React js beginners
                        </h4>
                    </a>
                    <p>
                        When television was young, there was a hugely popular show based on the still popular fictional characte
                    </p>
                </div>
            </div>


            <div class="single-popular-carusel col-lg-3 col-md-6">
                <div class="thumb-wrap relative">
                    <div class="thumb relative">
                        <div class="overlay overlay-bg"></div>
                        <img class="img-fluid" src="assets/img/p4.jpg" alt="">
                    </div>
                    <div class="meta d-flex justify-content-between">
                        <p><span class="lnr lnr-users"></span> 355 <span class="lnr lnr-bubble"></span>35</p>
                        <h4>$150</h4>
                    </div>
                </div>
                <div class="details">
                    <a href="course-details.php">
                        <h4>
                            Learn Surveying
                        </h4>
                    </a>
                    <p>
                        When television was young, there was a hugely popular show based on the still popular fictional characte
                    </p>
                </div>
            </div>
            <div class="single-popular-carusel col-lg-3 col-md-6">
                <div class="thumb-wrap relative">
                    <div class="thumb relative">
                        <div class="overlay overlay-bg"></div>
                        <img class="img-fluid" src="assets/img/p1.jpg" alt="">
                    </div>
                    <div class="meta d-flex justify-content-between">
                        <p><span class="lnr lnr-users"></span> 355 <span class="lnr lnr-bubble"></span>35</p>
                        <h4>$150</h4>
                    </div>
                </div>
                <div class="details">
                    <a href="course-details.php">
                        <h4>
                            Learn Designing
                        </h4>
                    </a>
                    <p>
                        When television was young, there was a hugely popular show based on the still popular fictional characte
                    </p>
                </div>
            </div>
            <div class="single-popular-carusel col-lg-3 col-md-6">
                <div class="thumb-wrap relative">
                    <div class="thumb relative">
                        <div class="overlay overlay-bg"></div>
                        <img class="img-fluid" src="assets/img/p2.jpg" alt="">
                    </div>
                    <div class="meta d-flex justify-content-between">
                        <p><span class="lnr lnr-users"></span> 355 <span class="lnr lnr-bubble"></span>35</p>
                        <h4>$150</h4>
                    </div>
                </div>
                <div class="details">
                    <a href="course-details.php">
                        <h4>
                            Learn React js beginners
                        </h4>
                    </a>
                    <p>
                        When television was young, there was a hugely popular show based on the still popular fictional characte
                    </p>
                </div>
            </div>
            <div class="single-popular-carusel col-lg-3 col-md-6">
                <div class="thumb-wrap relative">
                    <div class="thumb relative">
                        <div class="overlay overlay-bg"></div>
                        <img class="img-fluid" src="assets/img/p3.jpg" alt="">
                    </div>
                    <div class="meta d-flex justify-content-between">
                        <p><span class="lnr lnr-users"></span> 355 <span class="lnr lnr-bubble"></span>35</p>
                        <h4>$150</h4>
                    </div>
                </div>
                <div class="details">
                    <a href="course-details.php">
                        <h4>
                            Learn Photography
                        </h4>
                    </a>
                    <p>
                        When television was young, there was a hugely popular show based on the still popular fictional characte
                    </p>
                </div>
            </div>
            <div class="single-popular-carusel col-lg-3 col-md-6">
                <div class="thumb-wrap relative">
                    <div class="thumb relative">
                        <div class="overlay overlay-bg"></div>
                        <img class="img-fluid" src="assets/img/p4.jpg" alt="">
                    </div>
                    <div class="meta d-flex justify-content-between">
                        <p><span class="lnr lnr-users"></span> 355 <span class="lnr lnr-bubble"></span>35</p>
                        <h4>$150</h4>
                    </div>
                </div>
                <div class="details">
                    <a href="course-details.php">
                        <h4>
                            Learn Surveying
                        </h4>
                    </a>
                    <p>
                        When television was young, there was a hugely popular show based on the still popular fictional characte
                    </p>
                </div>
            </div> -->
            <a href="#" class="primary-btn text-uppercase mx-auto">Load More Courses</a>
        </div>
    </div>
</section>