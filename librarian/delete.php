<?php

require_once('../db.php');




if (isset($_GET['book_id'])) {

  $book_id = base64_decode( $_GET['book_id']);
  $query = "DELETE FROM `books` WHERE id='$book_id'";
  $results = mysqli_query($connection,$query);
  header("location: manage-book.php");

}


 ?>
