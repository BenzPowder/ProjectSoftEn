<?php
  include('config.php');
  $tid = $_GET['tid'];
  $subject_id = $_GET['id'];

  $sql = "select `teacher`.`tName` AS `tName`,`subject`.`cNumber` AS `cNumber`,`subject`.`cName` AS `cName`,`subject`.`cYear` AS `cYear`,`subject`.`cTerm` AS `cTerm`,`subject`.`cId` AS `cId`,`subject`.`cSection` AS `cSection`,`subject`.`cPassword` AS `cPassword`,`subject`.`cStatus` AS `cStatus`,`teacher`.`position` AS `position` from ((`subject` join `subject_has_teacher` on((`subject_has_teacher`.`subject_cId` = `subject`.`cId`))) join `teacher` on((`subject_has_teacher`.`teacher_tId` = `teacher`.`tId`))) where ((`teacher`.`tId` = '$tid') and (`subject`.`cNumber` = '$subject_id'))";

  $query = mysqli_query($conn, $sql);
  $result = mysqli_fetch_array($query);
  var_dump($result);

?>
