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
			<aside class="rightAside" style="overflow: scroll;">
				<div class="row1 contain-fluid" >
					<table class="table">
						<tr>
							<th>Transaction Id</th>
							<th>Person Name</th>
							<th>Amount</th>
							<th>Trip</th>
							<th>Email</th>
							<th>Payment Status</th>
							<th>Time at</th>
							<th></th>
						</tr>
						
						<?php
							$query = "SELECT * FROM paymentTable";
							$sql = mysqli_query($conn,$query);
							if (mysqli_num_rows($sql)>0) {
								while($row = mysqli_fetch_assoc($sql)){
									?>
										<tr>
											<td><?php echo $row['transactionId']?></td>
											<td><?php echo $row['name']?></td>
											<td><?php echo $row['amount']?></td>
											<td><?php echo $row['trip']?></td>
											<td><?php echo $row['email']?></td>
											<td><?php echo $row['status']?></td>
											<td><?php echo $row['currentTime']?></td>
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