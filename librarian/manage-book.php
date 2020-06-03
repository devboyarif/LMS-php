
    <?php
      require_once('header.php');
     ?>

                <div class="content-header">
                    <div class="leftside-content-header">
                        <ul class="breadcrumbs">
                            <li><i class="fa fa-home" aria-hidden="true"></i><a href="index.php">Dashboard</a></li>
                              <li><a href="javascript:avoid(0)">Manage Book</a></li>
                        </ul>
                    </div>
                </div>

                <div class="row animated fadeInUp">
                  <div class="col-sm-12">
                      <h4 class="section-subtitle"><b>All Students</b></h4>
                      <div class="panel">
                          <div class="panel-content">
                              <div class="table-responsive">
                                  <table id="basic-table" class="data-table table table-striped nowrap table-hover table-bordered" cellspacing="0" width="100%">
                                      <thead>
                                      <tr>
                                          <th>Book Name</th>
                                          <th>Book Image</th>
                                          <th>Publication Name</th>
                                          <th>Author Name</th>
                                          <th>Purchase Date</th>
                                          <th>Book Price</th>
                                          <th>Book Quantity</th>
                                          <th>Available Quantity</th>
                                          <th>Action</th>
                                      </tr>
                                      </thead>
                                      <tbody>
                                        <?php
                                        $query = "SELECT * FROM `books` ";
                                        $results=mysqli_query($connection,$query);
                                        while($row = mysqli_fetch_assoc($results)){
                                         ?>
                                      <tr>

                                        <td><?= $row['book_name']; ?></td>
                                        <td> <img width="100" height="100" src="../images/books/<?= $row['book_image']; ?>" alt=""> </td>
                                        <td><?= $row['book_publication_name']; ?></td>
                                        <td><?= $row['book_author_name']; ?></td>
                                        <td><?= date('d-M-Y',strtotime($row['book_purchase_date'])) ?></td>
                                        <td><?= $row['book_price']; ?></td>
                                        <td><?= $row['book_qty']; ?></td>
                                        <td><?= $row['available_qty']; ?></td>
                                        <td>

                                          <a href="javascript:avoid(0)" class="btn btn-info" data-toggle="modal" data-target="#book-<?=$row['id']?>"><i class="fa fa-eye"></i> </a>
                                          <a href="#" class="btn btn-warning" data-toggle="modal" data-target="#book-update-<?=$row['id']?>"> <i class="fa fa-pencil"></i> </a>
                                          <a href="delete.php?book_id=<?=base64_encode($row['id'])?>" class="btn btn-danger" onclick="return confirm('Are you sure to delete?')"> <i class="fa fa-trash-o"></i> </a>
                                        </td>





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
                  $query = "SELECT * FROM `books`";
                  $results=mysqli_query($connection,$query);
                  while($row = mysqli_fetch_assoc($results)){

                    $id_book = $row['id'];
                    $book_info = "SELECT * FROM `books` WHERE id = '$id_book'";
                    $book_results = mysqli_query($connection , $book_info);
                    $book_info_row = mysqli_fetch_assoc($book_results);

                 ?>

                <!-- Modal -->
                <div class="modal fade" id="book-update-<?=$row['id']?>" tabindex="-1" role="dialog" aria-labelledby="modal-info-label">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header state modal-info">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="modal-info-label"><i class="fa fa-book"></i>Update Book Information</h4>
                            </div>
                            <div class="modal-body">

                              <div class="panel">

                                  <div class="panel-content">
                                      <div class="row">
                                          <div class="col-md-12">

                                              <form class="form-horizontal form-stripe" enctype="multipart/form-data" method="post" action="<?= $_SERVER['PHP_SELF']?>">
                                                <input type="hidden" name="update_book_id" value="<?= $book_info_row['id']?>">
                                                <div class="form-group">
                                                    <label for="name" class="col-sm-3 control-label">Book Name</label>
                                                    <div class="col-sm-9">
                                                        <input value="<?= $book_info_row['book_name']?>" name="book_name" type="text" class="form-control" id="name" placeholder="Book Name">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="name" class="col-sm-3 control-label">Author Name</label>
                                                    <div class="col-sm-9">
                                                        <input value="<?= $book_info_row['book_author_name']?>" name="book_author_name" type="text" class="form-control" id="name" placeholder="Author Name">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="name" class="col-sm-3 control-label">Book Publication Name</label>
                                                    <div class="col-sm-9">
                                                        <input value="<?= $book_info_row['book_publication_name']?>" name="book_publication_name" type="text" class="form-control" id="name" placeholder="Book Publication Name">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="date" class="col-sm-3 control-label">Purchase Date</label>
                                                    <div class="col-sm-9">
                                                        <input value="<?= $book_info_row['book_purchase_date']?>" name="purchase_date" type="date" class="form-control" id="date" >
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="price" class="col-sm-3 control-label">Book Price</label>
                                                    <div class="col-sm-9">
                                                        <input value="<?= $book_info_row['book_price']?>" name="book_price" type="number" class="form-control" id="price" placeholder="Book Price">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="bookq" class="col-sm-3 control-label">Book Quantity</label>
                                                    <div class="col-sm-9">
                                                        <input value="<?= $book_info_row['book_qty']?>" name="book_quantity" type="number" class="form-control" id="bookq" placeholder="Book Quantity">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="booka" class="col-sm-3 control-label">Available Quantity</label>
                                                    <div class="col-sm-9">
                                                        <input value="<?= $book_info_row['available_qty']?>" name="available_quality" type="number" class="form-control" id="booka" placeholder="Available Quality">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-sm-offset-3 col-sm-9">
                                                        <button name="update_book" type="submit" class="btn btn-primary"> <i class="fa fa-save"></i>  Update Book</button>
                                                    </div>
                                                </div>
                                              </form>
                                          </div>
                                      </div>
                                  </div>
                              </div>

                            </div>
                        </div>
                    </div>
                </div>

                <?php
              }



              if (isset($_POST['update_book'])) {

                  $book_id = $_POST['update_book_id'];
                  $book_name = $_POST['book_name'];
                  $book_author_name = $_POST['book_author_name'];
                  $book_publication_name = $_POST['book_publication_name'];
                  $purchase_date = $_POST['purchase_date'];
                  $book_price = $_POST['book_price'];
                  $book_quantity = $_POST['book_quantity'];
                  $available_quality = $_POST['available_quality'];
                  $librarian_username = $_SESSION['librarian_username'];

                    $query = "UPDATE `books` SET `book_name`='$book_name' ,`book_author_name`='$book_author_name',`book_publication_name`='$book_publication_name',`book_purchase_date`='$purchase_date',`book_price`='$book_price',`book_qty`='$book_quantity',`available_qty`='$available_quality',`librarian_username`='$librarian_username' WHERE id= '$book_id' ";
                    $results = mysqli_query($connection,$query);

                    if ($results) {
                      ?>
                      <script type="text/javascript">
                        alert('Book updated successfully done!');
                        javascript:history.go(-1);
                      </script>
                      <?php
                    }else {

                      ?>
                      <script type="text/javascript">
                        alert('Sorry!Book isn't updated.');
                      </script>
                      <?php

                    }



              }
                 ?>


                <?php
                  $query = "SELECT * FROM `books` ";
                  $results=mysqli_query($connection,$query);
                  while($row = mysqli_fetch_assoc($results)){
                 ?>

                <!-- Modal -->
                <div class="modal fade" id="book-<?=$row['id']?>" tabindex="-1" role="dialog" aria-labelledby="modal-info-label">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header state modal-info">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="modal-info-label"><i class="fa fa-book"></i>Book Information</h4>
                            </div>
                            <div class="modal-body">
                              <table class="table table-striped table-hover table-bordered">
                                <tr>
                                  <tr>
                                      <th>Book Name</th>
                                      <td><?= $row['book_name']; ?></td>
                                  </tr>
                                  <tr>
                                    <th>Book Image</th>
                                    <td> <img width="100" height="100" src="../images/books/<?= $row['book_image']; ?>" alt=""> </td>
                                  </tr>
                                  <tr>
                                    <th>Publication Name</th>
                                    <td><?= $row['book_publication_name']; ?></td>
                                  </tr>
                                </tr>
                                  <tr>
                                    <th>Author Name</th>
                                    <td><?= $row['book_author_name']; ?></td>
                                  </tr>
                                  <tr>
                                    <th>Purchase Date</th>
                                    <td><?= date('d-M-Y',strtotime($row['book_purchase_date'])) ?></td>
                                  </tr>
                                  <tr>
                                    <th>Book Price</th>
                                    <td><?= $row['book_price']; ?></td>
                                  </tr>
                                  <tr>
                                    <th>Book Quantity</th>
                                    <td><?= $row['book_qty']; ?></td>
                                  </tr>
                                  <tr>
                                    <th>Available Quantity</th>
                                    <td><?= $row['available_qty']; ?></td>
                                  </tr>
                                </tr>
                              </table>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>

                <?php
              }
                 ?>

    <?php
      require_once('footer.php');
     ?>
