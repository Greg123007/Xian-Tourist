<?php
	session_start();

	if(isset($_POST["submit"]) && isset($_POST["submit"]) == "Submit"){
	//get information
	//-------------------------------

		$user_name = $_POST['username'];
		
		$user_id = $_POST['userid'];
	    
	    $user_password = $_POST['password'];
	  	
	  	$user_phone = $_POST['phone'];
	  
	    $user_email = $_POST['email'];
		

	    $_SESSION['user_name'] = $user_name;
	    $_SESSION['user_id'] = $user_id;
	    $_SESSION['user_password'] = $user_password;
	    $_SESSION['user_phone'] = $user_phone;
	    $_SESSION['user_email'] = $user_email;

		$uFound = 0;	
	//checkid(optional)
	//-----------------------------
	  	$file = file("userInfo.txt");
	  	foreach ($file as $line) {
	  		$detail = explode(' ', $line);  		
	  		if($detail[1] == $user_id){
				$uFound = 1;
				break;
			}	
	  	}


		if($uFound == 1){			
			unset($_SESSION['user_id']);
			

			echo "<script>alert('Sorry! Account exists! Please try again.')</script>";
			header("Refresh:0 ; url = 'signinup.php'");
		}else{
	  		$file = fopen("userInfo.txt","a");
	  		$info = $user_name." ".$user_id." ".$user_password." ".$user_phone." ". $user_email." ";
			fwrite($file, "{$info}\r\n");
			fclose($file);

			unset($_SESSION['user_name']);
			unset($_SESSION['user_id']);
			unset($_SESSION['user_password']);
			unset($_SESSION['user_phone']);
			unset($_SESSION['user_email']);

			echo "<script>alert('Congratulations! Account has been created!')</script>";
	  		header("Refresh: 0;url = 'loginIndex.php'");
	  	}


	}

/*

	//write to userInfo
	//-----------------------------
		$file = fopen("userInfo.txt", "a");
	  		 		name          account
		$info = $user_name." ".$user_id." ".$user_password." ".$user_phone." ". $user_email." ";
		fwrite($file, "{$info}\r\n");
		fclose($file);
	}




	//checkid(optional)
	//-----------------------------

	header("Refresh: 0;url =login.html");
	// echo "<p><a href='http://localhost/Xian-Tourist/Home/home.html'>Back</a></p>";

*/
?>



