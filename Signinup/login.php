<?php
	session_start();
	
	if(isset($_POST['login']) && $_POST['login'] == 'login'){
		
		$post_userId = $_POST['userId'];
		$post_password = $_POST['password'];
		
		
		$YON = 0;
		$file = file("userInfo.txt");

		foreach ($file as $line) {
			$detail = explode(' ', $line);
			if($detail[1] == $post_userId && $detail[2] == $post_password){
				$YON = 1;
				$yourname = $detail[0];
				$youraccount = $detail[1];
				$yourphoneNum = $detail[3];
				$youremail = $detail[4];

				break;
			}else{
				$YON = 0;
				
			}
		}
		
		if ($YON == 1) {
			$_SESSION["yourname"] = $yourname;
			$_SESSION["youraccount"] = $youraccount;
			$_SESSION["yourphoneNum"] = $yourphoneNum;
			$_SESSION["youremail"] = $youremail;


			echo "<script>alert('Login successful!')</script>";
			echo"<p><a href='http://localhost/Xian-Tourist/Signinup/afterlogin.php'>Next</a></p>";
			//header("Refresh:0 ; url='http://localhost/Xian-Tourist/Signinup/afterlogin.php'");
		}
		else{
			echo "<script>alert('We don't have your account. Please try again.')</script>";
			//echo"<p><a href='http://localhost/Xian-Tourist/Signinup/login.html'>Back</a></p>";
			header("Refresh:0 ; url='http://localhost/Xian-Tourist/Signinup/login.html'");
		}	
	}
?>