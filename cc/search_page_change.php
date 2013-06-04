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
		$content = $_POST["content"];
		$query = "select pic,ID_POST,EMAIL,POST_DATE,nice,ugly,CONTENT from post,user where ID_BOND = '".$gid."' and post.ID_USER = user.ID_USER and content like '%".$content."%' limit ".($page-1)*(12).",12;";
		$result = exec_query($query,$con);
		$query2 = "select founder_id from bond where id_bond = ".$gid;
		$temp = exec_query($query2,$con);
		$f = $temp[0]["founder_id"];
		if($f == $_SESSION["valid_user"]){
			g_table($result,1);
			g_search_page($_SESSION["page"],$content);
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
			g_search_page($_SESSION["page"],$content);
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