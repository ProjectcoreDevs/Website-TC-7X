<?php define('DarkCoreCMS', TRUE); include 'header.php' ?>
	<title><?php echo $websiteTitle; ?> - <?php echo ucwords( str_ireplace(array('-', '.php'), array(' ', ''), basename($_SERVER['PHP_SELF']) ) )?></title><script type="text/javascript" src="//wow.zamimg.com/widgets/power.js"></script><script>var wowhead_tooltips = { "colorlinks": true, "iconizelinks": true, "renamelinks": true }</script>
</head>
<body>
<?php if (isset($_SESSION['usr'])) { ?>
	<div id='header'>
	</div>
	<?php include 'menu.php';?>
	<div id='navigate-block'>
		<a class='navigate-item' href='index'>Home</a>-<a class='navigate-item' href='user'>My account</a>-<a class='navigate-item'>Store</a>
	</div>
	<div id='content'>
		<div id='index-content-left'>
			<div class='lastnews-head-text'>Store</div>
			<div class="newsdivider"></div>
			<div id='user-box'>
				<?php $storeProducts = get_item_store();
				for ($i=1;$i<=count($storeProducts);$i++) { ?>
				<form action='core/do_store.php' method='post' autocomplete='off' enctype='multipart/form-data'>
					<div id="userbox-left">
						<input value='Buy this item for <?php if($storeProducts[$i]['dp_price']==0) { echo $storeProducts[$i]['vp_price']; echo ' vp points';} else { echo $storeProducts[$i]['dp_price']; echo ' dp points'; }?>' name='byitem' id='storebuy' type='submit'>
						<div class="store-box-info"><a href="http://wowhead.com/item=<?php echo $storeProducts[$i]['item_id']; ?>" target="_blank" rel="item=<?php echo $storeProducts[$i]['item_id']; ?>"><?php echo $storeProducts[$i]['name']; ?></a></div>
					</div>
				</form>
				<div class="storesdivider"></div>
				<?php } ?>
			</div>
		</div>
		<div id='index-content-right'>
			<?php if (isset($_SESSION['usr'])){?>
            <div class='store-info'>
                <div class='store-info-head-text'>MY LAST 3 ORDERS</div>
                <div class="newsdivider"></div>
				<?php $accId = get_acc_info_by_user($_SESSION['usr']); for($j=1;$j<=count($accId);$j++){
				$findOrder = get_order_store_by_user_id($accId[$j]['id']); for($i=1;$i<=count($findOrder);$i++){
				if($findOrder[$i]['order_id']>=1) {?>
                <div class='loggedas'>
					<div class='inforowdesc'>Order : <?php echo $findOrder[$i]['order_id']; ?> - <?php echo $findOrder[$i]['item_name']; ?></div>
                </div>
				<?php } else echo "<div class='loggedas'><div class='inforowdesc'>No order found for your account!</div></div>"; ?>
				<?php } } ?>
            </div>
			<?php } ?>
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
