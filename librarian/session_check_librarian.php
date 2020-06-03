<?php
session_start();

if (!isset($_SESSION['librarian_login'])) {
  header('location: login.php');
}

 ?>
