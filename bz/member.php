<?php
require ('ourbond_fns.php');


//pretend they are not empty
if(isset($_POST['login_email'])){
	$email = secure_input($_POST["login_email"]);
}
if(isset($_POST['passwd'])){
	$password = secure_input($_POST["passwd"]);
}
if(isset($_POST['logsetting'])){
	$logsetting = $_POST["logsetting"];
}
else{
	$logsetting = false;
}

if(isset($email)&&isset($password)&&$email!==""&&$password!==""){

	try{
		login($email, $password);
		$user_id = get_userid($email);
		$username = get_username($user_id);
		if($logsetting == true){
			$lifeTime = 24 * 3600;
			session_set_cookie_params($lifeTime);
			session_start();
			$_SESSION["valid_user"]=$user_id;
			$_SESSION["username"] = $username;
		}
		else {
			session_start();
			$_SESSION["valid_user"]=$user_id;
			$_SESSION["username"] = $username;
		}
		//to do:Get username from database
	}
	catch(Exception $e){
		//unsuccessful login
		do_html_header("Log In|Ourbond");
		do_login_form($e->getMessage());
		do_html_footer();
		exit();
	}
}
else{
	session_start();
	check_session();
	//to do:Get user name
	if(isset($_SESSION['username'])){
		$username = $_SESSION['username'];
		$user_id = $_SESSION['valid_user'];
	}
	else{
		$user_id = $_SESSION['valid_user'];
		$username = get_username($user_id);
	}
	
}


if(!isset($username)){
	do_html_header("Ourbond");
}
else{
	do_html_header($username." | Ourbond");
}
do_html_menu();
//to do: call output function to display personal page

do_member_group_h();
try{
	$groups = get_groups($user_id, "1");
	foreach ($groups as $group){
		$group_id=$group[0];
		$group_name=$group[1];
		do_member_group_m1($group_id, $group_name);
	}
}catch(Exception $e){
	//
}

do_member_group_m();
try{
	$circles = get_groups($user_id, "0");
	foreach ($circles as $circle){
		$circle_id=$circle[0];
		$circle_name=$circle[1];
		do_member_group_m2($circle_id, $circle_name);
	}
}catch (Exception $e){
	//
}

$_SESSION['post_count']=1;
do_member_group_f();

$_SESSION['start'] = 0;
$_SESSION['end'] = 3;
try{
	$posts= get_posts($user_id, $_SESSION['start'], $_SESSION['end']);
	/*$posts[$i][0] = $row[0];//id_post
	$posts[$i][1] = $row[1];//content
	$posts[$i][2] = $row[2];//allow_comment
	$posts[$i][3] = $row[3];//post_date
	$posts[$i][4] = $row[4];//bond_name
	$posts[$i][5] = $row[6]." ".$row[5];//username
	 * */
	foreach ($posts as $post){
		do_member_item_h($post[4], $post[5], $post[1], $post[3], $_SESSION['post_count'], $post[6]);
		if($post[2]){
			try{
				$comments = get_comments($post[0]);
				foreach ($comments as $comment){
					do_member_item_m($comment[3], $comment[0], $comment[2], $comment[1]);
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
		
		do_member_item_f($user_id, $username, $post[0], $_SESSION['post_count']);
		$_SESSION['post_count']++;
	}
}catch(Exception $e){
		//
}



try{
	$r_groups = get_recommendations(1);
}catch(Exception $e){
	//
	$r_groups = null;
}
try{
	$r_circles = get_recommendations(0);
}catch(Exception $e){
	$r_circles = null;
}
do_member_recommendation($user_id, $r_groups, $r_circles);

do_html_footer();
