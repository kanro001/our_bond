<?php
	session_start();
	if(isset($_POST["id"]))
		$_SESSION["click_post"] = $_POST["id"];
?>