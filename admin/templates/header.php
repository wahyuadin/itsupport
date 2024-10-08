<?php
session_start();
if (!isset($_SESSION["login"])) {
  header("Location: ../auth/login.php");
}
include '../function.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>IT Helpdesk</title>
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../assets/plugins/fontawesome-free/css/all.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="../assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <link rel="stylesheet" href="../assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../assets/dist/css/adminlte.min.css">
  <!-- jQuery -->
  <link rel="stylesheet" href="../assets/plugins/jquery-ui/jquery-ui.min.css">
</head>

<body class="hold-transition sidebar-mini">
  <!-- Site wrapper -->
  <div class="wrapper">
    <!-- Navbar -->

    <!-- /.navbar -->
    <!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
  <!-- Left navbar links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
    </li>
  </ul>

  <!-- Right navbar links -->
  <ul class="navbar-nav ml-auto">
    <li class="nav-item">
      <a class="nav-link" data-widget="fullscreen" href="#" role="button">
        <i class="fas fa-expand-arrows-alt mr-2"></i>Fullscreen
      </a>
    </li>
    
    <!-- Account Settings Dropdown -->
    <li class="nav-item dropdown">
      <a class="nav-link" data-toggle="dropdown" href="#">
        <i class="fas fa-user"></i>
        <span class="d-none d-md-inline"><?= $_SESSION["login"]["user_id"] ?></span>
      </a>
      <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
        <span class="dropdown-header"><?= $_SESSION["login"]["Role"] ?></span>
        <div class="dropdown-divider"></div>
        <a href="profil.php" class="dropdown-item">
          <i class="fas fa-cogs mr-2"></i> Profil akun
        </a>
        <div class="dropdown-divider"></div>
        <a href="../auth/logout.php" class="dropdown-item">
          <i class="fas fa-sign-out-alt mr-2"></i> Logout
        </a>
     
       <a href="ubah-pw.php" class="nav-link">
       <i class="fas fa-key nav-icon"></i>Ubah Password
       </a>
         
      </div>
      
    </li>
    <!-- End Account Settings Dropdown -->
  </ul>
</nav>
<!-- /.navbar -->


    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="index.php" class="brand-link">
        <img src="./../assets/img/ptbmj.png" alt="IT Helpdesk" class="brand-image elevation-3" style="filter: drop-shadow(0px 0px 0px white);opacity: .8" >
        <span class="brand-text font-weight-light" style="font-size: 19px;">IT Helpdesk</span>
      </a>
      <style>
        .main-sidebar {
          background-color: rgb(95, 99, 109) ;
          color:#c2c7d0;
        }
      </style>
      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <?php
            $id = $_SESSION["login"]["user_id"];
            $data = query("SELECT * FROM user WHERE user_id = '$id'")[0];
            ?>
            <img src="../assets/img/profile/<?= $data['img']; ?> " class="img-circle" alt="User Image">
          </div>
          <div class="info">
            <a class="d-block" style="cursor: default; margin-top:-12px;"><?= $_SESSION["login"]["Role"] ?></a>
            <a class="d-block" style="cursor: default;"><?= $_SESSION["login"]["user_id"] ?></a>
          </div>

         
        </div>