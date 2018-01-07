<?php session_start();
include_once("../core/functions.php");
$system = new System;
$system->db = $db;

if(isset($_GET['logEmail']) && isset($_GET['logPassword'])){
	if(!empty($_GET['logEmail']) || !empty($_GET['logPassword'])){
		$getEmail = $db->query("SELECT * FROM ".$web_database.".account WHERE email='".$_GET['logEmail']."'");
		if($getEmail->num_rows == 1){
			$encrypt_password = strtoupper(bin2hex(strrev(hex2bin(strtoupper(hash("sha256",strtoupper(hash("sha256", strtoupper($_GET['logEmail'])).":".strtoupper($_GET['logPassword']))))))));
			$getAccount = $db->query("SELECT * FROM ".$web_database.".account WHERE email='".$_GET['logEmail']."'");
			$getAccountInfo = $getAccount->fetch_object();
			if($encrypt_password == $getAccountInfo->password){
				$_SESSION['cms_auth'] = true;
				$_SESSION['cms_email'] = $getAccountInfo->email;
				$_SESSION['cms_username'] = $getAccountInfo->username;
				$_SESSION['cms_user_id'] = $getAccountInfo->auth_account;
				$db->query("UPDATE ".$web_database.".account SET lastIP='".$_SERVER['REMOTE_ADDR']."', lastConnect=".time()." WHERE email='".$_GET['logEmail']."'");
				echo 1;
			}
			else{
				echo 'Le mot de passe est incorrect !';
			}
		}
		else{
			echo 'L\'adresse Email n\'existe pas !';
		}
	}
	else{
		echo 'Vous devez renseigner tous les champs !';
	}
}



?>