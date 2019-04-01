<?php
  include('config.php');
  $tid = $_GET['tid'];
  $subject_id = $_GET['id'];

  // $sql = "select `teacher`.`tName` AS `tName`,`subject`.`cNumber` AS `cNumber`,`subject`.`cName` AS `cName`,`subject`.`cYear` AS `cYear`,`subject`.`cTerm` AS `cTerm`,`subject`.`cId` AS `cId`,`subject`.`cSection` AS `cSection`,`subject`.`cPassword` AS `cPassword`,`subject`.`cStatus` AS `cStatus`,`teacher`.`position` AS `position` from ((`subject` join `subject_has_teacher` on((`subject_has_teacher`.`subject_cId` = `subject`.`cId`))) join `teacher` on((`subject_has_teacher`.`teacher_tId` = `teacher`.`tId`))) where ((`teacher`.`tId` = '$tid') and (`subject`.`cNumber` = '$subject_id'))";
  //
  // $query = mysqli_query($conn, $sql);
  // $result = mysqli_fetch_array($query);

  $query = mysqli_query($conn,"select `teacher`.`tName` AS `tName`,min(`subject`.`cId`) AS `Min(``subject``.cId)`,max(`subject`.`cSection`) AS `Max(``subject``.cSection)`,`subject`.`cNumber` AS `cNumber`,`subject`.`cName` AS `cName`,`subject`.`cYear` AS `cYear`,`subject`.`cTerm` AS `cTerm`,`subject`.`cPassword` AS `cPassword`,`subject`.`cStatus` AS `cStatus` from ((`subject` join `subject_has_teacher` on((`subject_has_teacher`.`subject_cId` = `subject`.`cId`))) join `teacher` on((`subject_has_teacher`.`teacher_tId` = `teacher`.`tId`))) where (`subject`.`cNumber` = '$subject_id') group by `teacher`.`tName`");
  $objResult = mysqli_fetch_array($query);
  $cId = $objResult['Min(`subject`.cId)'];
  $section = $objResult['Max(`subject`.cSection)'];
  for($i=$cId;$i<($cId+$section);$i++){
  $sql = "DELETE FROM subject_has_teacher WHERE subject_cId = $i";
  $delete_relation = mysqli_query($conn,$sql);
  }
  for($i=$cId;$i<($cId+$section);$i++){
  $sql = "DELETE FROM subject WHERE cId = $i";
  $delete_subject = mysqli_query($conn,$sql);
  }
  if($delete_relation&&$delete_subject){
    echo "<script>alert('ลบเรียบร้อย!'); location.href='teacherShowClass.php';</script>";
  }else{
    die('Could not enter data: ' . mysqli_error($conn));
  }

?>
