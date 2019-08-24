<div class="jq-tab-content" data-tab="2">

    <p class="avg">
        <h4>Required KCSE Mean Average Grade: <span class="mean ml-30"><b><?php echo get_specific_data($dbconn,'courses','course_id',$courseid,'kcse'); ?></b></span></h4>
        <div class="review-top row pt-20">
        <div class="col-lg-3">
            <div class="avg-review">
				Cut Off Points<br>
				<span><?php echo intval(get_specific_data($dbconn,'courses','course_id',$courseid,'math'))+intval(get_specific_data($dbconn,'courses','course_id',$courseid,'eng'))+intval(get_specific_data($dbconn,'courses','course_id',$courseid,'physics'))+intval(get_specific_data($dbconn,'courses','course_id',$courseid,'chem')) ?></span> <br>

			</div>
        </div>
        <div class="col-lg-9">
            <h4 class="mb-20">Required Subject Grades:</h4>
            <div class="d-flex flex-row reviews">
                <span>Mathematics: </span>
                <div class="star">
                    <span><?php echo get_specific_data($dbconn,'courses','course_id',$courseid,'math'); ?></span>
                </div>
            </div>
            <div class="d-flex flex-row reviews">
                <span>English: </span>
                <div class="star">
                    <span><?php echo get_specific_data($dbconn,'courses','course_id',$courseid,'eng'); ?></span>
                </div>
            </div>
            <div class="d-flex flex-row reviews">
                <span>Physics: </span>
                <div class="star">
                    <span><?php echo get_specific_data($dbconn,'courses','course_id',$courseid,'physics'); ?></span>
                </div>
            </div>
            <div class="d-flex flex-row reviews">
                <span>Chemistry: </span>
                <div class="star">
                    <span><?php echo get_specific_data($dbconn,'courses','course_id',$courseid,'chem'); ?></span>
                </div>
            </div>
        </div>
    </div>

    </p>
</div>