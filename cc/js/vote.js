	var source;
	var a = new XMLHttpRequest();
	function submitchange(e){
		source = e.target.parentNode.firstChild.nextSibling.nextSibling;
		a.open("POST","update.php",true);
		a.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
		a.onreadystatechange = voteback;
		url = "cid="+source.id+"&table=comment&column="+source.previousSibling.id;
		a.send(url);
	}
	function voteback(){
		if(a.readyState == 4 && a.status == 200){
			var back = a.responseText;
			if(back == "query error")
				alert("update.php query error");
			else if(back == "query1 error")
				alert("update.php query1 error");
			else if(back == "nocid")
				alert("send data error");
			else if(back == "login")
				alert("You must login to vote for comments");
			else if(back == "voted")
				alert("You cannot vote more than once for one comment");
			else{
				source.innerHTML = "("+back+")"	
			}
		}
	}
	
	function submit(){
		var texta = document.getElementById("comment");
		var reg = /\n/g;
		var t = texta.value.replace(reg,"~~~~~~~~~~");
		a.open("POST","insert.php",true);
		a.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
		var url = "comment="+t;
		a.onreadystatechange = getback;
		a.send(url);
	}
		
	function getback(){
		if(a.readyState == 4 && a.status == 200){//4是传输完成，200是服务器正常返回
			var s = a.responseText;
			if(s == "true")
				window.location.href = "comment.php";
			else if(s == "empty")
				alert("you cannot submit empty commnets!");
			else
				alert(s);
		}
	}

