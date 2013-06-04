<?php
require_once 'databaseClass.php';

function change_setting($user_id, $setting){
	$db = new database();
	$db->connect();
	$sql = "UPDATE `user` SET `ispublic` = ".$setting." WHERE `user`.`ID_USER` =".$user_id;
	$db->send_sql($sql);
	$db->disconnect();
	unset($db);
}
function get_user_info($user_id){
	$db = new database();
	$db->connect();
	$sql = "SELECT `photo`, `FIRSTNAME`, `LASTNAME`, `SEX`, `BITHDAY`, `ISPUBLIC` FROM `user` WHERE `ID_USER` = ".$user_id;
	$db->send_sql($sql);
	$num = mysql_num_rows($db->res);
	if (!$num) {
		$db->disconnect();
		unset($db);
		throw new Exception("Error. This is impossible.");
	}
	else{
		$tempres=$db->res;
		$row = mysql_fetch_row($tempres);
		$user_info = Array();
		$user_info[0] = $row[0];
		$user_info[1] = $row[1];
		$user_info[2] = $row[2];
		$user_info[3] = $row[3];
		$user_info[4] = $row[4];
		$user_info[5] = $row[5];
	}
	$db->disconnect();
	unset($db);
	return $user_info;
}
function get_username($user_id){
	$db = new database();
	$db->connect();
	$sql ="SELECT `FIRSTNAME`, `LASTNAME` FROM `user` WHERE `ID_USER` = '".$user_id."'";
	$db->send_sql($sql);
	$num = mysql_num_rows($db->res);
	if (!$num) {
		$db->disconnect();
		unset($db);
		throw new Exception("Error. This is impossible.");
	}
	else{
		$tempres=$db->res;
		while($row = mysql_fetch_row($tempres)){
			$username = $row[0];
			$username = $username.$row[1];
		}

	}
	$db->disconnect();
	unset($db);
	return $username;
}

function get_userid($email){
	$db = new database();
	$db->connect();
	$sql ="SELECT `ID_USER` FROM `user` WHERE `EMAIL` = '".$email."'";
	$db->send_sql($sql);
	$num = mysql_num_rows($db->res);
	if (!$num) {
		$db->disconnect();
		unset($db);
		throw new Exception("Error. This is impossible.");
	}
	else{
		$tempres=$db->res;
		$user_id = mysql_fetch_row($tempres);
	}
	$db->disconnect();
	unset($db);
	return $user_id[0];
}

function get_groups($user_id, $ispublic){
	$db = new database();
	$db->connect();
	$sql ="select bond.id_bond, bond.bond_name\n"
    . "from bond, user_bond\n"
    . "where (bond.id_bond = user_bond.id_bond) and (user_bond.status = 1) and (user_bond.id_user = ".$user_id.") and "
    . "(bond.ispublic = ".$ispublic.") LIMIT 0, 90 ";
	$db->send_sql($sql);
	$num = mysql_num_rows($db->res);
	if (!$num) {
		$db->disconnect();
		unset($db);
		throw new Exception("You have not been in any Groups.");
	}
	else{
		$tempres=$db->res;
		$groups = Array();
		$i=0;
		while($row = mysql_fetch_row($tempres)){
			$groups[$i][0] = $row[0];
			$groups[$i][1] = $row[1];
			$i++;
		}

	}
	$db->disconnect();
	unset($db);
	return $groups;
}

function get_posts($user_id, $start, $end){
	$db = new database();
	$db->connect();
	$sql = "select post.id_post, post.content, post.allow_comment, post.post_date, bond.bond_name, user.firstname, user.lastname, post.id_user\n"
    . "from bond, user_bond, post, user\n"
    . "where (post.id_user = user.id_user)\n"
    . " and (bond.id_bond = user_bond.id_bond)\n"
    . " and (user_bond.id_user = ".$user_id.")\n"
    . " and (user_bond.id_bond = post.id_bond)\n"
    . " order by post.post_date desc\n"
    . "	limit ".$start.",".$end."";
	$db->send_sql($sql);
	$num = mysql_num_rows($db->res);
	if (!$num) {
		$db->disconnect();
		unset($db);
		throw new Exception("None of your groups have any posts.");
	}
	else{
		$tempres=$db->res;
		$posts = Array();
		$i=0;
		while($row = mysql_fetch_row($tempres)){
			$posts[$i][0] = $row[0];//id_post
			$posts[$i][1] = $row[1];//content
			$posts[$i][2] = $row[2];//allow_comment
			$posts[$i][3] = $row[3];//post_date
			$posts[$i][4] = $row[4];//bond_name
			$posts[$i][5] = $row[5]." ".$row[6];//username
			$posts[$i][6] = $row[7];//id_user
			$i++;
		}
	
	}
	$db->disconnect();
	unset($db);
	return $posts;
}

function get_comments($post_id){
	$db = new database();
	$db->connect();
	$sql = "SELECT comment.POST_CONTENT, comment.ID_USER, comment.COMMENT_DATE, user.firstname, user.lastname\n"
    . "FROM `comment`, `user`\n"
    . "WHERE (comment.id_user = user.id_user)\n"
    . "and (`ID_POST` = ".$post_id.")\n"
    . " ORDER BY `COMMENT_DATE`\n"
    . " DESC LIMIT 0, 7";
	$db->send_sql($sql);
	$num = mysql_num_rows($db->res);
	if (!$num) {
		$db->disconnect();
		unset($db);
		throw new Exception("This post does not have any comments.");
	}
	else{
		$tempres=$db->res;
		$comments = Array();
		$i=0;
		while($row = mysql_fetch_row($tempres)){
			$comments[$i][0] = $row[0];//content
			$comments[$i][1] = $row[1];//id_user
			$comments[$i][2] = $row[2];//comment_date
			$comments[$i][3] = $row[3].$row[4];//username
			$i++;
		}
	
	}
	$db->disconnect();
	unset($db);
	return $comments;
}

function get_recommendations($ispublic){
	$db = new database();
	$db->connect();
	$sql ="select bond.id_bond, bond.bond_name, count(*)\n"
    . "from post, bond\n"
    . "where post.id_bond = bond.id_bond\n"
    . "and bond.ispublic =".$ispublic."\n"
    . "group by post.id_bond\n"
    . "order by count(*)\n"
    . "desc\n"
    . "limit 0, 10";
	$db->send_sql($sql);
	$num = mysql_num_rows($db->res);
	if (!$num) {
		$db->disconnect();
		unset($db);
		throw new Exception("The database has no bonds.");
	}
	else{
		$tempres=$db->res;
		$groups = Array();
		$i=0;
		while($row = mysql_fetch_row($tempres)){
			$groups[$i][0] = $row[0];
			$groups[$i][1] = $row[1];
			$groups[$i][2] = $row[2];
			$i++;
		}
	
	}
	$db->disconnect();
	unset($db);
	return $groups;
}
?>