
<?php
	include("../db/config.php")
?>
<html>
<head>
	<title>indiarides</title>
	<link rel="icon" href="image/car-icon.png">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="HandheldFriendly" content="true">
	<link rel="stylesheet" type="text/css" href="admincss/indexmain.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://kit.fontawesome.com/342e854313.js"></script>
</head>
<body>

	<?php
		if(empty($_SESSION['isLoginAdmin'])){
			echo "<script> window.location = 'index.php'</script>";
			session_destroy();
		}
	?>

	<header>
		<nav>
			<h5><?php echo $_SESSION['adminName']?></h5>
			<div class="navImageDiv">
				<img src="">
				<p><?php echo $_SESSION['adinEmailAddress']?></p>
			</div>
		</nav>
		