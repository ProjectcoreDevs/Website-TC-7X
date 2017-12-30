<!--
GUIDES PAGE: Progress 25%
MAIN AUTHOR: Darksoke & ProjectcoreDevs
-->
<?php define('DarkCoreCMS', TRUE); include 'header.php' ;?>
	<title><?php echo $websiteTitle; ?> - <?php echo ucwords( str_ireplace(array('-', '.php'), array(' ', ''), basename($_SERVER['PHP_SELF']) ) )?></title>
	<script type="text/javascript" src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
</head>
<body>
	<div id='header'></div>
	<?php include 'menu.php';?>
	<div id='navigate-block'>
		<a class='navigate-item' href='index'>Home</a>-<a class='navigate-item' href='guides'>Guides</a>
	</div>
	<div id='content'>
		<div id='content-wrapper'>
			<div id='guide-body' style='display: block;'>
				<div id='guide-main-description'>
					<?php $data_guides = new guides;
					$getGuidesData = $data_guides->get_guides_data();
					for ($i=1;$i<=count($getGuidesData);$i++) {?>
						<h1 class='content-wrapper-title' style='color:#61D17E !important;'><a name="guide1"><?php echo $getGuidesData[$i]['title']; ?></a></h1>
						<span class='guide-box-divider'></span></br>
						<p><?php echo $getGuidesData[$i]['body']; ?></p></br>
						<a href="<?php echo $getGuidesData[$i]['link']; ?>" target="_blank"><?php echo $getGuidesData[$i]['link_body']; ?></p>
					<?php } ?>
				</div>
			</div>
		</div><div id='index-content-right'>
            <div class='acclogin-info'>
                <div class='acclogin-info-head-text'>ACCOUNT <?php if (isset($user_prw)){echo "- <a href='user' class='accnamelink'>".strtoupper($user_prw)."</a>";}; ?></div>
                <div class="newsdivider"></div>
                <div class='loggedas'>
                <?php if (!isset($_SESSION['usr'])) {?>
					<form action='core/do_login.php' method='post'  autocomplete='off' enctype='multipart/form-data'>
                        <input style="display:none">
                        <input type="password" style="display:none">
                        <input value='' name='login_username' class='usrinput' placeholder="Username" autocomplete="off" type='text' />
						<input value='' name='login_password' class='usrinput' style="margin-top:5px;" placeholder="Password" autocomplete="off" type='password' />
						<input value='Login' name='login' id='submit' type='submit'>
                        <a href='register' /><div class='submit-submenu'>Register</div></a>
                    </form>

				<?php } else {
					$account= get_acc_info_by_user();
					for ($i=1;$i<=count($account);$i++) {?>
					<div id='inforow' class="skinnytip" data-text="<div class='miniinfo'>This field represent your registrar email</div>">
						<div class='inforowdesc'>Email:</div>
						<div class='inforowresult'><?php echo $account[$i]['email']; ?></div>
					</div>
					<div id='inforow' class="skinnytip" data-text="<div class='miniinfo'>This field represent the last time when you logged ingame</div>">
						<div class='inforowdesc'>Session:</div>
						<div class='inforowresult'><?php echo $account[$i]['last_login']; ?></div>
					</div>
					<div id='inforow' class="skinnytip" data-text="<div class='miniinfo'>This field represent your last login IP</div>">
						<div class='inforowdesc'>Last IP:</div>
						<div class='inforowresult'><?php echo $account[$i]['last_ip']; ?></div>
					</div>
					<div id='inforow' class="skinnytip" data-text="<div class='miniinfo'>This field represent your rank</div>">
						<div class='inforowdesc'>Rank:</div>
						<div class='inforowresult'><?php echo $account[$i]['rank']; ?></div>
					</div>
					<div id='inforow' class="skinnytip" data-text="<div class='miniinfo'>This represent your total Vote Points</div>">
						<div class='inforowdesc'>Vote Points:</div>
						<div class='inforowresult'><?php echo $account[$i]['vp']; ?></div>
					</div>
					<div id='inforow' class="skinnytip" data-text="<div class='miniinfo'>This represent your total Donation Points</div>">
						<div class='inforowdesc'>Donation Points:</div>
						<div class='inforowresult'><?php echo $account[$i]['dp']; ?></div>
					</div>
				<?php } } ?>
                    </div>
            </div>
            <div class="connectionguide"></div>
            <div class="dpatches"></div>
            <div class="rmlist">set portal <?php echo $realmPortal; ?></div>
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
</html>
