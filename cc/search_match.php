<?php
	session_start();
	require "db.php";
	require "postUI.php";
	require "toolUI.php";
	if(!isset($_POST["content"]))
		echo "back to previous page";
	else{
		$gid = $_SESSION["click_group"];
		$content = $_POST["content"];
		$c = addslashes(strip_tags(trim($content)));
		if(empty($c))
			echo "nokeywords";
		else{
			$con = connect();
			$query = "select count(*),pic,ID_POST,EMAIL,POST_DATE,nice,ugly,CONTENT from post,user where ID_BOND = '".$gid."' and post.ID_USER = user.ID_USER and content like '%".$content."%';";
			$query1 =  "select pic,ID_POST,EMAIL,POST_DATE,nice,ugly,CONTENT from post,user where ID_BOND = '".$gid."' and post.ID_USER = user.ID_USER and content like '%".$content."%' order by POST_DATE limit 0,12;";
			$query2 = "select founder_id from bond where ID_BOND = ".$gid;
			$rows = exec_query($query,$con);
			$page = $rows[0]["count(*)"]/12;
			$_SESSION["page"] = $page;
			$allmatch = exec_query($query1,$con);
			$temp = exec_query($query2,$con);
			$f = $temp[0]["founder_id"];
			
			if($f == $_SESSION["valid_user"]){
				g_table($allmatch,1);
				g_search_page($page,$content);
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
				g_table($allmatch,0);
				g_search_page($page,$content);
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
	}
?>
		