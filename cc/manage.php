<?php
	session_start();
	require "db.php";
	if(isset($_POST["type"]) && isset($_POST["uid"])){
		$type = $_POST["type"];
		$uid = $_POST["uid"];
		if($type == "k"){
			$query1 = "select founder_id from bond where ID_BOND = ".$_SESSION["click_group"];
			$query = "delete from user_bond where ID_USER = ".$uid." and ID_BOND = ".$_SESSION["click_group"];
			$con = connect();
			$result1 = exec_query($query1,$con);
			if($result1[0]["founder_id"] === $uid)
				exit("founder");
			$result = mysql_query($query,$con);
			if($result == false)
				echo "query error";
			else
				echo "ktrue";
		}
		else{
			$query = "update bond set FOUNDER_ID =".$uid." where ID_BOND = ".$_SESSION["click_group"];
			$con = connect();
			$result = mysql_query($query,$con);
			if($result == false)
				echo "query error";
			else
				echo "mtrue";
		}
	}
?>