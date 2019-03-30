<?php
include "config.php";
$tId = 1;
?>

<?php
if(isset($_POST['submit'])){
    $cNumber = mysqli_real_escape_string($conn,$_POST['cNumber']);
    $cName = mysqli_real_escape_string($conn,$_POST['cName']);
    $cYear = mysqli_real_escape_string($conn,$_POST['cYear']);
    $cTerm = mysqli_real_escape_string($conn,$_POST['cTerm']);
    $cSection = mysqli_real_escape_string($conn,$_POST['cSection']);
    $cPassword = mysqli_real_escape_string($conn,$_POST['cPassword']);
    $cStatus = mysqli_real_escape_string($conn,$_POST['cStatus']);

    for($i=1;$i<=(int)$cSection;$i++){
    $insertSubject = "INSERT INTO subject VALUES (NULL,'$cNumber','$cName','$cYear',$cTerm,'$i','$cPassword','$cStatus')";
    // echo $insertSubject."<br>";
    $retval = mysqli_query($conn,$insertSubject);
    }
    echo $cNumber;
    $query = mysqli_query($conn,"select `subject`.`cId` AS `cId` from `subject` where (`subject`.`cNumber` = '$cNumber')");
    // print_r();
    while($objResult = mysqli_fetch_array($query)){
      $cId = $objResult['cId'];
      // $cId = $objResult['cId'];
      $insertSubject = "INSERT INTO subject_has_teacher(`subject_cId`,`teacher_tId`) VALUES ('$cId','$tId')";
      // echo $insertSubject."<br>";
      // echo $insertSubject;
      $result = mysqli_query($conn,$insertSubject);
    }

    if($result){
      echo "<script>alert('บันทึกเรียบร้อย!'); location.href='index.php';</script>";
    }else{
      die('Could not enter data: ' . mysqli_error($conn));
    }
  }
?>
