<?php include 'controllers/base/head.php' ?>

<style type="text/css">
.banner-area{
    background:url(assets/img/005.jpg) right  !important;
    background-size:cover !important;
    height: 600px !important;
    }
.search-course-area {
    background: url(assets/img/006.jpg) center !important;
    background-size: cover !important;
}
</style>
		<body>
		  <!-- #header -->
          <?php include 'controllers/nav/nav.php' ?>
			<!-- start banner Area -->
			<section class="banner-area relative" id="home">
				<div class="overlay overlay-bg"></div>	
				<div class="container">
					<div class="row fullscreen d-flex align-items-center justify-content-between">
						<div class="banner-content col-lg-9 col-md-12">
							<h1 class="text-uppercase text-center">
                                Welcome to the University of Eastern Africa, Baraton.
                            </h1>
                            <!--<p class="pt-10 pb-10">

                            </p>
							<a href="#" class="primary-btn text-uppercase">Get Started</a>-->
						</div>										
					</div>
				</div>					
			</section>
			<!-- End banner Area -->


			<!-- Start popular-course Area -->
			<?php include 'controllers/courses/courses-carousel.php' ?>
			<!-- End popular-course Area -->


			<!-- Start search-course Area -->
			<?php include 'controllers/forms/search.php'; ?>
			<!-- End search-course Area -->


						
			<!-- start footer Area -->		
			<?php include 'controllers/base/footer.php' ?>
			<!-- End footer Area -->
		   <?php include 'controllers/base/js.php' ?>
		</body>
	</html>