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
    <title>ระบบเช็คชื่อ</title>
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
</style>

<body id="page-top">



    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
        <div class="container">
            <font style="float: right;">TEACHER</font>
            <a class="navbar-brand js-scroll-trigger" href="#page-top">รายชื่อนักศึกษา</a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
                data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
                aria-label="Toggle navigation">
                Menu
                <i class="fa fa-bars"></i>
            </button>
        </div>
    </nav>

    <!-- Header -->
    <section id="training">

        <!-- <div class="container">
        <br><br><h2 class="text-center" ><span>ค้นหา</span></h2><br>
         <center><div class="col-lg-3 col-sm-offset-2 col-xs-offset-1 ">
    <input type="search" id="myInput" onkeyup="myFunction()" class="form-control" style="text-align: center;" placeholder="ค้นหา">
</div></center> -->

        <br><br>
        <?php
    $query = mysqli_query($conn,"select `teacher`.`tName` AS `tName`,`subject`.`cNumber` AS `cNumber`,`subject`.`cName` AS `cName`,`subject`.`cYear` AS `cYear`,`subject`.`cTerm` AS `cTerm`,`subject`.`cSection` AS `cSection` from ((`subject` join `subject_has_teacher` on((`subject_has_teacher`.`subject_cId` = `subject`.`cId`))) join `teacher` on((`subject_has_teacher`.`teacher_tId` = `teacher`.`tId`))) where ((`teacher`.`tName` = 'พุธษดี ศิริแสงตระกูล') and (`teacher`.`tId` = `subject_has_teacher`.`teacher_tId`) and (`subject_has_teacher`.`subject_cId` = `subject`.`cId`) and (`subject`.`cSection` = '1'))");
 ?>
        <table class="table table-striped" id="myTable">
            <thead>
                <tr>
                    <th>
                        <center>ชื่ออาจารย์</center>
                    </th>
                    <th>
                        <center>รหัสวิชาที่สอน</center>
                    </th>
                    <th>
                        <center>ชื่อวิชาที่สอน</center>
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
        echo "<td><center>".$objResult['tName']."</center></td>";
                echo "<td><center>".$objResult['cNumber']."</center></td>";
                echo "<td><center><a href='teacherShowSection.php?id=".$objResult['cNumber']."'>".$objResult['cName']."<a></center></td>";
                echo "<td><center>".$objResult['cYear']."</center></td>";
                echo "<td><center>".$objResult['cTerm']."</center></td>";
        echo "<td><center><a href='editSubject.php'><button type='button' class='btn btn-primary'
        id='btn-edit'>แก้ไข</button></a></center></td>";
        echo "<td><center><button type='button' class='btn btn-primary'
        id='btn-delete' onClick='myFunction()'>ลบ</button></center></td>";
        echo "</tr>";
      }
      echo "</table>";
?>
                </div>
                <div class="container" align="center">
                    <a href="addSubject.php"><input type="button" class="btn btn-primary" name="addSubject"
                            value="เพิ่มวิชา"> </a>
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
<script>
    function myFunction(){
      alert("TEST DELETE");
    }
</script>
