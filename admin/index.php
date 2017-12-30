<?php include 'functions/general_functions.php'; ?>
<html xmlns="http://www.w3.org/1999/xhtml"> 
	<head>		
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />		
		<title>Admin Zone | Sign In</title>
		<link rel="stylesheet" href="css/reset.css" type="text/css" media="screen" />
		<link rel="stylesheet" href="css/style.css" type="text/css" media="screen" />
		<link rel="stylesheet" href="css/invalid.css" type="text/css" media="screen" />
		<!--[if lte IE 7]>
			<link rel="stylesheet" href="css/ie.css" type="text/css" media="screen" />
		<![endif]-->
		<script type="text/javascript" src="js/jquery-1.3.2.min.js"></script>
		<script type="text/javascript" src="js/jquery.config.js"></script>
		<script type="text/javascript" src="js/facebox.js"></script>
		<script type="text/javascript" src="js/jquery.wysiwyg.js"></script>
	</head>  
	<body id="login">
		<div id="login-wrapper" class="png_bg">
			<div id="login-top">			
				<h1>Admin Zone</h1>
				<a href="index.php"><img id="logo" src="images/logo.png" alt="Admin Zone logo" /></a>
			</div>
			<?php if(isset($_GET['errlogin'])){ ?>
				<?php if($_GET['errlogin']==0){ ?>
					<div class="notification error png_bg">
						<a href="#" class="close"><img src="images/icons/cross_grey_small.png" title="Close this notification" alt="close" /></a>
						<div><?php echo $warningError0; ?></div>
					</div>
				<?php } elseif($_GET['errlogin']==1){ ?>
					<div class="notification error png_bg">
						<a href="#" class="close"><img src="images/icons/cross_grey_small.png" title="Close this notification" alt="close" /></a>
						<div><?php echo $warningError1; ?></div>
					</div>
				<?php } elseif($_GET['errlogin']==2){ ?>
					<div class="notification error png_bg">
						<a href="#" class="close"><img src="images/icons/cross_grey_small.png" title="Close this notification" alt="close" /></a>
						<div><?php echo $warningError2; ?></div>
					</div>
				<?php } elseif($_GET['errlogin']==3){ ?>
					<div class="notification error png_bg">
						<a href="#" class="close"><img src="images/icons/cross_grey_small.png" title="Close this notification" alt="close" /></a>
						<div><?php echo $warningError3; ?></div>
					</div>
				<?php }
			}
			elseif(isset($_GET['success'])){ ?>
				<script type="text/javascript">
					function redirect() {
					window.location='home.php'
					}
					setTimeout('redirect()','500');
				</script>
				<h4 class="alert_success"><?php echo $warningSuccess; ?></h4>
			<?php } else {?>
					<h4 class="alert_warning"><?php echo $warningConnect; ?></h4>
			<?php }?>
			<div id="login-content">
				<form action="elogin.php" method="post">
					<p>
						<label>Username</label>
						<input class="text-input" type="text" name="username"/>
					</p>
					<div class="clear"></div>
					<p>
						<label>Password</label>
						<input class="text-input" type="password" name="password"/>
					</p>
					<div class="clear"></div>
					<p>
						<label>Security password</label>
						<input class="text-input" type="password" name="securityPass"/>
					</p>
					<div class="clear"></div>
					<p>
						<input class="button" type="submit" value="Sign In" />
					</p>					
				</form>
			</div>
		</center>
	</section>
		</div>
	</body>  
</html>
