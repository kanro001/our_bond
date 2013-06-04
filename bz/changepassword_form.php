<?php
	require_once('ourbond_fns.php');
	
	session_start();
	if (isset($_GET['title'])){
		$title = $_GET['title'];
	}
	else{
		$title = "Change Password | Ourbond";
	}
	if (isset($_GET['error'])){
		$error = $_GET['error'];
	}
	else{
		$error = null;
	}
	do_html_header($title);
	do_html_menu();
	do_changepassword_form($error, $_SESSION["username"],$_SESSION["valid_user"]);
	do_html_footer();
?>