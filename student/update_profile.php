
    <?php
      require_once('header.php');


      if (isset($_POST['update_profile'])) {

          $student_id = $row['id'];
          $fname = $_POST['fname'];
          $lname = $_POST['lname'];
          $phone = $_POST['phone'];

          $input_errors = array();
          if (empty($fname)) {
            $input_errors['fname'] = "First name field is required!";
          }
          if (empty($lname)) {
            $input_errors['lname'] = "Last name field is required!";
          }
          if (empty($phone)) {
            $input_errors['phone'] = "Phone field is required!";
          }

          if (count($input_errors) == 0) {


            if (!preg_match("/^[a-zA-Z -]*$/",$fname)) {

                $error = "First Name field must be letter!";

            }elseif (!preg_match("/^[a-zA-Z -]*$/",$lname)) {

                $error = "Last Name field must be letter!";

            }elseif (!is_numeric($phone)) {

                $error = "Phone field must be numbers!";

            }else {

                  $query = "UPDATE `students` SET `fname`='$fname',`lname`='$lname',`phone`='$phone' WHERE id='$student_id'";
                  $results=mysqli_query($connection,$query);


                  if ($results) {
                    ?>
                    <script type="text/javascript">
                      alert('Profile updated successful!');
                      javascript:history.go(-1);
                    </script>
                    <?php
                  }else {

                    ?>
                    <script type="text/javascript">
                      alert('Sorry!Please try again..');
                    </script>
                    <?php

                  }


                }

          }

}




    if (isset($_POST['change_pass'])) {

      $student_id = $row['id'];
      $old_pass_from_db =  $row['password'];
      $old_pass = $_POST['old_password'];
      $new_pass = $_POST['new_password'];
      $pass_hash = password_hash($new_pass , PASSWORD_DEFAULT);

      if (password_verify($old_pass , $old_pass_from_db)) {

        $query = "UPDATE `students` SET `password`='$pass_hash' WHERE id='$student_id'";
        $results=mysqli_query($connection,$query);


        if ($results) {
          ?>
          <script type="text/javascript">
            alert('Password updated successful!');
            javascript:history.go(-1);
          </script>
          <?php
        }else {

          ?>
          <script type="text/javascript">
            alert('Sorry!Please try again..');
          </script>
          <?php

        }

        unset($_SESSION['student_login']);
        header('location: student/sign-in.php');


      }else {
        $wrong = "Your old password is wrong!";
      }

    }


     ?>

                <div class="content-header">
                    <div class="leftside-content-header">
                        <ul class="breadcrumbs">
                            <li><i class="fa fa-home" aria-hidden="true"></i><a href="index.php">Dashboard</a></li>
                        </ul>
                    </div>
                </div>

                <div class="row animated fadeInUp">
                  <div class="panel">
                        <div class="panel-content">
                            <div class="row">
                              <div class="col-sm-6">
                                  <form method="post" action="<?= $_SERVER['PHP_SELF']?>">

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

                                      <h5 class="mb-md ">Update Profile</h5>

                                      <div class="form-group">
                                          <label for="email">First Name</label>
                                          <input value="<?= $row['id']?>" type="hidden">
                                          <input type="text" class="form-control" name="fname"  value="<?= $row['fname']?>">
                                          <?php
                                            if (isset($input_errors['fname'])) {
                                              echo '<span class="text-danger" style="font-weight:600;font-size: 15px;">'.$input_errors['fname'].'</span>';
                                            }
                                           ?>
                                      </div>
                                      <div class="form-group">
                                          <label for="email">Last Name</label>
                                          <input type="text" class="form-control" name="lname"  value="<?= $row['lname']?>">
                                          <?php
                                            if (isset($input_errors['lname'])) {
                                              echo '<span class="text-danger" style="font-weight:600;font-size: 15px;">'.$input_errors['lname'].'</span>';
                                            }
                                           ?>
                                      </div>
                                      <div class="form-group">
                                          <label for="password">Phone</label>
                                          <input type="text" class="form-control" name="phone"  value="<?= $row['phone']?>">
                                          <?php
                                            if (isset($input_errors['phone'])) {
                                              echo '<span class="text-danger" style="font-weight:600;font-size: 15px;">'.$input_errors['phone'].'</span>';
                                            }
                                           ?>
                                      </div>
                                      <div class="form-group">
                                          <button type="submit" name="update_profile" class="btn btn-primary">Update Profile</button>
                                      </div>
                                  </form>
                              </div>

                              <div class="col-sm-4 col-sm-offset-1">
                                  <form method="post" action="">

                                    <?php
                                      if (isset($wrong)) {
                                     ?>
                                    <div class="alert alert-danger" >
                                        <span><?= $wrong?></span>
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>

                                    <?php
                                  }
                                     ?>

                                      <h5 class="mb-md ">Change Password</h5>
                                      <div class="form-group">
                                          <label>Old Password</label>
                                          <input value="<?= $row['id']?>" type="hidden" >
                                          <input name="old_password" type="password" class="form-control" placeholder="Enter Old Password">
                                      </div>
                                      <div class="form-group">
                                          <label>New Password</label>
                                          <input name="new_password" type="password" class="form-control"  placeholder="Enter New Password">
                                      </div>

                                      <div class="form-group">
                                          <button name="change_pass" type="password" class="btn btn-primary">Change Password</button>
                                      </div>
                                  </form>
                                    <a style="margin-top:100px;" href="student_profile.php" class="btn btn-danger"> <i class="fa fa-arrow-left"></i> Back to profile</a>
                              </div>

                            </div>
                        </div>
                    </div>
                </div>


    <?php

      require_once('footer.php');
     ?>
