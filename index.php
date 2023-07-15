 
<?php session_start();
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

	<!-- <script async
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAKiP_t6qJ2mUtxjRUgw3P-3bwl6Pp3G9c&libraries=geometry&callback=initMap">
	</script> -->

	<!-- .............................place Api add below.................................. -->

	<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAKiP_t6qJ2mUtxjRUgw3P-3bwl6Pp3G9c&libraries=places"></script>

</head>

<body class="wrapper">

<header class="index-header" style="">
	<div class="row-d header-first-child clearfix sticky" style="background-color: transparent;">
		<a href="index.php">
			<img class="Logo-Img" src="image/logo_updated.png" alt="" >
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
  <a href="index.php">Home</a>
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

<?php 

	if (isset($_SESSION["source"])) {
		unset($_SESSION["source"]);
	}
	if (isset($_SESSION["destination"])) {
		unset($_SESSION["destination"]);
	}
	if (isset($_SESSION["returnUpTime"])) {
		unset($_SESSION["pickUpDate"]);
	}
	if (isset($_SESSION["returnUpTime"])) {
		unset($_SESSION["pickUpTime"]);
	}
	if (isset($_SESSION["returnUpTime"])){
		unset($_SESSION["returnUpDate"]);
	}
	if (isset($_SESSION["returnUpTime"])){ 
		unset($_SESSION["returnUpTime"]);
	}
	if (isset($_SESSION["passengerField"])){
		unset($_SESSION["passengerField"]);
	}
	if (isset($_SESSION["selectCar"])){
		unset($_SESSION["selectCar"]);
	}
	if (isset($_SESSION["isReturnField"])){
		unset($_SESSION["isReturnField"]);
	}
	if (isset($_SESSION["isOneWayField"])){
		unset($_SESSION["isOneWayField"]);
	}
	if (isset($_SESSION["car"])) {
		unset($_SESSION["car"]);
	}
	if (isset($_SESSION["hour"])) {
		unset($_SESSION["hour"]);
	}
	if (isset($_SESSION["km"] )) {
		unset($_SESSION["km"]);
	}
	if (isset($_SESSION['isDayRentalField'])) {
		unset($_SESSION['isDayRentalField']);
	}





if (isset($_GET["logout"])) {
	session_destroy();
	echo "<script>window.location = 'login.php' </script>";
}


 $source = $destination = $pickDate = $pickTime = $returnDate = $returnTime = $passenger = $selectedCar = null;

 if ($_SERVER["REQUEST_METHOD"] == "POST"){

 	if (!empty($_POST["from"])) {
 		unset($_SESSION["source"]);
 		$source = testinput($_POST["from"]);
 		$_SESSION["source"] = $source;
 	}else{
 		unset($_SESSION["source"]);
 	}

 	if (!empty($_POST["to"])) {
 		unset($_SESSION["destination"]);
 		$destination = testinput($_POST["to"]);
 		$_SESSION["destination"] = $destination;
 	}else{
 		unset($_SESSION["destination"]);
 	}


 	if (!empty($_POST["pickDate"])) {
 		unset($_SESSION["pickDate"]);
 		$pickDate = testinput($_POST["pickDate"]);
 		$_SESSION["pickDate"] = $pickDate;
 	}
 	else{
 		unset($_SESSION["pickDate"]);
 	}

 	if (!empty($_POST["pickTime"])) {
 		unset($_SESSION["pickTime"]);
 		$pickTime = testinput($_POST["pickTime"]);
 		$_SESSION["pickTime"] = $pickTime;
 	}else{
 		unset($_SESSION["pickTime"]);
 	}

 	if (!empty($_POST["returnDate"])) {
 		unset($_SESSION["returnDate"]);
 		$returnDate = testinput($_POST["returnDate"]);
 		$_SESSION["returnDate"] = $returnDate;
 	}
 	else{
 		unset($_SESSION["returnDate"]);
 	}

 	if (!empty($_POST["returnTime"])) {
 		unset($_SESSION["returnTime"]);
 		$returnTime = testinput($_POST["returnTime"]);
 		$_SESSION["returnTime"] = $returnTime;
 	}else{
 		unset($_SESSION["returnTime"]);
 	}

 	if (!empty($_POST["passenger"])) {
 		unset($_SESSION["passenger"]);
 		$passenger = testinput($_POST["passenger"]);
 		$_SESSION["passenger"] = $passenger;
 	}else{
 		//unset($_SESSION["passenger"]);
 	}

 	if (!empty($_POST["car"])) {
 		unset($_SESSION["selectedCar"]);
 		$selectedCar = testinput($_POST["car"]);
 		$_SESSION["selectedCar"] = $selectedCar;
 	}else{
 		//unset($_SESSION["selectedCar"]);
 	}

 	//isAllInputFilled();
 	//die("exit");
 	isSessionFilled();

 }

 function testinput($data){
 	$data = trim($data);
 	$data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
 }

