var a = new XMLHttpRequest();
var source;

function deletepost(e){
	source = e.target;
	var choice = window.confirm("You sure want to delete post with the ID:"+source.id+"?");
	if(choice == true){
		a.open("POST","deletepost.php",true);
		a.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
		url = "postid="+source.id;
		a.onreadystatechange = deleteresult;
		a.send(url);
	}
}

function deleteresult(){
	var back = a.responseText;
	if(a.readyState == 4 && a.status == 200){
		if(back == "novalue")
			alert("send data error");
		else if(back == "query error")
			alert("delete data error");
		else
			window.location.href = "group.php";
	}
}