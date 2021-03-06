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
    <link href="assets/css/font-awesome.min.css" rel="stylesheet">
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
						<h3 class="panel-title">Welcome, <?=$acc->username?></h3>
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
											<td class="editUsernameText"><?=$acc->username?></td>
											<td class="editUsernameInput" style="display:none;"><input type="text" class="form-control editUsername" placeholder="Username" value="<?=$acc->username?>" required/></td>
										</tr>
										<tr>
											<td>Email :</td>
											<td class="editEmailText"><?=$acc->email?></td>
											<td class="editEmailInput" style="display:none;"><input type="email" class="form-control editEmail" placeholder="Email" value="<?=$acc->email?>" required/></td>
										</tr>
										<tr>
											<td>Password :</td>
											<td class="editPasswordText">*****</td>
											<td class="editPasswordInput" style="display:none;">
												<input type="password" class="form-control editPassword" placeholder="Confirm your password" required/>
											</td>
										</tr>
										<tr class="changePasswordInput" style="display:none;">
											<td>New password :</td>
											<td>
												<input type="password" class="form-control changePassword" placeholder="new password" required/>
											</td>
										</tr>
										<tr class="changeRePasswordInput" style="display:none;">
											<td>Confirm new password :</td>
											<td>
												<input type="password" class="form-control changeRePassword" placeholder="Confirm your new password" required/>
											</td>
										</tr>
										<tr class="submitChange" style="display:none;">
											<td>Validate :</td>
											<td><button class="btn btn-sm btn-theme send-edit-profile pull-right"><span class="fa fa-refresh"></span> Update my password</button></td>
										</tr>
										<tr class="submitEdit" style="display:none;">
											<td>Validate :</td>
											<td><button class="btn btn-sm btn-theme send-edit-profile pull-right"><span class="fa fa-refresh"></span> Update my profile</button></td>
										</tr>
										<tr>
											<td>Rank :</td>
											<td>
											<?php if($acc->rank==0){
												echo $site['accountRank0'];
											}
											elseif($acc->rank==1){
												echo $site['accountRank1'];
											}
											elseif($acc->rank==2){
												echo $site['accountRank2'];
											}
											elseif($acc->rank==3){
												echo $site['accountRank3'];
											}
											elseif($acc->rank==4){
												echo $site['accountRank4'];
											}
											else{
												echo $site['accountRank0'];
											}?></td>
										</tr>
										<tr>
											<td>Date of register :</td>
											<td><?=date('m/d/Y', $acc->register_date)?></td>
										</tr>
										<tr>
											<td>Last update :</td>
											<td><?=date('m/d/Y', $acc->lastConnect)?></td>
										</tr>
										<tr>
											<td>Last connect :</td>
											<td><?=$system->timeAgo($acc->lastConnect)?></td>
										</tr>
										<tr>
											<td>Last IP :</td>
											<td><?=$acc->lastIP?></td>
										</tr>
										<tr>
											<td>My characters :</td>
											<td><?=$numChars?></td>
										</tr>
										<tr>
											<td>My VIP points :</td>
											<td><?=$acc->credit?> <img src="assets/images/pts.png" width="15px"/></td>
										</tr>
									</tbody>
								</table>
								<a href="unlock-character.php" type="button" class="btn btn-theme">Unlock my character</a>
								<a href="characters.php" type="button" class="btn btn-theme">Manage my characters</a>
								<div class="pull-right">
									<a href="store.php" type="button" class="btn btn-theme">Store</a>
									<a href="#" type="button" class="btn btn-theme">My orders</a>
								</div>
							</div>
						</div>
					</div>
					<div class="panel-footer">
						<a href="#" type="button" class="btn btn-sm btn-theme send-disconnect">Disconnect</a>
						<span class="pull-right">
							<a href="#" type="button" class="btn btn-sm btn-theme edit-profile" title="Edit my profile">Edit my profile</a>
							<a href="#" type="button" class="btn btn-sm btn-theme edit-password" title="Change my password">Change my password</a>
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