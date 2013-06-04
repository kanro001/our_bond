<?php
	function titleUI(){
?>
		<tr>
			<td id = "c_t">
				User ID
			</td>
			<td id = "c_t">
				E-mail
			</td>
			<td id = "c_t">
				Accept
			</td>
			<td id = "c_t">
				Reject
			</td>
		</tr>
<?php
	}
	function memberUI($uid,$email){
?>	
		<tr>
			<td id = "c_t_m">
				<?php echo $uid?>
			</td>
			<td id = "c_t_m">
				<?php echo $email?>
			</td>
			<td id = "c_t_m">
				<a name = "K" id = "<?php echo $uid?>" href = "#" onclick = "A_R_applicants(event)">Accept</a>
			</td>
			<td id = "c_t_m">
				<a name = "N" id = "<?php echo $uid?>" href = "#" onclick = "A_R_applicants(event)">Reject</a>
			</td>
		</tr>		
<?php
	}
	function navi_app($group){
?>
		<div id = "navigator">
			<span>Now, your position is: </span>
			<a href = "../wangwen/main.php">Home >> </a>
			<a href = "../wangwen/publicgroups.php">Public >> </a>
			<a href = "../wangwen/privategroups.php">Private >> </a>
			<a href = "../bz/member.php">Personal >> </a>
			<a href = "group.php">Bond: <?php echo $group?> >> </a>
			<a href = "applicantlist.php"> Applicants List</a>
			<a href = "../bz/logout_form.php">Logout</a>
		</div>
<?php 		
	}
?>
<script type = "text/javascript" src = "js/A_R_applicants.js"></script>