<?php

	include('config.php');
	
	if(isset($_POST['upload'])) {
		$fileName = $_FILES['file']['name'];
		$fileType = $_FILES['file']['type'];
		$fileSize = $_FILES['file']['size'];
		$fileTemp = $_FILES['file']['tmp_name'];
		if(is_uploaded_file($fileTemp)) {
			if( $fileSize < 2097152 ) {
				if( $fileType == 'application/vnd.ms-excel') {
					if(move_uploaded_file($fileTemp, "$fileName")) {
						echo "File upload.";
					} 
				}
			}
		} 
	}

?>