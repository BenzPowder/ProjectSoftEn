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
    <title>เพิ่มนักศึกษา</title>
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
<html>
<script type="text/javascript">
function fncSubmit()
{
    if(document.getElementById('TANumber').value == "")
    {
        alert('กรุณากรอกรหัสรหัสนักศึกษา Ex.593020466-7');
        return false;
    }

    if(document.getElementById('TAName').value == "")
    {
        alert('กรุณากรอกชื่อนักศึกษา Ex.นายทดสอบ ทดสอบ');
        return false;
    }
}
</script>

    <div class="container">
        <form  action="functionAddStudent.php" method="post" onSubmit="JavaScript:return fncSubmit();">
            <div class="form-group">
                <div align="center">
                    <label>เพิ่มข้อมูลนักศึกษา</label>
                </div>
                <label>รหัสนักศึกษา</label>
                <input type="text" name="sNumber" class="form-control" id="sNumber">
            </div>
            <div class="form-group">
                <label>ชื่อนักศึกษา</label>
                <input type="text" name="sName"  class="form-control" id="sName" >
            </div>
            <div align="center">
                <input type="submit" name="submit" class="btn btn-primary" id="addSubject" value="บันทึก">
            </div>
            <br>
        </form>
    </div>
    </html>
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
