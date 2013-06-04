<?php
	function table_g($userid,$Firstname,$photo,$post_time,$comment,$post_ID,$good,$bad,$commentid){		
?>
	<table id = "c_t_m" width = 750px>
		<tr>
			<td id = "c_t" width = 200 rowspan = 3>
				<div id = "c_div">
					<table>
						<tr>
							<td rowspan = 2 align = center>
								<img src = <?php echo stripslashes($photo);?> width = 100 height = 100></img>
							</td>
						</tr>
						<tr>
							<td align = right>
								<?php echo stripslashes($Firstname)?>
							</td>
						</tr>
						<tr>
							<td align = right>
								Our_Bond ID: <?php echo stripslashes($userid)?>
							</td>
						</tr>
					</table>
				</div>
			</td>
			<td id = "c_t" width = 550 height = 10>
				<div><?php echo stripslashes($post_time);?></div>
			</td>
		</tr>
		<tr> 
			<td id = "c_t_s" width = 550 height = 80px>
				<div><?php echo $comment;?></div>
			</td>
		</tr>
		<tr>
			<td id = "c_t" align = "right" height = 10px>
				<span><a href = "#" onclick = "submitchange(event)">Good comment</a><img id = "good" src = "img/good.jpg"></img><span id = <?php echo $commentid?>>(<?php echo $good?>)</span></span>
				<span><a href = "#" onclick = "submitchange(event)">Bad comment</a><img id = "bad" src = "img/bad.jpg"></img><span id = <?php echo $commentid?>>(<?php echo $bad?>)</span></span>
			</td>
		</tr>
	</table>
<?php
	}
	
	function one_page($pid,$con,$i){
		$query = "select user.ID_USER,FIRSTNAME,POST_CONTENT,COMMENT_DATE,photo,ID_POST,good,bad,ID_COMMENT from comment,user where ID_POST =" .$pid." and comment.ID_USER = user.ID_USER order by COMMENT_DATE limit ".($i-1)*(10).",10;";
		$allcomment = exec_query($query,$con);
		echo "<div id = 'c_t_p'>";
		foreach($allcomment as $arr)
			table_g($arr["ID_USER"],$arr["FIRSTNAME"],$arr["photo"],$arr["COMMENT_DATE"],$arr["POST_CONTENT"],$arr["ID_POST"],$arr["good"],$arr["bad"],$arr["ID_COMMENT"]);
		echo "</div>";
	}
	
	function num_page($i){
		for($p = 0; $p < $i; $p++){
?>			
			<span>
				<a href = "#" onclick = "comment_page_change(event)"><?php echo $p+1?></a>
			</span>
<?php
		}	
	}
	
	function submit_login(){
?>
	<div id = "s_div">
		<div id = "s_div_1">
			Enter comment:
		</div>
		<div id = "s_div_2">
			<span>Post comments</span><br>
			<textarea id = "comment" rows=10 cols=70></textarea><br>
			<input type="button" name="submit" value="Submit" onclick="submit()">
		</div>
	</div>
<?php
	}
	function submit_nologin(){
?>
	<div id = "s_div">
		<div id = "s_div_1">
			You can not sumbit your comment before you log in.
		</div>
		<div id = "s_div_2">
			<span>Post comments</span><br>
			<textarea id = "comment" rows=10 cols=70></textarea><br>
			<span id = "span">You must log in to post a comment!</span>
			<input type="button" name="login" value="Login" onclick="log_regi(event)">
			<span id = "span">New User?</span>
			<input type="button" name="register" value="Register" onclick="log_regi(event)">
		</div>
	</div>
<?php
	}
	function navigation($group,$post){
?>
		<div id = "navigator">
			<span>Now, your position is: </span>
			<a href = "../wangwen/main.php">Home >> </a>
			<a href = "../wangwen/publicgroups.php">Public >> </a>
			<a href = "../wangwen/privategroups.php">Private >> </a>
			<a href = "../bz/member.php">Personal >> </a>
			<a href = "group.php">Bond: <?php echo $group?> >> </a>
			<a href = "comment.php">Post: <?php echo $post?> >> </a>
			<a href = "../bz/logout_form.php">Logout</a>
		</div>
<?php
	}
?>
<script type = "text/javascript" src = "js/vote.js"></script>
<script type = "text/javascript" src = "js/comment_page_change.js"></script>
<script type = "text/javascript" src = "js/log_regi.js"></script>