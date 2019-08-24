<?php include 'components/authentication.php' ?>
<?php include 'components/session-check.php' ?>
<?php include 'controllers/base/head.php' ?>
    <style>
        .avg{
            font-weight: 1.5em !important;
            font-size: 1.4em;
        }
        .mean {
            font-weight: 1.5em !important;
            font-size: 1.6em;
        }

    </style>
		<body>
		  <!-- #header -->
            <?php include 'controllers/nav/nav.php' ?>
		    <?php
            if(isset($_GET['courseid']) && !empty($_GET['courseid'])){
               $courseid = $_GET['courseid'];
            }

            ?>
			<!-- start banner Area -->
			<section class="banner-area relative about-banner" id="home">	
				<div class="overlay overlay-bg"></div>
				<div class="container">				
					<div class="row d-flex align-items-center justify-content-center">
						<div class="about-content col-lg-12">
							<h1 class="text-white">
								Popular Courses		
							</h1>	
							<p class="text-white link-nav"><a href="index.php">Home </a>  <span class="lnr lnr-arrow-right"></span>  <a href="courses.php"> Popular Courses</a></p>
						</div>	
					</div>
				</div>
			</section>
			<!-- End banner Area -->	

			<!-- Start course-details Area -->
			<section class="course-details-area pt-120">
				<div class="container">
					<div class="row">
						<div class="col-lg-8 left-contents">
							<div class="main-image">
								<img class="img-fluid courser" src="userfiles/courses/<?php echo get_specific_data($dbconn,'courses','course_id',$courseid,'course_img'); ?>" alt="">
							</div>
							<div class="jq-tab-wrapper" id="horizontalTab">
	                            <div class="jq-tab-menu">
	                                <div class="jq-tab-title active" data-tab="1">Course Details</div>
	                                <div class="jq-tab-title" data-tab="2">Course Requirements</div>
	                            </div>
	                            <div class="jq-tab-content-wrapper">
                                    <?php include 'controllers/courses/objectives.php' ?>
                                    <?php include 'controllers/courses/eligibility.php' ?>
	                            </div>
	                        </div>
						</div>
						<div class="col-lg-4 right-contents">
							<ul>
								<li>
									<a class="justify-content-between d-flex" href="#">
										<p>Course Fee </p>
										<span><?php echo "KSH. ".number_format(get_specific_data($dbconn,'courses','course_id',$courseid,'fpy'), 2, '.', ','); ?> (Per Semester)</span>
									</a>
								</li>
								<!--<li>
									<a class="justify-content-between d-flex" href="#">
										<p>Available Seats </p>
										<span><?php echo get_specific_data($dbconn,'courses','course_id',$courseid,'quorum'); ?></span>
									</a>
								</li> -->
								<li>
									<a class="justify-content-between d-flex" href="#">
										<p>Duration </p>
										<span><?php echo get_specific_data($dbconn,'courses','course_id',$courseid,'duration'); ?> Years</span>
									</a>
								</li>
							</ul>
							<a href="apply.php?user_name=<?php echo $_SESSION['username']; ?>&courseid=<?php echo $courseid; ?>" class="primary-btn text-uppercase">Enroll the course</a>
						</div>
					</div>
				</div>	
			</section>
			<!-- End course-details Area -->
			

			<!-- Start popular-courses Area --> 
			<?php include 'controllers/courses/popular-courses.php' ?>
			<!-- End popular-courses Area -->					

			<!-- Start cta-two Area -->
			<section class="cta-two-area">
				<div class="container">
					<div class="row">
                        <div class="col-lg-8 cta-left">
                            <h1>Choose the BEST from the BEST Courses!</h1>
                        </div>
                        <div class="col-lg-4 cta-right">
                            <a class="primary-btn wh" href="#">take me there</a>
                        </div>
                    </div>
				</div>
			</section>
			<!-- End cta-two Area -->

			<!-- start footer Area -->
			<?php include 'controllers/base/footer.php' ?>
			<!-- End footer Area -->
		   <?php include 'controllers/base/js.php' ?>
		</body>
	</html>