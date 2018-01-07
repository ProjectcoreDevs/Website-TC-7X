<?php session_start();
include_once 'core/functions.php';
$auth = new Auth;
$system = new System;
$system->db = $db;
if($auth->isLogged()){
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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
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
						<h3 class="panel-title">Welcome to the store, <?=$acc->username?></h3>
					</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-md-9 col-lg-9"> 
								<table class="table">
									<tbody>
										<tr>
											<td><h4>Filters :</h4></td>
											<td><select class="form-control"><option>Server</option></select></td>
											<td><select class="form-control"><option>Characters</option></select></td>
											<td><select class="form-control"><option>Categories</option></select></td>
											<td><button class="btn btn-theme">Apply</button></td>
										</tr>
									</tbody>
								</table>
								<table class="table">
									<tbody>
										<tr>
											<td><img src="assets/images/coffre.jpg" width="30px"/> Product Test test</td>
											<td>1 point</td>
											<td><button class="btn btn-theme">Add to cart</button></td>
										</tr>
										<tr>
											<td><img src="assets/images/coffre.jpg" width="30px"/> Product Test</td>
											<td>1 point</td>
											<td><button class="btn btn-theme">Add to cart</button></td>
										</tr>
										<tr>
											<td><img src="assets/images/coffre.jpg" width="30px"/> Product Test test</td>
											<td>4 points</td>
											<td><button class="btn btn-theme">Add to cart</button></td>
										</tr>
										<tr>
											<td><img src="assets/images/coffre.jpg" width="30px"/> Product Test test</td>
											<td>3 points</td>
											<td><button class="btn btn-theme">Add to cart</button></td>
										</tr>
										<tr>
											<td><img src="assets/images/coffre.jpg" width="30px"/> Product Test</td>
											<td>2 points</td>
											<td><button class="btn btn-theme">Add to cart</button></td>
										</tr>
										<tr>
											<td><img src="assets/images/coffre.jpg" width="30px"/> Product Test</td>
											<td>1 point</td>
											<td><button class="btn btn-theme">Add to cart</button></td>
										</tr>
										<tr>
											<td><img src="assets/images/coffre.jpg" width="30px"/> Product Test test</td>
											<td>2 points</td>
											<td><button class="btn btn-theme">Add to cart</button></td>
										</tr>
										<tr>
											<td><img src="assets/images/coffre.jpg" width="30px"/> Product Test</td>
											<td>8 points</td>
											<td><button class="btn btn-theme">Add to cart</button></td>
										</tr>
									</tbody>
								</table>
							</div>
							<div class="col-md-3 col-lg-3 " align="center">
								<table class="table">
									<tbody>
										<tr>
											<td><h3>My cart</h3></td>
										</tr>
										<tr>
											<td><img src="assets/images/coffre.jpg" width="20px"/> Product Test test</td>
											<td><?=$acc->credit?></td>
										</tr>
										<tr>
											<td><h3>Total : </h3></td>
											<td><h3>0</h3></td>
										</tr>
									</tbody>
								</table>
								<button class="btn btn-theme btn-md btn-block">Checkout</button>
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
					echo '<li><a href="#" data-toggle="modal" data-target=".loginCo">Login</a></li>';
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