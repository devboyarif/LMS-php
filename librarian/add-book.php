
  <?php
      require_once('header.php');

      if (isset($_POST['save_book'])) {

          $book_name = $_POST['book_name'];
          $book_author_name = $_POST['book_author_name'];
          $book_publication_name = $_POST['book_publication_name'];
          $purchase_date = $_POST['purchase_date'];
          $book_price = $_POST['book_price'];
          $book_quantity = $_POST['book_quantity'];
          $available_quality = $_POST['available_quality'];
          $librarian_username = $_SESSION['librarian_username'];

          $book_img = explode('.',$_FILES['book_img']['name']);
          $img_ext = end($book_img);
          $image = date('ymdhis').'.'.$img_ext;

          $empty_error = array();

          if (empty($book_name)) {
            $empty_error['book_name'] = "Book name is required!";
          }
          elseif (empty($book_author_name)) {
            $empty_error['book_author_name'] = "Book Author name is required!";
          }
          elseif (empty($book_publication_name)) {
            $empty_error['book_publication_name'] = "Book publication name is required!";
          }
          elseif (empty($purchase_date)) {
            $empty_error['purchase_date'] = "Purchase date is required!";
          }
          elseif (empty($book_price)) {
            $empty_error['book_price'] = "Book price is required!";
          }
          elseif (empty($book_quantity)) {
            $empty_error['book_quantity'] = "Book quantity is required!";
          }
          elseif (empty($available_quality)) {
            $empty_error['available_quality'] = "Available quantity is required!";
          }
          else {
            $query = " INSERT INTO `books`(`book_name`, `book_image`, `book_author_name`, `book_publication_name`, `book_purchase_date`, `book_price`, `book_qty`, `available_qty`, `librarian_username`) VALUES ('$book_name','$image','$book_author_name','$book_publication_name','$purchase_date','$book_price','$book_quantity','$available_quality','$librarian_username') ";
              $results = mysqli_query($connection,$query);

            if ($results) {

              move_uploaded_file($_FILES['book_img']['tmp_name'],'../images/books/'.$image);

              $success = "Book added successfully done!";

            }else {
                $error = "Something went wrong.Please try again!";
            }
          }




      }
   ?>

                <div class="content-header">
                    <div class="leftside-content-header">
                        <ul class="breadcrumbs">
                            <li><i class="fa fa-home" aria-hidden="true"></i><a href="index.php">Dashboard</a></li>
                            <li><a href="javascript:avoid(0)">Add Book</a></li>
                        </ul>
                    </div>
                </div>

                <div class="row animated fadeInUp">
                    <div class="col-sm-6 col-sm-offset-3">
                      <div class="panel">
                          <div class="panel-content">
                              <div class="row">
                                  <div class="col-sm-12">
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
                                      <form class="form-horizontal form-stripe" action="<?= $_SERVER['PHP_SELF']?>" method="post" enctype="multipart/form-data">
                                          <h6 class="mb-xlg text-center"><b>Add Book</b></h6>
                                          <div class="form-group">
                                              <label for="name" class="col-sm-3 control-label">Book Name</label>
                                              <div class="col-sm-9">
                                                  <input value="<?= isset($book_name) ? $book_name:''?>" name="book_name" type="text" class="form-control" id="name" placeholder="Book Name">
                                                  <?php
                                                    if (isset($empty_error['book_name'])) {
                                                      echo '<span class="text-danger" style="font-weight:600;font-size: 15px;">'.$empty_error['book_name'].'</span>';
                                                    }
                                                   ?>
                                              </div>

                                          </div>
                                          <div class="form-group">
                                              <label for="image" class="col-sm-3 control-label">Book Image</label>
                                              <div class="col-sm-9">
                                                  <input name="book_img" type="file" class="form-control" id="image">
                                              </div>
                                          </div>
                                          <div class="form-group">
                                              <label for="name" class="col-sm-3 control-label">Author Name</label>
                                              <div class="col-sm-9">
                                                  <input value="<?= isset($book_author_name) ? $book_author_name:''?>" name="book_author_name" type="text" class="form-control" id="name" placeholder="Author Name">
                                                  <?php
                                                    if (isset($empty_error['book_author_name'])) {
                                                      echo '<span class="text-danger" style="font-weight:600;font-size: 15px;">'.$empty_error['book_author_name'].'</span>';
                                                    }
                                                   ?>
                                              </div>
                                          </div>
                                          <div class="form-group">
                                              <label for="name" class="col-sm-3 control-label">Book Publication Name</label>
                                              <div class="col-sm-9">
                                                  <input value="<?= isset($book_publication_name) ? $book_publication_name:''?>" name="book_publication_name" type="text" class="form-control" id="name" placeholder="Book Publication Name">
                                                  <?php
                                                    if (isset($empty_error['book_publication_name'])) {
                                                      echo '<span class="text-danger" style="font-weight:600;font-size: 15px;">'.$empty_error['book_publication_name'].'</span>';
                                                    }
                                                   ?>
                                              </div>
                                          </div>
                                          <div class="form-group">
                                              <label for="date" class="col-sm-3 control-label">Purchase Date</label>
                                              <div class="col-sm-9">
                                                  <input value="<?= isset($purchase_date) ? $purchase_date:''?>" name="purchase_date" type="date" class="form-control" id="date" >
                                                  <?php
                                                    if (isset($empty_error['purchase_date'])) {
                                                      echo '<span class="text-danger" style="font-weight:600;font-size: 15px;">'.$empty_error['purchase_date'].'</span>';
                                                    }
                                                   ?>
                                              </div>
                                          </div>
                                          <div class="form-group">
                                              <label for="price" class="col-sm-3 control-label">Book Price</label>
                                              <div class="col-sm-9">
                                                  <input value="<?= isset($book_price) ? $book_price:''?>" name="book_price" type="number" class="form-control" id="price" placeholder="Book Price">
                                                  <?php
                                                    if (isset($empty_error['book_price'])) {
                                                      echo '<span class="text-danger" style="font-weight:600;font-size: 15px;">'.$empty_error['book_price'].'</span>';
                                                    }
                                                   ?>
                                              </div>
                                          </div>
                                          <div class="form-group">
                                              <label for="bookq" class="col-sm-3 control-label">Book Quantity</label>
                                              <div class="col-sm-9">
                                                  <input value="<?= isset($book_quantity) ? $book_quantity:''?>" name="book_quantity" type="number" class="form-control" id="bookq" placeholder="Book Quantity">
                                                  <?php
                                                    if (isset($empty_error['book_quantity'])) {
                                                      echo '<span class="text-danger" style="font-weight:600;font-size: 15px;">'.$empty_error['book_quantity'].'</span>';
                                                    }
                                                   ?>
                                              </div>
                                          </div>
                                          <div class="form-group">
                                              <label for="booka" class="col-sm-3 control-label">Available Quantity</label>
                                              <div class="col-sm-9">
                                                  <input value="<?= isset($available_quality) ? $available_quality:''?>" name="available_quality" type="number" class="form-control" id="booka" placeholder="Available Quality">
                                                  <?php
                                                    if (isset($empty_error['available_quality'])) {
                                                      echo '<span class="text-danger" style="font-weight:600;font-size: 15px;">'.$empty_error['available_quality'].'</span>';
                                                    }
                                                   ?>
                                              </div>
                                          </div>
                                          <div class="form-group">
                                              <div class="col-sm-offset-3 col-sm-9">
                                                  <button name="save_book" type="submit" class="btn btn-primary"> <i class="fa fa-save"></i>  Save Book</button>
                                              </div>
                                          </div>
                                      </form>
                                  </div>
                              </div>
                          </div>
                      </div>
                    </div>
                </div>


    <?php
      require_once('footer.php');
     ?>
