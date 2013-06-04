<?php 
require 'ourbond_fns.php';
session_start();
if(!isset($_SESSION['valid_user'])){
	header("Location: log_form.php");
}
if (isset($_GET['title'])){
	$title = $_GET['title'];
}
else{
	$title = $_SESSION['username']."Ourbond";
}
if(isset($_GET['uid'])&&$_GET['uid']==$_SESSION['valid_user']){
	$user_info = Array();
	$user_info = get_user_info($_SESSION['valid_user']);
	if ($user_info[3] == 1){
		$sex = "Male";
	}
	else{
		$sex = "Female";
	}
	do_html_header($title);
	do_html_menu();
	do_html_profile_form($user_info[0], $user_info[1], $user_info[2], $sex, $user_info[4], $_SESSION['valid_user'], $user_info[5]);
	do_html_footer();
}else{
	$uid=$_GET['uid'];
	$user_info = Array();
	$user_info = get_user_info($uid);
	if ($user_info[3] == 1){
		$sex = "Male";
	}
	else{
		$sex = "Female";
	}
	do_html_header($title);
	do_html_menu();
	do_html_profile_form($user_info[0], $user_info[1], $user_info[2], $sex, $user_info[4], $uid, $user_info[5]);
	do_html_footer();
}

?>