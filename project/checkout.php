<?php
session_start();

//
// $price_num = $_POST["price_num"];
// setcookie("bill",$price_num,time()+1800);
// $payment = $_POST["payment"];
//
?>




<!DOCTYPE html>

<html lang = "en">
  <head>
    <title> Process TravelPlan.html shopping cart </title>
    <meta charset = "utf-8" />
    <link href="css/paymentform.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
  </head>
  <body>





<div class="wrapper">
	<h2> Payment Form</h2>
	<?php
		printf ("<h3>Your total bill is: $ %5.2f<h3> <br />", $_SESSION["totalPrice"]);	
	?>
	<form method="POST" action="successful.php">
		<h4>Account </h4>
		<div class="input-group">
			<div class="input-box">
				<input type="text" placeholder="Full Name"  name="fullname" required class="name">
				<i class="fa fa-user icon"></i>
		    </div>
		    <div class="input-box"><input type="text" placeholder="Nick Name" class="name" name="nickname" required><i class="fa fa-user icon"></i>
		    </div>
		</div>

		<div class="input-group">
			<div class="input-box">
				<input type="email" placeholder="Email Address" name="email" required class="name">
				<i class="fa fa-envelope icon"></i>
			</div>
		</div>

		<div class="input-group">
			<div class="input-box">
				<h4>Date of Birth</h4>
				<input type="text" name="daybirth" placeholder="DD" class="dob">
				<input type="text" name="monthbirth" placeholder="MM" class="dob">
				<input type="text" name="yearbirth" placeholder="YYYY" class="dob">
			</div>
			<div class="input-box">
				<h4>Gender</h4>
				<input type="radio" id="b1" name="gender" checked class="radio">
				<label for="b1">Male</label>
				<input type="radio" id="b2" name="gender" class="radio">
				<label for="b2">Female</label>
			</div>
		</div>

		<div class="input-group">
			<div class="input-box">
				<h4> Payment Details</h4>
				<input type="radio" name="pay" id="bc1" checked class="radio">
				<label for="bc1"><span><i class="fa fa-cc-visa"></i>Visa card</span></label>
				<input type="radio" name="pay" id="bc2"  class="radio">
				<label for="bc2"><span><i class="fa fa-cc-paypal"></i>Paypal</span></label>
				<input type="radio" name="pay" id="bc3"  class="radio">
				<label for="bc3"><span><i class="fa fa-cc-mastercard"></i>Master card</span></label>
			</div>
		</div>

		<div class="input-group">
			<div class="input-box">
				<input type="tel" name="cardnumber" placeholder="Card Number" required class="name">
				<i class="fa fa-credit-card icon"></i>
			</div>
		</div>

		<div class="input-group">
			<div class="input-box">
				<input type="tel" name="cvc" placeholder="Card CVC" required class="name">
				<i class="fa fa-user icon"></i>
			</div>
			<div class="input-box">
				<select>
					<option>01 Dec</option>
					<option>02 Dec</option>
					<option>03 Dec</option>
				</select>
				<select>
					<option>2020</option>
					<option>2021</option>
					<option>2022</option>
				</select>
			</div>
		</div>

		<div class="input-group">
			<div class="input-box">
				<button type="submit" name="submit">Pay Now</button>
			</div>
		</div>
	</form>
</div>




</body>
</html>
















































</body>
</html>