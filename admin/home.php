<?php require_once 'functions/general_functions.php'; if (!isset($_SESSION)) { session_start(); }?>
<html xmlns="http://www.w3.org/1999/xhtml"> 
	<head>		
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />		
		<title>Admin Zone</title>		
		<link rel="stylesheet" href="css/reset.css" type="text/css" media="screen" />	  
		<link rel="stylesheet" href="css/style.css" type="text/css" media="screen" />		
		<link rel="stylesheet" href="css/invalid.css" type="text/css" media="screen" />	
		<script type="text/javascript" src="js/jquery-1.3.2.min.js"></script>
		<script type="text/javascript" src="js/jquery.config.js"></script>
		<script type="text/javascript" src="js/facebox.js"></script>
		<script type="text/javascript" src="js/jquery.wysiwyg.js"></script>
		<script type="text/javascript" src="js/jquery.date.js"></script>
		<script type="text/javascript" language="javascript">
		function session(){
		window.location="elogin.php"; //page de déconnexion
		}
		setTimeout("session()",600000); // 600000 = 10 minutes / 1000 = 1 seconde
		</script>
	</head>
	<body>
<?php if(isset($_SESSION['username'])) {?>
		<div id="body-wrapper">		
			<div id="sidebar">
				<div id="sidebar-wrapper">			
					<h1 id="sidebar-title"><a href="#">Admin Zone</a></h1>
					<a href="#"><img id="logo" src="images/logo.png" alt="Simpla Admin logo" /></a>
					<div id="profile-links">
						Hello, <a href="#" title="Edit your profile">"Username"</a><br />
						<br />
						<a href="../" target="_blank" title="View the Site">View the Site</a> | <a href="elogin.php" title="Sign Out">Sign Out</a>
					</div>
					<ul id="main-nav">
						<li>
							<a href="home.php" class="nav-top-item no-submenu current">Dashboard</a>       
						</li>
						<li> 
							<a href="account.php" class="nav-top-item">Accounts</a>
							<ul>
								<li><a href="account.php">General</a></li>
								<li><a href="#">Add account</a></li>
							</ul>
						</li>
						<li> 
							<a href="characters.php" class="nav-top-item">Characters</a>
							<ul>
								<li><a href="characters.php">General</a></li>
								<li><a href="#">Manage characters</a></li>
							</ul>
						</li>
						<li>
							<a href="#" class="nav-top-item">Forum</a>
							<ul>
								<li><a href="#">General</a></li>
								<li><a href="#">Manage category</a></li>
							</ul>
						</li>
						<li>
							<a href="#" class="nav-top-item">BugTracker</a>
							<ul>
								<li><a href="#">General</a></li>
								<li><a href="#">Manage category</a></li>
							</ul>
						</li>
						<li>
							<a href="#" class="nav-top-item">Characters debug</a>
							<ul>
								<li><a href="#">General</a></li>
								<li><a href="#">Add option</a></li>
							</ul>
						</li>
						<li>
							<a href="#" class="nav-top-item">Item store</a>
							<ul>
								<li><a href="#">General</a></li>
								<li><a href="#">Add item</a></li>
								<li><a href="#">Orders</a></li>
							</ul>
						</li>
					</ul>
				</div>
			</div>		
			<div id="main-content">
				<div class="notification information png_bg">
					<a href="#" class="close"><img src="images/icons/cross_grey_small.png" title="Close this notification" alt="close" /></a>
					<div>
						Information : This panel is reserved to Admins of this website !
					</div>
				</div>
				<h2>Welcome "Username"</h2>
				<p id="page-intro">What would you like to do?</p>				
				<ul class="shortcut-buttons-set">					
					<li>
						<a class="shortcut-button" href="account.php">
							<span>
								<img src="images/icons/pencil_48.png" alt="icon" /><br />View accounts
							</span>
						</a>
					</li>					
					<li>
						<a class="shortcut-button" href="#">
							<span>
								<img src="images/icons/pencil_48.png" alt="icon" /><br />View characters
							</span>
						</a>
					</li>					
					<li>
						<a class="shortcut-button" href="#">
							<span>
								<img src="images/icons/pencil_48.png" alt="icon" /><br />View guilds
							</span>
						</a>
					</li>					
					<li>
						<a class="shortcut-button" href="#">
							<span>
								<img src="images/icons/image_add_48.png" alt="icon" /><br />View item store
							</span>
						</a>
					</li>					
					<li>
						<a class="shortcut-button" href="#messages" rel="modal">
							<span>
								<img src="images/icons/comment_48.png" alt="icon" /><br />View complaints
							</span>
						</a>
					</li>				
				</ul>
				<div class="clear"></div>
				<div class="content-box">
					<div class="content-box-header">					
						<h3>Last 5 accounts created</h3>
						<div class="clear"></div>					
					</div>
					<div class="content-box-content">
						<div class="tab-content default-tab" id="tab1">
							<div class="notification attention png_bg">
								<a href="#" class="close"><img src="images/icons/cross_grey_small.png" title="Close this notification" alt="close" /></a>
								<div>
									This is a 5 last accounts created on the website. You can close this notification or <a href="account.php">click here</a> for view the account panel.
								</div>
							</div>						
							<table>							
								<thead>
									<tr>
										<th>Name</th>
										<th>Email</th>
										<th>Join</th>
										<th>Online</th>
										<th>Option</th>
									</tr>								
								</thead>
								<tbody>
									<?php $acc = get_last_accounts();
									for ($i=1;$i<=count($acc);$i++) { ?>
									<tr>
										<td><a href="#tab2?username=<?php echo $acc[$i]['id']?>" title="name"><?php echo $acc[$i]['username']?></a></td>
										<td><?php echo $acc[$i]['email']?></td>
										<td><?php echo $acc[$i]['joindate']?></td>
										<td><?php if ($acc[$i]['online']==1) {?>
											<img src="images/icons/tick_circle.png" alt="Yes" />
											<?php } else {?><img src="images/icons/cross.png" alt="No" />
											<?php } ?>
										</td>
										<td>
											 <a href="#" title="Edit"><img src="images/icons/pencil.png" alt="Edit" /></a>
											 <a href="#" title="Delete"><img src="images/icons/cross.png" alt="Delete" /></a> 
											 <a href="#" title="Edit Meta"><img src="images/icons/hammer_screwdriver.png" alt="Edit Meta" /></a>
										</td>
									</tr>
									<?php } ?>
								</tbody>							
							</table>						
						</div>						
					</div>
				</div>
				<div class="content-box">
					<div class="content-box-header">
						<h3>Last 5 characters created</h3>
						<div class="clear"></div>					
					</div>
					<div class="content-box-content">						
						<div class="tab-content default-tab" id="tab1">
							<div class="notification attention png_bg">
								<a href="#" class="close"><img src="images/icons/cross_grey_small.png" title="Close this notification" alt="close" /></a>
								<div>
									This is a 5 last characters created on the game. You can close this notification or <a href="characters.php">click here</a> for view the characters panel.
								</div>
							</div>						
							<table>							
								<thead>
									<tr>
										<th>Name</th>
										<th>Race</th>
										<th>Class</th>
										<th>Level</th>
										<th>Map</th>
										<th>Option</th>
									</tr>								
								</thead>
								<tbody>
									<?php $character = get_last_characters();
									for ($i=1;$i<=count($character);$i++) { ?>
									<tr>
										<td><a href="#tab2?username=<?php echo $character[$i]['guid'];?>" title="name"><?php echo $character[$i]['name'];?></a></td>
										<td><?php echo $character[$i]['race'];?></td>
										<td><?php echo $character[$i]['class'];?></td>
										<td><?php echo $character[$i]['level'];?></td> 
										<td>
										<?php $maps = get_map($character[$i]['map']);
										echo $maps['name']; ?></td>
										<td>
											 <a href="#" title="Edit"><img src="images/icons/pencil.png" alt="Edit" /></a>
											 <a href="#" title="Delete"><img src="images/icons/cross.png" alt="Delete" /></a> 
											 <a href="#" title="Edit Meta"><img src="images/icons/hammer_screwdriver.png" alt="Edit Meta" /></a>
										</td>
									</tr>
									<?php } ?>
								</tbody>							
							</table>						
						</div>						
					</div>
				</div>
				<div class="content-box">
					<div class="content-box-header">
						<h3>Last 5 forum messages created</h3>
						<div class="clear"></div>					
					</div>
					<div class="content-box-content">						
						<div class="tab-content default-tab" id="tab1">
							<div class="notification attention png_bg">
								<a href="#" class="close"><img src="images/icons/cross_grey_small.png" title="Close this notification" alt="close" /></a>
								<div>
									This is a 5 last forum messages created on the website. You can close this notification or <a href="#">click here</a> for view the forum panel.
								</div>
							</div>						
							<table>
								work in progress !
							</table>						
						</div>						
					</div>
				</div>
				<div class="content-box">
					<div class="content-box-header">
						<h3>Last 5 bugs created</h3>
						<div class="clear"></div>					
					</div>
					<div class="content-box-content">						
						<div class="tab-content default-tab" id="tab1">
							<div class="notification attention png_bg">
								<a href="#" class="close"><img src="images/icons/cross_grey_small.png" title="Close this notification" alt="close" /></a>
								<div>
									This is a 5 last bugs created on the website. You can close this notification or <a href="#">click here</a> for view the bugtracker panel.
								</div>
							</div>						
							<table>
								work in progress !
							</table>						
						</div>						
					</div>
				</div>
				<div class="clear"></div>
				<div id="footer">
					<small>
							&#169; Copyright 2016 | Powered by <a href="#">ProjectCoreDevs</a> | <a href="#">Top</a>
					</small>
				</div>
			</div>
		</div>
<?php } else { ?>
		<div id="body-wrapper">	
			<div id="main-content">
					<div class="notification error png_bg">
					<a href="#" class="close"><img src="images/icons/cross_grey_small.png" title="Close this notification" alt="close" /></a>
					<div>
						This panel is reserved to Admins of this website ! Please contact the webste developper for resolve this problem!
					</div>
				</div>
			</div>
		</div>
		<?php } ?>
	</body>
</html>
