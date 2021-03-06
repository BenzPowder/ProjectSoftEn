<?php
include "config.php";
$subject_id = $_GET['id'];
$section = $_GET['section'];
$stuId = $_GET['stuId'];
$year = $_GET['year'];
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
    $sql = "select max(`subject`.`cSection`) AS `cSection`,`student`.`stuId` AS `stuId`,`student`.`stuName` AS `stuName`,`subject`.`cNumber` AS `cNumber` from ((`subject` join `subject_has_student` on(((`subject_has_student`.`subject_cId` = `subject`.`cId`) and (`subject_has_student`.`subject_cSection` = `subject`.`cSection`)))) join `student` on((`subject_has_student`.`student_stuId` = `student`.`stuId`))) where ((`student`.`stuId` = '$stuId') and (`subject`.`cNumber` = '$subject_id')) group by `student`.`stuId`,`student`.`stuName`,`subject`.`cNumber`";
    $query = mysqli_query($conn,$sql);
    $result = mysqli_fetch_array($query);

    $sql_max_section = "select `subject`.`cId` AS `cId`,`subject`.`cNumber` AS `cNumber`,`subject`.`cName` AS `cName`,`subject`.`cYear` AS `cYear`,`subject`.`cTerm` AS `cTerm`,max(`subject`.`cSection`) AS `cSection`,`subject`.`cPassword` AS `cPassword`,`subject`.`cStatus` AS `cStatus` from `subject` where (`subject`.`cNumber` = '$subject_id') group by `subject`.`cNumber`";
    $query_max_section = mysqli_query($conn,$sql_max_section);
    $result_max_section = mysqli_fetch_array($query_max_section);
    $max_section = $result_max_section['cSection'];


    $sql_maxid = "select `subject`.`cId` AS `cId`,`subject`.`cSection` AS `cSection` from `subject` where ((`subject`.`cNumber` = '$subject_id') and (`subject`.`cTerm` = 2) and (`subject`.`cYear` = 2562) and (`subject`.`cSection` = $section))";
      $query_maxid = mysqli_query($conn,$sql_maxid);
      $result_maxid = mysqli_fetch_array($query_maxid);

    $sql_show = "select `student`.`stuId` AS `stuId`,`student`.`stuName` AS `stuName`,`move`.`move_from` AS `move_from`,`move`.`move_date` AS `move_date`,`move`.`subject_cId` AS `subject_cId`,`subject`.`cNumber` AS `cNumber`,`subject`.`cName` AS `cName`,`subject`.`cYear` AS `cYear`,`subject`.`cTerm` AS `cTerm`,`subject`.`cSection` AS `cSection` from ((`move` join `subject` on(((`move`.`subject_cId` = `subject`.`cId`) and (`move`.`subject_cSection` = `subject`.`cSection`)))) join `student` on((`move`.`student_stuId` = `student`.`stuId`))) where ((`student`.`stuId` = '$stuId') and (`subject`.`cNumber` = '$subject_id') and  (`subject`.`cYear` = '$year'))";
    $query_show = mysqli_query($conn,$sql_show);
    $result_show = mysqli_fetch_array($query_show);
    
 ?>
    <div class="container">
        <form action="updateSectionOfStudent.php" method="POST">
            <div class="form-group">
                <div align="center">
                    <label>
                        <h1>ข้อมูลนักศึกษา</h1>
                    </label>
                </div>
                <label>รหัสนักศึกษา : </label> <?=$result['stuId'] ?>
            </div>
            <div class="form-group">
                <label>ชื่อนักศึกษา : </label><?=$result['stuName'] ?>
            </div>
            <div>ข้อมูลการย้าย Section :
                <?php 
                if($result_show['move_from']==null){
                    echo "-";
                }else{
                    echo "<div>
                    <label>ย้ายจาก Section : </label>".$result_show['move_from']."
                </div>
                <div>
                    <label>วันที่ย้าย : </label>".$result_show['move_date']."
                </div>";
                }
            ?>
            </div>

            <!-- <div>
                <label>ย้ายจาก Section : </label> <?=$result_show['move_from'] ?>
            </div>
            <div>
                <label>วันที่ย้าย : </label> <?=$result_show['move_date'] ?>
            </div> -->


            <input type="hidden" name="result_maxid" value="<?=$result_maxid['cId'] ?>">
            <div align="center">
                <div align="center"><a href=javascript:history.back(1) class="btn btn-primary">ย้อนกลับ</th></a>
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