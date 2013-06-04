<?php
	session_start();
	if(isset($_POST["gid"])){
		$gid = $_POST["gid"];
		$_SESSION["click_group"] = $gid;
	}
	else
		echo "novalue";
?>