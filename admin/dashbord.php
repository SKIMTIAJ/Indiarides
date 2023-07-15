
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
		<section>
			<aside class="leftAside">
				<ul>
					<li><a href="dashbord.php">Dashboard</a></li>
					<li><a href="userlist.php">UserList</a></li>
					<li><a href="onewaylist.php">OneWay List</a></li>
					<li><a href="roundtrip.php">roundTrip List</a></li>
					<li><a href="dayrental.php">dayRental List</a></li>
					<li><a href="payment.php">Payment Status</a></li>
					<?php
						if (isset($_SESSION["isLoginAdmin"])) {
							echo "<li><a href='index.php?logout=true'>Logout</a></li>";
						}else{
							echo "<li><a href='login.php'>Login</a></li>";
						}
					?>
				</ul>
			</aside>
			<aside class="rightAside">
				<div class="row1 contain-fluid">
					<div class="dashbordDiv">
						<img src="img/userList.png">
						<h5><a href="userlist.php">UserList</a></h5>
					</div>
					<div class="dashbordDiv">
						<img src="img/status.png">
						<h5><a href="payment.php">Payment Status</a></h5>
					</div>
					<div class="dashbordDiv">
						<img src="img/adminList.png">
						<h5><a href="adminlist.php">Admin List</a></h5>
					</div>
				</div>
				<div class="row1 contain-fluid">
					<div class="dashbordDiv">
						<img src="img/oneway.png">
						<h5><a href="onewaylist.php">OneWayList</a></h5>
					</div>
					<div class="dashbordDiv">
						<img src="img/roundtrip.png">
						<h5><a href="roundtrip.php">RoundTrip List</a></h5>
					</div>
					<div class="dashbordDiv">
						<img src="img/dyrental.png">
						<h5><a href="dayrental.php">DayRenta List</a></h5>
					</div>
				</div>
			</aside>
		</section>
	</header>
</body>

<script type="text/javascript" src="javascript/main.js"></script>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</html>