<?php
  require_once('../db.php');
  session_start();
  if (isset($_SESSION['student_login'])) {
    header('location: index.php');
  }

  if (isset($_POST['student_register'])) {
    // echo '<pre>';
    // print_r($_POST);
    // echo '</pre>';
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $roll = $_POST['roll'];
    $reg = $_POST['reg'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $pass_hash = password_hash($password , PASSWORD_DEFAULT);
    // $encrypt_password = md5($_POST['password']);
    $phone = $_POST['phone'];

    $input_errors = array();
    if (empty($fname)) {
      $input_errors['fname'] = "First name field is required!";
    }
    if (empty($lname)) {
      $input_errors['lname'] = "Last name field is required!";
    }
    if (empty($roll)) {
      $input_errors['roll'] = "Roll number field is required!";
    }
    if (empty($reg)) {
      $input_errors['reg'] = "Registration number field is required!";
    }
    if (empty($email)) {
      $input_errors['email'] = "Email field is required!";
    }
    if (empty($username)) {
      $input_errors['username'] = "Username field is required!";
    }
    if (empty($password)) {
      $input_errors['password'] = "Password field is required!";
    }
    if (empty($phone)) {
      $input_errors['phone'] = "Phone field is required!";
    }

    if (count($input_errors) == 0) {

      $email_query = "SELECT * FROM `students` WHERE email='$email'";
      $email_check = mysqli_query($connection , $email_query);
      $email_check_row = mysqli_num_rows($email_check);

      if ($email_check_row == 0) {

        $username_query = "SELECT * FROM `students` WHERE username='$username'";
        $username_check = mysqli_query($connection , $username_query);
        $username_check_row = mysqli_num_rows($username_check);

        if ($username_check_row == 0) {
            if (strlen($username) > 6) {
              if (strlen($password) > 8) {
                if (strlen($phone) == 11) {
                  if (!is_numeric($phone)) {
                    $phone_numeric = "Phone number must be number charecters!";
                  }else {
                    if (!preg_match("/^[a-zA-Z -]*$/",$fname)) {
                      $fname_letter = "First Name field must be letter!";
                    }else {
                      if (!preg_match("/^[a-zA-Z -]*$/",$lname)) {
                        $lname_letter = "Last Name field must be letter!";
                      }else {
                        if (!is_numeric($roll)) {
                          $roll_numeric = "Roll number must be number charecters!";
                        }else {
                          if (!is_numeric($reg)) {
                            $reg_numeric = "Registration number must be number charecters!";
                          }else {

                            $query = "INSERT INTO `students`(`fname`, `lname`, `roll`, `reg`, `email`, `username`, `password`, `phone`) VALUES ('$fname','$lname','$roll','$reg','$email','$username','$pass_hash','$phone')";
                            $results=mysqli_query($connection,$query);

                            if ($results) {
                                $success = "Registration successfully done!";
                            }else {
                              $error = "Something went wrong!";
                            }

                          }
                        }

                      }
                    }
                  }
                }else {
                  $phone_lenth = "Phone number must be 11 charecters!";
                }
              }else {
                $pass_lenth = "Password more than 8 charecters!";
              }

            }else {
              $username_lenth = "Username must be greater than 6 charecters!";
            }
        }else {
            $username_exists = "This username is already exists!";
        }

      }else {
            $email_exists = "This email is already exists!";
      }

    }



  }


 ?>
<!doctype html>
<html lang="en" class="fixed accounts sign-in">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>Start Registration</title>
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
            if (isset($success)) {
           ?>
          <div class="alert alert-success" >
              <span><?= $success?></span>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
          </div>

          <?php
        }
           ?>

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
            if (isset($email_exists)) {
           ?>
          <div class="alert alert-danger" >
              <span><?= $email_exists?></span>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
          </div>

          <?php
        }
           ?>

          <?php
            if (isset($username_exists)) {
           ?>
          <div class="alert alert-danger" >
              <span><?= $username_exists?></span>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
          </div>

          <?php
        }
           ?>


          <?php
            if (isset($username_lenth)) {
           ?>
          <div class="alert alert-danger" >
              <span><?= $username_lenth?></span>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
          </div>

          <?php
        }
           ?>


          <?php
            if (isset($pass_lenth)) {
           ?>
          <div class="alert alert-danger" >
              <span><?= $pass_lenth?></span>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
          </div>

          <?php
        }
           ?>


          <?php
            if (isset($phone_lenth)) {
           ?>
          <div class="alert alert-danger" >
              <span><?= $phone_lenth?></span>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
          </div>

          <?php
        }
           ?>


          <?php
            if (isset($phone_numeric)) {
           ?>
          <div class="alert alert-danger" >
              <span><?= $phone_numeric?></span>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
          </div>

          <?php
        }
           ?>


          <?php
            if (isset($fname_letter)) {
           ?>
          <div class="alert alert-danger" >
              <span><?= $fname_letter?></span>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
          </div>

          <?php
        }
           ?>


          <?php
            if (isset($lname_letter)) {
           ?>
          <div class="alert alert-danger" >
              <span><?= $lname_letter?></span>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
          </div>

          <?php
        }
           ?>


          <?php
            if (isset($roll_numeric)) {
           ?>
          <div class="alert alert-danger" >
              <span><?= $roll_numeric?></span>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
          </div>

          <?php
        }
           ?>


          <?php
            if (isset($reg_numeric)) {
           ?>
          <div class="alert alert-danger" >
              <span><?= $reg_numeric?></span>
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

                    <form method="post" action="<?= $_SERVER['PHP_SELF']?>">
                        <div class="form-group mt-md">
                            <span class="input-with-icon">
                                <label for="">First Name</label>
                                <input type="text" class="form-control" placeholder="First Name" name="fname" value="<?= isset($fname) ? $fname:'' ?>">
                                <i class="fa fa-user"></i>
                            </span>
                            <?php
                              if (isset($input_errors['fname'])) {
                                echo '<span class="text-danger" style="font-weight:600;font-size: 15px;">'.$input_errors['fname'].'</span>';
                              }
                             ?>
                        </div>
                        <div class="form-group mt-md">
                            <span class="input-with-icon">
                              <label for="">Last Name</label>
                                <input type="text" class="form-control" placeholder="Last Name" name="lname" value="<?= isset($lname) ? $lname:'' ?>">
                                <i class="fa fa-user"></i>
                            </span>
                            <?php
                              if (isset($input_errors['lname'])) {
                                echo '<span class="text-danger" style="font-weight:600;font-size: 15px;">'.$input_errors['lname'].'</span>';
                              }
                             ?>
                        </div>
                        <div class="form-group">
                            <span class="input-with-icon">
                                <label for="">Roll Number</label>
                                <input type="text" class="form-control" placeholder="Enter Roll" name="roll" value="<?= isset($roll) ? $roll:'' ?>">
                                <i class="fa fa-key"></i>
                            </span>
                            <?php
                              if (isset($input_errors['roll'])) {
                                echo '<span class="text-danger" style="font-weight:600;font-size: 15px;">'.$input_errors['roll'].'</span>';
                              }
                             ?>
                        </div>
                        <div class="form-group">
                            <span class="input-with-icon">
                                <label for="">Registration Number</label>
                                <input type="text" class="form-control" placeholder="Reg No." name="reg" value="<?= isset($reg) ? $reg:'' ?>">
                                <i class="fa fa-key"></i>
                            </span>
                            <?php
                              if (isset($input_errors['reg'])) {
                                echo '<span class="text-danger" style="font-weight:600;font-size: 15px;">'.$input_errors['reg'].'</span>';
                              }
                             ?>
                        </div>
                        <div class="form-group mt-md">
                            <span class="input-with-icon">
                              <label for="">Email Address</label>
                                <input type="email" class="form-control" placeholder="Email Address" name="email" value="<?= isset($email) ? $email:'' ?>">
                                <i class="fa fa-envelope"></i>
                            </span>
                            <?php
                              if (isset($input_errors['email'])) {
                                echo '<span class="text-danger" style="font-weight:600;font-size: 15px;">'.$input_errors['email'].'</span>';
                              }
                             ?>
                        </div>
                        <div class="form-group mt-md">
                            <span class="input-with-icon">
                                <label for="">User Name</label>
                                <input type="text" class="form-control" placeholder="User Name" name="username" value="<?= isset($username) ? $username:'' ?>">
                                <i class="fa fa-envelope"></i>
                            </span>
                            <?php
                              if (isset($input_errors['username'])) {
                                echo '<span class="text-danger" style="font-weight:600;font-size: 15px;">'.$input_errors['username'].'</span>';
                              }
                             ?>
                        </div>
                        <div class="form-group">
                            <span class="input-with-icon">
                              <label for="">Password</label>
                                <input type="password" class="form-control" placeholder="Enter Password" name="password">
                                <i class="fa fa-key"></i>
                            </span>
                            <?php
                              if (isset($input_errors['password'])) {
                                echo '<span class="text-danger" style="font-weight:600;font-size: 15px;">'.$input_errors['password'].'</span>';
                              }
                             ?>
                        </div>

                        <div class="form-group">
                            <span class="input-with-icon">
                              <label for="">Phone Number</label>
                                <input type="text" class="form-control" placeholder="01*********" name="phone" value="<?= isset($phone) ? $phone:'' ?>">
                                <i class="fa fa-key"></i>
                            </span>
                            <?php
                              if (isset($input_errors['phone'])) {
                                echo '<span class="text-danger" style="font-weight:600;font-size: 15px;">'.$input_errors['phone'].'</span>';
                              }
                             ?>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block" name="student_register">Register</button>
                        </div>
                        <div class="form-group text-center">
                            Have an account?, <a href="sign-in.php">Sign In</a>
                        </div>
                    </form>
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
</html>
