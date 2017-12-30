<?php define('DarkCoreCMS', TRUE);
	include 'header.php';?>
	<title><?php echo $websiteTitle; ?> - <?php echo ucwords( str_ireplace(array('-', '.php'), array(' ', ''), basename($_SERVER['PHP_SELF']) ) )?></title>
</head>
<body>
<?php if (!isset($_SESSION['usr'])) { ?>
	<div id='header'>
	</div>
	<?php include 'menu.php';
	 if (isset($_GET["regerror"])){
         get_reg_errors($_GET['regerror']);
    } ?>
	<div id='navigate-block'>
		<a class='navigate-item' href='index'>Home</a>-<a class='navigate-item' href='login'>Login</a>
	</div>
	</div>
	<div id='content'>
		<div id='index-content-left'>
			<div id='user-box'>
				<div class='reg-alts-part-tree'>
					<div class='user-head-text'>Login to my account</div>
					<div class="newsdivider"></div>
					<center>
						<form action='core/do_login.php' method='post' autocomplete='off' enctype='multipart/form-data'>
							<table>
								<tr>
									<td><input class='reg-input' type="text" name="login_username" placeholder="Username" required></td>
								</tr>
								<tr>
									<td><input class='reg-input' type="password" name="login_password" autocomplete='off' placeholder="Password" required></td>
								</tr>
							</table>
							<input id='submit' type='submit' name='login' value='Login'>
						</form></br>
						<a href=''><span class='reg-mark'>Forgot your password?</span></a>
					</center>
				</div>
			</div>
		</div>
		<div id='index-content-right'>
            <div class='acclogin-info'>
                <div class='acclogin-info-head-text'>ACCOUNT <?php if (isset($user_prw)){echo "- <a href='user' class='accnamelink'>".strtoupper($user_prw)."</a>";}; ?></div>
                <div class="newsdivider"></div>
                <div class='loggedas'>
                <?php if (!isset($_SESSION['usr'])) {?>
					<form action='core/do_login.php' method='post'  autocomplete='off' enctype='multipart/form-data'>
                        <input style="display:none">
                        <input type="password" style="display:none">
                        <input value=''  name='login_username' class='usrinput' placeholder="Username" autocomplete="off" type='text' />
						<input value=''  name='login_password' class='usrinput' style="margin-top:5px;" placeholder="Password" autocomplete="off" type='password' />
						<input value='Login' name='login' id='submit' type='submit'>
                        <a href='register' /><div class='submit-submenu'>Register</div></a>
                    </form>
				<?php } ?>
                </div>
            </div>
            <div class="connectionguide"></div>
            <div class="dpatches"></div>
            <div class="rmlist">set realmlist <?php echo $realmPortal; ?></div>
            <?php $realminfo = new realm;
            $realminfo->construct(1);?>
            <div class="realmstat">
                <a href="realm?id=<?php echo $realminfo->realm_id;?>">
                    <img class="gversion" src='images/r-wod.png' height='19' alt='username'><div class="realmname"><a href="realm?realm=1/<?php echo urlencode($realminfo->rm_name); ?>" class="realmnamelink"><?php echo $realminfo->rm_name; ?></a></div>
                    <div class="realminfo">Online: <?php echo $realminfo->total_online;?>/250
                    Alliance: <?php echo $realminfo->alliance;?> Horde: <?php echo $realminfo->horde;?></div>
                </a>
            </div>
        </div>
	</div>
</body>
<?php include 'global-footer.php' ?>
<?php } else { 
header('Location: user.php');
} ?>
</html>
