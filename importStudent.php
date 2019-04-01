<?php
  include('config.php');
  $subject_id = $_GET['id'];
  $section = $_GET['section'];
  /** PHPExcel */

  require_once 'Classes/PHPExcel.php';


  /** PHPExcel_IOFactory - Reader */
  include 'Classes/PHPExcel/IOFactory.php';



  $inputFileName = "student.xlsx";

  $inputFileType = PHPExcel_IOFactory::identify($inputFileName);

  $objReader = PHPExcel_IOFactory::createReader($inputFileType);

  $objReader->setReadDataOnly(true);
  $objPHPExcel = $objReader->load($inputFileName);


  $objWorksheet = $objPHPExcel->setActiveSheetIndex(0);

  $highestRow = $objWorksheet->getHighestRow();

  $highestColumn = $objWorksheet->getHighestColumn();


  $headingsArray = $objWorksheet->rangeToArray('A1:'.$highestColumn.'1',null, true, true, true);

  $headingsArray = $headingsArray[1];


  $r = -1;

  $namedDataArray = array();

  for ($row = 2; $row <= $highestRow; ++$row)
  {

  	$dataRow = $objWorksheet->rangeToArray('A'.$row.':'.$highestColumn.$row,null, true, true, true);

  	if ((isset($dataRow[$row]['A'])) && ($dataRow[$row]['A'] > ''))
  	{

  		++$r;

  		foreach($headingsArray as $columnKey => $columnHeading)
  		{

  			$namedDataArray[$r][$columnHeading] = $dataRow[$row][$columnKey];

  		}

  	}

  }

  $i = 0;
  foreach ($namedDataArray as $result)
  	{
      $arrayName = array($namedDataArray);
  	}
    foreach ($arrayName as $data) {
      for($j=0;$j<sizeof($data);$j++){

        $query = mysqli_query($conn,"select `subject`.`cId` AS `cId` from `subject` where ((`subject`.`cNumber` = '$subject_id') and (`subject`.`cSection` = '$section'))");
        while($objResult = mysqli_fetch_array($query)){
          $array =  (array) $objResult['cId'];
        }
        $stuId = $data[$j]['stuId'];
        $updateSectionHasStudent = "INSERT INTO subject_has_student VALUES ('$array[0]','$section','$stuId')";

        $resultUpdate = mysqli_query($conn,$updateSectionHasStudent);

        if($resultUpdate){
          echo "<script>alert('บันทึกเรียบร้อย!'); location.href='teacherViewlistStudent.php?id=$subject_id&section=$section';</script>";
        }else{
          die('Could not enter data: ' . mysqli_error($conn));
        }
      }
    }
?>
