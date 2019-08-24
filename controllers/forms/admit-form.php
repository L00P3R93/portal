<div class="row">
    <div class="col-3">
        <div class="list-group" id="list-tab" role="tablist">
            <a class="list-group-item list-group-item-action <?php if($_GET['step'] == 'biodata'){echo "active";} ?>" id="list-home-list" data-toggle="list" href="#list-biodata" role="tab" aria-controls="biodata">Biodata</a>
            <!--<a class="list-group-item list-group-item-action" id="list-profile-list" data-toggle="list" href="#list-family" role="tab" aria-controls="family">Family</a>-->
            <a class="list-group-item list-group-item-action <?php if($_GET['step'] == 'school'){echo "active";} ?>" id="list-messages-list" data-toggle="list" href="#list-school" role="tab" aria-controls="school">School</a>
            <a class="list-group-item list-group-item-action <?php if($_GET['step'] == 'profile'){echo "active";} ?>" id="list-settings-list" data-toggle="list" href="#list-profile" role="tab" aria-controls="profile">Profile</a>
            <a class="list-group-item list-group-item-action <?php if($_GET['step'] == 'uploads'){echo "active";} ?>" id="list-settings-list" data-toggle="list" href="#list-uploads" role="tab" aria-controls="uploads">Document Uploads</a>
            <a class="list-group-item list-group-item-action <?php if($_GET['step'] == 'complete'){echo "active";} ?>" id="list-settings-list" data-toggle="list" href="#list-complete" role="tab" aria-controls="complete">Complete Process</a>
        </div>
    </div>
    <div class="col-9">
        <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade <?php if($_GET['step'] == 'biodata'){echo "show active";} ?>" id="list-biodata" role="tabpanel" aria-labelledby="list-biodata-list">
                <!--Biodata Form -->
                <?php include 'controllers/forms/biodata.php' ?>
            </div>
            <!--<div class="tab-pane fade" id="list-family" role="tabpanel" aria-labelledby="list-family-list">
                <!--family Form -->
                <?php //include 'controllers/forms/family.php' ?>
            <!--</div>-->
            <div class="tab-pane fade <?php if($_GET['step'] == 'school'){echo "show active";} ?>" id="list-school" role="tabpanel" aria-labelledby="list-school-list">
                <!--school Form -->
                <?php include 'controllers/forms/school.php' ?>
            </div>
            <div class="tab-pane fade <?php if($_GET['step'] == 'profile'){echo "show active";} ?>" id="list-profile" role="tabpanel" aria-labelledby="list-profile-list">
                <!--profile Form -->
                <?php include 'controllers/forms/profile.php' ?>
            </div>
            <div class="tab-pane fade <?php if($_GET['step'] == 'uploads'){echo "show active";} ?>" id="list-uploads" role="tabpanel" aria-labelledby="list-uploads-list">
                 <!--uploads Form -->
                <?php include 'controllers/forms/uploads.php' ?>
            </div>
            <div class="tab-pane fade <?php if($_GET['step'] == 'complete'){echo "show active";} ?>" id="list-complete" role="tabpanel" aria-labelledby="list-profile-complete">
                <!--complete Form -->
                <?php include 'controllers/forms/complete.php' ?>
            </div>
        </div>
    </div>
</div>