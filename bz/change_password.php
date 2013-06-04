<?php
require_once 'ourbond_fns.php';
do_html_header("Changing Password");

// creating short variable name
if(isset($_POST['oldpassword'])&&$_POST['oldpassword']!==""&&
		isset($_POST['newpassword'])&&$_POST['newpassword']!==""&&
		isset($_POST['re-password'])&&$_POST['re-password']!==""&&
		isset($_POST['user_id'])&&$_POST['user_id']!==""){
	$oldpw = strip_tags(trim($_POST['oldpassword']));
	$newpw = strip_tags(trim($_POST['newpassword']));
	$re_pw = strip_tags(trim($_POST['re-password']));
	$user_id= strip_tags(trim($_POST['user_id']));
}
else{
	//echo $_POST["username"]."www".$_POST["oldpassword"].$_POST["newpassword"].$_POST["re-password"].$_POST["user_id"];
	header("Location:changepassword_form.php?error=Please enter your original password and new password twice.");
}

try {
	change_password($user_id, $oldpw, $newpw, $re_pw);
	unset($oldpw);
	unset($newpw);
	unset($re_pw);
	unset($user_id);
	header("Location:member.php");
}
catch (Exception $e) {
	header("Location:changepassword_form.php?error=".$e->getMessage());
}
?>