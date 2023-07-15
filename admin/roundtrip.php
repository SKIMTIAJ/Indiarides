<?php 
include("header.php");
?>
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
					<table class="table">
						<tr>
							<th>Person Id</th>
							<th>Person Name</th>
							<th>source</th>
							<th>Destination</th>
							<th>Pickup Date</th>
							<th>Pickup Time</th>
							<th>Return Date</th>
							<th>Return Time</th>
							<th>Passenger</th>
							<th>Selected Car</th>
							<th></th>
						</tr>
						
						<?php
							$query = "SELECT * FROM roundTripBookingList";
							$sql = mysqli_query($conn,$query);
							if (mysqli_num_rows($sql)>0) {
								while($row = mysqli_fetch_assoc($sql)){
									?>
										<tr>
											<td><?php echo $row['personid']?></td>
											<td><?php echo $row['personName']?></td>
											<td><?php echo $row['source']?></td>
											<td><?php echo $row['destination']?></td>
											<td><?php echo $row['pickupdate']?></td>
											<td><?php echo $row['pickuptime']?></td>
											<td><?php echo $row['returndate']?></td>
											<td><?php echo $row['returntime']?></td>
											<td><?php echo $row['passenger']?></td>
											<td><?php echo $row['selectedcar']?></td>
											<td><button>Delete</button></td>
										</tr>
									<?php
								}
							}
						?>
					</table>
				</div>
			</aside>
		</section>
	</header>
</body>
</html>