<?php

require_once('session_check_librarian.php');
require_once('../db.php');

  // $page = explode('/',$_SERVER['PHP_SELF']);
  // $page = $page[count($page) - 1];
  // echo $page;
  // exit();

  $page = explode('/',$_SERVER['PHP_SELF']);
  $page = end($page);


  $librarian_login = $_SESSION['librarian_login'];
  // $librarian_username = $_SESSION['librarian_username'];
  // $librarian_email = $_SESSION['librarian_email'];
  $query = "SELECT * FROM `librarian` WHERE username='$librarian_login' OR email='$librarian_login'";
  $results = mysqli_query($connection,$query);

  $librarian_info = mysqli_fetch_assoc($results);


 ?>


<!doctype html>
<html lang="en" class="fixed left-sidebar-top">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>LMS</title>
    <link rel="apple-touch-icon" sizes="120x120" href="../assets/favicon/apple-icon-120x120.png">
    <link rel="icon" type="image/png" sizes="192x192" href="../assets/favicon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../assets/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/favicon/favicon-16x16.png">
    <!--load progress bar-->
    <script src="../assets/vendor/pace/pace.min.js"></script>
    <link href="../assets/vendor/pace/pace-theme-minimal.css" rel="stylesheet" />

    <!--BASIC css-->
    <!-- ========================================================= -->
    <link rel="stylesheet" href="../assets/vendor/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="../assets/vendor/font-awesome/css/font-awesome.css">
    <link rel="stylesheet" href="../assets/vendor/animate.css/animate.css">
    <!--SECTION css-->
    <!-- ========================================================= -->
    <!--Notification msj-->
    <!-- <link rel="stylesheet" href="../assets/vendor/toastr/toastr.min.css"> -->
    <!--Magnific popup-->
    <link rel="stylesheet" href="../assets/vendor/magnific-popup/magnific-popup.css">
    <!-- ========================================================= -->
    <!--dataTable-->
    <link rel="stylesheet" href="../assets/vendor/data-table/media/css/dataTables.bootstrap.min.css">
    <!--TEMPLATE css-->
    <!-- ========================================================= -->
    <link rel="stylesheet" href="../assets/stylesheets/css/style.css">


</head>

<body>
    <div class="wrap">
        <!-- page HEADER -->
        <!-- ========================================================= -->
        <div class="page-header">
            <!-- LEFTSIDE header -->
            <div class="leftside-header">
                <div class="logo">
                    <a href="index.php" class="on-click">
                      <h1></h1>  <h3>LMS</h3>
                    </a>
                </div>
                <div id="menu-toggle" class="visible-xs toggle-left-sidebar" data-toggle-class="left-sidebar-open" data-target="html">
                    <i class="fa fa-bars" aria-label="Toggle sidebar"></i>
                </div>
            </div>
            <!-- RIGHTSIDE header -->
            <div class="rightside-header">

                <div class="header-section" id="user-headerbox">
                    <div class="user-header-wrap">

                        <div class="user-info">
                            <span class="user-name"><?= ucwords($librarian_info['firstname'].' '.$librarian_info['lastname'])?></span>
                            <span class="user-profile">Librarian</span>
                        </div>

                    </div>

                </div>
                <div class="header-separator"></div>
                <!--Log out -->
                <div class="header-section">
                    <a href="logout.php" data-toggle="tooltip" data-placement="left" title="Logout"><i class="fa fa-sign-out log-out" aria-hidden="true"></i></a>
                </div>
            </div>
        </div>
        <!-- page BODY -->
        <!-- ========================================================= -->
        <div class="page-body">
            <!-- LEFT SIDEBAR -->
            <!-- ========================================================= -->
            <div class="left-sidebar">
                <!-- left sidebar HEADER -->
                <div class="left-sidebar-header">
                    <div class="left-sidebar-title">Navigation</div>
                    <div class="left-sidebar-toggle c-hamburger c-hamburger--htla hidden-xs" data-toggle-class="left-sidebar-collapsed" data-target="html">
                        <span></span>
                    </div>
                </div>
                <!-- NAVIGATION -->
                <!-- ========================================================= -->
                <div id="left-nav" class="nano">
                    <div class="nano-content">
                        <nav>
                            <ul class="nav nav-left-lines" id="main-nav">
                                <!--HOME-->
                                <li class="<?= $page == 'index.php' ? 'active-item':'' ?>"><a href="index.php"><i class="fa fa-home" aria-hidden="true"></i><span>Dashboard</span></a></li>
                                <li class="<?= $page == 'students.php' ? 'active-item':'' ?>"><a href="students.php"><i class="fa fa-users" aria-hidden="true"></i><span>Students</span></a></li>
                                <li class="has-child-item close-item <?= $page == 'add-book.php' ? 'open-item':'' ?> <?= $page == 'manage-book.php' ? 'open-item':'' ?>">
                                    <a><i class="fa fa-table" aria-hidden="true"></i><span>Books</span></a>
                                    <ul class="nav child-nav level-1">
                                        <li class="<?= $page == 'add-book.php' ? 'active-item':'' ?>"><a href="add-book.php">Add Book</a></li>
                                        <li class="<?= $page == 'manage-book.php' ? 'active-item':'' ?>"><a href="manage-book.php">Manage Book</a></li>
                                    </ul>
                                </li>
                                <li class="<?= $page == 'issue-book.php' ? 'active-item':'' ?>"><a href="issue-book.php"><i class="fa fa-book" aria-hidden="true"></i><span>Issue Book</span></a></li>
                                <li class="<?= $page == 'return-book.php' ? 'active-item':'' ?>"><a href="return-book.php"><i class="fa fa-book" aria-hidden="true"></i><span>Return Book</span></a></li>

                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
            <!-- CONTENT -->

            <div class="content">