function isSessionFilled(){
	if (isset($_SESSION["source"]) && isset($_SESSION["destination"]) && isset($_SESSION["pickDate"]) && isset($_SESSION["pickTime"])) {
		if (isset($_SESSION["returnDate"]) && isset($_SESSION["returnTime"])) {
			//die("yes return is seted");
			if (isset($_SESSION["passenger"]) && isset($_SESSION["selectedCar"])) {
				die("yes passenger is seted");
			}else{
				?>
					<script type="text/javascript">
						window.location.href = "#priceTab";
					</script>
				<?php
			}
		}else{
			if (isset($_SESSION["passenger"]) && isset($_SESSION["selectedCar"])) {
				# code...
			}else{
				die("yes its exucute");
				?>
					<script type="text/javascript">
						//window.location.href = "#priceTab";
					</script>
				<?php
			}
		}
	}elseif (isset($_SESSION["passenger"]) && isset($_SESSION["selectedCar"])) {
		/*unset($_SESSION["passenger"]);
		unset($_SESSION["selectedCar"]);*/
		?>
		<script type="text/javascript">
			alert("please Fill the Above Form First");
		</script>
		<?php
	}
}



function isAllInputFilled(){
	//die("yes its exucute");
	if (isset($GLOBALS['source']) && isset($GLOBALS['destination']) && isset($GLOBALS['pickDate']) && isset($GLOBALS['pickTime'])) {

		if (isset($GLOBALS["returnDate"]) && isset($GLOBALS["returnTime"])) {
			
			//die("entering to first if condition");
			if (isset($GLOBALS['passenger']) && isset($GLOBALS['selectedCar'])){
				//die("passenger is set yet");
			}else{
				?>
				<script type="text/javascript">
					window.location.href = "#priceTab";
				</script>
				<?php
			}
		}else{
			//die("round trip is not set");
			if (isset($GLOBALS['passenger']) && isset($GLOBALS['selectedCar'])){
				die("passenger is set yet");
			}else{
				?>
				<script type="text/javascript">
					window.location.href = "#priceTab";
				</script>
				<?php
			}
		}
	}else{
		die("please fill the form");
	}
}

?>

