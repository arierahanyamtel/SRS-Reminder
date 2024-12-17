<?php
$base_urll = ((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') ? "https" : "http") . "://" . $_SERVER['HTTP_HOST'] . "/portal";

define('portal', $base_urll);
define('BASE_PATH', __DIR__ . '/');
define('BASE_URL', base_url('public/tema/'));
define('BASE_MENU', __DIR__ . '/');

$error = "";

?>
<!DOCTYPE html>
<html lang="en">


<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Reminder | PT. SENTRAL MEDIKA INDONESIA</title>
  <!-- plugins:css -->

  <link rel="stylesheet" href="<?= BASE_URL ?>vendors/feather/feather.css">
  <link rel="stylesheet" href="<?= BASE_URL ?>vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="<?= BASE_URL ?>vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <link rel="stylesheet" href="https://unpkg.com/bootstrap-table/dist/bootstrap-table.min.css">
  <script src="https://unpkg.com/bootstrap-table/dist/bootstrap-table.min.js"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="<?= BASE_URL ?>vendors/datatables.net-bs4/dataTables.bootstrap4.css">
  <link rel="stylesheet" href="<?= BASE_URL ?>vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" type="text/css" href="<?= BASE_URL ?>js/select.dataTables.min.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="<?= BASE_URL ?>css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="<?= BASE_URL ?>logo.jpg" />
  <style>
    .nav-link i {
    margin-right: 8px; /* Atur jarak sesuai kebutuhan */
}
  </style>
</head>

<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand brand-logo mr-5" href="./"><img src="<?= BASE_URL ?>logo.jpg" class="mr-2"
            alt="Dashboard" /></a>
        <a class="navbar-brand brand-logo-mini" href="./"><img src="<?= BASE_URL ?>logo.jpg" alt="SMI" /></a>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
          <span class="icon-menu"></span>
        </button>
        <ul class="navbar-nav navbar-nav-right">
          <li class="nav-item "><a href="<?php echo base_url(''); ?>/logout">
              <i class="ti-power-off "></i>
              Logout</a></li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
          data-toggle="offcanvas">
          <span class="icon-menu"></span>
        </button>
      </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_settings-panel.html -->


      <!-- partial -->
      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url()?>">
            <i class="bi bi-house-door-fill"></i>
              <span class="menu-title">Home</span>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url()?>reminder">
            <i class="bi bi-card-checklist"></i>
              <span class="menu-title">Reminder</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url()?>contact">
              <i class="ti-book"></i>
              <span class="menu-title">Kontak</span>
            </a>
          </li>
          <?php if ($this->session->userdata('role') === 'admin'): ?>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url()?>user">
              <i class="bi bi-people"></i>
                <span class="menu-title"> Pengguna</span>
              </a>
            </li>
          <?php endif; ?>


        </ul>
      </nav>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">


          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">