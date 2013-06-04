<?php
	session_start();
	require "../cc/ourbond_fns.php";
	require "db.php";
	require "memberUI.php";
	if(!isset($title))
		$title = "Groups";
	do_html_header($title);
	if(isset($_SESSION["click_group"]) && isset($_SESSION["valid_user"])){
		$gid = $_SESSION["click_group"];
		$uid = $_SESSION["valid_user"];
		$query = "select user.ID_USER,EMAIL from user_bond,user where user.ID_USER = user_bond.ID_USER and ID_BOND = ".$gid;
		$con = connect();
		$result = exec_query($query,$con);
		if($result === false)
			echo "query error";
		else{
			navi_mem($gid);
			echo "<table align = 'center'>";
			titleUI();
			foreach($result as $arr)
				memberUI($arr["ID_USER"],$arr["EMAIL"]);
			echo "</table>";
		}
	}
	do_html_footer();
?>