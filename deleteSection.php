<?php
  include('config.php');
  $subject_id = $_GET['id'];
  $section = $_GET['section'];
  $year = $_GET['year'];

  $sql_find_cid = "select max(`subject`.`cId`) AS `cId` from `subject` where ((`subject`.`cNumber` = '$subject_id') and (`subject`.`cSection` = '$section') and (`subject`.`cYear` = '$year'))";
  $query_find_cid = mysqli_query($conn,$sql_find_cid);
  $result = mysqli_fetch_array($query_find_cid);
  $cid = $result['cId'];

  $sql_delete_relation = "DELETE FROM subject_has_teacher WHERE subject_cId = '$cid'";
  $delete_section_relation = mysqli_query($conn,$sql_delete_relation);

  $sql_delete = "DELETE FROM subject WHERE cNumber = '$subject_id' AND cYear = '$year' AND cSection = '$section'";
  $delete_section = mysqli_query($conn,$sql_delete);
  if($delete_section_relation&$delete_section){
    echo "<script>alert('ลบเซคชันเรียบร้อย!'); location.href='index.php';</script>";
  }else{
    // die("<script>alert('ไม่สามารถลบเซคชันได้'); location.href='index.php';</script>" . mysqli_error($conn));

    die("ลบไม่ได้ " . mysqli_error($conn));
  }

?>
