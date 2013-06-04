<html lang="en-US">
    <head>
        <meta charset="UTF-8"/>
        <title>Create Group</title>
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
                &nbsp;&nbsp;&nbsp;&nbsp;<a href="main.php">Home</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="publicgroups.php">Public Groups</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="privategroups.php">Private Groups</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="../bz/member.php">Personal Page</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="../bz/changepassword_form.php">Change Password</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="../bz/logout_form.php">Log out</a>
                &nbsp;&nbsp;&nbsp;<form action="show_search.php" method="get" id="form">Search Group: <input type="text" name="bond_name"><input type="submit" value="Submit" /></form>
                </div>
                <div>
                    <fieldset>
                        <legend> Create A New Group</legend>
                        <div>
                            <form action="cg_form.php" method="POST" id="form_pic" enctype="multipart/form-data">
                                <table>
                                    <tr height=50px>
                                        <td  align=right>New Group Name</td>
                                        <td><input type="text" name="group_name"/><br/></td>
                                    </tr>
                                    <tr  height=50px>
                                        <td align=right><input type="radio" name="ispublic" value="1"/>Public Group</td>
                                        <td><input type="radio" name="ispublic" value="0" checked="checked"/>Private Group<br/></td>
                                    </tr>
                                    <tr  height=50px>
                                        <td align=right>Please upload a picture for your new group</td>
                                        <td><input type="file" name="pic"/></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td><input type="reset" name="Reset" align=right><input type="submit" name="Submit"></td>
                                    </tr>
                                </table>
                            </form>
                        </div>
                    </fieldset>
                    
                    
                </div>
        </div>
    </body>
</html>