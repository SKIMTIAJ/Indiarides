<?php include("config.php")?>
<html>
<head>
	<title>Indiarides.in</title>
	<link rel="icon" href="image/car-icon.png">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="HandheldFriendly" content="true">
	<link rel="stylesheet" type="text/css" href="Css/signup.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://kit.fontawesome.com/342e854313.js"></script>



	<style type="text/css">
		.Err{
			color:red;
			font-weight:bold;
		}
	</style>

</head>
<body>
	<?php
	$Err = $Success = "";
	if (isset($_POST['submit'])) {
		$Email = testinput($_POST['email']);
		$Password = md5(testinput($_POST['password']));

		if (!filter_var($Email, FILTER_VALIDATE_EMAIL)){
			$Err = "This email is already being used";
		}else{
			$query = "SELECT * FROM user WHERE email = '$Email' AND password = '$Password'";
			$sql = mysqli_query($conn, $query);

			if (mysqli_num_rows($sql)>0) {
				$row = mysqli_fetch_assoc($sql);
				$_SESSION["isLogin"] = "true";
				$_SESSION['UserId'] = $row['userId'];
				$_SESSION['Name'] = $row['name'];
				$_SESSION['EmailAddress'] = $row['email'];
				$_SESSION['PhoneNo'] = $row['phoneNo'];
				//$Err = $_SESSION['UserId'].$_SESSION['Name'].$_SESSION['EmailAddress'].$_SESSION['PhoneNo'];
				echo "<script> window.location = 'index.php'</script>";

			}else{
				$Err = "Invalid UserName Or Password";
			}


		}
	}

		function testinput($data){
		 	$data = trim($data);
		 	$data = stripslashes($data);
		    $data = htmlspecialchars($data);
		    return $data;
	 	}

	?>
<section>
	<div class="center-div_login" >
		<a href="index.php" style="index.php"><img class="Logo-at-login" src="image/logo_updated.png" alt=""></a>
	    <h3>Login</h3>
	    <div class="form-wrapper-div_login">
	    	<h4> Be With Your Self </h4>
	    	<span class="Err"><?php echo $Err; ?></span>
	    	<form class="form_login" method="post" action="<?php htmlspecialchars($_SERVER["PHP_SELF"])?>">
	    		<div>
	    			<lebel>Enter Email</lebel><br>
	    			<input type="Email" name="email" placeholder="Email" >
	    		</div>

	    		<div>
	    			<lebel>Enter Password</lebel><br>
	    			<input type="Password" name="password" placeholder="Password" >
	    		</div>
	    		<div>
	    			<input id="signup-submit" type="submit" name="submit" value="Login">
	    		</div>
	    	</form>
	    </div>

	    <p> Have not registered yet? <Strong><a href="signup.php">SignUp</a></Strong></p>
	    <p style="cursor: pointer;" ><a href="forgotpassword.php">Forgot Password</a></p>

	</div>



</section>
</body>
</html>