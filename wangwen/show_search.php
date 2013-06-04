<!DOCTYPE html>
<?php session_start(); 
if(!isset($_SESSION["valid_user"])){
?>
	<html lang="en-US">
	<head>
	<meta charset="UTF-8"/>
	<title>OurBond Home Page</title>
	<link rel="stylesheet" type="text/css" href="homepage.css" />
	        <?php include("phpfunctions.php");?>
	    </head>
	    <body>
	        <div id="head">
	            <table class="header">
	                <tr id="pic_logo">
	                    <td rowspan="2">
	                        <img src="logo.jpg" height="60px"/>
	                    </td>
	                    <td class="login">
	                        <a href="../bz/log_form.php">Sign in</a>
	                    </td>
	                </tr>
	                
	                <tr>
	                    <td class="login">
	                        <a href="../bz/register_form.php">Sign up</a>
	                    </td>
	                </tr>   
	            </table>
	        </div>
	        <div class="menu">
			<div id="member_menu">
			&nbsp;&nbsp;&nbsp;&nbsp;Home&nbsp;&nbsp;&nbsp;&nbsp;<a href="publicgroups.php">Public Groups</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="privategroups.php">Private Groups</a>
                        &nbsp;&nbsp;&nbsp;<form action="show_search.php" method="get" id="form">Search Group: <input type="text" name="bond_name"><input type="submit" value="Submit" /></form>
			<br>
			</div>
		</div>
<?php 
}
else{
?>	
	<html lang="en-US">
	<head>
	<meta charset="UTF-8"/>
	<title>OurBond Home Page</title>
	<link rel="stylesheet" type="text/css" href="homepage.css" />
	        <?php include("phpfunctions.php");?>
	    </head>
	    <body>
	        <div id="head">
	            <table class="header">
	                <tr id="pic_logo">
	                    <td rowspan="2">
	                        <img src="logo.jpg" height="60px"/>
	                    </td>
	                    <td class="login">
	                        
	                    </td>
	                </tr>
	                
	                <tr>
	                    <td class="login">
	                        
	                    </td>
	                </tr>   
	            </table>
	        </div>
	<div class="menu">
		<div id="member_menu">
		&nbsp;&nbsp;&nbsp;&nbsp;Home&nbsp;&nbsp;&nbsp;&nbsp;<a href="publicgroups.php">Public Groups</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="privategroups.php">Private Groups</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="../bz/member.php">Personal Page</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="../bz/changepassword_form.php">Change Password</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="../bz/logout_form.php">Log out</a>
                &nbsp;&nbsp;&nbsp;<form action="show_search.php" method="get" id="form">Search Group: <input type="text" name="bond_name"><input type="submit" value="Submit" /></form>
		</div>
	</div>
<?php
}
?>

            
        <div class="group_list">
            <fieldset>
                <legend>Search Results</legend>
                <br/>
		<?php
		    //include("dbclass.php");
		    
		    $stro=$_GET["bond_name"];
		    $str1=strip_tags($stro);
		    $G_name=addslashes($str1);
		    
		    $db = new database();
		    $db->connect();
		    
		    $query_bond = "SELECT bond.bond_name, user.firstname, user.lastname, bond.found_date, count(*), Max(post.post_date), bond_pic, bond.id_bond
                        FROM user_bond, bond, user, post
                        WHERE user_bond.id_user = user.id_user
                        AND user_bond.id_bond = bond.id_bond
                        AND user_bond.id_bond = post.id_bond
                        AND user_bond.id_user = post.id_user
                        AND bond_name LIKE '%".$G_name."%'
                        group by bond.id_bond
                        order by count(*) desc
			limit 0,9";
		    
		    $res_bond = $db->send_sql($query_bond);
		    $total_num = mysql_num_rows($res_bond);                
		    echo "<div><table>";  
		
		    for($i=0;$i<$total_num;$i++){
			if($i%3 == 0){
			    echo "<div>";
			    echo "<tr>";
			}
			
			echo "<td>";
			$row = $db->next_row();
			echo "<div class='pic'><img src='".stripslashes($row[6])."' alt='group'></div><div><label>Group Name: </label><a id =".$row[7]." href='#' onclick = 'create_session(event)'>".stripslashes($row[0])."</a></div><div><label>Founder: </label>".stripslashes($row[1])." ".stripslashes($row[2])."</div><div><label>Found date: </label>".stripslashes($row[3])."</div><div><label>Post Number: </label>".stripslashes($row[4])."</div><div><label>Latest Post Date: </label>".stripslashes($row[5]);
			echo "</td>";
			
			if(($i+1)%3 ==0){
			    echo "</tr>";
			    echo "</div>";
			}
			
			/*echo "<div>";
			$row = $db->next_row();
			echo "<tr><td><a href=''>".$row[0]."</a></td><td>".$row[1]." ".$row[2]."</td><td>".$row[3]."</td><td>".$row[4]."</td></tr>";
			echo "</div>";*/
		    }
		?>
            </fieldset>
            
        </div>
<script type = "text/javascript">
	var a = new XMLHttpRequest();
	var source;
	function create_session(e){
		source = e.target;
		a.open("POST","create_session.php",true);
		a.onreadystatechange = goToGroup;
		a.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
		url = "gid="+source.id;
		a.send(url);
	}

	function goToGroup(){
		if(a.readyState == 4 && a.status == 200){
			window.location.href = "../cc/group.php";
		}
	}
</script>
    </body>
</html>