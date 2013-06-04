<?php
	require 'ourbond_fns.php';
	
	if (isset($_GET['title'])){
		$title = $_GET['title'];
	}
	else{
		$title = "Retrieve Password | Ourbond";
	}
	if (isset($_GET['error'])){
		$error = $_GET['error'];
	}
	else{
		$error = null;
	}
	
	do_html_header($title);
	do_forgot_form($error);
	do_html_footer();
?>