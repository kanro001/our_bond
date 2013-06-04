<?php
	function tool($bandname,$num_m,$date,$num_p,$founder,$in,$login){
?>
		<div id = "toolbar">
			<div>
				Bond_name:<br>
				<?php echo $bandname?>
			</div>
			<div>
				Memebers:<br>
				<?php echo $num_m?>
			</div>
			<div id = "date">
				Foundation_Date:<br>
				<?php echo $date?>
			</div>
			<div>
				Posts:<br>
				<?php echo $num_p?>
			</div>
<?php
		if($login == 1){
?>
			<div>
				Post new post:<br>
				<span><a href = "#" onclick = "newpost()">create new_post</a></span>
			</div>	
			<div id = "search_bond">
				Search Post:<br>
				<input type = "text" name = "content" style = "width:130px"></input>
				<input type = "button" value = "search" onclick = "search_match(event)"></input>
			</div>
<?php
		}
		if($founder == 1){
?>
			<div>
				Manage_Bond:<br>
				<span><a href = "memberlist.php">Manage Memebers</a></span>
			</div>
			<div>
				Applicants<br>
				<span><a href = "applicantlist.php">Manage Applicants</a></span>
			</div>
<?php
		}
		if($in == 1){
?>
			<div>
				<span><a href = "#" onclick = "quitbond(event)">Quit Bond</a></span>
			</div>
<?php
		}
		if($in == 0 && $login == 1){
?>
			<div>
				<span><a href = "join.php">Like</a></span>
			</div>
<?php
		}	
		if($in == 0 && $login != 1){
?>
			<div>
				<span><a href = "../bz/log_form.php">Like</a></span>
			</div>
<?php
		}
?>
		</div>
<?php
	}
	function g_search_page($i,$content){
		echo "<div id = 'div_num'>";
		for($p = 0; $p < $i; $p++){
?>
		<span>
			<a id = "<?php echo $content?>" href = "#" onclick = "search_page_change(event)"><?php echo $p+1?></a>
		</span>
<?php
		}
		echo "</div>";
	}
	function g_tool($gid,$con,$founder,$in,$login){
		$query = "select BOND_NAME,POST_NUMBER,FOUND_DATE,count(*) from bond,user_bond where bond.ID_BOND = ".$gid." and bond.ID_BOND = user_bond.ID_BOND;";
		$result = exec_query($query,$con);
		foreach($result as $arr)
			tool($arr["BOND_NAME"],$arr["count(*)"],$arr["FOUND_DATE"],$arr["POST_NUMBER"],$founder,$in,$login);
	}
?>
<script type = "text/javascript" src = "js/search_match.js"></script>
<script type = "text/javascript" src = "js/search_page_change.js"></script>
<script type = "text/javascript" src = "js/quitbond.js"></script>
<script type = "text/javascript" src = "js/newpost.js"></script>