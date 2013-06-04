<?php
	session_start();
	require "db.php";
	$filename = "picture";
	$maxfilesize = 500000;
	$destination = "postpic/";
	$imgArray = array("image/jpg","image/jpeg","image/gif","image/JPG");
	if(isset($_FILES[$filename])){
		if(!is_uploaded_file($_FILES[$filename]["tmp_name"])){
			echo "no files";
			exit;
		}
		if(!in_array($_FILES[$filename]["type"],$imgArray)){
			echo "invalid type";
			exit;
		}
		if($maxfilesize < $_FILES[$filename]["size"]){
			echo "too big file";
			exit;
		}
		if(!file_exists($destination)){
			mkdir($destination,0777);
		}
		$con = connect();
		$query = "select AUTO_INCREMENT from information_schema.tables where table_name = 'post'";
		$result = exec_query($query,$con);
		if($result == false)
			exit("query error");
		else
			$name = $result[0]["AUTO_INCREMENT"];
		$_FILES[$filename]["name"] = $name.".jpg";
		$destination = $destination.$_FILES[$filename]["name"];
		if(!move_uploaded_file($_FILES[$filename]["tmp_name"],$destination)){
			echo "move error";
			exit;
		}
		chmod($destination,0777);
		echo "<html><body align = center><img width = 150 height = 150 src = ".$destination."><img></body></html>";
		$_SESSION["picdestination"] = $destination;
	}
?>
