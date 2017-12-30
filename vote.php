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
		<a class='navigate-item' href='index'>Home</a>-<a class='navigate-item' href='user'>My account</a>-<a class='navigate-item' href='vote'>Vote for us</a>
	</div>
	<div id='content'>
		<div id='index-content-left'>
			<div class='lastnews-head-text'><?php echo ucwords($user_prw) ?>'s User Vote Panel</div>
			<div class="newsdivider"></div>
			<div id="user-box">
				<div class='lastnews-head-text-nobg' style="text-align:center;margin-bottom:5px;font-size:16px;">VOTE PANEL</div>
				<div id='vote-links-box'>
					<?php
					$date = new DateTime();
					$cur_time = $date->getTimestamp();
					$vote_sites = get_vote_sites();
						for ($i=1;$i<=count($vote_sites);$i++){
							$expire = get_expir_time($user_account->acc_id,$vote_sites[$i]['id']);
							if ($cur_time > $expire )
								$rem = 0;
							else
								$rem = time2string($expire - $cur_time);
							?>
							<div class='vote-box'>
								<div class='name-box'><?php echo $vote_sites[$i]['title'] ?></div>
									<?php if ($rem == 0){ ?>
										 <a id="vote-button" href="core/do_vote?siteid=<?php echo $vote_sites[$i]['id']; ?>&user=<?php echo $account[$j]['id']; ?>" target='_blank' onclick="location.reload(true)">
										 	<img src="<?php echo $vote_sites[$i]["logo"] ?>" border="0" alt="private server" width="88" height="51"/>
										 </a>
									<?php } else { ?>
										 <img src="images/votenew.jpg" border="0" alt="private server" width="88" height="51" />
									<?php } ?>
								<div class='points-box'>Points: <?php $day_number = idate('w', $cur_time); if ($day_number == 6 || $day_number == 0) echo $vote_sites[$i]['end_week_points']; else echo $vote_sites[$i]['points']; ?></div>
								<div id="vote-button" onclick="location.reload(true)" class='time-rem'><?php if ($rem == 0) echo 'You can vote now'; else echo $rem ?></div>
							</div>
						<?php } ?>
				</div>
			</div>
			<?php } ?>
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
</html>
