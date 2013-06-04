<table>
    <tr>
        <td>Group Name</td>
        <td>Founder</td>
        <td>Found Date</td>
        <td>Latest Post Date</td>
    </tr>
    <td></td>
</table>

<?php
    $query_all = "SELECT bond.bond_name, user.firstname, user.lastname, bond.found_date, Max(post.post_date)
                    FROM user_bond, bond, user, post
                    WHERE user_bond.id_user = user.id_user
                    AND user_bond.id_bond = bond.id_bond
                    AND user_bond.id_bond = post.id_bond
                    AND user_bond.id_user = post.id_user
                    AND bond.ispublic =1
                    group by bond.id_bond
                    order by post.post_date";
    $res_all = $db->send_sql($query_allrow);
    $total_num = mysql_num_rows($res_all);                
    echo "<div><table border=1>";
    echo "<tr><th>Group Name</th><th>Founder</th><th>Found Date</th><th>Last Post</th></tr>";
    for($i=0;$i<$total_num;$i++){
        echo "<div>";
        $row = $db->next_row();
        echo "<tr><th>".$row[0]."</th><th>".$row[1]."</th><th>".$row[2]."</th><tr>".$row[3]."\t".$row[4]."</th><th>".$row[5]."</th></tr>";
        echo "</div>";
    }
    echo "</table></div>";
    
?>


