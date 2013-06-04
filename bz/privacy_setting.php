<?php
require_once 'db_fns.php';
session_start();
$setting = $_POST['setting'];
if($setting == "Private"){
	change_setting($_SESSION['valid_user'], 0);
}else{
	change_setting($_SESSION['valid_user'], 1);
}
header("Location:profile.php?uid=".$_SESSION['valid_user']);

?>