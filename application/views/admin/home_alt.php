<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>sambadi &mdash; Admin</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/bootstrap.min.css">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/font-awesome.min.css">
    <!-- Fontastic Custom icon font-->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/fontastic.css">
    <!-- Google fonts - Poppins -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,700">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/style.default.css" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/custom.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/datatables.min.css">
    <!-- Favicon-->
    <link rel="shortcut icon" href="<?php echo base_url() ?>assets/img/favicon.ico">
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
  </head>
  <body>
    <div class="page">
      <!-- Main Navbar-->
      <header class="header">
        <nav class="navbar">
          <!-- Search Box-->
          <div class="search-box">
            <button class="dismiss"><i class="icon-close"></i></button>
            <form id="searchForm" action="#" role="search">
              <input type="search" placeholder="What are you looking for..." class="form-control">
            </form>
          </div>
          <div class="container-fluid">
            <div class="navbar-holder d-flex align-items-center justify-content-between">
              <!-- Navbar Header-->
              <div class="navbar-header">
                <!-- Navbar Brand --><a href="index.html" class="navbar-brand">
                  <div class="brand-text brand-big"><strong>Dashboard</strong></div>
                  <div class="brand-text brand-small"><strong>D</strong></div></a>
                <!-- Toggle Button--><a id="toggle-btn" href="#" class="menu-btn active"><span></span><span></span><span></span></a>
              </div>
              <!-- Navbar Menu -->
              <ul class="nav-menu list-unstyled d-flex flex-md-row align-items-md-center">
                <!-- Search-->
                <li class="nav-item d-flex align-items-center"><a id="search" href="#"><i class="icon-search"></i></a></li>
                <!-- Notifications-->
                <li class="nav-item dropdown"> <a id="notifications" rel="nofollow" data-target="#" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link"><i class="fa fa-bell-o"></i><span class="badge bg-red badge-corner"></span></a>
                  <ul aria-labelledby="notifications" class="dropdown-menu">
                    <li>
                      <a rel="nofollow" href="#" class="dropdown-item all-notifications text-center"> 
                        <div class="notification">
                          <strong>No notification available</strong>
                        </div>
                      </a>
                    </li>
                  </ul>
                </li>
                <!-- Messages                        -->
                <li class="nav-item dropdown"> <a id="messages" rel="nofollow" data-target="#" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link"><i class="fa fa-envelope-o"></i><span class="badge bg-orange badge-corner"></span></a>
                  <ul aria-labelledby="notifications" class="dropdown-menu">
                    <li>
                      <a rel="nofollow" href="#" class="dropdown-item d-flex all-notifications text-center"> 
                        <strong>No messages available</strong>
                      </a>
                    </li>
                  </ul>
                </li>
                <!-- Languages dropdown    -->
                <li class="nav-item dropdown"><a id="languages" rel="nofollow" data-target="#" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link language dropdown-toggle"><img src="<?php echo base_url() ?>assets/img/flags/16/GB.png" alt="English"><span class="d-none d-sm-inline-block">English</span></a>
                  <ul aria-labelledby="languages" class="dropdown-menu">
                    <li><a rel="nofollow" href="#" class="dropdown-item"> <img src="<?php echo base_url() ?>assets/img/flags/16/GB.png" alt="English" class="mr-2">English</a></li>
                  </ul>
                </li>
                <!-- Logout    -->
                <li class="nav-item"><a href="<?= base_url().'logout' ?>" class="nav-link logout">Logout<i class="fa fa-sign-out"></i></a></li>
              </ul>
            </div>
          </div>
        </nav>
      </header>
      <div class="page-content d-flex align-items-stretch"> 
        <!-- Side Navbar -->
        <nav class="side-navbar">
          <!-- Sidebar Header-->
          <div class="sidebar-header d-flex align-items-center">
            <div class="avatar"><img src="<?= $_SESSION['avatar-path'] ?>" alt="..." class="img-fluid rounded-circle"></div>
            <div class="title">
              <div class="dropdown">
                <a id="username" rel="nofollow" data-target="#" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link language dropdown-toggle"><span class="d-none d-sm-inline-block"><h1 class="h4"><?= $_SESSION['username'] ?></h1></span></a>
                <ul aria-labelledby="username" class="dropdown-menu">
                  <li>
                    <a rel="nofollow" href="#" class="dropdown-item">Setting</a>
                  </li>
                </ul>
              </div>
              <p><?= ucfirst($_SESSION['rank']) ?></p>
            </div>
          </div>
          <!-- Sidebar Navidation Menus--><span class="heading">Main</span>
          <ul class="list-unstyled">
            <li class="active"><a href="<?= base_url().'admin/home' ?>"> <i class="icon-home"></i>Home </a></li>
            <li>
              <a href="#users" aria-expanded="false" data-toggle="collapse"> <i class="fa fa-user-circle-o"></i>Users </a>
                <ul id="users" class="collapse list-unstyled ">
                  <li><a href="<?= base_url().'admin/useredit' ?>"><i class="fa fa-pencil"></i>Edit user</a></li>
                  <li><a href="#"><i class="fa fa-plus"></i>Add user</a></li>
                </ul>
            </li>
            <li>
              <a href="#blog" aria-expanded="false" data-toggle="collapse"> <i class="fa fa-user-circle-o"></i>Blog </a>
                <ul id="blog" class="collapse list-unstyled ">
                  <li><a href="#"><i class="fa fa-plus"></i>Add post</a></li>
                  <li><a href="#"><i class="fa fa-pencil"></i>Edit Post</a></li>
                  <li><a href="#"><i class="fa fa-pencil"></i>Edit Category</a></li>
                  <li><a href="#"><i class="fa fa-plus"></i>Add Category</a></li>
                </ul>
            </li>
          </ul><span class="heading">Extras</span>
          <ul class="list-unstyled">
            <li><span style="margin-left: 20px">&copy; sambadi</span></li>
          </ul>
        </nav>
        <div class="content-inner">
          <!-- Page Header-->
          <header class="page-header">
            <div class="container-fluid">
              <h2 class="no-margin-bottom">Dashboard</h2>
            </div>
          </header>
          <!-- Dashboard Counts Section-->
          <section class="dashboard-counts no-padding-bottom">
            <div class="container-fluid">
              <div class="row bg-white has-shadow">
                <!-- Item -->
                <div class="col-xl-3 col-sm-6">
                  <div class="item d-flex align-items-center">
                    <div class="icon bg-violet"><i class="icon-user"></i></div>
                    <div class="title"><span>Total<br>Users</span>
                    </div>
                    <div class="number"><strong>25</strong></div>
                  </div>
                </div>
                <!-- Item -->
                <div class="col-xl-3 col-sm-6">
                  <div class="item d-flex align-items-center">
                    <div class="icon bg-red"><i class="icon-padnote"></i></div>
                    <div class="title"><span>Total<br>Posts</span>
                    </div>
                    <div class="number"><strong>5</strong></div>
                  </div>
                </div>
                <!-- Item -->
                <div class="col-xl-3 col-sm-6">
                  <div class="item d-flex align-items-center">
                    <div class="icon bg-green"><i class="icon-bill"></i></div>
                    <div class="title"><span>Total<br>Visitors</span>
                    </div>
                    <div class="number"><strong>40</strong></div>
                  </div>
                </div>
                <!-- Item -->
                <div class="col-xl-3 col-sm-6">
                  <div class="item d-flex align-items-center">
                    <div class="icon bg-orange"><i class="fa fa-thumbs-o-up"></i></div>
                    <div class="title"><span>Total<br>Likes</span>
                    </div>
                    <div class="number"><strong>50</strong></div>
                  </div>
                </div>
              </div>
            </div>
          </section>
          <section class="tables">   
            <div class="container-fluid">
              <div class="row">
                <div class="col-lg-12">
                  <div class="card">
                    <div class="card-header d-flex align-items-center">
                      <h3 class="h4">Post</h3>
                    </div>
                    <div class="card-body">
                      <div class="table-responsive">                       
                        <table class="table table-striped table-hover display" id="table_post">
                          <thead>
                            <tr>
                              <th>#</th>
                              <th>Title</th>
                              <th>Description</th>
                              <th>Author</th>
                              <th>Status</th>
                              <th>Action</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php
                              foreach($post as $row) {
                                ?>
                                <tr>
                                  <th><?= $row->id ?></th>
                                  <th><?= $row->title ?></th>
                                  <th><?= $row->deskripsi ?></th>
                                  <th><?= $row->author ?></th>
                                  <th><span class="badge bg-red badge-corner"><?= $row->status ?></span></th>
                                  <th><a href="#" style="margin-right: 15px; color: purple"><i class='fa fa-pencil'></i></a><a href="#" style='color: red'><i class='fa fa-times'></i></a></th>
                                </tr>
                            <?php
                              }
                            ?>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </section>
          <!-- Projects Section-->
          <section class="projects">
            <div class="container-fluid">
              <!-- Project-->
              <div class="project">
                <div class="row bg-white has-shadow">
                  <div class="left-col col-lg-6 d-flex align-items-center justify-content-between">
                    <div class="project-title d-flex align-items-center">
                      <div class="image has-shadow"><img src="<?php echo base_url() ?>assets/img/pic08.jpg" alt="..." class="img-fluid"></div>
                      <div class="text">
                        <h3 class="h4">Coming soon page</h3><small>Completed by : admin</small>
                      </div>
                    </div>
                    <div class="project-date"><span class="hidden-sm-down">15/05/2018</span></div>
                  </div>
                  <div class="right-col col-lg-6 d-flex align-items-center">
                    <div class="comments">Completed</div>
                    <div class="project-progress">
                      <div class="progress">
                        <div role="progressbar" style="width: 100%; height: 6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" class="progress-bar bg-red"></div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- Project-->
              <div class="project">
                <div class="row bg-white has-shadow">
                  <div class="left-col col-lg-6 d-flex align-items-center justify-content-between">
                    <div class="project-title d-flex align-items-center">
                      <div class="image has-shadow"><img src="<?php echo base_url() ?>assets/img/pic08.jpg" alt="..." class="img-fluid"></div>
                      <div class="text">
                        <h3 class="h4">Index page</h3><small>Completed by : admin</small>
                      </div>
                    </div>
                    <div class="project-date"><span class="hidden-sm-down">15/05/2018</span></div>
                  </div>
                  <div class="right-col col-lg-6 d-flex align-items-center">
                    <div class="comments">Completed</div>
                    <div class="project-progress">
                      <div class="progress">
                        <div role="progressbar" style="width: 100%; height: 6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" class="progress-bar bg-red"></div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- Project-->
              <div class="project">
                <div class="row bg-white has-shadow">
                  <div class="left-col col-lg-6 d-flex align-items-center justify-content-between">
                    <div class="project-title d-flex align-items-center">
                      <div class="image has-shadow"><img src="<?php echo base_url() ?>assets/img/pic08.jpg" alt="..." class="img-fluid"></div>
                      <div class="text">
                        <h3 class="h4">Home page</h3><small>Taken by : admin</small>
                      </div>
                    </div>
                    <div class="project-date"><span class="hidden-sm-down">Not yet completed</span></div>
                  </div>
                  <div class="right-col col-lg-6 d-flex align-items-center">
                    <div class="comments">Pending</div>
                    <div class="project-progress">
                      <div class="progress">
                        <div role="progressbar" style="width: 45%; height: 6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" class="progress-bar bg-red"></div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- Project-->
              <div class="project">
                <div class="row bg-white has-shadow">
                  <div class="left-col col-lg-6 d-flex align-items-center justify-content-between">
                    <div class="project-title d-flex align-items-center">
                      <div class="image has-shadow"><img src="<?php echo base_url() ?>assets/img/pic08.jpg" alt="..." class="img-fluid"></div>
                      <div class="text">
                        <h3 class="h4">Admin login page</h3><small>Completed by : admin</small>
                      </div>
                    </div>
                    <div class="project-date"><span class="hidden-sm-down">16/05/2018</span></div>
                  </div>
                  <div class="right-col col-lg-6 d-flex align-items-center">
                    <div class="comments">Completed</div>
                    <div class="project-progress">
                      <div class="progress">
                        <div role="progressbar" style="width: 100%; height: 6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" class="progress-bar bg-red"></div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- Project-->
              <div class="project">
                <div class="row bg-white has-shadow">
                  <div class="left-col col-lg-6 d-flex align-items-center justify-content-between">
                    <div class="project-title d-flex align-items-center">
                      <div class="image has-shadow"><img src="<?php echo base_url() ?>assets/img/pic08.jpg" alt="..." class="img-fluid"></div>
                      <div class="text">
                        <h3 class="h4">Admin home page</h3><small>Taken by by : admin</small>
                      </div>
                    </div>
                    <div class="project-date"><span class="hidden-sm-down">Not yet completed</span></div>
                  </div>
                  <div class="right-col col-lg-6 d-flex align-items-center">
                    <div class="comments">Pending</div>
                    <div class="project-progress">
                      <div class="progress">
                        <div role="progressbar" style="width: 10%; height: 6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" class="progress-bar bg-red"></div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </section>
          <!-- Updates Section                                                -->
          <section class="updates no-padding-top">
            <div class="container-fluid">
              <div class="row">
                <!-- Recent Updates-->
                <div class="col-lg-6">
                  <div class="recent-updates card">
                    <div class="card-close">
                      <div class="dropdown">
                        <button type="button" id="closeCard6" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-ellipsis-v"></i></button>
                        <div aria-labelledby="closeCard6" class="dropdown-menu dropdown-menu-right has-shadow"><a href="#" class="dropdown-item remove"> <i class="fa fa-times"></i>Close</a><a href="#" class="dropdown-item edit"> <i class="fa fa-gear"></i>Edit</a></div>
                      </div>
                    </div>
                    <div class="card-header">
                      <h3 class="h4">Recent Updates</h3>
                    </div>
                    <div class="card-body no-padding">
                      <!-- Item-->
                      <div class="item d-flex justify-content-between">
                        <div class="info d-flex">
                          <div class="icon"><i class="icon-rss-feed"></i></div>
                          <div class="title">
                            <h5>Fixed layout bug on admin page</h5>
                            <p>admin</p>
                          </div>
                        </div>
                        <div class="date text-right"><strong>15</strong><span>May</span></div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </section>
          <!-- Page Footer-->
          <footer class="main-footer">
            <div class="container-fluid">
              <div class="row">
                <div class="col-sm-6">
                  <p>sambadi &copy; 2017-2019</p>
                </div>
                <div class="col-sm-6 text-right">
                  <p>Design by <a href="https://bootstrapious.com/admin-templates" class="external">Bootstrapious</a></p>
                  <!-- Please do not remove the backlink to us unless you support further theme's development at https://bootstrapious.com/donate. It is part of the license conditions. Thank you for understanding :)-->
                </div>
              </div>
            </div>
          </footer>
        </div>
      </div>
    </div>
    <!-- JavaScript files-->
    <script src="<?php echo base_url() ?>assets/js/jquery.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/popper.min.js"> </script>
    <script src="<?php echo base_url() ?>assets/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/jquery.cookie.js"> </script>
    <script src="<?php echo base_url() ?>assets/js/Chart.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/jquery.validate.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/charts-home.js"></script>
    <script src="<?php echo base_url() ?>assets/js/datatables.min.js"></script>
    <!-- Main File-->
    <script src="<?php echo base_url() ?>assets/js/front.js"></script>

    <script type="text/javascript">
      $(document).ready( function () {
        $('#table_post').DataTable();
      } );
    </script>
  </body>
</html>