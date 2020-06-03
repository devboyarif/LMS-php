
    <?php
      require_once('header.php');
     ?>

                <div class="content-header">
                    <div class="leftside-content-header">
                        <ul class="breadcrumbs">
                            <li><i class="fa fa-home" aria-hidden="true"></i><a href="index.php">Dashboard</a></li>
                            <li><a href="javascript:avoid(0)">Students</a></li>
                        </ul>
                    </div>
                </div>

                <div class="row animated fadeInUp">
                  <div class="col-sm-12">
                    <div class="pull-left">
                      <h4 class="section-subtitle"><b>All Students</b></h4>
                    </div>
                      <div class="pull-right">
                        <a href="print-all-student.php" class="btn btn-primary" target="_blank"> <i class="fa fa-print"></i> Print</a>
                      </div>
                      <div class="clearfix">

                      </div>
                      <div class="panel">
                          <div class="panel-content">
                              <div class="table-responsive">
                                  <table id="basic-table" class="data-table table table-striped nowrap table-hover" cellspacing="0" width="100%">
                                      <thead>
                                      <tr>
                                          <th>Name</th>
                                          <th>Roll</th>
                                          <th>Registration No.</th>
                                          <th>Email</th>
                                          <th>Username</th>
                                          <th>Phone</th>
                                          <th>Image</th>
                                          <th>Status</th>
                                          <th>Action</th>
                                      </tr>
                                      </thead>
                                      <tbody>
                                        <?php
                                        $query = "SELECT * FROM `students` ";
                                        $results=mysqli_query($connection,$query);
                                        while($row = mysqli_fetch_assoc($results)){
                                         ?>
                                      <tr>
                                        <td><?= ucwords($row['fname'] .' '. $row['lname']) ?></td>
                                        <td><?= $row['roll'] ?></td>
                                        <td><?= $row['reg'] ?></td>
                                        <td><?= $row['email'] ?></td>
                                        <td><?= $row['username'] ?></td>
                                        <td><?= $row['phone'] ?></td>
                                        <td><?= $row['image'] ?></td>
                                        <td><?= $row['status'] == 1 ? 'Active' : 'Inactive' ?></td>
                                        <td>

                                          <?php

                                          if ($row['status'] == 1) {
                                            ?>
                                            <a class="btn btn-primary" href="status_inactive.php?student_id=<?= base64_encode($row['id']) ?>"> <i class="fa fa-arrow-up"></i> </a>
                                            <?php
                                          }else {
                                            ?>
                                            <a class="btn btn-warning" href="status_active.php?student_id=<?= base64_encode($row['id']) ?>""> <i class="fa fa-arrow-down"></i> </a>
                                            <?php
                                          }

                                           ?>

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
      require_once('footer.php');
     ?>
