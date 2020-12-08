<?php
session_start();
unset($_SESSION['yourname']);
header("Refresh:0 ; url = 'http://localhost/Xian-Tourist/Signinup/loginIndex.php'")
?>