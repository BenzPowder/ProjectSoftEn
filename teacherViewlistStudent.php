<?php
include "config.php";
$subject_id = $_GET['id'];
$section = $_GET['section'];
?>
<!DOCTYPE html>
<html lang="en">
  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="facivon.ico">

    <script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
    <script src="script.js"></script>
    <title>ระบบเช็คชื่อ</title>
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="css/freelancer.min.css" rel="stylesheet">


  </head>

  <body background="bott2bg.jpg">
 </body>



<style type="text/css">
 a,span {
    font-family: BoonJot, Helvetica, sans-serif;
  }
  a:hover {
      text-decoration: none;
  }


</style>
  <body id="page-top" >



    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
      <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="#page-top">รายชื่อนักศึกษา</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          Menu
          <i class="fa fa-bars"></i>
        </button>
      </div>
    </nav>

    <!-- Header -->
     <section id="training">


<br><br>
<?php
$query_cId = "select `subject`.`cId` AS `cId` from `subject` where (`subject`.`cNumber` = '$subject_id')";
$result = mysqli_query($conn,$query_cId);
$row = mysqli_fetch_assoc($result);
$cId = $row['cId'];
    $sql = "select `subject_has_student`.`subject_cId` AS `subject_cId`,`subject_has_student`.`subject_cSection` AS `subject_cSection`,`student`.`stuId` AS `stuId`,`student`.`stuName` AS `stuName`,`subject`.`cYear` AS `cYear`,`subject`.`cTerm` AS `cTerm`,`subject`.`cNumber` AS `cNumber` from ((`subject` join `subject_has_student` on(((`subject`.`cId` = `subject_has_student`.`subject_cId`) and (`subject`.`cSection` = `subject_has_student`.`subject_cSection`)))) join `student` on((`subject_has_student`.`student_stuId` = `student`.`stuId`))) where ((`subject`.`cId` = '$cId') and (`subject`.`cSection` = '$section'))";
    $query = mysqli_query($conn,$sql);
 ?>
  <table class="table table-striped" id="myTable">
    <div align="center">
        <h3><strong>รายชื่อนักศึกษา วิชา : <?php echo $subject_id ?> ปีการศึกษา <?php echo 2562 ?> เทอม <?php 1 ?></strong></h3>
    </div><br>
    <thead>
      <tr>
        <th><center>รหัสนักศึกษา</center></th>
        <th><center>ชื่อนักศึกษา</center></th>
        <th><center>รหัสวิชา</center></th>
        <th><center>เซคชัน</center></th>
        <th><center>ปีการศึกษา</center></th>
        <th><center>เทอม</center></th>
        <th><center></center></th>
        <th><center>สถานะภาพนักศึกษา</center></th>

      </tr>
    </thead>
    <tbody>

<?php
$i = 0;
       while($objResult = mysqli_fetch_array($query)){
        $i= $i+1;
        echo "<tr>";
        echo "<td><center>".$objResult['stuId']."</center></td>";
        echo "<td><center>".$objResult['stuName']."</center></td>";
        echo "<td><center>".$objResult['cNumber']."</center></td>";
        echo "<td><center>".$objResult['subject_cSection']."</center></td>";
        echo "<td><center>".$objResult['cYear']."</center></td>";
        echo "<td><center>".$objResult['cTerm']."</center></td>";

        echo "</tr>";
      }
      echo "</table>";
?>
</div><br>
    <div class="container" align="center">
    <a href="teacherAddStudent.php?id=<?=$subject_id?>&section=<?=$section?>">เพิ่มนักศึกษา</a>
    </div>
    <!-- Scroll to Top Button (Only visible on small and extra-small screen sizes) -->


    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/popper/popper.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Contact Form JavaScript -->
    <script src="js/jqBootstrapValidation.js"></script>
    <script src="js/contact_me.js"></script>

    <!-- Custom scripts for this template -->
    <script src="js/freelancer.min.js"></script>

  </body>


</html>
