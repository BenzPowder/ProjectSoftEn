<?php

      if(isset($_POST['upload'])) {
        if(!empty($_FILES['file']['name'])){
          $fileName = explode('.', $_FILES['file']['name']);
          if($fileName[1]=="csv") {
            echo "Processing";
            include('config.php');

            $file = $_FILES['file']['tmp_name'];
            $openFile = fopen($file, 'r');

            $cId=0;
            while($dataFile=fgetcsv($openFile,3000,",")) {
                $cId++;

                $stuId=$dataFile[0];
                $stuName=$dataFile[1];
                echo $stuId ."-". $stuName . "<br>";
            }
          } else {
            echo "Choose a csv ";
          }
        } else {
          echo "Choose a file";
        }
      }
      ?>