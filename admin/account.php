<html xmlns="http://www.w3.org/1999/xhtml">
 
	<head>
		
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />		
		<title>Admin Zone</title>		
		<link rel="stylesheet" href="css/reset.css" type="text/css" media="screen" />	  
		<link rel="stylesheet" href="css/style.css" type="text/css" media="screen" />		
		<link rel="stylesheet" href="css/invalid.css" type="text/css" media="screen" />	
		<script type="text/javascript" src="js/jquery-1.3.2.min.js"></script>
		<script type="text/javascript" src="js/jquery.config.js"></script>
		<script type="text/javascript" src="js/facebox.js"></script>
		<script type="text/javascript" src="js/jquery.wysiwyg.js"></script>
		<script type="text/javascript" src="js/jquery.date.js"></script>
	</head>  
	<body>
		<div id="body-wrapper">		
			<div id="sidebar">
				<div id="sidebar-wrapper">			
					<h1 id="sidebar-title"><a href="#">Admin Zone</a></h1>
					<a href="#"><img id="logo" src="images/logo.png" alt="Simpla Admin logo" /></a>
					<div id="profile-links">
						Hello, <a href="#" title="Edit your profile">"Username"</a><br />
						<br />
						<a href="../" target="_blank" title="View the Site">View the Site</a> | <a href="#" title="Sign Out">Sign Out</a>
					</div>
					<ul id="main-nav">
						<li>
							<a href="home.php" class="nav-top-item no-submenu">Dashboard</a>       
						</li>
						<li> 
							<a href="account.php" class="nav-top-item current">Accounts</a>
							<ul>
								<li><a class="current" href="account.php">General</a></li>
								<li><a href="#">Add account</a></li>
							</ul>
						</li>
						<li>
							<a href="#" class="nav-top-item">Forum</a>
							<ul>
								<li><a href="#">General</a></li>
								<li><a href="#">Manage category</a></li>
							</ul>
						</li>
						<li>
							<a href="#" class="nav-top-item">BugTracker</a>
							<ul>
								<li><a href="#">General</a></li>
								<li><a href="#">Manage category</a></li>
							</ul>
						</li>
						<li>
							<a href="#" class="nav-top-item">Characters debug</a>
							<ul>
								<li><a href="#">General</a></li>
								<li><a href="#">Add option</a></li>
							</ul>
						</li>
						<li>
							<a href="#" class="nav-top-item">Item store</a>
							<ul>
								<li><a href="#">General</a></li>
								<li><a href="#">Add item</a></li>
								<li><a href="#">Orders</a></li>
							</ul>
						</li>
					</ul>
				</div>
			</div>
			<div id="main-content">
				<h2>Welcome "Username"</h2>
				<p id="page-intro">What would you like to do?</p>				
				<ul class="shortcut-buttons-set">					
					<li>
						<a class="shortcut-button" href="account.php">
							<span>
								<img src="images/icons/pencil_48.png" alt="icon" /><br />View accounts
							</span>
						</a>
					</li>					
					<li>
						<a class="shortcut-button" href="#">
							<span>
								<img src="images/icons/pencil_48.png" alt="icon" /><br />View characters
							</span>
						</a>
					</li>					
					<li>
						<a class="shortcut-button" href="#">
							<span>
								<img src="images/icons/pencil_48.png" alt="icon" /><br />View guilds
							</span>
						</a>
					</li>					
					<li>
						<a class="shortcut-button" href="#">
							<span>
								<img src="images/icons/image_add_48.png" alt="icon" /><br />View item store
							</span>
						</a>
					</li>					
					<li>
						<a class="shortcut-button" href="#messages" rel="modal">
							<span>
								<img src="images/icons/comment_48.png" alt="icon" /><br />View complaints
							</span>
						</a>
					</li>				
				</ul>
				<div class="clear"></div>
				<div class="content-box">
					<div class="content-box-header">					
						<h3>Last accounts created</h3>					
						<ul class="content-box-tabs">
							<li><a href="#tab1" class="default-tab">Accounts</a></li>
							<li><a href="#tab2">Forms</a></li>
						</ul>					
						<div class="clear"></div>					
					</div>
					<div class="content-box-content">						
						<div class="tab-content default-tab" id="tab1">
							<table>							
								<thead>
									<tr>
										<th><input class="check-all" type="checkbox" /></th>
										<th>Name</th>
										<th>Email</th>
										<th>Join</th>
										<th>Online</th>
										<th>Option</th>
									</tr>								
								</thead>
								<!-------- -->
								<tfoot>
									<tr>
										<td colspan="6">
											<div class="bulk-actions align-left">
												<select name="dropdown">
													<option value="option1">Choose an action...</option>
													<option value="option2">Edit</option>
													<option value="option3">Delete</option>
												</select>
												<a class="button" href="#">Apply to selected</a>
											</div>										
											<div class="pagination">
												<a href="#" title="First Page">&laquo; First</a><a href="#" title="Previous Page">&laquo; Previous</a>
												<a href="#" class="number current" title="1">1</a>
												<a href="#" class="number" title="2">2</a>
												<a href="#" class="number" title="3">3</a>
												<a href="#" class="number" title="4">4</a>
												<a href="#" title="Next Page">Next &raquo;</a><a href="#" title="Last Page">Last &raquo;</a>
											</div>
											<div class="clear"></div>
										</td>
									</tr>
								</tfoot>						 
								<tbody>
									<tr>
										<td><input type="checkbox" /></td>
										<td><a href="#tab2?username=<?php echo 'test'?>" title="name">Test 1</a></td>
										<td>Email@Email</td>
										<td>01/01/2016</td>
										<td><img src="images/icons/cross.png" alt="No" /></td>
										<td>
											 <a href="#" title="Edit"><img src="images/icons/pencil.png" alt="Edit" /></a>
											 <a href="#" title="Delete"><img src="images/icons/cross.png" alt="Delete" /></a> 
											 <a href="#" title="Edit Meta"><img src="images/icons/hammer_screwdriver.png" alt="Edit Meta" /></a>
										</td>
									</tr>
									<tr>
										<td><input type="checkbox" /></td>
										<td><a href="#" title="name">Test 2</a></td>
										<td>Email@Email</td>
										<td>01/01/2016</td>
										<td><img src="images/icons/cross.png" alt="No" /></td>
										<td>
											 <a href="#" title="Edit"><img src="images/icons/pencil.png" alt="Edit" /></a>
											 <a href="#" title="Delete"><img src="images/icons/cross.png" alt="Delete" /></a> 
											 <a href="#" title="Edit Meta"><img src="images/icons/hammer_screwdriver.png" alt="Edit Meta" /></a>
										</td>
									</tr>
									<tr>
										<td><input type="checkbox" /></td>
										<td><a href="#" title="name">Test 3</a></td>
										<td>Email@Email</td>
										<td>01/01/2016</td>
										<td><img src="images/icons/cross.png" alt="No" /></td>
										<td>
											 <a href="#" title="Edit"><img src="images/icons/pencil.png" alt="Edit" /></a>
											 <a href="#" title="Delete"><img src="images/icons/cross.png" alt="Delete" /></a> 
											 <a href="#" title="Edit Meta"><img src="images/icons/hammer_screwdriver.png" alt="Edit Meta" /></a>
										</td>
									</tr>
									<tr>
										<td><input type="checkbox" /></td>
										<td><a href="#" title="name">Test 4</a></td>
										<td>Email@Email</td>
										<td>01/01/2016</td>
										<td><img src="images/icons/cross.png" alt="No" /></td>
										<td>
											 <a href="#" title="Edit"><img src="images/icons/pencil.png" alt="Edit" /></a>
											 <a href="#" title="Delete"><img src="images/icons/cross.png" alt="Delete" /></a> 
											 <a href="#" title="Edit Meta"><img src="images/icons/hammer_screwdriver.png" alt="Edit Meta" /></a>
										</td>
									</tr>
									<tr>
										<td><input type="checkbox" /></td>
										<td><a href="#" title="name">Test 5</a></td>
										<td>Email@Email</td>
										<td>01/01/2016</td>
										<td><img src="images/icons/cross.png" alt="No" /></td>
										<td>
											 <a href="#" title="Edit"><img src="images/icons/pencil.png" alt="Edit" /></a>
											 <a href="#" title="Delete"><img src="images/icons/cross.png" alt="Delete" /></a> 
											 <a href="#" title="Edit Meta"><img src="images/icons/hammer_screwdriver.png" alt="Edit Meta" /></a>
										</td>
									</tr>
								</tbody>							
							</table>						
						</div>
						<div class="tab-content" id="tab2">					
							<form action="" method="post">							
								<fieldset>
									<p>
										<label>Small form input</label>
										<input class="text-input small-input" type="text" id="small-input" name="small-input" /> <span class="input-notification success png_bg">Successful message</span> <!-- Classes for input-notification: success, error, information, attention -->
										<br /><small>A small description of the field</small>
									</p>								
									<p>
										<label>Medium form input</label>
										<input class="text-input medium-input datepicker" type="text" id="medium-input" name="medium-input" /> <span class="input-notification error png_bg">Error message</span>
									</p>								
									<p>
										<label>Large form input</label>
										<input class="text-input large-input" type="text" id="large-input" name="large-input" />
									</p>								
									<p>
										<label>Checkboxes</label>
										<input type="checkbox" name="checkbox1" /> This is a checkbox <input type="checkbox" name="checkbox2" /> And this is another checkbox
									</p>								
									<p>
										<label>Radio buttons</label>
										<input type="radio" name="radio1" /> This is a radio button<br />
										<input type="radio" name="radio2" /> This is another radio button
									</p>								
									<p>
										<label>This is a drop down list</label>              
										<select name="dropdown" class="small-input">
											<option value="option1">Option 1</option>
											<option value="option2">Option 2</option>
											<option value="option3">Option 3</option>
											<option value="option4">Option 4</option>
										</select> 
									</p>								
									<p>
										<label>Textarea with WYSIWYG</label>
										<textarea class="text-input textarea wysiwyg" id="textarea" name="textfield" cols="79" rows="15"></textarea>
									</p>								
									<p>
										<input class="button" type="submit" value="Submit" />
									</p>								
								</fieldset>
								<div class="clear"></div>
							</form>						
						</div>
					</div>
				</div>
				<div class="content-box column-left">				
					<div class="content-box-header">					
						<h3>Content box left</h3>					
					</div>
					<div class="content-box-content">
						<div class="tab-content default-tab">
							<h4>Maecenas dignissim</h4>
							<p>
							Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed in porta lectus. Maecenas dignissim enim quis ipsum mattis aliquet. Maecenas id velit et elit gravida bibendum. Duis nec rutrum lorem. Donec egestas metus a risus euismod ultricies. Maecenas lacinia orci at neque commodo commodo.
							</p>
						</div>
					</div>
				</div>
				<div class="content-box column-right closed-box">				
					<div class="content-box-header">
						<h3>Content box right</h3>
					</div>
					<div class="content-box-content">
						<div class="tab-content default-tab">
							<h4>This box is closed by default</h4>
							<p>
							Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed in porta lectus. Maecenas dignissim enim quis ipsum mattis aliquet. Maecenas id velit et elit gravida bibendum. Duis nec rutrum lorem. Donec egestas metus a risus euismod ultricies. Maecenas lacinia orci at neque commodo commodo.
							</p>
						</div>
					</div>
				</div>
				<div class="clear"></div>
				<div class="notification attention png_bg">
					<a href="#" class="close"><img src="images/icons/cross_grey_small.png" title="Close this notification" alt="close" /></a>
					<div>
						Attention notification. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin vulputate, sapien quis fermentum luctus, libero. 
					</div>
				</div>			
				<div class="notification information png_bg">
					<a href="#" class="close"><img src="images/icons/cross_grey_small.png" title="Close this notification" alt="close" /></a>
					<div>
						Information notification. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin vulputate, sapien quis fermentum luctus, libero.
					</div>
				</div>			
				<div class="notification success png_bg">
					<a href="#" class="close"><img src="images/icons/cross_grey_small.png" title="Close this notification" alt="close" /></a>
					<div>
						Success notification. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin vulputate, sapien quis fermentum luctus, libero.
					</div>
				</div>			
				<div class="notification error png_bg">
					<a href="#" class="close"><img src="images/icons/cross_grey_small.png" title="Close this notification" alt="close" /></a>
					<div>
						Error notification. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin vulputate, sapien quis fermentum luctus, libero.
					</div>
				</div>
				<div id="footer">
					<small>
							&#169; Copyright 2016 | Powered by <a href="#">ProjectCoreDevs</a> | <a href="#">Top</a>
					</small>
				</div>
			</div>
		</div>
	</body>
</html>
