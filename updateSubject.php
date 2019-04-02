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

    $max = mysqli_query($conn,"select `teacher`.`tName` AS `tName`,min(`subject`.`cId`) AS `Min(``subject``.cId)`,max(`subject`.`cSection`) AS `Max(``subject``.cSection)` from ((`subject` join `subject_has_teacher` on((`subject_has_teacher`.`subject_cId` = `subject`.`cId`))) join `teacher` on((`subject_has_teacher`.`teacher_tId` = `teacher`.`tId`))) where (`subject`.`cNumber` = '$cNumber') group by `teacher`.`tName`");
    $query = mysqli_query($conn,"select `subject`.`cId` AS `cId` from `subject` where ((`subject`.`cNumber` = '$cNumber') and (`subject`.`cSection` = '$cSection'))");
    $result = mysqli_fetch_array($query);
    $resultmax = mysqli_fetch_array($max);
    // $cId = $result['cId'];
    $min_subject_id = $resultmax['Min(`subject`.cId)'];
    $max_subject_sec = $resultmax['Max(`subject`.cSection)'];
    // echo $cId."<br>";
    // echo ($cId-$cSection+1)."<br>";
    // echo $min_subject_id."<br>";
    // echo $max_subject_sec."<br>";
    // echo "max sec = ".$max_subject_sec."<br>";
    // echo "start id = ".$cId."<br>";
    // echo "min subject id = ".$min_subject_id."<br>";
    for($i=$min_subject_id;$i<=($min_subject_id+$max_subject_sec-1);$i++){
        $sql = "UPDATE subject SET cNumber='$cNumber', cName='$cName', cYear='$cYear', cTerm='$cTerm', cPassword='$cPassword', cStatus='$cStatus' WHERE cId='$i'";
        $query = mysqli_query($conn,$sql);
    }
    if($query){
      echo "<script>alert('อัพเดทเรียบร้อย'); location.href='index.php';</script>";
    }else{
      die('Could not enter data: ' . mysqli_error($conn));
    }


    // for($i=$cId;$i<=($);$i++){
    //   echo ();
    //   // $insertSubject = "UPDATE subject SET cNumber='$cNumber', cName='$cName',cYear='$cYear', cTerm='$cTerm',cSection='$cSection', cPassword='$cPassword',cStatus='$cStatus' WHERE cId='$cId'";
    //   // $cId++;
    //   // echo $insertSubject."<br>";
    // }
  }
  // $retval = mysqli_query($conn,$insertSubject);
  //   }
  //   if($result){
  //     echo "<script>alert('บันทึกเรียบร้อย!'); location.href='index.php';</script>";
  //   }else{
  //     die('Could not enter data: ' . mysqli_error($conn));
  //   }
  // }

?>
