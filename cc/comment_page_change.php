<?php
	session_start();
	require "db.php";
	require "commentUI.php";
	if(!isset($_POST["page"]))
		echo "novalue";
	else{
		$pid = $_SESSION["click_post"];
		$page = $_POST["page"];
		$con = connect();
		one_page($pid,$con,$page);
	}
?>