<section class="container_fluid row-d" style="">
	
	<div class="welComeDiv col-md-6" style="">
		<h2>Welcome to <span class="specialName"> Indiarides.in</span> </h2>

		<p>A good decision make your day beautiful.<br><br>
			<span class="welComeTextSpan" style="">We provide a beautiful ride with more sefty and smooth travel in a low price</span>

		</p>
		<!-- <p class="firstPara"><strong>Indiarides</strong> is one of the <span style="background-color: rgb(236,100,8);">largest</span> and leading online <strong> car rental </strong>service provider in <strong>India</strong>. We promise to serve you <strong>one way</strong> <strong>multicity</strong>, <strong>rental</strong> and <strong>airport</strong> transfer facilities all over <strong>India</strong>. we ensure to provide you best car hiring service all over <strong>India</strong> . for hiring a car for short or long journey, you are just few clicks of the Internet and your  car would be at your door - step.</p>

		<p class="secondPara"><strong>Indiarides</strong> offers you one way , multicity and rental facilities to complete your stress - free trip with a well experienced driver. We also  with ensure to provide you the best <strong> cheap car booking</strong> deals and best fare rates. And, you can also book a <strong>commercial car rental service</strong> for any business meetings whether for a <strong>city trip
		</strong>or <strong>airport transfer</strong> or nearby .</p>

		<p class="thirdPara"> We provide variety of car categories like<strong>SUV </strong>, <strong>Sedan</strong> ,<strong>Compact</strong> or <strong>Hatchback</strong> and <strong>Tempo Travellers</strong> for your <strong>outstation</strong> journey along with a well experienced cab driver .</p>

		<p class="forthPara">Thinking about ride!!!!!! Experience <strong style="color:#70ad47 ">India</strong><strong style="color:#ec6408">rides</strong>.</p> -->

		<div class="welcomeDivButton">
			<button id="myBtn" class="bookCarBtn"> Book </button>
			<button class="priceCarBtn" > Price </button>
		</div>
		
	</div>
	<div class="formParentDiv col-md-6 col-sm-12" style="">
		<div class="formChildDiv" id="allFormDiv" >
			<div class="form-wrapper-button"> 
				<p class="oneWayButton form-btn col-md-4">One Way</p> 
				<p class="roundTripButton form-btn col-md-4">Round Trip</p>
				<p class="dayRentalButton form-btn col-md-4">Day Rental</p>
			</div>
			<form class="oneWayForm" method="post" action="Ultimate.php">
				<div style="display: flex;" id="travelGroup">
					<div style="width: 50%; margin-right: 10px;" class="sourceGroup">
						<label>From</label>
						<input class="form-control formInput" id="sourceId"  placeholder="Source" type="text" name="from" value="" autocomplete="on" runat="server" required>
					</div>
					<div style="width: 50%; margin-left:10px;"  class="destinationGroup">
						<label>To</label>
						<input class="form-control formInput" id="destinationId" placeholder="Destination" type="text" name="to" value="" required>
					</div>
				</div>
				<div style="display: flex;" id="pickDateTimeGroup">
					<div style="width: 50%; margin-right: 10px;" class="pickDateGroup">
						<label>Pickup Date</label>
						<input class="form-control formInput onewayFormPickupDate" placeholder="Pickup Date" type="Date" name="pickDate" value="" required>
					</div>
					<div style="width: 50%; margin-left:10px;" class="pickTimeGroup">
						<label>Pickup Time</label>
						<input class="form-control formInput" type="Time" name="pickTime" value="00:00" required>
					</div>
				</div>
				<div style="display: flex;" id="passengerCarGroup">
					<div style="width: 50%; margin-right: 10px;" class="passengerGroup">
						<label>Passenger</label>
						<input class="form-control formInput" type="number" name="passenger" value="00:00" required>
					</div>
					<div style="width: 50%; margin-left:10px;">
						<label>Selecte Car</label>
						<select style="margin-top: -5px;" class="form-control form-select" name="car" value="">
							<option>Suv</option>
							<option>Sadan</option>
							<option>hatchBack</option>
						</select>
					</div>
				</div>
				<div class="formSubmitButtonGroup">
					<button class="bookButton" type="submit" name="oneWayBook_btn"> Book </button>
					<!-- <button class="priceButton"> Price </button> -->
				</div>
		</form>
		<form class="roundTripForm" method="post" action="Ultimate.php" style="display: none;">
			<div style="display: flex;" id="travelGroup">
					<div style="width: 50%; margin-right: 10px;" class="sourceGroup">
						<label>From</label>
						<input class="form-control formInput" id="sourceId"  placeholder="Source" type="text" name="from" value="" autocomplete="on" runat="server" required>
					</div>
					<div style="width: 50%; margin-left:10px;"  class="destinationGroup">
						<label>To</label>
						<input class="form-control formInput" id="destinationId" placeholder="Destination" type="text" name="to" value="" required>
					</div>
				</div>
				<div style="display: flex;" id="pickDateTimeGroup">
					<div style="width: 50%; margin-right: 10px;" class="pickDateGroup">
						<label>Pickup Date</label>
						<input class="form-control formInput returnFormPickupDate" placeholder="Pickup Date" type="Date" name="pickDate" value="" required>
					</div>
					<div style="width: 50%; margin-left:10px;" class="pickTimeGroup">
						<label>Pickup Time</label>
						<input class="form-control formInput" type="Time" name="pickTime" value="00:00" required>
					</div>
				</div>
				<div style="display: flex;" id="passengerCarGroup">
					<div style="width: 50%; margin-right: 10px;" class="passengerGroup">
						<label>Passenger</label>
						<input class="form-control formInput" type="number" name="passenger" value="00:00" required>
					</div>
					<div style="width: 50%; margin-left:10px;">
						<label>Selecte Car</label>
						<select style="margin-top: -5px;" class="form-control form-select" name="car" value="">
							<option>Suv</option>
							<option>Sadan</option>
							<option>hatchBack</option>
						</select>
					</div>
				</div>
				
				<div id="returnDateTimeGroup" class="timeWrapperGroup" style="display: flex;">
					<div style="width: 50%; margin-right: 10px; display: block;" class="returnDateGroup">
						<label>Return Date</label>
						<input class="form-control formInput returnFormreturnDate" placeholder="Return Date" type="Date" name="returnDate" value="">
					</div>
					<div style="width: 50%; margin-left:10px; display: block;" class="returnTimeGroup">
						<label>Return Time</label>
						<input class="form-control formInput" type="Time" name="returnTime" value="00:00">
					</div>
				</div>
				<div class="formSubmitButtonGroup">
					<button class="bookButton" type="submit" name="roundTripBook_btn"> Book </button>
					<!-- <button class="priceButton"> Price </button> -->
				</div>
		</form>
		<form class="dayRentalForm" method="post" action="Ultimate.php" style="display: none;">
				<div class="dayRentalGroup">
					<div style="width: 100%;display: block;" class="dayRentalTimeGroup">
						<label>Hour</label>
						<input class="form-control formInput" placeholder="hour" type="number" name="hour" value="00:00">
					</div>
					<div style="width: 100%;display: block;" class="dayRentalTimeGroup">
						<label>Km</label>
						<input class="form-control formInput" placeholder="Km" type="number" name="km" value="">
					</div>
					<div style="width: 100%;display: block;" class="dayRentalSelectCar">
						<label>Select Car</label>
						<select style="margin-top: -5px;" class="form-control form-select" name="car" value="">
							<option>Suv</option>
							<option selected >Sadan</option>
							<option>hatchBack</option>
						</select>
					</div>
				</div>
				<div class="formSubmitButtonGroup">
					<button class="bookButton" type="submit" name="dayRentalBook_btn"> Book </button>
					<!-- <button class="priceButton" > Price </button> -->
				</div>
		</form>
		<!-- <p class="priceTag" style="position: absolute;">Price:</p> -->
		</div>
	</div>

	<div id="myModal" class="model">
		<div class="model-content">
			<span class="close">&times;</span>
			<div class="formChildDiv1">
			<div class="form-wrapper-button"> 
				<p class="oneWayButton form-btn col-md-6">One Way</p> 
				<p class="roundTripButton form-btn col-md-6">Round Trip</p>
				<p class="dayRentalButton form-btn col-md-4">Day Rental</p>
			</div>
			<form class="mOneWayForm" method="post" action="Ultimate.php">
				<div style="display: flex;" id="travelGroup1">
					<div style="width: 50%; margin-right: 10px;" class="sourceGroup">
						<label>From</label>
						<input class="form-control formInput" id="sourceId"  placeholder="Source" type="text" name="source" value="" autocomplete="on" runat="server" required>
					</div>
					<div style="width: 50%; margin-left:10px;"  class="destinationGroup">
						<label>To</label>
						<input class="form-control formInput" id="destinationId" placeholder="Destination" type="text" name="destination" value="" required>
					</div>
				</div>
				<div style="display:flex;" id="pickDateTimeGroup1">
					<div style="width: 50%; margin-right: 10px;" class="pickDateGroup">
						<label>Pickup Date</label>
						<input class="form-control formInput" placeholder="Pickup Date" type="Date" name="pickUpDate" value="" required>
					</div>
					<div style="width: 50%; margin-left:10px;" class="pickTimeGroup">
						<label>Pickup Time</label>
						<input class="form-control formInput" type="Time" name="pickUpTime" value="00:00" required>
					</div>
				</div>
				<div style="display: flex;" id="passengerCarGroup1">
					<div style="width: 50%; margin-right: 10px;" class="passengerGroup">
						<label>Passenger</label>
						<input class="form-control formInput" type="number" name="passengerField" value="00:00" required>
					</div>
					<div style="width: 50%; margin-left:10px;">
						<label>Selecte Car</label>
						<select style="margin-top: -5px;" class="form-control form-select" name="selectCar" value="">
							<option>Suv</option>
							<option selected >Sadan</option>
							<option>hatchBack</option>
						</select>
					</div>
				</div>
				<div class="formSubmitButtonGroup">
					<button class="bookButton" type="submit" name="mOneWayBook_btn"> Book </button>
					<button class="priceButton" > Price </button>
				</div>
			</form>
			<form class="mRoundTripForm" method="post" action="Ultimate.php" style="display: none;">
				<div style="display: flex;" id="travelGroup1">
					<div style="width: 50%; margin-right: 10px;" class="sourceGroup">
						<label>From</label>
						<input class="form-control formInput" id="sourceId"  placeholder="Source" type="text" name="source" value="" autocomplete="on" runat="server" required>
					</div>
					<div style="width: 50%; margin-left:10px;"  class="destinationGroup">
						<label>To</label>
						<input class="form-control formInput" id="destinationId" placeholder="Destination" type="text" name="destination" value="" required>
					</div>
				</div>
				<div style="display:flex;" id="pickDateTimeGroup1">
					<div style="width: 50%; margin-right: 10px;" class="pickDateGroup">
						<label>Pickup Date</label>
						<input class="form-control formInput" placeholder="Pickup Date" type="Date" name="pickUpDate" value="" required>
					</div>
					<div style="width: 50%; margin-left:10px;" class="pickTimeGroup">
						<label>Pickup Time</label>
						<input class="form-control formInput" type="Time" name="pickUpTime" value="00:00" required>
					</div>
				</div>
				<div style="display: flex;" id="passengerCarGroup1">
					<div style="width: 50%; margin-right: 10px;" class="passengerGroup">
						<label>Passenger</label>
						<input class="form-control formInput" type="number" name="passengerField" value="00:00" required>
					</div>
					<div style="width: 50%; margin-left:10px;">
						<label>Selecte Car</label>
						<select style="margin-top: -5px;" class="form-control form-select" name="selectCar" value="">
							<option>Suv</option>
							<option selected >Sadan</option>
							<option>hatchBack</option>
						</select>
					</div>
				</div>
				<div style="display: none;" id="returnDateTimeGroup1" class="timeWrapperGroup">
					<div style="width: 50%; margin-right: 10px; display: block;" class="returnDateGroup">
						<label>Return Date</label>
						<input class="form-control formInput" placeholder="Return Date" type="Date" name="returnUpDate" value="">
					</div>
					<div style="width: 50%; margin-left:10px; display: block;" class="returnTimeGroup">
						<label>Return Time</label>
						<input class="form-control formInput" type="Time" name="returnUpTime" value="00:00">
					</div>
				</div>
				<div class="formSubmitButtonGroup">
					<button class="bookButton" type="submit" name="mRoundTripBook_btn"> Book </button>
					<button class="priceButton" > Price </button>
				</div>
			</form>
			<form class="mDayRentalForm" method="post" action="Ultimate.php" style="display: none;">
				<div class="dayRentalGroup" style="display:none;">
					<div style="width: 100%;display: block;" class="dayRentalTimeGroup">
						<label>Hour</label>
						<input class="form-control formInput" placeholder="hour" type="Time" name="rentalHour" value="">
					</div>
					<div style="width: 100%;display: block;" class="dayRentalTimeGroup">
						<label>Km</label>
						<input class="form-control formInput" placeholder="Km" type="number" name="rentalHour" value="">
					</div>
					<div style="width: 100%;display: block;" class="dayRentalSelectCar">
						<label>Select Car</label>
						<select style="margin-top: -5px;" class="form-control form-select" name="rentalCar" value="">
							<option>Suv</option>
							<option selected >Sadan</option>
							<option>hatchBack</option>
						</select>
					</div>
				</div>
				<div class="formSubmitButtonGroup">
					<button class="bookButton" type="submit" name="mDayRentalBook_btn"> Book </button>
					<button class="priceButton" > Price </button>
				</div>
		</form>
		</div>
		</div>
	</div>

	<div id="calculatePrice_Wrraper" class="price_model" style="display: none;">
		<div class="price_model-content">
			<div style="width:87%; margin:0 auto;">
				<span class="close" style="">&times;</span>
				<h3 style="height: auto; width:max-content; color:#cc00cc;"> Calculate Price</h3>
			</div>
			<form>
				<div class="form-group">
					<label> Passenger </label>
					<input type="number" name="passenger" style="width: 100px; height: auto;">
					<label>Select Car</label>
					<select name="car" value="">
						<option>Suv</option>
						<option selected >Sadan</option>
						<option>hatchBack</option>
					</select>
				</div>
				<div class="form-group" style="display:inline;">
					<input type="submit" onclick="calculatePrice()" name="submit" value="Calculate Price">
					<p style="float: right; margin: 5px 85px; padding: 2px 15px; background-color: #00cc00">Price:566</p>
				</div>
				<div class="form-group">
					
				</div>
			</form>

		</div>
	</div>

