<?php define('DarkCoreCMS', TRUE); include 'header.php' ?>
	<title><?php echo $websiteTitle; ?> - <?php echo ucwords( str_ireplace(array('-', '.php'), array(' ', ''), basename($_SERVER['PHP_SELF']) ) )?></title>
</head>
<body>
<?php if (isset($_SESSION['usr'])) { ?>
	<div id='header'>
	</div>
	<?php include 'menu.php';
	$user_account = new account;
	$user_prw = $_SESSION['usr'];
	$user_account->construct(ucfirst($user_prw));
	?>
	<div id='navigate-block'>
		<a class='navigate-item' href='index'>Home</a>-<a class='navigate-item' href='user'>My account</a>-<a class='navigate-item' href='donate'>Donations</a>
	</div>
	<div id='content'>
		<div id='index-content-left'>
			<div class='lastnews-head-text'><?php echo ucwords($user_prw) ?>'s User Donate Panel</div>
			<div class="newsdivider"></div>
			<div id="notify2">Donations panel is not coded ! Developpement in work ...</div>
			<div id="user-box"></div>
		</div>
		<div id='index-content-right'>
            <div class='recruit-info'>
                <div class='recruit-info-head-text'>RECRUIT A FRIENDS</div>
                <div class="newsdivider"></div>
                <div class='loggedas'>
					<?php if (isset($_SESSION['usr'])){?>
					<form action='core/do_recruit.php' method='post'  autocomplete='off' enctype='multipart/form-data'>
						<div id='recruitrow' class="skinnytip" data-text="<div class='miniinfo'>Email address of your friend</div>">
							<div class='inforowdesc'>1. Email:</div>
							<input name='firstEmail' class='emailinput' placeholder="First Friend Email" autocomplete="off" type='text' />
						</div>
						<div id='recruitrow' class="skinnytip" data-text="<div class='miniinfo'>Email address of your friend</div>">
							<div class='inforowdesc'>2 .Email:</div>
							<input name='secEmail' class='emailinput' placeholder="Second Friend Email" autocomplete="off" type='text' />
						</div>
						<div id='recruitrow' class="skinnytip" data-text="<div class='miniinfo'>Email address of your friend</div>">
							<div class='inforowdesc'>3 .Email:</div>
							<input name='thirdEmail' class='emailinput' placeholder="Third Friend Email" autocomplete="off" type='text' />
						</div>
						<input value='Send invitation' name='sendRecruit' id='submit' type='submit'>
					</form>
					<?php } ?>
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
	<script type="text/javascript">SkinnyTip.init();</script>
</body>
<?php include 'global-footer.php' ?>
<?php } else { 
header('Location: index');
} ?>
</html>
