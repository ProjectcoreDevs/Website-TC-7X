<?php define('DarkCoreCMS', TRUE); include 'header.php';
if (isset($_SESSION['usr'])) { $user_prw = $_SESSION['usr'];}
$user_account = new account;
?>
	<title><?php echo $websiteTitle; ?></title>
	<script type="text/javascript" src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
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
	<div id='navigate-block'>
		<a class='navigate-item' href='index'>Account create success</a>
	</div>
    <div id="notify">There was an error when logging in recheck your account and password corectly acc and pass are case sensitive</div>
    <?php } ?>
	<div id='content'>
		<div id='index-content-left'>
			<div id='lastnews'>
				<div class='lastnews-head-text'>ACCOUNT CREATED WITH SUCCESS</div>
                <div class="newsdivider"></div>
			</div>
		</div>
		<script type="text/javascript">
			function redirect() {
				window.location='index.php'
			}
			setTimeout('redirect()','2000');
		</script>
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
            <div class="rmlist">set realmlist wotlk.gamingzeta.com</div>
            <?php $realminfo = new realm;
            $realminfo->construct(1);?>
            <div class="realmstat">
                <a href="realm?id=<?php echo $realminfo->realm_id;?>">
                    <img class="gversion" src='images/r-wotlk.png' height='19' alt='username'><div class="realmname"><a href="realm?realm=1/<?php echo urlencode($realminfo->rm_name); ?>" class="realmnamelink"><?php echo $realminfo->rm_name; ?></a></div>
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