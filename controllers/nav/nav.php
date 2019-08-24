<header id="header" id="home">
    <div class="header-top">
    	<div class="container">
      		<div class="row">
      			<div class="col-lg-6 col-sm-6 col-8 header-top-left no-padding">
      				<ul>
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                        <li><a href="#"><i class="fa fa-behance"></i></a></li>
      				</ul>
      			</div>
      			<div class="col-lg-6 col-sm-6 col-4 header-top-right no-padding">
      				<!--<a href="tel:+953 012 3654 896"><span class="lnr lnr-phone-handset"></span> <span class="text">+953 012 3654 896</span></a>
      				<a href="mailto:support@colorlib.com"><span class="lnr lnr-envelope"></span> <span class="text">support@colorlib.com</span></a>-->
                    <?php
                        if(isset($_SESSION['username'])){ ?>
                            <a href="#">
                                <span class="lnr lnr-phone-handset"></span>
                                <img class="profile" src="userfiles/avatars/<?php echo get_specific_data($dbconn,'users','username',$_SESSION['username'],'avatar') ?>">
                                <span class="text">
                                    <?php echo get_specific_data($dbconn,'users','username',$_SESSION['username'],'f_name') ?>, <?php echo get_specific_data($dbconn,'users','username',$_SESSION['username'],'l_name') ?>
                                </span>
                            </a>
  				            <a href="components/logout.php"><span class="lnr lnr-envelope"></span> <span class="text"><b>Log Out</b></span></a>
                    <?php  }else{ ?>
                            <a href="admin/register.php"><span class="lnr lnr-phone-handset"></span> <span class="text"><b>Register</b></span></a>
      				        <a href="admin/login.php"><span class="lnr lnr-envelope"></span> <span class="text"><b>Log In</b></span></a>
                    <?php } ?>

      			</div>
      		</div>
    	</div>
    </div>
    <div class="container main-menu">
    	<div class="row align-items-center justify-content-between d-flex">
          <div id="logo">
            <a href="index.php"><img class="logoSize" src="assets/img/bara.png" alt="" title="" /></a>
          </div>
          <nav id="nav-menu-container">
            <ul class="nav-menu">
              <?php
                if(isset($_SESSION['username'])){ ?>
                    <li><a href="index.php?user_name=<?php echo $_SESSION['username'] ?>">Home</a></li>
                    <li><a href="courses.php?user_name=<?php echo $_SESSION['username'] ?>">Courses</a></li>
                    <li><a href="apply.php?user_name=<?php echo $_SESSION['username'] ?>">Apply</a></li>
                    <?php
                      if(get_specific_data($dbconn,'users','username',$_SESSION['username'],'appl_status') == 'Approved'){ ?>
                    <li><a href="admit.php?user_name=<?php echo $_SESSION['username'] ?>&step=biodata">Admissions</a></li>
                    <?php  } ?>

               <?php }else{ ?>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="courses.php">Courses</a></li>
               <?php } ?>
            </ul>
          </nav><!-- #nav-menu-container -->
    	</div>
    </div>
</header>