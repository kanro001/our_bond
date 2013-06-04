<?php
require 'ourbond_fns.php';

session_start();
$old_user = $_SESSION['valid_user'];

unset($_SESSION['valid_user']);
unset($_SESSION['username']);
$result_dest = session_destroy();


do_html_header('Logging Out');

if (!empty($old_user)) {
	if ($result_dest)  {
		header("Location: log_form.php?title=Logged out&error=You have already logged out.");
	} else {
		//to do: could not log out
		header("Location: member.php");
	}
} else {
	// if they weren't logged in but came to this page somehow
	header("Location: log_form.php?error=You were not logged in, and so not have to log out.");
}

do_html_footer();
?>