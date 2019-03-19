<?php

      $server    ="localhost";
	  $user      ="root";
	  $pass		   ="root";
	  $db_name   ="projectsoften";

	  $conn     = new mysqli(
				   $server,
				   $user,
				   $pass,
				   $db_name
	  );
  if($conn->connect_errno){
    printf("ไม่สามารถเชื่อมต่อฐานข้อมูลได้  : ", $conn->connect_errr);
	exit();
  }
  mysqli_set_charset( $conn, 'utf8');
  function alert($msg) {
    echo "<script type='text/javascript'>alert('$msg');</script>";
}
