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
    <title>แสดง section</title>
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet"
        type="text/css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="css/freelancer.min.css" rel="stylesheet">

    <!-- on-of button -->
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>


</head>

<body background="bott2bg.jpg">
</body>

<style type="text/css">
a,
span {
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

<body id="page-top">



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
                    <h2><label>322371 SOFTWARE ENGINEERING วิศวกรรมซอฟต์แวร์</label></h2><br>
                </div>
            </div>
            <div class="row">
                <div class="col-md-11">
                    <h4>อ.ดร.ชิตสุธา สุ่มเล็ก</h4>
                </div>
            </div>
            <br>
            <div align="right">
                <a href="teacherAddTa.php"><button type="button" class="btn btn-primary"
                        id="addSubject">เพิ่มผู้ช่วยสอนอาจารย์</button></a>
            </div>
            <br>
            <?php
    $query = mysqli_query($conn,"select `ta`.`taId` AS `taId`,`ta`.`taName` AS `taName`,`subject`.`cNumber` AS `cNumber`,`subject`.`cName` AS `cName`,`subject`.`cYear` AS `cYear`,`subject`.`cTerm` AS `cTerm` from ((`subject` join `subject_has_ta` on((`subject_has_ta`.`subject_cId` = `subject`.`cId`))) join `ta` on((`subject_has_ta`.`ta_taId` = `ta`.`taId`))) where ((`ta`.`taId` = '593020419-6') and (`ta`.`taId` = `subject_has_ta`.`ta_taId`) and (`subject_has_ta`.`subject_cId` = `subject`.`cId`))");
 ?>
            <table class="table table-striped" id="myTable">
                <thead>
                    <tr>
                        <th>
                            <center>รหัสผู้ช่วยสอน</center>
                        </th>
                        <th>
                            <center>ชื่อผู้ช่วยสอน</center>
                        </th>
                        <th>
                            <center>ปีการศึกษา</center>
                        </th>
                        <th>
                            <center>เทอม</center>
                        </th>
                        <th>

                        </th>
                        <th>

                        </th>

                    </tr>
                </thead>
                <tbody>

                    <?php
$i = 0;
       while($objResult = mysqli_fetch_array($query)){
        $i= $i+1;
        echo "<tr>";
        echo "<td><center>".$objResult['taId']."</center></td>";
        echo "<td><center>".$objResult['taName']."</center></td>";
        echo "<td><center>".$objResult['cYear']."</center></td>";
        echo "<td><center>".$objResult['cTerm']."</center></td>";
        echo "<td><center><a href=\"editTA.php\"><button type=\"button\" class=\"btn btn-primary\"
        id=\" \">แก้ไข</button></a></center></td>";
        echo "<td><center><a href=\" \"><button type=\"button\" class=\"btn btn-primary\"
        id=\" \">ลบ</button></a></center></td>";
    
        echo "</tr>";
      }
      echo "</table>";
?>
                    <br> <br>
                    <div align="left">
                        <a href="teacherShowSectionDetail.php"><button type="button" class="btn btn-primary"
                                id="addSubject">Section 1</button> </a><br> <br> <br>
                        <a href="teacherShowSectionDetail.php"><button type="button" class="btn btn-primary"
                                id="addSubject">Section 2</button></a>
                        <br> <br>

                    </div>

                    <div align="center">
                        <a href="teacherShowClass.php"><button type="button" class="btn btn-primary"
                                id="addSubject">รายวิชาทั้งหมด</button></a>
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