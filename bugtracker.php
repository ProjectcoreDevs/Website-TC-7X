<?php define('DarkCoreCMS', TRUE);
include 'header.php'; ?>
    <title><?php echo $websiteTitle; ?> - <?php echo ucwords( str_ireplace(array('-', '.php'), array(' ', ''), basename($_SERVER['PHP_SELF']) ) )?> </title>
</head>
<body>
	<div id='header'>
	</div>
    <?php include 'menu.php';?>
    <div id="notify">Bugracker is not coded yet until beta release</div>
	<div id='content'>
        
    </div>
<script type="text/javascript">SkinnyTip.init();</script>
</body>
<?php include 'global-footer.php' ?>
</html>