<?php include('header.php');
	if(empty($_SESSION["isLogin"])){
			?>
			<script type="text/javascript">
				window.location.href = "login.php"
			</script>
			<?php
	}
?>

<section style="display: block;">
	<div class="container">
		<div style="float: left;">
			<?php

			/*$query = "SELECT * FROM user WHERE userId = '$_SESSION['UserId']'";
			$sql = mysqli_query($conn, $sql);*/

			?>
			<h4><?php echo $_SESSION['Name'];?></h4>
			<h5><?php echo $_SESSION['EmailAddress'];?></h5>
			<p>Account details</p>
		</div>
		<div style="float: right;">
			<h4><?php 
			if (isset($_SESSION["isOneWayField"])) {
				echo "One Way";
			}
			if (isset($_SESSION["isReturnField"])) {
				echo "Round Trip";
			}
			if (isset($_SESSION["isDayRentalField"])) {
				echo "Day Rental";
			}
			?></h4>
		</div>
	</div>
	<div class="container-fluid">

		<?php
		if (isset($_SESSION["isOneWayField"])) {
			?>

			<table class="table table-striped">
				<tr class="table-row">
					<th>Source</th>
					<th>Destination</th>
					<th>PickUp Date</th>
					<th>PickUp Time</th>
					<th>Passenger</th>
					<th>Selected Car</th>
				</tr>
				<tr class="table-row">
							<td><?php echo $_SESSION["source"]?></td>
							<td><?php echo $_SESSION["destination"]?></td>
							<td><?php echo $_SESSION["pickUpDate"]?></td>
							<td><?php echo $_SESSION["pickUpTime"]?></td>
							<td><?php echo $_SESSION["passengerField"]?></td>
							<td><?php echo $_SESSION["selectCar"]?></td>
				</tr>
			</table>

		<?php
		}
		?>
		<?php
			if (isset($_SESSION["isReturnField"])) {
				?>
				<table class="table table-striped">
				<tr class="table-row">
					<th>Source</th>
					<th>Destination</th>
					<th>PickUp Date</th>
					<th>PickUp Time</th>
					<th>Return Date</th>
					<th>Return Time</th>
					<th>Passenger</th>
					<th>Selected Car</th>
				</tr>
				<tr class="table-row">
							<td><?php echo $_SESSION["source"]?></td>
							<td><?php echo $_SESSION["destination"]?></td>
							<td><?php echo $_SESSION["pickUpDate"]?></td>
							<td><?php echo $_SESSION["pickUpTime"]?></td>
							<td><?php echo $_SESSION["returnUpDate"]?></td>
							<td><?php echo $_SESSION["returnUpTime"]?></td>
							<td><?php echo $_SESSION["passengerField"]?></td>
							<td><?php echo $_SESSION["selectCar"]?></td>
				</tr>
			</table>
				<?php
			}
		?>
		<?php
		if (isset($_SESSION["isDayRentalField"])) {
			?>

			<table class="table table-striped">
				<tr class="table-row">
					<th>Hour</th>
					<th>Km</th>
					<th>Cab</th>
				</tr>
				<tr class="table-row">
					<td><?php echo $_SESSION["hour"]?></td>
					<td><?php echo $_SESSION["km"]?></td>
					<td><?php echo $_SESSION["car"]?></td>
				</tr>
			</table>

			<?php
		}
		?>
		<?php
		if (isset($_GET["bookingNow"])) {
			if (isset($_SESSION["isOneWayField"])) {
				$userid = $_SESSION['UserId'];
				$personname = $_SESSION['Name'];
				$source = $_SESSION['source'];
				$destination = $_SESSION['destination'];
				$pickupDate = $_SESSION['pickUpDate'];
				$pickupTime = $_SESSION['pickUpTime'];
				$passenger = $_SESSION['passengerField'];
				$selectCar = $_SESSION['selectCar'];
				//$source = $_SESSION['source'];

				$idquery = "SELECT id FROM user WHERE userId = '$userid'";
				$sql = mysqli_query($conn, $idquery);
				if (mysqli_num_rows($sql)>0) {
					$row = mysqli_fetch_assoc($sql);
					$rowid = $row['id'];
					/*print_r($_SESSION);
					echo $rowid;*/
					$insertQuery = "INSERT INTO oneWayBookingList(userTableId,personid,personName,source,destination,pickupdate,pickuptime,passenger,selectedcar) VALUES ('$rowid','$userid','$personname','$source','$destination','$pickupDate','$pickupTime','$passenger','$selectCar')";
					/*echo "<pre>Debug: $insertQuery</pre>";*/
					$insertSql = mysqli_query($conn,$insertQuery);
					if ($insertSql) {
						#echo "<script>alert('we have booked OneWay Trip to complete payment call to +918350001900');</script>";
						echo "<script>window.location='PayUMoney/PayUMoney_form.php';</script>";
					}else{
						echo "something wrong";
						/*printf("error: %s\n", mysqli_error($conn));*/
					}

				}
			}
			if (isset($_SESSION["isReturnField"])){

				$userid = $_SESSION['UserId'];
				$personname = $_SESSION['Name'];
				$source = $_SESSION['source'];
				$destination = $_SESSION['destination'];
				$pickupDate = $_SESSION['pickUpDate'];
				$pickupTime = $_SESSION['pickUpTime'];
				$returnDate = $_SESSION["returnUpDate"];
				$returnTime = $_SESSION["returnUpTime"];
				$passenger = $_SESSION['passengerField'];
				$selectCar = $_SESSION['selectCar'];

				$idquery = "SELECT id FROM user WHERE userId = '$userid'";
				$sql = mysqli_query($conn, $idquery);
				if (mysqli_num_rows($sql)>0) {
					$row = mysqli_fetch_assoc($sql);
					$rowid = $row['id'];
					/*print_r($_SESSION);
					echo $rowid;*/
					$insertQuery = "INSERT INTO roundTripBookingList(userTableId,personid,personName,source,destination,pickupdate,pickuptime,returndate,returntime,passenger,selectedcar) VALUES ('$rowid','$userid','$personname','$source','$destination','$pickupDate','$pickupTime','$returnDate','$returnTime','$passenger','$selectCar')";
					/*echo "<pre>Debug: $insertQuery</pre>";*/
					$insertSql = mysqli_query($conn,$insertQuery);
					if ($insertSql) {
						#echo "<script>alert('we have booked Round Trip to complete payment call to +918350001900');</script>";
						echo "<script>window.location='PayUMoney/PayUMoney_form.php';</script>";
					}else{
						echo "something wrong";
						/*printf("error: %s\n", mysqli_error($conn));*/
					}

				}
			}
			if (isset($_SESSION["isDayRentalField"])) {

				$userid = $_SESSION['UserId'];
				$personname = $_SESSION['Name'];
				$hour = $_SESSION['hour'];
				$km = $_SESSION['km'];
				$selectedCar = $_SESSION['car'];

				$idquery = "SELECT id FROM user WHERE userId = '$userid'";
				$sql = mysqli_query($conn, $idquery);
				if (mysqli_num_rows($sql)>0) {
					$row = mysqli_fetch_assoc($sql);
					$rowid = $row['id'];
					/*print_r($_SESSION);
					echo $rowid;*/
					$insertQuery = "INSERT INTO dayRentalBookingList(userTableId,personid,personName,hour,km,selectedcar) VALUES ('$rowid','$userid','$personname','$hour','$km','$selectedCar')";
					#echo "<pre>Debug: $insertQuery</pre>";
					$insertSql = mysqli_query($conn,$insertQuery);
					if ($insertSql) {
						#echo "<script>alert('we have booked DayRental Trip to complete payment call to +918350001900');</script>";
						echo "<script>window.location='PayUMoney/PayUMoney_form.php';</script>";
					}else{
						echo "something wrong";
						/*printf("error: %s\n", mysqli_error($conn));*/
					}

				}
			}
		}
		if (isset($_GET["calculatePrice"])) {
			$multiplywith = 10;
			unset($_SESSION["price"]);
			if (isset($_SESSION["isDayRentalField"])) {
				$price = $_SESSION["km"] * $multiplywith;
				$_SESSION["price"] = $price;
				echo "<p class='text-success fas' style='margin:0px 150px; border:2px solid green; border-radius:50px;padding:20px 70px'>".'Price  &#xf156;'.$price."</p>";
			}elseif (isset($_SESSION["isReturnField"])) {
				$addressFrom = $_SESSION["source"];
				$addressTo= $_SESSION["destination"];

				$distance = getDistance($addressFrom, $addressTo, "K");
				$price =(int)$distance * $multiplywith*2; 
				$_SESSION["price"] = $price;
				echo "<p class='text-success fas' style='margin:0px 150px; border:2px solid green; border-radius:50px;padding:20px 70px'>".'Price  &#xf156;'.$price."</p>";


			}{
				$addressFrom = $_SESSION["source"];
				$addressTo= $_SESSION["destination"];

				$distance = getDistance($addressFrom, $addressTo, "K");
				$price =(int)$distance * $multiplywith; 
				$_SESSION["price"] = $price;
				echo "<p class='text-success fas' style='margin:0px 150px; border:2px solid green; border-radius:50px;padding:20px 70px'>".'Price  &#xf156;'.$price."</p>";
			}
		}

				function getDistance($addressFrom, $addressTo, $unit = ''){
				    // Google API key
				    $apiKey = 'AIzaSyARYj-i5aWu-yuEYZszOMu6750yLQ6lWQU';
				    
				    // Change address format
				    $formattedAddrFrom    = str_replace(' ', '+', $addressFrom);
				    $formattedAddrTo     = str_replace(' ', '+', $addressTo);
				    
				    // Geocoding API request with start address
				    $geocodeFrom = file_get_contents('https://maps.googleapis.com/maps/api/geocode/json?address='.$formattedAddrFrom.'&sensor=false&key='.$apiKey);
				    $outputFrom = json_decode($geocodeFrom);
				    if(!empty($outputFrom->error_message)){
				        return $outputFrom->error_message;
				    }
				    
				    // Geocoding API request with end address
				    $geocodeTo = file_get_contents('https://maps.googleapis.com/maps/api/geocode/json?address='.$formattedAddrTo.'&sensor=false&key='.$apiKey);
				    $outputTo = json_decode($geocodeTo);
				    if(!empty($outputTo->error_message)){
				        return $outputTo->error_message;
				    }
				    
				    // Get latitude and longitude from the geodata
				    $latitudeFrom    = $outputFrom->results[0]->geometry->location->lat;
				    $longitudeFrom    = $outputFrom->results[0]->geometry->location->lng;
				    $latitudeTo        = $outputTo->results[0]->geometry->location->lat;
				    $longitudeTo    = $outputTo->results[0]->geometry->location->lng;
				    
				    // Calculate distance between latitude and longitude
				    $theta    = $longitudeFrom - $longitudeTo;
				    $dist    = sin(deg2rad($latitudeFrom)) * sin(deg2rad($latitudeTo)) +  cos(deg2rad($latitudeFrom)) * cos(deg2rad($latitudeTo)) * cos(deg2rad($theta));
				    $dist    = acos($dist);
				    $dist    = rad2deg($dist);
				    $miles    = $dist * 60 * 1.1515;
				    
				    // Convert unit and return distance
				    $unit = strtoupper($unit);
				    if($unit == "K"){
				        return ceil(round($miles * 1.609344, 2)).' km';
				    }elseif($unit == "M"){
				        return ceil(round($miles * 1609.344, 2)).' meters';
				    }else{
				        return ceil(round($miles, 2)).' miles';
				    }
				}

		?>


	</div>
	<div class="container">
		<button style="float: right; margin: 10px 10px; padding: 5px 15px; border-radius: 10px;"><a href="userbookingdetails.php?bookingNow=true">Pay</a></button>
		<button style="float: right;margin: 10px 10px; padding: 5px 15px; border-radius: 10px;"><a href="userbookingdetails.php?calculatePrice=true">Calculate Price</a></button>
	</div>

	<script type="text/javascript">
		
		function priceBtnClick(){
			<?php
				echo "122 rupee";
			?>
		}

	</script>
	
</section>
