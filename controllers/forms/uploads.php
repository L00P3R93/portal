<?php
    $userid = get_specific_data($dbconn,'users','username',$_SESSION['username'],'user_id');
    $applid = get_specific_data($dbconn,'applications','user_id',$userid,'appl_id');
?>

<form action="components/upload-process.php?username=<?php echo $_SESSION['username']; ?>" enctype="multipart/form-data" method="post" accept-charset="utf-8">
    <div class="alert alert-danger">MAKE SURE YOU UPLOAD AND NAME YOUR DOCUMENTS CORRECTLY, DOCUMENTS ONCE UPLOADED CAN NOT BE CHANGED, Hence you will be reponsible for wrong documents uploaded or wrongly named.</div>
    <div class="form-group">
        <label for="inputdocumentname" class="col-sm-6 control-label"> Document Name</label>
        <div class="col-sm-10">
            <select class="form-control" name="documentname" required id="documentname">
                <option value="">Select Document Type to be uploaded</option>
                <option value="National Id">National Id</option>
                <option value="Birth Certificate">Birth Certificate</option>
                <option value="Passport">Passport</option>
                <option value="Admission letter">Admission letter</option>
                <option value="NHIF Card">NHIF Card </option>
                <option value="KCPE Certificate">KCPE Certificate</option>
                <option value="KCSE Certificate">KCSE Certificate</option>
                <option value="Certificate">High School Leaving Certificate</option>

            </select>
        </div>
    </div>
    <div class="form-group">
        <label for="inpudocument" class="col-sm-6 control-label">Upload document </label>
        <div class="col-sm-10">
            <input  name="document" class="form-control"  type="file">
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <input id="applid"  name="applid" type="hidden"  value="<?php echo $applid; ?>" />
            <input id="userid"  name="userid" type="hidden"  value="<?php echo $userid; ?>" />
            <button type="submit" name="btn_upload" value="studentdocuments"class="btn btn-success"> Upload new document   </button>
        </div>
    </div>
</form>