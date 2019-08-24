<form action="components/update-profile-after-registration.php" method="post" enctype="multipart/form-data" id="UploadForm" autocomplete="off">
<?php
    $user_name = mysqli_real_escape_string($dbconn,$_REQUEST['user_name']);
    $sql = "SELECT * FROM users WHERE username='$user_name'";
    $result = mysqli_query($dbconn,$sql);
    $rws = mysqli_fetch_array($result);
    $message = "Your Reset Code is <b>".$rws['reset_phrase']."</b>. Do NOT forget this Reset Code. You will use it to change your Password.";
?>
    
    <div class="row">
        <div class="col-md-6">
            <div class="form-label-group">
                <input type="text" class="form-control" placeholder="First Name" id="user_firstname" name="user_firstname" readonly value="<?php echo $rws['f_name'];?>" required autofocus>
                <label for="user_firstname">First Name</label>
            </div>
            <div class="form-label-group">
                <input type="text" class="form-control" placeholder="Last Name" id="user_lastname" name="user_lastname" readonly value="<?php echo $rws['l_name'];?>" required>
                <label for="user_lastname">Last Name</label>
            </div>
            <div class="form-label-group">
                <input type="text" class="form-control" placeholder="Enter ID Number" id="user_id_no" name="user_id_no"  value="" required>
                <label for="user_id_no">ID/Passport:</label>
            </div>
            <div class="form-label-group">
                <input type="text" class="form-control" placeholder="Enter Phone Number" id="user_phone" name="user_phone"  value="" required>
                <label for="user_phone">Phone Number:</label>
            </div>

            <div class="form-group float-label-control">
                <label for="ImageFile">Avatar</label><br>
                <input name="ImageFile" id="ImageFile"  class="btn btn-primary ladda-button" data-style="zoom-in"  type="file"/>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-label-group">
                <input type="text" class="form-control" placeholder="Username" id="user_name" name="user_name" readonly value="<?php echo $rws['username'];?>" required>
                <label for="user_name">Username:</label>
            </div>
            <div class="form-label-group">
                <input type="text" class="form-control" placeholder="Password Reset Code" id="user_password" name="user_password" readonly value="<?php echo $rws['reset_phrase'];?>" required>
                <label for="user_password">Password Reset Code:</label>
            </div>
            <div class="form-label-group">
                <input type="text" class="form-control" placeholder="Email" id="user_email" name="user_email" readonly value="<?php echo $rws['email'];?>" required>
                <label for="user_email">Email:</label>
            </div>

            <div class="form-group float-label-control">
                <label for="">Gender:</label><br>
                <label for="">Male</label>&nbsp;
                <input type="radio" id="gender" name="gender" value="Male" checked />&nbsp;
                <label for="">Female</label>&nbsp;
                <input type="radio" id="gender" name="gender" value="Female" />
            </div>
        </div>
    </div>
    <hr>                 
    <div class="submit">           
        <center>
            <button class="btn btn-primary ladda-button" data-style="zoom-in" type="submit"  id="SubmitButton" value="Upload" />Save Your Profile</button>
        </center>
    </div>
</form>