
    <?php
      require_once('header.php');
     ?>

                <div class="content-header">
                    <div class="leftside-content-header">
                        <ul class="breadcrumbs">
                            <li><i class="fa fa-home" aria-hidden="true"></i><a href="index.php">Dashboard</a></li>
                            <li><a href="javascript:avoid(0)">Return Books</a></li>
                        </ul>
                    </div>
                </div>

                <div class="row animated fadeInUp">
                  <div class="col-sm-12">
                      <h4 class="section-subtitle"><b>Return Books</b></h4>
                      <div class="panel">
                          <div class="panel-content">
                              <div class="table-responsive">
                                  <table id="basic-table" class="data-table table table-striped nowrap table-hover table-bordered" cellspacing="0" width="100%">
                                      <thead>
                                      <tr>
                                          <th>Name</th>
                                          <th>Roll</th>
                                          <th>Phone</th>
                                          <th>Book Name</th>

                                          <th>Book Issue Date</th>
                                          <th>Return Date</th>
                                      </tr>
                                      </thead>
                                      <tbody>
                                        <?php
                                        $query = "SELECT issue_book.id,issue_book.book_issue_date, students.fname,students.lname,students.roll,students.phone,books.book_name,books.book_image
                                                  FROM issue_book
                                                  INNER JOIN students ON students.id = issue_book.student_id
                                                  INNER JOIN books ON books.id = issue_book.book_id
                                                  WHERE issue_book.book_return_date = '' ";
                                        $results=mysqli_query($connection,$query);
                                        while($row = mysqli_fetch_assoc($results)){
                                         ?>
                                      <tr>
                                        <td><?= ucwords($row['fname'] .' '. $row['lname']) ?></td>
                                        <td><?= $row['roll'] ?></td>
                                        <td><?= $row['phone'] ?></td>
                                        <td><?= $row['book_name'] ?></td>
                                        <td><?= $row['book_issue_date'] ?></td>
                                        <td> <a class="btn btn-info" href="return-book.php?id=<?=base64_encode($row['id'])?>">Return Book</a> </td>
                                      </tr>
                                    <?php

                                  }

                                     ?>

                                      </tbody>
                                  </table>
                              </div>
                          </div>
                      </div>
                  </div>
                </div>


    <?php

      if (isset($_GET['id'])) {
        $id = base64_decode($_GET['id']);
        $date = date('d--m-y');

        $query = "UPDATE `issue_book` SET `book_return_date`='$date' WHERE id='$id'";
        $results=mysqli_query($connection,$query);



        if ($results) {
          ?>
          <script type="text/javascript">
            alert('Book returnd successful!');
            javascript:history.go(-1);
          </script>
          <?php
            header("return-book.php");
        }else {

          ?>
          <script type="text/javascript">
            alert('Sorry!Please try again..');
          </script>
          <?php

        }

      }



      require_once('footer.php');
     ?>
