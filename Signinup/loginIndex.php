<?php
session_start();
error_reporting(0);
if (!isset($_SESSION["cartItems"])) {
    $_SESSION["cartItems"] = 0;
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Sign up/in</title>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="sign inup.css">
  <!--FONTS-->
  <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@400;700&display=swap" rel="stylesheet">
 
 <script type="text/javascript">
	var inputOk = [false,false];
	
	window.onload=function(){
		var userId= document.getElementById('userId');
		var password= document.getElementById('password');


		userId.onkeyup = function(){
			inputOk[0] = userIdNotEmpty();
		}

		password.onkeyup= function(){
			inputOk[1] = passwordNotEmpty();
		}

	}

	function userIdNotEmpty(userId){
		var flag= document.getElementById('userId');
		if(flag != ""){

			return true;

		}
		else{
			return false;
			
		}
	}
	

	function passwordNotEmpty(password){
		var flag = document.getElementById('password');

		if(flag != ""){

			return true;

		}
		else{
			return false;
			
		}
	}

	
	function allValide(){
		if(inputOk[0] && inputOk[1]){
			
			return true;
		
		}else{
			alert("All field are required");
			return false;
		
		}
	}

 </script>
 
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

	<div class="logIn">
		
		<div class="content">
			

            <form action="login.php" method="post" onsubmit="return allValide()">
				<table cellpadding="0" >
					<tr>
						<td colspan="3" height="30"></td>
					</tr>
					<tr>
						<td width="120px"><span class="require">*</span>User name:</td>
						<td width="220px"><input type="text" id="userId" name="userId"></td>
						
					</tr>
					<tr>
						<td colspan="3" height="10"></td>
					</tr>
					<tr>
						
						<td><span class="require">*</span>Password:</td>
						<td><input type="text" id="password" name="password"/></td>
						
					</tr>
			
					
					<tr>
						<td colspan="3" height="10"></td>
					</tr>

					<tr>
                        <td></td>
						<td>
                            <input id = "login_button" type="submit" name="login" value="login">
                            
                        </td>
                
					</tr>
				</table>
			</form>
			
		
		</div>
		
	</div>
	
</body>
</html>