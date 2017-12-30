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
		<a class='navigate-item' href='index'>Home</a>-<a class='navigate-item' href='register'>Register</a>
	</div>
	</div>
	<div id='content'>
		<div id='index-content-left'>
			<div id='user-box'>
				<div class='reg-alts-part-tree'>
					<div class='user-head-text'>Register new account</div>
					<div class="newsdivider"></div>
					<center>
						<form action="core/do_register.php" method="post" enctype="multipart/form-data">
							<table>
								<tr>
									<td><input class='reg-input' type="text" name="username" placeholder="Username*" required></td>
								</tr>
								<tr>
									<td><input class='reg-input' type="email" name="email" placeholder="Email*" required></td>
								</tr>
								<tr>
									<td><input class='reg-input' type="password" name="Password" autocomplete='off' placeholder="Password*" required></td>
								</tr>
								<tr>
									<td><input class='reg-input' type="password" name="RepeatPassword" autocomplete='off' placeholder="Repeat password*" required></td>
								</tr>
								<tr>
									<td>
										<select name="Expansion">
											<option value="0" select="selected">None</option>
											<option value="1">TBC</option>
											<option value="2">WotLK</option>
											<option value="3">Cataclysm</option>
											<option value="4">Mist Of Pandaria</option>
											<option value="5">Warlord Of Draenor</option>
										</select>
									</td>
								</tr>
							</table>
							<input id='user-submit' type='submit' name='regsubmit' 	value='Register new Account'>
						</form>
						<span class='reg-mark'>All (*) marked fields are required !</span>
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
				<?php } else { $user_account->construct(ucfirst($user_prw));?>
					<div id='inforow' class="skinnytip" data-text="<div class='miniinfo'>This field represent your registrar email</div>">
						<div class='inforowdesc'>Email:</div>
						<div class='inforowresult'><?php echo $user_account->email; ?></div>
					</div>
					<div id='inforow' class="skinnytip" data-text="<div class='miniinfo'>This field represent the last time when you logged ingame</div>">
						<div class='inforowdesc'>Session:</div>
						<div class='inforowresult'><?php echo $user_account->last_login; ?></div>
					</div>
					<div id='inforow' class="skinnytip" data-text="<div class='miniinfo'>This field represent your last login IP</div>">
						<div class='inforowdesc'>Last IP:</div>
						<div class='inforowresult'><?php echo $user_account->last_ip; ?></div>
					</div>
					<div id='inforow' class="skinnytip" data-text="<div class='miniinfo'>This field represent your rank</div>">
						<div class='inforowdesc'>Rank:</div>
						<div class='inforowresult' style='color:#<?php echo namecolor($user_account->gmlevel,$user_account->VipLevel) ?>'><?php echo strtoupper(rankstring($user_account->gmlevel,$user_account->VipLevel)); ?></div>
					</div>
					<div id='inforow' class="skinnytip" data-text="<div class='miniinfo'>This represent your total Vote Points</div>">
						<div class='inforowdesc'>Vote Points:</div>
						<div class='inforowresult'><?php echo $user_account->vp; ?></div>
					</div>
					<div id='inforow' class="skinnytip" data-text="<div class='miniinfo'>This represent your total Donation Points</div>">
						<div class='inforowdesc'>Donation Points:</div>
						<div class='inforowresult'><?php echo $user_account->dp; ?></div>
					</div>
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
