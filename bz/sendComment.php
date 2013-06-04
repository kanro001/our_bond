
<?php
include_once 'databaseClass.php';
function secure_input($input){
	return addslashes(strip_tags($input));
}
if(isset($_GET["uid"])&&$_GET['uid']!==""&&isset($_GET["post"]) && $_GET["post"] !== "" && isset($_GET["txt"]) && $_GET["txt"] !== "") {
    $user_id=$_GET["uid"];
	$txt=secure_input($_GET["txt"]);
	$post_id=$_GET["post"];

	if($txt!==""){
	$db = new database();
	$db->connect();
    $sql = "INSERT INTO comment(ID_COMMENT, POST_CONTENT, ID_POST, ID_USER, COMMENT_DATE)\n"
    . " VALUES (null, '".$txt."','".$post_id."','".$user_id."',NOW())";
    $db->send_sql($sql);
    $db->disconnect();
    unset($db);
	}
}
else{
	
}

?>