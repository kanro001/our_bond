<?php 
	require("template/phpmailer/class.phpmailer.php");
	
	class my_phpmailer extends phpmailer{
		// Set default variables for all new objects
		var $From = "ourbond@ourbond.info";
		var $FromName = "Admin";
		var $password = "666666";
		var $Host = "smtpout.asia.secureserver.net";
		var $Mailer = "smtp";
		var $WordWrap = 75;
	
		// Replace the default error_handler
		function error_handler($msg) {
			print("My Site Error");
			print("Description:");
			printf("%s", $msg);
			exit;
		}
	
		// Create an additional function
		function do_something($something) {
			// Place your new code here
		}
	}
	
?>