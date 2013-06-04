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
		&nbsp;&nbsp;&nbsp;&nbsp;Home&nbsp;&nbsp;&nbsp;&nbsp;<a href="publicgroups.php">Public Groups</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="privategroups.php">Private Groups</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="../bz/member.php">Personal Page</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="../changepassword_form.php">Change Password</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="../bz/logout_form.php">Log out</a>
                &nbsp;&nbsp;&nbsp;<form action="show_search.php" method="get" id="form">Search Group: <input type="text" name="bond_name"><input type="submit" value="Submit" /></form>
		</div>
	</div>
<?php
}
?>

            
        <div class="group_list">
            <fieldset>
                <legend>Hotest groups from public groups</legend>
                <a href="publicgroups.php">More</a>
                <br/>
                <?php
                    //include("phpfunctions.php");
                    hotgroups(1);
                ?>
            </fieldset>
            
        </div>
            
        <div class="group_list">
            <fieldset>
                <legend>Hotest groups from private groups</legend>
                <a href="privategroups.php">More</a>
                <br/>
                <?php
                    //include("phpclass.php");
                hotgroups(0);
                ?>
            </fieldset>
            
        </div>

    </body>
</html>