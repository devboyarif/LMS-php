<?php
session_start();

if (!isset($_SESSION['student_login'])) {
  header('location: sign-in.php');
}

 ?>
