<?php
include "config.php";
$subject_id = $_GET['id'];
$teacher_id = $_GET['tid'];
$max = mysqli_query($conn,"select `teacher`.`tName` AS `tName`,min(`subject`.`cId`) AS `Min(``subject``.cId)`,max(`subject`.`cSection`) AS `Max(``subject``.cSection)` from ((`subject` join `subject_has_teacher` on((`subject_has_teacher`.`subject_cId` = `subject`.`cId`))) join `teacher` on((`subject_has_teacher`.`teacher_tId` = `teacher`.`tId`))) where (`subject`.`cNumber` = '$subject_id') group by `teacher`.`tName`");
// $query = mysqli_query($conn,"select `subject`.`cId` AS `cId` from `subject` where ((`subject`.`cNumber` = '$cNumber') and (`subject`.`cSection` = '$cSection'))");
// $result = mysqli_fetch_array($query);
$resultmax = mysqli_fetch_array($max);
$min_subject_id = $resultmax['Min(`subject`.cId)'];
$max_subject_sec = $resultmax['Max(`subject`.cSection)'];
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
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet"
        type="text/css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="css/freelancer.min.css" rel="stylesheet">


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
    $query = mysqli_query($conn,"select `teacher`.`tName` AS `tName`,min(`subject`.`cId`) AS `Min(``subject``.cId)`,max(`subject`.`cSection`) AS `Max(``subject``.cSection)`,`subject`.`cNumber` AS `cNumber`,`subject`.`cName` AS `cName`,`subject`.`cYear` AS `cYear`,`subject`.`cTerm` AS `cTerm`,`subject`.`cPassword` AS `cPassword`,`subject`.`cStatus` AS `cStatus` from ((`subject` join `subject_has_teacher` on((`subject_has_teacher`.`subject_cId` = `subject`.`cId`))) join `teacher` on((`subject_has_teacher`.`teacher_tId` = `teacher`.`tId`))) where (`subject`.`cNumber` = '$subject_id') group by `teacher`.`tName`");
    $objResult = mysqli_fetch_array($query);
    // var_dump($max_value['max(`subject`.`cSection`)']);
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
        <form action="updateSubject.php" method="POST">
            <div class="form-group">
                <div align="center">
                    <label>แก้ไขรายวิชา</label>
                </div>
                <label>รหัสวิชา</label>
                <input type="text" name="cNumber" class="form-control" id="cNumber" value="<?=$objResult['cNumber'] ?>">
            </div>
            <div class="form-group">
                <label>ชื่อวิชา</label>
                <input type="text" name="cName" class="form-control" id="cName" value="<?=$objResult['cName'] ?>">
            </div>
            <div class="form-group">
                <label>ปีการศึกษา</label>
                <input type="text" name="cYear" class="form-control" id="cYear" value="<?=$objResult['cYear'] ?>">
            </div>
            <div class="form-group">
                <label>เทอม</label>
                <select class="form-control" name="cTerm" id="cTerm" value="<?=$objResult['cTerm'] ?>">
                    <option value="1"<?php
                      if($objResult['cTerm']=='1'){
                        echo "selected";
                      }
                    ?>>1</option>
                    <option value="2"<?php
                      if($objResult['cTerm']=='2'){
                        echo "selected";
                      }
                    ?>>2</option>
                </select>
            </div>
            <div class="form-group">
                <label>จำนวนเซคชัน</label>
                <select class="form-control" name="cSection" id="cSection" value="<?=$objResult['Max(`subject`.cSection)'] ?>" disabled="disabled">
                          <option value='1'
                          <?php
                            if($objResult['Max(`subject`.cSection)']=='1'){
                              echo "selected";
                            }
                          ?>
                          >1</option>
                          <option value='2'
                          <?php
                            if($objResult['Max(`subject`.cSection)']=='2'){
                              echo "selected";
                            }
                          ?>
                          >2</option>
                          <option value='3'
                          <?php
                            if($objResult['Max(`subject`.cSection)']=='3'){
                              echo "selected";
                            }
                          ?>
                          >3</option>
                          <option value='4'
                          <?php
                            if($objResult['Max(`subject`.cSection)']=='4'){
                              echo "selected";
                            }
                          ?>
                          >4</option>
                          <option value='5'
                          <?php
                            if($objResult['Max(`subject`.cSection)']=='5'){
                              echo "selected";
                            }
                          ?>
                          >5</option>
                </select>
                <input type="hidden" name="cSection" value="<?=$objResult['Max(`subject`.cSection)']?>" />
                <input type="hidden" name="min_subject_id" value="<?=$min_subject_id?>" />
                <input type="hidden" name="max_subject_sec" value="<?=$max_subject_sec?>" />
            </div>
            <div class="form-group">
                <label>รหัสเข้าร่วม</label>
                <input type="text" class="form-control" name="cPassword" id="cPassword" value="<?=$objResult['cPassword'] ?>">
            </div>
            <div class="form-group">
                <label>สถานะรายวิชา</label>
                <select class="form-control" name="cStatus" id="cStatus" value="<?=$objResult['cStatus'] ?>">
                    <option value="0"
                    <?php
                      if($objResult['cStatus']=='0'){
                        echo "selected";
                      }
                    ?>
                    >ปิด</option>
                    <option value="1"
                    <?php
                      if($objResult['cStatus']=='1'){
                        echo "selected";
                      }
                    ?>
                    >เปิด</option>
                </select>
            </div>
            <div align="center">
                <input type="submit" name="submit" class="btn btn-primary" id="addSubject" value="บันทึก">
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
