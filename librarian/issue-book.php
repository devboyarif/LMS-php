
    <?php
      require_once('header.php');

      if (isset($_POST['issue_book'])) {
        $student_id = $_POST['student_id'];
        $book_id = $_POST['book_id'];
        $book_issue_date = $_POST['book_issue_date'];

        $query = "INSERT INTO `issue_book`(`student_id`, `book_id`, `book_issue_date`) VALUES ('$student_id','$book_id','$book_issue_date')";
        $results = mysqli_query($connection , $query);

          if ($results) {
            ?>
            <script type="text/javascript">
              alert('Book issued successfully done!');
            </script>
            <?php
          }else {

            ?>
            <script type="text/javascript">
              alert('Book not issue!');
            </script>
            <?php

          }

      }



     ?>

                <div class="content-header">
                    <div class="leftside-content-header">
                        <ul class="breadcrumbs">
                            <li><i class="fa fa-home" aria-hidden="true"></i><a href="index.php">Dashboard</a></li>
                            <li><a href="javascript:avoid(0)">Issue Book</a></li>
                        </ul>
                    </div>
                </div>

                <div class="row animated fadeInUp">
                    <div class="col-sm-6 col-sm-offset-3">
                      <div class="panel">
                          <div class="panel-content">
                              <div class="row">
                                  <div class="col-md-12">
                                      <form class="form-inline" method="post" action="<?= $_SERVER['PHP_SELF']?>">

                                          <div class="form-group">
                                              <label class="sr-only" for="email4">Email</label>
                                              <select class="form-control" name="student_id">
                                                <option value="">Select</option>
                                                <?php
                                                  $query = "SELECT * FROM `students` WHERE status='1'";
                                                  $results=mysqli_query($connection,$query);
                                                  while($row = mysqli_fetch_assoc($results)){

                                                    ?>

                                                <option value="<?= $row['id']?>"><?=ucwords($row['fname'].' '.$row['lname'].' - '.'( '.$row['roll'].' )')?></option>

                                              <?php } ?>
                                              </select>
                                          </div>
                                          <div class="form-group">
                                              <button type="submit" name="search" class="btn btn-primary">Search</button>
                                          </div>
                                      </form>
                                  </div>
                              </div>
                            <?php
                              if (isset($_POST['search'])) {
                                $id = $_POST['student_id'];

                                $query = "SELECT * FROM `students` WHERE id = '$id' AND status='1'";
                                $results = mysqli_query($connection , $query);
                                $row = mysqli_fetch_assoc($results);
                                ?>
                                <div class="panel">
                        <div class="panel-content">
                            <div class="row">
                                <div class="col-md-6">
                                    <form method="post" action="">
                                        <div class="form-group">
                                            <label for="name">Student Name</label>
                                            <input type="text" class="form-control" id="name" value="<?= ucwords($row['fname'].' '.$row['lname'])?>" readonly>
                                            <input type="hidden" name="student_id" value="<?= $row['id']?>">
                                        </div>
                                        <div class="form-group">
                                        <label for="name">BoOk Name</label>
                                            <select class="form-control" name="book_id">
                                              <option value="">Select Book</option>
                                              <?php
                                                $query = "SELECT * FROM `books` WHERE `available_qty` > 0";
                                                $results = mysqli_query($connection , $query);
                                                while($row = mysqli_fetch_assoc($results)){

                                                  ?>

                                              <option value="<?= $row['id']?>" ><?= ucwords($row['book_name'])?></option>

                                            <?php } ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="issue_date" >Book Issue Date</label>
                                            <input class="form-control" type="text" name="book_issue_date" value="<?= date('d-m-y')?>" readonly>
                                        </div>

                                        <div class="form-group">
                                            <button type="submit" name="issue_book" class="btn btn-primary">Save Issue Book</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                                <?php
                              }
                             ?>
                          </div>
                      </div>

                    </div>
                </div>


    <?php
      require_once('footer.php');
     ?>
