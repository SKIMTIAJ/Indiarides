<?php
include('../db/config.php');
if (empty($_SESSION["isLogin"])) {
      ?>
        <script type="text/javascript">
          window.location.href = "login.php"
        </script>
      <?php
}

$MERCHANT_KEY = "X9FBkoZ2";
$SALT = "Jk7Lpw6Lau";


// Merchant Key and Salt as provided by Payu.

$PAYU_BASE_URL = "https://sandboxsecure.payu.in";		// For Sandbox Mode
//$PAYU_BASE_URL = "https://secure.payu.in";			// For Production Mode

$action = '';

if (isset($_SESSION["isOneWayField"])) {
  #die("it active");
    unset($_SESSION["ProductInfo"]);
    unset($_SESSION["PayName"]);
    unset($_SESSION["PayEmail"]);
    unset($_SESSION["PayPhoneNo"]);


    $_SESSION["ProductInfo"] = "OneWay";
    $userid = $_SESSION['UserId'];
    $idquery = "SELECT * FROM user WHERE userId = '$userid'";
    $sql = mysqli_query($conn, $idquery); 
          if (mysqli_num_rows($sql)>0) {
              $row = mysqli_fetch_assoc($sql);
              $rowid = $row['id'];
              $_SESSION["PayName"] = $row['name'];
              $_SESSION["PayEmail"] = $row['email'];
              $_SESSION["PayPhoneNo"] = $row['phoneNo'];
            }

            #print_r($_SESSION);
}
if (isset($_SESSION["isReturnField"])) {

    unset($_SESSION["ProductInfo"]);
    unset($_SESSION["PayName"]);
    unset($_SESSION["PayEmail"]);
    unset($_SESSION["PayPhoneNo"]);


    $_SESSION["ProductInfo"] = "RoundTrip";
    $userid = $_SESSION['UserId'];
    $idquery = "SELECT * FROM user WHERE userId = '$userid'";
    $sql = mysqli_query($conn, $idquery); 
          if (mysqli_num_rows($sql)>0) {
              $row = mysqli_fetch_assoc($sql);
              $rowid = $row['id'];
              $_SESSION["PayName"] = $row['name'];
              $_SESSION["PayEmail"] = $row['email'];
              $_SESSION["PayPhoneNo"] = $row['phoneNo'];
            }
}
if (isset($_SESSION["isDayRentalField"])) {
  
    unset($_SESSION["ProductInfo"]);
    unset($_SESSION["PayName"]);
    unset($_SESSION["PayEmail"]);
    unset($_SESSION["PayPhoneNo"]);


    $_SESSION["ProductInfo"] = "DayRental";
    $userid = $_SESSION['UserId'];
    $idquery = "SELECT * FROM user WHERE userId = '$userid'";
    $sql = mysqli_query($conn, $idquery); 
          if (mysqli_num_rows($sql)>0) {
              $row = mysqli_fetch_assoc($sql);
              $rowid = $row['id'];
              $_SESSION["PayName"] = $row['name'];
              $_SESSION["PayEmail"] = $row['email'];
              $_SESSION["PayPhoneNo"] = $row['phoneNo'];
            }
}

$posted = array();
if(!empty($_POST)) {
    //print_r($_POST);
  foreach($_POST as $key => $value) {    
    $posted[$key] = $value; 
	
  }
}

$formError = 0;

