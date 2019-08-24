
<section class="popular-courses-area section-gap courses-page">
    <div class="container">
        <?php if($searcherr){ ?>
              <h4><?php
              echo $searchid;
              echo "No Results to show!"; ?></h4>
        <?php }else{ ?>
        <div class="row">
            <div class="single-popular-carusel col-lg-3 col-md-6">
                <div class="thumb-wrap relative">
                    <div class="thumb relative">
                        <div class="overlay overlay-bg"></div>
                        <img class="img-fluid" src="userfiles/courses/<?php echo get_specific_data($dbconn,'courses','course_id',$searchid,'course_img'); ?>" alt="<?php echo get_specific_data($dbconn,'courses','course_id',$searchid,'course_img'); ?>">
                    </div>
                    <div class="meta d-flex justify-content-between">
                        <!--<p><span class="lnr lnr-users"></span> 355 <span class="lnr lnr-bubble"></span>35</p>-->
                        <h4><?php echo "KSH. ".number_format(get_specific_data($dbconn,'courses','course_id',$searchid,'fpy'),2, '.', ','); ?></h4>
                    </div>
                </div>
                <div class="details">
                    <a href="course-details.php?courseid=<?php echo get_specific_data($dbconn,'courses','course_id',$searchid,'course_id'); ?>">
                        <h4>
                            <?php echo get_specific_data($dbconn,'courses','course_id',$searchid,'course_name'); ?>
                        </h4>
                    </a>
                    <p>
                        <?php echo get_specific_data($dbconn,'courses','course_id',$searchid,'descr'); ?>
                    </p>
                </div>
            </div>
        </div>
        <?php } ?>

    </div>
</section>