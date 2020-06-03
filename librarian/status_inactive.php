<?php

require_once('../db.php');

$student_id = base64_decode($_GET['student_id']);

// echo $student_id ;
// $query = "UPDATE `students` SET 'status'= '0' WHERE id='$student_id' ";
$query = " UPDATE `students` SET `status`= '0' WHERE id='$student_id' ";
$results=mysqli_query($connection,$query);

header('location: students.php');

 ?>
