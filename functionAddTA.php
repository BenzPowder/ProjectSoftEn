<?php
  include('config.php');
  if(isset($_POST['submit'])){
      $cNumber = mysqli_real_escape_string($conn,$_POST['id']);
      $cYear = mysqli_real_escape_string($conn,$_POST['year']);
      $cSection = mysqli_real_escape_string($conn,$_POST['section']);
      $TAName = mysqli_real_escape_string($conn,$_POST['TAName']);
      $TANumber = mysqli_real_escape_string($conn,$_POST['TANumber']);

      $sql_search_ta = "SELECT * FROM ta WHERE taId = '$TANumber'";
      echo $sql_search_ta;
      $query_search_ta = mysqli_query($conn,$sql_search_ta);
      $numrow = mysqli_fetch_array($query_search_ta);
      var_dump($numrow);
      if($numrow==null){
        $insert_ta = "INSERT INTO ta VALUES('$TANumber','$TAName')";
        $execute_insert_ta = mysqli_query($conn,$insert_ta);
        // echo "ไม่มี ta ในระบบ";
      }
      $query = mysqli_query($conn,"select(`subject`.`cId`) AS `cId` from `subject` where ((`subject`.`cNumber` = '$cNumber') and (`subject`.`cSection` = '$cSection') and (`subject`.`cYear` = '$cYear'))");

      $result_cid = mysqli_fetch_array($query);
      $cId = $result_cid['cId'];


          $insert_subject_has_ta = "INSERT INTO subject_has_ta (`subject_cId`,`ta_taId`) VALUES ('$cId','$TANumber')";
          $insert_relation = mysqli_query($conn,$insert_subject_has_ta);
          if($insert_relation){
            echo "<script>alert('บันทึกเรียบร้อย!'); location.href='teacherShowSectionDetail.php?id=$cNumber&section=$cSection&year=$cYear';</script>";
          }else{
            echo "<script>alert('ไม่มีชื่อ TA ในระบบ'); location.href='teacherShowSectionDetail.php?id=$cNumber&section=$cSection&year=$cYear';</script>";
          }
      }
?>
