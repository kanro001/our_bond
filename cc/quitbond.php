<?php
	session_start();
	require "db.php";
	if(isset($_SESSION["click_group"]) && isset($_SESSION["valid_user"])){
		$gid = $_SESSION["click_group"];
		$uid = $_SESSION["valid_user"];
		$con = connect();
		$query = "delete from user_bond where ID_USER = '".$uid."' and ID_BOND = '".$gid."';";
		if(isset($_SESSION["founder"]))
			echo "founder";
		else{
			$result = mysql_query($query,$con);
			if($result == false)
				echo "query error";
			else
				echo "true";
		}
		
	}
	else
		echo "novalue";
?>