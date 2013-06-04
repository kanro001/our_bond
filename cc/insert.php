<?php
	session_start();
	require "db.php";
	if(isset($_POST["comment"])){
		$c = $_POST["comment"];
		$userid = $_SESSION["valid_user"];
		$postid = $_SESSION["click_post"];
		$check = trim($c);
		$check_comment = strip_tags($c);
		$check_comment = addslashes($check_comment);
		$check_comment = str_replace("~~~~~~~~~~","<br>",$check_comment);
		if(empty($check)){
			echo "empty";
		}
		else{
			date_default_timezone_set('America/New_York');
			$date = date("Y-m-d H:i:s");
			$query = "insert into comment values(null,'".$check_comment."','".$postid."','".$userid."','".$date."','0','0')";
			$con = connect();
			$echo = mysql_query($query,$con);
			if($echo == false)
				echo $query;
			else
				echo "true";
		}
	}
	else
		echo "no values got";
?>