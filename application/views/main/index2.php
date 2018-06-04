<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>sambadi</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url().'assets/css/bootstrap.css' ?>" rel="stylesheet">

    <link href="<?php echo base_url().'assets/css/sambadi.css' ?>" rel="stylesheet">

    <style type="text/css">
      body {
        background: url("<?php echo base_url().'assets/img/owl.jpg' ?>") no-repeat center center fixed;
        -webkit-background-size: cover;
        -moz-background-size: cover;
        background-size: cover;
        -o-background-size: cover;
}
    </style>

  </head>

  <body>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark transparent">
      <div class="container">
        <a class="navbar-brand" href="#">sambadi</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link" href="#">Home
                <span class="sr-only">(current)</span>
              </a>
            </li>
            <?php
              if($this->session->has_userdata("loggedin") == true) {
                ?>
                <li class="nav-item">
                  <a class="nav-link" href="dashboard.html">Dashboard</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="logout.html">Logout</a>
                </li> 
            <?php
              }
              else {
                ?>
                <li class="nav-item">
                  <a class="nav-link" href="login.html">Login</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="register.html">Register </a>
                </li>
            <?php
              }
            ?>
          </ul>
        </div>
      </div>
    </nav>

    <!-- Page Content -->
    <section>
      <div class="container">
        <div class="row">
          <div class="col-lg-6 text-white">
            <h1 class="mt-5">Coming soon</h1>
            <p>Useless thing on internet</p>
          </div>
        </div>
      </div>
    </section>

    <!-- Bootstrap core JavaScript -->
    <script src="<?php echo base_url().'assets/js/jquery.min.js' ?>"></script>
    <script src="<?php echo base_url().'assets/js/bootstrap.bundle.min.js'; ?>"></script>

  </body>

</html>
