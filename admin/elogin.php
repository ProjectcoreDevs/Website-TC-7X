<?php
include 'functions/general_functions.php';
if(isset($_SESSION['username']))
{
	unset($_SESSION['username']);
}
else
{
	if (!isset($_SESSION)) { 
		session_start(); 
	}
	if (isset($_POST['username'], $_POST['password'], $_POST['securityPass'])){
		$username = $_POST['username'];
		$password = $_POST['password'];
		$securityPass = $_POST['securityPass'];
		$reqRank = check_user_rank($username);
		$pass = admin_encrypt($username, $password);
		$check_result = admin_login($username,$pass);
		if($securityPass == $adminSecurityPass){
			if ($reqRank == 'yes'){
				if ($check_result == 'yes'){
					$_SESSION['username'] = $username;
					header('Location: home.php');
				}
				else
					header('Location: index.php?errlogin=0'); // username and password doesn't match
			}
			else
				header('Location: index.php?errlogin=1'); // rank 1 required
		}
		else
			header('Location: index.php?errlogin=2'); // security code
	}
	else 
		header('Location: index.php?errlogin=3'); // username, password or security-code are empty
}
	?>