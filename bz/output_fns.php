<?php
function do_html_header_register($title){
	if(!isset($title)){
		$title="Ourbond";
	}
	?>
<html>
<head>
	<title><?php echo $title;?></title>
	<link id="css" href="css/html.css" rel="stylesheet" type="text/css"/>
	<script type="text/javascript" src="js/register.js"></script>
</head>
<body>
	<div id="header" class="header">
		<table>
			<tr>
				<td align="left">
					<img src="img/logo.jpg" alt="OurBond Logo"/>
				</td>
				<td>
					<ul>
						<li>Share your mind with your friends.</li>
						<li>See what other users discuss.</li>
						<li>Find your "Bond" and post in it.</li>
					</ul>
				</td>
			</tr>
		</table>
	</div>
	<div id="main">
<?php
} 
function do_html_header($title){
	if(!isset($title)){
		$title="Ourbond";
	}
?>
<html>
<head>
	<title><?php echo $title;?></title>
	<link id="css" href="css/html.css" rel="stylesheet" type="text/css"/>
	<script type="text/javascript" src="js/member.js" ></script>
	<script type="text/javascript" src="js/member_bonds.js"></script>
	<script type="text/javascript" src="js/more_stories.js"></script>
	<script type="text/javascript" src="js/group.js"></script>
	<script type="text/javascript" src="js/changePassword.js"></script>
</head>
<body onload="move()">
	<div id="header" class="header">
		<table>
			<tr>
				<td align="left">
					<img src="img/logo.jpg" alt="OurBond Logo"/>
				</td>
				<td>
					<ul>
						<li>Share your mind with your friends.</li>
						<li>See what other users discuss.</li>
						<li>Find your "Bond" and post in it.</li>
					</ul>
				</td>
			</tr>
		</table>
	</div>
	<div id="main">
<?php	
}

