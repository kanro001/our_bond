<?php
	session_start();
	require "../cc/ourbond_fns.php";
	require "db.php";
	require "postUI.php";
	require "toolUI.php";
	if(!isset($title))
		$title = "Groups";
	do_html_header($title);
	if(!isset($_SESSION["click_group"]))//did not click the group link, back to main page
		header("Location: ../bz/log_form.php");
	else{ // click the link
		$gid = $_SESSION["click_group"];
		navi($gid);
		$query = "select ISPUBLIC from bond where ID_BOND = '".$gid."';";
		$query1 = "select count(*) from post where ID_BOND = '".$gid."';";
		$query2 = "select pic,ID_POST,EMAIL,POST_DATE,nice,ugly,CONTENT from post,user where ID_BOND = '".$gid."' and post.ID_USER = user.ID_USER order by POST_DATE limit 0,12;";
		$con = connect();
		$allpost = exec_query($query2,$con);
		$group_type = exec_query($query,$con);
		$rows = exec_query($query1,$con);
		$page = $rows[0]["count(*)"]/12;
		$_SESSION["page_post"] = $page;
		if(!empty($group_type) && $group_type[0]["ISPUBLIC"] == 1){//public group
			$_SESSION["public"] = 1;
			if(!isset($_SESSION["valid_user"])){//not log in
				echo "<div id = 'div_page'>";
				g_table($allpost,0);
				g_page($page);
				g_tool($gid,$con,0,0,0);
				echo "</div>";
			}
			else{//log in
				$uid = $_SESSION["valid_user"];
				$query = "select FOUNDER_ID from bond where ID_BOND = '".$gid."';";
				$founder_check = exec_query($query,$con);
				$query1 = "select status from user_bond where ID_USER = ".$uid." and ID_BOND = ".$gid.";";
				$in_check = exec_query($query1,$con);
				if(!empty($in_check) && $in_check[0]["status"] == 1){//has joint this public group
					$_SESSION["in"] = 1;
					if($uid == $founder_check[0]["FOUNDER_ID"]){//founder
						$_SESSION["founder"] = $uid;
						echo "<div id = 'div_page'>";
						g_table($allpost,1);
						g_page($page);
						g_tool($gid,$con,1,1,1);
						echo "</div>";
					}
					else{//not founder
						echo "<div id = 'div_page'>";
						g_table($allpost,0);
						g_page($page);
						g_tool($gid,$con,0,1,1);
						echo "</div>";
					}
				}
				else{//not joint this public group
					echo "<div id = 'div_page'>";
					g_table($allpost,0);
					g_page($page);
					g_tool($gid,$con,0,0,1);
					echo "</div>";
				}
			}
		}
		else{//private group
			if(!isset($_SESSION["valid_user"]))//not log in, reject the request
				header("Location: ../bz/log_form.php");
			else{//log in
				$uid = $_SESSION["valid_user"];
				$query = "select FOUNDER_ID from bond where ID_BOND = '".$gid."';";
				$founder_check = exec_query($query,$con);
				$query1 = "select status from user_bond where ID_USER = ".$uid." and ID_BOND = ".$gid.";";
				$in_check = exec_query($query1,$con);
				if(!empty($in_check) && $in_check[0]["status"] == 1){//in this private group
					$_SESSION["in"] = 1;
					if($uid == $founder_check[0]["FOUNDER_ID"]){//if the user is founder
						$_SESSION["founder"] = $uid;
						echo "<div id = 'div_page'>";
						g_table($allpost,1);
						g_page($page);
						g_tool($gid,$con,1,1,1);
						echo "</div>";
					}
					else{//if the user is not founder
						echo "<div id = 'div_page'>";
						g_table($allpost,0);
						g_page($page);
						g_tool($gid,$con,0,1,1);
						echo "</div>";
					} 
				}
				else{//not in this private group
					echo "<div id = 'div_page'>";
					g_tool($gid,$con,0,0,0);
					echo "</div>";
				}	
			}
		}
	}
	do_html_footer();
?>