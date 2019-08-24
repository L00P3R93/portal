    <!-- Navbar1 -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-collapse1" aria-controls="#navbar-collapse1" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
      <a class="navbar-brand" href="#totop">UEAB</a>

      <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
          <li class="nav-item <?php selected($_GET["url"],'dash','class="active"')?>">
            <a class="nav-link" href="home.php?url=dash"> Dashboard <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item <?php selected($_GET["url"],'course','class="active"')?>">
            <a class="nav-link" href="courses.php?url=course">Courses</a>
          </li>
          <li class="nav-item <?php selected($_GET["url"],'users','class="active"')?>">
            <a class="nav-link" href="users.php?url=users">Users</a>
          </li>
          <li class="nav-item <?php selected($_GET["url"],'appl','class="active"')?>">
            <a class="nav-link" href="apply.php?url=appl">Applications</a>
          </li>
          <li class="nav-item <?php selected($_GET["url"],'adm','class="active"')?>">
            <a class="nav-link" href="admit.php?url=adm">Admissions</a>
          </li>
          <li class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Reports <strong class="caret"></strong></a>
                <ul class="dropdown-menu right-side" aria-labelledby="dropdownMenu2">
                    <li class="dropdown-item"><a href="reports.applications.php">Applications</a></li>
                    <div class="dropdown-divider"></div>
                    <li class="dropdown-item"><a href="reports.admissions.php">Admissions</a></li>
                </ul>
            </li>
        </ul>
        <ul class="navbar-nav navbar-right">
            <?php
            $current_user = $_SESSION['username'];
            $sql = "SELECT * FROM admin WHERE username='$current_user'";
            $result = mysqli_query($dbconn,$sql);
            $row = mysqli_fetch_assoc($result);
             ?>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <img class="img-admin" src="userfiles/avatars/<?php echo $row['avatar'];?>" alt="<?php echo $row['avatar'];?>" /> &nbsp;
              <?php echo $row['username'];?> <strong class="caret"></strong></a>
                <ul class="dropdown-menu left-side" aria-labelledby="dropdownMenu2">
                    <li class="dropdown-item"><a href="home.php?url=dash">Dashboard</a></li>
                    <div class="dropdown-divider"></div>
                    <li class="dropdown-item"><a href="components/logout.php">Logout</a></li>
                </ul>
            </li>

        </ul>
      </div>
    </nav>
      <!-- ./Navbar1 -->