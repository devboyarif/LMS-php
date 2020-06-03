<?php
session_start();

if (isset($_SESSION['student_login'])) {
  header('location: index.php');
}

  require_once('../db.php');


  if (isset($_POST['login'])) {

    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = "SELECT * FROM `students` WHERE email='$email' OR username='$email'";
    $results=mysqli_query($connection,$query);

    if (mysqli_num_rows($results) == 1) {
      $row = mysqli_fetch_assoc($results);

      if ( password_verify($password , $row['password']) ) {

          if ($row['status'] == 1) {

            $_SESSION['student_login'] = $email;
//            $_SESSION['student_login_id'] = $row['id'];
//            $_SESSION['student_fname'] = $row['fname'];
//            $_SESSION['student_lname'] = $row['lname'];
//            $_SESSION['student_email'] = $row['email'];
//            $_SESSION['student_username'] = $row['username'];
//            $_SESSION['student_roll'] = $row['roll'];
//            $_SESSION['student_reg'] = $row['reg'];
//            $_SESSION['student_pass'] = $row['password'];
//            $_SESSION['student_phone'] = $row['phone'];
            header('location: index.php');

          }else {
            $status_error = "Your login information is correct but you don't get permission to access.Please contact with librarian.";
          }
      }else {
        $pass_error = "Your given password is wrong!";
      }
    }else {
        $error = "Your email or username doesn't match of our records!";
    }


  }

 ?>
<!doctype html>
<html lang="en" class="fixed accounts sign-in">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>Start Login</title>
    <link rel="apple-touch-icon" sizes="120x120" href="../assets/favicon/apple-icon-120x120.png">
    <link rel="icon" type="image/png" sizes="192x192" href="../assets/favicon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../assets/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/favicon/favicon-16x16.png">
    <!--BASIC css-->
    <!-- ========================================================= -->
    <link rel="stylesheet" href="../assets/vendor/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="../assets/vendor/font-awesome/css/font-awesome.css">
    <link rel="stylesheet" href="../assets/vendor/animate.css/animate.css">
    <!--SECTION css-->
    <!-- ========================================================= -->
    <!--TEMPLATE css-->
    <!-- ========================================================= -->
    <link rel="stylesheet" href="../assets/stylesheets/css/style.css">
</head>

<body>
<div class="wrap">
    <!-- page BODY -->
    <!-- ========================================================= -->
    <div class="page-body animated slideInDown">
        <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
        <!--LOGO-->
        <div class="logo">
            <h1 class="text-center">LMS</h1>

            <?php
              if (isset($error)) {
             ?>
            <div class="alert alert-danger" >
                <span><?= $error?></span>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <?php
          }
             ?>

            <?php
              if (isset($pass_error)) {
             ?>
            <div class="alert alert-danger" >
                <span><?= $pass_error?></span>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <?php
          }
             ?>

            <?php
              if (isset($status_error)) {
             ?>
            <div class="alert alert-danger" >
                <span><?= $status_error?></span>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <?php
          }
             ?>

        </div>
        <div class="box">
            <!--SIGN IN FORM-->
            <div class="panel mb-none">
                <div class="panel-content bg-scale-0">
                  <h4 style="color:red;">Student Login :</h4>
                  <p><b>Email / Username :</b> ariful@gmail.com / ariful123456</p>
                  <p><b>Password</b>: 123456789</p>
                  <hr>
                  <p><b>Email / Username :</b> hossain@gmail.com / hossain123456</p>
                  <p><b>Password</b>: 987654321</p>
                  <hr>
                    <form method="post" action="<?= $_SERVER['PHP_SELF']?>">
                        <div class="form-group mt-md">
                            <span class="input-with-icon">
                              <label for="">Email Address or Username</label>
                                <input name="email" type="text" class="form-control" id="email" placeholder="Email" value="<?= isset($email) ? $email:'' ?>">
                                <i class="fa fa-envelope"></i>
                            </span>
                        </div>
                        <div class="form-group">
                            <span class="input-with-icon">
                              <label for="">Password</label>v
                                <input name="password" type="password" class="form-control" id="password" placeholder="Password">
                                <i class="fa fa-key"></i>
                            </span>
                        </div>
                        <div class="form-group">
                            <button name="login" type="submit" class="btn btn-primary btn-block">Sign in</button>
                        </div>
                        <div class="form-group text-center">
                            <a href="pages_forgot-password.html">Forgot password?</a>
                            <hr/>
                             <span>Don't have an account?</span>
                            <a href="register.php" class="btn btn-info btn-block mt-sm">Register</a>
                        </div>
                    </form>
                    <a style="margin-top:20px;" href="../librarian/login.php" class="btn btn-warning btn-block">Login as a librarian</a>
                </div>
            </div>
        </div>
        <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
    </div>
</div>
<!--BASIC scripts-->
<!-- ========================================================= -->
<script src="../assets/vendor/jquery/jquery-1.12.3.min.js"></script>
<script src="../assets/vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="../assets/vendor/nano-scroller/nano-scroller.js"></script>
<!--TEMPLATE scripts-->
<!-- ========================================================= -->
<script src="../assets/javascripts/template-script.min.js"></script>
<script src="../assets/javascripts/template-init.min.js"></script>
<!-- SECTION script and examples-->
<!-- ========================================================= -->
</body>


<!-- Mirrored from myiideveloper.com/helsinki/last-version/helsinki_green-dark/src/pages_sign-in.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 05 Mar 2019 13:05:37 GMT -->
</html>
