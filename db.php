<?php

$hostname="localhost";
$usertname="root";
$password="";
$databasename="lms";

$connection=mysqli_connect($hostname,$usertname,$password,$databasename);

mysqli_query($connection,'SET CHARACTER SET utf8');
mysqli_query($connection,"SET SESSION collation_connection ='utf8_general_ci'");


 ?>
