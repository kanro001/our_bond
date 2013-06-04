<?php
	function postUI($postid,$pic,$founder,$f_date,$n_like,$n_dislike,$content,$check_founder){
?>
	<div id = "post">
		<div id = "post_pic">
			<a href = "#" onclick = "gotoComment(event)"><img id = "<?php echo $postid?>" src = "<?php echo $pic?>" width = 150px height = 150px>
			</img></a>
		</div>
		<div id = "post_founder">
			<span>Founder:</span> <?php echo $founder?>
		</div>
		<div id = "post_date">
			<span>Date:</span> <?php echo $f_date?>
		</div>
		<div id = "post_like">
			<span>(<?php echo $n_like?>)</span>
			<a id = "nice" href = "#" onclick = "vote(event)"><img id = "<?php echo $postid?>" src = "img/like.jpg"></img></a>
			<span>(<?php echo $n_dislike?>)</span>
			<a id = "ugly" href = "#" onclick = "vote(event)"><img id = "<?php echo $postid?>" src = "img/dislike.jpg"></img></a> 
<?php
			if($check_founder == 1){
?>
				<a id = "delete" href = "#" onclick = "deletepost(event)"><img id = "<?php echo $postid?>" src = "img/delete.jpg"></img></a> 
<?php
			}
?>
		</div>
		<div id = "post_brief">
			<?php echo $content?>
		</div>
	</div>
<?php
	}
	
	function g_page($i){
		echo "<div id = 'div_num'>";
		for($p = 0; $p < $i; $p++){
?>			
			<span>
				<a href = "#" onclick = "page_change(event)"><?php echo $p+1?></a>
			</span>
<?php
		}
		echo "</div>";
	}
	
	function navi($gid){
?>
		<div id = "navigator">
			<span>Now, your position is: </span>
			<a href = "../wangwen/main.php">Home >> </a>
			<a href = "../wangwen/publicgroups.php">Public >> </a>
			<a href = "../wangwen/privategroups.php">Private >> </a>
			<a href = "../bz/member.php">Personal >> </a>
			<a href = "group.php">Bond: <?php echo $gid?> >> </a>
			<a href = "../bz/logout_form.php">Logout</a>
		</div>
<?php 
	}
	
	function g_table($allpost,$founder){
		$i = 0;
		echo "<table align = center id = 'page_change'>";
		foreach($allpost as $row){
			if($i%4 == 0)
				echo "<tr>";
			echo "<td>";
			postUI($row["ID_POST"],$row["pic"],$row["EMAIL"],$row["POST_DATE"],$row["nice"],$row["ugly"],$row["CONTENT"],$founder);
			echo "</td>";
			$i++;
			if($i%4 == 0)
				echo "</tr>";
		}
		echo "</table>";
	}
?>
	<script type = "text/javascript" src = "js/post_vote.js"></script>
	<script type = "text/javascript" src = "js/page_change.js"></script>
	<script type = "text/javascript" src = "js/deletepost.js"></script>	

