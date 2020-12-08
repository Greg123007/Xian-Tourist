<?php
session_start();
$fullname=$_POST["fullname"];
$nickname=$_POST["nickname"];
$email=$_POST["nickname"];
$day=$_POST["daybirth"];
$month=$_POST["monthbirth"];
$year=$_POST["yearbirth"];
$gender=$_POST["gender"];
$paymethod=$_POST["pay"];
$card=$_POST["cardnumber"];


$filename='data/paylist.txt';
if(file_exists($filename)){
		$handle= fopen($filename, 'a+');
		fwrite($handle, $fullname." ");
		fwrite($handle, $nickname." ");
		fwrite($handle, $email." ");
		fwrite($handle, $day." ");
		fwrite($handle, $month." ");
		fwrite($handle, $gender." ");
		fwrite($handle, $card." ");
		fwrite($handle, $paymethod."\n");
		fclose($handle);

}
// if(isset($_POST["submit"])){

// 	printf("Dear ".$fullname.", Thank you for your order.". "The Bill:$".$_SESSION["totalPrice"]." has been paid succesfully. ");
// 	echo "<p><a href='http://localhost/Travelplan/TravelPlan.html'>Go Back</a></p>";

// }
?>