</section>


<script>
	/*var searchInput = 'sourceId';
	$(document).ready(function(){
		var autocomplete;
		autocomplete = new google.maps.places.Autocomplete((document.getElementById(searchInput)),{
			type:['geocode'],
		})

		google.maps.event.addListener(autocomplete,'place_changed',function(){
			var near_place = autocomplete.getplace();

		})

	})*/

	/*function findPos(obj) {
    var curtop = 0;
    if (obj.offsetParent) {
        do {
            curtop += obj.offsetTop;
        } while (obj = obj.offsetParent);
    return [curtop];
    }
}*/

</script>

</header>

<section class="container_fluid row-d">
	<!-- <div id="priceTab" class="bodySection_firstDiv" style="">
		<h2>Calculate Price</h2>
		<div class="priceCalculationDiv">
			<form class="calculationForm" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
				<div class="passengerDiv">
					<label> Passenger </label><br>
					<input type="text" name="passenger" placeholder="No of Passengers" style="width:100%;">
				</div>
				<div class="carselectionDiv" style="">
					<label>Select Car</label><br>
					<select name="car" value="" style="width:100%;">
						<option selected >Sadan</option>
						<option>hatchBack</option>
						<option>Suv</option>
					</select>
				</div>
				<div class="calculateButtonDiv"style="">
					<input type="submit" id="calculatePrice" name="estimatedPrice" value="Calculate Price">
					<input type="submit" id="bookNow" name="bookNow" value="Book Now">
				</div>
			</form>
		</div>
		<p class="showPriceText clearfix">Price:$56</p>
	</div> -->

	<div class="bodySection_secondDiv container-fluid" style="">
		<h3>India Rides</h3>
		<h5>Our Services in Mejor Cities -</h5>
		<div class="gallery">
			<div class="cityDiv">
				<img src="image/kolkata.jpg">
				<p>Kolkata</p>
			</div>
			<div class="cityDiv">
				<img src="image/bhubeneswar.jpg">
				<p>Bhubaneswar</p>
			</div>
			<div class="cityDiv">
				<img src="image/delhi.jpg">
				<p>Delhi</p>
			</div>
			<div class="cityDiv">
				<img src="image/Jamshedpur.jpg">
				<p>Jamshedpur</p>
			</div>
		</div>
	</div>
	<div class="bodySection_thirdDiv container-fluid">
		<h3 style="text-align: center; font-weight: bolder;">About</h3>
		<p class="aboutPara"><strong>Indiarides</strong> is one of the <span style="background-color: rgb(236,100,8);">largest</span> and leading online <strong> car rental </strong>service provider in <strong>India</strong>. We promise to serve you <strong>one way</strong> <strong>multicity</strong>, <strong>Day rental</strong> and <strong>airport</strong> transfer facilities all over <strong>India</strong>. We ensure to provide you best car hiring service all over <strong>India</strong> . For hiring a car for short or long journey, you are just few clicks of the Internet and your car would be at your door - step.<strong>Indiarides</strong> offers you one way , multicity and rental facilities to complete your stress - free trip with a well experienced driver. We also  with ensure to provide you the best <strong> cheap car booking</strong> deals and best fare rates. And, you can also book a <strong>commercial car rental service</strong> for any business meetings whether for a <strong>city trip</strong>or <strong>airport transfer</strong> or nearby.We provide variety of car categories like<strong>SUV </strong>, <strong>Sedan</strong> ,<strong>Compact</strong> or <strong>Hatchback</strong> and <strong>Tempo Travellers</strong> for your <strong>outstation</strong> journey along with a well experienced cab driver .</p>

		<p class=" aboutPara">Thinking about ride!!!!!! Experience <strong style="color:#70ad47 ">India</strong><strong style="color:#ec6408">rides</strong>.</p>
	</div>
