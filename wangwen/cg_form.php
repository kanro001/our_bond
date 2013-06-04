<?php
    session_start();
    include("dbclass.php");
    
    
    $user_id = $_SESSION["valid_user"];
    
    if(!isset($_SESSION["valid_user"])){
        header("Location: ../bz/log_form.php");
    }
    if(isset($_POST["group_name"]))
        $bond_name=addslashes(strip_tags($_POST["group_name"]));
    else{
        echo "You should name your new group!";
        exit;
    }
    
    if(isset($_POST["ispublic"])){
		if($_POST["ispublic"] == 1)
			$public = 1;
		else 
			$public = 0;
    }
    
    // upload picture
    $filename = "pic";
    $maxfilesize = 500000;
    $pic_url = "bond_pics/";
    $imgArray = array("image/jpg","image/jpeg","image/gif","image/JPG");
    if(isset($_FILES[$filename])){
        if(!is_uploaded_file($_FILES[$filename]["tmp_name"])){
        		
				header("Location: create_group.php");
        }
        if(!in_array($_FILES[$filename]["type"],$imgArray)){
                header("Location: create_group.php");
        }
        if($maxfilesize < $_FILES[$filename]["size"]){
                header("Location: create_group.php");
        }
        if(!file_exists($pic_url)){
                mkdir($pic_url,0777);
        }
        $db = new database();
        $db->connect();
        
        $query = "select AUTO_INCREMENT from information_schema.tables where table_name = 'bond'";
        $result = $db->send_sql($query);
        if($result == false)
            exit("query error");
        $r = mysql_fetch_row($result);
        $pic_name = $r[0];
        $_FILES[$filename]["name"] = $pic_name.".jpg";
        $pic_url = $pic_url.$_FILES[$filename]["name"];
    }
    else{
        $pic_url="bond_pics/default_bond.jpg";
    }
    
    if(!move_uploaded_file($_FILES[$filename]["tmp_name"],$pic_url)){
        echo "move error";
        exit;
    }
    //echo "<html><body align = center><img width = 150 height = 150 src = ".$pic_url."><img></body></html>";
    //$_SESSION["picdestination"] = $pic_url;
    
    date_default_timezone_set('America/New_York');
    $create_date = date("Y-m-d H:i:s");
    
    $bond_name1=stripslashes($bond_name);
    
    $insert_bond = "INSERT INTO `bond` (`id_bond`, `bond_name`, `ispublic`, `found_date`, `founder_id`, `bond_pic`)
    VALUES (NULL, '".$bond_name1."', '".$public."', '".$create_date."', '".$user_id."', '".$pic_url."');";
    
    $insert_res = $db->send_sql($insert_bond);
    
    $bondid = "SELECT max(`id_bond`) FROM `bond`";
    $find_bondid = $db->send_sql($bondid);
    $id = mysql_fetch_row($find_bondid);
    //echo $id[0];
    
    
    $insert_bond = "INSERT INTO user_bond (id_user, id_bond, status) VALUES ('".$user_id."','".$id[0]."', '1');";
    $inst = $db->send_sql($insert_bond);
    header("Location: ../bz/member.php");
    
?>