<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>sambadi &mdash; Admin</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>assets/vendors/iconfonts/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>assets/vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="<?= base_url() ?>assets/vendors/css/vendor.bundle.addons.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/css/datatables.min.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/css/admin-style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="<?= base_url() ?>assets/img/favicon.ico" />
</head>

<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-top justify-content-center">
        <a class="navbar-brand brand-logo" href="index.html">
          <img src="<?= base_url() ?>assets/img/logo.svg" alt="logo" />
        </a>
        <a class="navbar-brand brand-logo-mini" href="index.html">
          <img src="<?= base_url() ?>assets/img/logo-mini.svg" alt="logo" />
        </a>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center">
        <ul class="navbar-nav navbar-nav-left header-links d-none d-md-flex">
          <li class="nav-item active">
            <a href="#" class="nav-link">Dashboard
              <span class="badge badge-primary ml-1">New</span>
            </a>
          </li>
        </ul>
        <ul class="navbar-nav navbar-nav-right">
          <li class="nav-item dropdown">
            <a class="nav-link count-indicator dropdown-toggle" id="messageDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
              <i class="mdi mdi-file-document-box"></i>
              <span class="count">7</span>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="messageDropdown">
              <div class="dropdown-item">
                <p class="mb-0 font-weight-normal float-left">You have 7 unread mails
                </p>
                <span class="badge badge-info badge-pill float-right">View all</span>
              </div>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item preview-item">
                <div class="preview-thumbnail">
                  <img src="<?= base_url() ?>assets/img/faces/face4.jpg" alt="image" class="profile-pic">
                </div>
                <div class="preview-item-content flex-grow">
                  <h6 class="preview-subject ellipsis font-weight-medium text-dark">David Grey
                    <span class="float-right font-weight-light small-text">1 Minutes ago</span>
                  </h6>
                  <p class="font-weight-light small-text">
                    The meeting is cancelled
                  </p>
                </div>
              </a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item preview-item">
                <div class="preview-thumbnail">
                  <img src="<?= base_url() ?>assets/img/faces/face2.jpg" alt="image" class="profile-pic">
                </div>
                <div class="preview-item-content flex-grow">
                  <h6 class="preview-subject ellipsis font-weight-medium text-dark">Tim Cook
                    <span class="float-right font-weight-light small-text">15 Minutes ago</span>
                  </h6>
                  <p class="font-weight-light small-text">
                    New product launch
                  </p>
                </div>
              </a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item preview-item">
                <div class="preview-thumbnail">
                  <img src="<?= base_url() ?>assets/img/faces/face3.jpg" alt="image" class="profile-pic">
                </div>
                <div class="preview-item-content flex-grow">
                  <h6 class="preview-subject ellipsis font-weight-medium text-dark"> Johnson
                    <span class="float-right font-weight-light small-text">18 Minutes ago</span>
                  </h6>
                  <p class="font-weight-light small-text">
                    Upcoming board meeting
                  </p>
                </div>
              </a>
            </div>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#" data-toggle="dropdown">
              <i class="mdi mdi-bell"></i>
              <span class="count">4</span>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
              <a class="dropdown-item">
                <p class="mb-0 font-weight-normal float-left">You have 4 new notifications
                </p>
                <span class="badge badge-pill badge-warning float-right">View all</span>
              </a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item preview-item">
                <div class="preview-thumbnail">
                  <div class="preview-icon bg-success">
                    <i class="mdi mdi-alert-circle-outline mx-0"></i>
                  </div>
                </div>
                <div class="preview-item-content">
                  <h6 class="preview-subject font-weight-medium text-dark">Application Error</h6>
                  <p class="font-weight-light small-text">
                    Just now
                  </p>
                </div>
              </a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item preview-item">
                <div class="preview-thumbnail">
                  <div class="preview-icon bg-warning">
                    <i class="mdi mdi-comment-text-outline mx-0"></i>
                  </div>
                </div>
                <div class="preview-item-content">
                  <h6 class="preview-subject font-weight-medium text-dark">Settings</h6>
                  <p class="font-weight-light small-text">
                    Private message
                  </p>
                </div>
              </a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item preview-item">
                <div class="preview-thumbnail">
                  <div class="preview-icon bg-info">
                    <i class="mdi mdi-email-outline mx-0"></i>
                  </div>
                </div>
                <div class="preview-item-content">
                  <h6 class="preview-subject font-weight-medium text-dark">New user registration</h6>
                  <p class="font-weight-light small-text">
                    2 days ago
                  </p>
                </div>
              </a>
            </div>
          </li>
          <li class="nav-item dropdown d-none d-xl-inline-block">
            <a class="nav-link dropdown-toggle" id="UserDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
              <span class="profile-text"><?= $_SESSION['username'] ?></span>
              <img class="img-xs rounded-circle" src="<?= $_SESSION['avatar-path'] ?>" alt="Profile image">
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
              <a class="dropdown-item p-0">
                <div class="d-flex border-bottom">
                  <div class="py-3 px-4 d-flex align-items-center justify-content-center">
                    <i class="mdi mdi-bookmark-plus-outline mr-0 text-gray"></i>
                  </div>
                  <div class="py-3 px-4 d-flex align-items-center justify-content-center border-left border-right">
                    <i class="mdi mdi-account-outline mr-0 text-gray"></i>
                  </div>
                  <div class="py-3 px-4 d-flex align-items-center justify-content-center">
                    <i class="mdi mdi-alarm-check mr-0 text-gray"></i>
                  </div>
                </div>
              </a>
              <a class="dropdown-item mt-2">
                Manage Accounts
              </a>
              <a class="dropdown-item">
                Change Password
              </a>
              <a class="dropdown-item">
                Check Inbox
              </a>
              <a class="dropdown-item">
                Sign Out
              </a>
            </div>
          </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="icon-menu"></span>
        </button>
      </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item nav-profile">
            <div class="nav-link">
              <div class="user-wrapper">
                <div class="profile-image">
                  <img src="<?= $_SESSION['avatar-path'] ?>" alt="profile image">
                </div>
                <div class="text-wrapper"><?= $_SESSION['username'] ?></p>
                  <div>
                    <small class="designation text-muted"><?= ucfirst($_SESSION['rank']) ?></small>
                    <span class="status-indicator online"></span>
                  </div>
                </div>
              </div>
              <button class="btn btn-success btn-block">New Post
                <i class="mdi mdi-plus"></i>
              </button>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="home.html">
              <i class="menu-icon mdi mdi-television"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#userdd" aria-expanded="false" aria-controls="userdd">
              <i class="menu-icon mdi mdi-account"></i>
              <span class="menu-title">User Management</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="userdd">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item">
                  <a class="nav-link" href="<?= base_url().'admin/useredit' ?>">Edit User</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="<?= base_url().'admin/useradd' ?>">Add User</a>
                </li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#postdd" aria-expanded="false" aria-controls="postdd">
              <i class="menu-icon mdi mdi-account"></i>
              <span class="menu-title">Post Management</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="postdd">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item">
                  <a class="nav-link" href="<?= base_url().'admin/editpost' ?>">Edit Post</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="<?= base_url().'admin/addpost' ?>">Add Post</a>
                </li>
              </ul>
            </div>
          </li>
        </ul>
      </nav>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-lg-12 grid-margin">
              <?php 
                if(isset($_SESSION['error-msg'])) {
              ?>
                <div class="alert alert-<?= $_SESSION['error-type'] ?> alert-dismissible fade show" role="alert">
                  <strong><?= ucfirst($_SESSION['error-type']) ?>!</strong> <?= $_SESSION['error-msg'] ?>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
              <?php
                }
              ?>
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">
                    Post <a href="<?= base_url() ?>admin/useradd" style="margin-left: 80%" class="btn btn-success btn-sm">Add User</a>
                  </h4>
                  <div class="table-responsive">
                    <table class="table table-bordered display" id="table_post">
                      <thead>
                        <tr>
                          <th>
                            #
                          </th>
                          <th>
                            Username
                          </th>
                          <th>
                            Email
                          </th>
                          <th>
                            Rank
                          </th>
                          <th>
                            Activated
                          </th>
                          <th>
                            Action
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                          foreach($user as $row) {
                            if($row['activated'] == "Y") {
                              $act = "<i class='mdi mdi-check' style='color: green'></i>";
                            }
                            else {
                              $act = "<i class='mdi mdi-close' style='color: red'></i>";
                            }
                        ?>
                        <tr>
                          <td class="font-weight-medium">
                            <?= $row['id'] ?>
                          </td>
                          <td>
                            <?= $row['username'] ?>
                          </td>
                          <td>
                            <?= $row['email'] ?>
                          </td>
                          <td>
                            <?= ucfirst($row['rank']) ?>
                          </td>
                          <td>
                            <?= $act ?>
                          </td>
                          <td>
                            <div>
                              <a href="#" class="btn btn-outline-info btn-sm" data-toggle="modal" data-target="#editModal" data-username="<?= $row['username'] ?>">Edit</a>
                              <a href="#" class="btn btn-outline-danger btn-sm" data-toggle="modal" data-target="#deleteUserModal" data-id="<?= $row['id'] ?>">Delete</a>
                            </div>
                          </td>
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
        <!-- content-wrapper ends -->
        <!-- Edit Modal -->
          <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="editModalLabel">User Edit</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <?= form_open("admin/useredit") ?>
                  <div class="modal-body">
                    <div class="form-group">
                      <label for="username" class="form-control-label">Username:</label>
                      <input type="text" class="form-control" id="username" name="username">
                      <input type="hidden" id="oldusername" name="oldusername">
                    </div>
                    <div class="form-group">
                      <label for="email" class="form-control-label">Email:</label>
                      <input type="email" class="form-control" id="email" name="email">
                    </div>
                    <div class="form-group">
                      <label for="password" class="form-control-label">Password:</label>
                      <input type="password" class="form-control" id="password" name="password">
                    </div>
                    <div class="form-group">
                      <label for="rank" class="form-control-label">Rank:</label>
                      <div class="col-sm-9 select">
                        <select name="rank" id="rank" class="form-control">
                          <option value="admin">Admin</option>
                          <option value="member">Member</option>
                        </select>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="activated" class="form-control-label">Activated:</label>
                      <div class="col-sm-9">
                        <select name="activated" id="activated" class="form-control">
                          <option value="Y">Y</option>
                          <option value="N">N</option>
                        </select>
                      </div>
                    </div>
                  </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <input type="submit" class="btn btn-primary" value="Edit">
                </div>
                </form>
              </div>
            </div>
          </div>

        <!-- Delete Modal -->
          <div class="modal fade" id="deleteUserModal" tabindex="-1" role="dialog" aria-labelledby="deleteUserModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="deleteUserModalLabel">Are you sure?</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <?= form_open("admin/userdelete") ?>
                    <input type="hidden" id="id" name="id">
                    Are you sure you want to continue ?
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Cancel</button>
                  <input type="submit" class="btn btn-success btn-sm" value="Continue">
                </div>
              </div>
              </form>
            </div>
          </div>

        <!-- partial:partials/_footer.html -->
        <footer class="footer">
          <div class="container-fluid clearfix">
            <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © 2018
              <a href="http://www.bootstrapdash.com/" target="_blank">Bootstrapdash</a>. All rights reserved.</span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with
              <i class="mdi mdi-heart text-danger"></i>
            </span>
          </div>
        </footer>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  <!-- plugins:js -->
  <script src="<?= base_url() ?>assets/vendors/js/vendor.bundle.base.js"></script>
  <script src="<?= base_url() ?>assets/vendors/js/vendor.bundle.addons.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <script src="<?= base_url() ?>assets/js/bootstrap.min.js"></script>
  <script src="<?= base_url() ?>assets/js/datatables.min.js"></script>
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="<?= base_url() ?>assets/js/off-canvas.js"></script>
  <script src="<?= base_url() ?>assets/js/misc.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="<?= base_url() ?>assets/js/custom.js"></script>
  <script src="<?= base_url() ?>assets/js/dashboard.js"></script>
  <!-- End custom js for this page-->

  <script type="text/javascript">
      $(document).ready( function () {
        $('#table_post').DataTable();
      } );
    </script>
</body>

</html>