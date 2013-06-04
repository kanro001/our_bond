<?php
require 'ourbond_fns.php';
if (isset($_GET['title'])){
		$title = $_GET['title'];
	}
	else{
		$title = "Ourbond";
	}
	if (isset($_GET['error'])){
		$error = $_GET['error'];
	}
	else{
		$error = null;
	}
	do_html_header_register($title);
	do_register_form($error);
	do_html_footer();

?>