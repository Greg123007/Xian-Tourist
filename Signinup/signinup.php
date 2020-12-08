<?php
session_start();



?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Sign up/in</title>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="sign inup.css">
  <!--FONTS-->
  <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@400;700&display=swap" rel="stylesheet">
 <script type="text/javascript" src="register.js"></script>


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
                        echo "<span> Hi,",$_SESSION['yourname']," !</span>";
                    }else{
                        echo "<span><a href='../Signinup/loginIndex.php'>Login</a></span>";
                    }
                    ?></a></li>
                <li><a href="../Home/home.php">Home</a></li>
                <li><a href="../About/About.php">About</a></li>
                <li  class="active"><a href="../Signinup/signinup.php">Sign up/in</a></li>
                <li><a href="../project/TravelPlan.php">Travel Plan</a></li>
                <li><a href="../project/accommodation.php">Hotel</a></li>
                <li><a href="../project/attractions.php">Views & Eat</a></li>
            </ul>
            <div class="cart"><a href="../project/ShoppingCart.php"><img src="../project/images/cart.png" alt="cart"></a>Shopping Cart <span class="red">(<?php echo $_SESSION["cartItems"] ?> )</span></div>
		</div>	
	</header>

	<div class="reg">
		
		<div class="content">
			

            <form action="register.php" method="post" onsubmit="return allValide();">
				<table cellpadding="0" >
					<tr>
						<td colspan="3" height="30"></td>
					</tr>
					<tr>
						<td width="120px"><span class="require">*</span>User name:</td>
						<td width="220px"><input name="username" type="text" id="username" placeholder="Your name" value="<?php if(isset($_SESSION['user_name'])){
								echo $_SESSION['user_name'];
							}?>"></td>
						<td width="200px" id="info"><span id="announcement_yourName">any characters</span></td>
					</tr>

					

					<tr>
						<td colspan="3" height="10"></td>
					</tr>





					<tr>
						<td width="120px"><span class="require">*</span>User ID:</td>
						<td width="220px"><input name="userid" id="name" type="text" placeholder="Ex: abc" value="<?php if(isset($_SESSION['user_id'])) {
								echo $_SESSION['user_id'];
							}?>"></td>
						

						<td width="200px" id="info"><span id="announcement_userName">3-15 characters long</span></td>
					</tr>
					

					<tr>
						<td colspan="3" height="10"></td>
					</tr>
					


					<tr>
						
						<td><span class="require">*</span>Password:</td>
						<td><input type="password" id="password" name="password" placeholder="Ex: Ab12+#$" value="<?php if(isset($_SESSION['user_password'])) {
								echo $_SESSION['user_password'];
							}?>" /></td>
						<td width="200px" id="info"><span id="announcement_Password">Please enter your password.</span></td>
					</tr>
			

					<tr>
						<td colspan="3" height="10"></td>
					</tr>
					



					<tr>
						<td  width="200px"><span class="require">*</span>Phone number:</td>
						<td><input type="text" name="phone" id="phone" placeholder="Ex: 1-xxx-xxx-xxxx" value="<?php if(isset($_SESSION['user_phone'])) {
								echo $_SESSION['user_phone'];
							}?>"></td>
						<td width="200px" id="info"><span id="announcement_phoneNumber">Please enter your phone number</span></td>
					</tr>
					

					<tr>
						<td colspan="3" height="10"></td>
					</tr>
					


					<tr>
						<td><span class="require">*</span>Email:</td>
						<td><input type="text" name="email" id="email" placeholder="Ex: xxx@gmail.com" value="<?php if(isset($_SESSION['user_email'])) {
								echo $_SESSION['user_email'];
							}?>"/></td>
						<td width="200px" id="info" ><span id="announcement_email">Please enter your email</span></td>
					</tr>

					
					<tr>
						<td colspan="3" height="10"></td>
					</tr>
					
					
					<tr>
						<td><div id="checkCode" class="code" ></div></td>

						<td colspan="2"><span id="changeCode" onclick="createCode(4)">Can't see clearly?Change one</span></td>
					</tr>

					<tr>
						<td><span class="require">*</span>Verification code:</td>

						<td><input type="text" id="inputCode" style="float:left;"></td>

						<td width="200px" id="info"><span id="announcement_code"></span></td>
					</tr>



					<tr>
                        <td></td>
						<td>
                            <input id = "submit-button" type="submit" name="submit" value="Submit">
                            <input id="reset-button" type="reset" value="Reset">
                        </td>
                        <td><div class="goLogin-box">
                            <a href="loginIndex.php" style="text-decoration: underline;">To log in</a></div></td>
					</tr>
				</table>
			</form>
			
		
		</div>
		
	</div>
	
</body>
</html>