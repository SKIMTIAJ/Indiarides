<?php include('db/config.php');
	if (isset($_GET["logout"])) {
		session_destroy();
		echo "<script>window.location = 'login.php' </script>";
	}
?>
<html>
<head>
	<title>Indiarides.in</title>
	<link rel="icon" href="image/car-icon.png">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="HandheldFriendly" content="true">
	<link rel="stylesheet" type="text/css" href="Css/main.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://kit.fontawesome.com/342e854313.js"></script>
</head>

<body class="wrapper">

<header style="background-color: white">
 <div class="row-d header-first-child clearfix sticky">
	<a href="index.php">
		<img class="Logo-Img" src="image/logo_updated.png" alt="">
	</a>
	<ul class="animated bounceInDown" id="main-nav">
		<li><a href="index.php">Home</a></li>
		<li><a href="#">Contact</a></li>
		<li><a href="#">About Us</a></li>
		<li><a href="#">Services</a></li>
		<?php
			if (isset($_SESSION["isLogin"])) {
				echo "<li><a href='index.php?logout=true'>Logout</a></li>";
			}else{
				echo "<li><a href='login.php'>Login</a></li>";
			}
		?>
		<span class="menu-icon" style="font-size:30px;cursor:pointer; color: white" onclick="openNav()">&#9776</span>
	</ul>
 </div>
	<div id="mySidenav" class="sidenav" >
	  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
	  <a href="#">Home</a>
	  <a href="#">Contact</a>
	  <a href="#">About Us</a>
	  <a href="#">Services</a>
	  <?php
		if (isset($_SESSION["isLogin"])) {
			echo "<a href='index.php?logout=true'>Logout</a>";
		}else{
			echo "<a href='login.php'>Login</a>";
		}
		?>
	</div>

<!-- <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; open</span> -->
<script>
function openNav() {
  document.getElementById("mySidenav").style.width = "65%";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
}
</script>
