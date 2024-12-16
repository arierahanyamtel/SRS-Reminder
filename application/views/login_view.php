

    <!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Login Reminder</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="public/tema/vendors/feather/feather.css">
  <link rel="stylesheet" href="public/tema/vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="public/tema/vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="public/tema/css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="public/tema/logo.jpg" />
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
              <div class="container d-flex justify-content-center align-items-center mb-4">
                <img src="public/tema/logo.jpg" width="20%" alt="logo">
              </div>
              <?php if ($this->session->flashdata('error')): ?>
        <p style="color: red;"><?php echo $this->session->flashdata('error'); ?></p>
    <?php endif; ?>
              <h4>Hello! let's get started</h4>
              <h6 class="font-weight-light">Sign in to continue.</h6>
              <form class="pt-3" action="login/authenticate" method="POST">
                <div class="form-group">
                  <input type="username" class="form-control form-control-lg" id="username" name="username" placeholder="Username">
                </div>
                <div class="form-group">
                  <input type="password" class="form-control form-control-lg" id="password" name="password" placeholder="Password">
                </div>
                <div class="mt-3">
                  <button class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" type="submit">SIGN IN</button>
                </div>
                
                
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="public/tema/vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="public/tema/js/off-canvas.js"></script>
  <script src="public/tema/js/hoverable-collapse.js"></script>
  <script src="public/tema/js/template.js"></script>
  <script src="public/tema/js/settings.js"></script>
  <script src="public/tema/js/todolist.js"></script>
  <!-- endinject -->
</body>

</html>
