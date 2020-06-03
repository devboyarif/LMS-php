
    <?php
      require_once('header.php');
     ?>

                <div class="content-header">
                    <div class="leftside-content-header">
                        <ul class="breadcrumbs">
                            <li><i class="fa fa-home" aria-hidden="true"></i><a href="index.php">Dashboard</a></li>
                        </ul>
                    </div>
                </div>

                <div class="row animated fadeInUp">
                    <div class="col-sm-12">
                      <div class="row">
                          <!--BOX Style 1-->
                          <?php
                          $query = "SELECT * FROM `students` ";
                          $results = mysqli_query($connection,$query);
                          $total_students = mysqli_num_rows($results);

                           ?>
                          <div class="col-sm-6 col-md-4 col-lg-3">
                              <div class="panel widgetbox wbox-1 bg-darker-1">
                                  <a href="students.php">
                                      <div class="panel-content">
                                        <h2 class="color-w"><i class="fa fa-users"></i>  <?=$total_students?></h2>
                                          <h1 class="title color-w"> Total Students </h1>
                                      </div>
                                  </a>
                              </div>
                          </div>
                          <!--BOX Style 1-->
                          <?php
                          $query = "SELECT * FROM `librarian` ";
                          $results = mysqli_query($connection,$query);
                          $total_librarian = mysqli_num_rows($results);

                           ?>
                          <div class="col-sm-6 col-md-4 col-lg-3">
                              <div class="panel widgetbox wbox-1 bg-darker-2 color-light">
                                  <a href="#">
                                      <div class="panel-content">
                                          <h2 class="color-light-1"> <i class="fa fa-user"></i> <?=$total_librarian?> </h2>
                                          <h1 class="title">Total Librarian</h1>
                                      </div>
                                  </a>
                              </div>
                          </div>
                          <?php

                          $books = mysqli_query($connection, "SELECT * FROM `books` ");
                          $total_books = mysqli_num_rows($books);

                          $books_qty = mysqli_query($connection,"SELECT SUM(`book_qty`) as total FROM books ");
                          $qty = mysqli_fetch_assoc($books_qty);

                          $books_avail_qty = mysqli_query($connection,"SELECT SUM(`available_qty`) as avail_total FROM books");
                          $avail_qty = mysqli_fetch_assoc($books_avail_qty);

                           ?>
                          <div class="col-sm-6 col-md-4 col-lg-3">
                              <div class="panel widgetbox wbox-1 bg-darker-1">
                                  <a href="manage-book.php">
                                      <div class="panel-content">
                                        <h2 class="color-w"><i class="fa fa-book"></i>  <?=$total_books.' ('.$qty['total'].')';?>  </h2>
                                          <h1 class="title color-w"> Total Books </h1>
                                      </div>
                                  </a>
                              </div>
                          </div>
                          <!--BOX Style 1-->
                          <?php
                          $books_avail_qty = mysqli_query($connection,"SELECT SUM(`available_qty`) as avail_total FROM books");
                          $avail_qty = mysqli_fetch_assoc($books_avail_qty);

                           ?>
                           <div class="col-sm-6 col-md-4 col-lg-3">
                               <div class="panel widgetbox wbox-1 bg-darker-1">
                                   <a href="manage-book.php">
                                       <div class="panel-content">
                                         <h2 class="color-w"> <i class="fa fa-book"> </i> <?=$avail_qty['avail_total']?></h2>
                                           <h1 class="title color-w">Available Books </h1>
                                       </div>
                                   </a>
                               </div>
                           </div>

                      </div>
                    </div>
                </div>



    <?php
      require_once('footer.php');
     ?>
