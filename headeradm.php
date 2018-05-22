<?php   
session_start(); 

 ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>SB Admin - Start Bootstrap Template</title>
  <!-- Bootstrap core CSS-->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Page level plugin CSS-->
  <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">
  <!-- My CSS -->
  <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <!-- Navigation-->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="indexadm.php">Start Bootstrap</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
          <a class="nav-link" href="indexadm.php">
            <i class="fa fa-fw fa-dashboard"></i>
            <span class="nav-link-text">Dashboard</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Product Management">
          <a class="nav-link" href="categoryadm.php">
            <i class="fa fa-list"></i>
            <span class="nav-link-text">Categories</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Product Management">
          <a class="nav-link" href="productsadm.php">
            <i class="fa fa-fw fa-area-chart"></i>
            <span class="nav-link-text">Products</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Tables">
          <a class="nav-link" href="usersadm.php">
            <i class="fa fa-users"></i>
            <span class="nav-link-text">Users</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Tables">
          <a class="nav-link" href="newsadm.php">
            <i class="fa fa-newspaper-o"></i>
            <span class="nav-link-text">News</span>
          </a>
        </li>
      </ul>
      <ul class="navbar-nav sidenav-toggler">
        <li class="nav-item">
          <a class="nav-link text-center" id="sidenavToggler">
            <i class="fa fa-fw fa-angle-left"></i>
          </a>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle mr-lg-2" id="messagesDropdown" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-fw fa-envelope"></i>
            <span class="d-lg-none">Messages
              <span class="badge badge-pill badge-primary">12 New</span>
            </span>
            <span class="indicator text-primary d-none d-lg-block">
              <i class="fa fa-fw fa-circle"></i>
            </span>
          </a>
          <div class="dropdown-menu" aria-labelledby="messagesDropdown">
            <h6 class="dropdown-header">New Recipt:</h6>
            <?php  
              require 'database-config.php';
              $sql = "SELECT * FROM news ORDER BY created DESC";
              $result = mysqli_query($conn, $sql);
                if (!$result) {
                  die("Can't query data. Error occure.".mysqli_error($conn));
                }
                if (mysqli_num_rows($result) > 0) {
                  while($row = mysqli_fetch_assoc($result)) {
                    echo '<div class="dropdown-divider"></div>';
                    echo '<a class="dropdown-item" href="#">';
                      echo '<strong>'.$row["title"].'</strong>';
                      echo '<span class="small float-right text-muted">'.$row["created"].'</span>';
                      echo '<div class="dropdown-message small">'.$row["recipe"].'</div>';
                    echo '</a>';
                  }
                }
            ?>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item small" href="#">View all messages</a>
          </div>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle mr-lg-2" id="alertsDropdown" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-fw fa-bell"></i>
            <span class="d-lg-none">Alerts
              <span class="badge badge-pill badge-warning">6 New</span>
            </span>
            <span class="indicator text-warning d-none d-lg-block">
              <i class="fa fa-fw fa-circle"></i>
            </span>
          </a>
          <div class="dropdown-menu" aria-labelledby="alertsDropdown">
            <h6 class="dropdown-header">New Users:</h6>
            <?php  
              require 'database-config.php';
              $sql = "SELECT * FROM users ORDER BY created DESC";
              $result = mysqli_query($conn, $sql);
                if (!$result) {
                  die("Can't query data. Error occure.".mysqli_error($conn));
                }
                if (mysqli_num_rows($result) > 0) {
                  while($row = mysqli_fetch_assoc($result)) {
                    echo '<div class="dropdown-divider"></div>';
                    echo '<a class="dropdown-item" href="#">';
                      echo '<strong>'.$row["username"].'</strong>';
                      echo '<span class="small float-right text-muted">'.$row["created"].'</span>';
                      echo '<div class="dropdown-message small">'.$row["password"].'</div>';
                    echo '</a>';
                  }
                }
            ?>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item small" href="#">View all alerts</a>
          </div>
        </li>
        <li class="nav-item">
          <form class="form-inline my-2 my-lg-0 mr-lg-2">
            <div class="input-group">
              <input class="form-control" type="text" placeholder="Search for...">
              <span class="input-group-btn">
                <button class="btn btn-primary" type="button">
                  <i class="fa fa-search"></i>
                </button>
              </span>
            </div>
          </form>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-toggle="modal" data-target="#exampleModal">
            <?php
            if( (!( isset( $_SESSION['login_status']))) || ($_SESSION['login_status'] != "ready")) {
              echo '<a href="loginadm.php"><i class="fa fa-sign-in" aria-hidden="true"></i> Login</a>';
              echo '</li>';
              echo '<li class="head-dpdn">';
              echo '<a href="signup.php"><i class="fa fa-user-plus" aria-hidden="true"></i> Signup</a>';
            }
            else{
              echo "<li>Hello ".$_SESSION["name"]." !</li>";
            }
            ?>  
            <i class="fa fa-fw fa-sign-out"></i>Logout</a>
        </li>
      </ul>
    </div>
  </nav>
  <div class="content-wrapper">
    <div class="container-fluid">