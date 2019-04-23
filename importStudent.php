<?php
include('config.php');
$subject_id = $_POST['id'];
$section = $_POST['section'];
$year = $_POST['year'];
$connect = mysqli_connect("localhost", "root", "root", "projectsoften");
$connect->query("SET NAMES utf8");
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
   $file = $_FILES['excel']['tmp_name'];
            $openFile = fopen($file, 'r');

            $cId=0;
            while($dataFile=fgetcsv($openFile,3000,",")) {
                $cId++;

                $stuId=$dataFile[0];
                $stuName=$dataFile[1];
                 // echo $stuId ."-". $stuName . "<br>";
        $query = mysqli_query($conn,"select `subject`.`cId` AS `cId` from `subject` where ((`subject`.`cNumber` = '$subject_id') and (`subject`.`cSection` = '$section'))");
        $result_cid = mysqli_fetch_array($query);
        $cId = $result_cid['cId'];
        $updateSectionHasStudent = "INSERT INTO subject_has_student VALUES ('$cId','$section','$stuId')";
        // echo $updateSectionHasStudent."<br>";
        $resultUpdate = mysqli_query($conn,$updateSectionHasStudent);
        echo $resultUpdate;
        if($resultUpdate){
           echo "<script>alert('บันทึกเรียบร้อย!'); location.href='teacherShowSectionDetail.php?id=$subject_id&section=$section&year=$year';</script>";
        } else {
          die("<script>alert('ไม่สามารถนำเข้าข้อมูลได้'); location.href='teacherShowSectionDetail.php?id=$subject_id&section=$section';</script>" . mysqli_error($conn));
        }
      }
            }
          }

      ?>