function do_html_header_login_form($title){
	if(!isset($title)){
		$title="Ourbond";
	}
?>
<html>
<head>
	<title><?php echo $title;?></title>
	<link id="css" href="css/html.css" rel="stylesheet" type="text/css">
	<script type="text/javascript" src="js/register.js"></script>
	
	
	</script>
</head>
<body>
	<div id="login_header" class="header">
		<form method="post" action="member.php" name="login_header">
			<table>
				<tr>
					<td rowspan="3" valign="middle">
						<a href="../wangwen/main.php"><img src="img/logo.jpg" alt="OurBond Logo"/></a>
					</td>
					<td width = "600"></td>
					<td align="left">
						Email:
					</td>
					<td align="left">
						Password:
					</td>
					<td></td>
				</tr>
				<tr>
					<td width = "600"></td>	
					<td><input type="text" name="login_email"/></td>
					<td><input type="password" name="passwd"/></td>
					<td><input type="submit" value="Log in"/></td>
				</tr>
				<tr>
					<td width = "500"></td>
					<td><input type="checkbox" name="logsetting"/>Keep me log in</td>
					<td><a href="forgot_form.php">Forgot your password?</a></td>
					<td></td>
				</tr>
			</table>
		</form>
	</div>
	<div id ="main">
<?php 
}
function do_login_form($error){
	if(!isset($error)){
		$error="It's free and always be.";
	}
?>
	<div id="login_form" class="form">
		<form method="post" action="member.php" name="login_form">
			<table>
				<tr>
					<td rowspan="2" width="500">
						<h2>OurBond help you share <b>Knowledge</b>, <b>interest</b> and <b>life</b> with your friends and even strangers.</h2>
					</td>
					<td rowspan="3" width="50"></td>
					<td colspan="2" width="400">
						<h2>Sign In:</h2>
					</td>
				</tr>
				<tr>
					<td colspan="2">
						<h3><?php echo $error;?></h3>
					</td>
				</tr>
				<tr>
					<td>
						<img src="img/pic.jpg" alt="Knowledge bonds everyone." width="500"/>
					</td>
					<td>
						<table>
							<tr>
								<td align="right" width="150">
									Email:
								</td>
								<td width="250"><input type="text" name="email"  size="30" maxlength="100"/></td>
							</tr>
							<tr>
								<td align="right">
									Password:
								</td>
								<td><input type="password" name="passwd"  size="30" maxlength="100"/></td>
							</tr>
							<tr>
								<td></td>
								<td><input type="checkbox" name="logsetting"/>Keep me log in</td>
							</tr>
							<tr>
								<td></td>
								<td><input type="submit" value="Log in"/>
								or <a href="register_form.php">Sign up for OurBond</a>
								</td>
							</tr>
							<tr>
								<td></td>
								<td><a href="forgot_form.php">Forgot your password?</a></td>
							</tr>
						</table>
					</td>
				</tr>
			</table>
		</form>
	</div>
<?php	
}
function do_forgot_form($error){
	if(!isset($error)){
		$error="It's free and always be.";
	}
	?>
	<div id="login_form" class="form">
		<form method="post" action="forgot_password.php" name="forgotpassword_form">
			<table>
				<tr>
					<td rowspan="2" width="500">
						<h2>OurBond help you share <b>Knowledge</b>, <b>interest</b> and <b>life</b> with your friends and even strangers.</h2>
					</td>
					<td rowspan="3" width="50"></td>
					<td colspan="2" width="400">
						<h2>Retrieve Password:</h2>
					</td>
				</tr>
				<tr>
					<td colspan="2">
						<h3><?php echo $error;?></h3>
					</td>
				</tr>
				<tr>
					<td>
						<img src="img/pic.jpg" alt="Knowledge bonds everyone." width="500"/>
					</td>
					<td>
						<table>
							<tr>
								<td align="right" width="150">
									Email:
								</td>
								<td width="250"><input type="text" name="user_email"  size="30" maxlength="100"/></td>
							</tr>
							<tr>
								<td align="right" width="150">
									First name:
								</td>
								<td width="250"><input type="text" name="firstname"  size="30" maxlength="100"/></td>
							</tr>
							<tr>
								<td align="right" width="150">
									Last name:
								</td>
								<td width="250"><input type="text" name="lastname"  size="30" maxlength="100"/></td>
							</tr>
							<tr>
								<td></td>
								<td><input type="submit" value="Submit"/>
								or <a href="register_form.php">Sign up for OurBond</a>
								</td>
							</tr>
						</table>
					</td>
				</tr>
			</table>
		</form>
	</div>
<?php	
}
function do_changepassword_form($error, $name, $user_id){
	if(!isset($error)){
		$error="It's free and always be.";
	}
	if(!isset($name)){
		$name="Impossible";
	}
	if(!isset($user_id)){
		$user_id=7;
	}
	?>
	<div id="changepassword_form" class="form">
		<form method="post" action="change_password.php" name="changepassword_form">
			<table>
				<tr>
					<td rowspan="2" width="500">
						<h2>OurBond help you share <b>Knowledge</b>, <b>interest</b> and <b>life</b> with your friends and even strangers.</h2>
					</td>
					<td rowspan="3" width="50"></td>
					<td colspan="2" width="400">
						<h2>Change Password:</h2>
					</td>
				</tr>
				<tr>
					<td colspan="2">
						<h3><?php echo $error;?></h3>
					</td>
				</tr>
				<tr>
					<td>
						<img src="img/pic.jpg" alt="Knowledge bonds everyone." width="500"/>
					</td>
					<td>
						<table>
							<tr>
								<td align="right" width="150">
									Name:
								</td>
								<td><input type="text" size="30" disabled value="<?php echo $name?>"/></td>
							</tr>
							<tr>
								<td align="right" width="150">
								</td>
								<td><input type="text" size="30" name="user_id" hidden="hidden" value="<?php echo $user_id?>"/></td>
							</tr>
							<tr>
								<td align="right" width="150">
									Old Password:
								</td>
								<td><input type="password" name="oldpassword"  size="30" maxlength="100"/></td>
							</tr>
							<tr>
								<td align="right" width="250">
									New Password:
								</td>
								<td><input type="password" name="newpassword"  size="30" maxlength="100"/></td>
							</tr>
							<tr>
								<td align="right">
									Re-enter password:
								</td>
								<td><input type="password" name="re-password"  size="30" maxlength="100"/></td>
							</tr>
							<tr>
								<td></td>
								<td><input type="submit" value="Submit"/>
								or <a href="register_form.php">Sign up for OurBond</a>
								</td>
							</tr>
							<tr>
								<td></td>
								<td><a href="forgot_form.php">Forgot your password?</a></td>
							</tr>
						</table>
					</td>
				</tr>
			</table>
		</form>
	</div>
<?php	
}
function do_register_form($error){
	if(!isset($error)){
		$error="It's free and always be.";
	}
?>
	<div id="register_form" class="form">
		<form method="post" action="register_new.php" name="register_form">
			<table>
				<tr>
					<td rowspan="2" width="500">
						<h2>OurBond help you share <b>Knowledge</b>, <b>interest</b> and <b>life</b> with your friends and even strangers.</h2>
					</td>
					<td rowspan="12" width="50"></td>
					<td colspan="2" width="400">
						<h2>Sign Up</h2>
					</td>
				</tr>
				<tr>
					<td colspan="2">
						<h3><?php echo $error;?></h3>
					</td>
				</tr>
				<tr>
					<td rowspan="10">
						<img src="img/pic.jpg" alt="Knowledge bonds everyone." width="500"/>
					</td>
					<td align="right" width="150">
						<label for="firstname">First Name:</label>
					</td>
					<td width="250">
						<input id="firstname" type="text" name="firstname" size="25" maxlength="100"/>
						<span id="firstnameSpan"></span>
					</td>
				</tr>
				<tr>
					<td align="right">
						<label for="lastname">Last Name:</label>
					</td>
					<td>
						<input type="text" id="lastname" name="lastname" size="25" maxlength="100"/>
						<span id="lastnameSpan"></span>
					</td>
				</tr>
				<tr>
					<td align="right">
						<label for="email">Your Email:</label>
					</td>
					<td>
						<input type="text" id="email" name="email" size="25" maxlength="100"/>
						<span id="emailSpan"></span>
					</td>
				</tr>
				<tr>
					<td align="right">
						<label for="re_email">Re-enter Email:</label>
					</td>
					<td>
						<input type="text" id="re_email" name="re_email" size="25" maxlength="100"/>
						<span id="re_emailSpan"></span>	
					</td>
				</tr>
				<tr>
					<td align="right">
						<label for="password">New Password:</label>
					</td>
					<td>
						<input type="password" id="password" name="password" size="25" maxlength="100"/>
						<span id="passwordSpan"></span>	
					</td>
				</tr>
				<tr>
					<td align="right">
						<label for="re_password">Re-enter Password:</label>
					</td>
					<td>
						<input type="password" id="re_password" name="re_password" size="25" maxlength="100"/>
						<span id="re_passwordSpan"></span>	
					</td>
				</tr>
				<tr>
					<td align="right">
						<label for="sex">I am:</label>
					</td>
					<td>
						<select name="sex" id="sex">
							<option value="Show" disabled="disabled">Select Sex:</option>
							<option value="Female">Female</option>
							<option value="Male">Male</option>
						</select>
						<span id="sexSpan"></span>
					</td>
				</tr>
				<tr>
					<td align="right">
						<label for="birthday">Birthday:</label>
					</td>
					<td>
						<table id="birthday">
							<tr>
								<td>
									<select name="year" id="year" onmouseover="year_birthday()">
										<option value="show" disabled="disabled">Year:</option>
										
									</select>
								</td>
								<td>
									<select name="month" id="month" onmouseover="month_birthday()">
										<option value="show" disabled="disabled">Month:</option>
									</select>
								</td>
								<td>
									<select name="day" id="day" onmouseover="day_birthday()">
										<option value="show" disabled="disabled">Day:</option>
									</select>
								</td>
							</tr>
						</table>
						<span id="birthdaySpan"></span>
					</td>
				</tr>
				<tr>
					<td></td>
					<td>By clicking Sign Up, you agree to our 
						<a href="privacy/privacy.php">Terms</a> and that you have read and understand our 
						<a href="privacy/privacy.php">Privacy &amp; Terms</a>.</td>
				</tr>
				<tr>
					<td></td>
					<td align="center"><input type="submit" value="Sign Up"></td>
				</tr>
			</table>
		</form>
	</div>
<?php
}
function do_html_profile_form($photo, $firstname, $lastname, $sex, $birthday, $uid, $ispublic){
	if($_SESSION['valid_user'] == $uid){
?>
	<div id="profile_form" class="form">
	<table>
	<tr>
	<td rowspan="2" width="500">
	<h2>OurBond help you share <b>Knowledge</b>, <b>interest</b> and <b>life</b> with your friends and even strangers.</h2>
	</td>
	<td rowspan="3" width="50"></td>
	<td colspan="2" width="400">
	<h2><?php echo $_SESSION['username']?></h2>
						</td>
					</tr>
					<tr>
						<td colspan="2">
							<h3><i>Welcome to Ourbond.info</i></h3>
						</td>
					</tr>
					<tr>
						<td>
							<img src="img/pic.jpg" alt="Knowledge bonds everyone." width="500"/>
						</td>
						<td>
							<table>
								<tr>
									<td rowspan="4">
										<img alt="<?php $_SESSION['username']?>" src="<?php echo $photo;?>"/>
									</td>
									<td rowspan="7" width="50"></td>
									<td><i>First Name: </i></td>
								</tr>

								<tr>
									<td><b><?php echo $firstname;?></b></td>
								</tr>
								<tr>
									<td><i>Last Name: </i></td>
								</tr>
								<tr>
									<td><b><?php echo $lastname;?></b></td>
								</tr>
								<tr>
									<td id="privacy_setting">
										<i>Privacy Setting: </i>
									</td>
									<td>
										<form method="POST" action="privacy_setting.php">
										<select name="setting" id="setting">
										
											<option value="Private" <?php if($ispublic==0) echo "selected";?>>Private</option>
											<option value="Public" <?php if($ispublic==1) echo "selected";?>>Public</option>
										</select>
										<input type="submit" value="Change" ></input>
										</form>
									</td>
								</tr>
								<tr>
									<td><i>Gender:</i></td>
									<td><b><?php echo  $sex;?></b></td>
								</tr>
								<tr>
									<td><i>Birth day:</i></td>
									<td><b><?php echo $birthday?></b></td>
								</tr>
							</table>
						</td>
					</tr>
				</table>
		</div>	
<?php		
	}else{
?>
	<div id="profile_form" class="form">
	<table>
	<tr>
	<td rowspan="2" width="500">
	<h2>OurBond help you share <b>Knowledge</b>, <b>interest</b> and <b>life</b> with your friends and even strangers.</h2>
	</td>
	<td rowspan="3" width="50"></td>
	<td colspan="2" width="400">
	<h2><?php echo $_SESSION['username'];?></h2>
						</td>
					</tr>
					<tr>
						<td colspan="2">
							<h3><i>Welcome to Ourbond.info</i></h3>
						</td>
					</tr>
					<tr>
						<td>
							<img src="img/pic.jpg" alt="Knowledge bonds everyone." width="500"/>
						</td>
						<td>
							<table>
								<?php 
									if($ispublic == 0){
										echo "<tr><td><b>This user's privacy setting is \"Private\".<br>
										So you are not able to see its profile.</b></td></tr>";}
										else{
								?>
								<tr>
									<td rowspan="4">
										<img alt="<?php echo $firstname." ".$lastname;?>" src="<?php echo $photo;?>"/>
									</td>
									<td rowspan="7" width="50"></td>
									<td><i>First Name: </i></td>
								</tr>

								<tr>
									<td><b><?php echo $firstname;?></b></td>
								</tr>
								<tr>
									<td><i>Last Name: </i></td>
								</tr>
								<tr>
									<td><b><?php echo $lastname;?></b></td>
								</tr>
								<tr>
									<td></td>
									<td></td>
								</tr>
								<tr>
									<td><i>Gender:</i></td>
									<td><b><?php echo  $sex;?></b></td>
								</tr>
								<tr>
									<td><i>Birth day:</i></td>
									<td><b><?php echo $birthday?></b></td>
								</tr>	
								<?php		
								}
								?>

							</table>
						</td>
					</tr>
				</table>
		</div>		
<?php	
	}	
}
function do_html_footer(){
?>
	</div>
	<div id="footer">
		<a href="#">Privacy &amp; Terms</a> - 
		<a href="#">Help</a> - 
		<a href="#">About OurBond</a>
	</div>
</body>
</html>
<?php
} 
function do_member_item_h($bond_name, $username, $post_content, $post_time, $post_count, $user_id){
	if(!isset($bond_name)){
		$bond_name = "Bond";
	}
	if(!isset($username)){
		$username = "Mr. Bond";
	}
	if(!isset($post_content)){
		$post_content = "How are your guys doing today?";
	}
?>
<hr/>
<div id="member_item">
	<fieldset id="member_item_bond">
	<legend id="member_item_bond_name">
		<?php 
			echo $bond_name;
		?>
	</legend>
	
	<div id="member_post">
			<label class="item_username" for="post_content">
			<a href="profile.php?uid=<?php echo $user_id;?>"><?php echo "<b>".$username.": </b>";?></a>
			</label>
			<div id="post_content">
				<?php 
				echo $post_content." (".$post_time.")";
				?>
			</div>
	</div>
	<div id="2<?php echo $post_count;?>">
	
<?php 
}
function do_member_item_m($username, $comment_content, $comment_time, $comment_user_id){
//can be recuring
	if(!isset($username)){
		$username = "Mr. Bond";
	}
	if(!isset($comment_content)){
		$comment_content = "I'm fine. And you?";
	}
?>
		<div id="member_comment">
			<a href="profile.php?uid=<?php echo $comment_user_id;?>"><?php echo "<b>".$username.": </b>";?></a>
				<?php echo $comment_content." (".$comment_time.")";?>
		</div>
	
<?php 
}
function do_member_item_f($user_id, $username, $post_id, $post_count){
	if(!isset($username)){
		$username = "Mr. Bond";
	}
?>
	</div>
	<div id="member_new_comment">
		<label id="new_comment_username" for="member_comment_input">
			<a href="profile.php?uid=<?php echo $_SESSION['valid_user'];?>"><?php echo "<b>".$username.": </b>";?></a>
		</label>
		<input type="text" id="1<?php echo $post_count;?>" name="member_comment_input" 
		onkeydown="sendComment(<?php echo $user_id?>,1<?php echo $post_count?>, <?php echo $post_id?>, 2<?php echo $post_count?>)"/>
	</div>
	</fieldset>
</div>
<?php 
}
function do_member_group_h(){
?>
<div id="member_bonds">
<fieldset>
	<legend>
		My Bonds
	</legend>
	<ul id="bonds_menu">
	<li class="bonds_item">
		<i>Groups</i>
		<ul id="bonds_groups" class="bonds_options">	
<?php 
}
function do_member_group_m1($group_id, $group_name){
	if(!isset($group_id)){
		$group_id = "0";
	}
	if(!isset($group_name)){
		$group_name = "Bond";
	}
?>
			<li>
				<?php 
					echo "<a href=\"#\" onmouseover=\"show()\" onclick=\"toGroup(".$group_id.")\">".$group_name."</a>";
				?>
			</li>

<?php 
}
function do_member_group_m(){
?>
		</ul>
	</li>
	<li class="item">
		<i>Circles</i>
		<ul id="bonds_circles" class="bonds_options">
<?php 
}
function do_member_group_m2($circle_id, $circle_name){
	if(!isset($circle_id)){
		$circle_id="0";
	}
	if(!isset($circle_name)){
		$circle_name="Bond";
	}
?>
			<li>
					<?php 
						echo "<a href=\"#\" onclick=\"toGroup(".$circle_id.")\">".$circle_name."</a>";
					?>
			</li>
<?php 
}
function do_member_group_f(){
?>
		</ul>
	</li>
	</ul>
	</fieldset>
</div>
<div id="member_items">
<div id="member_items_content">
<?php 
}
function do_member_recommendation($user_id, $groups, $circles){
?>
</div>
<br/>
<br/>
<div id="more_stories" onclick="more()">
	<img width="570px" id= "more_stories_img" src="img/more_stories.png"/>
</div>

</div>
<div id="member_recommendations">
	
	<div id="create_menu" >
		<fieldset>
			<legend>
				Create a new Group?
			</legend>
			<div>
			<a href="../wangwen/create_group.php"><img width="150px" src="img/new_bond.png"/></a>
			</div>
		</fieldset>
	</div>	
	<fieldset>
		<legend>Recommendation:</legend>
		<table>
			<tr>
				<td colspan="2"><strong>Top 10 Groups</strong></td>
			</tr>
			<tr>
				<td>
					<i>Group</i>
				</td>
				<td>
					<i>Posts</i>
				</td>
			</tr>
			<?php 
				if(isset($groups) && $groups !== "")
					foreach ($groups as $group)
					echo "<tr><td><a href=\"#\" onmouseover=\"show()\" onclick=\"toGroup(".$group[0].")\">".$group[1]."</a></td><td>".$group[2]."</td></tr>";
			?>
			<tr>
				<td colspan="2"><strong>Top 10 Circles</strong></td>
			</tr>
			<tr>
				<td>
					<i>Circle</i>
				</td>
				<td>
					<i>Posts</i>
				</td>
			</tr>
			<?php 
				if(isset($circles) && $circles !== "")
					foreach ($circles as $circle)
						echo "<tr><td><a href=\"cc/group.php?uid=".$user_id."&gid=".$circle[0]."\">".$circle[1]."</a></td><td>".$circle[2]."</td></tr>";
			?>
		</table>
	</fieldset>
</div>
<script type="text/javascript">

</script>
<?php 
}
function do_html_menu(){

?>
	<div id="member_menu">
		&nbsp;&nbsp;&nbsp;&nbsp;<a href="../wangwen/main.php">Home</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="../wangwen/publicgroups.php">Public Groups</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="../wangwen/privategroups.php">Private Groups</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="member.php">Personal Page</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="profile.php?uid=<?php echo $_SESSION['valid_user'];?>">Profile</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="changepassword_form.php">Change Password</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="logout_form.php">Log out</a>
		&nbsp;&nbsp;&nbsp;
		Welcome to OurBond.info&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo "<a href=\"profile.php?uid=".$_SESSION['valid_user']."\">".$_SESSION['username']."</a>";?>
	<br>
	</div>
<?php 
}
?>


