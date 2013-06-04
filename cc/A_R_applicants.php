<?php
	session_start();
	require "db.php";
	if(isset($_POST["type"]) && isset($_POST["uid"])){
		$type = $_POST["type"];
		$uid = $_POST["uid"];
		if($type == "r"){
			$query = "delete from user_bond where ID_USER = ".$uid." and ID_BOND = ".$_SESSION["click_group"];
			$con = connect();
			$result = mysql_query($query,$con);
			if($result == false)
				echo "query error";
			else
				echo "rtrue";
		}
		else{
			$query = "update user_bond set status = 1 where ID_BOND = ".$_SESSION["click_group"]." and ID_USER = ".$uid.";";
			$con = connect();
			$result = mysql_query($query,$con);
			if($result == false)
				echo "query error";
			else
				echo "atrue";
		}
	}
?>