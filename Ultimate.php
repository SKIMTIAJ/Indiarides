<?php
include('config.php');
//session_start();

$source = $destination = $pickDate = $pickTime = $returnDate = $returnTime = $passenger = $selectedCar = null;

if($_SERVER["REQUEST_METHOD"] == "POST"){
	if (isset($_SESSION['isLogin'])) {
		/*setSearchDetails($_POST["from"],$_POST["to"],$_POST["pickDate"],$_POST["pickTime"],$_POST["returnDate"],$_POST["returnTime"],$_POST["passenger"],$_POST["car"]);*/

		if (isset($_POST["oneWayBook_btn"])) {
			oneWayClickFun($_POST["from"],$_POST["to"],$_POST["pickDate"],$_POST["pickTime"],$_POST["passenger"],$_POST["car"]);
		}
		if (isset($_POST["roundTripBook_btn"])) {
			
			returnDateClickFun($_POST["from"],$_POST["to"],$_POST["pickDate"],$_POST["pickTime"],$_POST["returnDate"],$_POST["returnTime"],$_POST["passenger"],$_POST["car"]);
		}
		if (isset($_POST["dayRentalBook_btn"])) {
			dayRentalClickFun($_POST["hour"],$_POST["km"],$_POST["car"]);
		}

	}else{
		?>
		<script type="text/javascript">
			window.location.href = "login.php"
		</script>
		<?php
	}

}

function oneWayClickFun($Source,$Destination,$PickUpDate,$PickUpTime,$Passenger,$SelectCar){

		$source = testinput($Source);
 		$_SESSION["source"] = $source;
 		$destination = testinput($Destination);
 		$_SESSION["destination"] = $destination;
 		$pickDate = testinput($PickUpDate);
 		$_SESSION["pickUpDate"] = $pickDate;
 		$pickTime = testinput($PickUpTime);
 		$_SESSION["pickUpTime"] = $pickTime;
 		$passenger = testinput($Passenger);
 		$_SESSION["passengerField"] = $passenger;
 		$selectedCar = testinput($SelectCar);
 		$_SESSION["selectCar"] = $selectedCar;
 		$_SESSION["isOneWayField"] = "yes";

 		echo "<script>window.location ='userbookingdetails.php'</script>";


}

function returnDateClickFun($Source,$Destination,$PickUpDate,$PickUpTime,$ReturnDate,$ReturnTime,$Passenger,$SelectCar){
	//die("roundTripBookFunction executing");

		$source = testinput($Source);
 		$_SESSION["source"] = $source;
 		$destination = testinput($Destination);
 		$_SESSION["destination"] = $destination;
 		$pickDate = testinput($PickUpDate);
 		$_SESSION["pickUpDate"] = $pickDate;
 		$pickTime = testinput($PickUpTime);
 		$_SESSION["pickUpTime"] = $pickTime;
 		$passenger = testinput($Passenger);
 		$_SESSION["passengerField"] = $passenger;
 		$selectedCar = testinput($SelectCar);
 		$_SESSION["selectCar"] = $selectedCar;
 		$returnDate = testinput($ReturnDate);
 		$_SESSION["returnUpDate"] = $returnDate;
 		$returnTime = testinput($ReturnTime);
 		$_SESSION["returnUpTime"] = $returnTime;
 		$_SESSION["isReturnField"] = "yes";

 		echo "<script>window.location ='userbookingdetails.php'</script>";



}

function dayRentalClickFun($Hour,$Km,$Car){
		$hour = testinput($Hour);
 		$_SESSION["hour"] = $hour;
 		$km = testinput($Km);
 		$_SESSION["km"] = $km;
 		$car = testinput($Car);
 		$_SESSION["car"] = $car;
 		$_SESSION['isDayRentalField'] = "yes";

 		#echo $_SESSION["hour"];

 		echo "<script>window.location ='userbookingdetails.php'</script>";
}

