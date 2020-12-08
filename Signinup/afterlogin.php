<?php
session_start();
$name = $_SESSION["yourname"];
$email = $_SESSION["youremail"];
$phoneNum = $_SESSION["yourphoneNum"];
$account = $_SESSION["youraccount"];

//echo "$name";
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>HOME</title>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="../Home/home.css">
  <!--FONTS-->
  <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@400;700&display=swap" rel="stylesheet">
 
<style type="text/css">
*{
	margin: 0;
	padding: 0;
	box-sizing: border-box;
}

header{
/*背景变暗*/
	background-image:linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.5)), url("http://up.deskcity.org/pic_source/70/bf/fa/70bffad4d4ea498ede0baffbe62276b7.jpg");
	height: 100vh;
	background-size: cover;
	background-position: center;
}

body{
    font-family: 'Source Sans Pro', sans-serif;
}

ul{
	float: left;
	list-style-type: none;
	margin-top: 35px;
	margin-left: 200px;
}
ul li{
	/*全部一行显示*/
	display: inline-block;
	font: normal bolder 20px 'Source Sans Pro', sans-serif;


}
ul li a{
	text-decoration: none;
	color:#fff;
	padding: 5px 20px;
	border: 2px solid transparent;
	/*消失用0.8秒*/
	transition: 0.8s ease;
}
ul li a:hover{
	background-color: #fff;
	color: black;
}
/*home始终有颜色*/
ul li.active a{
	background-color: #fff;
	color: #000;
}



.logo{
	width: 150px;
	float: left;
}
.main{
	max-width: 1400px;
	margin:auto;
}
.title{
	position: absolute;
	top: 50%;
	left: 50%;
	transform: translate(-50%,-50%);
}
.title h1{
	color: #ffff;
	font-size: 50px;

}
.Btn{
	position: absolute;
	top: 60%;
	left: 50%;
	transform: translate(-50%,-50%);
}
.btn{
	border:2px solid #ffff;
	padding: 10px 30px;
	color: #ffff;
	font:normal 25px 'Source Sans Pro', sans-serif;
	text-decoration: none;
	transition: 0.6s ease;
}
.btn:hover{
	background-color: #fff;
	color: black;
}


</style>




</head>
<body>
	<header>
		<div class="main">
			<div class="logo">
				<img class="logo" src="sunshine.png">
			</div>
			<ul>
				<!--login/out-->
				<li class="active"><a href="../Signinup/afterlogin.php"><?php
					if(isset($_SESSION["yourname"])){
						echo "<span>Hi,",$_SESSION['yourname']," !</span>";
					}else{
						echo "<a href='loginIndex.php'>Login</a>";
					}
				?></a></li>
				<li><a href="../Home/home.php">Home</a></li>
				<li><a href="../About/About.php">About</a></li>
				<li><a href="../Signinup/signinup.php">Sign up/in</a></li>
				<li><a href="../project/TravelPlan.php">Travel Plan</a></li>
				<li><a href="../project/accommodation.php">Hotel</a></li>
				<li><a href="../project/attractions.php">Views & Eat</a></li>
			</ul>
            <div class="cart"><a href="../project/ShoppingCart.php"><img src="../project/images/cart.png" alt="cart"></a>Shopping Cart <span class="red">(<?php echo $_SESSION["cartItems"] ?> )</span></div>
		</div>
		<div class="title">
			<?php echo "<h1>$name ,welcome to sunshine</h1>" ;?>
		</div>

		<div class="Btn">
			<a href="http://localhost/Xian-Tourist/project/TravelPlan.php" class="btn">Traval Plan</a>
			<a href="http://localhost/Xian-Tourist/project/accommodation.php" class="btn">Hotel</a>
			<a href="http://localhost/Xian-Tourist/Signinup/logout.php" class="btn">Log Out</a>
		</div>
	</header>











</body>
</html>