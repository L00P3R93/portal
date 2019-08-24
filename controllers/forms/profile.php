<?php
    $avatar = get_specific_data($dbconn,'users','username',$_SESSION['username'],'avatar');
    $userid = get_specific_data($dbconn,'users','username',$_SESSION['username'],'user_id');
    $applid = get_specific_data($dbconn,'applications','user_id',$userid,'appl_id');
    $regno = get_specific_data($dbconn,'applications','user_id',$userid,'reg_no');
    $courseid = get_specific_data($dbconn,'applications','user_id',$userid,'course_id');
    $bioid = get_specific_data($dbconn,'biodata','user_id',$userid,'bio_id');
    $schoolid = get_specific_data($dbconn,'schooldata','user_id',$userid,'school_id');

?>
<form action="components/profile-process.php?username=<?php echo $_SESSION['username']; ?>" method="post" enctype="multipart/form-data">
    <h4 class="text-center">NOTE: Make sure you upload aclear  official profile  photo (Passport) which will be used for printing your Student ID and other services.</h4>
    <div class="form-group boxer2">
        <label for="inputEmail4">Image Profile:</label>
        <input type="file" class="form-control" name="profile" id="profile" />
        <label for="inputEmail4">Current Image:</label>
        <br><br>
        <img src="userfiles/avatars/<?php echo $avatar; ?>" class="rounded sizer mx-auto d-block" alt="<?php echo $avatar; ?>">
        <input type="hidden" name="avatar" value="<?php echo $avatar; ?>" />
    </div>

    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <input id="username"  name="username" type="hidden"  value="<?php echo $_SESSION['username']; ?>" />
            <input id="bioid"  name="bioid" type="hidden"  value="<?php echo $bioid; ?>" />
            <input id="applid"  name="applid" type="hidden"  value="<?php echo $applid; ?>" />
            <input id="courseid"  name="courseid" type="hidden"  value="<?php echo $courseid; ?>" />
            <input id="userid"  name="userid" type="hidden"  value="<?php echo $userid; ?>" />
            <button type="submit" value="registerbio" name="btn_savebio"  class="btn btn-success"> Save</button>
        </div>
    </div>
</form>