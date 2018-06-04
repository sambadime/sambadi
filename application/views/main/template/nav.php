<body>
    <div class="loader-wrapper">
      <div class="sk-folding-cube">
        <div class="sk-cube1 sk-cube"></div>
        <div class="sk-cube2 sk-cube"></div>
        <div class="sk-cube4 sk-cube"></div>
        <div class="sk-cube3 sk-cube"></div>
      </div>
</div>

    </div>
    <div class="page">
      <!-- Main Navbar-->
      <header class="header">
        <nav class="navbar">
          <!-- Search Box-->
          <div class="search-box">
            <button class="dismiss"><i class="icon-close"></i></button>
            <?= form_open("main/search"); ?>
              <input name="keyword" type="search" placeholder="What are you looking for..." class="form-control">
            </form>
          </div>
          <div class="container-fluid">
            <div class="navbar-holder d-flex align-items-center justify-content-between">
              <!-- Navbar Header-->
              <div class="navbar-header">
                <!-- Navbar Brand --><a href="index.html" class="navbar-brand">
                  <div class="brand-text brand-big"><strong>sambadi</strong></div>
                  <div class="brand-text brand-small"><strong>S</strong></div></a>
                <!-- Toggle Button--><a id="toggle-btn" href="#" class="menu-btn active"><span></span><span></span><span></span></a>
              </div>
              <!-- Navbar Menu -->
              <ul class="nav-menu list-unstyled d-flex flex-md-row align-items-md-center">
                <!-- Search-->
                <li class="nav-item d-flex align-items-center"><a id="search" href="#"><i class="icon-search"></i></a></li>

                <?php 
                if($this->session->has_userdata("loggedin")) { 
                  if($user['rank'] == "admin") { ?>
                    <!-- Admin page -->
                    <li class="nav-item"><a href="#" class="nav-link logout">Admin Dashboard</a></li>
                <?php
                    }
                ?>
                      <!-- Logout    -->
                      <li class="nav-item"><a href="logout.html" class="nav-link logout">Logout<i class="fa fa-sign-out"></i></a></li>
                <?php
                 } else {

                ?>
                  <!-- Login -->
                  <li class="nav-item"><a href="login.html" class="nav-link logout">Login</a></li>
                  <!-- Register -->
                  <li class="nav-item"><a href="register.html" class="nav-link logout">Register</a></li>
                <?php } ?>
              </ul>
            </div>
          </div>
        </nav>
      </header>
      <div class="page-content d-flex align-items-stretch"> 
        <!-- Side Navbar -->
        <nav class="side-navbar">
          <!-- Sidebar Header-->
          <?php if($this->session->has_userdata("loggedin")) { ?>
            <div class="sidebar-header d-flex align-items-center">
              <div class="avatar"><img src="<?php echo base_url() ?>/assets/img/avatar-1.jpg" alt="..." class="img-fluid rounded-circle"></div>
              <div class="title">
                <h1 class="h4"><?= $user['username']; ?><small><?= $user['rank']; ?></small></h1>
                <p>Admin</p>
              </div>
            </div>
          <?php } ?>
          <!-- Sidebar Navidation Menus--><span class="heading">Category</span>
          <ul class="list-unstyled">
            <?php
              if(!is_string($cat)) {
                if(is_array($cat)) {
                  foreach($cat as $row) {
                    ?>
                    <li><a href="category/<?= $row['name']; ?>"><?= $row['name']; ?></a></li>
            <?php
                  }
                }
                else {
                  ?>
                  <li><a href="category/<?= $row['name']; ?>"><?= $row['name']; ?></a></li>
            <?php
                }
              }
              else {
                ?>
                <li><a href="#"><?= $cat; ?></a></li>
            <?php
              }
            ?>
          </ul>
          <span class="heading">Date</span>
          <ul class="list-unstyled">
              <li><a href="#">DATE HERE</a></li>
          </ul>
        </nav>