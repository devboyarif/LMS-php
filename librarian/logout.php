<?php

session_start();
unset($_SESSION['librarian_login']);
// session_destroy($_SESSION['librarian_login']);
header('location: login.php');

 ?>
