
<!DOCTYPE html>
<html>
<head>
	<title>Indiarides.in</title>
	<link rel="icon" href="image/car-icon.png">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="HandheldFriendly" content="true">
	<!-- <link rel="stylesheet" type="text/css" href="Css/main.css">
 -->	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://kit.fontawesome.com/342e854313.js"></script>

	<style>
		.formMainDiv{
			padding: 12px 15px;
			
		}
		.Logo-at-login{
			margin:0px auto;
			width: 160px;
			height:160px;
		}
		.formMainDiv input{
			border-bottom: 5px solid lightgrey;
			border-top: none;
			border-left: none;
			border-right: 3px solid #cc00cc;
		}
		.formbtn{
			padding: 5px 15px;
			border: none;
			background-color: #00cc00;
			border-radius: 10px;
		}

	</style>
</head>
<body>

	<div class="container-fluid">
		<div style="width: 20%; margin: 10px auto;">
			<a href="index.php" style="index.php"><img class="Logo-at-login" src="image/logo_updated.png" alt=""></a>
		</div>
		<form style="width: 60%; margin: 2px auto;">
			<div style="width: 100%;">
				<div  class="formMainDiv" style="width: 50%; float: left;">
					<label>Source</label>
					<input class="form-control" type="text" name="source" >
				</div>
				<div   class="formMainDiv" style="width:50%; float: left;">
					<label>Destination</label>
					<input class="form-control" type="text" name="destination" >
				</div>
			</div>
			<div style="width: 100%;">
				<div class="formMainDiv" style="width:50%; float: left;">
					<label>PickUp Date</label>
					<input class="form-control" type="date" name="source" >
				</div>
				<div class="formMainDiv" style="width:50%; float: left;">
					<label>PickUp Time</label>
					<input class="form-control" type="time" name="source" >
				</div>
			</div>
			<div style="width: 100%;">
				<div class="formMainDiv" style="width:50%; float: left;">
					<label>Return Date</label>
					<input class="form-control" type="date" name="source" >
				</div>
				<div class="formMainDiv" style="width:50%; float: left;">
					<label>Return Time</label>
					<input class="form-control" type="Time" name="source" >
				</div>
			</div>
			<div style="width: 100%;">
				<div class="formMainDiv" style="width:50%; float: left;">
					<label>Passenger</label>
					<input class="form-control" type="number" name="source" >
				</div>
				<div class="formMainDiv" style="width:50%; float: left;">
					<label>Select Car</label><br>
					<select class="form-control" name="car" value="" style="width:100%;">
						<option selected >Sadan</option>
						<option>hatchBack</option>
						<option>Suv</option>
					</select>
				</div>
			</div>
			<div>
				<div class="formMainDiv" style="float: left;">
					<input class="formbtn" type="submit" name="book" value="Book Now" >
				</div>
				<div class="formMainDiv" style="float: left;">
					<input class="formbtn" type="submit" name="price" value="Calculate Price" >
				</div>
			</div>
		</form>
	</div>

</body>
</html>