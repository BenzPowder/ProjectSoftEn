<?php
include "config.php";
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
    <title>เพิ่มวิชา</title>
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

  .box {
    width: auto;
    height: auto;
    border-radius: 8px;
    border: 1px solid #BEBEBE;
    background-color: #F6F6F6;
    color: #000000;
    font-family: Arial, Helvetica, sans-serif;
    line-height: 20px;
}


</style>
  <body id="page-top" >



    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light" id="mainNav">
      <div class="container">
        <a class="" href="#page-top">ระบบเช็คชื่อ</a>
      </div>
    </nav>

    <!-- Header -->
<br><br>
<?php
    $query = mysqli_query($conn,"select `teacher`.`tName` AS `tName`,`subject`.`cNumber` AS `cNumber`,`subject`.`cName` AS `cName`,`subject`.`cYear` AS `cYear`,`subject`.`cTerm` AS `cTerm` from ((`subject` join `subject_has_teacher` on((`subject_has_teacher`.`subject_cId` = `subject`.`cId`))) join `teacher` on((`subject_has_teacher`.`teacher_tId` = `teacher`.`tId`)))WHERE
teacher.tName LIKE '%พุธษดี%'");
 ?>
<!-- <div class="box" align="center">
  <form action="add.php" method="post">
      <br><h2>เพิ่มวิชา</h2><br><br>
      รหัสวิชา : <input type="text" name="cNumber" id="cNumber"><br><br>
      ชื่อวิชา : <input type="text" name="cName" id="cName"><br><br>
      ปีการศึกษา : <input type="text" name="cYear" id="cYear"><br><br>
      เทอม : <input type="text" name="cTerm" id="cTerm"><br><br>
      เซคชัน : <input type="text" name="cSection" id="cSection"><br><br>
      รหัสเข้าร่วม : <input type="text" name="cPassword" id="cPassword"><br><br>
      สถานะรายวิชา : <input type="text" name="cStatus" id="cStatus"><br><br>
      <input type="submit" value="บันทึก" id="save"><br><br>
  </form>

</div> -->
<div class="container">
  <form action="add.php" method="post">
  <div class="form-group">
    <div align="center">
        <label>เพิ่มวิชา</label>
    </div>
    <label>รหัสวิชา</label>
    <input type="text" class="form-control" id="cNumber" placeholder="">
  </div>
  <div class="form-group">
    <label>ชื่อวิชา</label>
    <input type="text" class="form-control" id="cName" placeholder="">
  </div>
  <div class="form-group">
    <label>ปีการศึกษา</label>
    <input type="text" class="form-control" id="cYear" placeholder="">
  </div>
  <div class="form-group">
    <label>เทอม</label>
    <select class="form-control" id="cTerm">
    <option value="1">1</option>
    <option value="2">2</option>
  </select>
  </div>
  <div class="form-group">
    <label>จำนวนเซคชัน</label>
    <select class="form-control" id="cSection">
    <option value="1">1</option>
    <option value="2">2</option>
    <option value="3">3</option>
    <option value="4">4</option>
    <option value="5">5</option>
    </select>
  </div>
  <div class="form-group">
    <label>รหัสเข้าร่วม</label>
    <input type="text" class="form-control" id="cPassword" placeholder="">
  </div>
  <div class="form-group">
    <label>สถานะรายวิชา</label>
    <select class="form-control" id="cStatus">
    <option value="0">ปิด</option>
    <option value="1">เปิด</option>
    </select>
  </div>
  <div align="center">
    <button type="submit" class="btn btn-primary" id="addSubject">Submit</button>
  </div>
  <br>
</form>
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
