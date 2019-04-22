<?php
  include('config.php');
  $subject_id = $_GET['id'];
  $section = $_GET['section'];
  $taId = $_GET['taId'];

  $query = mysqli_query($conn,"select `subject`.`cId` AS `cId` from `subject` where (`subject`.`cNumber` = '$subject_id')");
  // $query = mysqli_query($conn,"select `subject`.`cId` AS `cId` from `subject` where ((`subject`.`cNumber` = '$cNumber') and (`subject`.`cSection` = '$cSection'))");
  // $result = mysqli_fetch_array($query);
  $resultmax = mysqli_fetch_array($query);
  $cid = $resultmax['cId']+$section-1;
  $sql = "DELETE FROM subject_has_ta WHERE subject_cId = '$cid' AND ta_taId = '$taId'";
  // echo $sql;

  $execute = mysqli_query($conn,$sql);
  if($execute){
    echo "<script>alert('ลบเรียบร้อย!'); location.href='index.php';</script>";
  }else{
    die('Could not enter data: ' . mysqli_error($conn));
  }
?>
