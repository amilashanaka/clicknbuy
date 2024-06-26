<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
  <!-- Left navbar links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
    </li>


  </ul>


  <!-- Right navbar links -->
  <ul class="navbar-nav ml-auto">

    <!-- Notifications Dropdown Menu -->
    <li class="nav-item dropdown  ">
      <a class="nav-link" data-toggle="dropdown" href="#">

        <i class="far fa-bell" style="color: red;"> </i> <span id="notfication-header" style="color: red;"> </span>

      </a>



      <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
        <span class="dropdown-item dropdown-header" id="msg-count">0 Notifications</span>
        <div class="dropdown-divider"></div>

        <div id="notification-aria">

        </div>
        

        



        <!--<a href="#" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> 4 new messages
            <span class="float-right text-muted text-sm">3 mins</span>
          </a>

          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-users mr-2"></i> 8 friend requests
            <span class="float-right text-muted text-sm">12 hours</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-file mr-2"></i> 3 new reports
            <span class="float-right text-muted text-sm">2 days</span>
          </a>-->

        <div class="dropdown-divider"></div>
        <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-widget="fullscreen" href="#" role="button">
        <i class="fas fa-expand-arrows-alt"></i>
      </a>
    </li>



    <li class="nav-item dropdown user-menu">
      <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
        <img src="<?= isset($user_details['img1']) ? $user_details['img1'] : "assets/img/profile.png" ?>" class="user-image img-circle elevation-2" alt="User Image">
        <span class="d-none d-md-inline"><?= isset($_SESSION['login']) ? $_SESSION['login_name'] : " " ?></span>
      </a>
      <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
        <!-- User image -->
        <li class="user-header bg-primary">
          <img src="<?= isset( $user_details['img1']) ? $user_details['img1'] : "assets/img/profile.png" ?>" class="img-circle elevation-2" alt="User Image">


          <p>

            <small>Member since Nov. 2012</small>
          </p>
        </li>
        <!-- Menu Body -->

        <!-- Menu Footer-->
        <li class="user-footer">

          <div class="row">
            <div class="col-md-6">
              <a href="admin.php?id=<?php echo base64_encode($_SESSION['login']); ?>&role=<?php echo base64_encode($_SESSION['role']); ?>" class="btn btn-default btn-flat float-right"><b>My Profile</b></a>
            </div>

            <div class="col-md-6">

              <button onclick="logout()" class="btn btn-default btn-flat float-right" type="submit">Sign
                out</button>

            </div>

          </div>






        </li>
      </ul>
    </li>

  </ul>
</nav>
</nav>
<!-- /.navbar -->