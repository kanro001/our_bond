<?php
require_once 'ourbond_fns.php';
do_html_header("Retrieving Password");

// creating short variable name
$email = $_POST['user_email'];
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];

try {
	valid_user($email, $firstname, $lastname);
	$newpassword = generate_new_password($email);
	notify_password($email, $newpassword);
	do_login_form('Your new password has been emailed to you. Please feel free to change it.');
}
catch (Exception $e) {
	do_forgot_form('<B>Your password could not be resetted. Please try again later.</B>');
}
do_html_footer();
?>