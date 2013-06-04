<?php
	session_start();
	require "postUI.php";
	require "db.php";
	require "toolUI.php";
	if(!isset($_POST["page"]))
		echo "novalue";
	else{
		$con = connect();
		$gid = $_SESSION["click_group"];
		$page = $_POST["page"];
		$query = "select pic,ID_POST,EMAIL,POST_DATE,nice,ugly,CONTENT from post,user where ID_BOND = '".$gid."' and post.ID_USER = user.ID_USER limit ".($page-1)*(12).",12;";
		$result = exec_query($query,$con);
		if(isset($_SESSION["founder"])){
			g_table($result,1);
			g_page($_SESSION["page_post"]);
			if(isset($_SESSION["valid_user"]) && isset($_SESSION["in"]))
				g_tool($gid,$con,1,1,1);
			else if(isset($_SESSION["valid_user"]) && !isset($_SESSION["in"]))
				g_tool($gid,$con,1,0,1);
			else if(!isset($_SESSION["valid_user"]) && isset($_SESSION["in"]))
				g_tool($gid,$con,1,1,0);
			else
				g_tool($gid,$con,1,0,0);
		}
		else{
			g_table($result,0);
			g_page($_SESSION["page_post"]);
			if(isset($_SESSION["valid_user"]) && isset($_SESSION["in"]))
				g_tool($gid,$con,0,1,1);
			else if(isset($_SESSION["valid_user"]) && !isset($_SESSION["in"]))
				g_tool($gid,$con,0,0,1);
			else if(!isset($_SESSION["valid_user"]) && isset($_SESSION["in"]))
				g_tool($gid,$con,0,1,0);
			else
				g_tool($gid,$con,0,0,0);
		}
	}
?>