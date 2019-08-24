<section class="popular-course-area section-gap">
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
                <div class="active-popular-carusel">
                    <?php for($i=0; $i<=(get_rows($dbconn,'courses') - 1); $i++){ ?>
                    <div class="single-popular-carusel">
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
                        	<a href="#">
                        		<h4>
                        			<?php echo get_data($dbconn,$i,'course_name','courses'); ?>
                        		</h4>
                        	</a>
                        	<p>
                        		<?php echo get_data($dbconn,$i,'descr','courses'); ?>
                        	</p>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </section>