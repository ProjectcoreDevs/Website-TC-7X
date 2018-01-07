<?php session_start();
include_once 'core/functions.php';
$auth = new Auth;
$system = new System;
$system->db = $db;
?>
<!DOCTYPE html>
<html lang="en" class="full-height">

<head>
    <!-- Required meta tags always come first -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Website Title</title>
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
							<div class="navbar-brand" href="index.php">Website Title</div>
						</div>
						<ul class="nav navbar-nav flex-item hidden-xs pull-right">
							<li><a href="#">Home</a></li>
							<li><a href="#">Download</a></li>
							<li><a href="#">Forum</a></li>
							<li><a href="#">Bugtracker</a></li>
							<?php if($auth->isLogged()){
								echo '<li><a href="#">Account</a></li>';
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
								<li><a href="#">Login</a></li>
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
						<h3 class="panel-title">Welcome, PseudoTest</h3>
					</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-md-3 col-lg-3 " align="center">
								<img alt="User Avatar" src="assets/images/no-avatar.png" class="img-circle img-responsive">
								<button class="btn btn-theme btn-xs pull-right"><span class="fa fa-pencil"></span></button>
							</div>
							<div class="col-md-9 col-lg-9"> 
								<table class="table">
									<tbody>
										<tr>
											<td>Username :</td>
											<td class="editUsernameText">PseudoTest</td>
											<td class="editUsernameInput" style="display:none;"><input type="text" class="form-control editUsername" placeholder="Username" required/></td>
										</tr>
										<tr>
											<td>Email :</td>
											<td class="editEmailText">test@test.com</td>
											<td class="editEmailInput" style="display:none;"><input type="email" class="form-control editEmail" placeholder="Email" required/></td>
										</tr>
										<tr>
											<td>Password :</td>
											<td class="editPasswordText">*****</td>
											<td class="editPasswordInput" style="display:none;">
												<input type="password" class="form-control editPassword" placeholder="Password" required/>
											</td>
										</tr>
										<tr class="editPasswordConfirmInput" style="display:none;">
											<td>Confirm Password :</td>
											<td>
												<input type="password" class="form-control editRepassword" placeholder="Repeat password" required/>
											</td>
										</tr>
										<tr class="submitEdit" style="display:none;">
											<td>Validate :</td>
											<td><button class="btn btn-sm btn-theme send-edit-profile pull-right"><span class="fa fa-refresh"></span> Update my profile</button></td>
										</tr>
										<tr>
											<td>Rank :</td>
											<td>Player</td>
										</tr>
										<tr>
											<td>Date of register :</td>
											<td>01/24/1988</td>
										</tr>
										<tr>
											<td>Last update :</td>
											<td>01/24/1988</td>
										</tr>
										<tr>
											<td>Last connect :</td>
											<td>1 hour</td>
										</tr>
										<tr>
											<td>Last IP :</td>
											<td>127.0.0.1</td>
										</tr>
										<tr>
											<td>My characters :</td>
											<td>2</td>
										</tr>
										<tr>
											<td>My VIP points :</td>
											<td>2</td>
										</tr>
									</tbody>
								</table>
								<a href="#" type="button" class="btn btn-theme">My orders</a>
								<a href="#" type="button" class="btn btn-theme">Manage my characters</a>
							</div>
						</div>
					</div>
					<div class="panel-footer">
						<a href="#" type="button" class="btn btn-sm btn-theme send-disconnect">Disconnect</a>
						<span class="pull-right">
							<a href="#" type="button" class="btn btn-sm btn-theme edit-profile" title="Edit my profile"><i class="glyphicon glyphicon-edit"></i></a>
						</span>
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
				<a href="#">Home</a>
				<span>|</span>
				<a href="#">Download</a>
				<span>|</span>
				<a href="#">Forum</a>				
				<span>|</span>
				<a href="#">Bugtracker</a>
				<span>|</span>
				<a href="#">Login</a>
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