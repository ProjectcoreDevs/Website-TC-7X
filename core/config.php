<?php if(!defined('DarkCoreCMS')) { header('Location: ../');} 

/********************************************
************Database configuration***********
********************************************/

$GLOBALS['DB_WEBSITE'] = 'darkcore'; 		// Website database name
$GLOBALS['DB_AUTH'] = 'auth';				// Auth database name of trinitycore 6x
$GLOBALS['DB_CHARACTERS'] = 'characters';	// Characters database name of trinitycore 6x
$GLOBALS['DB_WORLD'] = 'world';				// World database name of trinitycore 6x

function connect($host,$username,$password){
	$con = mysqli_connect('127.0.0.1','root',''); // 'Host', 'username', 'password'
	if (!$con) {
		printf("Connect failed: %s\n", mysqli_connect_error());
		exit();
	}
return $con;
}

/********************************************
************Website configuration************
********************************************/
$websiteTitle = 'Website Beta Title'; // website title in global website
$realmPortal = '127.0.0.1'; // it's your host name or ip for game connexion

?>