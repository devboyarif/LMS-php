<?php
 require_once('../db.php');
 $query = "SELECT * FROM `students` ";
 $results=mysqli_query($connection,$query);

 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Print All Student</title>

    <style media="screen">
      body{
        margin: 0;
        font-family: kalpurush;
      }
      .print-area{
        width: 755px;
        height: 1050px;
        margin: auto;
        box-sizing: border-box;
        page-break-after: always;
      }
      .header , .page-info{
        text-align: center;
      }
      .header h3{
        margin: 0;
      }
      .data-info{}
      .data-info table{
        width: 100%;
        border-collapse: collapse;
      }
      .data-info table th,
      .data-info table td{
        border: 1px solid #555;
        padding: 4px;
        line-height: 1em;
      }
    </style>

  </head>
  <body onload="window.print()">

    <?php echo  page_header(); ?>

<?php




     $sl = 1 ;
     // $page = 1 ;
     // $total = mysqli_num_rows($results);
     // $per_page = 35;

     while ($row = mysqli_fetch_assoc($results)) {

       // if ($sl % $page == 1) {
       //   echo page_header();
       // }

        ?>

       <tr>
         <td><?=$sl;?></td>
         <td><?=$row['fname']?></td>
         <td><?=$row['roll']?></td>
         <td><?=$row['reg']?></td>
         <td><?=$row['phone']?></td>
       </tr>

       <?php
       //
       // if ($sl % $page == 0 || $total == $per_page) {
       //   echo page_footer($page++);
       // }

       $sl++; } ?>









      <?php echo  page_footer(); ?>

  </body>
</html>



<?php

function page_header()
{
  $data =
  '
  <div class="print-area">
    <div class="header">
      <h2>All Students List</h2>
    </div>
    <div class="data-info">
      <table>
        <tr>
          <th>SL No.</th>
          <th>Student Name</th>
          <th>Student Roll</th>
          <th>Student Registration</th>
          <th>Student Phone</th>
        </tr>
  ';
  return $data;
}
function page_footer()
{
  $data = '
  </table>
    <div class="page-info">
      Page:- 1
    </div>
  </div>
</div>';
  return $data;
}

 ?>
