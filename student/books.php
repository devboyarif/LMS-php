
    <?php
      require_once('header.php');
     ?>

                <div class="content-header">
                    <div class="leftside-content-header">
                        <ul class="breadcrumbs">
                            <li><i class="fa fa-home" aria-hidden="true"></i><a href="index.php">Dashboard</a></li>
                              <li><a href="javascript:avoid(0)">Books</a></li>
                        </ul>
                    </div>
                </div>

                <div class="row animated fadeInUp">
                      <div class="col-sm-12">
                          <div class="panel">
                              <div class="panel-content">
                                  <form class="" method="post" action="">
                                      <div class="row pt-md">
                                          <div class="form-group col-sm-9 col-lg-10">
                                                  <span class="input-with-icon">
                                              <input required name="result" type="text" class="form-control" id="lefticon" placeholder="Search">
                                              <i class="fa fa-search"></i>
                                          </span>
                                          </div>
                                          <div class="form-group col-sm-3  col-lg-2 ">
                                              <input name="search_books" type="submit" class="btn btn-primary btn-block" >
                                          </div>
                                      </div>
                                  </form>
                              </div>
                          </div>
                      </div>
                </div>



    <?php

    if (isset($_POST['search_books'])) {
      $search_result = $_POST['result'];
      ?>

      <div class="col-sm-12">
        <div class="panel">
          <div class="panel-content">
            <div class="row">
              <?php
              $query = "SELECT * FROM `books` WHERE `book_name` LIKE '%$search_result%'";
              $results = mysqli_query($connection,$query);

              $temp = mysqli_num_rows($results);

              if ($temp > 0){ ?>
                <?php

                while ($row = mysqli_fetch_assoc($results)) { ?>

                  <div class="col-sm-3 col-md-2" style="margin-right:30px;">
                    <img  width="200" height="200" src="../images/books/<?= $row['book_image'];?>" alt="">
                    <h4><?= $row['book_name'];?></h4>
                    <h5> <b>Available :  <?= $row['available_qty'];?></b> </h5>
                  </div>

                <?php  }?>


              <?php

              }else {
                echo "<h1>Books not found!</h1>";
              } ?>



            </div>
          </div>
        </div>
      </div>

      <?php


    } else {

       ?>

      <div class="col-sm-12">
        <div class="panel">
          <div class="panel-content">
            <div class="row">
              <?php
              $query = "SELECT * FROM `books` ";
              $results = mysqli_query($connection,$query);


              while ($row = mysqli_fetch_assoc($results)) { ?>

                <div class="col-sm-3 col-md-2" style="margin-right:30px;">
                  <img style="width: 100%" src="../images/books/<?= $row['book_image'];?>" alt="">
                  <h4><?= $row['book_name'];?></h4>
                  <h5> <b>Available :  <?= $row['available_qty'];?></b> </h5>
                </div>

              <?php  }?>

            </div>
          </div>
        </div>
      </div>
<?php
    }


      require_once('footer.php');
     ?>
