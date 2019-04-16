<?php
  include('config.php');
  if(isset($_POST['submit'])){
      $cNumber = mysqli_real_escape_string($conn,$_POST['id']);
      $cYear = mysqli_real_escape_string($conn,$_POST['year']);
      $cSection = mysqli_real_escape_string($conn,$_POST['section']);
      $sName = mysqli_real_escape_string($conn,$_POST['sName']);
      $Student_id = mysqli_real_escape_string($conn,$_POST['sNumber']);

      $query = mysqli_query($conn,"select max(`subject`.`cId`) AS `cId` from `subject` where ((`subject`.`cNumber` = '$cNumber') and (`subject`.`cSection` = '$cSection') and (`subject`.`cYear` = '$cYear'))");
      $result_cid = mysqli_fetch_array($query);
      $cId = $result_cid['cId'];

      $sql_check_student = "select `subject`.`cNumber` AS `cNumber`,`subject`.`cName` AS `cName`,`subject`.`cYear` AS `cYear`,`subject`.`cTerm` AS `cTerm`,`subject`.`cSection` AS `cSection`,`student`.`stuId` AS `stuId`,`student`.`stuName` AS `stuName` from ((`student` join `subject_has_student` on((`student`.`stuId` = `subject_has_student`.`student_stuId`))) join `subject` on(((`subject_has_student`.`subject_cId` = `subject`.`cId`) and (`subject_has_student`.`subject_cSection` = `subject`.`cSection`)))) where ((`student`.`stuId` = '$Student_id') and (`subject`.`cNumber` = '$cNumber'))";
      $query_check_student = mysqli_query($conn,$sql_check_student);
      $row_cnt = $query_check_student->num_rows;
      if($row_cnt==null){
          $insert_subject_has_student = "INSERT INTO subject_has_student (`subject_cId`,`subject_cSection`,`student_stuId`) VALUES ('$cId','$cSection','$Student_id')";
          $insert_relation = mysqli_query($conn,$insert_subject_has_student);
          if($insert_relation){
            echo "<script>alert('บันทึกเรียบร้อย!'); location.href='teacherShowSectionDetail.php?id=$cNumber&section=$cSection&year=$cYear';</script>";
          }else{
            // die('ไม่มีนักศึกษาในระบบ: ' . mysqli_error($conn));
            echo "<script>alert('ไม่มีนักศึกษาในระบบ!'); location.href='teacherShowSectionDetail.php?id=$cNumber&section=$cSection&year=$cYear';</script>";
          }
      }else{
        echo "<script>alert('ไม่สามารถบันทึกได้ เนื่องจากมีนักศึกษาในระบบแล้ว'); location.href='teacherShowSectionDetail.php?id=$cNumber&section=$cSection&year=$cYear';</script>";
      }
    }


?>
