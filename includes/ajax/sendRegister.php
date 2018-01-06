<?php session_start();
include_once("../../core/functions.php");
$system = new System;
$system->db = $db;

if(isset($_GET['regUsername']) && isset($_GET['regEmail']) && isset($_GET['regPassword']) && isset($_GET['regRePassword'])){
	if(!empty($_GET['regUsername']) || !empty($_GET['regEmail']) || !empty($_GET['regPassword']) || !empty($_GET['regRePassword'])){
		if($_GET['regPassword'] == $_GET['regRePassword']){
			$getEmail = $db->query("SELECT * FROM ".$auth_database.".account WHERE email='".$_GET['regEmail']."'");
			if($getEmail->num_rows == 0){
				$getUsername = $db->query("SELECT * FROM ".$auth_database.".account WHERE username='".$_GET['regUsername']."'");
				if($getUsername->num_rows == 0){
					$encrypt_password = strtoupper(bin2hex(strrev(hex2bin(strtoupper(hash("sha256",strtoupper(hash("sha256", strtoupper($_GET['regEmail'])).":".strtoupper($_GET['regPassword']))))))));
					$createBnetAccount = $db->query("INSERT INTO ".$auth_database.".battlenet_accounts (email, sha_pass_hash) VALUES ('".$_GET['regEmail']."','".$encrypt_password."')");
					if($createBnetAccount){
						$battlenet = $db->query("SELECT * FROM ".$auth_database.".battlenet_accounts WHERE email='".$_GET['regEmail']."'");
						$bNet = $battlenet->fetch_object();
						$bNetID = $bNet->id;
						$createAccount = $db->query("INSERT INTO ".$auth_database.".account (username, sha_pass_hash, email, reg_mail, battlenet_account, battlenet_index) VALUES ('".$_GET['regUsername']."','".$encrypt_password."','".$_GET['regEmail']."','".$_GET['regEmail']."','".$bNetID."','1')");
						if($createAccount){
							$getUserAccount = $db->query("SELECT * FROM ".$auth_database.".account WHERE email='".$_GET['regEmail']."'");
							$getUserInfos = $getUserAccount->fetch_object();
							$userAccID = $getUserInfos->id;
							$regIP = $_SERVER['REMOTE_ADDR'];
							$createWebsiteAccount = $db->query("INSERT INTO ".$web_database.".account (username, password, email, avatar, battlenet_account, auth_account, register_date, lastIP) VALUES
							('".$_GET['regUsername']."','".$encrypt_password."','".$_GET['regEmail']."','no-avatar.png','".$bNetID."','".$userAccID."','".time()."','".$regIP."')");
							if($createWebsiteAccount){
								$_SESSION['cms_auth'] = true;
								$_SESSION['cms_email'] = $_GET['regEmail'];
								$_SESSION['cms_username'] = $_GET['regUsername'];
								$_SESSION['cms_user_id'] = $userAccID;
								echo 1;
							}
							else{
								echo 'Une erreur de compte c\'est produite, contactez l\'administrateur !';
							}
						}
						else{
							echo 'Une erreur de compte c\'est produite, contactez l\'administrateur !';
						}
					}
					else{
						echo 'Une erreur de compte Bnet c\'est produite, contactez l\'administrateur !';
					}
				}
				else{
					echo 'Le Pseudo est déjà utilisé !';
				}
			}
			else{
				echo 'L\'adresse Email est déjà utilisée !';
			}
		}
		else{
			echo 'Les mots de passe ne sont pas identiques !';
		}
	}
	else{
		echo 'Vous devez renseigner tous les champs !';
	}
}



?>