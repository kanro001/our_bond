<?php
	session_start();
	require "db.php";
	if(!isset($_POST["content"]))
		echo "no content get";
	else{
		if(isset($_SESSION["picdestination"]))
			$dest = $_SESSION["picdestination"];
		else 
			$dest = "img/default_p.jpg";
		$uid = $_SESSION["valid_user"];
		$gid = $_SESSION["click_group"];
		$content = addslashes(strip_tags($_POST["content"]));
		date_default_timezone_set('America/New_York');
		$date = date("Y-m-d H:i:s");
		$con = connect();
		$query = "insert into post values (null,'".$content."',1,".$gid.",".$uid.",'".$date."',0,0,'".$dest."');";
		$result = mysql_query($query,$con);
		$query1 = "update bond set post_number = post_number + 1 where ID_bond = ".$gid;
		mysql_query($query1,$con);
		if($result == false)
			echo "create failed";
		else{
			echo "create post successfully <br>";
			echo "Window will close in 5 seconds";
			echo "<html><script type = 'text/javascript'>window.setTimeout('change()',5000);";
			echo "function change(){var a = document.getElementById('imgbed'); window.parent.opener.location.href = 'group.php'; window.parent.close();}";
			echo "</script></html>";
			unset($_SESSION["picdestination"]);
		}
	}
?>