</section>
<article>
	<div class="bodySection_forthDiv row-d" style="">
		<h3 class="howWeWork">How it work</h3>
		<div class="howItWorkDiv" style="width: 100%">
			<!-- <hr class="horizantalLine"> -->
			
			<div class="bookDiv">
				<!-- <hr class="horizantalLine">  -->
				<div  class="howItWorkInnerDiv" style="">
					<img src="image/book-rides.png" style="">
				</div>
				<p class="workTag">Book a Ride</p>
				<p>Select Your Destination and Car you like.</p>
			</div>
			<div class="bookDiv">
				<div class="howItWorkInnerDiv">
					<img src="image/Track-car.png">
				</div>
				<p class="workTag">Track Your Car</p>
				<p>Track the arrival of your car on map in real time.</p>
			</div>
			<div class="bookDiv">
				<div class="howItWorkInnerDiv">
					<img src="image/boardOn-time.png">
				</div>
				<p class="workTag">Board On Time</p>
				<p>Reach your destination in a comfortable ride</p>
			</div>
			<div class="bookDiv">
				<div class="howItWorkInnerDiv">
					<img src="image/getanE-bil.png">
				</div>
				<p class="workTag">Get an E-Bil</p>
				<p>Pay for your ride and get an e-bill on your email.</p>
			</div>
			<div class="bookDiv">
				<div class="howItWorkInnerDiv">
					<img src="image/feedBack.png">
				</div>
				<p class="workTag">FeedBack</p>
				<p>Instant feedback, helps us to serve you better</p>
			</div>
		</div>
	</div>
