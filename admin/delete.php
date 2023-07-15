<?php
include("../db/config.php");

if ($_GET["action"]=="userList") {
	$query = "DELETE FROM user WHERE id = '".$_GET['id']."'";
	$sql = mysqli_query($conn,$query);
	if ($sql) {
		echo "<script>alert('row deleted successfully');
		window.location = 'userlist.php'</script>";
	}
}
?>