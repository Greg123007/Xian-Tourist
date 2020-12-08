<?php
include "public.php";
  session_destroy();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Shopping Cart</title>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="css/Shopping Cart.css">
<!--FONTS-->
<link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@400;700&display=swap" rel="stylesheet">
</head>

<body>
<header>
  <div class="main">
    <div class="logo"> <img class="logo" src="images/sunshine.png"> </div>
    <ul>
        <li><?php
            if(isset($_SESSION["yourname"])){
                echo "<span>Hi,",$_SESSION['yourname']," !</span>";
            }else{
                echo "<span><a href='../Signinup/loginIndex.php'>Login</a></span>";
            }
            ?></li>
        <li class="#"><a href="../Home/home.php">Home</a></li>
        <li><a href="../About/About.php">About</a></li>
        <li><a href="../Signinup/signinup.php">Sign up/in</a></li>
      <li><a href="TravelPlan.php">Travel Plan</a></li>
      <li><a href="accommodation.php">Hotel</a></li>
      <li><a href="attractions.php">Play & Eat</a></li>
    </ul>
    <div class="cart"><a href="ShoppingCart.php"><img src="images/cart.png" alt="cart"></a>Shopping Cart <span class="red">(<?php echo $_SESSION["cartItems"] ?> )</span></div>
  </div>
  <br/>
  <br/>
  <br/>
  <br/>
  <br/>
</header>
<div class="container">
<div class="box">
  <h1>Thank you for your order. Have a great day!</h1>
  <div><img src="images/successful.png" alt="successful"></div>
  <div class="backhome"><a href="accommodation.php">Return to Home</a></div>
  </div>
</div>
</body>
</html>