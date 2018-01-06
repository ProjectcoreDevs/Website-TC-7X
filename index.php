<?php require_once 'core/config.php'; ?>
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
							<li><a href="#">Login</a></li>
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
			<div class="dividline light-grey"></div>
		</nav>
	</header>
	</br>
	</br>
	<div class="container">
			<div class="row vertical-gap">
		<div class="col-md-6 index-box">
			<h2>Latest News</h2>
			<img src="assets/images/wow-legion.jpg" class="img-responsive"/>
			<h3>News Title</h3>
			<h5>Test Test Test Test</h5>
			<a href="#" class="pull-right">Read More</a>
		</div>
		<div class="col-md-6 index-box">
			<h1>Join us !</h1>
			<form class="" method="" action="#">
				<div class="form-group">
					<label for="username" class="cols-sm-2 control-label">Username</label>
					<div class="cols-sm-10">
						<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
							<input type="text" class="form-control regUsername"  placeholder="Enter your Username"/>
						</div>
					</div>
				</div>
				<div class="form-group">
					<label for="email" class="cols-sm-2 control-label">Email</label>
					<div class="cols-sm-10">
						<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
							<input type="text" class="form-control regEmail"  placeholder="Enter your Email"/>
						</div>
					</div>
				</div>
				<div class="form-group">
					<label for="password" class="cols-sm-2 control-label">Password</label>
					<div class="cols-sm-10">
						<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
							<input type="password" class="form-control regPassword"  placeholder="Enter your Password"/>
						</div>
					</div>
				</div>

				<div class="form-group">
					<label for="confirm" class="cols-sm-2 control-label">Confirm Password</label>
					<div class="cols-sm-10">
						<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
							<input type="password" class="form-control regRepassword"  placeholder="Confirm your Password"/>
						</div>
					</div>
				</div>

				<div class="form-group ">
					<button class="btn btn-register btn-lg btn-block sendRegister">Register</button>
				</div>
			</form>
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