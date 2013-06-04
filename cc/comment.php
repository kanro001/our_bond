<?php
	session_start();
	require "../cc/ourbond_fns.php";
	require "db.php";
	require "commentUI.php";
	require "postUI.php";
	if(!isset($title))
		$title = "Groups";
	do_html_header($title);
	if(!isset($_SESSION["click_post"]))
		echo "back to group page";
	else{
		$pid = $_SESSION["click_post"];
		$gid = $_SESSION["click_group"];
		$query = "select count(*) from comment where ID_POST =" .$pid.";";
		$query1 = "select ID_POST,pic,EMAIL,POST_DATE,nice,ugly,CONTENT from post,user where ID_POST = ".$pid." and post.ID_USER = user.ID_USER;";
		$con = connect();
		$row = exec_query($query,$con);
		$row2 = exec_query($query1,$con);
		$page = $row[0]["count(*)"]/10;
		navigation($gid,$pid);
		if(isset($_SESSION["public"]) && $_SESSION["public"] == 1){//if public group
			foreach($row2 as $row1)
				postUI($row1["ID_POST"],$row1["pic"],$row1["EMAIL"],$row1["POST_DATE"],$row1["nice"],$row1["ugly"],$row1["CONTENT"],0);
			echo "<div id = 'one_page_c'>";
			one_page($pid,$con,1);
			echo "</div>";
			num_page($page);
			if(isset($_SESSION["valid_user"]))
				submit_login();
			else
				submit_nologin();
		}
		else{//private group
			foreach($row2 as $row1)
				postUI($row1["ID_POST"],$row1["pic"],$row1["EMAIL"],$row1["POST_DATE"],$row1["nice"],$row1["ugly"],$row1["CONTENT"],0);
			echo "<div id = 'one_page_c'>";
			one_page($pid,$con,1);
			echo "</div>";
			num_page($page);
			submit_login();
		}
	}
	do_html_footer();
?>
<script type = "text/javascript" src = "js/post_position_in_comment.js"></script>