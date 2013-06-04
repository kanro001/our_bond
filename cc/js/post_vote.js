	var a = new XMLHttpRequest();
	var source;
		
	function gotoComment(e){
		id = e.target.id;
		a.open("POST","middle.php",true);
		a.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
		a.onreadystatechange = databack;
		url = "id="+id;
		a.send(url);
	}
		
	function vote(e){
		source = e.target;
		a.open("POST","update_vote.php",true);
		a.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
		a.onreadystatechange = votechange;
		url = "id="+source.id+"&column="+source.parentNode.id;
		a.send(url);
	}
		
	function votechange(){
		if(a.readyState == 4 && a.status == 200){
			var back = a.responseText;
			if(back == "exist")
				alert("you have voted for this post");
			else if(back == "login")
				alert("you cannot vote for post before log in");
			else
				source.parentNode.previousSibling.previousSibling.innerHTML = "("+back+")";
		}
	}
		
	function databack(){
		if(a.readyState == 4 && a.status == 200){
			window.location.href = "comment.php";
		}
	}