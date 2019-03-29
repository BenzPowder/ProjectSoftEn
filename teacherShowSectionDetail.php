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
    <link href="css/bootstrap-toggle.min.css" rel="stylesheet">
    <script src="js/bootstrap-toggle.min.js"></script>

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
    <?php
    $sql="select `teacher`.`tName` AS `tName`,`ta`.`taId` AS `taId`,`ta`.`taName` AS `taName`,`subject`.`cNumber` AS `cNumber`,`subject`.`cName` AS `cName`,`subject`.`cYear` AS `cYear`,`teacher`.`position` AS `position`,`subject`.`cTerm` AS `cTerm`,`subject`.`cSection` AS `cSection`,`section`.`secId` AS `secId`,`section`.`secName` AS `secName`,`student`.`stuId` AS `stuId`,`student`.`stuName` AS `stuName` from ((((((((`teacher_has_subject_has_ta` join `teacher` on((`teacher_has_subject_has_ta`.`teacher_tId` = `teacher`.`tId`))) join `subject_has_teacher` on((`subject_has_teacher`.`teacher_tId` = `teacher`.`tId`))) join `subject_has_ta` on(((`teacher_has_subject_has_ta`.`subject_has_ta_subject_cId` = `subject_has_ta`.`subject_cId`) and (`teacher_has_subject_has_ta`.`subject_has_ta_ta_taId` = `subject_has_ta`.`ta_taId`)))) join `ta` on((`subject_has_ta`.`ta_taId` = `ta`.`taId`))) join `subject` on(((`subject_has_teacher`.`subject_cId` = `subject`.`cId`) and (`subject_has_ta`.`subject_cId` = `subject`.`cId`)))) join `section` on((`section`.`subject_cId` = `subject`.`cId`))) join `section_has_student` on(((`section_has_student`.`section_secId` = `section`.`secId`) and (`section_has_student`.`section_subject_cId` = `section`.`subject_cId`)))) join `student` on((`section_has_student`.`student_stuId` = `student`.`stuId`))) where ((`subject`.`cNumber` = '322371') and (`teacher`.`tName` = 'พุธษดี ศิริแสงตระกูล') and (`section`.`secName` = '1'))";
    $query = mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($query);
 ?>
    <div class="container">
        <form action="add.php" method="post">
            <div class="form-group">
                <div align="center">
                    <h2><label><?php 
                    echo $row["cNumber"]."&nbsp;&nbsp;&nbsp;".$row["cName"];
                    ?></label></h2><br>
                </div>
            </div>
            <div class="row">
                <div class="col-md-10">
                    <h4><?php 
                    echo $row["position"]."".$row["tName"];
                    ?></h4>
                </div>
                <div class="col-md-2">
                    <h4><?php 
                    echo "Section&nbsp;&nbsp;".$row["secName"];
                    ?></h4>
                </div>
            </div>
            <br>
            <div align="right">
                <a href="teacherAddStudent.php"><button type="button" class="btn btn-primary"
                        id="addSubject">เพิ่มนักศึกษา</button></a>
            </div>

            <br>
            <?php
    $query = mysqli_query($conn,$sql);
 ?>
            <table class="table table-striped" id="myTable">
                <thead>
                    <tr>
                        <th>
                            <center>รหัสนักศึกษา</center>
                        </th>
                        <th>
                            <center>ชื่อนักศึกษา</center>
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
        echo "<td><center>".$objResult['stuId']."</center></td>";
        echo "<td><center>".$objResult['stuName']."</center></td>";
        echo "<td><center>".$objResult['cYear']."</center></td>";
        echo "<td><center>".$objResult['cTerm']."</center></td>";
        echo "<td><center><a href=\"editStudent.php\"><button type=\"button\" class=\"btn btn-primary\"
        id=\" \">แก้ไข</button></a></center></td>";
        echo "<td><center><a href=\" \"><input type=\"checkbox\" checked data-toggle=\"toggle\" data-onstyle=\"success\"
        data-offstyle=\"danger\"></a></center></td>";
    
        echo "</tr>";
      }
      echo "</table>";
?>
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

    <div align="center">
        <a href="teacherShowSection.php"><button type="button" class="btn btn-primary" id="addSubject">เปลี่ยน
                Section</button></a>
    </div>

</body>


</html>