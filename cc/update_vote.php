<?php
	session_start();
	require "db.php";
	if(!isset($_SESSION["valid_user"]))
		echo "login";
	else{
		if(isset($_POST["id"]) && isset($_POST["column"])){
			$uid = $_SESSION["valid_user"];
			$pid = $_POST["id"];
			$column = $_POST["column"];
			$query = "select count(*) from user_post where ID_POST = ".$pid." and ID_USER = ".$uid.";";
			$con = connect();
			$result = exec_query($query,$con);
			if($result[0]["count(*)"] == 1)
				echo "exist";
			else{
				$query = "update post set ".$column."=".$column."+1 where ID_POST = ".$pid.";";
				$query1 = "insert into user_post values (".$uid.",".$pid.");";
				mysql_query($query1,$con);
				mysql_query($query,$con);
				$query2 = "select ".$column." from post where ID_POST = ".$pid.";";
				$echo = mysql_query($query2);
				$output = mysql_fetch_row($echo);
				echo $output[0];
			}
		}
	}
?>