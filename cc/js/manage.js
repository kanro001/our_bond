var a = new XMLHttpRequest();
var source;

function initialize(file,url){
	a.open("POST",file,true);
	a.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
	a.onreadystatechange = newmanagepage;
	a.send(url);
}

function deletemember(e){
	source = e.target;
	if(source.name == "K")
		url = "uid="+source.id+"&type=k";
	else
		url = "uid="+source.id+"&type=n";
	initialize("manage.php",url);
}

function newmanagepage(){
	var back = a.responseText;
	if(back == "ktrue")
		window.location.href = "memberlist.php";
	if(back == "mtrue")
		window.location.href = "group.php";
	if(back == "founder")
		alert("You can not kick yourself out");
	if(back == "novalue")
		alert("data send error");
}