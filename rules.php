<?php define('DarkCoreCMS', TRUE); include 'header.php' ;?>
	<title><?php echo $websiteTitle; ?> - <?php echo ucwords( str_ireplace(array('-', '.php'), array(' ', ''), basename($_SERVER['PHP_SELF']) ) )?></title>
</head>
<body>
<div id='header'></div>
	<?php include 'menu.php';?>
	<div id='navigate-block'>
		<a class='navigate-item' href='index'>Home</a>-<a class='navigate-item' href='rules'>Rules</a>
	</div>
	<div id='content'>
		<div id='content-wrapper'>
			<div id='rules-body'>
				<div class='title'>Rules and Frequently Asked Questions</div>
				<?php $rules = get_rules(3);  for ($i=1;$i<=count($rules);$i++) { ?>
					<?php echo rewrite_body($rules[$i]['body']).'<br>'; ?>
				<?php } ?>
			</div>
		</div>
	</div>
</body>
<?php include 'global-footer.php' ?>
</html>
