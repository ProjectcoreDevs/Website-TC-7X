<?php define('DarkCoreCMS',TRUE);
	include 'config.php'; 
	include 'functions/global_functions.php';
	$_error= '';
	if (!isset($_POST['username']) || !isset($_POST['email']) || !isset($_POST['Password']) || !isset($_POST['RepeatPassword']) || !isset($_POST['Expansion'])){
		$_error = $_error . 'regerror=1&errtype=';
		header('Location: ../register?'.$_error);
	}
	else {
		if (check_user_exist($_POST['username']) > 0)
			$_error = $_error . 'A';
		if (strlen($_POST['username'])  < 3)
			$_error = $_error . 'B';
		if (strlen($_POST['Password'])  < 8)
			$_error = $_error . 'C';
		if (check_email_exist($_POST['email']) > 0)
			$_error = $_error . 'D';
		if (strlen($_POST['email'])  < 10) 
			$_error = $_error . 'E';
		if ($_POST['Password'] != $_POST['RepeatPassword'])
			$_error = $_error . 'F';
		if (strlen($_error) > 0)
			header('Location: ../register?regerror=1'.$_error);
		else {
			$username = $_POST['username'];
			$password = $_POST['Password'];
			$email = strtoupper($_POST['email']);
			$bnetPassword = bnet_encrypt($email, $password);
			register_bnet_user($email,$bnetPassword);
			$accPassword = encrypt($username, $password);			
			$bnet_accID = req_bnetAccountID($email);
			register_user($username,$accPassword,$email,$_POST['Expansion'],$bnet_accID);			
			header('Location: ../create_success.php?user='.$username);
		}
	}
?>