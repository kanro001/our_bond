<?php
    include("dbclass.php");
    
    function grouplist($ispublic){
        $db = new database();
        $db->connect();
        
        $query_all  = "SELECT bond.bond_name, user.firstname, user.lastname, bond.found_date, bond.post_number, bond_pic, bond.id_bond\n"
    					. "FROM bond, user\n"
					    . "WHERE bond.founder_id=user.id_user\n"
					    . "AND bond.ispublic = ".$ispublic."\n"
					    . "order by bond.post_number\n"
					    . "desc\n"
					    . "\n";
        $res_all = $db->send_sql($query_all);
        $total_num = mysql_num_rows($res_all);
              
        echo "<div><table>";
            
        if ($ispublic == 1){
            for($i=0;$i<$total_num;$i++){
                if($i%3 == 0){
                    echo "<div>";
                    echo "<tr>";
                }
                
                echo "<td>";
                $row = $db->next_row();
                echo "<div class='pic'><img width = 260 height = 200 src='".stripslashes($row[5])."' alt='group'></div><div><label>Group Name: </label><a id =".$row[6]." href='#' onclick = 'create_session(event)'>".stripslashes($row[0])."</a></div><div><label>Founder: </label>".stripslashes($row[1])." ".stripslashes($row[2])."</div><div><label>Found date: </label>".stripslashes($row[3])."</div><div><label>Post Number: </label>".stripslashes($row[4])."</div>";
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
        }
        else{
            for($i=0;$i<$total_num;$i++){
                if($i%3 == 0){
                    echo "<div>";
                    echo "<tr>";
                }
                
                echo "<td>";
                $row = $db->next_row();
                echo "<div class='pic'><img width = 260 height = 200 src='".stripslashes($row[5])."' alt='group'></div><div><label>Group Name: </label><a id =".$row[6]." href='#' onclick = 'create_session(event)'>".stripslashes($row[0])."</a></div><div><label>Founder: </label>".stripslashes($row[1])." ".stripslashes($row[2])."</div><div><label>Found date: </label>".stripslashes($row[3])."</div><div><label>Post Number: </label>".stripslashes($row[4])."</div>";
                echo "</td>";
                
                if(($i+1)%3 ==0){
                    echo "</tr>";
                    echo "</div>";
                }
                /*echo "<div>";
                $row = $db->next_row();
                echo "<tr><td><a href='' onclick='check_login()'>".$row[0]."</a></td><td>".$row[1]." ".$row[2]."</td><td>".$row[3]."</td><td>".$row[4]."</td></tr>";
                echo "</div>";*/
            }
        }
        
        echo "</table></div>";
        unset($db);
    }
    
    function hotgroups($ispublic){
        //include("dbclass.php");
        $db = new database();
        $db->connect();
        
        $query_allrow = "select *\n"
        . "from bond\n"
        . "where bond.ispublic = ".$ispublic."\n";
        $res_all = $db->send_sql($query_allrow);
        $total_num = mysql_num_rows($res_all);
        //echo "found ".$total_num." rows totally<br/>";
        if ($total_num>6) $num = 6;
        else $num = $total_num;
        
        $query = "SELECT bond.bond_name, user.firstname, user.lastname, bond.found_date, bond.post_number, bond_pic, bond.id_bond\n"
    					. "FROM bond, user\n"
					    . "WHERE bond.founder_id=user.id_user\n"
					    . "AND bond.ispublic = ".$ispublic."\n"
					    . "order by bond.post_number\n"
					    . "desc\n"
					    . "\n"
					    . " LIMIT 0,".$num;
        
        $res = $db->send_sql($query);
        $num = mysql_num_rows($res);
        //echo "found max ".$num." rows totally<br/>";
        
        echo "<div><table>";
        //echo "<tr><th>Group Name</th><th>Founder</th><th>Found Date</th><th>Post Number</th><th>Lastest Post Date</th></tr>";
            
        if ($ispublic == 1){
            for($i=0;$i<$num;$i++){
                if($i%3 == 0){
                    echo "<div>";
                    echo "<tr>";
                }
                
                echo "<td>";
                $row = $db->next_row();
                echo "<div class='pic'><img width = 260 height = 200 src='".stripslashes($row[5])."' alt='group'></div><div><label>Group Name: </label><a id =".$row[6]." href='#' onclick = 'create_session(event)'>".stripslashes($row[0])."</a></div><div><label>Founder: </label>".stripslashes($row[1])." ".stripslashes($row[2])."</div><div><label>Found date: </label>".stripslashes($row[3])."</div><div><label>Post Number: </label>".stripslashes($row[4])."</div>";
                echo "</td>";
                
                if(($i+1)%3 ==0){
                    echo "</tr>";
                    echo "</div>";
                }
                
                
            }
        }
        else{
            for($i=0;$i<$num;$i++){
                if($i%3 == 0){
                    echo "<div>";
                    echo "<tr>";
                }
                
                echo "<td>";
                $row = $db->next_row();
                echo "<div class='pic'><img width = 260 height = 200 src='".stripslashes($row[5])."' alt='group'></div><div><label>Group Name: </label><a id =".$row[6]." href='#' onclick = 'create_session(event)'>".stripslashes($row[0])."</a></div><div><label>Founder: </label>".stripslashes($row[1])." ".stripslashes($row[2])."</div><div><label>Found date: </label>".stripslashes($row[3])."</div><div><label>Post Number: </label>".stripslashes($row[4])."</div>";
                echo "</td>";
                
                if(($i+1)%3 ==0){
                    echo "</tr>";
                    echo "</div>";
                }
            }
        }
        
        echo "</table></div>";
        
        unset($db);
    }
    
    
?>
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