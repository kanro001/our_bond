<?php
	session_start();
	require "db.php";
	if(!isset($_SESSION["valid_user"]))
		echo "login";
	else{
		$uid = $_SESSION["valid_user"];
		if(isset($_POST["cid"]) && isset($_POST["table"]) && isset($_POST["column"])){
			$commentid = $_POST["cid"];
			$column = $_POST["column"];
			$table = $_POST["table"];
			$query = "select count(*) from user_comment where ID_USER = '".$uid."' and ID_COMMENT = '".$commentid."';";
			$con = connect();
			$result = exec_query($query,$con);
			if($result[0]["count(*)"] == 1)
				echo "voted";
			else{
				$query = "update ".$table." set ".$column."=".$column."+1 where ID_COMMENT = ".$commentid.";";
				$query1 = "insert into user_comment values (".$uid.",".$commentid.");";
				mysql_query($query1,$con);
				$result = mysql_query($query,$con);
				if($result == false)
					echo "query error";
				else{
					$query1 = "select ".$column." from comment where ID_COMMENT = ".$commentid.";";
					$result1 = mysql_query($query1,$con);
					if($result1 == false)
						echo "query1 error";
					else{
						$arr = mysql_fetch_row($result1);
						echo $arr[0];	
					}
				}
			}
		}
		else 
			echo "nocid";
	}
?>