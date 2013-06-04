<!DOCTYPE html>
<?php session_start(); 
if(!isset($_SESSION["valid_user"])){
?>
<html lang="en-US">
    <head>
        <meta charset="UTF-8"/>
        <title>Ourbond Public Group Page</title>
        <link rel="stylesheet" type="text/css" href="homepage.css" />
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
                &nbsp;&nbsp;&nbsp;&nbsp;<a href="main.php">Home</a>&nbsp;&nbsp;&nbsp;&nbsp;<a>Public Groups</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="privategroups.php">Private Groups</a>
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
        <title>OurBond Public Group Page</title>
        <link rel="stylesheet" type="text/css" href="homepage.css" />
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
            &nbsp;&nbsp;&nbsp;&nbsp;<a href="main.php">Home</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="publicgroups.php">Public Groups</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="privategroups.php">Private Groups</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="../bz/member.php">Personal Page</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="../changepassword_form.php">Change Password</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="../bz/logout_form.php">Log out</a>
            &nbsp;&nbsp;&nbsp;<form action="show_search.php" method="get" id="form">Search Group: <input type="text" name="bond_name"><input type="submit" value="Submit" /></form>
            <br>
        </div>
    </div>
<?php
}
?>
    <div>
        <fieldset>
            <legend>Public Group List</legend>
            <?php
            include("phpfunctions.php");
            grouplist(1);
            ?>
        </fieldset>
        
    </div>
    
    
</body>
</html>