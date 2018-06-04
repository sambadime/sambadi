<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>sambadi &mdash; Register</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="<?php echo base_url() ?>/assets/css/bootstrap.min.css">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="<?php echo base_url() ?>/assets/css/font-awesome.min.css">
    <!-- Fontastic Custom icon font-->
    <link rel="stylesheet" href="<?php echo base_url() ?>/assets/css/fontastic.css">
    <!-- Google fonts - Poppins -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,700">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="<?php echo base_url() ?>/assets/css/style.violet.css" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="<?php echo base_url() ?>/assets/css/custom.css">
    <!-- Favicon-->
    <link rel="shortcut icon" href="<?php echo base_url() ?>/assets/img/favicon.ico">
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
  </head>
  <body>
    <div class="page login-page">
      <div class="container d-flex align-items-center">
        <div class="form-holder has-shadow">
          <div class="row">
            <!-- Logo & Information Panel-->
            <div class="col-lg-6">
              <div class="info d-flex align-items-center">
                <div class="content">
                  <div class="logo">
                    <h1>Register</h1>
                  </div>
                  <p>Please fill the form beside</p>
                </div>
              </div>
            </div>
            <!-- Form Panel    -->
            <div class="col-lg-6 bg-white">
              <div class="form d-flex align-items-center">
                <div class="content">
                  <?php echo form_open_multipart("main/register"); ?>
                    <div class="form-group">
                      <?php
                        if(isset($alertmsg)) {
                      ?>
                          <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>ERROR !</strong> <?php echo $alertmsg; ?>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                             <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                      <?php
                        }
                      ?>
                    </div>
                    <div class="form-group">
                      <input id="login-username" type="text" name="username" required data-msg="Please enter your username" class="input-material">
                      <label for="login-username" class="label-material">User Name</label>
                    </div>
                    <div class="form-group">
                      <input id="login-email" type="email" name="email" required data-msg="Please enter your email" class="input-material">
                      <label for="login-email" class="label-material">Email</label>
                    </div>
                    <div class="form-group">
                      <input id="login-password" type="password" name="password" required data-msg="Please enter your password" class="input-material">
                      <label for="login-password" class="label-material">Password</label>
                    <div class="form-group">
                      <br />
                      <img id="ava-prev" src="<?php echo base_url() ?>/assets/img/avatars/default-avatar.png" style="width: 100px; height: 100px" />
                      <input type="file" name="userava" id="userava" class="input-material">
                    </div>
                    </div><input type="submit" class="btn btn-primary" value="Login"><br />
                  <small>Already have an account? </small><a href="login.html" class="signup">Signin</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="copyrights text-center">
        <p>Design by <a href="https://bootstrapious.com/admin-templates" class="external">Bootstrapious</a>
          <!-- Please do not remove the backlink to us unless you support further theme's development at https://bootstrapious.com/donate. It is part of the license conditions. Thank you for understanding :)-->
        </p>
      </div>
    </div>
    <!-- JavaScript files-->
    <script src="<?php echo base_url() ?>/assets/js/jquery.min.js"></script>
    <script src="<?php echo base_url() ?>/assets/js/popper.min.js"> </script>
    <script src="<?php echo base_url() ?>/assets/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url() ?>/assets/js/jquery.cookie.js"> </script>
    <script src="<?php echo base_url() ?>/assets/js/Chart.min.js"></script>
    <script src="<?php echo base_url() ?>/assets/js/jquery.validate.min.js"></script>
    <!-- Main File-->
    <script src="<?php echo base_url() ?>/assets/js/front.js"></script>

    <script type="text/javascript">
      function readURL(input) {

          if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
              $('#ava-prev').attr('src', e.target.result);
            }
          reader.readAsDataURL(input.files[0]);
          }
      }

      $("#userava").change(function() {
        readURL(this);
      });
    </script>
  </body>
</html>