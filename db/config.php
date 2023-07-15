<?php 
session_start();
$conn = mysqli_connect("localhost", "root", "", "indiarides");

if (!$conn) {
	 die("Connection failed: " . mysqli_connect_error());
	}else{
		/*echo "successfull";*/
	}

	if (mysqli_connect_errno()) {
	  printf("Connect failed: %s\n", mysqli_connect_error());
	  exit();
	}
?>