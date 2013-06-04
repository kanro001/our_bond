<?php
	session_start();
	require "db.php";
	$gid = $_SESSION["click_group"];
	$uid = $_SESSION["valid_user"];
	$con = connect();
	$query = "insert into user_bond values (".$uid.",".$gid.",0);";
	$result = mysql_query($query,$con);
	if($result == false){
		echo "<script type = 'text/javascript'>alert('You have already sent the request!!!');window.location.href='group.php';</script>";
	}
	else
		header("Location: group.php");
?>