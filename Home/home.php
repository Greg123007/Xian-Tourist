<?php
session_start();
error_reporting(0);
if (!isset($_SESSION["cartItems"])) {
    $_SESSION["cartItems"] = 0;
};
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>HOME</title>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="home.css">
  <!--FONTS-->
  <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@400;700&display=swap" rel="stylesheet">
 </head>
<body>
	<header>
		<div class="main">
			<div class="logo">
				<img class="logo" src="sunshine.png">
			</div>
			<ul>
                <li><a href="../Signinup/afterlogin.php"><?php
          		if(isset($_SESSION["yourname"])){
           		echo "<span>Hi,",$_SESSION['yourname']," !</span>";
          		}else{
            	echo "<span><a href='../Signinup/loginIndex.php'>Login</a></span>";
          		}
        		?></a></li>
				<li class="active"><a href="../Home/home.php">Home</a></li>
				<li><a href="../About/About.php">About</a></li>
				<li><a href="../Signinup/signinup.php">Sign up/in</a></li>
				<li><a href="../project/TravelPlan.php">Travel Plan</a></li>
				<li><a href="../project/accommodation.php">Hotel</a></li>
				<li><a href="../project/attractions.php">Views & Eat</a></li>
			</ul>
            <div class="cart"><a href="../project/ShoppingCart.php"><img src="../project/images/cart.png" alt="cart"></a>Shopping Cart <span class="red">(<?php echo $_SESSION["cartItems"] ?> )</span></div>
		</div>
		<div class="title">
			<h1>Welcome To SunShine</h1>
		</div>

		<div class="Btn">
			<a href="http://localhost/Xian-Tourist/About/about.php" class="btn">About us</a>
			<a href="http://localhost/Xian-Tourist/Signinup/signinup.php" class="btn">Sign up/in</a>
		</div>
	</header>
</body>
</html>