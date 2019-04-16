<?php
include "config.php";
$subject_id = $_GET['id'];
$tid = $_GET['tid'];
$sql = "select `subject`.`cId` AS `cId`,`subject`.`cNumber` AS `cNumber`,`subject`.`cName` AS `cName`,`subject`.`cYear` AS `cYear`,`subject`.`cTerm` AS `cTerm`,max(`subject`.`cSection`) AS `cSection`,`subject`.`cPassword` AS `cPassword`,`subject`.`cStatus` AS `cStatus` from `subject` where (`subject`.`cNumber` = '$subject_id') group by `subject`.`cNumber`";
$query = mysqli_query($conn,$sql);
$result = mysqli_fetch_array($query);
$cNumber = $result['cNumber'];
$cName = $result['cName'];
$cYear = $result['cYear'];
$cTerm = $result['cTerm'];
$cSection = $result['cSection'];
$cSection = (int)$cSection+1;
$cPassword = $result['cPassword'];
$cStatus = $result['cStatus'];
$insert = "INSERT INTO subject VALUES (NULL,'$cNumber','$cName','$cYear','$cTerm','$cSection','$cPassword','$cStatus')";
$last_id = mysqli_query($conn,"select max(`subject`.`cId`) AS `cId` from `subject` where (`subject`.`cNumber` = '$subject_id')");
$fetch_array = mysqli_fetch_array($last_id);
$max_id = $fetch_array['cId'];
$max_id = (int)$max_id+1;
$insert_subject_has_teacher = "INSERT INTO subject_has_teacher VALUES('$max_id','$tid')";
echo $insert_subject_has_teacher."<br>";
// $insert_query = mysqli_query($conn,$insert);
// $insert_subject_has_teacher_query = mysqli_query($conn,$insert_subject_has_teacher);
// if($insert_query&&$insert_subject_has_teacher_query){
//   echo "<script>alert('เพิ่มเซคชันเรียบร้อย!'); location.href='index.php';</script>";
// }else{
//   die('Could not enter data: ' . mysqli_error($conn));
// }
?>