if(empty($posted['txnid'])) {
  // Generate random transaction id
  $txnid = substr(hash('sha256', mt_rand() . microtime()), 0, 20);
} else {
  $txnid = $posted['txnid'];
}
$hash = '';
// Hash Sequence
$hashSequence = "key|txnid|amount|productinfo|firstname|email|udf1|udf2|udf3|udf4|udf5|udf6|udf7|udf8|udf9|udf10";
if(empty($posted['hash']) && sizeof($posted) > 0) {
  if(
          empty($posted['key'])
          || empty($posted['txnid'])
          || empty($posted['amount'])
          || empty($posted['firstname'])
          || empty($posted['email'])
          || empty($posted['phone'])
          || empty($posted['productinfo'])
          || empty($posted['surl'])
          || empty($posted['furl'])
		  || empty($posted['service_provider'])
  ) {
    $formError = 1;
  } else {
    //$posted['productinfo'] = json_encode(json_decode('[{"name":"tutionfee","description":"","value":"500","isRequired":"false"},{"name":"developmentfee","description":"monthly tution fee","value":"1500","isRequired":"false"}]'));
	$hashVarsSeq = explode('|', $hashSequence);
    $hash_string = '';	
	foreach($hashVarsSeq as $hash_var) {
      $hash_string .= isset($posted[$hash_var]) ? $posted[$hash_var] : '';
      $hash_string .= '|';
    }

    $hash_string .= $SALT;


    $hash = strtolower(hash('sha512', $hash_string));
    $action = $PAYU_BASE_URL . '/_payment';
  }
} elseif(!empty($posted['hash'])) {
  $hash = $posted['hash'];
  $action = $PAYU_BASE_URL . '/_payment';
}
?>
<html>
  <head>
  <script>
    var hash = '<?php echo $hash ?>';
    function submitPayuForm() {
      if(hash == '') {
        return;
      }
      var payuForm = document.forms.payuForm;
      payuForm.submit();
    }
  </script>
  </head>
  <body onload="submitPayuForm()">
    <head>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    </head>
    <div class="container">
      <div class="contant">
        <div class="card shadow p-3 mb-5 bg-white rounded">
    <h2 class="text-center">Payment Method</h2>
    <br/><br>
    <?php if($formError) { ?>
	
      <span style="color:red">Please fill all mandatory fields.</span>
      <br/>
      <br/>
    <?php } ?>
    <form style="margin: 50px auto" action="<?php echo $action; ?>" method="post" name="payuForm">
      <input type="hidden" name="key" value="<?php echo $MERCHANT_KEY ?>" />
      <input type="hidden" name="hash" value="<?php echo $hash ?>"/>
      <input type="hidden" name="txnid" value="<?php echo $txnid ?>" />
      <table>
        
        <tr>
          <td>Amount: </td>
          <td><input name="amount" value="<?php echo ($_SESSION['price']) ?>" readonly/></td>
          <td>First Name: </td>
          <td><input name="firstname" id="firstname" value="<?php echo ($_SESSION['PayName']) ?>" readonly/></td>
        </tr>
        <tr>
          <td>Email: </td>
          <td><input name="email" id="email" value="<?php echo ($_SESSION['PayEmail']) ?>" readonly/></td>
          <td>Phone: </td>
          <td><input name="phone" value="<?php echo ($_SESSION['PayPhoneNo']) ?>" readonly/></td>
        </tr>
        <tr>
          <td>Trip: </td>
          <td colspan="3"><textarea readonly name="productinfo"><?php echo ($_SESSION["ProductInfo"]); ?></textarea></td>
        </tr>
        <tr>
          <!-- <td>Success URI: </td> -->
          <td colspan="3"><input hidden="true" name="surl" value="http://localhost/Indiarides/PayUMoney/success.php" size="64" /></td>
        </tr>
        <tr>
          <!-- <td>Failure URI: </td> -->
          <td colspan="3"><input hidden="true" name="furl" value="http://localhost/Indiarides/PayUMoney/failure.php" size="64" /></td>
        </tr>

        <tr>
          <td colspan="3"><input type="hidden" name="service_provider" value="payu_paisa" size="64" /></td>
        </tr>

        <!-- <tr>
          <td><b>Optional Parameters</b></td>
        </tr>
        <tr>
          <td>Last Name: </td>
          <td><input name="lastname" id="lastname" value="<?php echo (empty($posted['lastname'])) ? '' : $posted['lastname']; ?>" /></td>
          <td>Cancel URI: </td>
          <td><input name="curl" value="" /></td>
        </tr>
        <tr>
          <td>Address1: </td>
          <td><input name="address1" value="<?php echo (empty($posted['address1'])) ? '' : $posted['address1']; ?>" /></td>
          <td>Address2: </td>
          <td><input name="address2" value="<?php echo (empty($posted['address2'])) ? '' : $posted['address2']; ?>" /></td>
        </tr>
        <tr>
          <td>City: </td>
          <td><input name="city" value="<?php echo (empty($posted['city'])) ? '' : $posted['city']; ?>" /></td>
          <td>State: </td>
          <td><input name="state" value="<?php echo (empty($posted['state'])) ? '' : $posted['state']; ?>" /></td>
        </tr>
        <tr>
          <td>Country: </td>
          <td><input name="country" value="<?php echo (empty($posted['country'])) ? '' : $posted['country']; ?>" /></td>
          <td>Zipcode: </td>
          <td><input name="zipcode" value="<?php echo (empty($posted['zipcode'])) ? '' : $posted['zipcode']; ?>" /></td>
        </tr>
        <tr>
          <td>UDF1: </td>
          <td><input name="udf1" value="<?php echo (empty($posted['udf1'])) ? '' : $posted['udf1']; ?>" /></td>
          <td>UDF2: </td>
          <td><input name="udf2" value="<?php echo (empty($posted['udf2'])) ? '' : $posted['udf2']; ?>" /></td>
        </tr>
        <tr>
          <td>UDF3: </td>
          <td><input name="udf3" value="<?php echo (empty($posted['udf3'])) ? '' : $posted['udf3']; ?>" /></td>
          <td>UDF4: </td>
          <td><input name="udf4" value="<?php echo (empty($posted['udf4'])) ? '' : $posted['udf4']; ?>" /></td>
        </tr>
        <tr>
          <td>UDF5: </td>
          <td><input name="udf5" value="<?php echo (empty($posted['udf5'])) ? '' : $posted['udf5']; ?>" /></td>
          <td>PG: </td>
          <td><input name="pg" value="<?php echo (empty($posted['pg'])) ? '' : $posted['pg']; ?>" /></td>
        </tr> -->
        <tr>
          <?php if(!$hash) { ?>
            <td colspan="4" style="margin: 20px 20px;"><input class="btn btn-success" type="submit" value="Submit" /></td>
          <?php } ?>
        </tr>
      </table>
    </form>
  </body>
</html>
