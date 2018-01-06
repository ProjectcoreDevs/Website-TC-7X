<?php
    // Database Configuration
    $_dbhost = '127.0.0.1';					// host
    $_dbuser = 'root';						// database username
    $_dbpass = 'password';					// database password
	
	$web_database = 'cms_database';			// Name of the website database
	$auth_database = 'auth';				// Name of the 'auth' database
	$characters_database = 'characters';	// Name of the 'characters' database
    
    $db = new mysqli($_dbhost, $_dbuser, $_dbpass) or die('MySQL Error');

	$websiteTitle = 'cms title';			// Name of the website
?>