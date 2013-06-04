<?php
include_once 'databaseClass.php';
include_once 'db_fns.php';
include_once 'output_fns.php';

if(isset($_GET["post"]) && $_GET["post"] !== ""){
	$post_id = $_GET["post"];
	$commentString = null;
	try{
		$comments = get_comments($post_id);
		foreach ($comments as $comment){
			$commentString .= do_member_item_m($comment[3], $comment[0], $comment[2],$comment[1]);
		}
	}catch(Exception $e){
		//This is impossible.
	}
	echo $commentString;
}
else{
	//I think this is impossible, unless session is time out.
	//
}
?>