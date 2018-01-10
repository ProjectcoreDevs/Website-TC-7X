<?php session_start();
include_once 'core/functions.php';
$auth = new Auth;
$system = new System;
$system->db = $db;
if($auth->isLogged()){
	$realms = $db->query("SELECT * FROM ".$auth_database.".realmlist");
	$accs = $db->query("SELECT * FROM ".$web_database.".account WHERE auth_account='".$_SESSION['cms_user_id']."'");
	$acc = $accs->fetch_object();
	$chars = $db->query("SELECT * FROM ".$characters_database.".characters WHERE account='".$_SESSION['cms_user_id']."'");
	if($acc->credit == null)
		$credit = '0';
	else
		$credit = $acc->credit;
	$numChars = $chars->num_rows;
	
?>
<!DOCTYPE html>
<html lang="en" class="full-height">

<head>
    <!-- Required meta tags always come first -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title><?=$websiteTitle?></title>
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/font-awesome.min.css" rel="stylesheet">
</head>

<body onload="initCharacters();">
	<div id="video-fond">
		<video autoplay loop>
			<source type="video/webm" src="assets/images/header-illidan.webm">
		</video>
	</div>
	<div class="modal fade loadingShow" >
		<div class="cssload-bell">
			<div class="cssload-circle">
				<div class="cssload-inner"></div>
			</div>
			<div class="cssload-circle">
				<div class="cssload-inner"></div>
			</div>
			<div class="cssload-circle">
				<div class="cssload-inner"></div>
			</div>
			<div class="cssload-circle">
				<div class="cssload-inner"></div>
			</div>
			<div class="cssload-circle">
				<div class="cssload-inner"></div>
			</div>
		</div>
    </div>
    <header>
		<nav class="navbar navbar-default navbar-doublerow navbar-trans navbar-fixed-top">
			<nav class="navbar navbar-top hidden-xs">
				<div class="container">
					<ul class="nav navbar-nav pull-left">
						<li><a href="#" class="icoRss" title="Rss"><i class="fa fa-rss"></i></a></li>
						<li><a href="#" class="icoFacebook" title="Facebook"><i class="fa fa-facebook"></i></a></li>
						<li><a href="#" class="icoTwitter" title="Twitter"><i class="fa fa-twitter"></i></a></li>
						<li><a href="#" class="icoGoogle" title="Google +"><i class="fa fa-google-plus"></i></a></li>
						<li><a href="#" class="icoLinkedin" title="Linkedin"><i class="fa fa-linkedin"></i></a></li>
					</ul>
					<ul class="nav navbar-nav pull-right">
						<li><a href="#" class="text-white">Language</a></li> 
					</ul>
				</div>
				<div class="dividline light-grey"></div>
			</nav>
			<nav class="navbar navbar-down">
				<div class="container">
					<div class="flex-container">  
						<div class="navbar-header flex-item">
							<div class="navbar-brand" href="index.php"><?=$websiteTitle?></div>
						</div>
						<ul class="nav navbar-nav flex-item hidden-xs pull-right">
							<li><a href="index.php">Home</a></li>
							<li><a href="#">Download</a></li>
							<li><a href="#">Forum</a></li>
							<li><a href="#">Bugtracker</a></li>
							<?php if($auth->isLogged()){
								echo '<li><a href="account.php">Account</a></li>
								<li><a href="store.php">Store</a></li>';
							}
							else{
								echo '<li><a href="#" data-toggle="modal" data-target=".loginCo">Login</a></li>';
							} ?>
							
							<li><a href="#">Help</a></li>
						</ul>
						<div class="dropdown visible-xs pull-right">
							<button class="btn btn-default dropdown-toggle " type="button" id="dropdownmenu" data-toggle="dropdown">
								<span class="glyphicon glyphicon-align-justify"></span> 
							</button>
							<ul class="dropdown-menu">
								<li><a href="#">Home</a></li>
								<li><a href="#">Forum</a></li> 
								<li><a href="#">Bugtracker</a></li> 
								<?php if($auth->isLogged()){
									echo '<li><a href="account.php">Account</a></li>
									<li><a href="store.php">Store</a></li>';
								}
								else{
									echo '<li><a href="#" data-toggle="modal" data-target=".loginCo">Login</a></li>';
								} ?>
								<li role="separator" class="divider"></li>
								<li><a href="#">Help</a></li>
							</ul>
						</div>
					</div>  
				</div>
			</nav>
		</nav>
	</header>
	</br>
	</br>
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 mnt5" >
				<div class="panel panel-theme">
					<div class="panel-heading">
						<h3 class="panel-title">Welcome to the characters manager, <?=$acc->username?></h3>
					</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-md-9 col-lg-9"> 
								<table class="table">
									<tbody class="charactersResult"></tbody>
								</table>
							</div>
							<div class="col-md-3 col-lg-3"> 
								<table class="table">
									<tbody>
										<h3 style="border-bottom:2px solid #fff;padding-bottom:5px;">Unlock character</h3>
										<select class="form-control" style="margin-bottom:5px;">
											<option>Select a server</option>
										</select>
										<select class="form-control" style="margin-bottom:5px;">
											<option>Select your Character</option>
										</select>
										<button class="btn btn-theme btn-block">Unlock</button>
									</tbody>
								</table>
								<table class="table">
									<tbody>
										<h3 style="border-bottom:2px solid #fff;padding-bottom:5px;">Our servers</h3>
										<img src="assets/images/exp-legion-icon.png" width="60px"/> Server Name <img src="assets/images/online.png" width="10px"/>
									</tbody>
								</table>
							</div>
						</div>
					</div>
					<div class="panel-footer">
						<a href="#" type="button" class="btn btn-sm btn-theme send-disconnect">Disconnect</a>
					</div>
				</div>
			</div>
		</div>
    </div>
	</br>
	</br>
	</br>
	<div class="col-md-12">
		<div class="footer-bottom">
			<div class="container">
				<span> © 2018 Copyright Website Title.All Rights Reserved</span>
				<span>|</span>
				<a href="#">Privacy Policy</a>
				<div class="pull-right">
				<a href="index.php">Home</a>
				<span>|</span>
				<a href="#">Download</a>
				<span>|</span>
				<a href="#">Forum</a>				
				<span>|</span>
				<a href="#">Bugtracker</a>
				<span>|</span>
				<?php if($auth->isLogged()){
					echo '<a href="account.php">Account</a>
					<span>|</span>
					<a href="store.php">Store</a>';
				}
				else{
					echo '<a href="#" data-toggle="modal" data-target=".loginCo">Login</a>';
				} ?>
				<span>|</span>
				<a href="#">Help</a>
				</div>
			</div>
		</div>
	</div>
    <!--Main Layout-->
    <script type="text/javascript" src="assets/js/jquery.min.js"></script>
    <script type="text/javascript" src="assets/js/custom.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
</body>
</html>
<?php 
}
else{
	header('Location:index.php');
}
?>