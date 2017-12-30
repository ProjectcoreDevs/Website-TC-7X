<?php define('DarkCoreCMS', TRUE); include 'header.php'; if (isset($_SESSION['usr'])) { $user_prw = $_SESSION['usr'];}
$user_account = new account;
?>
	<title><?php echo $websiteTitle; ?></title>
	<script type="text/javascript"
		src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
</head>
<body>
	<div id="fb-root"></div>
	<script>(function(d, s, id) {
		var js, fjs = d.getElementsByTagName(s)[0];
		if (d.getElementById(id)) return;
		js = d.createElement(s); js.id = id;
		js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.3";
		fjs.parentNode.insertBefore(js, fjs);
		}(document, 'script', 'facebook-jssdk'));
	</script>
	<div id='header'>

	</div>
	<?php include 'menu.php';
        if (isset($_GET["errlogin"])){
    ?>
    <div id="notify">There was an error when logging in recheck your account and password corectly acc and pass are case sensitive</div>
    <?php } ?>
	<div id='navigate-block'>
		<a class='navigate-item' href='index'>Home</a>-<a class='navigate-item' href='news'>News</a>
	</div>
	<div id='content'>
		<div id='index-content-left'>
			<div id='lastnews'>
				<div class='lastnews-head-text'>All News & Announcements</div>
                <div class="newsdivider"></div>
				<?php $data_news = new news;
				$getAllNews = $data_news->get_all_news();
				for ($i=1;$i<=count($getAllNews);$i++) {?>
					<div class='newsthumb'>
						<div class='newsthumbicon'><a href="#"><img src='images/avatars/darksoke.png' alt='<?php echo $getAllNews[$i]['title'];?>' width="100%" height="100%"/></a></div>
						<div class='newsthumbbody'>
							<div class='newsthumbtitle'><?php echo $getAllNews[$i]['title'];?></div>
							<div class='newsthumbresult'><?php echo strip_tags(substr($getAllNews[$i]['body'], 0, 300)); ?>...</div>
							<div class='newsthumbbutton'>
								<div class='thb-left'>
									<label style='color:#72BF8B;'>By </label><label style='font-size:14px !important;color:#9a0000;'><?php echo $getAllNews[$i]['autor'];?></label>
									<label style='color:#72BF8B;'> in <?php echo substr($getAllNews[$i]['date'],0,10); ?> </label>
								</div>
								<div class="news-thb-right"><a href='news?id=<?php echo $getAllNews[$i]['id']; ?>' class='lastnews-right-text'>Read this...</a></div>

							</div>
						</div>
					</div>
				<?php } ?>
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
    <script>
        function getvideo($code){
            $(document).ready(function() {
                $('#abc_frame').attr('src','https://www.youtube.com/embed/'+$code);
            })
        }
    </script>
<script type="text/javascript">SkinnyTip.init();</script>
</body>
<?php include 'global-footer.php' ?>
</html>