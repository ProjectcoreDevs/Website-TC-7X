	<div id='menu'>
		<div id='menu-block'>
			<a class='menu-item' href='index'>HOME</a>
			<?php if (isset($_SESSION['usr'])){
			echo "<a class='menu-item' href='store'>STORE <label style='font-size:10px;color:lime;'>alpha</label></a>"; } ?>
			<a class='menu-item' href='guides'>GUIDES & DOWNLOADS</a>
			<a class='menu-item' href='forum'>FORUM <label style="font-size:10px;color:lime;">alpha</label></a>
			<?php if (isset($_SESSION['usr'])){
					echo "<a class='menu-item' href='bugtracker'>BUGTRACKER <label style='font-size:10px;color:lime;'>alpha</label></a>";
					echo "<a class='menu-item' href='user'>ACCOUNT PANEL</a>";
					echo "<a class='menu-item' href='core/logout'>LOGOUT</a>";
			 } else{
					echo "<a class='menu-item' href='login'>LOGIN</a>";
					echo "<a class='menu-item' href='register'>REGISTER</a>"; 
					}?>
		</div>
	</div>