</article>

<script type="text/javascript">

			/*var loginBtn = document.getElementById("loginBtn");
			var logoutBtn = document.getElementById("logoutBtn");*/

			function logoutBtnActive(){
				var loginBtn = document.getElementById("loginBtn");
				var logoutBtn = document.getElementById("logoutBtn");
				logoutBtn.style.display = "inline-block";
				loginBtn.style.display = "none";
			}

			function loginBtnActive(){
				var loginBtn = document.getElementById("loginBtn");
				var logoutBtn = document.getElementById("logoutBtn");
				logoutBtn.style.display = "none";
				loginBtn.style.display = "inline-block";
			}

</script>

<footer class="container-fluid" >
	<div class="footer-wrapper clearfix">
		<div class="footerDiv">
		<h6>Company</h6>
		<ul>
			<li><a href="#">Term Of Use </a></li>
			<li><a href="#">Privacy Policy </a></li>
			<li><a href="#">Support </a></li>
			<li><a href="#">Faqs </a></li>

		</ul>
	</div>
	<div class="footerDiv">
		<h6>Important Links</h6>
		<ul>
			<li><a href="#">Services</a></li>
			<li><a href="#">Road Trip</a></li>
			<li><a href="#">Contact Us </a></li>
			<li><a href="#">Blog</a></li>
		</ul>
	</div>
	<div class="footerDiv">
		<h6>Contact Info</h6>
		<ul>
			<li><a href="#">+918350001900</a></li>
			<li><a href="#">support@indiarides.in</a></li>
			<li><a href="#">Follow Us</a></li>
			<li>
				<a href="https://www.facebook.com/india.rides.9/"><i class='fab fa-facebook-f' style='font-size:24px'></i></a>
				<a href="#"><i class='fab fa-twitter' style='font-size:24px'></i></a>
				<a href="#"><i class='fab fa-instagram' style='font-size:24px'></i></a>
				<a href="#"><img src=""></a>
			</li>

		</ul>
	</div>
</div>
<div class="copyrightClass" style="margin-top: 20px;">Copyright © 2020 IndiaRides.in All Right Reserved</div>

<div class="copyrightClass" style="/*margin-bottom:20px;*/font-size:12px;">Developed and Maintained By M5Solution</div>

</footer>
<script type="text/javascript" src="javascript/main.js"></script>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
