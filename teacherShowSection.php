<?php
include "config.php";
$subject_id = $_GET['id'];
$tid = 1;
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
//     $query = mysqli_query($conn,"select `teacher`.`tName` AS `tName`,`subject`.`cNumber` AS `cNumber`,`subject`.`cName` AS `cName`,`subject`.`cYear` AS `cYear`,`subject`.`cTerm` AS `cTerm` from ((`subject` join `subject_has_teacher` on((`subject_has_teacher`.`subject_cId` = `subject`.`cId`))) join `teacher` on((`subject_has_teacher`.`teacher_tId` = `teacher`.`tId`)))WHERE
// teacher.tName LIKE '%พุธษดี%'");
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
    $sql="select `teacher`.`tName` AS `tName`,`subject`.`cNumber` AS `cNumber`,`subject`.`cName` AS `cName`,`subject`.`cYear` AS `cYear`,`subject`.`cTerm` AS `cTerm`,`subject`.`cId` AS `cId`,`subject`.`cSection` AS `cSection`,`subject`.`cPassword` AS `cPassword`,`subject`.`cStatus` AS `cStatus`,`teacher`.`position` AS `position` from ((`subject` join `subject_has_teacher` on((`subject_has_teacher`.`subject_cId` = `subject`.`cId`))) join `teacher` on((`subject_has_teacher`.`teacher_tId` = `teacher`.`tId`))) where ((`teacher`.`tId` = '1') and (`subject`.`cNumber` = '$subject_id'))";
    $query = mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($query);
 ?>
    <div class="container">
        <form action="add.php" method="post">
            <div class="form-group">
                <div align="center">
                    <h2><label><?php
                    echo $row["cNumber"]."&nbsp;&nbsp;&nbsp;".$row["cName"];
                    ?></h2><br>
                </div>
                <div align="center">
                    <h2><label><?php
                    echo "ปีการศึกษา&nbsp;".$row["cYear"]."&nbsp;&nbsp;&nbsp;เทอม&nbsp;".$row["cTerm"];
                    ?></h2><br>
                </div>
            </div>
            <div class="row">
                <div class="col-md-11">
                    <h4><?php
                    echo "ผู้รับผิดชอบรายวิชา : ".$row["position"]."".$row["tName"];
                    ?></h4>
                </div>
                <div class="col-md-1">
                    <a href="editSubject.php?id=<?=$subject_id?>&tid=<?=$tid?>"><button type="button" class="btn btn-primary"
                            id="addSubject">แก้ไขรายวิชา</button></a>
                </div>
            </div>
            <div align="left">
                <h4><label><?php
                    echo "รหัสเข้าร่วมชั้นเรียน : ".$row["cYear"];
                    ?></h4><br>
            </div>
            <br>
            <br>

            <br> <br>
            <div align="center">
                <?php
    $query = mysqli_query($conn,"select `subject`.`cNumber` AS `cNumber`,`teacher`.`tId` AS `tId`,`subject`.`cId` AS `cId`,`subject`.`cSection` AS `cSection` from ((`subject` join `subject_has_teacher` on((`subject_has_teacher`.`subject_cId` = `subject`.`cId`))) join `teacher` on((`teacher`.`tId` = `subject_has_teacher`.`teacher_tId`))) where ((`teacher`.`tId` = '1') and (`subject`.`cNumber` = '$subject_id'))");
    while($objResult = mysqli_fetch_array($query)){
      $section = $objResult['cSection'];
    }
    for($i=1;$i<=$section;$i++){
      echo "<a href='teacherShowSectionDetail.php?id=".$subject_id."&section=".$i."'>"."<button type='button' class='btn btn-primary' id='addsubject'>Section".$i."</button></a>&nbsp&nbsp&nbsp&nbsp";
    }
    echo "<a href='addSection.php?id=".$subject_id."&tid=".$tid."'onClick=\"return confirm('add section?');\">"."<button type='button' class='btn btn-success' id='addSection'>เพิ่มเซคชั่น"."</button></a>"
    ?>
            </div>

            <br>
            <br>
            <br>
            <div align="center">
                <div align="center"><a href=javascript:history.back(1)  class="btn btn-primary" >ย้อนกลับ</th></a>
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
