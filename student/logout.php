<?php

session_start();
unset($_SESSION['student_login']);
// session_destroy($_SESSION['student_login']);
header('location: sign-in.php');

 ?>
