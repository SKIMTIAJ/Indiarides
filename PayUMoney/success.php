<head>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<?php
include('../db/config.php');
$status=$_POST["status"];
$firstname=$_POST["firstname"];
$amount=$_POST["amount"];
$txnid=$_POST["txnid"];
$posted_hash=$_POST["hash"];
$key=$_POST["key"];
$productinfo=$_POST["productinfo"];
$email=$_POST["email"];
$salt="";

// Salt should be same Post Request 
echo "<a style='float:right; margin:0px 30px;' href='../index.php'>Go Back</a>";

If (isset($_POST["additionalCharges"])) {
       $additionalCharges=$_POST["additionalCharges"];
        $retHashSeq = $additionalCharges.'|'.$salt.'|'.$status.'|||||||||||'.$email.'|'.$firstname.'|'.$productinfo.'|'.$amount.'|'.$txnid.'|'.$key;
  } else {
        $retHashSeq = $salt.'|'.$status.'|||||||||||'.$email.'|'.$firstname.'|'.$productinfo.'|'.$amount.'|'.$txnid.'|'.$key;
         }
		 $hash = hash("sha512", $retHashSeq);
       if ($hash != $posted_hash) {
	       #echo "Invalid Transaction. Please try again";
          /*echo "<h3>Thank You. Your order status is ". $status .".</h3>";
          echo "<h4>Your Transaction ID for this transaction is ".$txnid.".</h4>";
          echo "<h4>We have received a payment of Rs. " . $amount . ". Your order will soon be shipped.</h4>";
          echo "<h3>Thank You. Your order status is ". $firstname .".</h3>";
          echo "<h4>Your Transaction ID for this transaction is ".$productinfo.".</h4>";
          echo "<h4>We have received a payment of Rs. " . $email . ". Your order will soon be shipped.</h4>";*/
          ?>
            <TABLE class="table" style="margin: 20px 50px;">
              <tr>
                <td><h3>Status</h3> </td>
                <td><?php echo $status?></td>
              </tr>
              <tr>
                <td><h3>TransactionId</h3> </td>
                <td><?php echo $txnid?></td>
              </tr>
              <tr>
                <td><h3>Amount</h3> </td>
                <td><?php echo $amount?></td>
              </tr>
              <tr>
                <td><h3>Name</h3> </td>
                <td><?php echo $firstname?></td>
              </tr>
              <tr>
                <td><h3>Ride Type</h3> </td>
                <td><?php echo $productinfo?></td>
              </tr>
              <tr>
                <td><h3>Email</h3> </td>
                <td><?php echo $email?></td>
              </tr>
              <tr>
                <td><h3>Date & Time</h3> </td>
                <td><?php echo time()?></td>
              </tr>
            </TABLE>
          <?php


          $insertPayment = "INSERT INTO paymentTable(transactionId,name,amount,status,trip,email) VALUES ('$txnid','$firstname','$amount','$status','$productinfo','$email')";
          $insertSql = mysqli_query($conn,$insertPayment);
          if ($insertSql) {
            #echo "<script>alert('we have booked OneWay Trip to complete payment call to +918350001900');</script>";
            echo "<script> alert('printthis page');</script>";
          }else{
            echo "something wrong";
            /*printf("error: %s\n", mysqli_error($conn));*/
          }

		   } else {
          echo "<h3>Thank You. Your order status is ". $status .".</h3>";
          echo "<h4>Your Transaction ID for this transaction is ".$txnid.".</h4>";
          echo "<h4>We have received a payment of Rs. " . $amount . ". Your order will soon be shipped.</h4>";

          $insertPayment = "INSERT INTO oneWayBookingList(transactionId,name,amount,status,trip,email) VALUES ('$txnid','$firstname','$amount','$status','$productinfo','$email')";
          $insertSql = mysqli_query($conn,$insertPayment);
		   }
?>	