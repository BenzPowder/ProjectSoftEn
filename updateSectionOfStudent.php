<?php
  include('config.php');

  if(isset($_POST['submit'])){
      $stuId = mysqli_real_escape_string($conn,$_POST['stuId']);
      $stuName = mysqli_real_escape_string($conn,$_POST['stuName']);
      $cSection = mysqli_real_escape_string($conn,$_POST['cSection']);
      $result_maxid = mysqli_real_escape_string($conn,$_POST['result_maxid']);
      $result_maxid = $result_maxid+$cSection-1;

      $sql = "DELETE FROM subject_has_student WHERE subject_cId=$result_maxid AND subject_cSection=$cSection AND student_stuId = $stuId";
      $delete = mysqli_query($conn,$sql);

      $insert = "INSERT INTO subject_has_student VALUES ('$result_maxid','$cSection','$stuId')";
      $query = mysqli_query($conn,$insert);

      if($update){
        echo "<script>alert('อัพเดทเรียบร้อย!'); location.href='index.php';</script>";
      }else{
        die('Could not enter data: ' . mysqli_error($conn));
      }
}
?>
