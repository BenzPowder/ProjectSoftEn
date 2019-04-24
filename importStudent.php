<?php
include('config.php');
$subject_id = $_POST['id'];
$section = $_POST['section'];
$year = $_POST['year'];
$output = '';
if(isset($_POST["import"]))
{
 $file_name = explode(".", $_FILES["excel"]["name"]) ;

 $extension = end($file_name); // For getting Extension of selected file
 $allowed_extension = array("xls", "xlsx", "csv"); //allowed extension
 if(in_array($extension, $allowed_extension)) //check selected file extension is present in allowed extension array
 {
  $file = $_FILES["excel"]["tmp_name"]; // getting temporary source of excel file
  include("Classes/PHPExcel/IOFactory.php"); // Add PHPExcel Library in this code
  // include("PHPExcel/Autoloader.php");
            $openFile = fopen($file, 'r');

            $cId=0;
            while($dataFile=fgetcsv($openFile,3000,",")) {
                $cId++;

                $stuId=$dataFile[0];
                $stuName=$dataFile[1];
                $check_string = strcmp($stuId,"stuId");
                if($check_string!=1){
                $sql_check_student = "select `student`.`stuId` AS `stuId`,`student`.`stuName` AS `stuName`,`subject`.`cNumber` AS `cNumber`,`subject`.`cName` AS `cName`,`subject`.`cYear` AS `cYear`,`subject`.`cTerm` AS `cTerm`,`subject`.`cSection` AS `cSection` from ((`subject` join `subject_has_student` on(((`subject_has_student`.`subject_cId` = `subject`.`cId`) and (`subject_has_student`.`subject_cSection` = `subject`.`cSection`)))) join `student` on((`subject_has_student`.`student_stuId` = `student`.`stuId`))) where ((`student`.`stuId` = '$stuId') and (`subject`.`cNumber` = '$subject_id') and (`subject`.`cYear` = '$year'))";
                echo $sql_check_student."<br>";
                $query_check_student = mysqli_query($conn,$sql_check_student);
                $result_check_student = mysqli_fetch_array($query_check_student);
                  if($result_check_student!=null){
                    echo "<script>alert('มีรายชื่อนักศึกษาในรายวิชาแล้ว!'); location.href='teacherShowSectionDetail.php?id=$subject_id&section=$section&year=$year';</script>";
                  }
                  else{
                      $query = mysqli_query($conn,"select `subject`.`cId` AS `cId` from `subject` where ((`subject`.`cNumber` = '$subject_id') and (`subject`.`cSection` = '$section'))");
                      $result_cid = mysqli_fetch_array($query);
                      $cId = $result_cid['cId'];
                      $updateSectionHasStudent = "INSERT INTO subject_has_student VALUES ('$cId','$section','$stuId')";
                      // echo $updateSectionHasStudent."<br>";
                      $resultUpdate = mysqli_query($conn,$updateSectionHasStudent);
                      if($resultUpdate){
                         echo "<script>alert('บันทึกเรียบร้อย!'); location.href='teacherShowSectionDetail.php?id=$subject_id&section=$section&year=$year';</script>";
                      } else {
                        echo "<script>alert('บันทึกไม่สำเร็จ'); location.href='teacherShowSectionDetail.php?id=$subject_id&section=$section&year=$year';</script>";
                      }
                  }
                }
      }
            }
          }

      ?>
