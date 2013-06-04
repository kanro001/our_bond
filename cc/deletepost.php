<?php
	require "db.php";
	if(!isset($_POST["postid"]))
		echo "novalue";
	else{
		$pid = $_POST["postid"];
		$con = connect();
		$query = "delete from post where ID_POST = ".$pid.";";
		$query1 = "delete from comment where ID_POST = ".$pid.";";
		$query2 = "delete from user_post where ID_POST = ".$pid.";";
		$query3 = "delete from post_hotkey where ID_POST = ".$pid.";";
		$query4 = "select pic from post where ID_POST = ".$pid.";";
		$result0 = mysql_query($query,$con);
		if($result0 ==  false){
			echo "query0 error";
			exit;
		}
		else{
			$tmp = mysql_fetch_row($result0);
			$des = $tmp[0];
			echo "<script type = 'text/javascript'>alert(".$des.")</script>";
			if($des != "img/default_p.jpg"){
				unlink($des);
			}
		}
		$result = mysql_query($query,$con);
		$result1 = mysql_query($query1,$con);
		$result2 = mysql_query($query2,$con);
		$result3 = mysql_query($query3,$con);
		if($result ==  false)
			echo "query error";
		else if($result1 ==  false)
			echo "query error";
		else if($result2 ==  false)
			echo "query error";
		else if($result3 ==  false)
			echo "query error";
		else
			echo "true";
	}
?>