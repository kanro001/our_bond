<?php
require_once 'output_fns.php';
require_once 'user_auth_fns.php';
require_once 'db_fns.php';

if (isset($_POST['firstname'])){
	$firstname = secure_input($_POST['firstname']);
}
if(isset($_POST['lastname'])){
	$lastname = secure_input($_POST['lastname']);
}
if(isset($_POST['email'])){
	$email = secure_input($_POST['email']);
}
if(isset($_POST['password'])){
	$password = secure_input($_POST['password']);
}
if(isset($_POST['sex'])){
	if ($_POST['sex']=="Male")
		$sex = 1;
	else
		$sex = 0;
}
if(isset($_POST['month'])){
	$month = $_POST['month'];
}
if(isset($_POST['day'])){
	$day= $_POST['day'];
}
if(isset($_POST['year'])){
	$year = $_POST['year'];
}

session_start();
try{
	register($password, $firstname, $lastname, $email, $sex, $year, $month, $day);
	$user_id = get_userid($email);
	$username = get_username($user_id);
	$_SESSION['valid_user'] = $user_id;
	$_SESSION["username"] = $username;
	header("Location:member.php");
}catch(Exception $e){
	do_html_header('Register Problem');
	do_register_form($e->getMessage());
	do_html_footer();
}
?>