function setSearchDetails($Source,$Destination,$PickUpDate,$PickUpTime,$ReturnDate,$ReturnTime,$Passenger,$SelectCar){


	if (!empty($Source)) {
		unset($_SESSION["source"]);
		$source = testinput($Source);
 		$_SESSION["source"] = $source;
	}else{
		unset($_SESSION["source"]);
	}
	if (!empty($Destination)) {
		unset($_SESSION["destination"]);
		$destination = testinput($Destination);
 		$_SESSION["destination"] = $destination;
	}else{
		unset($_SESSION["destination"]);
	}
	if (!empty($PickUpDate)) {
		unset($_SESSION["pickUpDate"]);
		$pickDate = testinput($PickUpDate);
 		$_SESSION["pickUpDate"] = $pickDate;
	}else{
		unset($_SESSION["pickUpDate"]);
	}
	if (!empty($PickUpTime)) {
		unset($_SESSION["pickUpTime"]);
		$pickTime = testinput($PickUpTime);
 		$_SESSION["pickUpTime"] = $pickTime;
	}else{
		unset($_SESSION["pickUpTime"]);
	}
	if (!empty($ReturnDate)){
		unset($_SESSION["returnUpDate"]);
		$returnDate = testinput($ReturnDate);
 		$_SESSION["returnUpDate"] = $returnDate;
	}else{
		unset($_SESSION["returnUpDate"]);
	}
	if (!empty($ReturnTime)) {
		unset($_SESSION["returnUpTime"]);
		$returnTime = testinput($ReturnTime);
 		$_SESSION["returnUpTime"] = $returnTime;
	}else{
		unset($_SESSION["returnUpTime"]);
	}
	if (!empty($Passenger)) {
		unset($_SESSION["passengerField"]);
		$passenger = testinput($Passenger);
 		$_SESSION["passengerField"] = $passenger;
	}else{
		unset($_SESSION["passengerField"]);
	}
	if (!empty($SelectCar)) {
		unset($_SESSION["selectCar"]);
		$selectedCar = testinput($SelectCar);
 		$_SESSION["selectCar"] = $selectedCar;
	}else{
		unset($_SESSION["selectCar"]);
	}

	print_r($_SESSION);




	/*if (!empty($_POST["source"])) {
		unset($_SESSION["source"]);
		$source = testinput($_POST["source"]);
 		$_SESSION["source"] = $source;
	}else{
		unset($_SESSION["source"]);
	}
	if (!empty($_POST["destination"])) {
		unset($_SESSION["destination"]);
		$destination = testinput($_POST["destination"]);
 		$_SESSION["destination"] = $source;
	}else{
		unset($_SESSION["destination"]);
	}
	if (!empty($_POST["pickUpDate"])) {
		unset($_SESSION["pickUpDate"]);
		$pickDate = testinput($_POST["pickUpDate"]);
 		$_SESSION["pickUpDate"] = $source;
	}else{
		unset($_SESSION["pickUpDate"]);
	}
	if (!empty($_POST["pickUpTime"])) {
		unset($_SESSION["pickUpTime"]);
		$pickTime = testinput($_POST["pickUpTime"]);
 		$_SESSION["pickUpTime"] = $source;
	}else{
		unset($_SESSION["pickUpTime"]);
	}

	if (!empty($_POST["returnUpDate"])) {
		unset($_SESSION["returnUpDate"]);
		$source = testinput($_POST["returnUpDate"]);
 		$_SESSION["returnUpDate"] = $source;

	}else{
		unset($_SESSION["returnUpDate"]);
	}
	if (!empty($_POST["returnUpTime"])) {
		unset($_SESSION["returnUpTime"]);
		$destination = testinput($_POST["returnUpTime"]);
 		$_SESSION["returnUpTime"] = $source;
	}else{
		unset($_SESSION["returnUpTime"]);
	}
	if (!empty($_POST["passengerField"])) {
		unset($_SESSION["passengerField"]);
		$pickDate = testinput($_POST["passengerField"]);
 		$_SESSION["passengerField"] = $source;
	}else{
		unset($_SESSION["passengerField"]);
	}
	if (!empty($_POST["selectCar"])) {
		unset($_SESSION["selectCar"]);
		$pickTime = testinput($_POST["selectCar"]);
 		$_SESSION["selectCar"] = $source;
	}else{
		unset($_SESSION["selectCar"]);
	}*/


}

function testinput($data){
 	$data = trim($data);
 	$data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
 }


?>