<?php
require '../bz/config.inc.php';
	function connect(){
		$host = HOST;
		$username = USER;
		$password = PASS;
		$dbname = DB_NAME;
		$con = mysql_connect($host, $username, $password);
		mysql_select_db($dbname, $con);
		return $con;
	}
	
	function exec_query($query, $con){
		$result = mysql_query($query,$con);
		if($result == false)
			return false;
		else{
			$output = array();
			$i = 0;
			while(($arr = mysql_fetch_assoc($result)) != null){
				$output[$i] = array();
				foreach($arr as $key => $ele){
					$output[$i][$key] = $ele;
				}
				$i++;
			}
			return $output;
		}	
	}
?>