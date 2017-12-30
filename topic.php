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
<title><?php echo $websiteTitle; ?> - <?php if (isset($thread_base['title'])) echo ucwords( $thread_base['title'] ); else echo 'Can\'t Find'; ?></title>
</head>
<body>
<div id='header'></div>
<?php include 'menu.php';?>
	<div id='navigate-block'>
		<a class='navigate-item' href='index'>Home</a>-<a class='navigate-item' href='forum'>Forum</a>-<a class='navigate-item'><?php echo $thread_base['title']?></a>
	</div>
    <div id='content'>
        <div id='content-wrapper'>
            <?php if ($error == 1){ ?>
            <div id="board-notify-frame">
                    The topic you are looking for seems to not exist
            </div>
            <?php } else { ?>
			<div id='topic-box'>
				<div class="topic-line">
					<a href="#"><div class="topic-icon-place"><img src="<?php echo $forums->forums[$j]['icon'] ?>" class="topic-icon"/></div></a>
					<div class="t-title-desc">
						<div class="t-title"><?php echo $thread_base['title'] ?></div>
						<div class="t-desc">Started by <?php $usr = get_username_by_id($thread_base['autor']); for ($i=1;$i<=count($usr);$i++) { echo $usr[$i]['username']; }?></div>
					</div>
				</div>
				<div id="topicbox-left">
					<div class="topic-box-info">
						<div class="topicbox-info-line">
							<div class="topicbox-line-light"><?php echo $thread_base['body']?></div>
						</div>
					</div>
				</div>
			</div>
            <?php } ?>
        </div>
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
<script type="text/javascript">SkinnyTip.init();</script>
</body>
<?php include 'global-footer.php' ?>
</html>