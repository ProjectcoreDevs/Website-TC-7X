<?php include 'languages/english.php';
    // Database Configuration
    $_dbhost = '127.0.0.1';					// host
    $_dbuser = 'root';						// database username
    $_dbpass = 'password';					// database password
	
	$web_database = 'db_website';			// website database
	$auth_database = 'auth';				// auth database
	$characters_database = 'characters';	// characters database
    
    $db = new mysqli($_dbhost, $_dbuser, $_dbpass) or die('MySQL Error');

	$websiteTitle = 'cms title';			// Name of the website
?>