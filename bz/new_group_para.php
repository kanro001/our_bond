<?php
if(isset($_POST['gn'])&&$_POST['gn']!==""){
	$gn = $_POST['gn'];
	session_start();
	$_SESSION['new_group_name'] = $gn;
}
else{
	echo "Session doesn't work.";
}
?>