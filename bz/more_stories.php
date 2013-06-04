<?php

include_once 'db_fns.php';
include_once 'output_fns.php';
session_start();
if(isset($_SESSION['start'])&&$_SESSION['start']!==""){
$_SESSION['start'] = $_SESSION['start'] + $_SESSION['end'];
try{
	$posts="";
	$posts= get_posts($_SESSION['valid_user'], $_SESSION['start'], $_SESSION['end']);
	/*$posts[$i][0] = $row[0];//id_post
	$posts[$i][1] = $row[1];//content
	$posts[$i][2] = $row[2];//allow_comment
	$posts[$i][3] = $row[3];//post_date
	$posts[$i][4] = $row[4];//bond_name
	$posts[$i][5] = $row[6]." ".$row[5];//username
	 * */
	foreach ($posts as $post){
		echo do_member_item_h($post[4], $post[5], $post[1], $post[3], $_SESSION['post_count'], $post[6]);
		if($post[2]){
			try{
				$comments = get_comments($post[0]);
				foreach ($comments as $comment){
					echo do_member_item_m($comment[3], $comment[0], $comment[2],$comment[1]);
				}
			}catch(Exception $e){
				//
			}
			/*
			 * $comments[$i][0] = $row[0];//content
				$comments[$i][1] = $row[1];//id_user
				$comments[$i][2] = $row[2];//comment_date
				$comments[$i][3] = $row[3].$row[4];//username
			 * */	
		}
		
		echo do_member_item_f($_SESSION['valid_user'], $_SESSION['username'], $post[0], $_SESSION['post_count']);
		$_SESSION['post_count']++;
	}
}catch(Exception $e){
		//
}
}
else{
	echo  "error";
}

?>