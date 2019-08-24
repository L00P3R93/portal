<?php
    $userid = get_specific_data($dbconn,'users','username',$_SESSION['username'],'user_id');
    $applid = get_specific_data($dbconn,'applications','user_id',$userid,'appl_id');
    $regno = get_specific_data($dbconn,'applications','user_id',$userid,'reg_no');
    $courseid = get_specific_data($dbconn,'applications','user_id',$userid,'course_id');
    $bioid = get_specific_data($dbconn,'biodata','user_id',$userid,'bio_id');
    $schoolid = get_specific_data($dbconn,'schooldata','user_id',$userid,'school_id');

?>
<form action="components/school-process.php?username=<?php echo $_SESSION['username']; ?>" enctype="multipart/form-data" method="post" accept-charset="utf-8">
    <h4 class="text-center"> Kindly enter correct details of your High school .(Part 1)</h4>
    <hr>
    <div class="form-group">

        <div class="col-sm-10">
            <label for="inputschoolname" class="control-label">School Name</label><label for="inputschoolname" class="control-label">School Name</label>
            <input type="text" name="schoolname" value="<?php echo get_specific_data($dbconn,'schooldata','user_id',$userid,'school_name'); ?>" id="schoolname" class="form-control" required placeholder="e.g Kenya High">
        </div>
    </div>
    <div class="form-group">

        <div class="col-sm-10">
            <label for="inputschoolbox" class=" control-label">	School P.o Box</label>
            <input type="text" name="schoolbox" value="<?php echo get_specific_data($dbconn,'schooldata','user_id',$userid,'school_box'); ?>"id="schoolbox" class="form-control" required placeholder="e.g 00029000">
        </div>
    </div>


    <div class="form-group">
        <div class="col-sm-10">
            <label for="inputtown" class=" control-label">	Town</label>
            <input type="text" name="town" value="<?php echo get_specific_data($dbconn,'schooldata','user_id',$userid,'town'); ?>"id="town" class="form-control" required placeholder="e.g  Nairobi">
        </div>
    </div>

    <div class="form-group row">
        <div class="col-sm-5">
            <label for="inputfromdate" class=" control-label">	 From Date? </label>
            <input type="text" name="fromdate" value="<?php echo get_specific_data($dbconn,'schooldata','user_id',$userid,'fromdate'); ?>" id="fromdate" class="form-control" required placeholder="e.g  2010">
        </div>
        <div class="col-sm-5">
            <label for="inputtodate" class=" control-label">	 To Date? </label>
            <input type="text" name="todate" value="<?php echo get_specific_data($dbconn,'schooldata','user_id',$userid,'todate'); ?>" id="todate" class="form-control" required placeholder="e.g  2014">
        </div>
    </div>

    <div class="form-group">

        <div class="col-sm-10">
            <label for="inputexamtype" class=" control-label">	Exam Body? </label>
            <input type="text" name="examtype" value="<?php echo get_specific_data($dbconn,'schooldata','user_id',$userid,'examtype'); ?>" id="examtype" class="form-control" required placeholder="e.g  KCSE,IGCSE">
        </div>
    </div>

    <div class="form-group">

        <div class="col-sm-10">
            <label for="inputgrade" class=" control-label">	Overall Grade </label>
            <select class="form-control" name="grade" required id="high_school_mean_grade"title="Please select High School mean grade">
                <option selected value="<?php echo get_specific_data($dbconn,'schooldata','user_id',$userid,'grade'); ?>"><?php if(get_specific_data($dbconn,'schooldata','user_id',$userid,'grade')==""){echo "....Please select...";}else{echo get_specific_data($dbconn,'schooldata','user_id',$userid,'grade');}  ?></option>
                <option value="A">A</option>
                <option value="A-">A-</option>
                <option value="B+">B+</option>
                <option value="B">B</option>
                <option value="B-">B-</option>
                <option value="C+">C+</option>
                <option value="C">C</option>
                <option value="C-">C-</option>
                <option value="D+">D+</option>
                <option value="D">D</option>
                <option value="D-">D-</option>
                <option value="E">E</option>
            </select>
        </div>
    </div>
	<h4 class="text-center"> Kindly enter correct details of Other  school  Attended.(Part 2)</h4>
    <hr>

    <div class="form-group">

        <div class="col-sm-10">
            <label for="inputschoolname" class=" control-label">	School Name</label>
            <input type="text" name="otherschoolname" value="<?php echo get_specific_data($dbconn,'schooldata','user_id',$userid,'otherschool_name'); ?>" id="schoolname" class="form-control" required placeholder="e.g Kenya High">
        </div>
    </div>


    <div class="form-group">

        <div class="col-sm-10">
            <label for="inputschoolbox" class=" control-label">	School P.o Box</label>
            <input type="text" name="otherschoolbox" value="<?php echo get_specific_data($dbconn,'schooldata','user_id',$userid,'otherschool_box'); ?>" id="otherschoolbox" class="form-control" required placeholder="e.g 00029000">
        </div>
    </div>


    <div class="form-group">

        <div class="col-sm-10">
            <label for="inputtown" class=" control-label">	Town</label>
            <input type="text" name="othertown" value="<?php echo get_specific_data($dbconn,'schooldata','user_id',$userid,'othertown'); ?>"id="othertown" class="form-control" required placeholder="e.g  Nairobi">
        </div>
    </div>


    <div class="form-group row">
        <div class="col-sm-5">
            <label for="inputfromdate" class=" control-label">From Date? </label>
            <input type="text" name="otherfromdate" value="<?php echo get_specific_data($dbconn,'schooldata','user_id',$userid,'otherfromdate'); ?>"id="otherfromdate" class="form-control" required placeholder="e.g  2010">
        </div>

        <div class="col-sm-5">
            <label for="inputtodate" class=" control-label">To Date? </label>
            <input type="text" name="othertodate" value="<?php echo get_specific_data($dbconn,'schooldata','user_id',$userid,'othertodate'); ?>"id="othertodate" class="form-control" required placeholder="e.g  2014">
        </div>
    </div>

    <div class="form-group">

        <div class="col-sm-10">
            <label for="inputexamtype" class=" control-label">	Exam Body? </label>
            <input type="text" name="otherexamtype" value="<?php echo get_specific_data($dbconn,'schooldata','user_id',$userid,'otherexamtype'); ?>"id="otherexamtype" class="form-control" required placeholder="e.g  2014">
        </div>
    </div>


    <div class="form-group">
        <label for="inputgrade" class=" control-label">	Qualifications </label>
        <div class="col-sm-10">
            <input type="text" name="othergrade" value="<?php echo get_specific_data($dbconn,'schooldata','user_id',$userid,'othergrade'); ?>"id="othergrade" class="form-control" required placeholder="e.g Credit , First Class ">
        </div>
    </div>


    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <input id="schoolid"  name="schoolid" type="hidden"  value="<?php echo $schoolid; ?>" />
            <input id="bioid"  name="bioid" type="hidden"  value="<?php echo $bioid; ?>" />
            <input id="applid"  name="applid" type="hidden"  value="<?php echo $applid; ?>" />
            <input id="courseid"  name="courseid" type="hidden"  value="<?php echo $courseid; ?>" />
            <input id="userid"  name="userid" type="hidden"  value="<?php echo $userid; ?>" />
            <button type="submit"  name="btn_register"  value="studentschool"  class="btn btn-success"> Save </button>
        </div>
    </div>

</form>