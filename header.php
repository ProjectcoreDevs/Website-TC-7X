<?php if (!isset($_SESSION)) {
	session_start();
	}
	require_once 'core/config.php';
	require_once 'core/functions/account_functions.php';
	require_once 'core/functions/board_functions.php';
	require_once 'core/functions/bugtracker_functions.php';
	require_once 'core/functions/character_functions.php';
	require_once 'core/functions/global_functions.php';
	require_once 'core/functions/guides_functions.php';
	require_once 'core/functions/news_functions.php';
	require_once 'core/functions/store_functions.php';
	require_once 'core/functions/realm_functions.php';
	require_once 'core/functions/vote_functions.php';
	
	if(isset($_GET['lang']))
	{
		if ($_GET['lang']=='fr'){
		$lang='fr';
		}
		else if ($_GET['lang']=='en'){
		$lang='en';
		}
	}
	else
		$lang = 'en';

	if ($lang=='fr')
	 include('languages/french.php');
	elseif ($lang=='en')
		 include('languages/english.php');
	 
	setcookie("lang","",0); 
	$expire = 365*24*3600;
	setcookie('lang', $lang, time() + $expire);
?>
<!DOCTYPE HTML>
<html lang="en">
<head>	
	<meta charset="UTF-8">    
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="description" content="Website Beta WOD 6.2.3">
    <meta name="keywords" content="Gaming,Website,6.2.3,Warlords of Draenor,MOP,WoD">
	<link rel="stylesheet" type="text/css" href="css/style.css" title="Default Styles" media="screen">	
	<link rel="stylesheet" type="text/css" href="css/armory.css" title="Default Styles" media="screen">	
    <link rel="stylesheet" type="text/css" href="css/board.css" title="Default Styles" media="screen" />
	<script type="text/javascript" src="js/skinnytip.js"></script>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

