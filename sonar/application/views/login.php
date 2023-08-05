<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">
    <link rel="icon" type="image/png" href="<?php echo base_url('images/sonar-logo.png') ?>"/>

    <link rel="stylesheet" href="<?php echo base_url('assets/login-form-08/') ?>fonts/icomoon/style.css">

    <link rel="stylesheet" href="<?php echo base_url('assets/login-form-08/') ?>css/owl.carousel.min.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?php echo base_url('assets/login-form-08/') ?>css/bootstrap.min.css">

    <!-- Style -->
    <link rel="stylesheet" href="<?php echo base_url('assets/login-form-08/') ?>css/style.css">

    <title>LOGIN | SONAR</title>

    <style>
      .btn-primary{
        background-color: #320D77 !important;
      }
    </style>
  </head>
  <body>



  <div class="content">
    <div class="container">
      <div class="row">
        <div class="col-md-6 order-md-2">
          <!-- <img src="<?php echo base_url('assets/login-form-08/') ?>images/undraw_file_sync_ot38.svg" alt="Image" class="img-fluid"> -->
          <img src="<?php echo base_url('images/project-management1.png') ?>" alt="Image" class="img-fluid">
        </div>
        <div class="col-md-6 contents">
          <div class="row justify-content-center">
            <div class="col-md-8">
              <div class="">
                <h3>Sign In to <strong>SONAR</strong></h3>
                <p class="">SISTEM INFORMASI MANAGEMEN PROJECT</p>
              </div>

              <form action="<?php echo (site_url('login/cek_login')) ?>" method="post">
                <div class="form-group first">
                  <label for="username">Username</label>
                  <input type="text" class="form-control" id="username" name="username">

                </div>
                <div class="form-group last mb-4">
                  <label for="password">Password</label>
                  <input type="password" class="form-control" id="password" name="password">

                </div>

                <div class="d-flex mb-5 align-items-center">
                  <label class="control control--checkbox mb-0"><span class="caption">Remember me</span>
                    <input type="checkbox" checked="checked"/>
                    <div class="control__indicator"></div>
                  </label>
                  <!-- <span class="ml-auto"><a href="#" class="forgot-pass">Forgot Password</a></span>  -->
                </div>

                <input type="submit" value="Log In" class="btn text-white btn-block btn-success">

              </form>
            </div>
          </div>

        </div>

      </div>
    </div>
  </div>


    <script src="<?php echo base_url('assets/login-form-08/') ?>js/jquery-3.3.1.min.js"></script>
    <script src="<?php echo base_url('assets/login-form-08/') ?>js/popper.min.js"></script>
    <script src="<?php echo base_url('assets/login-form-08/') ?>js/bootstrap.min.js"></script>
    <script src="<?php echo base_url('assets/login-form-08/') ?>js/main.js"></script>
  </body>
</html>