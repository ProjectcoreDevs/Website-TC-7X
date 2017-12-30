<?php define('DarkCoreCMS', TRUE);
include 'header.php';
$topic = new TopicData;
if (isset($_GET['id'])){
    $error = 0;
    if ($topic->check_topic_exist(convertToIntExtended($_GET['id'])) == true) {
        $topic->get_topics_by_id(convertToIntExtended($_GET['id']));
        if (isset($topic->topic))
            $thread_base = $topic->topic;
    }
    else
        $error = 1;
}
	?>
    <title><?php echo $websiteTitle; ?> - <?php echo ucwords( str_ireplace(array('-', '.php'), array(' ', ''), basename($_SERVER['PHP_SELF']) ) )?> </title>
</head>
<body>
	<div id='header'>
	</div>
    <?php include 'menu.php';?>
	<div id='navigate-block'>
		<a class='navigate-item' href='index'>Home</a>-<a class='navigate-item' href='forum'>Forum</a>-<a class='navigate-item'> Forum topic title</a>
	</div>
	<div id='content'>
		<?php if ($error == 1){ ?>
		<div id="board-notify-frame">The forum you are looking for seems to not exist</div>
		<?php } else { ?>
        <div id="forum-left">
            <div id="forum-category-left">
				<?php $forum = get_category_by_id($_GET['id']); for ($i=1;$i<=count($forum);$i++) { ?>
					<div class='lastnews-head-text'><?php echo $forum[$i]['title']; ?></div>
				<?php } ?>
				<div class="newsdivider"></div>
				<?php $fpost = get_all_posts_by_forum_id($_GET['id']);
				for ($j=1;$j<=count($fpost);$j++) { ?>
					<div class="forum-line">
						<a href="topic.php?id=<?php echo $fpost[$j]['id'] ?>/<?php echo urlencode($fpost[$j]['title']) ?>">
							<div class="forum-icon-place"><img src="<?php echo $fpost[$j]['icon'] ?>" class="forum-icon"/></div>
							<div class="f-title-desc">
								<div class="f-title"><?php echo $fpost[$j]['title'] ?></div>
								<div class="f-desc"><?php echo substr($fpost[$j]['body'], 0, 45); ?>...</div>
							</div>
						</a>
						<div class="l-info-latest">
							<a href="player.php?usrId=<?php echo $fpost[$j]['autor']; ?>"><div style="color:#<?php echo namecolor(get_rank_byid($fpost[$j]['autor'])); ?>;font-size:12px">Started by <?php echo ucfirst(strtolower(get_username_byid($fpost[$j]['autor']))); ?></div></a>
							<div style="color:#717B7A;font-size:12px"><?php echo $fpost[$j]['date']; ?></div>
							<?php if ($fpost[$j]['date']==1) echo '<div style="color:#34df00;font-size:12px">Open</div>'; else echo '<div style="color:#d20000;font-size:12px">Closed</div>'; ?>
						</div>
					</div>
				<?php } ?>
            </div>
        </div>
        <?php } ?>
            <div id='forum-right'>
                <?php $stats= new ForumStats; $stats->construct(); $i=1;?>
                <div class='lastnews-head-text'>Recent Topics</div>
                <div class="newsdivider"></div>
                <?php foreach($stats->latest_topics as $topics) {?>
                <div class="right-info-latest">
                    <a href="topic.php?id=<?php echo $stats->latest_topics[$i]['id'];?>/<?php echo urlencode($stats->latest_topics[$i]['title']);?>"><div style="color:#A1E8B9;padding-top:5px;font-size:16px"><?php echo $stats->latest_topics[$i]['title']; ?></div></a>
                    <a href="player.php?usrId=<?php echo $stats->latest_topics[$i]['autor']; ?>"><div style="color:#<?php echo namecolor(get_rank_byid($stats->latest_topics[$i]['autor'])); ?>;font-size:14px"><?php echo ucfirst(strtolower(get_username_byid($stats->latest_topics[$i]['autor']))); ?></div></a>
                    <div style="color:#717B7A;font-size:12px"><?php echo $stats->latest_topics[$i]['date']; ?></div>
                </div>
                <?php $i++; } $i=1;?>
                <div class='lastnews-head-text'>Latest Posts</div>
                <div class="newsdivider"></div>
                <?php foreach($stats->latest_posts as $posts) { $topicbyid = $stats->get_topic_by_id($stats->latest_posts[$i]['topic_id']);?>
                    <div class="right-info-latest">
                        <a href="topic.php?id=<?php echo $topicbyid['id']; ?>/<?php echo urlencode($topicbyid['title']);?>"><div style="color:#A1E8B9;padding-top:5px;font-size:16px"><?php echo $stats->latest_posts[$i]['body']; ?></div></a>
                        <a href="player.php?usrId=<?php echo $stats->latest_posts[$i]['autor']; ?>"><div style="color:#<?php echo namecolor(get_rank_byid($stats->latest_posts[$i]['autor'])); ?>;font-size:14px"><?php echo ucfirst(strtolower(get_username_byid($stats->latest_posts[$i]['autor']))); ?></div></a>

                        <div style="color:#717B7A;font-size:12px"><?php echo $stats->latest_posts[$i]['date']; ?></div>
                    </div>
                    <?php $i++; } ?>
                <div class='lastnews-head-text'>Statistics</div>
                <div class="newsdivider"></div>
                <div class="right-info-latest">
                    <div class="statistics-label">Total Accounts:</div><div class="statistics-values"><?php echo $stats->total_accounts; ?></div>
                    <div class="statistics-label">Total Topics:</div><div class="statistics-values"><?php echo $stats->total_topics; ?></div>
                    <div class="statistics-label">Total Posts:</div><div class="statistics-values"><?php echo $stats->total_posts; ?></div>
                    <div class="statistics-label">Newest Member:</div><a href="player.php?usrId=<?php echo $stats->last_member['id']; ?>"><div class="statistics-values" style="color: #<?php echo namecolor(get_rank_byid($stats->last_member['id'])); ?>;"><?php echo ucfirst(strtolower($stats->last_member['username'])); ?></div></a>
                </div>
            </div>
        </div>
    </div>
<script type="text/javascript">SkinnyTip.init();</script>
</body>
<?php include 'global-footer.php' ?>
</html>