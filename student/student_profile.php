
    <?php
      require_once('header.php');
     ?>

                <div class="content-header">
                    <div class="leftside-content-header">
                        <ul class="breadcrumbs">
                            <li><i class="fa fa-home" aria-hidden="true"></i><a href="index.php">Dashboard</a></li>
                            <li><a href="javascript:avoid(0)">Profile</a></li>
                        </ul>
                    </div>
                </div>

                <div class="row animated fadeInUp">
                  <div class="panel">
                        <div class="panel-content">
                            <div class="row">
                                <div class="col-sm-10 col-sm-offset-1">
                                    <form class="form-horizontal form-stripe">
                                        <!-- <h1 class="mb-xlg text-center"><b>User Profile</b></h1> -->
                                        <h1 class="mb-xlg text-center"><b></b></h1>
                                        <div class="form-group">
                                            <label for="name" class="col-sm-2 control-label">Your First Name</label>
                                            <div class="col-sm-10">
                                                <input readonly class="form-control" value="<?= ucwords($row['fname']);?>">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="name" class="col-sm-2 control-label">Your Last Name</label>
                                            <div class="col-sm-10">
                                                <input readonly class="form-control" value="<?= ucwords($row['lname']);?>">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="username" class="col-sm-2 control-label">Your Username</label>
                                            <div class="col-sm-10">
                                              <input readonly class="form-control" value="<?= ucwords($row['username']);?>">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="email3" class="col-sm-2 control-label">Your Email</label>
                                            <div class="col-sm-10">
                                                <input readonly class="form-control" value="<?= ucwords($row['email']);?>">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="password3" class="col-sm-2 control-label">Your Phone Number</label>
                                            <div class="col-sm-10">
                                                <input readonly class="form-control" value="<?= ucwords($row['phone']);?>">
                                            </div>
                                        </div>
                                        <div class="form-group">

                                            <div class="col-sm-12 col-sm-offset-2">
                                                  <a href="update_profile.php" class="btn btn-info">Update Profile</a>
                                            </div>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>


    <?php
      require_once('footer.php');
     ?>
