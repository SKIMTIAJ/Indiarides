<?php
include('config.php');

/*session_start();
$conn = mysqli_connect("localhost", "root", "", "indiarides");

if (!$conn) {
	 die("Connection failed: " . mysqli_connect_error());
	}else{
		echo "successfull";
	}

	if (mysqli_connect_errno()) {
	  printf("Connect failed: %s\n", mysqli_connect_error());
	  exit();
	}*/

?>
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
/*if ($_SERVER["REQUEST_METHOD"] == "POST") {
		if (!empty($_POST["email"])) {
			# code...
		}
		if (!empty($_POST["password"])) {
			# code...
		}
	}*/
	$Name = $Email = $PhoneNo = $Password = $ConfirmPass = $Err = "";
	if (isset($_POST['submit'])) {
		$Name = testinput($_POST["name"]);
		$Email = testinput($_POST["email"]);
		$PhoneNo =testinput($_POST["phone"]);
		$Password =testinput($_POST["password"]);

		//print_r($_POST);
		$ConfirmPass = testinput($_POST["confirmPassword"]);

		if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
			$Err = "Invalid Email Address";
		}elseif ($Password != $ConfirmPass) {
			$Err = "Password is not Matching";
		}else{
			$select = mysqli_query($conn, "SELECT email FROM user WHERE email = '$Email'") or exit(mysqli_error($conn));
			if(mysqli_num_rows($select)) {
			    $Err = "This email is already being used";
			}else{
				putToTheServer($Name,$Email,$PhoneNo,md5($Password),$conn);
			}
			
 		/*if ($conn) {
	 			if(mysqli_query($conn, $sql)){
	 			echo"inserted successfully";
		 		}else{
		 			echo "some thing wrong";
		 		}
 			}else{
 				echo "nothing";
 			}*/
		}
	}

	function testinput($data){
	 	$data = trim($data);
	 	$data = stripslashes($data);
	    $data = htmlspecialchars($data);
	    return $data;
 	}

 	function putToTheServer($Name,$Email,$PhoneNo,$Password,$conn){

 		$splitedName = split_name($Name);
 		$dateTime = strtotime("now");
 		$UserId = $splitedName["first_name"].$dateTime;
 		//echo($UserId);
 		$sql = "insert into user(name,email,phoneNo,password,userId) values ('$Name','$Email','$PhoneNo','$Password','$UserId')";
 		/*echo "<pre>Debug: $sql</pre>";*/
		$result = mysqli_query($conn, $sql);
		if ( false===$result ) {
		 /* printf("error: %s\n", mysqli_error($conn));*/
			echo "Something Wrong";
		}
		else {
		  /*echo 'done.';*/
			?>
			<script type="text/javascript">
				window.location = "login.php"
			</script>
			<?php
		}
 	}

 	function split_name($name) {
	    $parts = array();

	    while ( strlen( trim($name)) > 0 ) {
	        $name = trim($name);
	        $string = preg_replace('#.*\s([\w-]*)$#', '$1', $name);
	        $parts[] = $string;
	        $name = trim( preg_replace('#'.preg_quote($string,'#').'#', '', $name ) );
	    }

	    if (empty($parts)) {
	        return false;
	    }

	    $parts = array_reverse($parts);
	    $name = array();
	    $name['first_name'] = $parts[0];
	    $name['middle_name'] = (isset($parts[2])) ? $parts[1] : '';
	    $name['last_name'] = (isset($parts[2])) ? $parts[2] : ( isset($parts[1]) ? $parts[1] : '');
	    
	    return $name;
	}

	?>
<section>
	<div class="center-div_signup">
		<a href="index.php" style="text-decoration: none;"><img class="Logo-at-login" src="image/logo_updated.png" alt=""></a>
	    <h3>Sign Up</h3>
	    <div class="form-wrapper-div_signup">
	    	<h4> Be With Your Self </h4>
	    	<span class="Err"><?php echo $Err; ?></span>
	    	<form class="form_signup" method="post" action="<?php htmlspecialchars($_SERVER["PHP_SELF"])?>">
	    		<div>
	    			<lebel>Your Name</lebel><br>
	    			<input type="text" name="name" placeholder="Name" >
	    		</div>

	    		<div>
	    			<lebel>Phone No</lebel><br>
	    			<input type="tel" name="phone" placeholder="Phone No" maxlength="10" >
	    		</div>
	    		<div>
	    			<lebel>Enter Email</lebel><br>
	    			<input type="Email" name="email" placeholder="Email" >
	    		</div>

	    		<div>
	    			<lebel>Enter Password</lebel><br>
	    			<input type="Password" name="password" placeholder="Password" minlength="6" maxlength="10" >
	    		</div>
	    		<div>
	    			<lebel>Confirm Password</lebel><br>
	    			<input type="text" name="confirmPassword" placeholder="Password" minlength="6" maxlength="10">
	    		</div>
	    		<div>
	    			<input id="signup-submit" type="submit" name="submit" value="Sign Up">
	    		</div>
	    	</form>
	    </div>

	    <p> already have account? <Strong><a href="login.php">Login</a></Strong></p>

	</div>



</section>
</body>
</html>