<?php
  include('config.php');

  if(isset($_POST['submit'])){
      $subject_id =  mysqli_real_escape_string($conn,$_POST['id']);
      $oldSection =  mysqli_real_escape_string($conn,$_POST['oldSection']);
      $cSection = mysqli_real_escape_string($conn,$_POST['cSection']);
      $stuId = mysqli_real_escape_string($conn,$_POST['stuId']);
      $stuName = mysqli_real_escape_string($conn,$_POST['stuName']);
      $year = mysqli_real_escape_string($conn,$_POST['year']);
      date_default_timezone_set("Asia/Bangkok");
      $move_date = date("Y/m/d h:i:s");

      $sql_new_cid = "select `subject`.`cId` AS `cId` from `subject` where ((`subject`.`cNumber` = '$subject_id') and (`subject`.`cSection` = '$cSection') and (`subject`.`cYear` = '$year'))";
      $query_new_cid = mysqli_query($conn,$sql_new_cid);
      $result_new_cid = mysqli_fetch_array($query_new_cid);
      $new_cId = $result_new_cid['cId'];

      $sql_old_cid = "select `subject`.`cId` AS `cId` from `subject` where ((`subject`.`cNumber` = '$subject_id') and (`subject`.`cSection` = '$oldSection') and (`subject`.`cYear` = '$year'))";
      $query_old_cid = mysqli_query($conn,$sql_old_cid);
      $result_old_cid = mysqli_fetch_array($query_old_cid);
      $old_cId = $result_old_cid['cId'];

      $sql_update = "UPDATE subject_has_student SET subject_cId = '$new_cId' , subject_cSection = '$cSection' WHERE subject_cId = '$old_cId' AND student_stuId = '$stuId'";
      $sql_search = "select `subject`.`cId` AS `cId` from `subject` where ((`subject`.`cNumber` = '$subject_id') and (`subject`.`cSection` = '$cSection') and (`subject`.`cYear` = '$year'))";
      $query_cid = mysqli_query($conn,$sql_search);
      $cId = mysqli_fetch_array($query_cid);
      $class_id = $cId['cId'];
      $sql_move = "INSERT INTO move VALUES(NULL,'$stuId','$oldSection','$move_date','$class_id','$cSection')";
    
      $execute_move = mysqli_query($conn,$sql_move);
      // echo $sql_move.'<br>'; 
      // var_dump($sql_move).'<br>';
      // echo $execute_move.'<br>';
      // var_dump($execute_move).'<br>';
      
      $execute = mysqli_query($conn,$sql_update);
      if($execute&&$execute_move){
        //if($execute){
        echo "<script>alert('อัพเดทเรียบร้อย!'); location.href='teacherShowSectionDetail.php?id=$subject_id&section=$cSection&year=$year';</script>";
      }else{
        if($execute){
          die('excute error: ' . mysqli_error($conn));
        }else{
        die('excute error move error: ' . mysqli_error($conn));}
      }
}
?>